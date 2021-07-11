<?php
/*
 * All Theme Options for Ailsa theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

function ailsa_framework_settings( $settings ) {

  $settings           = array(
    'menu_title'      => AILSA_VTHEME_NAME . __(' Options', 'ailsa'),
    'menu_slug'       => sanitize_title(AILSA_VTHEME_NAME) .'_options',
    'menu_type'       => 'menu',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => AILSA_VTHEME_NAME .' <small>V-'. AILSA_VTHEME_VERSION .' by <a href="'. esc_url(AILSA_VTHEME_BRAND_URL) .'" target="_blank">'. AILSA_VTHEME_BRAND_NAME .'</a></small>',
  );

  return $settings;

}
add_filter( 'cs_framework_settings', 'ailsa_framework_settings' );

// Theme Framework Options
function ailsa_framework_options( $options ) {

  $options      = array(); // remove old options

  // ------------------------------
  // Theme Brand
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_brand',
    'title'    => esc_html__('Brand', 'ailsa'),
    'icon'     => 'fa fa-bookmark',
    'sections' => array(

      // brand logo tab
      array(
        'name'       => 'brand_logo_title',
        'title'      => esc_html__('Logo', 'ailsa'),
        'icon'       => 'fa fa-star',
        'fields'     => array(

          // Site Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Site Logo', 'ailsa')
          ),
          array(
            'id'    => 'brand_logo_default',
            'type'  => 'image',
            'title' => esc_html__('Default Logo', 'ailsa'),
            'info'  => esc_html__('Upload your default logo here. If you not upload, then site title will load in this logo location.', 'ailsa'),
            'add_title' => esc_html__('Add Logo', 'ailsa'),
          ),
          array(
            'id'    => 'brand_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Retina Logo', 'ailsa'),
            'info'  => esc_html__('Upload your retina logo here. Recommended size is 2x from default logo.', 'ailsa'),
            'add_title' => esc_html__('Add Retina Logo', 'ailsa'),
          ),
          array(
            'id'          => 'retina_width',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Width', 'ailsa'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'retina_height',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Height', 'ailsa'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'ailsa'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'ailsa'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

          // Site Slogan
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Slogan', 'ailsa')
          ),
          array(
            'id'    => 'slogan_text',
            'type'  => 'textarea',
            'title' => esc_html__('Slogan Text', 'ailsa'),
            'shortcode' => true,
          ),

          // WordPress Admin Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('WordPress Admin Logo', 'ailsa')
          ),
          array(
            'id'    => 'brand_logo_wp',
            'type'  => 'image',
            'title' => esc_html__('Login logo', 'ailsa'),
            'info'  => esc_html__('Upload your WordPress login page logo here.', 'ailsa'),
            'add_title' => esc_html__('Add Login Logo', 'ailsa'),
          ),
        ) // end: fields
      ), // end: section

      // Fav
      array(
        'name'     => 'brand_fav',
        'title'    => esc_html__('Fav Icon', 'ailsa'),
        'icon'     => 'fa fa-anchor',
        'fields'   => array(

            // -----------------------------
            // Begin: Fav
            // -----------------------------
            array(
              'id'    => 'brand_fav_icon',
              'type'  => 'image',
              'title' => esc_html__('Fav Icon', 'ailsa'),
              'info'  => esc_html__('Upload your site fav icon, size should be 16x16.', 'ailsa'),
              'add_title' => esc_html__('Add Fav Icon', 'ailsa'),
            ),
            array(
              'id'    => 'iphone_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone icon', 'ailsa'),
              'info'  => esc_html__('Icon for Apple iPhone (57px x 57px). This icon is used for Bookmark on Home screen.', 'ailsa'),
              'add_title' => esc_html__('Add iPhone Icon', 'ailsa'),
            ),
            array(
              'id'    => 'iphone_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone retina icon', 'ailsa'),
              'info'  => esc_html__('Icon for Apple iPhone retina (114px x114px). This icon is used for Bookmark on Home screen.', 'ailsa'),
              'add_title' => esc_html__('Add iPhone Retina Icon', 'ailsa'),
            ),
            array(
              'id'    => 'ipad_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad icon', 'ailsa'),
              'info'  => esc_html__('Icon for Apple iPad (72px x 72px). This icon is used for Bookmark on Home screen.', 'ailsa'),
              'add_title' => esc_html__('Add iPad Icon', 'ailsa'),
            ),
            array(
              'id'    => 'ipad_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad retina icon', 'ailsa'),
              'info'  => esc_html__('Icon for Apple iPad retina (144px x 144px). This icon is used for Bookmark on Home screen.', 'ailsa'),
              'add_title' => esc_html__('Add iPad Retina Icon', 'ailsa'),
            ),

        ) // end: fields
      ), // end: section

    ),
  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => esc_html__('Layout', 'ailsa'),
    'icon'   => 'fa fa-file-text'
  );

  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => esc_html__('General', 'ailsa'),
    'icon'        => 'fa fa-wrench',

    // begin: fields
    'fields'      => array(

      // -----------------------------
      // Begin: Responsive
      // -----------------------------
      array(
        'id'      => 'theme_responsive',
        'type'    => 'switcher',
        'title'   => esc_html__('Responsive', 'ailsa'),
        'info'    => esc_html__('Turn off if you don\'t want your site to be responsive.', 'ailsa'),
        'default' => true,
      ),
      array(
        'id'         => 'page_layout_bg',
        'type'       => 'background',
        'title'      => esc_html__('Page Background', 'ailsa'),
        'rgba'       => true,
      ),
      array(
       'id'         => 'page_bg_overlay_color',
       'type'       => 'color_picker',
       'title'      => esc_html__('Page Background Overlay Color', 'ailsa'),
       'rgba'       => true,
      ),
      array(
        'id'      => 'theme_page_comments',
        'type'    => 'switcher',
        'title'   => esc_html__('Page Comments', 'ailsa'),
        'info'    => esc_html__('Turn On if you want to show comments in your pages.', 'ailsa'),
        'default' => true,
      ),
      array(
        'id'      => 'theme_img_resizer',
        'type'    => 'switcher',
        'title'   => esc_html__('Disable Image Resizer?', 'ailsa'),
        'info'    => esc_html__('Turn on if you don\'t want image resizer.', 'ailsa'),
      ),
    ), // end: fields
  );

  // ------------------------------
  // Header Sections
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_header_tab',
    'title'    => esc_html__('Header', 'ailsa'),
    'icon'     => 'fa fa-bars',
    'fields'   => array(
      array(
        'type'        => 'notice',
        'class'       => 'info cs-vt-heading',
        'content'     => esc_html__('Extra\'s', 'ailsa'),
      ),
      array(
        'id'          => 'menu_sidebar',
        'type'        => 'switcher',
        'title'       => esc_html__('Menu Sidebar', 'ailsa'),
        'info'        => esc_html__('Turn On if you want your menu sidebar to show.', 'ailsa'),
        'default'     => true,
      ),
      array(
        'id'          => 'mobile_breakpoint',
        'type'        => 'text',
        'title'       => esc_html__('Mobile Menu Starts from?', 'ailsa'),
        'attributes'  => array( 'placeholder' => '767' ),
        'info'        => esc_html__('Just put numeric value only. Like : 767. Don\'t use px or any other units.', 'ailsa'),
      ),
      array(
        'id'          => 'social_links',
        'type'        => 'textarea',
        'title'       => esc_html__('Social Links', 'ailsa'),
        'shortcode'   => true,
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

    ),

  );

  // ------------------------------
  // Footer Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'footer_section',
    'title'    => esc_html__('Footer', 'ailsa'),
    'icon'     => 'fa fa-ellipsis-h',
    'sections' => array(

      // footer widgets
      array(
        'name'     => 'footer_widgets_tab',
        'title'    => esc_html__('Widget Area', 'ailsa'),
        'icon'     => 'fa fa-th',
        'fields'   => array(

          // Footer Widget Block
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Footer Widget Block', 'ailsa')
          ),
          array(
            'id'    => 'footer_widget_block',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Widget Block', 'ailsa'),
            'info' => esc_html__('If you turn this ON, then Goto : Appearance > Widgets. There you can see <strong>Footer Widget 1,2,3 or 4</strong> Widget Area, add your widgets there.', 'ailsa'),
            'default' => true,
          ),
          array(
            'id'      => 'footer_instafeed_block',
            'type'    => 'switcher',
            'title'   => esc_html__('Footer Instagram Feed', 'ailsa'),
            'default' => true,
            'info' => esc_html__('If you turn this ON, then Goto : Appearance > Widgets. you can see <strong>Footer Instagram Feed Block</strong> widget there.', 'ailsa'),
            'dependency'  => array('footer_widget_block', '==', true),
          ),
          array(
            'id'    => 'footer_widget_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Widget Layouts', 'ailsa'),
            'info' => esc_html__('Choose your footer widget layouts.', 'ailsa'),
            'default' => 1,
            'options' => array(
              1   => AILSA_CS_IMAGES . '/footer/footer-1.png',
              2   => AILSA_CS_IMAGES . '/footer/footer-2.png',
              3   => AILSA_CS_IMAGES . '/footer/footer-3.png',
              4   => AILSA_CS_IMAGES . '/footer/footer-4.png',
              5   => AILSA_CS_IMAGES . '/footer/footer-5.png',
              6   => AILSA_CS_IMAGES . '/footer/footer-6.png',
              7   => AILSA_CS_IMAGES . '/footer/footer-7.png',
              8   => AILSA_CS_IMAGES . '/footer/footer-8.png',
              9   => AILSA_CS_IMAGES . '/footer/footer-9.png',
            ),
            'radio'       => true,
            'dependency'  => array('footer_widget_block', '==', true),
          ),
          array(
            'id'         => 'footer_layout_bg',
            'type'       => 'background',
            'title'      => esc_html__('Widget Area Background', 'ailsa'),
            'dependency' => array('footer_widget_block', '==', true),
          ),
          array(
            'id'         => 'footer_bg_overlay_color',
            'type'       => 'color_picker',
            'title'      => esc_html__('Background Overlay Color', 'ailsa'),
            'rgba'       => true,
            'dependency' => array('footer_widget_block', '==', true),
          ),

        )
      ),

      // footer copyright
      array(
        'name'     => 'footer_copyright_tab',
        'title'    => esc_html__('Copyright Bar', 'ailsa'),
        'icon'     => 'fa fa-copyright',
        'fields'   => array(

          // Copyright
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Copyright Layout', 'ailsa'),
          ),
          array(
            'id'    => 'need_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Copyright Section', 'ailsa'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_copyright_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Select Copyright Layout', 'ailsa'),
            'info' => esc_html__('In above image, blue box is copyright text and yellow box is secondary text.', 'ailsa'),
            'default'      => 'copyright-1',
            'options'      => array(
              'copyright-1'    => AILSA_CS_IMAGES .'/footer/copyright-1.png',
              'copyright-2'    => AILSA_CS_IMAGES .'/footer/copyright-2.png',
              ),
            'radio'        => true,
            'dependency'     => array('need_copyright', '==', 'true'),
          ),
          array(
            'id'    => 'copyright_text',
            'type'  => 'textarea',
            'title' => esc_html__('Copyright Text', 'ailsa'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', 'true'),
            'after'       => 'Helpful shortcodes: [vt_current_year] [vt_home_url] or any shortcode.',
          ),

          // Copyright Another Text
          array(
            'type'       => 'notice',
            'class'      => 'warning cs-vt-heading',
            'content'    => esc_html__('Copyright Secondary Text', 'ailsa'),
            'dependency' => array('need_copyright', '==', 'true'),
          ),
          array(
            'id'         => 'secondary_text',
            'type'       => 'textarea',
            'title'      => esc_html__('Secondary Text', 'ailsa'),
            'shortcode'  => true,
            'dependency' => array('need_copyright', '==', 'true'),
          ),
        )
      ),

    ),
  );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => esc_html__('Design', 'ailsa'),
    'icon'   => 'fa fa-magic'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors', 'ailsa'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'ailsa'),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => __('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer.
          <br /><br />Highly customizable colors are in <strong>Appearance > Customize</strong>', 'ailsa'),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'ailsa'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => esc_html__('Title', 'ailsa'),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => esc_html__('Selector', 'ailsa'),
            'info'           => esc_html__('Enter css selectors like : <strong>body, .custom-class</strong>', 'ailsa'),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => esc_html__('Font Family', 'ailsa'),
          ),
          array(
            'id'              => 'size',
            'type'            => 'text',
            'title'           => esc_html__('Font Size', 'ailsa'),
          ),
          array(
            'id'              => 'line_height',
            'type'            => 'text',
            'title'           => esc_html__('Line-Height', 'ailsa'),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'ailsa'),
          ),
        ),
        'button_title'        => esc_html__('Add New Typography', 'ailsa'),
        'accordion_title'     => esc_html__('New Typography', 'ailsa'),
        'default'             => array(
          array(
            'title'           => esc_html__('Body Typography', 'ailsa'),
            'selector'        => 'body, .aisa-relatedpost .aisa-shortdetails h4 a, .aisa-content .aisa-commentbox h5,.aisa-comments-area .aisa-comments-meta h4, .aisa-content .aisa-relatedpost h3, .aisa-widget .mc4wp-form input[type="email"], .aisa-widget .mc4wp-form input[type="text"], .error404 .error-content h1',
            'font'            => array(
              'family'        => 'Lato',
              'variant'       => 'regular',
            ),
            'size'            => '15px',
          ),
          array(
            'title'           => esc_html__('Logo Typography', 'ailsa'),
            'selector'        => '.aisa-logo a:link, .aisa-logo a:active, .aisa-logo a:visited',
            'font'            => array(
              'family'        => 'Josefin Sans',
              'variant'       => 'regular',
            ),
            'size'            => '90px',
            'line_height'     => '68px',
          ),
          array(
            'title'           => esc_html__('Menu Typography', 'ailsa'),
            'selector'        => '.aisa-mainmenu ul li a, .slicknav_nav li a',
            'font'            => array(
              'family'        => 'Lato',
              'variant'       => '700',
            ),
            'size'            => '11px',
          ),
          array(
            'title'           => esc_html__('Sub Menu Typography', 'ailsa'),
            'selector'        => '.aisa-mainmenu ul li ul li a:link, .aisa-mainmenu ul li ul li a:active, .aisa-mainmenu ul li ul li a:visited',
            'font'            => array(
              'family'        => 'Lato',
              'variant'       => '700',
            ),
            'size'            => '11px',
          ),
          array(
            'title'           => esc_html__('Headings Typography', 'ailsa'),
            'selector'        => '.aisa-slogan span, .aisa-content h1, .aisa-content h2, .aisa-content h3, .aisa-content h4, .aisa-content h5, .aisa-content h6,.comment-wrapper h4,.page-title,.aisa-containerWrap .aisa-content-area h1,.aisa-containerWrap .aisa-content-area h2,.aisa-containerWrap .aisa-content-area h3,.aisa-containerWrap .aisa-content-area h4,.aisa-containerWrap .aisa-content-area h5,.aisa-containerWrap .aisa-content-area h6,.aisa-author h5,.aisa-aside .aisa-sidebar .aisa-widget .mc4wp-form input [type= "email " ],.aisa-containerWrap .aisa-excerpt h1,.aisa-containerWrap .aisa-excerpt h1 a,.aisa-containerWrap .aisa-excerpt h1.post-title,.aisa-containerWrap .aisa-excerpt h3,.aisa-containerWrap .aisa-excerpt h3 a:link,.aisa-containerWrap .aisa-excerpt h3 a:active,.aisa-containerWrap .aisa-excerpt h3 a:visited,.aisa-sliderBox .aisa-postdetails .box h3 a,blockquote,.aisa-title-area .page-title,.featured-image.aisa-theme-carousel .owl-nav,.aisa-comments-area .aisa-comments-meta .wp-link-pages,.aisa-blog-widget,.aisa-sidebar .aisa-widget.aisa-recent-blog .widget-bdate,.aisa-categoryBar,.aisa-containerWrap .aisa-content-area h4',
            'font'            => array(
              'family'        => 'Playfair Display',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Elements Typography', 'ailsa'),
            'selector'        => '.page-numbers li span, .page-numbers li a, strong,.taglist a, .aisa-categoryBar mark,mark.dark,.aisa-slogan,.aisa-aside .aisa-sidebar .aisa-widget h2,.aisa-contentCol .wp-pagenavi a, .aisa-contentCol .wp-pagenavi span,.aisa-pagination a,.aisa-categoryBar mark,.taglist a,.aisa-btn,input[type="submit"],input[type="button"], .aisa-containerWrap .aisa-readmore a:link, .aisa-containerWrap .aisa-readmore a:active, .aisa-containerWrap .aisa-readmore a:visited, .aisa-footerWrap .aisa-widget h2, .aisa-sidebar .aisa-widget h2, .aisa-aside .aisa-sidebar .aisa-widget .mc4wp-form input[type="submit"],h3.comments-title, pre, .aisa-carousel.aisa-post-slider-one li .aisa-posttitlebar h3 a,.aisa-contact label,.wpcf7-form label,.aisa-content .aisa-commentbox h5,.aisa-content .aisa-relatedpost h3,.aisa-comments-area .aisa-comments-meta h4,.aisa-relatedpost .aisa-shortdetails h4 a,.aisa-comments-area .aisa-comments-meta .comments-reply,h3.comment-reply-title',
            'font'            => array(
              'family'        => 'Lato',
              'variant'       => 'regular',
            ),
          ),

          array(
            'title'           => esc_html__('Example Usage', 'ailsa'),
            'selector'        => '.your-custom-class',
            'font'            => array(
              'family'        => 'Lato',
              'variant'       => 'regular',
            ),
          ),

        ),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => esc_html__('Subsets', 'ailsa'),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => esc_html__('Font Weights', 'ailsa'),
        'class'               => 'chosen',
        'options'             => array(
          '100'   => 'Thin 100',
          '100i'  => 'Thin 100 Italic',
          '200'   => 'Extra Light 200',
          '200i'  => 'Extra Light 200 Italic',
          '300'   => 'Light 300',
          '300i'  => 'Light 300 Italic',
          '400'   => 'Regular 400',
          '400i'  => 'Regular 400 Italic',
          '500'   => 'Medium 500',
          '500i'  => 'Medium 500 Italic',
          '600'   => 'Semi Bold 600',
          '600i'  => 'Semi Bold 600 Italic',
          '700'   => 'Bold 700',
          '700i'  => 'Bold 700 Italic',
          '800'   => 'Extra Bold 800',
          '800i'  => 'Extra Bold 800 Italic',
          '900'   => 'Black 900',
          '900i'  => 'Black 900 Italic',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Font Weight',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '400' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => esc_html__('Upload Custom Fonts', 'ailsa'),
        'button_title'       => esc_html__('Add New Custom Font', 'ailsa'),
        'accordion_title'    => esc_html__('Adding New Font', 'ailsa'),
        'accordion'          => true,
        'desc'               => 'It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!',
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => esc_html__('Font-Family Name', 'ailsa'),
            'attributes'     => array(
              'placeholder'  => 'for eg. Arial'
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => 'Upload .ttf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.ttf</i>',
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => 'Upload .eot <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.eot</i>',
            ),
          ),

          array(
            'id'             => 'svg',
            'type'           => 'upload',
            'title'          => 'Upload .svg <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.svg</i>',
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => 'Upload .otf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.otf</i>',
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => 'Upload .woff <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.woff</i>',
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => 'Extra CSS Style <small><i>(optional)</i></small>',
            'attributes'     => array(
              'placeholder'  => 'for eg. font-weight: normal;'
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => esc_html__('Pages', 'ailsa'),
    'icon'   => 'fa fa-files-o'
  );

  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => esc_html__('Blog', 'ailsa'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => esc_html__('General', 'ailsa'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Layout
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Layout', 'ailsa')
          ),
          array(
            'id'             => 'blog_listing_style',
            'type'           => 'select',
            'title'          => esc_html__('Blog Listing Style', 'ailsa'),
            'options'        => array(
              'style-one'    => esc_html__('Grid', 'ailsa'),
              'style-two'    => esc_html__('List', 'ailsa'),
            ),
            'default_option' => 'Select blog style',
            'info'           => esc_html__('Default option : Grid', 'ailsa'),
            'help'           => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author. If this settings will not apply your blog page, please set that page as a post page in Settings > Readings.', 'ailsa'),
          ),
          array(
            'id'             => 'blog_listing_columns',
            'type'           => 'select',
            'title'          => esc_html__('Blog Listing Columns', 'ailsa'),
            'options'        => array(
              'aisa-blog-col-1' => esc_html__('Column One', 'ailsa'),
              'aisa-blog-col-2' => esc_html__('Column Two', 'ailsa'),
              'aisa-blog-col-3' => esc_html__('Column Three', 'ailsa')
            ),
            'default_option' => 'Select blog column',
            'dependency'     => array('blog_listing_style', '!=', 'style-two'),
            'info'           => esc_html__('Default option : Column One', 'ailsa'),
          ),
          array(
            'id'             => 'blog_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'ailsa'),
            'options'        => array(
              'sidebar-right'=> esc_html__('Right', 'ailsa'),
              'sidebar-left' => esc_html__('Left', 'ailsa'),
              'sidebar-hide' => esc_html__('Hide', 'ailsa'),
            ),
            'default_option' => 'Select sidebar position',
            'help'           => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'ailsa'),
            'info'           => esc_html__('Default option : Right', 'ailsa'),
          ),
          array(
            'id'             => 'blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'ailsa'),
            'options'        => ailsa_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'ailsa'),
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
            'info'           => esc_html__('Default option : Main Widget Area', 'ailsa'),
          ),
          array(
            'id'             => 'blog_pagination_style',
            'type'           => 'select',
            'title'          => esc_html__('Blog Pagination Style', 'ailsa'),
            'options'        => array(
              'pagination_default'=> esc_html__('Default', 'ailsa'),
              'pagination_number' => esc_html__('Numbers', 'ailsa'),
            ),
            'default_option' => 'Select pagination style',
            'help'           => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'ailsa'),
            'info'           => esc_html__('Default option : Default', 'ailsa'),
          ),
          array(
            'id'      => 'blog_dummy_image',
            'type'    => 'switcher',
            'title'   => esc_html__('Disable Dummy Images', 'ailsa'),
            'info'    => esc_html__('If you don\'t want dummy images, please turn this ON.', 'ailsa'),
            'default' => false,
          ),
          array(
            'id'      => 'blog_read_more_option',
            'type'    => 'switcher',
            'title'   => esc_html__('Read More', 'ailsa'),
            'info'    => esc_html__('If need to hide read more option on blog page, please turn this OFF.', 'ailsa'),
            'default' => true,
          ),
          array(
            'id'      => 'blog_share_option',
            'type'    => 'switcher',
            'title'   => esc_html__('Share Option', 'ailsa'),
            'info'    => esc_html__('If need to hide share option on blog page, please turn this OFF.', 'ailsa'),
            'default' => true,
          ),
          array(
            'id'      => 'blog_popup_option',
            'type'    => 'switcher',
            'title'   => esc_html__('Popup Option', 'ailsa'),
            'info'    => esc_html__('If need to disable image popup on blog page, please turn this OFF.', 'ailsa'),
            'default' => true,
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__('Meta\'s to hide', 'ailsa'),
            'info'    => esc_html__('Check items you want to hide from blog meta field.', 'ailsa'),
            'class'   => 'horizontal',
            'options' => array(
              'category'   => esc_html__('Category', 'ailsa'),
              'date'       => esc_html__('Date', 'ailsa'),
              'author'     => esc_html__('Author', 'ailsa'),
              'comments'   => esc_html__('Comments', 'ailsa'),
            ),
          ),

          // Layout

          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Global Options', 'ailsa')
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => esc_html__('Exclude Categories', 'ailsa'),
            'info'       => esc_html__('Select categories you want to exclude from blog page.', 'ailsa'),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'ailsa'),
            'info'    => esc_html__('Blog short content length, in blog listing pages.', 'ailsa'),
            'default' => '55',
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => esc_html__('Single', 'ailsa'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable / Disable', 'ailsa')
          ),
          array(
            'id'      => 'single_featured_image',
            'type'    => 'switcher',
            'title'   => esc_html__('Featured Image/Gallery/Audio/Video', 'ailsa'),
            'info'    => esc_html__('If need to hide featured image from single blog page, please turn this OFF.', 'ailsa'),
            'default' => true,
          ),
          array(
            'id'      => 'single_popup_option',
            'type'    => 'switcher',
            'title'   => esc_html__('Popup Option', 'ailsa'),
            'info'    => esc_html__('If need to disable image popup on single blog page, please turn this OFF.', 'ailsa'),
            'default' => true,
          ),
          array(
            'id'      => 'single_author_info',
            'type'    => 'switcher',
            'title'   => esc_html__('Author Info', 'ailsa'),
            'info'    => esc_html__('If need to hide author info on single blog page, please turn this OFF.', 'ailsa'),
            'default' => true,
          ),
          array(
            'id'      => 'single_share_option',
            'type'    => 'switcher',
            'title'   => esc_html__('Share Option', 'ailsa'),
            'info'    => esc_html__('If need to hide share option on single blog page, please turn this OFF.', 'ailsa'),
            'default' => true,
          ),
          array(
            'id'      => 'single_related_posts',
            'type'    => 'switcher',
            'title'   => esc_html__('Related Posts Area', 'ailsa'),
            'info'    => esc_html__('If need to hide related post area on single blog page, please turn this OFF.', 'ailsa'),
            'default' => true,
          ),
          array(
            'id'      => 'single_comment_form',
            'type'    => 'switcher',
            'title'   => esc_html__('Comment Area/Form', 'ailsa'),
            'info'    => esc_html__('If need to hide comment area and that form on single blog page, please turn this OFF.', 'ailsa'),
            'default' => true,
          ),
          array(
            'id'      => 'single_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__('Meta\'s to hide', 'ailsa'),
            'info'    => esc_html__('Check items you want to hide from single blog page meta field.', 'ailsa'),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__('Category', 'ailsa'),
              'tag'       => esc_html__('Tags', 'ailsa'),
              'date'       => esc_html__('Date', 'ailsa'),
              'author'     => esc_html__('Author', 'ailsa'),
              'comments'   => esc_html__('Comments', 'ailsa'),
            ),
            // 'default' => '30',
          ),
          // End fields

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Sidebar', 'ailsa')
          ),
          array(
            'id'             => 'single_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'ailsa'),
            'options'        => array(
              'sidebar-right'=> esc_html__('Right', 'ailsa'),
              'sidebar-left' => esc_html__('Left', 'ailsa'),
              'sidebar-hide' => esc_html__('Hide', 'ailsa'),
            ),
            'default_option' => 'Select sidebar position',
            'info'           => esc_html__('Default option : Right', 'ailsa'),
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'ailsa'),
            'options'        => ailsa_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'ailsa'),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
            'info'           => esc_html__('Default option : Main Widget Area', 'ailsa'),
          ),
          // End fields

        )
      ),

    ),
  );

  // ------------------------------
  // Extra Pages
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_extra_pages',
    'title'    => esc_html__('Extra Pages', 'ailsa'),
    'icon'     => 'fa fa-clone',
    'sections' => array(

      // error 404 page
      array(
        'name'     => 'error_page_section',
        'title'    => esc_html__('404 Page', 'ailsa'),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start 404 Page
          array(
            'id'    => 'error_heading',
            'type'  => 'text',
            'title' => esc_html__('404 Page Heading', 'ailsa'),
            'info'  => esc_html__('Enter 404 page heading.', 'ailsa'),
          ),
          array(
            'id'        => 'error_page_content',
            'type'      => 'textarea',
            'title'     => esc_html__('404 Page Content', 'ailsa'),
            'info'      => esc_html__('Enter 404 page content.', 'ailsa'),
            'shortcode' => true,
          ),
          array(
            'id'    => 'error_btn_text',
            'type'  => 'text',
            'title' => esc_html__('Button Text', 'ailsa'),
            'info'  => esc_html__('Enter BACK TO HOME button text. If you want to change it.', 'ailsa'),
          ),
          // End 404 Page

        ) // end: fields
      ), // end: fields section

      // maintenance mode page
      array(
        'name'     => 'maintenance_mode_section',
        'title'    => esc_html__('Maintenance Mode', 'ailsa'),
        'icon'     => 'fa fa-hourglass-half',
        'fields'   => array(

          // Start Maintenance Mode
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : <strong>Maintenance Mode Page</strong>', 'ailsa')
          ),
          array(
            'id'             => 'enable_maintenance_mode',
            'type'           => 'switcher',
            'title'          => esc_html__('Maintenance Mode', 'ailsa'),
            'default'        => false,
          ),
          array(
            'id'             => 'maintenance_mode_page',
            'type'           => 'select',
            'title'          => esc_html__('Maintenance Mode Page', 'ailsa'),
            'options'        => 'pages',
            'default_option' => esc_html__('Select a page', 'ailsa'),
            'dependency'     => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_bg',
            'type'           => 'background',
            'title'          => esc_html__('Page Background', 'ailsa'),
            'dependency'     => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          // End Maintenance Mode

        ) // end: fields
      ), // end: fields section

    )
  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => esc_html__('Advanced', 'ailsa'),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => esc_html__('Misc', 'ailsa'),
    'icon'     => 'fa fa-recycle',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => esc_html__('Custom Sidebar', 'ailsa'),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => esc_html__('Sidebars', 'ailsa'),
            'desc'            => esc_html__('Go to Appearance -> Widgets after create sidebars', 'ailsa'),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => esc_html__('Sidebar Name', 'ailsa'),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => esc_html__('Custom Description', 'ailsa'),
              )
            ),
            'accordion'       => true,
            'button_title'    => esc_html__('Add New Sidebar', 'ailsa'),
            'accordion_title' => esc_html__('New Sidebar', 'ailsa'),
          ),
          // end fields

        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => esc_html__('Custom Codes', 'ailsa'),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(

          // Start Custom CSS/JS
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom CSS', 'ailsa')
          ),
          array(
            'id'             => 'theme_custom_css',
            'type'           => 'textarea',
            'attributes'     => array(
              'rows'         => 10,
              'placeholder'     => esc_html__('Enter your CSS code here...', 'ailsa'),
            ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom JS', 'ailsa')
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes'     => array(
              'rows'         => 10,
              'placeholder'  => esc_html__('Enter your JS code here...', 'ailsa'),
            ),
          ),
          // End Custom CSS/JS

        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => esc_html__('Translation', 'ailsa'),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(

          // Start Translation
          array(
            'type'        => 'notice',
            'class'       => 'info cs-vt-heading',
            'content'     => esc_html__('Common Texts', 'ailsa')
          ),
          array(
            'id'          => 'read_more_text',
            'type'        => 'text',
            'title'       => esc_html__('Read More Text', 'ailsa'),
          ),
          array(
            'id'          => 'comment_singular_text',
            'type'        => 'text',
            'title'       => esc_html__('Comment Singular Text', 'ailsa'),
          ),
          array(
            'id'          => 'comment_plural_text',
            'type'        => 'text',
            'title'       => esc_html__('Comment Plural Text', 'ailsa'),
          ),
          array(
            'id'          => 'no_comments_text',
            'type'        => 'text',
            'title'       => esc_html__('No Comments Text', 'ailsa'),
          ),
          array(
            'id'          => 'share_text',
            'type'        => 'text',
            'title'       => esc_html__('Share Text', 'ailsa'),
          ),
          array(
            'id'          => 'share_on_text',
            'type'        => 'text',
            'title'       => esc_html__('Share On Tooltip Text', 'ailsa'),
          ),
          array(
            'id'          => 'related_posts_title_text',
            'type'        => 'text',
            'title'       => esc_html__('Related Posts Section Title Text', 'ailsa'),
          ),

          array(
            'type'        => 'notice',
            'class'       => 'info cs-vt-heading',
            'content'     => esc_html__('Comment Area/Form', 'ailsa')
          ),
          array(
            'id'          => 'comment_form_title_text',
            'type'        => 'text',
            'title'       => esc_html__('Title Reply Text', 'ailsa'),
          ),
          array(
            'id'          => 'comment_form_reply_to_text',
            'type'        => 'text',
            'title'       => esc_html__('Title Reply To Text', 'ailsa'),
          ),
          array(
            'id'          => 'comment_form_subtitle_text',
            'type'        => 'text',
            'title'       => esc_html__('Before Comment Note Text', 'ailsa'),
          ),
          array(
            'id'          => 'comment_field_label',
            'type'        => 'text',
            'title'       => esc_html__('Comment Field Label', 'ailsa'),
          ),
          array(
            'id'          => 'name_field_label',
            'type'        => 'text',
            'title'       => esc_html__('Name Field Label', 'ailsa'),
          ),
          array(
            'id'          => 'email_field_label',
            'type'        => 'text',
            'title'       => esc_html__('Email Field Label', 'ailsa'),
          ),
          array(
            'id'          => 'url_field_label',
            'type'        => 'text',
            'title'       => esc_html__('URL Field Label', 'ailsa'),
          ),
          array(
            'id'          => 'reply_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Reply Text [Reply Button]', 'ailsa'),
          ),
          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Post Comment Text [Submit Button]', 'ailsa'),
          ),
          array(
            'type'        => 'notice',
            'class'       => 'info cs-vt-heading',
            'content'     => esc_html__('Blog Pagination', 'ailsa')
          ),
          array(
            'id'          => 'older_post',
            'type'        => 'text',
            'title'       => esc_html__('Older Posts Text', 'ailsa'),
          ),
          array(
            'id'          => 'newer_post',
            'type'        => 'text',
            'title'       => esc_html__('Newer Posts Text', 'ailsa'),
          ),

          array(
            'type'        => 'notice',
            'class'       => 'info cs-vt-heading',
            'content'     => esc_html__('Single Pagination', 'ailsa')
          ),
          array(
            'id'          => 'previous_post',
            'type'        => 'text',
            'title'       => esc_html__('Previous Post Text', 'ailsa'),
          ),
          array(
            'id'          => 'next_post',
            'type'        => 'text',
            'title'       => esc_html__('Next Post Text', 'ailsa'),
          ),

          array(
            'type'        => 'notice',
            'class'       => 'info cs-vt-heading',
            'content'     => esc_html__('Comment Pagination', 'ailsa')
          ),
          array(
            'id'          => 'previous_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Previous Comment Text', 'ailsa'),
          ),
          array(
            'id'          => 'next_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Next Comment Text', 'ailsa'),
          ),
          // End Translation
        ) // end: fields
      ),

    ),
  );

  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => esc_html__('Backup', 'ailsa'),
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'ailsa'),
      ),

      array(
        'type'    => 'backup',
      ),

    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'ailsa_framework_options' );