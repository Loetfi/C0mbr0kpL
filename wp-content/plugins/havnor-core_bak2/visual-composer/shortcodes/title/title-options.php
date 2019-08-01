<?php
/**
 * Section Title - Shortcode Options
 */
add_action( 'init', 'havnor_section_title_vc_map' );
if ( ! function_exists( 'havnor_section_title_vc_map' ) ) {
  function havnor_section_title_vc_map() {
    vc_map( array(
      "name" => __( "Section Title", 'havnor-core'),
      "base" => "havnor_section_title",
      "description" => __( "Section Title Styles", 'havnor-core'),
      "icon" => "fa fa-header color-pink",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Section Title Style', 'havnor-core' ),
          'value' => array(
            __( 'Title Style', 'havnor-core' ) => '',
            __( 'Style One ( Title, Subtitle )', 'havnor-core' ) => 'one',
            __( 'Style Two ( Subtitle, Title )', 'havnor-core' ) => 'two',
          ),
          'param_name' => 'title_style',
          'description' => __( 'Select title style', 'havnor-core' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Section Title Align', 'havnor-core' ),
          'value' => array(
            __( 'Title Alignment', 'havnor-core' ) => '',
            __( 'Left', 'havnor-core' ) => 'left',
            __( 'Center', 'havnor-core' ) => 'center',
            __( 'Right', 'havnor-core' ) => 'right',
          ),
          'param_name' => 'title_align',
          'description' => __( 'Select title alignment', 'havnor-core' ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Section Title", 'havnor-core' ),
          "param_name" => "title_text",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your section title.", 'havnor-core'),
        ),
        array(
          "type" => "textarea",
          "heading" => __( "Section Subtitle", 'havnor-core' ),
          "param_name" => "content_text",
          'value' => '',
          "description" => __( "Enter your section content.", 'havnor-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Title Section Bottom Space", 'havnor-core' ),
          "param_name" => "btm_space",
          'value' => '',
          "description" => __( "Enter your title section bottom space [Eg: 14px].", 'havnor-core'),
        ),
        HavnorLib::vt_class_option(),

        // Styling
        array(
          "type"        => "notice",
          "heading"     => __( "Title Option", 'havnor-core' ),
          "param_name"  => 'titless',
          'class'       => 'cs-success',
          'value'       => '',
          "group"       => __('Styling', 'havnor-core'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Title Color", 'havnor-core' ),
          "param_name" => "title_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Title Size", 'havnor-core' ),
          "param_name" => "title_size",
          'value' => '',
          "description" => __( "Enter section title text font size. [Eg: 14px]", 'havnor-core'),
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Subtitle Color", 'havnor-core' ),
          "param_name" => "content_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Subtitle Size", 'havnor-core' ),
          "param_name" => "content_size",
          'value' => '',
          "description" => __( "Enter content text font size. [Eg: 14px]", 'havnor-core'),
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Subtitle Line Height", 'havnor-core' ),
          "param_name" => "content_line_height",
          'value' => '',
          "description" => __( "Enter content text line height. [Eg: 14px]", 'havnor-core'),
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Title Bottom Space", 'havnor-core' ),
          "param_name" => "title_btm",
          'value' => '',
          "description" => __( "Enter section title bottom space. [Eg: 14px]", 'havnor-core'),
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Title Line Height", 'havnor-core' ),
          "param_name" => "title_lht",
          'value' => '',
          "description" => __( "Enter section title line height. [Eg: 14px]", 'havnor-core'),
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Title Font Weight", 'havnor-core' ),
          "param_name" => "title_fw",
          'value' => '',
          "description" => __( "Enter section title Font Weight. [Eg: 400]", 'havnor-core'),
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Subtitle Font Weight", 'havnor-core' ),
          "param_name" => "sub_title_fw",
          'value' => '',
          "description" => __( "Enter section subtitle Font Weight. [Eg: 400]", 'havnor-core'),
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        
      )
    ) );
  }
}
