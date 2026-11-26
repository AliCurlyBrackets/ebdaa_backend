<?php
/*
Template Name: Services
*/

get_header();

$service = be_current_service();

if ( ! $service ) {
	get_footer();
	return;
}

set_query_var( 'be_active', $service['slug'] );
$args = array( 'service' => $service );

get_template_part( 'template-parts/services/hero', '', $args );
get_template_part( 'template-parts/services/filter-pills', '', $args );
get_template_part( 'template-parts/services/features', '', $args );
get_template_part( 'template-parts/services/steps', '', $args );
get_template_part( 'template-parts/services/types-grid', '', array( 'service' => $service, 'wrapper' => 'pw' ) );
get_template_part( 'template-parts/services/pricing', '', $args );
get_template_part( 'template-parts/services/faq', '', $args );
get_template_part( 'template-parts/services/cta', '', $args );

get_footer();
