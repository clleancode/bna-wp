<div class="section--boxes container">
    <div class="boxes">
        <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'destination', 
                'post_status' => 'publish',
                'paged' => $paged, 
                'orderby' => 'date', 
                'posts_per_page' => 9,
                'order' => 'DESC',   
                'tax_query' => array(
                    array(
                        'taxonomy' => 'Categories',
                        'field'    => 'slug',
                        'terms'    => array('kosove', 'albania', 'macedonia', 'montenegro')
                    ),
                ),
            );

            $destinations_query = new WP_Query($args);

            if ($destinations_query->have_posts()) :
                while ($destinations_query->have_posts()) : $destinations_query->the_post();
        ?>
            <a class="box" href="<?php echo esc_url(get_the_permalink()); ?>">
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
                <div class="box--inner">
                    <div class="title">
                        <span></span>
                        <h5><?php the_title(); ?></h5>
                    </div>
                    <?php the_excerpt(); ?>
                    <span></span>
                    <div class="box--icon">
                        <h6>Read More</h6>
                        <span class="icon-arrow-right"></span>
                    </div>
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

    <nav class="pagination">             
        <?php
            echo paginate_links( array(
                'format'     => 'page/%#%',
                'current'    => $paged,
                'total'      => $destinations_query->max_num_pages,
                'mid_size'   => 3,    
                'end_size'   => 1,   
                'prev_text'  => __('<'),
                'next_text'  => __('>')
            ) );
        ?>
    </nav>
</div>