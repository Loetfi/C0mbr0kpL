<?php
/**
 *Road To Success Section - Shortcode Options
 */
add_action( 'init', 'havnor_road_to_success_vc_map' );
if ( ! function_exists( 'havnor_road_to_success_vc_map' ) ) {
  function havnor_road_to_success_vc_map() {
    vc_map( array(
      "name" => __( "Road To Success", 'havnor-core'),
      "base" => "hanor_road_to_success",
      "description" => __( "Road To Success Sections", 'havnor-core'),
      "icon" => "fa fa-road color-yellow",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        // Road To Success Sections
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Road To Success Sections', 'havnor-core' ),
          'param_name' => 'road_to_successs',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              "type"      => 'vt_icon',
              "heading"   => __('Upload Icon', 'havnor-core'),
              "param_name" => "success_icon",
              "value"      => "",
              "description" => __( "Set your feature icon.", 'havnor-core'),
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Road To Success Section Title', 'havnor-core'),
              "param_name" => "success_title",
              "value"      => "",
              "description" => __( "Enter your section title.", 'havnor-core'),
              'admin_label' => true,
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Success Title Link', 'havnor-core' ),
              'param_name' => 'success_title_link',
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Success Content', 'havnor-core' ),
              'param_name' => 'success_content',
            )
          ) 
        ),
        HavnorLib::vt_open_link_tab(),
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
          "type"      => 'textfield',
          "heading"   => __('Title Font Weight', 'havnor-core'),
          "param_name" => "title_weight",
          "value"      => "",
          "description" => __( "Enter the numeric value for title font weight.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        HavnorLib::vt_notice_field(__( "Icon Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Icon Color', 'havnor-core'),
          "param_name" => "icon_color",
          "value"      => "",
          "description" => __( "Pick your icon color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Icon Size', 'havnor-core'),
          "param_name" => "icon_size",
          "value"      => "",
          "description" => __( "Enter the numeric value size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Icon Background Color', 'havnor-core'),
          "param_name" => "icon_bg_color",
          "value"      => "",
          "description" => __( "Pick your icon background color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        HavnorLib::vt_notice_field(__( "Content Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Style'), // Notice
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
        HavnorLib::vt_notice_field(__( "Section Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        // Section Background Color
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Section Background Color', 'havnor-core'),
          "param_name" => "section_bg_color",
          "value"      => "",
          "description" => __( "Pick your icon background color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

      )
    ) );
  }
}
