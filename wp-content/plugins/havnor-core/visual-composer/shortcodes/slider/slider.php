<?php
/* ==========================================================
    Slider
=========================================================== */
if ( !function_exists('havnor_slider_function')) {
  function havnor_slider_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'slider_style'  => '',
      'banner_style'  => '',
      'banner_align' => '',
      // Static
      'static_image'  => '',
      'static_slider_title'  => '',
      'static_slider_content'  => '',
      'button_style'  => '',
      'link_text'  => '',
      'text_link'  => '',
      'icon'  => '',
      // Slider
      'need_particles' => '',
      'need_nav'  => '',
      'need_dot'  => '',
      'sliders'  => '',
      'open_link' => '',
      'class'  => '',
      // Slider Options
      'slider_effect' => '',
      'enable_loop' => '',
      'autoplay' => '',
      'mousedrag' => '',
      'clickable_pagi' => '',
      'autoplay_time' => '',
      'autoplay_speed' => '',
      'disable_on_interaction' => '',
      // Particle Options
      'particle_dot_color' => '',
      'particle_line_color' => '',
      'dot_count' => '',
      'dot_speed' => '',
      // Styles
      'caption_overlay'  => '',
      'title_size'  => '',
      'title_weight' => '',
      'title_line_height' => '',
      'title_bottom_space' => '',
      'content_size'  => '',
      'content_weight' => '',
      'content_line_height' => '',
      'content_btm_space' => '',
      'title_color'  => '',
      'content_color'  => '',
      'bone_text_size'  => '',
      'bone_border_radius' => '',
      'bone_top_space' => '',
      'bone_bottom_space' => '',
      'bone_text_color'  => '',
      'bone_bg_color'  => '',
      'bone_border_color'  => '',
      'bone_text_hover_color'  => '',
      'bone_bg_hover_color'  => '',
      'bone_border_hover_color'  => '',
      // Static
      'link_text_size'  => '',
      'link_color'  => '',
      'link_hover_color'  => '',

    ), $atts));

    // Alignment & Texts
    $class = ( $class ) ? ' '. $class : '';
    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);
    $open_link = $open_link ? ' target="_blank"' : '';

    // Group Field
    $slider_items = (array) vc_param_group_parse_atts( $sliders );
    $get_each_lists = array();
    foreach ( $slider_items as $slider_item ) {
      $each_list = $slider_item;
      $each_list['slider_image'] = isset( $slider_item['slider_image'] ) ? $slider_item['slider_image'] : '';
      $each_list['slider_title'] = isset( $slider_item['slider_title'] ) ? $slider_item['slider_title'] : '';
      $each_list['title_animation'] = isset( $slider_item['title_animation'] ) ? $slider_item['title_animation'] : '';
      $each_list['slider_content'] = isset( $slider_item['slider_content'] ) ? $slider_item['slider_content'] : '';
      $each_list['content_animation'] = isset( $slider_item['content_animation'] ) ? $slider_item['content_animation'] : '';
      $each_list['slider_bone_text'] = isset( $slider_item['slider_bone_text'] ) ? $slider_item['slider_bone_text'] : '';
      $each_list['slider_bone_link'] = isset( $slider_item['slider_bone_link'] ) ? $slider_item['slider_bone_link'] : '';
      $each_list['btn_animation'] = isset( $slider_item['btn_animation'] ) ? $slider_item['btn_animation'] : '';
      $each_list['custom_class'] = isset( $slider_item['custom_class'] ) ? $slider_item['custom_class'] : '';
      $get_each_lists[] = $each_list;
    }

    // Slider Options
    $slider_effect = $slider_effect ? ' data-effect="'.$slider_effect.'"' : ' data-effect="slide"';
    $enable_loop = $enable_loop === 'true' ? ' data-loop="true"' : ' data-loop="false"';
    $autoplay = $autoplay === 'true' ? ' data-autoplay="true"' : ' data-autoplay="false"';
    $mousedrag = $mousedrag === 'true' ? ' data-mousedrag="true"' : ' data-mousedrag="false"';
    $clickable_pagi = $clickable_pagi === 'true' ? ' data-clickpage="true"' : ' data-clickpage="false"';
    $autoplay_time = $autoplay_time ? ' data-interval="'. $autoplay_time .'"' : ' data-interval="5000"';
    $autoplay_speed = $autoplay_speed ? ' data-speed="'. $autoplay_speed .'"' : ' data-speed="800"';
    $disable_on_interaction = $disable_on_interaction === 'true' ? ' data-interaction="true"' : ' data-interaction="false"';

    // Particle Options
    $particle_dot_color = $particle_dot_color ? ' data-dotcolor="'.$particle_dot_color.'"' : ' data-dotcolor="#ffffff"';
    $particle_line_color = $particle_line_color ? ' data-linecolor="'.$particle_line_color.'"' : ' data-linecolor="#ffffff"';
    $dot_count = $dot_count ? ' data-dotcount="'.$dot_count.'"' : ' data-dotcount="80"';
    $dot_speed = $dot_speed ? ' data-dotspeed="'.$dot_speed.'"' : ' data-dotspeed="6"';

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Overlay
    if ( $caption_overlay ) {
      $inline_style .= '.havnor-slider-'. $e_uniqid .'.swiper-container .caption-wrap, .havnor-slider-'. $e_uniqid .' .caption-wrap {';
      $inline_style .= ( $caption_overlay ) ? 'background-color:'. $caption_overlay .';' : '';
      $inline_style .= '}';
    }
    // Title
    if ( $title_size || $title_color || $title_weight || $title_line_height || $title_bottom_space) {
      $inline_style .= '.havnor-slider-'. $e_uniqid .' .caption-wrap-inner h2.cpation-title {';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_line_height ) ? 'line-height:'. havnor_core_check_px($title_line_height) .';' : '';
      $inline_style .= ( $title_bottom_space ) ? 'padding-bottom:'. havnor_core_check_px($title_bottom_space) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }
    if ( $link_text_size || $link_color ) {
      $inline_style .= '.havnor-slider-'. $e_uniqid .' .caption-wrap-inner .hanor-btns-group a.hanor-video-btn-wrap span.video-btn-title {';
      $inline_style .= ( $link_text_size ) ? 'font-size:'. havnor_core_check_px($link_text_size) .';' : '';
      $inline_style .= ( $link_color ) ? 'color:'. $link_color .';' : '';
      $inline_style .= '}';
      $inline_style .= '.havnor-slider-'. $e_uniqid .' .caption-wrap-inner .hanor-btns-group a.hanor-video-btn-wrap .video-btn-title:after {';
      $inline_style .= ( $link_color ) ? 'background:'. $link_color .';' : '';
      $inline_style .= '}';
    }
    if ( $link_hover_color ) {
      $inline_style .= '.havnor-slider-'. $e_uniqid .' .caption-wrap-inner .hanor-btns-group a.hanor-video-btn-wrap:hover span.video-btn-title {';
      $inline_style .= ( $link_hover_color ) ? 'color:'. $link_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Content
    if ( $content_size || $content_color || $content_weight || $content_line_height || $content_btm_space) {
      $inline_style .= '.havnor-slider-'. $e_uniqid .' .caption-wrap-inner p {';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= ( $content_line_height ) ? 'line-height:'. havnor_core_check_px($content_line_height) .';' : '';
      $inline_style .= ( $content_btm_space ) ? 'padding-bottom:'. havnor_core_check_px($content_btm_space) .';' : '';
      $inline_style .= ( $content_weight ) ? 'font-weight:'. $content_weight .';' : '';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= '}';
    }
    // Bone
    if ( $bone_text_size || $bone_text_color || $bone_bg_color || $bone_border_color || $bone_border_radius) {
      $inline_style .= '.havnor-slider-'. $e_uniqid .' .cpation-wrap-inner .hanor-btns-group span.video-btn, .havnor-slider-'. $e_uniqid .' .caption-wrap-inner .hanor-btns-group a.hanor-btn, .havnor-slider-'. $e_uniqid .' .hanor-btns-group .video-btn  {';
      $inline_style .= ( $bone_text_size ) ? 'font-size:'. havnor_core_check_px($bone_text_size) .';' : '';
      $inline_style .= ( $bone_text_color ) ? 'color:'. $bone_text_color .';' : '';
      $inline_style .= ( $bone_bg_color ) ? 'background:'. $bone_bg_color .';' : '';
      $inline_style .= ( $bone_border_color ) ? 'border-color:'. $bone_border_color .';' : '';
      $inline_style .= ( $bone_border_radius ) ? 'border-radius:'. havnor_core_check_px($bone_border_radius) .';' : '';
      $inline_style .= '}';
    }
    if ( $bone_top_space || $bone_bottom_space ) {
      $inline_style .= '.havnor-slider-'. $e_uniqid .' .cpation-wrap-inner .hanor-btns-group, .havnor-slider-'. $e_uniqid .' .caption-wrap-inner .hanor-btns-group, .havnor-slider-'. $e_uniqid .' .hanor-btns-group, .havnor-slider-'. $e_uniqid .'.banner-style-two .caption-wrap-inner .hanor-btns-group {';
      $inline_style .= ( $bone_top_space ) ? 'padding-top:'. havnor_core_check_px($bone_top_space) .';' : '';
      $inline_style .= ( $bone_bottom_space ) ? 'padding-bottom:'. havnor_core_check_px($bone_bottom_space) .';' : '';
      $inline_style .= '}';
    }
    // Bone Hover
    if ( $bone_text_hover_color || $bone_bg_hover_color || $bone_border_hover_color ) {
      $inline_style .= '.havnor-slider-'. $e_uniqid .' .cpation-wrap-inner .hanor-btns-group span.video-btn:hover, .havnor-slider-'. $e_uniqid .' .caption-wrap-inner .hanor-btns-group a.hanor-btn:hover {';
      $inline_style .= ( $bone_text_hover_color ) ? 'color:'. $bone_text_hover_color .';' : '';
      $inline_style .= ( $bone_border_hover_color ) ? 'border-color:'. $bone_border_hover_color .';' : '';
      $inline_style .= ( $bone_bg_hover_color ) ? 'background:'. $bone_bg_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' havnor-slider-'. $e_uniqid;

    if($banner_align === 'left') {
      $align_cls = ' slider-cnt-left';
    } elseif($banner_align === 'right') {
      $align_cls = ' slider-cnt-right';
    } else {
      $align_cls = '';
    }

    // Nav
    if ($need_nav === 'true') {
      $slider_nav = '<div class="swiper-button-prev"></div><div class="swiper-button-next"></div>';
    } else {
      $slider_nav = '';
    }
    // Nav
    if ($need_dot === 'true') {
      $slider_dot = '<div class="swiper-pagination"></div>';
    } else {
      $slider_dot = '';
    }
    $output = '';
    if ($slider_style === 'three') {

      // Banner Icon
      $banner_bg = wp_get_attachment_url( $static_image );
      $icon = $icon ? '<i class="'. $icon .'" aria-hidden="true"></i>' : '';
      if ($banner_style === 'ban-two') {
        $vid_link = $text_link ? '<div class="hanor-btns-group"><a href="'.$text_link.'" '.$open_link.' class="hanor-btn"><span class="hanor-btn-text">'. $icon . $link_text.'</span></a></div>' : '';
      } else {
        if ($button_style === 'bs-two') {
          $vid_link = $text_link ? '<div class="hanor-btns-group"><a href="'.$text_link.'" '.$open_link.' class="hanor-video-btn-wrap hanor-popup-video"><span class="video-btn">'. $icon .'</span><span class="video-btn-title">'. $link_text.'</span></a></div>' : '';
        } else {
          $vid_link = $text_link ? '<div class="hanor-btns-group"><a href="'.$text_link.'" '.$open_link.' class="hanor-btn hanor-popup-video"><span class="hanor-btn-text">'. $icon . $link_text.'</span></a></div>' : '';
        }
      }
      $static_slider_content = $static_slider_content ? '<p>'.$static_slider_content.'</p>' : '';
      $static_slider_title = $static_slider_title ? '<h2 class="cpation-title">'.$static_slider_title.'</h2>' : '';

      if ($banner_style === 'ban-two') {
        $bs_class = ' banner-style-two';
        $banner_cont = $static_slider_content . $static_slider_title;
      } else {
        $bs_class = ' hanor-windowheight';
        $banner_cont = $static_slider_title . $static_slider_content;
      }
      if($need_particles) {
        $particles_cls = ' hav-particles';
      } else {
        $particles_cls = '';
      }

      $output .= '<div class="hanor-banner'.$bs_class.' hanor-parallax'.$styled_class.' '.$class.''.$align_cls.''.$particles_cls.'" style="background-image: url('. $banner_bg .');" '.$particle_dot_color.$particle_line_color.$dot_count.$dot_speed.'><div class="caption-wrap">';
      if($need_particles) {
        $output .= '<div id="particles-js"></div>';
      }
      $output .= '<div class="hanor-table-wrap">
                        <div class="hanor-align-wrap">
                          <div class="container">
                            <div class="caption-wrap-inner">'.$banner_cont . $content . $vid_link.'</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';
    } else {
    $output .= '<section class="swiper-container swiper-slides swiper-keyboard hanor-windowheight'.$styled_class.' '.$class.'" '.$slider_effect.$autoplay.$enable_loop.$mousedrag.$clickable_pagi.$autoplay_time.$autoplay_speed.$disable_on_interaction.'><div class="swiper-wrapper">';

    foreach ( $get_each_lists as $each_list ) {
      // Title
      if ($each_list['slider_title']) {
        $caption_title = '<h2 class="cpation-title animated" data-animation="'.$each_list['title_animation'].'">'.$each_list['slider_title'].'</h2>';
      } else {
        $caption_title = '';
      }
      // Content
      if ($each_list['slider_content']) {
        $caption_content = '<p class="animated" data-animation="'.$each_list['content_animation'].'">'.$each_list['slider_content'].'</p>';
      } else {
        $caption_content = '';
      }
      // Button One
      if ($each_list['slider_bone_text']) {
        $button_one = '<div class="hanor-btns-group animated" data-animation="'.$each_list['btn_animation'].'"><a href="'.$each_list['slider_bone_link'].'" '.$open_link.' class="hanor-btn"><span class="hanor-btn-text">'.$each_list['slider_bone_text'].'</span></a></div>';
      } else {
        $button_one = '';
      }
      $image_url = wp_get_attachment_url( $each_list['slider_image'] );
      $output .= '<div class="swiper-slide '.$each_list['custom_class'].'" style="background-image: url('. $image_url .');">
                    <div class="caption-wrap">
                      <div class="hanor-table-wrap">
                        <div class="hanor-align-wrap">
                          <div class="container">
                            <div class="caption-wrap-inner">'. $caption_title . $caption_content . $button_one .'</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';
    }
      $output .= '</div>'. $slider_nav . $slider_dot .'</section>';
    }
    // Starts
    return $output;
  }
}
add_shortcode( 'havnor_slider', 'havnor_slider_function' );
