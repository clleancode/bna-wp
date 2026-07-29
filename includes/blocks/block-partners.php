<?php $numberOfSlides = 0; ?>
<div class="partners container">
    <span></span>
    <?php while(have_rows('partners')): the_row(); $numberOfSlides++; ?>
        <?php 
        $link = get_sub_field('partners_link');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <a href="<?php echo esc_url( $link_url ); ?>">
            <?php echo wp_get_attachment_image(get_sub_field('partners_logo'), 'full'); ?> 
        </a>
        <?php endif; ?>
    <?php endwhile; ?>
</div>