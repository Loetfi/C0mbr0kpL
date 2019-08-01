<?php
/**
 * Award Section - Shortcode Options
 */
add_action( 'init', 'team_intro_vc_map' );
if ( ! function_exists( 'team_intro_vc_map' ) ) {
  function team_intro_vc_map() {
    vc_map( array(
      "name" => __( "Team Intro ", 'havnor-core'),
      "base" => "hanor_team_intro",
      "description" => __( "Team Single Intro", 'havnor-core'),
      "icon" => "fa fa-user color-orange",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        // Awards Section
        HavnorLib::vt_notice_field(__( "Team Single Intro Content Section", 'havnor-core' ),'tle_opt','cs-info', ''), // Notice
        array(
          'type' => 'attach_image',
          'value' => '',
          "admin_label"=> true,
          'heading' => __( 'Upload Team Member Image', 'havnor-core' ),
          'param_name' => 'team_image',
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Team Member Name', 'havnor-core' ),
          'param_name' => 'team_member_name',
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Team Member Subtitle', 'havnor-core' ),
          'param_name' => 'team_member_subtitle',
        ),
        array(
          'type' => 'textarea',
          'value' => '',
          'heading' => __( 'Team Member Description', 'havnor-core' ),
          'param_name' => 'team_member_description',
        ),
        array(
          'type' => 'textarea_html',
          'value' => '',
          'heading' => __( 'Team Member Details', 'havnor-core' ),
          'param_name' => 'content',
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Toggle Align", 'havnor-core' ),
          "param_name" => "toggle_align",
          'value' => '',
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
        ),
        
        // Title
        HavnorLib::vt_notice_field(__( "Team Single Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Styling'), // Notice
        array(
          "type" => "colorpicker",
          "heading" => __( "Team Member Name Color", 'havnor-core' ),
          "param_name" => "title_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
            'description' => __( 'Pick your title color.', 'havnor-core' ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Team Member Name Size", 'havnor-core' ),
          "param_name" => "title_size",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
            'description' => __( 'Enter your title size.', 'havnor-core' ),
        ), 
        array(
          "type" => "textfield",
          "heading" => __( "Team Member Font Weight", 'havnor-core' ),
          "param_name" => "title_weight",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
            'description' => __( 'Enter your title size.', 'havnor-core' ),
        ), 
        array(
          "type" => "colorpicker",
          "heading" => __( "Subtitle Color", 'havnor-core' ),
          "param_name" => "subtitle_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Pick your content color.', 'havnor-core' ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Subtitle Size", 'havnor-core' ),
          "param_name" => "subtitle_size",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter your content size.', 'havnor-core' ),
        ), 
        array(
          "type" => "colorpicker",
          "heading" => __( "Description Color", 'havnor-core' ),
          "param_name" => "content_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Pick your content color.', 'havnor-core' ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Description Size", 'havnor-core' ),
          "param_name" => "content_size",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter your content size.', 'havnor-core' ),
        ), 
        HavnorLib::vt_class_option(),
      )
    ) );
  }
}
