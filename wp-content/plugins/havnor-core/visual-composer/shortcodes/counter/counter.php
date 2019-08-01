<?php
/* ==========================================================
  Partner
=========================================================== */
if ( !function_exists('havnor_counter_function')) {
  function havnor_counter_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'counter_style'  => '',
      'counter_icon'  => '',
      'counter_title'  => '',
      'counter_value'  => '',
      'value_in' =>'',
      'need_border' => '',
      'no_width' => '',
      'class'  => '',
      // Counter Options
      'counter_delay' => '',
      'counter_time' => '',
      // Style
      'title_color'  => '',
      'value_color'  => '',
      'icon_color'  => '',
      'title_size'  => '',
      'title_weight' => '',
      'value_size'  => '',
      'value_weight' => '',
      'icon_size'  => '',

      'value_in_size' =>'',
      'value_in_weight' => '',
      'value_in_color' =>'',
      'bottom_space' => '',
      'top_space' => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if($bottom_space || $top_space){
      $inline_style .= '.hanor-counter-'. $e_uniqid .' .stats-item {';
      $inline_style .= ( $bottom_space ) ? 'margin-bottom:'. havnor_core_check_px($bottom_space) .';' : '';
      $inline_style .= ( $top_space ) ? 'padding-top:'. havnor_core_check_px($top_space) .';' : '';
      $inline_style .= '}';
    }
    
    if ( $title_size || $title_color || $title_weight) {
      $inline_style .= '.hanor-counter-'. $e_uniqid .' .stats-item .stats-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= '}';
    }
    if ( $value_color || $value_size || $value_weight) {
      $inline_style .= '.hanor-counter-'. $e_uniqid .' .stats-item .stats-number .hanor-counter {';
      $inline_style .= ( $value_color ) ? 'color:'. $value_color .';' : '';
      $inline_style .= ( $value_size ) ? 'font-size:'. havnor_core_check_px($value_size) .';' : '';
      $inline_style .= ( $value_weight ) ? 'font-weight:'. $value_weight .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_color || $icon_size ) {
      $inline_style .= '.hanor-counter-'. $e_uniqid .' .stats-item .stats-number .countr-icon {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }

    if ( $value_in_color || $value_in_size || $value_in_weight) {
      $inline_style .= '.hanor-counter-'. $e_uniqid .' .stats-item .stats-number .hanor-vlaue-in {';
      $inline_style .= ( $value_in_color ) ? 'color:'. $value_in_color .';' : '';
      $inline_style .= ( $value_in_size ) ? 'font-size:'. havnor_core_check_px($value_in_size) .';' : '';
      $inline_style .= ( $value_in_weight ) ? 'font-weight:'. $value_in_weight .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-counter-'. $e_uniqid;
    
    // Counter Options
    $counter_delay = $counter_delay ? ' data-delay="'. $counter_delay .'"' : ' data-delay="1"';
    $counter_time = $counter_time ? ' data-time="'. $counter_time .'"' : ' data-time="1000"';

    if ($counter_style === 'two') {
      $style_class = ' stats-style-two';
    } else {
      $style_class = '';
    }

    // Border Class
    if($need_border) {
      $border_class = ' have-border';
    } else {
      $border_class = ' hide-border';
    }

    if($no_width) {
      $no_width_class = ' no-half-width';
    } else {
      $no_width_class = '';
    }

    if($counter_icon) {
      $counter_icon_cls = ' hav-icon';
    } else {
      $counter_icon_cls = ' dhav-icon';
    }
    if($value_in) {
      $value_in_cls = ' hav-value-in';
    } else {
      $value_in_cls = ' dhav-value-in';
    }

    // Counter Title
    $counter_title = $counter_title ? '<h4 class="stats-title">'. $counter_title .'</h4>' : '';
    // Value In
    $counter_icon = $counter_icon ? '<span class="'. $counter_icon .' countr-icon"></span>' : '';
    $value_in = $value_in ? ' <span class="hanor-vlaue-in">'. $value_in .'</span>' : '';
    // Value
    $counter_value = $counter_value ? '<h2 class="stats-number">'.$counter_icon.'<span class="hanor-counter" '.$counter_delay.$counter_time.'>'. $counter_value .'</span>'.$value_in.'</h2>' : '';

    // Counters
    $output = '<div class="hanor-stats'.$style_class.$styled_class.' '.$class.''.$border_class.$counter_icon_cls.$value_in_cls.$no_width_class.'">
                <div class="stats-item hanor-item">'. $counter_value. $counter_title .'</div>
              </div>';

    // Output
    return $output;

  }
}
add_shortcode( 'havnor_counter', 'havnor_counter_function' );
