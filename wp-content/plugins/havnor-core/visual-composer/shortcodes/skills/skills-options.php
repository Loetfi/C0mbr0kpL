<?php
/**
 * Skills - Shortcode Options
 */
add_action( 'init', 'havnor_skills_vc_map' );
if ( ! function_exists( 'havnor_skills_vc_map' ) ) {
  function havnor_skills_vc_map() {
    vc_map( array( 
      "name" => __( "Skills", 'havnor-core'),
      "base" => "havnor_skills",
      "description" => __( "Skills Shortcodes", 'havnor-core'),
      "icon" => "fa fa-bars color-slate-blue",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Skills Style', 'havnor-core' ),
          'value' => array(
            __( 'Line', 'havnor-core' ) => 'skills-line',
            __( 'Circle', 'havnor-core' ) => 'skills-circle',
          ),
          'admin_label' => true,
          'param_name' => 'skills_style',
          'description' => __( 'Select your skills style.', 'havnor-core' ),
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Small Circle", 'havnor-core' ),
          "param_name" => "small_circle",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          'dependency' => array(
            'element' => 'skills_style',
            'value' => 'skills-circle',
          ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Skills Title', 'havnor-core'),
          "param_name" => "skills_title",
          "value"      => "",
          "description" => __( "Enter your skills title.", 'havnor-core'),
          'admin_label' => true,
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Skills Value', 'havnor-core'),
          "param_name" => "skills_value",
          "value"      => "",
          "description" => __( "Enter your skills value between 0 to 100 Eg: 78.", 'havnor-core'),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Skills Value In', 'havnor-core'),
          "param_name" => "skills_value_in",
          "value"      => "",
          "description" => __( "Enter your skills unit Eg: %.", 'havnor-core'),
        ),
        HavnorLib::vt_class_option(),
        // Style
        HavnorLib::vt_notice_field(__( "Title Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Color', 'havnor-core'),
          "param_name" => "title_color",
          "value"      => "",
          "description" => __( "Pick your title color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Size', 'havnor-core'),
          "param_name" => "title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Value Color', 'havnor-core'),
          "param_name" => "value_color",
          "value"      => "",
          "description" => __( "Pick your value color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Value Size', 'havnor-core'),
          "param_name" => "value_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for value size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Fill Color', 'havnor-core'),
          "param_name" => "fill_color",
          "value"      => "",
          "description" => __( "Pick your fill color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Empty Fill Color', 'havnor-core'),
          "param_name" => "empty_fill_color",
          "value"      => "",
          "description" => __( "Pick your empty fill color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Circle Background Color', 'havnor-core'),
          "param_name" => "circle_bg_color",
          "value"      => "",
          "description" => __( "Pick your circle background color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
      )
    ) );
  }
}
