<?php
/* ==========================================================
  Technology Partners
=========================================================== */
if ( !function_exists('havnor_technology_partners_function')) {
  function havnor_technology_partners_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'click_txt' => '',
      'retina_img' => '',
      'partners_items'  => '',
      'partners_contents'  => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_size'  => '',
      'text_color'  => '',
      'text_size'  => '',
      'image_border_color'  => '',
      'image_border_hover_color'  => '',
    ), $atts));

    // Group Field
    $partners_items = (array) vc_param_group_parse_atts( $partners_items );
    $get_each_partners = array();
    foreach ( $partners_items as $partners_item ) {
      $each_partners = $partners_item;
      $each_partners['select_image'] = isset( $partners_item['select_image'] ) ? $partners_item['select_image'] : '';
      $get_each_partners[] = $each_partners;
    }
    // Group Field
    $partners_contents = (array) vc_param_group_parse_atts( $partners_contents );
    $get_each_partners_content = array();
    foreach ( $partners_contents as $partners_content ) {
      $each_partners_content = $partners_content;
      $each_partners_content['partners_title'] = isset( $partners_content['partners_title'] ) ? $partners_content['partners_title'] : '';
      $each_partners_content['partners_text'] = isset( $partners_content['partners_text'] ) ? $partners_content['partners_text'] : '';
      $get_each_partners_content[] = $each_partners_content;
    }

    $click_text = $click_txt ? $click_txt : esc_html__('Click to Expand', 'havnor');

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $title_size || $title_color ) {
      $inline_style .= '.hanor-partners-'. $e_uniqid .' .about-partners h3 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $text_color || $text_size ) {
      $inline_style .= '.hanor-partners-'. $e_uniqid .' .about-partners p {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $image_border_color ) {
      $inline_style .= '.hanor-partners-'. $e_uniqid .' .partners-item {';
      $inline_style .= ( $image_border_color ) ? 'border-color:'. $image_border_color .';' : '';
      $inline_style .= '}';
    }
    if ( $image_border_hover_color ) {
      $inline_style .= '.hanor-partners-'. $e_uniqid .' .partners-active.partners-item, .hanor-partners-'. $e_uniqid .' .partners-item:hover {';
      $inline_style .= ( $image_border_hover_color ) ? 'border-color:'. $image_border_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-partners-'. $e_uniqid;

    $output = '<div class="hanor-technology-partners '. $class . $styled_class .'">';

    // Group Param Output
    $i=1;
    foreach ( $get_each_partners as $each_partners ) {
      $image_url = wp_get_attachment_url( $each_partners['select_image'] );
      if($image_url){
        list($width, $height, $type, $attr) = getimagesize($image_url);
      } else {
        $width = '';
        $height = '';
      }
      if($retina_img) {
        $logo_width = $width/2;
        $logo_height = $height/2;
      } else {
        $logo_width = '';
        $logo_height = '';
      }
      $image = $each_partners['select_image'] ? '<img src="'.$image_url.'" alt="Technology Partners" style="width: '.havnor_core_check_px($logo_width).'; height: '.havnor_core_check_px($logo_height).'">' : '';
      if ($i%4 == 1) { $output .= '<div id="partners-wrap-'.$i.'" class="logo-wraper">'; }
      $output .= '<div class="col-md-3 col-sm-6">
                    <div id="partners'.$i.'" class="partners-item hanor-item">
                      <div class="hanor-table-wrap">
                        <div class="hanor-align-wrap">
                          <div class="hanor-image"><span class="partners-info-txt">'.$click_text.' <i class="fa fa-info-circle" aria-hidden="true"></i></span>'.$image.'</div>
                        </div>
                      </div>
                    </div>
                  </div>';
      if ($i%4 == 0) { $output .= '</div>'; }
        $i++;
    }
    $j=1;
    foreach ( $get_each_partners_content as $each_partners_content ) {

      if ($j%4 == 1) { $output .= '<div id="Dpartners-wrap-'.$j.'">'; }
      $output .= '<div id="Dpartners'.$j.'" class="col-md-12 about-partners-item">
                    <div class="about-partners">
                      <h3>'.$each_partners_content['partners_title'].'</h3>
                      <p>'.$each_partners_content['partners_text'].'</p>
                    </div>
                  </div>';
      if ($j%4 == 0) { $output .= '</div>'; }
        $j++;
    }
    $output .= '</div>';
    return $output;
  }
}
add_shortcode( 'hanor_technology_partners', 'havnor_technology_partners_function' );
