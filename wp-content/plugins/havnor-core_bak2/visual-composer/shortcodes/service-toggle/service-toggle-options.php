<?php
/**
 * Service Toggle - Shortcode Options
 */
add_action( 'init', 'havnor_service_toggle_vc_map' );
if ( ! function_exists( 'havnor_service_toggle_vc_map' ) ) {
  function havnor_service_toggle_vc_map() {
    vc_map( array(
      "name" => __( "Service Toggle", 'havnor-core'),
      "base" => "hanor_service_toggle",
      "description" => __( "Service Toggle Styles", 'havnor-core'),
      "icon" => "fa fa-cog color-red",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        // Service Toggle
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Service Toggle', 'havnor-core' ),
          'param_name' => 'service_toggle_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'vt_icon',
              'value' => '',
              'heading' => __( 'Select Icon', 'havnor-core' ),
              'param_name' => 'select_icon',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'admin_label' => true,
              'heading' => __( 'Title', 'havnor-core' ),
              'param_name' => 'service_toggle_title',
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Text', 'havnor-core' ),
              'param_name' => 'service_toggle_text',
            ),
            array(
              "type"        => "notice",
              "heading"     => __( "Use Below List Shortcode For List", 'omnitail-core' ),
              "param_name"  => 'lft_opt',
              'class'       => 'cs-success',
              'value'       => '',
              "description" => __( '<b>[havnor_simple_lists]<br>[havnor_simple_list list_text="Your Text"]<br>[havnor_simple_list list_text="Your Text"]<br>[havnor_simple_list list_text="Your Text"]<br>[/havnor_simple_lists]</b>', 'havnor-core'),
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'List Shortcode', 'havnor-core' ),
              'param_name' => 'service_toggle_list',
            ),

          )
        ),
        HavnorLib::vt_class_option(),

        // Style
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Background Color', 'havnor-core' ),
          'param_name' => 'bg_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Border Color', 'havnor-core' ),
          'param_name' => 'border_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          "type"        => "notice",
          "heading"     => __( "Icon", 'omnitail-core' ),
          "param_name"  => 'lft_optt',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Icon Color', 'havnor-core' ),
          'param_name' => 'icon_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Iocn Size', 'havnor-core' ),
          'param_name' => 'icon_size',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => "notice",
          "heading"     => __( "Title", 'omnitail-core' ),
          "param_name"  => 'lft_opttt',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Color', 'havnor-core' ),
          'param_name' => 'title_color',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'description' => __( 'Pick your title color.', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Hover Color', 'havnor-core' ),
          'param_name' => 'title_hover_color',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'description' => __( 'Pick your title hover color.', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title Size', 'havnor-core' ),
          'param_name' => 'title_size',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title Font Weight', 'havnor-core' ),
          'param_name' => 'title_weight',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        => "notice",
          "heading"     => __( "Text", 'omnitail-core' ),
          "param_name"  => 'lft_opttst',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Text Color', 'havnor-core' ),
          'param_name' => 'text_color',
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
          "type"        => "notice",
          "heading"     => __( "List", 'omnitail-core' ),
          "param_name"  => 'lft_optttt',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'List Text Color', 'havnor-core' ),
          'param_name' => 'list_text_color',
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),        
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'List Text Size', 'havnor-core' ),
          'param_name' => 'list_text_size',
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),   
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'List Bullet Color', 'havnor-core' ),
          'param_name' => 'list_blt_color',
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),    
        array(
          "type"        => "notice",
          "heading"     => __( "Toggle Button", 'omnitail-core' ),
          "param_name"  => 'tgl_btn',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Toggle Button Color', 'havnor-core' ),
          'param_name' => 'tgl_btn_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),     
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Toggle Button Background Color', 'havnor-core' ),
          'param_name' => 'tgl_btn_bg_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
  
      )
    ) );
  }
}
