<?php
// Metabox
$ailsa_id    = ( isset( $post ) ) ? $post->ID : 0;
$ailsa_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $ailsa_id;
$ailsa_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() ) ? $ailsa_id : false;
$ailsa_meta  = get_post_meta( $ailsa_id, 'page_type_metabox', true );

// Header Style - ThemeOptions & Metabox
if ($ailsa_meta) {
  $ailsa_menu_sidebar   = $ailsa_meta['menu_sidebar'];
  $ailsa_sticky_header  = $ailsa_meta['sticky_header'];
  $ailsa_search_icon    = $ailsa_meta['search_icon'];
} else {
  $ailsa_menu_sidebar   = cs_get_option('menu_sidebar');
  $ailsa_sticky_header  = cs_get_option('sticky_header');
  $ailsa_search_icon    = cs_get_option('search_icon');
}
$ailsa_social_links     = cs_get_option('social_links');

if ($ailsa_menu_sidebar) {
  $ailsa_menubar_layout_class = 'col-lg-11 col-md-11 col-sm-11';
} else {
  $ailsa_menubar_layout_class = 'col-lg-12 col-md-12 col-sm-12';
}
if ($ailsa_search_icon) {
  $ailsa_social_layout_class = 'col-lg-6 col-md-6 col-sm-6';
} else {
  $ailsa_social_layout_class = 'col-lg-12 col-md-12 col-sm-12';
}
if (isset($ailsa_social_links)) {
  $ailsa_search_layout_class = 'col-lg-6 col-md-6 col-sm-6';
} else {
  $ailsa_search_layout_class = 'col-lg-12 col-md-12 col-sm-12';
}
if ((!$ailsa_search_icon) && !isset($ailsa_social_links)) {
  $ailsa_menu_layout_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
} else {
  $ailsa_menu_layout_class = 'col-lg-8 col-md-9 col-sm-12 col-xs-12';
}
?>

<!-- Navigation & Search -->
<div class="navbar aisa-headerTop">
  <div class="container">
    <div class="row">

    <?php if ($ailsa_menu_sidebar) { ?>
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-6 aisa-navicon">
      <ul onclick="openNav()">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
    <?php } ?>

    <div class="<?php echo esc_attr($ailsa_menubar_layout_class); ?> col-xs-12 aisa-menubar">
      <div id="navbar">
        <div class="row">
        <?php
            wp_nav_menu(
                array(
                  'menu'              => 'primary',
                  'theme_location'    => 'primary',
                  'container'         => 'div',
                  'container_class'   => 'aisa-mainmenu '.$ailsa_menu_layout_class.' ',
                  'container_id'      => '',
                  'menu_class'        => 'nav navbar-nav',
                  'menu_id'           => 'aisa-menu',
                  'fallback_cb'       => 'ailsa_wp_bootstrap_navwalker::fallback',
                  'walker'            => new ailsa_wp_bootstrap_navwalker()
                )
            );
        if (($ailsa_search_icon) || isset($ailsa_social_links)) {
        ?>
        <div class="aisa-socialbar col-lg-4 col-md-3 col-sm-12 col-xs-12">
          <div class="row">
            <?php if ($ailsa_search_icon) { ?>
              <div class="aisa-search <?php echo esc_attr($ailsa_search_layout_class); ?> col-6">
                <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="searchform" >
                  <input type="search" name="s" id="s" value="<?php esc_html_e('Hit Enter to Search', 'ailsa'); ?>" onclick="value=''"/>
                  <button><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
              </div>
            <?php }
            if (isset($ailsa_social_links)) { ?>
              <div class="aisa-social <?php echo esc_attr($ailsa_social_layout_class); ?> col-6">
                <?php echo do_shortcode($ailsa_social_links); ?>
              </div>
            <?php } ?>
          </div>
        </div>
        <?php } ?>
        <!-- aisa-socialbar -->
      </div>
      <!-- row -->
     </div>
     <!-- nav-collapse -->
    </div>
    <!-- menubar -->
  </div> <!-- Row -->
 </div> <!-- Container -->
 <div id="logobar"></div>
</div> <!-- aisa-navigation -->

