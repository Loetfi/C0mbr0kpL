<?php
/**
 * List - Shortcode Options
 */
add_action( 'init', 'havnor_rules_list_vc_map' );
if ( ! function_exists( 'havnor_rules_list_vc_map' ) ) {
  function havnor_rules_list_vc_map() {
    vc_map( array(
      "name" => __( "Rules List", 'havnor-core'),
      "base" => "hanor_rules_list",
      "description" => __( "Rules List Styles", 'havnor-core'),
      "icon" => "fa fa-list color-red",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        // List
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Rules Lists', 'havnor-core' ),
          'param_name' => 'list_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'textfield',
              'value' => '',
              'admin_label' => true,
              'heading' => __( 'List Number', 'havnor-core' ),
              'param_name' => 'list_number',
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Text', 'havnor-core' ),
              'param_name' => 'list_text',
            ),

          )
        ),
        HavnorLib::vt_class_option(),
        // Style
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Text Color', 'havnor-core' ),
          'param_name' => 'text_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Number Color', 'havnor-core' ),
          'param_name' => 'number_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Text Size', 'havnor-core' ),
          'param_name' => 'text_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Number Size', 'havnor-core' ),
          'param_name' => 'number_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),

      )
    ) );
  }
}
