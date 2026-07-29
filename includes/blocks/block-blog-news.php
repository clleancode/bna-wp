
<div class="blog section--blog container">
    <div class="blog--inner blog-section--inner">
        <?php
 		    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 9,
                'paged'          => $paged,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => 17,
                    ),
                ),
            );
            $cpt_query = new WP_Query($args);
            if ($cpt_query->have_posts()) : while ($cpt_query->have_posts()) : $cpt_query->the_post();
    	?>
            <a class="blog-box" href="<?php echo esc_url(get_the_permalink()); ?>">
                <?php
                    $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                    echo wp_get_attachment_image( $thumbnail_id, 'adventure-card' );
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
	<div class="blog--section-right">
        <div class="blog-category">
            <h5>Category</h5>
            <ul>
                <?php
                $post_ids = array(1781, 1775); 

                foreach ($post_ids as $post_id) :
                    $post = get_post($post_id);
                    if ($post) : ?>
                        <li>
                            <a href="<?php echo get_permalink($post_id); ?>">
                                <?php echo esc_html(get_the_title($post)); ?>
                                <span class="icon-up-right"></span>
                            </a>
                        </li>
                    <?php endif;
                endforeach;
                ?>
            </ul>
        </div>
       <div class="recent-news">
          <h5>Recent News</h5>
 		    <?php
     	    	$term = get_queried_object();
            		$args = array(
                		'post_type' 		=> 'post',   
               		 	'post_status' 		=> 'publish',
                		'orderby' 			=> 'date', 
                		'order' 			=> 'DESC',   
		    			'posts_per_page'    => 3,
            		);

            		$destinations_query = new WP_Query($args);

            		if ($destinations_query->have_posts()) :
               		 while ($destinations_query->have_posts()) : $destinations_query->the_post();
    		?>
            <?php
                $thumbnail_id = get_post_thumbnail_id();
                ?>
                <a href="<?php echo esc_url(get_the_permalink()); ?>" class="recent-news-box">
                    <?php if ($thumbnail_id): ?>
                        <?php echo wp_get_attachment_image($thumbnail_id, 'medium', false, array('alt' => get_the_title())); ?>
                    <?php endif; ?>
                    <div class="news--info">
                        <h6><?php the_title(); ?></h6>
                        <span></span>
                        <p><span class="icon-calendar"></span> November 23,2022</p>
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
</div>

<nav class= "pagination">             
   <?php
      echo paginate_links( array(
          'format'  => 'page/%#%',
          'current' => $paged,
          'total'   => $cpt_query->max_num_pages,
          'mid_size'        => 2,
          'prev_text'       => __('<'),
          'next_text'       => __('>')
       ) );
    ?>
</nav>
