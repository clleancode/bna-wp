<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
    <!-- Google Tag Manager -->
    <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM_ID');</script> -->
    <!-- End Google Tag Manager -->
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="<?php bloginfo('template_url'); ?>/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#000000">
    <meta name="keywords" content="" />
    <meta name="author" content="">
    

    <?php wp_head(); 
    $ga_id = get_field('ga_measurement_id', 'option');
    $gtm_id = get_field('gtm_container_id', 'option');
    $ahrefs_key = get_field('ahrefs_key', 'option');
    ?>


    <?php if ( ! empty( $ga_id ) ) : ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($ga_id); ?>"></script>
    <script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', '<?php echo esc_js($ga_id); ?>');
</script>
    <?php endif; ?>

    <?php if ( ! empty( $ahrefs_key ) ) : ?>
<script src="https://analytics.ahrefs.com/analytics.js"
        data-key="<?php echo esc_attr($ahrefs_key); ?>"
        async></script>
    <?php endif; ?>
</head>

<body <?php body_class(); ?>>
    <?php if ( ! empty( $gtm_id ) ) : ?>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr($gtm_id); ?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php endif; ?>
<div class="header ">
    <div class="wrapper">
        <div class="header--inner">
            <div class="logo">
                <a class="logo-link" href="<?php echo esc_url( home_url('/') ); ?>" aria-label="Logo">
                    <?php echo wp_get_attachment_image(get_field('logo_header_image', 'option'), 'full'); ?> 
                </a>
            </div>
            <div class="menu-mobile">
                <div class="burger-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="mobile-menu">
                    <div class="items">
                        <ul>
                            <?php
                                wp_nav_menu( 
                                    array( 
                                        'theme_location' => 'primary',
                                        'container' => '',
                                        'add_li_class'  => 'menu-mobile-item',
                                    ) 
                                ); 
                            ?>
                        </ul>
                        <h3><?php the_field('header_text'); ?></h3>
                        <div class="menu-mobile--buttons"> 
                            <div class="search-box">
                                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <input type="search" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'your-theme-textdomain' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                                    <button type="submit" class="btnSearch"><span id="search" class="icon-search"></span></button>
                                </form>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="menu">
                    <?php
                        wp_nav_menu( 
                            array( 
                                'theme_location' => 'primary'
                            ) 
                        ); 
                    ?>
            </div>
            <div id="searchOverlay" class="overlay">
				<?php echo wp_get_attachment_image(get_field('search--background_image', 'option'), 'full'); ?> 
				<div class="close-btn">
					<span></span>
					<span></span>
				</div>
				
          
                <div class="overlay-content">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input type="search" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'your-theme-textdomain' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                        <button type="submit" class="btnSearch">
							<span></span>
							<span></span>
						</button>
                    </form>
                </div>
            </div>
            <div class="header--buttons">
                <div class="search-box--inner">
                    <span class="icon-search search"></span>
                </div>
            </div>
        </div>
    </div>
	
</div>


<?php if ( ! empty( $gtm_id ) ) : ?>
<script>
(function () {

    let gtmLoaded = false;

    function loadGTM() {
        if (gtmLoaded) return;
        gtmLoaded = true;

        (function(w,d,s,l,i){
            w[l]=w[l]||[];
            w[l].push({'gtm.start': new Date().getTime(), event:'gtm.js'});

            var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),
                dl=l!='dataLayer'?'&l='+l:'';

            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;

            f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','<?php echo esc_js($gtm_id); ?>');
    }

    // më e mirë se scroll vetëm
    window.addEventListener('mousemove', loadGTM, { once: true });
    window.addEventListener('scroll', loadGTM, { once: true });
    window.addEventListener('click', loadGTM, { once: true });

    // fallback
    setTimeout(loadGTM, 4000);

})();
</script>
<?php endif; ?>
