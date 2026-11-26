<?php

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		array(
			'page_title' => 'Hero Section',
			'menu_title' => 'Hero Section',
			'menu_slug'  => 'hero-section',
			'capability' => 'edit_posts',
			'redirect'   => false,
			'icon_url'   => 'dashicons-admin-customizer',
			'position'   => 3,
		)
	);
}

if ( function_exists( 'acf_add_local_field_group' ) ) {
	acf_add_local_field_group(
		array(
			'key'                   => 'group_hero_section',
			'title'                 => 'Hero Section',
			'fields'                => array(
				array(
					'key'           => 'field_hero_greeting',
					'label'         => 'Greeting',
					'name'          => 'hero_greeting',
					'type'          => 'text',
					'default_value' => 'مرحباً بك في إبداع',
				),
				array(
					'key'           => 'field_hero_title',
					'label'         => 'Title',
					'name'          => 'hero_title',
					'type'          => 'text',
					'default_value' => 'تحول أفكارك إلى',
				),
				array(
					'key'           => 'field_hero_highlight',
					'label'         => 'Highlighted title',
					'name'          => 'hero_highlight',
					'type'          => 'text',
					'default_value' => 'مواقع استثنائية',
				),
				array(
					'key'           => 'field_hero_description',
					'label'         => 'Description',
					'name'          => 'hero_description',
					'type'          => 'textarea',
					'default_value' => 'نقدم حلول رقمية متكاملة للشركات وأصحاب الخبرات، من مواقع تعريفية وبورتفوليو احترافية إلى منصات أعمال متطورة.',
				),
				array(
					'key'           => 'field_hero_primary_label',
					'label'         => 'Primary button label',
					'name'          => 'hero_primary_label',
					'type'          => 'text',
					'default_value' => '▦ عرض البورتفوليو',
				),
				array(
					'key'           => 'field_hero_primary_link',
					'label'         => 'Primary button link',
					'name'          => 'hero_primary_link',
					'type'          => 'text',
					'default_value' => '#works',
				),
				array(
					'key'           => 'field_hero_secondary_label',
					'label'         => 'Secondary button label',
					'name'          => 'hero_secondary_label',
					'type'          => 'text',
					'default_value' => 'تواصل معنا ➤',
				),
				array(
					'key'           => 'field_hero_secondary_link',
					'label'         => 'Secondary button link',
					'name'          => 'hero_secondary_link',
					'type'          => 'text',
					'default_value' => '#contact',
				),
				array(
					'key'           => 'field_hero_scroll_label',
					'label'         => 'Scroll label',
					'name'          => 'hero_scroll_label',
					'type'          => 'text',
					'default_value' => 'اكتشف المزيد',
				),
				array(
					'key'           => 'field_hero_brush_image',
					'label'         => 'Brush image',
					'name'          => 'hero_brush_image',
					'type'          => 'image',
					'return_format' => 'url',
					'preview_size'  => 'medium',
					'library'       => 'all',
				),
				array(
					'key'           => 'field_hero_person_image',
					'label'         => 'Person image',
					'name'          => 'hero_person_image',
					'type'          => 'image',
					'return_format' => 'url',
					'preview_size'  => 'medium',
					'library'       => 'all',
				),
				array(
					'key'           => 'field_hero_person_alt',
					'label'         => 'Person image alt text',
					'name'          => 'hero_person_alt',
					'type'          => 'text',
					'default_value' => 'مطور ويب',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'hero-section',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'active'                => true,
		)
	);
}
