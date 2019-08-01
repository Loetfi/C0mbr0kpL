<?php
/**
 * Award Section - Shortcode Options
 */
add_action( 'init', 'share_vc_map' );
if ( ! function_exists( 'share_vc_map' ) ) {
  function share_vc_map() {
    vc_map( array(
      "name" => __( "Social Share ", 'havnor-core'),
      "base" => "hanor_share",
      "description" => __( "Socail Share Section", 'havnor-core'),
      "icon" => "fa fa-shield color-pink",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        // Awards Section
        HavnorLib::vt_notice_field(__( "Social Share Section", 'havnor-core' ),'tle_opt','cs-info', ''), // Notice
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Share Text', 'havnor-core' ),
          'param_name' => 'share_text',
          'admin_label' => true,
        ),
        // Facebook
        array(
          "type"        =>'checkbox',
          "heading"     =>__(' Hide Facebook Share ?', 'havnor-core'),
          "param_name"  => "hide_fb_share",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        // Twitter
        array(
          "type"        =>'checkbox',
          "heading"     =>__(' Hide Twitter Share ?', 'havnor-core'),
          "param_name"  => "hide_twitter_share",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        // Google Plus
        array(
          "type"        =>'checkbox',
          "heading"     =>__(' Hide Google Plus Share ?', 'havnor-core'),
          "param_name"  => "hide_gplus_share",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        // Pinterest
        array(
          "type"        =>'checkbox',
          "heading"     =>__(' Hide Pinterest Share ?', 'havnor-core'),
          "param_name"  => "hide_pin_share",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        // LinkedIn
        array(
          "type"        =>'checkbox',
          "heading"     =>__(' Hide LinkedIn Share ?', 'havnor-core'),
          "param_name"  => "hide_linked_share",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space', 
        ),
       
        // Title
        HavnorLib::vt_notice_field(__( "Social Share Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Styling'), // Notice
        array(
          "type" => "colorpicker",
          "heading" => __( "Title Color", 'havnor-core' ),
          "param_name" => "title_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
            'description' => __( 'Pick your share title color.', 'havnor-core' ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Title Size", 'havnor-core' ),
          "param_name" => "title_size",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
            'description' => __( 'Enter share your title size.', 'havnor-core' ),
        ), 
        HavnorLib::vt_class_option(),
      )
    ) );
  }
}
