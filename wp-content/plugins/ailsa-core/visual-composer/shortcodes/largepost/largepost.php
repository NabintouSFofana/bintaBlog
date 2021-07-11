<?php
/* ==========================================================
  Large Post
=========================================================== */
if ( !function_exists('vcts_large_post_function')) {
  function vcts_large_post_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'large_post_posts_in' => '',
      // Enable & Disable
      'large_post_category' => '',
      'large_post_date'     => '',
      'large_post_author'   => '',
      'large_post_comments' => '',
      'large_post_excerpt'  => '',
      'large_post_share'    => '',
      'large_post_read_more'=> '',
      'large_post_popup'    => '',
      'large_post_excerpt_length' => '',
      'read_more_text'      => '',
      'class'               => '',
    ), $atts));

    // Read More Text
    if (is_cs_framework_active()) {
      $read_more_to = cs_get_option('read_more_text');
      if ($read_more_text) {
        $read_more_text = $read_more_text;
      } elseif($read_more_to) {
        $read_more_text = $read_more_to;
      } else {
        $read_more_text = esc_html__( 'Read More', 'ailsa-core' );
      }
      $excerpt_length = cs_get_option('');
      if ($large_post_excerpt_length) {
        $large_post_excerpt_length = $large_post_excerpt_length;
      } elseif($excerpt_length) {
        $large_post_excerpt_length = $excerpt_length;
      } else {
        $large_post_excerpt_length = '55';
      }
    } else {
      $large_post_excerpt_length = $large_post_excerpt_length ? $large_post_excerpt_length : '55';
      $read_more_text = $read_more_text ? $read_more_text : esc_html__( 'Read More', 'ailsa-core' );
    }

    // Turn output buffer on
    ob_start();

    $args = array(
      'post_type' => 'post',
      'post__in'  => array(esc_attr($large_post_posts_in)),
    );

    $vcts_large_post = new WP_Query( $args ); ?>
    <!-- Large Post Start -->
    <div class="row aisa-fullgrid <?php echo esc_attr($class); ?>">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php
        if ($vcts_large_post->have_posts()) : while ($vcts_large_post->have_posts()) : $vcts_large_post->the_post();
          $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
          $large_image = $large_image[0];
          $post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );

          if ( is_sticky(get_the_ID()) ) { $sclass = 'sticky'; } else { $sclass = '';} ?>
        <div class="aisa-latestBlog">
          <div id="post-<?php the_ID(); ?>" <?php post_class('aisa-blog-post '.$sclass); ?>>
            <?php if ( 'gallery' == get_post_format() && ! empty( $post_type['gallery_post_format'] ) ) { ?>
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
                    if ($large_post_popup) {
                      $popup_class = 'aisa-img-popup';
                      $link_to = ($post_img) ? $post_img : get_the_permalink();
                    } else {
                      $popup_class = '';
                      $link_to = get_the_permalink();
                    }
                    echo '<li><a href='.esc_url($link_to).' class="'.esc_attr($popup_class).'"><img src="'.$post_img.'" alt="'.$alt.'" class="'. $img_class .'" /></a></li>';
                  } ?>
              </ul>
            </div>
          <?php
            } elseif ( ('audio' == get_post_format()) && ! empty( $post_type['audio_post_format'] ) ) { ?>
              <div class="aisa-music">
                <?php echo $post_type['audio_post_format']; ?>
              </div>
            <?php
            } elseif ( ('video' == get_post_format()) && ! empty( $post_type['video_post_format'] ) ) { ?>
              <div class="aisa-video">
                 <?php echo $post_type['video_post_format']; ?>
              </div>
            <?php
            } elseif ($large_image) {
              if ($large_post_popup) {
                $popup_class = 'aisa-img-popup';
                $link_to = ($large_image) ? $large_image : get_the_permalink();
              } else {
                $popup_class = '';
                $link_to = get_the_permalink();
              } ?>
              <div class="aisa-featureImg">
                <a href="<?php echo esc_url($link_to); ?>" class="<?php echo esc_attr($popup_class); ?>">
                  <img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"/>
                </a>
              </div>
            <?php } // Featured Image ?>
            <div class="aisa-excerpt">
              <?php
                if ( $large_post_category ) { // Category Hide
                  $categories = get_the_category( get_the_ID() );
                  $cnt_cat = count($categories);
                  if ($categories) {
                    echo '<div class="category-title"><div class="aisa-btn">';
                    the_category( '<span>&nbsp;&amp;&nbsp;</span>' );
                    echo '</div></div>';
                  }
                } ?>
              <h3 class="blog-heading"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h3>
              <?php if ( $large_post_date || $large_post_author  ) { ?>
                <div class="aisa-publish">
                  <ul>
                    <?php if ( $large_post_date ) { // Date Hide ?>
                      <li> <?php the_time('F d, Y'); ?> </li>
                    <?php }
                    if ( $large_post_author ) { // Author Hide ?>
                      <li><span>by</span></li>
                      <li>
                        <?php printf('<a href="%1$s" rel="author">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author()); ?>
                      </li>
                    <?php } ?>
                  </ul>
                </div>
              <?php }

              if ( $large_post_excerpt ) { // Excerpt Hide ?>
                <div class="aisa-article">
                  <?php
                    if ( function_exists( 'ailsa_my_excerpt' ) ) {
                      ailsa_my_excerpt($large_post_excerpt_length);
                    }
                    if ( function_exists( 'ailsa_wp_link_pages' ) ) {
                      echo ailsa_wp_link_pages();
                    } ?>
                </div>
              <?php }

              if ( $large_post_read_more ) { // Read More Hide ?>
                <div class="aisa-readmore">
                  <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr($read_more_text); ?></a>
                </div>
              <?php }

              if($large_post_comments || $large_post_share) { ?>
                <div class="aisa-sharebar row">
                  <?php if ( $large_post_comments ) { // Comments Hide ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 comentbox">
                      <?php
                        if ( function_exists( 'ailsa_comment_number' ) ) {
                          echo ailsa_comment_number();
                        } ?>
                    </div>
                  <?php }
                  if( $large_post_share ){ ?>
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
            </div>
         </div>
       <?php
        endwhile;
        endif;
        wp_reset_postdata(); ?>
      </div>
    </div>
    <!-- Large Post End -->
    <?php
    // Return outbut buffer
    return ob_get_clean();
  }
}
add_shortcode( 'vcts_large_post', 'vcts_large_post_function' );
