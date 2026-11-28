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

$page = isset( $GLOBALS['ebdaa_test']['options_pages']['about'] ) ? $GLOBALS['ebdaa_test']['options_pages']['about'] : array();

check( isset( $page['page_title'] ) && $page['page_title'] === 'About', 'options page title is About' );
check( isset( $page['menu_title'] ) && $page['menu_title'] === 'من نحن', 'options page appears in the admin sidebar as من نحن' );
check( isset( $page['menu_slug'] ) && $page['menu_slug'] === 'about', 'options page slug is about' );
check( isset( $page['redirect'] ) && $page['redirect'] === false, 'options page opens its own settings screen' );

$group = isset( $GLOBALS['ebdaa_test']['field_groups']['About'] ) ? $GLOBALS['ebdaa_test']['field_groups']['About'] : array();

check( is_array( $group ) && ! empty( $group ), 'About field group is registered' );
check( isset( $group['title'] ) && $group['title'] === 'About', 'field group is titled About' );

$names = isset( $group['fields'] ) ? array_column( $group['fields'], 'name' ) : array();

$expected_fields = array(
	'about_tag',
	'about_title',
	'about_description',
	'about_button_label',
	'about_button_link',
	'about_stat_1_number',
	'about_stat_1_suffix',
	'about_stat_1_label',
	'about_stat_2_number',
	'about_stat_2_suffix',
	'about_stat_2_label',
	'about_stat_3_number',
	'about_stat_3_suffix',
	'about_stat_3_label',
	'about_cubes_image',
);

foreach ( $expected_fields as $name ) {
	check( in_array( $name, $names, true ), "field {$name} is registered" );
}

$fields_by_name = array();

foreach ( isset( $group['fields'] ) ? $group['fields'] : array() as $field ) {
	$fields_by_name[ $field['name'] ] = $field;
}

foreach ( array( 'about_tag', 'about_title', 'about_description', 'about_button_label', 'about_button_link' ) as $name ) {
	check(
		isset( $fields_by_name[ $name ]['type'] ) && in_array( $fields_by_name[ $name ]['type'], array( 'text', 'textarea' ), true ),
		"{$name} uses an editable text field"
	);
}

check(
	isset( $fields_by_name['about_cubes_image']['type'] ) && $fields_by_name['about_cubes_image']['type'] === 'image',
	'about_cubes_image uses the image upload field, not a path text field'
);
check(
	isset( $fields_by_name['about_cubes_image']['return_format'] ) && $fields_by_name['about_cubes_image']['return_format'] === 'url',
	'about_cubes_image returns the uploaded image URL'
);
check(
	isset( $fields_by_name['about_cubes_image'] ) && ! array_key_exists( 'default_value', $fields_by_name['about_cubes_image'] ),
	'about_cubes_image has no hardcoded path default'
);

$location = isset( $group['location'][0][0] ) ? $group['location'][0][0] : array();

check(
	isset( $location['param'], $location['value'] ) && $location['param'] === 'options_page' && $location['value'] === 'about',
	'field group is attached to the About options page'
);

$GLOBALS['ebdaa_test']['values'] = array(
	'about_tag'            => 'TEST tag',
	'about_title'          => 'TEST title',
	'about_description'    => 'TEST description',
	'about_button_label'   => 'TEST button',
	'about_button_link'    => '#test-button',
	'about_stat_1_number'  => '111',
	'about_stat_1_suffix'  => '+',
	'about_stat_1_label'   => 'TEST stat 1',
	'about_stat_2_number'  => '222',
	'about_stat_2_suffix'  => 'k',
	'about_stat_2_label'   => 'TEST stat 2',
	'about_stat_3_number'  => '333',
	'about_stat_3_suffix'  => '%',
	'about_stat_3_label'   => 'TEST stat 3',
	'about_cubes_image'    => 'https://example.test/wp-content/uploads/2026/11/uploaded-cubes.webp',
);

ob_start();
include $theme_dir . '/template-parts/about.php';
$html = ob_get_clean();

foreach ( $GLOBALS['ebdaa_test']['values'] as $value ) {
	check( strpos( $html, $value ) !== false, "about template renders option value {$value}" );
}

check( count( $GLOBALS['ebdaa_test']['post_ids'] ) === count( $expected_fields ), 'about template reads every field from the options page' );
check(
	count( array_filter( $GLOBALS['ebdaa_test']['selectors'], function ( $selector ) {
		return strpos( $selector, 'field_' ) === 0;
	} ) ) === count( $expected_fields ),
	'about template resolves fields by their ACF keys'
);
check(
	count( array_unique( $GLOBALS['ebdaa_test']['post_ids'] ) ) === 1 && $GLOBALS['ebdaa_test']['post_ids'][0] === 'options',
	'about template resolves fields with the options post id'
);
check( strpos( $html, 'من نحن' ) === false, 'about tag is no longer hardcoded' );
check( strpos( $html, 'شريكك الرقمي للنجاح' ) === false, 'about title is no longer hardcoded' );
check( strpos( $html, 'data-n="111" data-s="+"' ) !== false, 'stat 1 number and suffix come from the options' );
check( strpos( $html, 'data-n="333" data-s="%"' ) !== false, 'stat 3 number and suffix come from the options' );
check(
	strpos( $html, 'src="https://example.test/wp-content/uploads/2026/11/uploaded-cubes.webp"' ) !== false,
	'about template uses the uploaded cubes image as the img src'
);
check( strpos( $html, 'class="wrap about"' ) !== false, 'about template keeps the original layout classes' );
check( strpos( $html, 'class="cubes rv"' ) !== false, 'about template keeps the decorative cubes class' );

$GLOBALS['ebdaa_test']['post_ids']  = array();
$GLOBALS['ebdaa_test']['selectors'] = array();
$GLOBALS['ebdaa_test']['values']    = array( 'about_title' => '<script>alert(1)</script>' );

ob_start();
include $theme_dir . '/template-parts/about.php';
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
include $theme_dir . '/template-parts/about.php';
$default_html = ob_get_clean();

foreach ( array(
	'من نحن',
	'شريكك الرقمي للنجاح',
	'في إبداع نؤمن بأن التكنولوجيا هي مفتاح النمو',
	'تجربة مستخدم استثنائية.',
	'اعرف المزيد ←',
	'#contact',
	'data-n="150"',
	'عميل سعيد',
	'data-n="250"',
	'مشروع ناجح',
	'data-n="98" data-s="%"',
	'رضا عملائنا',
) as $text ) {
	check( strpos( $default_html, $text ) !== false, "default option value preserves original content: {$text}" );
}

$index_source = file_get_contents( $theme_dir . '/index.php' );

check( strpos( $index_source, 'template-parts/about"' ) !== false, 'front page loads the option-backed about template part' );
check( strpos( $index_source, 'template-parts/aboutus' ) === false, 'front page no longer loads the hardcoded about template part' );

if ( $failures ) {
	echo count( $failures ) . ' test(s) failed.' . PHP_EOL;
	exit( 1 );
}

echo 'All about option tests passed.' . PHP_EOL;
