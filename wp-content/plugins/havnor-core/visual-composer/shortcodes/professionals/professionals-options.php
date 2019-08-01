<?php
/**
 * Professionals - Shortcode Options
 */
add_action( 'init', 'havnor_professionals_vc_map' );
if ( ! function_exists( 'havnor_professionals_vc_map' ) ) {
  function havnor_professionals_vc_map() {
    vc_map( array( 
      "name" => __( "Professionals", 'havnor-core'),
      "base" => "havnor_professionals",
      "description" => __( "Professionals Shortcodes", 'havnor-core'),
      "icon" => "fa fa-black-tie color-red",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Professionals Image', 'havnor-core'),
          "param_name" => "professionals_image",
          "value"      => "",
          "description" => __( "Set your professionals image.", 'havnor-core'),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Professionals Title', 'havnor-core'),
          "param_name" => "professionals_title",
          "value"      => "",
          "description" => __( "Enter your professionals title.", 'havnor-core'),
          'admin_label' => true,
        ),
        array(
          "type"      => 'textarea',
          "heading"   => __('Professionals Content', 'havnor-core'),
          "param_name" => "professionals_content",
          "value"      => "",
          "description" => __( "Enter your professionals content.", 'havnor-core'),
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
      )
    ) );
  }
}
