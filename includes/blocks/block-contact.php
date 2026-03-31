<?php $numberOfSlides = 0; ?>
<div class="contact">
    <div class="contact--top container">
        <div class="contact--info">
            <div class="subtitle">
                <p><?php the_field('section_number'); ?></p>
                <span></span>
                <p><?php the_field('subtitle'); ?></p>
            </div>
            <h2 class="title"><?php the_field('bold_title'); ?> <br> <span><?php the_field('title'); ?></span></h2>
            <div class="contact--main-cards">
                <?php while(have_rows('contact_card')): the_row(); $numberOfSlides++; ?>
                    <div class="contact--card">
                        <?php
                            $icon_value = get_sub_field('select_icon');
                            if ($icon_value == 'location') {
                              echo '<span class="icon-location"></span>';
                            } elseif ($icon_value == 'envelope') {
                              echo '<span class="icon-envelope"></span>';
                            } elseif ($icon_value == 'phone') {
                                echo '<span class="icon-phone"></span>';
                            } elseif ($icon_value == 'link') {
                              echo '<span class="icon-link "></span>';
                            }
                        ?>
                        <div class="contact--card-text">
                            <h4><?php the_sub_field('card_title') ?></h4>
                            <?php the_sub_field('content'); ?>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
        <div class="contact--form">
            <h3><?php the_field('form_title'); ?></h3>
            <p><?php the_field('form--paragraph'); ?></p>
            <?php echo do_shortcode('[contact-form-7 id="7f9fd52" title="Contact form 1"]'); ?>
        </div>
        <?php echo wp_get_attachment_image(get_field('background_image'), 'full'); ?> 
    </div>

    <div class="contact--bottom">
        <div class="mapouter">
            <div class="map">
                <?php
                    $embed_code = get_field('contact_map', false, false);
                ?>
                <iframe src="<?php echo esc_url($embed_code); ?>"></iframe>
            </div>
        </div>
    </div>
</div>