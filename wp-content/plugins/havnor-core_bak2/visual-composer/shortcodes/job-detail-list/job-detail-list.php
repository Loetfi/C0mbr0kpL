<?php
/* ==========================================================
  Feature Section
=========================================================== */
if ( !function_exists('havnor_job_detail_section_func')) {
  function havnor_job_detail_section_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'job_deatil_list_style' =>'',
      'open_link'  => '',
      'job_detail_sections'  => '',
      'class'  => '',
      // Style
      'title_color' =>'',
      'title_size' =>'',
      'subtitle_color' =>'',
      'subtitle_size' =>'',
      'icon_color' =>'',
      'icon_size' =>'',
      'form_bg_color' =>'',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Group Field
    $job_detail_sections = (array) vc_param_group_parse_atts( $job_detail_sections );
    $get_job_detail_sections = array();
    foreach ( $job_detail_sections as $job_detail_section ) {
      $each_logo = $job_detail_section;
      $each_logo['job_detail_icon'] = isset( $job_detail_section['job_detail_icon'] ) ? $job_detail_section['job_detail_icon'] : '';
      $each_logo['job_detail_title'] = isset( $job_detail_section['job_detail_title'] ) ? $job_detail_section['job_detail_title'] : '';
      $each_logo['job_detail_subtitle'] = isset( $job_detail_section['job_detail_subtitle'] ) ? $job_detail_section['job_detail_subtitle'] : '';
      $get_job_detail_sections[] = $each_logo;
    }

    // Title Stylings
    if ( $title_size || $title_color ) {
      $inline_style .= '.hanor-job-detail-'. $e_uniqid .'.hanor-job-detail .job-detail-item h4.job-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    // Subtitle Stylings
    if ( $subtitle_size || $subtitle_color ) {
      $inline_style .= '.hanor-job-detail-'. $e_uniqid .'.hanor-job-detail .job-detail-item h4.sub-title {';
      $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .';' : '';
      $inline_style .= ( $subtitle_size ) ? 'font-size:'. havnor_core_check_px($subtitle_size) .';' : '';
      $inline_style .= '}';
    }
    // Icon Stylings
    if ( $icon_size || $icon_color ) {
      $inline_style .= '.hanor-job-detail-'. $e_uniqid .'.hanor-job-detail .job-detail-item .job-detail-icon, .hanor-job-detail-'. $e_uniqid .'.hanor-job-detail .job-detail-item .job-detail-icon i {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    // Icon Stylings
    if (  $form_bg_color ) {
      $inline_style .= '.hanor-job-detail-'. $e_uniqid .'.hanor-job-detail.job-detail-style-one {';
      $inline_style .= ( $form_bg_color ) ? 'background-color:'. $form_bg_color .';' : '';
      $inline_style .= '}';
    }

    // Style Variations
    if($job_deatil_list_style === 'job-style-two' ) {
      $job_style_class = ' job-detail-style-two';
    } else {
      $job_style_class = ' job-detail-style-one';
    }

    // Add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-job-detail-'. $e_uniqid;

    $output = '<section class="hanor-job-detail '.$styled_class. $job_style_class.'">
                <div class="job-detail-wrap">';

                if ($job_deatil_list_style === 'job-style-two') {
                  // Group Param Output
                  foreach ( $get_job_detail_sections as $each_logo ) {
                    $output .= '<div class="job-detail-item"><div class="jobdetail-content-section">';
                    $output .= '<div class="job-detail-title"><h4 class="job-title">'.$each_logo['job_detail_title'].' </h4></div><div class="job-detail-subtitle"><h4 class="sub-title ">'. $each_logo['job_detail_subtitle'].'</h4></div>';
                    $output .= '</div></div>';
                  } 
                } else {
                  // Group Param Output
                  foreach ( $get_job_detail_sections as $each_logo ) {
                    $output .= '<div class="job-detail-item"><div class="jobdetail-content-section">';
                    $output .= '<div class="job-detail-title"><span class="job-detail-icon"><i class="'.$each_logo['job_detail_icon'].'"></i></span><h4 class="job-title">'.$each_logo['job_detail_title'].' </h4></div><div class="job-detail-subtitle"><h4 class="sub-title ">'. $each_logo['job_detail_subtitle'].'</h4></div>';
                    $output .= '</div></div>';
                  } 
                }
    $output .= '</div></section>';
    return $output;
  }
}
add_shortcode( 'hanor_job_detail_section', 'havnor_job_detail_section_func' );
