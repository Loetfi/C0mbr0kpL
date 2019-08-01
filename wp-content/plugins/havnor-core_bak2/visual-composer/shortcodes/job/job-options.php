<?php
/**
 * Job - Shortcode Options
 */
add_action( 'init', 'job_vc_map' );
if ( ! function_exists( 'job_vc_map' ) ) {
  function job_vc_map() {
    vc_map( array(
    "name" => __( "Job", 'havnor-core'),
    "base" => "havnor_job",
    "description" => __( "Job Style", 'havnor-core'),
    "icon" => "fa fa-briefcase color-slate-blue",
    "category" => HavnorLib::havnor_cat_name(),
    "params" => array(

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
          "type"        =>'textfield',
          "heading"     =>__('Posted On Text', 'havnor-core'),
          "param_name"  => "posted_on",
          "value"       => "",
          "description" => __( "Enter view job button text.", 'havnor-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Date Format', 'havnor-core'),
          "param_name"  => "date_format",
          "value"       => "",
          "description" => __( "Enter date format (for more info <a href='https://codex.wordpress.org/Formatting_Date_and_Time' target='_blank'>click here</a>).", 'havnor-core')
        ),
        array(
          "type"        =>'checkbox',
          "heading"     =>__('Pagination', 'havnor-core'),
          "param_name"  => "job_pagination",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),

        HavnorLib::vt_class_option(),

      ), // Params
    ) );
  }
}
