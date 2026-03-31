<!-- This section is used for slider with fancybox -->

<div class="camping--slider">
    <div class="swiper campSlider mySwiper">
        <div class="swiper-wrapper">
            <?php 
                $images = get_field('slider_images');
                $size = 'full'; 
                if( $images ): ?>
                 <?php foreach( $images as $image_id ): ?>
                    <a href="<?php echo wp_get_attachment_image_url($image_id, 'full',  false, array('alt' => '')); ?>" class="swiper-slide" data-fancybox="group">
                        <?php echo wp_get_attachment_image( $image_id, $size,  false, array('alt' => '')); ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="pagination-and-navigation">
        <div class="swiper-button-prev"><span class="icon-arrow-right"></span></div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"><span class="icon-arrow-right"></span></div>
    </div>
</div>