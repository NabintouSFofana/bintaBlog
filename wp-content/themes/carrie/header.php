<?php
/**
 * WP Theme Header
 *
 * Displays all of the <head> section
 *
 * @package Carrie
 */
$carrie_theme_options = carrie_get_theme_options();

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['header_logo_position']) ) {
  $carrie_theme_options['header_logo_position'] = esc_html($_GET['header_logo_position']);
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<?php
// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['blog_layout']) ) {
  $carrie_theme_options['blog_layout'] = $_GET['blog_layout'];
}

?>
<body <?php body_class(); ?>>
<?php wp_body_open ();?>
<?php carrie_top_show(); ?>

<?php

// Center logo
if(isset($carrie_theme_options['header_logo_position'])) {
  $header_container_add_class = ' header-logo-'.esc_attr($carrie_theme_options['header_logo_position']);
} else {
  $header_container_add_class = '';
}
?>
<?php
// Disable header
if(!isset($carrie_theme_options['disable_header'])) {
  $carrie_theme_options['disable_header'] = false;
}

if(isset($carrie_theme_options['disable_header']) && !$carrie_theme_options['disable_header']):
?>
<header class="clearfix">
<div class="container<?php echo esc_attr($header_container_add_class); ?>">
  <div class="row">
    <div class="col-md-12">

      <div class="header-left">
        <?php carrie_header_left_show(); ?>
      </div>

      <div class="header-center">
        <?php carrie_header_center_show(); ?>
      </div>

      <div class="header-right">
        <?php carrie_header_right_show(); ?>
      </div>
    </div>
  </div>

</div>
<?php carrie_menu_below_header_show(); ?>
</header>
<?php endif; ?>
<?php
// Site Header Banner
carrie_banner_show('below_header');
?>
