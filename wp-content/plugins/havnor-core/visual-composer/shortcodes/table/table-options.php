<?php
/**
 * Call To Action - Shortcode Options
 */
add_action( 'init', 'havnor_table_vc_map' );
if ( ! function_exists( 'havnor_table_vc_map' ) ) {
  function havnor_table_vc_map() {
    vc_map( array(
      "name" => __( "Table", 'havnor-core'),
      "base" => "havnor_table",
      "description" => __( "Eats Table", 'havnor-core'),
      "content_element" => true,
      "as_parent" => array('only' => 'havnor_table_row'),
      // "show_settings_on_create" => false,
      "is_container" => true,
      "icon" => "fa fa-table color-brown",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        HavnorLib::vt_class_option(),
        // List of features
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Table Head', 'havnor-core' ),
          'param_name' => 'table_head',
          'params' => array(
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Title', 'havnor-core' ),
              'param_name' => 'table_head_title',
              'admin_label' => true,
            ),

          )
        ),
      ),
      "js_view" => 'VcColumnView'
    ) );
     //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_havnor_table extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_havnor_table_row extends WPBakeryShortCode {
        }
    }
  }
}
