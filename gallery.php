<?php
	/**
     * Template Name: Gallery
     */
     get_header();
?>

<div class="banner">
<?php echo wp_get_attachment_image(get_field('banner_image'), 'full'); ?> 
    <div class="banner-content">
        <h1><?php the_field('banner_title'); ?></h1>
        <ul>
            <li><a href="<?php echo get_home_url(); ?>">Home <span class="icon-cheveron-down"></span></a></li>
            <li><?php the_field('banner_subtitle'); ?></li>
        </ul>
    </div>
</div>

<div class="gallery container">
    <div class="subtitle">
        <p>01</p>
        <span></span>
        <p>Gallery</p>
    </div>
    <h2 class="title">View  <span>Gallery</span></h2>
    <div class="gallery--inner">
		<?php
 		    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'galleries', 
                'post_status' => 'publish',
		    	'posts_per_page'    => 9,
		    	'paged' => $paged, 
                'orderby' => 'date', 
                'order' => 'DESC',   
            );

            $cpt_query = new WP_Query($args);
            if ($cpt_query->have_posts()) : while ($cpt_query->have_posts()) : $cpt_query->the_post();
        ?>
            <div class="gallery-box">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                <a class="about-gallery" href="<?php echo esc_url(get_the_permalink()); ?>">
                    <h4><?php the_title(); ?></h4>
                </a>
            </div>
		<?php                               
            endwhile;
            wp_reset_postdata();
            else :
                echo 'No gallery found in this category.';
            endif;
        ?>
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
</div>

<div class="trip-advisor container">
    <div id="TA_cdsratingsonlywide658" class="TA_cdsratingsonlywide advisor">
        <ul id="5OtT1yWd" class="TA_links m3IM2T">
            <li id="pSAeZgpYH" class="WegiAuasNWm">
                <a target="_blank" href="https://www.tripadvisor.com/Attraction_Review-g737141-d8290462-Reviews-Balkan_Natural_Adventure-Pec.html">
                    <img src="https://www.tripadvisor.com/img/cdsi/img2/branding/v2/Tripadvisor_lockup_horizontal_secondary_registered-18034-2.svg" alt="TripAdvisor"/>
                </a>
            </li>
        </ul>
    </div>
    <script async src="https://www.jscache.com/wejs?wtype=cdsratingsonlywide&amp;uniq=658&amp;locationId=8290462&amp;lang=en_US&amp;border=true&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>
    </div>
<script async src="https://www.jscache.com/wejs?wtype=cdsratingsonlynarrow&amp;uniq=953&amp;locationId=8290462&amp;lang=en_US&amp;border=true&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>

<div class="share-item container">
    <h3>Share this via:</h3>
    <ul class="share">
    <?php
        if (get_field('facebook_url')):
            $facebook_url = urlencode(get_field('facebook_url'));
    ?>
        <li><a class="fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $facebook_url; ?>"><span class="icon-social-facebook"></span></a></li>
    <?php
        endif;
        if (get_field('twitter_url')):
            $twitter_url = urlencode(get_field('twitter_url'));
    ?>
        <li><a class="tw" href="https://twitter.com/intent/tweet?url=<?php echo $twitter_url; ?>"><span class="icon-twitter"></span></a></li>
    <?php
        endif;
        if (get_field('linkedin_url')):
            $linkedin_url = urlencode(get_field('linkedin_url'));
    ?>
        <li><a class="in" href="https://www.linkedin.com/shareArticle?url=<?php echo $linkedin_url; ?>"><span class="icon-linkedin2"></span></a></li>
    <?php
        endif;
    ?>
    </ul>
</div>

<?php

    get_footer();
?>