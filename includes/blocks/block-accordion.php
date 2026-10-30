<?php $numberOfSlides = 0; ?>
<?php while(have_rows('accordion')): the_row(); $numberOfSlides++; ?>
        <div class="accordion section-accordion container">
            <?php while(have_rows('accordion_box')): the_row(); $numberOfSlides++; ?>
                <?php
                    if ( ! isset( $GLOBALS['bna_accordion_uid'] ) ) {
                        $GLOBALS['bna_accordion_uid'] = 0;
                    }
                    $GLOBALS['bna_accordion_uid']++;
                    $header_id = 'accordion-header-' . (int) $GLOBALS['bna_accordion_uid'];
                    $panel_id  = 'accordion-panel-' . (int) $GLOBALS['bna_accordion_uid'];
                ?>
                <div class="accordion--card">
                    <h5 class="accordion--card-title">
                        <button
                            type="button"
                            class="accordion--card-header"
                            id="<?php echo esc_attr( $header_id ); ?>"
                            aria-expanded="false"
                            aria-controls="<?php echo esc_attr( $panel_id ); ?>"
                        >
                            <span class="paragraph"><?php the_sub_field('accordion_title'); ?></span>
                            <span class="icon-up-right arrow" aria-hidden="true"></span>
                        </button>
                    </h5>
                    <div
                        class="accordion--card-body"
                        id="<?php echo esc_attr( $panel_id ); ?>"
                        role="region"
                        aria-labelledby="<?php echo esc_attr( $header_id ); ?>"
                        hidden
                    >
                        <p><?php the_sub_field('accordion_paragraph'); ?></p>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
<?php endwhile; wp_reset_postdata(); ?>
