<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('havnor_subscribe_form_function')) {
  function havnor_subscribe_form_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'subscribe_title' =>'',
      'open_link'  => '',
      'class'  => '',
      'subscribe_logos'  => '',
      'subscribe_detail' =>'',
      // Style
      'title_color'  => '',
      'title_size'  => '',
      'icon_color'  => '',
      'icon_hover_color' =>'',
      'icon_bg_color'  => '',
      'icon_bg_hover_color' =>'',
      'content_color'  => '',
      'content_size'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);
    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $title_size || $title_color ) {
      $inline_style .= '.hanor-subscribe-'. $e_uniqid .'.hanor-subscribe-section .subscribe-section-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }  
    // Social Section
    if ( $icon_color) {
      $inline_style .= '.hanor-subscribe-'. $e_uniqid .'.hanor-subscribe-section .subscribe-socials a  {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_hover_color) {
      $inline_style .= '.hanor-subscribe-'. $e_uniqid .'.hanor-subscribe-section .subscribe-socials a:hover  {';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_bg_color) {
      $inline_style .= '.hanor-subscribe-'. $e_uniqid .'.hanor-subscribe-section .subscribe-socials a  {';
      $inline_style .= ( $icon_bg_color ) ? 'background-color:'. $icon_bg_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_bg_hover_color) {
      $inline_style .= '.hanor-subscribe-'. $e_uniqid .'.hanor-subscribe-section .subscribe-socials a:hover  {';
      $inline_style .= ( $icon_bg_hover_color ) ? 'background-color:'. $icon_bg_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Content Section
    if ( $content_color || $content_size ) {
      $inline_style .= '.hanor-subscribe-'. $e_uniqid .' p.sub-desc {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }

    // Group Field
    $subscribe_logos = (array) vc_param_group_parse_atts( $subscribe_logos );
    $get_subscribe_logos = array();
    foreach ( $subscribe_logos as $subscribe_logo ) {
      $each_logo = $subscribe_logo;
      $each_logo['social_icon'] = isset( $subscribe_logo['social_icon'] ) ? $subscribe_logo['social_icon'] : '';
      $each_logo['social_link'] = isset( $subscribe_logo['social_link'] ) ? $subscribe_logo['social_link'] : '';
      $get_subscribe_logos[] = $each_logo;
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-subscribe-'. $e_uniqid;
    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';

    $output = '';
    $output .= '<section class="hanor-subscribe-section '.$styled_class.'">
                <div class="subscribe-wrap">
                <div class="col-md-6"><h2 class="subscribe-section-title">'.$subscribe_title.'</h2><div class="subscribe-socials">';
                // Group Param Output
                foreach ( $get_subscribe_logos as $each_logo ) {
                  if ($each_logo['social_link']) {
                    $output .= '<a href="'. $each_logo['social_link'] .'" '. $open_link .'><i class="'. $each_logo['social_icon'] .'"></i></a>';
                  } else {
                    $output .= $each_logo['social_icon'];
                  }
                }
    $output .= '</div></div><div class="col-md-6">'.$content .'<p class="sub-desc">'.$subscribe_detail.'</p></div></div></section>';
    return $output;
  }
}
add_shortcode( 'hanor_subscribe_form', 'havnor_subscribe_form_function' );
