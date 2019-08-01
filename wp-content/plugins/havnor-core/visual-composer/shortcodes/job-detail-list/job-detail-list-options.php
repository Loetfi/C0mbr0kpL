<?php
/**
 *Job Detail Section - Shortcode Options
 */
add_action( 'init', 'havnor_job_detail_list_vc_map' );
if ( ! function_exists( 'havnor_job_detail_list_vc_map' ) ) {
  function havnor_job_detail_list_vc_map() {
    vc_map( array(
      "name" => __( "Job Detail List", 'havnor-core'),
      "base" => "hanor_job_detail_section",
      "description" => __( "Job Detail List Section", 'havnor-core'),
      "icon" => "fa fa-black-tie color-red",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        // Job Detail Sections
        array(
          'type' => 'dropdown',
          'heading' => __( 'Job Detail List Style', 'havnor-core' ),
          'value' => array(
            __( 'Style One ( Icon & Dropshadow)', 'havnor-core' )    => 'job-style-one',
            __( 'Style Two ( With Details )', 'havnor-core' ) => 'job-style-two',
          ),
          'admin_label' => true,
          'param_name' => 'job_deatil_list_style',
          'description' => __( 'Select your job detail list style.', 'havnor-core' ),
        ),
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Job Detail List', 'havnor-core' ),
          'param_name' => 'job_detail_sections',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              "type"      => 'vt_icon',
              "heading"   => __('Upload Icon', 'havnor-core'),
              "param_name" => "job_detail_icon",
              "value"      => "",
              "description" => __( "Set your job detail icon.", 'havnor-core'),
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Job Detail List Title', 'havnor-core'),
              "param_name" => "job_detail_title",
              "value"      => "",
              "description" => __( "Enter your job detail title.", 'havnor-core'),
              'admin_label' => true,
            ),
             array(
              "type"      => 'textfield',
              "heading"   => __('Job Detail List Subtitle', 'havnor-core'),
              "param_name" => "job_detail_subtitle",
              "value"      => "",
              "description" => __( "Enter your job detail subtitle.", 'havnor-core'),
            ),
           )
        ),
        HavnorLib::vt_class_option(),
        // Style
        HavnorLib::vt_notice_field(__( " Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        // Title Styling
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Color', 'havnor-core'),
          "param_name" => "title_color",
          "value"      => "",
          "description" => __( "Pick your title color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Size', 'havnor-core'),
          "param_name" => "title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        // Subtitle Stylings
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Subtitle Color', 'havnor-core'),
          "param_name" => "subtitle_color",
          "value"      => "",
          "description" => __( "Pick your subtitle color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Subtitle Size', 'havnor-core'),
          "param_name" => "subtitle_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        // Icon Style
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Icon Color', 'havnor-core'),
          "param_name" => "icon_color",
          "value"      => "",
          "description" => __( "Pick your icon color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
           'dependency' => array(
            'element' => 'job_deatil_list_style',
            'value' => 'job-style-one',
          ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Icon Size', 'havnor-core'),
          "param_name" => "icon_size",
          "value"      => "",
          "description" => __( "Enter the numeric content for value size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'job_deatil_list_style',
            'value' => 'job-style-one',
          ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'List Background Color', 'havnor-core' ),
          'description' => __( 'Pick list background color.', 'havnor-core' ),
          'group' => __( 'Style', 'havnor-core' ),
          'param_name' => 'form_bg_color',
          'dependency' => array(
              'element' => 'job_deatil_list_style',
              'value' => 'job-style-one',
            ),
           'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

      )
    ) );
  }
}
