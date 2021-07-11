<?php
/**
 * Blog - Shortcode Options
 */
add_action( 'init', 'vcts_blog_vc_map' );
if ( ! function_exists( 'vcts_blog_vc_map' ) ) {
  function vcts_blog_vc_map() {
    vc_map( array(
      "name" => __( "Blog", 'ailsa-core'),
      "base" => "vcts_blog",
      "description" => __( "Blog Styles", 'ailsa-core'),
      "icon" => "fa fa-newspaper-o color-red",
      "category" => VictorLib::vcts_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Blog Style', 'ailsa-core' ),
          'value' => array(
            __( 'Style One (Grid)', 'ailsa-core' ) => 'aisa-blog-one',
            __( 'Style Two (List)', 'ailsa-core' ) => 'aisa-blog-two',
          ),
          'admin_label' => true,
          'param_name' => 'blog_style',
          'description' => __( 'Select your blog style.', 'ailsa-core' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Columns', 'ailsa-core' ),
          'value' => array(
            __( 'Column One', 'ailsa-core' ) => 'aisa-blog-col-1',
            __( 'Column Two', 'ailsa-core' ) => 'aisa-blog-col-2',
            __( 'Column Three', 'ailsa-core' ) => 'aisa-blog-col-3',
          ),
          'admin_label' => true,
          'param_name' => 'blog_column',
          'description' => __( 'Select your blog column.', 'ailsa-core' ),
          'dependency' => array(
            'element' => 'blog_style',
            'value' => array('aisa-blog-one'),
          ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'ailsa-core'),
          "param_name"  => "blog_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'ailsa-core'),
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
          "param_name"  => "blog_category",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Date', 'ailsa-core'),
          "param_name"  => "blog_date",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Author', 'ailsa-core'),
          "param_name"  => "blog_author",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Comments', 'ailsa-core'),
          "param_name"  => "blog_comments",
          "value"       => "",
          "std"         => false,
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
          "heading"     =>__('Image Popup', 'ailsa-core'),
          "param_name"  => "blog_popup",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Share', 'ailsa-core'),
          "param_name"  => "blog_share",
          "value"       => "",
          "std"         => false,
          "edit_field_class"   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        array(
          "type"        =>'switcher',
          "heading"     =>__('Excerpt', 'ailsa-core'),
          "param_name"  => "blog_excerpt",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Read More', 'ailsa-core'),
          "param_name"  => "blog_read_more",
          "value"       => "",
          "std"         => true,
          "edit_field_class"   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Pagination', 'ailsa-core'),
          "param_name"  => "blog_pagination",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),

        array(
          "type"        =>'textfield',
          "heading"     =>__('Excerpt Length', 'ailsa-core'),
          "param_name"  => "blog_excerpt_length",
          "value"       => "",
          "description" => __( "Enter blog short content length.", 'ailsa-core'),
          'dependency'  => array(
            'element'   => 'blog_excerpt',
            'value'     => array('true'),
          ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Read More Button Text', 'ailsa-core'),
          "param_name"  => "read_more_text",
          "value"       => "",
          "description" => __( "Enter read more button text.", 'ailsa-core'),
          'dependency'  => array(
            'element'   => 'blog_read_more',
            'value'     => array('true'),
          ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading'     => __('Pagination Style', 'ailsa-core'),
          'value' => array(
            __( 'Previous/Next', 'ailsa-core' ) => 'aisa-pagination-one',
            __( 'Page Numbers', 'ailsa-core' ) => 'aisa-pagination-two',
          ),
          'param_name' => 'blog_pagination_style',
          'description' => __( 'Select blog pagination style.', 'ailsa-core' ),
          'dependency' => array(
            'element' => 'blog_pagination',
            'value' => array('true'),
          ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Listing", 'ailsa-core' ),
          "param_name"  => 'lsng_opt',
          'class'       => 'cs-warning',
          'value'       => '',
		),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'ailsa-core' ),
          'value' => array(
            __( 'Select Blog Order', 'ailsa-core' ) => '',
            __('Asending', 'ailsa-core') => 'ASC',
            __('Desending', 'ailsa-core') => 'DESC',
          ),
          'param_name' => 'blog_order',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order By', 'ailsa-core' ),
          'value' => array(
            __('None', 'ailsa-core') => 'none',
            __('ID', 'ailsa-core') => 'ID',
            __('Author', 'ailsa-core') => 'author',
            __('Title', 'ailsa-core') => 'title',
            __('Date', 'ailsa-core') => 'date',
          ),
          'param_name' => 'blog_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain categories?', 'ailsa-core'),
          "param_name"  => "blog_show_category",
          "value"       => "",
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'ailsa-core')
        ),

        VictorLib::vt_class_option(),

      )
    ) );
  }
}
