<?php
/**
 * Plan Item - Shortcode Options
 */
add_action( 'init', 'havnor_plan_vc_map' );
if ( ! function_exists( 'havnor_plan_vc_map' ) ) {
  function havnor_plan_vc_map() {
    vc_map( array(
      "name" => __( "Pricing Plan Item", 'havnor-core'),
      "base" => "hanor_plan",
      "description" => __( "Plan Item Styles", 'havnor-core'),
      "icon" => "fa fa-fighter-jet color-red",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Pricing Style', 'havnor-core' ),
          'value' => array(
            __( 'Style One', 'havnor-core' ) => 'pricing-one',
            __( 'Style Two', 'havnor-core' ) => 'pricing-two',
          ),
          'admin_label' => true,
          'param_name' => 'pricing_style',
          'description' => __( 'Select your pricing style.', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'admin_label' => true,
          'heading' => __( 'Title', 'havnor-core' ),
          'param_name' => 'plan_title',
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Price', 'havnor-core' ),
          'param_name' => 'plan_price',
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Price Unit', 'havnor-core' ),
          'param_name' => 'price_unit',
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Time Period', 'havnor-core' ),
          'param_name' => 'time_period',
        ),

        // Plan Item
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Plan Items', 'havnor-core' ),
          'param_name' => 'plan_items',
          // Note params is mapped inside param-group:
          'params' => array(
            
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Text', 'havnor-core' ),
              'param_name' => 'plan_text',
              'admin_label' => true,
            ),

          )
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Button Text', 'havnor-core' ),
          'param_name' => 'btn_text',
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Button Link', 'havnor-core' ),
          'param_name' => 'btn_link',
        ),
        HavnorLib::vt_open_link_tab(),
        HavnorLib::vt_class_option(),

        // Style
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Background Color', 'havnor-core' ),
          'param_name' => 'bg_color',
          'group' => __( 'Style', 'havnor-core' ),
          'description' => __( 'Pick your background color.', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Background Hover Color', 'havnor-core' ),
          'param_name' => 'bg_hover_color',
          'group' => __( 'Style', 'havnor-core' ),
          'description' => __( 'Pick your background color.', 'havnor-core' ),
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
          'description' => __( 'Enter the px value if you used title area in plan style type one.', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title Font Weight', 'havnor-core' ),
          'param_name' => 'title_weight',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter the font weight for title.', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Section Border Color', 'havnor-core' ),
          'param_name' => 'title_border_color',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Pick your price color.', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Price Color', 'havnor-core' ),
          'param_name' => 'price_color',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Pick your price color.', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Price Size', 'havnor-core' ),
          'param_name' => 'price_size',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter the px value if you used title area in plan style type one.', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Price Font Weight', 'havnor-core' ),
          'param_name' => 'price_weight',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter the font weight for price.', 'havnor-core' ),
        ),
         array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Time Period Color Color', 'havnor-core' ),
          'param_name' => 'time_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ), 
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Time Size', 'havnor-core' ),
          'param_name' => 'time_size',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter the px value if you used title area in plan style .', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Time Font Weight', 'havnor-core' ),
          'param_name' => 'time_weight',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter the font weight for time.', 'havnor-core' ),
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
        // Button
        array(
          "type"        => "notice",
          "heading"     => __( "Button Styles", 'havnor-core' ),
          "param_name"  => 'btn',
          'class'       => 'cs-info',
          'value'       => '',
          "group" => __( "Style", 'havnor-core'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Color", 'havnor-core' ),
          "param_name" => "btn_text_color",
          'value' => '',
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Color", 'havnor-core' ),
          "param_name" => "btn_bg_color",
          'value' => '',
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Color", 'havnor-core' ),
          "param_name" => "btn_border_color",
          'value' => '',
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Hover Color", 'havnor-core' ),
          "param_name" => "btn_text_hover_color",
          'value' => '',
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Hover Color", 'havnor-core' ),
          "param_name" => "btn_bg_hover_color",
          'value' => '',
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Hover Color", 'havnor-core' ),
          "param_name" => "btn_border_hover_color",
          'value' => '',
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Text Size", 'havnor-core' ),
          "param_name" => "btn_text_size",
          'value' => '',
          "description" => __( "Enter button text font size. [Eg: 14px]", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Border Radius", 'havnor-core' ),
          "param_name" => "btn_border_radius",
          'value' => '',
          "description" => __( "Enter button border radius. [Eg: 14px]", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
        ),      

      )
    ) );
  }
}
