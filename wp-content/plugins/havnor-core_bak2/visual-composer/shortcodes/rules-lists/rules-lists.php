<?php
/* ==========================================================
  Lists
=========================================================== */
if ( !function_exists('havnor_rules_list_function')) {
  function havnor_rules_list_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'list_items'  => '',
      'class'  => '',
      // Style
      'text_color'  => '',
      'number_color'  => '',
      'text_size'  => '',
      'number_size'  => '',
    ), $atts));

    // Group Field
    $list_items = (array) vc_param_group_parse_atts( $list_items );
    $get_each_list = array();
    foreach ( $list_items as $list_item ) {
      $each_list = $list_item;
      $each_list['list_number'] = isset( $list_item['list_number'] ) ? $list_item['list_number'] : '';
      $each_list['list_text'] = isset( $list_item['list_text'] ) ? $list_item['list_text'] : '';
      $get_each_list[] = $each_list;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $text_color || $text_size ) {
      $inline_style .= '.hanor-list-'. $e_uniqid .' li, .hanor-list-'. $e_uniqid .' li p, .hanor-list-'. $e_uniqid .' li a {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $number_color || $number_size ) {
      $inline_style .= '.hanor-list-'. $e_uniqid .' li h5 {';
      $inline_style .= ( $number_color ) ? 'color:'. $number_color .';' : '';
      $inline_style .= ( $number_size ) ? 'font-size:'. havnor_core_check_px($number_size) .';' : '';
      $inline_style .= '}';
      $inline_style .= '.hanor-list-'. $e_uniqid .' li h5.rules-lists-number:after {';
      $inline_style .= ( $number_color ) ? 'background:'. $number_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-list-'. $e_uniqid;

    $output = '<ul class="hanor-rules-list unordered-list '. $class . $styled_class .'">';

    // Group Param Output
    foreach ( $get_each_list as $each_list ) {
      $list_number = $each_list['list_number'] ? '<h5 class="rules-lists-number">'. $each_list['list_number'] .'</h5>' : '';
      $list_text = $each_list['list_text'] ? '<p>'. $each_list['list_text'] .'</p>' : '';
      $output .= '<li>'. $list_number . $list_text .'</li>';
    }
    $output .= '</ul>';
    return $output;
  }
}
add_shortcode( 'hanor_rules_list', 'havnor_rules_list_function' );
