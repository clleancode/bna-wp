<?php $numberOfSlides = 0; ?>
<div class="who--we--are">
    <?php echo wp_get_attachment_image(get_field('section_image'), 'full'); ?> 
    <div class="content">
        <div class="content--inner">
            <div class="subtitle">
                <p><?php the_field('section_number'); ?></p>
                <span></span>
                <p><?php the_field('subtitle'); ?></p>
            </div>
            <h2 class="title"><?php the_field('title'); ?></h2>
            <div class="mission--boxes">
                <?php while(have_rows('mission_boxes')): the_row(); $numberOfSlides++; ?>
                    <div class="mission--box">
                        <div class="mission--box-content">
                            <?php
                                $icon_value = get_sub_field('select_icon');
                                if ($icon_value == 'security') {
                                  echo '<span class="icon-security"></span>';
                                } elseif ($icon_value == 'layer') {
                                  echo '<span class="icon-layer"></span>';
                                } elseif ($icon_value == 'services') {
                                  echo '<span class="icon-services "></span>';
                                }
                            ?>
                            <h3><?php the_sub_field('box_title'); ?></h3>
                            <p><?php the_sub_field('box_content'); ?></p>
                            <span class="line"></span>
                        </div>
                    </div>
                <?php endwhile; ?> 
            </div>
        </div>
    </div>
</div>
