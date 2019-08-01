<?php
/* ==========================================================
    Contact
=========================================================== */
if ( !function_exists('havnor_contact_function')) {
  function havnor_contact_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'id'  => '',
      'box_style'  => '',
      'form_title'  => '',
      'form_content'  => '',
      'class'  => '',
      'need_shadow'=>'',
      // Style
      'form_title_color' => '',
      'form_title_size' => '',
      'form_title_weight' => '',
      'form_title_btm_space' => '',
      'submit_size'  => '',
      'submit_color'  => '',
      'submit_txt_hover_color' => '',
      'submit_bg_color'  => '',
      'submit_bg_hover_color' => '',
      'form_bg_color' =>'',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Own Styles
    if ( $form_title_size || $form_title_color || $form_title_btm_space || $form_title_weight) {
      $inline_style .= '.hanor-contact-'. $e_uniqid .' .hanor-section-title h2 {';
      $inline_style .= ( $form_title_size ) ? 'font-size:'. havnor_core_check_px($form_title_size) .';' : '';
      $inline_style .= ( $form_title_btm_space ) ? 'padding-bottom:'. havnor_core_check_px($form_title_btm_space) .';' : '';
      $inline_style .= ( $form_title_weight ) ? 'font-weight:'. $form_title_weight .';' : '';
      $inline_style .= ( $form_title_color ) ? 'color:'. $form_title_color .';' : '';
      $inline_style .= '}';
    }
    if ( $submit_size || $submit_color || $submit_bg_color ) {
      $inline_style .= '.hanor-contact-'. $e_uniqid .' .wpcf7 input[type="submit"] {';
      $inline_style .= ( $submit_size ) ? 'font-size:'. havnor_core_check_px($submit_size) .';' : '';
      $inline_style .= ( $submit_color ) ? 'color:'. $submit_color .';' : '';
      $inline_style .= ( $submit_bg_color ) ? 'background-color:'. $submit_bg_color .';' : '';
      $inline_style .= '}';
    }
    if ( $submit_txt_hover_color || $submit_bg_hover_color ) {
      $inline_style .= '.hanor-contact-'. $e_uniqid .' .wpcf7 input[type="submit"]:hover {';
      $inline_style .= ( $submit_txt_hover_color ) ? 'color:'. $submit_txt_hover_color .';' : '';
      $inline_style .= ( $submit_bg_hover_color ) ? 'background-color:'. $submit_bg_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Form Bg Color
     if (  $form_bg_color ) {
      $inline_style .= '.hanor-contact-'. $e_uniqid .'.hanor-form-wrap.contact-drop-shadow {';
      $inline_style .= ( $form_bg_color ) ? 'background-color:'. $form_bg_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-contact-'. $e_uniqid;

    // Atts If
    $id = ( $id ) ? $id : '';
    $form_title = ( $form_title ) ? '<h2 class="section-title">'. $form_title .'</h2>' : '';
    $form_content = ( $form_content ) ? '<p>'. $form_content .'</p>' : '';
    $class = ( $class ) ? ' '. $class : '';

    if ($box_style === 'box-two') {
      $style_class = ' contact-wrap-style-wrap';
    } else {
      $style_class = ' ';
    }
    if($need_shadow) {
      $shadow_class =' contact-drop-shadow';
    } else {
      $shadow_class ='';
    }

    // Starts
    $output  = '<div class="hanor-form-wrap'. $styled_class . $style_class . $class . $shadow_class.'">
                  <div class="contact-form">
                    <div class="hanor-section-title">
                      '.$form_title.$form_content.'
                    </div>
                    '.do_shortcode( '[contact-form-7 id="'. $id .'"]' ).'
                  </div>
                </div>';
    return $output;
  }
}
add_shortcode( 'hanor_contact', 'havnor_contact_function' );
