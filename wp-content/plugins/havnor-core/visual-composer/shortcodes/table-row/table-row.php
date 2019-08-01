<?php
/* ===========================================================
    Pricing
=========================================================== */
if ( !function_exists('havnor_table_row_function')) {
  function havnor_table_row_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'class'         => '',
      'single_table_row' => '',
    ), $atts));

    // Group Field
    $single_table_row = (array) vc_param_group_parse_atts( $single_table_row );

    // Output
    $output = '<tr class="'.$class.'">';
    // Foreach features
    $i = 1;
    foreach ( $single_table_row as $list_item ) {
      if(($list_item['row_tag'] ) == 'low') {
        $value_class = 'low';
      } elseif (($list_item['row_tag'] ) == 'high') {
        $value_class = 'high';
      } else {
        $value_class = '';
      }
      $output .= '<td class="'.$value_class.'">'.$list_item['row_content'].'</td>';
    }
    // Foreach features

    $output .= '</tr>';
    return $output;

  }
}
add_shortcode( 'havnor_table_row', 'havnor_table_row_function' );
