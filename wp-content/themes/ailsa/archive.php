<?php
/*
 * The template for displaying archive pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */
get_header();

// Theme Options
$ailsa_blog_style = cs_get_option('blog_listing_style');
$ailsa_blog_columns = cs_get_option('blog_listing_columns');
$ailsa_sidebar_position = cs_get_option('blog_sidebar_position');

// Columns
if ($ailsa_blog_style === 'style-two') {
  $ailsa_blog_style = 'aisa-list';
  $ailsa_grid_number = 1;
} else {
  $ailsa_blog_style = 'aisa-grid ';
  if($ailsa_blog_columns === 'aisa-blog-col-2') {
    $ailsa_grid_number = 2;
    $ailsa_blog_style_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
  } else if($ailsa_blog_columns === 'aisa-blog-col-3') {
    $ailsa_grid_number = 3;
    $ailsa_blog_style_class = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
  } else {
    $ailsa_grid_number = 1;
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
?>

<div class="aisa-containerWrap <?php echo esc_attr($ailsa_parent_class); ?>">
  <div class="container">

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="aisa-categoryBar">
          <?php if ( function_exists( 'ailsa_title_area' ) ) { echo ailsa_title_area(); } ?>
        </div>
      </div>
    </div>

    <div class="row">
      <?php
        if ($ailsa_sidebar_position === 'sidebar-left' && $ailsa_sidebar_position !== 'sidebar-hide') {
	      get_sidebar(); // Sidebar
	    }
      ?>
      <!-- Content Col Start -->
      <div class="aisa-contentCol <?php echo esc_attr($ailsa_layout_class); ?>">
        <article class="aisa-content">
           <div class="row aisa-content-area">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="<?php echo esc_attr($ailsa_blog_style); ?>">
                <?php
                  if ( have_posts() ) :
                    $ailsa_count_all_post = $GLOBALS['wp_query']->post_count;
                    $ailsa_count = 0;
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
                      $ailsa_count++;
                      if ( $ailsa_grid_number != 1) {
                        if( $ailsa_count === 1 ){
                          echo '<div class="row">';
                        }else if(( $ailsa_count % $ailsa_grid_number ) === 1 ){
                          echo '<div class="row">';
                        }
                        echo '<div class="'. esc_attr($ailsa_blog_style_class) .'">';
                      }

                      get_template_part( 'layouts/post/content' );

                      if ( $ailsa_grid_number != 1) {
                        echo '</div>';
                        if((($ailsa_count % $ailsa_grid_number) === 0) || ($ailsa_count === ($ailsa_count_all_post))){
                          echo '</div>';
                        }
                      }
               	    endwhile;
                  else :
               	    get_template_part( 'layouts/post/content', 'none' );
                  endif;
                ?>
                </div>
              </div>
           </div>
           <?php
             ailsa_paging_nav();
             wp_reset_postdata();  // avoid errors further down the page
           ?>
        </article>
      </div><!-- Content Col End -->
      <?php
        if ($ailsa_sidebar_position !== 'sidebar-left' && $ailsa_sidebar_position !== 'sidebar-hide') {
	      get_sidebar(); // Sidebar
	    }
      ?>
    </div>
  </div>
</div><?php
get_footer();
