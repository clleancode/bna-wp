<?php $numberOfSlides = 0; ?>
<div class="content-section">
    <?php echo wp_get_attachment_image(get_field('left_image'), 'full'); ?> 
    <div class="content-section--inner">
        <div class="subtitle">
            <p><?php echo esc_html(get_field('section_number')); ?></p>
            <span></span>
            <p><?php echo esc_html(get_field('subtitle')); ?></p>
        </div>
        <h2 class="title"><?php echo esc_html(get_field('bold_title')); ?>  <br> <span><?php echo esc_html(get_field('title')); ?></span></h2>
        <div class="content-section--right">
            <?php while(have_rows('why_choose_us')): the_row(); $numberOfSlides++; ?>
                <div class="row">
                <?php echo wp_get_attachment_image(get_sub_field('img'), 'full'); ?> 
                    <div class="content-right">
                        <h3><?php echo esc_html(get_sub_field('row-title')); ?></h3>
                        <p><?php the_sub_field('row-text'); ?></p>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?> 
        </div>
    </div>
</div>