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

	/**
	* Enqueue scripts and styles -- enqueue scripts later (footer)
	*
	* Add versioning and enable efficient browser cache for static resources.
	*/

	// Set efficient browser cache lifetimes for static resources (images, CSS, JS, fonts)
	// function bnadventure_set_assets_cache_headers( $headers ) {
	// 	// Do not break admin
	// 	if ( is_admin() ) return $headers;
	// 	if ( isset( $_SERVER['REQUEST_URI'] ) ) {
	// 		$static_extensions = array('jpg', 'jpeg', 'png', 'svg', 'gif', 'webp', 'woff2', 'woff', 'ttf', 'eot');
	// 		$path = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
	// 		$ext  = strtolower( pathinfo( $path, PATHINFO_EXTENSION ) );
	// 		if ( in_array( $ext, $static_extensions ) ) {
	// 			$headers['Cache-Control'] = 'public, max-age=31536000, immutable'; // 1 year
	// 		}
	// 	}
	// 	return $headers;
	// }
	// add_filter( 'wp_headers', 'bnadventure_set_assets_cache_headers', 15 );
function balkan_nature_adventure_scripts() {
	$theme_dir     = get_template_directory();
	$theme_dir_uri = get_template_directory_uri();
	$style_dir     = get_stylesheet_directory();

	// Styles.
	wp_enqueue_style(
		'swiper',
		$theme_dir_uri . '/css/swiper.min.css',
		array(),
		'0.1'
	);

	wp_enqueue_style(
		'balkan_nature_adventure_style_styles',
		$theme_dir_uri . '/css/style.css',
		array(),
		file_exists( $theme_dir . '/css/style.css' ) ? filemtime( $theme_dir . '/css/style.css' ) : null
	);

	wp_enqueue_style(
		'balkan_nature_adventure_fancybox_styles',
		$theme_dir_uri . '/css/fancybox.min.css',
		array(),
		file_exists( $theme_dir . '/css/fancybox.min.css' ) ? filemtime( $theme_dir . '/css/fancybox.min.css' ) : null
	);

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
		file_exists( $theme_dir . '/js/bundle.js' ) ? filemtime( $theme_dir . '/js/bundle.js' ) : null,
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

	function limit_login_attempts() {
	    $max_attempts = 5;
	    $lockout_time = 60 * 10; // 10 minutes

	    if (!session_id()) {
	        session_start();
	    }

	    if (isset($_POST['log'])) { // Detect login attempt
	        if (!isset($_SESSION['login_attempts'])) {
	            $_SESSION['login_attempts'] = 1;
	        } else {
	            $_SESSION['login_attempts']++;
	        }

	        if ($_SESSION['login_attempts'] > $max_attempts) {
	            wp_die('Too many failed login attempts. Please try again in 10 minutes.');
	        }
	    }

	    if (isset($_GET['action']) && $_GET['action'] == 'wp_login') {
	        $_SESSION['login_attempts'] = 0; // Reset on successful login
	    }
	}
	add_action('login_init', 'limit_login_attempts');


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
	    return preg_replace_callback('/<img\s[^>]*>/i', function ($matches) {
	        $img = $matches[0];
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

	add_filter('jpeg_quality', fn($q) => 80);
	add_filter('wp_editor_set_quality', fn($q) => 80, 10, 1);

	add_filter('intermediate_image_sizes_advanced', function($sizes) {
	    unset($sizes['1536x1536'], $sizes['2048x2048']);
	    return $sizes;
	});

	add_filter('wp_generate_attachment_metadata', function($metadata, $attachment_id) {
	    // Remove WP's huge image sizes (in case still present)
	    foreach (['1536x1536','2048x2048'] as $size) unset($metadata['sizes'][$size]);

	    $file = get_attached_file($attachment_id);
	    $image_info = @getimagesize($file);
	    if (!$image_info) return $metadata;
	    $mime = $image_info['mime'];

	    $quality = 80;

	    // Only optimize if real images (jpeg/png)
	    if ($mime === 'image/jpeg' || $mime === 'image/jpg') {
	        if (function_exists('imagecreatefromjpeg')) {
	            $image = imagecreatefromjpeg($file);
	            if ($image) {
	                imagejpeg($image, $file, $quality);
	                imagedestroy($image);
	            }
	        }
	    }
	    elseif ($mime === 'image/png') {
	        if (function_exists('imagecreatefrompng')) {
	            $image = imagecreatefrompng($file);
	            if ($image) {
	                imagepng($image, $file, 2);
	                imagedestroy($image);
	            }
	        }
	    }

	    if (function_exists('imagewebp') && in_array($mime, ['image/jpeg','image/jpg','image/png'])) {
	        $webp_path = preg_replace('/\.(jpe?g|png)$/i', '.webp', $file);
	        $img_func = $mime === 'image/png' ? 'imagecreatefrompng' : 'imagecreatefromjpeg';
	        $image = $img_func($file);
	        if ($image) {
	            imagewebp($image, $webp_path, $quality);
	            imagedestroy($image);
	        }
	    }

	    return $metadata;
	}, 20, 2);

	// Add script defer for main scripts (except jquery)
	add_filter('script_loader_tag', function($tag, $handle) {
	    $defer = ['swiper','main-js','bundle-js','balkan_nature_adventure_js','fancybox'];
	    if(in_array($handle, $defer)) {
	        return str_replace(' src', ' defer src', $tag);
	    }
	    return $tag;
	}, 10, 2);


add_action('wp_enqueue_scripts', function() {
    if (!is_page('contact')) {
        wp_dequeue_script('google-recaptcha');
        wp_dequeue_script('wpcf7-recaptcha'); 
    }
}, 20);

add_filter( 'wp_get_attachment_image_attributes', function( $attr, $attachment ) {
	if ( empty( $attr['alt'] ) ) {
		$title = get_the_title( $attachment->ID );
		if ( ! empty( $title ) ) {
			$attr['alt'] = wp_strip_all_tags( $title );
		}
	}
	return $attr;
}, 10, 2 );


if ( ! function_exists( 'bna_legacy_redirects' ) ) {
	function bna_legacy_redirects() {
		if ( is_admin() || wp_doing_ajax() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
			return;
		}

		$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : '';
		if ( empty( $request_uri ) ) {
			return;
		}

		$path = wp_parse_url( $request_uri, PHP_URL_PATH );
		$path = is_string( $path ) ? trim( $path, '/' ) : '';

		$query = isset( $_SERVER['QUERY_STRING'] ) ? $_SERVER['QUERY_STRING'] : '';
		parse_str( $query, $query_args );

		$redirect_map = array(
			'de/4500' => '/de/uber-uns/was-ist-travelife/',
			'fr/4498' => '/fr/about-us/travelife/',
			'nl/4502' => '/nl/over-ons/travelife/',
			'destination/camping-in-hajla-weekend' => '/products/hike-the-hajla-peak/',
			'bnadventure_product/peaks-of-the-balkans-2021' => '/peaks-of-the-balkans/',
			'bnadventure_product/gjeravica-hiking' => '/via-dinarica-2/',
			'via-ferrata-ari-and-mat' => '/products/hiking-in-kosovo/',
			'de/startpagina/en' => '/de/startpagina/',
			'3862-2' => '/nl/imprint/',
			'de/produkte/tirana-one-day-city-visits' => '/de/products/tirana-one-day-city-visits/',
			'nl/producten/tirana-one-day-city-visits' => '/nl/products/begeleid-hoge-scardus-2025/',
			'bnadventure_product/the-accursed-mountains-northern-albania' => '/peaks-of-the-balkans-in-covid-19-pandemic/',
			'de/produkte/tirana-one-day-city-visits' => '/de/products/gefuhrte-tour-hoher-scardus-2025/',
		);

		if ( isset( $query_args['page_id'] ) && (string) $query_args['page_id'] === '22' ) {
			wp_redirect( home_url( '/' ), 301 );
			exit;
		}

		if ( isset( $redirect_map[ $path ] ) ) {
			wp_redirect( home_url( $redirect_map[ $path ] ), 301 );
			exit;
		}
	}
	add_action( 'template_redirect', 'bna_legacy_redirects', 1 );
}




function bna_custom_hreflang() {
	if ( is_admin() || wp_doing_ajax() ) {
		return;
	}

	if ( ! function_exists( 'pll_the_languages' ) ) {
		return;
	}

	$languages = pll_the_languages(
		array(
			'raw'              => 1,
			'hide_if_empty'    => 0,
			'display_names_as' => 'slug',
		)
	);

	if ( ! is_array( $languages ) || empty( $languages ) ) {
		return;
	}

	$alternate_links = array();
	$x_default_url   = '';

	foreach ( $languages as $language ) {
		if ( empty( $language['slug'] ) || empty( $language['url'] ) ) {
			continue;
		}

		$lang_code = strtolower( trim( (string) $language['slug'] ) );
		$lang_url  = esc_url( $language['url'] );

		if ( empty( $lang_code ) || empty( $lang_url ) ) {
			continue;
		}

		$alternate_links[ $lang_code ] = $lang_url;

		if ( ! empty( $language['current_lang'] ) ) {
			$x_default_url = $lang_url;
		}
	}

	if ( empty( $alternate_links ) ) {
		return;
	}

	if ( empty( $x_default_url ) ) {
		$x_default_url = reset( $alternate_links );
	}

	if ( empty( $x_default_url ) ) {
		$x_default_url = home_url( '/' );
	}

	// Keep language hreflang tags from SEO/Polylang and add only missing x-default.
	printf(
		'<link rel="alternate" hreflang="x-default" href="%s" />' . "\n",
		esc_url( $x_default_url )
	);
}
add_action( 'wp_head', 'bna_custom_hreflang', 1 );

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

add_action('wp_head', function () {
    if (is_paged()) {
        echo '<meta name="robots" content="noindex,follow">';
    }
});