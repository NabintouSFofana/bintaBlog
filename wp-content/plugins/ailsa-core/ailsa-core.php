<?php
/*
Plugin Name: Ailsa Core
Plugin URI: https://victorthemes.com/themes/ailsa
Description: Plugin to contain shortcodes and custom post types for this ailsa theme.
Author: VictorThemes
Author URI: https://victorthemes.com
Version: 1.6
Text Domain: ailsa-core
*/

if( ! function_exists( 'theme_block_direct_access' ) ) {
	function theme_block_direct_access() {
		if( ! defined( 'ABSPATH' ) ) {
			exit( 'Forbidden' );
		}
	}
}

// Plugin URL
define( 'AILSA_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

// Plugin PATH
define( 'AILSA_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'AILSA_PLUGIN_ASTS', AILSA_PLUGIN_URL . 'assets' );
define( 'AILSA_PLUGIN_IMGS', AILSA_PLUGIN_ASTS . '/images' );
define( 'AILSA_PLUGIN_INC', AILSA_PLUGIN_PATH . 'inc' );

// DIRECTORY SEPARATOR
define ( 'DS' , DIRECTORY_SEPARATOR );

// VictorThemes Shortcode Path
define( 'AILSA_SHORTCODE_BASE_PATH', AILSA_PLUGIN_PATH . 'visual-composer/' );
define( 'AILSA_SHORTCODE_PATH', AILSA_SHORTCODE_BASE_PATH . 'shortcodes/' );

/**
 * Check if Codestar Framework is Active or Not!
 */
function is_cs_framework_active() {
  return ( defined( 'CS_VERSION' ) ) ? true : false;
}

/* AILSA_NAME_P */
define('AILSA_NAME_P', 'Ailsa');

// Initial File
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('ailsa-core/ailsa-core.php')) {

  /* One Click Install */
  require_once( AILSA_PLUGIN_INC . '/import/init.php' );

  // Shortcodes
  require_once( AILSA_SHORTCODE_BASE_PATH . '/vc-setup.php' );
  if (is_plugin_active('js_composer/js_composer.php')) {
    require_once( AILSA_SHORTCODE_BASE_PATH . '/lib/lib.php' );
  }
  require_once( AILSA_PLUGIN_INC . '/custom-shortcodes/theme-shortcodes.php' );
  require_once( AILSA_PLUGIN_INC . '/custom-shortcodes/custom-shortcodes.php' );

  // Widgets
  require_once( AILSA_PLUGIN_INC . '/widgets/widget-extra-fields.php' );
  require_once( AILSA_PLUGIN_INC . '/widgets/recent-posts.php' );
  require_once( AILSA_PLUGIN_INC . '/widgets/instagram-widget.php' );
  require_once( AILSA_PLUGIN_INC . '/widgets/text-widget.php' );

}

/**
 * Plugin language
 */
function ailsa_plugin_language_setup() {
  load_plugin_textdomain( 'ailsa-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'ailsa_plugin_language_setup' );

/* WPAUTOP for shortcode output */
if( ! function_exists( 'ailsa_set_wpautop' ) ) {
  function ailsa_set_wpautop( $content, $force = true ) {
    if ( $force ) {
      $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
    }
    return do_shortcode( shortcode_unautop( $content ) );
  }
}

/* Use shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');

/* Shortcodes enable in the_excerpt */
add_filter('the_excerpt', 'do_shortcode');

/* Add Extra Social Fields in Admin User Profile */
function victor_themes_add_twitter_facebook( $contactmethods ) {
  $contactmethods['facebook']    = 'Facebook';
  $contactmethods['twitter']     = 'Twitter';
  $contactmethods['linkedin']    = 'Linkedin';
  $contactmethods['instagram']   = 'Instagram';
  $contactmethods['pinterest']   = 'Pinterest';
  $contactmethods['vimeo']       = 'Vimeo';
  $contactmethods['youtube']     = 'You Tube';
  return $contactmethods;
}
add_filter('user_contactmethods','victor_themes_add_twitter_facebook',10,1);

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_encode_string' ) ) {
  function cs_encode_string( $string ) {
    return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
  }
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
  function cs_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
  }
}
