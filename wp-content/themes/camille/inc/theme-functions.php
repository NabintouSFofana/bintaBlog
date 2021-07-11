<?php
/**
 * Plugin recomendations
 **/
$camille_theme_options = camille_get_theme_options();

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

require_once(get_template_directory().'/inc/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'camille_register_required_plugins' );

function camille_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        array(
            'name'                  => esc_html__('Camille Custom Metaboxes', 'camille'), // The plugin name
            'slug'                  => 'cmb2', // The plugin slug (typically the folder name)
            'source'                => get_template_directory() . '/inc/plugins/cmb2.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '2.7.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => esc_html__('Camille Theme Addons', 'camille'), // The plugin name
            'slug'                  => 'camille-theme-addons', // The plugin slug (typically the folder name)
            'source'                => get_template_directory() . '/inc/plugins/camille-theme-addons.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '2.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => esc_html__('Camille Page Navigation', 'camille'), // The plugin name
            'slug'                  => 'wp-pagenavi', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('Camille Popups', 'camille'), // The plugin name
            'slug'                  => 'icegram', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('Camille Translation Manager', 'camille'), // The plugin name
            'slug'                  => 'loco-translate', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('Instagram Feed', 'camille'), // The plugin name
            'slug'                  => 'instagram-feed', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('MailChimp for WordPress (Newsletter signup)', 'camille'), // The plugin name
            'slug'                  => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('WordPress LightBox', 'camille'), // The plugin name
            'slug'                  => 'responsive-lightbox', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('Contact Form 7', 'camille'), // The plugin name
            'slug'                  => 'contact-form-7', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_html__('Regenerate Thumbnails', 'camille'), // The plugin name
            'slug'                  => 'regenerate-thumbnails', // The plugin slug (typically the folder name)
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
        'domain'            => 'camille',           // Text domain - likely want to be the same as your theme.
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
class camille_description_walker extends Walker_Nav_Menu{
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

function camille_google_fonts_url() {

    $camille_theme_options = camille_get_theme_options();

    $font_url = '';
    $font_header = '';
    $font_body = '';
    $font_additional = '';

    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['header_font']) ) {
      $camille_theme_options['header_font']['font-family'] = $_GET['header_font'];
    }
    if ( defined('DEMO_MODE') && isset($_GET['body_font']) ) {
      $camille_theme_options['body_font']['font-family'] = $_GET['body_font'];
    }
    if ( defined('DEMO_MODE') && isset($_GET['additional_font']) ) {
      $camille_theme_options['additional_font']['font-family'] = $_GET['additional_font'];
    }

    if(!isset($camille_theme_options['font_google_disable']) || $camille_theme_options['font_google_disable'] == false) {

        // Header font
        if(isset($camille_theme_options['header_font'])) {
            $font_header = $camille_theme_options['header_font']['font-family'];

            if(isset($camille_theme_options['header_font_options'])) {
                $font_header = $font_header.':'.$camille_theme_options['header_font_options'];
            }
        }
        // Body font
        if(isset($camille_theme_options['body_font'])) {
            $font_body = '|'.$camille_theme_options['body_font']['font-family'];

            if(isset($camille_theme_options['body_font_options'])) {
                $font_body = $font_body.':'.$camille_theme_options['body_font_options'];
            }
        }
        // Additional font
        if(isset($camille_theme_options['additional_font_enable']) && $camille_theme_options['additional_font_enable']) {
            if(isset($camille_theme_options['additional_font'])) {
                $font_additional = '|'.$camille_theme_options['additional_font']['font-family'].'|';
            }
        }

        // Build Google Fonts request
        $font_url = add_query_arg( 'family', urlencode( $font_header.$font_body.$font_additional ), "//fonts.googleapis.com/css" );

    }

    return $font_url;
}

// Custom layout functions
function camille_header_promo_show() {
    $camille_theme_options = camille_get_theme_options();

    echo '<div class="header-promo-content">'.($camille_theme_options['header_banner_editor']).'</div>';
}

function camille_logo_show() {
    $camille_theme_options = camille_get_theme_options();
    ?>
    <div class="logo">
    <a class="logo-link" href="<?php echo home_url('/'); ?>"><img src="<?php echo esc_url(get_header_image()); ?>" alt="<?php bloginfo('name'); ?>"></a>
    <?php if(get_bloginfo('description')!=='') {
      echo '<div class="header-blog-info">';
      if(isset($camille_theme_options['disable_header_tagline']) && !$camille_theme_options['disable_header_tagline']) {
        bloginfo('description');
      }
      echo '</div>';
    }
    ?>
    </div>
    <?php
}

function camille_menu_below_header_show() {
    $camille_theme_options = camille_get_theme_options();

    // MainMenu styles
    $menu_add_class = '';

    if(isset($camille_theme_options['header_menu_font_decoration'])) {
        $menu_add_class .= ' mainmenu-'.esc_html($camille_theme_options['header_menu_font_decoration']);
    }
    if(isset($camille_theme_options['header_menu_font_size'])) {
        $menu_add_class .= ' mainmenu-'.esc_html($camille_theme_options['header_menu_font_size']);
    }
    if(isset($camille_theme_options['header_menu_arrow_style'])) {
        $menu_add_class .= ' mainmenu-'.esc_html($camille_theme_options['header_menu_arrow_style']);
    }

    // Center menu
    $menu_add_class .= ' menu-center';

    if(isset($camille_theme_options['enable_sticky_header']) && $camille_theme_options['enable_sticky_header']) {

      $menu_add_class .= ' sticky-header';

    }

    ?>

    <?php
    // Main Menu

    $menu = wp_nav_menu(
        array (
            'theme_location'  => 'primary',
            'echo' => FALSE,
            'fallback_cb' => '__return_false'
        )
    );

    if (!empty($menu)):

    ?>
    <div class="mainmenu-belowheader<?php echo esc_attr($menu_add_class); ?> clearfix">
        <?php if(isset($camille_theme_options['enable_sticky_header_logo']) && $camille_theme_options['enable_sticky_header_logo']): ?>
        <div class="sticky-menu-logo">
            <a class="logo-link" href="<?php echo home_url('/'); ?>"><img src="<?php echo esc_url(get_header_image()); ?>" alt="<?php bloginfo('name'); ?>"></a>
        </div>
        <?php endif; ?>
        <div id="navbar" class="navbar navbar-default clearfix">

          <div class="navbar-inner">
              <div class="container">

                  <div class="navbar-toggle" data-toggle="collapse" data-target=".collapse">
                    <?php esc_html_e( 'Menu', 'camille' ); ?>
                  </div>
                  <div class="navbar-left-wrapper">
                    <?php // Demo settings
                    if ( defined('DEMO_MODE') && isset($_GET['enable_offcanvas_sidebar']) ) {
                      $camille_theme_options['enable_offcanvas_sidebar'] = $_GET['enable_offcanvas_sidebar'];
                    }

                    ?>
                    <ul class="header-nav">
                        <?php
                            if(isset($camille_theme_options['enable_offcanvas_sidebar'])&&($camille_theme_options['enable_offcanvas_sidebar'])):
                        ?>
                        <li class="float-sidebar-toggle"><div id="st-sidebar-trigger-effects"><a class="float-sidebar-toggle-btn" data-effect="st-sidebar-effect-2"><i class="fa fa-bars"></i></a></div></li>
                        <?php endif; ?>
                    </ul>
                  </div>
                  <div class="navbar-center-wrapper">
                  <?php

                     wp_nav_menu(array(
                      'theme_location'  => 'primary',
                      'container_class' => 'navbar-collapse collapse',
                      'menu_class'      => 'nav',
                      'walker'          => new camille_description_walker
                      ));

                  ?>
                  </div>
                  <div class="navbar-right-wrapper">
                    <div class="search-bar-header">
                      <?php
                      if(isset($camille_theme_options['disable_top_menu_search']) && !$camille_theme_options['disable_top_menu_search']) {

                        echo '<a class="search-toggle-btn"></a>';
                      }
                      ?>
                    </div>
                  </div>
              </div>
          </div>

        </div>

    </div>
    <?php endif; ?>

    <?php
    // MainMenu Below header position END
}

function camille_social_show($showtitles = false) {
    $camille_theme_options = camille_get_theme_options();

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

    $s_count = 0;

    $social_services_html = '';

    foreach( $social_services_arr as $ss_data => $ss_value ){
      if(isset($camille_theme_options[$ss_data]) && (trim($camille_theme_options[$ss_data])) <> '') {
        $s_count++;
        $social_service_url = $camille_theme_options[$ss_data];
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

function camille_top_show() {
    $camille_theme_options = camille_get_theme_options();
    ?>
    <?php if(isset($camille_theme_options['disable_top_menu']) && !$camille_theme_options['disable_top_menu']): ?>
    <?php
    $header_add_class = '';

    if(isset($camille_theme_options['header_top_menu_style'])) {
      $header_top_menu_style = $camille_theme_options['header_top_menu_style'];
      $header_add_class .= ' '.esc_attr($header_top_menu_style);
    }

    ?>
    <div class="header-menu-bg<?php echo esc_attr($header_add_class); ?>">
      <div class="header-menu">
        <div class="container">
          <div class="row">
              <div class="col-md-6">
              <div class="menu-top-menu-container-toggle"></div>
              <?php
              wp_nav_menu(array(
                'theme_location'  => 'top',
                'menu_class'      => 'links'
                ));
              ?>
            </div>
            <div class="col-md-6">

                <?php

                $social_services_arr = Array("facebook", "vk","twitter", "google-plus", "linkedin", "dribbble", "behance", "instagram", "tumblr", "pinterest", "vimeo-square", "youtube", "skype");

                $s_count = 0;

                $social_services_html = '';

                foreach( $social_services_arr as $ss_data ){
                  if(isset($camille_theme_options[$ss_data]) && (trim($camille_theme_options[$ss_data])) <> '') {
                    $s_count++;
                    $social_service_url = $camille_theme_options[$ss_data];
                    $social_service = $ss_data;
                    $social_services_html .= '<a href="'.esc_url($social_service_url).'" target="_blank" class="a-'.esc_attr($social_service).'"><i class="fa fa-'.esc_attr($social_service).'"></i></a>';
                  }
                }

                if($social_services_html <> '') {
                  echo '<div class="header-info-text">'.$social_services_html.'</div>';
                }

                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif;
}

function camille_header_left_show() {
    $camille_theme_options = camille_get_theme_options();

    // Show header banner
    if((isset($camille_theme_options['header_banner_editor'])) && ($camille_theme_options['header_banner_editor'] <> '') && (isset($camille_theme_options['header_banner_position'])) && ($camille_theme_options['header_banner_position'] == 'left')){
        camille_header_promo_show();
    }

    if((isset($camille_theme_options['header_logo_position'])) && ($camille_theme_options['header_logo_position'] == 'left')) {
        camille_logo_show();
    }

}

function camille_header_center_show() {
    $camille_theme_options = camille_get_theme_options();

    // Show header banner
    if((isset($camille_theme_options['header_banner_editor'])) && ($camille_theme_options['header_banner_editor'] <> '') && (isset($camille_theme_options['header_banner_position'])) && ($camille_theme_options['header_banner_position'] == 'center')){
        camille_header_promo_show();
    }

    if((isset($camille_theme_options['header_logo_position'])) && ($camille_theme_options['header_logo_position'] == 'center')) {
        camille_logo_show();
    }

}

function camille_header_right_show() {
    $camille_theme_options = camille_get_theme_options();

    if((isset($camille_theme_options['header_logo_position'])) && ($camille_theme_options['header_logo_position'] == 'right')) {
        camille_logo_show();
    }

    // Show header banner
    if((isset($camille_theme_options['header_banner_editor'])) && ($camille_theme_options['header_banner_editor'] <> '') && (isset($camille_theme_options['header_banner_position'])) && ($camille_theme_options['header_banner_position'] == 'right')){
        camille_header_promo_show();
    }


    ?>
<?php
}

function camille_blog_slider_show() {

    $camille_theme_options = camille_get_theme_options();

    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['blog_homepage_slider_fullwidth']) ) {
      if($_GET['blog_homepage_slider_fullwidth'] == 1) {
        $camille_theme_options['blog_homepage_slider_fullwidth'] = true;
      }
      if($_GET['blog_homepage_slider_fullwidth'] == 0) {
        $camille_theme_options['blog_homepage_slider_fullwidth'] = false;
      }
    }

    if ( defined('DEMO_MODE') && isset($_GET['blog_enable_homepage_merge_slider']) ) {
      if($_GET['blog_enable_homepage_merge_slider'] == 1) {
        $camille_theme_options['blog_enable_homepage_merge_slider'] = true;
      }
      if($_GET['blog_enable_homepage_merge_slider'] == 0) {
        $camille_theme_options['blog_enable_homepage_merge_slider'] = false;
      }
    }

    if ( defined('DEMO_MODE') && isset($_GET['blog_enable_homepage_center_slide']) ) {
      if($_GET['blog_enable_homepage_center_slide'] == 1) {
        $camille_theme_options['blog_enable_homepage_center_slide'] = true;
      }
      if($_GET['blog_enable_homepage_center_slide'] == 0) {
        $camille_theme_options['blog_enable_homepage_center_slide'] = false;
      }
    }

    if ( defined('DEMO_MODE') && isset($_GET['blog_homepage_slider_items']) ) {
        $camille_theme_options['blog_homepage_slider_items'] = $_GET['blog_homepage_slider_items'];
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

        if(isset($camille_theme_options['blog_homepage_slider_autoplay'])) {
            $slider_autoplay = $camille_theme_options['blog_homepage_slider_autoplay'];
        } else {
            $slider_autoplay = 3000;
        }

        if($slider_autoplay > 0) {
            $slider_autoplay_bool = 'true';
        } else {
            $slider_autoplay_bool = 'false';
        }

        if(isset($camille_theme_options['blog_enable_homepage_center_slide']) && $camille_theme_options['blog_enable_homepage_center_slide']) {
            $homepage_center_slide = 'true';
        } else {
            $homepage_center_slide = 'false';
        }

        if(isset($camille_theme_options['blog_enable_homepage_merge_slider']) && $camille_theme_options['blog_enable_homepage_merge_slider']) {
            $homepage_merge_slider = 'true';
        } else {
            $homepage_merge_slider = 'false';
        }

        if($slider_autoplay == 1) {
            $slider_autoplay_class = ' autoplay ';
        } else {
            $slider_autoplay_class = ' ';
        }

        if(isset($camille_theme_options['blog_homepage_slider_navigation'])) {
            $slider_navigation = $camille_theme_options['blog_homepage_slider_navigation'];
        } else {
            $slider_navigation = 1;
        }

        if(isset($camille_theme_options['blog_homepage_slider_pagination'])) {
            $slider_pagination = $camille_theme_options['blog_homepage_slider_pagination'];
        } else {
            $slider_pagination = 'false';
        }

        if($slider_navigation == 1) {
            $slider_navigation = 'true';
        } else {
            $slider_navigation = 'false';
        }

        // Demo settings
        if ( defined('DEMO_MODE') && isset($_GET['blog_homepage_slider_post_details_layout']) ) {
          $camille_theme_options['blog_homepage_slider_post_details_layout'] = $_GET['blog_homepage_slider_post_details_layout'];
        }

        if(isset($camille_theme_options['blog_homepage_slider_post_details_layout']) && $camille_theme_options['blog_homepage_slider_items'] == 1) {
            $post_details_layout = $camille_theme_options['blog_homepage_slider_post_details_layout'];
        } else {
            $post_details_layout = 'horizontal';
        }

        echo '<div class="camille-post-list-wrapper camille-post-wrapper-style-'.esc_attr($slider_style).''.esc_attr($slider_autoplay_class).'clearfix">';

        echo '<div id="camille-post-list" class="camille-post-list camille-post-style-'.$slider_style.'">';

        echo '<div class="owl-carousel">';

        $i = 0;
        $j = 0;

        foreach($posts as $post) {

            setup_postdata($post);

            $limit = 30;

            $excerpt = explode(' ', get_the_excerpt(), $limit);
            if (count($excerpt)>=$limit) {
                array_pop($excerpt);
                $excerpt = implode(" ",$excerpt).'...';
            } else {
                $excerpt = implode(" ",$excerpt);
            }

            $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);

            if((isset($camille_theme_options['blog_homepage_slider_fullwidth'])&&$camille_theme_options['blog_homepage_slider_fullwidth'])) {
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
            } else {
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'camille-blog-thumb');
            }

            if(has_post_thumbnail( $post->ID )) {
                $image_bg ='background-image: url('.$image[0].');';
            }
            else {
                $image_bg = '';
            }

            $categories_list = get_the_category_list( ', ', 0, $post->ID); // This variable is Safe and does not need esc functions

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

            // Comments and views
            $post_comments = get_comments_number($post->ID);

            $counts_html = '';

            $counts_html_start = '<div class="post-counters">';
            $counts_html_end = '</div>';

            if(isset($camille_theme_options['blog_enable_post_comments_counter']) && $camille_theme_options['blog_enable_post_comments_counter']) {
                $counts_html .= '<span class="comments-count" title="'.esc_attr__('Post comments', 'camille').'"><i class="fa fa-comment-o"></i> '.esc_html($post_comments).'</span>';
            }

            if($counts_html !== '') {
                $counts_html = $counts_html_start.$counts_html.$counts_html_end;
            }

            if($post_details_layout == 'vertical') {
                $read_more_button_html = '<a class="btn alt" href="'.esc_url(get_permalink($post->ID)).'">'.esc_html__('Continue reading', 'camille').'</a>';
            } else {
                $read_more_button_html = '';
            }

            if(isset($camille_theme_options['blog_post_show_author'])&&($camille_theme_options['blog_post_show_author'])) {
                $author_html = '<span class="camille-post-author">'.esc_html__('by','camille').' '.get_the_author_posts_link().'</span>';
            } else {
                $author_html = '';
            }

            $camille_post_classes = ' camille-post-layout-'.$post_details_layout;

            echo '<div class="camille-post'.esc_attr($camille_post_classes).'" data-merge="'.esc_attr($data_merge).'">';

            // Simple slider Layout
            if($slider_style == 1) {
                echo '<div class="camille-post-image" data-style="'.esc_attr($image_bg).'"><div class="camille-post-image-wrapper">
                <div class="camille-post-details">
                    <div class="camille-post-category">'.wp_kses_post($categories_list).'</div>
                    <div class="camille-post-title"><a href="'.esc_url(get_permalink($post->ID)).'"><h2>'.esc_html($post->post_title).'</h2></a></div>
                    <div class="camille-post-date">'.wp_kses_post($author_html).get_the_time( get_option( 'date_format' ), $post->ID ).'</div>
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
            if(!isset($camille_theme_options['blog_homepage_slider_items'])) {
                $camille_theme_options['blog_homepage_slider_items'] = 2;
            }

            $slider_slides = $camille_theme_options['blog_homepage_slider_items'];

            // Don't init slider if it have 1 slide
            if($i > 1) {

              wp_add_inline_script( 'camille-script', '(function($){
              $(document).ready(function() {
                  "use strict";
                  var owlpostslider = $("#camille-post-list .owl-carousel").owlCarousel({
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
            } else {
              wp_add_inline_script( 'camille-script', '(function($){
              $(document).ready(function() {
                  "use strict";
                  $("#camille-post-list .owl-carousel").show();

              });})(jQuery);');
            }

        }

    }

}
/* Editors pick footer block */
function camille_blog_editorspick_posts_show() {

    $camille_theme_options = camille_get_theme_options();

    if(isset($camille_theme_options['blog_homepage_editorspick_posts_limit'])) {
        $editorspick_posts_limit = $camille_theme_options['blog_homepage_editorspick_posts_limit'];
    } else {
        $editorspick_posts_limit = 2;
    }

    if(isset($camille_theme_options['blog_homepage_editorspick_posts_category'])) {
        $editorspick_posts_category = $camille_theme_options['blog_homepage_editorspick_posts_category'];
    } else {
        $editorspick_posts_category = '';
    }

    if($editorspick_posts_limit == 2) {
        $posts_limit = 8;
    } else {
        $posts_limit = 4;
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

        echo '<div class="camille-editorspick-post-list-wrapper clearfix">';

        if(isset($camille_theme_options['blog_homepage_editorspick_posts_subtitle']) && $camille_theme_options['blog_homepage_editorspick_posts_subtitle'] !== '') {
            echo '<h3>'.esc_html($camille_theme_options['blog_homepage_editorspick_posts_subtitle']).'</h3>';
        }

        if(isset($camille_theme_options['blog_homepage_editorspick_posts_title']) && $camille_theme_options['blog_homepage_editorspick_posts_title'] !== '') {
            echo '<h2>'.esc_html($camille_theme_options['blog_homepage_editorspick_posts_title']).'</h2>';
        }

        echo '<div id="camille-editorspick-post-list" class="camille-editorspick-post-list">';
        echo '<div class="row camille-editorspick-post-row">';

        $i = 0;

        foreach($posts as $post) {

            setup_postdata($post);

            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'camille-blog-thumb');

            if(has_post_thumbnail( $post->ID )) {
                $image_bg ='background-image: url('.$image[0].');';
            }
            else {
                $image_bg = '';
            }

            $categories_list = get_the_category_list( ', ', 0, $post->ID );

            if($i == 4) {
                echo '</div><div class="row camille-editorspick-post-row">';
            }

            // Small post with image
            echo '<div class="col-md-3">';
            echo '<div class="camille-editorspick-post camille-editorspick-post-small">';

            echo '<a href="'.esc_url(get_permalink($post->ID)).'" class="hover-effect-block"><div class="camille-editorspick-post-image" data-style="'.esc_attr($image_bg).'"></div></a>
            <div class="camille-editorspick-post-details">
                <div class="camille-editorspick-post-category">'.esc_html__('in', 'camille').' '.wp_kses_post($categories_list).'</div>
                <div class="camille-editorspick-post-title"><a href="'.esc_url(get_permalink($post->ID)).'"><h2>'.esc_html($post->post_title).'</h2></a></div>
                <div class="camille-editorspick-post-date">'.get_the_time( get_option( 'date_format' ), $post->ID ).'</div>
            </div>';

            echo '</div>';
            echo '</div>';

            $i++;

        }

        wp_reset_postdata();

        echo '</div>';
        echo '</div>';

        echo '</div>';
    }


}

/* Banner Block */
function camille_banner_show($banner_id) {

    $camille_theme_options = camille_get_theme_options();

    $banner_option_name = 'banner_enable_'.$banner_id;
    $banner_content_name = 'banner_'.$banner_id.'_content';

    if(isset($camille_theme_options[$banner_option_name]) && $camille_theme_options[$banner_option_name]) {

        echo '<div class="camille-ad-block camille-ad-block-'.$banner_id.' clearfix">';
        echo wp_kses_post($camille_theme_options[$banner_content_name]);

        echo '</div>';
    }

}

/* Homepage Welcome Block */
function camille_welcome_block_show() {

    $camille_theme_options = camille_get_theme_options();

    if(isset($camille_theme_options['blog_enable_homepage_welcome_block']) && $camille_theme_options['blog_enable_homepage_welcome_block']) {

        echo '<div class="homepage-welcome-block">';

        echo '<div class="container">';
        echo '<div class="row">';

        echo '<div class="homepage-welcome-block-content clearfix">';

        if(isset($camille_theme_options['blog_homepage_welcome_block_content'])) {
           echo do_shortcode(wp_kses_post($camille_theme_options['blog_homepage_welcome_block_content']));
        }

        echo '</div>';


        echo '</div>';
        echo '</div>';

        echo '</div>';
    }

}

/* Blog post excerpt & read more */
function camille_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'camille_excerpt_more');


function camille_modify_read_more_link() {
    return '<a class="more-link btn alt" href="' . esc_url(get_permalink()) . '">'.esc_html__('Continue reading', 'camille').'</a>';
}
add_filter( 'the_content_more_link', 'camille_modify_read_more_link' );

// Custom body classes
function camille_body_classes($classes) {

  $camille_theme_options = camille_get_theme_options();

  // Blog styles
  $blog_style = 1;

  $blog_style_class = Array();

  $blog_style_class[] = 'blog-style-'.$blog_style;

  if(isset($camille_theme_options['blog_enable_small_page_width'])) {
    $blog_enable_small_page_width = $camille_theme_options['blog_enable_small_page_width'];
  } else {
    $blog_enable_small_page_width = true;
  }

  // Demo settings
  if ( defined('DEMO_MODE') && isset($_GET['blog_enable_small_page_width']) ) {
    if($_GET['blog_enable_small_page_width'] == 0) {
      $blog_enable_small_page_width = false;
    }
  }

  if($blog_enable_small_page_width) {

    $classes[] = 'blog-small-page-width';

  }

  if(isset($camille_theme_options['blog_enable_homepage_slider'])) {
    $blog_enable_homepage_slider = $camille_theme_options['blog_enable_homepage_slider'];
  } else {
    $blog_enable_homepage_slider = false;
  }

  if($blog_enable_homepage_slider) {

    $classes[] = 'blog-slider-enable';

  } else {
    $classes[] = 'blog-slider-disable';
  }

  if(isset($camille_theme_options['blog_enable_dropcaps']) && $camille_theme_options['blog_enable_dropcaps']) {
    $classes[] = 'blog-enable-dropcaps';
  }

  if(isset($camille_theme_options['enable_images_animations']) && $camille_theme_options['enable_images_animations']) {
    $classes[] = 'blog-enable-images-animations';
  }

  if(isset($camille_theme_options['blog_posttitle_font_decoration'])) {
    $classes[] = 'blog-post-title-'.$camille_theme_options['blog_posttitle_font_decoration'];
  } else {
    $classes[] = 'blog-post-title-uppercase';
  }

  if(isset($camille_theme_options['blog_homepage_slider_posttitle_font_decoration'])) {
    $classes[] = 'blog-homepage-slider-post-title-'.$camille_theme_options['blog_homepage_slider_posttitle_font_decoration'];
  } else {
    $classes[] = 'blog-homepage-slider-post-title-italic';
  }

  return $classes;
}

// Add custom body classes
add_filter( 'body_class', 'camille_body_classes' );

/**
 * Function for outputting a cmb2 file_list
 *
 * @param  string  $file_list_meta_key The field meta key. ('wiki_test_file_list')
 * @param  string  $img_size           Size of image to show
 */
function camille_cmb2_get_images_src( $post_id, $file_list_meta_key, $img_size = 'medium' ) {

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
