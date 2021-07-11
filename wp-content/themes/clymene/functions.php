<?php
global $clymene_option;
if ( !class_exists( 'ReduxFramework' ) && file_exists( get_template_directory() . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( get_template_directory() . '/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( get_template_directory() . '/ReduxFramework/sample/sample-config.php' ) ) {
    require_once( get_template_directory() . '/ReduxFramework/sample/sample-config.php' );
}

//Custom fields:
require_once get_template_directory() . '/framework/bfi_thumb-master/BFI_Thumb.php';
require_once get_template_directory() . '/framework/meta-boxes.php';
require_once get_template_directory() . '/framework/widget/widget.php';
require_once get_template_directory() . '/shortcodes.php';
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';

//Theme Set up:
function clymene_theme_setup() {

	load_theme_textdomain( 'clymene', get_template_directory() . '/languages' );
    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
    if ( ! isset( $content_width ) ) {
	 $content_width = 900;
	}

	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	
    add_theme_support( 'post-thumbnails' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Switches default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    //Post formats
    add_theme_support( 'post-formats', array(
        'audio',  'gallery', 'image', 'quote', 'video', 'link'
    ) );
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => 'Primary Menu',
		'onepage'   => 'One Page Menu',
	) );
    // This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
    add_shortcode('gallery', '__return_false');
    add_theme_support( 'title-tag' );

}
add_action( 'after_setup_theme', 'clymene_theme_setup' );


/*Register Fonts*/
function clymene_theme_fonts_url() {
	$fonts_url = '';
 
    
    $lato = _x( 'on', 'Lato font: on or off', 'clymene' );
 
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'clymene' );
 	
    $mon = _x( 'on', 'Montserrat font: on or off', 'clymene' );

    $sat = _x( 'on', 'Satisfy font: on or off', 'clymene' );

    $play = _x( 'on', 'Playball font: on or off', 'clymene' );

    if ( 'off' !== $lato || 'off' !== $open_sans || 'off' !== $mon || 'off' !== $sat || 'off' !== $play ) {
        $font_families = array();
 
        if ( 'off' !== $lato ) {
            $font_families[] = 'Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic';
        }
 
        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800';
        }
        if ( 'off' !== $mon ) {
            $font_families[] = 'Montserrat:400,700';
        }
        if ( 'off' !== $sat ) {
            $font_families[] = 'Satisfy';
        }
        if ( 'off' !== $play ) {
            $font_families[] = 'Playball';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );

}
/*
Enqueue scripts and styles.
*/
function clymene_theme_scripts() {
    wp_enqueue_style( 'clymene-fonts', clymene_theme_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'clymene_theme_scripts' );

//Theme Scripts Styles
function clymene_theme_scripts_styles() {
	global $clymene_option;
	$protocol = is_ssl() ? 'https' : 'http';
 
	wp_enqueue_style( 'clymene-base', get_template_directory_uri().'/css/base.css');
	wp_enqueue_style( 'clymene-skeleton', get_template_directory_uri().'/css/skeleton.css');
	wp_enqueue_style( 'clymene-style', get_stylesheet_uri(), array(), '2014-11-11' );
	wp_enqueue_style( 'clymene-font-awesome', get_template_directory_uri().'/css/font-awesome.css');
	wp_enqueue_style( 'clymene-font-awe', get_template_directory_uri().'/css/font-awesome2.css');
	wp_enqueue_style( 'clymene-flat', get_template_directory_uri().'/css/owl.carousel.css');
	wp_enqueue_style( 'clymene-fancybox', get_template_directory_uri().'/css/animsition.min.css');
	wp_enqueue_style( 'clymene-revolution', get_template_directory_uri().'/css/settings.css');
	wp_enqueue_style( 'clymene-colorbox', get_template_directory_uri().'/css/colorbox.css');
	wp_enqueue_style( 'clymene-retina', get_template_directory_uri().'/css/retina.css');
	wp_enqueue_style( 'clymene-gold', get_template_directory_uri().'/css/colors/color-gold.css');
	
	wp_enqueue_style( 'clymene-color', get_template_directory_uri().'/framework/color.php');
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
    wp_enqueue_script( 'comment-reply' );
	}	
	wp_enqueue_script("clymene-mapapi", "$protocol://maps.google.com/maps/api/js?sensor=true",array(),false,false);	
	wp_enqueue_script("clymene-modernizr", get_template_directory_uri()."/js/modernizr.custom.js",array(),false,false);
	wp_enqueue_script("clymene-mobile", get_template_directory_uri()."/js/jquery.mobile.custom.min.js",array(),false,true);
	wp_enqueue_script("clymene-animsition", get_template_directory_uri()."/js/jquery.animsition.min.js",array(),false,true);
	wp_enqueue_script("clymene-retina-js", get_template_directory_uri()."/js/retina-1.1.0.min.js",array(),false,true);
	wp_enqueue_script("clymene-easing", get_template_directory_uri()."/js/jquery.easing.js",array(),false,true);
	wp_enqueue_script("clymene-fitvids", get_template_directory_uri()."/js/jquery.fitvids.js",array(),false,true);
	wp_enqueue_script("clymene-parallax", get_template_directory_uri()."/js/jquery.parallax-1.1.3.js",array(),false,true);
	wp_enqueue_script("clymene-owlcarousel", get_template_directory_uri()."/js/owl.carousel.min.js",array(),false,false);
	if(is_singular('portfolio')){
	wp_enqueue_script("clymene-intense", get_template_directory_uri()."/js/intense.min.js",array(),false,true);		
	wp_enqueue_script("clymene-custom-project", get_template_directory_uri()."/js/custom-project.js",array(),false,true); 
	}
	wp_enqueue_script("clymene-comparison", get_template_directory_uri()."/js/jquery.twentytwenty.js",array(),false,true);
	wp_enqueue_script("clymene-eventmove", get_template_directory_uri()."/js/jquery.event.move.js",array(),false,true);
	wp_enqueue_script("clymene-counterup", get_template_directory_uri()."/js/jquery.counterup.min.js",array(),false,true);
	wp_enqueue_script("clymene-waypoints-js", get_template_directory_uri()."/js/waypoints.min.js",array(),false,true);
	wp_enqueue_script("clymene-scrollReveal", get_template_directory_uri()."/js/scrollReveal.js",array(),false,true);
	wp_enqueue_script("clymene-masonry", get_template_directory_uri()."/js/masonry.js",array(),false,true);
	wp_enqueue_script("clymene-colorbox", get_template_directory_uri()."/js/jquery.colorbox.js",array(),false,true);		
	wp_enqueue_script("clymene-isotopes", get_template_directory_uri()."/js/isotope.js",array(),false,true);
	wp_enqueue_script("clymene-custom", get_template_directory_uri()."/js/custom-index.js",array(),false,true); 
	
}
add_action( 'wp_enqueue_scripts', 'clymene_theme_scripts_styles');

//Style Backend
function clymene_load_custom_wp_admin_style() {

        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/framework/admin-style.css', false, '1.0.0' );

        wp_enqueue_style( 'custom_wp_admin_css' );

}
add_action( 'admin_enqueue_scripts', 'clymene_load_custom_wp_admin_style' );

//Style Frontend
if(!function_exists('clymene_custom_frontend_style')){
	function clymene_custom_frontend_style(){
	global $clymene_option;
	echo '<style type="text/css">'.$clymene_option['custom-css'].'</style>';
}
}
add_action('wp_head', 'clymene_custom_frontend_style');

// Widget Sidebar
function clymene_widgets_init() {
	register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'clymene' ),
        'id'            => 'sidebar-1',        
		'description'   => __( 'Appears in the sidebar section of the site.', 'clymene' ),        
		'before_widget' => '<div id="%1$s" class="widget %2$s">',        
		'after_widget'  => '</div>',        
		'before_title'  => '<h6>',        
		'after_title'   => '</h6>'
    ) );
    register_sidebar( array(
		'name'          => __( 'Footer One Widget Area', 'envor' ),
		'id'            => 'footer-area-1',
		'description'   => __( 'Footer Widget that appears on the Footer.', 'envor' ),
		'before_widget' => '<div id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Two Widget Area', 'envor' ),
		'id'            => 'footer-area-2',
		'description'   => __( 'Footer Widget that appears on the Footer.', 'envor' ),
		'before_widget' => '<div id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Three Widget Area', 'envor' ),
		'id'            => 'footer-area-3',
		'description'   => __( 'Footer Widget that appears on the Footer.', 'envor' ),
		'before_widget' => '<div id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Fourth Widget Area', 'envor' ),
		'id'            => 'footer-area-4',
		'description'   => __( 'Footer Widget that appears on the Footer.', 'envor' ),
		'before_widget' => '<div id="%1$s" class="envor-widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'clymene_widgets_init' );


//Excerpt Blog
function clymene_excerpt() {
  global $clymene_option;
  if(isset($clymene_option['blog_excerpt'])){
    $limit = $clymene_option['blog_excerpt'];
  }else{
    $limit = 15;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

// Excerpt Section Blog Post
function clymene_blog_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

//Widget title
function clymene_widget_title( $title ) {
//HTML tag opening/closing brackets
$title = str_replace( '[', '<', $title );
$title = str_replace( '[/', '</', $title );
// bold -- changed from 's' to 'strong' because of strikethrough code
$title = str_replace( 'strong]', 'strong>', $title );
$title = str_replace( 'b]', 'b>', $title );
$title = str_replace( 'i]', 'i>', $title );

return $title;
}
add_filter( 'widget_title', 'clymene_widget_title' );

//function tag widgets
function clymene_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 11; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	$args['exclude'] = array(20, 80, 92); //exclude tags by ID
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'clymene_tag_cloud_widget' );


//Search From
function clymene_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="search_form" action="' . esc_url(home_url( '/' )) . '" >  
    	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.__("type to search and hit enter","clymene").'" />
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'clymene_search_form' );

// Comment Form
function clymene_theme_comment($comment, $args, $depth) {
    //echo 's';
   $GLOBALS['comment'] = $comment; ?>
   <div class="post-content-comment grey-section">
		<?php echo get_avatar($comment,$size='100',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=70' ); ?>
		<h6><?php printf(__('%s','clymene'), get_comment_author_link()) ?></h6>
		<?php if ($comment->comment_approved == '0'){ ?>
			 <p><em><?php _e('Your comment is awaiting moderation.','clymene') ?></em></p>
		<?php }else{ ?>
        <?php comment_text() ?>
		<?php } ?>
		<div class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div> 
	<div class="clearfix"></div>	
	</div> 
<?php
}

//Code Visual Compurso.
require_once get_template_directory() . '/vc_shortcode.php';
//if(class_exists('WPBakeryVisualComposerSetup')){
function clymene_custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
    if($tag=='vc_row' || $tag=='vc_row_inner') {
        $class_string = str_replace('vc_row-fluid', '', $class_string);
    }
    if($tag=='vc_column' || $tag=='vc_column_inner') {
		$class_string = preg_replace('/vc_col-sm-12/', 'twelve columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-6/', 'six columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-4/', 'four columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-3/', 'three columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-5/', 'five columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-7/', 'seven columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-8/', 'eight columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-9/', 'nine columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-10/', 'ten columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-11/', 'eleven columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-1/', 'one columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-2/', 'two columns', $class_string);
    }
    return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'clymene_custom_css_classes_for_vc_row_and_vc_column', 10, 2); 
// Add new Param in Row
if(function_exists('vc_add_param')){

vc_add_param('vc_row',array(
                              "type" => "checkbox",
                              "heading" => __('Section Full Width?', 'wpb'),
                              "param_name" => "fullwidth",
                              "value" => "",
                              "description" => __("Section full width or not, Default: not fullwidth", "wpb"),      
                            ) 
    );

vc_remove_param( "vc_row", "full_width" );
vc_remove_param( "vc_row", "full_height" );
vc_remove_param( "vc_row", "video_bg" );
vc_remove_param( "vc_row", "video_bg_parallax" );
vc_remove_param( "vc_row", "content_placement" );
vc_remove_param( "vc_row", "video_bg_url" );
vc_remove_element( "vc_basic_grid" );
vc_remove_element( "vc_masonry_grid" );
vc_remove_element( "vc_media_grid" );
vc_remove_element( "vc_masonry_media_grid" );
}


// Required Plugins
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'clymene_theme_register_required_plugins' );
function clymene_theme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from a private repo in your theme.
		array(            
			'name'               => 'WPBakery Visual Composer', // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/js_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),         
		array(            
			'name'               => 'OT Portfolio', // The plugin name.
            'slug'               => 'ot-portfolio', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/ot-portfolio.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(            
			'name'               => 'OT Testimonial', // The plugin name.
            'slug'               => 'ot-testimonial', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/ot-testimonial.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(            
			'name'               => 'OT Team', // The plugin name.
            'slug'               => 'ot_team', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/ot-team.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ), 
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
            'name'      => 'Meta Box',
            'slug'      => 'meta-box',
            'required'  => true,
        ),

	);

	$config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'truehost' ),
            'menu_title'                      => __( 'Install Plugins', 'truehost' ),
            'installing'                      => __( 'Installing Plugin: %s', 'truehost' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'truehost' ),
            'notice_can_install_required'     => _n_noop(
                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                'truehost'
            ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop(
                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                'truehost'
            ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop(
                'Sorry, but you do not have the correct permissions to install the %s plugin.',
                'Sorry, but you do not have the correct permissions to install the %s plugins.',
                'truehost'
            ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop(
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'truehost'
            ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop(
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'truehost'
            ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop(
                'Sorry, but you do not have the correct permissions to activate the %s plugin.',
                'Sorry, but you do not have the correct permissions to activate the %s plugins.',
                'truehost'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop(
                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                'truehost'
            ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop(
                'Sorry, but you do not have the correct permissions to update the %s plugin.',
                'Sorry, but you do not have the correct permissions to update the %s plugins.',
                'truehost'
            ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                'truehost'
            ),
            'activate_link'                   => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                'truehost'
            ),
            'return'                          => __( 'Return to Required Plugins Installer', 'truehost' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'truehost' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'truehost' ), // %s = dashboard link.
            'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),

            'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}
?>