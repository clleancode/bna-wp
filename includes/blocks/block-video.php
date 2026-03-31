<div class="section-video">
    <?php echo wp_get_attachment_image(get_field('video_image'), 'full'); ?> 
    <div class="video--content container">
        <div class="content--inner">
            <h2><?php the_field('section_title'); ?></h2>
           
<!-- //                 $link = get_field('button');
//                 if( $link ): 
//                     $link_url = $link['url'];
//                     $link_title = $link['title'];
//                     $link_target = $link['target'] ? $link['target'] : '_self';
//                      $file = get_field('video');  -->
			<?php 
            $file = get_field('button');
            if( $file ): ?>
                
            <a class="btn" href="<?php echo $file['url']; ?>" data-fancybox data-width="640" data-height="360"> Watch Video  <span class="icon-angle-double-down"></span></a>
            <?php endif; ?>
        </div>
        <?php
            $file = get_field('video');
            if( $file ): ?>
            <a href="<?php echo $file['url']; ?>" class="video-button" data-fancybox data-width="640" data-height="360">
                <span class="icon-play"></span>
            </a>
        <?php endif; ?>
    </div>
</div>