<?php

if ( function_exists( 'acf_add_local_field_group' ) ) {
	acf_add_local_field_group(
		array(
			'key'    => 'group_be_service',
			'title'  => 'Service',
			'fields' => array(
				array(
					'key'           => 'field_be_show_in_grid',
					'label'         => 'Show in project types grid',
					'name'          => 'show_in_grid',
					'type'          => 'true_false',
					'default_value' => 1,
				),
				array(
					'key'  => 'field_be_card_label',
					'label' => 'Card label',
					'name'  => 'card_label',
					'type'  => 'text',
				),
				array(
					'key'  => 'field_be_hero_badge',
					'label' => 'Hero badge',
					'name'  => 'hero_badge',
					'type'  => 'text',
				),
				array(
					'key'  => 'field_be_hero_title',
					'label' => 'Hero title',
					'name'  => 'hero_title',
					'type'  => 'text',
				),
				array(
					'key'  => 'field_be_hero_description',
					'label' => 'Hero description',
					'name'  => 'hero_description',
					'type'  => 'textarea',
				),
				array(
					'key'           => 'field_be_hero_image',
					'label'         => 'Hero image',
					'name'          => 'hero_image',
					'type'          => 'image',
					'return_format' => 'url',
					'preview_size'  => 'medium',
					'library'       => 'all',
				),
				array(
					'key'        => 'field_be_hero_chips',
					'label'      => 'Hero chips',
					'name'       => 'hero_chips',
					'type'       => 'repeater',
					'sub_fields' => array(
						array(
							'key'  => 'field_be_hero_chip_text',
							'label' => 'Text',
							'name' => 'text',
							'type' => 'text',
						),
					),
				),
				array(
					'key'        => 'field_be_packages',
					'label'      => 'Packages',
					'name'       => 'packages',
					'type'       => 'repeater',
					'min'        => 1,
					'max'        => 6,
					'sub_fields' => array(
						array(
							'key'  => 'field_be_package_name',
							'label' => 'Name',
							'name' => 'name',
							'type' => 'text',
						),
						array(
							'key' => 'field_be_package_price',
							'label' => 'Price',
							'name' => 'price',
							'type' => 'number',
							'min' => 0,
						),
						array(
							'key'           => 'field_be_package_is_featured',
							'label'         => 'Featured',
							'name'          => 'is_featured',
							'type'          => 'true_false',
							'default_value' => 0,
						),
						array(
							'key'           => 'field_be_package_badge_text',
							'label'         => 'Badge text',
							'name'          => 'badge_text',
							'type'          => 'text',
							'default_value' => 'الأكثر طلباً',
						),
						array(
							'key'        => 'field_be_package_features',
							'label'      => 'Features',
							'name'       => 'features',
							'type'       => 'repeater',
							'sub_fields' => array(
								array(
									'key'  => 'field_be_package_feature_text',
									'label' => 'Text',
									'name' => 'text',
									'type' => 'text',
								),
							),
						),
						array(
							'key'           => 'field_be_package_cta_label',
							'label'         => 'CTA label',
							'name'          => 'cta_label',
							'type'          => 'text',
							'default_value' => 'اطلب الباقة',
						),
						array(
							'key'   => 'field_be_package_cta_url',
							'label' => 'CTA URL',
							'name'  => 'cta_url',
							'type'  => 'url',
						),
					),
				),
				array(
					'key'        => 'field_be_faq_override',
					'label'      => 'FAQ override',
					'name'       => 'faq_override',
					'type'       => 'repeater',
					'sub_fields' => array(
						array(
							'key'  => 'field_be_faq_q',
							'label' => 'Question',
							'name' => 'q',
							'type' => 'text',
						),
						array(
							'key'  => 'field_be_faq_a',
							'label' => 'Answer',
							'name' => 'a',
							'type' => 'textarea',
						),
					),
				),
			),
			'location'  => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'service',
					),
				),
			),
			'active'    => true,
		)
	);
}
