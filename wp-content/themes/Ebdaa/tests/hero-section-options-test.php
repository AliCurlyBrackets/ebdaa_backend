<?php

$theme_dir = dirname( __DIR__ );

$GLOBALS['ebdaa_test'] = array(
	'options_page'  => null,
	'options_pages' => array(),
	'field_group'   => null,
	'field_groups'  => array(),
	'values'        => array(),
	'actions'       => array(),
	'post_ids'      => array(),
	'selectors'     => array(),
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

function esc_attr( $value ) {
	return htmlspecialchars( (string) $value, ENT_QUOTES, 'UTF-8' );
}

function esc_url( $value ) {
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

$page = $GLOBALS['ebdaa_test']['options_page'] ? $GLOBALS['ebdaa_test']['options_page'] : array();

check( is_array( $GLOBALS['ebdaa_test']['options_page'] ), 'functions.php registers the Hero Section ACF options page' );
check( isset( $page['page_title'] ) && $page['page_title'] === 'Hero Section', 'options page title is Hero Section' );
check( isset( $page['menu_title'] ) && $page['menu_title'] === 'Hero Section', 'options page appears in the admin sidebar as Hero Section' );
check( isset( $page['menu_slug'] ) && $page['menu_slug'] === 'hero-section', 'options page slug is hero-section' );
check( isset( $page['redirect'] ) && $page['redirect'] === false, 'options page opens its own settings screen' );

$group = $GLOBALS['ebdaa_test']['field_group'] ? $GLOBALS['ebdaa_test']['field_group'] : array();

check( is_array( $GLOBALS['ebdaa_test']['field_group'] ), 'Hero Section field group is registered' );
check( isset( $group['title'] ) && $group['title'] === 'Hero Section', 'field group is titled Hero Section' );

$names = isset( $group['fields'] ) ? array_column( $group['fields'], 'name' ) : array();

foreach ( array(
	'hero_greeting',
	'hero_title',
	'hero_highlight',
	'hero_description',
	'hero_primary_label',
	'hero_primary_link',
	'hero_secondary_label',
	'hero_secondary_link',
	'hero_scroll_label',
	'hero_brush_image',
	'hero_person_image',
	'hero_person_alt',
) as $name ) {
	check( in_array( $name, $names, true ), "field {$name} is registered" );
}

$fields_by_name = array();

foreach ( $group['fields'] as $field ) {
	$fields_by_name[ $field['name'] ] = $field;
}

foreach ( array( 'hero_brush_image', 'hero_person_image' ) as $name ) {
	check(
		isset( $fields_by_name[ $name ]['type'] ) && $fields_by_name[ $name ]['type'] === 'image',
		"{$name} uses the image upload field, not a path text field"
	);
	check(
		isset( $fields_by_name[ $name ]['return_format'] ) && $fields_by_name[ $name ]['return_format'] === 'url',
		"{$name} returns the uploaded image URL"
	);
	check(
		! array_key_exists( 'default_value', $fields_by_name[ $name ] ),
		"{$name} has no hardcoded path default"
	);
}

$location = isset( $group['location'][0][0] ) ? $group['location'][0][0] : array();

check(
	isset( $location['param'], $location['value'] ) && $location['param'] === 'options_page' && $location['value'] === 'hero-section',
	'field group is attached to the Hero Section options page'
);

$GLOBALS['ebdaa_test']['values'] = array(
	'hero_greeting'        => 'TEST greeting',
	'hero_title'           => 'TEST title',
	'hero_highlight'       => 'TEST highlight',
	'hero_description'     => 'TEST description',
	'hero_primary_label'   => 'TEST primary',
	'hero_primary_link'    => '#test-primary',
	'hero_secondary_label' => 'TEST secondary',
	'hero_secondary_link'  => '#test-secondary',
	'hero_scroll_label'    => 'TEST scroll',
	'hero_brush_image'     => 'https://example.test/wp-content/uploads/2026/11/uploaded-brush.webp',
	'hero_person_image'    => 'https://example.test/wp-content/uploads/2026/11/uploaded-person.webp',
	'hero_person_alt'      => 'TEST alt',
);

ob_start();
include $theme_dir . '/template-parts/hero-section.php';
$html = ob_get_clean();

foreach ( $GLOBALS['ebdaa_test']['values'] as $value ) {
	check( strpos( $html, $value ) !== false, "hero template renders option value {$value}" );
}

check( count( $GLOBALS['ebdaa_test']['post_ids'] ) === 12, 'hero template reads every field from the options page' );
check(
	count( array_filter( $GLOBALS['ebdaa_test']['selectors'], function ( $selector ) {
		return strpos( $selector, 'field_' ) === 0;
	} ) ) === 12,
	'hero template resolves fields by their ACF keys'
);
check(
	count( array_unique( $GLOBALS['ebdaa_test']['post_ids'] ) ) === 1 && $GLOBALS['ebdaa_test']['post_ids'][0] === 'options',
	'hero template resolves fields with the options post id'
);
check( strpos( $html, 'مرحباً بك في إبداع' ) === false, 'hero greeting is no longer hardcoded' );
check( strpos( $html, '<span>TEST highlight</span>' ) !== false, 'highlighted headline text comes from the option' );
check(
	strpos( $html, 'src="https://example.test/wp-content/uploads/2026/11/uploaded-brush.webp"' ) !== false,
	'hero template uses the uploaded brush image as the img src'
);
check(
	strpos( $html, 'src="https://example.test/wp-content/uploads/2026/11/uploaded-person.webp"' ) !== false,
	'hero template uses the uploaded person image as the img src'
);

$defaults = array();

foreach ( $group['fields'] as $field ) {
	if ( array_key_exists( 'default_value', $field ) ) {
		$defaults[ $field['name'] ] = $field['default_value'];
	}
}

$GLOBALS['ebdaa_test']['values'] = $defaults;

ob_start();
include $theme_dir . '/template-parts/hero-section.php';
$default_html = ob_get_clean();

foreach ( array(
	'مرحباً بك في إبداع',
	'تحول أفكارك إلى',
	'مواقع استثنائية',
	'نقدم حلول رقمية متكاملة للشركات وأصحاب الخبرات، من مواقع تعريفية وبورتفوليو احترافية إلى منصات أعمال متطورة.',
	'▦ عرض البورتفوليو',
	'#works',
	'تواصل معنا ➤',
	'#contact',
	'اكتشف المزيد',
	'مطور ويب',
) as $text ) {
	check( strpos( $default_html, $text ) !== false, "default option value preserves original content: {$text}" );
}

if ( $failures ) {
	echo count( $failures ) . ' test(s) failed.' . PHP_EOL;
	exit( 1 );
}

echo 'All hero section option tests passed.' . PHP_EOL;
