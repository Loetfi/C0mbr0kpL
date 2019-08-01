<?php
/* ==========================================================
  Simple List Shortcode
=========================================================== */
if ( !function_exists('havnor_simple_list_func')) {
  function havnor_simple_list_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'simple_list_style' =>'',
      'tick_image' => '',
      'open_link'  => '',
      'simple_list_images'  => '',
      'class'  => '',
      'select_image'  => '',
      'title_text' =>'',
      'content_text' =>'',
      // Styling
      'title_color' =>'',
      'title_size' =>'',
      'subtitle_color' =>'',
      'subtitle_size' =>'',
      'subtitle_hover_color' =>'',
      'content_color'  => '',
      'content_size'  => '',
      'bullet_color' =>'',
      'list_top' =>'',
      'list_btm' =>'',
      'list_left'=>'',
     
    ), $atts));

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';
    $image_url = wp_get_attachment_url( $tick_image );

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    if ($simple_list_style === 'style-two') {
      $simple_list_style_class = 'simple-list-style-two';
    } else {
      $simple_list_style_class = '';
    }

    // Title Text Color
    if ( $title_color || $title_size ) {
      $inline_style .= '.hanor-simple-list-'. $e_uniqid .'.hanor-simple-list .list-tile {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $subtitle_color || $subtitle_size ) {
      $inline_style .= '.hanor-simple-list-'. $e_uniqid .'.hanor-simple-list .sub-title, .hanor-simple-list-'. $e_uniqid.'.hanor-simple-list .sub-title a {';
      $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .';' : '';
      $inline_style .= ( $subtitle_size ) ? 'font-size:'. havnor_core_check_px($subtitle_size) .';' : '';
      $inline_style .= '}';
    }
     if ( $subtitle_hover_color ) {
      $inline_style .= '.hanor-simple-list-'. $e_uniqid .'.hanor-simple-list .sub-title a:hover {';
      $inline_style .= ( $subtitle_hover_color ) ? 'color:'. $subtitle_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size ) {
      $inline_style .= '.hanor-simple-list-'. $e_uniqid .'.hanor-simple-list p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    // List bullet color
    if ( $bullet_color  ) {
      $inline_style .= '.hanor-simple-list-'. $e_uniqid .'.hanor-simple-list.simple-list-style-two .simple-list-content:before {';
      $inline_style .= ( $bullet_color ) ? 'background-color:'. $bullet_color .';' : '';
      $inline_style .= '}';
    }
    // Spacings
    if ( $list_top || $list_btm || $list_left ) {
      $inline_style .= '.hanor-simple-list-'. $e_uniqid .'.hanor-simple-list .simple-list-content {';
      $inline_style .= ( $list_top ) ? 'padding-top:'. havnor_core_check_px($list_top) .';' : '';
      $inline_style .= ( $list_btm ) ? 'padding-bottom:'. havnor_core_check_px($list_btm) .';' : '';
      $inline_style .= ( $list_left ) ? 'padding-left:'. havnor_core_check_px($list_left) .';' : '';
      $inline_style .= '}';
    }
    if($image_url) {
      $inline_style .= '.hanor-simple-list-'. $e_uniqid .' .simple-list-content:before {';
      $inline_style .= ( $image_url ) ? 'background-image:url('.$image_url.');' : '';
      $inline_style .= '}';
    }

    // Group Field
    $simple_list_images = (array) vc_param_group_parse_atts( $simple_list_images );
    $get_simple_list_images = array();
    foreach ( $simple_list_images as $simple_list_image ) {
      $each_image = $simple_list_image;
      $each_image['list_title'] = isset( $simple_list_image['list_title'] ) ? $simple_list_image['list_title'] : '';
      $each_image['list_subtitle'] = isset( $simple_list_image['list_subtitle'] ) ? $simple_list_image['list_subtitle'] : '';
      $each_image['list_subtitle_link'] = isset( $simple_list_image['list_subtitle_link'] ) ? $simple_list_image['list_subtitle_link'] : '';
      $each_image['list_content'] = isset( $simple_list_image['list_content'] ) ? $simple_list_image['list_content'] : '';
      $get_simple_list_images[] = $each_image;
    }

    // add inline style
    havnor_add_inline_style( $inline_style );
    $styled_class  = ' hanor-simple-list-'. $e_uniqid;

    $output = '<section class="hanor-simple-list '.$simple_list_style_class. $styled_class.'">
                <div class="simple-list-wrap">';
            // Group Param Output
            foreach ( $get_simple_list_images as $each_image ) {
              $output .= '<div class="item">';
              $list_subtitle_link = $each_image['list_subtitle_link'] ? '<div class="sub-title"><a href="'. $each_image['list_subtitle_link'].'" '. $open_link .'>'.$each_image['list_subtitle'].'</a></div>' : '<div class="sub-title">'.$each_image['list_subtitle'].'</div>';
              $sub_title_text = $each_image['list_subtitle'] ? $list_subtitle_link : '';
              $list_title = $each_image['list_title'] ? '<span class="list-tile">'.$each_image['list_title'].'</span>' : '';
              
              if ($simple_list_style === 'style-two') {
                $output .= '<div class="simple-list-content"><div class="list-main-item"><div class="simple-list"><p>'.$list_title.$each_image['list_content'].'</p></div></div></div>';
              } else {
              $output .= '<div class="simple-list-content"><div class="list-main-item"><div class="list-tile">'.$list_title.'</div>'.$sub_title_text .'<div class="simple-list"><p>'.$each_image['list_content'].'</p></div></div></div>';
              }
              $output .= '</div>';
            }

    $output .= '</div></section>';
    return $output;
  }
}
add_shortcode( 'hanor_simple_list', 'havnor_simple_list_func' );
