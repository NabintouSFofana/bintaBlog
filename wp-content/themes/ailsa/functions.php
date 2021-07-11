<?php
/*
 * Ailsa Theme's Functions
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/**
 * Define - Folder Paths
 */
define( 'AILSA_THEMEROOT_PATH', get_template_directory() );
define( 'AILSA_THEMEROOT_URI', get_template_directory_uri() );
define( 'AILSA_CSS', AILSA_THEMEROOT_URI . '/assets/css' );
define( 'AILSA_IMAGES', AILSA_THEMEROOT_URI . '/assets/images' );
define( 'AILSA_SCRIPTS', AILSA_THEMEROOT_URI . '/assets/js' );
define( 'AILSA_FRAMEWORK', get_template_directory() . '/inc' );
define( 'AILSA_LAYOUT', get_template_directory() . '/layouts' );
define( 'AILSA_CS_IMAGES', AILSA_THEMEROOT_URI . '/inc/theme-options/theme-extend/images' );
define( 'AILSA_CS_FRAMEWORK', get_template_directory() . '/inc/theme-options/theme-extend' ); // Called in Icons field *.json
define( 'AILSA_ADMIN_PATH', get_template_directory() . '/inc/theme-options/cs-framework' ); // Called in Icons field *.json
define( 'AILSA_DUMMY_IMAGE', AILSA_IMAGES . '/dummy' );

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$ailsa_theme_child = wp_get_theme();
	$ailsa_get_parent = $ailsa_theme_child->Template;
	$ailsa_theme = wp_get_theme($ailsa_get_parent);
} else { // Parent Theme Active
	$ailsa_theme = wp_get_theme();
}
define('AILSA_VTHEME_NAME', $ailsa_theme->get( 'Name' ));
define('AILSA_VTHEME_VERSION', $ailsa_theme->get( 'Version' ));
define('AILSA_VTHEME_BRAND_URL', $ailsa_theme->get( 'AuthorURI' ));
define('AILSA_VTHEME_BRAND_NAME', $ailsa_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
require_once( AILSA_FRAMEWORK . '/init.php' );
