<?php $numberOfSlides = 0; ?>

<div class="home--adventure">
    <div class="adventure--inner container">

        <div class="subtitle">
            <p><?php echo esc_html(get_field('section_number')); ?></p>
            <span></span>
            <p><?php echo esc_html(get_field('subtitle')); ?></p>
        </div>

        <h2 class="title">
            <?php echo esc_html(get_field('first_title')); ?>
            <br>
            <span><?php echo esc_html(get_field('bold_title')); ?></span>
        </h2>

        <div class="adventure--boxes">

        <?php
            $selected_post_ids = get_field('select_destinations');

            $args = array(
                'post_type'      => array('post', 'page', 'destination'),
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'post__in'       => $selected_post_ids,
                'orderby'        => 'post__in'
            );

            $destinations_query = new WP_Query($args);

            if ($destinations_query->have_posts()) :

                while ($destinations_query->have_posts()) :
                    $destinations_query->the_post();
        ?>

            <a href="<?php echo esc_url(get_the_permalink()); ?>" class="adventure--box">

                <?php
                    $mobile_image = get_field('mobile_image');

                    if (has_post_thumbnail()) :
                ?>

                    <picture>

                        <?php if ($mobile_image) : ?>

                           <source
                                media="(max-width: 768px)"
                                srcset="<?php echo esc_url(wp_get_attachment_image_url(get_post_thumbnail_id(), 'medium_large')); ?>">

                        <?php endif; ?>

                        <?php
                           echo wp_get_attachment_image(
                                get_post_thumbnail_id(),
                                'adventure-card',
                                false,
                                array(
                                    'alt' => get_the_title(),
                                    'loading' => 'lazy',
                                    'decoding' => 'async',
                                    'width' => 474,
                                    'height' => 350,
                                    'sizes' => '(max-width: 768px) 100vw, 474px',
                                    'style' => 'width:100%;height:auto;'
                                )
                            );
                        ?>

                    </picture>

                <?php endif; ?>

                <div class="title">
                    <span></span>
                    <h5 class="box-title"><?php the_title(); ?></h5>
                </div>

                <?php the_excerpt(); ?>

                <?php
                    $booking_price = get_field('booking_price', get_the_ID());

                    if ($booking_price) :
                ?>
                    <span class="btn btn-green">
                        Book Now - <?php echo esc_html($booking_price); ?>
                    </span>
                <?php endif; ?>

            </a>

        <?php
                endwhile;

                wp_reset_postdata();

            else :

                echo 'No products found in this category.';

            endif;
        ?>

        </div>
    </div>
</div>