<?php
/* ==========================================================
  Process 
=========================================================== */
if ( !function_exists('havnor_process_function')) {
  function havnor_process_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'process_style'  => '',
      'white_color'  => '',
      'process_items'  => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_size'  => '',
      'title_weight' => '',
      'content_color'  => '',
      'content_size'  => '',
      'number_color'  => '',
      'number_size'  => '',
      'number_weight' => '',
      'number_bg_color'  => '',
      'number_bg_hover_color'  => '',
      'border_color'  => '',
      'border_hover_color'  => '',
      'line_color'  => '',
      'line_hover_color'  => '',
      'icon_color'  => '',
      'icon_size'  => '',
      
    ), $atts));

    // Group Field
    $list_items = (array) vc_param_group_parse_atts( $process_items );
    $get_each_list = array();
    foreach ( $list_items as $list_item ) {
      $each_list = $list_item;
      $each_list['process_number'] = isset( $list_item['process_number'] ) ? $list_item['process_number'] : '';
      $each_list['process_title'] = isset( $list_item['process_title'] ) ? $list_item['process_title'] : '';
      $each_list['process_content'] = isset( $list_item['process_content'] ) ? $list_item['process_content'] : '';
      $each_list['process_icon_style'] = isset( $list_item['process_icon_style'] ) ? $list_item['process_icon_style'] : '';
      $each_list['process_icon'] = isset( $list_item['process_icon'] ) ? $list_item['process_icon'] : '';
      $each_list['process_icon_image'] = isset( $list_item['process_icon_image'] ) ? $list_item['process_icon_image'] : '';
      $get_each_list[] = $each_list;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';
    
    if ( $title_size || $title_color || $title_weight) {
      $inline_style .= '.hanor-process-'. $e_uniqid .'.hanor-process .process-item h4.process-title, .hanor-process-'. $e_uniqid .'.hanor-process-wedo .process-wedo-item h3, .hanor-process-'. $e_uniqid .'.hanor-process-wedo.wedo-style-two .process-wedo-item h3 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= '}';
    }
    if ( $content_size || $content_color ) {
      $inline_style .= '.hanor-process-'. $e_uniqid .'.hanor-process .process-item.hanor-item p, .hanor-process-'. $e_uniqid .'.hanor-process-wedo.wedo-style-two .process-wedo-item p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_size || $icon_color ) {
      $inline_style .= '.hanor-process-'. $e_uniqid .'.hanor-process .process-item.hanor-item .hanor-icon i {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $number_color || $number_size || $number_bg_color || $border_color || $number_weight) {
      $inline_style .= '.hanor-process-'. $e_uniqid .'.hanor-process .process-item.hanor-item .process-counter-number, .hanor-process-'. $e_uniqid .'.hanor-process-wedo .process-wedo-item .wedo-number h2, .hanor-process-'. $e_uniqid .'.hanor-process-wedo.wedo-style-two .process-wedo-item .wedo-number h2 {';
      $inline_style .= ( $number_color ) ? 'color:'. $number_color .';' : '';
      $inline_style .= ( $number_size ) ? 'font-size:'. havnor_core_check_px($number_size) .';' : '';
      $inline_style .= ( $number_weight ) ? 'font-weight:'. $number_weight .';' : '';
      $inline_style .= ( $number_bg_color ) ? 'background:'. $number_bg_color .';' : '';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }    
    if ( $number_bg_hover_color ) {
      $inline_style .= '.hanor-process-'. $e_uniqid .'.hanor-process .process-item.hanor-item.hanor-hover .process-counter-number {';
      $inline_style .= ( $number_bg_hover_color ) ? 'background:'. $number_bg_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $border_color ) {
      $inline_style .= '.hanor-process-'. $e_uniqid .'.hanor-process-wedo .process-wedo-item .wedo-number, .hanor-process-'. $e_uniqid .'.hanor-process-wedo.wedo-style-two .process-wedo-item {';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
    if ( $border_hover_color ) {
      $inline_style .= '.hanor-process-'. $e_uniqid .'.hanor-process-wedo .hover-active .wedo-number, .hanor-process-'. $e_uniqid .'.hanor-process-wedo .hanor-hover .wedo-number, .hanor-process-'. $e_uniqid .'.hanor-process-wedo.wedo-style-two .process-wedo-item:hover,
      .hanor-process-'. $e_uniqid .' .process-item.hanor-item.hanor-hover .process-counter-number, .hanor-process-'. $e_uniqid .' .hover-active .process-item.hanor-item .process-counter-number {';
      $inline_style .= ( $border_hover_color ) ? 'border-color:'. $border_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $line_color ) {
      $inline_style .= '.hanor-process-'. $e_uniqid .'.hanor-process .process-item.hanor-item .process-separator, .hanor-process-'. $e_uniqid .'.hanor-process-wedo .wedo-number h2:after {';
      $inline_style .= ( $line_color ) ? 'border-color:'. $line_color .';' : '';
      $inline_style .= '}';
      $inline_style .= '.hanor-process-'. $e_uniqid .'.hanor-process .process-item.hanor-item .process-separator {';
      $inline_style .= ( $line_color ) ? 'background-color:'. $line_color .';' : '';
      $inline_style .= '}';
    }
    if ( $line_hover_color ) {
      $inline_style .= '.hanor-process-'. $e_uniqid .'.hanor-process .process-item.hanor-item .process-separator:before, .hanor-process-'. $e_uniqid .'.hanor-process-wedo .hover-active .wedo-number h2:after {';
      $inline_style .= ( $line_hover_color ) ? 'border-color:'. $line_hover_color .';' : '';
      $inline_style .= '}';
      $inline_style .= '.hanor-process-'. $e_uniqid .' .hover-active .process-item.hanor-item .process-separator:before {';
      $inline_style .= ( $line_hover_color ) ? 'background-color:'. $line_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-process-'. $e_uniqid;

    if ($white_color) {
      $wc_class = ' white-c';
    } else {
      $wc_class = '';
    }

    if ($process_style === 'process-two') {
      $style_class = 'hanor-process-wedo wedo-style-two';
    } elseif ($process_style === 'process-three') {
      $style_class = 'hanor-process-wedo';
    } else {
      $style_class = 'hanor-process';
    }

    $output = '<section class="'.$style_class. $wc_class . $styled_class .' '.$class.'"><div class="row">';

    if ($process_style === 'process-two' || $process_style === 'process-three') {
      foreach ( $get_each_list as $each_list ) {
        $title = $each_list['process_title'] ? '<h3>'. $each_list['process_title'] .'</h3>' : '';
        $content = $each_list['process_content'] ? '<p>'. $each_list['process_content'] .'</p>' : '';
        $output .= '<div class="col-md-3 wedo-active-wrap">
                      <div class="process-wedo-item">
                        <div class="wedo-number"><h2>'. $each_list['process_number'] .'</h2></div>
                        '. $title . $content .'
                      </div>
                    </div>';
      }
    } else {
      foreach ( $get_each_list as $each_list ) {
      // Service Icon
      $process_icon = $each_list['process_icon'] ? '<div class="hanor-icon"><i class="'. $each_list['process_icon'] .'"></i></div>' : '';
      $icon_image_url = wp_get_attachment_url( $each_list['process_icon_image'] );
      $alt_text = get_post_meta($each_list['process_icon_image'], '_wp_attachment_image_alt', true);
      $process_icon_image = $each_list['process_icon_image'] ? '<div class="hanor-icon"><img src="'. $icon_image_url .'" alt="'.$alt_text.'"/></div>' : '';
      $title = $each_list['process_title'] ? '<h4 class="process-title">'. $each_list['process_title'] .'</h4>' : '';
      $content = $each_list['process_content'] ? '<p>'. $each_list['process_content'] .'</p>' : '';
      // Process Process Icon
      $output .= '<div class="col-sm-4 process-item-wrap">
                    <div class="process-item hanor-item">
                      <div class="process-counter">
                        <span class="process-counter-number">'. $each_list['process_number'] .'</span>
                        <span class="process-separator"></span>
                      </div>
                      '. $process_icon . $process_icon_image . $title . $content .'
                    </div>
                  </div>';
      }
    }
    $output .= '</div></section>';
    return $output;
  }
}
add_shortcode( 'havnor_process', 'havnor_process_function' );
