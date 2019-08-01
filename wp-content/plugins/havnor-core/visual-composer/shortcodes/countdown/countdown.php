<?php
/* ==========================================================
  Countdown
=========================================================== */
if ( !function_exists('havnor_countdown_function')) {
  function havnor_countdown_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'countdown_title'  => '',
      'countdown_date' =>'',
      'need_border' => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'value_color'  => '',
      'value_bg_color'  => '',
      'title_size'  => '',
      'title_line_height' => '',
      'value_size'  => '',
      'value_in_size' =>'',

    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $title_size || $title_color || $title_line_height) {
      $inline_style .= '.hanor-countdown-'. $e_uniqid .' h4.countdown-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_line_height ) ? 'line-height:'. havnor_core_check_px($title_line_height) .';' : '';
      $inline_style .= '}';
    }
    if ( $value_color || $value_size ) {
      $inline_style .= '.hanor-countdown-'. $e_uniqid .' .hanor-countdown.hasCountdown .countdown_amount {';
      $inline_style .= ( $value_color ) ? 'color:'. $value_color .';' : '';
      $inline_style .= ( $value_size ) ? 'font-size:'. havnor_core_check_px($value_size) .';' : '';
      $inline_style .= '}';
    }

    if ( $value_in_size || $value_color) {
      $inline_style .= '.hanor-countdown-'. $e_uniqid .' .hanor-countdown .countdown_section {';
      $inline_style .= ( $value_in_size ) ? 'font-size:'. havnor_core_check_px($value_in_size) .';' : '';
      $inline_style .= ( $value_color ) ? 'color:'. $value_color .';' : '';
      $inline_style .= '}';
    }
    if ( $value_bg_color) {
      $inline_style .= '.hanor-countdown-'. $e_uniqid .' .hanor-countdown .countdown_section {';
      $inline_style .= ( $value_bg_color ) ? 'background:'. $value_bg_color .';' : '';
      $inline_style .= ( $value_bg_color ) ? 'border-color:'. $value_bg_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-countdown-'. $e_uniqid;

    // Countdown Title
    $countdown_title = $countdown_title ? '<h4 class="countdown-title">'. $countdown_title .'</h4>' : '';
    $data_date = 'data-date="'.$countdown_date.'"';
    $output = '<div class="hanor-event-countdown-wrap '. $class . $styled_class .'"><div class="hanor-container"><div class="conference-title-wrap col-md-4">'.$countdown_title.'</div><div class="col-md-8 hanor-countdown hanor-countdown" '.$data_date.' ></div><div class="clearfix"></div></div></div>';
    // Output
    return $output;
  }
}
add_shortcode( 'havnor_countdown', 'havnor_countdown_function' );
