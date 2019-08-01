<?php
/**
 * Testimonial Carousel - Shortcode Options
 */
add_action( 'init', 'testimonial_carousel_vc_map' );
if ( ! function_exists( 'testimonial_carousel_vc_map' ) ) {
  function testimonial_carousel_vc_map() {
    vc_map( array(
    "name" => __( "Testimonial Carousel", 'havnor-core'),
    "base" => "hanor_testimonial_carousel",
    "description" => __( "Carousel Style Testimonial", 'havnor-core'),
    "icon" => "fa fa-comments color-green",
    "category" => HavnorLib::havnor_cat_name(),
    "params" => array(

      array(
        "type" => "dropdown",
        "heading" => __( "Testimonial Style", 'havnor-core' ),
        "param_name" => "testimonial_style",
        "value" => array(
          __('Style One', 'havnor-core') => 'testimonial_one',
          __('Style Two', 'havnor-core') => 'testimonial_two',
          __('Style Three', 'havnor-core') => 'testimonial_three',
          __('Style Four', 'havnor-core') => 'testimonial_four',
          __('Style Five ( Thumb Slider )', 'havnor-core') => 'testimonial_five',
        ),
        "admin_label" => true,
        "description" => __( "Select testimonial carousel style.", 'havnor-core'),
      ),
      array(
        "type"        =>'checkbox',
        "heading"     =>__('Need Testimonial With Features Image', 'havnor-core'),
        "param_name"  => "with_image",
        "value"       => "",
        "std"         => false,
        'dependency' => array(
          'element' => 'testimonial_style',
          'value' =>'testimonial_one',
        ),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Title', 'havnor-core'),
        "param_name"  => "testi_title",
        "value"       => "",
        'dependency' => array(
          'element' => 'testimonial_style',
          'value' => array('testimonial_two', 'testimonial_four'),
        ),
      ),
      array(
        "type" => "dropdown",
        "heading" => __( "Testimonial Style", 'havnor-core' ),
        "param_name" => "image_align_style",
        "value" => array(
          __('Image Left', 'havnor-core') => 'image-left',
          __('Image Top', 'havnor-core') => 'image-top',
          __('Image Hide', 'havnor-core') => 'image-hide',
        ),
         'dependency' => array(
          'element' => 'testimonial_style',
          'value' => 'testimonial_four',
        ),
      ),
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
        "param_name"  => "testimonial_limit",
        "value"       => "",
        'admin_label' => true,
        "description" => __( "Enter the number of items to show.", 'havnor-core'),
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Order', 'havnor-core' ),
        'value' => array(
          __( 'Select Testimonial Order', 'havnor-core' ) => '',
          __('Asending', 'havnor-core') => 'ASC',
          __('Desending', 'havnor-core') => 'DESC',
        ),
        'param_name' => 'testimonial_order',
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
        'param_name' => 'testimonial_orderby',
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('ID', 'havnor-core'),
        "param_name"  => "testimonial_id",
        "value"       => "",
        "description" => __( "Enter the id's (comma separated) of items to show.", 'havnor-core'),
      ),
      array(
        'type' => 'attach_image',
        'value' => '',
        "admin_label"=> true,
        'heading' => __( 'Quote Image', 'havnor-core' ),
        'param_name' => 'quote_img',
      ),
      HavnorLib::vt_class_option(),

      // Carousel
      HavnorLib::vt_notice_field(__( "Basic Options", 'havnor-core' ),'bsic_opt','cs-warning', 'Carousel'), // Notice
      HavnorLib::vt_carousel_loop(), // Loop
      HavnorLib::vt_carousel_items(), // Items
      HavnorLib::vt_carousel_margin(), // Margin
      HavnorLib::vt_carousel_dots(), // Dots
      HavnorLib::vt_carousel_nav(), // Nav
      HavnorLib::vt_notice_field(__( "Auto Play & Interaction", 'havnor-core' ),'apyi_opt','cs-warning', 'Carousel'), // Notice
      HavnorLib::vt_carousel_autoplay_timeout(), // Autoplay Timeout
      HavnorLib::vt_carousel_autoplay(), // Autoplay
      HavnorLib::vt_carousel_animateout(), // Animate Out
      HavnorLib::vt_carousel_animatein(), // Animate In
      HavnorLib::vt_carousel_mousedrag(), // Mouse Drag
      HavnorLib::vt_notice_field(__( "Width & Height", 'havnor-core' ),'wah_opt','cs-warning', 'Carousel'), // Notice
      HavnorLib::vt_carousel_autowidth(), // Auto Width
      HavnorLib::vt_carousel_autoheight(), // Auto Height
      HavnorLib::vt_notice_field('Responsive Options','res_opt','cs-warning', 'Carousel'), // Notice
      HavnorLib::vt_carousel_tablet(), // Tablet
      HavnorLib::vt_carousel_mobile(), // Mobile
      HavnorLib::vt_carousel_small_mobile(), // Small Mobile

      // Style
      array(
        "type"        =>'textfield',
        "heading"     =>__('Title Size', 'havnor-core'),
        "param_name"  => "title_size",
        "value"       => "",
        "group"       => __('Style', 'havnor-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'dependency' => array(
          'element' => 'testimonial_style',
          'value' => 'testimonial_four',
        ),
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Title Font Weight', 'havnor-core'),
        "param_name"  => "title_weight",
        "value"       => "",
        "group"       => __('Style', 'havnor-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'dependency' => array(
          'element' => 'testimonial_style',
          'value' => 'testimonial_four',
        ),
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Title Color', 'havnor-core'),
        "param_name"  => "title_color",
        "value"       => "",
        "group"       => __('Style', 'havnor-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'dependency' => array(
          'element' => 'testimonial_style',
          'value' => 'testimonial_four',
        ),
      ),

      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Content Color', 'havnor-core'),
        "param_name"  => "content_color",
        "value"       => "",
        "group"       => __('Style', 'havnor-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Name Color', 'havnor-core'),
        "param_name"  => "name_color",
        "value"       => "",
        "group"       => __('Style', 'havnor-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      // Size
      array(
        "type"        =>'textfield',
        "heading"     =>__('Content Size', 'havnor-core'),
        "param_name"  => "content_size",
        "value"       => "",
        "group"       => __('Style', 'havnor-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Content Line Height', 'havnor-core'),
        "param_name"  => "content_line_height",
        "value"       => "",
        "group"       => __('Style', 'havnor-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Name Size', 'havnor-core'),
        "param_name"  => "name_size",
        "value"       => "",
        "group"       => __('Style', 'havnor-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Content Background Color', 'havnor-core'),
        "param_name"  => "content_bg_color",
        "value"       => "",
        "group"       => __('Style', 'havnor-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
         'dependency' => array(
          'element' => 'testimonial_style',
          'value' => 'testimonial_four',
        ),
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Image Background Color', 'havnor-core'),
        "param_name"  => "image_bg_color",
        "value"       => "",
        "group"       => __('Style', 'havnor-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        'dependency' => array(
          'element' => 'testimonial_style',
          'value' => array('testimonial_four','testimonial_three','testimonial_two','testimonial_one'),
        ),
      ),
      array(
        "type"        => "notice",
        "heading"     => __( "Star Colors", 'omnitail-core' ),
        "param_name"  => 'lft_optt',
        'class'       => 'cs-info',
        'value'       => '',
        'group' => __( 'Style', 'havnor-core' ),
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Star Color', 'havnor-core'),
        "param_name"  => "star_color",
        "value"       => "",
        "group"       => __('Style', 'havnor-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Star Active Color', 'havnor-core'),
        "param_name"  => "active_star_color",
        "value"       => "",
        "group"       => __('Style', 'havnor-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Star Size', 'havnor-core'),
        "param_name"  => "star_size",
        "value"       => "",
        "group"       => __('Style', 'havnor-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        => "notice",
        "heading"     => __( "Arrow Colors", 'omnitail-core' ),
        "param_name"  => 'lft_optt',
        'class'       => 'cs-info',
        'value'       => '',
        'group' => __( 'Style', 'havnor-core' ),
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Nav Arrow Color', 'havnor-core'),
        "param_name"  => "nav_arrow_color",
        "value"       => "",
        "group"       => __('Style', 'havnor-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Nav Arrow Border Color', 'havnor-core'),
        "param_name"  => "nav_arrow_border_color",
        "value"       => "",
        "group"       => __('Style', 'havnor-core'),
        'dependency' => array(
          'element' => 'testimonial_style',
          'value' => array('testimonial_four','testimonial_five'),
        ),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
     
      ), // Params
    ) );
  }
}
