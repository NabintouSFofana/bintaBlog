<?php
/*
 * Codestar Framework - Custom Style
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/* All Dynamic CSS Styles */
if ( ! function_exists( 'ailsa_dynamic_styles' ) ) {
function ailsa_dynamic_styles() {

$ailsa_get_typography = ailsa_get_typography();

ob_start();

global $post;
$ailsa_id    = ( isset( $post ) ) ? $post->ID : 0;
$ailsa_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $ailsa_id;
$ailsa_meta  = get_post_meta( $ailsa_id, 'page_type_metabox', true );

/* Page Layout Background - Page Metabox/Theme Option - Background */
if ($ailsa_meta) {
  $page_layout_bg_pmb = $ailsa_meta['page_layout_bg'];
  if ($page_layout_bg_pmb['image'] || $page_layout_bg_pmb['color']) {
    $page_layout_bg = $ailsa_meta['page_layout_bg'];
  } else {
    $page_layout_bg = cs_get_option('page_layout_bg');
  }
} else {
  $page_layout_bg_pmb = '';
  $page_layout_bg = cs_get_option('page_layout_bg');
}

if ($ailsa_meta) {
  if ($ailsa_meta['page_bg_overlay_color']) {
    $page_bg_overlay_color = $ailsa_meta['page_bg_overlay_color'];
  } else {
    $page_bg_overlay_color = cs_get_option('page_bg_overlay_color');
  }
} else {
  $page_bg_overlay_color = cs_get_option('page_bg_overlay_color');
}

$page_layout_bg_url = ( ! empty( $page_layout_bg['image'] ) ) ? 'background-image: url('. $page_layout_bg['image'] .');' : ' ';
$page_layout_bg_repeat = ( ! empty( $page_layout_bg['repeat'] ) ) ? 'background-repeat: '. $page_layout_bg['repeat'] .';' : 'background-repeat: no-repeat;';
$page_layout_bg_position = ( ! empty( $page_layout_bg['position'] ) ) ? 'background-position: '. $page_layout_bg['position'] .';' : 'background-position: center top;';
$page_layout_bg_attachment = ( ! empty( $page_layout_bg['attachment'] ) ) ? 'background-attachment: '. $page_layout_bg['attachment'] .';' : '';
$page_layout_bg_size = ( ! empty( $page_layout_bg['size'] ) ) ? 'background-size: '. $page_layout_bg['size'] .';' : 'background-size: cover;';
$page_layout_bg_color = ( ! empty( $page_layout_bg['color'] ) ) ? 'background-color: '. $page_layout_bg['color'] .';' : 'background-color: #f7f7f7;';

if ($page_layout_bg_url || $page_layout_bg_color) {
echo <<<CSS
  .no-class {}
  .aisa-background {
    position: relative;
    {$page_layout_bg_url}
    {$page_layout_bg_repeat}
    {$page_layout_bg_position}
    {$page_layout_bg_attachment}
    {$page_layout_bg_size}
    {$page_layout_bg_color}
  }
  .aisa-background:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: {$page_bg_overlay_color};
  }
CSS;
}

/* Logo Area Background - Page Metabox - Background */
if ($ailsa_meta) {
  $logo_area_layout_bg = $ailsa_meta['logo_area_layout_bg'];
  $logo_area_bg_overlay_color = $ailsa_meta['logo_area_bg_overlay_color'];
} else {
  $logo_area_layout_bg = '';
  $logo_area_bg_overlay_color = '';
}

$logo_area_layout_bg_url = ( ! empty( $logo_area_layout_bg['image'] ) ) ? 'background-image: url('. $logo_area_layout_bg['image'] .');' : ' ';
$logo_area_layout_bg_repeat = ( ! empty( $logo_area_layout_bg['repeat'] ) ) ? 'background-repeat: '. $logo_area_layout_bg['repeat'] .';' : 'background-repeat: no-repeat;';
$logo_area_layout_bg_position = ( ! empty( $logo_area_layout_bg['position'] ) ) ? 'background-position: '. $logo_area_layout_bg['position'] .';' : 'background-position: center top;';
$logo_area_layout_bg_attachment = ( ! empty( $logo_area_layout_bg['attachment'] ) ) ? 'background-attachment: '. $logo_area_layout_bg['attachment'] .';' : '';
$logo_area_layout_bg_size = ( ! empty( $logo_area_layout_bg['size'] ) ) ? 'background-size: '. $logo_area_layout_bg['size'] .';' : 'background-size: cover;';
$logo_area_layout_bg_color = ( ! empty( $logo_area_layout_bg['color'] ) ) ? 'background-color: '. $logo_area_layout_bg['color'] .';' : 'background-color: #f7f7f7;';

if ($logo_area_layout_bg_url || $logo_area_layout_bg_color) {
echo <<<CSS
  .no-class {}
  .aisa-logowrap {
    position: relative;
    {$logo_area_layout_bg_url}
    {$logo_area_layout_bg_repeat}
    {$logo_area_layout_bg_position}
    {$logo_area_layout_bg_attachment}
    {$logo_area_layout_bg_size}
    {$logo_area_layout_bg_color}
  }
  .aisa-logowrap:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: {$logo_area_bg_overlay_color};
  }
CSS;
}

/* Footer Layout Background- Theme Options - Background */
$footer_layout_bg = cs_get_option('footer_layout_bg');
$footer_bg_overlay_color = cs_get_option('footer_bg_overlay_color');

$footer_layout_bg_url = ( ! empty( $footer_layout_bg['image'] ) ) ? 'background-image: url('. $footer_layout_bg['image'] .');' : ' ';
$footer_layout_bg_repeat = ( ! empty( $footer_layout_bg['repeat'] ) ) ? 'background-repeat: '. $footer_layout_bg['repeat'] .';' : 'background-repeat: no-repeat;';
$footer_layout_bg_position = ( ! empty( $footer_layout_bg['position'] ) ) ? 'background-position: '. $footer_layout_bg['position'] .';' : 'background-position: center top;';
$footer_layout_bg_attachment = ( ! empty( $footer_layout_bg['attachment'] ) ) ? 'background-attachment: '. $footer_layout_bg['attachment'] .';' : '';
$footer_layout_bg_size = ( ! empty( $footer_layout_bg['size'] ) ) ? 'background-size: '. $footer_layout_bg['size'] .';' : 'background-size: cover;';
$footer_layout_bg_color = ( ! empty( $footer_layout_bg['color'] ) ) ? 'background-color: '. $footer_layout_bg['color'] .';' : ' ';

if ($footer_layout_bg_url || $footer_layout_bg_color) {
echo <<<CSS
  .no-class {}
  .aisa-footerWrap {
    position: relative;
    {$footer_layout_bg_url}
    {$footer_layout_bg_repeat}
    {$footer_layout_bg_position}
    {$footer_layout_bg_size}
    {$footer_layout_bg_attachment}
    {$footer_layout_bg_color}
  }
  .aisa-footerWrap:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: {$footer_bg_overlay_color};
  }
CSS;
}

// Primary Colors
$all_element_color  = cs_get_customize_option( 'all_element_colors' );
if ($all_element_color) {
echo <<<CSS
  .no-class {}
  a:link,
  a:active,
  a:visited,
  mark,
  .aisa-slogan span,
  .aisa-containerWrap .aisa-excerpt h1 a:hover,
  .aisa-containerWrap .aisa-excerpt h3 a:hover,
  .aisa-containerWrap .aisa-publish li a:hover,
  .aisa-containerWrap .aisa-sharebar li a:hover,
  .aisa-containerWrap .aisa-sharebar a:hover,
  .aisa-widget.widget_nav_menu a:hover,
  .aisa-widget.widget_rss a:hover,
  .aisa-widget.widget_recent_entries a:hover,
  .aisa-widget.widget_recent_comments a:hover,
  .aisa-widget.widget_meta a:hover,
  .aisa-widget.widget_pages a:hover,
  .aisa-widget.widget_archive a:hover,
  .aisa-footerWrap .aisa-widget.widget_categories a:hover,
  .aisa-sidebar .aisa-widget.widget_categories a:hover,
  .aisa-footerWrap .aisa-widget.aisa-recent-blog h4 a:hover,
  .aisa-sidebar .aisa-widget.aisa-recent-blog h4 a:hover,
  .aisa-footer .aisa-instagramWrap .aisa-titlebar a:hover,
  .aisa-right a:hover,
  .aisa-carousel li .aisa-posttitlebar h3 a:hover,
  .aisa-relatedpost .aisa-shortdetails h4 a:hover,
  .aisa-author li a:hover,
  #wp-calendar tbody td#today,
  #wp-calendar tbody td a,
  #wp-calendar tfoot td#prev a:hover,
  #wp-calendar tfoot td#next a:hover,
  .aisa-sliderBox .aisa-postdetails .box h3 a:hover,
  .aisa-copyright .goto-top a:hover,
  .aisa-social-one li a:hover,
  .aisa-content-area .wpb_wrapper pre,
  .aisa-mainmenu ul>li.current-menu-ancestor>a,
  .aisa-mainmenu ul>li.current_page_parent>a,
  .aisa-mainmenu ul li.active a,
  .aisa-mainmenu ul li a:hover,
  .navbar-toggle:hover .icon-bar,
  .slicknav_nav>li.current-menu-ancestor>a,
  .slicknav_nav>li.current-menu-ancestor>a>a,
  .slicknav_nav>li.current-menu-parent>a>a,
  .slicknav_nav>li.current-menu-parent>a,
  .slicknav_nav li.active a,
  .slicknav_nav ul li a:hover,
  .slicknav_nav li a:hover,
  .slicknav_nav li a:hover a,
  .slicknav_nav li ul>li.current-menu-parent > a,
  .slicknav_nav li ul>li.current-menu-parent > a > a,
  .aisa-mainmenu ul li.active li a:hover,
  .aisa-containerWrap .aisa-sharebar ul > li > a:hover i {color: {$all_element_color};}

  .aisa-btn,
  input[type='submit'],
  input[type='button'],
  .aisa-containerWrap .aisa-readmore a:hover,
  .aisa-sidebar .aisa-widget.widget_tag_cloud a:hover,
  .aisa-sidebar .aisa-widget.widget_tag_cloud li a:hover,
  .taglist a:hover,
  #wp-calendar tbody td#today,
  .sticky .aisa-excerpt {border-color: {$all_element_color};}

  blockquote {border-left-color: {$all_element_color};}

  .aisa-containerWrap .aisa-readmore a:hover,
  .aisa-btn,
  input[type='submit'],
  input[type='button'],
  .aisa-navicon ul:hover li,
  .aisa-sidebar .aisa-widget.widget_tag_cloud a:hover,
  .aisa-sidebar .aisa-widget.widget_tag_cloud li a:hover,
  .aisa-aside .aisa-sidebar .aisa-widget.social li a:hover,
  .aisa-aside .aisa-sidebar .aisa-widget .mc4wp-form input[type='submit'],
  .aisa-contentCol .wp-pagenavi a:hover,
  .aisa-contentCol .wp-pagenavi span,
  .aisa-pagination.number .older a:hover,
  .aisa-pagination li.active a,
  .aisa-pagination a:hover,
  .page-numbers li span,
  .page-numbers li a:hover,
  .aisa-about .aisa-share li a:hover,
  .taglist a:hover,
  .comments-reply a:hover,
  #wp-calendar thead th,
  .navbar-toggle:hover .icon-bar,
  .aisa-social-three li a:hover i,
  .aisa-social-two li a:hover,
  .slicknav_menu .slicknav_btn:hover span {background: {$all_element_color};}
CSS;
}

// Menu Bar Background Color
$menubar_bg_color  = cs_get_customize_option( 'menubar_bg_color' );
if ($menubar_bg_color) {
echo <<<CSS
  .no-class {}
  .aisa-headerTop,
  .slicknav_menu,
  .aisa-headerTop .aisa-socialbar {background: {$menubar_bg_color};}
CSS;
}

// Main Menu Color
$mainmenu_link_color  = cs_get_customize_option( 'mainmenu_link_color' );
if ($mainmenu_link_color) {
echo <<<CSS
  .no-class {}
  .aisa-mainmenu ul li a,
  .slicknav_nav li a {color: {$mainmenu_link_color};}
CSS;
}

// Main Menu Hover Color
$mainmenu_link_hover_color  = cs_get_customize_option( 'mainmenu_link_hover_color' );
if ($mainmenu_link_hover_color) {
echo <<<CSS
  .no-class {}
  .aisa-mainmenu ul>li.current-menu-ancestor>a,
  .aisa-mainmenu ul>li.current_page_parent>a,
  .aisa-mainmenu ul li.active a,
  .aisa-mainmenu ul li a:hover,
  .navbar-toggle:hover .icon-bar,
  .slicknav_nav>li.current-menu-ancestor>a,
  .slicknav_nav>li.current-menu-ancestor>a>a,
  .slicknav_nav>li.current-menu-parent>a>a,
  .slicknav_nav>li.current-menu-parent>a,
  .slicknav_nav li.active a,
  .slicknav_nav ul li a:hover,
  .slicknav_nav li a:hover,
  .slicknav_nav li a:hover a {color: {$mainmenu_link_hover_color};}
CSS;
}

// Sub Menu Background Color
$submenu_bg_color  = cs_get_customize_option( 'submenu_bg_color' );
if ($submenu_bg_color) {
echo <<<CSS
  .no-class {}
  .aisa-mainmenu ul li ul, .slicknav_nav {background: {$submenu_bg_color};}
CSS;
}

// Sub Menu Color
$submenu_link_color  = cs_get_customize_option( 'submenu_link_color' );
if ($submenu_link_color) {
echo <<<CSS
  .no-class {}
  .aisa-mainmenu ul li ul li a,
  .aisa-mainmenu ul>li.current-menu-ancestor li a,
  .aisa-mainmenu ul>li.current_page_parent li a,
  .slicknav_nav li li a,
  .slicknav_nav li li.active li a,
  .aisa-mainmenu ul li ul li a:link,
  .aisa-mainmenu ul li ul li a:active,
  .aisa-mainmenu ul li ul li a:visited {color: {$submenu_link_color};}
CSS;
}

// Sub Menu Hover Color
$submenu_link_hover_color  = cs_get_customize_option( 'submenu_link_hover_color' );
if ($submenu_link_hover_color) {
echo <<<CSS
  .no-class {}
  .aisa-mainmenu ul li ul li.active>a:link,
  .aisa-mainmenu ul li ul li.active>a:active,
  .aisa-mainmenu ul li ul li.active>a:visited,
  .aisa-mainmenu ul li ul li a:hover,
  .slicknav_nav li li a:hover,
  .slicknav_nav li li.active a,
  .slicknav_nav li li.active li a:hover,
  .aisa-mainmenu ul>li li.current_page_parent>a,
  .slicknav_nav li ul>li.current-menu-parent>a>a,
  .slicknav_nav li li a:hover a,
  .slicknav_nav li ul>li.current-menu-parent>a,
  .aisa-mainmenu ul li ul li.current-menu-item li a:hover,
  .aisa-mainmenu ul li ul li.current_page_parent>a:link,
  .aisa-mainmenu ul li ul li.current_page_parent>a:active,
  .aisa-mainmenu ul li ul li.current_page_parent>a:visited {color: {$submenu_link_hover_color};}
CSS;
}

// Header Social Icon Color
$menubar_social_color  = cs_get_customize_option( 'menubar_social_color' );
if ($menubar_social_color) {
echo <<<CSS
  .no-class {}
  .aisa-headerTop .aisa-social li a:link,
  .aisa-headerTop .aisa-social li a:active,
  .aisa-headerTop .aisa-social li a:visited {color: {$menubar_social_color};}
CSS;
}

// Header Social Icon Hover Color
$menubar_social_hover_color  = cs_get_customize_option( 'menubar_social_hover_color' );
if ($menubar_social_hover_color) {
echo <<<CSS
  .no-class {}
  .aisa-headerTop .aisa-social li a:hover {color: {$menubar_social_hover_color};}
CSS;
}

// Logo Bar Background Color
$logoarea_bg_color  = cs_get_customize_option( 'logoarea_bg_color' );
if ($logoarea_bg_color) {
echo <<<CSS
  .no-class {}
  .aisa-logowrap {background: {$logoarea_bg_color};}
CSS;
}

// Slogan Color
$slogan_text_color  = cs_get_customize_option( 'slogan_text_color' );
if ($slogan_text_color) {
echo <<<CSS
  .no-class {}
  .aisa-logowrap .aisa-slogan {color: {$slogan_text_color};}
CSS;
}

// Body Content Color
$body_color  = cs_get_customize_option( 'body_color' );
if ($body_color) {
echo <<<CSS
  .no-class {}
  body {color: {$body_color};}
CSS;
}

// Body Link Color
$body_links_color  = cs_get_customize_option( 'body_links_color' );
if ($body_links_color) {
echo <<<CSS
  .no-class {}
  a:link,
  a:visited,
  a:active {color: {$body_links_color};}
CSS;
}

// Body Link Hover Color
$body_link_hover_color  = cs_get_customize_option( 'body_link_hover_color' );
if ($body_link_hover_color) {
echo <<<CSS
  .no-class {}
  a:hover {color: {$body_link_hover_color};}
CSS;
}

// Sidebar Content Color
$sidebar_content_color  = cs_get_customize_option( 'sidebar_content_color' );
if ($sidebar_content_color) {
echo <<<CSS
  .no-class {}
  .aisa-sidebar {color: {$sidebar_content_color};}
CSS;
}

// Content Heading Color
$content_heading_color  = cs_get_customize_option( 'content_heading_color' );
if ($content_heading_color) {
echo <<<CSS
  .no-class {}
  .aisa-contentCol h1, .aisa-contentCol h2, .aisa-contentCol h3, .aisa-contentCol h4, .aisa-contentCol h5, .aisa-contentCol h6  {color: {$content_heading_color} !important;}
CSS;
}

// Sidebar Heading Color
$sidebar_heading_color  = cs_get_customize_option( 'sidebar_heading_color' );
if ($sidebar_heading_color) {
echo <<<CSS
  .no-class {}
  .aisa-sidebar .aisa-widget h2,.aisa-aside .aisa-sidebar .aisa-widget h2 {color: {$sidebar_heading_color};}
CSS;
}

// Footer Widget Heading Color
$footer_heading_color  = cs_get_customize_option( 'footer_heading_color' );
if ($footer_heading_color) {
echo <<<CSS
  .no-class {}
  .aisa-footerWrap .aisa-widget h2 {color: {$footer_heading_color} !important;}
CSS;
}

// Footer Widget Color
$footer_text_color  = cs_get_customize_option( 'footer_text_color' );
if ($footer_text_color) {
echo <<<CSS
  .no-class {}
  .aisa-footerWrap .aisa-widget {color: {$footer_text_color};}
CSS;
}

// Footer link Color
$footer_link_color  = cs_get_customize_option( 'footer_link_color' );
if ($footer_link_color) {
echo <<<CSS
  .no-class {}
  .aisa-footerWrap .aisa-widget li a, .aisa-footerWrap .aisa-widget h4 a {color: {$footer_link_color} !important;}
CSS;
}

// Footer link hover Color
$footer_link_hover_color  = cs_get_customize_option( 'footer_link_hover_color' );
if ($footer_link_hover_color) {
echo <<<CSS
  .no-class {}
  .aisa-footerWrap .aisa-widget li a:hover, .aisa-footerWrap .aisa-widget h4 a:hover {color: {$footer_link_hover_color} !important;}
CSS;
}

// Copyright text Color
$copyright_text_color  = cs_get_customize_option( 'copyright_text_color' );
if ($copyright_text_color) {
echo <<<CSS
  .no-class {}
  .aisa-copyright {color: {$copyright_text_color};}
CSS;
}

// Copyright Link Color
$copyright_link_color  = cs_get_customize_option( 'copyright_link_color' );
if ($copyright_link_color) {
echo <<<CSS
  .no-class {}
  .aisa-copyright .goto-top a, .aisa-copyright a {color: {$copyright_link_color} !important;}
CSS;
}

// Copyright Link Hover Color
$copyright_link_hover_color  = cs_get_customize_option( 'copyright_link_hover_color' );
if ($copyright_link_hover_color) {
echo <<<CSS
  .no-class {}
  .aisa-copyright .goto-top a:hover, .aisa-copyright a:hover {color: {$copyright_link_hover_color} !important;}
CSS;
}

// Copyright Background Color
$copyright_bg_color  = cs_get_customize_option( 'copyright_bg_color' );
if ($copyright_bg_color) {
echo <<<CSS
  .no-class {}
  .aisa-copyright {background: {$copyright_bg_color} !important;}
CSS;
}

// Maintenance Mode
$maintenance_mode_bg  = cs_get_option( 'maintenance_mode_bg' );
$page = cs_get_option('maintenance_mode_page');
if ($maintenance_mode_bg) {
  $maintenance_css = ( ! empty( $maintenance_mode_bg['image'] ) ) ? 'background-image: url('. $maintenance_mode_bg['image'] .');' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['repeat'] ) ) ? 'background-repeat: '. $maintenance_mode_bg['repeat'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['position'] ) ) ? 'background-position: '. $maintenance_mode_bg['position'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['attachment'] ) ) ? 'background-attachment: '. $maintenance_mode_bg['attachment'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['size'] ) ) ? 'background-size: '. $maintenance_mode_bg['size'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['color'] ) ) ? 'background-color: '. $maintenance_mode_bg['color'] .';' : '';
echo <<<CSS
  .no-class {}
  body.page-id-{$page} {
    {$maintenance_css}
  }
CSS;
}

// Dummy Image Disable
$dummy_image  = cs_get_option( 'blog_dummy_image' );
if ($dummy_image) {
echo <<<CSS
  .dummy-featured-image {display: none;}
CSS;
}

// Mobile Menu Breakpoint
$mobile_breakpoint  = cs_get_option( 'mobile_breakpoint');
$menu_breakpoint    = $mobile_breakpoint ? $mobile_breakpoint : '767';

echo <<<CSS
  .no-class {}
  @media (max-width: {$menu_breakpoint}px) {

    .nav.navbar-nav {
      display: none;
    }

    .slicknav_menu {
      display: block;
    }

    .slicknav_menu .nav.navbar-nav {
        display: block;
    }

    .navbar {
        min-height: inherit;
    }

    .aisa-navicon {
        padding-top: 14px;
        padding-bottom: 13px;
    }
 }
CSS;

  echo $ailsa_get_typography;

  $output = ob_get_clean();
  return $output;

}

}

/**
 * Custom Font Family
 */
if ( ! function_exists( 'ailsa_custom_font_load' ) ) {
  function ailsa_custom_font_load() {

    $font_family       = cs_get_option( 'font_family' );

    ob_start();

    if( ! empty( $font_family ) ) {

      foreach ( $font_family as $font ) {
        echo '@font-face{';

        echo 'font-family: "'. $font['name'] .'";';

        if( empty( $font['css'] ) ) {
          echo 'font-style: normal;';
          echo 'font-weight: normal;';
        } else {
          echo $font['css'];
        }

        echo ( ! empty( $font['ttf']  ) ) ? 'src: url('. $font['ttf'] .');' : '';
        echo ( ! empty( $font['eot']  ) ) ? 'src: url('. $font['eot'] .');' : '';
        echo ( ! empty( $font['svg']  ) ) ? 'src: url('. $font['svg'] .');' : '';
        echo ( ! empty( $font['woff'] ) ) ? 'src: url('. $font['woff'] .');' : '';
        echo ( ! empty( $font['otf']  ) ) ? 'src: url('. $font['otf'] .');' : '';

        echo '}';
      }

    }

    // Typography
    $output = ob_get_clean();
    return $output;
  }
}

/* Custom Styles */
if( ! function_exists( 'ailsa_framework_custom_css' ) ) {
  function ailsa_framework_custom_css() {
    wp_enqueue_style('ailsa-default-style', get_template_directory_uri() . '/style.css');
    $output  = ailsa_custom_font_load();
    $output .= ailsa_dynamic_styles();
    $output .= cs_get_option( 'theme_custom_css' );
    $custom_css = ailsa_compress_css_lines( $output );

    wp_add_inline_style( 'ailsa-default-style', $custom_css );
  }
}

/* Custom JS */
if( ! function_exists( 'ailsa_framework_custom_js' ) ) {
  function ailsa_framework_custom_js() {
    $output = cs_get_option( 'theme_custom_js' );
    wp_add_inline_script( 'jquery-migrate', $output );
  }
  add_action( 'wp_enqueue_scripts', 'ailsa_framework_custom_js' );
}