<?php
/*
 * All Custom Shortcode for [theme_name] theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

if( ! function_exists( 'vt_framework_shortcodes' ) ) {
  function vt_framework_shortcodes( $options ) {

    $options       = array();

    /* Shortcodes */
    $options[]     = array(
      'title'      => __('Shortcodes', 'ailsa-core'),
      'shortcodes' => array(

        // Spacer
        array(
          'name'          => 'vc_empty_space',
          'title'         => __('Spacer', 'ailsa-core'),
          'fields'        => array(

            array(
              'id'         => 'height',
              'type'       => 'text',
              'title'      => __('Height', 'ailsa-core'),
              'attributes' => array(
                'placeholder'     => '20px',
              ),
            ),

          ),
        ),
        // Spacer

        // Logo
        array(
          'name'          => 'vt_logo',
          'title'         => __('Logo', 'ailsa-core'),
          'fields'        => array(

            array(
              'id'        => 'image',
              'type'      => 'upload',
              'title'     => __('Logo', 'ailsa-core'),
            ),
            array(
              'id'        => 'width',
              'type'      => 'text',
              'title'     => __('Width', 'ailsa-core'),
            ),
            array(
              'id'        => 'height',
              'type'      => 'text',
              'title'     => __('Height', 'ailsa-core'),
            ),
            array(
              'id'        => 'top_space',
              'type'      => 'text',
              'title'     => __('Top Space', 'ailsa-core'),
            ),
            array(
              'id'        => 'bottom_space',
              'type'      => 'text',
              'title'     => __('Bottom Space', 'ailsa-core'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'ailsa-core'),
            ),

          ),
        ),

         // Slogan
        array(
          'name'          => 'vt_slogan',
          'title'         => __('Slogan', 'ailsa-core'),
          'fields'        => array(

            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'ailsa-core'),
              'wrap_class'=> 'column_half',
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'ailsa-core'),
              'wrap_class'=> 'column_half',
            ),
            array(
              'id'        => 'top_space',
              'type'      => 'text',
              'title'     => __('Top Space', 'ailsa-core'),
              'wrap_class'=> 'column_half',
            ),
            array(
              'id'        => 'bottom_space',
              'type'      => 'text',
              'title'     => __('Bottom Space', 'ailsa-core'),
              'wrap_class'=> 'column_half',
            ),
            array(
              'id'        => 'content',
              'type'      => 'textarea',
              'title'     => __('Slogan Text', 'ailsa-core'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'ailsa-core'),
            ),
          ),
        ),

        // Back To Top
        array(
          'name'          => 'vt_go_to_top',
          'title'         => __('Go To Top', 'ailsa-core'),
          'fields'        => array(

            array(
              'id'        => 'text',
              'type'      => 'text',
              'title'     => __('Text', 'ailsa-core'),
              'wrap_class'=> 'column_half',
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'ailsa-core'),
              'wrap_class'=> 'column_half',
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'ailsa-core'),
              'wrap_class'=> 'column_third',
            ),
            array(
              'id'        => 'icon',
              'type'      => 'icon',
              'title'     => __('Icon', 'ailsa-core'),
              'wrap_class'=> 'column_third',
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'ailsa-core'),
              'wrap_class'=> 'column_full',
            ),
          ),
        ),

        // Social Icons
        array(
          'name'          => 'vt_socials',
          'title'         => __('Social Icons', 'ailsa-core'),
          'view'          => 'clone',
          'clone_id'      => 'vt_social',
          'clone_title'   => __('Add New', 'ailsa-core'),
          'fields'        => array(

            array(
              'id'        => 'social_select',
              'type'      => 'select',
              'options'   => array(
                'style-one'   => __('Style One (Header)', 'ailsa-core'),
                'style-two'   => __('Style Two', 'ailsa-core'),
                'style-three' => __('Style Three (Footer)', 'ailsa-core')
              ),
              'title'     => __('Social Icons Style', 'ailsa-core'),
            ),
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => __('Icon Size', 'ailsa-core'),
            ),
            array(
              'id'        => 'top_space',
              'type'      => 'text',
              'title'     => __('Top Space', 'ailsa-core'),
              'wrap_class'=> 'column_half',
            ),
            array(
              'id'        => 'bottom_space',
              'type'      => 'text',
              'title'     => __('Bottom Space', 'ailsa-core'),
              'wrap_class'=> 'column_half',
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'ailsa-core')
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Color', 'ailsa-core'),
              'wrap_class'=> 'column_third',
            ),
            array(
              'id'        => 'icon_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Hover Color', 'ailsa-core'),
              'wrap_class'=> 'column_third',
              'dependency'=> array('social_select', '!=', 'style-three'),
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => __('Backrgound Color', 'ailsa-core'),
              'wrap_class'=> 'column_third',
              'dependency'=> array('social_select', '!=', 'style-one'),
            ),
            array(
              'id'        => 'bg_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Backrgound Hover Color', 'ailsa-core'),
              'wrap_class'=> 'column_third',
              'dependency'=> array('social_select', 'any', 'style-two,style-three'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Border Color', 'ailsa-core'),
              'wrap_class'=> 'column_third',
              'dependency'=> array('social_select', '==', 'style-two'),
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'ailsa-core'),
              'wrap_class'=> 'column_third',
              'dependency'=> array('social_select', '==', 'style-three'),
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'ailsa-core'),
              'wrap_class'=> 'column_third',
              'dependency'=> array('social_select', '==', 'style-three'),
            ),
            array(
              'id'     => 'custom_class',
              'type'   => 'text',
              'title'  => __('Custom Class', 'ailsa-core'),
              'wrap_class'=> 'column_full',
            ),
          ),
          'clone_fields'  => array(

            array(
              'id'         => 'social_link',
              'type'       => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'      => __('Link', 'ailsa-core')
            ),
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => __('Social Icon', 'ailsa-core')
            ),
            array(
              'id'        => 'social_text',
              'type'      => 'text',
              'title'     => __('Social Text', 'ailsa-core')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'ailsa-core'),
              'on_text'      => __('Yes', 'ailsa-core'),
              'off_text'     => __('No', 'ailsa-core'),
            ),

          ),

        ),
        // Social Icons

        // Posts Slider
        array(
          'name'          => 'vt_posts_slider',
          'title'         => __('Posts Slider', 'ailsa-core'),
          'fields'        => array(

            array(
              'id'        => 'slider_style',
              'type'      => 'select',
              'options'   => array(
                'style-one'   => __('Style One', 'ailsa-core'),
                'style-two'   => __('Style Two', 'ailsa-core'),
              ),
              'title'     => __('Posts Slider Style', 'ailsa-core'),
            ),
            array(
              'id'        => 'slider_limit',
              'type'      => 'text',
              'title'     => __('Limit', 'ailsa-core'),
            ),
            array(
              'id'        => 'slider_custom_category',
              'type'      => 'text',
              'title'     => __('Show only certain categories?', 'ailsa-core'),
              'info'      => __('Enter category SLUGS (comma separated) you want to display.', 'ailsa-core'),
            ),
            array(
              'id'        => 'slider_particular',
              'type'      => 'select',
              'title'     => __('Show only certain posts?', 'ailsa-core'),
              'options'       => 'posts',
              'attributes'    => array(
                'multiple'    => 'multiple',
              ),
              'query_args'     => array(
                'post_type'  => 'post',
                'orderby'    => 'post_date',
                'order'      => 'DESC',
                'posts_per_page' => -1,
              ),
              'info'      => __('Enter post id\'s (comma separated) you want to display.', 'ailsa-core'),
            ),
            array(
              'id'        => 'slider_order',
              'type'      => 'select',
              'options'   => array(
                'none'    => __('None', 'ailsa-core'),
                'ID'      => __('ID', 'ailsa-core'),
                'title'   => __('Title', 'ailsa-core'),
                'date'    => __('Date', 'ailsa-core'),
                'author'  => __('Author', 'ailsa-core'),
                'post__in'  => __('Align Based on Post ID Entered', 'ailsa-core'),
              ),
              'title'     => __('Order', 'ailsa-core'),
              'wrap_class'=> 'column_half',
            ),
            array(
              'id'        => 'slider_orderby',
              'type'      => 'select',
              'options'   => array(
                'ASC'     => __('Asending', 'ailsa-core'),
                'DESC'    => __('Desending', 'ailsa-core'),
              ),
              'title'     => __('Order By', 'ailsa-core'),
              'wrap_class'=> 'column_half',
            ),
            array(
              'type'      => 'notice',
              'class'     => 'info',
              'content'   => __("Meta's to Hide", 'ailsa-core')
            ),
            array(
              'id'        => 'slider_category',
              'type'      => 'switcher',
              'title'     => __('Category', 'ailsa-core'),
              'default'   => true,
              'wrap_class'=> 'column_third',
            ),
            array(
              'id'        => 'slider_date',
              'type'      => 'switcher',
              'title'     => __('Date', 'ailsa-core'),
              'default'   => true,
              'dependency'=> array('slider_style', '==', 'style-two'),
              'wrap_class'=> 'column_third',
            ),
            array(
              'id'        => 'slider_author',
              'type'      => 'switcher',
              'title'     => __('Author', 'ailsa-core'),
              'default'   => true,
              'dependency'=> array('slider_style', '==', 'style-two'),
              'wrap_class'=> 'column_third',
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'ailsa-core'),
              'wrap_class'=> 'column_full',
            ),

          ),

        ),
        // Posts Slider

        // Blockquotes
        array(
          'name'          => 'vt_blockquote',
          'title'         => __('Blockquote', 'ailsa-core'),
          'fields'        => array(

            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'ailsa-core'),
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Content Color', 'ailsa-core'),
            ),
            array(
              'id'        => 'left_color',
              'type'      => 'color_picker',
              'title'     => __('Left Border Color', 'ailsa-core'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Border Color', 'ailsa-core')
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => __('Background Color', 'ailsa-core'),
            ),

            // Content
            array(
              'id'        => 'content',
              'type'      => 'textarea',
              'title'     => __('Content', 'ailsa-core'),
              'wrap_class'=> 'column_full',
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'ailsa-core'),
              'wrap_class'=> 'column_full',
            ),

          ),

        ),
        // Blockquotes

        // List Styles
        array(
          'name'          => 'vt_lists',
          'title'         => __('List', 'ailsa-core'),
          'view'          => 'clone',
          'clone_id'      => 'vt_list',
          'clone_title'   => __('Add New', 'ailsa-core'),
          'fields'        => array(

            array(
              'id'        => 'list_select',
              'type'      => 'select',
              'options'   => array(
                'ordered-list'   => __('Ordered List', 'ailsa-core'),
                'unordered-list'   => __('Unordered List', 'ailsa-core'),
              ),
              'title'     => __('Social Icons Style', 'ailsa-core'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'ailsa-core')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'ailsa-core'),
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'ailsa-core'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'ailsa-core'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'list_text',
              'type'      => 'textarea',
              'title'     => __('Text', 'ailsa-core')
            ),

          ),

        ),
        // List Styles

      ),
    );

  return $options;

  }
  add_filter( 'cs_shortcode_options', 'vt_framework_shortcodes' );
}
