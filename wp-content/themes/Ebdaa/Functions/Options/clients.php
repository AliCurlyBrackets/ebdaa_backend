<?php

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		array(
			'page_title' => 'Clients',
			'menu_title' => 'عملاؤنا',
			'menu_slug'  => 'clients',
			'capability' => 'edit_posts',
			'redirect'   => false,
			'icon_url'   => 'dashicons-admin-customizer',
			'position'   => 7,
		)
	);
}

if ( function_exists( 'acf_add_local_field_group' ) ) {
	acf_add_local_field_group(
		array(
			'key'                   => 'group_clients',
			'title'                 => 'Clients',
			'fields'                => array(
				array(
					'key'           => 'field_clients_tag',
					'label'         => 'Section tag',
					'name'          => 'clients_tag',
					'type'          => 'text',
					'default_value' => 'عملاؤنا',
				),
				array(
					'key'           => 'field_clients_title',
					'label'         => 'Section title',
					'name'          => 'clients_title',
					'type'          => 'text',
					'default_value' => 'نفخر بالعمل مع أفضل العملاء',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'clients',
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
