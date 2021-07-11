<?php
/*
 * All Metabox related options for Ailsa theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

function ailsa_metabox_options( $options ) {

  $options      = array();

  // -----------------------------------------
  // Post Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_type_metabox',
    'title'     => esc_html__('Post Options', 'ailsa'),
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_post_formats',
        'fields' => array(

          // Standard, Image
          array(
            'title' => esc_html__('Standard/Image Format', 'ailsa'),
            'type'  => 'subheading',
            'content' => esc_html__('There is no Extra Option for this Post Format!', 'ailsa'),
            'wrap_class' => 'vt-minimal-heading hide-title',
          ),
          // Standard, Image

          // Gallery
          array(
            'type'    => 'notice',
            'wrap_class' => 'gallery-title',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Gallery Format', 'ailsa')
          ),
          array(
            'id'             => 'image_display_type',
            'type'           => 'select',
            'title'          => esc_html__('Display Format', 'ailsa'),
            'options'        => array(
              'img-slider'   => esc_html__('Slider', 'ailsa'),
              'img-gallery'  => esc_html__('Tiles', 'ailsa'),
            ),
            'default_option' => 'Select Display Format',
            'info'           => esc_html__('Default option : Slider', 'ailsa'),
          ),
          array(
            'id'          => 'gallery_post_format',
            'type'        => 'gallery',
            'title'       => esc_html__('Add Gallery', 'ailsa'),
            'add_title'   => esc_html__('Add Image(s)', 'ailsa'),
            'edit_title'  => esc_html__('Edit Image(s)', 'ailsa'),
            'clear_title' => esc_html__('Clear Image(s)', 'ailsa'),
          ),
          // Gallery

          // Audio
          array(
            'type'       => 'notice',
            'wrap_class' => 'audio-title',
            'class'      => 'info cs-vt-heading',
            'content'    => esc_html__('Audio Format', 'ailsa')
          ),
          array(
            'id'        => 'audio_post_format',
            'type'      => 'textarea',
            'title'     => esc_html__('Add Audio', 'ailsa'),
            'sanitize'  => false,
          ),
          // Audio

          // Video
          array(
            'type'       => 'notice',
            'wrap_class' => 'video-title',
            'class'      => 'info cs-vt-heading',
            'content'    => esc_html__('Video Format', 'ailsa')
          ),
          array(
            'id'        => 'video_post_format',
            'type'      => 'textarea',
            'title'     => esc_html__('Add Video', 'ailsa'),
            'sanitize'  => false,
          ),
          // Video

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'ailsa'),
    'post_type' => array('post', 'page'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

    // Header
      array(
        'name'  => 'header_section',
        'title' => esc_html__('Header', 'ailsa'),
        'icon'  => 'fa fa-bars',
        'fields' => array(

          array(
            'id'          => 'menu_sidebar',
            'type'        => 'switcher',
            'title'       => esc_html__('Menu Sidebar', 'ailsa'),
            'info'        => esc_html__('Turn On if you want to show menu sidebar icon in navigation bar.', 'ailsa'),
            'default'     => true,
          ),
          array(
            'id'          => 'sticky_header',
            'type'        => 'switcher',
            'title'       => esc_html__('Sticky Header', 'ailsa'),
            'info'        => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'ailsa'),
            'default'     => true,
          ),
          array(
            'id'          => 'search_icon',
            'type'        => 'switcher',
            'title'       => esc_html__('Search Icon', 'ailsa'),
            'info'        => esc_html__('Turn On if you want to show search icon in navigation bar.', 'ailsa'),
            'default'     => true,
          ),
          array(
            'id'          => 'logo_area',
            'type'        => 'switcher',
            'title'       => esc_html__('Logo Area', 'ailsa'),
            'info'        => esc_html__('Turn On if you want to show logo area in header.', 'ailsa'),
            'default'     => true,
          ),
          array(
            'id'        => 'logo_area_layout_bg',
            'type'      => 'background',
            'title'     => esc_html__('Logo Area Background', 'ailsa'),
            'dependency'=> array('logo_area', '==', 'true'),
          ),
          array(
            'id'        => 'logo_area_bg_overlay_color',
            'type'      => 'color_picker',
            'title'     => esc_html__('Logo Area Background Overlay Color', 'ailsa'),
            'rgba'      => true,
            'dependency'=> array('logo_area', '==', 'true'),
          ),

        ),
      ),
      // Header Section

      // Content Section
      array(
        'name'  => 'content_section',
        'title' => esc_html__('Content Options', 'ailsa'),
        'icon'  => 'fa fa-file',
        'fields' => array(

          array(
            'id'        => 'page_before_content',
            'type'      => 'textarea',
            'title'     => esc_html__('Before Content', 'ailsa'),
            'shortcode' => true,
          ),
          array(
            'id'        => 'page_layout_bg',
            'type'      => 'background',
            'title'     => esc_html__('Page Background', 'ailsa'),
          ),
          array(
            'id'        => 'page_bg_overlay_color',
            'type'      => 'color_picker',
            'title'     => esc_html__('Page Background Overlay Color', 'ailsa'),
            'rgba'      => true,
          ),

        ),
      ),
      // Content Section

      // Enable & Disable
      array(
        'name'  => 'hide_show_section',
        'title' => esc_html__('Enable & Disable', 'ailsa'),
        'icon'  => 'fa fa-toggle-on',
        'fields' => array(

          array(
            'id'      => 'hide_header',
            'type'    => 'switcher',
            'title'   => esc_html__('Hide Header', 'ailsa'),
            'label'   => esc_html__('Yes, Please do it.', 'ailsa'),
            'default' => false,
          ),
          array(
            'id'      => 'hide_page_title',
            'type'    => 'switcher',
            'title'   => esc_html__('Enable Page Title', 'ailsa'),
            'label'   => esc_html__('Yes, Please do it. Only for pages.', 'ailsa'),
            'default' => false,
          ),
          array(
            'id'      => 'hide_footer',
            'type'    => 'switcher',
            'title'   => esc_html__('Hide Footer', 'ailsa'),
            'label'   => esc_html__('Yes, Please do it.', 'ailsa'),
            'default' => false,
          ),
          array(
            'id'      => 'hide_footer_instagram',
            'type'    => 'switcher',
            'title'   => esc_html__('Hide Footer Instagram Widget', 'ailsa'),
            'label'   => esc_html__('Yes, Please do it.', 'ailsa'),
            'default' => false,
          ),

        ),
      ),
      // Enable & Disable

    ),
  );

  // -----------------------------------------
  // Page Layout
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_layout_options',
    'title'     => esc_html__('Page Layout', 'ailsa'),
    'post_type' => 'page',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'page_layout_section',
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'options'   => array(
              'full-width'    => AILSA_CS_IMAGES . '/page-1.png',
              'extra-width'   => AILSA_CS_IMAGES . '/page-2.png',
              'left-sidebar'  => AILSA_CS_IMAGES . '/page-3.png',
              'right-sidebar' => AILSA_CS_IMAGES . '/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'full-width',
            'radio'      => true,
            'wrap_class' => 'text-center',
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'ailsa'),
            'options'        => ailsa_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'ailsa'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Post Layout
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_page_layout_options',
    'title'     => esc_html__('Page Layout', 'ailsa'),
    'post_type' => 'post',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'post_page_layout_section',
        'fields' => array(

          array(
            'id'        => 'post_page_layout',
            'type'      => 'image_select',
            'options'   => array(
              'none'    => AILSA_CS_IMAGES . '/none.png',
              'full-width'    => AILSA_CS_IMAGES . '/page-1.png',
              'left-sidebar'  => AILSA_CS_IMAGES . '/page-3.png',
              'right-sidebar' => AILSA_CS_IMAGES . '/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'post_page_layout',
            ),
            'default'    => 'none',
            'radio'      => true,
            'wrap_class' => 'text-center',
          ),
          array(
            'id'            => 'post_page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'ailsa'),
            'options'        => ailsa_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'ailsa'),
            'dependency'   => array('post_page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),

        ),
      ),

    ),
  );

  return $options;

}
add_filter( 'cs_metabox_options', 'ailsa_metabox_options' );