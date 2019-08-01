<?php
/**
 * About Me - Shortcode Options
 */
add_action( 'init', 'havnor_about_me_vc_map' );
if ( ! function_exists( 'havnor_about_me_vc_map' ) ) {
  function havnor_about_me_vc_map() {
    vc_map( array(
      "name" => __( "About Me", 'havnor-core'),
      "base" => "havnor_about_me",
      "description" => __( "About Me Shortcodes", 'havnor-core'),
      "icon" => "fa fa-book color-slate-blue",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          "type" => "checkbox",
          "heading" => __( "Toggle Align?", 'havnor-core' ),
          "param_name" => "tog_align",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload About Me Image', 'havnor-core'),
          "param_name" => "about_me_image",
          "value"      => "",
          "description" => __( "Set your about me image.", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('About Me Title', 'havnor-core'),
          "param_name" => "about_me_title",
          "value"      => "",
          "description" => __( "Enter your about me title.", 'havnor-core'),
          'admin_label' => true,
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('About Me Designation', 'havnor-core'),
          "param_name" => "about_me_designation",
          "value"      => "",
          "description" => __( "Enter your about me designation.", 'havnor-core'),
        ),
        // Social Icons
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Social Icons', 'havnor-core' ),
          'param_name' => 'social_icons',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'vt_icon',
              'value' => '',
              "admin_label"=> true,
              'heading' => __( 'Upload Icon', 'havnor-core' ),
              'param_name' => 'social_icon',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Social Link', 'havnor-core' ),
              'param_name' => 'social_link',
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
          )
        ),
        array(
          "type"      => 'textarea',
          "heading"   => __('About Me Content', 'havnor-core'),
          "param_name" => "about_me_content",
          "value"      => "",
          "description" => __( "Enter your about me content.", 'havnor-core'),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Button Text', 'havnor-core'),
          "param_name" => "btn_text",
          "value"      => "",
          "description" => __( "Enter your link text.", 'havnor-core'),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Button Link', 'havnor-core'),
          "param_name" => "btn_link",
          "value"      => "",
          "description" => __( "Enter your button link.", 'havnor-core'),
        ),

        HavnorLib::vt_class_option(),

        // Style
        HavnorLib::vt_notice_field(__( "Title Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Background Color', 'havnor-core'),
          "param_name" => "main_bg_color",
          "value"      => "",
          "description" => __( "Pick your background color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
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
          "heading"   => __('Designation Color', 'havnor-core'),
          "param_name" => "designation_color",
          "value"      => "",
          "description" => __( "Pick your designation color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Designation Size', 'havnor-core'),
          "param_name" => "designation_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for designation size in px.", 'havnor-core'),
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
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Icon Hover Color', 'havnor-core'),
          "param_name" => "icon_hover_color",
          "value"      => "",
          "description" => __( "Pick your icon hover color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Icon Size', 'havnor-core'),
          "param_name" => "icon_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for icon size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
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
          "description" => __( "Enter the numeric content for value size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        // Btn Button
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Color", 'havnor-core' ),
          "param_name" => "text_color",
          'value' => '',
          "group" => __( "Button", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Color", 'havnor-core' ),
          "param_name" => "bg_color",
          'value' => '',
          "group" => __( "Button", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Color", 'havnor-core' ),
          "param_name" => "border_color",
          'value' => '',
          "group" => __( "Button", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Hover Color", 'havnor-core' ),
          "param_name" => "text_hover_color",
          'value' => '',
          "group" => __( "Button", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Hover Color", 'havnor-core' ),
          "param_name" => "bg_hover_color",
          'value' => '',
          "group" => __( "Button", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Hover Color", 'havnor-core' ),
          "param_name" => "border_hover_color",
          'value' => '',
          "group" => __( "Button", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Text Size", 'havnor-core' ),
          "param_name" => "text_size",
          'value' => '',
          "description" => __( "Enter button text font size. [Eg: 14px]", 'havnor-core'),
          "group" => __( "Button", 'havnor-core'),
        ),

      )
    ) );
  }
}
