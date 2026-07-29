<div class="gallery">
    <div class="subtitle">
        <p><?php the_field('section_number'); ?></p>
        <span></span>
        <p><?php the_field('subtitle'); ?></p>
    </div>
    <h2 class="title"><?php the_field('bold_title'); ?> <br> <span><?php the_field('title'); ?></span></h2>
    <div class="gallery-boxes">
        <?php
            $args = array(
                'post_type' => 'galleries',
                'posts_per_page' => 4,
            );

            $galleries = new WP_Query( $args );
            if ( $galleries->have_posts() ) {
                while ( $galleries->have_posts() ) {
                    $galleries->the_post();
                    $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
        ?>
            <div class="gallery-boxes--inner">
                <a href="<?php the_permalink(); ?>" class="gallery-box">
                    <?php echo wp_get_attachment_image($thumbnail_id, 'full', false, array('alt' => '') ); ?> 
                    <div class="gallery-box-content">
                        <h3><?php the_title(); ?></h3>
                        <div class="content--subtitle">
                            <span></span>
                            <p>View Gallery</p>
                            <span></span>
                        </div>
                    </div>
                </a>
            </div>
        <?php
                }
            } 
            wp_reset_postdata();
        ?>
    </div>
    <div class="gallery-btn">
        <?php
        $galleries_page = get_page_by_path( 'gallery' );
        $galleries_url  = $galleries_page
            ? get_permalink( $galleries_page )
            : get_post_type_archive_link( 'galleries' );
        ?>
        <a class="btn" href="<?php echo esc_url( $galleries_url ); ?>">More Galleries  <span class="icon-angle-double-down"></span></a>
    </div>
</div>

