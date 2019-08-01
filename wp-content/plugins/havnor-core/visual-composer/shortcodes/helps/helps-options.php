<?php
/**
 * Helps - Shortcode Options
 */
add_action( 'init', 'havnor_helps_vc_map' );
if ( ! function_exists( 'havnor_helps_vc_map' ) ) {
  function havnor_helps_vc_map() {
    vc_map( array(
      "name" => __( "Helps", 'havnor-core'),
      "base" => "havnor_helps",
      "description" => __( "Helps Shortcodes", 'havnor-core'),
      "icon" => "fa fa-question-circle color-green",
      "category" => HavnorLib::havnor_cat_name(),      
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Column', 'havnor-core' ),
          'value' => array(
            __( 'Three Column', 'havnor-core' ) => 'col-md-4',
            __( 'Four Column', 'havnor-core' )  => 'col-md-3',
          ),
          'param_name' => 'item_column',
          'description' => __( 'Select your helps icon style.', 'havnor-core' ),
        ),
        // Helps Items
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Helps Item', 'havnor-core' ),
          'param_name' => 'helps_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'dropdown',
              'heading' => __( 'Icon Style', 'havnor-core' ),
              'value' => array(
                __( 'Image', 'havnor-core' ) => 'icon-img',
                __( 'Icon', 'havnor-core' )  => 'icon-ico',
              ),
              'param_name' => 'helps_icon_style',
              'description' => __( 'Select your helps icon style.', 'havnor-core' ),
            ),
            array(
              "type"      => 'vt_icon',
              "heading"   => __('Set Icon', 'havnor-core'),
              "param_name" => "helps_icon",
              "value"      => "",
              "description" => __( "Set your helps icon.", 'havnor-core'),
              'dependency' => array(
                'element' => 'helps_icon_style',
                'value' => array('icon-ico'),
              ),
            ),
            array(
              "type"      => 'attach_image',
              "heading"   => __('Upload Icon Image', 'havnor-core'),
              "param_name" => "helps_icon_image",
              "value"      => "",
              "description" => __( "Set your helps icon image.", 'havnor-core'),
              'dependency' => array(
                'element' => 'helps_icon_style',
                'value' => array('icon-img'),
              ),
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Helps Title', 'havnor-core'),
              "param_name" => "helps_title",
              "value"      => "",
              "description" => __( "Enter your helps title.", 'havnor-core'),
              'admin_label' => true,
            ),
            array(
              "type"      => 'textarea',
              "heading"   => __('Helps Content', 'havnor-core'),
              "param_name" => "helps_content",
              "value"      => "",
              "description" => __( "Enter your helps content.", 'havnor-core'),
            ),
          )
        ),       
        HavnorLib::vt_class_option(),

        // Style
        HavnorLib::vt_notice_field(__( "Title Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Background Color', 'havnor-core'),
          "param_name" => "bg_color",
          "value"      => "",
          "description" => __( "Pick your background color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Border Color', 'havnor-core'),
          "param_name" => "border_color",
          "value"      => "",
          "description" => __( "Pick your border color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Background Hover Color', 'havnor-core'),
          "param_name" => "bg_hover_color",
          "value"      => "",
          "description" => __( "Pick your background hover color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
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

        array(
          "type"      => 'colorpicker',
          "heading"   => __('Icon Color', 'havnor-core'),
          "param_name" => "icon_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Icon Size', 'havnor-core'),
          "param_name" => "icon_size",
          "value"      => "",
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
      )
    ) );
  }
}
