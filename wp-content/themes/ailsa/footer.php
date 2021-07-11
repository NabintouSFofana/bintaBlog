<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

$ailsa_id    = ( isset( $post ) ) ? $post->ID : 0;
$ailsa_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $ailsa_id;
$ailsa_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() ) ? $ailsa_id : false;
$ailsa_meta  = get_post_meta( $ailsa_id, 'page_type_metabox', true );

if ($ailsa_meta) {
  $ailsa_hide_footer  = $ailsa_meta['hide_footer'];
  $ailsa_menu_sidebar = $ailsa_meta['menu_sidebar'];
} else {
  $ailsa_hide_footer  = '';
  $ailsa_menu_sidebar = cs_get_option('menu_sidebar');
}
?>
</div>
<!-- aisa-background end -->

<?php if (!$ailsa_hide_footer) { // Hide Footer Metabox ?>
<!-- Footer Start -->
<footer class="aisa-footer">
  <?php
    $ailsa_footer_widget_block = cs_get_option('footer_widget_block');
    if (isset($ailsa_footer_widget_block)) {
      // Footer Widget Block
      get_template_part( 'layouts/footer/footer', 'widgets' );
    }
    $ailsa_need_copyright = cs_get_option('need_copyright');
    if (isset($ailsa_need_copyright)) {
      // Copyright Block
  	  get_template_part( 'layouts/footer/footer', 'copyright' );
    }
  ?>
</footer>
<!-- Footer End-->
<?php } // Hide Footer Metabox ?>
</div><!-- aisa-wrap end -->
<?php if ($ailsa_menu_sidebar) { ?>
  <a href="javascript:void(0)" id="aisa-closebtn" onclick="closeNav()">&times;</a>
<?php }
wp_footer(); ?>
</body>
</html><?php
