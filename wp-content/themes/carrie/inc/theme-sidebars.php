<?php
/* Sidebars */
$carrie_theme_options = carrie_get_theme_options();

function carrie_sidebars_init() {

    register_sidebar(
      array(
        'name' => esc_html__( 'Default Blog sidebar', 'carrie' ),
        'id' => 'main-sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown in the left or right site column on: Main Blog page, Archives, Search.', 'carrie' )
      )
    );

    register_sidebar(
      array(
        'name' => esc_html__( 'Single Blog Post sidebar', 'carrie' ),
        'id' => 'post-sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown in the left or right site column on: Single Blog Post.', 'carrie' )
      )
    );

    register_sidebar(
      array(
        'name' => esc_html__( 'Page sidebar', 'carrie' ),
        'id' => 'page-sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown in the left or right site column on: Page.', 'carrie' )
      )
    );

    register_sidebar(
      array(
        'name' => esc_html__( 'WooCommerce sidebar', 'carrie' ),
        'id' => 'woocommerce-sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown in the left or right site column for woocommerce pages.', 'carrie' )
      )
    );

    register_sidebar(
      array(
        'name' => esc_html__( 'Footer sidebar', 'carrie' ),
        'id' => 'footer-sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown in site footer in 3 columns.', 'carrie' )
      )
    );

}

add_action( 'widgets_init', 'carrie_sidebars_init' );
