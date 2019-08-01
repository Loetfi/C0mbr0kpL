<?php
/**
 * Client Carousel - Shortcode Options
 */
add_action( 'init', 'client_carousel_vc_map' );
if ( ! function_exists( 'client_carousel_vc_map' ) ) {
  function client_carousel_vc_map() {
    vc_map( array(
      "name" => __( "Client", 'havnor-core'),
      "base" => "hanor_client_carousel",
      "description" => __( "Client Carousel", 'havnor-core'),
      "icon" => "fa fa-shield color-green",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

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

        // Client Logos
        array(
          'type' => 'dropdown',
          'heading' => __( 'Client Style', 'havnor-core' ),
          'value' => array(
            __( 'Client Style One', 'havnor-core' ) => 'client-one',
            __( 'Client Style Two', 'havnor-core' ) => 'client-two',
            __( 'Client Style Three', 'havnor-core' ) => 'client-three',
          ),
          'admin_label' => true,
          'param_name' => 'client_style',
          'description' => __( 'Select your client Slider style.', 'havnor-core' ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Client Section Title', 'havnor-core'),
          "param_name" => "client_title",
          "value"      => "",
          "description" => __( "Enter your about me title.", 'havnor-core'),
          'admin_label' => true,
        ),
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Client Logos', 'havnor-core' ),
          'param_name' => 'client_logos',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'attach_image',
              'value' => '',
              "admin_label"=> true,
              'heading' => __( 'Upload Image', 'havnor-core' ),
              'param_name' => 'client_logo',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Client Link', 'havnor-core' ),
              'param_name' => 'client_link',
            )
          ) 
        ),
        HavnorLib::vt_class_option(),

        // Carousel
        HavnorLib::vt_notice_field(__( "Basic Options", 'havnor-core' ),'bsic_opt','cs-warning', 'Carousel'), // Notice
        HavnorLib::vt_carousel_loop(), // Loop
        HavnorLib::vt_carousel_items(), // Items
        HavnorLib::vt_carousel_margin(), // Margin
        HavnorLib::vt_carousel_dots(), // Dots
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
