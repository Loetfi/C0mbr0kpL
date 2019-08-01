<?php
/* ==========================================================
  Road To Success Section
=========================================================== */
if ( !function_exists('havnor_road_to_success_func')) {
  function havnor_road_to_success_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'open_link'  => '',
      'road_to_successs'  => '',
      'class'  => '',
      // Style
      'title_color' =>'',
      'title_size' =>'',
      'title_weight' => '',
      'icon_color' =>'',
      'icon_size' =>'',
      'icon_bg_color' =>'',
      'content_color' =>'',
      'content_size' =>'',
      'section_bg_color' =>'',

    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';

    // Group Field
    $road_to_successs = (array) vc_param_group_parse_atts( $road_to_successs );
    $get_road_to_successs = array();
    foreach ( $road_to_successs as $road_to_success ) {
      $each_logo = $road_to_success;
      $each_logo['success_icon'] = isset( $road_to_success['success_icon'] ) ? $road_to_success['success_icon'] : '';
      $each_logo['success_title'] = isset( $road_to_success['success_title'] ) ? $road_to_success['success_title'] : '';
      $each_logo['success_title_link'] = isset( $road_to_success['success_title_link'] ) ? $road_to_success['success_title_link'] : '';
      $each_logo['success_content'] = isset( $road_to_success['success_content'] ) ? $road_to_success['success_content'] : '';
      $get_road_to_successs[] = $each_logo;
    }
    // Title Stylings
    if ( $title_size || $title_color || $title_weight) {
      $inline_style .= '.hanor-road-to-success-'. $e_uniqid .'.hanor-success .success-content-section h3 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= '}';
    }
    // Icon Styling
    if ( $icon_color || $icon_size ) {
      $inline_style .= '.hanor-road-to-success-'. $e_uniqid .'.hanor-success .success-item .success-icon i {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    // Icon BG Color
    if ( $icon_bg_color ) {
      $inline_style .= '.hanor-road-to-success-'. $e_uniqid .'.hanor-success .success-item .success-icon {';
      $inline_style .= ( $icon_bg_color ) ? 'background-color:'. $icon_bg_color .';' : '';
      $inline_style .= '}';
    }
    // Content Styling
    if ( $content_color || $content_size ) {
      $inline_style .= '.hanor-road-to-success-'. $e_uniqid .'.hanor-success .success-content-section p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    // Section Styling
    if ( $section_bg_color ) {
      $inline_style .= '.hanor-road-to-success-'. $e_uniqid .'.hanor-success .success-content-section {';
      $inline_style .= ( $section_bg_color ) ? 'background-color:'. $section_bg_color .';' : '';
      $inline_style .= '}';
    }

    // Add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-road-to-success-'. $e_uniqid;

    $output = '<section class="hanor-success '.$styled_class.'">
                <div class="road-to-success-wrap">';
                  // Group Param Output
                  foreach ( $get_road_to_successs as $each_logo ) {
                    $output .= '<div class="success-item"><div class="col-md-6"><div class="success-content-section">';
                      if ($each_logo['success_title_link']) {
                        $output .= '<span class="success-icon"><i class="'.$each_logo['success_icon'].'"></i></span><div class="success-content-area"><h3 class="success-title"><a href="'.$each_logo['success_title_link'].'" '.$open_link.'>'.$each_logo['success_title'].'</a></h3><p class="success-content">'.$each_logo['success_content'].'</p></div>';
                      } else {
                        $output .= '<span class="success-icon"><i class="'.$each_logo['success_icon'].'"></i></span><div class="success-content-area"><h3 class="success-title">'.$each_logo['success_title'].'</h3><p class="success-content">'.$each_logo['success_content'].'</p></div>';
                      }
                    $output .= '</div></div></div>';
                  }  
               
    $output .= '</div></section>';
    return $output;
  }
}
add_shortcode( 'hanor_road_to_success', 'havnor_road_to_success_func' );
