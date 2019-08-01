<?php
/**
 *Feature Section - Shortcode Options
 */
add_action( 'init', 'havnor_feature_section_vc_map' );
if ( ! function_exists( 'havnor_feature_section_vc_map' ) ) {
  function havnor_feature_section_vc_map() {
    vc_map( array(
      "name" => __( "Features", 'havnor-core'),
      "base" => "hanor_feature_section",
      "description" => __( "Feature Sections", 'havnor-core'),
      "icon" => "fa fa-shield color-blue",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        HavnorLib::vt_open_link_tab(),
        // Feature Sections
        array(
          'type' => 'dropdown',
          'heading' => __( 'Features Style', 'havnor-core' ),
          'value' => array(
            __( 'Style One ( Icon & Title )', 'havnor-core' )    => 'style-one',
            __( 'Style Two ( Title )', 'havnor-core' ) => 'style-two',
          ),
          'admin_label' => true,
          'param_name' => 'features_style',
          'description' => __( 'Select your fetaure style.', 'havnor-core' ),
        ),
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Feature Sections', 'havnor-core' ),
          'param_name' => 'feature_sections',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              "type"      => 'vt_icon',
              "heading"   => __('Upload Icon', 'havnor-core'),
              "param_name" => "feature_icon",
              "value"      => "",
              "description" => __( "Set your feature icon.", 'havnor-core'),
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Feature Section Title', 'havnor-core'),
              "param_name" => "feature_title",
              "value"      => "",
              "description" => __( "Enter your feature title.", 'havnor-core'),
              'admin_label' => true,
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Feature Link', 'havnor-core' ),
              'param_name' => 'feature_link',
            )
          ) 
        ),
        HavnorLib::vt_class_option(),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Column Option', 'havnor-core' ),
          'value' => array(
            __( 'Select Column ', 'havnor-core' )    => 'select-column',
            __( 'One Column ', 'havnor-core' )    => 'one-column',
            __( 'Two Column ', 'havnor-core' ) => 'two-column',
            __( 'Three Column ', 'havnor-core' ) => 'three-column',
            __( 'Four Column ', 'havnor-core' ) => 'four-column',
            __( 'Five Column ', 'havnor-core' ) => 'five-column',
          ),
          'admin_label' => true,
          'param_name' => 'column_option',
          'description' => __( 'Select your Feature columns.', 'havnor-core' ),
        ),

        // Style
        HavnorLib::vt_notice_field(__( " Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Style'), // Notice
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
          "type"      => 'colorpicker',
          "heading"   => __('Icon Color', 'havnor-core'),
          "param_name" => "icon_color",
          "value"      => "",
          "description" => __( "Pick your icon color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
           'dependency' => array(
            'element' => 'features_style',
            'value' => 'style-one',
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
            'element' => 'features_style',
            'value' => 'style-one',
          ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Hover Underline Color', 'havnor-core'),
          "param_name" => "hover_undrln_color",
          "value"      => "",
          "description" => __( "Pick your hover underline color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        // Spacings
        array(
          "type"      => 'textfield',
          "heading"   => __('Feature Padding ', 'havnor-core'),
          "param_name" => "feature_padding",
          "value"      => "",
          "description" => __( "Enter the padding value size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
         array(
          "type"      => 'textfield',
          "heading"   => __('Feature Content Padding ', 'havnor-core'),
          "param_name" => "feature_content_padding",
          "value"      => "",
          "description" => __( "Enter the padding value size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

      )
    ) );
  }
}
