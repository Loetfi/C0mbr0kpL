<?php
/**
 * Client Carousel - Shortcode Options
 */
add_action( 'init', 'chart_section_vc_map' );
if ( ! function_exists( 'chart_section_vc_map' ) ) {
  function chart_section_vc_map() {
    vc_map( array(
      "name" => __( "Chart Image", 'havnor-core'),
      "base" => "hanor_chart_section",
      "description" => __( "Chart Image Section", 'havnor-core'),
      "icon" => "fa fa-shield color-green",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'attach_image',
          'value' => '',
          'heading' => __( 'Upload  Chart Image', 'havnor-core' ),
          'param_name' => 'select_image',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Chart Title", 'havnor-core' ),
          "param_name" => "title_text",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your section title.", 'havnor-core'),
        ),
        array(
          "type" => "textarea",
          "heading" => __( "Section Content", 'havnor-core' ),
          "param_name" => "content_text",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your section content.", 'havnor-core'),
        ),

        // Title
        HavnorLib::vt_notice_field(__( "Title & Content Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Styling'), // Notice
        array(
          "type" => "colorpicker",
          "heading" => __( "Title Color", 'havnor-core' ),
          "param_name" => "title_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Title Size", 'havnor-core' ),
          "param_name" => "title_size",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ), 
        // Content 
        array(
          "type" => "colorpicker",
          "heading" => __( "Content Color", 'havnor-core' ),
          "param_name" => "content_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Content Size", 'havnor-core' ),
          "param_name" => "content_size",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ), 
        // Seperator Color
        array(
          "type" => "colorpicker",
          "heading" => __( "Seperator Line Color", 'havnor-core' ),
          "param_name" => "sep_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        HavnorLib::vt_class_option(),
      )
    ) );
  }
}
