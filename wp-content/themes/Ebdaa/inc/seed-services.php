<?php

function be_seed_definitions() {
	return array(
		'realestate' => array(
			'title'            => 'العقارات',
			'card_label'       => 'العقارات',
			'menu_order'       => 1,
			'show_in_grid'     => true,
			'image'            => 'p1.webp',
			'hero_badge'       => '🏙️ باقات المواقع العقارية',
			'hero_title'       => 'موقعك العقاري الاحترافي',
			'hero_description' => 'اعرض وحداتك ومشاريعك بشكل جذاب مع بحث متقدم وتواصل مباشر مع المشترين.',
			'chips'            => array( 'دومين مجاني', 'استضافة مجانية', 'فلاتر بحث', 'خرائط الموقع' ),
			'packages'         => array(
				array(
					'name'     => 'وسيط عقاري',
					'price'    => 7000,
					'featured' => false,
					'features' => array( 'عرض حتى 50 وحدة', 'فلاتر بحث', 'نموذج حجز ومعاينة', 'دعم فني شهر' ),
				),
				array(
					'name'     => 'شركة عقارية',
					'price'    => 13000,
					'featured' => true,
					'features' => array( 'وحدات ومشاريع غير محدودة', 'خرائط وجولات صور', 'لوحة إدارة العملاء', 'دعم فني 3 شهور' ),
				),
				array(
					'name'     => 'مطور عقاري',
					'price'    => 24000,
					'featured' => false,
					'features' => array( 'صفحات مشاريع مخصصة', 'جولة افتراضية 360°', 'ربط CRM', 'دعم فني 12 شهر' ),
				),
			),
		),
		'law'        => array(
			'title'            => 'المحاماة',
			'card_label'       => 'المحاماة',
			'menu_order'       => 2,
			'show_in_grid'     => true,
			'image'            => 'p2.webp',
			'hero_badge'       => '⚖️ باقات مواقع المحاماة',
			'hero_title'       => 'موقع مكتبك القانوني',
			'hero_description' => 'حضور رقمي يعكس هيبة مكتبك ويسهل على العملاء طلب الاستشارات.',
			'chips'            => array( 'دومين مجاني', 'استضافة مجانية', 'حجز استشارات', 'مدونة قانونية' ),
			'packages'         => array(
				array(
					'name'     => 'محامٍ فردي',
					'price'    => 4500,
					'featured' => false,
					'features' => array( 'حتى 6 صفحات', 'صفحات مجالات الممارسة', 'نموذج طلب استشارة', 'دعم فني شهر' ),
				),
				array(
					'name'     => 'مكتب محاماة',
					'price'    => 8500,
					'featured' => true,
					'features' => array( 'حتى 12 صفحة', 'مدونة ومقالات قانونية', 'حجز مواعيد أونلاين', 'دعم فني 3 شهور' ),
				),
				array(
					'name'     => 'شركة محاماة',
					'price'    => 16000,
					'featured' => false,
					'features' => array( 'فريق وفروع متعددة', 'بوابة عملاء', 'لغتان وتحسين SEO', 'دعم فني 12 شهر' ),
				),
			),
		),
		'edu'        => array(
			'title'            => 'التعليم والكورسات',
			'card_label'       => 'التعليم والكورسات',
			'menu_order'       => 3,
			'show_in_grid'     => true,
			'image'            => 'p3.webp',
			'hero_badge'       => '🎓 باقات المنصات التعليمية',
			'hero_title'       => 'منصتك التعليمية الاحترافية',
			'hero_description' => 'منصة لعرض كورساتك وتسجيل الطلاب والدفع أونلاين بتجربة تعلم ممتازة.',
			'chips'            => array( 'دومين مجاني', 'استضافة مجانية', 'تسجيل ودفع', 'لوحة طلاب' ),
			'packages'         => array(
				array(
					'name'     => 'مدرّس',
					'price'    => 8000,
					'featured' => false,
					'features' => array( 'عرض حتى 10 كورسات', 'تسجيل ودفع أونلاين', 'لوحة تحكم', 'دعم فني شهر' ),
				),
				array(
					'name'     => 'أكاديمية',
					'price'    => 15000,
					'featured' => true,
					'features' => array( 'كورسات غير محدودة', 'فيديوهات واختبارات', 'شهادات إتمام', 'دعم فني 3 شهور' ),
				),
				array(
					'name'     => 'منصة متكاملة',
					'price'    => 30000,
					'featured' => false,
					'features' => array( 'عدة مدرّسين', 'لوحات طلاب ومدرّسين', 'تطبيق موبايل', 'دعم فني 12 شهر' ),
				),
			),
		),
		'stores'     => array(
			'title'            => 'المتاجر الإلكترونية',
			'card_label'       => 'المتاجر الإلكترونية',
			'menu_order'       => 4,
			'show_in_grid'     => true,
			'image'            => 'p4.webp',
			'hero_badge'       => '🛒 باقات المتاجر الإلكترونية',
			'hero_title'       => 'متجرك الإلكتروني الاحترافي',
			'hero_description' => 'ابدأ البيع أونلاين بمتجر سريع وسهل الإدارة، مع بوابات دفع وربط شحن.',
			'chips'            => array( 'دومين مجاني', 'استضافة مجانية', 'بوابات دفع', 'إدارة الطلبات' ),
			'packages'         => array(
				array(
					'name'     => 'انطلاق',
					'price'    => 6000,
					'featured' => false,
					'features' => array( 'حتى 50 منتج', 'دفع عند الاستلام + بطاقات', 'لوحة إدارة الطلبات', 'دعم فني شهر' ),
				),
				array(
					'name'     => 'نمو',
					'price'    => 12000,
					'featured' => true,
					'features' => array( 'حتى 500 منتج', 'ربط شركات الشحن', 'أكواد خصم وتقارير مبيعات', 'دعم فني 3 شهور' ),
				),
				array(
					'name'     => 'متقدم',
					'price'    => 25000,
					'featured' => false,
					'features' => array( 'منتجات غير محدودة', 'إدارة مخزون متعددة', 'ربط ERP وتطبيقات خارجية', 'دعم فني 12 شهر' ),
				),
			),
		),
		'companies'  => array(
			'title'            => 'الشركات',
			'card_label'       => 'الشركات',
			'menu_order'       => 5,
			'show_in_grid'     => true,
			'image'            => 'p5.webp',
			'hero_badge'       => '🏢 باقات مواقع الشركات',
			'hero_title'       => 'موقع شركتك الاحترافي',
			'hero_description' => 'واجهة رقمية تعكس قوة شركتك وتخدم عملاءك وشركاءك بمصداقية واحترافية.',
			'chips'            => array( 'دومين مجاني', 'استضافة مجانية', 'لوحة تحكم', 'هوية متكاملة' ),
			'packages'         => array(
				array(
					'name'     => 'الشركات الناشئة',
					'price'    => 8000,
					'featured' => false,
					'features' => array( 'حتى 8 صفحات', 'صفحات خدمات ومشاريع', 'لوحة تحكم', 'دعم فني شهر' ),
				),
				array(
					'name'     => 'الشركات المتوسطة',
					'price'    => 14000,
					'featured' => true,
					'features' => array( 'حتى 15 صفحة', 'لغتان', 'بوابة وظائف وطلبات تواصل', 'دعم فني 3 شهور' ),
				),
				array(
					'name'     => 'المؤسسات',
					'price'    => 28000,
					'featured' => false,
					'features' => array( 'نظام مخصص بالكامل', 'لوحات تحكم متعددة الصلاحيات', 'ربط أنظمة داخلية', 'دعم فني 12 شهر' ),
				),
			),
		),
		'sites'      => array(
			'title'            => 'المواقع التعريفية',
			'card_label'       => 'المواقع التعريفية',
			'menu_order'       => 6,
			'show_in_grid'     => false,
			'image'            => '',
			'hero_badge'       => '🌐 باقات المواقع التعريفية',
			'hero_title'       => 'موقعك التعريفي الاحترافي',
			'hero_description' => 'نصمم موقعاً تعريفياً بهوية علامتك يعرّف عملاءك بخدماتك ويزيد ثقتهم بك.',
			'chips'            => array( 'دومين مجاني', 'استضافة مجانية', 'شهادة SSL', 'تصميم متجاوب' ),
			'packages'         => array(
				array(
					'name'     => 'الأساسية',
					'price'    => 3000,
					'featured' => false,
					'features' => array( 'موقع تعريفي حتى 5 صفحات', 'نموذج تواصل وزر واتساب', 'تصميم متجاوب + SSL', 'دعم فني شهر' ),
				),
				array(
					'name'     => 'الاحترافية',
					'price'    => 5500,
					'featured' => true,
					'features' => array( 'حتى 10 صفحات', 'لوحة تحكم لإدارة المحتوى', 'معرض أعمال وتحسين SEO', 'دعم فني 3 شهور' ),
				),
				array(
					'name'     => 'المتقدمة',
					'price'    => 9000,
					'featured' => false,
					'features' => array( 'صفحات غير محدودة', 'لغتان (عربي/إنجليزي)', 'مدونة وتحليلات الزوار', 'دعم فني 12 شهر' ),
				),
			),
		),
	);
}

function be_seed_package_rows( $packages ) {
	$rows = array();

	foreach ( $packages as $package ) {
		$rows[] = array(
			'name'        => $package['name'],
			'price'       => $package['price'],
			'is_featured' => $package['featured'] ? 1 : 0,
			'badge_text'  => 'الأكثر طلباً',
			'features'    => array_map( function ( $feature ) {
				return array( 'text' => $feature );
			}, $package['features'] ),
			'cta_label'   => 'اطلب الباقة',
			'cta_url'     => '',
		);
	}

	return $rows;
}

function be_seed_attach_image( $file_name, $post_id ) {
	if ( '' === $file_name ) {
		return 0;
	}

	$path = get_template_directory() . '/assets/img/' . $file_name;
	if ( ! is_readable( $path ) ) {
		return 0;
	}

	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	$upload = wp_upload_bits( $file_name, null, file_get_contents( $path ) );
	if ( ! empty( $upload['error'] ) ) {
		return 0;
	}

	$attachment_id = wp_insert_attachment(
		array(
			'guid'           => $upload['url'],
			'post_mime_type' => 'image/webp',
			'post_title'     => preg_replace( '/\.[^.]+$/', '', $file_name ),
			'post_status'    => 'inherit',
		),
		$upload['file'],
		$post_id
	);

	wp_update_attachment_metadata( $attachment_id, wp_generate_attachment_metadata( $attachment_id, $upload['file'] ) );
	set_post_thumbnail( $post_id, $attachment_id );

	return $attachment_id;
}

function be_seed_services_command( $args, $assoc_args ) {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		WP_CLI::error( 'ACF PRO must be active before seeding services.' );
	}

	$created = 0;
	$updated = 0;

	foreach ( be_seed_definitions() as $slug => $definition ) {
		$existing = get_page_by_path( $slug, OBJECT, 'service' );

		if ( $existing ) {
			$post_id = $existing->ID;
			++$updated;
		} else {
			$post_id = wp_insert_post(
				array(
					'post_type'    => 'service',
					'post_status'  => 'publish',
					'post_title'   => $definition['title'],
					'post_name'    => $slug,
					'menu_order'   => $definition['menu_order'],
				),
				true
			);

			if ( is_wp_error( $post_id ) ) {
				WP_CLI::error( 'Could not create service ' . $slug . ': ' . $post_id->get_error_message() );
			}

			++$created;
		}

		update_field( 'field_be_show_in_grid', $definition['show_in_grid'], $post_id );
		update_field( 'field_be_card_label', $definition['card_label'], $post_id );
		update_field( 'field_be_hero_badge', $definition['hero_badge'], $post_id );
		update_field( 'field_be_hero_title', $definition['hero_title'], $post_id );
		update_field( 'field_be_hero_description', $definition['hero_description'], $post_id );
		update_field( 'field_be_hero_chips', array_map( function ( $chip ) {
			return array( 'text' => $chip );
		}, $definition['chips'] ), $post_id );
		update_field( 'field_be_packages', be_seed_package_rows( $definition['packages'] ), $post_id );
		update_field( 'field_be_faq_override', array(), $post_id );
		update_post_meta( $post_id, '_be_starting_price', be_min_package_price( be_seed_package_rows( $definition['packages'] ) ) );

		if ( '' !== $definition['image'] && ! get_post_thumbnail_id( $post_id ) ) {
			be_seed_attach_image( $definition['image'], $post_id );
		}
	}

	be_clear_services_cache();

	WP_CLI::success( sprintf( 'Seeded services: %d created, %d updated.', $created, $updated ) );
}

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	WP_CLI::add_command( 'be seed-services', 'be_seed_services_command' );
}
