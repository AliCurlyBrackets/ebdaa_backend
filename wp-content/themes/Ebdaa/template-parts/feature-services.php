<?php
$feature_services_tag                = get_field( 'field_feature_services_tag', 'options' );
$feature_services_title              = get_field( 'field_feature_services_title', 'options' );
$feature_services_card_1_title       = get_field( 'field_feature_services_card_1_title', 'options' );
$feature_services_card_1_description = get_field( 'field_feature_services_card_1_description', 'options' );
$feature_services_card_2_title       = get_field( 'field_feature_services_card_2_title', 'options' );
$feature_services_card_2_description = get_field( 'field_feature_services_card_2_description', 'options' );
$feature_services_card_3_title       = get_field( 'field_feature_services_card_3_title', 'options' );
$feature_services_card_3_description = get_field( 'field_feature_services_card_3_description', 'options' );
$feature_services_card_4_title       = get_field( 'field_feature_services_card_4_title', 'options' );
$feature_services_card_4_description = get_field( 'field_feature_services_card_4_description', 'options' );
?>
<section id="services">
            <div class="wrap">
                <p class="tag rv"><?php echo esc_html( $feature_services_tag ); ?></p>
                <h2 class="ttl rv"><?php echo esc_html( $feature_services_title ); ?></h2>
                <div class="feat">
                    <div class="fcard rv c" style="transition-delay:0.30000000000000004s"><svg viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M4 14v-2a8 8 0 0116 0v2" />
                            <rect x="3" y="14" width="4" height="6" rx="1.5" />
                            <rect x="17" y="14" width="4" height="6" rx="1.5" />
                        </svg>
                        <h3><?php echo esc_html( $feature_services_card_1_title ); ?></h3>
                        <p><?php echo esc_html( $feature_services_card_1_description ); ?></p>
                    </div>
                    <div class="fcard rv o" style="transition-delay:0.2s"><svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M13 2L4 14h7l-1 8 9-12h-7z" />
                        </svg>
                        <h3><?php echo esc_html( $feature_services_card_2_title ); ?></h3>
                        <p><?php echo esc_html( $feature_services_card_2_description ); ?></p>
                    </div>
                    <div class="fcard rv c" style="transition-delay:0.1s"><svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="4" width="14" height="10" rx="1.5" />
                            <rect x="14" y="9" width="8" height="12" rx="1.5" />
                            <path d="M6 18h6" />
                        </svg>
                        <h3><?php echo esc_html( $feature_services_card_3_title ); ?></h3>
                        <p><?php echo esc_html( $feature_services_card_3_description ); ?></p>
                    </div>
                    <div class="fcard rv o" style="transition-delay:0.0s"><svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3" />
                            <path
                                d="M12 2v3M12 19v3M2 12h3M19 12h3M4.9 4.9l2.1 2.1M17 17l2.1 2.1M4.9 19.1L7 17M17 7l2.1-2.1" />
                        </svg>
                        <h3><?php echo esc_html( $feature_services_card_4_title ); ?></h3>
                        <p><?php echo esc_html( $feature_services_card_4_description ); ?></p>
                    </div>
                </div>
            </div>
        </section>
