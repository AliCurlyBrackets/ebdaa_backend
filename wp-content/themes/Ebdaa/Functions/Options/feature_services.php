<?php

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		array(
			'page_title' => 'Feature Services',
			'menu_title' => 'Feature Services',
			'menu_slug'  => 'feature-services',
			'capability' => 'edit_posts',
			'redirect'   => false,
			'icon_url'   => 'dashicons-admin-customizer',
			'position'   => 4,
		)
	);
}

if ( function_exists( 'acf_add_local_field_group' ) ) {
	acf_add_local_field_group(
		array(
			'key'                   => 'group_feature_services',
			'title'                 => 'Feature Services',
			'fields'                => array(
				array(
					'key'           => 'field_feature_services_tag',
					'label'         => 'Section tag',
					'name'          => 'feature_services_tag',
					'type'          => 'text',
					'default_value' => 'مميزات خدماتنا',
				),
				array(
					'key'           => 'field_feature_services_title',
					'label'         => 'Section title',
					'name'          => 'feature_services_title',
					'type'          => 'text',
					'default_value' => 'حلول مصممة خصيصاً لنجاحك',
				),
				array(
					'key'           => 'field_feature_services_card_1_title',
					'label'         => 'Card 1 title',
					'name'          => 'feature_services_card_1_title',
					'type'          => 'text',
					'default_value' => 'دعم فني احترافي',
				),
				array(
					'key'           => 'field_feature_services_card_1_description',
					'label'         => 'Card 1 description',
					'name'          => 'feature_services_card_1_description',
					'type'          => 'text',
					'default_value' => 'مساعدتك دائماً في كل خطوة',
				),
				array(
					'key'           => 'field_feature_services_card_2_title',
					'label'         => 'Card 2 title',
					'name'          => 'feature_services_card_2_title',
					'type'          => 'text',
					'default_value' => 'أداء فائق السرعة',
				),
				array(
					'key'           => 'field_feature_services_card_2_description',
					'label'         => 'Card 2 description',
					'name'          => 'feature_services_card_2_description',
					'type'          => 'text',
					'default_value' => 'مواقع سريعة وتجربة أفضل',
				),
				array(
					'key'           => 'field_feature_services_card_3_title',
					'label'         => 'Card 3 title',
					'name'          => 'feature_services_card_3_title',
					'type'          => 'text',
					'default_value' => 'تصميم متجاوب',
				),
				array(
					'key'           => 'field_feature_services_card_3_description',
					'label'         => 'Card 3 description',
					'name'          => 'feature_services_card_3_description',
					'type'          => 'text',
					'default_value' => 'مظهر مثالي على جميع الأجهزة',
				),
				array(
					'key'           => 'field_feature_services_card_4_title',
					'label'         => 'Card 4 title',
					'name'          => 'feature_services_card_4_title',
					'type'          => 'text',
					'default_value' => 'إمكانيات مخصصة',
				),
				array(
					'key'           => 'field_feature_services_card_4_description',
					'label'         => 'Card 4 description',
					'name'          => 'feature_services_card_4_description',
					'type'          => 'text',
					'default_value' => 'حلول مرنة تناسب احتياجك',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'feature-services',
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
