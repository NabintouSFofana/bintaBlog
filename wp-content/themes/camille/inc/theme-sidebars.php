<?php
/* Sidebars */
function camille_sidebars_init() {

    register_sidebar(
      array(
        'name' => esc_html__( 'Default Blog sidebar', 'camille' ),
        'id' => 'main-sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown in the left or right site column on: Main Blog page, Archives, Search.', 'camille' )
      )
    );

    register_sidebar(
      array(
        'name' => esc_html__( 'Single Blog Post sidebar', 'camille' ),
        'id' => 'post-sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown in the left or right site column on: Single Blog Post.', 'camille' )
      )
    );

    register_sidebar(
      array(
        'name' => esc_html__( 'Page sidebar', 'camille' ),
        'id' => 'page-sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown in the left or right site column on: Page.', 'camille' )
      )
    );

    register_sidebar(
      array(
        'name' => esc_html__( 'Offcanvas Left sidebar', 'camille' ),
        'id' => 'offcanvas-sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown in the left floating offcanvas menu sidebar that can be opened by toggle button in header. You can enable this sidebar in theme control panel.', 'camille' )
      )
    );

    register_sidebar(
      array(
        'name' => esc_html__( 'Footer light sidebar', 'camille' ),
        'id' => 'footer-sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown in site footer in 4 columns.', 'camille' )
      )
    );

}

add_action( 'widgets_init', 'camille_sidebars_init' );
