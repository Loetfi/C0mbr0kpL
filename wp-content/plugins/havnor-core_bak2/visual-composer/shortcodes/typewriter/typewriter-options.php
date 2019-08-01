<?php
/**
 * Services - Shortcode Options
 */
add_action( 'init', 'havnor_typewriter_vc_map' );
if ( ! function_exists( 'havnor_typewriter_vc_map' ) ) {
  function havnor_typewriter_vc_map() {
    vc_map( array(
      "name" => __( "Typewriter", 'havnor-core'),
      "base" => "havnor_typewriter",
      "description" => __( "Typewriter Shortcodes", 'havnor-core'),
      "icon" => "fa fa-text-width color-orange",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        HavnorLib::vt_notice_field(__( "Content Area", 'havnor-core' ),'cntara_opt','cs-warning', ''), // Notice
        array(
          "type"      => 'textarea_html',
          "heading"   => __('Content', 'havnor-core'),
          "param_name" => "content",
          "value"      => "",
          "description" => __( "Enter your Typewriter content here.", 'havnor-core')
        ),

        HavnorLib::vt_class_option(),
        // Style
        HavnorLib::vt_notice_field(__( "Title Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Style'), // Notice
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
          "heading"   => __('Typewriter Text Color', 'havnor-core'),
          "param_name" => "typewriter_color",
          "value"      => "",
          "description" => __( "Pick your typewriter text color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Typewriter Text Size', 'havnor-core'),
          "param_name" => "typewriter_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for typewriter text size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
      )
    ) );
  }
}
