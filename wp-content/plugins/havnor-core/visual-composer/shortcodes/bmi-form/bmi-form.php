<?php
/* ==========================================================
    Contact
=========================================================== */
if ( !function_exists('hanor_bmi_form_function')) {
  function hanor_bmi_form_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'form_title'  => '',
      'form_content'  => '',
      'class'  => '',
      'need_bmi'=>'',
      'need_bmr'=>'',
      'bmi_activities' => '',
      // Style
      'form_title_color' => '',
      'form_title_size' => '',
      'form_title_btm_space' => '',
      'form_content_color' => '',
      'form_content_size' => '',
      'submit_size'  => '',
      'submit_color'  => '',
      'submit_txt_hover_color' => '',
      'submit_bg_color'  => '',
      'submit_bg_hover_color' => '',
      'submit_border_color' => '',
      'submit_border_hover_color' => '',
      'form_bg_color' =>'',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Own Styles
    if ( $form_title_size || $form_title_color ) {
      $inline_style .= '.hanor-contact-'. $e_uniqid .' .hanor-section-title h2 {';
      $inline_style .= ( $form_title_size ) ? 'font-size:'. havnor_core_check_px($form_title_size) .';' : '';
      $inline_style .= ( $form_title_color ) ? 'color:'. $form_title_color .';' : '';
      $inline_style .= '}';
    }
    if ($form_title_btm_space) {
      $inline_style .= '.hanor-contact-'. $e_uniqid .' .hanor-section-title {';
      $inline_style .= ( $form_title_btm_space ) ? 'padding-bottom:'. havnor_core_check_px($form_title_btm_space) .';' : '';
      $inline_style .= '}';
    }
    if ( $form_content_size || $form_content_color ) {
      $inline_style .= '.hanor-contact-'. $e_uniqid .' .hanor-section-title p {';
      $inline_style .= ( $form_content_size ) ? 'font-size:'. havnor_core_check_px($form_content_size) .';' : '';
      $inline_style .= ( $form_content_color ) ? 'color:'. $form_content_color .';' : '';
      $inline_style .= '}';
    }
    if ( $submit_size || $submit_color || $submit_bg_color || $submit_border_color) {
      $inline_style .= '.hanor-contact-'. $e_uniqid .' .bmi-calculator-form .hanor-btn {';
      $inline_style .= ( $submit_size ) ? 'font-size:'. havnor_core_check_px($submit_size) .';' : '';
      $inline_style .= ( $submit_color ) ? 'color:'. $submit_color .';' : '';
      $inline_style .= ( $submit_bg_color ) ? 'background-color:'. $submit_bg_color .';' : '';
      $inline_style .= ( $submit_border_color ) ? 'border-color:'. $submit_border_color .';' : '';
      $inline_style .= '}';
    }
    if ( $submit_txt_hover_color || $submit_bg_hover_color || $submit_border_hover_color) {
      $inline_style .= '.hanor-contact-'. $e_uniqid .' .bmi-calculator-form .hanor-btn:hover {';
      $inline_style .= ( $submit_txt_hover_color ) ? 'color:'. $submit_txt_hover_color .';' : '';
      $inline_style .= ( $submit_bg_hover_color ) ? 'background-color:'. $submit_bg_hover_color .';' : '';
      $inline_style .= ( $submit_border_hover_color ) ? 'border-color:'. $submit_border_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Form Bg Color
     if ( $form_bg_color ) {
      $inline_style .= '.hanor-contact-'. $e_uniqid .'.hanor-form-wrap .bmi-form {';
      $inline_style .= ( $form_bg_color ) ? 'background-color:'. $form_bg_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-contact-'. $e_uniqid;

    // Group Field
    $bmi_activities = (array) vc_param_group_parse_atts( $bmi_activities );
    $get_bmi_activities = array();
    foreach ( $bmi_activities as $bmi_activity ) {
      $each_item = $bmi_activity;
      $each_item['activity'] = isset( $bmi_activity['activity'] ) ? $bmi_activity['activity'] : '';
      $each_item['activity_value'] = isset( $bmi_activity['activity_value'] ) ? $bmi_activity['activity_value'] : '';
      $get_bmi_activities[] = $each_item;
    }

    // Atts If
    $form_title = ( $form_title ) ? '<h2 class="section-title">'. $form_title .'</h2>' : '';
    $form_content = ( $form_content ) ? '<p>'. $form_content .'</p>' : '';
    $class = ( $class ) ? ' '. $class : '';

    // Starts
    $output  = '<div class="hanor-form-wrap'. $styled_class . $class .'">
                  <div class="bmi-calculator-form">
                    <div class="hanor-section-title">
                      '.$form_title.$form_content.'
                    </div>
                    <form action="" class="bmi-form form-content" id="form">
                    <fieldset>
                        <div class="bmi-col-half"><input type="number" placeholder="Height (CM)"  min="100" max="990" class="height" id="height"/></div>
                        <div class="bmi-col-half secondary"><input type="number" placeholder="Weight (KG)"  min="15" max="99" class="weight" id="weight"></div>
                        <div class="bmi-col-full"><select id="activitylevel">';

                      // Group Param Output
                      foreach ( $get_bmi_activities as $each_item ) {
                        $output .= '<option value="'.$each_item['activity_value'].'">'.$each_item['activity'].'</option>';
                      }

                      $output .='</select></div>
                        <div class="bmi-col-half"><input type="number" placeholder="Age"  min="5" max="99" class="age" id="age"/></div>
                        <div class="bmi-col-half secondary"><select name="gender" class="gender" id="gender">
                            <option value="male" id="male">Male</option>
                            <option value="female" id="female">Female</option>
                        </select></div>
                        <button class="hanor-btn submit smit" id="smit" type="button">CALCULATE</button>
                    </fieldset><div class="results-wrap">';

                if($need_bmi) {
                  $output .= '<h5 id="result" class="form-header result bmi-result heading-color"></h5>';
                }    
                if($need_bmr) {
                  $output .= '<h5 id="results" class="form-header results bmr-result"></h5>';
                }

          $output .= '</div></form>
                  </div>
                </div>';
    return $output;
  }
}
add_shortcode( 'hanor_bmi_form', 'hanor_bmi_form_function' );
