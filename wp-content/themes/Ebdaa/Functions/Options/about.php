<?php

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		array(
			'page_title' => 'About',
			'menu_title' => 'من نحن',
			'menu_slug'  => 'about',
			'capability' => 'edit_posts',
			'redirect'   => false,
			'icon_url'   => 'dashicons-admin-customizer',
			'position'   => 6,
		)
	);
}

if ( function_exists( 'acf_add_local_field_group' ) ) {
	acf_add_local_field_group(
		array(
			'key'                   => 'group_about',
			'title'                 => 'About',
			'fields'                => array(
				array(
					'key'           => 'field_about_tag',
					'label'         => 'Section tag',
					'name'          => 'about_tag',
					'type'          => 'text',
					'default_value' => 'من نحن',
				),
				array(
					'key'           => 'field_about_title',
					'label'         => 'Section title',
					'name'          => 'about_title',
					'type'          => 'text',
					'default_value' => 'شريكك الرقمي للنجاح',
				),
				array(
					'key'           => 'field_about_description',
					'label'         => 'Description',
					'name'          => 'about_description',
					'type'          => 'textarea',
					'default_value' => 'في إبداع نؤمن بأن التكنولوجيا هي مفتاح النمو، ونساعدك على بناء حضور رقمي قوي من خلال حلول مبتكرة وتصميم احترافي وتجربة مستخدم استثنائية.',
				),
				array(
					'key'           => 'field_about_button_label',
					'label'         => 'Button label',
					'name'          => 'about_button_label',
					'type'          => 'text',
					'default_value' => 'اعرف المزيد ←',
				),
				array(
					'key'           => 'field_about_button_link',
					'label'         => 'Button link',
					'name'          => 'about_button_link',
					'type'          => 'text',
					'default_value' => '#contact',
				),
				array(
					'key'           => 'field_about_stat_1_number',
					'label'         => 'First statistic number',
					'name'          => 'about_stat_1_number',
					'type'          => 'number',
					'default_value' => 150,
				),
				array(
					'key'           => 'field_about_stat_1_suffix',
					'label'         => 'First statistic suffix',
					'name'          => 'about_stat_1_suffix',
					'type'          => 'text',
					'default_value' => '',
				),
				array(
					'key'           => 'field_about_stat_1_label',
					'label'         => 'First statistic label',
					'name'          => 'about_stat_1_label',
					'type'          => 'text',
					'default_value' => 'عميل سعيد',
				),
				array(
					'key'           => 'field_about_stat_2_number',
					'label'         => 'Second statistic number',
					'name'          => 'about_stat_2_number',
					'type'          => 'number',
					'default_value' => 250,
				),
				array(
					'key'           => 'field_about_stat_2_suffix',
					'label'         => 'Second statistic suffix',
					'name'          => 'about_stat_2_suffix',
					'type'          => 'text',
					'default_value' => '',
				),
				array(
					'key'           => 'field_about_stat_2_label',
					'label'         => 'Second statistic label',
					'name'          => 'about_stat_2_label',
					'type'          => 'text',
					'default_value' => 'مشروع ناجح',
				),
				array(
					'key'           => 'field_about_stat_3_number',
					'label'         => 'Third statistic number',
					'name'          => 'about_stat_3_number',
					'type'          => 'number',
					'default_value' => 98,
				),
				array(
					'key'           => 'field_about_stat_3_suffix',
					'label'         => 'Third statistic suffix',
					'name'          => 'about_stat_3_suffix',
					'type'          => 'text',
					'default_value' => '%',
				),
				array(
					'key'           => 'field_about_stat_3_label',
					'label'         => 'Third statistic label',
					'name'          => 'about_stat_3_label',
					'type'          => 'text',
					'default_value' => 'رضا عملائنا',
				),
				array(
					'key'           => 'field_about_cubes_image',
					'label'         => 'Cubes image',
					'name'          => 'about_cubes_image',
					'type'          => 'image',
					'return_format' => 'url',
					'preview_size'  => 'medium',
					'library'       => 'all',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'about',
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
