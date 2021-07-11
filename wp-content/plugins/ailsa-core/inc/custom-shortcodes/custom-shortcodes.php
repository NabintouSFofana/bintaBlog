<?php
/* Spacer */
function vt_spacer_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "height" => '',
  ), $atts));

  $result = do_shortcode('[vc_empty_space height="'. $height .'"]');
  return $result;

}
add_shortcode("vt_spacer", "vt_spacer_function");

/* Slogan */
function vt_slogan_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "text_size" => '',
    "text_color" => '',
    "top_space" => '',
    "bottom_space" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid = uniqid();
  $inline_style  = '';

  // Text Color
  $inline_style .= '.aisa-slogan-'. $e_uniqid .'{';
  $inline_style .= ( $top_space ) ? 'padding-top:'. check_px($top_space) .';' : '';
  $inline_style .= ( $bottom_space ) ? 'padding-bottom:'. check_px($bottom_space) .';' : '';
  $inline_style .= ( $text_size ) ? 'font-size:'. check_px($text_size) .';' : '';
  $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
  $inline_style .= 'text-align: center';
  $inline_style .= '}';

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' aisa-slogan-'. $e_uniqid;

  $result = '<div class="aisa-slogan '.$custom_class . $styled_class .'">'. do_shortcode($content) .'</div>';
  return $result;

}
add_shortcode("vt_slogan", "vt_slogan_function");

/* Logo */
function vt_logo_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "image" => '',
    "width" => '',
    "height" => '',
    "top_space" => '',
    "bottom_space" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid        = uniqid();
  $inline_style  = '';

  if ($image) {
    $image = ($image) ? '<img src="'. $image .'" alt="logo"/>' : '';
  } else {
    $image = get_bloginfo('name');
  }

  // Text Color
  $inline_style .= '.aisa-logo-'. $e_uniqid .' {';
  $inline_style .= ( $top_space ) ? 'padding-top:'. check_px($top_space) .';' : '';
  $inline_style .= ( $bottom_space ) ? 'padding-bottom:'. check_px($bottom_space) .';' : '';
  $inline_style .= 'text-align: center';
  $inline_style .= '}';
  $inline_style .= '.aisa-logo-'. $e_uniqid .' a img {';
  $inline_style .= ( $width ) ? 'width:'. check_px($width) .';' : '';
  $inline_style .= ( $height ) ? 'height:'. check_px($height) .';' : '';
  $inline_style .= '}';

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' aisa-logo-'. $e_uniqid;

  $result = '<div class="aisa-logo '.$custom_class . $styled_class .'"><a href="'. esc_url(home_url()) .'">'.$image.'</a></div>';
  return $result;

}
add_shortcode("vt_logo", "vt_logo_function");

/* Go To Top */
function vt_gototop_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "text" => '',
    "text_size" => '',
    "text_color" => '',
    "icon" => ''
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid      = uniqid();
  $inline_style  = '';

  // Text Color
  $inline_style .= '.goto-top-'. $e_uniqid .' a:link, .goto-top-'. $e_uniqid .' a:active, .goto-top-'. $e_uniqid .' a:visited {';
  $inline_style .= ( $text_size ) ? 'font-size:'. check_px($text_size) .';' : '';
  $inline_style .= ( $text_color ) ? 'color: '. $text_color .';' : '';
  $inline_style .= '}';

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' goto-top-'. $e_uniqid;

  $result = '<div class="goto-top '.$custom_class . $styled_class .'"><a href="#">'. $text .' <i class="'. $icon .'"></i></a></div>';
  return $result;

}
add_shortcode("vt_go_to_top", "vt_gototop_function");

/* Social Icons */
function vt_socials_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "social_select" => '',
    "custom_class" => '',
    // Colors
    "icon_color" => '',
    "icon_hover_color" => '',
    "bg_color" => '',
    "bg_hover_color" => '',
    "border_color" => '',
    "text_color" => '',
    "text_hover_color" => '',
    "icon_size" => '',
    "top_space" => '',
    "bottom_space" => '',
  ), $atts));

  // Atts
  if($social_select === 'style-one') {
    $social_style = 'aisa-social-one ';
    $social_open = '';
    $social_close = '';
  } elseif($social_select === 'style-two') {
    $social_style = 'aisa-social-two ';
    $social_open = '';
    $social_close = '';
  } elseif($social_select === 'style-three') {
    $social_style = 'aisa-social-three ';
    $social_open = '';
    $social_close = '';
  } elseif($social_select === 'style-four') {
    $social_style = 'aisa-social-four ';
    $social_open = '';
    $social_close = '';
  } else {
    $social_style = 'aisa-social ';
    $social_open = '';
  }

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  if ( $top_space || $bottom_space ) {
    $inline_style .= '.aisa-socials-'. $e_uniqid .'.aisa-social, .aisa-socials-'. $e_uniqid .'.aisa-social-one, .aisa-socials-'. $e_uniqid .'.aisa-social-two, .aisa-socials-'. $e_uniqid .'.aisa-social-three {';
    $inline_style .= ( $top_space ) ? 'padding-top:'. check_px($top_space) .';' : '';
    $inline_style .= ( $bottom_space ) ? 'padding-bottom:'. check_px($bottom_space) .';' : '';
    $inline_style .= '}';
  }
  if( $social_select === 'style-one' ) {
    if ( isset($icon_color) || isset($icon_size) ) {
      $inline_style .= '.aisa-socials-'. $e_uniqid .'.aisa-social-one li a{';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    if ( isset($icon_hover_color )) {
      $inline_style .= '.aisa-socials-'. $e_uniqid .'.aisa-social-one li a:hover{';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
    }
  }
  if( $social_select === 'style-two' ) {
    if ( isset($icon_color) || isset($icon_size) ) {
      $inline_style .= '.aisa-socials-'. $e_uniqid .'.aisa-social-two li a{';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_hover_color ) {
      $inline_style .= '.aisa-socials-'. $e_uniqid .'.aisa-social-two li a:hover{';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $bg_color ) {
      $inline_style .= '.aisa-socials-'. $e_uniqid .'.aisa-social-two li a{';
      $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
      $inline_style .= '}';
    }
    if ( $bg_hover_color ) {
      $inline_style .= '.aisa-socials-'. $e_uniqid .'.aisa-social-two li a:hover{';
      $inline_style .= ( $bg_hover_color ) ? 'background-color:'. $bg_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $border_color ) {
      $inline_style .= '.aisa-socials-'. $e_uniqid .'.aisa-social-two li a{';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
  }
  if( $social_select === 'style-three' ) {
    if ( isset($icon_color) || isset($icon_size) ) {
      $inline_style .= '.aisa-socials-'. $e_uniqid .'.aisa-social-three li a i{';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $bg_color ) {
      $inline_style .= '.aisa-socials-'. $e_uniqid .'.aisa-social-three li a i{';
      $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
      $inline_style .= '}';
    }
    if ( $bg_hover_color ) {
      $inline_style .= '.aisa-socials-'. $e_uniqid .'.aisa-social-three li a:hover i{';
      $inline_style .= ( $bg_hover_color ) ? 'background-color:'. $bg_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $text_color ) {
      $inline_style .= '.aisa-socials-'. $e_uniqid .'.aisa-social-three li a {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= '}';
    }
    if ( $text_hover_color ) {
      $inline_style .= '.aisa-socials-'. $e_uniqid .'.aisa-social-three li a:hover {';
      $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
      $inline_style .= '}';
    }
  }
  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' aisa-socials-'. $e_uniqid;

  $result = $social_open .'<ul class="clearfix '. $social_style . $custom_class . $styled_class .'">'. do_shortcode($content) .'</ul>'. $social_close;
  return $result;

}
add_shortcode("vt_socials", "vt_socials_function");

/* Social Icon */
function vt_social_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "social_link" => '',
      "social_icon" => '',
      "social_text" => '',
      "target_tab" => ''
   ), $atts));

   $social_link = ( isset( $social_link ) ) ? 'href="'. $social_link . '"' : '';
   $social_text = ( isset( $social_text ) ) ? $social_text : '';
   $target_tab = ( $target_tab === '1' ) ? ' target="_blank"' : '';

   $result = '<li><a '. $social_link . $target_tab .' class="'. str_replace('fa ', 'icon-', $social_icon) .'"><i class="'. $social_icon .'"></i>'. $social_text .'</a></li>';
   return $result;

}
add_shortcode("vt_social", "vt_social_function");

/* Blockquote */
function vt_blockquote_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "text_size" => '',
    "custom_class" => '',
    "text_color" => '',
    "left_color" => '',
    "border_color" => '',
    "bg_color" => ''
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid        = uniqid();
  $inline_style  = '';

  // Text Color
  if ( $text_size || $text_color || $border_color || $bg_color ) {
    $inline_style .= '.aisa-blockquote-'. $e_uniqid .' {';
    $inline_style .= ( $text_size ) ? 'font-size:'. check_px($text_size) .';' : '';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $border_color ) ? 'border: 1px solid '. $border_color .';' : '';
    $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
    $inline_style .= ( $left_color ) ? 'border-left: 3px solid '. $left_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' aisa-blockquote-'. $e_uniqid;

  $result = '<blockquote class="'. $custom_class . $styled_class .'">'. do_shortcode($content) .'</blockquote>';
  return $result;

}
add_shortcode("vt_blockquote", "vt_blockquote_function");

/* List Styles Lists */
function vt_lists_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "list_select" => '',
    "custom_class" => '',
    // Colors
    "text_color" => '',
    "text_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  if ( $text_color || $text_size ) {
    $inline_style .= '.aisa-list-'. $e_uniqid .' li {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' aisa-list-'. $e_uniqid;

  // Output
  $output = '';

  if($list_select === 'unordered-list'){
    $output .= '<ul class="'. $custom_class . $styled_class .'">';
    $output .= do_shortcode($content);
    $output .= '</ul>';
  } else {
    $output .= '<ol class="'. $custom_class . $styled_class .'">';
    $output .= do_shortcode($content);
    $output .= '</ol>';
  }

  return $output;

}
add_shortcode("vt_lists", "vt_lists_function");

/* List Styles List */
function vt_list_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "list_text" => '',
  ), $atts));

  // Atts
  $list_text = $list_text ? $list_text : '';

  $result = '<li>'. $list_text .'</li>';
  return $result;

}
add_shortcode("vt_list", "vt_list_function");

/* Posts Slider */
function vt_posts_slider_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "slider_style" => '',
    "slider_limit" => '',
    "slider_order"    => '',
    "slider_orderby" => '',
    "slider_category" => '',
    "slider_date"     => '',
    "slider_author"   => '',
    "slider_custom_category" => '',
    "slider_particular" => '',
  ), $atts));

  // Post Particular
  $particular_id = explode(',', $slider_particular);
  $slider_limit = $slider_limit ? $slider_limit : '6';

  if ($slider_particular) {
    $args = array(
      'post_status' => 'publish',
      'post_type'   => 'post',
      'post__in'  => $particular_id,
      'posts_per_page' => (int)$slider_limit,
      'orderby'        => $slider_orderby,
      'order'          => $slider_order,
      'category_name'  => esc_attr($slider_custom_category),
    );
  } else {
    $args = array(
      'post_status' => 'publish',
      'post_type'      => 'post',
      'posts_per_page' => (int)$slider_limit,
      'orderby'        => $slider_orderby,
      'order'          => $slider_order,
      'category_name'  => esc_attr($slider_custom_category),
    );
  }
  $vcts_slider_post = new WP_Query( $args );

  if ($slider_style === 'style-two') {

    $result = '<div class="aisa-carouselwrap '. esc_attr($custom_class) .'"><div class="aisa-sliderBox container">';
    $result.= '<ul class="owl-carousel aisa-container-carousel">';

    if ($vcts_slider_post->have_posts()) : while ($vcts_slider_post->have_posts()) : $vcts_slider_post->the_post();

      $large_image = '';
      $large_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
      $large_image = $large_image[0];

      if($large_image){

        $result.= '<li><img src="'.$large_image.'" alt="'.esc_attr(get_the_title()).'"><div class="aisa-postdetails"><div class="box">';

        if ( $slider_category ) { // Category Hide
          $categories = get_the_category( get_the_ID() );
          $cnt_cat = count($categories);
          if ($categories) {
            $result.= '<div class="category-title"><div class="aisa-btn">';
            $result.= get_the_category_list( '<span>&amp;</span>' );
            $result.= '</div></div>';
          }
        }

        $result.= '<h3><a href="'. get_the_permalink( get_the_ID() ). '">'. get_the_title( get_the_ID() ) .'</a></h3>';

        if ( isset($slider_date) || isset($slider_author) ) { // Date Hide
          $result.= '<ul>';
          if ( $slider_date ) { // Date Hide
            $result.= '<li>'.get_the_time('F d, Y').'</li>';
          }
          if ( $slider_author ) { // Author Hide
            $result.= '<li><span>by</span></li>';
            $result.= '<li><a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'" rel="author">'.get_the_author().'</a></li>';
          }
          $result.='</ul>';
        }

        $result.='</div></div></li>';
      }
    endwhile;
    endif;
    wp_reset_postdata();

    $result.= '</ul></div></div>';

  } else {

    $result = '<div class="aisa-carousel '. esc_attr($custom_class) .'"><ul class="owl-carousel aisa-banner-carousel">';

    if ($vcts_slider_post->have_posts()) : while ($vcts_slider_post->have_posts()) : $vcts_slider_post->the_post();

      $large_image = '';
      $large_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
      $large_image = $large_image[0];

      if (is_cs_framework_active()) {
        $dummy_image = cs_get_option('blog_dummy_image');
      } else {
        $dummy_image = 'false';
      }

      if($large_image){
        if(class_exists('Aq_Resize')) {
          $post_img = aq_resize( $large_image, '650', '460', true );
          $img_class = 'dummy-featured-image';
        } else {$post_img = $large_image;$img_class = '';}
      } else {
        if ( !isset($dummy_image) ) {
          $post_img = AILSA_PLUGIN_IMGS . '/650x460.jpg';
          $img_class = 'dummy-featured-image';
        } else {
          $post_img = '';
          $img_class = 'dummy-featured-image';
        }
      }

      if ($post_img) {
        $result .= '<li>';
        $result .= '<img src="'.$post_img.'" alt="'.esc_attr(get_the_title()).'" class="'. $img_class .'">';
      } else {
        $result .= '<li class="aisa-dhav-image">';
      }
      $result .= '<div class="aisa-posttitlebar">';

      if ( $slider_category ) { // Category Hide
        $categories = get_the_category( get_the_ID() );
        $cnt_cat = count($categories);
        if ($categories) {
          $result .= '<div class="category-title"><div class="aisa-btn">';
          $result .= get_the_category_list( '<span>&amp;</span>' );
          $result .= '</div></div>';
        }
      }

      $result .= '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3></div></li>';
    endwhile;
    endif;
    wp_reset_postdata();

    $result .= '</ul></div>';

  }

  return $result;

}
add_shortcode("vt_posts_slider", "vt_posts_slider_function");

/* Current Year - Shortcode */
if( ! function_exists( 'vt_current_year' ) ) {
  function vt_current_year() {
    return date('Y');
  }
  add_shortcode( 'vt_current_year', 'vt_current_year' );
}

/* Get Home Page URL - Via Shortcode */
if( ! function_exists( 'vt_home_url' ) ) {
  function vt_home_url() {
    return esc_url( home_url( '/' ) );
  }
  add_shortcode( 'vt_home_url', 'vt_home_url' );
}

/* Tag Function */
if( ! function_exists( 'vt_tag_function' ) ) {
  function vt_tag_function($atts, $content = true) {
    extract(shortcode_atts(array(
      'type' => '',
    ), $atts));
    return '<'.esc_attr($type).'>' . do_shortcode($content) . '</' . esc_attr($type) . '>';
  }
  add_shortcode("vt_tag", "vt_tag_function");
}
