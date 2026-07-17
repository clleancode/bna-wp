<?php $numberOfSlides = 0; ?>
<div class="section--boxes container">
    <div class="subtitle">
        <p><?php echo esc_html(get_field('section_number')); ?></p>
        <span></span>
        <p><?php echo esc_html(get_field('subtitle')); ?></p>
    </div>
    <h2 class="title"><?php echo esc_html(get_field('title')); ?>  <br> <span><?php echo esc_html(get_field('bold_title')); ?></span></h2>
    <div class="boxes">
        <?php while(have_rows('location_box')): the_row(); $numberOfSlides++; ?>
            <?php 
                $link = get_sub_field('link_url');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="box" href="<?php echo esc_url( $link_url ); ?>">
            <?php echo wp_get_attachment_image(get_sub_field('box_image'), 'full'); ?> 
                <div class="box--inner">
                    <div class="title">
                        <span></span>
                        <h5> <?php the_sub_field('box_title'); ?> </h5>
                    </div>
                    <p><?php the_sub_field('box-text'); ?></p>
                    <span></span>
                    <div class="box--icon">
                        <h6>Read More</h6>
                        <span class="icon-arrow-right"></span>
                    </div>
                </div>
            </a>
            <?php endif; ?>
        <?php endwhile; wp_reset_postdata(); ?> 
    </div>
    <?php 
        $link = get_field('button');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
        <a class="btn" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?>  <span class="icon-angle-double-down"></span></a>
    <?php endif; ?>
</div>