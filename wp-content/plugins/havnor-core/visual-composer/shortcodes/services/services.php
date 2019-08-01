<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('havnor_services_function')) {
  function havnor_services_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'service_style'  => '',
      'stunnhing_services'  => '',
      'service_image'  => '',
      'service_image_link'  => '',
      'service_bg_image'  => '',
      'service_featured_image' => '',
      'service_icon'  => '',
      'service_title'  => '',
      'read_more_link'  => '',
      'read_more_title'  => '',
      'open_link'  => '',
      'image_icon' =>'',
      'btn_text'  => '',
      'btn_link'  => '',
      'class'  => '',
      'text_align_style'=>'',
      'services_dropshadow' =>'',
      'services_border' => '',
      'service_bg_color' =>'',
      'services_border_radius' =>'',
      // Style
      'background_overlay_color' => '',
      'title_color'  => '',
      'title_size'  => '',
      'title_weight' => '',
      'title_hover_color'  => '',
      'content_color'  => '',
      'content_size'  => '',
      'icon_color'  => '',
      'icon_size'  => '',
      'link_color'  => '',
      'link_size'  => '',
      'link_hover_color'  => '',
      'service_top'=>'',
      'service_btm'=>'',
      'service_item_top' =>'',
      'service_item_btm' =>'',
      'btn_text_size'  => '',
      'btn_border_radius' => '',
      'btn_text_color'  => '',
      'btn_text_hover_color'  => '',
      'bg_color' => '',
      'btn_bg_color'  => '',
      'btn_bg_hover_color'  => '',
      'btn_border_color'  => '',
      'btn_border_hover_color'  => '',

    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $title_size || $title_color || $title_weight) {
      $inline_style .= '.hanor-service-'. $e_uniqid .' .service-info h4.service-title, .hanor-service-'. $e_uniqid .' .service-info h4.service-title a {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= '}';
    }
    if ( $title_hover_color ) {
      $inline_style .= '.hanor-service-'. $e_uniqid .' .service-info h4.service-title a:hover {';
      $inline_style .= ( $title_hover_color ) ? 'color:'. $title_hover_color .';' : '';
      $inline_style .= '}';
    }    
    if ( $content_color || $content_size ) {
      $inline_style .= '.hanor-service-'. $e_uniqid .' .service-info p, .hanor-service-'. $e_uniqid .'.services-style-four .service-info p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    /* Overlay Color */
    if ( $background_overlay_color ) {
      $inline_style .= '.hanor-service-'. $e_uniqid .'.services-style-four .service-info {';
      $inline_style .= ( $background_overlay_color ) ? 'background:'. $background_overlay_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_color || $icon_size ) {
      $inline_style .= '.hanor-service-'. $e_uniqid .' .service-item .hanor-icon span  {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $link_size || $link_color ) {
      $inline_style .= '.hanor-service-'. $e_uniqid .' .hanor-link a {';
      $inline_style .= ( $link_color ) ? 'color:'. $link_color .';' : '';
      $inline_style .= ( $link_size ) ? 'font-size:'. havnor_core_check_px($link_size) .';' : '';
      $inline_style .= '}';
       $inline_style .= '.hanor-service-'. $e_uniqid .' .hanor-link a:after {';
      $inline_style .= ( $link_color ) ? 'background:'. $link_color .';' : '';
      $inline_style .= '}';
    }
    if ( $link_hover_color ) {
      $inline_style .= '.hanor-service-'. $e_uniqid .' .hanor-link a:hover {';
      $inline_style .= ( $link_hover_color ) ? 'color:'. $link_hover_color .';' : '';
      $inline_style .= '}';
      $inline_style .= '.hanor-service-'. $e_uniqid .' .hanor-link a:hover:after {';
      $inline_style .= ( $link_hover_color ) ? 'background:'. $link_hover_color .';' : '';
       $inline_style .= '}';
    }
    // Btn Color
    if ( $btn_text_color || $btn_text_size || $btn_bg_color || $btn_border_color || $btn_border_radius ) {
      $inline_style .= '.hanor-service-'. $e_uniqid .'.services-style-five .hanor-btn {';
      $inline_style .= ( $btn_text_color ) ? 'color:'. $btn_text_color .';' : '';
      $inline_style .= ( $btn_bg_color ) ? 'background:'. $btn_bg_color .';' : '';
      $inline_style .= ( $btn_border_color ) ? 'border-color:'. $btn_border_color .';' : '';
      $inline_style .= ( $btn_text_size ) ? 'font-size:'. havnor_core_check_px($btn_text_size) .';' : '';
      $inline_style .= ( $btn_border_radius ) ? 'border-radius:'. havnor_core_check_px($btn_border_radius) .';' : '';
      $inline_style .= '}';
    }
    // Btn Hover Color
    if ( $btn_text_hover_color || $btn_bg_hover_color || $btn_border_hover_color ) {
      $inline_style .= '.hanor-service-'. $e_uniqid .'.services-style-five .hanor-btn:hover {';
      $inline_style .= ( $btn_text_hover_color ) ? 'color:'. $btn_text_hover_color .';' : '';
      $inline_style .= ( $btn_border_hover_color ) ? 'border-color:'. $btn_border_hover_color .';' : '';
      $inline_style .= ( $btn_bg_hover_color ) ? 'background:'. $btn_bg_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Section Spacing
    if ( $service_top ) {
      $inline_style .= '.hanor-service-'. $e_uniqid .'.hanor-services {';
      $inline_style .= ( $service_top ) ? 'padding-top:'. havnor_core_check_px($service_top) .';' : '';
      $inline_style .= '}';
    }
    if ( $service_btm ) {
      $inline_style .= '.hanor-service-'. $e_uniqid .' .service-item, .hanor-stunning-services.hanor-service-'. $e_uniqid .' .service-item {';
      $inline_style .= ( $service_btm ) ? 'padding-bottom:'. havnor_core_check_px($service_btm) .';' : '';
      $inline_style .= '}';
    }
    // Service Item Spacing
    if ( $service_item_top || $service_item_btm ) {
      $inline_style .= '.hanor-service-'. $e_uniqid .'.hanor-services{';
      $inline_style .= ( $service_item_top ) ? 'padding-top:'. havnor_core_check_px($service_item_top) .';' : '';
      $inline_style .= ( $service_item_btm ) ? 'padding-bottom:'. havnor_core_check_px($service_item_btm) .';' : '';
      $inline_style .= '}';
    }
    // Service Background Color
     if ( $service_bg_color ) {
      $inline_style .= '.hanor-service-'. $e_uniqid .'.hanor-services.services-style-five  {';
      $inline_style .= ( $service_bg_color ) ? 'background-color:'. $service_bg_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-service-'. $e_uniqid;

    if ($service_style === 'service-two') {
      $style_class = ' services-style-two';
    } elseif ($service_style === 'service-three') {
      $style_class = ' services-style-three';
    } elseif ($service_style === 'service-four') {
      $style_class = ' services-style-four';
    } elseif ($service_style === 'service-five') {
      $style_class = ' services-style-five';
    } else {
      $style_class = ' services-style-one';
    }
    // Stunning Service
    if ($stunnhing_services) {
      $s_class = ' hanor-stunning-services';
      $i_class = 'hanor-icon';
    } else {
      $s_class = '';
      $i_class = 'hanor-image';
    }

    // Drop Shadow 
    if ($services_dropshadow) {
      $shadow_class = 'service-shadow';
    } else {
      $shadow_class = '';
    }
    // Border
    if($services_border) {
      $border_class = ' have-border';
    } else {
      $border_class = ' hide-border';
    }

    //Border Radius
    if ($services_border_radius) {
      $border_radius_class = ' service-border-radius';
    } else {
      $border_radius_class = '';
    }

    // Text Align Style 
    if ($text_align_style === 'right'){
      $text_align_class = ' text-align-right';
    } elseif ($text_align_style === 'left') {
      $text_align_class = ' text-align-left';
    } else {
      $text_align_class = '';
    }

    // Service Title
    if ( function_exists( 'vc_parse_multi_attribute' ) ) {
      $parse_args = vc_parse_multi_attribute( $service_title );
      $url        = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '';
      $title      = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : '';
      $target     = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_self';
    }
    if ($url) {
      $service_title = '<h4 class="service-title"><a href="'. $url .'" target="'. $target .'">'. $title .'</a></h4>';
      $img_link_open = '<a href="'. $url .'" target="'. $target .'">';
      $img_link_close = '</a>';
    } elseif ($title) {
      $img_link_open = '';
      $img_link_close = '';
      $service_title = '<h4 class="service-title">'. $title .'</h4>';
    } else {
      $service_title = '';
      $img_link_open = '';
      $img_link_close = '';
    }

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';
    $read_more_link = $read_more_link ? '<div class="hanor-link"><a href="'. $read_more_link .'" '. $open_link .'>'. $read_more_title .'</a></div>' : '';
    $btn_text = $btn_text ? '<a href="'.$btn_link.'" '.$open_link.' class="hanor-btn hanor-white-btn"><span class="hanor-btn-text">'.$btn_text.'</span></a>' : '';
    // Service Icon
    $service_icon = $service_icon ? '<div class="hanor-icon "><span class="'. $service_icon .'"></span></div>' : '';
    $bg_image_url = wp_get_attachment_url( $service_bg_image );
    if($service_style === 'service-four') {
      if(class_exists('Aq_Resize')) {
        $bg_image_url = aq_resize( $bg_image_url, '390', '355', true );
      } else {$bg_image_url = $bg_image_url;}
    } else {
      $bg_image_url = $bg_image_url;
    }
    $bg_alt_text = get_post_meta($service_bg_image, '_wp_attachment_image_alt', true);
    $service_bg_image_main = $service_bg_image ? '<img src="'. $bg_image_url .'" alt="'.$bg_alt_text.'">' : '';
    $service_bg_image_exact = $service_image_link ? '<div class="'.$i_class.'"><a href="'. $service_image_link .'" '. $open_link .'>'. $service_bg_image_main .'</a></div>' : '<div class="'.$i_class.'">'. $service_bg_image_main .'</div>';
    $stunn_service = $service_bg_image ? $service_bg_image_exact : '';
    // Service Image
    $image_url = wp_get_attachment_url( $service_image );
    $alt_text = get_post_meta($service_image, '_wp_attachment_image_alt', true);
    $service_image_main = $service_image ? $img_link_open.'<img src="'. $image_url .'" alt="'.$alt_text.'">'.$img_link_close.'' : '';
    $service_image_exact = $service_image_link ? '<div class="hanor-icon-image '.$i_class.'"><a href="'. $service_image_link .'" '. $open_link .'>'. $service_image_main .'</a></div>' : '<div class="hanor-icon-image '.$i_class.'">'. $service_image_main .'</div>';
    $service_icon_image = $service_image ? '<div class="hanor-icon"><img src="'. $image_url .'" alt="'.$alt_text.'"/></div>' : '';

    // Image Or icon 
    if($image_icon === 'icon-tab') {
      $img_icon_exact = $service_icon;
    } else {
      $img_icon_exact = $service_image_exact;
    }

    // Style
    if($service_style === 'service-four') {
      $service_bg_image_exact = $stunn_service;
    } elseif($service_style === 'service-three') {
      $service_bg_image_exact = '';
    } elseif($service_style === 'service-two') {
      $service_bg_image_exact = '';
    } elseif($service_style === 'service-five') {
      $service_bg_image_exact = '';
    } else {
      $service_bg_image_exact = $stunn_service;
    }

    $output = '';
    $output .= '<div class="hanor-services'. $s_class . $style_class . $styled_class .' '. $class .' '.$text_align_class.' '.$shadow_class.' '.$border_radius_class.''.$border_class.'"><div class="service-item hanor-item">';
    if ($service_style === 'service-four') {
      $output .= $service_bg_image_exact .'<div class="service-info"><div class="hanor-table-wrap">
                    <div class="hanor-align-wrap">'.$img_icon_exact . $service_title . $content .'</div></div>
                </div>';
    } elseif ($service_style === 'service-three' || $service_style === 'service-two' ) {
      $output .= $service_bg_image_exact.$img_icon_exact.'<div class="service-info">'.$service_title . $content . $read_more_link .'</div>';
    } elseif ($service_style === 'service-five' ) {
      $output .= $service_bg_image_exact.$img_icon_exact.'<div class="service-info">'.$service_title . $content . $btn_text .'</div>';
    } else {
      $output .= $service_bg_image_exact.'<div class="service-info-wrap">'.$img_icon_exact.'<div class="service-info">'.$service_title . $content . $read_more_link .'</div></div>';
    }
    $output .= '</div></div>';

    return $output;
  }
}
add_shortcode( 'hanor_services', 'havnor_services_function' );
