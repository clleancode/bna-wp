<!-- This section is used for destination slider -->

<?php $numberOfSlides = 0; ?>
<div class="location--testimonial">
    <div class="subtitle">
      <p><?php echo esc_html(get_field('section_number')); ?></p>
      <span></span>
      <p><?php echo esc_html(get_field('subtitle')); ?></p>
  </div>
  <h2 class="title"><?php echo esc_html(get_field('bold_title')); ?></h2>
    <!-- Swiper -->
  <div class="swiper mySwiper location-testimonial-slider">
    <div class="swiper-wrapper">
		 <?php while(have_rows('slider_testimonial')): the_row(); $numberOfSlides++; ?>
      <div class="swiper-slide">
        <div class="location--testimonial-content">
            <span class="icon-quotes-sign"></span>
            <p><?php echo esc_html(get_sub_field('paragraph')); ?></p>
            <div class="author">
                <?php echo wp_get_attachment_image(get_sub_field('author_image'), 'full'); ?> 
                <div class="author--info">
                    <h5><?php the_sub_field('name'); ?></h5>
                    <p><?php echo esc_html(get_sub_field('position')); ?></p>
                    <div class="stars">
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>
                    </div>
                </div>
            </div>
        </div>
        <?php echo wp_get_attachment_image(get_sub_field('image'), 'full'); ?> 
      </div>
		<?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
  <?php echo wp_get_attachment_image(get_field('background_image'), 'full'); ?> 
 </div>