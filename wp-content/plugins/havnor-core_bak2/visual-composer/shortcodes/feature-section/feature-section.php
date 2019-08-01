<?php
/* ==========================================================
  Feature Section
=========================================================== */
if ( !function_exists('havnor_feature_section_func')) {
  function havnor_feature_section_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'features_style' =>'',
      'open_link'  => '',
      'feature_sections'  => '',
      'class'  => '',
      'column_option' =>'',

      // Style
      'title_color' =>'',
      'title_size' =>'',
      'icon_color' =>'',
      'icon_size' =>'',
      'hover_undrln_color' =>'',
      'feature_padding' =>'',
      'feature_content_padding' =>'',

    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';

    // Group Field
    $feature_sections = (array) vc_param_group_parse_atts( $feature_sections );
    $get_feature_sections = array();
    foreach ( $feature_sections as $feature_section ) {
      $each_logo = $feature_section;
      $each_logo['feature_icon'] = isset( $feature_section['feature_icon'] ) ? $feature_section['feature_icon'] : '';
      $each_logo['feature_title'] = isset( $feature_section['feature_title'] ) ? $feature_section['feature_title'] : '';
      $each_logo['feature_link'] = isset( $feature_section['feature_link'] ) ? $feature_section['feature_link'] : '';
      $get_feature_sections[] = $each_logo;
    }

    // Title Stylings
    if ( $title_size || $title_color ) {
      $inline_style .= '.hanor-features-'. $e_uniqid .' .feature-item .feature-content-section .feature-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    // Icon Styling
    if ( $icon_color || $icon_size ) {
      $inline_style .= '.hanor-features-'. $e_uniqid .' .feature-item .feature-content-section i, .hanor-features-'. $e_uniqid .' .feature-item .feature-content-section [class*=" pe-7s-"], .hanor-features-'. $e_uniqid .' .feature-item .feature-content-section [class^=pe-7s-] {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    // Hover Underline Color
    if ($hover_undrln_color ) {
      $inline_style .= '.hanor-features-'. $e_uniqid .' .feature-item .feature-icon i:after, .hanor-features-'. $e_uniqid .'.hanor-features.feature-style-two .feature-item .feature-content-section .feature-title:after  {';
      $inline_style .= ( $hover_undrln_color ) ? 'background:'. $hover_undrln_color .';' : '';
      $inline_style .= '}';
    }
     // Feature Padding
    if ( $feature_padding ) {
      $inline_style .= '.hanor-features-'. $e_uniqid .'.hanor-features .feature-item{';
      $inline_style .= ( $feature_padding ) ? 'padding:0 '. havnor_core_check_px($feature_padding) .';' : '';
      $inline_style .= '}';
    }
    // margin
    if ( $feature_padding ) {
      $inline_style .= '.hanor-features-'. $e_uniqid .'.hanor-features .features-wrap {';
      $inline_style .= ( $feature_padding ) ? 'margin:0 -'. havnor_core_check_px($feature_padding) .';' : '';
      $inline_style .= '}';
    }
    // Content Padding
    if ( $feature_content_padding ) {
      $inline_style .= '.hanor-features-'. $e_uniqid .'.hanor-features .feature-item .feature-content-section .feature-title, .hanor-features-'. $e_uniqid .'.hanor-features content-section i, .hanor-features-'. $e_uniqid .'.hanor-features .feature-item .feature-content-section [class^=pe-7s-] {';
      $inline_style .= ( $feature_content_padding ) ? 'padding-top:'. havnor_core_check_px($feature_content_padding) .';' : '';
      $inline_style .= ( $feature_content_padding ) ? 'padding-bottom:'. havnor_core_check_px($feature_content_padding) .';' : '';
      $inline_style .= '}';
    }

    // Column Option 
    if($column_option === 'one-column' ) {
      $col_class = ' col-one';
    } elseif ($column_option === 'two-column') {
      $col_class = 'col-two';
    } elseif ($column_option === 'three-column') {
      $col_class = 'col-three';
    } elseif ($column_option === 'four-column') {
      $col_class = 'col-four';
    } else {
      $col_class = 'col-five';
    }

    // Style Variations
    if($features_style === 'style-two' ) {
      $feature_style_class = ' feature-style-two';
    } else {
      $feature_style_class = '';
    }

    // Add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-features-'. $e_uniqid;

    $output = '<div class="hanor-features '.$styled_class. $feature_style_class.'">
                <div class="features-wrap">';

                if ($features_style === 'style-two'){
                     foreach ( $get_feature_sections as $each_logo ) {
                      $output .= '<div class="feature-item '.$col_class .'"><div class="feature-content-section">';
                        if ($each_logo['feature_link']) {
                          $output .= '<a href="'.$each_logo['feature_link'].'" '.$open_link.'><div class="feature-title">'.$each_logo['feature_title'].'</div></a>';
                        } else {
                          $output .= '<span class="feature-title">'.$each_logo['feature_title'].'</span>';
                        }
                      $output .= '</div></div>';
                    }
                } else {
                  // Group Param Output
                  foreach ( $get_feature_sections as $each_logo ) {
                    $output .= '<div class="feature-item '.$col_class.'"><div class="feature-content-section">';

                      if ($each_logo['feature_link']) {
                        $output .= '<span class="feature-icon"><a href="'.$each_logo['feature_link'].'" '.$open_link.'><i class="'.$each_logo['feature_icon'].'"></i></a></span><a href="'.$each_logo['feature_link'].'" '.$open_link.'><div class="feature-title">'.$each_logo['feature_title'].'</div></a>';
                      } else {
                        $output .= '<span class="feature-icon"><i class="'.$each_logo['feature_icon'].'"></i></span><span class="feature-title">'.$each_logo['feature_title'].'</span>';
                      }
                    $output .= '</div></div>';
                  }  
                }

    $output .= '</div></div>';
    return $output;
  }
}
add_shortcode( 'hanor_feature_section', 'havnor_feature_section_func' );
