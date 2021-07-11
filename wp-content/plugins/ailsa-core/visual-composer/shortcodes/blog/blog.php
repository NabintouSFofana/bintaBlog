<?php
/* ==========================================================
  Blog
=========================================================== */
if ( !function_exists('vcts_blog_function')) {
  function vcts_blog_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'blog_style'  => '',
      'blog_column' => '',
      'blog_limit'  => '',
      // Enable & Disable
      'blog_category'  => '',
      'blog_date'      => '',
      'blog_author'    => '',
      'blog_comments'  => '',
      'blog_excerpt'   => '',
      'blog_share'     => '',
      'blog_read_more' => '',
      'blog_pagination'=> '',
      'blog_popup'     => '',
      'blog_pagination_style' => '',
      'blog_excerpt_length'   => '',
      // Listing
      'blog_order'     => '',
      'blog_orderby'   => '',
      'blog_show_category'    => '',
      // Translation Text
      'read_more_text'  => '',
      // Custom Class
      'class'  => '',
    ), $atts));

    // Columns
    if ($blog_style === 'aisa-blog-two') {
      $blog_style_class = 'aisa-list';
      $grid_number = 1;
      $row_open = '<div class="row">';
      $row_close = '</div>';
      $image_open = '<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 imagebox">';
      $image_close = '</div>';
      $text_open = '<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 textbox">';
      $text_close = '</div>';
    } else {
      $row_open = '';  $row_close = ''; $image_open = ''; $image_close = ''; $text_open = ''; $text_close = '';
      if($blog_column === 'aisa-blog-col-2') {
        $blog_style_class = 'aisa-grid ';
        $grid_number = 2;
        $blog_style_open = '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
        $blog_style_close = '</div>';
        $row_class_open = '<div class="row">';
        $row_class_close = '</div>';
      } else if($blog_column === 'aisa-blog-col-3') {
        $blog_style_class = 'aisa-grid ';
        $grid_number = 3;
        $blog_style_open = '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">';
        $blog_style_close = '</div>';
        $row_class_open = '<div class="row">';
        $row_class_close = '</div>';
      } else {
        $blog_style_class = 'aisa-grid aisa-fullgrid';
        $grid_number = 1;
      }
    }

    // Translation Text
    if (is_cs_framework_active()) {
      $read_more_to = cs_get_option('read_more_text');
      if ($read_more_text) {
        $read_more_text = $read_more_text;
      } elseif($read_more_to) {
        $read_more_text = $read_more_to;
      } else {
        $read_more_text = esc_html__( 'Read More', 'ailsa-core' );
      }
      $older_post = cs_get_option('older_post') ? cs_get_option('older_post') : esc_html__( 'Older Posts', 'ailsa-core' );
      $newer_post = cs_get_option('newer_post') ? cs_get_option('newer_post') : esc_html__( 'Newer Posts', 'ailsa-core' );

      $excerpt_length = cs_get_option('theme_blog_excerpt');
      if ($blog_excerpt_length) {
        $blog_excerpt_length = $blog_excerpt_length;
      } elseif($excerpt_length) {
        $blog_excerpt_length = $excerpt_length;
      } else {
        $blog_excerpt_length = '55';
      }
    } else {
      $blog_excerpt_length = $blog_excerpt_length ? $blog_excerpt_length : '55';
      $read_more_text = $read_more_text ? $read_more_text : esc_html__( 'Read More', 'ailsa-core' );
    }

    // Turn output buffer on
    ob_start();

    // Pagination
    global $paged;
    if( get_query_var( 'paged' ) )
      $my_page = get_query_var( 'paged' );
    else {
      if( get_query_var( 'page' ) )
        $my_page = get_query_var( 'page' );
      else
        $my_page = 1;
      set_query_var( 'paged', $my_page );
      $paged = $my_page;
    }

    $args = array(
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'post',
      'posts_per_page' => (int)$blog_limit,
      'category_name' => esc_attr($blog_show_category),
      'orderby' => $blog_orderby,
      'order' => $blog_order
    );

    $vcts_post = new WP_Query( $args ); ?>
    <!-- Blog Start -->
    <div class="<?php echo esc_attr($blog_style_class.' '.$class); ?>"><?php
    if ($vcts_post->have_posts()) :
      $count_all_post = $vcts_post->post_count;
      $count = 0;

      while ($vcts_post->have_posts()) : $vcts_post->the_post();
        $count++;
        if ( $grid_number != 1) {
          if( $count === 1 ){
            echo $row_class_open;
          } else if(( $count % $grid_number ) === 1 ) {
            echo $row_class_open;
          }
          echo $blog_style_open;
        }

        if ( is_sticky(get_the_ID()) ) { $sclass = 'sticky'; } else { $sclass = '';} ?>
        <div class="aisa-latestBlog">
          <div id="post-<?php the_ID(); ?>" <?php post_class('aisa-blog-post '.$sclass); ?>><?php
            $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
            $large_image = $large_image[0];
            $post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );

            echo $row_open. ' '. $image_open;

            if ( 'gallery' == get_post_format() && ! empty( $post_type['gallery_post_format'] ) ) { ?>
              <div class="aisa-sliderBox">
                <ul class="owl-carousel aisa-featureImg-carousel"><?php
                  $ids = explode( ',', $post_type['gallery_post_format'] );
                  foreach ( $ids as $id ) {
                    $attachment = wp_get_attachment_image_src( $id, 'full' );
                    $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
                    $alt = $alt ? esc_attr($alt) : esc_attr(get_the_title());
                    $g_img = $attachment[0];
                    if (is_cs_framework_active()) {
                      $dummy_image = cs_get_option('blog_dummy_image');
                    } else {
                      $dummy_image = 'false';
                    }

                    if($blog_column === 'aisa-blog-col-3') {
                      if($g_img){
                        if(class_exists('Aq_Resize')) {
                          $featured_img = aq_resize( $g_img, '370', '235', true );
                          $post_img = ($featured_img) ? $featured_img : '';
                          $img_class = ($featured_img) ? 'hav-img' : 'dummy-featured-image';
                        } else {
                          $post_img = $g_img;
                          $img_class = '';
                        }
                      } else {
                        if ( !isset($dummy_image) ) {
                          $post_img = AILSA_PLUGIN_IMGS . '/370x235.jpg';
                          $img_class = 'dummy-featured-image';
                        } else {
                          $post_img = '';
                          $img_class = 'dummy-featured-image';
                        }
                      }
                    } else if($blog_column === 'aisa-blog-col-2') {
                        if($g_img){
                          if(class_exists('Aq_Resize')) {
                            $featured_img = aq_resize( $g_img, '570', '355', true );
                            $post_img = ($featured_img) ? $featured_img : '';
                            $img_class = ($featured_img) ? 'hav-img' : 'dummy-featured-image';
                          } else {
                            $post_img = $g_img;
                            $img_class = '';
                          }
                        } else {
                          if ( !isset($dummy_image) ) {
                            $post_img = AILSA_PLUGIN_IMGS . '/570x355.jpg';
                            $img_class = 'dummy-featured-image';
                          } else {
                            $post_img = '';
                            $img_class = 'dummy-featured-image';
                          }
                        }
                    } else if($blog_style_class === 'aisa-list') {
                        if($g_img){
                          if(class_exists('Aq_Resize')) {
                            $featured_img = aq_resize( $g_img, '280', '255', true );
                            $post_img = ($featured_img) ? $featured_img : '';
                            $img_class = ($featured_img) ? 'hav-img' : 'dummy-featured-image';
                          } else {
                            $post_img = $g_img;
                            $img_class = '';
                          }
                        } else {
                          if ( !isset($dummy_image) ) {
                            $post_img = AILSA_PLUGIN_IMGS . '/280x255.jpg';
                            $img_class = 'dummy-featured-image';
                          } else {
                            $post_img = '';
                            $img_class = 'dummy-featured-image';
                          }
                        }
                    } else {
                        if($g_img){
                          $post_img = $g_img;
                          $img_class = '';
                        } else {
                          if ( !isset($dummy_image) ) {
                            $post_img = AILSA_PLUGIN_IMGS . '/1170x705_sl.jpg';
                            $img_class = 'dummy-featured-image';
                          } else {
                            $post_img = '';
                            $img_class = 'dummy-featured-image';
                          }
                        }
                    }

                    if ($blog_popup) {
                      $popup_class = 'aisa-img-popup';
                      $link_to = ($g_img) ? $g_img : get_the_permalink();
                    } else {
                      $popup_class = '';
                      $link_to = get_the_permalink();
                    }
                    echo '<li><a href='.esc_url($link_to).' class="'.esc_attr($popup_class).'"><img src="'.esc_url($post_img).'" alt="'.$alt.'" class="'. $img_class .'" /></a></li>';
                  } ?>
                </ul>
              </div><?php
            } elseif ( ('audio' == get_post_format()) && ! empty( $post_type['audio_post_format'] ) ) { ?>
              <div class="aisa-music"><?php echo $post_type['audio_post_format']; ?></div><?php
            } elseif ( ('video' == get_post_format()) && ! empty( $post_type['video_post_format'] ) ) { ?>
              <div class="aisa-video">
                 <?php echo $post_type['video_post_format']; ?>
              </div><?php
            } elseif ($large_image) {
                if($blog_column === 'aisa-blog-col-3') {
                  if(class_exists('Aq_Resize')) {
                      $post_img = aq_resize( $large_image, '370', '235', true );
                      $post_img = ($post_img) ? $post_img : '';
                      $img_class = ($post_img) ? 'hav-img' : 'dummy-featured-image';
                  } else {$post_img = $large_image;$img_class = '';}
                } else if($blog_column === 'aisa-blog-col-2') {
                    if(class_exists('Aq_Resize')) {
                      $post_img = aq_resize( $large_image, '570', '355', true );
                      $post_img = ($post_img) ? $post_img : '';
                      $img_class = ($post_img) ? 'hav-img' : 'dummy-featured-image';
                    } else {
                      $post_img = $large_image;
                      $img_class = '';
                    }
                } else if($blog_style_class === 'aisa-list') {
                    if(class_exists('Aq_Resize')) {
                      $post_img = aq_resize( $large_image, '280', '255', true );
                      $post_img = ($post_img) ? $post_img : '';
                      $img_class = ($post_img) ? 'hav-img' : 'dummy-featured-image';
                    } else {
                      $post_img = $large_image;
                      $img_class = '';
                    }
                } else {
                    $post_img = $large_image;
                    $img_class = '';
                }

                if ($blog_popup) {
                  $popup_class = 'aisa-img-popup';
                  $link_to = ($large_image) ? $large_image : get_the_permalink();
                } else {
                  $popup_class = '';
                  $link_to = get_the_permalink();
                } ?>
              <div class="aisa-featureImg">
                <a href="<?php echo esc_url($link_to); ?>" class="<?php echo esc_attr($popup_class); ?>"><img src="<?php echo esc_url($post_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="<?php echo esc_attr($img_class); ?>" /></a>
              </div><?php
            } else {
              if ( !isset($dummy_image) ) {
                if($blog_column === 'aisa-blog-col-3') {
                  $post_img = AILSA_PLUGIN_IMGS . '/370x235.jpg';
                  $img_class = 'dummy-featured-image';
                } else if($blog_column === 'aisa-blog-col-2') {
                  $post_img = AILSA_PLUGIN_IMGS . '/570x355.jpg';
                  $img_class = 'dummy-featured-image';
                } else if($blog_style_class === 'aisa-list') {
                  $post_img = AILSA_PLUGIN_IMGS . '/280x255.jpg';
                  $img_class = 'dummy-featured-image';
                }
              } else {
                $post_img = '';
                $img_class = 'dummy-featured-image';
              }
              if ($large_image) {
              ?>
                <div class="aisa-featureImg">
                  <img src="<?php echo esc_url($post_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="<?php echo esc_attr($img_class); ?>" />
                </div><?php
              }
            } // Featured Image

            // Content Start
            echo $image_close.' '.$text_open; ?>
            <div class="aisa-excerpt"><?php
              if ( $blog_category ) { // Category Hide
                $categories = get_the_category( get_the_ID() );
                $cnt_cat = count($categories);
                if ($categories) {
                  echo '<div class="category-title"><div class="aisa-btn">';
                  the_category( '<span>&nbsp;&amp;&nbsp;</span>' );
                  echo '</div></div>';
                }
              } ?>
              <h3 class="blog-heading"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h3>
              <?php
              if ( $blog_date || $blog_author  ) {  ?>
                <div class="aisa-publish">
                  <ul>
                    <?php if ( $blog_date ) { // Date Hide ?>
                      <li> <?php the_time('F d, Y'); ?> </li>
                    <?php }
                    if ( $blog_author ) { // Author Hide ?>
                      <li><span>by</span></li>
                      <li>
                        <?php printf('<a href="%1$s" rel="author">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author()); ?>
                      </li>
                    <?php } ?>
                  </ul>
                </div>
              <?php }

              if ( $blog_excerpt ) { // Excerpt Hide ?>
                <div class="aisa-article">
                  <?php
                    if ( function_exists( 'ailsa_my_excerpt' ) ) {
                      ailsa_my_excerpt($blog_excerpt_length);
                    }
                    if ( function_exists( 'ailsa_wp_link_pages' ) ) {
                      echo ailsa_wp_link_pages();
                    } ?>
                </div>
              <?php }

              if ( $blog_read_more ) { // Read More Hide ?>
                <div class="aisa-readmore">
                  <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr($read_more_text); ?></a>
                </div>
              <?php }

              if($blog_comments || $blog_share) { ?>
                <div class="aisa-sharebar row">
                <?php if ( $blog_comments ) { // Comments Hide ?>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-6 comentbox">
                    <?php
                      if ( function_exists( 'ailsa_comment_number' ) ) {
                        echo ailsa_comment_number();
                      } ?>
                  </div>
                <?php }
                if( $blog_share ){ ?>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-6 sharebox">
                    <?php
                      if ( function_exists( 'ailsa_wp_share_option' ) ) {
                        echo ailsa_wp_share_option();
                      } ?>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>
          </div>
          <?php echo $text_close. ' ' .$row_close; ?>
        <!-- Content End-->
          </div>
        </div>
        <?php
        if ( $grid_number != 1) {
          echo $blog_style_close;
          if((($count % $grid_number) === 0) || ($count === ($count_all_post))){
            echo $row_class_close;
          }
        }
      endwhile;
      endif;
    ?>
    </div>
    <!-- Blog End -->
    <?php
    if ($blog_pagination) {
      if ( $blog_pagination_style === 'aisa-pagination-two') {
        if ( function_exists('wp_pagenavi')) {
          wp_pagenavi( array( 'query' => $vcts_post ) );
        } else {
          if (is_cs_framework_active()) {
            $older_post = cs_get_option('older_post');
            $newer_post = cs_get_option('newer_post');
          } else {
            $older_post = '';
            $newer_post = '';
          }
          $older_post = $older_post ? $older_post : '<i class="fa fa-angle-double-left"></i>';
          $newer_post = $newer_post ? $newer_post : '<i class="fa fa-angle-double-right"></i>';
          $big = 999999999;
          echo paginate_links( array(
            'base'   => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
            'format' => '?paged=%#%',
            'total'  => $vcts_post->max_num_pages,
            'current'   => max( 1, $my_page ),
            'show_all'  => false,
        	'end_size'  => 1,
        	'mid_size'  => 2,
        	'prev_next' => true,
            'prev_text' => $older_post,
            'next_text' => $newer_post,
            'type' => 'list'
          ) );
        }
      } else { ?>
        <div class="aisa-pagination text row">
          <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 newer">
            <?php next_posts_link( '<i class="fa fa-angle-double-left" aria-hidden="true"></i> '. $older_post, $vcts_post->max_num_pages ); ?>
          </div>
          <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 older">
            <?php previous_posts_link( $newer_post . ' <i class="fa fa-angle-double-right" aria-hidden="true"></i>', $vcts_post->max_num_pages ); ?>
          </div>
        </div>
    <?php
      }
    }
    wp_reset_postdata();  // avoid errors further down the page

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'vcts_blog', 'vcts_blog_function' );
