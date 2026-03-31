<div class="content--section container">
    <?php
        if(get_field('bold_title')):
    ?>
    <h2 class="title"><?php the_field('bold_title'); ?></h2>
    <?php endif; ?>
    <?php the_field('section-content'); ?>
</div>