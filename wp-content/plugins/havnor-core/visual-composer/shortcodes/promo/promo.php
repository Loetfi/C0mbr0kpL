<?php
/* ==========================================================
  Promo
=========================================================== */
if ( !function_exists('havnor_promo_function')) {
  function havnor_promo_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'promo_style'  => '',
      'toggle_align'  => '',
      'promo_image'  => '',
      'promo_icon_image' =>'',
      'promo_title'  => '',
      'promo_button_text'  => '',
      'promo_button_link'  => '',
      'video_link'  => '',
      'promo_icon'  => '',
      'promo_video_link'  => '',
      'open_link' => '',
      'class'  => '',
      // Style
      'left_margin' => '',
      'title_color'  => '',
      'title_size'  => '',
      'title_weight' => '',
      'title_line_height' => '',
      'title_btm_space' => '',
      'content_color'  => '',
      'content_size'  => '',
      'content_line_height' => '',
      'content_bg_color' =>'',
      'content_icon_size'=>'',
      'icon_btm_space' => '',
      'content_icon_color' =>'',
      // button Styling
      'text_color'  => '',
      'bgg_color'  => '',
      'img_overlay_color' => '',
      'border_color'  => '',
      'text_hover_color'  => '', 
      'bg_hover_color'  => '',
      'border_radius' => '',
      'border_hover_color'  => '',
      'text_size'  => '',
      
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);
    $open_link = $open_link ? ' target="_blank"' : '';

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Image Margin
    if ( $left_margin ) {
      $inline_style .= '.hanor-promo-'. $e_uniqid .' .promo-item .hanor-image img {';
      $inline_style .= ( $left_margin ) ? 'margin-left:'. havnor_core_check_px($left_margin) .';' : '';
      $inline_style .= '}';
    }
    if ( $title_size || $title_color || $title_weight || $title_line_height || $title_btm_space) {
      $inline_style .= '.hanor-promo-'. $e_uniqid .' .promo-info h2 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_line_height ) ? 'line-height:'. havnor_core_check_px($title_line_height) .';' : '';
      $inline_style .= ( $title_btm_space ) ? 'padding-bottom:'. havnor_core_check_px($title_btm_space) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size || $content_line_height) {
      $inline_style .= '.hanor-promo-'. $e_uniqid .' .promo-info p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= ( $content_line_height ) ? 'line-height:'. havnor_core_check_px($content_line_height) .';' : '';
      $inline_style .= '}';
    }
    if ( $content_icon_color || $content_icon_size || $icon_btm_space) {
      $inline_style .= '.hanor-promo-'. $e_uniqid .' .promo-info i {';
      $inline_style .= ( $content_icon_color ) ? 'color:'. $content_icon_color .';' : '';
      $inline_style .= ( $content_icon_size ) ? 'font-size:'. havnor_core_check_px($content_icon_size) .';' : '';
      $inline_style .= ( $icon_btm_space ) ? 'padding-bottom:'. havnor_core_check_px($icon_btm_space) .';' : '';
      $inline_style .= '}';
    }
    if ( $content_bg_color ) {
      $inline_style .= '.hanor-promo-'. $e_uniqid .'.hanor-promo.promo-style-three .promo-secondary {';
      $inline_style .= ( $content_bg_color ) ? 'background-color:'. $content_bg_color .';' : '';
      $inline_style .= '}';
    }
    // Button Text Color
    if ( $text_color || $text_size || $bgg_color || $border_color || $border_radius) {
      $inline_style .= '.hanor-promo-'. $e_uniqid .' a.hanor-btn {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
      $inline_style .= ( $border_radius ) ? 'border-radius:'. havnor_core_check_px($border_radius) .';' : '';
      $inline_style .= ( $bgg_color ) ? 'background-color:'. $bgg_color .';' : '';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
    // Button Text Hover Color
    if ( $text_hover_color || $border_hover_color ) {
      $inline_style .= '.hanor-promo-'. $e_uniqid .' a.hanor-btn:hover {';
      $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
      $inline_style .= ( $bg_hover_color ) ? 'background:'. $bg_hover_color .';' : '';
      $inline_style .= ( $border_hover_color ) ? 'border-color: '. $border_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Button Text Hover Color
    if ( $bg_hover_color ) {
      $inline_style .= '.hanor-promo-'. $e_uniqid .' .hanor-btn:hover:before, .hanor-promo-'. $e_uniqid .' .hanor-btn:focus:before, .hanor-promo-'. $e_uniqid .' .hanor-btn:before {';
      $inline_style .= ( $bg_hover_color ) ? 'background:'. $bg_hover_color .';' : '';
      $inline_style .= '}';
    }
    if($img_overlay_color) {
      $inline_style .= '.hanor-promo-'. $e_uniqid .' .hanor-video-wrap:before {';
      $inline_style .= ( $img_overlay_color ) ? 'background:'. $img_overlay_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-promo-'. $e_uniqid;

    if ($promo_style === 'promo-two') {
      $ps_class = ' promo-style-two';
      $c1_class = 'col-md-5';
      $c2_class = 'col-md-7';
    } elseif ($promo_style === 'promo-four') {
      $ps_class = '';
      $c1_class = 'col-md-6';
      $c2_class = 'col-md-6';
    } else {
      $ps_class = '';
      $c1_class = 'col-md-5';
      $c2_class = 'col-md-7';
    }

    if ($toggle_align === 'true') {
      $tog_class = ' toggle-align';
    } else {
      $tog_class = '';
    }

    if ($promo_style === 'promo-three'||$promo_style === 'promo-four') {
     $promo_class = ' promo-style-three';
    }
    elseif ($promo_style === 'promo-two') {
     $promo_class = ' promo-style-two';
    } else {
      $promo_class = '';
    } 

    $promo_title = $promo_title ? '<h2 class="promo-title">'.$promo_title.'</h2>' : '';

    if ( $video_link === 'true' ) {
      $vid_class = ' hanor-video-wrap';
      $video_link = '<a href="'.$promo_video_link.'" class="hanor-video-btn-wrap hanor-popup-video">
                      <span class="video-btn"><i class="'.$promo_icon.'" aria-hidden="true"></i></span>
                    </a>';
    } else {
      $vid_class = '';
      $video_link = '';
    }

    $btn_text = $promo_button_text ? '<div class="hanor-btns-group"><a href="'.$promo_button_link.'" '.$open_link.' class="hanor-btn"><span class="hanor-btn-text">'.$promo_button_text.'</span></a></div>' : '';

    $image_url = wp_get_attachment_url( $promo_image );
    $alt_text = get_post_meta($promo_image, '_wp_attachment_image_alt', true);

    if ($promo_style === 'promo-four') {
      if(class_exists('Aq_Resize')) {
          $image_url = aq_resize( $image_url, '600', '439', true );
        } else {$image_url = $image_url;} 
    } else {
       $image_url =  $image_url;
    }

    $promo_icon = $promo_icon ? '<i class="'. $promo_icon .'" aria-hidden="true"></i>' : '';
    $promo_icon_image = $promo_icon_image ? '<i class="'. $promo_icon_image .'" aria-hidden="true"></i>' : '';

    $output = '<section class="hanor-promo'. $ps_class . $tog_class . $styled_class .' '. $class . $promo_class.'">
                <div class="promo-item">
                  <div class="row">
                    <div class="'.$c2_class.' hanor-item promo-primary">
                      <div class="hanor-table-wrap">
                        <div class="hanor-align-wrap">
                          <div class="hanor-image'.$vid_class.'"><img src="'.$image_url.'" alt="'.$alt_text.'">'.$video_link.'</div>
                        </div>
                      </div>
                    </div>
                    <div class="'.$c1_class.' hanor-item promo-secondary">
                      <div class="hanor-table-wrap">
                        <div class="hanor-align-wrap">
                          <div class="promo-info">'.$promo_icon_image.''. $promo_title . $content . $btn_text .'</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>';
    return $output;
  }
}
add_shortcode( 'havnor_promo', 'havnor_promo_function' );
