<?php $numberOfSlides = 0; ?>
<div class="testimonial container">
    <div class="testimonial-content--left">
        <div class="subtitle">
            <p><?php the_field('section_number'); ?></p>
            <span></span>
            <p><?php the_field('subtitle'); ?></p>
        </div>
        <h2 class="title"> <?php the_field('bold_title'); ?><br> <span><?php the_field('title'); ?></span></h2>
        <div class="slider-buttons">
            <div class="swiper-button-prev"><span class="icon-arrow-right"></span></div>
            <div class="swiper-button-next"><span class="icon-arrow-right"></span></div>
        </div>
    </div>
    <div class="swiper myTestimonial">
        <div class="swiper-wrapper">
            <?php while(have_rows('testimonial')): the_row(); $numberOfSlides++; ?>
                <div class="swiper-slide">
                    <div class="testimonial-content--top">
                    <?php echo wp_get_attachment_image(get_sub_field('testimonial_image'), 'full'); ?> 
                        <h4><?php the_sub_field('name'); ?><br> <span><?php the_sub_field('position'); ?></span></h4>
                    </div>
                    <div class="testimonial-content--bottom">
                    <?php the_sub_field('content'); ?>
                    <div class="stars">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>  
        </div>
    </div>      
    <div class="swiper-pagination"></div>
</div>