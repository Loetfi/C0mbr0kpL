<?php
/* ==========================================================
  Difference
=========================================================== */
if ( !function_exists('havnor_experience_function')) {
  function havnor_experience_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'experience_icon'  => '',
      'experience_image'  => '',
      'experience_title'  => '',
      'experience_content'  => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_hover_color' => '',
      'title_size'  => '',
      'title_weight' => '',
      'content_color'  => '',
      'content_hover_color' => '',
      'content_size'  => '',
      'icon_color'  => '',
      'icon_hover_color' => '',
      'icon_size'  => '',
      'experience_btm' =>'',
      // Bg color
      'bg_color' =>'',
      'bg_hover_color' =>'',

    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';
    
    if ( $title_size || $title_color || $title_weight) {
      $inline_style .= '.hanor-experience-'. $e_uniqid .' .experience-info h4.experience-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= '}';
    }
    if($title_hover_color) {
      $inline_style .= '.hanor-experience-'. $e_uniqid .'.experience-item:hover .experience-info h4.experience-title {';
      $inline_style .= ( $title_hover_color ) ? 'color:'. $title_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size ) {
      $inline_style .= '.hanor-experience-'. $e_uniqid .' .experience-info p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    if($content_hover_color) {
      $inline_style .= '.hanor-experience-'. $e_uniqid .'.experience-item:hover .experience-info p {';
      $inline_style .= ( $content_hover_color ) ? 'color:'. $content_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_color || $icon_size ) {
      $inline_style .= '.hanor-experience-'. $e_uniqid .'.experience-item .hanor-icon i {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    if($icon_hover_color) {
      $inline_style .= '.hanor-experience-'. $e_uniqid .'.experience-item:hover .hanor-icon i {';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Bg Color
     if ( $bg_color ) {
      $inline_style .= '.hanor-experience-'. $e_uniqid .'.experience-item {';
      $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
      $inline_style .= '}';
    }
     if ( $bg_hover_color ) {
      $inline_style .= '.hanor-experience-'. $e_uniqid .'.experience-item:hover {';
      $inline_style .= ( $bg_hover_color ) ? 'background-color:'. $bg_hover_color .';' : '';
      $inline_style .= '}';
    }
     if ($experience_btm ) {
      $inline_style .= '.hanor-experience-'. $e_uniqid .'.experience-item {';
      $inline_style .= ( $experience_btm ) ? 'margin-bottom:'. havnor_core_check_px($experience_btm) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-experience-'. $e_uniqid;

    $experience_icon = $experience_icon ? '<div class="hanor-icon"><i class="'. $experience_icon .'"></i></div>' : '';
    $icon_image_url = wp_get_attachment_url( $experience_image );
    $alt_text = get_post_meta($experience_image, '_wp_attachment_image_alt', true);
    $experience_icon_image = $experience_image ? '<div class="hanor-icon"><img src="'. $icon_image_url .'" alt="'.$alt_text.'"/></div>' : '';
    $experience_title = $experience_title ? '<h4 class="experience-title">'.$experience_title.'</h4>' : '';
    $experience_content = $experience_content ? '<p>'.$experience_content.'</p>' : '';

    $output = '<div class="experience-item hanor-item'. $styled_class .' '. $class .'">
                '.$experience_icon.$experience_icon_image.'
                <div class="experience-info">'. $experience_title . $experience_content .'</div>
              </div>';

    return $output;
  }
}
add_shortcode( 'havnor_experience', 'havnor_experience_function' );
