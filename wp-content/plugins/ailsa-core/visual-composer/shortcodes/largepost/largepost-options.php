<?php
/**
 * Large Post - Shortcode Options
 */
add_action( 'init', 'vcts_large_post_vc_map' );
if ( ! function_exists( 'vcts_large_post_vc_map' ) ) {
  function vcts_large_post_vc_map() {
    vc_map( array(
      "name" => __( "Large Post", 'ailsa-core'),
      "base" => "vcts_large_post",
      "description" => __( "Large Post Styles", 'ailsa-core'),
      "icon" => "fa fa-file-text color-red",
      "category" => VictorLib::vcts_cat_name(),
      "params" => array(

        array(
		  'type' => 'textfield',
		  'heading' => __( 'Post ID', 'ailsa-core' ),
		  'param_name'  => 'large_post_posts_in',
          'value'       => '',
		  'description' => __( 'Enter the post ID to display as large post.', 'ailsa-core' ),
          'admin_label' => true,
		),

        array(
		  "type"        => "notice",
		  "heading"     => __( "Meta's to Hide", 'ailsa-core' ),
		  "param_name"  => 'mts_opt',
		  'class'       => 'cs-warning',
		  'value'       => '',
  		),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Category', 'ailsa-core'),
          "param_name"  => "large_post_category",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Date', 'ailsa-core'),
          "param_name"  => "large_post_date",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Author', 'ailsa-core'),
          "param_name"  => "large_post_author",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Comments', 'ailsa-core'),
          "param_name"  => "large_post_comments",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Enable/Disable", 'ailsa-core' ),
          "param_name"  => 'sh_opt',
          'class'       => 'cs-warning',
          'value'       => '',
		),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Excerpt', 'ailsa-core'),
          "param_name"  => "large_post_excerpt",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Read More', 'ailsa-core'),
          "param_name"  => "large_post_read_more",
          "value"       => "",
          "std"         => true,
          "edit_field_class"   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Share', 'ailsa-core'),
          "param_name"  => "large_post_share",
          "value"       => "",
          "std"         => true,
          "edit_field_class"   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Image Popup', 'ailsa-core'),
          "param_name"  => "large_post_popup",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),

        array(
          "type"        =>'textfield',
          "heading"     =>__('Excerpt Length', 'ailsa-core'),
          "param_name"  => "large_post_excerpt_length",
          "value"       => "",
          "description" => __( "Enter large_post short content length.", 'ailsa-core'),
          'dependency'  => array(
            'element'   => 'large_post_excerpt',
            'value'     => array('true'),
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Read More Button Text', 'ailsa-core'),
          "param_name"  => "read_more_text",
          "value"       => "",
          "description" => __( "Enter read more button text.", 'ailsa-core'),
          'dependency'  => array(
            'element'   => 'large_post_read_more',
            'value'     => array('true'),
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        VictorLib::vt_class_option(),

      )
    ) );
  }
}
