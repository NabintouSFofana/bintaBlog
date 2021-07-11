<?php
// Background Options
$ailsa_footer_instafeed_block = cs_get_option( 'footer_instafeed_block' );

// Metabox
$ailsa_id    = ( isset( $post ) ) ? $post->ID : 0;
$ailsa_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $ailsa_id;
$ailsa_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() ) ? $ailsa_id : false;
$ailsa_meta  = get_post_meta( $ailsa_id, 'page_type_metabox', true );
?>
<!-- Footer Widgets -->
<?php
if ($ailsa_meta && !$ailsa_meta['hide_footer_instagram']) {
	if( $ailsa_footer_instafeed_block ) {
		if (is_active_sidebar('footer-instafeed-block')) {
	    dynamic_sidebar( 'footer-instafeed-block' );
	  }
	}
} elseif(!$ailsa_meta) {
	if( $ailsa_footer_instafeed_block ) {
		if (is_active_sidebar('footer-instafeed-block')) {
	    dynamic_sidebar( 'footer-instafeed-block' );
	  }
	}
}
?>

<div class="aisa-footerWrap">
  <div class="container">
	<div class="row">
		<?php echo ailsa_footer_widgets(); ?>
	</div>
  </div>
</div>
<!-- Footer Widgets -->