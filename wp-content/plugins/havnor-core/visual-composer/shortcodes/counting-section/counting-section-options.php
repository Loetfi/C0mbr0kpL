<?php
/**
 * Counting Section - Shortcode Options
 */
add_action( 'init', 'counting_section_vc_map' );
if ( ! function_exists( 'counting_section_vc_map' ) ) {
  function counting_section_vc_map() {
    vc_map( array(
      "name" => __( "Counting Section", 'havnor-core'),
      "base" => "hanor_counting_section",
      "description" => __( "Counting Sections", 'havnor-core'),
      "icon" => "fa fa-bars color-blue",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        HavnorLib::vt_notice_field(__( "Counting Content Area", 'havnor-core' ),'cntara_opt','cs-warning', ''), // Notice

        // Counting Sections
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Counting Sections', 'havnor-core' ),
          'param_name' => 'counting_logos',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Counting Value', 'havnor-core' ),
              'param_name' => 'counting_value',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Counting Title', 'havnor-core' ),
              'param_name' => 'counting_title',
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Counting Content', 'havnor-core' ),
              'param_name' => 'counting_content',
            )
          ) 
        ),
        HavnorLib::vt_class_option(),

        // Style
        HavnorLib::vt_notice_field(__( "Content Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Counter Value Color', 'havnor-core'),
          "param_name" => "value_color",
          "value"      => "",
          "description" => __( "Pick your counting value color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Counter Value Size', 'havnor-core'),
          "param_name" => "value_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for value size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Color', 'havnor-core'),
          "param_name" => "title_color",
          "value"      => "",
          "description" => __( "Pick your heading color.", 'havnor-core'),
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
         array(
          "type"      => 'colorpicker',
          "heading"   => __('Content Color', 'havnor-core'),
          "param_name" => "content_color",
          "value"      => "",
          "description" => __( "Pick your content color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Content Size', 'havnor-core'),
          "param_name" => "content_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for content size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

      )
    ) );
  }
}
