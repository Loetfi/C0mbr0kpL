<?php
/* ===========================================================
    CTA
=========================================================== */
if ( !function_exists('havnor_callout_function')) {
  function havnor_callout_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'call_style' => '',
      'btn_text'  => '',
      'btn_link'  => '',
      'open_link'  => '',
      'call_title' =>'',
      'class'  => '',
      'text_align_style'=>'',
      // Styling
      'top_space' => '',
      'bottom_space' => '',
      'title_color' =>'',
      'title_size' =>'',
      'title_weight' => '',
      'content_size'  => '',
      'content_weight'  => '',
      'content_color'  => '',
      'btn_text_size'  => '',
      'btn_border_radius' => '',
      'btn_text_color'  => '',
      'btn_text_hover_color'  => '',
      'bg_color' => '',
      'btn_bg_color'  => '',
      'btn_bg_hover_color'  => '',
      'btn_border_color'  => '',
      'btn_border_hover_color'  => '',
      'cta_bg_color' =>'',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    if ( $top_space || $bottom_space ) {
      $inline_style .= '.hanor-callout.hanor-cta-'. $e_uniqid .' {';
      $inline_style .= ( $bottom_space ) ? 'padding-top:'. havnor_core_check_px($bottom_space) .';' : '';
      $inline_style .= ( $bottom_space ) ? 'padding-bottom:'. havnor_core_check_px($bottom_space) .';' : '';
      $inline_style .= '}';
    }
    // Title Text Color
    if ( $title_color || $title_size || $title_weight) {
      $inline_style .= '.hanor-callout.hanor-cta-'. $e_uniqid .' h2.callout-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size || $content_weight) {
      $inline_style .= '.hanor-callout.hanor-cta-'. $e_uniqid .' p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= ( $content_weight ) ? 'font-weight:'. $content_weight .';' : '';
      $inline_style .= '}';
    }
    // Btn Color
    if ( $btn_text_color || $btn_text_size || $btn_bg_color || $btn_border_color || $btn_border_radius) {
      $inline_style .= '.hanor-callout.hanor-cta-'. $e_uniqid .' .hanor-btn {';
      $inline_style .= ( $btn_text_color ) ? 'color:'. $btn_text_color .';' : '';
      $inline_style .= ( $btn_bg_color ) ? 'background-color:'. $btn_bg_color .';' : '';
      $inline_style .= ( $btn_border_color ) ? 'border-color:'. $btn_border_color .';' : '';
      $inline_style .= ( $btn_text_size ) ? 'font-size:'. havnor_core_check_px($btn_text_size) .';' : '';
      $inline_style .= ( $btn_border_radius ) ? 'border-radius:'. havnor_core_check_px($btn_border_radius) .';' : '';
      $inline_style .= '}';
    }
    // Btn Hover Color
    if ( $btn_text_hover_color || $btn_bg_hover_color || $btn_border_hover_color ) {
      $inline_style .= '.hanor-callout.hanor-cta-'. $e_uniqid .' .hanor-btn:hover {';
      $inline_style .= ( $btn_text_hover_color ) ? 'color:'. $btn_text_hover_color .';' : '';
      $inline_style .= ( $btn_border_hover_color ) ? 'border-color:'. $btn_border_hover_color .';' : '';
      $inline_style .= ( $btn_bg_hover_color ) ? 'background-color:'. $btn_bg_hover_color .';' : '';
      $inline_style .= '}';
    }
     // Background Color
    if ( $cta_bg_color ) {
      $inline_style .= '.hanor-callout.hanor-cta-'. $e_uniqid .'.hanor-callout {';
      $inline_style .= ( $cta_bg_color ) ? 'background-color:'. $cta_bg_color.';' : '';
      $inline_style .= '}';
    }

    // add inline style
    havnor_add_inline_style( $inline_style );
    $styled_class  = ' hanor-cta-'. $e_uniqid;

    // Style Class
     if($call_style === 'two') {
      $style_add = ' callout-style-two ';
    } elseif ($call_style === 'three') {
      $style_add = 'callout-style-three';
    } else {
      $style_add = 'callout-style-one';
    }

    // Text Align Style 
    if ($text_align_style === 'right'){
      $text_align_class = ' text-align-right';
    } elseif ($text_align_style === 'left') {
      $text_align_class = ' text-align-left';
    } else {
      $text_align_class = '';
    }

    $open_link = $open_link ? ' target="_blank"' : '';
    $btn_text = $btn_text ? '<a href="'.$btn_link.'" '.$open_link.' class="hanor-btn hanor-white-btn"><span class="hanor-btn-text">'.$btn_text.'</span></a>' : '';

    if($call_style === 'two') {
      $output = '<div class="hanor-callout  '.$style_add. $styled_class.'"><div class="container"><div class="col-md-8"><h2 class="callout-title">'.$call_title.'</h2>'.do_shortcode($content).'</div> <div class="col-md-4"> '.$btn_text.'</div></div></div>';
    } elseif($call_style === 'three') {
      $output = '<div class="hanor-callout  '.$style_add. $styled_class. $text_align_class.'"><div class="container"><div class="col-md-12">'.do_shortcode($content).'<h2 class="callout-title">'.$call_title.'</h2>'.$btn_text.'</div> </div></div>';
    } else {
      $output = '<div class="hanor-callout  '.$style_add. $styled_class.'"><div class="container"><h2 class="callout-title">'.$call_title.'</h2>'.$btn_text.'</div></div>';
    }
    return $output;
  }
}
add_shortcode( 'havnor_callout', 'havnor_callout_function' );
