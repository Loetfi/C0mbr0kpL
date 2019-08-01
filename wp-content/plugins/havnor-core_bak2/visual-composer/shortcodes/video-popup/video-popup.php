<?php
/* ==========================================================
  Video Popup
=========================================================== */
if ( !function_exists('havnor_video_popup_function')) {
  function havnor_video_popup_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'video_popup_style'  => '',
      'select_image'  => '',
      'play_icon'  => '',
      'video_link'  => '',
      'class'  => '',
      // Style
      'image_overlay_color' => '',
      'icon_color'  => '',
      'icon_hover_color' => '',
      'icon_size'  => '',
      'icon_bg_color'  => '',
      'icon_bg_hover_color'  => '',
      'text_size' =>'',
      'text_weight' => '',
      'text_color' =>'',
      // Spacings
      'top_space' =>'',
      'bottom_space' =>'',
      'icon_bottom_space' =>'',

    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $icon_color || $icon_size || $icon_bg_color ) {
      $inline_style .= '.hanor-video-'. $e_uniqid .' .hanor-video-btn-wrap .video-btn {';
      $inline_style .= ( $icon_bg_color ) ? 'background-color:'. $icon_bg_color .';' : '';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_color || $icon_size ) {
      $inline_style .= '.hanor-video-'. $e_uniqid .' .hanor-video-btn-wrap .video-btn [class*="pe-7s"] {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_bg_color ) {
      $inline_style .= '.hanor-video-'. $e_uniqid .'.hanor-quote .hanor-video-btn-wrap .video-btn {';
      $inline_style .= ( $icon_bg_color ) ? 'background-color:'. $icon_bg_color .';' : '';
      $inline_style .= '}';
    }
    if ( $image_overlay_color ) {
      $inline_style .= '.hanor-video-'. $e_uniqid .'.hanor-video-wrap:before {';
      $inline_style .= ( $image_overlay_color ) ? 'background:'. $image_overlay_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_bg_hover_color || $icon_hover_color) {
      $inline_style .= '.hanor-video-'. $e_uniqid .' .video-btn:hover, .hanor-video-'. $e_uniqid .'.hanor-quote .hanor-video-btn-wrap .video-btn:hover {';
      $inline_style .= ( $icon_bg_hover_color ) ? 'background-color:'. $icon_bg_hover_color .';' : '';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_hover_color) {
      $inline_style .= '.hanor-video-'. $e_uniqid .' .video-btn:hover [class*="pe-7s"] {';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Text Size
    if ( $text_size || $text_color || $text_weight) {
      $inline_style .= '.hanor-video-'. $e_uniqid .'.hanor-quote .quote-title p {';
      $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
      $inline_style .= ( $text_weight ) ? 'font-weight:'. $text_weight .';' : '';
       $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= '}';
    }
    //Spacings
    if ( $top_space || $bottom_space ) {
      $inline_style .= '.hanor-video-'. $e_uniqid .'.hanor-quote  {';
      $inline_style .= ( $top_space ) ? 'padding-top:'. havnor_core_check_px($top_space) .';' : '';
      $inline_style .= ( $bottom_space ) ? 'padding-bottom:'. havnor_core_check_px($bottom_space) .';' : '';
      $inline_style .= '}';
    } 
    //Video Icon Bottom
    if ( $icon_bottom_space ) {
      $inline_style .= '.hanor-video-'. $e_uniqid .'.hanor-quote .hanor-video-btn-wrap {';
      $inline_style .= ( $icon_bottom_space ) ? 'margin-bottom:'. havnor_core_check_px($icon_bottom_space) .';' : '';
      $inline_style .= '}';
    } 

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-video-'. $e_uniqid;

    $play_icon = $play_icon ? '<span class="video-btn"><i class="'.$play_icon.'" aria-hidden="true"></i></span>' : '';
    $video_btn = $video_link ? '<a href="'.$video_link.'" class="hanor-video-btn-wrap hanor-popup-video">'.$play_icon.'</a>' : '';
    $image_url = wp_get_attachment_url( $select_image );
    $alt_text = get_post_meta($select_image, '_wp_attachment_image_alt', true);
    $image_main = $select_image ? '<img src="'. $image_url .'" alt="'.$alt_text.'">' : '';

    if ($video_popup_style === 'popup-two') {
      $output = '<div class="hanor-image hanor-video-wrap '. $class . $styled_class .'">'.$image_main.$video_btn.'</div>';
    } else {
      $output = '<section class="hanor-quote '. $class . $styled_class .'">
                  <div class="hanor-container">'.$video_btn.'<h2 class="quote-title">'.$content.'</h2></div>
                </section>';
    }

    return $output;
  }
}
add_shortcode( 'hanor_video_popup', 'havnor_video_popup_function' );
