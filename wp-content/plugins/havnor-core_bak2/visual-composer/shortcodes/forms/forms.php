<?php
/* ==========================================================
  Video Popup
=========================================================== */
if ( !function_exists('havnor_forms_function')) {
  function havnor_forms_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'forms_style'  => '',
      'forms_title'  => '', 
      'login_text'  => '', 
      'login_link'  => '', 
      'open_link' => '',
      'forms_content'  => '',
      'alert'  => '',
      'class'  => '',
      // Style
      'form_three_bg_color' => '',
      'title_color'  => '',
      'title_size'  => '',
      'title_weight' => '',
      'title_bottom_space' => '',
      'text_color'  => '',
      'text_size'  => '',
      'content_weight' => '',
      'content_bottom_space' => '',
      'alter_text_color' =>'',
      'icon_color'  => '',
      'icon_size'  => '',
      'icon_hover_color'  => '',
      'button_bg_color' => '',
      'button_bg_hover_color' => '',
      'button_text_color' => '',
      'button_text_hover_color' => '',
      'button_border_color' => '',
      'button_border_hover_color' => '',
      'from_bg_color' =>'',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);
    $open_link = $open_link ? ' target="_blank"' : '';

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $title_size || $title_color || $title_weight || $title_bottom_space) {
      $inline_style .= '.hanor-form-'. $e_uniqid .' .hanor-section-title h2 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= ( $title_bottom_space ) ? 'padding-bottom:'. $title_bottom_space .';' : '';
      $inline_style .= '}';
    }
    if ( $text_color || $text_size || $content_weight || $content_bottom_space) {
      $inline_style .= '.hanor-form-'. $e_uniqid .' .hanor-section-title p {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
      $inline_style .= ( $content_weight ) ? 'font-weight:'. $content_weight .';' : '';
      $inline_style .= ( $content_bottom_space ) ? 'padding-bottom:'. $content_bottom_space .';' : '';
      $inline_style .= '}';
    }
     if ( $alter_text_color ) {
      $inline_style .= '.hanor-form-'. $e_uniqid .' .offer-alert {';
      $inline_style .= ( $alter_text_color ) ? 'color:'. $alter_text_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_color || $icon_size ) {
      $inline_style .= '.hanor-form-'. $e_uniqid .'.hanor-subscribe .hanor-social a {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_hover_color ) {
      $inline_style .= '.hanor-form-'. $e_uniqid .'.hanor-subscribe .hanor-social a:hover {';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
    }
    if($button_bg_color || $button_border_color || $button_text_color) {
      $inline_style .= '.hanor-form-'. $e_uniqid .'.hanor-free-trail input[type="submit"], .hanor-form-'. $e_uniqid .' input[type="submit"] {';
      $inline_style .= ( $button_bg_color ) ? 'background-color:'. $button_bg_color .';' : '';
      $inline_style .= ( $button_border_color ) ? 'border-color:'. $button_border_color .';' : '';
      $inline_style .= ( $button_text_color ) ? 'color:'. $button_text_color .';' : '';
      $inline_style .= '}';
    }
    if($button_bg_hover_color || $button_border_hover_color || $button_text_hover_color) {
      $inline_style .= '.hanor-form-'. $e_uniqid .'.hanor-free-trail input[type="submit"]:hover, .hanor-form-'. $e_uniqid .' input[type="submit"]:hover {';
      $inline_style .= ( $button_bg_hover_color ) ? 'background-color:'. $button_bg_hover_color .';' : '';
      $inline_style .= ( $button_border_hover_color ) ? 'border-color:'. $button_border_hover_color .';' : '';
      $inline_style .= ( $button_text_hover_color ) ? 'color:'. $button_text_hover_color .';' : '';
      $inline_style .= '}';
    }
    // From bg color
    if($from_bg_color) {
      $inline_style .= '.hanor-form-'. $e_uniqid .'.hanor-subscribe {';
      $inline_style .= ( $from_bg_color ) ? 'background-color:'. $from_bg_color .';' : '';
      $inline_style .= '}';
    }
    if($form_three_bg_color) {
      $inline_style .= '.hanor-form-'. $e_uniqid .'.hanor-signup .hanor-container {';
      $inline_style .= ( $form_three_bg_color ) ? 'background-color:'. $form_three_bg_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-form-'. $e_uniqid;

    $forms_title = $forms_title ? '<h2 class="section-title">'.$forms_title.'</h2>' : '';
    $forms_content = $forms_content ? '<p>'.$forms_content.'</p>' : '';
    if ($forms_style === 'form-three') {
      $style_class = 'hanor-signup';
      if($form_three_bg_color) {
        $three_bg_class = ' have-bg';
      } else {
        $three_bg_class = '';
      }
    } else {
      $style_class = 'hanor-subscribe';
    }

    if ($forms_style === 'form-two') {
      $output = '<div class="hanor-free-trail '. $class . $styled_class .'">
                  <div class="hanor-section-title">'.$forms_title.$forms_content.'</div>
                  <div class="hanor-container">'.do_shortcode($content).'<div class="offer-alert">'.$alert.'</div></div>
                </div>';
    } elseif ($forms_style === 'form-three') {
      $output = '<div class="'.$style_class.' '. $class . $styled_class . $three_bg_class .'">
                  <div class="hanor-section-title">'.$forms_title.$forms_content.'</div>
                  <div class="hanor-container">'.do_shortcode('[havnor_registration]').'</div>
                </div>';
    } elseif ($forms_style === 'form-four') {
      $output = '<div class="hanor-free-trail simple-supf'. $class . $styled_class .'">
                  <div class="hanor-container">'.do_shortcode($content).'</div>
                </div>';
    } elseif ($forms_style === 'form-five') {
      $output = '<div class="hanor-signup-reg '. $class . $styled_class .'">
                  <div class="hanor-section-title">'.$forms_title.$forms_content.'</div>
                  <div class="hanor-container">'.do_shortcode('[havnor_registration_up]').'<a href="'.$login_link.'" '.$open_link.' class="have-acc">'.$login_text.'</a></div>
                </div>';
    } else {
      $output = '<div class="'.$style_class.' '. $class . $styled_class .'">
                  <div class="hanor-section-title">'.$forms_title.$forms_content.'</div>
                  <div class="hanor-container">'.do_shortcode($content).'</div>
                </div>';
    }

    return $output;
  }
}
add_shortcode( 'hanor_forms', 'havnor_forms_function' );
