<div class="home--adventure">
    <div class="adventure--inner container">
        <div class="adventure--boxes">
            <?php
                if(have_rows('destinations')):
                    while(have_rows('destinations')): the_row();
                        $destination = get_sub_field('destination');

            ?>
                <a href="<?php the_permalink(); ?>" class="adventure--box">
                    <?php echo wp_get_attachment_image(get_post_thumbnail_id($destination->ID), 'full'); ?>
                    <div class="title">
                        <span></span>
                        <h5 class="box-title"><?php echo $destination->post_title; ?></h5>
                    </div>
                    <p><?php echo get_the_excerpt($destination->ID); ?></p>
                </a>
            <?php
                wp_reset_postdata();
                endwhile;
                endif;
            ?>
        </div>
    </div>
</div>