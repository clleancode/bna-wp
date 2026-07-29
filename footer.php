<div class="certificates">
            <div class="container">
                <?php if( have_rows('certificates', 'option') ): ?>
                    <?php while( have_rows('certificates', 'option') ): the_row(); 
                        $link = get_sub_field('certificate_link', 'option'); 
                        $image_id = get_sub_field('certificate_image', 'option'); 
                        $image = wp_get_attachment_image_src($image_id, 'full'); 
                       
                    ?>
                        <?php if( $link && $image ): ?>
                            <a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener noreferrer">
                                <img src="<?php echo esc_url($image[0]); ?>" alt="certificates" width="150" height="55">
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
                        <?php echo wp_get_attachment_image(get_field('footer_logo', 'option'), 'full'); ?> 
                    </a>
                    <p><?php the_field('footer_paragraph', 'option') ?></p>
                    <div class="social-media">
                        <?php
                            if(get_field('facebook_url', 'options')):
                        ?>	
                            <a href="<?php the_field('facebook_url', 'options'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook Link"><span class="icon-social-facebook"></span></a>
                            
                        <?php
                            endif;

                            if(get_field('twitter_url', 'options')):
                        ?>
    
                            <a href="<?php the_field('twitter_url', 'options'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Twitter Link"><span class="icon-twitter"></span></a>
                            
                        <?php
                            endif;

                            if(get_field('instagram_url', 'options')):
                        ?>
    
                            <a href="<?php the_field('instagram_url', 'options'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram Link"><span class="icon-instagram"></span></a>
                            
                        <?php
                            endif;
                            if(get_field('linkedin_url', 'options')):
                        ?>
                            <a href="<?php the_field('linkedin_url', 'options'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Linkedin Link"><span class="icon-linkedin2"></span></a>
                            
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

    <div class="chat-container">
        <button
            type="button"
            class="chat-button"
            aria-label="Chat now"
            title="Chat now"
        >
            <svg viewBox="0 0 24 24" aria-hidden="true" width="24" height="24" style="display: block; fill: #fff;">
                <path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"></path>
            </svg>
            <span>Contact us</span>
        </button>
        <div class="chat-box" id="chatBox">
            <div class="chat-header">
                <span>Contact us</span>
                <button type="button" class="chat-close" id="chatCloseBtn" aria-label="Close chat" title="Close chat">&minus;</button>
            </div>
            <div class="chat-content">
               <?php echo do_shortcode('[contact-form-7 id="470d3a7" title="Chat"]') ?>
            </div>
        </div>
    </div>

    <?php wp_footer(); ?>

    <!-- <script type="text/javascript">
        function add_chatinline(){
            var hccid=32257899;
            var nt=document.createElement("script");
            nt.async=true;
            nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;
            var ct=document.getElementsByTagName("script")[0];
            ct.parentNode.insertBefore(nt,ct);
        }
        add_chatinline();
    </script> -->

    <!-- <script>
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
    </script> -->

    <!-- <script>
        window.__lc = window.__lc || {};
        window.__lc.license = 19736797;
        window.__lc.integration_name = "manual_onboarding";
        window.__lc.product_name = "livechat";
        ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
    </script>
    <noscript><a href="https://www.livechat.com/chat-with/19736797/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript> -->

</body>
</html>