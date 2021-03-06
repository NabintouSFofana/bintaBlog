<?php
/**
 * WP Theme Header for coming soon page
 *
 * Displays all of the <head> section
 *
 * @package Camille
 */
$camille_theme_options = camille_get_theme_options();

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php echo body_class(); ?>>

<?php do_action( 'before' ); ?>