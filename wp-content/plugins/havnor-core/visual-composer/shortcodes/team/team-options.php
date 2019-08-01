<?php
/**
 * Team - Shortcode Options
 */
add_action( 'init', 'team_vc_map' );
if ( ! function_exists( 'team_vc_map' ) ) {
  function team_vc_map() {
    vc_map( array(
    "name" => __( "Team", 'havnor-core'),
    "base" => "havnor_team",
    "description" => __( "Team Style", 'havnor-core'),
    "icon" => "fa fa-user color-blue",
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
          'type' => 'dropdown',
          'heading' => __( 'Team Style', 'havnor-core' ),
          'value' => array(
            __( 'Style One', 'havnor-core' ) => 'one',
            __( 'Style Two', 'havnor-core' ) => 'two',
            __( 'Style Three', 'havnor-core' ) => 'three',
            __( 'Style Four', 'havnor-core' ) => 'four',
            __( 'Style Five (Slider)', 'havnor-core' ) => 'five',
             __( 'Style Six ', 'havnor-core' ) => 'six',
             __( 'Style Seven ', 'havnor-core' ) => 'seven',
             __( 'Style Eight ', 'havnor-core' ) => 'eight',
          ),
          'admin_label' => true,
          'param_name' => 'team_style',
          'description' => __( 'Select your team style.', 'havnor-core' ),
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Need Background Image", 'havnor-core' ),
          "param_name" => "need_team_bg",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Need background image for team image?", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' => array('seven','eight'),
          ),
        ),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Background Image', 'havnor-core'),
          "param_name" => "team_bg_image",
          "value"      => "",
          "description" => __( "Set your background image.", 'havnor-core'),
          'dependency' => array(
            'element' => 'need_team_bg',
            'value' => 'true',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Need Border For Image", 'havnor-core' ),
          "param_name" => "team_image_border",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Need border for image in team section ?", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' => array('six','eight'),
          ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Team Listing Column', 'havnor-core' ),
          'value' => array(
            __( 'Select Column', 'havnor-core' ) => 'col-sel',
            __( 'Three Column', 'havnor-core' ) => 'col-3',
            __( 'Four Column', 'havnor-core' ) => 'col-4',
          ),
          'param_name' => 'team_column',
          'description' => __( 'Select your team column.', 'havnor-core' ),
          'dependency' => array(
            'element' => 'team_style',
            'value' => array('one','two','eight'),
          ),
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Hide Social Icons ?", 'havnor-core' ),
          "param_name" => "team_social_icon",
          'value' => '',
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Hide social icon for team section ?", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' => 'one',
          ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'havnor-core'),
          "param_name"  => "team_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'havnor-core'),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'havnor-core' ),
          'value' => array(
            __( 'Select Team Order', 'havnor-core' ) => '',
            __('Asending', 'havnor-core') => 'ASC',
            __('Desending', 'havnor-core') => 'DESC',
          ),
          'param_name' => 'team_order',
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
            __('Post In', 'fraxos-core') => 'post__in',
          ),
          'param_name' => 'team_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('ID', 'havnor-core'),
          "param_name"  => "team_id",
          "value"       => "",
          "description" => __( "Enter the id's (comma separated) of items to show.", 'havnor-core'),
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Need Rounded Team Image", 'havnor-core' ),
          "param_name" => "team_rounded_image",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Need rounded image in team section ?", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' => array('five'),
          ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Image Background Color', 'havnor-core'),
          "param_name" => "image_bg_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core' ),
          "description" => __( "Pick your team image background color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'team_style',
            'value' => array('one','two','four','five','six','eight'),
          ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Image Background Hover Color', 'havnor-core'),
          "param_name" => "image_bg_hover_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core' ),
          "description" => __( "Pick your team image background hover color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'team_style',
            'value' => 'one',
          ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Team Info Color', 'havnor-core'),
          "param_name" => "info_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core' ),
          "description" => __( "Pick your team info color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'team_style',
            'value' => 'five',
          ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Team Info Content Color', 'havnor-core'),
          "param_name" => "info_content_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core' ),
          "description" => __( "Pick your team info content color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'team_style',
            'value' => 'five',
          ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Team Info Link Color', 'havnor-core'),
          "param_name" => "info_link_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core' ),
          "description" => __( "Pick your team info link color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'team_style',
            'value' => 'five',
          ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Team Info Link Hover Color', 'havnor-core'),
          "param_name" => "info_link_hover_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core' ),
          "description" => __( "Pick your team info link hover color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'team_style',
            'value' => 'five',
          ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Team Image Border Color', 'havnor-core'),
          "param_name" => "btm_border_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core' ),
          "description" => __( "Pick your team image bottom border color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'team_style',
            'value' => 'one',
          ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Team Image Border Hover Color', 'havnor-core'),
          "param_name" => "btm_border_hover_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core' ),
          "description" => __( "Pick your team image bottom border hover color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'team_style',
            'value' => 'one',
          ),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Team Name Color', 'havnor-core'),
          "param_name" => "name_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core' ),
          "description" => __( "Pick your team name color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Team Name Hover Color', 'havnor-core'),
          "param_name" => "name_hover_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core' ),
          "description" => __( "Pick your team name color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Team Designation Color', 'havnor-core'),
          "param_name" => "designation_color",
          "value"      => "",
          "group" => __( "Style", 'havnor-core' ),
          "description" => __( "Pick your team name color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Team Content Color', 'havnor-core'),
          "param_name" => "content_color",
          "value"      => "",
          'dependency' => array(
            'element' => 'team_style',
            'value' =>array('one','three','six','seven'),
          ),
          "group" => __( "Style", 'havnor-core' ),
          "description" => __( "Pick your team name color.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Name Size", 'havnor-core' ),
          "param_name" => "name_size",
          'value' => '',
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Name Font Weight", 'havnor-core' ),
          "param_name" => "name_weight",
          'value' => '',
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Designation Size", 'havnor-core' ),
          "param_name" => "designation_size",
          'value' => '',
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Content Size", 'havnor-core' ),
          "param_name" => "content_size",
          'value' => '',
          "group" => __( "Style", 'havnor-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'team_style',
            'value' =>array('one','three','six','seven'),
          ),
        ),
        HavnorLib::vt_class_option(),

        // Carousel
        array(
          "type"        => "notice",
          "heading"     => 'Basic Options',
          "param_name"  => 'bsic_opt',
          'class'       => 'cs-warning',
          'value'       => '',
          "group"       => 'Carousel',
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Loop?", 'havnor-core' ),
          "group" => __( "Carousel", 'havnor-core' ),
          "param_name" => "carousel_loop",
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          "value" => '',
          "description" => __( "Continuously moving carousel, if enabled.", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Items", 'havnor-core' ),
          "group" => __( "Carousel", 'havnor-core' ),
          "param_name" => "carousel_items",
          'value' => '',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter the numeric value of how many items you want in per slide.", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Margin", 'havnor-core' ),
          "group" => __( "Carousel", 'havnor-core' ),
          "param_name" => "carousel_margin",
          'value' => '',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter the numeric value of how much space you want between each carousel item.", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Dots", 'havnor-core' ),
          "group" => __( "Carousel", 'havnor-core' ),
          "param_name" => "carousel_dots",
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          "value" => '',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "If you want Carousel Dots, enable it.", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Navigation", 'havnor-core' ),
          "group" => __( "Carousel", 'havnor-core' ),
          "param_name" => "carousel_nav",
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          "value" => '',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "If you want Carousel Navigation, enable it.", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type"        => "notice",
          "heading"     => 'Auto Play & Interaction',
          "param_name"  => 'apyi_opt',
          'class'       => 'cs-warning',
          'value'       => '',
          "group"       => 'Carousel',
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Autoplay Timeout", 'havnor-core' ),
          "group" => __( "Carousel", 'havnor-core' ),
          "param_name" => "carousel_autoplay_timeout",
          'value' => '',
          "description" => __( "Change carousel Autoplay timing value. Default : 5000. Means 5 seconds.", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Autoplay", 'havnor-core' ),
          "group" => __( "Carousel", 'havnor-core' ),
          "param_name" => "carousel_autoplay",
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          "value" => '',
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "description" => __( "If you want to start Carousel automatically, enable it.", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Animate Out", 'havnor-core' ),
          "group" => __( "Carousel", 'havnor-core' ),
          "param_name" => "carousel_animate_out",
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          "value" => '',
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "description" => __( "CSS3 animation out.", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Mouse Drag?", 'havnor-core' ),
          "group" => __( "Carousel", 'havnor-core' ),
          "param_name" => "carousel_mousedrag",
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          "value" => '',
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "description" => __( "If you want Mouse Drag, check it.", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type"        => "notice",
          "heading"     => 'Width & Height',
          "param_name"  => 'wah_opt',
          'class'       => 'cs-warning',
          'value'       => '',
          "group"       => 'Carousel',
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Auto Width", 'havnor-core' ),
          "group" => __( "Carousel", 'havnor-core' ),
          "param_name" => "carousel_autowidth",
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          "value" => '',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Adjust Auto Width automatically for each carousel items.", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type" => "checkbox",
          "heading" => __( "Auto Height", 'havnor-core' ),
          "group" => __( "Carousel", 'havnor-core' ),
          "param_name" => "carousel_autoheight",
          "on_text" => __( "Yes", 'havnor-core' ),
          "off_text" => __( "No", 'havnor-core' ),
          "value" => '',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Adjust Auto Height automatically for each carousel items.", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type"        => "notice",
          "heading"     => 'Responsive Options',
          "param_name"  => 'res_opt',
          'class'       => 'cs-warning',
          'value'       => '',
          "group"       => 'Carousel',
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Tablet", 'havnor-core' ),
          "group" => __( "Carousel", 'havnor-core' ),
          "param_name" => "carousel_tablet",
          'value' => '',
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "description" => __( "Enter number of items to show in tablet.", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Mobile", 'havnor-core' ),
          "group" => __( "Carousel", 'havnor-core' ),
          "param_name" => "carousel_mobile",
          'value' => '',
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "description" => __( "Enter number of items to show in mobile.", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Small Mobile", 'havnor-core' ),
          "group" => __( "Carousel", 'havnor-core' ),
          "param_name" => "carousel_small_mobile",
          'value' => '',
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "description" => __( "Enter number of items to show in small mobile.", 'havnor-core'),
          'dependency' => array(
            'element' => 'team_style',
            'value' =>'five',
          ),
        ),

      ), // Params
    ) );
  }
}
