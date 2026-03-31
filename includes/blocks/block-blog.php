<!-- This section is used for posts -->

<div class="blog container">
    <div class="subtitle">
        <p>08</p>
        <span></span>
        <p>News & Blog</p>
    </div>
    <h2 class="title">Read Every News & Blog <br> <span>Articles & Tips</span></h2>
    <div class="blog--inner">
		<?php
            $args = array(
                'post_type' => 'post', 
                'post_status' => 'publish',
	        	'posts_per_page'    => 3,
                'orderby' => 'date', 
                'order' => 'DESC',   
            );      
            $post = new WP_Query($args);
            if ($post->have_posts()) : while ($post->have_posts()) : $post->the_post();
        ?>
            <a class="blog-box" href="<?php echo esc_url(get_the_permalink()); ?>" aria-label="<?php the_title(); ?>">
                <?php
                    $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                    echo wp_get_attachment_image( $thumbnail_id, 'full' );
                ?>
                <div class="about-blog">
                    <h4><?php the_title(); ?></h4>
                    <h5>Read More <span class="icon-angle-double-down"></span></h5>
                </div>
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
