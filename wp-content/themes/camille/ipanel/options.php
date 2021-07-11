<?php
/**
 * SETTINGS TAB
 **/
$ipanel_camille_tabs[] = array(
	'name' => esc_html__('Main Settings', 'camille'),
	'id' => 'main_settings'
);

$ipanel_camille_option[] = array(
	"type" => "StartTab",
	"id" => "main_settings"
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable theme CSS3 animations", 'camille'),
	"id" => "enable_theme_animations",
	"std" => true,
	"desc" => esc_html__("Enable colors and background colors fade effects", 'camille'),
	"type" => "checkbox",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable theme images scale animations on hover", 'camille'),
	"id" => "enable_images_animations",
	"std" => true,
	"desc" => esc_html__("Enable scale effects on some featured images hover in posts", 'camille'),
	"type" => "checkbox",
);

$ipanel_camille_option[] = array(
	"type" => "EndTab"
);
/**
 * Header TAB
 **/
$ipanel_camille_tabs[] = array(
	'name' => esc_html__('Header', 'camille'),
	'id' => 'header_settings'
);

$ipanel_camille_option[] = array(
	"type" => "StartTab",
	"id" => "header_settings"
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Header layout", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Body Background image or pattern", 'camille'),
	"id" => "body_bg_image",
	"field_options" => array(
		"std" => ''
	),
	"desc" => esc_html__("Upload your site body background image if you want to show it. Remove image to remove background.", 'camille'),
	"type" => "qup",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Body Background image behaviour", 'camille'),
	"id" => "body_bg_style",
	"std" => "cover",
	"options" => array(
		"none" => esc_html__("Default", 'camille'),
		"repeat" => esc_html__("Repeat (for pattern)", 'camille'),
		"cover" => esc_html__("Cover (for large image)", 'camille')
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Header Background image or pattern", 'camille'),
	"id" => "header_bg_image",
	"field_options" => array(
		"std" => ''
	),
	"desc" => esc_html__("Upload your site header background image if you want to show it. Remove image to remove background.", 'camille'),
	"type" => "qup",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Header Background image behaviour", 'camille'),
	"id" => "header_bg_style",
	"std" => "cover",
	"options" => array(
		"none" => esc_html__("Default", 'camille'),
		"repeat" => esc_html__("Repeat (for pattern)", 'camille'),
		"cover" => esc_html__("Cover (for large image)", 'camille')
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Disable Header", 'camille'),
	"id" => "disable_header",
	"std" => false,
	"desc" => esc_html__("This option will disable ALL header (with menu below header, logo, etc). Useful for minimalistic themes with left/right sidebar used to show logo and menu.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Header height in pixels", 'camille'),
	"id" => "header_height",
	"std" => "225",
	"desc" => esc_html__("Default: 225", 'camille'),
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Disable top menu", 'camille'),
	"id" => "disable_top_menu",
	"std" => false,
	"desc" => esc_html__("This option will disable top menu (first menu with social icons and additional links)", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Top menu style", 'camille'),
	"id" => "header_top_menu_style",
	"std" => "menu_black",
	"options" => array(
		"menu_white" => esc_html__("White menu", 'camille'),
		"menu_black" => esc_html__("Black menu", 'camille'),
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Disable search in header menu", 'camille'),
	"id" => "disable_top_menu_search",
	"std" => false,
	"desc" => esc_html__("This option will disable search form in header menu", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Disable text tagline in header", 'camille'),
	"id" => "disable_header_tagline",
	"std" => false,
	"desc" => esc_html__("This option will disable text tagline in header", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"type" => "htmlpage",
	"name" => wp_kses_post(__('<div class="ipanel-label">
	    <label>Logo upload</label>
	  </div><div class="ipanel-input">
	    You can upload your website logo in <a href="customize.php" target="_blank">WordPress Customizer</a> (in "Header Image" section at the left sidebar).<br/><br/><br/>
	  </div>', 'camille'))
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Logo width (px)", 'camille'),
	"id" => "logo_width",
	"std" => "370",
	"desc" => esc_html__("Default: 370. Upload retina logo (2x size) and input your regular logo width here. For example if your retina logo have 400px width put 200 value here. If you does not use retina logo input regular logo width here (your logo image width).", 'camille'),
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Sticky/Fixed top header (with menu, search, social icons)", 'camille'),
	"id" => "enable_sticky_header",
	"std" => false,
	"desc" => esc_html__("Top Header will be fixed to top if enabled", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Show site logo in sticky header", 'camille'),
	"id" => "enable_sticky_header_logo",
	"std" => false,
	"desc" => esc_html__("Top Header will be fixed to top if enabled", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable left side offcanvas floating sidebar menu", 'camille'),
	"id" => "enable_offcanvas_sidebar",
	"std" => false,
	"desc" => esc_html__("Sidebar can be opened by toggle button near header mini cart. You can add widgets to this sidebar in 'Offcanvas Right sidebar' in Appearance > Widgets", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("MainMenu font decoration", 'camille'),
	"id" => "header_menu_font_decoration",
	"std" => "uppercase",
	"options" => array(
		"uppercase" => esc_html__("Uppercase letters", 'camille'),
		"italic" => esc_html__("Italic letters", 'camille'),
		"none" => esc_html__("None", 'camille'),
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("MainMenu font size", 'camille'),
	"id" => "header_menu_font_size",
	"std" => "largefont",
	"options" => array(
		"largefont" => esc_html__("Large font", 'camille'),
		"normalfont" => esc_html__("Normal font", 'camille')
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("MainMenu dropdown arrows style for submenus", 'camille'),
	"id" => "header_menu_arrow_style",
	"std" => "downarrow",
	"options" => array(
		"rightarrow" => esc_html__("Right arrow", 'camille'),
		"downarrow" => esc_html__("Down arrow", 'camille'),
		"noarrow" => esc_html__("Disable arrow", 'camille')
	),
	"desc" => "",
	"type" => "select",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Header Logo position", 'camille'),
	"id" => "header_logo_position",
	"options" => array(
		'left' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/header_block_position_1.png',
			"label" => esc_html__('Left', 'camille')
		),
		'center' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/header_block_position_2.png',
			"label" => esc_html__('Center', 'camille')
		),
		'right' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/header_block_position_3.png',
			"label" => esc_html__('Right', 'camille')
		),
	),
	"std" => "center",
	"desc" => "",
	"type" => "image",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Header Banner position", 'camille'),
	"id" => "header_banner_position",
	"options" => array(
		'left' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/header_block_position_1.png',
			"label" => esc_html__('Left', 'camille')
		),
		'center' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/header_block_position_2.png',
			"label" => esc_html__('Center', 'camille')
		),
		'right' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/header_block_position_3.png',
			"label" => esc_html__('Right', 'camille')
		),
		'disable' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/header_block_position_0.png',
			"label" => esc_html__('Disable', 'camille')
		)
	),
	"std" => "disable",
	"desc" => esc_html__("You can show banner image or some text in your header. Make sure that you use different positions for logo and your banner (for example logo at the left and banner at the right).", 'camille'),
	"type" => "image",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Header Banner content", 'camille'),
	"id" => "header_banner_editor",
	"std" => '',
	"desc" => esc_html__("If you selected Header banner position below you can use any HTML here to show your banner or other content in header.", 'camille'),
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);
$ipanel_camille_option[] = array(

	"name" => esc_html__("Social icons", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"type" => "info",
	"name" => esc_html__("Leave URL fields blank to hide this social icons", 'camille'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Facebook Page url", 'camille'),
	"id" => "facebook",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Vkontakte page url", 'camille'),
	"id" => "vk",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Twitter Page url", 'camille'),
	"id" => "twitter",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Google+ Page url", 'camille'),
	"id" => "google-plus",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("LinkedIn Page url", 'camille'),
	"id" => "linkedin",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Dribbble Page url", 'camille'),
	"id" => "dribbble",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Behance Page url", 'camille'),
	"id" => "behance",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Instagram Page url", 'camille'),
	"id" => "instagram",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Tumblr page url", 'camille'),
	"id" => "tumblr",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Pinterest page url", 'camille'),
	"id" => "pinterest",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Vimeo page url", 'camille'),
	"id" => "vimeo-square",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("YouTube page url", 'camille'),
	"id" => "youtube",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Skype url", 'camille'),
	"id" => "skype",
	"std" => "",
	"desc" => "",
	"type" => "text",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);
$ipanel_camille_option[] = array(
	"type" => "EndTab"
);
/**
 * FOOTER TAB
 **/
$ipanel_camille_tabs[] = array(
	'name' => esc_html__('Footer', 'camille'),
	'id' => 'footer_settings'
);
$ipanel_camille_option[] = array(
	"type" => "StartTab",
	"id" => "footer_settings"
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Show 'Footer light sidebar' only on homepage", 'camille'),
	"id" => "footer_sidebar_1_homepage_only",
	"std" => true,
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Display Instagram Feed in Footer", 'camille'),
	"id" => "footer_instagram_display",
	"std" => false,
	"desc" => wp_kses_post(__("<a href='https://wordpress.org/plugins/instagram-feed/' target='_blank'>Instagram Feed</a> plugin must be installed and configured by theme documentation before enabling this option.", 'camille')),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Footer Instagram title", 'camille'),
	"id" => "footer_instagram_title",
	"std" => "Instagram",
	"desc" => esc_html__("Leave empty if you don't want to show text title.", 'camille'),
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Footer Instagram subtitle", 'camille'),
	"id" => "footer_instagram_subtitle",
	"std" => "Get personal and follow me on",
	"desc" => esc_html__("Leave empty if you don't want to show text subtitle.", 'camille'),
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable Footer Menu", 'camille'),
	"id" => "footer_enable_menu",
	"std" => false,
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable Social Icons in Footer", 'camille'),
	"id" => "footer_enable_social",
	"std" => true,
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Upload Footer Logo", 'camille'),
	"id" => "footer_logo",
	"field_options" => array(
		"std" => get_template_directory_uri().'/img/footer-logo.png'
	),
	"desc" => esc_html__("Upload your site footer logo. Remove image if you dont want to show logo in footer.", 'camille'),
	"type" => "qup",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Footer Logo width (px)", 'camille'),
	"id" => "footer_logo_width",
	"std" => "370",
	"desc" => esc_html__("Default: 370. Upload retina logo (2x size) and input your regular logo width here. For example if your retina logo have 400px width put 200 value here. If you does not use retina logo input regular logo width here (your logo image width).", 'camille'),
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Footer copyright text", 'camille'),
	"id" => "footer_copyright_editor",
	"std" => esc_html__("Powered by Camille - Premium Wordpress Theme", 'camille'),
	"desc" => "",
	"field_options" => array(
		'media_buttons' => false
	),
	"type" => "wp_editor",
);

$ipanel_camille_option[] = array(
	"type" => "EndTab"
);

/**
 * SIDEBARS TAB
 **/
$ipanel_camille_tabs[] = array(
	'name' => esc_html__('Sidebars', 'camille'),
	'id' => 'sidebar_settings'
);

$ipanel_camille_option[] = array(
	"type" => "StartTab",
	"id" => "sidebar_settings"
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Blog page sidebar position", 'camille'),
	"id" => "blog_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => esc_html__('Left', 'camille')
		),
		'right' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => esc_html__('Right', 'camille')
		),
		'disable' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => esc_html__('Disable sidebar', 'camille')
		),
	),
	"std" => "right",
	"desc" => "",
	"type" => "image",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Pages sidebar position", 'camille'),
	"id" => "page_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => esc_html__('Left', 'camille')
		),
		'right' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => esc_html__('Right', 'camille')
		),
		'disable' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => esc_html__('Disable sidebar', 'camille')
		),
	),
	"std" => "disable",
	"desc" => "",
	"type" => "image",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Blog Archive page sidebar position", 'camille'),
	"id" => "archive_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => esc_html__('Left', 'camille')
		),
		'right' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => esc_html__('Right', 'camille')
		),
		'disable' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => esc_html__('Disable sidebar', 'camille')
		),
	),
	"std" => "right",
	"desc" => "",
	"type" => "image",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Blog Search page sidebar position", 'camille'),
	"id" => "search_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => esc_html__('Left', 'camille')
		),
		'right' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => esc_html__('Right', 'camille')
		),
		'disable' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => esc_html__('Disable sidebar', 'camille')
		),
	),
	"std" => "right",
	"desc" => "",
	"type" => "image",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Blog post sidebar position", 'camille'),
	"id" => "post_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => esc_html__('Left', 'camille')
		),
		'right' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => esc_html__('Right', 'camille')
		),
		'disable' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => esc_html__('Disable sidebar', 'camille')
		),
	),
	"std" => "disable",
	"desc" => "",
	"type" => "image",
);

$ipanel_camille_option[] = array(
	"type" => "EndTab"
);
/**
 * BLOG TAB
 **/
$ipanel_camille_tabs[] = array(
	'name' => esc_html__('Blog', 'camille'),
	'id' => 'blog_settings'
);
$ipanel_camille_option[] = array(
	"type" => "StartTab",
	"id" => "blog_settings"
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Main Blog settings", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Blog layout", 'camille'),
	"id" => "blog_layout",
	"options" => array(
		'layout_default' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/blog_layout_1.png',
			"label" => esc_html__('Default layout', 'camille')
		),
		'layout_vertical_design' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/blog_layout_2.png',
			"label" => esc_html__('Show every third post in vertical design', 'camille')
		),
		'layout_2column_design' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/blog_layout_3.png',
			"label" => esc_html__('Show second and next posts in 2 columns', 'camille')
		),
		'layout_list' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/blog_layout_4.png',
			"label" => esc_html__('List with short posts blocks', 'camille')
		),
		'layout_list_advanced' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/blog_layout_5.png',
			"label" => esc_html__('List with short posts and big blocks (every third post)', 'camille')
		),
		'layout_masonry' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/blog_layout_6.png',
			"label" => esc_html__('Masonry layout', 'camille')
		),
		'layout_text' => array(
			"image" => CAMILLE_IPANEL_URI . 'option-images/blog_layout_7.png',
			"label" => esc_html__('Centered text (Minimnalistic, No images)', 'camille')
		),
	),
	"std" => "layout_default",
	"desc" => esc_html__("This option will completely change blog listing layout and posts display.", 'camille'),
	"type" => "image",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Blog posts titles style", 'camille'),
	"id" => "blog_posttitle_font_decoration",
	"std" => "uppercase",
	"options" => array(
		"none" => esc_html__("Normal", 'camille'),
		"italic" => esc_html__("Italic", 'camille'),
		"uppercase" => esc_html__("UPPERCASE", 'camille'),
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Show blog posts in listing as", 'camille'),
	"id" => "blog_post_loop_type",
	"std" => "content",
	"options" => array(
		"content" => esc_html__("Full content (You will add More tag manually)", 'camille'),
		"excerpt" => esc_html__("Excerpt (Auto crop by words)", 'camille'),
	),
	"desc" => esc_html__("We recommend you to use Fullwidth layout for Slider Style 3", 'camille'),
	"type" => "select",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Post excerpt length (words)", 'camille'),
	"id" => "post_excerpt_legth",
	"std" => "40",
	"desc" => esc_html__("Used by WordPress for post shortening. Default: 40", 'camille'),
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Disable blog posts loop on main Blog page (Blog homepage)", 'camille'),
	"id" => "blog_disable_posts_loop",
	"std" => false,
	"desc" => esc_html__("Enable this options if you does not want to show posts on your blog homepage. You can use this to create minimalistic website (you will have just blog slider, welcome blocks and editor's picks blocks on homepage.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Show author name ('by author') in blog posts", 'camille'),
	"id" => "blog_post_show_author",
	"std" => false,
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Show related posts on posts listing page", 'camille'),
	"id" => "blog_list_show_related",
	"std" => false,
	"desc" => esc_html__("Will show 3 related posts after every post in posts list. Does not available in Masonry layout and 2 column layout.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Show Post Views counters in posts blocks", 'camille'),
	"id" => "blog_enable_post_views_counter",
	"std" => true,
	"desc" => esc_html__("This option will enable post views counter display in sliders, popular posts, editor picks, reagular posts blocks.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Show Post Comments counters in posts blocks", 'camille'),
	"id" => "blog_enable_post_comments_counter",
	"std" => true,
	"desc" => esc_html__("This option will enable post comments counter display in sliders, popular posts, editor picks, reagular posts blocks.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Featured Posts Slider settings", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"type" => "info",
	"field_options" => array(
		"style" => 'alert'
	),
	"name" => wp_kses_post(__('<p>To add your posts to Featured Posts Slider you need to edit your post and set it as featured for slider in Post Settings box.</p>', 'camille'))
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Show Featured Posts Slider on homepage", 'camille'),
	"id" => "blog_enable_homepage_slider",
	"std" => true,
	"desc" => esc_html__("You can mark posts as featured in post edit screen at the bottom settings box to display it in slider in homepage header.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Featured Posts Slider width", 'camille'),
	"id" => "blog_homepage_slider_fullwidth",
	"std" => "0",
	"options" => array(
		"1" => esc_html__("Fullwidth", 'camille'),
		"0" => esc_html__("Boxed", 'camille'),
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Featured Posts Slider height", 'camille'),
	"id" => "blog_homepage_slider_height",
	"std" => "530",
	"field_options" => array(
		"min" => 250,
		"max" => 800,
		"step" => 5,
		"dimension" => 'px',
		"animation" => true
	),
	"desc" => esc_html__("Drag to change value. Default: 530px", 'camille'),
	"type" => "slider",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Featured Posts Slider items per row", 'camille'),
	"id" => "blog_homepage_slider_items",
	"std" => "1",
	"options" => array(
		"4" => "4",
		"3" => "3",
		"2" => "2",
		"1" => "1",
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Featured Posts Slider post details layout", 'camille'),
	"id" => "blog_homepage_slider_post_details_layout",
	"std" => "horizontal",
	"options" => array(
		"horizontal" => esc_html__("Horizontal", 'camille'),
		"vertical" => esc_html__("Vertical", 'camille'),
	),
	"desc" => esc_html__("Select where to show post details (title, description, category, etc) in blog posts inside slider. 'Vertical' value will work only if you set 1 items per row in option above.", 'camille'),
	"type" => "select",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Featured Posts Slider posts titles style", 'camille'),
	"id" => "blog_homepage_slider_posttitle_font_decoration",
	"std" => "italic",
	"options" => array(
		"none" => esc_html__("Normal", 'camille'),
		"italic" => esc_html__("Italic", 'camille'),
		"uppercase" => esc_html__("UPPERCASE", 'camille'),
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Merge slider slides", 'camille'),
	"id" => "blog_enable_homepage_merge_slider",
	"std" => false,
	"desc" => esc_html__("Check if you want to see different slides widths in one row.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Center active slide", 'camille'),
	"id" => "blog_enable_homepage_center_slide",
	"std" => false,
	"desc" => esc_html__("Check if you want to see current slide centered and near slides cropped. Work best with slides per row set to 2 or 4.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Featured Posts Slider autoplay", 'camille'),
	"id" => "blog_homepage_slider_autoplay",
	"std" => "3000",
	"options" => array(
		"10000" => esc_html__("Enable - 10 seconds", 'camille'),
		"5000" => esc_html__("Enable - 5 seconds", 'camille'),
		"3000" => esc_html__("Enable - 3 seconds", 'camille'),
		"2000" => esc_html__("Enable - 2 seconds", 'camille'),
		"1000" => esc_html__("Enable - 1 second", 'camille'),
		"0" => esc_html__("Disable", 'camille'),
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Featured Posts Slider navigation arrows", 'camille'),
	"id" => "blog_homepage_slider_navigation",
	"std" => "1",
	"options" => array(
		"1" => esc_html__("Enable", 'camille'),
		"0" => esc_html__("Disable", 'camille'),
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Featured Posts Slider pagination buttons", 'camille'),
	"id" => "blog_homepage_slider_pagination",
	"std" => "false",
	"options" => array(
		"true" => esc_html__("Enable", 'camille'),
		"false" => esc_html__("Disable", 'camille'),
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Welcome Block settings", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Show Welcome Block on homepage", 'camille'),
	"id" => "blog_enable_homepage_welcome_block",
	"std" => true,
	"desc" => esc_html__("You can display any HTML content in this block below your slider or header.", 'camille'),
	"type" => "checkbox",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Homepage Welcome Block content", 'camille'),
	"id" => "blog_homepage_welcome_block_content",
	"std" => '',
	"desc" => esc_html__("You can use any HTML here to display any content in your welcome block with predefined layout.", 'camille'),
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Editor's Picks Homepage Block settings", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"type" => "info",
	"field_options" => array(
		"style" => 'alert'
	),
	"name" => wp_kses_post(__("<p>To add your posts to Editor's Picks Block you need to edit your post and set it as Editors Pick post in Post Settings box.</p>", 'camille'))
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Show Editor's Picks Block on homepage footer", 'camille'),
	"id" => "blog_enable_homepage_editorspick_posts",
	"std" => false,
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Editor's Picks Block title", 'camille'),
	"id" => "blog_homepage_editorspick_posts_title",
	"std" => esc_html__("Editor's Picks", 'camille'),
	"desc" => esc_html__("Change default Editor's Picks Posts block title. Leave empty to hide title.", 'camille'),
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Editor's Picks Block subtitle", 'camille'),
	"id" => "blog_homepage_editorspick_posts_subtitle",
	"std" => esc_html__("Featured posts from Camille", 'camille'),
	"desc" => esc_html__("Change default Editor's Picks  block subtitle. Leave empty to hide title.", 'camille'),
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Editors Picks Block posts limit (rows)", 'camille'),
	"id" => "blog_homepage_editorspick_posts_limit",
	"std" => "1",
	"options" => array(
		"1" => esc_html__("One row", 'camille'),
		"2" => esc_html__("Two rows", 'camille'),
	),
	"desc" => "",
	"type" => "select",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Editor's Picks Block posts category slug", 'camille'),
	"id" => "blog_homepage_editorspick_posts_category",
	"std" => "",
	"desc" => esc_html__("If you want to show popular posts only from some category specify it's SLUG here (You can create special category like 'Picks' and assing posts to it if you want to show only selected posts). You can see/set category SLUG when you edit category. Leave empty to show posts from all categories.", 'camille'),
	"type" => "text",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Single Post page settings", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Use smaller content width on single posts and pages without sidebar", 'camille'),
	"id" => "blog_enable_small_page_width",
	"std" => true,
	"desc" => esc_html__("This option add left/right margins on all pages and posts without sidebars to make your content width smaller.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Show author info and avatar after single blog post", 'camille'),
	"id" => "blog_enable_author_info",
	"std" => true,
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Show comments and share links in Single Post header below post title", 'camille'),
	"id" => "blog_enable_singlepost_header_info",
	"std" => true,
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable Drop Caps (first big letter) in single post pages", 'camille'),
	"id" => "blog_enable_dropcaps",
	"std" => true,
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Show Post Views counters in Single Post", 'camille'),
	"id" => "blog_enable_post_views_counter_sp",
	"std" => true,
	"desc" => esc_html__("This option will enable post views counter display on single blog post page.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Show related posts on single post page", 'camille'),
	"id" => "blog_post_show_related",
	"std" => true,
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Hide post featured image on single post page", 'camille'),
	"id" => "blog_post_hide_featured_image",
	"std" => false,
	"desc" => esc_html__("Enable this if you don't want to see featured post image on single post page.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Show prev/next posts navigation links on single post page", 'camille'),
	"id" => "blog_post_navigation",
	"std" => true,
	"desc" => "",
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);
$ipanel_camille_option[] = array(
	"type" => "EndTab"
);

/**
 * FONTS TAB
 **/

$ipanel_camille_tabs[] = array(
	'name' => esc_html__('Fonts', 'camille'),
	'id' => 'font_settings'
);

$ipanel_camille_option[] = array(
	"type" => "StartTab",
	"id" => "font_settings"
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Headers font", 'camille'),
	"id" => "header_font",
	"desc" => esc_html__("Font used in headers. Default: Playfair Display", 'camille'),
	"options" => array(
		"font-sizes" => array(
			" " => esc_html__("Font Size", 'camille'),
			'11' => '11px',
			'12' => '12px',
			'13' => '13px',
			'14' => '14px',
			'15' => '15px',
			'16' => '16px',
			'17' => '17px',
			'18' => '18px',
			'19' => '19px',
			'20' => '20px',
			'21' => '21px',
			'22' => '22px',
			'23' => '23px',
			'24' => '24px',
			'25' => '25px',
			'26' => '26px',
			'27' => '27px',
			'28' => '28px',
			'29' => '29px',
			'30' => '30px',
			'31' => '31px',
			'32' => '32px',
			'33' => '33px',
			'34' => '34px',
			'35' => '35px',
			'36' => '36px',
			'37' => '37px',
			'38' => '38px',
			'39' => '39px',
			'40' => '40px',
			'41' => '41px',
			'42' => '42px',
			'43' => '43px',
			'44' => '44px',
			'45' => '45px',
			'46' => '46px',
			'47' => '47px',
			'48' => '48px',
			'49' => '49px',
			'50' => '50px'
		),
		"color" => false,
		"font-families" => iPanel::getGoogleFonts(),
		"font-styles" => false
	),
	"std" => array(
		"font-size" => '26',
		"font-family" => 'Playfair Display'
	),
	"type" => "typography"
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Headers font parameters for Google Font", 'camille'),
	"id" => "header_font_options",
	"std" => "400,400italic,700,700italic",
	"desc" => esc_html__("You can specify additional Google Fonts paramaters here, for example fonts styles to load. Default: 400,400italic,700,700italic", 'camille'),
	"type" => "text",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Body font", 'camille'),
	"id" => "body_font",
	"desc" => esc_html__("Font used in text elements. Default: Merriweather", 'camille'),
	"options" => array(
		"font-sizes" => array(
			" " => "Font Size",
			'11' => '11px',
			'12' => '12px',
			'13' => '13px',
			'14' => '14px',
			'15' => '15px',
			'16' => '16px',
			'17' => '17px',
			'18' => '18px',
			'19' => '19px',
			'20' => '20px',
			'21' => '21px',
			'22' => '22px',
			'23' => '23px',
			'24' => '24px',
			'25' => '25px',
			'26' => '26px',
			'27' => '27px'
		),
		"color" => false,
		"font-families" => iPanel::getGoogleFonts(),
		"font-styles" => false
	),
	"std" => array(
		"font-size" => '14',
		"font-family" => 'Merriweather'
	),
	"type" => "typography"
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Body font parameters for Google Font", 'camille'),
	"id" => "body_font_options",
	"std" => "400,400italic,700,700italic",
	"desc" => esc_html__("You can specify additional Google Fonts paramaters here, for example fonts styles to load. Default: 400,400italic,700,700italic", 'camille'),
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Additional font", 'camille'),
	"id" => "additional_font",
	"desc" => esc_html__("You can select any additional Google font here and use it in Custom CSS in theme. Default: Merriweather", 'camille'),
	"options" => array(
		"font-sizes" => array(
			" " => esc_html__("Font Size", 'camille'),
			'11' => '11px',
			'12' => '12px',
			'13' => '13px',
			'14' => '14px',
			'15' => '15px',
			'16' => '16px',
			'17' => '17px',
			'18' => '18px',
			'19' => '19px',
			'20' => '20px',
			'21' => '21px',
			'22' => '22px',
			'23' => '23px',
			'24' => '24px',
			'25' => '25px',
			'26' => '26px',
			'27' => '27px',
			'28' => '28px',
			'29' => '29px',
			'30' => '30px',
			'31' => '31px',
			'32' => '32px',
			'33' => '33px',
			'34' => '34px',
			'35' => '35px',
			'36' => '36px',
			'37' => '37px',
			'38' => '38px',
			'39' => '39px',
			'40' => '40px',
			'41' => '41px',
			'42' => '42px',
			'43' => '43px',
			'44' => '44px',
			'45' => '45px',
			'46' => '46px',
			'47' => '47px',
			'48' => '48px',
			'49' => '49px',
			'50' => '50px'
		),
		"color" => false,
		"font-families" => iPanel::getGoogleFonts(),
		"font-styles" => false
	),
	"std" => array(
		"font-size" => '12',
		"font-family" => 'Merriweather'
	),
	"type" => "typography"
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Additional font parameters for Google Font", 'camille'),
	"id" => "additional_font_options",
	"std" => "400,400italic,700,700italic",
	"desc" => esc_html__("You can specify additional Google Fonts paramaters here, for example fonts styles to load. Default: 400,400italic,700,700italic", 'camille'),
	"type" => "text",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable Additional font", 'camille'),
	"id" => "additional_font_enable",
	"std" => false,
	"desc" => esc_html__("Uncheck if you don't want to use Additional font. This will speed up your site.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Disable ALL Google Fonts on site", 'camille'),
	"id" => "font_google_disable",
	"std" => false,
	"desc" => esc_html__("Use this if you want extra site speed or want to have regular fonts. Arial font will be used with this option.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Regular font (apply if you disabled Google Fonts below)", 'camille'),
	"id" => "font_regular",
	"std" => "Arial",
	"options" => array(
		"Arial" => "Arial",
		"Tahoma" => "Tahoma",
		"Times New Roman" => "Times New Roman",
		"Verdana" => "Verdana",
		"Helvetica" => "Helvetica",
		"Georgia" => "Georgia",
		"Courier New" => "Courier New"
	),
	"desc" => esc_html__("Use this option if you disabled ALL Google Fonts.", 'camille'),
	"type" => "select",
);
$ipanel_camille_option[] = array(
	"type" => "EndTab"
);

/**
 * COLORS TAB
 **/

$ipanel_camille_tabs[] = array(
	'name' => esc_html__('Colors & Skins', 'camille'),
	'id' => 'color_settings'
);

$ipanel_camille_option[] = array(
	"type" => "StartTab",
	"id" => "color_settings",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Predefined color skins", 'camille'),
	"id" => "color_skin_name",
	"std" => "none",
	"options" => array(
		"none" => esc_html__("Use colors specified below", 'camille'),
		"default" => esc_html__("Camille (Default)", 'camille'),
		"black" => esc_html__("Black", 'camille'),
		"grey" => esc_html__("Grey", 'camille'),
		"lightblue" => esc_html__("Light blue", 'camille'),
		"blue" => esc_html__("Blue", 'camille'),
		"red" => esc_html__("Red", 'camille'),
		"green" => esc_html__("Green", 'camille'),
		"orange" => esc_html__("Orange", 'camille'),
		"redorange" => esc_html__("RedOrange", 'camille'),
		"brown" => esc_html__("Brown", 'camille'),
	),
	"desc" => esc_html__("Select one of predefined skins or use your own colors. If you selected any predefined styles your specified colors below will NOT be applied.", 'camille'),
	"type" => "select",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Body background color", 'camille'),
	"id" => "theme_body_color",
	"std" => "#FFFFFF",
	"desc" => esc_html__("Used in many theme places, default: #FFFFFF", 'camille'),
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Body text color", 'camille'),
	"id" => "theme_text_color",
	"std" => "#000000",
	"desc" => esc_html__("Body text color, default: #000000", 'camille'),
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Theme main color", 'camille'),
	"id" => "theme_main_color",
	"std" => "#F37879",
	"desc" => esc_html__("Used in many theme places, buttons, links, etc. Default: #F37879", 'camille'),
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Header background color", 'camille'),
	"id" => "theme_header_bg_color",
	"std" => "#FFFFFF",
	"desc" => esc_html__("Default: #FFFFFF", 'camille'),
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Category menu background color", 'camille'),
	"id" => "theme_cat_menu_bg_color",
	"std" => "#FFFFFF",
	"desc" => esc_html__("This background will be used for main menu below header. Default: #FFFFFF", 'camille'),
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Footer background color", 'camille'),
	"id" => "theme_footer_color",
	"std" => "#1E1C1C",
	"desc" => esc_html__("Default: #1E1C1C", 'camille'),
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_camille_option[] = array(
	"type" => "EndTab"
);

/**
 * BANNERS CODE TAB
 **/
$ipanel_camille_tabs[] = array(
	'name' => esc_html__('Ads management', 'camille'),
	'id' => 'banners_management'
);
$ipanel_camille_option[] = array(
	"type" => "StartTab",
	"id" => "banners_management",
);
$ipanel_camille_option[] = array(
	"type" => "info",
	"name" => esc_html__("Click ads position name to open settings box.", 'camille'),
	"field_options" => array(
		"style" => 'alert'
	)
);
// BANNER OPTIONS
$ipanel_camille_option[] = array(
	"name" => esc_html__("Site Header Banner", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"type" => "info",
	"name" => esc_html__("This banner will be displayed below site Header on all pages.", 'camille'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable Banner", 'camille'),
	"id" => "banner_enable_below_header",
	"std" => false,
	"desc" => esc_html__("You can display any HTML content in this block to show your advertisement.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Banner HTML code", 'camille'),
	"id" => "banner_below_header_content",
	"std" => '',
	"desc" => "",
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_camille_option[] = array(
	"name" => esc_html__("Site Above Footer Banner", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"type" => "info",
	"name" => esc_html__("This banner will be displayed above site footer on all pages.", 'camille'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable Banner", 'camille'),
	"id" => "banner_enable_above_footer",
	"std" => false,
	"desc" => esc_html__("You can display any HTML content in this block to show your advertisement.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Banner HTML code", 'camille'),
	"id" => "banner_above_footer_content",
	"std" => '',
	"desc" => "",
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_camille_option[] = array(
	"name" => esc_html__("Site Footer Banner", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"type" => "info",
	"name" => esc_html__("This banner will be displayed in site footer on all pages.", 'camille'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable Banner", 'camille'),
	"id" => "banner_enable_footer",
	"std" => false,
	"desc" => esc_html__("You can display any HTML content in this block to show your advertisement.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Banner HTML code", 'camille'),
	"id" => "banner_footer_content",
	"std" => '',
	"desc" => "",
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_camille_option[] = array(
	"name" => esc_html__("Banner Below Homepage Popular Posts Slider", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"type" => "info",
	"name" => esc_html__("This banner will be displayed on homepage below Homepage Popular Posts Slider.", 'camille'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable Banner", 'camille'),
	"id" => "banner_enable_below_homepage_popular_posts",
	"std" => false,
	"desc" => esc_html__("You can display any HTML content in this block to show your advertisement.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Banner HTML code", 'camille'),
	"id" => "banner_below_homepage_popular_posts_content",
	"std" => '',
	"desc" => "",
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_camille_option[] = array(
	"name" => esc_html__("Post Loops Middle Banner", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"type" => "info",
	"name" => esc_html__("This banner will be displayed at the middle between posts on all posts listing pages (Homepage, Archives, Search, etc). This banner does not available in Masonry and Two column blog layouts.", 'camille'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable Banner", 'camille'),
	"id" => "banner_enable_posts_loop_middle",
	"std" => false,
	"desc" => esc_html__("You can display any HTML content in this block to show your advertisement.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Banner HTML code", 'camille'),
	"id" => "banner_posts_loop_middle_content",
	"std" => '',
	"desc" => "",
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_camille_option[] = array(
	"name" => esc_html__("Post Loops Bottom Banner", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"type" => "info",
	"name" => esc_html__("This banner will be displayed at the bottom after all posts on posts listing pages (Homepage, Archives, Search, etc).", 'camille'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable Banner", 'camille'),
	"id" => "banner_enable_posts_loop_bottom",
	"std" => false,
	"desc" => esc_html__("You can display any HTML content in this block to show your advertisement.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Banner HTML code", 'camille'),
	"id" => "banner_posts_loop_bottom_content",
	"std" => '',
	"desc" => "",
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_camille_option[] = array(
	"name" => esc_html__("Single Blog Post page Top banner", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"type" => "info",
	"name" => esc_html__("This banner will be displayed on single blog post page between post content and featured image.", 'camille'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable Banner", 'camille'),
	"id" => "banner_enable_single_post_top",
	"std" => false,
	"desc" => esc_html__("You can display any HTML content in this block to show your advertisement.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Banner HTML code", 'camille'),
	"id" => "banner_single_post_top_content",
	"std" => '',
	"desc" => "",
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_camille_option[] = array(
	"name" => esc_html__("Single Blog Post page Bottom banner", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"type" => "info",
	"name" => esc_html__("This banner will be displayed on single blog post page after post content.", 'camille'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable Banner", 'camille'),
	"id" => "banner_enable_single_post_bottom",
	"std" => false,
	"desc" => esc_html__("You can display any HTML content in this block to show your advertisement.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Banner HTML code", 'camille'),
	"id" => "banner_single_post_bottom_content",
	"std" => '',
	"desc" => "",
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_camille_option[] = array(
	"name" => esc_html__("404 Page and Search Nothing Found Banner", 'camille'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_camille_option[] = array(
	"type" => "info",
	"name" => esc_html__("This banner will be displayed on 404 (page not found) and search nothing found pages.", 'camille'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Enable Banner", 'camille'),
	"id" => "banner_enable_404",
	"std" => false,
	"desc" => esc_html__("You can display any HTML content in this block to show your advertisement.", 'camille'),
	"type" => "checkbox",
);
$ipanel_camille_option[] = array(
	"name" => esc_html__("Banner HTML code", 'camille'),
	"id" => "banner_404_content",
	"std" => '',
	"desc" => "",
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_camille_option[] = array(
		"type" => "EndSection"
);
// END BANNERS
$ipanel_camille_option[] = array(
	"type" => "EndTab"
);
/**
 * CUSTOM CODE TAB
 **/

$ipanel_camille_tabs[] = array(
	'name' => esc_html__('Custom code', 'camille'),
	'id' => 'custom_code'
);

$ipanel_camille_option[] = array(
	"type" => "StartTab",
	"id" => "custom_code",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Custom JavaScript code", 'camille'),
	"id" => "custom_js_code",
	"std" => '',
	"field_options" => array(
		"language" => "javascript",
		"line_numbers" => true,
		"autoCloseBrackets" => true,
		"autoCloseTags" => true
	),
	"desc" => esc_html__("This code will run in header", 'camille'),
	"type" => "code",
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Custom CSS styles", 'camille'),
	"id" => "custom_css_code",
	"std" => '',
	"field_options" => array(
		"language" => "json",
		"line_numbers" => true,
		"autoCloseBrackets" => true,
		"autoCloseTags" => true
	),
	"desc" => esc_html__("This CSS code will be included in header", 'camille'),
	"type" => "code",
);

$ipanel_camille_option[] = array(
	"type" => "EndTab"
);

/**
 * DOCUMENTATION TAB
 **/

$ipanel_camille_tabs[] = array(
	'name' => esc_html__('Documentation', 'camille'),
	'id' => 'documentation'
);

$ipanel_camille_option[] = array(
	"type" => "StartTab",
	"id" => "documentation"
);

function get_plugin_version_number($plugin_name) {
        // If get_plugins() isn't available, require it
	if ( ! function_exists( 'get_plugins' ) )
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

        // Create the plugins folder and file variables
	$plugin_folder = get_plugins( '/' . $plugin_name );
	$plugin_file = $plugin_name.'.php';

	// If the plugin version number is set, return it
	if ( isset( $plugin_folder[$plugin_file]['Version'] ) ) {
		return $plugin_folder[$plugin_file]['Version'];

	} else {
	// Otherwise return null
		return esc_html__('Plugin not installed', 'camille');
	}
}

$ipanel_camille_option[] = array(
	"type" => "htmlpage",
	"name" => '<div class="documentation-icon"><img src="'.esc_url(CAMILLE_IPANEL_URI). 'assets/img/documentation-icon.png" alt="Documentation"/></div><p>We recommend you to read <a href="http://creanncy.com/go/camille-docs/" target="_blank">Theme Documentation</a> before you will start using our theme to building your website. It covers all steps for site configuration, demo content import, theme features usage and more.</p>
<p>If you have face any problems with our theme feel free to use our <a href="http://support.creanncy.com/" target="_blank">Support System</a> to contact us and get help for free.</p>
<a class="button button-primary" href="http://creanncy.com/go/camille-docs/" target="_blank">Theme Documentation</a>
<a class="button button-primary" href="http://support.creanncy.com/" target="_blank">Support System</a><h3>Technical information (paste it to your support ticket):</h3><textarea style="width: 500px; height: 160px;font-size: 12px;">Theme Version: '.wp_get_theme()->get( 'Version' ).'
WordPress Version: '.get_bloginfo( 'version' ).'</textarea>'
);

$ipanel_camille_option[] = array(
	"type" => "EndTab"
);

/**
 * EXPORT TAB
 **/

$ipanel_camille_tabs[] = array(
	'name' => esc_html__('Export', 'camille'),
	'id' => 'export_settings'
);

$ipanel_camille_option[] = array(
	"type" => "StartTab",
	"id" => "export_settings"
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Export with Download Possibility", 'camille'),
	"type" => "export",
	"desc" => esc_html__("Export theme admin panel settings to file.", 'camille')
);

$ipanel_camille_option[] = array(
	"type" => "EndTab"
);

/**
 * IMPORT TAB
 **/

$ipanel_camille_tabs[] = array(
	'name' => esc_html__('Import', 'camille'),
	'id' => 'import_settings'
);

$ipanel_camille_option[] = array(
	"type" => "StartTab",
	"id" => "import_settings"
);

$ipanel_camille_option[] = array(
	"name" => esc_html__("Import", 'camille'),
	"type" => "import",
	"desc" => esc_html__("Select theme options import file or paste options string to import your settings from Export.", 'camille')
);

$ipanel_camille_option[] = array(
	"type" => "EndTab"
);

/**
 * CONFIGURATION
 **/

$ipanel_configs = array(
	'ID'=> 'CAMILLE_PANEL',
	'menu'=>
		array(
			'submenu' => false,
			'page_title' => esc_html__('Camille Control Panel', 'camille'),
			'menu_title' => esc_html__('Theme Control Panel', 'camille'),
			'capability' => 'manage_options',
			'menu_slug' => 'manage_theme_options',
			'icon_url' => CAMILLE_IPANEL_URI . 'assets/img/panel-icon.png',
			'position' => 59
		),
	'rtl' => ( function_exists('is_rtl') && is_rtl() ),
	'tabs' => $ipanel_camille_tabs,
	'fields' => $ipanel_camille_option,
	'download_capability' => 'manage_options',
	'live_preview' => site_url()
);

$ipanel_theme_usage = new IPANEL( $ipanel_configs );

