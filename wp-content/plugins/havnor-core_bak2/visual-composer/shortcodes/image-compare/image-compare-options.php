<?php
/**
 * Image Compare - Shortcode Options
 */
add_action( 'init', 'havnor_image_compare_vc_map' );
if ( ! function_exists( 'havnor_image_compare_vc_map' ) ) {
  function havnor_image_compare_vc_map() {
    vc_map( array(
      "name" => __( "Image Compare", 'havnor-core'),
      "base" => "hanor_image_compare",
      "description" => __( "Image Compare Styles", 'havnor-core'),
      "icon" => "fa fa-arrows-h color-red",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(
        array(
          'type' => 'attach_image',
          'value' => '',
          'heading' => __( 'Before Image', 'havnor-core' ),
          'param_name' => 'br_image',
          'admin_label' => true,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'attach_image',
          'value' => '',
          'heading' => __( 'After Image', 'havnor-core' ),
          'param_name' => 'ar_image',
          'admin_label' => true,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        HavnorLib::vt_class_option(),
      )
    ) );
  }
}
