<?php
/* ==========================================================
  Process 
=========================================================== */
if ( !function_exists('havnor_helps_function')) {
  function havnor_helps_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'item_column' => '',
      'helps_items'  => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_size'  => '',
      'content_color'  => '',
      'content_size'  => '',
      'icon_color'  => '',
      'icon_size'  => '',
      'bg_color'  => '',
      'border_color'  => '',
      'bg_hover_color'  => '',
    ), $atts));

    // Group Field
    $list_items = (array) vc_param_group_parse_atts( $helps_items );
    $get_each_list = array();
    foreach ( $list_items as $list_item ) {
      $each_list = $list_item;
      $each_list['helps_number'] = isset( $list_item['helps_number'] ) ? $list_item['helps_number'] : '';
      $each_list['helps_title'] = isset( $list_item['helps_title'] ) ? $list_item['helps_title'] : '';
      $each_list['helps_content'] = isset( $list_item['helps_content'] ) ? $list_item['helps_content'] : '';
      $each_list['helps_icon_style'] = isset( $list_item['helps_icon_style'] ) ? $list_item['helps_icon_style'] : '';
      $each_list['helps_icon'] = isset( $list_item['helps_icon'] ) ? $list_item['helps_icon'] : '';
      $each_list['helps_icon_image'] = isset( $list_item['helps_icon_image'] ) ? $list_item['helps_icon_image'] : '';
      $get_each_list[] = $each_list;
    }
    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';
    
    if ( $title_size || $title_color ) {
      $inline_style .= '.hanor-help-'. $e_uniqid .'.hanor-helps .help-item h4.help-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $content_size || $content_color ) {
      $inline_style .= '.hanor-help-'. $e_uniqid .'.hanor-helps .help-item.hanor-item p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_size || $icon_color ) {
      $inline_style .= '.hanor-help-'. $e_uniqid .'.hanor-helps .help-item .hanor-icon i {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $bg_color || $border_color ) {
      $inline_style .= '.hanor-help-'. $e_uniqid .'.hanor-helps .help-item {';
      $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .' !important;' : '';
      $inline_style .= '}';
    }
    if ( $bg_hover_color ) {
      $inline_style .= '.hanor-help-'. $e_uniqid .'.hanor-helps .help-item.hanor-hover {';
      $inline_style .= ( $bg_hover_color ) ? 'background-color:'. $bg_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-help-'. $e_uniqid;

    $output = '<section class="hanor-helps'. $styled_class .' '.$class.'"><div class="row">';
    $item_column = $item_column ? $item_column : 'col-md-4';

    foreach ( $get_each_list as $each_list ) {
      // Service Icon
      $helps_icon = $each_list['helps_icon'] ? '<div class="hanor-icon"><i class="'. $each_list['helps_icon'] .'"></i></div>' : '';
      $icon_image_url = wp_get_attachment_url( $each_list['helps_icon_image'] );
      $alt_text = get_post_meta($each_list['helps_icon_image'], '_wp_attachment_image_alt', true);
      $helps_icon_image = $each_list['helps_icon_image'] ? '<div class="hanor-icon"><img src="'. $icon_image_url .'" alt="'.$alt_text.'"/></div>' : '';

      if ($list_item['helps_icon_style'] === 'icon-ico') {
        $image_icon = $helps_icon;
      } else {
        $image_icon = $helps_icon_image;
      }
      // Process Process Icon
      $output .= '<div class="'.$item_column.'">
                    <div class="help-item hanor-item">
                      '.$image_icon.'
                      <h4 class="help-title">'. $each_list['helps_title'] .'</h4>
                      <p>'. $each_list['helps_content'] .'</p>
                    </div>
                  </div>';
    }
    $output .= '</div></section>';
    return $output;
  }
}
add_shortcode( 'havnor_helps', 'havnor_helps_function' );
