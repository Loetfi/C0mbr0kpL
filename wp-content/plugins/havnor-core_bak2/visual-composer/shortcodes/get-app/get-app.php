<?php
/* ==========================================================
  Get App
=========================================================== */
if ( !function_exists('havnor_app_function')) {
  function havnor_app_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'app_title'  => '',
      'app_content'  => '',
      'app_stars'  => '',
      'app_images'  => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_size'  => '',
      'content_color'  => '',
      'content_size'  => '',
      // Star
      'star_color' =>'',
      'star_active_color' =>'',
    ), $atts));

    // Group Field
    $app_images = (array) vc_param_group_parse_atts( $app_images );
    $get_app_images = array();
    foreach ( $app_images as $client_logo ) {
      $each_logo = $client_logo;
      $each_logo['app_logo'] = isset( $client_logo['app_logo'] ) ? $client_logo['app_logo'] : '';
      $each_logo['app_link'] = isset( $client_logo['app_link'] ) ? $client_logo['app_link'] : '';
      $each_logo['open_link'] = isset( $client_logo['open_link'] ) ? $client_logo['open_link'] : '';
      $get_app_images[] = $each_logo;
    }
    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';
    
    if ( $title_size || $title_color ) {
      $inline_style .= '.hanor-app-'. $e_uniqid .' .hanor-section-title h2.section-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size ) {
      $inline_style .= '.hanor-app-'. $e_uniqid .' .hanor-section-title p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    // Start Color
     if ( $star_color  ) {
      $inline_style .= '.hanor-app-'. $e_uniqid .' .hanor-rating  {';
      $inline_style .= ( $star_color ) ? 'color:'. $star_color .';' : '';
      $inline_style .= '}';
    }
    if ( $star_active_color  ) {
      $inline_style .= '.hanor-app-'. $e_uniqid .' .hanor-rating .active {';
      $inline_style .= ( $star_active_color ) ? 'color:'. $star_active_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-app-'. $e_uniqid;

    $output = '<div class="hanor-get-app'. $styled_class .' '. $class .'">
                <div class="hanor-container">
                  <div class="hanor-section-title">
                    <h2 class="section-title">'.$app_title.'</h2>
                    <p>'.$app_content.'</p>
                  </div>
                  <div class="hanor-rating">';
                    for( $i=1; $i<= $app_stars; $i++) {
                      $output .= '<i class="fa fa-star active" aria-hidden="true"></i>';
                    } 
                    for( $i=5; $i > $app_stars; $i--) {
                      $output .= '<i class="fa fa-star" aria-hidden="true"></i>';
                    }
      $output .= '</div>
                  <div class="hanor-btns-group">';
                  foreach ( $get_app_images as $each_logo ) {
                    $image_url = wp_get_attachment_url( $each_logo['app_logo'] );
                    $alt_text = get_post_meta($each_logo['app_logo'], '_wp_attachment_image_alt', true);
                    $each_logo['open_link'] = $each_logo['open_link'] ? ' target="_blabk"' : '';
                    if ($each_logo['app_link']) {
                      $output .= '<a href="'. $each_logo['app_link'] .'" '.$each_logo['open_link'].'><img src="'. $image_url .'" alt="'.$alt_text.'"></a>';
                    } else {
                      $output .= '<img src="'. $image_url .'" alt="'.$alt_text.'">';
                    }
                  }
      $output .= '</div>
                </div>
              </div>';

    return $output;
  }
}
add_shortcode( 'havnor_app', 'havnor_app_function' );
