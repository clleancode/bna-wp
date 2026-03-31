<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id=GTM-WFWLS66' + dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WFWLS66');</script>
    <!-- End Google Tag Manager -->

    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/img/favicons/favicon-16x16.png">
    <link rel="mask-icon" href="<?php bloginfo('template_url'); ?>/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicons/favicon.ico">
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
<div class="header">
    <div class="wrapper">
        <div class="header--inner">
            <div class="logo">
                <a class="logo-link" href="<?php echo get_home_url(); ?>" aria-label="Logo">
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