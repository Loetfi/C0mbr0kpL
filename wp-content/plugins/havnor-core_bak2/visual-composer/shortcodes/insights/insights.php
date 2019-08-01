<?php
/* ==========================================================
  Insights
=========================================================== */
if ( !function_exists('havnor_insights_function')) {
  function havnor_insights_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'insights_style' =>'',
      'insights_items'  => '',
      'class'  => '',
      'open_link'  => '',
      // Style
      'title_size' =>'',
      'title_color' =>'',
      'title_hover_color' =>'',
      // Sub Title Stylings
      'subtitle_text_color' =>'',
      'subtitle_text_size' =>'',
      //Content Stylings
      'content_color' =>'',
      'content_size' =>'',
      //Meta Stylings
      'meta_text_color' =>'',
      'meta_text_size' =>'',

    ), $atts));

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';
    // Group Field
    $insights_items = (array) vc_param_group_parse_atts( $insights_items );
    $get_each_insights = array();
    foreach ( $insights_items as $insights_item ) {
      $each_insights = $insights_item;

      $each_insights['insights_image'] = isset( $insights_item['insights_image'] ) ? $insights_item['insights_image'] : '';
      $each_insights['insights_title'] = isset( $insights_item['insights_title'] ) ? $insights_item['insights_title'] : '';
      $each_insights['insights_title_link'] = isset( $insights_item['insights_title_link'] ) ? $insights_item['insights_title_link'] : '';
      $each_insights['insights_subtitle'] = isset( $insights_item['insights_subtitle'] ) ? $insights_item['insights_subtitle'] : '';
      $each_insights['insights_text'] = isset( $insights_item['insights_text'] ) ? $insights_item['insights_text'] : '';
      $each_insights['insights_volume'] = isset( $insights_item['insights_volume'] ) ? $insights_item['insights_volume'] : '';
      $each_insights['insights_date'] = isset( $insights_item['insights_date'] ) ? $insights_item['insights_date'] : '';
      $get_each_insights[] = $each_insights;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Title Stylings
    if ( $title_size || $title_color ) {
      $inline_style .= '.hanor-insights-'. $e_uniqid .'.hanor-insights h3.insights-title, .hanor-insights-'. $e_uniqid .'.hanor-insights h3.insights-title a {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    // Title Hover Stylings
    if ( $title_hover_color ) {
      $inline_style .= '.hanor-insights-'. $e_uniqid .'.hanor-insights h3.insights-title a:hover {';
      $inline_style .= ( $title_hover_color ) ? 'color:'. $title_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Subtitle Stylings
    if ( $subtitle_text_size || $subtitle_text_color ) {
      $inline_style .= '.hanor-insights-'. $e_uniqid .'.hanor-insights h5.subtitle {';
      $inline_style .= ( $subtitle_text_color ) ? 'color:'. $subtitle_text_color .';' : '';
      $inline_style .= ( $subtitle_text_size ) ? 'font-size:'. havnor_core_check_px($subtitle_text_size) .';' : '';
      $inline_style .= '}';
    }
    //Content Stylings
    if ( $content_size || $content_color ) {
      $inline_style .= '.hanor-insights-'. $e_uniqid .'.hanor-insights .insights-toggle-content p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    //Meta Stylings
    if ( $meta_text_size || $meta_text_color ) {
      $inline_style .= '.hanor-insights-'. $e_uniqid .'.hanor-insights .toggle-insights-info .insights-meta {';
      $inline_style .= ( $meta_text_color ) ? 'color:'. $meta_text_color .';' : '';
      $inline_style .= ( $meta_text_size ) ? 'font-size:'. havnor_core_check_px($meta_text_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $meta_text_color ) {
      $inline_style .= '.hanor-insights-'. $e_uniqid .'.hanor-insights .toggle-insights-info .insights-meta span:after {';
      $inline_style .= ( $meta_text_color ) ? 'background-color:'. $meta_text_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-insights-'. $e_uniqid;

    $output = '<section class="hanor-insights '. $class . $styled_class .'"><div class="hanor-masonry">';

    // Group Param Output
    foreach ( $get_each_insights as $each_insights ) {
      $image_url = wp_get_attachment_url( $each_insights['insights_image'] );
      $alt_text = get_post_meta($each_insights['insights_image'], '_wp_attachment_image_alt', true);
      $insights_title = $each_insights['insights_title_link'] ? '<h3 class="insights-title"><a href="'.$each_insights['insights_title_link'].'" '.$open_link.'>'.$each_insights['insights_title'].'</a></h3>' : '<h3 class="insights-title">'.$each_insights['insights_title'].'</h3>';
      $image_actual = $each_insights['insights_title_link'] ? '<a href="'.$each_insights['insights_title_link'].'" '.$open_link.'><img src="'. $image_url .'" alt="'.$alt_text.'"></a>' : '<img src="'. $image_url .'" alt="'.$alt_text.'">';
      $image_main = $each_insights['insights_image'] ? '<div class="hanor-image">'.$image_actual.'</div>' : '';

      $output .= '<div class="masonry-item">
                    <div class="insights-item">
                      <div class="toggle-insights-info">';
                        if($insights_style === 'style-one') {
                           $output .= '<div class="story-section">
                              '.$insights_title.'
                               <p>'.$each_insights['insights_text'].'</p>
                           </div> 
                          <div class="insights-meta">
                            <span class="insight-sector"><i class="fa fa-cog" aria-hidden="true"></i>'. $each_insights['insights_volume'].'</span>
                          </div>';
                        } else {
                          $output .= $image_main.'
                              <div class="insights-content-info">
                                <h5 class="subtitle">'.$each_insights['insights_subtitle'].'</h5>
                                '.$insights_title.'
                                <div class="insights-toggle-content">
                                <p>'.$each_insights['insights_text'].'</p>
                                </div>
                              </div>
                              <div class="insights-meta">
                                <span class="insight-vol">'. $each_insights['insights_volume'].'</span>
                                <span class="insight-date">'. $each_insights['insights_date'].'</span>
                              </div>'; 
                        }
                    $output .='</div></div></div>';
    }

    $output .= '</div></section>';
    return $output;
  }
}
add_shortcode( 'hanor_insights', 'havnor_insights_function' );
