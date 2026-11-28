<?php

function be_option_defaults() {
	return array(
		'included_feature' => 'دومين واستضافة مجاناً لأول سنة',
		'currency_label'   => 'ج.م',
		'pricing_note'     => 'جميع الباقات تشمل الدومين والاستضافة مجاناً لأول سنة. الأسعار الظاهرة نقطة بداية وقد تختلف حسب متطلبات مشروعك.',
		'cta_url'          => '',
		'global_features'  => array(
			array(
				'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18"/></svg>',
				'image' => '',
				'title' => 'دومين مجاني',
				'text'  => 'اسم موقعك .com على حسابنا لأول سنة.',
			),
			array(
				'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="6" rx="1.5"/><rect x="3" y="14" width="18" height="6" rx="1.5"/><path d="M7 7h.01M7 17h.01"/></svg>',
				'image' => '',
				'title' => 'استضافة سريعة مجاناً',
				'text'  => 'خوادم قوية وسرعة تحميل عالية بدون رسوم إضافية.',
			),
			array(
				'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z"/><path d="M9 12l2 2 4-4"/></svg>',
				'image' => '',
				'title' => 'شهادة SSL وحماية',
				'text'  => 'موقع آمن بقفل HTTPS ونسخ احتياطي دوري.',
			),
			array(
				'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="14" height="10" rx="1.5"/><rect x="14" y="9" width="8" height="12" rx="1.5"/></svg>',
				'image' => '',
				'title' => 'تصميم متجاوب',
				'text'  => 'يظهر بشكل مثالي على الموبايل والتابلت والكمبيوتر.',
			),
			array(
				'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"/><path d="M20 20l-4-4"/></svg>',
				'image' => '',
				'title' => 'تهيئة لمحركات البحث',
				'text'  => 'هيكل وسرعة صديقة لـ SEO ليسهل الوصول إليك.',
			),
			array(
				'icon'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14v-2a8 8 0 0116 0v2"/><rect x="3" y="14" width="4" height="6" rx="1.5"/><rect x="17" y="14" width="4" height="6" rx="1.5"/></svg>',
				'image' => '',
				'title' => 'دعم فني بعد التسليم',
				'text'  => 'نكون معك بعد الإطلاق لأي تعديل أو استفسار.',
			),
		),
		'global_steps'    => array(
			array(
				'title' => 'الاستشارة',
				'text'  => 'نفهم نشاطك وأهدافك ونحدد الصفحات المطلوبة.',
			),
			array(
				'title' => 'التصميم',
				'text'  => 'نعرض عليك تصميماً بهوية علامتك قبل البدء.',
			),
			array(
				'title' => 'التطوير',
				'text'  => 'نبرمج الموقع ونربط الدومين والاستضافة.',
			),
			array(
				'title' => 'الإطلاق والدعم',
				'text'  => 'نطلق موقعك ونتابعه معك بدعم مستمر.',
			),
		),
		'global_faq'      => array(
			array(
				'q' => 'هل الدومين والاستضافة مجاناً فعلاً؟',
				'a' => 'نعم، الدومين والاستضافة على حسابنا لأول سنة في جميع الباقات، وبعدها تجدد بسعر التكلفة المعلن.',
			),
			array(
				'q' => 'كم يستغرق تنفيذ الموقع؟',
				'a' => 'من أسبوعين إلى 6 أسابيع حسب حجم المشروع والباقة، ونتفق على جدول زمني واضح من البداية.',
			),
			array(
				'q' => 'هل أقدر أعدّل المحتوى بنفسي؟',
				'a' => 'نعم، نوفر لوحة تحكم سهلة لتعديل النصوص والصور بدون خبرة برمجية (في الباقتين الاحترافية والمتقدمة).',
			),
			array(
				'q' => 'هل الموقع يعمل على الموبايل؟',
				'a' => 'كل مواقعنا متجاوبة وتظهر بشكل مثالي على جميع الأجهزة.',
			),
			array(
				'q' => 'هل في دعم فني بعد التسليم؟',
				'a' => 'كل باقة فيها فترة دعم مجانية، وبعدها تقدر تجدد بخطة صيانة شهرية أو سنوية.',
			),
			array(
				'q' => 'هل يمكن ترقية الباقة لاحقاً؟',
				'a' => 'أكيد، تقدر تنتقل لباقة أعلى في أي وقت وتدفع الفرق فقط.',
			),
		),
		'types_section'   => array(
			'tag'        => 'أنواع المشاريع',
			'title'      => 'خبرات في مختلف المجالات',
			'side_image' => get_template_directory_uri() . '/assets/img/laptop.webp',
		),
		'final_cta'       => array(
			'title'  => 'جاهز تبدأ بـ 3,000 جنيه؟',
			'text'   => 'والاستضافة والدومين علينا. كلمنا النهاردة ونرد عليك خلال 24 ساعة.',
			'button' => 'تواصل معنا الآن ←',
		),
	);
}

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		array(
			'page_title' => 'إعدادات الخدمات',
			'menu_title' => 'إعدادات الخدمات',
			'menu_slug'  => 'be-services',
			'capability' => 'edit_posts',
			'redirect'   => false,
			'icon_url'   => 'dashicons-admin-customizer',
			'position'   => 5,
		)
	);
}

if ( function_exists( 'acf_add_local_field_group' ) ) {
	acf_add_local_field_group(
		array(
			'key'    => 'group_be_services_settings',
			'title'  => 'Services Settings',
			'fields' => array(
				array(
					'key'           => 'field_be_included_feature',
					'label'         => 'Included feature',
					'name'          => 'included_feature',
					'type'          => 'text',
					'default_value' => 'دومين واستضافة مجاناً لأول سنة',
				),
				array(
					'key'           => 'field_be_currency_label',
					'label'         => 'Currency label',
					'name'          => 'currency_label',
					'type'          => 'text',
					'default_value' => 'ج.م',
				),
				array(
					'key'           => 'field_be_pricing_note',
					'label'         => 'Pricing note',
					'name'          => 'pricing_note',
					'type'          => 'textarea',
					'default_value' => 'جميع الباقات تشمل الدومين والاستضافة مجاناً لأول سنة. الأسعار الظاهرة نقطة بداية وقد تختلف حسب متطلبات مشروعك.',
				),
				array(
					'key'  => 'field_be_cta_url',
					'label' => 'CTA URL',
					'name'  => 'cta_url',
					'type'  => 'url',
				),
				array(
					'key'        => 'field_be_global_features',
					'label'      => 'ماذا يشمل موقعك',
					'name'       => 'global_features',
					'type'       => 'repeater',
					'sub_fields' => array(
						array(
							'key'           => 'field_be_global_feature_image',
							'label'         => 'Feature image',
							'name'          => 'image',
							'type'          => 'image',
							'return_format' => 'url',
							'preview_size'  => 'medium',
							'library'       => 'all',
						),
						array(
							'key'  => 'field_be_global_feature_icon',
							'label' => 'Icon SVG or emoji',
							'name' => 'icon',
							'type' => 'textarea',
						),
						array(
							'key'  => 'field_be_global_feature_title',
							'label' => 'Title',
							'name' => 'title',
							'type' => 'text',
						),
						array(
							'key'  => 'field_be_global_feature_text',
							'label' => 'Text',
							'name' => 'text',
							'type' => 'textarea',
						),
					),
				),
				array(
					'key'        => 'field_be_global_steps',
					'label'      => 'خطوات العمل',
					'name'       => 'global_steps',
					'type'       => 'repeater',
					'sub_fields' => array(
						array(
							'key'  => 'field_be_global_step_title',
							'label' => 'Title',
							'name' => 'title',
							'type' => 'text',
						),
						array(
							'key'  => 'field_be_global_step_text',
							'label' => 'Text',
							'name' => 'text',
							'type' => 'textarea',
						),
					),
				),
				array(
					'key'        => 'field_be_global_faq',
					'label'      => 'الأسئلة الشائعة',
					'name'       => 'global_faq',
					'type'       => 'repeater',
					'sub_fields' => array(
						array(
							'key'  => 'field_be_global_faq_q',
							'label' => 'Question',
							'name' => 'q',
							'type' => 'text',
						),
						array(
							'key'  => 'field_be_global_faq_a',
							'label' => 'Answer',
							'name' => 'a',
							'type' => 'textarea',
						),
					),
				),
				array(
					'key'        => 'field_be_types_section',
					'label'      => 'أنواع المشاريع',
					'name'       => 'types_section',
					'type'       => 'group',
					'sub_fields' => array(
						array(
							'key'  => 'field_be_types_tag',
							'label' => 'Tag',
							'name' => 'tag',
							'type' => 'text',
						),
						array(
							'key'  => 'field_be_types_title',
							'label' => 'Title',
							'name' => 'title',
							'type' => 'text',
						),
						array(
							'key'            => 'field_be_types_side_image',
							'label'          => 'Side image',
							'name'           => 'side_image',
							'type'           => 'image',
							'return_format'  => 'url',
						),
					),
				),
				array(
					'key'        => 'field_be_final_cta',
					'label'      => 'Final CTA',
					'name'       => 'final_cta',
					'type'       => 'group',
					'sub_fields' => array(
						array(
							'key'  => 'field_be_final_cta_title',
							'label' => 'Title',
							'name' => 'title',
							'type' => 'text',
						),
						array(
							'key'  => 'field_be_final_cta_text',
							'label' => 'Text',
							'name' => 'text',
							'type' => 'textarea',
						),
						array(
							'key'  => 'field_be_final_cta_button',
							'label' => 'Button',
							'name' => 'button',
							'type' => 'text',
						),
					),
				),
			),
			'location'  => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'be-services',
					),
				),
			),
			'active'    => true,
		)
	);
}

add_action( 'acf/save_post', 'be_clear_services_cache' );
