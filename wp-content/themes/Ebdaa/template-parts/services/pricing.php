<?php
$service = isset( $args['service'] ) ? $args['service'] : be_current_service();
$packages = be_apply_featured_fallback( $service['packages'] );
?>
        <section id="pricing">
            <div class="wrap">
                <p class="tag rv"><?php echo esc_html__( 'الباقات', 'be' ); ?></p>
                <h2 class="ttl rv" id="pt"><?php echo esc_html( sprintf( 'اختر باقة %s المناسبة لك', $service['name'] ) ); ?></h2>
                <div class="plans" id="plans"><?php foreach ( $packages as $index => $package ) : ?>
                    <div class="plan rv<?php echo $package['featured'] ? ' ft' : ''; ?>" style="transition-delay:<?php echo esc_attr( number_format( $index * 0.1, 1, '.', '' ) ); ?>s"><?php if ( $package['featured'] ) : ?><em><?php echo esc_html( $package['badge'] ); ?></em><?php endif; ?>
                        <h3><?php echo esc_html( $package['name'] ); ?></h3>
                        <div class="pr">يبدأ من <b><?php echo esc_html( be_format_price( $package['price'] ) ); ?></b> <?php echo esc_html( $service['currency'] ); ?></div>
                        <ul><?php foreach ( $package['features'] as $feature ) : ?><li><?php echo esc_html( $feature ); ?></li><?php endforeach; ?></ul>
                        <a class="btn <?php echo $package['featured'] ? 'pri' : 'out'; ?>" href="<?php echo esc_url( $package['cta_url'] ? $package['cta_url'] : ( be_option( 'cta_url' ) ? be_option( 'cta_url' ) : '#contact' ) ); ?>"><?php echo esc_html( $package['cta_label'] ); ?></a>
                    </div><?php endforeach; ?></div>
                <p class="note rv"><?php echo esc_html( be_option( 'pricing_note' ) ); ?></p>
            </div>
        </section>
