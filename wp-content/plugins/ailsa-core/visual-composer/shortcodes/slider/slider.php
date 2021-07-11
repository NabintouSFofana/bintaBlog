<?php
/* ==========================================================
  Post Slider
=========================================================== */
if ( !function_exists('vcts_slider_function')) {
  function vcts_slider_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'slider_style'  => '',
      'slider_limit'  => '',
      // Enable & Disable
      'slider_category'  => '',
      'slider_date'  => '',
      'slider_author'  => '',
      // Listing
      'slider_order'  => '',
      'slider_orderby'  => '',
      'slider_show_category'  => '',
      'class'  => '',
    ), $atts));

    // Style
    if ($slider_style === 'aisa-slider-two') {
      $slider_style_class = 'aisa-post-slider-two';
    } else {
      $slider_style_class = 'aisa-post-slider-one';
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' aisa-post-slider-'. $e_uniqid;

    // Turn output buffer on
    ob_start();

    $args = array(
      'post_status' => 'publish',
      'post_type'      => 'post',
      'posts_per_page' => (int)$slider_limit,
      'category_name'  => esc_attr($slider_show_category),
      'orderby'        => $slider_orderby,
      'order'          => $slider_order
    );

    $vcts_slider_post = new WP_Query( $args );

    if ($slider_style === 'aisa-slider-two') { ?>
      <div class="aisa-carouselwrap <?php echo esc_attr($slider_style_class .' '. $styled_class .' '. $class); ?>">
        <div class="aisa-sliderBox">
          <ul class="owl-carousel aisa-container-carousel">
          <?php
            if ($vcts_slider_post->have_posts()) : while ($vcts_slider_post->have_posts()) : $vcts_slider_post->the_post();

              $large_image = '';
              $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
              $large_image = $large_image[0];

              if($large_image){

                echo '<li><img src="'.$large_image.'" alt="'.esc_attr(get_the_title()).'"><div class="aisa-postdetails"><div class="box">';

                if ( $slider_category ) { // Category Hide
                  $categories = get_the_category( get_the_ID() );
                  $cnt_cat = count($categories);
                  if ($categories) {
                    echo '<div class="category-title"><div class="aisa-btn">';
                    the_category( '<span>&nbsp;&amp;&nbsp;</span>' );
                    echo '</div></div>';
                  }
                }

                echo '<h3><a href="'. get_the_permalink( get_the_ID() ). '">'. get_the_title( get_the_ID() ) .'</a></h3>';

                if ( isset($slider_date) || isset($slider_author) ) { // Date Hide
                  echo '<ul>';
                  if ( $slider_date ) { // Date Hide
                    echo '<li>'.get_the_time('F d, Y').'</li>';
                  }
                  if ( $slider_author ) { // Author Hide
                    echo '<li><span>by</span></li>';
                    printf('<li><a href="%1$s" rel="author">%2$s</a></li>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author());
                  }
                  echo '</ul>';
                }
                echo '</div></div></li>';
              }
            endwhile;
            endif;
            wp_reset_postdata(); ?>
          </ul>
        </div>
      </div>
    <?php } else { ?>
      <div class="aisa-carousel <?php echo esc_attr($slider_style_class .' '. $styled_class .' '. $class); ?>">
        <ul class="owl-carousel aisa-banner-carousel">
         <?php
            if ($vcts_slider_post->have_posts()) : while ($vcts_slider_post->have_posts()) : $vcts_slider_post->the_post();

              $large_image = '';
              $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
              $large_image = $large_image[0];

              if($large_image){

                if(class_exists('Aq_Resize')) {
                  $post_img = aq_resize( $large_image, '650', '460', true );
                } else {$post_img = $large_image;}

                echo '<li><img src="'.$post_img.'" alt="'.esc_attr(get_the_title()).'"><div class="aisa-posttitlebar">';

                if ( $slider_category ) { // Category Hide
                  $categories = get_the_category( get_the_ID() );
                  $cnt_cat = count($categories);
                  if ($categories) {
                    echo '<div class="category-title"><div class="aisa-btn">';
                    the_category( '<span>&nbsp;&amp;&nbsp;</span>' );
                    echo '</div></div>';
                  }
                }
                echo '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3></div></li>';
              }
            endwhile;
            endif;
            wp_reset_postdata(); ?>
        </ul>
      </div>
    <?php
    }

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'vcts_slider', 'vcts_slider_function' );
