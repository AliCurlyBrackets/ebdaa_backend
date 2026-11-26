<?php
$service = isset( $args['service'] ) ? $args['service'] : be_current_service();
?>
        <section id="faq">
            <div class="wrap">
                <p class="tag rv"><?php echo esc_html__( 'الأسئلة الشائعة', 'be' ); ?></p>
                <h2 class="ttl rv"><?php echo esc_html__( 'إجابات على أكثر ما يشغل بالك', 'be' ); ?></h2>
                <div class="faq"><?php foreach ( $service['faq'] as $index => $item ) : ?>
                    <div class="q<?php echo 0 === $index ? ' open' : ''; ?>"><button><?php echo esc_html( $item['q'] ); ?><i>＋</i></button>
                        <div class="a"><p><?php echo esc_html( $item['a'] ); ?></p></div>
                    </div><?php endforeach; ?></div>
            </div>
        </section>
