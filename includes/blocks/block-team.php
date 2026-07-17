<?php $numberOfSlides = 0; ?>
<div class="team--section container">
    <div class="subtitle">
        <p><?php echo esc_html(get_field('section_number')); ?></p>
        <span></span>
        <p><?php echo esc_html(get_field('subtitle')); ?></p>
    </div>
    <h2 class="title"><?php echo esc_html(get_field('bold_title')); ?> <br> <span><?php echo esc_html(get_field('title')); ?></span></h2>
    <div class="team">
		 <?php while(have_rows('team')): the_row(); $numberOfSlides++; ?>
        <div class="team--member">
            <div class="team--member-top">
                <?php echo wp_get_attachment_image(get_sub_field('team_image'), 'full'); ?> 
            </div>
            <div class="team--member-bottom">
                <h4><?php echo esc_html(get_sub_field('name')); ?></h4>
                <p><?php echo esc_html(get_sub_field('position')); ?></p>
            </div>
        </div>
		 <?php endwhile; wp_reset_postdata(); ?>  
    </div>
</div>