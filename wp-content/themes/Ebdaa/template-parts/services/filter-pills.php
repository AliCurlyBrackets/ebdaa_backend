<?php
$service = isset( $args['service'] ) ? $args['service'] : be_current_service();
?>
        <section class="svt" id="services">
            <div class="wrap">
                <p class="tag rv"><?php echo esc_html__( 'خدماتنا', 'be' ); ?></p>
                <h2 class="ttl rv"><?php echo esc_html__( 'اختر الخدمة وشاهد باقاتها', 'be' ); ?></h2>
                <div class="pills rv" id="pills"><?php foreach ( be_get_services() as $item ) : ?>
                    <a href="<?php echo esc_url( $item['url'] ); ?>" class="<?php echo $item['slug'] === $service['slug'] ? 'on' : ''; ?>" data-k="<?php echo esc_attr( $item['slug'] ); ?>"><?php echo esc_html( $item['name'] ); ?></a><?php endforeach; ?></div>
            </div>
        </section>
