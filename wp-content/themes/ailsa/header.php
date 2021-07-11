<?php
/*
 * The header for our theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */
?>
<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<?php
$ailsa_viewport = cs_get_option('theme_responsive');
if($ailsa_viewport == 'on') { $ailsa_responsive_class = 'aisa-responsive-on'; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<?php } else { $ailsa_responsive_class = 'aisa-responsive-off'; }
// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
  if (cs_get_option('brand_fav_icon')) {
    echo '<link rel="shortcut icon" href="'. esc_url(wp_get_attachment_url(cs_get_option('brand_fav_icon'))) .'" />';
  } else { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(AILSA_IMAGES); ?>/favicon.png" />
  <?php }
  if (cs_get_option('iphone_icon')) {
    echo '<link rel="apple-touch-icon" sizes="57x57" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_icon'))) .'" >';
  }
  if (cs_get_option('iphone_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="114x114" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
    echo '<link name="msapplication-TileImage" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
  }
  if (cs_get_option('ipad_icon')) {
    echo '<link rel="apple-touch-icon" sizes="72x72" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_icon'))) .'" >';
  }
  if (cs_get_option('ipad_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="144x144" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_retina_icon'))) .'" >';
  }
}
$ailsa_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($ailsa_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($ailsa_all_element_color); ?>">

<link rel="profile" href="http://gmpg.org/xfn/11"/>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>

<?php
// Metabox
global $post;
$ailsa_id    = ( isset( $post ) ) ? $post->ID : false;
$ailsa_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $ailsa_id;
$ailsa_id    = ( !is_tag() && !is_archive() && !is_category() && !is_search() && !is_404()) ? $ailsa_id : false;
$ailsa_meta  = get_post_meta( $ailsa_id, 'page_type_metabox', true );

// Header Style
if ($ailsa_meta) {
  $ailsa_menu_sidebar   = $ailsa_meta['menu_sidebar'];
  $ailsa_sticky_header  = $ailsa_meta['sticky_header'];
  $ailsa_hide_header    = $ailsa_meta['hide_header'];
} else {
  $ailsa_menu_sidebar   = cs_get_option('menu_sidebar');
  $ailsa_sticky_header  = cs_get_option('sticky_header');
  $ailsa_hide_header    = '';
}
$ailsa_sticky_header_class = $ailsa_sticky_header ? 'aisa-sticky' : '';

wp_head();
?>
</head>

<body <?php body_class(); ?>>

<?php if ($ailsa_menu_sidebar) { ?>
  <div id="aisa-aside" class="aisa-aside">
  <?php if (is_active_sidebar('sidebar-menu')) { ?>
    <div class="aisa-sidebar">
      <?php dynamic_sidebar('sidebar-menu'); ?>
    </div>
  <?php } ?>
  </div>
  <!-- aside -->
<?php } ?>

  <div id="aisa-wrap" class="<?php echo esc_attr($ailsa_sticky_header_class .' '. $ailsa_responsive_class); ?>">

    <?php if (!$ailsa_hide_header) {
      /* Menu Bar */
      get_template_part( 'layouts/header/menu', 'bar' );
      ?>

      <header class="aisa-header">
        <?php
        /* Brand Logo */
        get_template_part( 'layouts/header/logo' );
        ?>
      </header>
    <?php } ?>
    <div class="aisa-background"><?php
