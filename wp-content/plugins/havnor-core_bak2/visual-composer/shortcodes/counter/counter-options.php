<?php
/**
 * Counter - Shortcode Options
 */
add_action( 'init', 'havnor_counter_vc_map' );
if ( ! function_exists( 'havnor_counter_vc_map' ) ) {
  function havnor_counter_vc_map() {
    vc_map( array(
      "name" => __( "Counter", 'havnor-core'),
      "base" => "havnor_counter",
      "description" => __( "Counter Styles", 'havnor-core'),
      "icon" => "fa fa-sort-numeric-asc color-blue",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Counter Style', 'havnor-core' ),
          'value' => array(
            __( 'Style One', 'havnor-core' ) => 'one',
            __( 'Style Two', 'havnor-core' ) => 'two',
          ),
          'admin_label' => true,
          'param_name' => 'counter_style',
          'description' => __( 'Select your counter style.', 'havnor-core' ),
        ),
        array(
          "type"      => 'vt_icon',
          "heading"   => __('Set Icon', 'havnor-core'),
          "param_name" => "counter_icon",
          "value"      => "",
          "description" => __( "Set your counter icon.", 'havnor-core'),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Title', 'havnor-core'),
          "param_name"  => "counter_title",
          "value"       => "",
          "description" => __( "Enter your counter title.", 'havnor-core'),
          'admin_label' => true,
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Counter Value', 'havnor-core'),
          "param_name"  => "counter_value",
          "value"       => "",
          "description" => __( "Enter numeric value to count. Ex : 2,000", 'havnor-core'),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Value In', 'havnor-core'),
          "param_name"  => "value_in",
          "value"       => "",
          "description" => __( "Enter value in to count. Ex : + , K", 'havnor-core'),
          'dependency' => array(
            'element' => 'counter_style',
            'value' => 'one',
          ),
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Need Right Border?", 'havnor-core' ),
          "param_name" => "need_border",
          "std" => false,
          'value' => '',
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Disable Width?", 'havnor-core' ),
          "param_name" => "no_width",
          "std" => false,
          'value' => '',
          'dependency' => array(
            'element' => 'counter_style',
            'value' => 'one',
          ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        HavnorLib::vt_class_option(),

        // Counter
        array(
          "type"        => 'textfield',
          "heading"     => __('Counter Delay', 'havnor-core'),
          "param_name"  => "counter_delay",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vt_field_space',
          "group"       => __('Counter', 'havnor-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Counter Time', 'havnor-core'),
          "param_name"  => "counter_time",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vt_field_space',
          "group"       => __('Counter', 'havnor-core'),
        ),

        // Stylings
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Title Color', 'havnor-core'),
          "param_name"  => "title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'havnor-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Value Color', 'havnor-core'),
          "param_name"  => "value_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'havnor-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Icon Color', 'havnor-core'),
          "param_name"  => "icon_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'havnor-core'),
        ),
        // Size
        array(
          "type"        => 'textfield',
          "heading"     => __('Title Size', 'havnor-core'),
          "param_name"  => "title_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'havnor-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Title Font Weight', 'havnor-core'),
          "param_name"  => "title_weight",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'havnor-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Value Size', 'havnor-core'),
          "param_name"  => "value_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'havnor-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Value Font Weight', 'havnor-core'),
          "param_name"  => "value_weight",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'havnor-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Icon Size', 'havnor-core'),
          "param_name"  => "icon_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'havnor-core'),
        ),
         // Size
        array(
          "type"        => 'textfield',
          "heading"     => __('Value In Size', 'havnor-core'),
          "param_name"  => "value_in_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'havnor-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Value In Font Weight', 'havnor-core'),
          "param_name"  => "value_in_weight",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'havnor-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Value In Color', 'havnor-core'),
          "param_name"  => "value_in_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'havnor-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Counter Bottom Space', 'havnor-core'),
          "param_name"  => "bottom_space",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'havnor-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Counter Top Space', 'havnor-core'),
          "param_name"  => "top_space",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'havnor-core'),
        ),
      )
    ) );
  }
}
