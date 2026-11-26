<?php
$hero_greeting        = get_field( 'field_hero_greeting', 'options' );
$hero_title           = get_field( 'field_hero_title', 'options' );
$hero_highlight       = get_field( 'field_hero_highlight', 'options' );
$hero_description     = get_field( 'field_hero_description', 'options' );
$hero_primary_label   = get_field( 'field_hero_primary_label', 'options' );
$hero_primary_link    = get_field( 'field_hero_primary_link', 'options' );
$hero_secondary_label = get_field( 'field_hero_secondary_label', 'options' );
$hero_secondary_link  = get_field( 'field_hero_secondary_link', 'options' );
$hero_scroll_label    = get_field( 'field_hero_scroll_label', 'options' );
$hero_brush_image     = get_field( 'field_hero_brush_image', 'options' );
$hero_person_image    = get_field( 'field_hero_person_image', 'options' );
$hero_person_alt      = get_field( 'field_hero_person_alt', 'options' );
?>
        <div class="hero" id="home">
            <div class="wrap hgrid">
                <div>
                    <h5 class="rv" style="--d:1"><?php echo esc_html( $hero_greeting ); ?></h5>
                    <h1 class="rv" style="--d:2"><?php echo esc_html( $hero_title ); ?> <span><?php echo esc_html( $hero_highlight ); ?></span></h1>
                    <p class="rv" style="--d:3"><?php echo esc_html( $hero_description ); ?></p>
                    <div class="acts rv" style="--d:4"><a class="btn pri" href="<?php echo esc_url( $hero_primary_link ); ?>"><?php echo esc_html( $hero_primary_label ); ?></a><a
                            class="btn out" href="<?php echo esc_url( $hero_secondary_link ); ?>"><?php echo esc_html( $hero_secondary_label ); ?></a></div>
                    <div class="scroll rv" style="--d:5">
                        <div class="mouse"></div><?php echo esc_html( $hero_scroll_label ); ?>
                    </div>
                </div>
                <div class="stage rv" style="--d:2">
                    <img class="brush" src="<?php echo esc_attr( $hero_brush_image ); ?>" alt="">
                    <div class="ring"></div>
                    <img class="person" src="<?php echo esc_attr( $hero_person_image ); ?>" alt="<?php echo esc_attr( $hero_person_alt ); ?>">
                    <div class="fc a"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 3l8 4.5v9L12 21l-8-4.5v-9z" />
                            <path d="M12 12l8-4.5M12 12v9M12 12L4 7.5" />
                        </svg></div>
                    <div class="fc b"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 8l-5 4 5 4M16 8l5 4-5 4M14 5l-4 14" />
                        </svg></div>
                    <div class="dots"><i style="top:30%;left:8%"></i><i
                            style="top:60%;right:6%;animation-delay:1s"></i><i
                            style="top:12%;left:45%;animation-delay:2s"></i></div>
                </div>
            </div>
        </div>
