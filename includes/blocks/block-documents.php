<?php $numberOfSlides = 0; ?>
<div class="documents container">
    <h2 class="title"><?php echo esc_html(get_field('bold_title')); ?></h2>
    <div class="documents-inner">
        <?php while(have_rows('documents')): the_row(); $numberOfSlides++; ?>
            <a href="<?php echo get_sub_field('pdf_file')['url']; ?>" target="_blank" class="document">
                <span class="icon-file-pdf"></span>
                <p><strong><?php the_sub_field('pdf_title'); ?></strong></p> 
                <span class="icon-arrow-right"></span>
            </a>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>

<div id="wpgpxmaps_755_1371349" class="wpgpxmaps">
    <div class="chartjs-size-monitor">
        <div class="chartjs-size-monitor-expand">
            <div class="">

            </div>
        </div>
        <div class="chartjs-size-monitor-shrink">
            <div class=""></div>
        </div>
    </div>
    
    <div id="wpgpxmaps_755_1371349" class="wpgpxmaps" style="
    clear: both;
">
    <div class="chartjs-size-monitor">
        <div class="chartjs-size-monitor-expand">
            <div class="">

            </div>
        </div>
        <div class="chartjs-size-monitor-shrink">
            <div class=""></div>
        </div>
    </div>
    