<?php
/**
 * Template part for displaying posts.
 */

// Blog Theme Option
$ailsa_blog_share_option = cs_get_option('blog_share_option');
$ailsa_blog_popup_option = cs_get_option('blog_popup_option');
$ailsa_blog_read_more_option = cs_get_option('blog_read_more_option');
$ailsa_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
$ailsa_excerpt_length = 94;

// Blog Page Translation Text Option
$ailsa_read_more_text = cs_get_option('read_more_text') ? cs_get_option('read_more_text') : esc_html__( 'Read More', 'ailsa' );

// Blog Page Layout Option
$ailsa_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$ailsa_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full', false, '' );
$ailsa_large_image = $ailsa_large_image[0];

if ( is_sticky(get_the_ID()) ) { $ailsa_sclass = 'sticky'; } else { $ailsa_sclass = '';}
?>

<!-- Post Start -->
<div class="aisa-latestBlog">
  <div id="post-<?php the_ID(); ?>" <?php post_class('aisa-blog-post '.$ailsa_sclass); ?>>

    <?php if ( 'gallery' == get_post_format() && ! empty( $ailsa_post_type['gallery_post_format'] ) ) { ?>
        <div class="aisa-sliderBox">
          <ul class="owl-carousel aisa-featureImg-carousel">
            <?php
              $ailsa_ids = explode( ',', $ailsa_post_type['gallery_post_format'] );
              foreach ( $ailsa_ids as $id ) {
                $ailsa_attachment = wp_get_attachment_image_src( $id, 'full' );
                $ailsa_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
                $ailsa_alt = $ailsa_alt ? esc_attr($ailsa_alt) : esc_attr(get_the_title());
                $ailsa_g_img = $ailsa_attachment[0];
                $dummy_image = cs_get_option('blog_dummy_image');
                if($ailsa_g_img){
                  $ailsa_post_img = $ailsa_g_img;
                  $img_class = '';
                } else {
                  if ( !isset($dummy_image) ) {
                    $ailsa_post_img = AILSA_DUMMY_IMAGE . '/1170x705_sl.jpg';
                    $img_class = 'dummy-featured-image';
                  } else {
                    $ailsa_post_img = '';
                    $img_class = '';
                  }
                }
                if ($ailsa_blog_popup_option) {
                  $ailsa_popup_class = 'aisa-img-popup';
                  $ailsa_link_to = ($ailsa_post_img) ? $ailsa_post_img : get_the_permalink();
                } else {
                  $ailsa_popup_class = '';
                  $ailsa_link_to = get_the_permalink();
                }
                echo '<li>';
                echo '<a href='.esc_url($ailsa_link_to).' class="'.esc_attr($ailsa_popup_class).'">';
                if ($ailsa_post_img) {
                  echo '<img src="'. esc_url($ailsa_post_img) .'" alt="'.$ailsa_alt.'" class="'. $img_class .'" /></a></li>';
                }
                echo '</a></li>';
              }
            ?>
          </ul>
        </div>
    <?php
      } elseif ( ('audio' == get_post_format()) && ! empty( $ailsa_post_type['audio_post_format'] ) ) { ?>
        <div class="aisa-music">
          <?php echo $ailsa_post_type['audio_post_format']; ?>
        </div>
    <?php
      } elseif ( ('video' == get_post_format()) && ! empty( $ailsa_post_type['video_post_format'] ) ) { ?>
          <div class="aisa-video">
             <?php echo $ailsa_post_type['video_post_format']; ?>
          </div>
    <?php
      } elseif ($ailsa_large_image) {
        if ($ailsa_blog_popup_option) {
          $ailsa_popup_class = 'aisa-img-popup';
          $ailsa_link_to = $ailsa_large_image;
        } else {
          $ailsa_popup_class = '';
          $ailsa_link_to = get_the_permalink();
        }
    ?>
        <div class="aisa-featureImg">
          <a href="<?php echo esc_url($ailsa_link_to); ?>" class="<?php echo esc_attr($ailsa_popup_class); ?>"><img src="<?php echo esc_url($ailsa_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"/></a>
        </div>
	<?php } // Featured Image ?>

	<!-- post Content Start-->
    <div class="aisa-excerpt">
        <?php if ( !in_array( 'category', $ailsa_metas_hide )) { // Category Hide ?>
          <?php
            $ailsa_categories = get_the_category( get_the_ID() );
            $ailsa_cnt_cat = count($ailsa_categories);
            if ($ailsa_categories) {
              echo '<div class="category-title"><div class="aisa-btn">';
              the_category( '<span>&nbsp;&amp;&nbsp;</span>' );
              echo '</div></div>';
            }
          }
        ?>

        <h3 class="blog-heading"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h3>

        <?php if ( !in_array( 'date', $ailsa_metas_hide ) && !in_array( 'author', $ailsa_metas_hide ) ) { // Category Hide ?>
          <div class="aisa-publish">
            <ul>
               <?php if ( !in_array( 'date', $ailsa_metas_hide )) { // Date Hide ?>
                 <li> <?php the_time('F d, Y'); ?> </li>
               <?php }
               if ( !in_array( 'author', $ailsa_metas_hide )) { // Author Hide ?>
                 <li><?php esc_html_e('by', 'ailsa'); ?></li>
                 <li>
                    <?php printf('<a href="%1$s" rel="author">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author()); ?>
                 </li>
               <?php } ?>
            </ul>
          </div>
        <?php } ?>
        <div class="aisa-article">
          <?php
            if ( function_exists( 'ailsa_my_excerpt' ) ) {
              ailsa_my_excerpt($ailsa_excerpt_length);
            }
            if ( function_exists( 'ailsa_wp_link_pages' ) ) {
              echo ailsa_wp_link_pages();
            }
          ?>
        </div>
        <?php if($ailsa_blog_read_more_option){ ?>
          <div class="aisa-readmore">
            <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr($ailsa_read_more_text); ?></a>
          </div>
        <?php }
        if( isset($ailsa_blog_share_option) || !in_array( 'comments', $ailsa_metas_hide ) ){ ?>
          <div class="aisa-sharebar row">
            <?php if ( !in_array( 'comments', $ailsa_metas_hide )) { // Comments Hide ?>
              <div class="col-lg-6 col-md-6 col-sm-6 col-6 comentbox">
                <?php
                  if ( function_exists( 'ailsa_comment_number' ) ) {
                    echo ailsa_comment_number();
                  }
                ?>
              </div>
            <?php }
            if(isset($ailsa_blog_share_option)){ ?>
              <div class="col-lg-6 col-md-6 col-sm-6 col-6 sharebox">
                <?php
                  if ( function_exists( 'ailsa_wp_share_option' ) ) {
                    echo ailsa_wp_share_option();
                  }
                ?>
              </div>
            <?php } ?>
          </div>
        <?php } ?>

      </div>
      <!-- Post Content End -->

  </div>
</div><!-- Post End -->
