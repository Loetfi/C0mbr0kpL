<?php
/**
 * Contact - Shortcode Options
 */
add_action( 'init', 'bmi_form_vc_map' );
if ( ! function_exists( 'bmi_form_vc_map' ) ) {
  function bmi_form_vc_map() {

    vc_map( array(
    "name" => __( "BMI Form", 'havnor-core'),
    "base" => "hanor_bmi_form",
    "description" => __( "BMI Form Style", 'havnor-core'),
    "icon" => "icon-wpb-contactform7",
    "category" => HavnorLib::havnor_cat_name(),
    "params" => array(

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
        "heading"     =>__(' Need BMI Report ?', 'havnor-core'),
        "param_name"  => "need_bmi",
        "value"       => "",
        "std"         => true,
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'checkbox',
        "heading"     =>__(' Need BMR Report ?', 'havnor-core'),
        "param_name"  => "need_bmr",
        "value"       => "",
        "std"         => true,
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        'type' => 'param_group',
        'heading' => __( 'BMI Activities', 'havnor-core' ),
        'param_name' => 'bmi_activities',
        'save_always' => true,
        'edit_field_class'   => 'hanor-bmi-field',

        // Default Param Values
        'value'      => urlencode( json_encode( array(
          array(
            'activity' => __( 'Sedentary (Little or No Exercise)', 'havnor-core' ),
            'activity_value' => 'l',
          ),
          array(
            'activity' => __( 'Lightly Active (Light Exercise/Sports 1-3 Days Per Week)', 'havnor-core' ),
            'activity_value' => 'lm',
          ),
          array(
            'activity' => __( 'Moderately Active (Moderate Exercise/Sports 3-5 Days Per Week)', 'havnor-core' ),
            'activity_value' => 'm',
          ),
          array(
            'activity' => __( 'Very Active (Hard Exercise/Sports 6-7 days Per Week)', 'havnor-core' ),
            'activity_value' => 'mh',
          ),
          array(
            'activity' => __( 'Extra Active (Very Intense Exercise/Sports and Physical Job Daily)', 'havnor-core' ),
            'activity_value' => 'h',
          ),
        ) ) ),

        // Note params is mapped inside param-group:
        'params' => array(
          array(
            'type' => 'textfield',
            'value' => '',
            'heading' => __( 'Activity', 'havnor-core' ),
            'param_name' => 'activity',
            'admin_label' => true,
          ),
          array(
            'type' => 'textfield',
            'value' => '',
            'heading' => __( 'Activity Value', 'havnor-core' ),
            'param_name' => 'activity_value',
            'edit_field_class'   => 'vc_col-md-6  hanor-hide-field vc_column vt_field_space',
          ),
        ),
        'callbacks'  => array(
          'after_add' => 'vcChartParamAfterAddCallback',
        ),
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
        'heading' => __( 'Form Title Bottom Space', 'havnor-core' ),
        'description' => __( 'Enter bottom space for form title.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'param_name' => 'form_title_btm_space',
      ),
      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Form Content Color', 'havnor-core' ),
        'description' => __( 'Pick contact form content color.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'param_name' => 'form_content_color',
      ),
      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Form Content Size', 'havnor-core' ),
        'description' => __( 'Enter text size for form content.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'param_name' => 'form_content_size',
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
        'heading' => __( 'Button Border Color', 'havnor-core' ),
        'description' => __( 'Pick button border color.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'param_name' => 'submit_border_color',
      ),
      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Button Border Hover Color', 'havnor-core' ),
        'description' => __( 'Pick button border hover color.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'param_name' => 'submit_border_hover_color',
      ),

      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Form Background Color', 'havnor-core' ),
        'description' => __( 'Pick form background color.', 'havnor-core' ),
        'group' => __( 'Style', 'havnor-core' ),
        'param_name' => 'form_bg_color',
         'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),

      ), // Params
    ) );
  }
}
