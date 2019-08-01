<?php
/**
 * Similar Jobs - Shortcode Options
 */

add_action( 'init', 'havnor_similar_jobs_vc_map' );
if ( ! function_exists( 'havnor_similar_jobs_vc_map' ) ) {
  function havnor_similar_jobs_vc_map() {

    vc_map( array(
      'name'            => __( 'Similar Jobs', 'havnor-core'),
      'base'            => 'vc_similar_jobs',
      'is_container'    => true,
      'description'     => __( 'Similar Jobs Styles', 'havnor-core'),
      'icon'            => 'fa fa-bars color-pink',
      'category'        => HavnorLib::havnor_cat_name(),
      'params'          => array(

        HavnorLib::vt_class_option(),
        array(
          "type"        => "notice",
          "heading"     => __( "Listing", 'havnor-core' ),
          "param_name"  => 'lsng_opt',
          'class'       => 'cs-warning',
          'value'       => '',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'havnor-core'),
          "param_name"  => "job_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'havnor-core'),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'havnor-core' ),
          'value' => array(
            __( 'Select Job Order', 'havnor-core' ) => '',
            __('Asending', 'havnor-core') => 'ASC',
            __('Desending', 'havnor-core') => 'DESC',
          ),
          'param_name' => 'job_order',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
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
            __('Name', 'havnor-core') => 'name',
            __('Modified', 'havnor-core') => 'modified',
            __('Random', 'havnor-core') => 'rand',
            __('Menu Order', 'havnor-core') => 'menu_order',
          ),
          'param_name' => 'job_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain roles?', 'havnor-core'),
          "param_name"  => "job_show_category",
          "value"       => "",
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'havnor-core')
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('View Job Text', 'havnor-core'),
          "param_name"  => "view_job",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter view job button text.", 'havnor-core'),
        ),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Tick Image', 'havnor-core'),
          "param_name" => "tick_image",
          "value"      => "",
          "description" => __( "Set your similar_jobs tick image.", 'havnor-core'),
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
          'heading' => __( 'Title Active Color', 'havnor-core' ),
          'param_name' => 'title_active_color',
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
        ),     
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Toggle Button Background Color', 'havnor-core' ),
          'param_name' => 'tgl_btn_bg_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),  
      ),
    ) );
  }
}
