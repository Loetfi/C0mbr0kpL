<?php
/**
 * Accordion - Shortcode Options
 */
add_action( 'init', 'havnor_accordion_vc_map' );
if ( ! function_exists( 'havnor_accordion_vc_map' ) ) {
  function havnor_accordion_vc_map() {

    vc_map( array(
      'name'            => __( 'Havnor Accordion', 'havnor-core'),
      'base'            => 'vc_accordion',
      'is_container'    => true,
      'description'     => __( 'Accordion Styles', 'havnor-core'),
      'icon'            => 'fa fa-bars color-pink',
      'category'        => HavnorLib::havnor_cat_name(),
      'params'          => array(

        array(
          'type'        => 'dropdown',
          'heading'     => __( "Accordion Style", 'havnor-core'),
          'param_name'  => 'accordion_style',
          'value'       => array(
            __( "Select Accordion Style", 'havnor-core') => '',
            __( "Style One", 'havnor-core')   => 'style-one',
            __( "Style Two", 'havnor-core')   => 'style-two',
            __( "Style Three", 'havnor-core')   => 'style-three',
          ),
          'description' => __( "Select Accordion Style", 'havnor-core'),
        ),

        HavnorLib::vt_id_option(),
        HavnorLib::vt_class_option(),
        array(
          'type'        => 'textfield',
          'heading'     => __( 'Active tab', 'havnor-core'),
          'param_name'  => 'active_tab',
          'description' => __( "Which tab you want to be active on load. [Eg. 1 or 2 or 3]", 'havnor-core'),
        ),
        array(
          'type'        => 'checkbox',
          'heading'     => __( 'Only One Tab Active Mode', 'havnor-core'),
          'param_name'  => 'one_active',
          'description' => __( 'This will enable only one tab active at a time. All other tabs will be in-active mode.', 'havnor-core'),
        ),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Tick Image', 'havnor-core'),
          "param_name" => "tick_image",
          "value"      => "",
          'dependency' => array(
            'element' => 'accordion_style',
            'value' => 'style-three',
          ),
          "description" => __( "Set your accordion tick image.", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( 'Title Size', 'havnor-core'),
          'param_name'  => 'title_size',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Color', 'havnor-core' ),
          'param_name' => 'title_color',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Background Color', 'havnor-core' ),
          'param_name' => 'title_bg_color',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => "notice",
          "heading"     => __( "Toggle Button", 'omnitail-core' ),
          "param_name"  => 'tgl_btn',
          'class'       => 'cs-info',
          'value'       => '',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Toggle Button Color', 'havnor-core' ),
          'param_name' => 'tgl_btn_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
          'dependency' => array(
            'element' => 'accordion_style',
            'value' => 'style-three',
          ),
        ),     
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Toggle Button Background Color', 'havnor-core' ),
          'param_name' => 'tgl_btn_bg_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
          'dependency' => array(
            'element' => 'accordion_style',
            'value' => 'style-three',
          ),
        ),  
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Number Color', 'havnor-core' ),
          'param_name' => 'tgl_number_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
          'dependency' => array(
            'element' => 'accordion_style',
            'value' => 'style-two',
          ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Number Background Color', 'havnor-core' ),
          'param_name' => 'tgl_number_bg_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
          'dependency' => array(
            'element' => 'accordion_style',
            'value' => 'style-two',
          ),
        ), 
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Active Number Color', 'havnor-core' ),
          'param_name' => 'tgl_active_number_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
          'dependency' => array(
            'element' => 'accordion_style',
            'value' => 'style-two',
          ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Active Number Background Color', 'havnor-core' ),
          'param_name' => 'tgl_active_number_bg_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
          'dependency' => array(
            'element' => 'accordion_style',
            'value' => 'style-two',
          ),
        ),

      ),

      'custom_markup'   => '<div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">%content%</div><div class="tab_controls"><a class="add_tab" title="Add section"><span class="vc_icon"></span> <span class="tab-label">Add section</span></a></div>',
      'default_content' => '
        [vc_accordion_tab title="Accordion Tab 1" sub_title="Sub Title 1"][/vc_accordion_tab]
        [vc_accordion_tab title="Accordion Tab 2" sub_title="Sub Title 2"][/vc_accordion_tab]
      ',
      'js_view'         => 'VcAccordionView'
    ) );

    // ==========================================================================================
    // VC ACCORDION TAB
    // ==========================================================================================
    vc_map( array(
      'name'                      => __( 'Accordion Section', 'havnor-core'),
      'base'                      => 'vc_accordion_tab',
      // 'allowed_container_element' => 'vc_row',
      'is_container'              => true,
      'content_element'           => false,
      'category'                  => HavnorLib::havnor_cat_name(),
      'params'                    => array(
        array(
          'type'        => 'textfield',
          'heading'     => __( 'Title', 'havnor-core'),
          'param_name'  => 'title',
        ),
      ),
      'js_view'         => 'VcAccordionTabView'
    ) );

  }
}
