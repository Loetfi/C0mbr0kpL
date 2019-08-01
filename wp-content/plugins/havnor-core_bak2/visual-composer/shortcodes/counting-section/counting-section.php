<?php
/* ==========================================================
  Client Carousel
=========================================================== */
if ( !function_exists('havnor_counting_func')) {
  function havnor_counting_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'open_link'  => '',
      'counting_logos'  => '',
      'class'  => '',
      // Style
      'value_color' =>'',
      'value_size' =>'',
      'title_color' =>'',
      'title_size' =>'',
      'content_color' =>'',
      'content_size' =>'',

    ), $atts));

       // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $value_size || $value_color ) {
      $inline_style .= '.hanor-counting-'. $e_uniqid .'.hanor-counting .count-item .counter-value {';
      $inline_style .= ( $value_color ) ? 'color:'. $value_color .';' : '';
      $inline_style .= ( $value_size ) ? 'font-size:'. havnor_core_check_px($value_size) .';' : '';
      $inline_style .= '}';
    }  
    if ( $title_size || $title_color ) {
      $inline_style .= '.hanor-counting-'. $e_uniqid .'.hanor-counting .counting-content-area h3 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }  
    if ( $content_size || $content_color ) {
      $inline_style .= '.hanor-counting-'. $e_uniqid .'.hanor-counting .counting-content-area p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }  

    // Group Field
    $counting_logos = (array) vc_param_group_parse_atts( $counting_logos );
    $get_counting_logos = array();
    foreach ( $counting_logos as $counting_logo ) {
      $each_logo = $counting_logo;
      $each_logo['counting_value'] = isset( $counting_logo['counting_value'] ) ? $counting_logo['counting_value'] : '';
      $each_logo['counting_title'] = isset( $counting_logo['counting_title'] ) ? $counting_logo['counting_title'] : '';
      $each_logo['counting_content'] = isset( $counting_logo['counting_content'] ) ? $counting_logo['counting_content'] : '';
      $get_counting_logos[] = $each_logo;
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-counting-'. $e_uniqid;

    $output = '<section class="hanor-counting '.$styled_class.'">
                <div class="counting-wrap"> ';
                // Group Param Output
                foreach ( $get_counting_logos as $each_logo ) {
                  $output .= '<div class="item"><div class="count-item">';
                  $output .= '<div class="counter-value">'.$each_logo['counting_value'].'</div> <div class="counting-content-area"><h3 class="couting-title">'.$each_logo['counting_title'].'</h3><p>'.$each_logo['counting_content'].'</p></div> ';
                  $output .= '</div></div>';
                }
    $output .= '</div></section>';
    return $output;
  }
}
add_shortcode( 'hanor_counting_section', 'havnor_counting_func' );
