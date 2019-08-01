<?php
/* ==========================================================
  Presentation Image
=========================================================== */
if ( !function_exists('havnor_presentation_image_function')) {
  function havnor_presentation_image_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'select_image'  => '',
      'toggle_align'  => '',
      'right_side' => '',
      'class'  => '',
    ), $atts));

    $image_url = wp_get_attachment_url( $select_image );
    $alt_text = get_post_meta($select_image, '_wp_attachment_image_alt', true);
    $image_main = $select_image ? '<img src="'. $image_url .'" alt="'.$alt_text.'">' : '';
    if ($toggle_align) {
      $style_class = ' two';
    } else {
      $style_class = '';
    }
    if($right_side) {
      $right_side_cls = ' right-side';
    } else {
      $right_side_cls = ' left-side';
    }
    
    $output = '<div class="hanor-presentation '. $class . $style_class . $right_side_cls.'"><div class="hanor-image">'.$image_main.'</div></div>';
    return $output;
  }
}
add_shortcode( 'hanor_presentation_image', 'havnor_presentation_image_function' );
