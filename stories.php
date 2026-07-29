<?php
/**
     * Template Name: Stories
    */
     get_header();
?>

<div class="banner container">
<img src="<?php bloginfo('template_url'); ?>/img/pics/biking4.jpg.webp" alt="Banner Image">
    <div class="banner-content">
        <h1><?php echo ucfirst(basename(get_permalink())); ?></h1>
        <ul>
            <li><a href="<?php echo get_home_url(); ?>">Home <span class="icon-cheveron-down"></span></a></li>
            <li><?php echo  ucfirst(basename(get_permalink())); ?></li>
        </ul>
    </div>
</div>

<div class="blog section--blog container">
    <div class="blog--inner blog-section--inner">
        <?php
 		    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $category = get_queried_object();
            $args = array();

                $args = array(
                    'post_type' => 'post', 
                    'post_status' => 'publish',
		        	'posts_per_page'    => 9,
		        	'paged'             => $paged,
                    'orderby'           => 'date',
                    'order'             => 'DESC',
		    	    'category_name'     => 'other-news-from-the-region, peaks-of-the-balkans-blog',
                    'cat'               => $category->cat_ID
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
            <?php 
                $args = array(
                    'taxonomy'        => 'category',
                    'orderby'         => 'name',  
                    'order'           => 'ASC',
                    'include'         => array( 
                        get_term_by('slug', 'other-news-from-the-region', 'category')->term_id,
                        get_term_by('slug', 'peaks-of-the-balkans-blog', 'category')->term_id
                    ),
                    'post__not_in'    => array($category->cat_ID),  
                );
                $categories = get_categories($args);
                if ($categories):
            ?>                         
                <ul>
                    <?php foreach ($categories as $cat): ?>
                        <li> <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?><span class="icon-up-right"></span></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
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

            <a href="<?php echo esc_url(get_the_permalink()); ?>" class="recent-news-box">
                <?php
                    $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                    echo wp_get_attachment_image( $thumbnail_id, 'medium' );
                ?>
                <div class="news--info">
                    <h6><?php the_title(); ?></h6>
                    <span></span>
                    <p><span class="icon-calendar"></span> <?php echo get_the_date('F j, Y'); ?></p>
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

<?php include('includes/blocks/block-trip-advisor.php'); ?>

<?php
     get_footer();
?>
