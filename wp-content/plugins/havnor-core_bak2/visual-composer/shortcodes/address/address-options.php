<?php
/**
 * Address - Shortcode Options
 */
add_action( 'init', 'havnor_address_vc_map' );
if ( ! function_exists( 'havnor_address_vc_map' ) ) {
  function havnor_address_vc_map() {
    vc_map( array( 
      "name" => __( "Address", 'havnor-core'),
      "base" => "havnor_address",
      "description" => __( "Address Shortcodes", 'havnor-core'),
      "icon" => "fa fa-map-signs color-brown",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Icon Style', 'havnor-core' ),
          'value' => array(
            __( 'Image', 'havnor-core' ) => 'icon-img',
            __( 'Icon', 'havnor-core' )  => 'icon-ico',
          ),
          'param_name' => 'address_icon_style',
          'description' => __( 'Select your address icon style.', 'havnor-core' ),
        ),
        array(
          "type"      => 'vt_icon',
          "heading"   => __('Set Icon', 'havnor-core'),
          "param_name" => "address_icon",
          "value"      => "",
          "description" => __( "Set your address icon.", 'havnor-core'),
          'dependency' => array(
            'element' => 'address_icon_style',
            'value' => array('icon-ico'),
          ),
        ),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Icon Image', 'havnor-core'),
          "param_name" => "address_icon_image",
          "value"      => "",
          "description" => __( "Set your address icon image.", 'havnor-core'),
          'dependency' => array(
            'element' => 'address_icon_style',
            'value' => array('icon-img'),
          ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Address Title', 'havnor-core'),
          "param_name" => "address_title",
          "value"      => "",
          "description" => __( "Enter your address title.", 'havnor-core'),
          'admin_label' => true,
        ),
        array(
          "type"      => 'textarea',
          "heading"   => __('Content', 'havnor-core'),
          "param_name" => "address_content",
          "value"      => "",
          "description" => __( "Enter your address content here.", 'havnor-core'),
        ),

        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Lists', 'havnor-core' ),
          'param_name' => 'list_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Text', 'havnor-core' ),
              'param_name' => 'list_text',
              'admin_label' => true,
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Text Link', 'havnor-core' ),
              'param_name' => 'text_link',
            ),
            array(
              "type" => "checkbox",
              "heading" => __( "Open New Tab?", 'havnor-core' ),
              "param_name" => "open_link",
              "std" => false,
              'value' => '',
              "on_text" => __( "Yes", 'havnor-core' ),
              "off_text" => __( "No", 'havnor-core' ),
            ),

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
          "type"      => 'textfield',
          "heading"   => __('Title Font Weight', 'havnor-core'),
          "param_name" => "title_weight",
          "value"      => "",
          "description" => __( "Enter the numeric value for title font weight.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Link Hover Color', 'havnor-core'),
          "param_name" => "link_hover_color",
          "value"      => "",
          "description" => __( "Pick your link hover color.", 'havnor-core'),
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
          "description" => __( "Enter the numeric value for content size in px.", 'havnor-core'),
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
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Icon Size', 'havnor-core'),
          "param_name" => "icon_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for icon size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
         HavnorLib::vt_notice_field(__( "Section Spacing", 'havnor-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        // Section Space
          array(
          "type"      => 'textfield',
          "heading"   => __('Section Top Space', 'havnor-core'),
          "param_name" => "section_top_space",
          "value"      => "",
          "description" => __( "Enter the numeric value for section top space in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Section Bottom Space', 'havnor-core'),
          "param_name" => "section_bottom_space",
          "value"      => "",
          "description" => __( "Enter the numeric value for  section bottom space in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

      )
    ) );
  }
}
