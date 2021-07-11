<?php

	add_action( 'wp_enqueue_scripts', 'carrie_enqueue_dynamic_styles', '999' );

	function carrie_enqueue_dynamic_styles( ) {

        require_once(ABSPATH . 'wp-admin/includes/file.php'); // required to use WP_Filesystem();

        WP_Filesystem();

        global $wp_filesystem;

        if ( function_exists( 'is_multisite' ) && is_multisite() ){
            $cache_file_name = 'style-cache-'.wp_get_theme()->get('TextDomain').'-b' . get_current_blog_id();
        } else {
            $cache_file_name = 'style-cache-'.wp_get_theme()->get('TextDomain');
        }

        $wp_upload_dir = wp_upload_dir();

        $css_cache_file = $wp_upload_dir['basedir'].'/'.$cache_file_name.'.css';

        $css_cache_file_url = $wp_upload_dir['baseurl'].'/'.$cache_file_name.'.css';

        $ipanel_saved_date = get_option( 'ipanel_saved_date', 1 );
        $cache_saved_date = get_option( 'cache_css_saved_date', 0 );

        if( file_exists( $css_cache_file ) ) {
            $cache_status = 'exist';

            if($ipanel_saved_date > $cache_saved_date) {
                $cache_status = 'no-exist';
            }

        } else {
            $cache_status = 'no-exist';
        }

        if ( defined('DEMO_MODE') ) {
            $cache_status = 'no-exist';
        }

		if ( $cache_status == 'exist' ) {

			wp_register_style( $cache_file_name, $css_cache_file_url, $cache_saved_date);
            wp_enqueue_style( $cache_file_name );

		} else {

			$out = '';

			$generated = microtime(true);

			$out = carrie_get_css();

			$out = str_replace( array( "\t", "
", "\n", "  ", "   ", ), array( "", "", " ", " ", " ", ), $out );

			$out .= '/* CSS Generator Execution Time: ' . floatval( ( microtime(true) - $generated ) ) . ' seconds */';

            // FS_CHMOD_FILE required by WordPress guideliness - https://codex.wordpress.org/Filesystem_API#Using_the_WP_Filesystem_Base_Class
            if ( defined( 'FS_CHMOD_FILE' ) ) {
                $chmod_file = FS_CHMOD_FILE;
            } else {
                $chmod_file = ( 0644 & ~ umask() );
            }

			if ( $wp_filesystem->put_contents( $css_cache_file, $out, $chmod_file) ) {

				wp_register_style( $cache_file_name, $css_cache_file_url, $cache_saved_date);
				wp_enqueue_style( $cache_file_name );

                // Update save options date
                $option_name = 'cache_css_saved_date';

                $new_value = microtime(true) ;

                if ( get_option( $option_name ) !== false ) {

                    // The option already exists, so we just update it.
                    update_option( $option_name, $new_value );

                } else {

                    // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
                    $deprecated = null;
                    $autoload = 'no';
                    add_option( $option_name, $new_value, $deprecated, $autoload );
                }
			}

		}
	}

	function carrie_get_css () {
		$carrie_theme_options = carrie_get_theme_options();
		// ===
		ob_start();
    ?>
    <?php
    if ( defined('DEMO_MODE') && isset($_GET['header_height']) ) {
      $carrie_theme_options['header_height'] = $_GET['header_height'];
    }

    if(isset($carrie_theme_options['header_height']) && $carrie_theme_options['header_height'] > 0) {
        $header_height = $carrie_theme_options['header_height'];
    } else {
        $header_height = 170;
    }

    if(isset($carrie_theme_options['logo_width']) && $carrie_theme_options['logo_width'] > 0) {
        $logo_width = $carrie_theme_options['logo_width'];
    } else {
        $logo_width = 231;
    }

    if(isset($carrie_theme_options['blog_homepage_slider_height']) && $carrie_theme_options['blog_homepage_slider_height'] > 0) {
        $blog_homepage_slider_height = $carrie_theme_options['blog_homepage_slider_height'];
    } else {
        $blog_homepage_slider_height = 430;
    }

    ?>
    header .col-md-12 {
        height: <?php echo intval($header_height); ?>px;
    }
    <?php
    // Retina logo
    ?>

    header .logo-link img {
        width: <?php echo intval($logo_width); ?>px;
    }
    .carrie-post-list-wrapper,
    .carrie-post-list .carrie-post .carrie-post-image {
        height: <?php echo intval($blog_homepage_slider_height); ?>px;
    }
    .carrie-post-list .carrie-post-details {
        padding-top: <?php echo intval($blog_homepage_slider_height/4); ?>px;
    }
    @media (min-width: 1024px)  {
        body.blog.blog-transparent-header-enable .carrie-post-list-wrapper,
        body.blog.blog-transparent-header-enable .carrie-post-list .carrie-post .carrie-post-image {
            height: <?php echo intval($blog_homepage_slider_height+$header_height); ?>px;
        }
        body.blog.blog-transparent-header-enable .carrie-post-list .carrie-post-details {
            padding-top: <?php echo intval($header_height+$blog_homepage_slider_height/4+40); ?>px;
        }
        body.single-post.blog-post-header-with-bg.blog-post-transparent-header-enable .container-fluid.container-page-item-title.with-bg .page-item-title-single,
        body.page.blog-post-header-with-bg.blog-post-transparent-header-enable .container-fluid.container-page-item-title.with-bg .page-item-title-single {
            padding-top: <?php echo intval(190+$header_height); ?>px;
        }
    }
    <?php
    /**
    * Custom CSS
    **/
    if(isset($carrie_theme_options['custom_css_code'])) {

        echo wp_strip_all_tags($carrie_theme_options['custom_css_code']); // This variable contains user Custom CSS code and can't be escaped with WordPress functions

    } ?>

    /**
    * Theme Google Font
    **/
    <?php
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

        if(isset($carrie_theme_options['font_google_disable']) && $carrie_theme_options['font_google_disable']) {

            $carrie_theme_options['body_font']['font-family'] = $carrie_theme_options['font_regular'];
            $carrie_theme_options['header_font']['font-family'] = $carrie_theme_options['font_regular'];
            $carrie_theme_options['additional_font']['font-family'] = $carrie_theme_options['font_regular'];
        }
    ?>
    h1, h2, h3, h4, h5, h6 {
        font-family: '<?php echo esc_html($carrie_theme_options['header_font']['font-family']); ?>';
    }
    .author-bio strong,
    .blog-post-related-single .blog-post-related-title,
    .blog-post-related-item .blog-post-related-title,
    .navigation-post .nav-post-name,
    .single-post .blog-post-related h5 {
        font-family: '<?php echo esc_html($carrie_theme_options['header_font']['font-family']); ?>';
    }
    h1 {
        font-size: <?php echo esc_html($carrie_theme_options['header_font']['font-size']); ?>px;
    }
    body {
        font-family: '<?php echo esc_html($carrie_theme_options['body_font']['font-family']); ?>';
        font-size: <?php echo esc_html($carrie_theme_options['body_font']['font-size']); ?>px;
    }
    <?php if(isset($carrie_theme_options['additional_font_enable']) && $carrie_theme_options['additional_font_enable']): ?>
    .navbar .nav > li a,
    .navbar .navbar-toggle,
    .blog-post .post-info,
    a.btn,
    .btn,
    .btn:focus,
    input[type="submit"],
    .wp-block-button a,
    .woocommerce #content input.button,
    .woocommerce #respond input#submit,
    .woocommerce a.button,
    .woocommerce button.button,
    .woocommerce input.button,
    .woocommerce-page #content input.button,
    .woocommerce-page #respond input#submit,
    .woocommerce-page a.button,
    .woocommerce-page button.button,
    .woocommerce-page input.button,
    .woocommerce a.added_to_cart,
    .woocommerce-page a.added_to_cart,
    a.more-link,
    .footer-sidebar.sidebar .widgettitle,
    .footer-sidebar-2.sidebar .widgettitle,
    .blog-post .post-info-date,
    .blog-post .post-categories,
    .blog-post-related.blog-post-related-loop .blog-post-related-item .blog-post-related-date,
    .page-item-title-single .post-date,
    .page-item-title-single .post-categories,
    .author-bio h5,
    .comment-metadata .author,
    .comment-metadata .date,
    .blog-post-related-single .post-categories,
    .blog-post-related-single .blog-post-related-date,
    .homepage-welcome-block h5,
    .sidebar .widget.widget_carrie_text .carrie-textwidget h5,
    .page-item-title-archive p,
    .navigation-post .nav-post-title,
    .navigation-paging.navigation-post a,
    .carrie-popular-post-list-wrapper .carrie-popular-post .carrie-popular-post-category,
    .carrie-popular-post-list-wrapper .carrie-popular-post .carrie-popular-post-date,
    .carrie-editorspick-post-list-wrapper .carrie-editorspick-post .carrie-editorspick-post-date,
    .carrie-editorspick-post-list-wrapper .carrie-editorspick-post .carrie-editorspick-post-category,
    .carrie-post-list .carrie-post-details .carrie-post-category,
    .carrie-post-pagination .carrie-post-pagination-category,
    .blog-post .entry-content h5,
    .page .entry-content h5,
    .header-menu,
    .carrie-post-list .carrie-post-details .carrie-post-date,
    .carrie-popular-post-list-wrapper .carrie-popular-post-list .carrie-popular-post .carrie-popular-post-details .carrie-popular-post-category,
    .carrie-verticalbar,
    .homepage-welcome-block .welcome-image-overlay span,
    .post-counters,
    .carrie-editorspick-post-list-wrapper > h3,
    .container-fluid-footer .footer-menu,
    .footer-instagram-wrapper > h3,
    .blog-post .post-author,
    .blog-post-related h5,
    .blog-post-related.blog-post-related-loop .blog-post-related-item .blog-post-related-category,
    .blog-post .sticky-post-badge,
    .navigation-paging .wp-pagenavi a,
    .navigation-paging .wp-pagenavi span.current,
    .navigation-paging .wp-pagenavi span.extend,
    body .mc4wp-form .mailchimp-widget-signup-form input[type="email"],
    .page-item-title-single .post-author,
    .blog-post .tags a,
    .comment-meta .reply a,
    .sidebar .widget.widget_carrie_recent_entries li .post-date,
    body .ig_form_container .ig_form_els input,
    body .ig_popup.ig_inspire .ig_button,
    body .ig_popup.ig_inspire input[type="submit"],
    body .ig_popup.ig_inspire input[type="button"],
    .sidebar .widget.widget_carrie_recent_comments .carrie_recentcomments .comment-date,
    .sidebar .widget.widget_carrie_posts_slider .widget-post-slider-wrapper .post-date,
    .sidebar .widget.widget_carrie_posts_slider .widget-post-slider-wrapper .post-category,
    .search-close-btn,
    .sidebar .widget.widget_carrie_popular_entries li .widget-post-position,
    .sidebar .widget.widget_carrie_popular_entries li .post-category,
    header .header-post-content .header-post-details .header-post-category,
    .carrie-theme-block h4,
    .blog-post.blog-post-single .post-info-vertical {
        font-family: '<?php echo esc_html($carrie_theme_options['additional_font']['font-family']); ?>';
    }
    <?php endif; ?>

    /**
    * Colors and color skins
    */
    <?php
    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['color_skin_name']) ) {
      $carrie_theme_options['color_skin_name'] = $_GET['color_skin_name'];
    }

    if(!isset($carrie_theme_options['color_skin_name'])) {
        $color_skin_name = 'none';
    }
    else {
        $color_skin_name = $carrie_theme_options['color_skin_name'];
    }
    // Use panel settings
    if($color_skin_name == 'none') {

        $theme_body_color = $carrie_theme_options['theme_body_color'];
        $theme_text_color = $carrie_theme_options['theme_text_color'];
        $theme_main_color = $carrie_theme_options['theme_main_color'];
        $theme_header_bg_color = $carrie_theme_options['theme_header_bg_color'];
        $theme_cat_menu_bg_color = $carrie_theme_options['theme_cat_menu_bg_color'];
        $theme_footer_color = $carrie_theme_options['theme_footer_color'];
        $theme_masonry_bg_color = $carrie_theme_options['theme_masonry_bg_color'];

    }
    // Default skin
    if($color_skin_name == 'default') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#8ba0a8';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#222222';
        $theme_masonry_bg_color = '#F5F5F5';

    }
    // Black skin
    if($color_skin_name == 'black') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#444444';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';
        $theme_masonry_bg_color = '#F5F5F5';

    }
    // Grey sking
    if($color_skin_name == 'grey') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#8e9da5';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';
        $theme_masonry_bg_color = '#F5F5F5';
    }
    // Light blue skin
    if($color_skin_name == 'lightblue') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#A2C6EA';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';
        $theme_masonry_bg_color = '#F5F5F5';

    }
    // Blue skin
    if($color_skin_name == 'blue') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#346DF4';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';
        $theme_masonry_bg_color = '#F5F5F5';

    }
    // Red
    if($color_skin_name == 'red') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#D43034';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';
        $theme_masonry_bg_color = '#F5F5F5';

    }
    // Green
    if($color_skin_name == 'green') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#00BC8F';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';
        $theme_masonry_bg_color = '#F5F5F5';

    }
    // Orange
    if($color_skin_name == 'orange') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#ec9f2e';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';
        $theme_masonry_bg_color = '#F5F5F5';

    }
    // RedOrange
    if($color_skin_name == 'redorange') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#F2532F';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';
        $theme_masonry_bg_color = '#F5F5F5';

    }
    // Brown
    if($color_skin_name == 'brown') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#C3A36B';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';
        $theme_masonry_bg_color = '#F5F5F5';

    }
    ?>
    <?php if(isset($carrie_theme_options['body_bg_image']) && $carrie_theme_options['body_bg_image']['url'] <> ''): ?>
    html:not(.offcanvassidebar) body,
    html.offcanvassidebar body .st-sidebar-pusher {
        <?php
        echo 'background-image: url('.esc_url($carrie_theme_options['body_bg_image']['url']).');';
        if(isset($carrie_theme_options['body_bg_style'])) {
            if($carrie_theme_options['body_bg_style'] == 'repeat') {
                echo 'background-repeat: repeat;';
            }
            if($carrie_theme_options['body_bg_style'] == 'cover') {
                echo 'background-size: cover;';
            }
        }
        ?>
    }
    <?php endif; ?>
    <?php if(isset($carrie_theme_options['header_bg_image']) && $carrie_theme_options['header_bg_image']['url'] <> ''): ?>
    header {
        <?php

        echo 'background-image: url('.esc_url($carrie_theme_options['header_bg_image']['url']).');';
        if(isset($carrie_theme_options['header_bg_style'])) {

            if($carrie_theme_options['header_bg_style'] == 'repeat') {
                echo 'background-repeat: repeat;';
            }
            if($carrie_theme_options['header_bg_style'] == 'cover') {
                echo 'background-size: cover;';
            }
        }

        ?>
    }
    .container-fluid.container-page-item-title,
    .carrie-blog-posts-slider {
        margin-top: 0;
    }
    .mainmenu-belowheader:not(.fixed),
    .mainmenu-belowheader:not(.fixed) .navbar {
        background-color: transparent!important;
    }
    <?php endif; ?>

    body {
        background-color: <?php echo esc_html($theme_body_color); ?>;
        color: <?php echo esc_html($theme_text_color); ?>;
    }
    .st-pusher,
    .st-sidebar-pusher,
    .st-sidebar-menu .sidebar,
    .carrie-popular-post-list-wrapper .carrie-popular-post-list .carrie-popular-post .carrie-popular-post-details,
    .blog-post .blog-post-thumb + .post-content,
    .carrie-editorspick-post-list-wrapper .carrie-editorspick-post,
    .carrie-editorspick-post-list-wrapper .carrie-editorspick-post.carrie-editorspick-post-small .carrie-editorspick-post-details,
    .carrie-editorspick-post-list-wrapper .carrie-editorspick-post.carrie-editorspick-post-large .carrie-editorspick-post-details,
    .sidebar .widget.widget_carrie_posts_slider .widget-post-slider-wrapper .widget-post-details-wrapper,
    .navigation-paging .wp-pagenavi a, .navigation-paging .wp-pagenavi span.current, .navigation-paging .wp-pagenavi span.extend,
    .blog-enable-paper-page.page .content-block .page-container:before,
    .blog-enable-paper-page.archive .content-block .page-container:before,
    .blog-enable-paper-page.search .content-block .page-container:before,
    .blog-enable-paper-page.single-post .content-block .post-container:before {
        background-color: <?php echo esc_html($theme_body_color); ?>;
    }
    .woocommerce #content input.button.alt,
    .woocommerce #respond input#submit.alt,
    .woocommerce a.button.alt,
    .woocommerce button.button.alt,
    .woocommerce input.button.alt,
    .woocommerce-page #content input.button.alt,
    .woocommerce-page #respond input#submit.alt,
    .woocommerce-page a.button.alt,
    .woocommerce-page button.button.alt,
    .woocommerce-page input.button.alt,
    .btn:hover,
    .wp-block-button a:hover,
    .btn.btn-white:hover,
    .btn.btn-black:hover,
    input[type="submit"]:hover,
    .woocommerce #content input.button:hover,
    .woocommerce #respond input#submit:hover,
    .woocommerce a.button:hover,
    .woocommerce button.button:hover,
    .woocommerce input.button:hover,
    .woocommerce-page #content input.button:hover,
    .woocommerce-page #respond input#submit:hover,
    .woocommerce-page a.button:hover,
    .woocommerce-page button.button:hover,
    .woocommerce-page input.button:hover,
    a.more-link:hover,
    .btn-primary:hover,
    .btn-primary:active,
    .btn.alt,
    header .header-promo-content .btn:hover,
    .nav > li .sub-menu,
    .blog-post .tags a:hover,
    .blog-post-related-item-details,
    .blog-post .sticky-post-badge,
    .post-social-wrapper .post-social-title a:hover,
    .navigation-paging .wp-pagenavi a:hover,
    .navigation-paging .wp-pagenavi span.current,
    #top-link,
    .sidebar .widget_calendar th,
    .sidebar .widget_calendar tfoot td,
    .sidebar .widget_tag_cloud .tagcloud a:hover,
    .sidebar .widget_product_tag_cloud .tagcloud a:hover,
    .comment-meta .reply a:hover,
    body .owl-theme .owl-controls .owl-nav div.owl-prev,
    body .owl-theme .owl-controls .owl-nav div.owl-next,
    body .owl-theme .owl-controls .owl-page.active span,
    body .owl-theme .owl-controls.clickable .owl-page:hover span,
    body .owl-theme .owl-dots .owl-dot.active span,
    body .owl-theme .owl-dots .owl-dot:hover span,
    .st-sidebar-menu-close-btn,
    body .ig_popup.ig_inspire .ig_button,
    body .ig_popup.ig_inspire input[type="submit"],
    body .ig_popup.ig_inspire input[type="button"] {
        background-color: <?php echo esc_html($theme_main_color); ?>;
    }
    a,
    a:focus,
    blockquote:before,
    .blog-post .format-quote .entry-content:before,
    .container-fluid.container-page-item-title.with-bg .post-info-share .post-social a:hover,
    .container-fluid.container-page-item-title.with-bg .page-item-title-single .post-categories a,
    header .header-post-content .header-post-details .header-post-title a:hover,
    .header-info-text a:hover,
    .header-menu .header-menu-offcanvasmenu a:hover,
    .header-menu .header-menu-search a:hover,
    .header-menu li a:hover,
    .navbar .nav > li > a:hover,
    .blog-post.blog-post-single .post-info-vertical a:hover,
    .blog-post .post-info .post-info-comments a:hover,
    .blog-post .post-author a:hover,
    .blog-post .post-categories,
    .blog-post .post-header-title sup,
    .blog-post .post-header-title a:hover,
    .author-bio .author-social-icons li a:hover,
    .blog-post-related.blog-post-related-loop .blog-post-related-item .blog-post-related-title a:hover,
    .post-social-wrapper .post-social a:hover,
    .navigation-paging.navigation-post a,
    .navigation-post .nav-post-prev:hover .nav-post-name,
    .navigation-post .nav-post-next:hover .nav-post-name,
    .blog-masonry-layout .blog-post.content-block .sticky:not(.sticky-post-without-image) .post-info .post-social a:hover,
    .blog-masonry-layout .blog-post.content-block .sticky:not(.sticky-post-without-image) .post-info .post-info-comments a:hover,
    .blog-masonry-layout .blog-post.content-block .sticky:not(.sticky-post-without-image) .post-author a:hover,
    .footer-sidebar-2.sidebar .widget a:hover,
    footer a:hover,
    footer .footer-social .social-icons-wrapper a:hover,
    .sidebar .widget ul > li a:hover,
    .sidebar .widget_text a,
    .comment-metadata .author a,
    .comment-metadata .date a:hover,
    .carrie-post-list .carrie-post-details .carrie-post-category a,
    .carrie-popular-post-list-wrapper .carrie-popular-post-list .carrie-popular-post .carrie-popular-post-details .carrie-popular-post-title h5:hover,
    .carrie-editorspick-post-list-wrapper .carrie-editorspick-post .carrie-editorspick-post-title a:hover,
    .sidebar .widget.widget_carrie_posts_slider .widget-post-slider-wrapper .post-title:hover,
    .sidebar .widget.widget_carrie_posts_slider .widget-post-slider-wrapper .post-category a,
    .sidebar .widget.widget_carrie_popular_entries li .post-category a,
    .sidebar .widget.widget_carrie_popular_entries li .widget-post-thumb-wrapper-container .widget-post-details-wrapper .post-category a,
    .sidebar .widget.widget_carrie_popular_entries li .widget-post-thumb-wrapper-container .widget-post-details-wrapper a:hover,
    body .select2-results .select2-highlighted,
    .social-icons-wrapper a:hover  {
        color: <?php echo esc_html($theme_main_color); ?>;
    }
    .woocommerce #content input.button.alt,
    .woocommerce #respond input#submit.alt,
    .woocommerce a.button.alt,
    .woocommerce button.button.alt,
    .woocommerce input.button.alt,
    .woocommerce-page #content input.button.alt,
    .woocommerce-page #respond input#submit.alt,
    .woocommerce-page a.button.alt,
    .woocommerce-page button.button.alt,
    .woocommerce-page input.button.alt,
    .btn:hover,
    .btn.btn-white:hover,
    .btn.btn-black:hover,
    input[type="submit"]:hover,
    .woocommerce #content input.button:hover,
    .woocommerce #respond input#submit:hover,
    .woocommerce a.button:hover,
    .woocommerce button.button:hover,
    .woocommerce input.button:hover,
    .woocommerce-page #content input.button:hover,
    .woocommerce-page #respond input#submit:hover,
    .woocommerce-page a.button:hover,
    .woocommerce-page button.button:hover,
    .woocommerce-page input.button:hover,
    a.more-link:hover,
    .btn.alt,
    header .header-promo-content .btn:hover,
    .navbar .nav > li > a:hover,
    .sidebar .widget_calendar tbody td a,
    .carrie-post-list-nav .carrie-post-list-nav-prev {
        border-color: <?php echo esc_html($theme_main_color); ?>;
    }
    header {
        background-color: <?php echo esc_html($theme_header_bg_color); ?>;
    }
    .mainmenu-belowheader {
        background-color: <?php echo esc_html($theme_cat_menu_bg_color); ?>;
    }
    footer {
        background-color: <?php echo esc_html($theme_footer_color); ?>;
    }
    .blog-masonry-layout .blog-post.content-block .post-content,
    .blog-masonry-layout .post-content-wrapper {
        background-color: <?php echo esc_html($theme_masonry_bg_color); ?>;
    }

    <?php

    	$out = ob_get_clean();

		$out .= ' /*' . date("Y-m-d H:i") . '*/';
		/* RETURN */
		return $out;
	}
?>
