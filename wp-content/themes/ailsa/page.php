<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

// Metabox
$ailsa_id    = ( isset( $post ) ) ? $post->ID : 0;
$ailsa_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $ailsa_id;
$ailsa_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() ) ? $ailsa_id : false;
$ailsa_meta  = get_post_meta( $ailsa_id, 'page_type_metabox', true );

if ($ailsa_meta) {
  $ailsa_hide_page_title = $ailsa_meta['hide_page_title'];
} else {
  $ailsa_hide_page_title = '';
}

// Page Layout Options
$ailsa_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );

if ($ailsa_page_layout) {

  $ailsa_page_layout = $ailsa_page_layout['page_layout'];

  if ($ailsa_page_layout === 'extra-width') {
    $ailsa_parent_class = 'aisa-standardFullwidth';
  	$ailsa_column_class = 'extra-width';
  	$ailsa_layout_class = 'container-full';
    $ailsa_fluid_class  = 'container-fluid';
  } elseif($ailsa_page_layout === 'left-sidebar' || $ailsa_page_layout === 'right-sidebar') {
    $ailsa_parent_class = '';
  	$ailsa_column_class = 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
  	$ailsa_layout_class = 'container';
    $ailsa_fluid_class  = 'row';
  } else {
    $ailsa_parent_class = 'aisa-standardFullwidth';
  	$ailsa_column_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
  	$ailsa_layout_class = 'container';
    $ailsa_fluid_class  = 'row';
  }
} else {
  $ailsa_parent_class = 'aisa-standardFullwidth';
  $ailsa_column_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
  $ailsa_layout_class = 'container';
  $ailsa_fluid_class  = 'row';
}

get_header();

  if ($ailsa_meta && isset($ailsa_meta['page_before_content'])) {
    echo do_shortcode($ailsa_meta['page_before_content']);
  }
?>

<div class="aisa-containerWrap <?php echo esc_attr($ailsa_parent_class); ?>" >
  <div class="<?php echo esc_attr($ailsa_layout_class); ?>">
    <div class="<?php echo esc_attr($ailsa_fluid_class); ?>">
      <?php
        // Left Sidebar
        if($ailsa_page_layout === 'left-sidebar') {
          get_sidebar();
        }
      ?>
      <!-- Content Col Start -->
      <div class="aisa-contentCol <?php echo esc_attr($ailsa_column_class); ?>">
        <article class="aisa-content">
          <div class="row aisa-content-area">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php if ($ailsa_hide_page_title) { ?>
              <h2 class="pages-title"><?php echo ailsa_title_area(); ?></h2>
            <?php
            } // page title hide
              while ( have_posts() ) : the_post();
                the_content();
                // If comments are open or we have at least one comment, load up the comment template.
                $ailsa_theme_page_comments = cs_get_option('theme_page_comments');
                if ( isset($ailsa_theme_page_comments) && (comments_open() || get_comments_number()) ) :
                  comments_template();
                endif;
              endwhile; // End of the loop.
            ?>
            </div>
          </div>
        </article>
      </div>
      <!-- Content Col End -->
      <?php
        // Right Sidebar
        if($ailsa_page_layout === 'right-sidebar') {
       	  get_sidebar();
        }
	  ?>
	</div>
  </div>
</div><?php
get_footer();
