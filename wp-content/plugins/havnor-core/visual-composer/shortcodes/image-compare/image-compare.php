<?php
/* ==========================================================
  Image Compare
=========================================================== */
if ( !function_exists('havnor_image_compare_function')) {
  function havnor_image_compare_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'br_image'  => '',
      'ar_image'  => '',
      'class'  => '',
    ), $atts));

    $br_image_url = wp_get_attachment_url( $br_image );
    $ar_image_url = wp_get_attachment_url( $ar_image );

    if($br_image_url || $ar_image_url) {
      $img_cls = ' cocoen';
    } else {
      $img_cls = '';
    }

    $before = $br_image_url ? '<img src="'.$br_image_url.'" alt="Compare">' : '';
    $after = $ar_image_url ? '<img src="'.$ar_image_url.'" class="sec-image" alt="Compare">' : '';
    
    $output = '<div class="'. $class .$img_cls.'">
                '.$before.$after.'
              </div>';
    return $output;
  }
}
add_shortcode( 'hanor_image_compare', 'havnor_image_compare_function' );
