<div class="about--location container">
    <div class="location--content">
        <div class="subtitle">
            <p><?php echo esc_html(get_field('section_number')); ?></p>
            <span></span>
            <p><?php echo esc_html(get_field('subtitle')); ?></p>
        </div>
        <h2 class="title"><?php echo esc_html(get_field('bold_title')); ?><span> <?php echo esc_html(get_field('title')); ?> </span></h2>
        <p><?php echo esc_html(get_field('about-location__content')); ?></p>
        <div class="years-of-experience">
            <span class="icon-up-right"></span>
            <span class="years"><?php echo esc_html(get_field('number')); ?></span>
            <div class="experience">
                <span>+</span>
                <p><?php echo esc_html(get_field('name')); ?></p>
            </div>
        </div>
    </div>
    <div class="location--images">
        <span class="icon-night-camp-2"></span>
        <?php 
            $images = get_field('location_image');
            $size = 'full'; 
            if( $images ): ?>
            <?php foreach( $images as $image_id ): ?>
                <?php echo wp_get_attachment_image( $image_id, $size ); ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
