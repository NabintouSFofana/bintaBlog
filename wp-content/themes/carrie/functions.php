<?php
/**
 * Carrie functions
 *
 * @package Carrie
 */

/*
 *	@@@ iPanel Path Constant @@@
*/
define( 'CARRIE_IPANEL_PATH' , get_template_directory() . '/ipanel/' );

/*
 *	@@@ iPanel URI Constant @@@
*/
define( 'CARRIE_IPANEL_URI' , get_template_directory_uri() . '/ipanel/' );

/*
 *	@@@ Usage Constant @@@
*/
define( 'CARRIE_IPANEL_PLUGIN_USAGE' , false );


/*
 *	@@@ Include iPanel Main File @@@
*/
include_once (CARRIE_IPANEL_PATH . 'iPanel.php');

// Get theme options globally
function carrie_get_theme_options() {
	if(get_option('CARRIE_PANEL')) {
		$theme_options_data = maybe_unserialize(get_option('CARRIE_PANEL'));
	} else {
		$theme_options_data = Array();
	}

	return $theme_options_data;
}

$carrie_theme_options = carrie_get_theme_options();

if (!isset($content_width))
	$content_width = 1140; /* pixels */

if (!function_exists('carrie_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function carrie_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Carrie, use a find and replace
	 * to change 'carrie' to the name of your theme in all the template files
	 */
	load_theme_textdomain('carrie', get_template_directory() . '/languages');

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support('automatic-feed-links');

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support('post-thumbnails');

	/**
	 * Enable support for JetPack Infinite Scroll
	 *
	 * @link https://jetpack.me/support/infinite-scroll/
	 */
	add_theme_support( 'infinite-scroll', array(
	    'container' => 'content',
	    'footer' => 'page',
	) );

	/**
	 * Enable support for Title Tag
	 *
	 */

	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Logo
	 */
	add_theme_support( 'custom-header', array(
	    'default-image' =>  get_template_directory_uri() . '/img/logo.png',
            'width'         => 260,
            'flex-width'    => true,
            'flex-height'   => false,
            'header-text'   => false,
	));

	/**
	 *	Woocommerce support
	 */
	add_theme_support( 'woocommerce' );

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	/**
	 *	Gutenberg support
	 */
    add_theme_support('align-wide');

	/**
	 * Change customizer features
	 */
	add_action( 'customize_register', 'carrie_theme_customize_register' );
	function carrie_theme_customize_register( $wp_customize ) {
		$wp_customize->remove_section( 'colors' );

		$wp_customize->add_setting( 'carrie_header_transparent_logo' , array(
		     array ( 'default' => '',
				    'sanitize_callback' => 'esc_url_raw'
				    ),
		    'transport'   => 'refresh',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'carrie_header_transparent_logo', array(
		    'label'    => esc_html__( 'Logo for Transparent Header (Light logo)', 'carrie' ),
		    'section'  => 'header_image',
		    'settings' => 'carrie_header_transparent_logo',
		) ) );
	}

	/**
	 * Theme resize image
	 */
	add_image_size( 'carrie-blog-thumb', 1140, 700, true);
	add_image_size( 'carrie-blog-thumb-sidebar', 848, 521, true);

	add_image_size( 'carrie-blog-thumb-2column', 555, 341, true);
	add_image_size( 'carrie-blog-thumb-2column-sidebar', 409, 251, true);

	add_image_size( 'carrie-blog-thumb-widget', 90, 55, true);

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
            'primary' => esc_html__('Header Menu', 'carrie'),
            'top' => esc_html__('Top Menu', 'carrie'),
            'footer' => esc_html__('Footer Menu', 'carrie'),
	) );
	/*
	* Change excerpt length
	*/
	function carrie_new_excerpt_length($length) {
		$carrie_theme_options = carrie_get_theme_options();

		if(isset($carrie_theme_options['post_excerpt_legth'])) {
			$post_excerpt_length = $carrie_theme_options['post_excerpt_legth'];
		} else {
			$post_excerpt_length = 18;
		}

		return $post_excerpt_length;
	}
	add_filter('excerpt_length', 'carrie_new_excerpt_length');
	/**
	 * Enable support for Post Formats
	 */
	add_theme_support('post-formats', array('aside', 'image', 'gallery', 'video', 'audio', 'quote', 'link', 'status', 'chat'));

	// Activate theme
    update_option('carrie_license_key_status', 'activated');

}
endif;
add_action('after_setup_theme', 'carrie_setup');

// Title backward compatibility
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function carrie_render_title() {

	?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php

	}

	add_action( 'wp_head', 'carrie_render_title' );
}

/**
 * Enqueue scripts and styles
 */
function carrie_scripts() {
	$carrie_theme_options = carrie_get_theme_options();

	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style('carrie-fonts', carrie_google_fonts_url(), array(), '1.0' );
	wp_enqueue_style('owl-main', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.css');
	wp_enqueue_style('carrie-stylesheet', get_stylesheet_uri(), array(), '1.0.2', 'all');
	wp_enqueue_style('carrie-responsive', get_template_directory_uri() . '/responsive.css', '1.0.2', 'all');

	if(isset($carrie_theme_options['enable_theme_animations']) && $carrie_theme_options['enable_theme_animations']) {
		wp_enqueue_style('carrie-animations', get_template_directory_uri() . '/css/animations.css');
	}

	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style('carrie-select2', get_template_directory_uri() . '/js/select2/select2.css'); // special version, must be prefixed with theme prefix
	wp_enqueue_style('offcanvasmenu', get_template_directory_uri() . '/css/offcanvasmenu.css');
	wp_enqueue_style('nanoscroller', get_template_directory_uri() . '/css/nanoscroller.css');
	wp_enqueue_style('swiper', get_template_directory_uri() . '/css/idangerous.swiper.css');

	add_thickbox();

	// Registering scripts to include it in correct order later
	wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.1.1', true);
	wp_register_script('easing', get_template_directory_uri() . '/js/easing.js', array(), '1.3', true);
	wp_register_script('carrie-select2', get_template_directory_uri() . '/js/select2/select2.min.js', array(), '3.5.1', true);  // special version, must be prefixed with theme prefix
	wp_register_script('owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js', array(), '2.0.0', true);
	wp_register_script('nanoscroller', get_template_directory_uri() . '/js/jquery.nanoscroller.min.js', array(), '3.4.0', true);

	// Enqueue scripts in correct order
	wp_enqueue_script('carrie-script', get_template_directory_uri() . '/js/template.js', array('jquery', 'bootstrap', 'easing', 'carrie-select2', 'owl-carousel', 'nanoscroller'), '1.1', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

}
add_action('wp_enqueue_scripts', 'carrie_scripts');

// Deregister scripts
function carrie_dequeue_stylesandscripts() {
	if ( class_exists( 'woocommerce' ) && !is_checkout() ) {
		wp_dequeue_style( 'select2' );
		wp_deregister_style( 'select2' );
	}
}
add_action( 'wp_enqueue_scripts', 'carrie_dequeue_stylesandscripts', 100 );

/**
 * Enqueue scripts and styles for admin area
 */
function carrie_admin_scripts() {
	wp_register_style( 'carrie-style-admin', get_template_directory_uri() .'/css/admin.css' );
	wp_enqueue_style( 'carrie-style-admin' );
	wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style( 'font-awesome' );

	wp_register_script('carrie-template-admin', get_template_directory_uri() . '/js/template-admin.js', array(), '1.0', true);
	wp_enqueue_script('carrie-template-admin');

	wp_register_script('carrie-js-wp', get_template_directory_uri() . '/js/js-wp.min.js', array(), '1.0', true);
	wp_enqueue_script('carrie-js-wp');

}
add_action( 'admin_init', 'carrie_admin_scripts' );

function carrie_load_wp_media_files() {
  wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'carrie_load_wp_media_files' );

// Set/Get current post details for global usage in templates (post position in loop, etc)
function carrie_set_post_details($details) {
	global $carrie_post_details;

	$carrie_post_details = $details;
}
function carrie_get_post_details() {
	global $carrie_post_details;

	return $carrie_post_details;
}

/*
* Process already escaped complex data
*/
function carrie_wp_kses_data($data) {
  // This function used in safe places only, where all dynamic data already escaped before,
  // and does not need double escaping

  return $data;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/theme-tags.php';

/**
 * Load theme functions.
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * Load theme sidebars.
 */
require get_template_directory() . '/inc/theme-sidebars.php';

/**
 * Load theme dynamic CSS.
 */
require get_template_directory() . '/inc/theme-css.php';

/**
 * Load theme dynamic JS.
 */
require get_template_directory() . '/inc/theme-js.php';

