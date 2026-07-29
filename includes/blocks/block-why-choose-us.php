<?php $numberOfSlides = 0; ?>
<div class="content-section">
    <?php echo wp_get_attachment_image(get_field('left_image'), 'full'); ?> 
    <div class="content-section--inner">
        <div class="subtitle">
            <p><?php the_field('section_number'); ?></p>
            <span></span>
            <p><?php the_field('subtitle'); ?></p>
        </div>
        <h2 class="title"><?php the_field('bold_title'); ?>  <br> <span><?php the_field('title'); ?> </span></h2>
        <div class="content-section--right">
            <?php while(have_rows('why_choose_us')): the_row(); $numberOfSlides++; ?>
                <div class="row">
                <?php echo wp_get_attachment_image(get_sub_field('img'), 'full'); ?> 
                    <div class="content-right">
                        <h3><?php the_sub_field('row-title'); ?></h3>
                        <p><?php the_sub_field('row-text'); ?></p>
                    </div>
                </div>
            <?php endwhile; ?> 
        </div>
    </div>
</div>