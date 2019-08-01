<?php
/**
 * Call To Action - Shortcode Options
 */
add_action( 'init', 'havnor_callout_vc_map' );
if ( ! function_exists( 'havnor_callout_vc_map' ) ) {
  function havnor_callout_vc_map() {
    vc_map( array(
      "name" => __( "Call To Action", 'havnor-core'),
      "base" => "havnor_callout",
      "description" => __( "Call To Action", 'havnor-core'),
      "icon" => "fa fa-bullhorn color-red",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Callout Style', 'havnor-core' ),
          'value' => array(
            __( 'Style One', 'havnor-core' ) => 'one',
            __( 'Style Two', 'havnor-core' ) => 'two',
            __( 'Style Three ( Center Align )', 'havnor-core' ) => 'three',
          ),
          'admin_label' => true,
          'param_name' => 'call_style',
          'description' => __( 'Select your callout style.', 'havnor-core' ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Call To Action Title', 'havnor-core'),
          "param_name" => "call_title",
          "value"      => "",
          "description" => __( "Enter your title here.", 'havnor-core'),
        ),
        array(
          "type" => "textarea_html",
          "heading" => __( "Call To Action Content", 'havnor-core' ),
          "param_name" => "content",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your content.", 'havnor-core'),
          'dependency' => array(
            'element' => 'call_style',
            'value' => array('two', 'three'),
          ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Text", 'havnor-core' ),
          "param_name" => "btn_text",
          'value' => '',
          "description" => __( "Enter your button text.", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Link", 'havnor-core' ),
          "param_name" => "btn_link",
          'value' => '',
          "description" => __( "Enter your button link.", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        HavnorLib::vt_open_link_tab(),

        array(
          'type' => 'dropdown',
          'heading' => __( 'Text Align', 'havnor-core' ),
          'value' => array(
            __( 'Center Align', 'havnor-core' ) => 'center',
            __( 'Right Align', 'havnor-core' ) => 'right',
            __( 'Left Align', 'havnor-core' ) => 'left',
          ),
          'admin_label' => true,
          'param_name' => 'text_align_style',
          'description' => __( 'Select content alignment style.', 'havnor-core' ),
            'dependency' => array(
            'element' => 'call_style',
            'value' => 'three',
          ),
        ),

        HavnorLib::vt_class_option(),
        // Styling
        // Title
        HavnorLib::vt_notice_field(__( "Section Spacing", 'havnor-core' ),'tle_opt','cs-warning', 'Styling'), // Notice
        array(
          "type" => "textfield",
          "heading" => __( "Section Top Space", 'havnor-core' ),
          "param_name" => "top_space",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Section Bottom Space", 'havnor-core' ),
          "param_name" => "bottom_space",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        HavnorLib::vt_notice_field(__( "Title & Content Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Styling'), // Notice
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
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ), 
        array(
          "type" => "textfield",
          "heading" => __( "Title Font Weight", 'havnor-core' ),
          "param_name" => "title_weight",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ), 
         // Content 
        array(
          "type" => "colorpicker",
          "heading" => __( "Content Color", 'havnor-core' ),
          "param_name" => "content_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
              'dependency' => array(
            'element' => 'call_style',
            'value' => 'two',
          ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Content Size", 'havnor-core' ),
          "param_name" => "content_size",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
            'dependency' => array(
            'element' => 'call_style',
            'value' => 'two',
          ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Content Font Weight", 'havnor-core' ),
          "param_name" => "content_weight",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
            'dependency' => array(
            'element' => 'call_style',
            'value' => 'two',
          ),
        ),
        HavnorLib::vt_notice_field(__( "Button Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Styling'), // Notice
        array(
          "type" => "textfield",
          "heading" => __( "Button Text Size", 'havnor-core' ),
          "param_name" => "btn_text_size",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Border Radius", 'havnor-core' ),
          "param_name" => "btn_border_radius",
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Text Color", 'havnor-core' ),
          "param_name" => "btn_text_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Text Hover Color", 'havnor-core' ),
          "param_name" => "btn_text_hover_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Background Color", 'havnor-core' ),
          "param_name" => "btn_bg_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Background Hover Color", 'havnor-core' ),
          "param_name" => "btn_bg_hover_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Border Color", 'havnor-core' ),
          "param_name" => "btn_border_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Button Border Hover Color", 'havnor-core' ),
          "param_name" => "btn_border_hover_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
        HavnorLib::vt_notice_field(__( "Background Styling", 'havnor-core' ),'tle_opt','cs-warning', 'Styling'), // Notice
        array(
          "type" => "colorpicker",
          "heading" => __( "Section Background Color", 'havnor-core' ),
          "param_name" => "cta_bg_color",
          'value' => '',
          "group" => __( "Styling", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space', 
        ),
      )
    ) );
  }
}
