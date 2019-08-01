<?php
/* ==========================================================
  Award Section
=========================================================== */
if ( !function_exists('havnor_awards_func')) {
  function havnor_awards_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'open_link'  => '',
      'class'  => '',
      'award_image'  => '',
      'retina_img' => '',
      'award_title' =>'',
      'award_title_link' =>'',
      'award_content' =>'',
       // Styling
      'title_color' =>'',
      'title_size' =>'',
      'title_weight' => '',
      'title_hover_color'=>'',
      'content_color'  => '',
      'content_size'  => '',
      'need_border' =>'',
      'border_color' =>'',
      // Spacings
      'title_btm' =>'',
      'award_top' =>'',
      'award_btm' =>'',

    ), $atts));

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Text Color
     if ( $title_color || $title_size || $title_btm || $title_weight) {
      $inline_style .= '.hanor-award-content-'. $e_uniqid .'.hanor-award h3.award-title, .hanor-award-content-'. $e_uniqid .'.hanor-award h3.award-title a  {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= ( $title_btm ) ? 'padding-bottom:'. havnor_core_check_px($title_btm) .';' : '';
      $inline_style .= '}';
    }
    if ( $title_hover_color ) {
      $inline_style .= '.hanor-award-content-'. $e_uniqid .'.hanor-award h3.award-title a:hover  {';
      $inline_style .= ( $title_hover_color ) ? 'color:'. $title_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size ) {
      $inline_style .= '.hanor-award-content-'. $e_uniqid .'.hanor-award p  {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $border_color  ) {
      $inline_style .= '.hanor-award-content-'. $e_uniqid .'.hanor-award.award-border {';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
    // Spacings
    if ( $title_btm ) {
      $inline_style .= '.hanor-award-content-'. $e_uniqid .'.hanor-award h3.award-title  {';
      $inline_style .= ( $title_btm ) ? 'padding-bottom:'. havnor_core_check_px($title_btm) .';' : '';
      $inline_style .= '}';
    }
    if ( $award_btm || $award_top ) {
      $inline_style .= '.hanor-award-content-'. $e_uniqid .'.hanor-award  {';
      $inline_style .= ( $award_btm ) ? 'padding-bottom:'. havnor_core_check_px($award_btm) .';' : '';
      $inline_style .= ( $award_top ) ? 'padding-top:'. havnor_core_check_px($award_top) .';' : '';
      $inline_style .= '}';
    }

    // Border Class
    if ($need_border) {
      $border_class= 'award-border';
    } else {
      $border_class= '';
    }

    // add inline style
    havnor_add_inline_style( $inline_style );
    $styled_class  = ' hanor-award-content-'. $e_uniqid;

    $output = '<div class="hanor-award '.$border_class. $styled_class. $class.'">
                <div class="award-wrap">';

    $output .= '<div class="item"><div class="item-class"><div class="award-item"><div class="hanor-image hanor-item"><div class="hanor-table-wrap">
              <div class="hanor-align-wrap">';
    $award_title = $award_title_link ? '<h3 class="award-title"><a href="'.$award_title_link.'" '.$open_link.'>'.$award_title.'</a></h3>' : '<h3 class="award-title">'.$award_title.'</h3>';
    $image_link_open = $award_title_link ? '<a href="'.$award_title_link.'" '.$open_link.'>' : '';
    $image_link_close = $award_title_link ? '</a>' : '';

    $image_url = wp_get_attachment_url($award_image);
    if($image_url){
      list($width, $height, $type, $attr) = getimagesize($image_url);
    } else {
      $width = '';
      $height = '';
    }
    if($retina_img) {
      $image_width = $width/2;
      $image_height = $height/2;
    } else {
      $image_width = '';
      $image_height = '';
    }
    $alt_text = get_post_meta($award_image, '_wp_attachment_image_alt', true);

    $output .= $image_link_open.'<img src="'. $image_url .'" alt="'.$alt_text.'" style="width: '.havnor_core_check_px($image_width).'; height: '.havnor_core_check_px($image_height).'">'.$image_link_close.'</div></div></div>  <div class="award-content-section hanor-item"><div class="hanor-table-wrap">
              <div class="hanor-align-wrap">'.$award_title.'<p>'.$award_content.'</p></div>';
    $output .= '</div></div></div></div></div>';

    $output .= '</div></div>';
    return $output;
  }
}
add_shortcode( 'hanor_awards', 'havnor_awards_func' );
