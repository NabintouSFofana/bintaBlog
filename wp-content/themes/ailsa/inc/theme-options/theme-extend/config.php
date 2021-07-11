<?php
/*
 * Codestar Framework Config
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/**
 * Integrate - Codestar Framework
 */
require AILSA_ADMIN_PATH .'/cs-framework.php';
require AILSA_FRAMEWORK .'/theme-options/theme-options.php';
require AILSA_FRAMEWORK .'/theme-options/theme-customizer.php';
require AILSA_FRAMEWORK .'/theme-options/theme-metabox.php';

/**
 * Codestar Support
 */
define( 'CS_ACTIVE_FRAMEWORK',  true  );
define( 'CS_ACTIVE_METABOX',    true );
define( 'CS_ACTIVE_SHORTCODE',  true );
define( 'CS_ACTIVE_CUSTOMIZE',  true );

/**
 * Codestar Framework - Changing Override Folder Path
 */
function ailsa_framework_cs_framework_override() {
  return 'inc/theme-options/theme-extend';
}
add_filter( 'cs_framework_override', 'ailsa_framework_cs_framework_override' );

/**
 * Custom New Font Family
 */
if( ! function_exists( 'ailsa_custom_font_upload' ) ) {
  function ailsa_custom_font_upload( $db_value ) {

    $fonts = cs_get_option( 'font_family' );

    if ( ! empty( $fonts ) ) {

      echo '<optgroup label="Your Custom Fonts">';
      foreach ( $fonts as $key => $value ) {
        echo '<option value="'. $value['name'] .'" data-type="customfonts"'. selected( $value['name'], $db_value, true ) .'>'. $value['name'] .'</option>';
      }
      echo '</optgroup>';

    }

  }
  add_action( 'cs_typography_family', 'ailsa_custom_font_upload' );
}

/**
 * Check Custom Font
 */
if ( ! function_exists( 'ailsa_custom_upload_font' ) ) {
  function ailsa_custom_upload_font( $font ) {

    $fonts  = cs_get_option( 'font_family' );
    $custom = array();

    if( ! empty( $fonts ) ) {
      foreach ( $fonts as $custom_font ) {
        $custom[] = $custom_font['name'];
      }
    }

    return ( ! empty( $font ) && ! empty( $custom ) && in_array( $font, $custom ) ) ? true : false;

  }
}

/**
 * Get Registered Sidebars
 */
if ( ! function_exists( 'ailsa_registered_sidebars' ) ) {
  function ailsa_registered_sidebars() {

    global $wp_registered_sidebars;
    $widgets = array();

    if( ! empty( $wp_registered_sidebars ) ) {
      foreach ( $wp_registered_sidebars as $key => $value ) {
        $widgets[$key] = $value['name'];
      }
    }

    return array_reverse( $widgets );

  }
}

/**
 * Enqueue Google Fonts
 */
if ( ! function_exists( 'ailsa_framework_google_fonts' ) ) {
  function ailsa_framework_google_fonts() {

    $embed_fonts  = array();
    $query_args   = array();
    $subsets      = cs_get_option( 'subsets' );
    $subsets      = ( ! empty( $subsets ) ) ? '&subset=' . implode( ',', $subsets ) : '';
    $font_weight  = cs_get_option( 'font_weight' );
    $font_weight  = ( ! empty( $font_weight ) ) ? ':' . implode( ',', $font_weight ) : '';
    $typography   = cs_get_option( 'typography' );

    if ( empty( $typography ) ) { return; }

    foreach ( $typography as $font ) {
      if ( ! empty( $font['selector'] ) ) {
        if( $font['font']['family'] ) {
          $family = $font['font']['family'];
          $variant = ( $font['font']['variant'] != 'regular' ) ? $font['font']['variant'] : 400;
          $embed_fonts[$family]['variant'][$variant] = $variant;
        }
      }
    }

    if ( ! empty( $embed_fonts ) ) {
      foreach ( $embed_fonts as $name => $font ) {
        $variations = implode( ',', $font['variant'] );
        $query_args[] = $name.':'.$variations;

        //$query_args[] = $name . $font_weight;
        //print_r($query_args);
      }
      wp_enqueue_style( 'vt-google-fonts', esc_url( add_query_arg( 'family', urlencode( implode( '|', $query_args ) ) . $subsets, '//fonts.googleapis.com/css' ) ), array(), null );

    }

  }
}

/* Typography */
if ( ! function_exists( 'ailsa_get_typography' ) ) {
  function ailsa_get_typography() {

    $typography = cs_get_option( 'typography' );
    $output     = '';

    if ( ! empty( $typography ) ) {
      foreach ( $typography as $font ) {
        if ( ! empty( $font['selector'] ) ) {

          $weight  = ( $font['font']['variant'] != 'regular' ) ? ailsa_esc_string( $font['font']['variant'] ) : 400;
          $style   = ailsa_esc_number( $font['font']['variant'] );
          $style   = ( $style && $style != 'regular' ) ? $style : 'normal';
          $family  = ( $font['font']['family'] ) ? '"'. $font['font']['family'] .'", Arial, sans-serif' : $font['font']['family'];

          $output .= $font['selector'] . '{';
          $output .= 'font-family: '. $family .';';
          $output .= ( ! empty( $font['size'] ) ) ? 'font-size: '. ailsa_check_px( $font['size'] ) .';' : '';
          $output .= ( ! empty( $font['line_height'] ) ) ? 'line-height: '. $font['line_height'] .';' : '';
          $output .= 'font-style: '. $style .';';
          $output .= 'font-weight: '. $weight .';';
          $output .= ( ! empty( $font['css'] ) ) ? $font['css'] : '';
          $output .= '}';

        }
      }
    }

    return $output;

  }
}
