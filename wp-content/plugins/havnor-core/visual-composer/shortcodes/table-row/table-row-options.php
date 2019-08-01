<?php
/**
 * Table Row - Shortcode Options
 */
add_action( 'init', 'havnor_table_row_vc_map' );
if ( ! function_exists( 'havnor_table_row_vc_map' ) ) {
  function havnor_table_row_vc_map() {
    vc_map( array(
      "name" => __( "Table Row", 'lions-core'),
      "base" => "havnor_table_row",
      "as_child" => array('only' => 'havnor_plan_features'),
      "description" => __( "Table Row Styles", 'lions-core'),
      "icon" => "fa fa-list-ol color-orange",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        HavnorLib::vt_class_option(),
        // List of features
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Single Row', 'lions-core' ),
          'param_name' => 'single_table_row',
          'params' => array(
            
            array(
              'type' => 'dropdown',
              'heading' => __( 'Row Tag', 'lions-core' ),
              'value' => array(
                __( 'Default', 'lions-core' ) => 'default',
                __( 'Low', 'lions-core' ) => 'low',
                __( 'High', 'lions-core' ) => 'high',
              ),
              'param_name' => 'row_tag',
              'description' => __( 'Select row tag.', 'lions-core' ),
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Row Content', 'lions-core' ),
              'param_name' => 'row_content',
              'admin_label' => true,
            ),  
          )
        ),
      )
    ) );
  }
}
