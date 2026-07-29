<?php $numberOfSlides = 0; ?>
<div class="overlay--boxes">
    <?php 
        $images = get_field('background_images');
        $size = 'full';
        if( $images ): ?>
        <?php foreach( $images as $image_id ): ?>
            <?php echo wp_get_attachment_image( $image_id, $size ); ?>
        <?php endforeach; ?>
   <?php endif; ?>
    <div class="overlay-main--boxes"> 
        <?php while(have_rows('box_number')): the_row(); $numberOfSlides++; ?>
            <div class="overlay--box">
            <?php echo wp_get_attachment_image(get_sub_field('box_image'), 'full'); ?> 
                <span data-number="<?php echo esc_html( get_sub_field('number') ); ?>">0</span>
                <h6><?php the_sub_field('title'); ?></h6>
            </div>
        <?php endwhile; ?>  
    </div>  
</div>