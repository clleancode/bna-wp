<div class="about-us--services container">
    <div class="about-us--top">
        <div class="about-us--content-left">
            <div class="subtitle">
                <p><?php echo esc_html(get_field('section_number')); ?></p>
                <span></span>
                <p><?php echo esc_html(get_field('subtitle')); ?></p>
            </div>
            <h2 class="title"><?php echo esc_html(get_field('bold_title')); ?><br> <span><?php echo esc_html(get_field('title')); ?></span></h2>
        </div>
        <div class="about-us--content-right">
            <?php the_field('content'); ?>
        </div>
    </div>
</div>