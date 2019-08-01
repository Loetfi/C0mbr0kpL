<?php
/* ===========================================================
    Button
=========================================================== */
if ( !function_exists('havnor_button_function')) {
  function havnor_button_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'button_align'  => '',
      'button_text'  => '',
      'button_link'  => '',
      'open_link'  => '',
      'class'  => '',
      // Styling
      'text_color'  => '',
      'bgg_color'  => '',
      'border_color'  => '',
      'text_hover_color'  => '', 
      'bg_hover_color'  => '',
      'border_radius' => '',
      'border_hover_color'  => '',
      'text_size'  => '',
      'button_top_space' => '',
      // Icon
      'select_icon'  => '',
      'icon_size'  => '',
      'icon_color'  => '',
      'icon_hover_color'  => '',
      // Design
      'css' => ''
    ), $atts));

    // Design Tab
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Button Top Space
    if($button_top_space) {
      $inline_style .= '.hanor-btn-'. $e_uniqid .'.hanor-btns-group {';
      $inline_style .= ( $button_top_space ) ? 'padding-top:'. havnor_core_check_px($button_top_space) .';' : '';
      $inline_style .= '}';
    }
    // Button Text Color
    if ( $text_color || $text_size || $bgg_color || $border_color || $border_radius) {
      $inline_style .= '.hanor-btn-'. $e_uniqid .' a.hanor-btn {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
      $inline_style .= ( $border_radius ) ? 'border-radius:'. havnor_core_check_px($border_radius) .';' : '';
      $inline_style .= ( $bgg_color ) ? 'background-color:'. $bgg_color .';' : '';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
    // Button Text Hover Color
    if ( $text_hover_color || $border_hover_color ) {
      $inline_style .= '.hanor-btn-'. $e_uniqid .' a.hanor-btn:hover {';
      $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
      $inline_style .= ( $bg_hover_color ) ? 'background:'. $bg_hover_color .';' : '';
      $inline_style .= ( $border_hover_color ) ? 'border-color: '. $border_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Button Text Hover Color
    if ( $bg_hover_color ) {
      $inline_style .= '.hanor-btn-'. $e_uniqid .' .hanor-btn:hover:before, .hanor-btn-'. $e_uniqid .' .hanor-btn:focus:before, .hanor-btn-'. $e_uniqid .' .hanor-btn:before {';
      $inline_style .= ( $bg_hover_color ) ? 'background:'. $bg_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Icon
    if ( $icon_size || $icon_color ) {
      $inline_style .= '.hanor-btn-'. $e_uniqid .' a.hanor-btn i {';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_hover_color ) {
      $inline_style .= '.hanor-btn-'. $e_uniqid .' a.hanor-btn:hover i {';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-btn-'. $e_uniqid;

    if ($button_align === 'right') {
      $align_class = ' cpation-right';
    } elseif ($button_align === 'center') {
      $align_class = ' cpation-center';
    } else {
      $align_class = ' cpation-left';
    }

    // Styling
    $button_text = $button_text ? $button_text : '';
    $button_link = $button_link ? 'href="'. $button_link .'"' : '';
    $open_link = $open_link ? ' target="_blank"' : '';
    $select_icon = $select_icon ? '<i class="'. $select_icon .'"></i> ' : '';

    $output = '<div class="hanor-btns-group '. $custom_css . $styled_class . $align_class .' '. $class .'"><a '. $button_link . $open_link .' class="hanor-btn"><span class="hanor-btn-text">'. $select_icon . $button_text .'</span></a></div>';

    return $output;

  }
}
add_shortcode( 'havnor_button', 'havnor_button_function' );
