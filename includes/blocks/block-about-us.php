<?php $numberOfSlides = 0; ?>
<div class="about">
    <div class="about--inner">
            <div class="about-us--content container">
                <div class="subtitle">
                    <p><?php the_field('section_number'); ?></p>
                    <span></span>
                    <p><?php the_field('subtitle'); ?></p>
                </div>
                <h2 class="title"><?php the_field('section_title'); ?><br> <span><?php the_field('bold_title'); ?></span></h2>
                <p><?php the_field('about_us--text'); ?></p>
                <?php
					if(get_field('about_us--check')):
				?>	
                    <ul>
                        <?php while(have_rows('about_us--check')): the_row(); $numberOfSlides++; ?>
                            <li><span class="icon-check"></span><?php the_sub_field('text'); ?></li>
                        <?php endwhile; ?> 
                    </ul>
                <?php endif; ?>
                    <?php 
                        $link = get_field('button');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" class="btn"><?php echo esc_html( $link_title ); ?> <span class="icon-angle-double-down"></span></a>
                    <?php endif; ?>
                </div>
            <div class="about--inner--right"> 
                <div class="about--inner image-overlay">
                     <h2 class="text-rotate"><?php the_field('text_rotate'); ?></h2>
                </div>
                <?php 
                    $images = get_field('images');
                    $size = 'full';
                    if( $images ): ?>
                    <?php foreach( $images as $image_id ): ?>
                        <?php echo wp_get_attachment_image( $image_id, $size ); ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>