<?php

if ( ! function_exists( 'get_field' ) ) {
	function get_field( $selector, $post_id = false ) {
		return null;
	}
}

include("Functions/Style_Theme/style_theme.php");
include("Functions/Options/hero_section.php");
include("Functions/Options/feature_services.php");
include("Functions/Options/about.php");
include("inc/post-types/service.php");
include("inc/acf/service-fields.php");
include("inc/acf/options.php");
include("inc/services-data.php");

function be_add_post_thumbnails_support() {
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'be_add_post_thumbnails_support' );

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	include("inc/seed-services.php");
}

function be_services_acf_notice() {
	if ( function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	echo '<div class="notice notice-error"><p>' . esc_html__( 'Services settings require ACF PRO. Activate ACF PRO to manage services from the dashboard.', 'be' ) . '</p></div>';
}
add_action( 'admin_notices', 'be_services_acf_notice' );

function be_services_flush_rewrite() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'be_services_flush_rewrite' );

add_action( 'wp_enqueue_scripts', 'be_services_enqueue_assets' );
