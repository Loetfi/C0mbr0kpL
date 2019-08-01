<?php
/* ==========================================================
  Award Section
=========================================================== */
if ( !function_exists('havnor_team_intro_func')) {
  function havnor_team_intro_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
     
      'class'  => '',
      'team_image'  => '',
      'team_member_name' =>'',
      'team_member_subtitle' =>'',
      'team_member_description' =>'',
      'toggle_align'  => '',
       // Styling
      'title_color' =>'',
      'title_size' =>'',
      'title_weight' => '',
      'subtitle_color' =>'',
      'subtitle_size' =>'',
      'content_color'  => '',
      'content_size'  => '',
     
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Text Color
     if ( $title_color || $title_size || $title_weight) {
      $inline_style .= '.hanor-team-single-intro-'. $e_uniqid .'.hanor-team-intro .member-details h2  {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= '}';
    }
    if ( $subtitle_color || $subtitle_size ) {
      $inline_style .= '.hanor-team-single-intro-'. $e_uniqid .'.hanor-team-intro .member-details h3  {';
      $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .';' : '';
      $inline_style .= ( $subtitle_size ) ? 'font-size:'. havnor_core_check_px($subtitle_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size ) {
      $inline_style .= '.hanor-team-single-intro-'. $e_uniqid .'.hanor-team-intro .member-details p  {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    
    // add inline style
    havnor_add_inline_style( $inline_style );
    $styled_class  = ' hanor-team-single-intro-'. $e_uniqid;
    $image_url = wp_get_attachment_url($team_image);
    $alt_text = get_post_meta($team_image, '_wp_attachment_image_alt', true);

    if ($toggle_align === 'true') {
      $tog_class = ' intro-toggle-align';
    } else {
      $tog_class = '';
    }

    $output = '<section class="hanor-team-intro '. $styled_class. $class.$tog_class.'">
                <div class="team-intro-wrap"><div class="row">';
    $output .= '<div class="col-md-5 hanor-item intro-cntnt-section"><div class="hanor-table-wrap"><div class="hanor-align-wrap"><div class="member-details"><h2>'.$team_member_name.'</h2><h3>'.$team_member_subtitle.'</h3><p>'.$team_member_description.'</p><div class="team-social-links">'.do_shortcode($content).'</div></div></div></div></div>';
    $output .= '<div class="col-md-7 hanor-item intro-img-section"><div class="hanor-table-wrap"><div class="hanor-align-wrap"><img src="'. $image_url .'" alt="'.$alt_text.'"></div></div></div>';

    $output .= '</div></div></section>';
    return $output;
  }
}
add_shortcode( 'hanor_team_intro', 'havnor_team_intro_func' );
