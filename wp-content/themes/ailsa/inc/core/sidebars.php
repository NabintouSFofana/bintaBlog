<?php
/*
 * Ailsa Theme Widgets
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

if ( ! function_exists( 'ailsa_framework_widget_init' ) ) {
	function ailsa_framework_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {

            // Main Widget Area
            register_sidebar(
            	array(
            		'name' => esc_html__( 'Main Widget', 'ailsa' ),
            		'id' => 'sidebar-1',
            		'description' => esc_html__( 'Appears on posts and pages.', 'ailsa' ),
            		'before_widget' => '<div id="%1$s" class="aisa-widget %2$s">',
            		'after_widget' => '</div> <!-- end widget -->',
            		'before_title' => '<h2 class="widget-title">',
            		'after_title' => '</h2>',
            	)
            );
            // Main Widget Area

            // Menu Widget
            register_sidebar(
            	array(
            		'name' => esc_html__( 'Menu Widget', 'ailsa' ),
            		'id' => 'sidebar-menu',
            		'description' => esc_html__( 'Appears on navigation bar.', 'ailsa' ),
            		'before_widget' => '<div id="%1$s" class="aisa-widget %2$s">',
            		'after_widget' => '</div> <!-- end widget -->',
            		'before_title' => '<h2 class="widget-title">',
            		'after_title' => '</h2>',
            	)
            );
            // Main Widget Area

            // Footer Widgets
            $footer_widgets = cs_get_option( 'footer_widget_layout' );
            if( $footer_widgets ) {

                $footer_instafeed_block = cs_get_option( 'footer_instafeed_block' );
                if( $footer_instafeed_block ) {
                    register_sidebar( array(
                        'id'            => 'footer-instafeed-block',
                        'name'          => esc_html__( 'Footer Instagram Feed Widget', 'ailsa' ),
                        'description'   => esc_html__( 'Appears on footer section before footer widgets area.', 'ailsa' ),
                        'before_widget' => '<div class="aisa-widget %2$s">',
                        'after_widget'  => '<div class="clear"></div></div> <!-- end widget -->',
                        'before_title'  => '<h2 class="widget-title">',
                        'after_title'   => '</h2>'
                    ) );
                }

                switch ( $footer_widgets ) {
                    case 5:
                    case 6:
                    case 7:
                      $length = 3;
                    break;

                    case 8:
                    case 9:
                      $length = 4;
                    break;

                    default:
                      $length = $footer_widgets;
                    break;
                }

                for( $i = 0; $i < $length; $i++ ) {
                    $num = ( $i+1 );
                    register_sidebar( array(
                        'id'            => 'footer-' . $num,
                        'name'          => esc_html__( 'Footer Widget ', 'ailsa' ). $num,
                        'description'   => esc_html__( 'Appears on footer section.', 'ailsa' ),
                        'before_widget' => '<div class="aisa-widget %2$s">',
                        'after_widget'  => '<div class="clear"></div></div> <!-- end widget -->',
                        'before_title'  => '<h2 class="widget-title">',
                        'after_title'   => '</h2>'
                    ) );
                }
            }
            // Footer Widgets

			/* Custom Sidebar */
			$custom_sidebars = cs_get_option('custom_sidebar');
			if ($custom_sidebars) {
			  foreach($custom_sidebars as $custom_sidebar) :
				$heading = $custom_sidebar['sidebar_name'];
				$own_id = preg_replace('/[^a-z]/', "-", strtolower($heading));
				$desc = $custom_sidebar['sidebar_desc'];

				register_sidebar( array(
					'name' => esc_html($heading),
					'id' => $own_id,
					'description' => esc_html($desc),
					'before_widget' => '<div id="%1$s" class="aisa-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h2 class="widget-title">',
					'after_title' => '</h2>',
				) );
              endforeach;
			}
			/* Custom Sidebar */
		}
	}
	add_action( 'widgets_init', 'ailsa_framework_widget_init' );
}