<?php
/**
 * Experience - Shortcode Options
 */
add_action( 'init', 'havnor_experience_vc_map' );
if ( ! function_exists( 'havnor_experience_vc_map' ) ) {
  function havnor_experience_vc_map() {
    vc_map( array( 
      "name" => __( "Experience", 'havnor-core'),
      "base" => "havnor_experience",
      "description" => __( "Experience Shortcodes", 'havnor-core'),
      "icon" => "fa fa-balance-scale color-brown",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Icon Style', 'havnor-core' ),
          'value' => array(
            __( 'Image', 'havnor-core' ) => 'icon-img',
            __( 'Icon', 'havnor-core' )  => 'icon-ico',
          ),
          'param_name' => 'experience_icon_style',
          'description' => __( 'Select your experience icon style.', 'havnor-core' ),
        ),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Experience Image', 'havnor-core'),
          "param_name" => "experience_image",
          "value"      => "",
          "description" => __( "Set your experience icon image.", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'experience_icon_style',
            'value' => array('icon-img'),
          ),
        ),
        array(
          "type"      => 'vt_icon',
          "heading"   => __('Upload Experience Icon', 'havnor-core'),
          "param_name" => "experience_icon",
          "value"      => "",
          "description" => __( "Set your experience icon.", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'experience_icon_style',
            'value' => array('icon-ico'),
          ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Experience Title', 'havnor-core'),
          "param_name" => "experience_title",
          "value"      => "",
          "description" => __( "Enter your experience title.", 'havnor-core'),
          'admin_label' => true,
        ),
        array(
          "type"      => 'textarea',
          "heading"   => __('Experience Content', 'havnor-core'),
          "param_name" => "experience_content",
          "value"      => "",
          "description" => __( "Enter your experience content.", 'havnor-core'),
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
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Hover Color', 'havnor-core'),
          "param_name" => "title_hover_color",
          "value"      => "",
          "description" => __( "Pick your title hover color.", 'havnor-core'),
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
          "type"      => 'colorpicker',
          "heading"   => __('Content Hover Color', 'havnor-core'),
          "param_name" => "content_hover_color",
          "value"      => "",
          "description" => __( "Pick your content hover color.", 'havnor-core'),
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
        array(
          "type" => "colorpicker",
          "heading" => __( "Icon Color", 'havnor-core' ),
          "param_name" => "icon_color",
          'value' => '',
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Icon Hover Color", 'havnor-core' ),
          "param_name" => "icon_hover_color",
          'value' => '',
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Icon Size", 'havnor-core' ),
          "param_name" => "icon_size",
          'value' => '',
          "description" => __( "Enter button icon font size. [Eg: 14px]", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        HavnorLib::vt_notice_field(__( "Background Color", 'havnor-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Background Color', 'havnor-core'),
          "param_name" => "bg_color",
          "value"      => "",
          "description" => __( "Pick your section background color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Background Hover Color', 'havnor-core'),
          "param_name" => "bg_hover_color",
          "value"      => "",
          "description" => __( "Pick your section background hover color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Bottom Space', 'havnor-core'),
           "group" => __( "Style", 'havnor-core'),
          "param_name" => "experience_btm",
          "value"      => "",
          "description" => __( "Enter your experience bottom space.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
      )
    ) );
  }
}
