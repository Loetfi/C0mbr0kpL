<?php
/**
 * Service Toggle - Shortcode Options
 */
add_action( 'init', 'havnor_insights_vc_map' );
if ( ! function_exists( 'havnor_insights_vc_map' ) ) {
  function havnor_insights_vc_map() {
    vc_map( array(
      "name" => __( "Insights & Story", 'havnor-core'),
      "base" => "hanor_insights",
      "description" => __( "Insights Styles", 'havnor-core'),
      "icon" => "fa fa-puzzle-piece color-green",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Insights Styles', 'havnor-core' ),
          'value' => array(
            __( 'Select Style ', 'havnor-core' )    => 'select-style',
            __( 'Style One ( Story Insights )', 'havnor-core' )    => 'style-one',
            __( 'Style Two ( Insights )', 'havnor-core' ) => 'style-two',
          ),
          'admin_label' => true,
          'param_name' => 'insights_style',
          'description' => __( 'Select your Insights style.', 'havnor-core' ),
        ),
        // Service Toggle
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Insights Section', 'havnor-core' ),
          'param_name' => 'insights_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'attach_image',
              'value' => '',
              'heading' => __( 'Upload Image', 'havnor-core' ),
              'param_name' => 'insights_image',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'admin_label' => true,
              'heading' => __( 'Title', 'havnor-core' ),
              'param_name' => 'insights_title',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Title Link', 'havnor-core' ),
              'param_name' => 'insights_title_link',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Subtitle', 'havnor-core' ),
              'param_name' => 'insights_subtitle',
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Text', 'havnor-core' ),
              'param_name' => 'insights_text',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Insights Volume / Sector', 'havnor-core' ),
              'param_name' => 'insights_volume',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Insights Date', 'havnor-core' ),
              'param_name' => 'insights_date',
            ),

          )
        ),

        HavnorLib::vt_open_link_tab(),
        HavnorLib::vt_class_option(),

        // Style
        array(
          "type"        => "notice",
          "heading"     => __( "Title", 'havnor-core' ),
          "param_name"  => 'lft_opttt',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title Size', 'havnor-core' ),
          'param_name' => 'title_size',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter the numeric value in px.", 'havnor-core'),
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
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Hover Color', 'havnor-core' ),
          'param_name' => 'title_hover_color',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Pick your title hover color.', 'havnor-core' ),
        ),
        array(
          "type"        => "notice",
          "heading"     => __( "Subtitle", 'havnor-core' ),
          "param_name"  => 'lft_opttst',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Subtitle Text Color', 'havnor-core' ),
          'param_name' => 'subtitle_text_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
          'description' => __( 'Pick your subtitle color.', 'havnor-core' ),

        ),        
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Subtitle Text Size', 'havnor-core' ),
          'param_name' => 'subtitle_text_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
          "description" => __( "Enter the numeric value in px.", 'havnor-core'),
        ),  
        array(
          "type"        => "notice",
          "heading"     => __( "Content", 'havnor-core' ),
          "param_name"  => 'lft_opttst',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Content Color', 'havnor-core' ),
          'param_name' => 'content_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
          'description' => __( 'Pick your content color.', 'havnor-core' ),
        ),        
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Content Size', 'havnor-core' ),
          'param_name' => 'content_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
          "description" => __( "Enter the numeric value in px.", 'havnor-core'),
        ),  
        array(
          "type"        => "notice",
          "heading"     => __( "Meta Stylings", 'havnor-core' ),
          "param_name"  => 'lft_optttt',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Meta Color', 'havnor-core' ),
          'param_name' => 'meta_text_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
          'description' => __( 'Pick your meta color.', 'havnor-core' ),
        ),        
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Meta Text Size', 'havnor-core' ),
          'param_name' => 'meta_text_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
          "description" => __( "Enter the numeric value in px.", 'havnor-core'),
        ),     
      )
    ) );
  }
}
