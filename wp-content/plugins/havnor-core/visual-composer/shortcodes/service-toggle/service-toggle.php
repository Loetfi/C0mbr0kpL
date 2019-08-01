<?php
/* ==========================================================
  Service Toggle
=========================================================== */
if ( !function_exists('havnor_service_toggle_function')) {
  function havnor_service_toggle_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'service_toggle_items'  => '',
      'class'  => '',
      // Style
      'bg_color' => '',
      'border_color' => '',
      'title_color'  => '',
      'title_hover_color'  => '',
      'title_size'  => '',
      'title_weight' => '',
      'text_color'  => '',
      'text_size'  => '',
      'icon_color'  => '',
      'icon_size'  => '',
      'list_text_color'  => '',
      'list_text_size'  => '',
      'list_blt_color'  => '',
      'tgl_btn_color' =>'',
      'tgl_btn_bg_color' =>'',
    ), $atts));

    // Group Field
    $service_toggle_items = (array) vc_param_group_parse_atts( $service_toggle_items );
    $get_each_service_toggle = array();
    foreach ( $service_toggle_items as $service_toggle_item ) {
      $each_service_toggle = $service_toggle_item;
      $each_service_toggle['select_icon'] = isset( $service_toggle_item['select_icon'] ) ? $service_toggle_item['select_icon'] : '';
      $each_service_toggle['service_toggle_title'] = isset( $service_toggle_item['service_toggle_title'] ) ? $service_toggle_item['service_toggle_title'] : '';
      $each_service_toggle['service_toggle_text'] = isset( $service_toggle_item['service_toggle_text'] ) ? $service_toggle_item['service_toggle_text'] : '';
      $each_service_toggle['service_toggle_list'] = isset( $service_toggle_item['service_toggle_list'] ) ? $service_toggle_item['service_toggle_list'] : '';
      $get_each_service_toggle[] = $each_service_toggle;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $bg_color || $border_color) {
      $inline_style .= '.hanor-service-toggle-'. $e_uniqid .' .toggle-service-item {';
      $inline_style .= ( $bg_color ) ? 'background:'. $bg_color .';' : '';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
    if ( $title_size || $title_color || $title_weight) {
      $inline_style .= '.hanor-service-toggle-'. $e_uniqid .' h4.toggle-service-title a {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= '}';
    }
    if ( $title_hover_color ) {
      $inline_style .= '.hanor-service-toggle-'. $e_uniqid .' h4.toggle-service-title a:hover {';
      $inline_style .= ( $title_hover_color ) ? 'color:'. $title_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $text_color || $text_size ) {
      $inline_style .= '.hanor-service-toggle-'. $e_uniqid .' .toggle-service-info p {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_color || $icon_size ) {
      $inline_style .= '.hanor-service-toggle-'. $e_uniqid .' .toggle-service-info .hanor-icon span {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $list_text_color || $list_text_size) {
      $inline_style .= '.hanor-service-toggle-'. $e_uniqid .' .service-toggle-content ul li {';
      $inline_style .= ( $list_text_color ) ? 'color:'. $list_text_color .';' : '';
      $inline_style .= ( $list_text_size ) ? 'font-size:'. havnor_core_check_px($list_text_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $list_blt_color ) {
      $inline_style .= '.hanor-service-toggle-'. $e_uniqid .' .service-toggle-content ul li:before {';
      $inline_style .= ( $list_blt_color ) ? 'background:'. $list_blt_color .';' : '';
      $inline_style .= '}';
    }
    if ( $tgl_btn_color ) {
      $inline_style .= '.hanor-service-toggle-'. $e_uniqid .' .toggle-service-item .service-switch:before {';
      $inline_style .= ( $tgl_btn_color ) ? 'background:'. $tgl_btn_color .';' : '';
      $inline_style .= '}';
    }
    if ( $tgl_btn_bg_color ) {
      $inline_style .= '.hanor-service-toggle-'. $e_uniqid .' .toggle-service-item .service-switch {';
      $inline_style .= ( $tgl_btn_bg_color ) ? 'background:'. $tgl_btn_bg_color .';' : '';
      $inline_style .= ( $tgl_btn_bg_color ) ? 'border-color:'. $tgl_btn_bg_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-service-toggle-'. $e_uniqid;

    $output = '<section class="hanor-toggle-services '. $class . $styled_class .'"><div class="hanor-masonry">';
    // Group Param Output
    foreach ( $get_each_service_toggle as $each_service_toggle ) {
      $service_toggle_title = $each_service_toggle['service_toggle_title'] ? '<h4 class="toggle-service-title"><a href="javascript:void(0);">'. $each_service_toggle['service_toggle_title'] .'</a></h4>' : '';
      $service_toggle_text = $each_service_toggle['service_toggle_text'] ? '<p>'. $each_service_toggle['service_toggle_text'] .'</p>' : '';
      $service_toggle_icon = $each_service_toggle['select_icon'] ? '<span class="'.$each_service_toggle['select_icon'].'"></span>' : '';

      $output .= '<div class="masonry-item">
                    <div class="toggle-service-item">
                      <div class="toggle-service-info">
                        <span class="service-switch"></span>
                        <div class="hanor-icon">'.$service_toggle_icon.'</div>
                        '. $service_toggle_title . $service_toggle_text .'
                        <div class="service-toggle-content">
                          '.do_shortcode($each_service_toggle['service_toggle_list']).'
                        </div>
                      </div>
                    </div>
                  </div>';
    }
    $output .= '</div></section>';
    return $output;
  }
}
add_shortcode( 'hanor_service_toggle', 'havnor_service_toggle_function' );
