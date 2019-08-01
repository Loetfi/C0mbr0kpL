<?php
/* ==========================================================
  Plan Items
=========================================================== */
if ( !function_exists('havnor_plan_function')) {
  function havnor_plan_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'pricing_style' =>'',
      'plan_title'  => '',
      'plan_price'  => '',
      'price_unit'  => '',
      'time_period' =>'',
      'plan_items'  => '',
      'btn_text'  => '',
      'btn_link'  => '',
      'open_link' => '',
      'class'  => '',
      // Style
      'bg_color'  => '',
      'bg_hover_color' => '',
      'title_color'  => '',
      'title_size'  => '',
      'title_weight' => '',
      'title_border_color' => '',
      'price_color'  => '',
      'price_size'  => '',
      'price_weight' => '',
      'text_color'  => '',
      'text_size'  => '',
      'time_color' =>'',
      'time_size' =>'',
      'time_weight' => '',
      // Button
      'btn_text_color'  => '',
      'btn_bg_color'  => '',
      'btn_border_color'  => '',
      'btn_text_hover_color'  => '',
      'btn_bg_hover_color'  => '',
      'btn_border_hover_color'  => '',
      'btn_text_size'  => '',
      'btn_border_radius' => '',
    ), $atts));

    $open_link = $open_link ? ' target="_blank"' : '';

    // Group Field
    $plan_items = (array) vc_param_group_parse_atts( $plan_items );
    $get_each_plan = array();
    foreach ( $plan_items as $plan_item ) {
      $each_plan = $plan_item;
      $each_plan['plan_text'] = isset( $plan_item['plan_text'] ) ? $plan_item['plan_text'] : '';
      $get_each_plan[] = $each_plan;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $bg_color ) {
      $inline_style .= '.hanor-plan-'. $e_uniqid .'.plan-item {';
      $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
      $inline_style .= '}';
    }
    if ( $bg_hover_color ) {
      $inline_style .= '.hanor-plan-'. $e_uniqid .'.plan-item:hover {';
      $inline_style .= ( $bg_hover_color ) ? 'background-color:'. $bg_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $title_size || $title_color || $title_weight) {
      $inline_style .= '.hanor-plan-'. $e_uniqid .'.plan-item .plan-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= '}';
    }
    if($title_border_color){
      $inline_style .= '.hanor-plan-'. $e_uniqid .'.plan-item .plan-title-wrap {';
      $inline_style .= ( $title_border_color ) ? 'border-color:'. $title_border_color .';' : '';
      $inline_style .= '}';
    }
    if ( $price_size || $price_color || $price_weight) {
      $inline_style .= '.hanor-plan-'. $e_uniqid .'.plan-item .plan-title-wrap h2, .hanor-plan-'. $e_uniqid .'.plan-item.pricing-style-two .plan-title-wrap h2 {';
      $inline_style .= ( $price_color ) ? 'color:'. $price_color .';' : '';
      $inline_style .= ( $price_size ) ? 'font-size:'. havnor_core_check_px($price_size) .';' : '';
      $inline_style .= ( $price_weight ) ? 'font-weight:'. $price_weight .';' : '';
      $inline_style .= '}';
    }
    if ( $text_color || $text_size ) {
      $inline_style .= '.hanor-plan-'. $e_uniqid .'.plan-item .plan-info ul li {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $time_color || $time_size || $time_weight) {
      $inline_style .= '.hanor-plan-'. $e_uniqid .'.plan-item p.plan-time-period {';
      $inline_style .= ( $time_color ) ? 'color:'. $time_color .';' : '';
      $inline_style .= ( $time_size ) ? 'font-size:'. havnor_core_check_px($time_size) .';' : '';
      $inline_style .= ( $time_weight ) ? 'font-weight:'. $time_weight .';' : '';
      $inline_style .= '}';
    }
    // Button Text Color
    if ( $btn_text_color || $btn_text_size || $btn_bg_color || $btn_border_color || $btn_border_radius) {
      $inline_style .= '.hanor-plan-'. $e_uniqid .'.plan-item a.hanor-btn {';
      $inline_style .= ( $btn_text_color ) ? 'color:'. $btn_text_color .';' : '';
      $inline_style .= ( $btn_text_size ) ? 'font-size:'. havnor_core_check_px($btn_text_size) .';' : '';
      $inline_style .= ( $btn_border_radius ) ? 'border-radius:'. havnor_core_check_px($btn_border_radius) .';' : '';
      $inline_style .= ( $btn_bg_color ) ? 'background-color:'. $btn_bg_color .';' : '';
      $inline_style .= ( $btn_border_color ) ? 'border-color:'. $btn_border_color .';' : '';
      $inline_style .= '}';
    }
    // Button Text Hover Color
    if ( $btn_text_hover_color || $btn_border_hover_color || $btn_bg_hover_color) {
      $inline_style .= '.hanor-plan-'. $e_uniqid .'.plan-item a.hanor-btn:hover {';
      $inline_style .= ( $btn_text_hover_color ) ? 'color:'. $btn_text_hover_color .';' : '';
      $inline_style .= ( $btn_border_hover_color ) ? 'border-color: '. $btn_border_hover_color .';' : '';
      $inline_style .= ( $btn_bg_hover_color ) ? 'background:'. $btn_bg_hover_color .';' : '';
      $inline_style .= '}';
    }

    if ($pricing_style === 'pricing-two') {
      $pricing_style_class = ' pricing-style-two';
    } else {
       $pricing_style_class = ' pricing-style-one';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-plan-'. $e_uniqid;

    $time_period = $time_period ? '<p class="plan-time-period">'.$time_period.'</p>' : '';
    $plan_title = $plan_title ? '<h4 class="plan-title">'.$plan_title.'</h4>' : '';
    $plan_price = $plan_price ? '<h2 class="plan-price">'.$price_unit.$plan_price.'</h2>' : '';
    $btn_text = $btn_text ? '<div class="hanor-btns-group"><a href="'.$btn_link.'" '.$open_link.' class="hanor-btn"><span class="hanor-btn-text">'.$btn_text.'</span></a></div>' : '';

    $output = '<div class="plan-item hanor-item '. $class . $styled_class . $pricing_style_class.'">
                <div class="plan-title-wrap">
                  '.$plan_title.$plan_price.$time_period.'
                </div>
                <div class="plan-info">
                  <ul>';
                    // Group Param Output
                    foreach ( $get_each_plan as $each_plan ) {
                      $output .= '<li>'.$each_plan['plan_text'].'</li>';
                    }
      $output .= '</ul>
                  '.$btn_text.'
                </div>
              </div>';

    return $output;
  }
}
add_shortcode( 'hanor_plan', 'havnor_plan_function' );
