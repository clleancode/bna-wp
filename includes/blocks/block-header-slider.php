<?php $numberOfSlides = 0; ?>
<div class="header-slider">
    <div class="swiper myHeader">
        <div class="swiper-wrapper">
			<?php while(have_rows('header')): the_row(); $numberOfSlides++; ?>
            <div class="swiper-slide ">
                <?php echo wp_get_attachment_image(get_sub_field('slider-image'), 'full'); ?> 
                <div class="header-slider--content container">
                    <h3><?php the_sub_field('subtitle'); ?></h3>
                    <h1><?php the_sub_field('title'); ?></h1>
					<?php 
						$link = get_sub_field('link');
						if( $link ): 
    					$link_url = $link['url'];
    					$link_title = $link['title'];
    					$link_target = $link['target'] ? $link['target'] : '_self';
    				?>
                    <a class="btn" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?> <span class="icon-angle-double-down"></span></a>
					<?php endif; ?>
                </div>
                <span>Balkan Natural Adventure</span>
            </div>
			 <?php endwhile; wp_reset_postdata(); ?>  
        </div>
        <div class="swiper-button-next"><span class="icon-arrow-right"></span></div>
        <div class="swiper-button-prev"><span class="icon-arrow-right"></span></div>
    </div>
</div>