<div class="about-us--services container">
    <div class="about-us--top">
        <div class="about-us--content-left">
            <div class="subtitle">
                <p><?php the_field('section_number'); ?></p>
                <span></span>
                <p><?php the_field('subtitle'); ?></p>
            </div>
            <h2 class="title"><?php the_field('bold_title'); ?><br> <span><?php the_field('title'); ?></span></h2>
        </div>
        <div class="about-us--content-right">
            <?php the_field('content'); ?>
        </div>
    </div>
</div>