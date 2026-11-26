<?php
$service = isset( $args['service'] ) ? $args['service'] : be_current_service();
$price   = be_format_price( $service['price'] );
?>
        <div class="hero" id="home">
            <div class="wrap hgrid">
                <div>
                    <span class="badge rv" style="--d:1" id="hb"><?php echo esc_html( $service['badge'] ); ?></span>
                    <h1 class="rv" style="--d:2" id="ht"><?php echo esc_html( $service['heading'] ); ?> <span>يبدأ من <em><?php echo esc_html( $price ); ?></em> جنيه</span></h1>
                    <p class="rv" style="--d:3" id="hp"><?php echo esc_html( $service['description'] ); ?> <b style="color:#fff"><?php echo esc_html__( 'والاستضافة والدومين علينا', 'be' ); ?></b> لأول سنة.</p>
                    <div class="chips rv" style="--d:4" id="hc"><?php foreach ( $service['chips'] as $chip ) : ?><span><?php echo esc_html( $chip ); ?></span><?php endforeach; ?></div>
                    <div class="acts rv" style="--d:5"><a class="btn pri" href="#works"><?php echo esc_html__( '▦ عرض البورتفوليو', 'be' ); ?></a><a class="btn out" href="#pricing"><?php echo esc_html__( 'شاهد الباقات ➤', 'be' ); ?></a></div>
                </div>
                <div class="stage rv" style="--d:2">
                    <img class="brush" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/brush.webp' ); ?>" alt="">
                    <div class="ring"></div>
                    <img class="person" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/portrait.webp' ); ?>" alt="<?php echo esc_attr__( 'مطور ويب', 'be' ); ?>">
                    <div class="fc a"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l8 4.5v9L12 21l-8-4.5v-9z"/><path d="M12 12l8-4.5M12 12v9M12 12L4 7.5"/></svg></div>
                    <div class="fc b"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M8 8l-5 4 5 4M16 8l5 4-5 4M14 5l-4 14"/></svg></div>
                    <div class="pbadge"><small><?php echo esc_html__( 'يبدأ من', 'be' ); ?></small><b id="pb"><?php echo esc_html( $price ); ?></b> <?php echo esc_html( $service['currency'] ); ?></div>
                    <div class="dots"><i style="top:30%;left:8%"></i><i style="top:60%;right:6%;animation-delay:1s"></i><i style="top:12%;left:45%;animation-delay:2s"></i></div>
                </div>
            </div>
        </div>
