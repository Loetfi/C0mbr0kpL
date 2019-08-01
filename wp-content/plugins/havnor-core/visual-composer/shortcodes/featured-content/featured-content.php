<?php
/* ==========================================================
  Client Carousel
=========================================================== */
if ( !function_exists('havnor_featured_content_func')) {
  function havnor_featured_content_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'featured_style' =>'',
      'open_link'  => '',
      'featured_images'  => '',
      'class'  => '',
      'select_image'  => '',
      'title_text' =>'',
      'content_text' =>'',
      'btn_text' =>'',
      'btn_link' =>'',
      // Styling
      'banner_overlay_color' => '',
      'info_bg_color' => '',
      'title_color' =>'',
      'title_size' =>'',
      'content_size'  => '',
      'content_color'  => '',
      'title_link_hover_color' =>'',
      'section_bg_color' =>'',
      'title_text_size' =>'',
      'title_line_height' => '',
      'title_text_color' =>'',
      'desc_text_size' =>'',
      'desc_line_height' => '',
      'desc_text_color' =>'',
      'btn_text_size'  => '',
      'border_radius' => '',
      'btn_text_color'  => '',
      'btn_text_hover_color'  => '',
      'bg_color' => '',
      'btn_bg_color'  => '',
      'btn_bg_hover_color'  => '',
      'btn_border_color'  => '',
      'btn_border_hover_color'  => '',
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

    if ($featured_style === 'featured-two') {
      $featured_style_class = 'featured-style-two';
    } else {
      $featured_style_class = 'featured-style-one';
    }

    if ($featured_style === 'featured-two') {
      $featured_column_class = 'work-item';
    } else {
      $featured_column_class = 'col-lg-4 col-md-4 col-sm-6';
    }

    // Info Bg Color
    if($info_bg_color) {
      $inline_style .= '.hanor-featured-content-'. $e_uniqid .' .featured-item .featured-content-wrap {';
      $inline_style .= ( $info_bg_color ) ? 'background-color:'. $info_bg_color .';' : '';
      $inline_style .= '}';
    }
    // Title Text Color
     if ( $title_color || $title_size ) {
      $inline_style .= '.hanor-featured-content-'. $e_uniqid .' .featured-item .featured-title, .hanor-featured-content-'. $e_uniqid .' .featured-item .featured-title a  {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size ) {
      $inline_style .= '.hanor-featured-content-'. $e_uniqid .'.featured-style-two .feature-carousel-space .feature-content {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    /* Overlay Color */
    if($banner_overlay_color) {
      $inline_style .= '.hanor-featured-content-'. $e_uniqid .'.featured-style-two .featured-contnt-overlay {';
      $inline_style .= ( $banner_overlay_color ) ? 'background-color:'. $banner_overlay_color .';' : '';
      $inline_style .= '}';
    }
    // Title Hover Color
    if ( $title_link_hover_color  ) {
      $inline_style .= '.hanor-featured-content-'. $e_uniqid .' .featured-item .featured-title:hover a {';
      $inline_style .= ( $title_link_hover_color ) ? 'color:'. $title_link_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Section Background Color
    if ( $section_bg_color  ) {
      $inline_style .= '.hanor-featured-content-'. $e_uniqid .'.hanor-feature.featured-style-two {';
      $inline_style .= ( $section_bg_color ) ? 'background-color:'. $section_bg_color .';' : '';
      $inline_style .= '}';
    }
    // Left Text Color
    if ( $title_text_color || $title_text_size || $title_line_height) {
      $inline_style .= '.hanor-featured-content-'. $e_uniqid .'.featured-style-two .feature-content-area h2  {';
      $inline_style .= ( $title_text_color ) ? 'color:'. $title_text_color .';' : '';
      $inline_style .= ( $title_text_size ) ? 'font-size:'. havnor_core_check_px($title_text_size) .';' : '';
      $inline_style .= ( $title_line_height ) ? 'line-height:'. havnor_core_check_px($title_line_height) .';' : '';
      $inline_style .= '}';
    }
    if ( $desc_text_color || $desc_text_size || $desc_line_height) {
      $inline_style .= '.hanor-featured-content-'. $e_uniqid .'.featured-style-two .feature-content-area p {';
      $inline_style .= ( $desc_text_color ) ? 'color:'. $desc_text_color .';' : '';
      $inline_style .= ( $desc_text_size ) ? 'font-size:'. havnor_core_check_px($desc_text_size) .';' : '';
      $inline_style .= ( $desc_line_height ) ? 'line-height:'. havnor_core_check_px($desc_line_height) .';' : '';
      $inline_style .= '}';
    }
    // Btn Color
    if ( $btn_text_color || $btn_text_size || $btn_bg_color || $btn_border_color || $border_radius) {
      $inline_style .= '.hanor-featured-content-'. $e_uniqid .'.featured-style-two .hanor-btn {';
      $inline_style .= ( $btn_text_color ) ? 'color:'. $btn_text_color .';' : '';
      $inline_style .= ( $btn_bg_color ) ? 'background:'. $btn_bg_color .';' : '';
      $inline_style .= ( $btn_border_color ) ? 'border-color:'. $btn_border_color .';' : '';
      $inline_style .= ( $btn_text_size ) ? 'font-size:'. havnor_core_check_px($btn_text_size) .';' : '';
      $inline_style .= ( $border_radius ) ? 'border-radius:'. havnor_core_check_px($border_radius) .';' : '';
      $inline_style .= '}';
    }
    // Btn Hover Color
    if ( $btn_text_hover_color || $btn_bg_hover_color || $btn_border_hover_color ) {
      $inline_style .= '.hanor-featured-content-'. $e_uniqid .' .hanor-btn:hover {';
      $inline_style .= ( $btn_text_hover_color ) ? 'color:'. $btn_text_hover_color .';' : '';
      $inline_style .= ( $btn_bg_hover_color ) ? 'background:'. $btn_bg_hover_color .';' : '';
      $inline_style .= ( $btn_border_hover_color ) ? 'border-color:'. $btn_border_hover_color .';' : '';
      $inline_style .= '}';
    }

    // Group Field
    $featured_images = (array) vc_param_group_parse_atts( $featured_images );
    $get_featured_images = array();
    foreach ( $featured_images as $featured_image ) {
      $each_image = $featured_image;
      $each_image['featured_image'] = isset( $featured_image['featured_image'] ) ? $featured_image['featured_image'] : '';
      $each_image['title_feature'] = isset( $featured_image['title_feature'] ) ? $featured_image['title_feature'] : '';
      $each_image['title_link'] = isset( $featured_image['title_link'] ) ? $featured_image['title_link'] : '';
      $each_image['feature_content'] = isset( $featured_image['feature_content'] ) ? $featured_image['feature_content'] : '';
      $get_featured_images[] = $each_image;
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
    $btn_text = $btn_text ? '<a href="'.$btn_link.'" '. $open_link .' class="hanor-btn">'.$btn_text.'</a>' : '';

    // add inline style
    havnor_add_inline_style( $inline_style );
    $styled_class  = ' hanor-featured-content-'. $e_uniqid;

    $output = '<div class="hanor-feature '.$featured_style_class. $styled_class.'">
                <div class="featured-wrap"><div class="row">';
                if ($featured_style === 'featured-two') {
                  $output .= '<div class="col-lg-4 ">
                    <div class="feature-info honor-parallax" style="background-image: url('. $banner_bg .');">
                    <div class="featured-contnt-overlay">
                      <div class="hanor-table-wrap">
                        <div class="hanor-align-wrap">
                          <div class="feature-content-area">
                            <h2 class="fetaure-title">'.$title_text.'</h2>
                            <p>'.$content_text.'</p>
                            '.$btn_text.'
                          </div>
                        </div>
                      </div>
                    </div></div></div>';
                  $output .= '<div class="col-lg-8 "> <div class="feature-carousel-space"><div class="owl-carousel"
                    '. $carousel_loop . $carousel_items . $carousel_margin . $carousel_dots .$carousel_nav . $carousel_autoplay_timeout . $carousel_autoplay . $carousel_animate_out . $carousel_mousedrag . $carousel_autowidth . $carousel_autoheight . $carousel_tablet . $carousel_mobile . $carousel_small_mobile . $switch_rtl .'>';
                }

            // Group Param Output
            foreach ( $get_featured_images as $each_image ) {
              $link_open = $each_image['title_link'] ? '<a href="'. $each_image['title_link'].'" '. $open_link .'>' : '';
              $link_close = $each_image['title_link'] ? '</a>' : '';

              $output .= '<div class="'.$featured_column_class.'">'.$link_open.'<div class="featured-item"><div class="hanor-image">';
              $image_url = wp_get_attachment_url( $each_image['featured_image'] );
              if(class_exists('Aq_Resize')) {
                $actual_img = aq_resize( $image_url, '430', '330', true );
              } else {$actual_img = $image_url;}
              $featured_img = ( $actual_img ) ? $actual_img : HAVNOR_PLUGIN_IMGS . '/430x330.png';

              $alt_text = get_post_meta($each_image['featured_image'], '_wp_attachment_image_alt', true);

              $title_link = $each_image['title_link'] ? '<div class="featured-title">'.$each_image['title_feature'].'</div>' : '<div class="featured-title">'.$each_image['title_feature'].'</div>';
              $feature_content = $each_image['feature_content'] ? '<div class="feature-content">'.$each_image['feature_content'].'</div>' : '';

              $output .= '<img src="'. $featured_img .'" alt="'.$alt_text.'"></div><div class="featured-content-wrap">'.$title_link .$feature_content.'</div>';
              $output .= '</div>'.$link_close.'</div>';
            }

     if ($featured_style === 'featured-two') {
      $output .='</div></div></div>';
     }
    $output .= '</div></div></div>';
    return $output;
  }
}
add_shortcode( 'hanor_featured_content', 'havnor_featured_content_func' );
