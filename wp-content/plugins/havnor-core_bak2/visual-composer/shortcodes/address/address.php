<?php
/* ==========================================================
  Address
=========================================================== */
if ( !function_exists('havnor_address_function')) {
  function havnor_address_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'address_icon_style'  => '',
      'address_icon_image'  => '',
      'address_icon'  => '',
      'address_title'  => '',
      'address_content'  => '',
      'list_items'  => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_size'  => '',
      'title_weight' => '',
      'content_color'  => '',
      'content_size'  => '',
      'link_hover_color'  => '',
      'icon_color'  => '',
      'icon_size'  => '',
      // Spacing
      'section_top_space' =>'',
      'section_bottom_space' =>'',
      
    ), $atts));

    // Group Field One
    $list_items = (array) vc_param_group_parse_atts( $list_items );
    $get_each_list = array();
    foreach ( $list_items as $list_item ) {
      $each_list = $list_item;
      $each_list['list_text'] = isset( $list_item['list_text'] ) ? $list_item['list_text'] : '';
      $each_list['text_link'] = isset( $list_item['text_link'] ) ? $list_item['text_link'] : '';
      $each_list['open_link'] = isset( $list_item['open_link'] ) ? $list_item['open_link'] : '';
      $get_each_list[] = $each_list;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';
    
    if ( $title_size || $title_color || $title_weight) {
      $inline_style .= '.hanor-address-'. $e_uniqid .'.contact-info-item .contact-info-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size ) {
      $inline_style .= '.hanor-address-'. $e_uniqid .'.contact-info-item p, .hanor-address-'. $e_uniqid .'.contact-info-item a {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $link_hover_color ) {
      $inline_style .= '.hanor-address-'. $e_uniqid .'.contact-info-item a:hover {';
      $inline_style .= ( $link_hover_color ) ? 'color:'. $link_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_color || $icon_size ) {
      $inline_style .= '.hanor-address-'. $e_uniqid .'.contact-info-item .hanor-icon [class*="pe-7s-"], .hanor-address-'. $e_uniqid .'.contact-info-item .hanor-icon span {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }

    // Spacings
    if ( $section_top_space ) {
      $inline_style .= '.hanor-address-'. $e_uniqid .'.contact-info-item  {';
      $inline_style .= ( $section_top_space ) ? 'padding-top:'. havnor_core_check_px($section_top_space) .';' : '';
      $inline_style .= '}';
    }
    if ( $section_bottom_space ) {
      $inline_style .= '.hanor-address-'. $e_uniqid .'.contact-info-item  {';
      $inline_style .= ( $section_bottom_space ) ? 'padding-bottom:'. havnor_core_check_px($section_bottom_space) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-address-'. $e_uniqid;

    // Address Icon
    $add_icon = $address_icon ? '<div class="hanor-icon"><span class="'. $address_icon .'"></span></div>' : '';
    $icon_image_url = wp_get_attachment_url( $address_icon_image );
    $alt_text = get_post_meta($address_icon_image, '_wp_attachment_image_alt', true);
    $add_image = $address_icon_image ? '<div class="hanor-icon"><img src="'. $icon_image_url .'" alt="'.$alt_text.'"/></div>' : '';
    $address_title = $address_title ? '<h4 class="contact-info-title">'. $address_title .'</h4>' : '';

    $output = '<div class="contact-info-item hanor-item'.$styled_class.' '.$class.'">
                '.$add_icon.$add_image.'
                <div class="contact-info">
                  '.$address_title.'
                  <p>'. $address_content;
                    foreach ( $get_each_list as $list_item ) {
                      $open_link = $list_item['open_link'] ? ' target="_blank"' : '';
                      if ($list_item['list_text']) {
                      $output .= '<a href="'. $list_item['text_link'] .'"'.$open_link.'>'. $list_item['list_text'] .'</a>';
                      }
                    }
      $output .= '</p>
                </div>
              </div>';

    return $output;
  }
}
add_shortcode( 'havnor_address', 'havnor_address_function' );
