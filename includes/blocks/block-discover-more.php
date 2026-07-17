<div class="faq--travel container">
    <div class="travel--information">
        <div class="subtitle">
            <p><?php echo esc_html(get_field('section_number')); ?></p>
            <span></span>
            <p><?php echo esc_html(get_field('subtitle')); ?></p>
        </div>
        <h2 class="title"><?php echo esc_html(get_field('bold_title')); ?> <br> <span> <?php echo esc_html(get_field('title')); ?></span></h2>
        <p><?php the_field('paragraph'); ?></p>  
		<?php 
             if(get_field('info_title')) : 
          ?>
        <div class="input--range">
            <div class="input--info">
               <p><?php echo esc_html(get_field('info_title')); ?></p>
                <?php endif; 
                	if(get_field('percent')) : 
                	?>
               <p class="percent"><?php echo esc_html(get_field('percent')); ?></p>
            </div>
            <div class="input">
                <div class="input--fill"></div>
            </div>
        </div> 
		<?php endif;  ?>
    </div>
    <?php echo wp_get_attachment_image(get_field('right_image'), 'full'); ?> 
</div>