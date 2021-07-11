<?php
/**
 * Plugin recomendations
 **/
$carrie_theme_options = carrie_get_theme_options();

require_once(get_template_directory().'/inc/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'carrie_register_required_plugins' );

function carrie_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        array(
            'name'                  => esc_html__('Carrie Custom Metaboxes', 'carrie'), // The plugin name
            'slug'                  => 'cmb2', // The plugin slug (typically the folder name)
            'source'                => get_template_directory() . '/inc/plugins/cmb2.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '2.7.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => esc_html__('Carrie Theme Addons', 'carrie'), // The plugin name
            'slug'                  => 'carrie-theme-addons', // The plugin slug (typically the folder name)
            'source'                => get_template_directory() . '/inc/plugins/carrie-theme-addons.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '2.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => esc_html__('Carrie Page Navigation', 'carrie'), // The plugin name
            'slug'                  => 'wp-pagenavi', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('Carrie Popups', 'carrie'), // The plugin name
            'slug'                  => 'icegram', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('Carrie Translation Manager', 'carrie'), // The plugin name
            'slug'                  => 'loco-translate', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('Revolution Slider', 'carrie'), // The plugin name
            'slug'                  => 'revslider', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/inc/plugins/revslider.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '6.3.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => esc_html__('Instagram Feed', 'carrie'), // The plugin name
            'slug'                  => 'instagram-feed', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('MailChimp for WordPress', 'carrie'), // The plugin name
            'slug'                  => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('WordPress LightBox', 'carrie'), // The plugin name
            'slug'                  => 'responsive-lightbox', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('Contact Form 7', 'carrie'), // The plugin name
            'slug'                  => 'contact-form-7', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('Regenerate Thumbnails', 'carrie'), // The plugin name
            'slug'                  => 'regenerate-thumbnails', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('WP Retina 2x', 'carrie'), // The plugin name
            'slug'                  => 'wp-retina-2x', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        )

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'            => 'carrie',           // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                          // Default absolute path to pre-packaged plugins
        'menu'              => 'install-required-plugins',  // Menu slug
        'has_notices'       => true,                        // Show admin notices or not
        'dismissable'  => true,
        'is_automatic'      => true,                       // Automatically activate plugins after installation or not
        'message'           => ''                          // Message to output right before the plugins table
    );

    tgmpa( $plugins, $config );

}

// Customisation Menu Links
class carrie_description_walker extends Walker_Nav_Menu{
      function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0 ){
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
           $class_names = $value = '';
           $classes = empty( $item->classes ) ? array() : (array) $item->classes;
           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

           $add_class = '';

           $post = get_post($item->object_id);

               $class_names = ' class="'.$add_class.' '. esc_attr( $class_names ) . '"';
               $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
               $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
               $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
               $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

                    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

                if (is_object($args)) {
                    $item_output = $args->before;
                    $item_output .= '<a'. $attributes .'>';
                    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
                    $item_output .= $args->link_after;
                    if($item->description !== '') {
                        $item_output .= '<span>'.$item->description.'</span>';
                    }

                    $item_output .= '</a>';
                    $item_output .= $args->after;
                    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

                }
     }
}

function carrie_google_fonts_url() {

    $carrie_theme_options = carrie_get_theme_options();

    $font_url = '';
    $font_header = '';
    $font_body = '';
    $font_additional = '';

    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['header_font']) ) {
      $carrie_theme_options['header_font']['font-family'] = $_GET['header_font'];
    }
    if ( defined('DEMO_MODE') && isset($_GET['body_font']) ) {
      $carrie_theme_options['body_font']['font-family'] = $_GET['body_font'];
    }
    if ( defined('DEMO_MODE') && isset($_GET['additional_font']) ) {
      $carrie_theme_options['additional_font']['font-family'] = $_GET['additional_font'];
    }

    if(!isset($carrie_theme_options['font_google_disable']) || $carrie_theme_options['font_google_disable'] == false) {

        // Header font
        if(isset($carrie_theme_options['header_font'])) {
            $font_header = $carrie_theme_options['header_font']['font-family'];

            if(isset($carrie_theme_options['header_font_options'])) {
                $font_header = $font_header.':'.$carrie_theme_options['header_font_options'];
            }
        }
        // Body font
        if(isset($carrie_theme_options['body_font'])) {
            $font_body = '|'.$carrie_theme_options['body_font']['font-family'];

            if(isset($carrie_theme_options['body_font_options'])) {
                $font_body = $font_body.':'.$carrie_theme_options['body_font_options'];
            }
        }
        // Additional font
        if(isset($carrie_theme_options['additional_font_enable']) && $carrie_theme_options['additional_font_enable']) {
            if(isset($carrie_theme_options['additional_font'])) {
                $font_additional = '|'.$carrie_theme_options['additional_font']['font-family'].'|';
            }
        }

        // Build Google Fonts request
        $font_url = add_query_arg( 'family', urlencode( $font_header.$font_body.$font_additional ), "//fonts.googleapis.com/css" );

    }

    return $font_url;
}

// Custom layout functions
function carrie_header_promo_show() {
    $carrie_theme_options = carrie_get_theme_options();

    echo '<div class="header-promo-content">'.do_shortcode($carrie_theme_options['header_banner_editor']).'</div>'; // This is safe place and we can't use wp_kses_post or other esc_ functions here because this is ads area where user may use Google Adsense and other Java Script banners code with <script> inside.
}

// Header mini post
function carrie_header_post_show() {
    $carrie_theme_options = carrie_get_theme_options();

    $header_post_html = '';

    if(isset($carrie_theme_options['header_post_id']) && $carrie_theme_options['header_post_id']<>'') {

      $header_post_id = $carrie_theme_options['header_post_id'];

      $header_post = get_post($header_post_id);

      if($header_post) {
        if(has_post_thumbnail( $header_post_id )) {

          $header_post_thumb_id = get_post_thumbnail_id($header_post_id);

          $header_post_image_url = wp_get_attachment_image_src( $header_post_thumb_id, 'carrie-blog-thumb-widget');

          $header_post_image = '<a href="'.get_permalink($header_post_id).'"><img src="'.esc_url($header_post_image_url[0]).'" alt="'.esc_attr($header_post->post_title).'"/></a>';

        } else {

          $header_post_image = '';

        }

        $header_post_categories_list = get_the_category_list(', ', 0, $header_post_id);

        $header_post_html .= '<div class="header-post-image hover-effect-img">'.wp_kses_post($header_post_image).'</div>';
        $header_post_html .= '<div class="header-post-details">';
        $header_post_html .= '<div class="header-post-category">'.wp_kses_post($header_post_categories_list).'</div>';
        $header_post_html .= '<div class="header-post-title"><a href="'.get_permalink($header_post_id).'">'.wp_kses_post($header_post->post_title).'</a></div>';
        $header_post_html .= '</div>';

        echo '<div class="header-post-content clearfix">'.wp_kses_post($header_post_html).'</div>';
      }

    }

}

function carrie_logo_show() {
    $carrie_theme_options = carrie_get_theme_options();
    ?>
    <div class="logo">
    <a class="logo-link" href="<?php echo  esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_header_image()); ?>" alt="<?php bloginfo('name'); ?>" class="regular-logo"><img src="<?php if ( get_theme_mod( 'carrie_header_transparent_logo' ) ) { echo esc_url( get_theme_mod( 'carrie_header_transparent_logo' )); } else { echo esc_url(get_header_image()); }  ?>" alt="<?php bloginfo('name'); ?>" class="light-logo"></a>
    <?php if(get_bloginfo('description')!=='') {
      echo '<div class="header-blog-info">';
      if(isset($carrie_theme_options['disable_header_tagline']) && !$carrie_theme_options['disable_header_tagline']) {
        bloginfo('description');
      }
      echo '</div>';
    }
    ?>
    </div>
    <?php
}

function carrie_menu_below_header_show() {
    $carrie_theme_options = carrie_get_theme_options();

    // MainMenu styles
    $menu_add_class = '';

    if(isset($carrie_theme_options['header_menu_font_decoration'])) {
        $menu_add_class .= ' mainmenu-'.esc_html($carrie_theme_options['header_menu_font_decoration']);
    }
    if(isset($carrie_theme_options['header_menu_font_size'])) {
        $menu_add_class .= ' mainmenu-'.esc_html($carrie_theme_options['header_menu_font_size']);
    }
    if(isset($carrie_theme_options['header_menu_font_weight'])) {
        $menu_add_class .= ' mainmenu-'.esc_html($carrie_theme_options['header_menu_font_weight']);
    }
    if(isset($carrie_theme_options['header_menu_arrow_style'])) {
        $menu_add_class .= ' mainmenu-'.esc_html($carrie_theme_options['header_menu_arrow_style']);
    }

    // Center menu
    $menu_add_class .= ' menu-center';

    if(isset($carrie_theme_options['enable_sticky_header']) && $carrie_theme_options['enable_sticky_header']) {

      $menu_add_class .= ' sticky-header';

    }

    ?>

    <?php
    // Main Menu

    $menu = wp_nav_menu(
        array (
            'theme_location'  => 'primary',
            'echo' => FALSE,
            'fallback_cb'    => false,
        )
    );

    if (!empty($menu)):

    ?>
    <div class="mainmenu-belowheader<?php echo esc_attr($menu_add_class); ?> clearfix">
        <?php if(isset($carrie_theme_options['enable_sticky_header_logo']) && $carrie_theme_options['enable_sticky_header_logo']): ?>
        <div class="sticky-menu-logo">
            <a class="logo-link" href="<?php echo  esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_header_image()); ?>" alt="<?php bloginfo('name'); ?>"></a>
        </div>
        <?php endif; ?>
        <div id="navbar" class="navbar navbar-default clearfix">

          <div class="navbar-inner">
              <div class="container">

                  <div class="navbar-toggle" data-toggle="collapse" data-target=".collapse">
                    <?php esc_html_e( 'Menu', 'carrie' ); ?>
                  </div>
                  <div class="navbar-left-wrapper">

                  </div>
                  <div class="navbar-center-wrapper">
                  <?php

                     wp_nav_menu(array(
                      'theme_location'  => 'primary',
                      'container_class' => 'navbar-collapse collapse',
                      'menu_class'      => 'nav',
                      'fallback_cb'    => false,
                      'walker'          => new carrie_description_walker
                      ));

                  ?>
                  </div>
                  <div class="navbar-right-wrapper">

                  </div>
              </div>
          </div>

        </div>

    </div>
    <?php endif; ?>

    <?php
    // MainMenu Below header position END
}

function carrie_social_show($showtitles = false) {
    $carrie_theme_options = carrie_get_theme_options();

    $social_services_arr['facebook'] = 'Facebook';
    $social_services_arr['vk'] = 'VKontakte';
    $social_services_arr['twitter'] = 'Twitter';
    $social_services_arr['google-plus'] = 'Google+';
    $social_services_arr['linkedin'] = 'LinkedIn';
    $social_services_arr['dribbble'] = 'Dribbble';
    $social_services_arr['behance'] = 'Behance';
    $social_services_arr['instagram'] = 'Instagram';
    $social_services_arr['tumblr'] = 'Tumblr';
    $social_services_arr['pinterest'] = 'Pinterest';
    $social_services_arr['vimeo-square'] = 'Vimeo';
    $social_services_arr['youtube'] = 'YouTube';
    $social_services_arr['skype'] = 'Skype';
    $social_services_arr['flickr'] = 'Flickr';
    $social_services_arr['rss'] = 'RSS';
    $social_services_arr['deviantart'] = 'Deviantart';
    $social_services_arr['500px'] = '500px';
    $social_services_arr['etsy'] = 'Etsy';
    $social_services_arr['telegram'] = 'Telegram';
    $social_services_arr['odnoklassniki'] = 'Odnoklassniki';
    $social_services_arr['houzz'] = 'Houzz';
    $social_services_arr['slack'] = 'Slack';
    $social_services_arr['qq'] = 'QQ';

    $s_count = 0;

    $social_services_html = '';

    foreach( $social_services_arr as $ss_data => $ss_value ){
      if(isset($carrie_theme_options[$ss_data]) && (trim($carrie_theme_options[$ss_data])) <> '') {
        $s_count++;
        $social_service_url = $carrie_theme_options[$ss_data];
        $social_service = $ss_data;

        if($showtitles) {
            $social_title = '<span>'.$ss_value.'</span>';
        } else {
            $social_title = '';
        }

        $social_services_html .= '<a href="'.esc_url($social_service_url).'" target="_blank" class="a-'.esc_attr($social_service).'"><i class="fa fa-'.esc_attr($social_service).'"></i>'.wp_kses_post($social_title).'</a>';
      }
    }

    if($social_services_html <> '') {
      echo wp_kses_post('<div class="social-icons-wrapper">'.$social_services_html.'</div>');
    }
}

function carrie_top_show() {
    $carrie_theme_options = carrie_get_theme_options();
    ?>
    <?php if(isset($carrie_theme_options['disable_top_menu']) && !$carrie_theme_options['disable_top_menu']): ?>
    <?php
    $header_add_class = '';

    if(isset($carrie_theme_options['header_top_menu_style'])) {
      $header_top_menu_style = $carrie_theme_options['header_top_menu_style'];
      $header_add_class .= ' '.esc_attr($header_top_menu_style);
    }

    ?>
    <div class="header-menu-bg<?php echo esc_attr($header_add_class); ?>">
      <div class="header-menu">
        <div class="container">
          <div class="row">
              <div class="col-md-6">
              <?php
              // Offcanvas menu toggle
              $carrie_theme_options['enable_offcanvas_sidebar'] = false;

              if(isset($carrie_theme_options['enable_offcanvas_sidebar'])&&($carrie_theme_options['enable_offcanvas_sidebar'])):
              ?>
              <div class="header-menu-offcanvasmenu" id="st-sidebar-trigger-effects"><a class="float-sidebar-toggle-btn" data-effect="st-sidebar-effect-2"><i class="fa fa-align-left"></i></a></div>
              <?php endif; ?>
              <div class="menu-top-menu-container-toggle"></div>
              <?php
              wp_nav_menu(array(
                'theme_location'  => 'top',
                'menu_class'      => 'links',
                'fallback_cb'    => false,
                ));
              ?>
            </div>
            <div class="col-md-6">

                <?php

                $social_services_arr = Array("facebook", "vk","twitter", "google-plus", "linkedin", "dribbble", "behance", "instagram", "tumblr", "pinterest", "vimeo-square", "youtube", "skype", "flickr", "rss", "deviantart", "500px", "etsy", "telegram", "odnoklassniki", "houzz", "slack", "qq");

                $s_count = 0;

                $social_services_html = '';

                foreach( $social_services_arr as $ss_data ){
                  if(isset($carrie_theme_options[$ss_data]) && (trim($carrie_theme_options[$ss_data])) <> '') {
                    $s_count++;
                    $social_service_url = $carrie_theme_options[$ss_data];
                    $social_service = $ss_data;
                    $social_services_html .= '<a href="'.esc_url($social_service_url).'" target="_blank" class="a-'.esc_attr($social_service).'"><i class="fa fa-'.esc_attr($social_service).'"></i></a>';
                  }
                }

                ?>

                 <?php
                // Header social icons
                if($social_services_html <> '') {
                  echo '<div class="header-info-text"><span>'.esc_html__('Follow us', 'carrie').'</span> '.$social_services_html.'</div>';
                }
                ?>

                <?php // Demo settings
                if ( defined('DEMO_MODE') && isset($_GET['enable_offcanvas_sidebar']) ) {
                  $carrie_theme_options['enable_offcanvas_sidebar'] = $_GET['enable_offcanvas_sidebar'];
                }
                ?>

                <?php
                // Search toggle
                if(isset($carrie_theme_options['disable_top_menu_search']) && !$carrie_theme_options['disable_top_menu_search']):?>
                <div class="header-menu-search"><a class="search-toggle-btn"><i class="fa fa-search" aria-hidden="true"></i></a></div>
                <?php endif; ?>


            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif;
}

function carrie_header_left_show() {
    $carrie_theme_options = carrie_get_theme_options();

    // Show header banner
    if((isset($carrie_theme_options['header_banner_editor'])) && ($carrie_theme_options['header_banner_editor'] <> '') && (isset($carrie_theme_options['header_banner_position'])) && ($carrie_theme_options['header_banner_position'] == 'left')){
        carrie_header_promo_show();
    }

    // Show header logo
    if((isset($carrie_theme_options['header_logo_position'])) && ($carrie_theme_options['header_logo_position'] == 'left')) {
        carrie_logo_show();
    }

    // Show header post
    if((isset($carrie_theme_options['header_post_position'])) && ($carrie_theme_options['header_post_position'] == 'left')) {
        carrie_header_post_show();
    }

}

function carrie_header_center_show() {
    $carrie_theme_options = carrie_get_theme_options();

    // Show header banner
    if((isset($carrie_theme_options['header_banner_editor'])) && ($carrie_theme_options['header_banner_editor'] <> '') && (isset($carrie_theme_options['header_banner_position'])) && ($carrie_theme_options['header_banner_position'] == 'center')){
        carrie_header_promo_show();
    }

    // Show header logo
    if((isset($carrie_theme_options['header_logo_position'])) && ($carrie_theme_options['header_logo_position'] == 'center')) {
        carrie_logo_show();
    }

    // Show header post
    if((isset($carrie_theme_options['header_post_position'])) && ($carrie_theme_options['header_post_position'] == 'center')) {
        carrie_header_post_show();
    }

}

function carrie_header_right_show() {
    $carrie_theme_options = carrie_get_theme_options();

    // Show header logo
    if((isset($carrie_theme_options['header_logo_position'])) && ($carrie_theme_options['header_logo_position'] == 'right')) {
        carrie_logo_show();
    }

    // Show header banner
    if((isset($carrie_theme_options['header_banner_editor'])) && ($carrie_theme_options['header_banner_editor'] <> '') && (isset($carrie_theme_options['header_banner_position'])) && ($carrie_theme_options['header_banner_position'] == 'right')){
        carrie_header_promo_show();
    }

    // Show header post
    if((isset($carrie_theme_options['header_post_position'])) && ($carrie_theme_options['header_post_position'] == 'right')) {
        carrie_header_post_show();
    }

    ?>
<?php
}

/* Homepage Featured Posts Slider */
function carrie_blog_slider_show() {

    $carrie_theme_options = carrie_get_theme_options();

    // Revolution slider
    if(isset($carrie_theme_options['blog_enable_revolution_slider']) && $carrie_theme_options['blog_enable_revolution_slider']) {
      echo '<div class="carrie-revolution-slider">'.do_shortcode("[rev_slider alias='BLOG_SLIDER']").'</div>';
    } else {
    // Theme slider
      // Demo settings
      if ( defined('DEMO_MODE') && isset($_GET['blog_homepage_slider_fullwidth']) ) {
        if($_GET['blog_homepage_slider_fullwidth'] == 1) {
          $carrie_theme_options['blog_homepage_slider_fullwidth'] = 1;
        }
        if($_GET['blog_homepage_slider_fullwidth'] == 0) {
          $carrie_theme_options['blog_homepage_slider_fullwidth'] = 0;
        }
      }

      if ( defined('DEMO_MODE') && isset($_GET['blog_homepage_slider_post_details_layout']) ) {
          $carrie_theme_options['blog_homepage_slider_post_details_layout'] = $_GET['blog_homepage_slider_post_details_layout'];
      }

      if ( defined('DEMO_MODE') && isset($_GET['blog_enable_homepage_merge_slider']) ) {
        if($_GET['blog_enable_homepage_merge_slider'] == 1) {
          $carrie_theme_options['blog_enable_homepage_merge_slider'] = true;
        }
        if($_GET['blog_enable_homepage_merge_slider'] == 0) {
          $carrie_theme_options['blog_enable_homepage_merge_slider'] = false;
        }
      }

      if ( defined('DEMO_MODE') && isset($_GET['blog_enable_homepage_center_slide']) ) {
        if($_GET['blog_enable_homepage_center_slide'] == 1) {
          $carrie_theme_options['blog_enable_homepage_center_slide'] = true;
        }
        if($_GET['blog_enable_homepage_center_slide'] == 0) {
          $carrie_theme_options['blog_enable_homepage_center_slide'] = false;
        }
      }

      if ( defined('DEMO_MODE') && isset($_GET['blog_homepage_slider_items']) ) {
          $carrie_theme_options['blog_homepage_slider_items'] = $_GET['blog_homepage_slider_items'];
      }

      if ( defined('DEMO_MODE') && isset($_GET['blog_enable_readmore']) ) {
        if($_GET['blog_enable_readmore'] == 1) {
          $carrie_theme_options['blog_enable_readmore'] = true;
        }
        if($_GET['blog_enable_readmore'] == 0) {
          $carrie_theme_options['blog_enable_readmore'] = false;
        }
      }

      if ( defined('DEMO_MODE') && isset($_GET['blog_disable_homepage_slider_description']) ) {
        if($_GET['blog_disable_homepage_slider_description'] == 1) {
          $carrie_theme_options['blog_disable_homepage_slider_description'] = true;
        }
        if($_GET['blog_disable_homepage_slider_description'] == 0) {
          $carrie_theme_options['blog_disable_homepage_slider_description'] = false;
        }
      }

      $slider_style = 1;

      $posts_per_page = 100;

      $args = array(
          'posts_per_page'   => $posts_per_page,
          'orderby'          => 'date',
          'order'            => 'DESC',
          'meta_key'         => '_post_featured_value',
          'meta_value'         => 'on',
          'post_type'        => 'post',
          'post_status'      => 'publish',
          'suppress_filters' => 0
      );

      $posts = get_posts( $args );

      $total_posts = sizeof($posts);

      if($total_posts > 0) {

          if(isset($carrie_theme_options['blog_homepage_slider_autoplay'])) {
              $slider_autoplay = $carrie_theme_options['blog_homepage_slider_autoplay'];
          } else {
              $slider_autoplay = 3000;
          }

          if($slider_autoplay > 0) {
              $slider_autoplay_bool = 'true';
          } else {
              $slider_autoplay_bool = 'false';
          }

          if(isset($carrie_theme_options['blog_enable_homepage_center_slide']) && $carrie_theme_options['blog_enable_homepage_center_slide']) {
              $homepage_center_slide = 'true';
          } else {
              $homepage_center_slide = 'false';
          }

          if(isset($carrie_theme_options['blog_enable_homepage_merge_slider']) && $carrie_theme_options['blog_enable_homepage_merge_slider']) {
              $homepage_merge_slider = 'true';
          } else {
              $homepage_merge_slider = 'false';
          }

          if($slider_autoplay == 1) {
              $slider_autoplay_class = ' autoplay ';
          } else {
              $slider_autoplay_class = ' ';
          }

          if(isset($carrie_theme_options['blog_homepage_slider_navigation'])) {
              $slider_navigation = $carrie_theme_options['blog_homepage_slider_navigation'];
          } else {
              $slider_navigation = 1;
          }

          if(isset($carrie_theme_options['blog_homepage_slider_pagination'])) {
              $slider_pagination = $carrie_theme_options['blog_homepage_slider_pagination'];
          } else {
              $slider_pagination = 'false';
          }

          if($slider_navigation == 1) {
              $slider_navigation = 'true';
          } else {
              $slider_navigation = 'false';
          }

          if(isset($carrie_theme_options['blog_homepage_slider_post_details_layout']) && $carrie_theme_options['blog_homepage_slider_items'] == 1) {
              $post_details_layout = $carrie_theme_options['blog_homepage_slider_post_details_layout'];
          } else {
              $post_details_layout = 'horizontal';
          }

          echo '<div class="carrie-post-list-wrapper carrie-post-wrapper-style-'.esc_attr($slider_style).''.esc_attr($slider_autoplay_class).'clearfix">';

          echo '<div id="carrie-post-list" class="carrie-post-list carrie-post-style-'.$slider_style.'">';

          echo '<div class="owl-carousel">';

          $i = 0;
          $j = 0;

          foreach($posts as $post) {

              setup_postdata($post);

              $limit = 27;

              $excerpt = explode(' ', get_the_excerpt(), $limit);
              if (count($excerpt)>=$limit) {
                  array_pop($excerpt);
                  $excerpt = implode(" ",$excerpt).'...';
              } else {
                  $excerpt = implode(" ",$excerpt);
              }

              $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);

              if((isset($carrie_theme_options['blog_homepage_slider_fullwidth'])&&$carrie_theme_options['blog_homepage_slider_fullwidth'])) {
                  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
              } else {
                  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'carrie-blog-thumb');
              }

              if(has_post_thumbnail( $post->ID )) {
                  $image_bg ='background-image: url('.$image[0].');';
              }
              else {
                  $image_bg = '';
              }

              $categories_list = get_the_category_list(', ', 0, $post->ID); // This variable is Safe and does not need esc functions

              if($homepage_merge_slider == 'true') {
                  if($j == 0) {
                      $data_merge = 2;
                  }
                  if($j == 1) {
                      $data_merge = 1;
                  }
                  if($j == 2) {
                      $data_merge = 1;
                      $j = -1;
                  }
              } else {
                  $data_merge = 0;
              }

              $post_comments = get_comments_number($post->ID);

              if((isset($carrie_theme_options['blog_enable_readmore'])&&$carrie_theme_options['blog_enable_readmore'])) {
                $read_more_button_html = '<a class="btn btn-white" href="'.esc_url(get_permalink($post->ID)).'">'.esc_html__('Read more', 'carrie').'</a>';
              } else {
                $read_more_button_html = '';
              }

              $carrie_post_classes = ' carrie-post-layout-'.$post_details_layout;

              echo '<div class="carrie-post'.esc_attr($carrie_post_classes).' carrie-theme-block" data-merge="'.esc_attr($data_merge).'">';

              // Simple slider Layout
              if($slider_style == 1) {
                  echo '<div class="carrie-post-image" data-style="'.esc_attr($image_bg).'"><div class="carrie-post-image-wrapper">
                  <div class="carrie-post-details">
                      <div class="carrie-post-category">'.wp_kses_post($categories_list).'</div>
                      <div class="carrie-post-title"><a href="'.esc_url(get_permalink($post->ID)).'"><h2 class="lined">'.esc_html($post->post_title).'</h2></a></div>';

                      // Hide post description
                      if(isset($carrie_theme_options['blog_disable_homepage_slider_description']) && !$carrie_theme_options['blog_disable_homepage_slider_description']) {

                        echo '<div class="carrie-post-description">'.esc_html($excerpt).'</div>';

                      }

                      echo '<div class="carrie-post-date"><i class="fa fa-calendar" aria-hidden="true"></i>'.get_the_time( get_option( 'date_format' ), $post->ID ).'</div>
                      '.wp_kses_post($read_more_button_html).'
                  </div>
                  </div></div>';
              }

              echo '</div>';

              $i++;
              $j++;

          }

          wp_reset_postdata();


          echo '</div>';
          echo '</div>';

          echo '</div>';

          // Simple slider JS
          if($slider_style == 1) {
              // Slider items per row
              if(!isset($carrie_theme_options['blog_homepage_slider_items'])) {
                  $carrie_theme_options['blog_homepage_slider_items'] = 2;
              }

              $slider_slides = $carrie_theme_options['blog_homepage_slider_items'];

              wp_add_inline_script( 'carrie-script', '(function($){
              $(document).ready(function() {
                  "use strict";
                  var owlpostslider = $("#carrie-post-list .owl-carousel").owlCarousel({
                      loop: true,
                      items:'.esc_js($slider_slides).',
                      center:'.esc_js($homepage_center_slide ).',
                      merge:'.esc_js($homepage_merge_slider ).',
                      autoplay:'.esc_js($slider_autoplay_bool).',
                      autowidth: false,
                      autoplayTimeout:'.esc_js($slider_autoplay).',
                      autoplaySpeed: 1000,
                      navSpeed: 1000,
                      nav: '.esc_js($slider_navigation).',
                      dots: '.esc_js($slider_pagination).',
                      navText: false,
                      responsive: {
                          1199:{
                              items:'.esc_js($slider_slides).'
                          },
                          979:{
                              items:1
                          },
                          768:{
                              items:1
                          },
                          479:{
                              items:1
                          },
                          0:{
                              items:1
                          }
                      }
                  })

              });})(jQuery);');

              // Add slider pagination
              wp_add_inline_script( 'carrie-script', '(function($){
              "use strict";
              $(document).ready(function() { var slider_pagination_width = 100/$(".carrie-post-list .owl-item:not(.cloned)").length;

    $(".carrie-blog-posts-slider .carrie-post-list .owl-theme .owl-dots .owl-dot").css("width", slider_pagination_width+"%");});})(jQuery);');


          }

      }
    }

}
/* Editors pick footer block */
function carrie_blog_editorspick_posts_show() {

    $carrie_theme_options = carrie_get_theme_options();

    if(isset($carrie_theme_options['blog_homepage_editorspick_posts_layout'])) {
        $editorspick_posts_layout = $carrie_theme_options['blog_homepage_editorspick_posts_layout'];
    } else {
        $editorspick_posts_layout = 'masonry';
    }

    if(isset($carrie_theme_options['blog_homepage_editorspick_posts_limit'])) {
        $editorspick_posts_limit = $carrie_theme_options['blog_homepage_editorspick_posts_limit'];
    } else {
        $editorspick_posts_limit = 2;
    }

    if(isset($carrie_theme_options['blog_homepage_editorspick_posts_category'])) {
        $editorspick_posts_category = $carrie_theme_options['blog_homepage_editorspick_posts_category'];
    } else {
        $editorspick_posts_category = '';
    }

    if($editorspick_posts_limit == 2) {

        if($editorspick_posts_layout == 'masonry') {
            $posts_limit = 5;
        }
        if($editorspick_posts_layout == 'small') {
            $posts_limit = 8;
        }
        if($editorspick_posts_layout == 'large') {
            $posts_limit = 4;
        }

    } else {
        if($editorspick_posts_layout == 'masonry') {
            $posts_limit = 3;
        }
        if($editorspick_posts_layout == 'small') {
            $posts_limit = 4;
        }
        if($editorspick_posts_layout == 'large') {
            $posts_limit = 2;
        }
    }

    $args = array(
        'posts_per_page'   => $posts_limit,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'category_name'         => $editorspick_posts_category,
        'meta_key'         => '_post_editorpick_value',
        'meta_value'         => 'on',
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'suppress_filters' => 0
    );

    $posts = get_posts( $args );

    $total_posts = sizeof($posts);

    if($total_posts > 0) {

        echo '<div class="carrie-editorspick-post-list-wrapper carrie-theme-block clearfix">';

        if(isset($carrie_theme_options['blog_homepage_editorspick_posts_subtitle']) && $carrie_theme_options['blog_homepage_editorspick_posts_subtitle'] !== '') {
            echo '<h4>'.esc_html($carrie_theme_options['blog_homepage_editorspick_posts_subtitle']).'</h4>';
        }

        if(isset($carrie_theme_options['blog_homepage_editorspick_posts_title']) && $carrie_theme_options['blog_homepage_editorspick_posts_title'] !== '') {
            echo '<h2 class="lined">'.esc_html($carrie_theme_options['blog_homepage_editorspick_posts_title']).'</h2>';
        }

        echo '<div id="carrie-editorspick-post-list" class="carrie-editorspick-post-list">';
        echo '<div class="row carrie-editorspick-post-row">';

        $i = 0;

        foreach($posts as $post) {

            setup_postdata($post);

            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'carrie-blog-thumb');

            if(has_post_thumbnail( $post->ID )) {
                $image_bg ='background-image: url('.$image[0].');';
            }
            else {
                $image_bg = '';
            }

            $categories_list = get_the_category_list( ', ', 0, $post->ID );

            if($editorspick_posts_layout == 'masonry') {
                $i_divider = -1;
                $i_show_big = array(2);

                if($editorspick_posts_limit == 1) {
                  $i_show_big = array(1);
                }
            }
            if($editorspick_posts_layout == 'small') {
                $i_divider = 4;
                $i_show_big = array(-1);
            }
            if($editorspick_posts_layout == 'large') {
                $i_divider = 2;
                $i_show_big = array(0, 1, 2, 3, 4, 5);
            }

            if($i == $i_divider) {
                echo '</div><div class="row carrie-editorspick-post-row">';
            }

            // Masonry layout
            if(in_array($i, $i_show_big)) {

                $limit = 50;

                $excerpt = explode(' ', get_the_excerpt(), $limit);
                if (count($excerpt)>=$limit) {
                    array_pop($excerpt);
                    $excerpt = implode(" ",$excerpt).'...';
                } else {
                    $excerpt = implode(" ",$excerpt);
                }

                $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);

                // Big post without image
                if($editorspick_posts_layout !== 'masonry' || $editorspick_posts_limit == 1) {
                  echo '<div class="col-md-6">';
                } else {
                  if($i == 2) {
                    echo '<div class="col-md-6">';
                  }

                }

                echo '<div class="carrie-editorspick-post carrie-editorspick-post-large">';

                  if(has_post_thumbnail( $post->ID )) {

                    echo '<a href="'.esc_url(get_permalink($post->ID)).'"><div class="carrie-editorspick-post-image hover-effect-img" data-style="'.esc_attr($image_bg).'"></div></a>';
                  }

                  echo '<div class="carrie-editorspick-post-details">

                    <div class="carrie-editorspick-post-category">'.wp_kses_post($categories_list).'</div>
                    <div class="carrie-editorspick-post-title"><a href="'.esc_url(get_permalink($post->ID)).'"><h2>'.esc_html($post->post_title).'</h2></a></div>
                    <div class="carrie-editorspick-post-date"><i class="fa fa-calendar" aria-hidden="true"></i>'.get_the_time( get_option( 'date_format' ), $post->ID ).'</div>

                </div>';

                if($editorspick_posts_layout !== 'masonry' || $editorspick_posts_limit == 1) {
                  echo '</div>';
                } else {
                  if($i == 2) {
                    echo '</div>';
                  }

                }

                echo '</div>';

            } else {

                // Small post with image
                if($editorspick_posts_layout !== 'masonry' || $editorspick_posts_limit == 1) {
                  echo '<div class="col-md-3">';
                } else {
                  if($i == 0 || $i == 3) {
                    echo '<div class="col-md-3">';
                  }
                }

                echo '<div class="carrie-editorspick-post carrie-editorspick-post-small">';
                if(has_post_thumbnail( $post->ID )) {

                  echo '<a href="'.esc_url(get_permalink($post->ID)).'"><div class="carrie-editorspick-post-image hover-effect-img" data-style="'.esc_attr($image_bg).'"></div></a>
                <div class="carrie-editorspick-post-details">';
                }
                echo '<div class="carrie-editorspick-post-category">'.wp_kses_post($categories_list).'</div>
                    <div class="carrie-editorspick-post-title"><a href="'.esc_url(get_permalink($post->ID)).'"><h2>'.esc_html($post->post_title).'</h2></a></div>
                    <div class="carrie-editorspick-post-date"><i class="fa fa-calendar" aria-hidden="true"></i>'.get_the_time( get_option( 'date_format' ), $post->ID ).'</div>
                </div>';

                echo '</div>';

                if($editorspick_posts_layout !== 'masonry' || $editorspick_posts_limit == 1) {
                  echo '</div>';
                } else {
                  if($i == 1 || $i == 4) {
                    echo '</div>';
                  }

                }

            }

            $i++;

        }

        wp_reset_postdata();

        echo '</div>';
        echo '</div>';

        echo '</div>';
    }


}

/* Banner Block */
function carrie_banner_show($banner_id) {

    $carrie_theme_options = carrie_get_theme_options();

    $banner_option_name = 'banner_enable_'.$banner_id;
    $banner_content_name = 'banner_'.$banner_id.'_content';

    if(isset($carrie_theme_options[$banner_option_name]) && $carrie_theme_options[$banner_option_name]) {

        echo '<div class="carrie-ad-block carrie-ad-block-'.$banner_id.' clearfix">';
        echo do_shortcode($carrie_theme_options[$banner_content_name]); // This is safe place and we can't use wp_kses_post or other esc_ functions here because this is ads area where user may use Google Adsense and other Java Script banners code with <script> inside.

        echo '</div>';
    }

}

/* Homepage Welcome Block */
function carrie_welcome_block_show() {

    $carrie_theme_options = carrie_get_theme_options();

    if(isset($carrie_theme_options['blog_enable_homepage_welcome_block']) && $carrie_theme_options['blog_enable_homepage_welcome_block']) {

        echo '<div class="container">';

        echo '<div class="homepage-welcome-block carrie-theme-block">';
        echo '<div class="row">';

        echo '<div class="homepage-welcome-block-content clearfix">';

        if(isset($carrie_theme_options['blog_homepage_welcome_block_content'])) {
            echo do_shortcode(wp_kses_post($carrie_theme_options['blog_homepage_welcome_block_content']));
        }

        echo '</div>';


        echo '</div>';
        echo '</div>';

        echo '</div>';
    }

}
/* Homepage Popular Posts Slider */
function carrie_popularposts_slider_show() {

    $carrie_theme_options = carrie_get_theme_options();

    if(isset($carrie_theme_options['blog_enable_homepage_popular_slider']) && $carrie_theme_options['blog_enable_homepage_popular_slider']) {

        if(isset($carrie_theme_options['blog_homepage_popular_slider_limit'])) {
            $popular_posts_limit = $carrie_theme_options['blog_homepage_popular_slider_limit'];
        } else {
            $popular_posts_limit = 10;
        }

        if(isset($carrie_theme_options['blog_homepage_popular_slider_category'])) {
            $popular_posts_category = $carrie_theme_options['blog_homepage_popular_slider_category'];
        } else {
            $popular_posts_category = '';
        }

        $args = array(
            'posts_per_page'   => $popular_posts_limit,
            'order'            => 'DESC',
            'category_name'         => $popular_posts_category,
            'orderby' => 'meta_value',
            'meta_key'         => 'post_views_count',
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'suppress_filters' => 0
        );

        $posts = get_posts( $args );

        $total_posts = sizeof($posts);

        if($total_posts > 0) {

            echo '<div class="carrie-popular-post-list-wrapper clearfix container carrie-theme-block">';

            if(isset($carrie_theme_options['blog_homepage_popular_posts_subtitle']) && $carrie_theme_options['blog_homepage_popular_posts_subtitle'] !== '') {
                echo '<h4 class="lined">'.esc_html($carrie_theme_options['blog_homepage_popular_posts_subtitle']).'</h4>';
            }

            if(isset($carrie_theme_options['blog_homepage_popular_posts_title']) && $carrie_theme_options['blog_homepage_popular_posts_title'] !== '') {
                echo '<h2 class="lined">'.esc_html($carrie_theme_options['blog_homepage_popular_posts_title']).'</h2>';
            }

            echo '<div class="row clearfix">';
            echo '<div class="col-md-12">';
            echo '<div class="carrie-popular-post-list-nav">';
                echo '<div class="carrie-popular-post-list-nav-next">';
                echo '</div>';
                echo '<div class="carrie-popular-post-list-nav-prev">';
                echo '</div>';
            echo '</div>';
            echo '<div class="carrie-popular-post-list-content">';
            echo '<div class="carrie-popular-post-list-content-inner">';
            echo '<div id="carrie-popular-post-list" class="carrie-popular-post-list owl-carousel">';

            foreach($posts as $post) {

                setup_postdata($post);

                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'carrie-blog-thumb');

                if(has_post_thumbnail( $post->ID )) {
                    $image_bg ='background-image: url('.$image[0].');';
                    $post_class = '';
                }
                else {
                    $image_bg = '';
                    $post_class = ' carrie-popular-post-no-image';
                }

                $categories_list = get_the_category_list( ', ', 0, $post->ID );

                $post_comments = get_comments_number($post->ID);

                echo '<div class="carrie-popular-post'.esc_attr($post_class).'">';

                if(has_post_thumbnail( $post->ID )) {
                  echo '<a href="'.esc_url(get_permalink($post->ID)).'"><div class="carrie-popular-post-image hover-effect-img" data-style="'.esc_attr($image_bg).'"></div></a>';
                }

                echo '<div class="carrie-popular-post-details">
                    <div class="carrie-popular-post-category">'.wp_kses_post($categories_list).'</div>
                    <div class="carrie-popular-post-title"><a href="'.esc_url(get_permalink($post->ID)).'"><h5>'.esc_html($post->post_title).'</h5></a></div>
                    <div class="carrie-popular-post-date"><i class="fa fa-calendar" aria-hidden="true"></i>'.get_the_time( get_option( 'date_format' ), $post->ID ).'</div>
                </div>';

                echo '</div>';

            }

            wp_reset_postdata();

            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '</div>';

            $slider_slides = 4;

            if(isset($carrie_theme_options['blog_homepage_popular_slider_autoplay'])) {
                $slider_autoplay = $carrie_theme_options['blog_homepage_popular_slider_autoplay'];
            } else {
                $slider_autoplay = 3000;
            }

            if($slider_autoplay > 0) {
                $slider_autoplay_bool = 'true';
            } else {
                $slider_autoplay_bool = 'false';
            }

            wp_add_inline_script( 'carrie-script', '(function($){
            $(document).ready(function() {
                "use strict";
                var owl = $(".carrie-popular-post-list-wrapper .carrie-popular-post-list");

                owl.owlCarousel({
                    loop: true,
                    items:'.esc_js($slider_slides).',
                    autoplay:'.esc_js($slider_autoplay_bool).',
                    autowidth: false,
                    autoplayTimeout:'.esc_js($slider_autoplay).',
                    autoplaySpeed: 1000,
                    navSpeed: 1000,
                    dots: false,
                    responsive: {
                        1199:{
                            items:'.esc_js($slider_slides).'
                        },
                        979:{
                            items:2
                        },
                        768:{
                            items:2
                        },
                        479:{
                            items:1
                        },
                        0:{
                            items:1
                        }
                    }
                });

                $(".carrie-popular-post-list-wrapper .carrie-popular-post-list-nav .carrie-popular-post-list-nav-next").on(\'click\', function(e){
                    owl.trigger(\'next.owl.carousel\', [1000]);
                })
                $(".carrie-popular-post-list-wrapper .carrie-popular-post-list-nav .carrie-popular-post-list-nav-prev").on(\'click\', function(e){
                    owl.trigger(\'prev.owl.carousel\', [1000]);
                })

            });})(jQuery);');

        }

    }
}

/* Footer shortcode block */
function carrie_footer_shortcode_show() {
  $carrie_theme_options = carrie_get_theme_options();

  if(isset($carrie_theme_options['footer_shortcode_display']) && ($carrie_theme_options['footer_shortcode_display'])):
  ?>
  <div class="container">
    <div class="footer-shortcode-block">
    <?php echo do_shortcode($carrie_theme_options['footer_shortcode_code']); ?>
    </div>
  </div>
  <?php
  endif;
}

/* Footer instagram block */
function carrie_footer_instagram_show() {

  $carrie_theme_options = carrie_get_theme_options();

  // Instagram feed
  if(isset($carrie_theme_options['footer_instagram_display']) && ($carrie_theme_options['footer_instagram_display'])) {

      echo '<div class="footer-instagram-wrapper carrie-theme-block">';

      if(isset($carrie_theme_options['footer_instagram_title']) && $carrie_theme_options['footer_instagram_title'] <> '') {
        echo '<h4>'.esc_html($carrie_theme_options['footer_instagram_title']).'</h4>';
        echo '<h2 class="lined">'.esc_html($carrie_theme_options['footer_instagram_subtitle']).'</h2>';
      }

      echo do_shortcode('[instagram-feed]');
      echo '</div>';

  }

}

/* Footer HTML block */
function carrie_footer_htmlblock_show() {

  $carrie_theme_options = carrie_get_theme_options();

  if(isset($carrie_theme_options['footer_htmlblock_display']) && ($carrie_theme_options['footer_htmlblock_display'])) {

    if(isset($carrie_theme_options['footer_htmlblock_bg_image']) && $carrie_theme_options['footer_htmlblock_bg_image']['url'] <> '') {
      $style = 'background-image: url('.esc_url($carrie_theme_options['footer_htmlblock_bg_image']['url']).');';
    } else {
      $style = '';
    }

    ?>
    <div class="footer-html-block" data-style="<?php echo esc_attr($style); ?>">
    <?php echo wp_kses_post($carrie_theme_options['footer_htmlblock_content']); ?>
    </div>
    <?php

  }
}

/* Blog post excerpt & read more */
function carrie_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'carrie_excerpt_more');


function carrie_modify_read_more_link() {
    return '<a class="more-link btn" href="' . esc_url(get_permalink()) . '">'.esc_html__('Continue reading', 'carrie').'</a>';
}
add_filter( 'the_content_more_link', 'carrie_modify_read_more_link' );

// Custom BODY classes
add_filter( 'body_class', 'carrie_body_classes' );
function carrie_body_classes($classes) {

  $carrie_theme_options = carrie_get_theme_options();

  // Blog styles
  $blog_style = 1;

  $blog_style_class = Array();

  $blog_style_class[] = 'blog-style-'.$blog_style;


  // Single Post page related classes
  if(isset($carrie_theme_options['blog_enable_post_transparent_header'])) {
    $blog_enable_post_transparent_header = $carrie_theme_options['blog_enable_post_transparent_header'];
  } else {
    $blog_enable_post_transparent_header = false;
  }

  // Demo settings
  if ( defined('DEMO_MODE') && isset($_GET['blog_enable_post_transparent_header']) ) {
    if($_GET['blog_enable_post_transparent_header'] == 0) {
      $blog_enable_post_transparent_header = false;
    }
    if($_GET['blog_enable_post_transparent_header'] == 1) {
      $blog_enable_post_transparent_header = true;
    }
  }

  if($blog_enable_post_transparent_header) {
    $classes[] = 'blog-post-transparent-header-enable';
  } else {
    $classes[] = 'blog-post-transparent-header-disable';
  }

  if(isset($carrie_theme_options['blog_enable_paper_page']) && $carrie_theme_options['blog_enable_paper_page']) {
    $blog_enable_paper_page = true;
  } else {
    $blog_enable_paper_page = false;
  }

  // Demo settings
  if ( defined('DEMO_MODE') && isset($_GET['blog_enable_paper_page']) ) {
    if($_GET['blog_enable_paper_page'] == 0) {
      $blog_enable_paper_page = false;
    } else {
      $blog_enable_paper_page = true;
    }
  }

  if($blog_enable_paper_page) {
      $classes[] = 'blog-enable-paper-page';
  }

  if(isset($carrie_theme_options['blog_enable_small_page_width'])) {
    $blog_enable_small_page_width = $carrie_theme_options['blog_enable_small_page_width'];
  } else {
    $blog_enable_small_page_width = true;
  }

  // Demo settings
  if ( defined('DEMO_MODE') && isset($_GET['blog_enable_small_page_width']) ) {
    if($_GET['blog_enable_small_page_width'] == 0) {
      $blog_enable_small_page_width = false;
    }
    if($_GET['blog_enable_small_page_width'] == 1) {
      $blog_enable_small_page_width = true;
    }
  }

  if($blog_enable_small_page_width) {

    $classes[] = 'blog-small-page-width';

  }

  // Slider related classes
  if(isset($carrie_theme_options['blog_enable_homepage_slider'])) {
    $blog_enable_homepage_slider = $carrie_theme_options['blog_enable_homepage_slider'];
  } else {
    $blog_enable_homepage_slider = false;
  }

  if($blog_enable_homepage_slider) {

    $classes[] = 'blog-slider-enable';

    if(isset($carrie_theme_options['blog_enable_homepage_transparent_header'])) {
      $blog_enable_homepage_transparent_header = $carrie_theme_options['blog_enable_homepage_transparent_header'];
    } else {
      $blog_enable_homepage_transparent_header = false;
    }

    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['blog_enable_homepage_transparent_header']) ) {
      if($_GET['blog_enable_homepage_transparent_header'] == 0) {
        $blog_enable_homepage_transparent_header = false;
      }
      if($_GET['blog_enable_homepage_transparent_header'] == 1) {
        $blog_enable_homepage_transparent_header = true;
      }
    }

    if($blog_enable_homepage_transparent_header) {
      $classes[] = 'blog-transparent-header-enable';
    } else {
      $classes[] = 'blog-transparent-header-disable';
    }

  } else {
    $classes[] = 'blog-slider-disable';
  }

  if(isset($carrie_theme_options['blog_enable_dropcaps']) && $carrie_theme_options['blog_enable_dropcaps']) {
    $classes[] = 'blog-enable-dropcaps';
  }

  if(isset($carrie_theme_options['enable_images_animations']) && $carrie_theme_options['enable_images_animations']) {
    $classes[] = 'blog-enable-images-animations';
  }

  return $classes;
}

/**
 * Function for outputting a cmb2 file_list
 *
 * @param  string  $file_list_meta_key The field meta key. ('wiki_test_file_list')
 * @param  string  $img_size           Size of image to show
 */
function carrie_cmb2_get_images_src( $post_id, $file_list_meta_key, $img_size = 'medium' ) {

    // Get the list of files
    $files = get_post_meta( $post_id, $file_list_meta_key, 1 );

    $attachments_image_urls_array = Array();

    foreach ( (array) $files as $attachment_id => $attachment_url ) {

        $current_attach = wp_get_attachment_image_src( $attachment_id, $img_size );

        $attachments_image_urls_array[] = $current_attach[0];

    }

    if($attachments_image_urls_array[0] == '') {
        $attachments_image_urls_array = array();
    }

    return $attachments_image_urls_array;

}
