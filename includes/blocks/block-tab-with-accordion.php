<?php $numberOfSlides = 0; ?>
<div class="faq">
    <div class="container">
        <div class="topic ">
        <?php $activeTopicIndex = 0; ?>
            <?php $topicIndex = 0;  ?>
            <?php while(have_rows('topic_box')): the_row(); $numberOfSlides++; ?>
                <div class="topic--box <?php if ($activeTopicIndex === $topicIndex) echo 'active'; ?>">
                    <?php
                       $icon_value = get_sub_field('icon');
                       if ($icon_value == 'tent') {
                         echo '<span class="icon-tent1"></span>';
                       } elseif ($icon_value == 'bus') {
                         echo '<span class="icon-bus"></span>';
                       } elseif ($icon_value == 'fire') {
                         echo '<span class="icon-fire "></span>';
                       } elseif ($icon_value == 'house') {
                           echo '<span class="icon-house"></span>';
                       } elseif ($icon_value == 'summer camp') {
                           echo '<span class="icon-Summer-Camp"></span>';
                       } elseif ($icon_value == 'bicycle') {
                           echo '<span class="icon-bicycle"></span>';
                       } elseif ($icon_value == 'user') {
                           echo '<span class="icon-user"></span>';
                       } elseif ($icon_value == 'bed') {
                           echo '<span class="icon-bed"></span>';
                       } elseif ($icon_value == 'cat') {
                           echo '<span class="icon-cat"></span>';
                       }
                    ?>
                    <h4><?php the_sub_field('topic_title'); ?></h4>
                </div>
                <?php
                    if ($activeTopicIndex === $topicIndex) {
                        $activeTopicBlockIndex = $numberOfSlides - 1;
                    }
                    $topicIndex++;
                ?>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
    <?php $accordionIndex = 0; ?>
        <?php while(have_rows('accordian')): the_row(); $numberOfSlides++; ?>
            <?php $isFirstAccordion = true; ?>
            <div class="topic--block <?php if ($activeTopicBlockIndex === $accordionIndex) echo 'active'; ?>">
                <div class="accordion container">
                    <?php while(have_rows('accordian_box')): the_row(); $numberOfSlides++; ?>
                        <?php
                            if ( ! isset( $GLOBALS['bna_accordion_uid'] ) ) {
                                $GLOBALS['bna_accordion_uid'] = 0;
                            }
                            $GLOBALS['bna_accordion_uid']++;
                            $header_id = 'accordion-header-' . (int) $GLOBALS['bna_accordion_uid'];
                            $panel_id  = 'accordion-panel-' . (int) $GLOBALS['bna_accordion_uid'];
                        ?>
                        <div class="accordion--card">
                            <div
                                class="accordion--card-header"
                                id="<?php echo esc_attr( $header_id ); ?>"
                                aria-expanded="false"
                                aria-controls="<?php echo esc_attr( $panel_id ); ?>"
                            >
                                <h5 class="paragraph"><?php the_sub_field('accordian_title'); ?></h5>
                                <span class="icon-up-right arrow"></span>
                            </div>
                            <div class="accordion--card-body" id="<?php echo esc_attr( $panel_id ); ?>">
                                <p><?php the_sub_field('accordian_paragraph'); ?></p>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <div class="topic--video wrapper">
                <?php echo wp_get_attachment_image(get_sub_field('photo_of_video'), 'full'); ?> 
                    <?php
                        $file = get_sub_field('video');
                        if( $file ): ?>
                        <a href="<?php echo $file['url']; ?>" class="video-button" data-fancybox data-width="640" data-height="360">
                            <span class="icon-play"></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php
            $accordionIndex++; 
            $isFirstAccordion = false; 
        ?>
    <?php endwhile; wp_reset_postdata(); ?>
</div>









