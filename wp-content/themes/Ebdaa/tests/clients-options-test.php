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

$page = isset( $GLOBALS['ebdaa_test']['options_pages']['clients'] ) ? $GLOBALS['ebdaa_test']['options_pages']['clients'] : array();

check( isset( $page['page_title'] ) && $page['page_title'] === 'Clients', 'options page title is Clients' );
check( isset( $page['menu_title'] ) && $page['menu_title'] === 'عملاؤنا', 'options page appears in the admin sidebar as عملاؤنا' );
check( isset( $page['menu_slug'] ) && $page['menu_slug'] === 'clients', 'options page slug is clients' );
check( isset( $page['redirect'] ) && $page['redirect'] === false, 'options page opens its own settings screen' );

$group = isset( $GLOBALS['ebdaa_test']['field_groups']['Clients'] ) ? $GLOBALS['ebdaa_test']['field_groups']['Clients'] : array();

check( is_array( $group ) && ! empty( $group ), 'Clients field group is registered' );
check( isset( $group['title'] ) && $group['title'] === 'Clients', 'field group is titled Clients' );

$names = isset( $group['fields'] ) ? array_column( $group['fields'], 'name' ) : array();

foreach ( array( 'clients_tag', 'clients_title' ) as $name ) {
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
	isset( $location['param'], $location['value'] ) && $location['param'] === 'options_page' && $location['value'] === 'clients',
	'field group is attached to the Clients options page'
);

$GLOBALS['ebdaa_test']['values'] = array(
	'clients_tag'   => 'TEST tag',
	'clients_title' => 'TEST title',
);

ob_start();
include $theme_dir . '/template-parts/clients.php';
$html = ob_get_clean();

foreach ( $GLOBALS['ebdaa_test']['values'] as $value ) {
	check( strpos( $html, $value ) !== false, "clients template renders option value {$value}" );
}

check( count( $GLOBALS['ebdaa_test']['post_ids'] ) === 2, 'clients template reads every field from the options page' );
check(
	count( array_filter( $GLOBALS['ebdaa_test']['selectors'], function ( $selector ) {
		return strpos( $selector, 'field_' ) === 0;
	} ) ) === 2,
	'clients template resolves fields by their ACF keys'
);
check(
	count( array_unique( $GLOBALS['ebdaa_test']['post_ids'] ) ) === 1 && $GLOBALS['ebdaa_test']['post_ids'][0] === 'options',
	'clients template resolves fields with the options post id'
);
check( strpos( $html, 'عملاؤنا' ) === false, 'clients tag is no longer hardcoded' );
check( strpos( $html, 'نفخر بالعمل مع أفضل العملاء' ) === false, 'clients title is no longer hardcoded' );
check( strpos( $html, 'id="mt"' ) !== false, 'clients template keeps the marquee container' );

$GLOBALS['ebdaa_test']['post_ids']  = array();
$GLOBALS['ebdaa_test']['selectors'] = array();
$GLOBALS['ebdaa_test']['values']    = array( 'clients_title' => '<script>alert(1)</script>' );

ob_start();
include $theme_dir . '/template-parts/clients.php';
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
include $theme_dir . '/template-parts/clients.php';
$default_html = ob_get_clean();

foreach ( array(
	'عملاؤنا',
	'نفخر بالعمل مع أفضل العملاء',
) as $text ) {
	check( strpos( $default_html, $text ) !== false, "default option value preserves original content: {$text}" );
}

$index_source = file_get_contents( $theme_dir . '/index.php' );

check( strpos( $index_source, 'template-parts/clients"' ) !== false, 'front page loads the option-backed clients template part' );

if ( $failures ) {
	echo count( $failures ) . ' test(s) failed.' . PHP_EOL;
	exit( 1 );
}

echo 'All clients option tests passed.' . PHP_EOL;
