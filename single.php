<?php

    get_header();
    ?>
    <div class="">test</div>
    <?php

    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
                the_content();
        endwhile; 
    endif;



    get_footer();
?>
