<?php 
$first_image_id = null;
$is_first = true;
?>

<div class="home--camping">
    <div class="swiper myHeader">
        <div class="swiper-wrapper">

            <?php if( have_rows('header_slider') ): ?>
                <?php while( have_rows('header_slider') ): the_row(); ?>

                    <div class="swiper-slide">
                        <?php 
                            $image_id = get_sub_field('home_camping_image');

                            // Ruaj foton e parë për preload
                            if ($is_first) {
                                $first_image_id = $image_id;
                            }

                            echo wp_get_attachment_image(
                                $image_id, 
                                'full', 
                                false, 
                                array(
                                    'loading' => $is_first ? 'eager' : 'lazy',
                                    'fetchpriority' => $is_first ? 'high' : 'low',
                                    'decoding' => $is_first ? 'sync' : 'async'
                                )
                            );

                            $is_first = false;
                        ?> 

                        <div class="camping--inner">
                            <div class="camping--inner--left">
                                <div class="subtitle">
                                    <p><?php the_sub_field('section_number'); ?></p>
                                    <span></span>
                                    <p><?php the_sub_field('subtitle'); ?></p>
                                </div>
                                <h1><?php the_sub_field('section_title'); ?></h1>

                                <div class="camping--inner--buttons">
                                    <?php 
                                        $link = get_sub_field('button');
                                        if( $link ): 
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                        <a href="<?php echo esc_url($link_url); ?>" class="btn">
                                            <?php echo esc_html($link_title); ?> 
                                            <span class="icon-angle-double-down"></span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</div>