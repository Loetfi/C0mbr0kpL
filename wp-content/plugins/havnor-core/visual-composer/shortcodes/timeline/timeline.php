<?php
/* ==========================================================
  Timeline
=========================================================== */
if ( !function_exists('havnor_timeline_function')) {
  function havnor_timeline_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'timeline_items'  => '',
      'class'  => '',
      // Style
      'year_color'  => '',
      'year_bg_color'  => '',
      'year_size'  => '',
      'year_weight' => '',
      'title_color'  => '',
      'title_size'  => '',
      'title_line_height' => '',
      'title_weight' => '',
      'subtitle_color'  => '',
      'subtitle_size'  => '',
      'subtitle_line_height' => '',
      'subtitle_weight' => '',
      'text_color'  => '',
      'text_size'  => '',
      'text_line_height' => '',
      'dot_bg_color'  => '',
      'dot_bg_hover_color'  => '',
      'dot_border_color'  => '',
      'dot_border_hover_color'  => '',
    ), $atts));

    // Group Field
    $timeline_items = (array) vc_param_group_parse_atts( $timeline_items );
    $get_each_timeline = array();
    foreach ( $timeline_items as $timeline_item ) {
      $each_timeline = $timeline_item;
      $each_timeline['timeline_year'] = isset( $timeline_item['timeline_year'] ) ? $timeline_item['timeline_year'] : '';
      $each_timeline['select_image'] = isset( $timeline_item['select_image'] ) ? $timeline_item['select_image'] : '';
      $each_timeline['timeline_title'] = isset( $timeline_item['timeline_title'] ) ? $timeline_item['timeline_title'] : '';
      $each_timeline['timeline_subtitle'] = isset( $timeline_item['timeline_subtitle'] ) ? $timeline_item['timeline_subtitle'] : '';
      $each_timeline['timeline_text'] = isset( $timeline_item['timeline_text'] ) ? $timeline_item['timeline_text'] : '';
      $get_each_timeline[] = $each_timeline;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $title_size || $title_color || $title_weight || $title_line_height) {
      $inline_style .= '.hanor-timeline-'. $e_uniqid .' .timeline-info h3 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_line_height ) ? 'line-height:'. havnor_core_check_px($title_line_height) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= '}';
    }
    if ( $subtitle_size || $subtitle_color || $subtitle_line_height || $subtitle_weight) {
      $inline_style .= '.hanor-timeline-'. $e_uniqid .' .timeline-info span {';
      $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .';' : '';
      $inline_style .= ( $subtitle_size ) ? 'font-size:'. havnor_core_check_px($subtitle_size) .';' : '';
      $inline_style .= ( $subtitle_line_height ) ? 'line-height:'. havnor_core_check_px($subtitle_line_height) .';' : '';
      $inline_style .= ( $subtitle_weight ) ? 'font-weight:'. $subtitle_weight .';' : '';
      $inline_style .= '}';
    }
    if ( $text_color || $text_size || $text_line_height) {
      $inline_style .= '.hanor-timeline-'. $e_uniqid .' .timeline-info p {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
      $inline_style .= ( $text_line_height ) ? 'line-height:'. havnor_core_check_px($text_line_height) .';' : '';
      $inline_style .= '}';
    }
    if ( $year_color || $year_bg_color || $year_size || $year_weight) {
      $inline_style .= '.hanor-timeline-'. $e_uniqid .' .timeline-item .timeline-year {';
      $inline_style .= ( $year_size ) ? 'font-size:'. havnor_core_check_px($year_size) .';' : '';
      $inline_style .= ( $year_weight ) ? 'font-weight:'. $year_weight .';' : '';
      $inline_style .= ( $year_bg_color ) ? 'background-color:'. $year_bg_color .';' : '';
      $inline_style .= ( $year_color ) ? 'color:'. $year_color .';' : '';
      $inline_style .= '}';
    }
    if ( $dot_bg_color || $dot_border_color ) {
      $inline_style .= '.hanor-timeline-'. $e_uniqid .' .timeline-item .timeline-image:before, .hanor-timeline-'. $e_uniqid .'.timeline-menu:after {';
      $inline_style .= ( $dot_bg_color ) ? 'background-color:'. $dot_bg_color .';' : '';
      $inline_style .= ( $dot_border_color ) ? 'box-shadow: 0px 0px 0px 4px '. $dot_border_color .';' : '';
      $inline_style .= '}';
    }
    if ( $dot_bg_hover_color || $dot_border_hover_color ) {
      $inline_style .= '.hanor-timeline-'. $e_uniqid .' .timeline-item:hover .timeline-image:before {';
      $inline_style .= ( $dot_bg_hover_color ) ? 'background-color:'. $dot_bg_hover_color .';' : '';
      $inline_style .= ( $dot_border_hover_color ) ? 'box-shadow: 0px 0px 0px 4px '. $dot_border_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-timeline-'. $e_uniqid;

    $output = '<div class="timeline-menu '. $class . $styled_class .'">';

    // Group Param Output
    foreach ( $get_each_timeline as $each_timeline ) {
      $timeline_title = $each_timeline['timeline_title'] ? '<h3 class="timeline-title">'. $each_timeline['timeline_title'] .'</h3>' : '';
      $timeline_subtitle = $each_timeline['timeline_subtitle'] ? '<span>'. $each_timeline['timeline_subtitle'] .'</span>' : '';
      $timeline_text = $each_timeline['timeline_text'] ? '<p>'. $each_timeline['timeline_text'] .'</p>' : '';
      $timeline_year = $each_timeline['timeline_year'] ? '<span class="timeline-year">'.$each_timeline['timeline_year'].'</span>' : '';
      $image_url = wp_get_attachment_url( $each_timeline['select_image'] );
      $image = $each_timeline['select_image'] ? '<img src="'.$image_url.'" alt="Timeline">' : '';

      $output .= '<div class="timeline-item">
                    '.$timeline_year.'
                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <div class="timeline-image">
                          <div class="hanor-image">'.$image.'</div>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <div class="timeline-info">
                          '. $timeline_title . $timeline_subtitle . $timeline_text .'
                        </div>
                      </div>
                    </div>
                  </div>';
    }

    $output .= '</div>';
    return $output;
  }
}
add_shortcode( 'hanor_timeline', 'havnor_timeline_function' );
