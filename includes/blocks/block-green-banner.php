<div class="tent-camping container">
    <?php 
        $images = get_field('background_image');
        $size = 'full';
        if( $images ): ?>
        <?php foreach( $images as $image_id ): ?>
            <?php echo wp_get_attachment_image( $image_id, $size ); ?>
        <?php endforeach; ?>
   <?php endif; ?>
    <div class="tent-camping--inner">
        <h2 class="title"><?php the_field('bold_title'); ?> <br> <span><?php the_field('title'); ?></span></h2>
        <span><?php the_field('background_text'); ?></span>
        <?php 
            $link = get_field('button');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
        <a class="btn" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?> <span class="icon-angle-double-down"></span></a>
        <?php endif; ?>
    </div>
</div>