<?php $numberOfSlides = 0; ?>
<div class="documents container">
    <h2 class="title"><?php the_field('bold_title'); ?></h2>
    <div class="documents-inner">
        <?php while ( have_rows( 'documents' ) ) : the_row(); $numberOfSlides++; ?>
            <a href="<?php echo esc_url( get_sub_field( 'pdf_file' )['url'] ); ?>" target="_blank" rel="noopener noreferrer" class="document">
                <span class="icon-file-pdf"></span>
                <p><strong><?php the_sub_field( 'pdf_title' ); ?></strong></p>
                <span class="icon-arrow-right"></span>
            </a>
        <?php endwhile; ?>
    </div>
</div>
