<?php
/**
 * Visual Composer Related Functions
 */

// Init Visual Composer
if( ! function_exists( 'havnor_init_vc_shortcodes' ) ) {
  function havnor_init_vc_shortcodes() {
    if ( defined( 'WPB_VC_VERSION' ) ) {

      $pre_pages = (havnor_framework_active()) ? cs_get_option( 'pre_pages' ) : 'corporate';
      $pre_pages = $pre_pages ? $pre_pages : esc_html__('corporate', 'havnor-core');

      /* Visual Composer - Setup */
      require_once( HAVNOR_SHORTCODE_BASE_PATH . '/lib/lib.php' );
      require_once( HAVNOR_SHORTCODE_BASE_PATH . '/lib/add-params.php' );
      require_once( HAVNOR_SHORTCODE_BASE_PATH . '/pre_pages/'.$pre_pages.'-pages.php' );

      /* All Shortcodes */
      if (class_exists('WPBakeryVisualComposerAbstract')) {

        // Templates
        $dir = HAVNOR_SHORTCODE_BASE_PATH . '/vc_templates';
        vc_set_shortcodes_templates_dir( $dir );

        /* Set VC editor as default in following post types */
        $list = array(
          'post',
          'page',
          'portfolio',
          'team',
          'testimonial'
        );
        vc_set_default_editor_post_types( $list );

      } // class_exists

      // Add New Param - VC_Row
      $vc_row_attr = array(
        array(
          "type" => "switcher",
          "heading" => __( "Need Overlay?", 'havnor' ),
          "description" => __( "Enable it, if you want overlay dotted image.", 'havnor' ),
          "param_name" => "overlay_dotted",
          "on_text" => __( "Yes", 'havnor'),
          "off_text" => __( "No", 'havnor'),
          "group" => __( "Design Options", 'havnor'),
          "std" => false,
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Overlay Color", 'havnor' ),
          "description" => __( "Pick your overlay color, make sure you've controlled opacity.", 'havnor' ),
          "param_name" => "overlay_color",
          "group" => __( "Design Options", 'havnor'),
          'dependency' => array(
            'element' => 'overlay_dotted',
            'value' => array('true'),
          ),
        ),
      );
      vc_add_params( 'vc_row', $vc_row_attr );
      // Add New Param - VC_Column
      $vc_column_attr = array(
        array(
          'type' => 'dropdown',
          'value' => array(
            __( 'Default Alignment', 'havnor-core' ) => 'text-default',
            __( 'Text Left', 'havnor-core' ) => 'text-left',
            __( 'Text Right', 'havnor-core' ) => 'text-right',
            __( 'Text Center', 'havnor-core' ) => 'text-center',
          ),
          'heading' => __( 'Text Alignment', 'havnor-core' ),
          'param_name' => 'text_alignment',
        ),
      );
      vc_add_params( 'vc_column', $vc_column_attr );

    }
  }

  add_action( 'vc_before_init', 'havnor_init_vc_shortcodes' );
}

/* Remove VC Teaser metabox */
if ( is_admin() ) {
  if ( ! function_exists('havnor_vt_remove_vc_boxes') ) {
    function havnor_vt_remove_vc_boxes(){
      $post_types = get_post_types( '', 'names' );
      foreach ( $post_types as $post_type ) {
        remove_meta_box('vc_teaser',  $post_type, 'side');
      }
    } // End function
  } // End if
  add_action('do_meta_boxes', 'havnor_vt_remove_vc_boxes');
}
