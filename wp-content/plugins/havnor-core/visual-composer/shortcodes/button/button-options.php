<?php
/**
 * Button - Shortcode Options
 */
add_action( 'init', 'havnor_button_vc_map' );
if ( ! function_exists( 'havnor_button_vc_map' ) ) {
  function havnor_button_vc_map() {
    vc_map( array(
      "name" => __( "Button", 'havnor-core'),
      "base" => "havnor_button",
      "description" => __( "Button Styles", 'havnor-core'),
      "icon" => "fa fa-mouse-pointer color-orange",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Button Align', 'havnor-core' ),
          'value' => array(
            __( 'Button Alignment', 'havnor-core' ) => '',
            __( 'Left', 'havnor-core' ) => 'left',
            __( 'Center', 'havnor-core' ) => 'center',
            __( 'Right', 'havnor-core' ) => 'right',
          ),
          'param_name' => 'button_align',
          'description' => __( 'Select button alignment', 'havnor-core' ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Text", 'havnor-core' ),
          "param_name" => "button_text",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your button text.", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "href",
          "heading" => __( "Button Link", 'havnor-core' ),
          "param_name" => "button_link",
          'value' => '',
          "description" => __( "Enter your button link.", 'havnor-core'),
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
        HavnorLib::vt_class_option(),

        // Styling
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Color", 'havnor-core' ),
          "param_name" => "text_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Color", 'havnor-core' ),
          "param_name" => "bgg_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Color", 'havnor-core' ),
          "param_name" => "border_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Hover Color", 'havnor-core' ),
          "param_name" => "text_hover_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Hover Color", 'havnor-core' ),
          "param_name" => "bg_hover_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Hover Color", 'havnor-core' ),
          "param_name" => "border_hover_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Border Radius", 'havnor-core' ),
          "param_name" => "border_radius",
          'value' => '',
          "description" => __( "Enter button border radius. [Eg: 14px]", 'havnor-core'),
          "group" => __( "Styling", 'havnor-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Text Size", 'havnor-core' ),
          "param_name" => "text_size",
          'value' => '',
          "description" => __( "Enter button text font size. [Eg: 14px]", 'havnor-core'),
          "group" => __( "Styling", 'havnor-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Top Space", 'havnor-core' ),
          "param_name" => "button_top_space",
          'value' => '',
          "description" => __( "Enter button top space. [Eg: 14px]", 'havnor-core'),
          "group" => __( "Styling", 'havnor-core'),
        ),

        // Icon
        array(
          "type" => "vt_icon",
          "heading" => __( "Select Icon", 'havnor-core' ),
          "param_name" => "select_icon",
          'value' => '',
          "description" => __( "Select icon if you want.", 'havnor-core'),
          "group" => __( "Icon", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Icon Size", 'havnor-core' ),
          "param_name" => "icon_size",
          'value' => '',
          "description" => __( "Enter icon size in px.", 'havnor-core'),
          "group" => __( "Icon", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Icon Color", 'havnor-core' ),
          "param_name" => "icon_color",
          'value' => '',
          "description" => __( "Pick your icon color.", 'havnor-core'),
          "group" => __( "Icon", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Icon Hover Color", 'havnor-core' ),
          "param_name" => "icon_hover_color",
          'value' => '',
          "description" => __( "Pick your icon hover color.", 'havnor-core'),
          "group" => __( "Icon", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        // Design Tab
        array(
          "type" => "css_editor",
          "heading" => __( "Text Size", 'havnor-core' ),
          "param_name" => "css",
          "group" => __( "Design", 'havnor-core'),
        ),

      )
    ) );
  }
}
