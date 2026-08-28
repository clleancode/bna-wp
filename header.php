<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
    <!-- Google Tag Manager -->
    <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id=GTM-WFWLS66' + dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WFWLS66');</script> -->
    <!-- End Google Tag Manager -->
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="<?php bloginfo('template_url'); ?>/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#000000">
    <meta name="keywords" content="" />
    <meta name="author" content="">
    

    <?php wp_head(); ?>


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GYKMKVLF7Y"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-GYKMKVLF7Y');
    </script>

    <script src="https://analytics.ahrefs.com/analytics.js" data-key="zNNmFE8Pi/FahckH7iAKVg" async></script>
</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WFWLS66"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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
                                    <label class="sr-only" for="header-search-mobile"><?php esc_html_e( 'Search', 'balkan-nature-adventure' ); ?></label>
                                    <input id="header-search-mobile" type="search" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'balkan-nature-adventure' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
                                    <button type="submit" class="btnSearch" aria-label="<?php esc_attr_e( 'Submit search', 'balkan-nature-adventure' ); ?>"><span id="search" class="icon-search" aria-hidden="true"></span></button>
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
                        <label class="sr-only" for="header-search-overlay"><?php esc_html_e( 'Search', 'balkan-nature-adventure' ); ?></label>
                        <input id="header-search-overlay" type="search" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'balkan-nature-adventure' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
                        <button type="submit" class="btnSearch" aria-label="<?php esc_attr_e( 'Submit search', 'balkan-nature-adventure' ); ?>">
							<span aria-hidden="true"></span>
							<span aria-hidden="true"></span>
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
            j.src = 'https://www.googletagmanager.com/gtm.js?id=GTM-WFWLS66' + dl;

            f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WFWLS66');
    }

    // më e mirë se scroll vetëm
    window.addEventListener('mousemove', loadGTM, { once: true });
    window.addEventListener('scroll', loadGTM, { once: true });
    window.addEventListener('click', loadGTM, { once: true });

    // fallback
    setTimeout(loadGTM, 4000);

})();
</script>