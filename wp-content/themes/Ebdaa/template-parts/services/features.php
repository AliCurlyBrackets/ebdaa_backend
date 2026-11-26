<?php
$features = be_option( 'global_features' );
?>
        <section id="features">
            <div class="wrap">
                <p class="tag rv"><?php echo esc_html__( 'ماذا يشمل موقعك', 'be' ); ?></p>
                <h2 class="ttl rv"><?php echo esc_html__( 'كل ما تحتاجه لتبدأ، في سعر واحد', 'be' ); ?></h2>
                <div class="incl"><?php foreach ( $features as $index => $feature ) : ?>
                    <div class="ic rv" style="transition-delay:<?php echo esc_attr( number_format( ( $index % 3 ) * 0.1, 1, '.', '' ) ); ?>s"><span><?php echo wp_kses_post( $feature['icon'] ); ?></span><div><h3><?php echo esc_html( $feature['title'] ); ?></h3><p><?php echo esc_html( $feature['text'] ); ?></p></div></div><?php endforeach; ?></div>
            </div>
        </section>
