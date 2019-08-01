<?php
/* ==========================================================
  Client Carousel
=========================================================== */
if ( !function_exists('havnor_client_func')) {
  function havnor_client_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'client_style' =>'',
      'client_title'  => '',
      'open_link'  => '',
      'retina_img' => '',
      'client_logos'  => '',
      'class'  => '',
      // Carousel
      'carousel_loop'  => '',
      'carousel_items'  => '',
      'carousel_margin'  => '',
      'carousel_dots'  => '',
      'carousel_autoplay_timeout'  => '',
      'carousel_autoplay'  => '',
      'carousel_animate_out'  => '',
      'carousel_mousedrag'  => '',
      'carousel_autowidth'  => '',
      'carousel_autoheight'  => '',
      'carousel_tablet'  => '',
      'carousel_mobile'  => '',
      'carousel_small_mobile'  => '',
    ), $atts));

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';

    if ($client_style === 'client-two') {
      $client_style_class = 'client-style-two';
    } elseif ($client_style === 'client-three') {
      $client_style_class = 'client-style-three';
    } else {
      $client_style_class = 'client-style-one';
    }

    // Group Field
    $client_logos = (array) vc_param_group_parse_atts( $client_logos );
    $get_client_logos = array();
    foreach ( $client_logos as $client_logo ) {
      $each_logo = $client_logo;
      $each_logo['client_logo'] = isset( $client_logo['client_logo'] ) ? $client_logo['client_logo'] : '';
      $each_logo['client_link'] = isset( $client_logo['client_link'] ) ? $client_logo['client_link'] : '';
      $get_client_logos[] = $each_logo;
    }

    // Carousel Data's
    $carousel_loop = $carousel_loop === 'true' ? ' data-loop="true"' : ' data-loop="false"';
    $carousel_items = $carousel_items ? ' data-items="'. $carousel_items .'"' : ' data-items="5"';
    $carousel_margin = $carousel_margin ? ' data-margin="'. $carousel_margin .'"' : ' data-margin="0"';
    $carousel_dots = $carousel_dots ? ' data-dots="'. $carousel_dots .'"' : ' data-dots="false"';
    $carousel_autoplay_timeout = $carousel_autoplay_timeout ? ' data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
    $carousel_autoplay = $carousel_autoplay ? ' data-autoplay="'. $carousel_autoplay .'"' : '';
    $carousel_animate_out = $carousel_animate_out ? ' data-animateout="'. $carousel_animate_out .'"' : '';
    $carousel_mousedrag = $carousel_mousedrag === 'true' ? ' data-mouse-drag="true"' : ' data-mouse-drag="false"';
    $carousel_autowidth = $carousel_autowidth ? ' data-auto-width="'. $carousel_autowidth .'"' : '';
    $carousel_autoheight = $carousel_autoheight ? ' data-auto-height="'. $carousel_autoheight .'"' : '';
    $carousel_tablet = $carousel_tablet ? ' data-items-tablet="'. $carousel_tablet .'"' : ' data-items-tablet="3"';
    $carousel_mobile = $carousel_mobile ? ' data-items-mobile-landscape="'. $carousel_mobile .'"' : ' data-items-mobile-landscape="2"';
    $carousel_small_mobile = $carousel_small_mobile ? ' data-items-mobile-portrait="'. $carousel_small_mobile .'"' : ' data-items-mobile-portrait="1"';
    $client_title = $client_title ? '<div class="lysn-small-title"><h4>'.$client_title.'</h4></div>' : '';
    // RTL
    if ( is_rtl() ) {
      $switch_rtl = ' data-rtl="true"';
    } else {
      $switch_rtl = ' data-rtl="false"';
    }

    $output = '<div class="hanor-clients '. $class .' '.$client_style_class.'">
                <div class="clients-wrap">
                  '.$client_title.'
                  <div class="owl-carousel"
                    '. $carousel_loop . $carousel_items . $carousel_margin . $carousel_dots . $carousel_autoplay_timeout . $carousel_autoplay . $carousel_animate_out . $carousel_mousedrag . $carousel_autowidth . $carousel_autoheight . $carousel_tablet . $carousel_mobile . $carousel_small_mobile . $switch_rtl.'>';
                      // Group Param Output
                      foreach ( $get_client_logos as $each_logo ) {
                        $output .= '<div class="item"><div class="client-item"><div class="hanor-image">';
                          $image_url = wp_get_attachment_url( $each_logo['client_logo'] );
                          $alt_text = get_post_meta($each_logo['client_logo'], '_wp_attachment_image_alt', true);
                          if($image_url){
                            list($width, $height, $type, $attr) = getimagesize($image_url);
                          } else {
                            $width = '';
                            $height = '';
                          }
                          if($retina_img) {
                            $logo_width = $width/2;
                            $logo_height = $height/2;
                          } else {
                            $logo_width = '';
                            $logo_height = '';
                          }
                          if ($each_logo['client_link']) {
                            $output .= '<a href="'. $each_logo['client_link'] .'" '. $open_link .'><img src="'. $image_url .'" alt="'.$alt_text.'" style="width: '.havnor_core_check_px($logo_width).'; height: '.havnor_core_check_px($logo_height).'"></a>';
                          } else {
                            $output .= '<img src="'. $image_url .'" alt="'.$alt_text.'" style="width: '.havnor_core_check_px($logo_width).'; height: '.havnor_core_check_px($logo_height).'">';
                          }
                        $output .= '</div></div></div>';
                      }
    $output .= '</div></div></div>';
    return $output;
  }
}
add_shortcode( 'hanor_client_carousel', 'havnor_client_func' );
