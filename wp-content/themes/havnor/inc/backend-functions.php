<?php
/*
 * All Back-End Helper Functions for Havnor Theme
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Validate px entered in field */
if( ! function_exists( 'havnor_check_px' ) ) {
  function havnor_check_px( $num ) {
    return ( is_numeric( $num ) ) ? $num . 'px' : $num;
  }
}

/* Escape Strings */
if( ! function_exists( 'havnor_vt_esc_string' ) ) {
  function havnor_vt_esc_string( $num ) {
    return preg_replace('/\D/', '', $num);
  }
}

/* Escape Numbers */
if( ! function_exists( 'havnor_vt_esc_number' ) ) {
  function havnor_vt_esc_number( $num ) {
    return preg_replace('/[^a-zA-Z]/', '', $num);
  }
}

/* Compress CSS */
if ( ! function_exists( 'havnor_compress_css_lines' ) ) {
  function havnor_compress_css_lines( $css ) {
    $css  = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
    $css  = str_replace( ': ', ':', $css );
    $css  = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
    return $css;
  }
}

/* Inline Style */
global $all_inline_styles;
$all_inline_styles = array();
if( ! function_exists( 'havnor_add_inline_style' ) ) {
  function havnor_add_inline_style( $style ) {
    global $all_inline_styles;
    array_push( $all_inline_styles, $style );
  }
}

/* Support WordPress uploader to following file extensions */
if( ! function_exists( 'havnor_vt_upload_mimes' ) ) {
  function havnor_vt_upload_mimes( $mimes ) {

    $mimes['ttf']   = 'font/ttf';
    $mimes['eot']   = 'font/eot';
    $mimes['woff']  = 'font/woff';
    $mimes['otf']   = 'font/otf';

    return $mimes;

  }
  add_filter( 'upload_mimes', 'havnor_vt_upload_mimes' );
}

/* HEX to RGB */
if( ! function_exists( 'havnor_vt_hex2rgb' ) ) {
  function havnor_vt_hex2rgb( $hexcolor, $opacity = 1 ) {

    if( preg_match( '/^#[a-fA-F0-9]{6}|#[a-fA-F0-9]{3}$/i', $hexcolor ) ) {

      $hex    = str_replace( '#', '', $hexcolor );

      if( strlen( $hex ) == 3 ) {
        $r    = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
        $g    = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
        $b    = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
      } else {
        $r    = hexdec( substr( $hex, 0, 2 ) );
        $g    = hexdec( substr( $hex, 2, 2 ) );
        $b    = hexdec( substr( $hex, 4, 2 ) );
      }

      return ( isset( $opacity ) && $opacity != 1 ) ? 'rgba('. $r .', '. $g .', '. $b .', '. $opacity .')' : ' ' . $hexcolor;

    } else {

      return $hexcolor;

    }

  }
}

/* Yoast Plugin Metabox Low */
if( ! function_exists( 'havnor_vt_yoast_metabox' ) ) {
  function havnor_vt_yoast_metabox() {
    return 'low';
  }
  add_filter( 'wpseo_metabox_prio', 'havnor_vt_yoast_metabox' );
}

if( ! function_exists( 'havnor_is_post_type' ) ) {
  function havnor_is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
  }
}

/**
 * If WooCommerce Plugin Activated
 */
if ( ! function_exists( 'havnor_is_woocommerce_activated' ) ) {
  function havnor_is_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
  }
}

/**
 * If is WooCommerce Shop
 */
if ( ! function_exists( 'havnor_is_woocommerce_shop' ) ) {
  function havnor_is_woocommerce_shop() {
    if ( havnor_is_woocommerce_activated() && is_shop() ) { return true; } else { return false; }
  }
}

/**
 * If is WPML is active
 */
if ( ! function_exists( 'havnor_is_wpml_activated' ) ) {
  function havnor_is_wpml_activated() {
    if ( class_exists( 'SitePress' ) ) { return true; } else { return false; }
  }
}

/**
 * Remove Rev Slider Metabox
 */
if ( is_admin() ) {
  if( ! function_exists( 'havnor_remove_rev_slider_meta_boxes' ) ) {
    function havnor_remove_rev_slider_meta_boxes() {
      remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'team', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'testimonial', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'portfolio', 'normal' );
    }
    add_action( 'do_meta_boxes', 'havnor_remove_rev_slider_meta_boxes' );
  }
}

/**
 * Custom Font Family
 */
if ( ! function_exists( 'havnor_custom_font_load' ) ) {
  function havnor_custom_font_load() {

    $font_family       = cs_get_option( 'font_family' );

    ob_start();

    if( ! empty( $font_family ) ) {

      foreach ( $font_family as $font ) {
        echo '@font-face{';

        echo 'font-family: "'. $font['name'] .'";';

        if( empty( $font['css'] ) ) {
          echo 'font-style: normal;';
          echo 'font-weight: normal;';
        } else {
          echo $font['css'];
        }

        echo ( ! empty( $font['ttf']  ) ) ? 'src: url('. esc_url($font['ttf']).');' : '';
        echo ( ! empty( $font['eot']  ) ) ? 'src: url('. esc_url($font['eot']).');' : '';
        echo ( ! empty( $font['woff'] ) ) ? 'src: url('. esc_url($font['woff']) .');' : '';
        echo ( ! empty( $font['otf']  ) ) ? 'src: url('. esc_url($font['otf']).');' : '';

        echo '}';
      }

    }

    // Typography
    $output = ob_get_clean();
    return $output;
  }
}

/* Custom Styles */
if( ! function_exists( 'havnor_vt_custom_css' ) ) {
  function havnor_vt_custom_css() {
    wp_enqueue_style('havnor-default-style', get_template_directory_uri() . '/style.css');
    $output  = havnor_custom_font_load();
    $output .= havnor_dynamic_styles();
    $custom_css = havnor_compress_css_lines( $output );

    wp_add_inline_style( 'havnor-default-style', $custom_css );
  }
}

/* Custom JS */
if( ! function_exists( 'havnor_vt_custom_js' ) ) {
  function havnor_vt_custom_js() {
    $output = cs_get_option( 'theme_custom_js' );
    wp_add_inline_script( 'jquery-migrate', $output );
  }
  add_action( 'wp_enqueue_scripts', 'havnor_vt_custom_js' );
}
