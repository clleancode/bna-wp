<section class="gallery-section container">
      <?php 
        $images = get_field('gallery');
        if( $images ): ?>
            <?php foreach( $images as $image ): ?>
                   <figure class="reveal-effect">
                        <a href="<?php echo esc_url($image['url']); ?>" data-fancybox="group"> 
                              <?php
								echo wp_get_attachment_image(
									$image['ID'],
									'large',
									false,
									array('alt' => $image['alt'])
								);
							?>
                         </a> 
                    </figure>
             <?php endforeach; ?>
       <?php endif; ?>
</section>