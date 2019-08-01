<?php
/* ===========================================================
    Section Title
=========================================================== */
if ( !function_exists('havnor_section_title_function')) {
  function havnor_section_title_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'title_style' =>'',
      'title_align'  => '',
      'title_text'  => '',
      'btm_space'  => '',
      'content_text'  => '',
      'class'  => '',
      // Styling
      'title_color'  => '',
      'title_size'  => '',
      'content_color'  => '',
      'content_size'  => '',
      'content_line_height' => '',
      'title_btm'  => '',
      'title_lht'  => '',
      'title_fw' =>'',
      'sub_title_fw' => '',
      // Design
      'css' => ''
    ), $atts));

    // Design Tab
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    $id = sanitize_title($title_text);

    // Title Color
    if ( $title_color || $title_size || $title_btm || $title_lht || $title_fw ) {
      $inline_style .= '.hanor-stitle-'. $e_uniqid .'-'.$id.'.hanor-section-title h2.section-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_btm ) ? 'padding-bottom:'. havnor_core_check_px($title_btm) .';' : '';
      $inline_style .= ( $title_lht ) ? 'line-height:'. havnor_core_check_px($title_lht) .';' : '';
      $inline_style .= ( $title_fw ) ? 'font-weight:'.$title_fw .';' : '';
      $inline_style .= '}';
    }
    // Content Color
    if ( $content_color || $content_size || $sub_title_fw || $content_line_height) {
      $inline_style .= '.hanor-stitle-'. $e_uniqid .'-'.$id.'.hanor-section-title p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= ( $content_line_height ) ? 'line-height:'. havnor_core_check_px($content_line_height) .';' : '';
      $inline_style .= ( $sub_title_fw ) ? 'font-weight:'. $sub_title_fw .';' : '';
      $inline_style .= '}';
    }
    // Section Bottom
    if ( $btm_space ) {
      $inline_style .= '.hanor-stitle-'. $e_uniqid .'-'.$id.'.hanor-section-title {';
      $inline_style .= ( $btm_space ) ? 'padding-bottom:'. havnor_core_check_px($btm_space) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-stitle-'. $e_uniqid.'-'.$id;

    if ($title_style === 'two') {
      $title_class = 'section-title-two';
    } else {
      $title_class = 'section-title-one';
    }
    if ($title_align === 'right') {
      $align_class = ' cpation-right';
    } elseif ($title_align === 'left') {
      $align_class = ' cpation-left';
    } else {
      $align_class = ' cpation-center';
    }
    $s_title = $title_text ? '<h2 class="section-title">'.$title_text.'</h2>' : '';
    $s_content = $content_text ? '<p>'.$content_text.'</p>' : '';

    if ($title_style === 'two') {
      $output = '<div class="hanor-section-title '.$title_class . $styled_class . $align_class .' '. $class .'">'. $s_content . $s_title . '</div>';
    } else {
      $output = '<div class="hanor-section-title '.$title_class. $styled_class . $align_class .' '. $class .'">'. $s_title . $s_content .'</div>';
    }
    return $output;
  }
}
add_shortcode( 'havnor_section_title', 'havnor_section_title_function' );
