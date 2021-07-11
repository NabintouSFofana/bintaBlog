<?php
/**
 * Camille functions
 *
 * @package Camille
 */

/*
 *	@@@ iPanel Path Constant @@@
*/
define( 'CAMILLE_IPANEL_PATH' , get_template_directory() . '/ipanel/' );

/*
 *	@@@ iPanel URI Constant @@@
*/
define( 'CAMILLE_IPANEL_URI' , get_template_directory_uri() . '/ipanel/' );

/*
 *	@@@ Usage Constant @@@
*/
define( 'CAMILLE_IPANEL_PLUGIN_USAGE' , false );


/*
 *	@@@ Include iPanel Main File @@@
*/
include_once (CAMILLE_IPANEL_PATH . 'iPanel.php');

// Get theme options globally
function camille_get_theme_options() {
	if(get_option('CAMILLE_PANEL')) {
		$theme_options_data = maybe_unserialize(get_option('CAMILLE_PANEL'));
	} else {
		$theme_options_data = Array();
	}

	return $theme_options_data;
}

$camille_theme_options = camille_get_theme_options();

if (!isset($content_width))
	$content_width = 810; /* pixels */

if (!function_exists('camille_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function camille_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Camille, use a find and replace
	 * to change 'camille' to the name of your theme in all the template files
	 */
	load_theme_textdomain('camille', get_template_directory() . '/languages');

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
	 * Theme resize image
	 */
	add_image_size( 'camille-blog-thumb', 1140, 700, true);
	add_image_size( 'camille-blog-thumb-vertical', 440, 380, true);
	add_image_size( 'camille-blog-thumb-2column-sidebar', 409, 237, true);
	add_image_size( 'camille-blog-thumb-widget', 90, 70, true);

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
            'primary' => esc_html__('Header Menu', 'camille'),
            'top' => esc_html__('Top Menu', 'camille'),
            'footer' => esc_html__('Footer Menu', 'camille'),
	) );
	/*
	* Change excerpt length
	*/
	function camille_new_excerpt_length($length) {
		$camille_theme_options = camille_get_theme_options();

		if(isset($camille_theme_options['post_excerpt_legth'])) {
			$post_excerpt_length = $camille_theme_options['post_excerpt_legth'];
		} else {
			$post_excerpt_length = 18;
		}

		return $post_excerpt_length;
	}
	add_filter('excerpt_length', 'camille_new_excerpt_length');
	/**
	 * Enable support for Post Formats
	 */
	add_theme_support('post-formats', array('aside', 'image', 'gallery', 'video', 'audio', 'quote', 'link', 'status', 'chat'));

	// Activate theme
    update_option('camille_license_key_status', 'activated');
}
endif;
add_action('after_setup_theme', 'camille_setup');

// Title backward compatibility
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function camille_render_title() {

	?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php

	}

	add_action( 'wp_head', 'camille_render_title' );
}

/**
 * Enqueue scripts and styles
 */
function camille_scripts() {
	$camille_theme_options = camille_get_theme_options();

	wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'bootstrap' );

	wp_enqueue_style( 'camille-fonts', camille_google_fonts_url(), array(), '1.0' );

	wp_register_style('owl-main', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.css');
	wp_enqueue_style( 'owl-main' );

	wp_register_style('camille-stylesheet', get_stylesheet_uri(), array(), '1.0.2', 'all');
	wp_enqueue_style( 'camille-stylesheet' );

	wp_register_style('camille-responsive', get_template_directory_uri() . '/responsive.css', '1.0.2', 'all');
	wp_enqueue_style( 'camille-responsive' );

	if(isset($camille_theme_options['enable_theme_animations']) && $camille_theme_options['enable_theme_animations']) {
		wp_register_style('camille-animations', get_template_directory_uri() . '/css/animations.css');
		wp_enqueue_style( 'camille-animations' );
	}

	wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
	wp_register_style('camille-select2', get_template_directory_uri() . '/js/select2/select2.css'); // special version, must be prefixed with theme prefix
	wp_register_style('offcanvasmenu', get_template_directory_uri() . '/css/offcanvasmenu.css');
	wp_register_style('nanoscroller', get_template_directory_uri() . '/css/nanoscroller.css');
	wp_register_style('swiper', get_template_directory_uri() . '/css/idangerous.swiper.css');

	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'camille-select2' ); // special version, must be prefixed with theme prefix
	wp_enqueue_style( 'offcanvasmenu' );
	wp_enqueue_style( 'nanoscroller' );
	wp_enqueue_style( 'swiper' );

	add_thickbox();

	wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.1.1', true);
	wp_register_script('easing', get_template_directory_uri() . '/js/easing.js', array(), '1.3', true);
	wp_register_script('camille-template', get_template_directory_uri() . '/js/template.js', array(), '1.0.1', true);
	wp_register_script('camille-select2', get_template_directory_uri() . '/js/select2/select2.min.js', array(), '3.5.1', true); // special version, must be prefixed with theme prefix
	wp_register_script('owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js', array(), '2.0.0', true);
	wp_register_script('nanoscroller', get_template_directory_uri() . '/js/jquery.nanoscroller.min.js', array(), '3.4.0', true);

	wp_enqueue_script('camille-script', get_template_directory_uri() . '/js/template.js', array('jquery', 'bootstrap', 'easing', 'camille-select2', 'owl-carousel', 'nanoscroller'), '1.1', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

}
add_action('wp_enqueue_scripts', 'camille_scripts');

// Deregister scripts
function camille_dequeue_stylesandscripts() {
	if ( class_exists( 'woocommerce' ) && !is_checkout() ) {
		wp_dequeue_style( 'select2' );
		wp_deregister_style( 'select2' );
	}
}
add_action( 'wp_enqueue_scripts', 'camille_dequeue_stylesandscripts', 100 );

// WooCommerce functions
$loop_shop_per_page = function($cols) {

	$wc_products_per_page = 8;

    return $wc_products_per_page;
};

add_filter( 'loop_shop_per_page', $loop_shop_per_page, 20 );

/*
* Process already escaped complex data
*/
function camille_wp_kses_data($data) {
  // This function used in safe places only, where all dynamic data already escaped before,
  // and does not need double escaping

  return $data;
}

/**
 * Enqueue scripts and styles for admin area
 */
function camille_admin_scripts() {
	wp_register_style('camille-style-admin', get_template_directory_uri() .'/css/admin.css');
	wp_enqueue_style('camille-style-admin');
	wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style( 'font-awesome' );

	wp_register_script('camille-template-admin', get_template_directory_uri() . '/js/template-admin.js', array(), '1.0', true);
	wp_enqueue_script('camille-template-admin');

	wp_register_script('camille-js-wp', get_template_directory_uri() . '/js/js-wp.min.js', array(), '1.0', true);
	wp_enqueue_script('camille-js-wp');
}
add_action( 'admin_init', 'camille_admin_scripts' );

function camille_load_wp_media_files() {
  wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'camille_load_wp_media_files' );

// Set/Get current post details for global usage in templates (post position in loop, etc)
function camille_set_post_details($details) {
	global $camille_post_details;

	$camille_post_details = $details;
}
function camille_get_post_details() {
	global $camille_post_details;

	return $camille_post_details;
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
