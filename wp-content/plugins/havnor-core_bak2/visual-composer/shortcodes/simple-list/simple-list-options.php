<?php
/**
 * Simple List - Shortcode Options
 */
add_action( 'init', 'simple_list_vc_map' );
if ( ! function_exists( 'simple_list_vc_map' ) ) {
  function simple_list_vc_map() {
    vc_map( array(
      "name" => __( "Simple List", 'havnor-core'),
      "base" => "hanor_simple_list",
      "description" => __( "Simple List Section", 'havnor-core'),
      "icon" => "fa fa-list-ul color-orange",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        // Feature Sections
        array(
          'type' => 'dropdown',
          'heading' => __( 'Simple List', 'havnor-core' ),
          'value' => array(
            __( 'Style One (With Tick)', 'havnor-core' )    => 'style-one',
            __( 'Style Two ( With Dot )', 'havnor-core' ) => 'style-two',
          ),
          'admin_label' => true,
          'param_name' => 'simple_list_style',
          'description' => __( 'Select your simple list style.', 'havnor-core' ),
        ),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Tick Image', 'havnor-core'),
          "param_name" => "tick_image",
          "value"      => "",
          'dependency' => array(
            'element' => 'simple_list_style',
            'value' => 'style-one',
          ),
          "description" => __( "Set your accordion tick image.", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Open New Tab?", 'havnor-core' ),
          "param_name" => "open_link",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        // Simple List Section
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Simple List Sections', 'havnor-core' ),
          'param_name' => 'simple_list_images',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'List Title', 'havnor-core' ),
              'param_name' => 'list_title',
              'admin_label' => true,
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'List Subtitle', 'havnor-core' ),
              'param_name' => 'list_subtitle',
              'dependency' => array(
                'element' => 'simple_list_style',
                'value' => 'style-one',
              ),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'List Subtitle Link', 'havnor-core' ),
              'param_name' => 'list_subtitle_link',
              'dependency' => array(
                'element' => 'simple_list_style',
                'value' => 'style-one',
              ),
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'List Content', 'havnor-core' ),
              'param_name' => 'list_content',
            ),
          ) 
        ), 

        // Title
        HavnorLib::vt_notice_field(__( "Title Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Styling'), // Notice
        array(
          "type" => "colorpicker",
          "heading" => __( "List Title Color", 'havnor-core' ),
          "param_name" => "title_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Pick your title color.", 'havnor-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "List Title Size", 'havnor-core' ),
          "param_name" => "title_size",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter the numeric value for title size in px.", 'havnor-core'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Sub Title Color", 'havnor-core' ),
          "param_name" => "subtitle_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
           "description" => __( "Pick your subtitle color.", 'havnor-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Sub Title Size", 'havnor-core' ),
          "param_name" => "subtitle_size",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter the numeric value for subtitle size in px.", 'havnor-core'),
        ), 
        array(
          "type" => "colorpicker",
          "heading" => __( "Subtitle Hover Color", 'havnor-core' ),
          "param_name" => "subtitle_hover_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
           "description" => __( "Pick your subtitle hover color.", 'havnor-core'),
        ), 
        HavnorLib::vt_notice_field(__( "Content Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Styling'), // Notice
        array(
          "type" => "colorpicker",
          "heading" => __( "List Content Color", 'havnor-core' ),
          "param_name" => "content_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
           "description" => __( "Pick your content color.", 'havnor-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "List Content Size", 'havnor-core' ),
          "param_name" => "content_size",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter the numeric value for content size in px.", 'havnor-core'),
        ), 
        array(
          "type" => "colorpicker",
          "heading" => __( "List Bullet Color", 'havnor-core' ),
          "param_name" => "bullet_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
           "description" => __( "Pick your bullet color.", 'havnor-core'),
          'dependency' => array(
            'element' => 'simple_list_style',
            'value' => 'style-two',
          ),
        ),
        // Spacings
        HavnorLib::vt_notice_field(__( "Spacings", 'havnor-core' ),'tle_opt','cs-warning', 'Styling'), // Notice
        array(
          "type" => "textfield",
          "heading" => __( "List Item Top Space", 'havnor-core' ),
          "param_name" => "list_top",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter the numeric value for top space size in px.", 'havnor-core'),
        ), 
        array(
          "type" => "textfield",
          "heading" => __( "List Item Bottom Space", 'havnor-core' ),
          "param_name" => "list_btm",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter the numeric value for bottom space size in px.", 'havnor-core'),
        ), 
        array(
          "type" => "textfield",
          "heading" => __( "List Item Left Space", 'havnor-core' ),
          "param_name" => "list_left",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter the numeric value for left space size in px.", 'havnor-core'),
        ), 
        HavnorLib::vt_class_option(),
      )
    ) );
  }
}
