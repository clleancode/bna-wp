<div class="container">
    <div style="width: 100%;">
       <?php
       $custom_code = get_field( 'custom_code' );
       $custom_code = is_string( $custom_code ) ? $custom_code : '';
       $post_id     = get_the_ID();
       $author_id   = $post_id ? (int) get_post_field( 'post_author', $post_id ) : 0;

       if ( $author_id && user_can( $author_id, 'unfiltered_html' ) ) {

           echo $custom_code; 
       } else {

           echo bna_kses_embed( $custom_code );
       }
       ?>
    </div>
</div>
