<?php
/*
Plugin Name: Carrie Theme Addons
Plugin URI: http://creanncy.com/
Description: 1-Click Demo Import and other extra theme features
Author: Creanncy
Version: 2.1
Author URI: http://creanncy.com/
Text Domain: carrie-ta
License: General Public License
*/

// Load translated strings
add_action( 'init', 'carrie_ta_load_textdomain' );

// load init
add_action( 'init', 'carrie_ta_init' );

// after theme load
add_action('after_setup_theme', 'carrie_ta_after_setup_theme');

// flush rewrite rules on deactivation
register_deactivation_hook( __FILE__, 'carrie_ta_deactivation' );

function carrie_ta_deactivation() {
	// Clear the permalinks to remove our post type's rules
	flush_rewrite_rules();
}

function carrie_ta_load_textdomain() {
	load_plugin_textdomain( 'carrie_ta_plugin', false, basename( dirname( __FILE__ ) ) . '/languages' );
}

// Init
function carrie_ta_init() {
	global $pagenow;

	// Remove issues with prefetching adding extra views
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

	// Custom User social profiles
	function carrie_add_to_author_profile( $contactmethods ) {

	    $social_array = array('facebook' => 'Facebook', 'twitter' => 'Twitter', 'vk' => 'Vkontakte', 'google-plus' => 'Google Plus', 'behance' => 'Behance', 'linkedin' => 'LinkedIn', 'pinterest' => 'Pinterest', 'deviantart' => 'DeviantArt', 'dribbble' => 'Dribbble',  'flickr' => 'Flickr', 'instagram' => 'Instagram', 'skype' => 'Skype', 'tumblr' => 'Tumblr', 'twitch' => 'Twitch', 'vimeo-square' => 'Vimeo', 'youtube' => 'Youtube');

	    foreach ($social_array as $social_key => $social_value) {
	        # code...
	        $contactmethods[$social_key.'_profile'] = $social_value.' Profile URL';
	    }

	    return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'carrie_add_to_author_profile', 10, 1);

	// 1-click demo importer
	if (( $pagenow !== 'admin-ajax.php' ) && (is_admin())) {
		require plugin_dir_path( __FILE__ ).'inc/oneclick-demo-import/init.php';
	}
}

// After theme load
function carrie_ta_after_setup_theme() {
	// Allow shortcodes in widgets
	add_filter('widget_text', 'do_shortcode');
	add_filter('widget_carrie_text', 'do_shortcode');
}

// Custom shortcodes
function carrie_social_icons_shortcode( $atts ) {
    echo '<div class="widget_carrie_social_icons shortcode_carrie_social_icons">';
    carrie_social_show();
    echo '</div>';
}
add_shortcode( 'carrie_social_icons', 'carrie_social_icons_shortcode' );

/**
*	Social share links function
*/
function carrie_social_share_links() {

	$post_image_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID () ), 'carrie-blog-thumb');

	if(has_post_thumbnail( get_the_ID () )) {
	    $post_image = $post_image_data[0];
	} else {
		$post_image = '';
	}
	?>
	<div class="post-social-wrapper">
		<div class="post-social">
			<a title="<?php esc_html_e("Share this", 'carrie'); ?>" href="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" class="facebook-share"> <i class="fa fa-facebook"></i></a><a title="<?php esc_html_e("Tweet this", 'carrie'); ?>" href="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" class="twitter-share"> <i class="fa fa-twitter"></i></a><a title="<?php esc_html_e("Share with Google Plus", 'carrie'); ?>" href="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" class="googleplus-share"> <i class="fa fa-google-plus"></i></a><a title="<?php esc_html_e("Pin this", 'carrie'); ?>" href="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" data-image="<?php echo esc_attr($post_image); ?>" class="pinterest-share"> <i class="fa fa-pinterest"></i></a>
		</div>
		<div class="clear"></div>
	</div>
	<?php
}

add_action('carrie_social_share', 'carrie_social_share_links');

/**
*	Posts views count
*/
function carrie_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return 0;
    }
    return $count;
}

function carrie_setPostViews() {

    global $post;
    $postID = $post->ID;

    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
add_action('carrie_set_post_views', 'carrie_setPostViews');

/**
*	Posts views display
*/
function carrie_post_views_display($custompost = '') {

	global $post;

	if($custompost !== '' ) {
		$post = $custompost;
	}

	$post_views = carrie_getPostViews($post->ID);

	if($post_views < 1) {
	    $post_views = 0;
	}

	echo esc_html($post_views).' '.esc_html__('Views', 'carrie-ta');

}
add_action('carrie_post_views', 'carrie_post_views_display');

// Theme metaboxes
require plugin_dir_path( __FILE__ ).'inc/theme-metaboxes.php';

// Theme widgets
require plugin_dir_path( __FILE__ ).'inc/theme-widgets.php';
