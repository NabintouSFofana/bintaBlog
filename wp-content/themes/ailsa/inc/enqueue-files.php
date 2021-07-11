<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'ailsa_scripts_styles' ) ) {
  function ailsa_scripts_styles() {

    // Styles
    wp_enqueue_style( 'font-awesome', AILSA_THEMEROOT_URI . '/inc/theme-options/cs-framework/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'bootstrap-css', AILSA_CSS .'/bootstrap.min.css', array(), '4.5.3', 'all' );
    wp_enqueue_style( 'ailsa-own-carousel', AILSA_CSS .'/owl.carousel.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'ailsa-own-popup', AILSA_CSS .'/magnific-popup.css', array(), '0.9.9', 'all' );
    wp_enqueue_style( 'ailsa-menu-styles', AILSA_CSS . '/menu.css', array(), AILSA_VTHEME_VERSION, 'all');
    wp_enqueue_style( 'ailsa-style', AILSA_CSS .'/styles.css', array(), AILSA_VTHEME_VERSION, 'all' );

    // Scripts
    wp_enqueue_script( 'popper', AILSA_SCRIPTS . '/popper.min.js', array( 'jquery' ), AILSA_VTHEME_VERSION, true );
    wp_enqueue_script( 'bootstrap-js', AILSA_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '4.5.3', true );
    wp_enqueue_script( 'instafeed-js', AILSA_SCRIPTS . '/instafeed.js', array( 'jquery' ), '1.9.3', false );
    wp_enqueue_script( 'ailsa-plugins', AILSA_SCRIPTS . '/plugins.js', array( 'jquery' ), AILSA_VTHEME_VERSION, true );
    wp_enqueue_script( 'ailsa-scripts', AILSA_SCRIPTS . '/scripts.js', array( 'jquery' ), AILSA_VTHEME_VERSION, true );

    // Comments
    wp_enqueue_script( 'vtst-validate-js', AILSA_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'vtst-validate-js', 'jQuery(document).ready(function($) {"use strict";$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Responsive Active
    $viewport = cs_get_option('theme_responsive');
    if($viewport == 'on') {
      wp_enqueue_style( 'ailsa-responsive', AILSA_CSS .'/responsive.css', array(), AILSA_VTHEME_VERSION, 'all' );
    }

    // Comment Reply Form
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'ailsa_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'ailsa_admin_scripts_styles' ) ) {
  function ailsa_admin_scripts_styles() {

    wp_enqueue_style('admin-main', AILSA_CSS . '/admin-styles.css', __FILE__);
    wp_enqueue_script('admin-scripts', AILSA_SCRIPTS . '/admin-scripts.js', __FILE__);

  }
  add_action( 'admin_enqueue_scripts', 'ailsa_admin_scripts_styles' );
}

/* Enqueue All Styles */
if ( ! function_exists( 'ailsa_wp_enqueue_styles' ) ) {
  function ailsa_wp_enqueue_styles() {
    ailsa_framework_google_fonts();
    add_action( 'wp_head', 'ailsa_framework_custom_css', 99 );
  }
  add_action( 'wp_enqueue_scripts', 'ailsa_wp_enqueue_styles' );
}
