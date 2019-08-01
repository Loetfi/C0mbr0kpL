<?php
/* ===========================================================
    Table
=========================================================== */
if ( !function_exists('havnor_table_function')) {
  function havnor_table_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'table_head' => '',
    ), $atts));

    // Group Field
    $table_head = (array) vc_param_group_parse_atts( $table_head );

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);
    // Atts
    $uniqtab     = uniqid();
    // Output
    $output = '<div class="havnor-table table-responsive"><table><tr>';
    // Foreach features
    foreach ( $table_head as $list_item ) {
        $output .= '<th >'.$list_item['table_head_title'].'</th>';
    }
    // Foreach features
    $output .= '</tr>'.do_shortcode($content).'</table></div>';

    return $output;
  }
}
add_shortcode( 'havnor_table', 'havnor_table_function' );
