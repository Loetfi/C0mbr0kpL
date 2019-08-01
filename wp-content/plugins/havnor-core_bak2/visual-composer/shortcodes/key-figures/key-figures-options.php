<?php
/**
 * Key Figures - Shortcode Options
 */
add_action( 'init', 'havnor_figures_vc_map' );
if ( ! function_exists( 'havnor_figures_vc_map' ) ) {
  function havnor_figures_vc_map() {
    vc_map( array(
      "name" => __( "Key Figures", 'havnor-core'),
      "base" => "hanor_figures",
      "description" => __( "Key Figures Styles", 'havnor-core'),
      "icon" => "fa fa-road color-red",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Center Image', 'havnor-core'),
          "param_name" => "center_image",
          "value"      => "",
          "description" => __( "Set your center image.", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),

        // Key Figures
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Key Figures', 'havnor-core' ),
          'param_name' => 'figures_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'vt_icon',
              'value' => '',
              'heading' => __( 'Select Icon', 'havnor-core' ),
              'param_name' => 'select_icon',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'admin_label' => true,
              'heading' => __( 'Title', 'havnor-core' ),
              'param_name' => 'figures_title',
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Text', 'havnor-core' ),
              'param_name' => 'figures_text',
            ),

          )
        ),
        HavnorLib::vt_class_option(),

        // Style
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
          'description' => __( 'Enter the px value if you used title area in figures style type one.', 'havnor-core' ),
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
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title Bottom Space', 'havnor-core' ),
          'param_name' => 'title_btm_space',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter the bottom space for title.', 'havnor-core' ),
        ),
         array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Icon Size', 'havnor-core' ),
          'param_name' => 'icon_size',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Icon Color', 'havnor-core' ),
          'param_name' => 'icon_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
          'description' => __( 'Pick your icon color.', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Icon Background Color', 'havnor-core' ),
          'param_name' => 'icon_bg_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
          'description' => __( 'Pick your icon background color.', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Icon Border Color', 'havnor-core' ),
          'param_name' => 'icon_border_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
          'description' => __( 'Pick your icon border color.', 'havnor-core' ),
        ),

      )
    ) );
  }
}
