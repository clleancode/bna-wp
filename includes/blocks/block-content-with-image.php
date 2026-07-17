<?php $numberOfSlides = 0; ?>
<div class="content--section container">
    <?php
        if(get_field('bold_title')):
    ?>
    <h2 class="title"><?php echo esc_html(get_field('bold_title')); ?></h2>
    <?php endif; ?>
    <?php while(have_rows('content')): the_row(); $numberOfSlides++; ?>
        <?php echo wp_kses_post(get_sub_field('paragraph')); ?>
        <?php
            if(get_sub_field('image')):
        ?>
            <?php echo wp_get_attachment_image(get_sub_field('image'), 'full' , false ,array('class' => 'full-width')); ?> 
        <?php endif; ?>
    <?php endwhile; wp_reset_postdata(); ?>  
</div>