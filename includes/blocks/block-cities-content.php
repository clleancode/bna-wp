<div class="faq--travel container">
    <div class="travel--information">
        <div class="subtitle">
            <p><?php the_field('section_number'); ?></p>
            <span></span>
            <p><?php the_field('subtitle'); ?></p>
        </div>
       <?php the_field('content'); ?>
    </div>
    <?php echo wp_get_attachment_image(get_field('the_right_image'), 'full'); ?> 
</div>