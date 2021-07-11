<?php
/**
 * SETTINGS TAB
 **/
$ipanel_carrie_tabs[] = array(
	'name' => 'Main Settings',
	'id' => 'main_settings'
);

$ipanel_carrie_option[] = array(
	"type" => "StartTab",
	"id" => "main_settings"
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Enable theme CSS3 animations', 'carrie'),
	"id" => "enable_theme_animations",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Enable colors and background colors fade effects', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Enable theme images animations on hover', 'carrie'),
	"id" => "enable_images_animations",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Enable scale effects on some featured images hover in posts', 'carrie')),
	"type" => "checkbox",
);

$ipanel_carrie_option[] = array(
	"type" => "EndTab"
);
/**
 * Header TAB
 **/
$ipanel_carrie_tabs[] = array(
	'name' => 'Header',
	'id' => 'header_settings'
);

$ipanel_carrie_option[] = array(
	"type" => "StartTab",
	"id" => "header_settings"
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Header layout', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Body Background image or pattern', 'carrie'),
	"id" => "body_bg_image",
	"field_options" => array(
		"std" => ''
	),
	"desc" => wp_kses_post(__('Upload your site body background image if you want to show it. Remove image to remove background.', 'carrie')),
	"type" => "qup",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Body Background image behaviour', 'carrie'),
	"id" => "body_bg_style",
	"std" => "cover",
	"options" => array(
		"none" => esc_html__('Default', 'carrie'),
		"repeat" => esc_html__('Repeat (for pattern)', 'carrie'),
		"cover" => esc_html__('Cover (for large image)', 'carrie'),
	),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Header Background image or pattern', 'carrie'),
	"id" => "header_bg_image",
	"field_options" => array(
		"std" => ''
	),
	"desc" => wp_kses_post(__('Upload your site header background image if you want to show it. Remove image to remove background.', 'carrie')),
	"type" => "qup",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Header Background image behaviour', 'carrie'),
	"id" => "header_bg_style",
	"std" => "cover",
	"options" => array(
		"none" => esc_html__('Default', 'carrie'),
		"repeat" => esc_html__('Repeat (for pattern)', 'carrie'),
		"cover" => esc_html__('Cover (for large image)', 'carrie'),
	),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Disable Header', 'carrie'),
	"id" => "disable_header",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('This option will disable ALL header (with menu below header, logo, etc). Useful for minimalistic themes with left/right sidebar used to show logo and menu.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Header height in pixels', 'carrie'),
	"id" => "header_height",
	"std" => "170",
	"desc" => wp_kses_post(__('Default: 170', 'carrie')),
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Disable top menu', 'carrie'),
	"id" => "disable_top_menu",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('This option will disable top menu (first menu with social icons and additional links)', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Top menu style', 'carrie'),
	"id" => "header_top_menu_style",
	"std" => "menu_black",
	"options" => array(
		"menu_white" => esc_html__('White menu', 'carrie'),
		"menu_black" => esc_html__('Black menu', 'carrie'),
	),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Disable search in header menu', 'carrie'),
	"id" => "disable_top_menu_search",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('This option will disable search form in header menu', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Disable text tagline in header', 'carrie'),
	"id" => "disable_header_tagline",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('This option will disable text tagline in header', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"type" => "htmlpage",
	"name" => wp_kses_post(__('<div class="ipanel-label">
    <label>Logo upload</label>
  </div><div class="ipanel-input">
    You can upload your website logo in <a href="customize.php" target="_blank">WordPress Customizer</a> (in "Header Image" section at the left sidebar).<br/><br/><br/>
  </div>', 'carrie')),
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Logo width (px)', 'carrie'),
	"id" => "logo_width",
	"std" => "231",
	"desc" => wp_kses_post(__('Default: 231. Upload retina logo (2x size) and input your regular logo width here. For example if your retina logo have 400px width put 200 value here. If you does not use retina logo input regular logo width here (your logo image width).', 'carrie')),
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Sticky/Fixed top header (with menu, search, social icons)', 'carrie'),
	"id" => "enable_sticky_header",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Top Header will be fixed to top if enabled', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show site logo in sticky header', 'carrie'),
	"id" => "enable_sticky_header_logo",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Top Header will be fixed to top if enabled', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('MainMenu font decoration', 'carrie'),
	"id" => "header_menu_font_decoration",
	"std" => "none",
	"options" => array(
		"uppercase" => esc_html__('Uppercase letters', 'carrie'),
		"italic" => esc_html__('Italic letters', 'carrie'),
		"none" => esc_html__('None', 'carrie'),
	),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('MainMenu font size', 'carrie'),
	"id" => "header_menu_font_size",
	"std" => "largefont",
	"options" => array(
		"largefont" => esc_html__('Large font', 'carrie'),
		"normalfont" => esc_html__('Normal font', 'carrie'),
	),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('MainMenu font weight', 'carrie'),
	"id" => "header_menu_font_weight",
	"std" => "regularfont",
	"options" => array(
		"boldfont" => esc_html__('Bold font', 'carrie'),
		"regularfont" => esc_html__('Regular font', 'carrie'),
	),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('MainMenu dropdown arrows style for submenus', 'carrie'),
	"id" => "header_menu_arrow_style",
	"std" => "downarrow",
	"options" => array(
		"rightarrow" => esc_html__('Right arrow', 'carrie'),
		"downarrow" => esc_html__('Down arrow', 'carrie'),
		"noarrow" => esc_html__('Disable arrow', 'carrie'),
	),
	"type" => "select",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Header Logo position', 'carrie'),
	"id" => "header_logo_position",
	"options" => array(
		'left' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/header_block_position_1.png',
			"label" => esc_html__('Left', 'carrie'),
		),
		'center' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/header_block_position_2.png',
			"label" => esc_html__('Center', 'carrie'),
		),
		'right' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/header_block_position_3.png',
			"label" => esc_html__('Right', 'carrie'),
		),
	),
	"std" => "center",
	"type" => "image",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Header Banner position', 'carrie'),
	"id" => "header_banner_position",
	"options" => array(
		'left' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/header_block_position_1.png',
			"label" => esc_html__('Left', 'carrie'),
		),
		'center' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/header_block_position_2.png',
			"label" => esc_html__('Center', 'carrie'),
		),
		'right' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/header_block_position_3.png',
			"label" => esc_html__('Right', 'carrie'),
		),
		'disable' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/header_block_position_0.png',
			"label" => esc_html__('Disable', 'carrie'),
		)
	),
	"std" => "left",
	"desc" => wp_kses_post(__('You can show banner image or some text in your header. Make sure that you use different positions for logo and your banner (for example logo at the left and banner at the right).', 'carrie')),
	"type" => "image",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Header Banner content', 'carrie'),
	"id" => "header_banner_editor",
	"std" => '',
	"desc" => wp_kses_post(__('If you selected Header banner position below you can use any HTML here to show your banner or other content in header.', 'carrie')),
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Header Mini Post position', 'carrie'),
	"id" => "header_post_position",
	"options" => array(
		'left' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/header_block_position_1.png',
			"label" => esc_html__('Left', 'carrie'),
		),
		'center' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/header_block_position_2.png',
			"label" => esc_html__('Center', 'carrie'),
		),
		'right' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/header_block_position_3.png',
			"label" => esc_html__('Right', 'carrie'),
		),
		'disable' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/header_block_position_0.png',
			"label" => esc_html__('Disable', 'carrie'),
		)
	),
	"std" => "disable",
	"desc" => wp_kses_post(__('You can show one featured post in your header. Make sure that you use different positions for logo, your banner and header post (for example logo at the center and featured post at the right).', 'carrie')),
	"type" => "image",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Header Mini Post ID', 'carrie'),
	"id" => "header_post_id",
	"std" => "",
	"type" => "text",
	"desc" => wp_kses_post(__('You can find your posts ID in post edit screen in address bar, refer to theme documentation for more help.', 'carrie')),
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
$ipanel_carrie_option[] = array(

	"name" => esc_html__('Social icons', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"type" => "info",
	"name" => esc_html__('Leave URL fields blank to hide this social icons', 'carrie'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Facebook Page url', 'carrie'),
	"id" => "facebook",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Vkontakte page url', 'carrie'),
	"id" => "vk",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Twitter Page url', 'carrie'),
	"id" => "twitter",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Google+ Page url', 'carrie'),
	"id" => "google-plus",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('LinkedIn Page url', 'carrie'),
	"id" => "linkedin",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Dribbble Page url', 'carrie'),
	"id" => "dribbble",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Behance Page url', 'carrie'),
	"id" => "behance",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Instagram Page url', 'carrie'),
	"id" => "instagram",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Tumblr page url', 'carrie'),
	"id" => "tumblr",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Pinterest page url', 'carrie'),
	"id" => "pinterest",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Vimeo page url', 'carrie'),
	"id" => "vimeo-square",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('YouTube page url', 'carrie'),
	"id" => "youtube",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Skype url', 'carrie'),
	"id" => "skype",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Flickr url', 'carrie'),
	"id" => "flickr",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('RSS url', 'carrie'),
	"id" => "rss",
	"std" => "",
	"type" => "text",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Deviantart url', 'carrie'),
	"id" => "deviantart",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('500px url', 'carrie'),
	"id" => "500px",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Etsy url', 'carrie'),
	"id" => "etsy",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Telegram url', 'carrie'),
	"id" => "telegram",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Odnoklassniki url', 'carrie'),
	"id" => "odnoklassniki",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Houzz url', 'carrie'),
	"id" => "houzz",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Slack url', 'carrie'),
	"id" => "slack",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('QQ url', 'carrie'),
	"id" => "qq",
	"std" => "",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
$ipanel_carrie_option[] = array(
	"type" => "EndTab"
);
/**
 * FOOTER TAB
 **/
$ipanel_carrie_tabs[] = array(
	'name' => 'Footer',
	'id' => 'footer_settings'
);
$ipanel_carrie_option[] = array(
	"type" => "StartTab",
	"id" => "footer_settings"
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Instagram in Footer', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Display Instagram Feed in Footer', 'carrie'),
	"id" => "footer_instagram_display",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('<a href="https://wordpress.org/plugins/instagram-feed/" target="_blank">Instagram Feed</a> plugin must be installed and configured by theme documentation before enabling this option.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Footer Instagram title', 'carrie'),
	"id" => "footer_instagram_title",
	"std" => "Instagram",
	"desc" => wp_kses_post(__('Leave empty if you don\'t want to show text title.', 'carrie')),
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Footer Instagram subtitle', 'carrie'),
	"id" => "footer_instagram_subtitle",
	"std" => "Join our instaworld",
	"desc" => wp_kses_post(__('Leave empty if you don\'t want to show text subtitle.', 'carrie')),
	"type" => "text",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Footer HTML Block', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Display Footer HTML Block in Footer', 'carrie'),
	"id" => "footer_htmlblock_display",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Enable block with any HTML and background image in footer.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Footer HTML Block background image', 'carrie'),
	"id" => "footer_htmlblock_bg_image",
	"field_options" => array(
		"std" => ''
	),
	"desc" => wp_kses_post(__('Upload your footer HTML Block background image (1600x1200px JPG recommended). Remove image to remove background.', 'carrie')),
	"type" => "qup",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Footer HTML Block content', 'carrie'),
	"id" => "footer_htmlblock_content",
	"std" => '<a class="btn btn-white" href="#" target="_blank">View my channel</a>',
	"desc" => wp_kses_post(__('You can use any HTML here to display any content in your footer block.', 'carrie')),
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Footer Shortcode Block', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Display Shortcode Block in Footer', 'carrie'),
	"id" => "footer_shortcode_display",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => wp_kses_post(__('Enable block with any shortcode from any plugin on grey background in footer.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Footer Shortcode code', 'carrie'),
	"id" => "footer_shortcode_code",
	"std" => '<div class="row">
<div class="col-md-4"><h3>Never miss posts</h3><p>Sign up for our newsletter<br>to receive updates and exclusive offers.</p></div>
<div class="col-md-8">[mc4wp_form]</div>
</div>',
	"desc" => wp_kses_post(__('Add shortcode from any plugin that you want to display here (you can combine it with HTML), for example: &#x3C;h1&#x3E;My title&#x3C;/h1&#x3E;&#x3C;div&#x3E;[my_shortcode]&#x3C;/div&#x3E;', 'carrie')),
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('General Footer Options', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"name" => 'Show "Footer sidebar" only on homepage',
	"id" => "footer_sidebar_1_homepage_only",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Enable Footer Menu', 'carrie'),
	"id" => "footer_enable_menu",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Enable Social Icons in Footer', 'carrie'),
	"id" => "footer_enable_social",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Footer copyright text', 'carrie'),
	"id" => "footer_copyright_editor",
	"std" => "Powered by <a href='http://themeforest.net/user/creanncy/' target='_blank'>Carrie - Premium WordPress Theme</a>",
	"field_options" => array(
		'media_buttons' => false
	),
	"type" => "wp_editor",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
$ipanel_carrie_option[] = array(
	"type" => "EndTab"
);

/**
 * SIDEBARS TAB
 **/
$ipanel_carrie_tabs[] = array(
	'name' => 'Sidebars',
	'id' => 'sidebar_settings'
);

$ipanel_carrie_option[] = array(
	"type" => "StartTab",
	"id" => "sidebar_settings"
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Blog page sidebar position', 'carrie'),
	"id" => "blog_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => esc_html__('Left', 'carrie')
		),
		'right' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => esc_html__('Right', 'carrie')
		),
		'disable' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => esc_html__('Disable sidebar', 'carrie')
		),
	),
	"std" => "right",
	"type" => "image",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Pages sidebar position', 'carrie'),
	"id" => "page_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => esc_html__('Left', 'carrie')
		),
		'right' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => esc_html__('Right', 'carrie')
		),
		'disable' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => esc_html__('Disable sidebar', 'carrie')
		),
	),
	"std" => "disable",
	"type" => "image",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Blog Archive page sidebar position', 'carrie'),
	"id" => "archive_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => esc_html__('Left', 'carrie')
		),
		'right' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => esc_html__('Right', 'carrie')
		),
		'disable' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => esc_html__('Disable sidebar', 'carrie')
		),
	),
	"std" => "right",
	"type" => "image",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Blog Search page sidebar position', 'carrie'),
	"id" => "search_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => esc_html__('Left', 'carrie')
		),
		'right' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => esc_html__('Right', 'carrie')
		),
		'disable' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => esc_html__('Disable sidebar', 'carrie')
		),
	),
	"std" => "right",
	"type" => "image",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Blog post sidebar position', 'carrie'),
	"id" => "post_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => esc_html__('Left', 'carrie')
		),
		'right' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => esc_html__('Right', 'carrie')
		),
		'disable' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => esc_html__('Disable sidebar', 'carrie')
		),
	),
	"std" => "disable",
	"type" => "image",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('WooCommerce pages sidebar position', 'carrie'),
	"id" => "woocommerce_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => esc_html__('Left', 'carrie')
		),
		'right' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => esc_html__('Right', 'carrie')
		),
		'disable' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => esc_html__('Disable sidebar', 'carrie')
		),
	),
	"std" => "disable",
	"type" => "image",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('WooCommerce product page sidebar position', 'carrie'),
	"id" => "woocommerce_product_sidebar_position",
	"options" => array(
		'left' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_1.png',
			"label" => esc_html__('Left', 'carrie')
		),
		'right' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_2.png',
			"label" => esc_html__('Right', 'carrie')
		),
		'disable' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/sidebar_position_3.png',
			"label" => esc_html__('Disable sidebar', 'carrie')
		),
	),
	"std" => "disable",
	"type" => "image",
);

$ipanel_carrie_option[] = array(
	"type" => "EndTab"
);
/**
 * BLOG TAB
 **/
$ipanel_carrie_tabs[] = array(
	'name' => 'Blog',
	'id' => 'blog_settings'
);
$ipanel_carrie_option[] = array(
	"type" => "StartTab",
	"id" => "blog_settings"
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Main Blog settings', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Blog layout', 'carrie'),
	"id" => "blog_layout",
	"options" => array(
		'layout_default' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/blog_layout_1.png',
			"label" => esc_html__('Default layout', 'carrie')
		),
		'layout_2column_design' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/blog_layout_2.png',
			"label" => esc_html__('Show posts in 2 columns', 'carrie')
		),
		'layout_2column_design_advanced' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/blog_layout_3.png',
			"label" => esc_html__('Show posts in 2 columns with big blocks after few small', 'carrie')
		),
		'layout_list' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/blog_layout_4.png',
			"label" => esc_html__('List with short posts blocks', 'carrie')
		),
		'layout_list_advanced' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/blog_layout_5.png',
			"label" => esc_html__('List with short posts and big blocks (every third post)', 'carrie')
		),
		'layout_masonry' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/blog_layout_6.png',
			"label" => esc_html__('Masonry layout', 'carrie')
		),
		'layout_text' => array(
			"image" => CARRIE_IPANEL_URI . 'option-images/blog_layout_7.png',
			"label" => esc_html__('Centered text (Minimnalistic, No images)', 'carrie')
		),
	),
	"std" => "layout_default",
	"desc" => wp_kses_post(__('This option will completely change blog listing layout and posts display.', 'carrie')),
	"type" => "image",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show blog posts in listing as', 'carrie'),
	"id" => "blog_post_loop_type",
	"std" => "content",
	"options" => array(
		"content" => "Full content (You will add More tag manually)",
		"excerpt" => "Excerpt (Auto crop by words)",
	),
	"desc" => wp_kses_post(__('We recommend you to use Fullwidth layout for Slider Style 3', 'carrie')),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Post excerpt length (words)', 'carrie'),
	"id" => "post_excerpt_legth",
	"std" => "40",
	"desc" => wp_kses_post(__('Used by WordPress for post shortening. Default: 40', 'carrie')),
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Disable blog posts loop on main Blog page (Blog homepage)', 'carrie'),
	"id" => "blog_disable_posts_loop",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Enable this options if you does not want to show posts on your blog homepage. You can use this to create minimalistic website (you will have just blog slider, welcome blocks and editor\'s picks blocks on homepage.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show author name ("by author") in blog posts', 'carrie'),
	"id" => "blog_post_show_author",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show share buttons for posts in posts listing page', 'carrie'),
	"id" => "blog_list_show_share",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Will show share buttons in posts on blog listing pages.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show related posts on posts listing page', 'carrie'),
	"id" => "blog_list_show_related",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Will show 3 related posts after every post in posts list. Does not available in Masonry layout and 2 column layout.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show Post Comments counters in posts blocks', 'carrie'),
	"id" => "blog_enable_post_comments_counter",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('This option will enable post comments counter display in sliders, popular posts, editor picks, reagular posts blocks.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show Post Views counters in posts blocks', 'carrie'),
	"id" => "blog_enable_post_views_counter",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('This option will enable post views counter display in posts.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Featured Posts Slider settings', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"type" => "info",
	"field_options" => array(
		"style" => 'alert'
	),
	"name" => wp_kses_post(__('<p>To add your posts to Featured Posts Slider you need to edit your post and set it as featured for slider in Post Settings box.</p>', 'carrie'))
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show Featured Posts Slider on homepage', 'carrie'),
	"id" => "blog_enable_homepage_slider",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('You can mark posts as featured in post edit screen at the bottom settings box to display it in slider in homepage header.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show Featured Posts Slider under header (Transparent header feature)', 'carrie'),
	"id" => "blog_enable_homepage_transparent_header",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('This feature will make your header transparent and will show it above slider on Homepage. You need to upload light logo version to use this feature.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Featured Posts Slider width', 'carrie'),
	"id" => "blog_homepage_slider_fullwidth",
	"std" => "1",
	"options" => array(
		"1" => "Fullwidth",
		"0" => "Boxed",
	),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show Revolution Slider instead of theme Featured Posts Slider on homepage', 'carrie'),
	"id" => "blog_enable_revolution_slider",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('You need to create Revolution Slider with alias BLOG_SLIDER that will be used instead of theme slider. <br>IMPORTANT: All theme slider options BELOW will NOT WORK if you enabled Revolution Slider, because you will need to manage ALL slider options in Revolution Slider plugin settings in this case.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Featured Posts Slider height', 'carrie'),
	"id" => "blog_homepage_slider_height",
	"std" => "550",
	"field_options" => array(
		"min" => 250,
		"max" => 800,
		"step" => 5,
		"dimension" => 'px',
		"animation" => true
	),
	"desc" => wp_kses_post(__('Drag to change value. Default: 550px', 'carrie')),
	"type" => "slider",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Featured Posts Slider items per row', 'carrie'),
	"id" => "blog_homepage_slider_items",
	"std" => "1",
	"options" => array(
		"4" => "4",
		"3" => "3",
		"2" => "2",
		"1" => "1",
	),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Featured Posts Slider post details layout', 'carrie'),
	"id" => "blog_homepage_slider_post_details_layout",
	"std" => "horizontal",
	"options" => array(
		"horizontal" => esc_html__('Horizontal', 'carrie'),
		"vertical" => esc_html__('Vertical', 'carrie'),
		"disable" => esc_html__('Disable Post Details (show as image slider)', 'carrie'),
	),
	"desc" => wp_kses_post(__('Select where to show post details (title, description, category, etc) in blog posts inside slider. "Vertical" value will work only if you set 1 items per row in option above.', 'carrie')),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Hide slider posts description', 'carrie'),
	"id" => "blog_disable_homepage_slider_description",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Check if you want to hide post descriptions in slider.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show slider posts Read More button', 'carrie'),
	"id" => "blog_enable_readmore",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Check if you want show Read More button for posts in slider.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Merge slider slides', 'carrie'),
	"id" => "blog_enable_homepage_merge_slider",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Check if you want to see different slides widths in one row.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Center active slide', 'carrie'),
	"id" => "blog_enable_homepage_center_slide",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Check if you want to see current slide centered and near slides cropped. Work best with slides per row set to 2 or 4.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Featured Posts Slider autoplay', 'carrie'),
	"id" => "blog_homepage_slider_autoplay",
	"std" => "3000",
	"options" => array(
		"10000" => esc_html__('Enable - 10 seconds', 'carrie'),
		"5000" => esc_html__('Enable - 5 seconds', 'carrie'),
		"3000" => esc_html__('Enable - 3 seconds', 'carrie'),
		"2000" => esc_html__('Enable - 2 seconds', 'carrie'),
		"1000" => esc_html__('Enable - 1 second', 'carrie'),
		"0" =>  esc_html__('Disable', 'carrie'),
	),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Featured Posts Slider navigation arrows', 'carrie'),
	"id" => "blog_homepage_slider_navigation",
	"std" => "1",
	"options" => array(
		"1" => esc_html__('Enable', 'carrie'),
		"0" => esc_html__('Disable', 'carrie'),
	),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Featured Posts Slider pagination buttons', 'carrie'),
	"id" => "blog_homepage_slider_pagination",
	"std" => "false",
	"options" => array(
		"true" => esc_html__('Enable', 'carrie'),
		"false" => esc_html__('Disable', 'carrie'),
	),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Welcome Block settings', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show Welcome Block on homepage', 'carrie'),
	"id" => "blog_enable_homepage_welcome_block",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('You can display any HTML content in this block below your slider or header.', 'carrie')),
	"type" => "checkbox",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Homepage Welcome Block content', 'carrie'),
	"id" => "blog_homepage_welcome_block_content",
	"std" => '',
	"desc" => wp_kses_post(__('You can use any HTML here to display any content in your welcome block with predefined layout.', 'carrie')),
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Popular Posts Carousel settings', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show Popular Posts Carousel on homepage', 'carrie'),
	"id" => "blog_enable_homepage_popular_slider",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('You can enable mini slider with popular posts (by views) below your header on homepage.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Popular Posts Block title', 'carrie'),
	"id" => "blog_homepage_popular_posts_title",
	"std" => "Popular posts",
	"desc" => wp_kses_post(__('Change default Popular Posts block title. Leave empty to hide title.', 'carrie')),
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Popular Posts Block subtitle', 'carrie'),
	"id" => "blog_homepage_popular_posts_subtitle",
	"std" => "Most popular posts",
	"desc" => wp_kses_post(__('Change default Popular Posts block subtitle. Leave empty to hide title.', 'carrie')),
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Popular Posts Carousel posts limit', 'carrie'),
	"id" => "blog_homepage_popular_slider_limit",
	"std" => "10",
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Popular Posts Carousel category slug', 'carrie'),
	"id" => "blog_homepage_popular_slider_category",
	"std" => "",
	"desc" => wp_kses_post(__('If you want to show popular posts only from some category specify it\'s SLUG here (You can create special category like "Popular" and assing posts to it if you want to show only selected posts). You can see/set category SLUG when you edit category. Leave empty to show posts from all categories.', 'carrie')),
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Popular Posts Slider autoplay', 'carrie'),
	"id" => "blog_homepage_popular_slider_autoplay",
	"std" => "3000",
	"options" => array(
		"10000" => esc_html__('Enable - 10 seconds', 'carrie'),
		"5000" => esc_html__('Enable - 5 seconds', 'carrie'),
		"3000" => esc_html__('Enable - 3 seconds', 'carrie'),
		"2000" => esc_html__('Enable - 2 seconds', 'carrie'),
		"1000" => esc_html__('Enable - 1 second', 'carrie'),
		"0" =>  esc_html__('Disable', 'carrie'),
	),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Editor\'s Picks Homepage Block settings', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"type" => "info",
	"field_options" => array(
		"style" => 'alert'
	),
	"name" => esc_html__('To add your posts to Editor\'s Picks Block you need to edit your post and set it as Editors Pick post in Post Settings box.', 'carrie')
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show Editor\'s Picks Block on homepage footer', 'carrie'),
	"id" => "blog_enable_homepage_editorspick_posts",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Editor\'s Picks Block title', 'carrie'),
	"id" => "blog_homepage_editorspick_posts_title",
	"std" => "Editor's Picks",
	"desc" => wp_kses_post(__('Change default Editor\'s Picks Posts block title. Leave empty to hide title.', 'carrie')),
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Editor\'s Picks Block subtitle', 'carrie'),
	"id" => "blog_homepage_editorspick_posts_subtitle",
	"std" => "Best posts from Carrie",
	"desc" => wp_kses_post(__('Change default Editor\'s Picks  block subtitle. Leave empty to hide title.', 'carrie')),
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Editor\'s Picks Block layout', 'carrie'),
	"id" => "blog_homepage_editorspick_posts_layout",
	"std" => "masonry",
	"options" => array(
		"masonry" => esc_html__('Masonry', 'carrie'),
		"small" => esc_html__('Small Blocks', 'carrie'),
		"large" => esc_html__('Large Blocks', 'carrie'),
	),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Editor\'s Picks Block posts limit (rows)', 'carrie'),
	"id" => "blog_homepage_editorspick_posts_limit",
	"std" => "2",
	"options" => array(
		"1" => esc_html__('One row', 'carrie'),
		"2" => esc_html__('Two rows', 'carrie'),
	),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Editor\'s Picks Block posts category slug', 'carrie'),
	"id" => "blog_homepage_editorspick_posts_category",
	"std" => "",
	"desc" => wp_kses_post(__('If you want to show popular posts only from some category specify it\'s SLUG here (You can create special category like "Picks" and assing posts to it if you want to show only selected posts). You can see/set category SLUG when you edit category. Leave empty to show posts from all categories.', 'carrie')),
	"type" => "text",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Single Post page settings', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => true // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show Post/Page Header Image under header (Transparent header feature)', 'carrie'),
	"id" => "blog_enable_post_transparent_header",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('This feature will make your header transparent and will show it above post/page header image. You need to upload light logo version to use this feature and assign header image for posts/pages where you want to see this feature.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Use back paper page effect for pages and posts', 'carrie'),
	"id" => "blog_enable_paper_page",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Visual Effect - Overflow post/page content to title header on site.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Use smaller content width on single posts and pages without sidebar', 'carrie'),
	"id" => "blog_enable_small_page_width",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('This option add left/right margins on all pages and posts without sidebars to make your content width smaller.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show author info with avatar after single blog post', 'carrie'),
	"id" => "blog_enable_author_info",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('You need to fill your post author biography details and social links in Users section in WordPress to make this work.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show vertical post info box with avatar at the left side of single blog post', 'carrie'),
	"id" => "blog_enable_author_info_vertical",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Show post info box with author details, comments count, views and post share buttons at the left of single post article.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show horizontal post info box at the end of single post', 'carrie'),
	"id" => "blog_enable_post_info_bottom",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Show post info box with comments count, views and post share buttons after single post article.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show share links in Single Post header below post title', 'carrie'),
	"id" => "blog_enable_singlepost_header_info",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show share buttons for posts in single post page', 'carrie'),
	"id" => "blog_post_show_share",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Will show share buttons in posts on blog listing pages.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Enable Drop Caps (first big letter) in single post pages', 'carrie'),
	"id" => "blog_enable_dropcaps",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show related posts on single post page', 'carrie'),
	"id" => "blog_post_show_related",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Hide post featured image on single post page', 'carrie'),
	"id" => "blog_post_hide_featured_image",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Enable this if you don\'t want to see featured post image on single post page.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Show prev/next posts navigation links on single post page', 'carrie'),
	"id" => "blog_post_navigation",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
$ipanel_carrie_option[] = array(
	"type" => "EndTab"
);

/**
 * FONTS TAB
 **/

$ipanel_carrie_tabs[] = array(
	'name' => 'Fonts',
	'id' => 'font_settings'
);

$ipanel_carrie_option[] = array(
	"type" => "StartTab",
	"id" => "font_settings"
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Headers font', 'carrie'),
	"id" => "header_font",
	"desc" => wp_kses_post(__('Font used in headers. Default: Playfair Display', 'carrie')),
	"options" => array(
		"font-sizes" => array(
			" " => esc_html__('Font Size', 'carrie'),
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
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Headers font parameters for Google Font', 'carrie'),
	"id" => "header_font_options",
	"std" => "400,400italic,600,600italic",
	"desc" => wp_kses_post(__('You can specify additional Google Fonts paramaters here, for example fonts styles to load. Default: 400,400italic,600,600italic', 'carrie')),
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Body font', 'carrie'),
	"id" => "body_font",
	"desc" => wp_kses_post(__('Font used in text elements. Default: Lora', 'carrie')),
	"options" => array(
		"font-sizes" => array(
			" " => esc_html__('Font Size', 'carrie'),
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
		"font-size" => '16',
		"font-family" => 'Lora'
	),
	"type" => "typography"
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Body font parameters for Google Font', 'carrie'),
	"id" => "body_font_options",
	"std" => "400,600",
	"desc" => wp_kses_post(__('You can specify additional Google Fonts paramaters here, for example fonts styles to load. Default: 400,600', 'carrie')),
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Additional font', 'carrie'),
	"id" => "additional_font",
	"desc" => wp_kses_post(__('You can select any additional Google font here and use it in Custom CSS in theme. Default: Montserrat', 'carrie')),
	"options" => array(
		"font-sizes" => array(
			" " => esc_html__('Font Size', 'carrie'),
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
		"font-styles" => false,
	),
	"std" => array(
		"font-size" => '12',
		"font-family" => 'Montserrat'
	),
	"type" => "typography"
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Additional font parameters for Google Font', 'carrie'),
	"id" => "additional_font_options",
	"std" => "400,600",
	"desc" => wp_kses_post(__('You can specify additional Google Fonts paramaters here, for example fonts styles to load. Default: 400,600', 'carrie')),
	"type" => "text",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Enable Additional font', 'carrie'),
	"id" => "additional_font_enable",
	"std" => true,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Uncheck if you don\'t want to use Additional font. This will speed up your site.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => wp_kses_post(__('Disable ALL Google Fonts on site', 'carrie')),
	"id" => "font_google_disable",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('Use this if you want extra site speed or want to have regular fonts. Arial font will be used with this option.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Regular font (apply if you disabled Google Fonts below)', 'carrie'),
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
	"desc" => wp_kses_post(__('Use this option if you disabled ALL Google Fonts.', 'carrie')),
	"type" => "select",
);
$ipanel_carrie_option[] = array(
	"type" => "EndTab"
);

/**
 * COLORS TAB
 **/

$ipanel_carrie_tabs[] = array(
	'name' => 'Colors & Skins',
	'id' => 'color_settings'
);

$ipanel_carrie_option[] = array(
	"type" => "StartTab",
	"id" => "color_settings",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Predefined color skins', 'carrie'),
	"id" => "color_skin_name",
	"std" => "none",
	"options" => array(
		"none" => esc_html__('Use colors specified below', 'carrie'),
		"default" => esc_html__('Carrie (Default)', 'carrie'),
		"black" => esc_html__('Black', 'carrie'),
		"grey" => esc_html__('Grey', 'carrie'),
		"lightblue" => esc_html__('Light blue', 'carrie'),
		"blue" => esc_html__('Blue', 'carrie'),
		"red" => esc_html__('Red', 'carrie'),
		"green" => esc_html__('Green', 'carrie'),
		"orange" => esc_html__('Orange', 'carrie'),
		"redorange" => esc_html__('RedOrange', 'carrie'),
		"brown" => esc_html__('Brown', 'carrie'),
	),
	"desc" => wp_kses_post(__('Select one of predefined skins or use your own colors. If you selected any predefined styles your specified colors below will NOT be applied.', 'carrie')),
	"type" => "select",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Body background color', 'carrie'),
	"id" => "theme_body_color",
	"std" => "#FFFFFF",
	"desc" => wp_kses_post(__('Used in many theme places, default: #FFFFFF', 'carrie')),
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Body text color', 'carrie'),
	"id" => "theme_text_color",
	"std" => "#000000",
	"desc" => wp_kses_post(__('Body text color, default: #000000', 'carrie')),
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Theme main color', 'carrie'),
	"id" => "theme_main_color",
	"std" => "#8ba0a8",
	"desc" => wp_kses_post(__('Used in many theme places, buttons, links, etc. Default: #8ba0a8', 'carrie')),
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Header background color', 'carrie'),
	"id" => "theme_header_bg_color",
	"std" => "#FFFFFF",
	"desc" => wp_kses_post(__('Default: #FFFFFF', 'carrie')),
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Category menu background color', 'carrie'),
	"id" => "theme_cat_menu_bg_color",
	"std" => "#FFFFFF",
	"desc" => wp_kses_post(__('This background will be used for main menu below header. Default: #FFFFFF', 'carrie')),
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Footer background color', 'carrie'),
	"id" => "theme_footer_color",
	"std" => "#222222",
	"desc" => wp_kses_post(__('Default: #222222', 'carrie')),
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Masonry/List blog layout blocks background color', 'carrie'),
	"id" => "theme_masonry_bg_color",
	"std" => "#F5F5F5",
	"desc" => wp_kses_post(__('Default: #F5F5F5', 'carrie')),
	"field_options" => array(
		//'desc_in_tooltip' => true
	),
	"type" => "color",
);

$ipanel_carrie_option[] = array(
	"type" => "EndTab"
);

/**
 * BANNERS CODE TAB
 **/
$ipanel_carrie_tabs[] = array(
	'name' => esc_html__('Ads management', 'carrie'),
	'id' => 'banners_management'
);
$ipanel_carrie_option[] = array(
	"type" => "StartTab",
	"id" => "banners_management",
);
$ipanel_carrie_option[] = array(
	"type" => "info",
	"name" => wp_kses_post(__('<strong>Click ads position name to open settings box.</strong><br>Need new ads position in some specific theme place? <a target="_blank" href="http://support.creanncy.com/">Let our support know</a> where you want to see new ads place and we will add it in next theme update.', 'carrie')),
	"field_options" => array(
		"style" => 'alert'
	)
);
// BANNER OPTIONS
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Site Header Banner', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"type" => "info",
	"name" => esc_html__('This banner will be displayed below site Header on all pages.', 'carrie'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Enable Banner', 'carrie'),
	"id" => "banner_enable_below_header",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('You can display any HTML content in this block to show your advertisement.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Banner HTML code', 'carrie'),
	"id" => "banner_below_header_content",
	"std" => '',
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Site Above Footer Banner', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"type" => "info",
	"name" => esc_html__('This banner will be displayed above site footer on all pages.', 'carrie'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Enable Banner', 'carrie'),
	"id" => "banner_enable_above_footer",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('You can display any HTML content in this block to show your advertisement.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Banner HTML code', 'carrie'),
	"id" => "banner_above_footer_content",
	"std" => '',
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Site Footer Banner', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"type" => "info",
	"name" => esc_html__('This banner will be displayed in site footer on all pages.', 'carrie'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Enable Banner', 'carrie'),
	"id" => "banner_enable_footer",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('You can display any HTML content in this block to show your advertisement.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Banner HTML code', 'carrie'),
	"id" => "banner_footer_content",
	"std" => '',
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Banner Below Homepage Popular Posts Slider', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"type" => "info",
	"name" => esc_html__('This banner will be displayed on homepage below Homepage Popular Posts Slider.', 'carrie'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Enable Banner', 'carrie'),
	"id" => "banner_enable_below_homepage_popular_posts",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('You can display any HTML content in this block to show your advertisement.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Banner HTML code', 'carrie'),
	"id" => "banner_below_homepage_popular_posts_content",
	"std" => '',
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Post Loops Middle Banner', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"type" => "info",
	"name" => esc_html__('This banner will be displayed at the middle between posts on all posts listing pages (Homepage, Archives, Search, etc). This banner does not available in Masonry and Two column blog layouts.', 'carrie'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Enable Banner', 'carrie'),
	"id" => "banner_enable_posts_loop_middle",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('You can display any HTML content in this block to show your advertisement.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Banner HTML code', 'carrie'),
	"id" => "banner_posts_loop_middle_content",
	"std" => '',
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Post Loops Bottom Banner', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"type" => "info",
	"name" => esc_html__('This banner will be displayed at the bottom after all posts on posts listing pages (Homepage, Archives, Search, etc).', 'carrie'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Enable Banner', 'carrie'),
	"id" => "banner_enable_posts_loop_bottom",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('You can display any HTML content in this block to show your advertisement.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Banner HTML code', 'carrie'),
	"id" => "banner_posts_loop_bottom_content",
	"std" => '',
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Single Blog Post page Top banner', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"type" => "info",
	"name" => esc_html__('This banner will be displayed on single blog post page between post content and featured image.', 'carrie'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Enable Banner', 'carrie'),
	"id" => "banner_enable_single_post_top",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('You can display any HTML content in this block to show your advertisement.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Banner HTML code', 'carrie'),
	"id" => "banner_single_post_top_content",
	"std" => '',
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Single Blog Post page Bottom banner', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"type" => "info",
	"name" => esc_html__('This banner will be displayed on single blog post page after post content.', 'carrie'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Enable Banner', 'carrie'),
	"id" => "banner_enable_single_post_bottom",
	"std" => false,
	"field_options" => array(
		"box_label" => "Check Me!"
	),
	"desc" => wp_kses_post(__('You can display any HTML content in this block to show your advertisement.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Banner HTML code', 'carrie'),
	"id" => "banner_single_post_bottom_content",
	"std" => '',
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
// BANNER OPTIONS
$ipanel_carrie_option[] = array(
	"name" => esc_html__('404 Page and Search Nothing Found Banner', 'carrie'),
	"type" => "StartSection",
	"field_options" => array(
		"show" => false // Set true to show items by default.
	)
);
$ipanel_carrie_option[] = array(
	"type" => "info",
	"name" => esc_html__('This banner will be displayed on 404 (page not found) and search nothing found pages.', 'carrie'),
	"field_options" => array(
		"style" => 'alert'
	)
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Enable Banner', 'carrie'),
	"id" => "banner_enable_404",
	"std" => false,
	"field_options" => array(
		"box_label" => ""
	),
	"desc" => wp_kses_post(__('You can display any HTML content in this block to show your advertisement.', 'carrie')),
	"type" => "checkbox",
);
$ipanel_carrie_option[] = array(
	"name" => esc_html__('Banner HTML code', 'carrie'),
	"id" => "banner_404_content",
	"std" => '',
	"field_options" => array(
		'media_buttons' => true
	),
	"type" => "wp_editor",
);
$ipanel_carrie_option[] = array(
		"type" => "EndSection"
);
// END BANNERS
$ipanel_carrie_option[] = array(
	"type" => "EndTab"
);
/**
 * CUSTOM CODE TAB
 **/

$ipanel_carrie_tabs[] = array(
	'name' => esc_html__('Custom code', 'carrie'),
	'id' => 'custom_code'
);

$ipanel_carrie_option[] = array(
	"type" => "StartTab",
	"id" => "custom_code",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Custom JavaScript code', 'carrie'),
	"id" => "custom_js_code",
	"std" => '',
	"field_options" => array(
		"language" => "javascript",
		"line_numbers" => true,
		"autoCloseBrackets" => true,
		"autoCloseTags" => true
	),
	"desc" => wp_kses_post(__('This code will run in header', 'carrie')),
	"type" => "code",
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Custom CSS styles', 'carrie'),
	"id" => "custom_css_code",
	"std" => '',
	"field_options" => array(
		"language" => "json",
		"line_numbers" => true,
		"autoCloseBrackets" => true,
		"autoCloseTags" => true
	),
	"desc" => wp_kses_post(__('This CSS code will be included in header', 'carrie')),
	"type" => "code",
);

$ipanel_carrie_option[] = array(
	"type" => "EndTab"
);

/**
 * DOCUMENTATION TAB
 **/

$ipanel_carrie_tabs[] = array(
	'name' => esc_html__('Documentation', 'carrie'),
	'id' => 'documentation'
);

$ipanel_carrie_option[] = array(
	"type" => "StartTab",
	"id" => "documentation"
);

$ipanel_carrie_option[] = array(
	"type" => "htmlpage",
	"name" => '<div class="documentation-icon"><img src="'.esc_url(CARRIE_IPANEL_URI) . 'assets/img/documentation-icon.png" alt="Documentation"/></div><p>We recommend you to read <a href="http://creanncy.com/go/carrie-docs/" target="_blank">Theme Documentation</a> before you will start using our theme to building your website. It covers all steps for site configuration, demo content import, theme features usage and more.</p>
<p>If you have face any problems with our theme feel free to use our <a href="http://support.creanncy.com/" target="_blank">Support System</a> to contact us and get help for free.</p>
<a class="button button-primary" href="http://creanncy.com/go/carrie-docs/" target="_blank">Theme Documentation</a>
<a class="button button-primary" href="http://support.creanncy.com/" target="_blank">Support System</a><h3>Technical information (paste it to your support ticket):</h3><textarea style="width: 500px; height: 160px;font-size: 12px;">Theme Version: '.wp_get_theme()->get( 'Version' ).'
WordPress Version: '.get_bloginfo( 'version' ).'</textarea>'
);

$ipanel_carrie_option[] = array(
	"type" => "EndTab"
);

/**
 * EXPORT TAB
 **/

$ipanel_carrie_tabs[] = array(
	'name' => esc_html__('Export', 'carrie'),
	'id' => 'export_settings'
);

$ipanel_carrie_option[] = array(
	"type" => "StartTab",
	"id" => "export_settings"
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Export with Download Possibility', 'carrie'),
	"type" => "export",
	"desc" => wp_kses_post(__('Export theme admin panel settings to file.', 'carrie'))
);

$ipanel_carrie_option[] = array(
	"type" => "EndTab"
);

/**
 * IMPORT TAB
 **/

$ipanel_carrie_tabs[] = array(
	'name' => esc_html__('Import', 'carrie'),
	'id' => 'import_settings'
);

$ipanel_carrie_option[] = array(
	"type" => "StartTab",
	"id" => "import_settings"
);

$ipanel_carrie_option[] = array(
	"name" => esc_html__('Import', 'carrie'),
	"type" => "import",
	"desc" => wp_kses_post(__('Select theme options import file or paste options string to import your settings from Export.', 'carrie'))
);

$ipanel_carrie_option[] = array(
	"type" => "EndTab"
);

/**
 * CONFIGURATION
 **/
$ipanel_configs = array(
	'ID'=> 'CARRIE_PANEL',
	'menu'=>
		array(
			'submenu' => false,
			'page_title' => esc_html__('Carrie Control Panel', 'carrie'),
			'menu_title' => esc_html__('Theme Control Panel', 'carrie'),
			'capability' => 'manage_options',
			'menu_slug' => 'manage_theme_options',
			'icon_url' => CARRIE_IPANEL_URI . 'assets/img/panel-icon.png',
			'position' => 59
		),
	'rtl' => ( function_exists('is_rtl') && is_rtl() ),
	'tabs' => $ipanel_carrie_tabs,
	'fields' => $ipanel_carrie_option,
	'download_capability' => 'manage_options',
	'live_preview' => false
);

$ipanel_theme_usage = new IPANEL( $ipanel_configs );

