<?php
/**
 * Job Search - Shortcode Options
 */
add_action( 'init', 'havnor_job_search_vc_map' );
if ( ! function_exists( 'havnor_job_search_vc_map' ) ) {
  function havnor_job_search_vc_map() {
    vc_map( array(
      "name" => __( "Job Search", 'havnor-core'),
      "base" => "hanor_job_search",
      "description" => __( "Job Search Styles", 'havnor-core'),
      "icon" => "fa fa-search color-brown",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Search Style', 'havnor-core' ),
          'value' => array(
            __( 'Select Style', 'havnor-core' )    => 'search-style',
            __( 'Style One', 'havnor-core' )    => 'search-style-one',
            __( 'Style Two', 'havnor-core' )    => 'search-style-two',
          ),
          'admin_label' => true,
          'param_name' => 'search_style',
          'description' => __( 'Select your search style.', 'havnor-core' ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Search Title", 'havnor-core' ),
          "param_name" => "search_title",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your title.", 'havnor-core'),
        ),
        HavnorLib::vt_class_option(),
        array(
          "type"        => "notice",
          "heading"     => __( "Title", 'havnor-core' ),
          "param_name"  => 'lft_opttt',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Styling', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Color', 'havnor-core' ),
          'param_name' => 'title_color',
          'group' => __( 'Styling', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Pick your title color.', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title Size', 'havnor-core' ),
          'param_name' => 'title_size',
          'group' => __( 'Styling', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter the px value if you used title area in figures style type one.', 'havnor-core' ),
        ),
        array(
          "type"        => "notice",
          "heading"     => __( "Button", 'havnor-core' ),
          "param_name"  => 'lft_optttb',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Styling', 'havnor-core' ),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Color", 'havnor-core' ),
          "param_name" => "text_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Color", 'havnor-core' ),
          "param_name" => "bg_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Color", 'havnor-core' ),
          "param_name" => "border_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Hover Color", 'havnor-core' ),
          "param_name" => "text_hover_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Hover Color", 'havnor-core' ),
          "param_name" => "bg_hover_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Hover Color", 'havnor-core' ),
          "param_name" => "border_hover_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Text Size", 'havnor-core' ),
          "param_name" => "text_size",
          'value' => '',
          "description" => __( "Enter button text font size. [Eg: 14px]", 'havnor-core'),
          "group" => __( "Styling", 'havnor-core'),
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Section Background", 'havnor-core' ),
          "param_name"  => 'lft_optttb',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Styling', 'havnor-core' ),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Color", 'havnor-core' ),
          "param_name" => "section_bg_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Color", 'havnor-core' ),
          "param_name" => "section_border_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),

      )
    ) );
  }
}
