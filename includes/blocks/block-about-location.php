<div class="about--location container">
    <div class="location--content">
        <div class="subtitle">
            <p><?php the_field('section_number'); ?></p>
            <span></span>
            <p><?php the_field('subtitle'); ?></p>
        </div>
        <h2 class="title"><?php the_field('bold_title'); ?><span> <?php the_field('title'); ?> </span></h2>
        <p><?php the_field('about-location__content'); ?></p>
        <div class="years-of-experience">
            <span class="icon-up-right"></span>
            <span class="years"><?php the_field('number'); ?></span>
            <div class="experience">
                <span>+</span>
                <p><?php the_field('name'); ?></p>
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
