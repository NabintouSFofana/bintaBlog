<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

// Theme Option Sidebar Position
$ailsa_blog_widget = cs_get_option('blog_widget');
$ailsa_single_blog_widget = cs_get_option('single_blog_widget');

if (is_page()) {
  $ailsa_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
} elseif (is_single()) {
  $ailsa_post_page_layout = get_post_meta( get_the_ID(), 'post_page_layout_options', true );
  $ailsa_post_layout = ($ailsa_post_page_layout) ? $ailsa_post_page_layout['post_page_layout'] : '';
  $ailsa_post_layout = ($ailsa_post_layout) ? $ailsa_post_layout : '';
}
?>

<div class="aisa-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<?php if (is_page() && $ailsa_page_layout['page_sidebar_widget']) {
		if (is_active_sidebar($ailsa_page_layout['page_sidebar_widget'])) {
			dynamic_sidebar($ailsa_page_layout['page_sidebar_widget']);
		}
	} elseif (!is_page() && !is_single() && $ailsa_blog_widget) {
		if (is_active_sidebar($ailsa_blog_widget)) {
			dynamic_sidebar($ailsa_blog_widget);
		}
	} elseif (is_single() && ($ailsa_post_layout === 'left-sidebar' || $ailsa_post_layout === 'right-sidebar') && !empty($ailsa_post_page_layout['post_page_sidebar_widget'])) {
		if (is_active_sidebar($ailsa_post_page_layout['post_page_sidebar_widget'])) {
			dynamic_sidebar($ailsa_post_page_layout['post_page_sidebar_widget']);
		}
	} elseif (is_single() && ($ailsa_post_layout === 'none') && $ailsa_single_blog_widget) {
		if (is_active_sidebar($ailsa_single_blog_widget)) {
			dynamic_sidebar($ailsa_single_blog_widget);
		}
	} else {
		if (is_active_sidebar( 'sidebar-1' )) {
			dynamic_sidebar( 'sidebar-1' );
		}
	} ?>
</div><!-- #secondary --><?php
