<?php
/* ==========================================================
  Client Carousel
=========================================================== */
if ( !function_exists('havnor_chart_section_func')) {
  function havnor_chart_section_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'open_link'  => '',
      'class'  => '',
      'select_image'  => '',
      'title_text' =>'',
      'content_text' =>'',
      // Styling
      'title_color' =>'',
      'title_size' =>'',
      'content_size'  => '',
      'content_color'  => '',
      'sep_color' =>'',

    ), $atts));

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Title Text Color
    if ( $title_color || $title_size ) {
      $inline_style .= '.hanor-chart-section-'. $e_uniqid .'.hanor-chart h2.chart-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size ) {
      $inline_style .= '.hanor-chart-section-'. $e_uniqid .'.hanor-chart h5 {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $sep_color  ) {
      $inline_style .= '.hanor-chart-section-'. $e_uniqid .'.hanor-chart .hanor-image:after {';
      $inline_style .= ( $sep_color ) ? 'background-color:'. $sep_color .';' : '';
      $inline_style .= '}';
    }
   
    // Image
    $banner_bg = wp_get_attachment_url( $select_image );
    $alt_text = get_post_meta($select_image, '_wp_attachment_image_alt', true);
    // add inline style
    havnor_add_inline_style( $inline_style );
    $styled_class  = ' hanor-chart-section-'. $e_uniqid;

    $output = '<section class="hanor-chart '.$styled_class.'">
                <div class="chart-wrap"><div class="row">';
    $output .= '<div class="item"><div class="chart-area"><div class="chart-item"><div class="hanor-image">';
    $output .= '<img src="'. $banner_bg .'" alt="'.$alt_text.'"></div><h2 class="chart-title">'.$title_text.' </h2><h5>' .$content_text.'</h5>';
    $output .= '</div></div></div>';
    $output .= '</div></div></section>';
    return $output;
  }
}
add_shortcode( 'hanor_chart_section', 'havnor_chart_section_func' );
