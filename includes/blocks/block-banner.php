<div class="banner container">
<?php echo wp_get_attachment_image(get_field('banner_image'), 'full', false, array(
    'alt' => '',
    'loading' => 'eager',
    'fetchpriority' => 'high',
    'decoding' => 'sync'
)); ?> 
    <div class="banner-content">
        <h1><?php echo esc_html(get_field('banner_title')); ?></h1>
        <ul>
            <li><a href="<?php echo get_home_url(); ?>">Home <span class="icon-cheveron-down"></span></a></li>
            <li><?php echo esc_html(get_field('banner_subtitle')); ?></li>
        </ul>
    </div>
</div>