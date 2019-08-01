<?php
/* ==========================================================
  Skills
=========================================================== */
if ( !function_exists('havnor_skills_function')) {
  function havnor_skills_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'skills_style'  => '',
      'small_circle'  => '',
      'skills_title'  => '',
      'skills_value'  => '',
      'skills_value_in'  => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_size'  => '',
      'value_color'  => '',
      'value_size'  => '',
      'fill_color'  => '',
      'empty_fill_color' => '',
      'circle_bg_color' => '',
      
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';
    
    if ( $title_size || $title_color ) {
      $inline_style .= '.hanor-skills-'. $e_uniqid .' h4.progress-title, .hanor-skills-'. $e_uniqid .'.skill-item h4.skill-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $value_color || $value_size ) {
      $inline_style .= '.hanor-skills-'. $e_uniqid .' span.progress-counter, .hanor-skills-'. $e_uniqid .' h3.circle-progressbar-counter {';
      $inline_style .= ( $value_color ) ? 'color:'. $value_color .';' : '';
      $inline_style .= ( $value_size ) ? 'font-size:'. havnor_core_check_px($value_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $fill_color ) {
      $inline_style .= '.hanor-skills-'. $e_uniqid .'.progress-item .progress-bar {';
      $inline_style .= ( $fill_color ) ? 'background-color:'. $fill_color .';' : '';
      $inline_style .= '}';
    }
    if ( $circle_bg_color ) {
      $inline_style .= '.hanor-skills-'. $e_uniqid .' .circle-progressbar canvas {';
      $inline_style .= ( $circle_bg_color ) ? 'background-color:'. $circle_bg_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-skills-'. $e_uniqid;

    $skills_value_in = $skills_value_in ? $skills_value_in : '%';
    if ($small_circle) {
      $c_open = '<div class="small-circle-progressbar">';
      $c_close = '</div>';
    } else {
      $c_open = '';
      $c_close = '';
    }

    $fill_color_actual = $fill_color ? $fill_color : '#4189dd';
    $empty_fill_actual = $empty_fill_color ? $empty_fill_color : '#f8f8f8';

    if ($skills_style === 'skills-circle') {
    $data_val = $skills_value ? $skills_value / 100 : '';
    $output = $c_open.'<div class="skill-item'. $styled_class .' '. $class .'">
                <div class="circle-progressbar" data-value="'.$data_val.'" data-color="'.$fill_color_actual.'" data-empty="'.$empty_fill_actual.'">
                  <h3 class="circle-progressbar-counter"><span class="circle-counter">'.$skills_value.'</span>'.$skills_value_in.'</h3>
                </div>
                <h4 class="skill-title">'.$skills_title.'</h4>
              </div>'.$c_close;
    } else {
    $output = '<div class="progress-item'. $styled_class .' '. $class .'">
                <h4 class="progress-title">'.$skills_title.'</h4>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" data-percent="'.$skills_value.'%"><span class="progress-counter">'. $skills_value . $skills_value_in .'</span></div>
                </div>
              </div>';
    }
    return $output;
  }
}
add_shortcode( 'havnor_skills', 'havnor_skills_function' );
