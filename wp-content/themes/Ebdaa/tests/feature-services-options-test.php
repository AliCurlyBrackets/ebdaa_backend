<?php

$theme_dir = dirname( __DIR__ );

$GLOBALS['ebdaa_test'] = array(
	'options_page'   => null,
	'options_pages'  => array(),
	'field_group'    => null,
	'field_groups'   => array(),
	'values'         => array(),
	'actions'        => array(),
	'post_ids'       => array(),
	'selectors'      => array(),
);

function add_action( $hook, $callback ) {
	$GLOBALS['ebdaa_test']['actions'][ $hook ][] = $callback;
}

function acf_add_options_page( $args ) {
	if ( null === $GLOBALS['ebdaa_test']['options_page'] ) {
		$GLOBALS['ebdaa_test']['options_page'] = $args;
	}

	$GLOBALS['ebdaa_test']['options_pages'][ $args['menu_slug'] ] = $args;
}

function acf_add_local_field_group( $args ) {
	if ( null === $GLOBALS['ebdaa_test']['field_group'] ) {
		$GLOBALS['ebdaa_test']['field_group'] = $args;
	}

	$GLOBALS['ebdaa_test']['field_groups'][ $args['title'] ] = $args;
}

function get_field( $selector, $post_id = false ) {
	$GLOBALS['ebdaa_test']['post_ids'][]  = $post_id;
	$GLOBALS['ebdaa_test']['selectors'][] = $selector;

	$name = strpos( $selector, 'field_' ) === 0 ? substr( $selector, strlen( 'field_' ) ) : $selector;

	return array_key_exists( $name, $GLOBALS['ebdaa_test']['values'] ) ? $GLOBALS['ebdaa_test']['values'][ $name ] : null;
}

function esc_html( $value ) {
	return htmlspecialchars( (string) $value, ENT_QUOTES, 'UTF-8' );
}

require $theme_dir . '/functions.php';

$failures = array();

function check( $condition, $message ) {
	global $failures;

	if ( ! $condition ) {
		$failures[] = $message;
	}

	echo ( $condition ? 'PASS ' : 'FAIL ' ) . $message . PHP_EOL;
}

$page = isset( $GLOBALS['ebdaa_test']['options_pages']['feature-services'] ) ? $GLOBALS['ebdaa_test']['options_pages']['feature-services'] : array();

check( count( $GLOBALS['ebdaa_test']['options_pages'] ) === 5, 'functions.php registers the Hero Section, Feature Services, About, Services and Clients options pages' );
check( isset( $page['page_title'] ) && $page['page_title'] === 'Feature Services', 'options page title is Feature Services' );
check( isset( $page['menu_title'] ) && $page['menu_title'] === 'Feature Services', 'options page appears in the admin sidebar as Feature Services' );
check( isset( $page['menu_slug'] ) && $page['menu_slug'] === 'feature-services', 'options page slug is feature-services' );
check( isset( $page['redirect'] ) && $page['redirect'] === false, 'options page opens its own settings screen' );

$group = isset( $GLOBALS['ebdaa_test']['field_groups']['Feature Services'] ) ? $GLOBALS['ebdaa_test']['field_groups']['Feature Services'] : array();

check( is_array( $group ) && ! empty( $group ), 'Feature Services field group is registered' );
check( isset( $group['title'] ) && $group['title'] === 'Feature Services', 'field group is titled Feature Services' );

$names = isset( $group['fields'] ) ? array_column( $group['fields'], 'name' ) : array();

foreach ( array(
	'feature_services_tag',
	'feature_services_title',
	'feature_services_card_1_title',
	'feature_services_card_1_description',
	'feature_services_card_2_title',
	'feature_services_card_2_description',
	'feature_services_card_3_title',
	'feature_services_card_3_description',
	'feature_services_card_4_title',
	'feature_services_card_4_description',
) as $name ) {
	check( in_array( $name, $names, true ), "field {$name} is registered" );
}

foreach ( isset( $group['fields'] ) ? $group['fields'] : array() as $field ) {
	check(
		isset( $field['type'] ) && $field['type'] === 'text',
		"{$field['name']} uses an editable text field"
	);
}

$location = isset( $group['location'][0][0] ) ? $group['location'][0][0] : array();

check(
	isset( $location['param'], $location['value'] ) && $location['param'] === 'options_page' && $location['value'] === 'feature-services',
	'field group is attached to the Feature Services options page'
);

$GLOBALS['ebdaa_test']['values'] = array(
	'feature_services_tag'                  => 'TEST tag',
	'feature_services_title'                => 'TEST title',
	'feature_services_card_1_title'         => 'TEST card 1 title',
	'feature_services_card_1_description'   => 'TEST card 1 description',
	'feature_services_card_2_title'         => 'TEST card 2 title',
	'feature_services_card_2_description'   => 'TEST card 2 description',
	'feature_services_card_3_title'         => 'TEST card 3 title',
	'feature_services_card_3_description'   => 'TEST card 3 description',
	'feature_services_card_4_title'         => 'TEST card 4 title',
	'feature_services_card_4_description'   => 'TEST card 4 description',
);

ob_start();
include $theme_dir . '/template-parts/feature-services.php';
$html = ob_get_clean();

foreach ( $GLOBALS['ebdaa_test']['values'] as $value ) {
	check( strpos( $html, $value ) !== false, "feature services template renders option value {$value}" );
}

check( count( $GLOBALS['ebdaa_test']['post_ids'] ) === 10, 'feature services template reads every field from the options page' );
check(
	count( array_filter( $GLOBALS['ebdaa_test']['selectors'], function ( $selector ) {
		return strpos( $selector, 'field_' ) === 0;
	} ) ) === 10,
	'feature services template resolves fields by their ACF keys'
);
check(
	count( array_unique( $GLOBALS['ebdaa_test']['post_ids'] ) ) === 1 && $GLOBALS['ebdaa_test']['post_ids'][0] === 'options',
	'feature services template resolves fields with the options post id'
);
check( strpos( $html, 'مميزات خدماتنا' ) === false, 'feature services tag is no longer hardcoded' );
check( strpos( $html, 'حلول مصممة خصيصاً لنجاحك' ) === false, 'feature services title is no longer hardcoded' );
check( strpos( $html, 'TEST card 4 description' ) !== false, 'the fourth feature card is backed by its option' );

$GLOBALS['ebdaa_test']['post_ids']  = array();
$GLOBALS['ebdaa_test']['selectors'] = array();
$GLOBALS['ebdaa_test']['values']    = array( 'feature_services_title' => '<script>alert(1)</script>' );

ob_start();
include $theme_dir . '/template-parts/feature-services.php';
$escaped_html = ob_get_clean();

check( strpos( $escaped_html, '&lt;script&gt;' ) !== false, 'option values are escaped before rendering' );
check( strpos( $escaped_html, '<script>' ) === false, 'option values cannot inject markup into the template' );

$defaults = array();

foreach ( isset( $group['fields'] ) ? $group['fields'] : array() as $field ) {
	if ( array_key_exists( 'default_value', $field ) ) {
		$defaults[ $field['name'] ] = $field['default_value'];
	}
}

$GLOBALS['ebdaa_test']['values'] = $defaults;

ob_start();
include $theme_dir . '/template-parts/feature-services.php';
$default_html = ob_get_clean();

foreach ( array(
	'مميزات خدماتنا',
	'حلول مصممة خصيصاً لنجاحك',
	'دعم فني احترافي',
	'مساعدتك دائماً في كل خطوة',
	'أداء فائق السرعة',
	'مواقع سريعة وتجربة أفضل',
	'تصميم متجاوب',
	'مظهر مثالي على جميع الأجهزة',
	'إمكانيات مخصصة',
	'حلول مرنة تناسب احتياجك',
) as $text ) {
	check( strpos( $default_html, $text ) !== false, "default option value preserves original content: {$text}" );
}

if ( $failures ) {
	echo count( $failures ) . ' test(s) failed.' . PHP_EOL;
	exit( 1 );
}

echo 'All feature services option tests passed.' . PHP_EOL;
