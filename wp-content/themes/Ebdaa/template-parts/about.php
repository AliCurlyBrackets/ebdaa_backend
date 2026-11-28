<?php
$about_tag           = get_field( 'field_about_tag', 'options' );
$about_title         = get_field( 'field_about_title', 'options' );
$about_description   = get_field( 'field_about_description', 'options' );
$about_button_label  = get_field( 'field_about_button_label', 'options' );
$about_button_link   = get_field( 'field_about_button_link', 'options' );
$about_stat_1_number = get_field( 'field_about_stat_1_number', 'options' );
$about_stat_1_suffix = get_field( 'field_about_stat_1_suffix', 'options' );
$about_stat_1_label  = get_field( 'field_about_stat_1_label', 'options' );
$about_stat_2_number = get_field( 'field_about_stat_2_number', 'options' );
$about_stat_2_suffix = get_field( 'field_about_stat_2_suffix', 'options' );
$about_stat_2_label  = get_field( 'field_about_stat_2_label', 'options' );
$about_stat_3_number = get_field( 'field_about_stat_3_number', 'options' );
$about_stat_3_suffix = get_field( 'field_about_stat_3_suffix', 'options' );
$about_stat_3_label  = get_field( 'field_about_stat_3_label', 'options' );
$about_cubes_image   = get_field( 'field_about_cubes_image', 'options' );
?>
<section id="about">
            <div class="wrap about">
                <div class="abox rv">
                    <p class="tag"><?php echo esc_html( $about_tag ); ?></p>
                    <h2><?php echo esc_html( $about_title ); ?></h2>
                    <p><?php echo esc_html( $about_description ); ?></p><a class="btn pri" href="<?php echo esc_url( $about_button_link ); ?>"><?php echo esc_html( $about_button_label ); ?></a>
                </div>
                <div class="stats rv">
                    <div><svg viewBox="0 0 24 24" fill="none" stroke="var(--cy)" stroke-width="1.6"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="8" r="3" />
                            <circle cx="17" cy="9" r="2.4" />
                            <path d="M3 20c0-3.5 2.7-6 6-6s6 2.5 6 6M15 14.5c3 0 6 1.6 6 5.5" />
                        </svg><b data-n="<?php echo esc_attr( $about_stat_1_number ); ?>"<?php if ( $about_stat_1_suffix ) : ?> data-s="<?php echo esc_attr( $about_stat_1_suffix ); ?>"<?php endif; ?>>0</b><small><?php echo esc_html( $about_stat_1_label ); ?></small></div>
                    <div><svg viewBox="0 0 24 24" fill="none" stroke="var(--cy)" stroke-width="1.6"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 4c4 0 6 2 6 6l-5 5-5-5zM9 15l-5 5M7 11l-3 1 2 2M13 17l-1 3-2-2" />
                        </svg><b data-n="<?php echo esc_attr( $about_stat_2_number ); ?>"<?php if ( $about_stat_2_suffix ) : ?> data-s="<?php echo esc_attr( $about_stat_2_suffix ); ?>"<?php endif; ?>>0</b><small><?php echo esc_html( $about_stat_2_label ); ?></small></div>
                    <div><svg viewBox="0 0 24 24" fill="none" stroke="var(--cy)" stroke-width="1.6"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="9" />
                            <path d="M8 14c1 1.5 2.2 2 4 2s3-.5 4-2" />
                            <circle cx="9" cy="10" r=".6" />
                            <circle cx="15" cy="10" r=".6" />
                        </svg><b data-n="<?php echo esc_attr( $about_stat_3_number ); ?>"<?php if ( $about_stat_3_suffix ) : ?> data-s="<?php echo esc_attr( $about_stat_3_suffix ); ?>"<?php endif; ?>>0</b><small><?php echo esc_html( $about_stat_3_label ); ?></small></div>
                </div><img class="cubes rv" src="<?php echo esc_attr( $about_cubes_image ); ?>" alt="" loading="lazy">
            </div>
        </section>
