<?php
/**
 * Award Section - Shortcode Options
 */
add_action( 'init', 'awards_vc_map' );
if ( ! function_exists( 'awards_vc_map' ) ) {
  function awards_vc_map() {
    vc_map( array(
      "name" => __( "Awards ", 'havnor-core'),
      "base" => "hanor_awards",
      "description" => __( "Our Awards Section", 'havnor-core'),
      "icon" => "fa fa-shield color-orange",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        // Awards Section
        HavnorLib::vt_notice_field(__( "Awards Content Section", 'havnor-core' ),'tle_opt','cs-info', ''), // Notice
 
        array(
          'type' => 'attach_image',
          'value' => '',
          "admin_label"=> true,
          'heading' => __( 'Upload  Image', 'havnor-core' ),
          'param_name' => 'award_image',
        ),
        array(
          "type"        =>'checkbox',
          "heading"     =>__(' Retina Image?', 'havnor-core'),
          "param_name"  => "retina_img",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter drop shadow for your contact form.', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Award Title', 'havnor-core' ),
          'param_name' => 'award_title',
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Award Title Link', 'havnor-core' ),
          'param_name' => 'award_title_link',
        ),
        HavnorLib::vt_open_link_tab(),
        array(
          'type' => 'textarea',
          'value' => '',
          'heading' => __( 'Award Content', 'havnor-core' ),
          'param_name' => 'award_content',
        ),
        // Title
        HavnorLib::vt_notice_field(__( "Awards Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Styling'), // Notice
        array(
          "type" => "colorpicker",
          "heading" => __( "Title Color", 'havnor-core' ),
          "param_name" => "title_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
            'description' => __( 'Pick your title color.', 'havnor-core' ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Title Size", 'havnor-core' ),
          "param_name" => "title_size",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter your title size.', 'havnor-core' ),
        ), 
        array(
          "type" => "textfield",
          "heading" => __( "Title Font Weight", 'havnor-core' ),
          "param_name" => "title_weight",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter your title size.', 'havnor-core' ),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Title Hover Color", 'havnor-core' ),
          "param_name" => "title_hover_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Pick your title link hover color.', 'havnor-core' ),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Content Color", 'havnor-core' ),
          "param_name" => "content_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Pick your content color.', 'havnor-core' ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Content Size", 'havnor-core' ),
          "param_name" => "content_size",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter your content size.', 'havnor-core' ),
        ), 
        array(
          "type"        =>'checkbox',
          "heading"     =>__('Need Border ?', 'havnor-core'),
          "param_name"  => "need_border",
          "value"       => "",
           "group" => __( "Styling", 'havnor-core'),
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
         array(
          "type" => "colorpicker",
          "heading" => __( "Border Color", 'havnor-core' ),
          "param_name" => "border_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Pick your border color.', 'havnor-core' ),
          'dependency' => array(
            'element' => 'need_border',
            'value' => 'true',
          ),
        ),
        HavnorLib::vt_notice_field(__( "Awards Spacings", 'havnor-core' ),'tle_opt','cs-warning', 'Spacings'), // Notice
        array(
          "type" => "textfield",
          "heading" => __( "Title Bottom Space", 'havnor-core' ),
          "param_name" => "title_btm",
          "group" => __( "Spacings", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter your bottom space in px [Eg : 20px].', 'havnor-core' ),
        ), 
         array(
          "type" => "textfield",
          "heading" => __( "Award Section Top Space", 'havnor-core' ),
          "param_name" => "award_top",
          "group" => __( "Spacings", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter your Top space in px [Eg : 20px].', 'havnor-core' ),
        ), 
        array(
          "type" => "textfield",
          "heading" => __( "Award Section Bottom Space", 'havnor-core' ),
          "param_name" => "award_btm",
          "group" => __( "Spacings", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter your bottom space in px [Eg : 20px].', 'havnor-core' ),
        ), 
        HavnorLib::vt_class_option(),
      )
    ) );
  }
}
