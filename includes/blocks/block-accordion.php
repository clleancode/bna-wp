<?php $numberOfSlides = 0; ?>
<?php while(have_rows('accordion')): the_row(); $numberOfSlides++; ?>
        <div class="accordion section-accordion container">
            <?php while(have_rows('accordion_box')): the_row(); $numberOfSlides++; ?>
                <div class="accordion--card">
                    <div class="accordion--card-header">
                        <h5 class="paragraph"><?php the_sub_field('accordion_title'); ?></h5>
                        <span class="icon-up-right arrow"></span>
                    </div>
                    <div class="accordion--card-body">
                        <p><?php the_sub_field('accordion_paragraph'); ?></p>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
<?php endwhile; wp_reset_postdata(); ?>