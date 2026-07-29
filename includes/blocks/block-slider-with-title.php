<?php $numberOfSlides = 0; ?>
<div class="camping--slider slider-content">
    <div class="swiper campSlider mySwiper">
        <div class="swiper-wrapper">
			<?php while(have_rows('slider')): the_row(); $numberOfSlides++; ?>
    		<a href="<?php echo wp_get_attachment_image_url(get_sub_field('slider_image'), 'full'); ?>" data-fancybox="gallery" class="swiper-slide">
               <?php echo wp_get_attachment_image(get_sub_field('slider_image'), 'full'); ?> 
				<div class="camping--slider-checks">
          			<div class="checks--info">
            			<h5><?php the_sub_field('title'); ?></h5>
          			</div>
        		</div>
			</a>
			<?php endwhile; ?>
        </div>
    </div>
    <div class="pagination-and-navigation">
       <div class="swiper-button-prev"><span class="icon-arrow-right"></span></div>
       <div class="swiper-pagination"></div>
       <div class="swiper-button-next"><span class="icon-arrow-right"></span></div>
    </div>
</div>