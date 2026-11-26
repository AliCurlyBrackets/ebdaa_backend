<?php

$theme_dir = dirname( __DIR__ );

$GLOBALS['be_test'] = array(
	'actions'         => array(),
	'filters'         => array(),
	'post_types'      => array(),
	'image_sizes'     => array(),
	'options_pages'   => array(),
	'field_groups'    => array(),
	'values'          => array(),
	'meta'            => array(),
	'updated_meta'    => array(),
	'transients'      => array(),
	'shortcodes'      => array(),
	'enqueued'        => array(),
	'inline'          => array(),
	'posts'           => array(),
	'query_vars'      => array(),
	'theme_support'   => array(),
);

function add_action( $hook, $callback ) {
	$GLOBALS['be_test']['actions'][ $hook ][] = $callback;
}

function add_filter( $hook, $callback ) {
	$GLOBALS['be_test']['filters'][ $hook ][] = $callback;
}

function apply_filters( $hook, $value ) {
	$args = func_get_args();
	if ( empty( $GLOBALS['be_test']['filters'][ $hook ] ) ) {
		return $value;
	}
	foreach ( $GLOBALS['be_test']['filters'][ $hook ] as $callback ) {
		$value = call_user_func_array( $callback, array_slice( $args, 1 ) );
	}
	return $value;
}

function register_post_type( $type, $args ) {
	$GLOBALS['be_test']['post_types'][ $type ] = $args;
}

function add_image_size( $name, $width, $height, $crop = false ) {
	$GLOBALS['be_test']['image_sizes'][ $name ] = array( $width, $height, $crop );
}

function add_theme_support( $feature ) {
	$GLOBALS['be_test']['theme_support'][] = $feature;
}

function acf_add_options_page( $args ) {
	$GLOBALS['be_test']['options_pages'][ $args['menu_slug'] ] = $args;
}

function acf_add_local_field_group( $args ) {
	$GLOBALS['be_test']['field_groups'][ $args['title'] ] = $args;
}

function get_field( $key, $post_id = false ) {
	$name  = strpos( $key, 'field_be_' ) === 0 ? substr( $key, 9 ) : $key;
	$scope = false === $post_id || '' === $post_id ? '_global' : (string) $post_id;

	if ( isset( $GLOBALS['be_test']['values'][ $scope ][ $name ] ) ) {
		return $GLOBALS['be_test']['values'][ $scope ][ $name ];
	}

	if ( isset( $GLOBALS['be_test']['values'][ $name ] ) ) {
		return $GLOBALS['be_test']['values'][ $name ];
	}

	return null;
}

function get_post_meta( $post_id, $key, $single = false ) {
	return isset( $GLOBALS['be_test']['meta'][ $post_id ][ $key ] ) ? $GLOBALS['be_test']['meta'][ $post_id ][ $key ] : '';
}

function update_post_meta( $post_id, $key, $value ) {
	$GLOBALS['be_test']['updated_meta'][ $post_id ][ $key ] = $value;
	$GLOBALS['be_test']['meta'][ $post_id ][ $key ]         = $value;
}

function get_transient( $key ) {
	return isset( $GLOBALS['be_test']['transients'][ $key ] ) ? $GLOBALS['be_test']['transients'][ $key ] : false;
}

function set_transient( $key, $value, $expiration = 0 ) {
	$GLOBALS['be_test']['transients'][ $key ] = $value;
	return true;
}

function delete_transient( $key ) {
	unset( $GLOBALS['be_test']['transients'][ $key ] );
	return true;
}

function be_test_post( $post_id ) {
	return isset( $GLOBALS['be_test']['posts'][ $post_id ] ) ? $GLOBALS['be_test']['posts'][ $post_id ] : null;
}

function get_permalink( $post_id ) {
	$post = be_test_post( $post_id );
	$slug = $post && isset( $post->slug ) ? $post->slug : (string) $post_id;
	return 'https://ebdaa.test/service/' . $slug;
}

function get_the_title( $post_id ) {
	$post = be_test_post( $post_id );
	return $post && isset( $post->title ) ? $post->title : 'Service ' . $post_id;
}

function get_post_thumbnail_id( $post_id ) {
	$post = be_test_post( $post_id );
	return $post && isset( $post->thumbnail ) ? $post->thumbnail : 0;
}

function wp_get_attachment_image_src( $id, $size = 'thumbnail' ) {
	return array( 'https://ebdaa.test/uploads/' . $id . '-' . $size . '.webp', 400, 400 );
}

function esc_html( $value ) {
	return htmlspecialchars( (string) $value, ENT_QUOTES, 'UTF-8' );
}

function esc_attr( $value ) {
	return htmlspecialchars( (string) $value, ENT_QUOTES, 'UTF-8' );
}

function esc_url( $value ) {
	return htmlspecialchars( (string) $value, ENT_QUOTES, 'UTF-8' );
}

function esc_attr__( $text, $domain = null ) {
	return htmlspecialchars( $text, ENT_QUOTES, 'UTF-8' );
}

function esc_html__( $text, $domain = null ) {
	return htmlspecialchars( $text, ENT_QUOTES, 'UTF-8' );
}

function wp_kses_post( $value ) {
	return (string) $value;
}

function __( $text, $domain = null ) {
	return $text;
}

function _e( $text, $domain = null ) {
	echo $text;
}

function get_template_directory_uri() {
	return 'https://ebdaa.test/wp-content/themes/Ebdaa';
}

function wp_enqueue_script( $handle, $src = false, $deps = array(), $version = false, $footer = false ) {
	$GLOBALS['be_test']['enqueued'][ $handle ] = $src;
}

function wp_enqueue_style( $handle, $src = false, $deps = array(), $version = false ) {
	$GLOBALS['be_test']['enqueued'][ $handle ] = $src;
}

function wp_add_inline_script( $handle, $data, $position = 'after' ) {
	$GLOBALS['be_test']['inline'][ $handle ] = $data;
}

function add_shortcode( $tag, $callback ) {
	$GLOBALS['be_test']['shortcodes'][ $tag ] = $callback;
}

function get_query_var( $key, $default = '' ) {
	return isset( $GLOBALS['be_test']['query_vars'][ $key ] ) ? $GLOBALS['be_test']['query_vars'][ $key ] : $default;
}

function is_singular( $type = '' ) {
	return false;
}

function is_page_template( $template = '' ) {
	return false;
}

function get_queried_object() {
	return null;
}

function wp_json_encode( $data ) {
	return json_encode( $data );
}

function absint( $value ) {
	return abs( (int) $value );
}

class WP_Query {
	public $posts;

	public function __construct( $args ) {
		$posts = array();
		foreach ( $GLOBALS['be_test']['posts'] as $post ) {
			if ( isset( $args['post_type'] ) && $post->post_type !== $args['post_type'] ) {
				continue;
			}
			$posts[] = $post;
		}
		usort( $posts, function ( $a, $b ) {
			return $a->menu_order - $b->menu_order;
		} );
		$this->posts = $posts;
	}
}

require $theme_dir . '/functions.php';
require $theme_dir . '/inc/seed-services.php';

$failures = array();

function check( $condition, $message ) {
	global $failures;

	if ( ! $condition ) {
		$failures[] = $message;
	}

	echo ( $condition ? 'PASS ' : 'FAIL ' ) . $message . PHP_EOL;
}

foreach ( array( 'be_register_service_post_type', 'be_add_service_image_size', 'be_add_post_thumbnails_support', 'be_register_services_filters' ) as $registration ) {
	if ( function_exists( $registration ) ) {
		call_user_func( $registration );
	}
}

check( in_array( 'post-thumbnails', $GLOBALS['be_test']['theme_support'], true ), 'the theme enables featured images for every post type' );
check( isset( $GLOBALS['be_test']['actions']['after_setup_theme'] ) && in_array( 'be_add_post_thumbnails_support', $GLOBALS['be_test']['actions']['after_setup_theme'], true ), 'post thumbnail support is registered on after_setup_theme' );

/* --- CPT and image size --- */

$cpt = isset( $GLOBALS['be_test']['post_types']['service'] ) ? $GLOBALS['be_test']['post_types']['service'] : array();

check( ! empty( $cpt ), 'the service custom post type is registered' );
check( isset( $cpt['rewrite']['slug'] ) && $cpt['rewrite']['slug'] === 'service', 'rewrite slug is service, not services' );
check( isset( $cpt['has_archive'] ) && $cpt['has_archive'] === false, 'the post type has no archive' );
check( isset( $cpt['show_in_rest'] ) && $cpt['show_in_rest'] === true, 'the post type is visible in REST' );
foreach ( array( 'title', 'thumbnail', 'page-attributes', 'revisions' ) as $support ) {
	check( in_array( $support, isset( $cpt['supports'] ) ? $cpt['supports'] : array(), true ), "post type supports {$support}" );
}
check( ! in_array( 'editor', isset( $cpt['supports'] ) ? $cpt['supports'] : array(), true ), 'the post type has no content editor' );

check( isset( $GLOBALS['be_test']['image_sizes']['be-service-card'] ), 'the be-service-card image size is registered' );
check(
	isset( $GLOBALS['be_test']['image_sizes']['be-service-card'] ) && $GLOBALS['be_test']['image_sizes']['be-service-card'] === array( 400, 400, true ),
	'be-service-card is a 400x400 cropped image'
);

/* --- ACF field group --- */

$service_group = isset( $GLOBALS['be_test']['field_groups']['Service'] ) ? $GLOBALS['be_test']['field_groups']['Service'] : array();

check( ! empty( $service_group ), 'ACF Service field group is registered in code' );
$service_names = array_column( isset( $service_group['fields'] ) ? $service_group['fields'] : array(), 'name' );
foreach ( array(
	'show_in_grid', 'card_label', 'hero_badge', 'hero_title', 'hero_description',
	'hero_chips', 'packages', 'faq_override',
) as $name ) {
	check( in_array( $name, $service_names, true ), "Service field {$name} is registered" );
}
$service_location = isset( $service_group['location'][0][0] ) ? $service_group['location'][0][0] : array();
check(
	isset( $service_location['param'], $service_location['value'] ) && $service_location['param'] === 'post_type' && $service_location['value'] === 'service',
	'Service field group is attached to the service post type'
);

$service_fields = array();
foreach ( isset( $service_group['fields'] ) ? $service_group['fields'] : array() as $field ) {
	$service_fields[ $field['name'] ] = $field;
}
check( isset( $service_fields['show_in_grid']['type'] ) && $service_fields['show_in_grid']['type'] === 'true_false', 'show_in_grid is a true/false field' );
check(
	isset( $service_fields['packages']['type'] ) && $service_fields['packages']['type'] === 'repeater' && isset( $service_fields['packages']['min'], $service_fields['packages']['max'] ) && $service_fields['packages']['min'] === 1 && $service_fields['packages']['max'] === 6,
	'packages is a repeater with min 1 and max 6'
);

$package_names = array_column( isset( $service_fields['packages']['sub_fields'] ) ? $service_fields['packages']['sub_fields'] : array(), 'name' );
foreach ( array( 'name', 'price', 'is_featured', 'badge_text', 'features', 'cta_label', 'cta_url' ) as $name ) {
	check( in_array( $name, $package_names, true ), "package subfield {$name} is registered" );
}
$package_fields = array();
foreach ( isset( $service_fields['packages']['sub_fields'] ) ? $service_fields['packages']['sub_fields'] : array() as $field ) {
	$package_fields[ $field['name'] ] = $field;
}
check( isset( $package_fields['price']['min'] ) && $package_fields['price']['min'] === 0, 'package price has min 0' );
check( isset( $package_fields['is_featured']['type'] ) && $package_fields['is_featured']['type'] === 'true_false', 'is_featured is a true/false field' );
check( isset( $package_fields['badge_text']['default_value'] ) && $package_fields['badge_text']['default_value'] === 'الأكثر طلباً', 'badge_text has the original default' );
check( isset( $package_fields['cta_label']['default_value'] ) && $package_fields['cta_label']['default_value'] === 'اطلب الباقة', 'cta_label has the original default' );
check( isset( $GLOBALS['be_test']['filters']['acf/validate_value/name=is_featured'] ), 'a validate_value filter guards the single featured package' );

/* --- Options page --- */

$options = isset( $GLOBALS['be_test']['options_pages']['be-services'] ) ? $GLOBALS['be_test']['options_pages']['be-services'] : array();
check( ! empty( $options ), 'the Services settings options page is registered' );
check( isset( $options['page_title'] ) && $options['page_title'] === 'إعدادات الخدمات', 'options page title is إعدادات الخدمات' );
check( isset( $options['redirect'] ) && $options['redirect'] === false, 'options page has its own screen' );

$options_group = isset( $GLOBALS['be_test']['field_groups']['Services Settings'] ) ? $GLOBALS['be_test']['field_groups']['Services Settings'] : array();
check( ! empty( $options_group ), 'ACF Services Settings field group is registered' );
$option_names = array_column( isset( $options_group['fields'] ) ? $options_group['fields'] : array(), 'name' );
foreach ( array(
	'included_feature', 'currency_label', 'pricing_note', 'cta_url',
	'global_features', 'global_steps', 'global_faq', 'types_section', 'final_cta',
) as $name ) {
	check( in_array( $name, $option_names, true ), "Services field {$name} is registered" );
}
$defaults = be_option_defaults();
check( isset( $defaults['included_feature'] ) && $defaults['included_feature'] === 'دومين واستضافة مجاناً لأول سنة', 'included_feature default matches the original design' );
check( isset( $defaults['currency_label'] ) && $defaults['currency_label'] === 'ج.م', 'currency_label default matches the original design' );
check( count( $defaults['global_features'] ) === 6, 'the six "ماذا يشمل موقعك" features are available as defaults' );
check( count( $defaults['global_steps'] ) === 4, 'the four steps are available as defaults' );
check( count( $defaults['global_faq'] ) === 6, 'the six global FAQ entries are available as defaults' );
check( isset( $defaults['types_section']['tag'] ) && $defaults['types_section']['tag'] === 'أنواع المشاريع', 'types section tag default is preserved' );
check( isset( $defaults['types_section']['title'] ) && $defaults['types_section']['title'] === 'خبرات في مختلف المجالات', 'types section title default is preserved' );
check( isset( $defaults['final_cta']['button'] ) && $defaults['final_cta']['button'] === 'تواصل معنا الآن ←', 'final CTA button default is preserved' );

/* --- Price synchronisation --- */

$GLOBALS['be_test']['values'][11] = array(
	'packages' => array(
		array( 'price' => '5500', 'name' => 'الاحترافية' ),
		array( 'price' => '3000', 'name' => 'الأساسية' ),
		array( 'price' => '9000', 'name' => 'المتقدمة' ),
	),
);
be_sync_service_price( 11 );
check( isset( $GLOBALS['be_test']['updated_meta'][11]['_be_starting_price'] ) && $GLOBALS['be_test']['updated_meta'][11]['_be_starting_price'] === 3000.0, 'save_post stores the lowest package price as the starting price' );
check( isset( $GLOBALS['be_test']['actions']['save_post_service'] ), 'price sync is hooked to save_post_service' );
check( isset( $GLOBALS['be_test']['actions']['deleted_post'] ) && isset( $GLOBALS['be_test']['actions']['transition_post_status'] ), 'cache is invalidated on delete and trash' );

/* --- Seed definitions --- */

$definitions = be_seed_definitions();
check( count( $definitions ) === 6, 'the seeder defines the six services' );
check( array_keys( $definitions ) === array( 'realestate', 'law', 'edu', 'stores', 'companies', 'sites' ), 'seeded services follow the grid order, sites last' );
check( $definitions['sites']['show_in_grid'] === false, 'sites is excluded from the types grid' );
check( $definitions['realestate']['menu_order'] === 1 && $definitions['sites']['menu_order'] === 6, 'menu_order follows the grid order' );
check( $definitions['realestate']['image'] === 'p1.webp', 'grid cards use the attached p1..p5 images' );
check( count( $definitions['sites']['packages'] ) === 3, 'seeded services carry their packages' );

/* --- Data access --- */

foreach ( $definitions as $slug => $definition ) {
	$post_id                                                  = 100 + $definition['menu_order'];
	$GLOBALS['be_test']['posts'][ $post_id ]                  = (object) array(
		'ID'          => $post_id,
		'post_type'   => 'service',
		'post_name'   => $slug,
		'menu_order'  => $definition['menu_order'],
		'title'       => $definition['title'],
		'slug'        => $slug,
		'thumbnail'   => $post_id,
	);
	$GLOBALS['be_test']['values'][ $post_id ]                 = array(
		'show_in_grid'     => $definition['show_in_grid'],
		'card_label'       => $definition['card_label'],
		'hero_badge'       => $definition['hero_badge'],
		'hero_title'       => $definition['hero_title'],
		'hero_description' => $definition['hero_description'],
		'hero_chips'       => array_map( function ( $chip ) { return array( 'text' => $chip ); }, $definition['chips'] ),
		'packages'         => array_map( function ( $package ) {
			return array(
				'name'        => $package['name'],
				'price'       => (string) $package['price'],
				'is_featured' => $package['featured'],
				'badge_text'  => '',
				'features'    => array_map( function ( $feature ) { return array( 'text' => $feature ); }, $package['features'] ),
				'cta_label'   => '',
				'cta_url'     => '',
			);
		}, $definition['packages'] ),
		'faq_override'     => array(),
	);
	$GLOBALS['be_test']['meta'][ $post_id ]['_be_starting_price'] = min( array_column( $definition['packages'], 'price' ) );
}

$services = be_get_services();
check( count( $services ) === 6, 'be_get_services returns all published services' );
check( $services[0]['slug'] === 'realestate' && $services[5]['slug'] === 'sites', 'services are ordered by menu_order' );
check( count( be_get_services( true ) ) === 5, 'grid-only query excludes services with show_in_grid=false' );
check( get_transient( 'be_services' ) !== false, 'be_get_services caches its result in a transient' );

be_clear_services_cache();
check( get_transient( 'be_services' ) === false, 'clearing the cache removes the transient' );
$services = be_get_services();

$service = be_get_service( 'realestate' );
check( isset( $service ), 'a service can be looked up by slug' );
check( $service['name'] === 'العقارات', 'card_label is used as the display name' );
check( $service['price'] === 7000.0, 'starting price comes from the computed meta' );
check( $service['packages'][0]['features'][0] === 'دومين واستضافة مجاناً لأول سنة', 'included_feature is prepended to every package' );
check( $service['packages'][1]['featured'] === true, 'the seeded featured package stays featured' );
check( $service['packages'][1]['badge'] === 'الأكثر طلباً', 'an empty badge falls back to the original default' );
check( $service['faq'][0]['q'] === $defaults['global_faq'][0]['q'], 'an empty faq_override falls back to the global FAQ' );

$GLOBALS['be_test']['values'][101]['card_label'] = '';
be_clear_services_cache();
check( be_get_service( 'realestate' )['name'] === 'العقارات', 'an empty card_label falls back to the post title' );

$json = be_service_json( $service );
foreach ( array( 'slug', 'url', 'n', 'b', 't', 'p', 'd', 'c', 'pl', 'faq' ) as $key ) {
	check( array_key_exists( $key, $json ), "JSON payload contains {$key}" );
}
check( $json['p'] === '7,000', 'prices are formatted with Latin digits and separators' );
check( count( $json['pl'] ) === 3, 'JSON payload contains all packages' );
check( isset( $json['pl'][0]['cta_label'] ) && $json['pl'][0]['cta_label'] === 'اطلب الباقة', 'empty cta_label falls back to the original default' );

$no_featured = $service;
foreach ( $no_featured['packages'] as $index => $package ) {
	$no_featured['packages'][ $index ]['featured'] = false;
}
check( be_service_json( $no_featured )['pl'][1]['featured'] === true, 'the middle package becomes featured when none is marked' );

/* --- Templates --- */

$args = array( 'service' => $service );

ob_start();
include $theme_dir . '/template-parts/services/hero.php';
$html = ob_get_clean();
check( strpos( $html, 'id="hb"' ) !== false && strpos( $html, $service['badge'] ) !== false, 'hero renders the badge into #hb' );
check( strpos( $html, 'يبدأ من <em>7,000</em> جنيه</span>' ) !== false, 'hero renders the formatted starting price' );
check( strpos( $html, 'id="pb">7,000<' ) !== false, 'hero price badge uses the same starting price' );
check( strpos( $html, 'class="chips rv"' ) !== false, 'hero preserves the chips class' );

ob_start();
include $theme_dir . '/template-parts/services/filter-pills.php';
$html = ob_get_clean();
check( substr_count( $html, '<a href="https://ebdaa.test/service/' ) === 6, 'every service becomes a real permalink pill' );
check( strpos( $html, 'class="on"' ) !== false, 'the active pill is marked with on' );
check( strpos( $html, 'href="#realestate"' ) === false, 'pills no longer point to static hash links' );

ob_start();
include $theme_dir . '/template-parts/services/pricing.php';
$html = ob_get_clean();
check( strpos( $html, 'id="pt">اختر باقة العقارات المناسبة لك<' ) !== false, 'pricing title names the active service' );
check( substr_count( $html, 'class="plan rv' ) === 3, 'pricing renders all packages with their original classes' );
check( strpos( $html, '<li>دومين واستضافة مجاناً لأول سنة</li>' ) !== false, 'pricing includes the included feature as the first list item' );
check( strpos( $html, '<em>الأكثر طلباً</em>' ) !== false, 'the featured package keeps its badge' );

ob_start();
include $theme_dir . '/template-parts/services/faq.php';
$html = ob_get_clean();
check( substr_count( $html, '<div class="q' ) === 6, 'FAQ renders six questions with the original q class' );
check( strpos( $html, '<div class="q open">' ) !== false, 'the first FAQ item starts open' );

ob_start();
include $theme_dir . '/template-parts/services/features.php';
$html = ob_get_clean();
check( substr_count( $html, 'class="ic rv"' ) === 6, 'features section renders the six original feature cards' );

ob_start();
include $theme_dir . '/template-parts/services/steps.php';
$html = ob_get_clean();
check( substr_count( $html, 'class="st rv"' ) === 4, 'steps section renders the four original steps' );

ob_start();
include $theme_dir . '/template-parts/services/cta.php';
$html = ob_get_clean();
check( strpos( $html, 'جاهز تبدأ بـ 7,000 جنيه؟' ) !== false, 'CTA title follows the starting price' );

$GLOBALS['be_test']['query_vars']['be_active'] = 'law';
ob_start();
include $theme_dir . '/template-parts/services/types-grid.php';
$html = ob_get_clean();
check( strpos( $html, '<div class="proj' ) !== false, 'types grid uses the original proj wrapper by default' );
check( substr_count( $html, 'class="pc rv' ) === 5, 'types grid renders the five grid services' );
check( strpos( $html, 'class="pc rv cur"' ) !== false, 'the active service card is marked with cur' );
check( strpos( $html, '<img class="lap rv" src=' ) !== false && strpos( $html, 'class="lap rv"' ) !== false, 'the laptop image keeps the lap class' );
check( substr_count( $html, 'loading="lazy"' ) === 6, 'card and laptop images are lazy loaded' );

$GLOBALS['be_test']['query_vars']['be_active'] = '';
$GLOBALS['be_test']['values']['101']['show_in_grid'] = false;
$GLOBALS['be_test']['values']['102']['show_in_grid'] = false;
$GLOBALS['be_test']['values']['103']['show_in_grid'] = false;
$GLOBALS['be_test']['values']['104']['show_in_grid'] = false;
$GLOBALS['be_test']['values']['105']['show_in_grid'] = false;
be_clear_services_cache();
ob_start();
include $theme_dir . '/template-parts/services/types-grid.php';
$html = ob_get_clean();
check( trim( $html ) === '', 'the section is not rendered when there are no grid services' );

/* --- Unset ACF options --- */

$GLOBALS['be_test']['query_vars']['be_active'] = 'realestate';
$GLOBALS['be_test']['values']['options']       = array(
	'global_features' => false,
	'global_steps'    => false,
	'global_faq'      => false,
);
be_clear_services_cache();
$service = be_current_service();
$args    = array( 'service' => $service );

$notices = array();
set_error_handler( function ( $number, $message ) use ( &$notices ) {
	$notices[] = $message;
	return true;
} );

ob_start();
include $theme_dir . '/template-parts/services/features.php';
include $theme_dir . '/template-parts/services/steps.php';
include $theme_dir . '/template-parts/services/faq.php';
$html = ob_get_clean();

restore_error_handler();

check( substr_count( $html, 'class="ic rv"' ) === 6, 'features render from defaults when ACF returns false' );
check( substr_count( $html, 'class="st rv"' ) === 4, 'steps render from defaults when ACF returns false' );
check( substr_count( $html, '<div class="q' ) === 6, 'FAQ renders from defaults when ACF returns false' );
check( empty( $notices ), 'unset ACF options raise no PHP warnings: ' . implode( ' | ', $notices ) );

unset( $GLOBALS['be_test']['values']['options'] );
be_clear_services_cache();

check( isset( $GLOBALS['be_test']['shortcodes']['be_service_types'] ), 'the [be_service_types] shortcode is registered' );

/* --- SEO --- */

$ld = be_service_json_ld( $service );
check( isset( $ld['@context'] ) && $ld['@type'] === 'Service', 'JSON-LD describes a Service' );
check( isset( $ld['offers'] ) && count( $ld['offers'] ) === 3, 'JSON-LD has one Offer per package' );
check( $ld['offers'][0]['priceCurrency'] === 'EGP', 'JSON-LD offers use EGP' );
check( $ld['offers'][0]['price'] === 7000, 'JSON-LD prices use the service price values' );

check( isset( $GLOBALS['be_test']['filters']['document_title_parts'] ), 'document title is derived from the service' );
check( isset( $GLOBALS['be_test']['actions']['wp_head'] ), 'meta description is printed on the services pages' );

/* --- Assets --- */

$GLOBALS['be_test']['query_vars']['be_active'] = 'law';
be_services_enqueue_assets();
check( isset( $GLOBALS['be_test']['enqueued']['be-services'] ), 'services.js is enqueued on a services page' );
check( isset( $GLOBALS['be_test']['inline']['be-services'] ) && strpos( $GLOBALS['be_test']['inline']['be-services'], 'BE_SERVICES' ) !== false, 'services data is passed to the browser as inline JSON' );

if ( $failures ) {
	echo count( $failures ) . ' test(s) failed.' . PHP_EOL;
	exit( 1 );
}

echo 'All services tests passed.' . PHP_EOL;
