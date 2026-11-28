<?php
$service = isset( $args['service'] ) ? $args['service'] : be_current_service();
$cta     = be_option( 'final_cta' );
$title   = sprintf( 'جاهز تبدأ بـ %s جنيه؟', be_format_price( $service['price'] ) );
?>
        <section>
            <div class="wrap">
                <div class="cta rv">
                    <h2 id="ch"><?php echo esc_html( $title ); ?></h2>
                    <p><?php echo esc_html( $cta['text'] ); ?></p>
                    <a class="btn pri" href="#contact"><?php echo esc_html( $cta['button'] ); ?></a>
                </div>
            </div>
        </section>
