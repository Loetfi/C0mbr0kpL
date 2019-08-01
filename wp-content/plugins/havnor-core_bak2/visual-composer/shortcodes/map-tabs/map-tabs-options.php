<?php
/**
 * Map Tabs - Shortcode Options
 */
add_action( 'init', 'map_tabs_vc_map' );
if ( ! function_exists( 'map_tabs_vc_map' ) ) {
 function map_tabs_vc_map() {
   vc_map( array(
     "name" => __( "Map Tabs", 'havnor-core'),
     "base" => "havnor_map_tabs",
     "description" => __( "Map Tabs Group", 'havnor-core'),
     "as_parent" => array('only' => 'hanor_gmap'),
     "content_element" => true,
     "is_container" => true,
     "icon" => "fa fa-map color-blue",
     "category" => HavnorLib::havnor_cat_name(),
     "params" => array(

        // Param Group
        array(
          'type'       => 'param_group',
          'heading'    => __( 'Address Content', 'havnor-core' ),
          'param_name' => 'address_content',
          'value'      => urlencode( json_encode( array(
            array(
              'title' => __( 'New York', 'havnor-core' ),
              'tab_id' => 'map-id-1',
              'content_text' => '21H, Loyal Street, Downtown, New York, NY 0008',
              'address_links' => '[havnor_simple_lists][havnor_simple_list need_link="1" list_text="www.company.com" list_text_link="www.company.com"][havnor_simple_list need_link="1" list_text="(+1) 123 900 4567" list_text_link="+11239004567"][/havnor_simple_lists]',
            ),
            array(
              'title' => __( 'London', 'havnor-core' ),
              'tab_id' => 'map-id-2',
              'content_text' => '21H, Loyal Street, Downtown, New York, NY 0008',
              'address_links' => '[havnor_simple_lists][havnor_simple_list need_link="1" list_text="www.company.com" list_text_link="www.company.com"][havnor_simple_list need_link="1" list_text="(+1) 123 900 4567" list_text_link="+11239004567"][/havnor_simple_lists]',
            ),
            array(
              'title' => __( 'Germany', 'havnor-core' ),
              'tab_id' => 'map-id-3',
              'content_text' => '21H, Loyal Street, Downtown, New York, NY 0008',
              'address_links' => '[havnor_simple_lists][havnor_simple_list need_link="1" list_text="www.company.com" list_text_link="www.company.com"][havnor_simple_list need_link="1" list_text="(+1) 123 900 4567" list_text_link="+11239004567"][/havnor_simple_lists]',
            ),
            array(
              'title' => __( 'France', 'havnor-core' ),
              'tab_id' => 'map-id-4',
              'content_text' => '21H, Loyal Street, Downtown, New York, NY 0008',
              'address_links' => '[havnor_simple_lists][havnor_simple_list need_link="1" list_text="www.company.com" list_text_link="www.company.com"][havnor_simple_list need_link="1" list_text="(+1) 123 900 4567" list_text_link="+11239004567"][/havnor_simple_lists]',
            )
          ) ) ),
          'params'     => array(
            array(
              'type'        => 'textfield',
              'heading'     => __( 'Title', 'havnor-core' ),
              'param_name'  => 'title',
              'description' => __( 'Enter title for chart dataset.', 'havnor-core' ),
              'admin_label' => true,
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type'        => 'textfield',
              'heading'     => __( 'Tab ID', 'havnor-core' ),
              'param_name'  => 'tab_id',
              'description' => __( 'Enter this tab id. Use this same id in google map shortcode to view in this tab control.', 'havnor-core' ),
              'admin_label' => true,
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type'        => 'textarea',
              'heading'     => __( 'Address', 'havnor-core' ),
              'param_name'  => 'content_text',
            ),
            array(
              "type"        => "notice",
              "heading"     => __( "Address Links Shortcode", 'havnor-core' ),
              "param_name"  => 'api_key',
              'class'       => 'cs-info',
              'value'       => '',
              'description' => __( '<b>[havnor_simple_lists][havnor_simple_list need_link="1" list_text="Your Text" list_text_link="Your Link"][havnor_simple_list need_link="1" list_text="Your Text" list_text_link="Your Link"][/havnor_simple_lists]</b>', 'havnor-core' ),
            ),
            array(
              'type'        => 'textarea',
              'heading'     => __( 'Address Links', 'havnor-core' ),
              'param_name'  => 'address_links',
            ),

            
          )
        ),
        // Param Groups
        array(
          'type'        => 'textfield',
          'heading'     => __('Map Height', 'havnor-core'),
          'param_name'  => 'map_height',
          'value'       => '',
        ),
        HavnorLib::vt_class_option(),
        // Design Tab
        array(
          "type" => "css_editor",
          "heading" => __( "Text Size", 'havnor-core' ),
          "param_name" => "css",
          "group" => __( "Design", 'havnor-core'),
        ),
     ),
     "js_view" => 'VcColumnView'
   ) );
  //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
  if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
      class WPBakeryShortCode_havnor_map_tabs extends WPBakeryShortCodesContainer {
      }
  }
  if ( class_exists( 'WPBakeryShortCode' ) ) {
      class WPBakeryShortCode_hanor_gmap extends WPBakeryShortCode {
      }
  }
 }
}
