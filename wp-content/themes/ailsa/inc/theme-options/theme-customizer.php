<?php
/*
 * All customizer related options for Ailsa theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

if( ! function_exists( 'ailsa_framework_customizer' ) ) {
  function ailsa_framework_customizer( $options ) {

	$options        = array(); // remove old options

	// Primary Color
	$options[]      = array(
	  'name'        => 'elemets_color_section',
	  'title'       => esc_html__('Primary Color', 'ailsa'),
	  'settings'    => array(

        // Fields Start
        array(
				  'name'      => 'all_element_colors',
				  'default'   => '#efa48d',
				  'control'   => array(
					  'type'  => 'color',
					  'label' => esc_html__('Elements Color', 'ailsa'),
					  'description'    => esc_html__('This is theme primary color, means it\'ll affect all elements that have default color of our theme primary color.', 'ailsa'),
				  ),
        ),
	    	// Fields End
	  )
	);
	// Primary Color

   	// Header Color
	$options[]      = array(
	  'name'        => 'header_color_section',
	  'title'       => esc_html__('01. Header Colors', 'ailsa'),
	  'settings'    => array(

	    // Fields Start
        array(
          'name'          => 'menubar_bg_heading',
		  'control'       => array(
			  'type'        => 'cs_field',
			  'options'     => array(
				  'type'      => 'notice',
				  'class'     => 'info',
				  'content'   => esc_html__('Menu Bar Color', 'ailsa'),
			),
		  ),
        ),
		array(
			'name'      => 'menubar_bg_color',
			'control'   => array(
				'type'  => 'color',
				'label' => esc_html__('Background Color', 'ailsa'),
			),
		),

    	array(
			'name'          => 'menubar_mainmenu_heading',
			'control'       => array(
				'type'        => 'cs_field',
				'options'     => array(
					'type'      => 'notice',
					'class'     => 'info',
					'content'   => esc_html__('Main Menu Colors', 'ailsa'),
				),
			),
		),
		array(
			'name'      => 'mainmenu_link_color',
			'control'   => array(
				'type'  => 'color',
				'label' => esc_html__('Link Color', 'ailsa'),
			),
		),
		array(
			'name'      => 'mainmenu_link_hover_color',
			'control'   => array(
				'type'  => 'color',
				'label' => esc_html__('Link Hover Color', 'ailsa'),
			),
		),

		// Sub Menu Color
		array(
			'name'          => 'menubar_submenu_heading',
			'control'       => array(
				'type'        => 'cs_field',
				'options'     => array(
					'type'      => 'notice',
					'class'     => 'info',
					'content'   => esc_html__('Sub-Menu Colors', 'ailsa'),
				),
			),
		),
    array(
			'name'      => 'submenu_bg_color',
			'control'   => array(
				'type'  => 'color',
				'label' => esc_html__('Background Color', 'ailsa'),
			),
		),
		array(
			'name'      => 'submenu_link_color',
			'control'   => array(
				'type'  => 'color',
				'label' => esc_html__('Link Color', 'ailsa'),
			),
		),
		array(
			'name'      => 'submenu_link_hover_color',
			'control'   => array(
				'type'  => 'color',
				'label' => esc_html__('Link Hover Color', 'ailsa'),
			),
		),

    	array(
			'name'          => 'menubar_social_heading',
			'control'       => array(
				'type'        => 'cs_field',
				'options'     => array(
					'type'      => 'notice',
					'class'     => 'info',
					'content'   => esc_html__('Social Icon Color', 'ailsa'),
				),
			),
		),
		array(
			'name'      => 'menubar_social_color',
			'control'   => array(
				'type'  => 'color',
				'label' => esc_html__('Social Icon Color', 'ailsa'),
			),
		),
		array(
			'name'      => 'menubar_social_hover_color',
			'control'   => array(
				'type'  => 'color',
				'label' => esc_html__('Social Icons Hover Color', 'ailsa'),
			),
		),

        array(
			'name'          => 'logoarea_heading',
			'control'       => array(
				'type'        => 'cs_field',
				'options'     => array(
					'type'      => 'notice',
					'class'     => 'info',
					'content'   => esc_html__('Logo Area Color', 'ailsa'),
				),
			),
		),
    array(
			'name'      => 'logoarea_bg_color',
			'control'   => array(
				'type'  => 'color',
				'label' => esc_html__('Background Color', 'ailsa'),
			),
		),
    array(
			'name'      => 'slogan_text_color',
			'control'   => array(
				'type'  => 'color',
				'label' => esc_html__('Slogan Text Color', 'ailsa'),
			),
		),
	    // Fields End

	  )
	);
	// Header Color

  // Content Color
	$options[]      = array(
	  'name'        => 'content_section',
	  'title'       => esc_html__('02. Content Colors', 'ailsa'),
	  'description' => esc_html__('This is all about content area text and heading colors.', 'ailsa'),
	  'sections'    => array(

	  	array(
	      'name'          => 'content_text_section',
	      'title'         => esc_html__('Content Text', 'ailsa'),
	      'settings'      => array(

            // Fields Start
            array(
            	'name'      => 'body_color',
            	'control'   => array(
          			'type'  => 'color',
          			'label' => esc_html__('Body & Content Color', 'ailsa'),
            	),
            ),
			array(
				'name'      => 'body_links_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Body Links Color', 'ailsa'),
				),
			),
			array(
				'name'      => 'body_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Body Links Hover Color', 'ailsa'),
				),
			),
			array(
				'name'      => 'sidebar_content_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Sidebar Content Color', 'ailsa'),
				),
			),
			    // Fields End
		  )
		),

        // Text Colors Section
        array(
	      'name'          => 'content_heading_section',
	      'title'         => esc_html__('Headings', 'ailsa'),
	      'settings'      => array(

	      	// Fields Start
			array(
				'name'      => 'content_heading_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Content Heading Color', 'ailsa'),
				),
			),
    	array(
				'name'      => 'sidebar_heading_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Sidebar Heading Color', 'ailsa'),
				),
			),
            // Fields End

      	  )
        ),

	  )
	);
	// Content Color

    // Footer Color
	$options[]      = array(
	  'name'        => 'footer_section',
	  'title'       => esc_html__('03. Footer Colors', 'ailsa'),
	  'description' => esc_html__('This is all about footer settings. Make sure you\'ve enabled your needed section at : Ailsa > Theme Options > Footer ', 'ailsa'),
	  'sections'    => array(

			// Footer Widgets Block
	  	array(
	      'name'          => 'footer_widget_section',
	      'title'         => esc_html__('Widget Block', 'ailsa'),
	      'settings'      => array(

		    // Fields Start
            array(
		      'name'          => 'footer_widget_color_notice',
		      'control'       => array(
		        'type'        => 'cs_field',
		        'options'     => array(
		          'type'      => 'notice',
		          'class'     => 'info',
		          'content'   => esc_html__('Content Colors', 'ailsa'),
		        ),
		      ),
		    ),
			array(
				'name'      => 'footer_heading_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Widget Heading Color', 'ailsa'),
				),
			),
			array(
				'name'      => 'footer_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Widget Text Color', 'ailsa'),
				),
			),
			array(
				'name'      => 'footer_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Widget Link Color', 'ailsa'),
				),
			),
			array(
				'name'      => 'footer_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Widget Link Hover Color', 'ailsa'),
				),
			),
		    // Fields End
		  )
		),
		// Footer Widgets Block

        // Footer Copyright Block
	  	array(
	      'name'          => 'footer_copyright_section',
	      'title'         => esc_html__('Copyright Block', 'ailsa'),
	      'settings'      => array(

		    // Fields Start
		    array(
		      'name'          => 'footer_copyright_active',
		      'control'       => array(
		        'type'        => 'cs_field',
		        'options'     => array(
		          'type'      => 'notice',
		          'class'     => 'info',
		          'content'   => esc_html__('Make sure you\'ve enabled copyright block in : <br /> <strong>Ailsa > Theme Options > Footer > Copyright Bar : Enable Copyright Block</strong>', 'ailsa'),
		        ),
		      ),
		    ),

            array(
				'name'      => 'copyright_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Text Color', 'ailsa'),
				),
			),
			array(
				'name'      => 'copyright_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'ailsa'),
				),
			),
			array(
				'name'      => 'copyright_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'ailsa'),
				),
			),
			array(
				'name'      => 'copyright_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'ailsa'),
				),
			),
		  )
		),
		// Footer Copyright Block

	  )
	);
	// Footer Color

	return $options;

  }
  add_filter( 'cs_customize_options', 'ailsa_framework_customizer' );
}