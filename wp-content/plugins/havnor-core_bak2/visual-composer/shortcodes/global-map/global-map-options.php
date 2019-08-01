<?php
/**
 * Chart Item - Shortcode Options
 */
add_action( 'init', 'global_map_vc_map' );
if ( ! function_exists( 'global_map_vc_map' ) ) {
  function global_map_vc_map() {
    vc_map( array(
      "name" => __( "Global Map", 'lions-core'),
      "base" => "global_map",
      "description" => __( "Glabal Map Shortcode", 'lions-core'),
      "icon" => "fa fa-globe color-violet",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        // Style
        HavnorLib::vt_notice_field(__( " Global Map Section Options", 'havnor-core' ),'tle_opt','cs-info', ''), // Notice
        // Map Option
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Map Width ', 'lions-core' ),
          'param_name' => 'map_width',
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Map Height ', 'lions-core' ),
          'param_name' => 'map_height',
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Marker Fill Color', 'lions-core'),
          "param_name"  => "mark_fill_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Marker Hover Fill Color', 'lions-core'),
          "param_name"  => "mark_hover_fill_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Marker Stroke Color', 'lions-core'),
          "param_name"  => "mark_stroke_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Marker Hover Stroke Color', 'lions-core'),
          "param_name"  => "mark_hover_stroke_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Map Color', 'lions-core'),
          "param_name"  => "map_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
        ),
        array(
          "type"        =>'checkbox',
          "heading"     =>__('Zoom On Scroll', 'havnor-core'),
          "param_name"  => "zoom_on_scroll",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Map Marker Option', 'lions-core' ),
          'param_name' => 'map_marker_options',
          // Note params is mapped inside param-group:
          'params' => array(
         
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Latitude', 'lions-core' ),
              'param_name' => 'latt_option_one',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Longitude', 'lions-core' ),
              'param_name' => 'lang_option_one',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'City Name', 'lions-core' ),
              'param_name' => 'city_name',
              'admin_label' => true,
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Country Name', 'lions-core' ),
              'param_name' => 'country_name',
              'admin_label' => true,
            )

          )
        ),
        HavnorLib::vt_class_option(),
      )
    ) );
  }
}
