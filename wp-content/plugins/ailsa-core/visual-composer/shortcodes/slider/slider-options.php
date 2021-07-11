<?php
/**
 * Posts Slider - Shortcode Options
 */
add_action( 'init', 'vcts_slider_vc_map' );
if ( ! function_exists( 'vcts_slider_vc_map' ) ) {
  function vcts_slider_vc_map() {
    vc_map( array(
      "name" => __( "Posts Slider", 'ailsa-core'),
      "base" => "vcts_slider",
      "description" => __( "Posts Slider Styles", 'ailsa-core'),
      "icon" => "fa fa-refresh color-red",
      "category" => VictorLib::vcts_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Slider Style', 'ailsa-core' ),
          'value' => array(
            __( 'Style One', 'ailsa-core' ) => 'aisa-slider-one',
            __( 'Style Two', 'ailsa-core' ) => 'aisa-slider-two',
          ),
          'admin_label' => true,
          'param_name' => 'slider_style',
          'description' => __( 'Select your slider style.', 'ailsa-core' ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'ailsa-core'),
          "param_name"  => "slider_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'ailsa-core'),
        ),

        array(
    		  "type"        => "notice",
    		  "heading"     => __( "Meta's to Hide", 'ailsa-core' ),
    		  "param_name"  => 'slider_mts_opt',
    		  'class'       => 'cs-warning',
    		  'value'       => '',
    		),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Category', 'ailsa-core'),
          "param_name"  => "slider_category",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Date', 'ailsa-core'),
          "param_name"  => "slider_date",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'slider_style',
            'value' => array('aisa-slider-two'),
          ),
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Author', 'ailsa-core'),
          "param_name"  => "slider_author",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'slider_style',
            'value' => array('aisa-slider-two'),
          ),
        ),

        array(
    		  "type"        => "notice",
    		  "heading"     => __( "Listing", 'ailsa-core' ),
    		  "param_name"  => 'slider_lsng_opt',
    		  'class'       => 'cs-warning',
    		  'value'       => '',
    		),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'ailsa-core' ),
          'value' => array(
            __( 'Select Slider Order', 'ailsa-core' ) => '',
            __('Asending', 'ailsa-core')  => 'ASC',
            __('Desending', 'ailsa-core') => 'DESC',
          ),
          'param_name' => 'slider_order',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type'    => 'dropdown',
          'heading' => __( 'Order By', 'ailsa-core' ),
          'value'   => array(
            __('None', 'ailsa-core') => 'none',
            __('ID', 'ailsa-core')   => 'ID',
            __('Title', 'ailsa-core')=> 'title',
            __('Author', 'ailsa-core') => 'author',
            __('Date', 'ailsa-core') => 'date',
          ),
          'param_name' => 'slider_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain categories?', 'ailsa-core'),
          "param_name"  => "slider_show_category",
          "value"       => "",
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'ailsa-core')
        ),
        VictorLib::vt_class_option(),
      )
    ) );
  }
}
