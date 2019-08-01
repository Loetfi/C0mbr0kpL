<?php
/**
 * List - Shortcode Options
 */
add_action( 'init', 'havnor_list_vc_map' );
if ( ! function_exists( 'havnor_list_vc_map' ) ) {
  function havnor_list_vc_map() {
    vc_map( array(
      "name" => __( "List", 'havnor-core'),
      "base" => "hanor_list",
      "description" => __( "List Styles", 'havnor-core'),
      "icon" => "fa fa-list color-red",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'List Style', 'havnor-core' ),
          'value' => array(
            __( 'Style One (Image or Icon)', 'havnor-core' ) => 'hanor-list-one',
            __( 'Style Two (Simple Circle)', 'havnor-core' ) => 'hanor-list-two',
            __( 'Style Three (Contact Section)', 'havnor-core' ) => 'hanor-list-three',
            __( 'Style Four (Person Details)', 'havnor-core' ) => 'hanor-list-four',
          ),
          'admin_label' => true,
          'param_name' => 'list_style',
          'description' => __( 'Select your list style.', 'havnor-core' ),
        ),
        // List
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Lists', 'havnor-core' ),
          'param_name' => 'list_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'dropdown',
              'value' => array(
                __( 'Icon', 'havnor-core' ) => 'list_icon',
                __( 'Image', 'havnor-core' ) => 'list_image',
              ),
              'heading' => __( 'Icon or Image', 'havnor-core' ),
              'param_name' => 'icon_image',
            ),
            array(
              'type' => 'vt_icon',
              'value' => '',
              'heading' => __( 'Select Icon', 'havnor-core' ),
              'param_name' => 'select_icon',
              'dependency' => array(
                'element' => 'icon_image',
                'value' => 'list_icon',
              ),
            ),
            array(
              'type' => 'attach_image',
              'value' => '',
              'heading' => __( 'Upload Icon Image', 'havnor-core' ),
              'param_name' => 'select_image',
              'dependency' => array(
                'element' => 'icon_image',
                'value' => 'list_image',
              ),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'admin_label' => true,
              'heading' => __( 'Title', 'havnor-core' ),
              'param_name' => 'list_title',
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
          'heading' => __( 'Bullet/Icon Color', 'havnor-core' ),
          'param_name' => 'icon_color',
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
          'heading' => __( 'Bullet/Icon Size', 'havnor-core' ),
          'param_name' => 'icon_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Color', 'havnor-core' ),
          'param_name' => 'title_color',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Pick your title color.', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title Size', 'havnor-core' ),
          'param_name' => 'title_size',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter the px value if you used title area in list style type one.', 'havnor-core' ),
        ),
      )
    ) );
  }
}
