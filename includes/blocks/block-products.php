<?php $numberOfSlides = 0; ?>
<div class="home--adventure">
    <div class="adventure--inner container">
        <div class="subtitle">
            <p><?php the_field('section_number'); ?></p>
            <span></span>
            <p><?php the_field('subtitle'); ?></p>
        </div>
        <h2 class="title"><?php the_field('first_title'); ?> <br> <span><?php the_field('bold_title'); ?></span></h2>
        <div class="adventure--boxes">		
		<?php
			$selected_post_ids = get_field('select_destinations');
    		$args = array(  
    			'post_type' => array('post', 'page', 'destination'),
    			'post_status' => 'publish',
                'posts_per_page'    => -1,
    			'post__in' => $selected_post_ids, 
    			'orderby' => 'post__in'   
   	 		);

      		$destinations_query = new WP_Query($args);
    
   			if ($destinations_query->have_posts()) :
           	 	while ($destinations_query->have_posts()) : $destinations_query->the_post();
		?>

			<a href="<?php echo esc_url(get_the_permalink()); ?>" class="adventure--box">
				<?php
					if (has_post_thumbnail()) {
						echo wp_get_attachment_image(
							get_post_thumbnail_id(),
							'full', 
							false,
							array('alt' => get_the_title())
						);
					}
				?>
				<div class="title">
                    <span></span>
                    <h5 class="box-title"><?php the_title() ?></h5>
                </div>
                <?php the_excerpt(); ?>
                <?php 
                    $booking_price = get_field('booking_price', get_the_ID());

                    if ($booking_price) : ?>
                        <span class="btn btn-green">Book Now - <?php echo esc_html($booking_price); ?></span>
                <?php endif; ?>
            </a>
		<?php
            endwhile;
                wp_reset_postdata();
            else :
                echo 'No products found in this category.';
            endif;
        ?>
        </div>
    </div>
</div>