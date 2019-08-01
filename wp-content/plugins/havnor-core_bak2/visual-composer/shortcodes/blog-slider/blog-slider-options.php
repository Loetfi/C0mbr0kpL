<?php
/**
 * Blog Slider - Shortcode Options
 */
add_action( 'init', 'havnor_blog_slider_vc_map' );
if ( ! function_exists( 'havnor_blog_slider_vc_map' ) ) {
  function havnor_blog_slider_vc_map() {
    vc_map( array(
      "name" => __( "Blog Slider", 'havnor-core'),
      "base" => "hanor_blog_slider",
      "description" => __( "Blog Slider Styles", 'havnor-core'),
      "icon" => "fa fa-newspaper-o color-red",
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
          "param_name"  => "blog_slider_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'havnor-core'),
        ),        
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'havnor-core' ),
          'value' => array(
            __( 'Select Blog Slider Order', 'havnor-core' ) => '',
            __('Asending', 'havnor-core') => 'ASC',
            __('Desending', 'havnor-core') => 'DESC',
          ),
          'param_name' => 'blog_slider_order',
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
          ),
          'param_name' => 'blog_slider_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain categories?', 'havnor-core'),
          "param_name"  => "blog_slider_show_category",
          "value"       => "",
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Read More Text', 'havnor-core'),
          "param_name"  => "read_more_txt",
          "value"       => "",
          "description" => __( "Enter read more text.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
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
          "heading"     =>__('Autoplay', 'havnor-core'),
          "param_name"  => "autoplay",
          "value"       => "",
          "group"       => __('Slider', 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'checkbox',
          "heading"     =>__('Fade Effect', 'havnor-core'),
          "param_name"  => "fade_effect",
          "value"       => "",
          "group"       => __('Slider', 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Autoplay Timeout', 'havnor-core'),
          "param_name"  => "time_out",
          "value"       => "",
          "group"       => __('Slider', 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Slides To Scroll', 'havnor-core'),
          "param_name"  => "slides_to_scroll",
          "value"       => "",
          "group"       => __('Slider', 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        
        HavnorLib::vt_class_option(),

      )
    ) );
  }
}
