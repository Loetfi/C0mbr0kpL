<?php
/**
 * Technology Partners - Shortcode Options
 */
add_action( 'init', 'havnor_technology_partners_vc_map' );
if ( ! function_exists( 'havnor_technology_partners_vc_map' ) ) {
  function havnor_technology_partners_vc_map() {
    vc_map( array(
      "name" => __( "Technology Partners", 'havnor-core'),
      "base" => "hanor_technology_partners",
      "description" => __( "Technology Partners Styles", 'havnor-core'),
      "icon" => "fa fa-street-view color-red",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'textfield',
          'value' => '',
          'admin_label' => true,
          'heading' => __( 'Click to Expand Text', 'havnor-core' ),
          'param_name' => 'click_txt',
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

        // Technology Partners
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Technology Partners Image', 'havnor-core' ),
          'param_name' => 'partners_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'attach_image',
              'value' => '',
              'heading' => __( 'Select image', 'havnor-core' ),
              'param_name' => 'select_image',
              'admin_label' => true,
            ),
          )
        ),
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Technology Partners Content', 'havnor-core' ),
          'param_name' => 'partners_contents',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'textfield',
              'value' => '',
              'admin_label' => true,
              'heading' => __( 'Title', 'havnor-core' ),
              'param_name' => 'partners_title',
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Text', 'havnor-core' ),
              'param_name' => 'partners_text',
            ),

          )
        ),
        HavnorLib::vt_class_option(),
        // Style
        array(
          "type"        => "notice",
          "heading"     => __( "Titles", 'omnitail-core' ),
          "param_name"  => 'time_optt',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
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
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title Size', 'havnor-core' ),
          'param_name' => 'title_size',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter the px value if you used title area in technology_partners style type one.', 'havnor-core' ),
        ),
        array(
          "type"        => "notice",
          "heading"     => __( "Text", 'omnitail-core' ),
          "param_name"  => 'time_opttt',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Text Color', 'havnor-core' ),
          'param_name' => 'text_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),        
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Text Size', 'havnor-core' ),
          'param_name' => 'text_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),        
        array(
          "type"        => "notice",
          "heading"     => __( "Image", 'omnitail-core' ),
          "param_name"  => 'time_optd',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Image Border Color', 'havnor-core' ),
          'param_name' => 'image_border_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Image Border Active Color', 'havnor-core' ),
          'param_name' => 'image_border_active_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),

      )
    ) );
  }
}
