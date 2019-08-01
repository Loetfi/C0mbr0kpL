<?php
/**
 * Login/Signup - Shortcode Options
 */
add_action( 'init', 'havnor_login_signup_vc_map' );
if ( ! function_exists( 'havnor_login_signup_vc_map' ) ) {
  function havnor_login_signup_vc_map() {
    vc_map( array(
      "name" => __( "Login/Signup", 'havnor-core'),
      "base" => "havnor_login_signup",
      "description" => __( "Login/Signup Styles", 'havnor-core'),
      "icon" => "fa fa-sign-out color-pink",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          "type" => "checkbox",
          "heading" => __( "Signup Form?", 'havnor-core' ),
          "param_name" => "sign_up",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        HavnorLib::vt_class_option(),

        // Styling
        array(
          "type"        => "notice",
          "heading"     => __( "Label Option", 'havnor-core' ),
          "param_name"  => 'titless',
          'class'       => 'cs-success',
          'value'       => '',
          "group"       => __('Styling', 'havnor-core'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Color", 'havnor-core' ),
          "param_name" => "bg_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Label Color", 'havnor-core' ),
          "param_name" => "title_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Label Size", 'havnor-core' ),
          "param_name" => "title_size",
          'value' => '',
          "description" => __( "Enter section title text font size. [Eg: 14px]", 'havnor-core'),
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        
      )
    ) );
  }
}
