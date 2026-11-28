<?php
$clients_tag   = get_field( 'field_clients_tag', 'options' );
$clients_title = get_field( 'field_clients_title', 'options' );
?>
<section id="clients">
            <div class="wrap">
                <p class="tag rv"><?php echo esc_html( $clients_tag ); ?></p>
                <h2 class="ttl rv"><?php echo esc_html( $clients_title ); ?></h2>
                <div class="clients rv"><button class="arr" id="pv" aria-label="السابق">›</button>
                    <div class="mq">
                        <div class="mt" id="mt"></div>
                    </div>
                    <button class="arr" id="nx" aria-label="التالي">‹</button>
                </div>
                <button class="arr" id="pv" aria-label="السابق">‹</button>
            </div>
            </div>
        </section>
