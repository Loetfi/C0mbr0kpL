<?php
/**
 * Food List - Shortcode Options
 */
add_action( 'init', 'havnor_food_list_vc_map' );
if ( ! function_exists( 'havnor_food_list_vc_map' ) ) {
  function havnor_food_list_vc_map() {
    vc_map( array(
      "name" => __( "Food List", 'havnor-core'),
      "base" => "havnor_food_list",
      "description" => __( "Food List Styles", 'havnor-core'),
      "icon" => "fa fa-birthday-cake color-orange",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Food Item Show From', 'havnor-core' ),
          'value' => array(
            __( 'From Specific Item IDs', 'havnor-core' ) => 'specific-id',
            __( 'From All Item', 'havnor-core' ) => 'all-id',
          ),
          'param_name' => 'food_menu_style',
          'description' => __( 'Select your food menu display style.', 'havnor-core' ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'havnor-core'),
          "param_name"  => "food_menu_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'havnor-core'),
          'dependency' => array(
            'element' => 'food_menu_style',
            'value'   => array('all-id')
          ),
        ),
        array(
          "type"        => "notice",
          "heading"     => __( "Listing", 'havnor-core' ),
          "param_name"  => 'lsng_opt',
          'class'       => 'cs-warning',
          'value'       => '',
          'dependency' => array(
            'element' => 'food_menu_style',
            'value'   => array('all-id')
          ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'havnor-core' ),
          'value' => array(
            __( 'Select Blog Order', 'havnor-core' ) => '',
            __('Asending', 'havnor-core') => 'ASC',
            __('Desending', 'havnor-core') => 'DESC',
          ),
          'param_name' => 'food_menu_order',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'food_menu_style',
            'value'   => array('all-id')
          ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order By', 'havnor-core' ),
          'value' => array(
            __('None', 'havnor-core') => 'none',
            __('ID', 'havnor-core') => 'ID',
            __('Author', 'havnor-core') => 'author',
            __('Title', 'havnor-core') => 'title',
            __('Date', 'havnor-core') => 'date',
          ),
          'param_name' => 'food_menu_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'food_menu_style',
            'value'   => array('all-id')
          ),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain categories?', 'havnor-core'),
          "param_name"  => "food_menu_show_category",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'havnor-core'),
          'dependency' => array(
            'element' => 'food_menu_style',
            'value'   => array('all-id')
          ),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain ids?', 'havnor-core'),
          "param_name"  => "food_menu_show_id",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter Item IDs (comma separated) you want to display.", 'havnor-core'),
          'dependency' => array(
            'element' => 'food_menu_style',
            'value'   => array('specific-id')
          ),
        ),
        array(
          "type"        =>'checkbox',
          "heading"     =>__('Title Link', 'havnor-core'),
          "param_name"  => "title_link",
          "value"       => "",
          "std"         => true,
           "description" => __( "If you want to disable the Title link, disable this.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'checkbox',
          "heading"     =>__('Category Link', 'havnor-core'),
          "param_name"  => "category_link",
          "value"       => "",
          "std"         => true,
          "description" => __( "If you want to disable Category link, disable this.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        HavnorLib::vt_open_link_tab(),

        array(
          "type"        =>'checkbox',
          "heading"     =>__('Hide Categories?', 'havnor-core'),
          "param_name"  => "hide_categories",
          "value"       => "",
          "std"         => false,
          "description" => __( "If you want to hide categories, enable this.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'checkbox',
          "heading"     =>__('Hide Contents?', 'havnor-core'),
          "param_name"  => "hide_contents",
          "value"       => "",
          "std"         => true,
          "description" => __( "If you want to hide excerpt content (showing under menu title), enable this.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        HavnorLib::vt_class_option(),

        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Color', 'havnor-core'),
          "param_name" => "title_color",
          "value"      => "",
          "description" => __( "Pick your title color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Hover Color', 'havnor-core'),
          "param_name" => "title_hover_color",
          "value"      => "",
          "description" => __( "Pick your title hover color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Size', 'havnor-core'),
          "param_name" => "title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Category Color', 'havnor-core'),
          "param_name" => "cat_color",
          "value"      => "",
          "description" => __( "Pick your categories color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Category Hover Color', 'havnor-core'),
          "param_name" => "cat_hover_color",
          "value"      => "",
          "description" => __( "Pick your categories hover color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Category Size', 'havnor-core'),
          "param_name" => "cat_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for categories size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Price Color', 'havnor-core'),
          "param_name" => "price_color",
          "value"      => "",
          "description" => __( "Pick your price color.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Price Size', 'havnor-core'),
          "param_name" => "price_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for price size in px.", 'havnor-core'),
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
      )
    ) );
  }
}
