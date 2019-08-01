<?php
/**
 * Get App - Shortcode Options
 */
add_action( 'init', 'havnor_app_vc_map' );
if ( ! function_exists( 'havnor_app_vc_map' ) ) {
  function havnor_app_vc_map() {
    vc_map( array( 
      "name" => __( "Get App", 'havnor-core'),
      "base" => "havnor_app",
      "description" => __( "Get App Shortcodes", 'havnor-core'),
      "icon" => "fa fa-apple color-orange",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          "type"      => 'textfield',
          "heading"   => __('Get App Title', 'havnor-core'),
          "param_name" => "app_title",
          "value"      => "",
          "description" => __( "Enter your app title.", 'havnor-core'),
          'admin_label' => true,
        ),
        array(
          "type"      => 'textarea',
          "heading"   => __('Get App Content', 'havnor-core'),
          "param_name" => "app_content",
          "value"      => "",
          "description" => __( "Enter your app content.", 'havnor-core'),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'App Stars', 'havnor-core' ),
          'value' => array(
            __( '1', 'havnor-core' ) => '1',
            __( '2', 'havnor-core' ) => '2',
            __( '3', 'havnor-core' ) => '3',
            __( '4', 'havnor-core' ) => '4',
            __( '5', 'havnor-core' ) => '5',
          ),
          'admin_label' => true,
          'param_name' => 'app_stars',
          'description' => __( 'Select app stars.', 'havnor-core' ),
        ),
        // App Images
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'App Images', 'havnor-core' ),
          'param_name' => 'app_images',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'attach_image',
              'value' => '',
              "admin_label"=> true,
              'heading' => __( 'Upload Image', 'havnor-core' ),
              'param_name' => 'app_logo',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'App Link', 'havnor-core' ),
              'param_name' => 'app_link',
            ),
            HavnorLib::vt_open_link_tab(),
          ) 
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
        HavnorLib::vt_notice_field(__( "Star Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Star Color', 'havnor-core'),
          "param_name" => "star_color",
          "value"      => "",
          "description" => __( "Pick your star color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
         array(
          "type"      => 'colorpicker',
          "heading"   => __('Star Active Color', 'havnor-core'),
          "param_name" => "star_active_color",
          "value"      => "",
          "description" => __( "Pick your star active color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
      )
    ) );
  }
}
