<?php
/**
 * Presentation Image - Shortcode Options
 */
add_action( 'init', 'havnor_presentation_image_vc_map' );
if ( ! function_exists( 'havnor_presentation_image_vc_map' ) ) {
  function havnor_presentation_image_vc_map() {
    vc_map( array(
      "name" => __( "Presentation Image", 'havnor-core'),
      "base" => "hanor_presentation_image",
      "description" => __( "Presentation Image Styles", 'havnor-core'),
      "icon" => "fa fa-image color-blue",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'attach_image',
          'value' => '',
          'heading' => __( 'Upload Icon Image', 'havnor-core' ),
          'param_name' => 'select_image',
          'admin_label' => true,
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Toggle Align", 'havnor-core' ),
          "param_name" => "toggle_align",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Right Side Align", 'havnor-core' ),
          "param_name" => "right_side",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        HavnorLib::vt_class_option(),
      )
    ) );
  }
}
