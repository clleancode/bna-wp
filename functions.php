<?php
	/**
	 * ClleanCode functions and definitions
	 *
	 * @link https://developer.wordpress.org/themes/basics/theme-functions/
	 *
	 * @package ClleanCode
	 */

	/**
	* Theme Setup
	*/

	if (!function_exists('balkan_nature_adventure_setup')) :
		function balkan_nature_adventure_setup() {
			add_theme_support( 'title-tag' );
			add_theme_support( 'post-thumbnails' );

			register_nav_menus(
				array(
					'primary'=> __('Primary Menu'),
					'mobile'=> __('Mobile Menu')
				)
			);
		}
	endif;

	add_action( 'after_setup_theme', 'balkan_nature_adventure_setup' );


function balkan_nature_adventure_scripts() {
	$theme_dir     = get_template_directory();
	$theme_dir_uri = get_template_directory_uri();
	$style_dir     = get_stylesheet_directory();

	// Styles.
	// wp_enqueue_style(
	// 	'swiper',
	// 	$theme_dir_uri . '/css/swiper.min.css',
	// 	array(),
	// 	'0.1'
	// );

	wp_enqueue_style(
		'balkan_nature_adventure_style_styles',
		$theme_dir_uri . '/css/style.css',
		array(),
		file_exists( $theme_dir . '/css/style.css' ) ? filemtime( $theme_dir . '/css/style.css' ) : null
	);

	// wp_enqueue_style(
	// 	'balkan_nature_adventure_fancybox_styles',
	// 	$theme_dir_uri . '/css/fancybox.min.css',
	// 	array(),
	// 	file_exists( $theme_dir . '/css/fancybox.min.css' ) ? filemtime( $theme_dir . '/css/fancybox.min.css' ) : null
	// );

	// Scripts.
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script(
		'fancybox',
		$theme_dir_uri . '/js/fancybox.min.js',
		array( 'jquery' ),
		file_exists( $theme_dir . '/js/fancybox.min.js' ) ? filemtime( $theme_dir . '/js/fancybox.min.js' ) : '3.5.8',
		true
	);

	wp_enqueue_script(
		'swiper',
		$theme_dir_uri . '/js/swiper.min.js',
		array(),
		file_exists( $theme_dir . '/js/swiper.min.js' ) ? filemtime( $theme_dir . '/js/swiper.min.js' ) : '10.0.1',
		true
	);

	wp_enqueue_script(
		'main-js',
		$theme_dir_uri . '/js/script.js',
		array( 'jquery' ),
		file_exists( $theme_dir . '/js/script.js' ) ? filemtime( $theme_dir . '/js/script.js' ) : null,
		true
	);

     wp_enqueue_script(
         'bundle-js',
         $theme_dir_uri . '/js/bundle.js',
         array(),
         filemtime($theme_dir . '/js/bundle.js'),
         true
     );

	wp_localize_script(
		'main-js',
		'specialObj',
		array(
			'ajaxurl'  => admin_url( 'admin-ajax.php' ),
			'security' => wp_create_nonce( 'load_posts' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'balkan_nature_adventure_scripts' );

	/**
	 * Theme Settings
	 */

	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
	}

	/**
	 * Register ACF Blocks
	 */

	function acf_content_block() {
		if( function_exists('acf_register_block') ) {
			acf_register_block(array(
				'name'				=> 'block-home--banner-slider',
				'title'				=> __('AB Block - Home Banner Slider'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-home--banner-slider.php'
			));

			acf_register_block(array(
				'name'				=> 'block-products',
				'title'				=> __('AB Block - Products'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-products.php'
			));

			acf_register_block(array(
				'name'				=> 'block-about-us',
				'title'				=> __('AB Block - About Us'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-about-us.php'
			));

			acf_register_block(array(
				'name'				=> 'block-video',
				'title'				=> __('AB Block - Video'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-video.php'
			));

			acf_register_block(array(
				'name'				=> 'block-location',
				'title'				=> __('AB Block - Location'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-location.php'
			));

			acf_register_block(array(
				'name'				=> 'block-overlay-boxes',
				'title'				=> __('AB Block - Overlay Boxes'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-overlay-boxes.php'
			));

			acf_register_block(array(
				'name'				=> 'block-why-choose-us',
				'title'				=> __('AB Block - Why Choose Us'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-why-choose-us.php'
			));

			acf_register_block(array(
				'name'				=> 'block-green-banner',
				'title'				=> __('AB Block - Green Banner'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-green-banner.php'
			));

			acf_register_block(array(
				'name'				=> 'block-gallery-images',
				'title'				=> __('AB Block - Gallery Images'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-gallery-images.php'
			));

			acf_register_block(array(
				'name'				=> 'block-testimonial',
				'title'				=> __('AB Block - Testimonial'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-testimonial.php'
			));

			acf_register_block(array(
				'name'				=> 'block-banner',
				'title'				=> __('AB Block - Banner'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-banner.php'
			));

			acf_register_block(array(
				'name'				=> 'block-about',
				'title'				=> __('AB Block - About'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-about.php'
			));

			acf_register_block(array(
				'name'				=> 'block-partners',
				'title'				=> __('AB Block - Partners'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-partners.php'
			));

			acf_register_block(array(
				'name'				=> 'block-who-we-are',
				'title'				=> __('AB Block - Who We Are'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-who-we-are.php'
			));

			acf_register_block(array(
				'name'				=> 'block-tab-with-accordion',
				'title'				=> __('AB Block - Tab With Accordion'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-tab-with-accordion.php'
			));

			acf_register_block(array(
				'name'				=> 'block-discover-more',
				'title'				=> __('AB Block - Discover More'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-discover-more.php'
			));

			acf_register_block(array(
				'name'				=> 'block-contact',
				'title'				=> __('AB Block - Contact'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-contact.php'
			));

			acf_register_block(array(
				'name'				=> 'block-content',
				'title'				=> __('AB Block - Content'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-content.php'
			));

			acf_register_block(array(
				'name'				=> 'block-cities-content',
				'title'				=> __('AB Block - Cities Content'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-cities-content.php'
			));

			acf_register_block(array(
				'name'				=> 'block-cities-content--reverse',
				'title'				=> __('AB Block - Cities Content Reverse'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-cities-content--reverse.php'
			));

			acf_register_block(array(
				'name'				=> 'block-documents',
				'title'				=> __('AB Block - Documents'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-documents.php'
			));

			acf_register_block(array(
				'name'				=> 'block-about-location',
				'title'				=> __('AB Block - About Location'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-about-location.php'
			));

			acf_register_block(array(
				'name'				=> 'block-destination-kosove',
				'title'				=> __('AB Block - Destination Kosove'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-destination-kosove.php'
			));

			acf_register_block(array(
				'name'				=> 'block-destination-albania',
				'title'				=> __('AB Block - Destination Albania'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-destination-albania.php'
			));

			acf_register_block(array(
				'name'				=> 'block-destination-montenegro',
				'title'				=> __('AB Block - Destination Montenegro'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-destination-montenegro.php'
			));

			acf_register_block(array(
				'name'				=> 'block-content-with-image',
				'title'				=> __('AB Block - Content With Image'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-content-with-image.php'
			));

			acf_register_block(array(
				'name'				=> 'block-slider',
				'title'				=> __('AB Block - Slider'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-slider.php'
			));

			acf_register_block(array(
				'name'				=> 'block-accordion',
				'title'				=> __('AB Block - Accordion'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-accordion.php'
			));
			
			acf_register_block(array(
				'name'				=> 'block-destinations',
				'title'				=> __('Block - Destinations'),
				'description'		=> __('Section to include destinations'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-destinations.php'
			));
			
			acf_register_block(array(
				'name'				=> 'block-iframe-map',
				'title'				=> __('AB Block - Iframe Map'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-iframe-map.php'
			));
			
			acf_register_block(array(
				'name'				=> 'block-iframe-video',
				'title'				=> __('AB Block - Iframe Video'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-iframe-video.php'
			));
			
			acf_register_block(array(
				'name'				=> 'block-blog',
				'title'				=> __('AB Block - Blog'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-blog.php'
			));
			
			acf_register_block(array(
				'name'				=> 'block-news',
				'title'				=> __('AB Block - News'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-news.php'
			));
			
			acf_register_block(array(
				'name'				=> 'block-gallery',
				'title'				=> __('AB Block - Gallery'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-gallery.php'
			));
			
			acf_register_block(array(
				'name'				=> 'block-single-gallery',
				'title'				=> __('AB Block - Single Gallery'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-single-gallery.php'
			));
			
			acf_register_block(array(
				'name'				=> 'block-team',
				'title'				=> __('AB Block - Team'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-team.php'
			));
			
			acf_register_block(array(
				'name'				=> 'block-header-slider',
				'title'				=> __('AB Block - Header Slider'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-header-slider.php'
			));
			
			acf_register_block(array(
				'name'				=> 'block-slider-with-title',
				'title'				=> __('AB Block - Slider With Title'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-slider-with-title.php'
			));
			
			acf_register_block(array(
				'name'				=> 'block-location-testimonial',
				'title'				=> __('AB Block - Location Testimonial'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-location-testimonial.php'
			));
			acf_register_block(array(
				'name'				=> 'block-share-item',
				'title'				=> __('AB Block - Share Item'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-share-item.php'
			));

			acf_register_block(array(
				'name'				=> 'block-trip-advisor',
				'title'				=> __('AB Block - Trip Advisor'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-trip-advisor.php'
			));

			acf_register_block(array(
				'name'				=> 'block-shortcode',
				'title'				=> __('AB Block - Shortcode'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-shortcode.php'
			));

			acf_register_block(array(
				'name'				=> 'block--iframe-tripadvisort',
				'title'				=> __('AB Block - Iframe Tripadvisort'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-iframe-tripadvisort.php'
			));

			acf_register_block(array(
				'name'				=> 'block-custom-code',
				'title'				=> __('AB Block - Custom Code'),
				'description'		=> __('Page content image and text block'),
				'category'			=> 'layout',
				'icon'				=> 'category',
				'keywords'			=> array( 'text' ),
				'render_template'	=> 'includes/blocks/block-custom-code.php'
			));
		}
	}

	add_action('acf/init', 'acf_content_block');


	/**
	 * Language Strings
	 */

	// add_action('init', function() {
	// 	pll_register_string('cll-theme', 'Read More');
	// });

	/**
	 * Custom post type
	*/

	function destination_post() {
		$labels = array(
			'name'               => _x( 'Product', 'post type general name' ),
			'singular_name'      => _x( 'Product', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'game' ),
			'add_new_item'       => __( 'Add New Product' ),
			'edit_item'          => __( 'Edit Product' ),
			'new_item'           => __( 'New Product' ),
			'all_items'          => __( 'All Products' ),
			'view_item'          => __( 'View Product' ),
			'search_items'       => __( 'Search Products' ),
			'not_found'          => __( 'No product found' ),
			'not_found_in_trash' => __( 'No product found in the Trash' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Products'
		);
		$args = array(
			'labels'        => $labels,
			'has_archive'   => true,
			'public'        => true,
			'rewrite'       => array( 'slug' => 'products' ),
			'description'   => 'Holds products specific data',
			'menu_position' => 5,
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'show_in_rest'  => true,
		);
	
		register_taxonomy(
			'Categories', 'products', array(
				'hierarchical'      => true,
				'label'             => 'All Product',
				'show_admin_column' => true,
				'show_ui'           => true,
				'query_var'         => true,
				'rewrite'           => true,
			)
		);
	
		register_post_type( 'destination', $args );
	
		// Associate the taxonomy with the post type
		register_taxonomy_for_object_type( 'Categories', 'destination' );
	
		// Add a meta box for the custom taxonomy inside the post editor
		add_action( 'add_meta_boxes', 'add_destination_category_meta_box' );
	}
	
	function add_destination_category_meta_box() {
		add_meta_box(
			'destination_category_meta_box',
			'Product Category',
			'render_destination_category_meta_box',
			'destination',
			'normal',
			'high'
		);
	}
	
	function render_destination_category_meta_box( $post ) {
		// Use nonce for verification
		wp_nonce_field( basename( __FILE__ ), 'product_category_nonce' );
	
		// Retrieve existing value from the database
		$categories = wp_get_post_terms( $post->ID, 'Categories' );
	
		echo '<label for="product-category">Select Category:</label>';
		echo '<select name="product-category" id="product-category">';
		
		$all_categories = get_categories( array( 'taxonomy' => 'Categories', 'hide_empty' => 0 ) );
		
		foreach ( $all_categories as $cat ) {
			$selected = ( is_array( $categories ) && ! empty( $categories ) && $cat->term_id == $categories[0]->term_id ) ? 'selected' : '';
			echo '<option value="' . esc_attr( $cat->term_id ) . '" ' . $selected . '>' . esc_html( $cat->name ) . '</option>';
		}
	
		echo '</select>';
	}
	
	
	// Save the meta box value
	add_action( 'save_post', 'save_destination_category_meta_box' );
	
	function save_destination_category_meta_box( $post_id ) {
		// Check if nonce is set
		if ( ! isset( $_POST['product_category_nonce'] ) ) {
			return;
		}
	
		// Verify nonce
		if ( ! wp_verify_nonce( $_POST['product_category_nonce'], basename( __FILE__ ) ) ) {
			return;
		}
	
		// Check if the user has permissions to save data
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	
		// Sanitize and save the data
		$category = isset( $_POST['product-category'] ) ? sanitize_text_field( $_POST['product-category'] ) : '';
		wp_set_post_terms( $post_id, $category, 'Categories', false );
	}
	
	// Hook into the init action
	add_action( 'init', 'destination_post' );


	add_action('parse_request', function($wp) {

		$uri = $_SERVER['REQUEST_URI'];
	
		$blocked_urls = [
			'/de/grabbing-travel-world-headlines/',
			'/fr/grabbing-travel-world-headlines/',
			'/nl/grabbing-travel-world-headlines/',
	
			'/fr/peaks-of-kosovo-majet-e-kosoves/',
			'/de/peaks-of-kosovo-majet-e-kosoves/',
		];
	
		foreach ($blocked_urls as $bad) {
			if (strpos($uri, $bad) !== false) {
	
				global $wp_query;
				$wp_query->set_404();
				status_header(404);
				nocache_headers();
	
				include get_query_template('404');
				exit;
			}
		}
	
	}); 


	function galleries_post() {
		$labels = array(
			'name'               => _x( 'Galleries', 'post type general name' ),
			'singular_name'      => _x( 'Gallery', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'game' ),
			'add_new_item'       => __( 'Add New Gallery' ),
			'edit_item'          => __( 'Edit Gallery' ),
			'new_item'           => __( 'New Gallery' ),
			'all_items'          => __( 'All Galleries' ),
			'view_item'          => __( 'View Gallery' ),
			'search_items'       => __( 'Search Galleries' ),
			'not_found'          => __( 'No gallery found' ),
			'not_found_in_trash' => __( 'No gallery found in the Trash' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Galleries'
		);
		$args = array(
			'labels'        => $labels,
			'has_archive'   => true,
			'public'        => true,
			'rewrite'       => array( 'slug' => 'galleries' ),
			'description'   => 'Holds galleries specific data',
			'menu_position' => 5,
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'show_in_rest'  => true
		);
		register_post_type( 'galleries', $args );
	}
	add_action( 'init', 'galleries_post' );
	
	function add_additional_class_on_li($classes, $item, $args) {
	    if(isset($args->add_li_class)) {
	      $classes[] = $args->add_li_class;
	    }
	    return $classes;
	}
	add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

	function custom_search_filter($query) {
		if ($query->is_search) {
			$query->set( 'post_type', array( 'post', 'destination', 'galleries', 'page', 'attachment', 'video') );
			$query->set('search_title', true);
		}
		return $query;
	}
	add_filter('pre_get_posts', 'custom_search_filter');

	add_post_type_support( 'page', 'excerpt' );


	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

	add_action('wp_enqueue_scripts', function() {
	    if (!is_admin()) {
	        wp_dequeue_style('wp-block-library');
	        wp_dequeue_style('wp-block-library-theme');
	        wp_dequeue_style('global-styles');
	        wp_dequeue_style('classic-theme-styles');
	    }
	}, 100);

	add_filter('the_content', function($content) {
    if (is_admin()) return $content;
    
    $count = 0;
    return preg_replace_callback('/<img\s[^>]*>/i', function ($matches) use (&$count) {
        $img = $matches[0];
        $count++;
        
        if ($count === 1) {
            $img = preg_replace('/\sloading=["\']lazy["\']/i', '', $img);
            return $img;
        }
        
        if (strpos($img, 'loading=') !== false) return $img;
        return preg_replace('/<img(.*?)>/i', '<img$1 loading="lazy">', $img);
    }, $content);
});

	add_filter('the_content', function($content) {
	    if (is_admin()) return $content;
	    return preg_replace_callback(
	        '/<script\b([^>]*)\bsrc=["\']([^"\']+)["\']([^>]*)>(.*?)<\/script>/is',
	        function($matches) {
	            $script_tag = $matches[0];
	            $src = $matches[2];
	            if (stripos($src, 'jquery') !== false) return $script_tag;
	            if (stripos($script_tag, 'defer') !== false) return $script_tag;
	            return preg_replace('/<script\b/', '<script defer', $script_tag, 1);
	        },
	        $content
	    );
	});

	add_filter('style_loader_src', function($src) {
	    if (strpos($src, 'fonts.googleapis.com') !== false) {
	        $src = add_query_arg('display', 'swap', $src);
	    }
	    return $src;
	});

	add_action('wp_enqueue_scripts', function() {
	    wp_deregister_style('open-sans');
	    wp_register_style('open-sans', false);
	});

	// add_filter('jpeg_quality', fn($q) => 80);
	// add_filter('wp_editor_set_quality', fn($q) => 80, 10, 1);

	// add_filter('intermediate_image_sizes_advanced', function($sizes) {
	//     unset($sizes['1536x1536'], $sizes['2048x2048']);
	//     return $sizes;
	// });

	// add_filter('wp_generate_attachment_metadata', function($metadata, $attachment_id) {
	//     // Remove WP's huge image sizes (in case still present)
	//     foreach (['1536x1536','2048x2048'] as $size) unset($metadata['sizes'][$size]);

	//     $file = get_attached_file($attachment_id);
	//     $image_info = @getimagesize($file);
	//     if (!$image_info) return $metadata;
	//     $mime = $image_info['mime'];

	//     $quality = 80;

	//     // Only optimize if real images (jpeg/png)
	//     if ($mime === 'image/jpeg' || $mime === 'image/jpg') {
	//         if (function_exists('imagecreatefromjpeg')) {
	//             $image = imagecreatefromjpeg($file);
	//             if ($image) {
	//                 imagejpeg($image, $file, $quality);
	//                 imagedestroy($image);
	//             }
	//         }
	//     }
	//     elseif ($mime === 'image/png') {
	//         if (function_exists('imagecreatefrompng')) {
	//             $image = imagecreatefrompng($file);
	//             if ($image) {
	//                 imagepng($image, $file, 2);
	//                 imagedestroy($image);
	//             }
	//         }
	//     }

	//     if (function_exists('imagewebp') && in_array($mime, ['image/jpeg','image/jpg','image/png'])) {
	//         $webp_path = preg_replace('/\.(jpe?g|png)$/i', '.webp', $file);
	//         $img_func = $mime === 'image/png' ? 'imagecreatefrompng' : 'imagecreatefromjpeg';
	//         $image = $img_func($file);
	//         if ($image) {
	//             imagewebp($image, $webp_path, $quality);
	//             imagedestroy($image);
	//         }
	//     }

	//     return $metadata;
	// }, 20, 2);

	add_filter( 'script_loader_tag', function ( $tag, $handle ) {
		if ( is_admin() ) return $tag;

		$delay = array( 'swiper', 'bundle-js', 'fancybox', 'main-js' );

		if ( ! in_array( $handle, $delay, true ) ) return $tag;

		if ( ! preg_match( '/src=["\']([^"\']+)["\']/', $tag, $matches ) ) return $tag;
		$src = $matches[1];
		$timeout = ( $handle === 'swiper' ) ? 2000 : 3000;

		return '<script>setTimeout(function(){' .
			'var s=document.createElement("script");' .
			's.src="' . esc_js( $src ) . '";' .
			's.defer=true;' .
			'document.body.appendChild(s);' .
			'},' . $timeout . ');</script>' . "\n";
	}, 10, 2 );


// add_action('wp_enqueue_scripts', function() {
//     if (!is_page('contact')) {
//         wp_dequeue_script('google-recaptcha');
//         wp_dequeue_script('wpcf7-recaptcha'); 
//     }
// }, 20);

add_filter( 'wp_get_attachment_image_attributes', function( $attr, $attachment ) {
	if ( empty( $attr['alt'] ) ) {
		$title = get_the_title( $attachment->ID );
		if ( ! empty( $title ) ) {
			$attr['alt'] = wp_strip_all_tags( $title );
		}
	}
	return $attr;
}, 10, 2 );




/**
 * Remove invalid FR hreflang for one product that redirects to EN.
 */
function bna_fix_invalid_fr_hreflang_for_peaks( $hreflangs ) {
	if ( ! is_array( $hreflangs ) || empty( $hreflangs ) ) {
		return $hreflangs;
	}

	if ( ! is_singular( 'destination' ) ) {
		return $hreflangs;
	}

	$post_id = get_queried_object_id();
	if ( ! $post_id ) {
		return $hreflangs;
	}

	$post_slug = get_post_field( 'post_name', $post_id );
	if ( $post_slug !== 'tour-peaks-of-the-balkans-trail' ) {
		return $hreflangs;
	}

	if ( isset( $hreflangs['fr'] ) && strpos( (string) $hreflangs['fr'], '/fr/products/tour-peaks-of-the-balkans-trail/' ) !== false ) {
		unset( $hreflangs['fr'] );
	}

	return $hreflangs;
}
add_filter( 'pll_rel_hreflang_attributes', 'bna_fix_invalid_fr_hreflang_for_peaks' );

/**
 * Pretty permalink for hreflang (no ?page_id=, trailing slash).
 */
function bna_normalize_hreflang_permalink( $url ) {
	if ( empty( $url ) || ! is_string( $url ) ) {
		return null;
	}

	if ( preg_match( '/[?&]page_id=(\d+)/i', $url, $matches ) ) {
		$page_id = (int) $matches[1];

		if ( $page_id > 0 && (int) get_option( 'page_on_front' ) === $page_id ) {
			return trailingslashit( home_url( '/' ) );
		}
	}

	return trailingslashit( $url );
}

/**
 * x-default URL: same page in the current language (matches the URL you are on).
 *
 * @param array|null $hreflangs Optional Polylang hreflang map (lang => url).
 */
function bna_get_hreflang_x_default_url( $hreflangs = null ) {
	if ( is_array( $hreflangs ) ) {
		if ( function_exists( 'pll_current_language' ) ) {
			$lang = pll_current_language( 'slug' );
			if ( $lang ) {
				foreach ( array( $lang, $lang . '-' . strtoupper( $lang ) ) as $key ) {
					if ( ! empty( $hreflangs[ $key ] ) ) {
						return bna_normalize_hreflang_permalink( $hreflangs[ $key ] );
					}
				}
			}
		}

		if ( ! empty( $hreflangs['en'] ) ) {
			return bna_normalize_hreflang_permalink( $hreflangs['en'] );
		}
	}

	if ( ! function_exists( 'pll_get_post' ) ) {
		return null;
	}

	// Current language first (/fr/, /de/, /nl/, or plain EN).
	if ( function_exists( 'pll_current_language' ) && function_exists( 'pll_translation_url' ) ) {
		$lang = pll_current_language( 'slug' );
		if ( $lang ) {
			$url = pll_translation_url( $lang );
			if ( $url ) {
				return bna_normalize_hreflang_permalink( $url );
			}
		}
	}

	if ( function_exists( 'pll_translation_url' ) ) {
		$url = pll_translation_url( 'en' );
		if ( ! $url && function_exists( 'pll_default_language' ) ) {
			$url = pll_translation_url( pll_default_language() );
		}
		if ( $url ) {
			return bna_normalize_hreflang_permalink( $url );
		}
	}

	$post_id = get_queried_object_id();

	if ( ! $post_id ) {
		return null;
	}

	return bna_normalize_hreflang_permalink( get_permalink( $post_id ) );
}

/**
 * Normalize all Polylang hreflang URLs (fixes ?page_id= on any language).
 */
function bna_normalize_hreflang_attributes( $hreflangs ) {
	if ( ! is_array( $hreflangs ) ) {
		return $hreflangs;
	}

	foreach ( $hreflangs as $lang => $url ) {
		$normalized = bna_normalize_hreflang_permalink( $url );
		if ( $normalized ) {
			$hreflangs[ $lang ] = $normalized;
		}
	}

	return $hreflangs;
}

function bna_get_fallback_image_alt_text( $attachment_id = 0 ) {
	$alt_text = '';

	if ( $attachment_id ) {
		$alt_text = trim( (string) get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) );

		if ( $alt_text === '' ) {
			$alt_text = get_the_title( $attachment_id );
		}
	}

	if ( $alt_text === '' ) {
		$alt_text = get_the_title( get_queried_object_id() );
	}

	if ( $alt_text === '' ) {
		$alt_text = get_bloginfo( 'name' );
	}

	return wp_strip_all_tags( (string) $alt_text );
}


function bna_ensure_wp_image_has_alt( $attr, $attachment ) {
	if ( ! is_array( $attr ) ) {
		$attr = array();
	}

	if ( isset( $attr['alt'] ) && trim( (string) $attr['alt'] ) !== '' ) {
		return $attr;
	}

	$attachment_id = 0;
	if ( $attachment instanceof WP_Post ) {
		$attachment_id = (int) $attachment->ID;
	}

	$attr['alt'] = bna_get_fallback_image_alt_text( $attachment_id );

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'bna_ensure_wp_image_has_alt', 10, 2 );


function bna_ensure_content_images_have_alt( $content ) {
	if ( ! is_string( $content ) || $content === '' || stripos( $content, '<img' ) === false ) {
		return $content;
	}

	$fallback_alt = esc_attr( bna_get_fallback_image_alt_text() );

	return preg_replace_callback(
		'/<img\b[^>]*>/i',
		static function ( $matches ) use ( $fallback_alt ) {
			$img_tag = $matches[0];

			if ( preg_match( '/\balt\s*=\s*([\'"])(.*?)\1/i', $img_tag, $alt_match ) ) {
				if ( trim( (string) $alt_match[2] ) !== '' ) {
					return $img_tag;
				}

				return preg_replace(
					'/\balt\s*=\s*([\'"])(.*?)\1/i',
					'alt="' . $fallback_alt . '"',
					$img_tag,
					1
				);
			}

			return rtrim( $img_tag, '>' ) . ' alt="' . $fallback_alt . '">';
		},
		$content
	);
}
add_filter( 'the_content', 'bna_ensure_content_images_have_alt', 20 );

function bna_add_sr_only_h1() {
    if ( is_singular() || is_front_page() || is_page() ) {
        global $post;
        $content = $post->post_content;

        if ( stripos( $content, '<h1' ) === false ) {
            $title = get_the_title( $post->ID );
            echo '<h1 class="sr-only">' . esc_html( $title ) . '</h1>';
        }
    }
}
add_action( 'wp_head', 'bna_add_sr_only_h1' );

// add_action('template_redirect', function () {
//     ob_start(function ($html) {
//         return preg_replace_callback('/<img[^>]+>/i', function ($img) {
//             $tag = $img[0];
//             if (preg_match('/alt=["\'](.*?)["\']/', $tag, $m)) {
//                 if (trim($m[1]) !== '') return $tag;
//             }
//             if (!preg_match('/src=["\'](.*?)["\']/', $tag, $src)) {
//                 return $tag;
//             }
//             $url = $src[1];
//             $id = attachment_url_to_postid($url);
//             if ($id) {
//                 $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
//                 if (!$alt) $alt = get_the_title($id);
//             } else {
//                 $alt = pathinfo(basename($url), PATHINFO_FILENAME);
//                 $alt = str_replace(['-', '_'], ' ', $alt);
//             }
//             $alt = esc_attr($alt);

//             if (strpos($tag, 'alt=') !== false) {
//                 $tag = preg_replace('/alt=["\'].*?["\']/', 'alt="'.$alt.'"', $tag);
//             } else {
//                 $tag = str_replace('<img', '<img alt="'.$alt.'"', $tag);
//             }
//             return $tag;

//         }, $html);

//     });
// });

add_filter('wpseo_opengraph_image', 'bn_fix_og_image', 999);

function bn_fix_og_image($image) {
    if (empty($image)) return $image;

    return str_replace(
        'dev.bnadventure.com',
        'bnadventure.com',
        $image
    );
}

function bna_fix_archive_pagination_query( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if ( $query->is_archive() || $query->is_tax() ) {

        if ( isset( $query->query_vars['paged'] ) ) {
            $paged = (int) $query->query_vars['paged'];
            if ( $paged < 1 ) {
                $query->set( 'paged', 1 );
            }
        }

        $query->set( 'posts_per_page', 9 );

        $query->set( 'no_found_rows', false );
    }
}
add_action( 'pre_get_posts', 'bna_fix_archive_pagination_query' );

// add_action('wp_head', function () {
//     if (is_paged()) {
//         echo '<meta name="robots" content="noindex,follow">';
//     }
// });


add_filter('user_trailingslashit', function ($url) {
    return trailingslashit($url);
});


add_filter('redirect_canonical', function ($redirect_url, $requested_url) {
    if (is_admin()) return $redirect_url;

    if (trailingslashit($redirect_url) === trailingslashit($requested_url)) {
        return false;
    }

    return $redirect_url;
}, 10, 2);



// add_filter('redirect_canonical', function($redirect_url) {
//     return false;
// });


add_filter( 'pll_rel_hreflang_attributes', function ( $hreflangs ) {
	if ( ! is_array( $hreflangs ) ) {
		return $hreflangs;
	}

	$hreflangs = bna_normalize_hreflang_attributes( $hreflangs );

	$x_default = bna_get_hreflang_x_default_url( $hreflangs );
	if ( $x_default ) {
		$hreflangs['x-default'] = $x_default;
	}

	return $hreflangs;
}, 20 );


function safe_mobile_image_fix($attr) {

    if (wp_is_mobile()) {

        $attr['sizes'] = '(max-width: 768px) 100vw, 768px';
        $attr['loading'] = 'lazy';
        $attr['decoding'] = 'async';
    }

    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'safe_mobile_image_fix', 20, 2);


add_action('wp_enqueue_scripts', function () {


    wp_dequeue_style('duplicate-post');
    wp_deregister_style('duplicate-post');

    wp_dequeue_style('block-options-style');
	wp_deregister_style('block-options-style');
	wp_dequeue_style('editorskit-frontend-css');
	wp_deregister_style('editorskit-frontend-css');

    if (!is_admin_bar_showing()) {
        wp_dequeue_style('yoast-seo-adminbar');
        wp_deregister_style('yoast-seo-adminbar');
    }

}, 9999);



// function global_fix_multiple_h1_safe($buffer) {

//     if (is_admin()) return $buffer;

//     $count = 0;

//     $buffer = preg_replace_callback('/<h1(.*?)>(.*?)<\/h1>/is', function($matches) use (&$count) {

//         $count++;

//         if ($count === 1) return $matches[0];

//         return "<h2{$matches[1]}>{$matches[2]}</h2>";

//     }, $buffer);

//     return $buffer;
// }

// add_action('template_redirect', function () {
//     ob_start('global_fix_multiple_h1_safe');
// });


add_action('template_redirect', function () {

    $uri = $_SERVER['REQUEST_URI'];

    // 🔥 DE URL FIX
    if (strpos($uri, '/de/products/tour-peaks-of-the-balkans-trail/') !== false) {

        // ndal çdo redirect canonical të WordPress
        add_filter('redirect_canonical', '__return_false');

        // siguro që nuk shkon në EN
        status_header(200);

        return;
    }

    // 🔥 NL URL FIX
    if (strpos($uri, '/nl/products/tour-peaks-of-the-balkans-trail/') !== false) {

        add_filter('redirect_canonical', '__return_false');

        status_header(200);

        return;
    }

}, 0);


add_action('init', function () {

    $uri = $_SERVER['REQUEST_URI'];

    $blocked = [
        '/de/peaks-of-the-balkans/peaks-of-the-balkans-map/',
        '/nl/peaks-of-the-balkans/peaks-of-the-balkans-map/',
    ];

    foreach ($blocked as $url) {

        if (strpos($uri, $url) === 0) {

            remove_action('template_redirect', 'redirect_canonical');
            add_filter('redirect_canonical', '__return_false');

            header_remove('Location');

            break;
        }
    }

}, 0);

function bna_fix_redirect_chains() {
    $redirects = array(
        '/destination/peaks-of-the-balkans-trail/'                          => '/peaks-of-the-balkans/',
        '/products/via-ferrata-mat-and-ari/'                                => '/products/onvia-ferrata-mat-en-ari/',
        '/products/guided-high-scardus-2024/'                               => '/products/guided-high-scardus-2026/',
        '/nl/products/via-ferrata-mat-and-ari-2/'                           => '/nl/products/ontdek-via-ferrata-mat-en-ari/',
    );

    $current_path = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );

    foreach ( $redirects as $from => $to ) {
        if ( $current_path === $from ) {
            wp_redirect( home_url( $to ), 301 );
            exit;
        }
    }
}
add_action( 'template_redirect', 'bna_fix_redirect_chains' );


add_filter( 'wpseo_hreflang_output', function ( $output ) {
	$parsed_hreflangs = array();

	if ( preg_match_all( '/<link rel="alternate" href="([^"]+)" hreflang="([a-z]{2}(?:-[A-Za-z]+)?)" \/>/i', $output, $matches, PREG_SET_ORDER ) ) {
		foreach ( $matches as $match ) {
			$parsed_hreflangs[ $match[2] ] = $match[1];
		}
	}

	$x_default = bna_get_hreflang_x_default_url( $parsed_hreflangs );

	if ( ! $x_default && function_exists( 'pll_current_language' ) ) {
		$lang = pll_current_language( 'slug' );
		if ( $lang && ! empty( $parsed_hreflangs[ $lang ] ) ) {
			$x_default = $parsed_hreflangs[ $lang ];
		}
	}

	if ( ! $x_default && ! empty( $parsed_hreflangs['en'] ) ) {
		$x_default = $parsed_hreflangs['en'];
	}

	$x_default = bna_normalize_hreflang_permalink( $x_default );

	if ( ! $x_default ) {
		return $output;
	}

	$output = preg_replace(
		'/<link rel="alternate" href="[^"]+" hreflang="x-default"[^>]*\/?>/i',
		'',
		$output
	);

	$output .= "\n" . '<link rel="alternate" href="' . esc_url( $x_default ) . '" hreflang="x-default" />';

	return $output;
}, 99 );


add_action('template_redirect', function () {

    if (is_admin()) return;

    if (!is_singular()) return;

    $current_url = home_url($_SERVER['REQUEST_URI']);

    if (strpos($current_url, '/de/products/peaks-of-the-balkans-trail/') === false) {
        return;
    }

    ob_start(function ($html) {

        $html = str_replace(
            '<link rel="alternate" href="https://bnadventure.com/products/peaks-of-the-balkans-trail/" hreflang="en" />',
            '<link rel="alternate" href="https://bnadventure.com/peaks-of-the-balkans/" hreflang="en" />',
            $html
        );

        return $html;
    });

});


add_action('template_redirect', function () {

    if (is_admin() || wp_doing_ajax()) return;

    $uri = $_SERVER['REQUEST_URI'] ?? '';

    if (strpos($uri, '/products/peaks-of-the-balkans-trail/') !== false) {

        $target = home_url('/peaks-of-the-balkans/');

        if (!defined('DONOTCACHEPAGE')) {
            define('DONOTCACHEPAGE', true);
        }

        remove_action('template_redirect', 'redirect_canonical');

        add_filter('redirect_canonical', '__return_false', 9999);

        nocache_headers();

        wp_safe_redirect($target, 301);
        exit;
    }

}, 0);


function move_jquery_to_footer() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', includes_url('/js/jquery/jquery.min.js'), false, null, true);
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'move_jquery_to_footer');

function remove_noindex_for_pagination() {
    if ( is_paged() ) {
        remove_action( 'wp_head', 'wp_no_robots' );
    }
}
add_action( 'wp_head', 'remove_noindex_for_pagination', 1 );

add_action('wp_head', function() {
    if (isset($_GET['envira-downloads-gallery-id']) || isset($_GET['envira-downloads-gallery-image'])) {
        $clean_url = strtok($_SERVER['REQUEST_URI'], '?');
        echo '<link rel="canonical" href="' . home_url($clean_url) . '" />';
    }
}, 1);

// add_action('wp_head', function() {
//     if (is_paged()) {
//         global $wp;
//         $canonical = home_url(add_query_arg(array(), $wp->request));
//         $canonical = preg_replace('/\/page\/[0-9]+\/?$/', '/', $canonical);
//         echo '<link rel="canonical" href="' . esc_url($canonical) . '" />';
//     }
// });

add_action('template_redirect', function() {
    if (is_author()) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
        nocache_headers();
        include get_query_template('404');
        exit;
    }
});

add_action('wp_head', function() {
    if (is_front_page()) {
        echo '<link rel="preload" as="image" href="https://bnadventure.com/wp-content/uploads/2026/05/BNA_2173-e1601378743829-1024x741-1-1-768x556.webp" fetchpriority="high">';
    }
}, 1);


add_filter('jpeg_quality', fn($q) => 65);
add_filter('wp_editor_set_quality', fn($q) => 65);

// add_action('template_redirect', function() {
//     if (is_admin()) return;
//     ob_start(function($html) {
//         return preg_replace('/<link[^>]+editorskit-frontend-css[^>]+>/i', '', $html);
//     });
// });


add_image_size('adventure-card', 474, 350, true);


add_filter( 'pll_rel_hreflang_attributes', function( $hreflangs ) {
    if ( ! is_array( $hreflangs ) ) return $hreflangs;

    if ( is_page() ) {
        $post_id = get_queried_object_id();
        $slug = get_post_field( 'post_name', $post_id );

        if ( $slug === 'peaks-of-the-balkans' ) {
            $hreflangs['de'] = 'https://bnadventure.com/de/balkanische-gipfel/';
        }
    }

    return $hreflangs;
}, 25 );

add_filter( 'pll_rel_hreflang_attributes', function( $hreflangs ) {
    if ( ! is_array( $hreflangs ) ) return $hreflangs;

    $post_id = get_queried_object_id();
    $slug    = get_post_field( 'post_name', $post_id );

    if ( $slug !== 'tour-peaks-of-the-balkans-trail' ) {
        return $hreflangs;
    }

    $hreflangs['en'] = 'https://bnadventure.com/products/tour-peaks-of-the-balkans-trail/';
    $hreflangs['fr'] = 'https://bnadventure.com/fr/products/tour-peaks-of-the-balkans-trail/';
    $hreflangs['de'] = 'https://bnadventure.com/de/produkte/tour-gipfeltouren-auf-dem-balkan/gefuhrte-touren/';
    $hreflangs['nl'] = 'https://bnadventure.com/nl/products/tour-peaks-of-the-balkans-trail/';

    return $hreflangs;
}, 30 );

add_action('template_redirect', function () {
    if (is_admin()) return;
    ob_start(function ($html) {
        // Hiq editorskit CSS
        $html = preg_replace('/<link[^>]+editorskit-frontend-css[^>]+>/i', '', $html);

        // Fix image alts
        $html = preg_replace_callback('/<img[^>]+>/i', function ($img) {
            $tag = $img[0];
            if (preg_match('/alt=["\']([^"\']*)["\']/', $tag, $m) && trim($m[1]) !== '') {
                return $tag;
            }
            if (!preg_match('/src=["\']([^"\']+)["\']/', $tag, $src)) return $tag;
            $url = $src[1];
            $id  = attachment_url_to_postid($url);
            if ($id) {
                $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
                if (!$alt) $alt = get_the_title($id);
            } else {
                $alt = pathinfo(basename($url), PATHINFO_FILENAME);
                $alt = str_replace(['-', '_'], ' ', $alt);
            }
            $alt = esc_attr($alt);
            if (strpos($tag, 'alt=') !== false) {
                $tag = preg_replace('/alt=["\'].*?["\']/', 'alt="'.$alt.'"', $tag);
            } else {
                $tag = str_replace('<img', '<img alt="'.$alt.'"', $tag);
            }
            return $tag;
        }, $html);

        return $html;
    });
});


add_action( 'wp_head', function () {
    echo '<style>
    @font-face { font-family: "Prompt"; font-display: swap; }
    </style>';
}, 1 );


function dergo_te_dhenat_ne_google_sheets($contact_form) {

    if ((int) $contact_form->id() !== 7071) {
        return;
    }

    $submission = WPCF7_Submission::get_instance();
    if (!$submission) {
        return;
    }

    $data = $submission->get_posted_data();

    $website = parse_url(home_url(), PHP_URL_HOST);
    $page_url = wp_get_referer();

	if (empty($page_url)) {
		$page_url = home_url(add_query_arg([], $GLOBALS['wp']->request));
	}

    $ip_address = $_SERVER['REMOTE_ADDR'] ?? '';
    $ip_address = trim($ip_address);

    if (filter_var($ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        $parts = explode('.', $ip_address);
        $parts[3] = '0';
        $ip_address = implode('.', $parts);
    }

    $country = '';

    if (!empty($ip_address) && !in_array($ip_address, ['127.0.0.1', '::1'], true)) {

        $geo = wp_remote_get(
            "https://ipwho.is/{$ip_address}",
            [
                'timeout' => 5,
            ]
        );

        if (!is_wp_error($geo)) {
            $geo_body = json_decode(wp_remote_retrieve_body($geo), true);

            if (!empty($geo_body['success'])) {
                $country = sanitize_text_field($geo_body['country'] ?? '');
            }
        }
    }

	$script_url = 'https://script.google.com/macros/s/AKfycbyJLOMCtwn3DEAsM09Ze7FPYGzT3rJtQClu4j4s91gxyWmLEZCeaeGYqindovHhf5eM/exec';

    $body = [
        'Website' => $page_url,
        'Emri'     => sanitize_text_field($data['your-name'] ?? ''),
        'Email'    => sanitize_email($data['your-email'] ?? ''),
        'Mesazhi'  => sanitize_textarea_field($data['your-message'] ?? ''),
        'IP'       => $ip_address,
        'Shteti'   => $country,
        'Koha'     => current_time('Y-m-d H:i:s'),
    ];

    $response = wp_remote_post(
        $script_url,
        [
            'body'    => $body,
            'timeout' => 15,
        ]
    );

    if (is_wp_error($response)) {
        error_log('GAS ERROR: ' . $response->get_error_message());
    } else {
        error_log('GAS RESPONSE: ' . wp_remote_retrieve_body($response));
    }
}


add_action('wpcf7_before_send_mail', 'dergo_te_dhenat_ne_google_sheets');