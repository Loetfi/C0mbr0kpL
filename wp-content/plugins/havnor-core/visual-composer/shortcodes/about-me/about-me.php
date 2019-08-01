<?php
/* ==========================================================
  Difference
=========================================================== */
if ( !function_exists('havnor_about_me_function')) {
  function havnor_about_me_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'tog_align'  => '',
      'about_me_image'  => '',
      'about_me_title'  => '',
      'about_me_designation'  => '',
      'about_me_content'  => '',
      'btn_text'  => '',
      'btn_link'  => '',
      'social_icons'  => '',
      'class'  => '',

      // Style
      'title_color'  => '',
      'title_size'  => '',
      'designation_color'  => '',
      'designation_size'  => '',
      'content_color'  => '',
      'content_size'  => '',
      'icon_color'  => '',
      'icon_size'  => '',
      'icon_hover_color'  => '',
      'main_bg_color'  => '',
      // Btn Styling
      'text_color'  => '',
      'bg_color'  => '',
      'border_color'  => '',
      'text_hover_color'  => '', 
      'bg_hover_color'  => '',
      'border_hover_color'  => '',
      'text_size'  => '',
      
    ), $atts));

    // Group Field
    $social_icons = (array) vc_param_group_parse_atts( $social_icons );
    $get_social_icons = array();
    foreach ( $social_icons as $social_icon ) {
      $each_icon = $social_icon;
      $each_icon['social_icon'] = isset( $social_icon['social_icon'] ) ? $social_icon['social_icon'] : '';
      $each_icon['social_link'] = isset( $social_icon['social_link'] ) ? $social_icon['social_link'] : '';
      $each_icon['open_link'] = isset( $social_icon['open_link'] ) ? $social_icon['open_link'] : '';
      $get_social_icons[] = $each_icon;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $main_bg_color ) {
      $inline_style .= '.hanor-abt-'. $e_uniqid .'.hanor-about-me .my-info {';
      $inline_style .= ( $main_bg_color ) ? 'background:'. $main_bg_color .';' : '';
      $inline_style .= '}';
    }    
    if ( $title_size || $title_color ) {
      $inline_style .= '.hanor-abt-'. $e_uniqid .'.hanor-about-me .my-info h2.my-name {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $designation_size || $designation_color ) {
      $inline_style .= '.hanor-abt-'. $e_uniqid .'.hanor-about-me .my-info h4.my-designation {';
      $inline_style .= ( $designation_color ) ? 'color:'. $designation_color .';' : '';
      $inline_style .= ( $designation_size ) ? 'font-size:'. havnor_core_check_px($designation_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_size || $icon_color ) {
      $inline_style .= '.hanor-abt-'. $e_uniqid .'.hanor-about-me .my-info .hanor-social a {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_hover_color ) {
      $inline_style .= '.hanor-abt-'. $e_uniqid .'.hanor-about-me .my-info .hanor-social a:hover {';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size ) {
      $inline_style .= '.hanor-abt-'. $e_uniqid .'.hanor-about-me .my-info .my-info-wrap p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    // Button Text Color
    if ( $text_color || $text_size || $bg_color || $border_color ) {
      $inline_style .= '.hanor-abt-'. $e_uniqid .'.hanor-about-me .my-info .my-info-wrap .hanor-btns-group a.hanor-btn {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
      $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
    // Button Text Hover Color
    if ( $text_hover_color || $border_hover_color ) {
      $inline_style .= '.hanor-abt-'. $e_uniqid .'.hanor-about-me .my-info .my-info-wrap .hanor-btns-group a.hanor-btn:hover {';
      $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
      $inline_style .= ( $bg_hover_color ) ? 'background:'. $bg_hover_color .';' : '';
      $inline_style .= ( $border_hover_color ) ? 'border-color: '. $border_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Button Text Hover Color
    if ( $bg_hover_color ) {
      $inline_style .= '.hanor-abt-'. $e_uniqid .'.hanor-about-me .my-info .my-info-wrap .hanor-btns-group .hanor-btn:hover:before, .hanor-abt-'. $e_uniqid .'.hanor-about-me .my-info .my-info-wrap .hanor-btns-group .hanor-btn:focus:before, .hanor-abt-'. $e_uniqid .'.hanor-about-me .my-info .my-info-wrap .hanor-btns-group .hanor-btn:before {';
      $inline_style .= ( $bg_hover_color ) ? 'background:'. $bg_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-abt-'. $e_uniqid;

    if ($tog_align) {
      $tog_class = ' toggle-align';
    } else {
      $tog_class = '';
    }

    $image_url = wp_get_attachment_url( $about_me_image );
    $about_me_title = $about_me_title ? '<h2 class="my-name">'.$about_me_title.'</h2>' : '';
    $about_me_designation = $about_me_designation ? '<h4 class="my-designation">'.$about_me_designation.'</h4>' : '';
    $about_me_content = $about_me_content ? '<p>'.$about_me_content.'</p>' : '';
    $about_me_btn = $btn_link ? '<div class="hanor-btns-group"><a href="'.$btn_link.'" class="hanor-btn"><span class="hanor-btn-text">'.$btn_text.'</span></a></div>' : '';

    $output = '<section class="hanor-about-me'. $styled_class . $tog_class .' '. $class .'">
                <div class="row">
                  <div class="col-md-6 hanor-item about-me-prim">
                    <div class="hanor-background hanor-parallax" style="background-image: url('. $image_url .');"></div>
                  </div>
                  <div class="col-md-6 hanor-item about-me-seco">
                    <div class="my-info">
                      <div class="hanor-table-wrap">
                        <div class="hanor-align-wrap">
                          '. $about_me_title . $about_me_designation .'
                          <div class="hanor-social">';
                          foreach ( $get_social_icons as $each_icon ) {
                            $each_icon['open_link'] = $each_icon['open_link'] ? ' target="_blank"' : '';
                            $output .= '<a href="'. $each_icon['social_link'] .'" '.$each_icon['open_link'].'><i class="'. $each_icon['social_icon'] .'" aria-hidden="true"></i></a>';
                          }
            $output .= '</div>
                          <div class="my-info-wrap">
                            '. $about_me_content . $about_me_btn .'
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>';

    return $output;
  }
}
add_shortcode( 'havnor_about_me', 'havnor_about_me_function' );
