<?php
$steps      = be_option( 'global_steps' );
$numerals   = array( '١', '٢', '٣', '٤', '٥', '٦' );
?>
        <section id="steps">
            <div class="wrap">
                <p class="tag rv"><?php echo esc_html__( 'خطوات العمل', 'be' ); ?></p>
                <h2 class="ttl rv"><?php echo esc_html__( 'من الفكرة إلى موقع يعمل في 4 خطوات', 'be' ); ?></h2>
                <div class="steps rv"><?php foreach ( $steps as $index => $step ) : ?>
                    <div class="st rv" style="transition-delay:<?php echo esc_attr( number_format( $index * 0.15, 2, '.', '' ) ); ?>s"><b><?php echo esc_html( isset( $numerals[ $index ] ) ? $numerals[ $index ] : ( $index + 1 ) ); ?></b><h3><?php echo esc_html( $step['title'] ); ?></h3><p><?php echo esc_html( $step['text'] ); ?></p></div><?php endforeach; ?></div>
            </div>
        </section>
