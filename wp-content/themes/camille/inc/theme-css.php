<?php

	add_action( 'wp_enqueue_scripts', 'camille_enqueue_dynamic_styles', '999' );

	function camille_enqueue_dynamic_styles( ) {

        require_once(ABSPATH . 'wp-admin/includes/file.php');

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

			$out = camille_get_css();

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

	function camille_get_css () {
		$camille_theme_options = camille_get_theme_options();
		// ===
		ob_start();
    ?>
    <?php
    if ( defined('DEMO_MODE') && isset($_GET['header_height']) ) {
      $camille_theme_options['header_height'] = $_GET['header_height'];
    }

    if(isset($camille_theme_options['header_height']) && $camille_theme_options['header_height'] > 0) {
        $header_height = $camille_theme_options['header_height'];
    } else {
        $header_height = 225;
    }

    if(isset($camille_theme_options['logo_width']) && $camille_theme_options['logo_width'] > 0) {
        $logo_width = $camille_theme_options['logo_width'];
    } else {
        $logo_width = 370;
    }

    if(isset($camille_theme_options['footer_logo_width']) && $camille_theme_options['footer_logo_width'] > 0) {
        $footer_logo_width = $camille_theme_options['footer_logo_width'];
    } else {
        $footer_logo_width = 370;
    }

    if(isset($camille_theme_options['blog_homepage_slider_height']) && $camille_theme_options['blog_homepage_slider_height'] > 0) {
        $blog_homepage_slider_height = $camille_theme_options['blog_homepage_slider_height'];
    } else {
        $blog_homepage_slider_height = 500;
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
    footer .footer-logo img {
        width: <?php echo intval($footer_logo_width); ?>px;
    }
    .camille-post-list-wrapper,
    .camille-post-list .camille-post .camille-post-image {
      height: <?php echo intval($blog_homepage_slider_height); ?>px;
    }
    <?php
    /**
    * Custom CSS
    **/
    if(isset($camille_theme_options['custom_css_code'])) {

        echo camille_wp_kses_data($camille_theme_options['custom_css_code']); // This variable contains user Custom CSS code and can't be escaped with WordPress functions

    } ?>

    /**
    * Theme Google Font
    **/
    <?php
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

        if(isset($camille_theme_options['font_google_disable']) && $camille_theme_options['font_google_disable']) {

            $camille_theme_options['body_font']['font-family'] = $camille_theme_options['font_regular'];
            $camille_theme_options['header_font']['font-family'] = $camille_theme_options['font_regular'];
            $camille_theme_options['additional_font']['font-family'] = $camille_theme_options['font_regular'];
        }
    ?>
    h1, h2, h3, h4, h5, h6 {
        font-family: '<?php echo esc_html($camille_theme_options['header_font']['font-family']); ?>';
    }
    blockquote,
    header .header-blog-info,
    .author-bio strong,
    .blog-post-related-single .blog-post-related-title,
    .blog-post-related-item .blog-post-related-title,
    .navigation-post .nav-post-name,
    footer .footer-social .social-icons-wrapper a,
    .search-fullscreen-wrapper .search-fullscreen-form input[type="search"],
    .sidebar .widgettitle,
    .sidebar .widget ul > li,
    .sidebar .widget.widget_camille_posts_slider .widget-post-slider-wrapper .post-title,
    .blog-post .blog-post-thumb-sticky-badge,
    .blog-post .post-header-title sup,
    .blog-post-related h5,
    .comment-metadata .author,
    .blog-post .format-quote .entry-content  {
        font-family: '<?php echo esc_html($camille_theme_options['header_font']['font-family']); ?>';
    }
    h1 {
        font-size: <?php echo esc_html($camille_theme_options['header_font']['font-size']); ?>px;
    }
    body {
        font-family: '<?php echo esc_html($camille_theme_options['body_font']['font-family']); ?>';
        font-size: <?php echo esc_html($camille_theme_options['body_font']['font-size']); ?>px;
    }
    .sidebar .widget.widget_camille_recent_entries li .post-date,
    .sidebar .widget.widget_camille_recent_comments .camille_recentcomments .comment-date,
    .homepage-welcome-block .welcome-image-overlay h5,
    .sidebar .widget.widget_camille_popular_entries li .post-category,
    .camille-editorspick-post-list-wrapper > h3,
    .footer-instagram-wrapper > h3 {
        font-family: '<?php echo esc_html($camille_theme_options['body_font']['font-family']); ?>';
    }
    <?php if(isset($camille_theme_options['additional_font_enable']) && $camille_theme_options['additional_font_enable']): ?>
    .navbar .nav > li a,
    .navbar .navbar-toggle,
    .blog-post .post-info,
    a.btn,
    .wp-block-button a,
    .btn,
    .btn:focus,
    input[type="submit"],
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
    .sidebar .widget.widget_camille_text .camille-textwidget h5,
    .page-item-title-archive p,
    .navigation-post .nav-post-title,
    .navigation-paging.navigation-post a,
    .camille-popular-post-list-wrapper .camille-popular-post .camille-popular-post-category,
    .camille-popular-post-list-wrapper .camille-popular-post .camille-popular-post-date,
    .camille-editorspick-post-list-wrapper .camille-editorspick-post .camille-editorspick-post-date,
    .camille-editorspick-post-list-wrapper .camille-editorspick-post .camille-editorspick-post-category,
    .camille-post-list .camille-post-details .camille-post-category,
    .camille-post-pagination .camille-post-pagination-category,
    .blog-post .entry-content h5,
    .page .entry-content h5,
    .header-menu,
    .camille-post-list .camille-post-details .camille-post-date,
    .camille-popular-post-list-wrapper .camille-popular-post-list .camille-popular-post .camille-popular-post-details .camille-popular-post-category,
    .camille-verticalbar,
    .homepage-welcome-block .welcome-image-overlay span,
    .post-counters,
    .camille-editorspick-post-list-wrapper > h3,
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
    .comments-title,
    .comment-meta .reply a,
    .sidebar .widget.widget_camille_recent_entries li .post-date,
    body .ig_form_container .ig_form_els input,
    body .ig_popup.ig_inspire .ig_button,
    body .ig_popup.ig_inspire input[type="submit"],
    body .ig_popup.ig_inspire input[type="button"],
    .sidebar .widget.widget_camille_recent_comments .camille_recentcomments .comment-date,
    .sidebar .widget.widget_camille_posts_slider .widget-post-slider-wrapper .post-date,
    .sidebar .widget.widget_camille_posts_slider .widget-post-slider-wrapper .post-category,
    .search-close-btn,
    .sidebar .widget.widget_camille_popular_entries li .widget-post-position,
    .sidebar .widget.widget_camille_popular_entries li .post-category {
        font-family: '<?php echo esc_html($camille_theme_options['additional_font']['font-family']); ?>';
    }
    <?php endif; ?>

    /**
    * Colors and color skins
    */
    <?php
    // Demo settings
    if ( defined('DEMO_MODE') && isset($_GET['color_skin_name']) ) {
      $camille_theme_options['color_skin_name'] = $_GET['color_skin_name'];
    }

    if(!isset($camille_theme_options['color_skin_name'])) {
        $color_skin_name = 'none';
    }
    else {
        $color_skin_name = $camille_theme_options['color_skin_name'];
    }
    // Use panel settings
    if($color_skin_name == 'none') {

        $theme_body_color = $camille_theme_options['theme_body_color'];
        $theme_text_color = $camille_theme_options['theme_text_color'];
        $theme_main_color = $camille_theme_options['theme_main_color'];
        $theme_header_bg_color = $camille_theme_options['theme_header_bg_color'];
        $theme_cat_menu_bg_color = $camille_theme_options['theme_cat_menu_bg_color'];
        $theme_footer_color = $camille_theme_options['theme_footer_color'];

    }
    // Default skin
    if($color_skin_name == 'default') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#F37879';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';

    }
    // Black skin
    if($color_skin_name == 'black') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#444444';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';

    }
    // Grey sking
    if($color_skin_name == 'grey') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#8e9da5';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';
    }
    // Light blue skin
    if($color_skin_name == 'lightblue') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#A2C6EA';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';

    }
    // Blue skin
    if($color_skin_name == 'blue') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#346DF4';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';

    }
    // Red
    if($color_skin_name == 'red') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#D43034';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';

    }
    // Green
    if($color_skin_name == 'green') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#00BC8F';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';

    }
    // Orange
    if($color_skin_name == 'orange') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#ec9f2e';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';

    }
    // RedOrange
    if($color_skin_name == 'redorange') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#F2532F';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';

    }
    // Brown
    if($color_skin_name == 'brown') {

        $theme_body_color = '#FFFFFF';
        $theme_text_color = '#000000';
        $theme_main_color = '#C3A36B';
        $theme_header_bg_color = '#FFFFFF';
        $theme_cat_menu_bg_color = '#FFFFFF';
        $theme_footer_color = '#1E1C1C';

    }
    ?>
    <?php if(isset($camille_theme_options['body_bg_image']) && $camille_theme_options['body_bg_image']['url'] <> ''): ?>
    html:not(.offcanvassidebar) body,
    html.offcanvassidebar body .st-sidebar-pusher {
        <?php
        echo 'background-image: url('.esc_url($camille_theme_options['body_bg_image']['url']).');';
        if(isset($camille_theme_options['body_bg_style'])) {
            if($camille_theme_options['body_bg_style'] == 'repeat') {
                echo 'background-repeat: repeat;';
            }
            if($camille_theme_options['body_bg_style'] == 'cover') {
                echo 'background-size: cover;';
            }
        }
        ?>
    }
    <?php endif; ?>
    <?php if(isset($camille_theme_options['header_bg_image']) && $camille_theme_options['header_bg_image']['url'] <> ''): ?>
    header {
        <?php

        echo 'background-image: url('.esc_url($camille_theme_options['header_bg_image']['url']).');';
        if(isset($camille_theme_options['header_bg_style'])) {

            if($camille_theme_options['header_bg_style'] == 'repeat') {
                echo 'background-repeat: repeat;';
            }
            if($camille_theme_options['header_bg_style'] == 'cover') {
                echo 'background-size: cover;';
            }
        }

        ?>
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
    .st-sidebar-menu .sidebar {
        background-color: <?php echo esc_html($theme_body_color); ?>;
    }
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
    .btn.alt:hover,
    blockquote:before,
    .blog-post .format-quote .entry-content:before,
    .social-icons-wrapper a,
    .blog-post .tags a:hover,
    .blog-post-related-item-details,
    .navigation-paging .wp-pagenavi a:hover,
    .navigation-paging .wp-pagenavi span.current,
    #top-link,
    .sidebar .widget_calendar th,
    .sidebar .widget_calendar tfoot td,
    .sidebar .widget_tag_cloud .tagcloud a:hover,
    .sidebar .widget_product_tag_cloud .tagcloud a:hover,
    .comment-meta .reply a:hover,
    .camille-post-list .camille-post.camille-post-layout-vertical .camille-post-details .btn:hover,
    .sidebar .widget.widget_camille_posts_slider .widget-post-slider-wrapper .widget-post-thumb-wrapper-container,
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
    .header-info-text a:hover,
    .header-menu li a:hover,
    .navbar .nav > li > a:hover,
    .blog-enable-dropcaps .blog-post.blog-post-single .post-content .entry-content > p:first-child:first-letter,
    .blog-post .tags .tags-icon,
    .blog-post .post-info-wrapper .comments-count i.fa,
    .blog-post .post-info-wrapper .views-count i.fa,
    .blog-post .post-info-wrapper .post-date-wrapper i.fa,
    .blog-post .post-info-wrapper .comments-count a:hover,
    .blog-post .post-header-title sup,
    .blog-post .post-header-title a:hover,
    .blog-post-related.blog-post-related-loop .blog-post-related-item .blog-post-related-title a:hover,
    .navigation-paging.navigation-post a,
    .navigation-post a:hover,
    .navigation-post a:hover .nav-post-name,
    .blog-masonry-layout .blog-post.content-block .sticky:not(.sticky-post-without-image) .post-content .post-header-title a:hover,
    .blog-masonry-layout .blog-post.content-block .sticky:not(.sticky-post-without-image) .post-info-wrapper a:hover,
    .blog-masonry-layout .blog-post.content-block .sticky:not(.sticky-post-without-image) .post-info-wrapper .comments-count a:hover,
    .footer-sidebar-2.sidebar .widget a:hover,
    footer a:hover,
    footer .footer-social .social-icons-wrapper a:hover,
    .sidebar .widget ul > li a:hover,
    .sidebar .widget_text a,
    .comment-metadata .author a,
    .comment-metadata .date a:hover,
    .camille-post-list .camille-post-details .camille-post-category,
    .camille-post-list .camille-post-details .camille-post-category a,
    .camille-editorspick-post-list-wrapper .camille-editorspick-post .camille-editorspick-post-title a:hover,
    .homepage-welcome-block .welcome-image-overlay h4 a:hover,
    .sidebar .widget.widget_camille_posts_slider .widget-post-slider-wrapper .post-title:hover,
    .sidebar .widget.widget_camille_popular_entries li .widget-post-thumb-wrapper-container .widget-post-details-wrapper a:hover,
    body .select2-results .select2-highlighted {
        color: <?php echo esc_html($theme_main_color); ?>;
    }
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
    .btn.alt:hover,
    .page-item-title-single .post-categories:before,
    .search-fullscreen-wrapper .search-fullscreen-form input[type="search"],
    .blog-post .post-categories:before,
    .sidebar .widget_calendar tbody td a,
    .camille-post-list .camille-post.camille-post-layout-vertical .camille-post-details .btn,
    .camille-post-list-nav .camille-post-list-nav-prev {
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

    <?php

    	$out = ob_get_clean();

		$out .= ' /*' . date("Y-m-d H:i") . '*/';
		/* RETURN */
		return $out;
	}
?>
