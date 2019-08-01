<?php
/**
 * Process - Shortcode Options
 */
add_action( 'init', 'havnor_process_vc_map' );
if ( ! function_exists( 'havnor_process_vc_map' ) ) {
  function havnor_process_vc_map() {
    vc_map( array(
      "name" => __( "Process", 'havnor-core'),
      "base" => "havnor_process",
      "description" => __( "Process Shortcodes", 'havnor-core'),
      "icon" => "fa fa-line-chart color-blue",
      "category" => HavnorLib::havnor_cat_name(),      
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Process Style', 'havnor-core' ),
          'value' => array(
            __( 'Style One', 'havnor-core' ) => 'process-one',
            __( 'Style Two', 'havnor-core' ) => 'process-two',
            __( 'Style Three', 'havnor-core' ) => 'process-three',
          ),
          'admin_label' => true,
          'param_name' => 'process_style',
          'description' => __( 'Select your process style.', 'havnor-core' ),
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Need White Color?", 'havnor-core' ),
          "param_name" => "white_color",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'process_style',
            'value' => array('process-one'),
          ),
        ),
        // Process Items
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Process Item', 'havnor-core' ),
          'param_name' => 'process_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'dropdown',
              'heading' => __( 'Icon Style', 'havnor-core' ),
              'value' => array(
                __( 'Image', 'havnor-core' ) => 'icon-img',
                __( 'Icon', 'havnor-core' )  => 'icon-ico',
              ),
              'param_name' => 'process_icon_style',
              'description' => __( 'Select your process icon style if you needed.', 'havnor-core' ),
              'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'vt_icon',
              "heading"   => __('Set Icon', 'havnor-core'),
              "param_name" => "process_icon",
              "value"      => "",
              "description" => __( "Set your process icon if you needed.", 'havnor-core'),
              'dependency' => array(
                'element' => 'process_icon_style',
                'value' => array('icon-ico'),
              ),
              'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'attach_image',
              "heading"   => __('Upload Icon Image', 'havnor-core'),
              "param_name" => "process_icon_image",
              "value"      => "",
              "description" => __( "Set your process icon image if you needed.", 'havnor-core'),
              'dependency' => array(
                'element' => 'process_icon_style',
                'value' => array('icon-img'),
              ),
              'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Process Number', 'havnor-core'),
              "param_name" => "process_number",
              "value"      => "",
              "description" => __( "Enter your process number.", 'havnor-core'),
              'admin_label' => true,
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Process Title', 'havnor-core'),
              "param_name" => "process_title",
              "value"      => "",
              "description" => __( "Enter your process title if you needed.", 'havnor-core'),
              'admin_label' => true,
            ),
            array(
              "type"      => 'textarea',
              "heading"   => __('Process Content', 'havnor-core'),
              "param_name" => "process_content",
              "value"      => "",
              "description" => __( "Enter your process content if you needed.", 'havnor-core'),
            ),
          )
        ),       
        HavnorLib::vt_class_option(),

        // Style
        HavnorLib::vt_notice_field(__( "Title Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"        => "notice",
          "heading"     => __( "Title", 'omnitail-core' ),
          "param_name"  => 'prs_opt',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Color', 'havnor-core'),
          "param_name" => "title_color",
          "value"      => "",
          "description" => __( "Pick your heading color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),        
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Size', 'havnor-core'),
          "param_name" => "title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Font Weight', 'havnor-core'),
          "param_name" => "title_weight",
          "value"      => "",
          "description" => __( "Enter the numeric value for title font weight.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => "notice",
          "heading"     => __( "Content", 'omnitail-core' ),
          "param_name"  => 'prs_optc',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
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
          "type"        => "notice",
          "heading"     => __( "Number", 'omnitail-core' ),
          "param_name"  => 'prs_optn',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Number Color', 'havnor-core'),
          "param_name" => "number_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Number Size', 'havnor-core'),
          "param_name" => "number_size",
          "value"      => "",
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Number Font Weight', 'havnor-core'),
          "param_name" => "number_weight",
          "value"      => "",
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Number Background Color', 'havnor-core'),
          "param_name" => "number_bg_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Number Background Hover Color', 'havnor-core'),
          "param_name" => "number_bg_hover_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'process_style',
            'value' => array('process-one'),
          ),
        ),
        array(
          "type"        => "notice",
          "heading"     => __( "Borders", 'omnitail-core' ),
          "param_name"  => 'prs_optb',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Border Color', 'havnor-core'),
          "param_name" => "border_color",
          "value"      => "",
          "description" => __( "Pick your border color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Border Hover Color', 'havnor-core'),
          "param_name" => "border_hover_color",
          "value"      => "",
          "description" => __( "Pick your border hover color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Line Color', 'havnor-core'),
          "param_name" => "line_color",
          "value"      => "",
          "description" => __( "Pick your line color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Line Hover Color', 'havnor-core'),
          "param_name" => "line_hover_color",
          "value"      => "",
          "description" => __( "Pick your line hover color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Icon Color', 'havnor-core'),
          "param_name" => "icon_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'process_style',
            'value' => array('process-one'),
          ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Icon Size', 'havnor-core'),
          "param_name" => "icon_size",
          "value"      => "",
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'process_style',
            'value' => array('process-one'),
          ),
        ),

      )
    ) );
  }
}
