<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('havnor_typewriter_function')) {
  function havnor_typewriter_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'class'  => '',
      // Style
      'content_color'  => '',
      'content_size'  => '',
      'typewriter_color'  => '',
      'typewriter_size'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = havnor_set_wpautop($content, false);

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $content_size || $content_color) {
      $inline_style .= '.typewriter-'. $e_uniqid .'.hanor-typewriter {';
      $inline_style .= ( $content_color ) ? 'color:'.$content_color.';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $typewriter_size || $typewriter_color) {
      $inline_style .= '.typewriter-'. $e_uniqid .'.hanor-typewriter .typewriter-caption {';
      $inline_style .= ( $typewriter_color ) ? 'color:'.$typewriter_color.';' : '';
      $inline_style .= ( $typewriter_size ) ? 'font-size:'. havnor_core_check_px($typewriter_size) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' typewriter-'. $e_uniqid;
    
    $output = '';
    $output .= '<div class="hanor-typewriter '.$styled_class.'">'.$content.'</div>';

    return $output;
  }
}
add_shortcode( 'havnor_typewriter', 'havnor_typewriter_function' );
