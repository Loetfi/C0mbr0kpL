<?php
/**
 * Tabs - Shortcode Options
 */

add_action( 'init', 'havnor_tabs_vc_map' );
if ( ! function_exists( 'havnor_tabs_vc_map' ) ) {
  function havnor_tabs_vc_map() {

    $tab_one_id = time() . '-1-' . rand( 0, 100 );
    $tab_two_id = time() . '-2-' . rand( 0, 100 );
    $tab_three_id = time() . '-3-' . rand( 0, 100 );

    vc_map( array(
      "name"            => __( "Havnor Tabs", 'havnor-core'),
      'base'            => 'vc_tabs',
      'is_container'    => true,
      'icon'            => 'fa fa-list-alt color-blue',
      'description'     => __( "Tabs Style", 'havnor-core'),
      'category'        => HavnorLib::havnor_cat_name(),
      'params'          => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Tab Style', 'havnor-core' ),
          'value' => array(
            __( 'Style One', 'havnor-core' ) => 'tab-one',
            __( 'Style Two', 'havnor-core' ) => 'tab-two',
            __( 'Style Three', 'havnor-core' ) => 'tab-three',
            __( 'Style Four', 'havnor-core' ) => 'tab-four',
            __( 'Style Five', 'havnor-core' ) => 'tab-five',
            __( 'Style Six', 'havnor-core' ) => 'tab-six',
          ),
          'param_name' => 'tab_style',
          'description' => __( 'Select your tab style.', 'havnor-core' ),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Section Title", 'havnor-core'),
          'param_name'  => 'tab_title',
          'dependency' => array(
            'element' => 'tab_style',
            'value' => array('tab-two'),
          ),
        ),
        array(
          'type'        => 'textarea',
          'heading'     => __( "Section Content", 'havnor-core'),
          'param_name'  => 'tab_content',
          'dependency' => array(
            'element' => 'tab_style',
            'value' => array('tab-two'),
          ),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Active Tab", 'havnor-core'),
          'param_name'  => 'active',
          'description' => __( "Which tab you want to be active on load. [Eg. 1 or 2 or 3]", 'havnor-core'),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Tab Section Title Color', 'havnor-core'),
          "param_name" => "tab_section_title_color",
           "group" => __( "Styling", 'havnor-core'),
          "value"      => "",
          'dependency' => array(
            'element' => 'tab_style',
            'value' => array('tab-five'),
          ),
          "description" => __( "Pick your tab section title color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Tab Section Title Size', 'havnor-core'),
          "param_name" => "tab_section_title_size",
           "group" => __( "Styling", 'havnor-core'),
          "value"      => "",
          'dependency' => array(
            'element' => 'tab_style',
            'value' => array('tab-five'),
          ),
          "description" => __( "Pick your tab section title size.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Tab Section Title Bottom Space', 'havnor-core'),
          "param_name" => "tab_section_title_btm_space",
           "group" => __( "Styling", 'havnor-core'),
          "value"      => "",
          'dependency' => array(
            'element' => 'tab_style',
            'value' => array('tab-five'),
          ),
          "description" => __( "Pick your tab section title size.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Active Tab Color', 'havnor-core'),
          "param_name" => "active_tab_color",
           "group" => __( "Styling", 'havnor-core'),
          "value"      => "",
          "description" => __( "Pick your active tab color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Tab Title Color', 'havnor-core'),
          "param_name" => "tab_title_color",
           "group" => __( "Styling", 'havnor-core'),
          "value"      => "",
          "description" => __( "Pick your tab title color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Tab Title Border Color', 'havnor-core'),
          "param_name" => "tab_border_color",
          "group" => __( "Styling", 'havnor-core'),
          "value"      => "",
          "description" => __( "Pick your share background color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
           'dependency' => array(
            'element' => 'tab_style',
            'value' => array('tab-five'),
          ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Tab Title Hover Color', 'havnor-core'),
          "param_name" => "tab_title_hover_color",
           "group" => __( "Styling", 'havnor-core'),
          "value"      => "",
          "description" => __( "Pick your tab title hover color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Tab Title Active Bg Color', 'havnor-core'),
          "param_name" => "tab_title_active_bg_color",
           "group" => __( "Styling", 'havnor-core'),
          "value"      => "",
          'dependency' => array(
            'element' => 'tab_style',
            'value' => array('tab-two'),
          ),
          "description" => __( "Pick your tab title hover color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Tab Content Color', 'havnor-core'),
          "param_name" => "tab_content_color",
           "group" => __( "Styling", 'havnor-core'),
          "value"      => "",
          "description" => __( "Pick your tab content color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Tab Icon Color', 'havnor-core'),
          "param_name" => "tab_icon_color",
           "group" => __( "Styling", 'havnor-core'),
          "value"      => "",
          "description" => __( "Pick your tab icon color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        array(
          'type'        => 'textfield',
          'heading'     => __( "Tab Width", 'havnor-core'),
          'param_name'  => 'tab_width',
          'description' => __( "Enter your custom tab width", 'havnor-core'),
          "group" => __( "Styling", 'havnor-core'),
          'dependency' => array(
            'element' => 'tab_style',
            'value' => array('tab-four'),
          ),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Tab Title section Bottom Space", 'havnor-core'),
          'param_name'  => 'tab_title_bottom_space',
          "group" => __( "Styling", 'havnor-core'),
          'dependency' => array(
            'element' => 'tab_style',
            'value' => array('tab-three'),
          ),
          "description" => __( "Enter the numeric value for title bottom space in px.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Tab Title Size", 'havnor-core'),
          'param_name'  => 'tab_font_size',
           "group" => __( "Styling", 'havnor-core'),
          "description" => __( "Enter the numeric value for title size in px.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Tab Title Font Weight", 'havnor-core'),
          'param_name'  => 'tab_font_weight',
           "group" => __( "Styling", 'havnor-core'),
          "description" => __( "Enter the numeric value for title font weight.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Tab Content Size", 'havnor-core'),
          'param_name'  => 'tab_content_size',
           "group" => __( "Styling", 'havnor-core'),
          "description" => __( "Enter the numeric value for content size in px.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Tab Right Space", 'havnor-core'),
          'param_name'  => 'tab_right_space',
           "group" => __( "Styling", 'havnor-core'),
          "description" => __( "Enter the numeric value for right space in px.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Tab Section Title", 'havnor-core'),
          'param_name'  => 'tab_section_title',
          'dependency' => array(
            'element' => 'tab_style',
            'value' => array('tab-five'),
          ),
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Need Dark Version ?", 'havnor-core' ),
          "param_name" => "tab_dark",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Need dark version for tab?", 'havnor-core'),
          'dependency' => array(
            'element' => 'tab_style',
            'value' => array('tab-five'),
          ),
        ),
        array(
          "type"        =>'checkbox',
          "heading"     =>__('Need Share', 'havnor-core'),
          "param_name"  => "need_share",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
           'dependency' => array(
            'element' => 'tab_style',
            'value' => array('tab-six'),
          ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Share Background Color', 'havnor-core'),
          "param_name" => "share_bg_color",
          "value"      => "",
          "description" => __( "Pick your share background color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
           'dependency' => array(
            'element' => 'tab_style',
            'value' => array('tab-six'),
          ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Share Text & Icon Color', 'havnor-core'),
          "param_name" => "share_text_color",
          "value"      => "",
          "description" => __( "Pick your text & icon color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
           'dependency' => array(
            'element' => 'tab_style',
            'value' => array('tab-six'),
          ),
        ),

      ),
      'custom_markup'   => '<div class="wpb_tabs_holder wpb_holder vc_container_for_children"><ul class="tabs_controls"></ul>%content%</div>',
      'default_content' => '
        [vc_tab title="Tab 1" tab_id="' . $tab_one_id . '"][/vc_tab]
        [vc_tab title="Tab 2" tab_id="' . $tab_two_id . '"][/vc_tab]
        [vc_tab title="Tab 3" tab_id="' . $tab_three_id . '"][/vc_tab]',
      'js_view'         => 'VcTabsView'
    ) );

    /* Tab */
    vc_map( array(
      'name'                      => __( "Tab", 'havnor-core'),
      'base'                      => 'vc_tab',
      // 'allowed_container_element' => 'vc_row',
      'is_container'              => true,
      'content_element'           => false,
      'category'                  => HavnorLib::havnor_cat_name(),
      'params'                    => array(
        array(
          'type'        => 'tab_id',
          'heading'     => __( "Tab Unique ID", 'havnor-core'),
          'param_name'  => 'tab_id'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Tab Title", 'havnor-core'),
          'param_name'  => 'title',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Tab Subitle", 'havnor-core'),
          'param_name'  => 'sub_title',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Icon Style', 'havnor-core' ),
          'value' => array(
            __( 'Image', 'havnor-core' ) => 'icon-img',
            __( 'Icon', 'havnor-core' )  => 'icon-ico',
          ),
          'param_name' => 'tab_icon_style',
        ),
        array(
          "type"      => 'vt_icon',
          "heading"   => __('Set Icon', 'havnor-core'),
          "param_name" => "tab_icon",
          'dependency' => array(
            'element' => 'tab_icon_style',
            'value' => array('icon-ico'),
          ),
        ),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Icon Image', 'havnor-core'),
          "param_name" => "tab_icon_image",
          'dependency' => array(
            'element' => 'tab_icon_style',
            'value' => array('icon-img'),
          ),
        ),

      ),
      'js_view'         => 'VcTabView'
    ) );

  }
}
