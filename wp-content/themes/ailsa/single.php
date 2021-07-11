<?php
/*
 * The template for displaying all single posts.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */
get_header();

// Single Theme Option
$ailsa_single_comment = cs_get_option('single_comment_form');

// Single Theme Translation Text Option
$ailsa_previous_post = cs_get_option('previous_post') ? cs_get_option('previous_post') : esc_html__( 'PREVIOUS POST', 'ailsa' );
$ailsa_next_post     = cs_get_option('next_post') ? cs_get_option('next_post') : esc_html__( 'NEXT POST', 'ailsa' );

// Metabox
$ailsa_page_metabox = get_post_meta( get_the_ID(), 'page_type_metabox', true );

// Single Post Page Layout Option
$ailsa_page_layout  = get_post_meta( get_the_ID(), 'post_page_layout_options', true );

$ailsa_sidebar_position = '';

if ($ailsa_page_layout) {
  $ailsa_page_layout = $ailsa_page_layout['post_page_layout'];
  if ($ailsa_page_layout === 'none') {
    $ailsa_sidebar_position = cs_get_option('single_sidebar_position');
  } else {
    if ($ailsa_page_layout === 'left-sidebar') {
      $ailsa_sidebar_position = 'sidebar-left';
    } else if ($ailsa_page_layout === 'right-sidebar') {
      $ailsa_sidebar_position = 'sidebar-right';
    } else {
      $ailsa_sidebar_position = 'sidebar-hide';
    }
  }
}

// Sidebar Position
if ($ailsa_sidebar_position === 'sidebar-hide') {
  $ailsa_parent_class = 'aisa-standardFullwidth';
	$ailsa_layout_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12 ';
} elseif ($ailsa_sidebar_position === 'sidebar-left') {
  $ailsa_parent_class = '';
	$ailsa_layout_class = 'col-lg-9 col-md-9 col-sm-12 col-xs-12 ';
} else {
  $ailsa_parent_class = '';
	$ailsa_layout_class = 'col-lg-9 col-md-9 col-sm-12 col-xs-12 ';
}

if (isset($ailsa_page_metabox['page_before_content'])) {
  echo do_shortcode($ailsa_page_metabox['page_before_content']);
}
?>

<!-- Content Wrapper Start -->
<div class="aisa-containerWrap aisa-single-post <?php echo esc_attr($ailsa_parent_class); ?>">
  <div class="container">
    <div class="row">
      <?php
      if ($ailsa_sidebar_position === 'sidebar-left' && $ailsa_sidebar_position !== 'sidebar-hide') {
	      get_sidebar(); // Sidebar
	    }
      ?>
      <!-- Content Column Start -->
      <div class="aisa-contentCol <?php echo esc_attr($ailsa_layout_class); ?>">
        <article class="aisa-content">
          <?php
		    if ( have_posts() ) :
              /* Start the Loop */
              while ( have_posts() ) : the_post();
                get_template_part( 'layouts/post/content', 'single' );
                $ailsa_single_comment = $ailsa_single_comment ? comments_template() : ''; ?>

                <div class="aisa-pagination text row">
                  <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 newer">
                    <?php next_post_link( '%link', '<i class="fa fa-angle-double-left" aria-hidden="true"></i> '. esc_attr($ailsa_previous_post) ); ?>
                  </div>
                  <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 older">
                    <?php previous_post_link( '%link', esc_attr($ailsa_next_post). ' <i class="fa fa-angle-double-right" aria-hidden="true"></i>' ); ?>
                  </div>
                </div>
          <?php
              endwhile;
              else :
                get_template_part( 'layouts/post/content', 'none' );
             endif;
             wp_reset_postdata();  // avoid errors further down the page
          ?>
         </article>
       </div>
       <!-- Content Column End -->
      <?php
      if ($ailsa_sidebar_position !== 'sidebar-left' && $ailsa_sidebar_position !== 'sidebar-hide') {
        get_sidebar(); // Sidebar
      }
      ?>
    </div>
  </div>
</div><?php
get_footer();
