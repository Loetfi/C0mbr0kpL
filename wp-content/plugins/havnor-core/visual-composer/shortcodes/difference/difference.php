<?php
/* ==========================================================
  Difference
=========================================================== */
if ( !function_exists('havnor_difference_function')) {
  function havnor_difference_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'tog_align'  => '',
      'difference_image'  => '',
      'image_icon' => '',
      'difference_icon_image' =>'',
      'difference_icon' => '',
      'content_align' => '',
      'difference_title'  => '',
      'sub_title' => '',
      'difference_content'  => '',
      'btn_text'  => '',
      'btn_link'  => '',
      'open_link' => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_size'  => '',
      'icon_color' => '',
      'icon_size' => '',
      'sub_title_color' => '',
      'sub_title_size' => '',
      'content_color'  => '',
      'content_size'  => '',
      // Btn Styling
      'text_color'  => '',
      'bg_color'  => '',
      'border_color'  => '',
      'text_hover_color'  => '', 
      'bg_hover_color'  => '',
      'border_hover_color'  => '',
      'text_size'  => '',
      'btn_border_radius' => '',
      
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';
    
    if ( $title_size || $title_color ) {
      $inline_style .= '.hanor-difference-'. $e_uniqid .' .difference-info h2.difference-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_size || $icon_color ) {
      $inline_style .= '.hanor-difference-'. $e_uniqid .' .difference-info .hanor-icon span {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $sub_title_size || $sub_title_color ) {
      $inline_style .= '.hanor-difference-'. $e_uniqid .' .difference-info h5.difference-sub-title {';
      $inline_style .= ( $sub_title_color ) ? 'color:'. $sub_title_color .';' : '';
      $inline_style .= ( $sub_title_size ) ? 'font-size:'. havnor_core_check_px($sub_title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size ) {
      $inline_style .= '.hanor-difference-'. $e_uniqid .' .difference-info p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    // Button Text Color
    if ( $text_color || $text_size || $bg_color || $border_color || $btn_border_radius) {
      $inline_style .= '.hanor-difference-'. $e_uniqid .' .difference-info .hanor-btns-group a.hanor-btn {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
      $inline_style .= ( $btn_border_radius ) ? 'border-radius:'. havnor_core_check_px($btn_border_radius) .';' : '';
      $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
    // Button Text Hover Color
    if ( $text_hover_color || $border_hover_color ) {
      $inline_style .= '.hanor-difference-'. $e_uniqid .' .difference-info .hanor-btns-group a.hanor-btn:hover {';
      $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
      $inline_style .= ( $bg_hover_color ) ? 'background:'. $bg_hover_color .';' : '';
      $inline_style .= ( $border_hover_color ) ? 'border-color: '. $border_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Button Text Hover Color
    if ( $bg_hover_color ) {
      $inline_style .= '.hanor-difference-'. $e_uniqid .' .difference-info .hanor-btns-group .hanor-btn:hover:before, .hanor-difference-'. $e_uniqid .' .difference-info .hanor-btns-group .hanor-btn:focus:before, .hanor-difference-'. $e_uniqid .' .difference-info .hanor-btns-group .hanor-btn:before {';
      $inline_style .= ( $bg_hover_color ) ? 'background:'. $bg_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-difference-'. $e_uniqid;

    if ($tog_align) {
      $tog_class = ' toggle-align';
    } else {
      $tog_class = '';
    }

    // COntent Align
    if($content_align === 'right') {
      $align_cls = ' content-right-align';
    } elseif($content_align === 'center') {
      $align_cls = ' content-center-align';
    } else {
      $align_cls = ' content-left-align';
    }

    $image_url = wp_get_attachment_url( $difference_image );
    $image_icon_url = wp_get_attachment_url( $difference_icon_image );
    // Icon
    $difference_icon = $difference_icon ? '<div class="hanor-icon "><span class="'. $difference_icon .'"></span></div>' : '';

    if ($image_icon_url) {
      $diff_icon_image = '<div class="differ-icon-image"><img src="'.$image_icon_url .'" alt =""></div>';
    } else {
      $diff_icon_image = '';
    }

    $difference_title = $difference_title ? '<h2 class="difference-title">'.$difference_title.'</h2>' : '';
    $diff_sub_title = $sub_title ? '<h5 class="difference-sub-title">'.$sub_title.'</h5>' : '';
    $difference_content = $difference_content ? '<p>'.$difference_content.'</p>' : '';
    $open_link = $open_link ? ' target="_blank"' : '';
    $difference_btn = $btn_link ? '<div class="hanor-btns-group"><a href="'.$btn_link.'" '.$open_link.' class="hanor-btn"><span class="hanor-btn-text">'.$btn_text.'</span></a></div>' : '';

    // Image Or icon 
    if($image_icon === 'icon-tab') {
      $img_icon_exact = $difference_icon;
    } else {
      $img_icon_exact = $diff_icon_image;
    }

    $output = '<div class="hanor-difference'. $styled_class .' '. $class .'">
                <div class="difference-item'.$tog_class.'">
                  <div class="row">
                    <div class="col-md-6 hanor-item difference-prim">
                      <div class="hanor-background hanor-parallax" style="background-image: url('. $image_url .');"></div>
                    </div>
                    <div class="col-md-6 hanor-item difference-seco '.$align_cls.'">
                      <div class="hanor-table-wrap">
                        <div class="hanor-align-wrap">
                          <div class="difference-info">'.$img_icon_exact.'
                          '. $diff_sub_title . $difference_title . $difference_content . $difference_btn .'</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>';
    return $output;
  }
}
add_shortcode( 'havnor_difference', 'havnor_difference_function' );
