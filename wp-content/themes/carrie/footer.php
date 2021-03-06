<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Carrie
 */
?>
<?php 

$carrie_theme_options = carrie_get_theme_options();

$show_footer_sidebar_1 = true;

if(isset($carrie_theme_options['footer_sidebar_1_homepage_only']) && ($carrie_theme_options['footer_sidebar_1_homepage_only']) && is_front_page()) {
  $show_footer_sidebar_1 = true;
} 
if(isset($carrie_theme_options['footer_sidebar_1_homepage_only']) && ($carrie_theme_options['footer_sidebar_1_homepage_only']) && !is_front_page()) {
  $show_footer_sidebar_1 = false;
}
?>

<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
  <?php if($show_footer_sidebar_1): ?>
  <div class="footer-sidebar-wrapper clearfix">
    <div class="footer-sidebar sidebar container">
      <ul id="footer-sidebar">
        <?php dynamic_sidebar( 'footer-sidebar' ); ?>
      </ul>
    </div>
  </div>
  <?php endif; ?>
<?php endif; ?>
<?php 
// Site Above Footer Banner
carrie_banner_show('above_footer'); 
?>

<?php if(is_front_page()): ?>

<?php carrie_footer_shortcode_show(); ?>

<?php carrie_footer_instagram_show(); ?>

<?php carrie_footer_htmlblock_show(); ?>

<?php endif; ?>

<div class="container-fluid container-fluid-footer">
  <div class="row">
    
    <footer>
      <div class="container">
      <div class="row">
          <?php 
          // Site Footer Banner
          carrie_banner_show('footer'); 
          ?>

          <?php if(isset($carrie_theme_options['footer_enable_social']) && ($carrie_theme_options['footer_enable_social'])): ?>
          <div class="col-md-12 footer-social col-sm-12">
          <?php carrie_social_show(); ?>
          </div>
          <?php endif; ?>
          <?php if(isset($carrie_theme_options['footer_enable_menu']) && ($carrie_theme_options['footer_enable_menu'])): ?>
          <div class="col-md-12 footer-menu">
          <?php
            wp_nav_menu(array(
              'theme_location'  => 'footer',
              'menu_class'      => 'footer-links',
              'fallback_cb'    => false,
              ));
          ?>
          </div>
          <?php endif; ?>
          <div class="col-md-12 col-sm-12 footer-copyright">
              <?php if(isset($carrie_theme_options['footer_copyright_editor'])) { 
                echo wp_kses_post($carrie_theme_options['footer_copyright_editor']);
              }
              ?>
          </div>
   
      </div>
      </div>
      <a id="top-link" href="#top"></a>
    </footer>

  </div>
</div>

<?php

    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['enable_offcanvas_sidebar']) ) {
      $carrie_theme_options['enable_offcanvas_sidebar'] = $_GET['enable_offcanvas_sidebar'];
    }
    
    if(isset($carrie_theme_options['enable_offcanvas_sidebar'])&&($carrie_theme_options['enable_offcanvas_sidebar'])): 
?>
      <nav id="offcanvas-sidebar-nav" class="st-sidebar-menu st-sidebar-effect-2">
      <div class="st-sidebar-menu-close-btn">??</div>
        <?php if ( is_active_sidebar( 'offcanvas-sidebar' ) ) : ?>
          <div class="offcanvas-sidebar sidebar">
          <ul id="offcanvas-sidebar" class="clearfix">
            <?php dynamic_sidebar( 'offcanvas-sidebar' ); ?>
          </ul>
          </div>
        <?php endif; ?>
      </nav>
<?php endif; ?>
<?php if(isset($carrie_theme_options['disable_top_menu_search']) && !$carrie_theme_options['disable_top_menu_search']): ?>
<div class="search-fullscreen-wrapper">
  <div class="search-fullscreen-form">
    <div class="search-close-btn"><?php esc_html_e('Close', 'carrie'); ?></div>
    <?php get_template_part( 'searchform-popup' ); ?>
  </div>
</div>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>