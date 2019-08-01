<?php
/**
 * Video Popup - Shortcode Options
 */
add_action( 'init', 'havnor_video_popup_vc_map' );
if ( ! function_exists( 'havnor_video_popup_vc_map' ) ) {
  function havnor_video_popup_vc_map() {
    vc_map( array(
      "name" => __( "Video Popup", 'havnor-core'),
      "base" => "hanor_video_popup",
      "description" => __( "Video Popup Styles", 'havnor-core'),
      "icon" => "fa fa-play-circle color-green",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Video Popup Style', 'havnor-core' ),
          'value' => array(
            __( 'Style One (With Text)', 'havnor-core' ) => 'popup-one',
            __( 'Style Two (With Image)', 'havnor-core' ) => 'popup-two',
          ),
          'admin_label' => true,
          'param_name' => 'video_popup_style',
          'description' => __( 'Select your video popup style.', 'havnor-core' ),
        ),
        array(
          'type' => 'attach_image',
          'value' => '',
          'heading' => __( 'Upload Icon Image', 'havnor-core' ),
          'param_name' => 'select_image',
          'dependency' => array(
            'element' => 'video_popup_style',
            'value' => 'popup-two',
          ),
        ),
        array(
          'type' => 'vt_icon',
          'value' => '',
          'heading' => __( 'Play Icon', 'havnor-core' ),
          'param_name' => 'play_icon',
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Video Link', 'havnor-core' ),
          'param_name' => 'video_link',
        ),
        array(
          'type' => 'textarea_html',
          'value' => '',
          'heading' => __( 'Text', 'havnor-core' ),
          'param_name' => 'content',
          'dependency' => array(
            'element' => 'video_popup_style',
            'value' => 'popup-one',
          ),
        ),

        HavnorLib::vt_class_option(),

        // Style
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Image Overlay Color', 'havnor-core' ),
          'param_name' => 'image_overlay_color',
          'dependency' => array(
            'element' => 'video_popup_style',
            'value' => 'popup-two',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Icon Color', 'havnor-core' ),
          'param_name' => 'icon_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Icon Hover Color', 'havnor-core' ),
          'param_name' => 'icon_hover_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Icon Size', 'havnor-core' ),
          'param_name' => 'icon_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Icon Background Color', 'havnor-core' ),
          'param_name' => 'icon_bg_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Icon Background Hover Color', 'havnor-core' ),
          'param_name' => 'icon_bg_hover_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Text Size', 'havnor-core' ),
          'param_name' => 'text_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter text size", 'havnor-core'),
          'group' => __( 'Style', 'havnor-core' ),
          'dependency' => array(
            'element' => 'video_popup_style',
            'value' => 'popup-one',
          ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Text Font Weight', 'havnor-core' ),
          'param_name' => 'text_weight',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter text font weight", 'havnor-core'),
          'group' => __( 'Style', 'havnor-core' ),
          'dependency' => array(
            'element' => 'video_popup_style',
            'value' => 'popup-one',
          ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Text Color', 'havnor-core' ),
          'param_name' => 'text_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
           "description" => __( "Pick text color", 'havnor-core'),
          'group' => __( 'Style', 'havnor-core' ),
          'dependency' => array(
            'element' => 'video_popup_style',
            'value' => 'popup-one',
          ),
        ),

        // Spacings
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Section Top Space', 'havnor-core' ),
          'param_name' => 'top_space',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter section top space", 'havnor-core'),
          'group' => __( 'Spacings', 'havnor-core' ),
          'dependency' => array(
            'element' => 'video_popup_style',
            'value' => 'popup-one',
          ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Section Bottom Space', 'havnor-core' ),
          'param_name' => 'bottom_space',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter section bottom space", 'havnor-core'),
          'group' => __( 'Spacings', 'havnor-core' ),
          'dependency' => array(
            'element' => 'video_popup_style',
            'value' => 'popup-one',
          ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Video Icon Bottom Space', 'havnor-core' ),
          'param_name' => 'icon_bottom_space',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter icon bottom space", 'havnor-core'),
          'group' => __( 'Spacings', 'havnor-core' ),
          'dependency' => array(
            'element' => 'video_popup_style',
            'value' => 'popup-one',
          ),
        ),

      )
    ) );
  }
}
