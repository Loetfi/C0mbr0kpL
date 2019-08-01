<?php
/**
 * Partnership Content - Shortcode Options
 */
add_action( 'init', 'key_partnership_vc_map' );
if ( ! function_exists( 'key_partnership_vc_map' ) ) {
  function key_partnership_vc_map() {
    vc_map( array(
      "name" => __( "Key Partnership", 'havnor-core'),
      "base" => "hanor_key_partnership",
      "description" => __( "Key Partnership Section", 'havnor-core'),
      "icon" => "fa fa-shield color-orange",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Key Partnership Style', 'havnor-core' ),
          'value' => array(
            __( 'Key Partnership Style One', 'havnor-core' ) => 'partnership-one',
            __( 'Key Partnership Style Two (Slider)', 'havnor-core' ) => 'partnership-two',
          ),
          'admin_label' => true,
          'param_name' => 'partnership_style',
          'description' => __( 'Select your featured style.', 'havnor-core' ),
        ),
        HavnorLib::vt_open_link_tab(),
        array(
          "type"        =>'checkbox',
          "heading"     =>__(' Retina Image?', 'havnor-core'),
          "param_name"  => "retina_img",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter drop shadow for your contact form.', 'havnor-core' ),
        ),

        // Partnership Section
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Key Partnership Sections', 'havnor-core' ),
          'param_name' => 'partnership_images',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'attach_image',
              'value' => '',
              "admin_label"=> true,
              'heading' => __( 'Upload Image', 'havnor-core' ),
              'param_name' => 'partnership_image',
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Partnership Content', 'havnor-core' ),
              'param_name' => 'partnership_content',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'ReadMore Title', 'havnor-core' ),
              'param_name' => 'readmore_title',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'ReadMore Link', 'havnor-core' ),
              'param_name' => 'readmore_link',
            ),
        
          ) 
        ), 

        // Title
        HavnorLib::vt_notice_field(__( "Content & ReadMore Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Styling'), // Notice
        array(
          "type" => "colorpicker",
          "heading" => __( "Item Background Color", 'havnor-core' ),
          "param_name" => "item_bg_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Item Boder Color", 'havnor-core' ),
          "param_name" => "item_border_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'dependency' => array(
            'element' => 'partnership_style',
            'value' => 'partnership-two',
          ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Content Color", 'havnor-core' ),
          "param_name" => "content_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Content Size", 'havnor-core' ),
          "param_name" => "content_size",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ), 
      
        // Content 
        array(
          "type" => "colorpicker",
          "heading" => __( "ReadMore Color", 'havnor-core' ),
          "param_name" => "readmore_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "ReadMore Size", 'havnor-core' ),
          "param_name" => "readmore_size",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "ReadMore Hover Color", 'havnor-core' ),
          "param_name" => "readmore_hover_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),

        HavnorLib::vt_class_option(),
        // Carousel
        HavnorLib::vt_notice_field(__( "Basic Options", 'havnor-core' ),'bsic_opt','cs-warning', 'Carousel'), // Notice
        HavnorLib::vt_carousel_loop(), // Loop
        HavnorLib::vt_carousel_items(), // Items
        HavnorLib::vt_carousel_margin(), // Margin
        HavnorLib::vt_carousel_dots(), // Dots
         HavnorLib::vt_carousel_nav(), // Dots
        HavnorLib::vt_notice_field(__( "Auto Play & Interaction", 'havnor-core' ),'apyi_opt','cs-warning', 'Carousel'), // Notice
        HavnorLib::vt_carousel_autoplay_timeout(), // Autoplay Timeout
        HavnorLib::vt_carousel_autoplay(), // Autoplay
        HavnorLib::vt_carousel_animateout(), // Animate Out
        HavnorLib::vt_carousel_mousedrag(), // Mouse Drag
        HavnorLib::vt_notice_field(__( "Width & Height", 'havnor-core' ),'wah_opt','cs-warning', 'Carousel'), // Notice
        HavnorLib::vt_carousel_autowidth(), // Auto Width
        HavnorLib::vt_carousel_autoheight(), // Auto Height
        HavnorLib::vt_notice_field('Responsive Options','res_opt','cs-warning', 'Carousel'), // Notice
        HavnorLib::vt_carousel_tablet(), // Tablet
        HavnorLib::vt_carousel_mobile(), // Mobile
        HavnorLib::vt_carousel_small_mobile(), // Small Mobile

      )
    ) );
  }
}
