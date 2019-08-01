<?php
/**
 * Contact - Shortcode Options
 */
add_action( 'init', 'contact_vc_map' );
if ( ! function_exists( 'contact_vc_map' ) ) {
  function contact_vc_map() {

    $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
    $contact_forms = array();
    if ( $cf7 ) {
      foreach ( $cf7 as $cform ) {
        $contact_forms[ $cform->post_title ] = $cform->ID;
      }
    } else {
      $contact_forms[ __( 'No contact forms found', 'js_composer' ) ] = 0;
    }

    vc_map( array(
    "name" => __( "Contact Form 7", 'havnor-core'),
    "base" => "hanor_contact",
    "description" => __( "Contact Form 7 Style", 'havnor-core'),
    "icon" => "icon-wpb-contactform7",
    "category" => HavnorLib::havnor_cat_name(),
    "params" => array(

      array(
        'type' => 'dropdown',
        'heading' => __( 'Select contact form', 'js_composer' ),
        'param_name' => 'id',
        'value' => $contact_forms,
        'save_always' => true,
        'admin_label' => true,
        'description' => __( 'Choose previously created contact form from the drop down list.', 'js_composer' ),
      ),
      array(
        'type' => 'dropdown',
        'value' => array(
          __( 'Select Styles', 'havnor-core' ) => '',
          __( 'Style One', 'havnor-core' ) => 'box-one',
          __( 'Style Two', 'havnor-core' ) => 'box-two',
        ),
        'admin_label' => true,
        'heading' => __( 'Contact Form Style', 'havnor-core' ),
        'param_name' => 'box_style',
        'description' => __( 'Select from style.', 'havnor-core' ),
      ),
      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Title', 'havnor-core' ),
        'description' => __( 'Enter Form title for your contact form.', 'havnor-core' ),
        'param_name' => 'form_title',
      ),
      array(
        'type' => 'textarea',
        'value' => '',
        'heading' => __( 'Content', 'havnor-core' ),
        'description' => __( 'Enter Form content for your contact form.', 'havnor-core' ),
        'param_name' => 'form_content',
      ),
      array(
        "type"        =>'checkbox',
        "heading"     =>__(' Need drop shadow ?', 'havnor-core'),
        "param_name"  => "need_shadow",
        "value"       => "",
        "std"         => false,
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'description' => __( 'Enter drop shadow for your contact form.', 'havnor-core' ),
      ),
      HavnorLib::vt_class_option(),

      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Form Title Color', 'havnor-core' ),
        'description' => __( 'Pick contact form title color.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'param_name' => 'form_title_color',
      ),
      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Form Title Size', 'havnor-core' ),
        'description' => __( 'Enter text size for form title.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'param_name' => 'form_title_size',
      ),
      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Form Title Font Weight', 'havnor-core' ),
        'description' => __( 'Enter font weight for form title.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'param_name' => 'form_title_weight',
      ),

      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Button Text Size', 'havnor-core' ),
        'description' => __( 'Enter text size for submit button.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'param_name' => 'submit_size',
      ),
      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Form Title Bottom Space', 'havnor-core' ),
        'description' => __( 'Enter text bottom space for form title.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'param_name' => 'form_title_btm_space',
      ),
      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Button Text Color', 'havnor-core' ),
        'description' => __( 'Pick text color for submit button.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'param_name' => 'submit_color',
      ),
      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Button Text Hover Color', 'havnor-core' ),
        'description' => __( 'Pick text hover color for submit button.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'param_name' => 'submit_txt_hover_color',
      ),
      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Button BG Color', 'havnor-core' ),
        'description' => __( 'Pick button background color.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'param_name' => 'submit_bg_color',
      ),
      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Button BG Hover Color', 'havnor-core' ),
        'description' => __( 'Pick button background hover color.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'param_name' => 'submit_bg_hover_color',
      ),

      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Form Background Color', 'havnor-core' ),
        'description' => __( 'Pick form background color.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
        'param_name' => 'form_bg_color',
        'dependency' => array(
            'element' => 'need_shadow',
            'value' => 'true',
          ),
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),

      ), // Params
    ) );
  }
}
