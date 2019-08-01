<?php
/*
 * Codestar Framework Config
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Integrate - Codestar Framework
 */
require HAVNOR_ADMIN_PATH .'/cs-framework.php';
require HAVNOR_FRAMEWORK .'/theme-options/theme-options.php';
require HAVNOR_FRAMEWORK .'/theme-options/theme-customizer.php';

/**
 * Codestar Framework - Changing Override Folder Path
 */
function havnor_vt_cs_framework_override() {
  return 'inc/theme-options/theme-extend';
}
add_filter( 'cs_framework_override', 'havnor_vt_cs_framework_override' );

/**
 * Custom New Font Family
 */
if( ! function_exists( 'havnor_vt_custom_font_upload' ) ) {
  function havnor_vt_custom_font_upload( $db_value ) {

    $fonts = cs_get_option( 'font_family' );

    if ( ! empty( $fonts ) ) {

      echo '<optgroup label="Your Custom Fonts">';
      foreach ( $fonts as $key => $value ) {
        echo '<option value="'. $value['name'] .'" data-type="customfonts"'. selected( $value['name'], $db_value, true ) .'>'. $value['name'] .'</option>';
      }
      echo '</optgroup>';

    }

  }
  add_action( 'cs_typography_family', 'havnor_vt_custom_font_upload' );
}

/**
 * Check Custom Font
 */
if ( ! function_exists( 'havnor_vt_custom_upload_font' ) ) {
  function havnor_vt_custom_upload_font( $font ) {

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

function havnor_vt_add_icons_json( $json = array() ) {
  $json[] = HAVNOR_CS_FRAMEWORK .'/fields/icon/Pe-icon-7-stroke.json';
  return $json;
}
add_filter( 'cs_add_icons_json', 'havnor_vt_add_icons_json' );

function havnor_vt_add_et_icons_json( $json = array() ) {
  $json[] = HAVNOR_CS_FRAMEWORK .'/fields/icon/et-icons.json';
  return $json;
}
add_filter( 'cs_add_icons_json', 'havnor_vt_add_et_icons_json' );

/**
 * Get Registered Sidebars
 */
if ( ! function_exists( 'havnor_vt_registered_sidebars' ) ) {
  function havnor_vt_registered_sidebars() {

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
if ( ! function_exists( 'havnor_vt_google_fonts' ) ) {
  function havnor_vt_google_fonts() {

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
          $family  = $font['font']['family'];
          $variant = ( $font['font']['variant'] != 'regular' ) ? $font['font']['variant'] : 400;
          $embed_fonts[$family]['variant'][$variant] = $variant;
        }
      }
    }

    if ( ! empty( $embed_fonts ) ) {
      foreach ( $embed_fonts as $name => $font ) {
        $query_args[] = $name . $font_weight;
      }
      wp_enqueue_style( 'havnor-google-fonts', esc_url( add_query_arg( 'family', urlencode( implode( '|', $query_args ) ) . $subsets, '//fonts.googleapis.com/css' ) ), array(), null );
    }

  }
}

/* Typography */
if ( ! function_exists( 'havnor_vt_get_typography' ) ) {
  function havnor_vt_get_typography() {

    $typography = cs_get_option( 'typography' );
    $output     = '';

    if ( ! empty( $typography ) ) {
      foreach ( $typography as $font ) {
        if ( ! empty( $font['selector'] ) ) {

          $weight  = ( $font['font']['variant'] != 'regular' ) ? havnor_vt_esc_string( $font['font']['variant'] ) : 400;
          $style   = havnor_vt_esc_number( $font['font']['variant'] );
          $style   = ( $style && $style != 'regular' ) ? $style : 'normal';
          $family  = ( $font['font']['family'] ) ? '"'. $font['font']['family'] .'", Arial, sans-serif' : $font['font']['family'];

          $output .= $font['selector'] . '{';
          $output .= 'font-family: '. $family .';';
          $output .= ( ! empty( $font['size'] ) ) ? 'font-size: '. havnor_check_px( $font['size'] ) .';' : '';
          $output .= ( ! empty( $font['line_height'] ) ) ? 'line-height: '. $font['line_height'] .';' : '';
          $output .= 'font-style: '. $style .';';
          // $output .= 'font-weight: '. $weight .';';
          $output .= ( ! empty( $font['css'] ) ) ? $font['css'] : '';
          $output .= '}';

        }
      }
    }

    return $output;

  }
}
