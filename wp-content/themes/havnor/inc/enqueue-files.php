<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'havnor_vt_scripts_styles' ) ) {
  function havnor_vt_scripts_styles() {

    // Styles
    wp_enqueue_style( 'font-awesome', HAVNOR_THEMEROOT_URI . '/inc/theme-options/cs-framework/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'pe-icon-7', HAVNOR_CSS .'/Pe-icon-7-stroke.min.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'et-icons', HAVNOR_CSS .'/et-icons.css', array(), HAVNOR_VERSION, 'all' );
    wp_enqueue_style( 'nice-select', HAVNOR_CSS .'/nice-select.min.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'loaders', HAVNOR_CSS .'/loaders.min.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'magnific-popup', HAVNOR_CSS .'/magnific-popup.min.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'swiper', HAVNOR_CSS .'/swiper.min.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'flexslider', HAVNOR_CSS .'/flexslider.min.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'animate', HAVNOR_CSS .'/animate.min.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'cocoen', HAVNOR_CSS .'/cocoen.min.css', array(), HAVNOR_VERSION, 'all' );
    wp_enqueue_style( 'slick', HAVNOR_CSS .'/slick.css', array(), HAVNOR_VERSION, 'all' );
    wp_enqueue_style( 'owl-carousel', HAVNOR_CSS .'/owl.carousel.min.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'lions-map', HAVNOR_CSS .'/jquery-jvectormap-2.0.3.css', array(), HAVNOR_VERSION, 'all' );
    wp_enqueue_style( 'meanmenu', HAVNOR_CSS .'/meanmenu.css', array(), '2.0.7', 'all' );
    wp_enqueue_style( 'slider', HAVNOR_CSS .'/slider.css', array(), '2.0', 'all' );
    wp_enqueue_style( 'bootstrap', HAVNOR_CSS .'/bootstrap.min.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'havnor-style', HAVNOR_CSS .'/styles.css', array(), HAVNOR_VERSION, 'all' );

    // RTL Files
    if ( is_rtl() ) {
      wp_enqueue_style( 'havnor-style-rtl', HAVNOR_CSS .'/style-rtl.css', array(), HAVNOR_VERSION, 'all' );
      wp_style_add_data( 'havnor-style', 'rtl', 'replace' );
    }

    // Scripts
    wp_enqueue_script( 'slider', HAVNOR_SCRIPTS . '/bootstrap-slider.min.js', array( 'jquery' ), HAVNOR_VERSION, true );
    wp_enqueue_script( 'lions-vectormap', HAVNOR_SCRIPTS . '/jquery-jvectormap-2.0.3.min.js', array( 'jquery' ), HAVNOR_VERSION, true );
    wp_enqueue_script( 'lions-world-mill', HAVNOR_SCRIPTS . '/jquery-jvectormap-world-mill.js', array( 'jquery' ), HAVNOR_VERSION, true );
    wp_enqueue_script( 'html5shiv', HAVNOR_SCRIPTS . '/html5shiv.min.js', array( 'jquery' ), '3.7.0', true );
    wp_enqueue_script( 'respond', HAVNOR_SCRIPTS . '/respond.min.js', array( 'jquery' ), '1.4.2', true );
    wp_enqueue_script( 'enscroll', HAVNOR_SCRIPTS . '/enscroll.min.js', array( 'jquery' ), '0.6.2', true );
    wp_enqueue_script( 'placeholders', HAVNOR_SCRIPTS . '/placeholders.min.js', array( 'jquery' ), '4.0.1', true );
    wp_enqueue_script( 'jquery-sticky', HAVNOR_SCRIPTS . '/jquery.sticky.min.js', array( 'jquery' ), '1.0.4', true );
    wp_enqueue_script( 'jarallax', HAVNOR_SCRIPTS . '/jarallax.min.js', array( 'jquery' ), '1.7.3', true );
    wp_enqueue_script( 'magnific-popup', HAVNOR_SCRIPTS . '/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
    wp_enqueue_script( 'jquery-countdown', HAVNOR_SCRIPTS . '/jquery-countdown.min.js', array( 'jquery' ), '1.6.2', true );
    wp_enqueue_script( 'matchHeight', HAVNOR_SCRIPTS . '/jquery.matchHeight-min.js', array( 'jquery' ), '0.7.2', true );
    wp_enqueue_script( 'circle-progress', HAVNOR_SCRIPTS . '/circle-progress.min.js', array( 'jquery' ), '1.2.1', true );
    wp_enqueue_script( 'owl-carousel', HAVNOR_SCRIPTS . '/owl.carousel.min.js', array( 'jquery' ), '2.1.6', true );
    wp_enqueue_script( 'swiper', HAVNOR_SCRIPTS . '/swiper.jquery.min.js', array( 'jquery' ), '3.4.0', true );
    wp_enqueue_script( 'jquery-counterup', HAVNOR_SCRIPTS . '/jquery.counterup.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'flexslider', HAVNOR_SCRIPTS . '/flexslider.min.js', array( 'jquery' ), '2.6.4', true );
    wp_enqueue_script( 'isotope', HAVNOR_SCRIPTS . '/isotope.min.js', array( 'jquery' ), '3.0.1', true );
    wp_enqueue_script( 'packery-mode', HAVNOR_SCRIPTS . '/packery-mode.pkgd.min.js', array( 'jquery' ), '2.0.0', true );
    wp_enqueue_script( 'nice-select', HAVNOR_SCRIPTS . '/jquery.nice-select.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'hoverdir', HAVNOR_SCRIPTS . '/hoverdir.min.js', array( 'jquery' ), '1.1.2', true );
    wp_enqueue_script( 'particles', HAVNOR_SCRIPTS . '/particles.js', array( 'jquery' ), HAVNOR_VERSION, true );
    wp_enqueue_script( 'sticky-sidebar', HAVNOR_SCRIPTS . '/theia-sticky-sidebar.min.js', array( 'jquery' ), '1.5.0', true );
    wp_enqueue_script( 'typed', HAVNOR_SCRIPTS . '/typed.min.js', array( 'jquery' ), HAVNOR_VERSION, true );
    wp_enqueue_script( 'loaders', HAVNOR_SCRIPTS . '/loaders.min.js', array( 'jquery' ), HAVNOR_VERSION, true );
    wp_enqueue_script( 'cocoen', HAVNOR_SCRIPTS . '/cocoen.min.js', array( 'jquery' ), HAVNOR_VERSION, true );
    wp_enqueue_script( 'meanmenu', HAVNOR_SCRIPTS . '/jquery.meanmenu.js', array( 'jquery' ), HAVNOR_VERSION, true );
    wp_enqueue_script( 'slick', HAVNOR_SCRIPTS . '/slick.js', array( 'jquery' ), '1.5.9', true );
    wp_enqueue_script( 'lazyload', HAVNOR_SCRIPTS . '/lazyload.min.js', array( 'jquery' ), '2.0.0', true );
    wp_enqueue_script( 'waypoints', HAVNOR_SCRIPTS . '/waypoints.min.js', array( 'jquery' ), '2.0.3', true );
    wp_enqueue_script( 'bootstrap', HAVNOR_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
    wp_enqueue_script( 'havnor-scripts', HAVNOR_SCRIPTS . '/scripts.js', array( 'jquery' ), HAVNOR_VERSION, true );
    
    // Comments
    wp_enqueue_script( 'jquery-validate-js', HAVNOR_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'jquery-validate-js', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // WooCommerce
    if (class_exists( 'WooCommerce' )){
      wp_enqueue_style( 'havnor-woocommerce-layout', HAVNOR_THEMEROOT_URI . '/inc/plugins/woocommerce/woocommerce-layout.css', null, 1.0, 'all' );
      wp_enqueue_style( 'havnor-woocommerce', HAVNOR_THEMEROOT_URI . '/inc/plugins/woocommerce/woocommerce.css', null, 1.0, 'all' );
    }

    // Dynamic Styles
    wp_enqueue_style( 'dynamic-style', HAVNOR_THEMEROOT_URI . '/inc/dynamic-style.php', array(), HAVNOR_VERSION, 'all' );

    // Responsive Active
    $havnor_viewport = cs_get_option('theme_responsive');
    if($havnor_viewport == 'on') {
        wp_enqueue_style( 'havnor-responsive', HAVNOR_CSS .'/responsive.css', array(), HAVNOR_VERSION, 'all' );
    }

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'havnor_vt_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'havnor_vt_admin_scripts_styles' ) ) {
  function havnor_vt_admin_scripts_styles() {

    wp_enqueue_style( 'havnor-admin-main', HAVNOR_CSS . '/admin-styles.css', true );
    wp_enqueue_script( 'havnor-admin-scripts', HAVNOR_SCRIPTS . '/admin-scripts.js', true );
    wp_enqueue_style( 'pe-icon-7', HAVNOR_CSS .'/Pe-icon-7-stroke.min.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'et-icons', HAVNOR_CSS .'/et-icons.css', array(), HAVNOR_VERSION, 'all' );

  }
  add_action( 'admin_enqueue_scripts', 'havnor_vt_admin_scripts_styles' );
}

/* Enqueue All Styles */
if ( ! function_exists( 'havnor_vt_wp_enqueue_styles' ) ) {
  function havnor_vt_wp_enqueue_styles() {
    havnor_vt_google_fonts();
  }
  add_action( 'wp_enqueue_scripts', 'havnor_vt_wp_enqueue_styles' );
}

/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function havnor_add_editor_styles() {
  add_editor_style( get_stylesheet_uri() );
}
add_action( 'init', 'havnor_add_editor_styles' );
