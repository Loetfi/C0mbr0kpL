<?php
/**
 * Countdown - Shortcode Options
 */
add_action( 'init', 'havnor_countdown_vc_map' );
if ( ! function_exists( 'havnor_countdown_vc_map' ) ) {
  function havnor_countdown_vc_map() {
    vc_map( array(
      "name" => __( "Countdown", 'havnor-core'),
      "base" => "havnor_countdown",
      "description" => __( "Countdown Styles", 'havnor-core'),
      "icon" => "fa fa-sort-numeric-asc color-blue",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          "type"        =>'textfield',
          "heading"     =>__('Title', 'havnor-core'),
          "param_name"  => "countdown_title",
          "value"       => "",
          "description" => __( "Enter your countdown title.", 'havnor-core'),
          'admin_label' => true,
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Countdown Data', 'havnor-core'),
          "param_name"  => "countdown_date",
          "value"       => "",
          "description" => __( "Enter the event date. Ex : mm/dd/yy 1:00", 'havnor-core'),
        ),
        HavnorLib::vt_class_option(),

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
          "heading"     => __('Countdown Value Color', 'havnor-core'),
          "param_name"  => "value_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'havnor-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Countdown Value Background Color', 'havnor-core'),
          "param_name"  => "value_bg_color",
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
          "heading"     => __('Title Line Height', 'havnor-core'),
          "param_name"  => "title_line_height",
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
        // Size
        array(
          "type"        => 'textfield',
          "heading"     => __('Value In Size', 'havnor-core'),
          "param_name"  => "value_in_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'havnor-core'),
        ),
      )
    ) );
  }
}
