<?php
/**
 * Single Post.
 */

// Single Post Type Meta
$ailsa_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$ailsa_image_display_type = !empty($ailsa_post_type['image_display_type']) ? $ailsa_post_type['image_display_type'] : 'img-slider';

// Single Theme Option
$ailsa_metas_hide = (array) cs_get_option( 'single_metas_hide' );
$ailsa_single_featured_image = cs_get_option('single_featured_image');
$ailsa_single_popup_option = cs_get_option('single_popup_option');
$ailsa_single_author_info = cs_get_option('single_author_info');
$ailsa_single_share_option = cs_get_option('single_share_option');
$ailsa_single_related_posts = cs_get_option('single_related_posts');

// Disable Dummy Image
$dummy_image = cs_get_option('blog_dummy_image');

// Single Theme Translation Text Option
$ailsa_related_posts_title_text = cs_get_option('related_posts_title_text') ? cs_get_option('related_posts_title_text') : esc_html__( 'You may also Like', 'ailsa' );

// Single Featured Image Option
$ailsa_large_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$ailsa_large_image = $ailsa_large_image[0];
?>

<!-- Post Content Area Start -->
<div class="row aisa-content-area aisa-fullgrid">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="aisa-latestBlog">
      <!-- Post Start -->
      <div id="post-<?php the_ID(); ?>" <?php post_class('aisa-blog-post'); ?>>

      <?php if($ailsa_single_featured_image){
        if ( ('gallery' == get_post_format()) && ($ailsa_image_display_type == 'img-slider') && ! empty( $ailsa_post_type['gallery_post_format'] ) ) { ?>
          <div class="aisa-sliderBox">
            <ul class="owl-carousel aisa-featureImg-carousel">
              <?php
                $ailsa_ids = explode( ',', $ailsa_post_type['gallery_post_format'] );
                foreach ( $ailsa_ids as $id ) {
                  $ailsa_attachment = wp_get_attachment_image_src( $id, 'fullsize' );
                  $ailsa_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
                  $ailsa_alt = $ailsa_alt ? esc_attr($ailsa_alt) : esc_attr(get_the_title());

                  $ailsa_post_img = $ailsa_attachment[0];
                  $ailsa_post_img = $ailsa_post_img ? $ailsa_post_img : '';

                  if ($ailsa_single_popup_option) {
                    $ailsa_link_open = '<a href='. esc_url($ailsa_post_img).' class="aisa-img-popup">';
                    $ailsa_link_close = '</a>';
                  } else {
                    $ailsa_link_open  = '';
                    $ailsa_link_close = '';
                  }
                  echo '<li>'. $ailsa_link_open .'<img src="'. esc_url($ailsa_post_img) .'" alt="'.$ailsa_alt.'" />'. $ailsa_link_close .'</li>';
                }
              ?>
            </ul>
          </div>
        <?php } elseif ( ('gallery' == get_post_format()) && ($ailsa_image_display_type == 'img-gallery') && ! empty( $ailsa_post_type['gallery_post_format'] ) ) { ?>
          <div class="aisa-gallery">
            <?php
              $ailsa_ids = explode( ',', $ailsa_post_type['gallery_post_format'] );
              $ailsa_count_img = count($ailsa_ids);
              $ailsa_count = 0; $ailsa_row_img = 1;
              $ailsa_row_number = ceil($ailsa_count_img/2);

              foreach ( $ailsa_ids as $id ) {

                $ailsa_attachment = wp_get_attachment_image_src( $id, 'full' );
                $ailsa_alt = get_post_meta($id, '_wp_attachment_image_alt', true);

         	    $ailsa_count++;
                if( ($ailsa_count === 1) || (($ailsa_count % 2) === 1) ) {
                  echo '<ul class="row">';
                  if( ($ailsa_count_img === 1) || (($ailsa_row_number % 2) === 1 && ($ailsa_row_number === $ailsa_row_img)) ){
                    echo '<li class="box col-lg-12 col-md-12 col-sm-12 col-xs-12">';
                    echo '<a href='. esc_url($ailsa_attachment[0]) .'><img src="'. esc_url($ailsa_attachment[0]) .'" alt="'. esc_attr($ailsa_alt) .'" /></a></li>';
                  } else {
                    if( ($ailsa_row_img === 1) || (($ailsa_row_img % 2) === 1) ) {
                        echo '<li class="box col-lg-8 col-md-8 col-sm-8 col-xs-8">';
                        if(class_exists('Aq_Resize')) {
                          $post_act_img = aq_resize( $ailsa_attachment[0], '575', '320', true );
                        } else {
                          $post_act_img = $ailsa_attachment[0];
                        }
                        echo '<a href='. esc_url($ailsa_attachment[0]) .'><img src="'. esc_url($post_act_img) .'" alt="'. esc_attr($ailsa_alt) .'" /></a></li>';
                      } else {
                        if(class_exists('Aq_Resize')) {
                          $post_act_img = aq_resize( $ailsa_attachment[0], '380', '230', true );
                        } else {
                          $post_act_img = $ailsa_attachment[0];
                        }
                        echo '<li class="box col-lg-5 col-md-5 col-sm-5 col-xs-5">';
                        echo '<a href='. esc_url($ailsa_attachment[0]) .'><img src="'. esc_url($post_act_img) .'" alt="'. esc_attr($ailsa_alt) .'" /></a></li>';
                      }
                  }
                } else {
                  if( ($ailsa_row_img === 1) || (($ailsa_row_img % 2) === 1) ) {
                    echo '<li class="box col-lg-4 col-md-4 col-sm-4 col-xs-4">';
                    if(class_exists('Aq_Resize')) {
                      $post_act_img = aq_resize( $ailsa_attachment[0], '250', '320', true );
                    } else {
                      $post_act_img = $ailsa_attachment[0];
                    }
                    echo '<a href='. esc_url($ailsa_attachment[0]) .'><img src="'. esc_url($post_act_img) .'" alt="'. esc_attr($ailsa_alt) .'" /></a></li>';
                  } else {

                    echo '<li class="box col-lg-7 col-md-7 col-sm-7 col-xs-7">';
                    if(class_exists('Aq_Resize')) {
                      $post_act_img = aq_resize( $ailsa_attachment[0], '445', '230', true );
                    } else {
                      $post_act_img = $ailsa_attachment[0];
                    }
                    echo '<a href='. esc_url($ailsa_attachment[0]) .'><img src="'. esc_url($post_act_img) .'" alt="'. esc_attr($ailsa_alt) .'" /></a></li>';
                  }
                }
                if((($ailsa_count % 2) === 0) || ($ailsa_count === $ailsa_count_img)){
                  echo '</ul>';
                  $ailsa_row_img++;
                }
           	  }
            ?>
          </div>
        <?php } elseif ( ('audio' == get_post_format()) && ! empty( $ailsa_post_type['audio_post_format'] ) ) { ?>
          <div class="aisa-music">
             <?php echo $ailsa_post_type['audio_post_format']; ?>
          </div>
        <?php } elseif ( ('video' == get_post_format()) && ! empty( $ailsa_post_type['video_post_format'] ) ) { ?>
          <div class="aisa-video">
             <?php echo $ailsa_post_type['video_post_format']; ?>
          </div>
    	<?php } elseif ( $ailsa_large_image ) { ?>
          <div class="aisa-featureImg">
            <?php
            if ($ailsa_single_popup_option) {
              echo '<a href="'. esc_url($ailsa_large_image) .'" class="aisa-img-popup">';
            }
            ?>
              <img src="<?php echo esc_url($ailsa_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
            <?php if ($ailsa_single_popup_option) { echo '</a>'; } ?>
          </div>
    	<?php } else {
        if ( !isset($dummy_image) ) {
    	   if ('gallery' == get_post_format()) {
           $ailsa_featured_img = AILSA_DUMMY_IMAGE . '/1170x705_sl.jpg';
           $img_class = 'dummy-featured-image';
         } else {
           $ailsa_featured_img = AILSA_DUMMY_IMAGE . '/1170x705.jpg';
           $img_class = 'dummy-featured-image';
         }
        } else {
         $ailsa_featured_img = '';
         $img_class = '';
        }
        if ( $ailsa_large_image ) {
        ?>
 	      <div class="aisa-featureImg">
          <?php
          if ($ailsa_single_popup_option && $ailsa_large_image) {
            echo '<a href="'. esc_url($ailsa_large_image).'" class="aisa-img-popup">';
          }
          ?>
            <img src="<?php echo esc_url($ailsa_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
          <?php if ($ailsa_single_popup_option) { echo '</a>'; } ?>
        </div>
    	<?php } } } ?>

        <!-- Content Text Start -->
        <div class="aisa-excerpt">
          <?php
            if ( !in_array( 'category', $ailsa_metas_hide )) { // Category Hide
              $ailsa_categories = get_the_category( get_the_ID() );
              $cnt_cat = count($ailsa_categories);
              if ($ailsa_categories) {
                echo '<div class="category-title"><div class="aisa-btn">';
                the_category( '<span>&nbsp;&amp;&nbsp;</span>' );
                echo '</div></div>';
              }
            }
          ?>
          <h1 class="post-heading"><?php echo esc_attr(get_the_title()); ?></h1>

          <?php if ( !in_array( 'date', $ailsa_metas_hide ) && !in_array( 'author', $ailsa_metas_hide ) ) { // Category Hide ?>
            <div class="aisa-publish">
              <ul>
                <?php if ( !in_array( 'date', $ailsa_metas_hide )) { // Date Hide ?>
                  <li> <?php the_time(' F d, Y '); ?> </li>
                <?php } ?>
                <?php  if ( !in_array( 'author', $ailsa_metas_hide )) { // Author Hide ?>
                  <li><?php esc_html_e(' by ', ' ailsa'); ?></li>
                  <li>
                    <?php printf('<a href="%1$s" rel="author">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author()); ?>
                  </li>
                <?php } ?>
              </ul>
            </div>
          <?php } ?>

          <div class="aisa-article">
            <?php
              the_content();
              echo ailsa_wp_link_pages();
            ?>
          </div>

          <?php
          if ( !in_array( 'tag', $ailsa_metas_hide )) { // Tag Hide
            $ailsa_tag_list = get_the_tags();
            if($ailsa_tag_list) {
          ?>
            <div class="taglist">
              <?php echo the_tags('', '', ''); ?>
            </div>
          <?php } }

          if( isset($ailsa_single_share_option) || !in_array( 'comments', $ailsa_metas_hide ) ){ ?>
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
              if(isset($ailsa_single_share_option)){ ?>
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

        </div> <!-- Content Text End -->
      </div> <!-- Post End -->
    </div>

  </div>
</div><!-- Post Content Area End -->

<!-- Author Info Start-->
<?php
  if(isset($ailsa_single_author_info)) {
  	ailsa_author_info();
  }
  // Author Info End

  // Related Posts Start
  if(isset($ailsa_single_related_posts)) {

  // Single Post Page Layout Option
  $ailsa_single_sidebar_layout  = get_post_meta( get_the_ID(), 'post_page_layout_options', true );
  if ($ailsa_single_sidebar_layout) {
    $ailsa_single_sidebar_layout = $ailsa_single_sidebar_layout['post_page_layout'];
    if ($ailsa_single_sidebar_layout === 'none') {
      $ailsa_single_sidebar_position = cs_get_option('single_sidebar_position');
    } else {
      if ($ailsa_single_sidebar_layout === 'left-sidebar') {
        $ailsa_single_sidebar_position = 'sidebar-left';
      } else if ($ailsa_single_sidebar_layout === 'right-sidebar') {
        $ailsa_single_sidebar_position = 'sidebar-right';
      } else {
        $ailsa_single_sidebar_position = 'sidebar-hide';
      }
    }
  } else {
    $ailsa_single_sidebar_position = cs_get_option('single_sidebar_position');
  }

  $ailsa_categories = get_the_category(get_the_ID());

  if ($ailsa_categories) {

    $ailsa_category_ids = array();
    foreach($ailsa_categories as $individual_category)
      $ailsa_category_ids[] = $individual_category->term_id;
	    $args = array(
  		  'category__in' => $ailsa_category_ids,
  		  'post__not_in' => array(get_the_ID()),
  		  'showposts' => 3,
	    );
      $ailsa_rp_query = new wp_query($args);

      if( $ailsa_rp_query->have_posts() ) {

        $ailsa_count_post = $ailsa_rp_query->post_count;

        if ($ailsa_count_post === 1) {
           $ailsa_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
           $ailsa_style_row = 'text-align: center;';
           $ailsa_style_col = 'display: inline-block;float: none;';
        } else if($ailsa_count_post === 2) {
           $ailsa_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
           $ailsa_style_row = '';
           $ailsa_style_col = '';
        } else {
           $ailsa_class = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
           $ailsa_style_row = '';
           $ailsa_style_col = '';
        }
        echo '<div class="aisa-relatedpost">';
        echo '<h3>'.esc_attr($ailsa_related_posts_title_text).'</h3><div class="row" style="'.$ailsa_style_row.'">';

        while ($ailsa_rp_query->have_posts()) {
          $ailsa_rp_query->the_post();
          echo '<div class="'.$ailsa_class.'" style="'.$ailsa_style_col.'">';

          $ailsa_post_type_rp = get_post_meta( get_the_ID(), 'post_type_metabox', true );
          $ailsa_lg_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
          $ailsa_lg_image = $ailsa_lg_image[0];

          if ($ailsa_count_post <= 2) {

            if ( ('gallery' == get_post_format()) && !empty( $ailsa_post_type_rp['gallery_post_format'] ) ) {
              echo '<div class="aisa-sliderBox"><ul class="owl-carousel aisa-featureImg-carousel">';
              $ailsa_ids = explode( ',', $ailsa_post_type_rp['gallery_post_format'] );
              foreach ( $ailsa_ids as $id ) {
                $ailsa_attachment = wp_get_attachment_image_src( $id, 'fullsize' );
                $ailsa_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
                $ailsa_alt = $ailsa_alt ? esc_attr($ailsa_alt) : esc_attr(get_the_title());

                if ($ailsa_single_sidebar_position === 'sidebar-hide') {
                  if(class_exists('Aq_Resize')) {
                    $ailsa_post_img = aq_resize( $ailsa_attachment[0], '570', '355', true );
                  } else {
                    $ailsa_post_img = '';
                  }
                  $ailsa_post_img = $ailsa_post_img ? $ailsa_post_img : '';
                  $img_class = 'dummy-featured-image';
                } else {
                  if(class_exists('Aq_Resize')) {
                    $ailsa_post_img = aq_resize( $ailsa_attachment[0], '400', '240', true );
                  } else {
                    $ailsa_post_img = '';
                  }
                  $ailsa_post_img = $ailsa_post_img ? $ailsa_post_img : '';
                  $img_class = 'dummy-featured-image';
                }

                if ($ailsa_single_popup_option) {
                  $ailsa_link_open = '<a href='. esc_url($ailsa_attachment[0]) .' class="aisa-img-popup">';
                  $ailsa_link_close = '</a>';
                } else {
                  $ailsa_link_open = '<a href='. esc_url(get_the_permalink()) .'>';
                  $ailsa_link_close = '</a>';
                }
                echo '<li>'. $ailsa_link_open .'<img src="'. esc_url($ailsa_post_img) .'" alt="'.$ailsa_alt.'" class="'. $img_class .'" />'. $ailsa_link_close .'</li>';
              }
              echo '</ul></div>';

            } elseif ($ailsa_lg_image) {

              if ($ailsa_single_sidebar_position === 'sidebar-hide') {
                if(class_exists('Aq_Resize')) {
                  $ailsa_post_img = aq_resize( $ailsa_lg_image, '570', '355', true );
                } else {
                  $ailsa_post_img = '';
                }
                $img_class = '';
              } else {
                if(class_exists('Aq_Resize')) {
                  $ailsa_post_img = aq_resize( $ailsa_lg_image, '400', '240', true );
                } else {
                  $ailsa_post_img = '';
                }
                $img_class = '';
              }
              $ailsa_post_img = ( $ailsa_post_img ) ? $ailsa_post_img : $ailsa_lg_image;

              if ($ailsa_single_popup_option) {
                echo '<a href='. esc_url($ailsa_lg_image) .' class="aisa-img-popup">';
              } else {
                echo '<a href='. esc_url(get_the_permalink()) .'>';
              }
              echo '<img src="'. esc_url($ailsa_post_img).'" alt="'.get_the_title().'" class="'. $img_class .'" /></a>';

            }

          } else {

            if ( ('gallery' == get_post_format()) && !empty( $ailsa_post_type_rp['gallery_post_format'] ) ) {

              echo '<div class="aisa-sliderBox"><ul class="owl-carousel aisa-featureImg-carousel">';
              $ailsa_ids = explode( ',', $ailsa_post_type_rp['gallery_post_format'] );

              foreach ( $ailsa_ids as $id ) {
                $ailsa_attachment = wp_get_attachment_image_src( $id, 'fullsize' );
                $ailsa_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
                $ailsa_alt = $ailsa_alt ? esc_attr($ailsa_alt) : esc_attr(get_the_title());

                if ($ailsa_single_sidebar_position === 'sidebar-hide') {
                  if(class_exists('Aq_Resize')) {
                    $ailsa_post_img = aq_resize( $ailsa_attachment[0], '370', '250', true );
                  } else {
                    $ailsa_post_img = '';
                  }
                  $ailsa_post_img = $ailsa_post_img ? $ailsa_post_img : '';
                  $img_class = 'dummy-featured-image';
                } else {
                  if(class_exists('Aq_Resize')) {
                    $ailsa_post_img = aq_resize( $ailsa_attachment[0], '256', '170', true );
                  } else {
                    $ailsa_post_img = '';
                  }
                  $ailsa_post_img = $ailsa_post_img ? $ailsa_post_img : '';
                  $img_class = 'dummy-featured-image';
                }

                if ($ailsa_single_popup_option) {
                  $ailsa_link_open = '<a href='. esc_url($ailsa_attachment[0]) .' class="aisa-img-popup">';
                } else {
                  $ailsa_link_open = '<a href='. esc_url(get_the_permalink()) .'>';
                }
                echo '<li>'. $ailsa_link_open .'<img src="'. esc_url($ailsa_post_img) .'" alt="'. esc_attr($ailsa_alt) .'" class="'. $img_class .'" /></a></li>';
              }
              echo '</ul></div>';

            } elseif ($ailsa_lg_image) {

              if ($ailsa_single_sidebar_position === 'sidebar-hide') {
                if(class_exists('Aq_Resize')) {
                  $ailsa_post_img = aq_resize( $ailsa_lg_image, '370', '250', true );
                } else {
                  $ailsa_post_img = '';
                }
                $ailsa_post_img = ( $ailsa_post_img ) ? $ailsa_post_img : $ailsa_lg_image;
                $img_class = '';
              } else {
                if(class_exists('Aq_Resize')) {
                  $ailsa_post_img = aq_resize( $ailsa_lg_image, '256', '170', true );
                } else {
                  $ailsa_post_img = '';
                }
                $ailsa_post_img = ( $ailsa_post_img ) ? $ailsa_post_img : $ailsa_lg_image;
                $img_class = '';
              }

              if ($ailsa_single_popup_option) {
                echo '<a href='. esc_url($ailsa_lg_image) .' class="aisa-img-popup">';
              } else {
                echo '<a href='. esc_url(get_the_permalink()) .'>';
              }
              echo '<img src="'.esc_url($ailsa_post_img).'" alt="'. esc_attr(get_the_title()) .'" class="'. $img_class .'" /></a>';

            }
          } ?>
          <div class="aisa-shortdetails">
            <h4>
              <a href="<?php esc_url(the_permalink()); ?>" title="Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </h4>
            <div class="date">
                <?php the_time('F d, Y'); ?>
            </div>
          </div>
        <?php
          echo '</div>';
        }
        wp_reset_postdata();
        echo '</div></div>';
      } else { echo " "; }
    }
  }
