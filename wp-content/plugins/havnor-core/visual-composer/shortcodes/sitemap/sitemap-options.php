<?php
/**
 * Sitemap - Shortcode Options
 */
add_action( 'init', 'havnor_sitemap_vc_map' );
if ( ! function_exists( 'havnor_sitemap_vc_map' ) ) {
  function havnor_sitemap_vc_map() {

    $custom_menus = array();
    if ( 'vc_edit_form' === vc_post_param( 'action' ) && vc_verify_admin_nonce() ) {
      $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
      if ( is_array( $menus ) && ! empty( $menus ) ) {
        foreach ( $menus as $single_menu ) {
          if ( is_object( $single_menu ) && isset( $single_menu->name, $single_menu->term_id ) ) {
            $custom_menus[ $single_menu->name ] = $single_menu->term_id;
          }
        }
      }
    }

    vc_map( array(
      "name" => __( "Sitemap", 'havnor-core'),
      "base" => "hanor_sitemap",
      "description" => __( "Sitemap Styles", 'havnor-core'),
      "icon" => "fa fa-sitemap color-green",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        // Sitemap
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title', 'havnor-core' ),
          'description' => __( 'Enter menu title.', 'havnor-core' ),
          'param_name' => 'menu_title',
          'admin_label' => true,
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Menu', 'havnor-core' ),
          'value' => $custom_menus,
          'admin_label' => true,
          'param_name' => 'select_menu',
          'description' => __( 'Select your menu.', 'havnor-core' ),
        ),
        HavnorLib::vt_class_option(),

        // Style                
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Color', 'havnor-core' ),
          'param_name' => 'title_color',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'description' => __( 'Pick your title color.', 'havnor-core' ),
        ),      
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title Size', 'havnor-core' ),
          'param_name' => 'title_size',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title Font Weight', 'havnor-core' ),
          'param_name' => 'title_weight',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),  
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Link Color', 'havnor-core' ),
          'param_name' => 'link_color',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'description' => __( 'Pick your link color.', 'havnor-core' ),
        ),        
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Link Hover Color', 'havnor-core' ),
          'param_name' => 'link_hover_color',
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Border Color', 'havnor-core' ),
          'param_name' => 'border_color',
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          'group' => __( 'Style', 'havnor-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Link Size', 'havnor-core' ),
          'param_name' => 'link_size',
          'group' => __( 'Style', 'havnor-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),        

      )
    ) );
  }
}
