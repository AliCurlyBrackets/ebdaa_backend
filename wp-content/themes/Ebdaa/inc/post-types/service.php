<?php

function be_register_service_post_type() {
	register_post_type(
		'service',
		array(
			'labels'              => array(
				'name'               => __( 'الخدمات', 'be' ),
				'singular_name'      => __( 'خدمة', 'be' ),
				'add_new'            => __( 'إضافة خدمة', 'be' ),
				'add_new_item'       => __( 'إضافة خدمة جديدة', 'be' ),
				'edit_item'          => __( 'تعديل الخدمة', 'be' ),
				'new_item'           => __( 'خدمة جديدة', 'be' ),
				'view_item'          => __( 'عرض الخدمة', 'be' ),
				'all_items'          => __( 'كل الخدمات', 'be' ),
				'search_items'       => __( 'بحث في الخدمات', 'be' ),
				'not_found'          => __( 'لا توجد خدمات', 'be' ),
				'not_found_in_trash' => __( 'لا توجد خدمات في المهملات', 'be' ),
			),
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => true,
			'rewrite'             => array( 'slug' => 'service' ),
			'has_archive'         => false,
			'supports'            => array( 'title', 'thumbnail', 'page-attributes', 'revisions' ),
			'menu_icon'           => 'dashicons-awards',
			'hierarchical'        => false,
		)
	);
}
add_action( 'init', 'be_register_service_post_type' );

function be_add_service_image_size() {
	add_image_size( 'be-service-card', 400, 400, true );
}
add_action( 'after_setup_theme', 'be_add_service_image_size' );

function be_service_columns( $columns ) {
	$columns['be_starting_price'] = __( 'السعر الابتدائي', 'be' );
	$columns['be_show_in_grid']   = __( 'ظاهر في الشبكة', 'be' );
	$columns['be_order']          = __( 'الترتيب', 'be' );

	return $columns;
}

function be_service_sortable_columns( $columns ) {
	$columns['be_starting_price'] = 'be_starting_price';
	$columns['be_order']          = 'menu_order';

	return $columns;
}

function be_service_column( $column, $post_id ) {
	if ( 'be_starting_price' === $column ) {
		$price = get_post_meta( $post_id, '_be_starting_price', true );
		echo esc_html( $price === '' ? '—' : be_format_price( $price ) );
	}

	if ( 'be_show_in_grid' === $column ) {
		echo get_field( 'field_be_show_in_grid', $post_id ) ? esc_html__( 'نعم', 'be' ) : esc_html__( 'لا', 'be' );
	}

	if ( 'be_order' === $column ) {
		$post = get_post( $post_id );
		echo esc_html( $post ? (int) $post->menu_order : 0 );
	}
}

function be_min_package_price( $packages ) {
	$prices = array();

	foreach ( (array) $packages as $package ) {
		if ( isset( $package['price'] ) && is_numeric( $package['price'] ) ) {
			$prices[] = (float) $package['price'];
		}
	}

	return empty( $prices ) ? 0.0 : min( $prices );
}

function be_sync_service_price( $post_id ) {
	$price = be_min_package_price( get_field( 'field_be_packages', $post_id ) );

	if ( $price > 0 ) {
		update_post_meta( $post_id, '_be_starting_price', $price );
	}
}
add_action( 'save_post_service', 'be_sync_service_price' );

function be_validate_single_featured( $valid, $value, $field ) {
	if ( ! $valid || empty( $_POST['acf'] ) ) {
		return $valid;
	}

	$rows     = isset( $_POST['acf']['field_be_packages'] ) ? (array) $_POST['acf']['field_be_packages'] : array();
	$featured = 0;

	foreach ( $rows as $row ) {
		if ( ! empty( $row['field_be_package_is_featured'] ) ) {
			++$featured;
		}
	}

	if ( $featured > 1 ) {
		return __( 'يمكن اختيار باقة مميزة واحدة فقط.', 'be' );
	}

	return $valid;
}
