<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Camille
 */
?>
<?php

$camille_theme_options = camille_get_theme_options();

$show_footer_sidebar_1 = true;

if(isset($camille_theme_options['footer_sidebar_1_homepage_only']) && ($camille_theme_options['footer_sidebar_1_homepage_only']) && is_front_page()) {
  $show_footer_sidebar_1 = true;
}
if(isset($camille_theme_options['footer_sidebar_1_homepage_only']) && ($camille_theme_options['footer_sidebar_1_homepage_only']) && !is_front_page()) {
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
camille_banner_show('above_footer');
?>
<?php
// Instagram feed
if(isset($camille_theme_options['footer_instagram_display']) && ($camille_theme_options['footer_instagram_display'])) {

    echo '<div class="footer-instagram-wrapper">';

    if(isset($camille_theme_options['footer_instagram_title']) && $camille_theme_options['footer_instagram_title'] <> '') {
      echo '<h3>'.esc_html($camille_theme_options['footer_instagram_subtitle']).'</h3>';
      echo '<h2>'.esc_html($camille_theme_options['footer_instagram_title']).'</h2>';
    }

    echo do_shortcode('[instagram-feed]');
    echo '</div>';

}
?>
<div class="container-fluid container-fluid-footer">
  <div class="row">

    <footer>
      <div class="container">
      <div class="row">
      <?php
      // Site Footer Banner
      camille_banner_show('footer');
      ?>
          <?php if(isset($camille_theme_options['footer_enable_menu']) && ($camille_theme_options['footer_enable_menu'])): ?>
          <div class="col-md-12 footer-menu">
          <?php
            wp_nav_menu(array(
              'theme_location'  => 'footer',
              'menu_class'      => 'footer-links'
              ));
          ?>
          </div>
          <?php endif; ?>
          <?php

            $footer_col_2_class = 'col-md-12';

            if(isset($camille_theme_options['footer_logo']) && $camille_theme_options['footer_logo']['url'] <> '') {
              $footer_col_2_class = 'col-md-12';
            }

            if(isset($camille_theme_options['footer_enable_social']) && ($camille_theme_options['footer_enable_social'])) {
              $footer_col_2_class = 'col-md-12';
            }

            if((isset($camille_theme_options['footer_logo']) && $camille_theme_options['footer_logo']['url'] <> '') && (isset($camille_theme_options['footer_enable_social']) && ($camille_theme_options['footer_enable_social']))) {
              $footer_col_2_class = 'col-md-12';
            }

          ?>
          <?php if(isset($camille_theme_options['footer_enable_social']) && ($camille_theme_options['footer_enable_social'])): ?>
          <div class="col-md-12 footer-social col-sm-12">
          <?php camille_social_show(true); ?>
          </div>
          <?php endif; ?>
          <?php if(isset($camille_theme_options['footer_logo']) && $camille_theme_options['footer_logo']['url'] <> ''):?>
          <div class="col-md-12 col-sm-12 footer-logo">
          <?php
              echo '<a class="footer-logo-link" href="'.esc_url(home_url('/')).'"><img src="'.esc_url($camille_theme_options['footer_logo']['url']).'" alt="'.esc_attr(get_bloginfo('name')).'" /></a>';
          ?>
          </div>
          <?php endif; ?>
          <div class="<?php echo esc_attr($footer_col_2_class); ?> col-sm-12 footer-copyright">
               <?php
                if(isset($camille_theme_options['footer_copyright_editor'])) {
                  echo wp_kses_post($camille_theme_options['footer_copyright_editor']);
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
      $camille_theme_options['enable_offcanvas_sidebar'] = $_GET['enable_offcanvas_sidebar'];
    }

    if(isset($camille_theme_options['enable_offcanvas_sidebar'])&&($camille_theme_options['enable_offcanvas_sidebar'])):
?>
      <nav id="offcanvas-sidebar-nav" class="st-sidebar-menu st-sidebar-effect-2">
      <div class="st-sidebar-menu-close-btn">×</div>
        <?php if ( is_active_sidebar( 'offcanvas-sidebar' ) ) : ?>
          <div class="offcanvas-sidebar sidebar">
          <ul id="offcanvas-sidebar" class="clearfix">
            <?php dynamic_sidebar( 'offcanvas-sidebar' ); ?>
          </ul>
          </div>
        <?php endif; ?>
      </nav>
<?php endif; ?>
<?php if(isset($camille_theme_options['disable_top_menu_search']) && !$camille_theme_options['disable_top_menu_search']): ?>
<div class="search-fullscreen-wrapper">
  <div class="search-fullscreen-form">
    <div class="search-close-btn"><?php esc_html_e('Close', 'camille'); ?></div>
    <?php get_template_part( 'searchform-fullscreen' ); ?>
  </div>
</div>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
