<?php

function be_clear_services_cache() {
	delete_transient( 'be_services' );
}
add_action( 'deleted_post', 'be_clear_services_cache' );
add_action( 'transition_post_status', 'be_clear_services_cache' );
add_action( 'wp_head', 'be_service_meta_description' );

function be_option( $name ) {
	$defaults = be_option_defaults();
	$value    = get_field( 'field_be_' . $name, 'options' );

	if ( null === $value || false === $value || '' === $value || array() === $value ) {
		return isset( $defaults[ $name ] ) ? $defaults[ $name ] : $value;
	}

	if ( isset( $defaults[ $name ] ) && is_array( $defaults[ $name ] ) && is_array( $value ) ) {
		$keys = array_keys( $defaults[ $name ] );
		if ( $keys !== range( 0, count( $keys ) - 1 ) ) {
			return array_merge( $defaults[ $name ], $value );
		}
	}

	return $value;
}

function be_format_price( $value ) {
	return apply_filters( 'be_format_price', number_format( (float) $value, 0, '.', ',' ), $value );
}

function be_repeater_texts( $rows ) {
	$texts = array();

	foreach ( (array) $rows as $row ) {
		$text = is_array( $row ) ? ( isset( $row['text'] ) ? $row['text'] : '' ) : $row;
		if ( '' !== $text && null !== $text ) {
			$texts[] = $text;
		}
	}

	return $texts;
}

function be_apply_featured_fallback( $packages ) {
	$featured = array_filter( $packages, function ( $package ) {
		return $package['featured'];
	} );

	if ( empty( $featured ) && count( $packages ) > 1 ) {
		$packages[ (int) floor( count( $packages ) / 2 ) ]['featured'] = true;
	}

	return $packages;
}

function be_service_from_post( $post ) {
	$id          = $post->ID;
	$packages    = array();
	$included    = be_option( 'included_feature' );
	$raw_package = get_field( 'field_be_packages', $id );
	$currency    = be_option( 'currency_label' );

	foreach ( (array) $raw_package as $row ) {
		$badge     = isset( $row['badge_text'] ) ? $row['badge_text'] : '';
		$cta_label = isset( $row['cta_label'] ) ? $row['cta_label'] : '';
		$features  = array_merge( array( $included ), be_repeater_texts( isset( $row['features'] ) ? $row['features'] : array() ) );

		$packages[] = array(
			'name'      => isset( $row['name'] ) ? $row['name'] : '',
			'price'     => isset( $row['price'] ) ? (float) $row['price'] : 0.0,
			'featured'  => ! empty( $row['is_featured'] ),
			'badge'     => '' !== $badge ? $badge : 'الأكثر طلباً',
			'features'  => $features,
			'cta_label' => '' !== $cta_label ? $cta_label : 'اطلب الباقة',
			'cta_url'   => isset( $row['cta_url'] ) ? $row['cta_url'] : '',
		);
	}

	$packages = be_apply_featured_fallback( $packages );

	$faq       = array();
	$raw_faq   = get_field( 'field_be_faq_override', $id );
	foreach ( (array) $raw_faq as $row ) {
		if ( ! empty( $row['q'] ) ) {
			$faq[] = array(
				'q' => $row['q'],
				'a' => isset( $row['a'] ) ? $row['a'] : '',
			);
		}
	}

	if ( empty( $faq ) ) {
		$faq = be_option( 'global_faq' );
	}

	$price_meta = get_post_meta( $id, '_be_starting_price', true );
	$price      = ( '' === $price_meta || false === $price_meta ) ? be_min_package_price( $raw_package ) : (float) $price_meta;
	$title      = get_the_title( $id );
	$card_label = get_field( 'field_be_card_label', $id );
	$thumbnail  = get_post_thumbnail_id( $id );
	$image      = $thumbnail ? wp_get_attachment_image_src( $thumbnail, 'be-service-card' ) : array( '', 0, 0 );

	return array(
		'id'            => $id,
		'slug'          => isset( $post->post_name ) ? $post->post_name : '',
		'url'           => get_permalink( $id ),
		'name'          => ( null !== $card_label && '' !== $card_label ) ? $card_label : $title,
		'title'         => $title,
		'currency'      => $currency,
		'menu_order'    => isset( $post->menu_order ) ? (int) $post->menu_order : 0,
		'show_in_grid'  => (bool) get_field( 'field_be_show_in_grid', $id ),
		'image'         => $image[0],
		'image_alt'     => ( null !== $card_label && '' !== $card_label ) ? $card_label : $title,
		'badge'         => (string) get_field( 'field_be_hero_badge', $id ),
		'heading'       => (string) get_field( 'field_be_hero_title', $id ),
		'description'   => (string) get_field( 'field_be_hero_description', $id ),
		'chips'         => be_repeater_texts( get_field( 'field_be_hero_chips', $id ) ),
		'price'         => $price,
		'packages'      => $packages,
		'faq'           => $faq,
	);
}

function be_get_services( $grid_only = false ) {
	$cached = get_transient( 'be_services' );

	if ( is_array( $cached ) ) {
		$services = $cached;
	} else {
		$query    = new WP_Query(
			array(
				'post_type'      => 'service',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'no_found_rows'  => true,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
			)
		);
		$services = array();

		foreach ( $query->posts as $post ) {
			$services[] = be_service_from_post( $post );
		}

		set_transient( 'be_services', $services, 86400 );
	}

	if ( ! $grid_only ) {
		return $services;
	}

	return array_values( array_filter( $services, function ( $service ) {
		return $service['show_in_grid'];
	} ) );
}

function be_get_service( $slug ) {
	foreach ( be_get_services() as $service ) {
		if ( $service['slug'] === $slug ) {
			return $service;
		}
	}

	return null;
}

function be_service_json( $service ) {
	$packages = array();

	foreach ( be_apply_featured_fallback( $service['packages'] ) as $package ) {
		$packages[] = array(
			'name'      => $package['name'],
			'price'     => be_format_price( $package['price'] ),
			'featured'  => $package['featured'],
			'badge'     => $package['badge'],
			'features'  => $package['features'],
			'cta_label' => $package['cta_label'],
			'cta_url'   => $package['cta_url'],
		);
	}

	return array(
		'slug' => $service['slug'],
		'url'  => $service['url'],
		'n'    => $service['name'],
		'b'    => $service['badge'],
		't'    => $service['heading'],
		'p'    => be_format_price( $service['price'] ),
		'd'    => $service['description'],
		'c'    => $service['chips'],
		'pl'   => $packages,
		'faq'  => $service['faq'],
	);
}

function be_service_json_ld( $service ) {
	$offers = array();

	foreach ( $service['packages'] as $package ) {
		$offers[] = array(
			'@type'         => 'Offer',
			'name'          => $package['name'],
			'price'         => (int) round( $package['price'] ),
			'priceCurrency' => 'EGP',
			'url'           => $service['url'],
		);
	}

	return array(
		'@context'    => 'https://schema.org',
		'@type'       => 'Service',
		'name'        => $service['name'],
		'description' => $service['description'],
		'provider'    => array(
			'@type' => 'Organization',
			'name'  => 'إبداع',
		),
		'offers'      => $offers,
	);
}

function be_current_service() {
	if ( is_singular( 'service' ) ) {
		$object = get_queried_object();

		if ( $object && isset( $object->ID ) ) {
			foreach ( be_get_services() as $service ) {
				if ( (int) $service['id'] === (int) $object->ID ) {
					return $service;
				}
			}
		}
	}

	$slug = get_query_var( 'be_active' );

	if ( '' !== $slug ) {
		$service = be_get_service( $slug );
		if ( $service ) {
			return $service;
		}
	}

	$services = be_get_services();

	return isset( $services[0] ) ? $services[0] : null;
}

function be_is_services_context() {
	return is_page_template( 'page-services.php' ) || is_singular( 'service' ) || '' !== get_query_var( 'be_active' );
}

function be_services_enqueue_assets() {
	if ( ! be_is_services_context() ) {
		return;
	}

	wp_enqueue_style( 'be-services', get_template_directory_uri() . '/assets/css/services.css', array(), '1.0' );
	wp_enqueue_script( 'be-services', get_template_directory_uri() . '/assets/js/services.js', array(), '1.0', true );

	$services = array();
	foreach ( be_get_services() as $service ) {
		$services[] = be_service_json( $service );
	}

	$data = array(
		'services' => $services,
		'options'  => array(
			'included_feature' => be_option( 'included_feature' ),
			'currency_label'   => be_option( 'currency_label' ),
		),
	);

	wp_add_inline_script( 'be-services', 'window.BE_SERVICES = ' . wp_json_encode( $data ) . ';' );
}

function be_service_title_parts( $parts ) {
	if ( ! be_is_services_context() ) {
		return $parts;
	}

	$service = be_current_service();
	if ( $service ) {
		$parts['title'] = sprintf( 'باقات %s تبدأ من %s جنيه | إبداع', $service['name'], be_format_price( $service['price'] ) );
	}

	return $parts;
}

function be_service_meta_description() {
	if ( ! be_is_services_context() ) {
		return;
	}

	$service = be_current_service();
	if ( $service ) {
		echo '<meta name="description" content="' . esc_attr( $service['description'] ) . '">' . "\n";
	}
}

function be_service_json_ld_output() {
	if ( ! be_is_services_context() ) {
		return;
	}

	$service = be_current_service();
	if ( $service ) {
		echo '<script type="application/ld+json">' . wp_json_encode( be_service_json_ld( $service ) ) . '</script>' . "\n";
	}
}
add_action( 'wp_head', 'be_service_json_ld_output' );

function be_render_types_grid( $wrapper = 'proj' ) {
	$services = be_get_services( true );

	if ( empty( $services ) ) {
		return;
	}

	$types  = be_option( 'types_section' );
	$active = get_query_var( 'be_active' );
	$total  = count( $services );

	echo '<section id="works">' . "\n";
	echo '            <div class="wrap">' . "\n";
	echo '                <p class="tag rv">' . esc_html( $types['tag'] ) . '</p>' . "\n";
	echo '                <h2 class="ttl rv">' . esc_html( $types['title'] ) . '</h2>' . "\n";
	echo '                <div class="' . esc_attr( $wrapper ) . '">' . "\n";

	foreach ( $services as $index => $service ) {
		$delay = number_format( ( $total - $index - 1 ) * 0.1, 1, '.', '' );
		$class = 'pc rv' . ( $service['slug'] === $active ? ' cur' : '' );

		echo '                    <a class="' . esc_attr( $class ) . '" style="transition-delay:' . esc_attr( $delay ) . 's" href="' . esc_url( $service['url'] ) . '" data-k="' . esc_attr( $service['slug'] ) . '" aria-label="' . esc_attr( sprintf( 'صفحة خدمة %s', $service['name'] ) ) . '">';
		echo '<img src="' . esc_url( $service['image'] ) . '" alt="' . esc_attr( $service['image_alt'] ) . '" loading="lazy">';
		echo '<span>' . esc_html( $service['name'] ) . '</span><b>◂</b></a>' . "\n";
	}

	echo '                    <img class="lap rv" src="' . esc_url( $types['side_image'] ) . '" alt="' . esc_attr__( 'لوحة تحكم', 'be' ) . '" loading="lazy">' . "\n";
	echo '                </div>' . "\n";
	echo '            </div>' . "\n";
	echo '        </section>' . "\n";
}

function be_service_types_shortcode() {
	ob_start();
	be_render_types_grid( 'proj' );
	return ob_get_clean();
}

function be_register_services_filters() {
	add_filter( 'acf/validate_value/name=is_featured', 'be_validate_single_featured', 10, 4 );
	add_filter( 'manage_service_posts_columns', 'be_service_columns' );
	add_filter( 'manage_service_posts_sortable_columns', 'be_service_sortable_columns' );
	add_action( 'manage_service_posts_custom_column', 'be_service_column', 10, 2 );
	add_filter( 'document_title_parts', 'be_service_title_parts' );
	add_shortcode( 'be_service_types', 'be_service_types_shortcode' );
}
add_action( 'init', 'be_register_services_filters' );
