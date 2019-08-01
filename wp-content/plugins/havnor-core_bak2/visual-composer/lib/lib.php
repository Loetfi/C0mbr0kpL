<?php
/**
 * Visual Composer Library
 * Common Fields
 */
class HavnorLib {

	// Get Theme Name
	public static function havnor_cat_name() {
		return __( "by VictorThemes", 'havnor-core' );
	}

	// Notice
	public static function vt_notice_field($heading, $param, $class, $group) {
		return array(
			"type"        => "notice",
			"heading"     => $heading,
			"param_name"  => $param,
			'class'       => $class,
			'value'       => '',
			"group"       => $group,
		);
	}

	// Extra Class
	public static function vt_class_option() {
		return array(
		  "type" => "textfield",
		  "heading" => __( "Extra class name", 'havnor-core' ),
		  "param_name" => "class",
		  'value' => '',
		  "description" => __( "Custom styled class name.", 'havnor-core')
		);
	}

	// ID
	public static function vt_id_option() {
		return array(
		  "type" => "textfield",
		  "heading" => __( "Element ID", 'havnor-core' ),
		  "param_name" => "id",
		  'value' => '',
		  "description" => __( "Enter your ID for this element. If you want.", 'havnor-core')
		);
	}

	// Open Link in New Tab
	public static function vt_open_link_tab() {
		return array(
			"type" => "checkbox",
			"heading" => __( "Open New Tab? (Links)", 'havnor-core' ),
			"param_name" => "open_link",
			"std" => true,
			'value' => '',
			"on_text" => __( "Yes", 'havnor-core' ),
			"off_text" => __( "No", 'havnor-core' ),
		);
	}

	/**
	 * Carousel Default Options
	 */

	// Loop
	public static function vt_carousel_loop() {
		return array(
			"type" => "checkbox",
			"heading" => __( "Loop?", 'havnor-core' ),
			"group" => __( "Carousel", 'havnor-core' ),
			"param_name" => "carousel_loop",
			"on_text" => __( "Yes", 'havnor-core' ),
			"off_text" => __( "No", 'havnor-core' ),
			"value" => '',
			"description" => __( "Continuously moving carousel, if enabled.", 'havnor-core')
		);
	}
	// Items
	public static function vt_carousel_items() {
		return array(
		  "type" => "textfield",
			"heading" => __( "Items", 'havnor-core' ),
		  "group" => __( "Carousel", 'havnor-core' ),
		  "param_name" => "carousel_items",
		  'value' => '',
			'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
		  "description" => __( "Enter the numeric value of how many items you want in per slide.", 'havnor-core')
		);
	}
	// Margin
	public static function vt_carousel_margin() {
		return array(
		  "type" => "textfield",
			"heading" => __( "Margin", 'havnor-core' ),
		  "group" => __( "Carousel", 'havnor-core' ),
		  "param_name" => "carousel_margin",
		  'value' => '',
			'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
		  "description" => __( "Enter the numeric value of how much space you want between each carousel item.", 'havnor-core')
		);
	}
	// Dots
	public static function vt_carousel_dots() {
		return array(
		  "type" => "checkbox",
			"heading" => __( "Dots", 'havnor-core' ),
		  "group" => __( "Carousel", 'havnor-core' ),
		  "param_name" => "carousel_dots",
			"on_text" => __( "Yes", 'havnor-core' ),
			"off_text" => __( "No", 'havnor-core' ),
			"value" => '',
			'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
		  "description" => __( "If you want Carousel Dots, enable it.", 'havnor-core')
		);
	}
	// Nav
	public static function vt_carousel_nav() {
		return array(
		  "type" => "checkbox",
			"heading" => __( "Navigation", 'havnor-core' ),
		  "group" => __( "Carousel", 'havnor-core' ),
		  "param_name" => "carousel_nav",
			"on_text" => __( "Yes", 'havnor-core' ),
			"off_text" => __( "No", 'havnor-core' ),
			"value" => '',
			'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
		  "description" => __( "If you want Carousel Navigation, enable it.", 'havnor-core')
		);
	}
	// Autoplay Timeout
	public static function vt_carousel_autoplay_timeout() {
		return array(
		  "type" => "textfield",
			"heading" => __( "Autoplay Timeout", 'havnor-core' ),
		  "group" => __( "Carousel", 'havnor-core' ),
		  "param_name" => "carousel_autoplay_timeout",
		  'value' => '',
		  "description" => __( "Change carousel Autoplay timing value. Default : 5000. Means 5 seconds.", 'havnor-core')
		);
	}
	// Autoplay
	public static function vt_carousel_autoplay() {
		return array(
		  "type" => "checkbox",
			"heading" => __( "Autoplay", 'havnor-core' ),
		  "group" => __( "Carousel", 'havnor-core' ),
		  "param_name" => "carousel_autoplay",
			"on_text" => __( "Yes", 'havnor-core' ),
			"off_text" => __( "No", 'havnor-core' ),
			"value" => '',
			'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
		  "description" => __( "If you want to start Carousel automatically, enable it.", 'havnor-core')
		);
	}
	// Animate Out
	public static function vt_carousel_animateout() {
		return array(
		  "type" => "checkbox",
			"heading" => __( "Animate Out", 'havnor-core' ),
		  "group" => __( "Carousel", 'havnor-core' ),
		  "param_name" => "carousel_animate_out",
			"on_text" => __( "Yes", 'havnor-core' ),
			"off_text" => __( "No", 'havnor-core' ),
			"value" => '',
			'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
		  "description" => __( "CSS3 animation out.", 'havnor-core')
		);
	}
	// Animate In
	public static function vt_carousel_animatein() {
		return array(
		  "type" => "checkbox",
			"heading" => __( "Animate In", 'havnor-core' ),
		  "group" => __( "Carousel", 'havnor-core' ),
		  "param_name" => "carousel_animate_in",
			"on_text" => __( "Yes", 'havnor-core' ),
			"off_text" => __( "No", 'havnor-core' ),
			"value" => '',
			'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
		  "description" => __( "CSS3 animation in.", 'havnor-core')
		);
	}
	// Mouse Drag
	public static function vt_carousel_mousedrag() {
		return array(
		  "type" => "checkbox",
			"heading" => __( "Mouse Drag?", 'havnor-core' ),
		  "group" => __( "Carousel", 'havnor-core' ),
		  "param_name" => "carousel_mousedrag",
			"on_text" => __( "Yes", 'havnor-core' ),
			"off_text" => __( "No", 'havnor-core' ),
			"value" => '',
			'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
		  "description" => __( "If you want Mouse Drag, check it.", 'havnor-core')
		);
	}
	// Auto Width
	public static function vt_carousel_autowidth() {
		return array(
		  "type" => "checkbox",
			"heading" => __( "Auto Width", 'havnor-core' ),
		  "group" => __( "Carousel", 'havnor-core' ),
		  "param_name" => "carousel_autowidth",
			"on_text" => __( "Yes", 'havnor-core' ),
			"off_text" => __( "No", 'havnor-core' ),
			"value" => '',
			'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
		  "description" => __( "Adjust Auto Width automatically for each carousel items.", 'havnor-core')
		);
	}
	// Auto Height
	public static function vt_carousel_autoheight() {
		return array(
		  "type" => "checkbox",
			"heading" => __( "Auto Height", 'havnor-core' ),
		  "group" => __( "Carousel", 'havnor-core' ),
		  "param_name" => "carousel_autoheight",
			"on_text" => __( "Yes", 'havnor-core' ),
			"off_text" => __( "No", 'havnor-core' ),
			"value" => '',
			'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
		  "description" => __( "Adjust Auto Height automatically for each carousel items.", 'havnor-core')
		);
	}
	// Tablet
	public static function vt_carousel_tablet() {
		return array(
		  "type" => "textfield",
			"heading" => __( "Tablet", 'havnor-core' ),
		  "group" => __( "Carousel", 'havnor-core' ),
		  "param_name" => "carousel_tablet",
		  'value' => '',
			'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
		  "description" => __( "Enter number of items to show in tablet.", 'havnor-core')
		);
	}
	// Mobile
	public static function vt_carousel_mobile() {
		return array(
		  "type" => "textfield",
			"heading" => __( "Mobile", 'havnor-core' ),
		  "group" => __( "Carousel", 'havnor-core' ),
		  "param_name" => "carousel_mobile",
		  'value' => '',
			'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
		  "description" => __( "Enter number of items to show in mobile.", 'havnor-core')
		);
	}
	// Small Mobile
	public static function vt_carousel_small_mobile() {
		return array(
		  "type" => "textfield",
			"heading" => __( "Small Mobile", 'havnor-core' ),
		  "group" => __( "Carousel", 'havnor-core' ),
		  "param_name" => "carousel_small_mobile",
		  'value' => '',
			'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
		  "description" => __( "Enter number of items to show in small mobile.", 'havnor-core')
		);
	}

}

/* Shortcode Extends */
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_Trnr_Histories extends WPBakeryShortCodesContainer {
  }
  class WPBakeryShortCode_Trnr_Map_Tabs extends WPBakeryShortCodesContainer {
  }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_Trnr_History extends WPBakeryShortCode {
  }
  class WPBakeryShortCode_Trnr_Map_Tab extends WPBakeryShortCode {
  }
}

// Call to Action
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_Trnr_Ctas extends WPBakeryShortCodesContainer {
  }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_Trnr_Cta extends WPBakeryShortCode {
  }
}

/*
 * Load All Shortcodes within a directory of visual-composer/shortcodes
 */
function havnor_all_shortcodes() {
	$dirs = glob( HAVNOR_SHORTCODE_PATH . '*', GLOB_ONLYDIR );
	if ( !$dirs ) return;
	foreach ($dirs as $dir) {
		$dirname = basename( $dir );

		/* Include all shortcodes backend options file */
		$options_file = $dir . DS . $dirname . '-options.php';
		$options = array();
		if ( file_exists( $options_file ) ) {
			include_once( $options_file );
		} else {
			continue;
		}

		/* Include all shortcodes frondend options file */
		$shortcode_class_file = $dir . DS . $dirname .'.php';
		if ( file_exists( $shortcode_class_file ) ) {
			include_once( $shortcode_class_file );
		}
	}
}
havnor_all_shortcodes();

if( ! function_exists( 'vc_add_shortcode_param' ) && function_exists( 'add_shortcode_param' ) ) {
  function vc_add_shortcode_param( $name, $form_field_callback, $script_url = null ) {
    return add_shortcode_param( $name, $form_field_callback, $script_url );
  }
}

/* Inline Style */
global $all_inline_styles;
$all_inline_styles = array();
if( ! function_exists( 'add_inline_style' ) ) {
  function add_inline_style( $style ) {
    global $all_inline_styles;
    array_push( $all_inline_styles, $style );
  }
}

/* Enqueue Inline Styles */
if ( ! function_exists( 'havnor_enqueue_inline_styles' ) ) {
  function havnor_enqueue_inline_styles() {

    global $all_inline_styles;

    if ( ! empty( $all_inline_styles ) ) {
      echo '<style id="havnor-inline-style" type="text/css">'. havnor_compress_css_lines( join( '', $all_inline_styles ) ) .'</style>';
    }

  }
  add_action( 'wp_footer', 'havnor_enqueue_inline_styles' );
}

/* Validate px entered in field */
if( ! function_exists( 'havnor_core_check_px' ) ) {
  function havnor_core_check_px( $num ) {
    return ( is_numeric( $num ) ) ? $num . 'px' : $num;
  }
}

/* Tabs Added Via havnor_vt_tabs_function */
if( function_exists( 'havnor_vt_tabs_function' ) ) {
  add_shortcode( 'vc_tabs', 'havnor_vt_tabs_function' );
  add_shortcode( 'vc_tab', 'havnor_vt_tab_function' );
}
