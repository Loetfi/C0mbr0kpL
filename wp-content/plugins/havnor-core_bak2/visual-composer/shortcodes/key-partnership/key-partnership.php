<?php
/* ==========================================================
  Client Carousel
=========================================================== */
if ( !function_exists('havnor_key_partnership_func')) {
  function havnor_key_partnership_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'partnership_style' =>'',
      'open_link'  => '',
      'retina_img' => '',
      'partnership_images'  => '',
      'class'  => '',
      'select_image'  => '',
      // Styling
      'item_bg_color' => '',
      'item_border_color' => '',
      'content_color'  => '',
      'content_size'  => '',
      'readmore_color' =>'',
      'readmore_size' =>'',
      'readmore_hover_color' =>'',
      // Carousel
      'carousel_loop'  => '',
      'carousel_items'  => '',
      'carousel_margin'  => '',
      'carousel_dots'  => '',
      'carousel_nav'  => '',
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

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    if ($partnership_style === 'partnership-two') {
      $partnership_style_class = 'partnership-style-two';
    } else {
      $partnership_style_class = 'partnership-style-one';
    }

    if ($partnership_style === 'partnership-two') {
      $partnership_column_class = 'work-item';
    } else {
      $partnership_column_class = 'col-lg-6';
    }

    // Bg Color
    if($item_bg_color || $item_border_color){
      $inline_style .= '.hanor-partnership-content-'. $e_uniqid .' .partnership-item {';
      $inline_style .= ( $item_bg_color ) ? 'background:'. $item_bg_color .';' : '';
      $inline_style .= ( $item_border_color ) ? 'border-color:'. $item_border_color .';' : '';
      $inline_style .= '}';
    }
    // Title Text Color
    if ( $content_color || $content_size ) {
      $inline_style .= '.hanor-partnership-content-'. $e_uniqid .' .partnership-content p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $readmore_color || $readmore_size ) {
      $inline_style .= '.hanor-partnership-content-'. $e_uniqid .' .patnership-content-section .readmore-title a  {';
      $inline_style .= ( $readmore_color ) ? 'color:'. $readmore_color .';' : '';
      $inline_style .= ( $readmore_size ) ? 'font-size:'. havnor_core_check_px($readmore_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $readmore_hover_color  ) {
      $inline_style .= '.hanor-partnership-content-'. $e_uniqid .' .patnership-content-section .readmore-title:hover a {';
      $inline_style .= ( $readmore_hover_color ) ? 'color:'. $readmore_hover_color .';' : '';
      $inline_style .= '}';
    }

    // Group Field
    $partnership_images = (array) vc_param_group_parse_atts( $partnership_images );
    $get_partnership_images = array();
    foreach ( $partnership_images as $partnership_image ) {
      $each_image = $partnership_image;
      $each_image['partnership_image'] = isset( $partnership_image['partnership_image'] ) ? $partnership_image['partnership_image'] : '';
      $each_image['readmore_title'] = isset( $partnership_image['readmore_title'] ) ? $partnership_image['readmore_title'] : '';
      $each_image['readmore_link'] = isset( $partnership_image['readmore_link'] ) ? $partnership_image['readmore_link'] : '';
      $each_image['partnership_content'] = isset( $partnership_image['partnership_content'] ) ? $partnership_image['partnership_content'] : '';
      $get_partnership_images[] = $each_image;
    }

    // Carousel Data's
    $carousel_loop = $carousel_loop === 'true' ? ' data-loop="true"' : ' data-loop="false"';
    $carousel_items = $carousel_items ? ' data-items="'. $carousel_items .'"' : ' data-items="3"';
    $carousel_margin = $carousel_margin ? ' data-margin="'. $carousel_margin .'"' : ' data-margin="30"';
    $carousel_dots = $carousel_dots ? ' data-dots="'. $carousel_dots .'"' : ' data-dots="false"';
    $carousel_nav = $carousel_nav ? ' data-nav="'. $carousel_nav .'"' : ' data-dots="false"';
    $carousel_autoplay_timeout = $carousel_autoplay_timeout ? ' data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
    $carousel_autoplay = $carousel_autoplay ? ' data-autoplay="'. $carousel_autoplay .'"' : '';
    $carousel_animate_out = $carousel_animate_out ? ' data-animateout="'. $carousel_animate_out .'"' : '';
    $carousel_mousedrag = $carousel_mousedrag === 'true' ? ' data-mouse-drag="true"' : ' data-mouse-drag="false"';
    $carousel_autowidth = $carousel_autowidth ? ' data-auto-width="'. $carousel_autowidth .'"' : '';
    $carousel_autoheight = $carousel_autoheight ? ' data-auto-height="'. $carousel_autoheight .'"' : '';
    $carousel_tablet = $carousel_tablet ? ' data-items-tablet="'. $carousel_tablet .'"' : ' data-items-tablet="3"';
    $carousel_mobile = $carousel_mobile ? ' data-items-mobile-landscape="'. $carousel_mobile .'"' : ' data-items-mobile-landscape="2"';
    $carousel_small_mobile = $carousel_small_mobile ? ' data-items-mobile-portrait="'. $carousel_small_mobile .'"' : ' data-items-mobile-portrait="1"';

    // RTL
    if ( is_rtl() ) {
      $switch_rtl = ' data-rtl="true"';
    } else {
      $switch_rtl = ' data-rtl="false"';
    }
    
    // Image
    $banner_bg = wp_get_attachment_url( $select_image );

     // add inline style
    havnor_add_inline_style( $inline_style );
    $styled_class  = ' hanor-partnership-content-'. $e_uniqid;

    $output = '<section class="hanor-partnership '.$partnership_style_class. $styled_class.'">
                <div class="partnership-wrap"><div class="row">';

                if ($partnership_style === 'partnership-two') {
                  $output .= '';
                  $output .= '<div class="col-lg-12 "> <div class="partnership-carousel-space"><div class="owl-carousel"
                    '. $carousel_loop . $carousel_items . $carousel_margin . $carousel_dots .$carousel_nav . $carousel_autoplay_timeout . $carousel_autoplay . $carousel_animate_out . $carousel_mousedrag . $carousel_autowidth . $carousel_autoheight . $carousel_tablet . $carousel_mobile . $carousel_small_mobile . $switch_rtl .'>';
                }

            // Group Param Output
            foreach ( $get_partnership_images as $each_image ) {
              $output .= '<div class="'.$partnership_column_class.'"><div class="partnership-item hanor-item"><div class="hanor-image">';
              $image_url = wp_get_attachment_url( $each_image['partnership_image'] );
              $alt_text = get_post_meta($each_image['partnership_image'], '_wp_attachment_image_alt', true);
              if($image_url) {
                list($width, $height, $type, $attr) = getimagesize($image_url);
              } else {
                $width = '';
                $height = '';
              }
              if($retina_img) {
                $image_width = $width/2;
                $image_height = $height/2;
              } else {
                $image_width = '';
                $image_height = '';
              }
              $readmore_link = $each_image['readmore_link'] ? '<div class="readmore-title"><a href="'. $each_image['readmore_link'].'" '. $open_link .'>'.$each_image['readmore_title'].'</a></div>' : '<div class="readmore-title">'.$each_image['readmore_title'].'</div>';
               $partnership_content = $each_image['partnership_content'] ? '<div class="partnership-content"><p>'.$each_image['partnership_content'].'</p></div>' : '';

              $image_link_open = $each_image['readmore_link'] ? '<a href="'. $each_image['readmore_link'].'" '. $open_link .'>' : '';
              $image_link_close = $each_image['readmore_link'] ? '</a>' : '';

              $output .= $image_link_open.'<img src="'. $image_url .'" alt="'.$alt_text.'" style="width: '.havnor_core_check_px($image_width).'; height: '.havnor_core_check_px($image_height).'">'.$image_link_close.'</div><div class="patnership-content-section">'.$partnership_content.$readmore_link .'</div>';
              $output .= '</div></div>';
            }
     if ($partnership_style === 'partnership-two') {  
      $output .='</div></div></div>';
     }
    $output .= '</div></div></section>';
    return $output;
  }
}
add_shortcode( 'hanor_key_partnership', 'havnor_key_partnership_func' );
