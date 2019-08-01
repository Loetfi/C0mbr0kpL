<?php
/**
 * Subscribe - Shortcode Options
 */
add_action( 'init', 'havnor_subscribe_form_vc_map' );
if ( ! function_exists( 'havnor_subscribe_form_vc_map' ) ) {
  function havnor_subscribe_form_vc_map() {
    vc_map( array(
      "name" => __( "Subscribe Section", 'havnor-core'),
      "base" => "hanor_subscribe_form",
      "description" => __( "Subscribe Section Shortcodes", 'havnor-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        HavnorLib::vt_notice_field(__( "Content Area", 'havnor-core' ),'cntara_opt','cs-warning', ''), // Notice
        array(
          "type"      => 'textfield',
          "heading"   => __('Subscribe Title', 'havnor-core'),
          "param_name" => "subscribe_title",
          "value"      => "",
          "description" => __( "Enter your subscribe title.", 'havnor-core'),
           'admin_label' => true,
        ),
        HavnorLib::vt_open_link_tab(),
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Social Logos', 'havnor-core' ),
          'param_name' => 'subscribe_logos',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              "type"      => 'vt_icon',
              "heading"   => __('Upload Social Icon', 'havnor-core'),
              "param_name" => "social_icon",
              "value"      => "",
              "description" => __( "Set your social icon.", 'havnor-core'),
              ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Social Link', 'havnor-core' ),
              'param_name' => 'social_link',
            )
          ) 
        ),
        array(
          "type"      => 'textarea_html',
          "heading"   => __('Content', 'havnor-core'),
          "param_name" => "content",
          "value"      => "",
          "description" => __( "Enter your subscribe form shortcode here.", 'havnor-core')
        ),
        array(
          "type"      => 'textarea',
          "heading"   => __('Subscribe Detail', 'havnor-core'),
          "param_name" => "subscribe_detail",
          "value"      => "",
          "description" => __( "Enter your subscribe details here.", 'havnor-core')
        ),
        HavnorLib::vt_class_option(),
        // Style
        HavnorLib::vt_notice_field(__( "Title Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Style'), // Notice
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
        HavnorLib::vt_notice_field(__( "Social Icon Styling", 'havnor-core' ),'icn_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Icon Color', 'havnor-core'),
          "param_name" => "icon_color",
          "value"      => "",
          "description" => __( "Pick your icon color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Icon Hover Color', 'havnor-core'),
          "param_name" => "icon_hover_color",
          "value"      => "",
          "description" => __( "Pick your icon hover color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Icon Background Color', 'havnor-core'),
          "param_name" => "icon_bg_color",
          "value"      => "",
          "description" => __( "Pick your icon background color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Icon Background Hover Color', 'havnor-core'),
          "param_name" => "icon_bg_hover_color",
          "value"      => "",
          "description" => __( "Pick your icon background hover color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        HavnorLib::vt_notice_field(__( "Content Styling", 'havnor-core' ),'cnt_opt','cs-warning', 'Style'), // Notice
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
      )
    ) );
  }
}
