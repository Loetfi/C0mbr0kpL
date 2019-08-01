<?php
/* ==========================================================
  Professionals
=========================================================== */
if ( !function_exists('havnor_professionals_function')) {
  function havnor_professionals_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'professionals_image'  => '',
      'professionals_title'  => '',
      'professionals_content'  => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_size'  => '',
      'content_color'  => '',
      'content_size'  => '',
      
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';
    
    if ( $title_size || $title_color ) {
      $inline_style .= '.hanor-professionals-'. $e_uniqid .' .professional-info h4.professional-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size ) {
      $inline_style .= '.hanor-professionals-'. $e_uniqid .' .professional-info p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-professionals-'. $e_uniqid;

    $image_url = wp_get_attachment_url( $professionals_image );
    $alt_text = get_post_meta($professionals_image, '_wp_attachment_image_alt', true);
    if(class_exists('Aq_Resize')) {
      $professional_img = aq_resize( $image_url, '207', '207', true );
    } else {$professional_img = $image_url;}

    $output = '<div class="professional-item hanor-item'. $styled_class .' '. $class .'">
                <div class="hanor-image"><img src="'.$professional_img.'" alt="'.$alt_text.'"></div>
                <div class="professional-info">
                  <h4 class="professional-title">'.$professionals_title.'</h4>
                  <p>'.$professionals_content.'</p>
                </div>
              </div>';
    return $output;
  }
}
add_shortcode( 'havnor_professionals', 'havnor_professionals_function' );
