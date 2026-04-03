        <div class="certificates">
            <div class="container">
                <?php if( have_rows('certificates', 'option') ): ?>
                    <?php while( have_rows('certificates', 'option') ): the_row(); 
                        $link = get_sub_field('certificate_link', 'option'); 
                        $image_id = get_sub_field('certificate_image', 'option'); 
                        $image = wp_get_attachment_image_src($image_id, 'full');
                        $alt   = trim( (string) get_post_meta( $image_id, '_wp_attachment_image_alt', true ) );
                        if ( $alt === '' ) {
                            $alt = 'Certificate';
                        }
                    ?>
                        <?php if( $link && $image ): ?>
                            <a href="<?php echo esc_url($link); ?>" target="_blank" aria-label="<?php echo esc_attr( $alt ); ?>">
                                <img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="150" height="55" loading="lazy" decoding="async">
                            </a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="footer container">
            <div class="footer-top">
                <h2><?php the_field('newsletter_bold_title', 'option') ?> <br> <span><?php the_field('newsletter_title', 'option') ?></span></h2>
                <div class="newsletter">
                    <span class="icon-envelope"></span>
                    <input type="email" id="email" name="email"  placeholder="Email Address">
                    <a href="#" class="btn">Subscribe <span class="icon-angle-double-down"></span></a>
                </div>
            </div>
            <div class="footer-center">
                <div class="row">
                    <a href="<?php echo get_home_url(); ?>" class="footer-logo-link" aria-label="Footer Logo Link">
                        <?php echo wp_get_attachment_image( get_field( 'footer_logo', 'option' ), 'full', false, array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?> 
                    </a>
                    <p><?php the_field('footer_paragraph', 'option') ?></p>
                    <div class="social-media">
                        <?php
					    	if(get_field('facebook_url', 'options')):
					    ?>	
					    	<a href="<?php the_field('facebook_url', 'options'); ?>" target="_blank" rel="noopener" aria-label="Facebook Link"><span class="icon-social-facebook"></span></a>
                            
					    <?php
					    	endif;

					    	if(get_field('twitter_url', 'options')):
					    ?>
    
					    	<a href="<?php the_field('twitter_url', 'options'); ?>" target="_blank" rel="noopener" aria-label="Twitter Link"><span class="icon-twitter"></span></a>
                            
					    <?php
					    	endif;

					    	if(get_field('instagram_url', 'options')):
					    ?>
    
					    	<a href="<?php the_field('instagram_url', 'options'); ?>" target="_blank" rel="noopener" aria-label="Instagram Link"><span class="icon-instagram"></span></a>
                            
					    <?php
					    	endif;
                            if(get_field('linkedin_url', 'options')):
					    ?>
                            <a href="<?php the_field('linkedin_url', 'options'); ?>" target="_blank" rel="noopener" aria-label="Linkedin Link"><span class="icon-linkedin2"></span></a>
                            
                        <?php
					    	endif;
                        ?>
                    </div>
                </div>
                <?php $numberOfSlides = 0; ?>
                <?php while(have_rows('footer_content', 'option')): the_row(); $numberOfSlides++; ?>
                    <div class="row">  
                        <p><?php the_sub_field('headlines', 'option'); ?></p>
                        <ul>
                            <?php while(have_rows('pages_link', 'option')): the_row(); $numberOfSlides++; ?>
                                <li><a href="<?php the_sub_field('page_link', 'option'); ?>"><?php the_sub_field('page_title', 'option'); ?></a></li>
                            <?php endwhile; wp_reset_postdata(); ?> 
                        </ul>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?> 
                <div class="row">
                   <?php the_field('content', 'option'); ?>
                </div>
            </div>
            <div class="footer-bottom">
                <?php the_field('copyright', 'option'); ?>
                <div class="footer-bottom--left">
                    <?php while(have_rows('site_links', 'option')): the_row(); $numberOfSlides++; ?>
                        <a href="<?php the_sub_field('site_link', 'option'); ?>"><?php the_sub_field('site_title', 'option'); ?></a>
                    <?php endwhile; wp_reset_postdata(); ?> 
					
                </div>
            </div>
        </div>



    <?php wp_footer(); ?>

<!--Add the following script at the bottom of the web page (before </body></html>)-->
<!-- <script type="text/javascript">function add_chatinline(){var hccid=32257899;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline();</script> -->

<script>
window.addEventListener('load', function() {
    setTimeout(function(){
        function add_chatinline(){
            var hccid=32257899;
            var nt=document.createElement("script");
            nt.async=true;
            nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;
            var ct=document.getElementsByTagName("script")[0];
            ct.parentNode.insertBefore(nt,ct);
        }
        add_chatinline();
    }, 2000); 
});
</script>
</body>
</html>