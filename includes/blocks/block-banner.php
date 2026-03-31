<div class="banner container">
<?php echo wp_get_attachment_image(get_field('banner_image'), 'full', false, array('alt' => '')); ?> 
    <div class="banner-content">
        <h1><?php the_field('banner_title'); ?></h1>
        <ul>
            <li><a href="<?php echo get_home_url(); ?>">Home <span class="icon-cheveron-down"></span></a></li>
            <li><?php the_field('banner_subtitle'); ?></li>
        </ul>
    </div>
</div>