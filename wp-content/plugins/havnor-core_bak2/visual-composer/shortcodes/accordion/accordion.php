<?php
/* ==========================================================
  Accordion
=========================================================== */
if( ! function_exists( 'havnor_vt_accordion_function' ) ) {
  function havnor_vt_accordion_function( $atts, $content = '', $key = '' ) {

    global $vt_accordion_tabs;
    $vt_accordion_tabs = array();

    extract( shortcode_atts( array(
      'accordion_style' => '',
      'id'            => '',
      'class'         => '',
      'tick_image'    => '',
      'one_active'    => '',
      'active_tab'    => 0,
      'title_size'    => '',
      'title_color' => '',
      'title_bg_color'    => '',
      'tgl_btn_color' =>'',
      'tgl_btn_bg_color' =>'',
      'tgl_number_color' => '',
      'tgl_number_bg_color' => '',
      'tgl_active_number_color' => '',
      'tgl_active_number_bg_color' => '',
    ), $atts ) );

    do_shortcode( $content );

    $image_url = wp_get_attachment_url( $tick_image );

    // is not empty clients
    if( empty( $vt_accordion_tabs ) ) { return; }

    $id          = ( $id ) ? ' id="'. $id .'"' : '';
    $class       = ( $class ) ? ' '. $class : '';
    $one_active  = ( $one_active ) ? ' collapse-others' : '';
    $uniqtab     = uniqid();

    // Shortcode Style CSS
    $inline_style  = '';

    if ( $title_size ) {
      $inline_style .= '.hanor-acc-'. $uniqtab .' .panel-title {';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $title_bg_color || $title_color ) {
      $inline_style .= '.hanor-acc-'. $uniqtab .' .panel-title a {';
      $inline_style .= ( $title_bg_color ) ? 'background:'. $title_bg_color .';' : '';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }
    if ( $tgl_btn_color ) {
      $inline_style .= '.hanor-acc-'. $uniqtab .' .accordion-switch:before {';
      $inline_style .= ( $tgl_btn_color ) ? 'background:'. $tgl_btn_color .';' : '';
      $inline_style .= '}';
    }
    if ( $tgl_btn_bg_color ) {
      $inline_style .= '.hanor-acc-'. $uniqtab .' .accordion-switch {';
      $inline_style .= ( $tgl_btn_bg_color ) ? 'background:'. $tgl_btn_bg_color .';' : '';
      $inline_style .= ( $tgl_btn_bg_color ) ? 'border-color:'. $tgl_btn_bg_color .';' : '';
      $inline_style .= '}';
    }
    if($image_url) {
      $inline_style .= '.accordion-careers-style .hanor-acc-'. $uniqtab .' .panel-title a:before {';
      $inline_style .= ( $image_url ) ? 'background-image:url('.$image_url.');' : '';
      $inline_style .= '}';
    }
    if ( $tgl_number_bg_color || $tgl_number_color ) {
      $inline_style .= '.hanor-acc-'. $uniqtab .'.accordion-style-two .panel-default:before {';
      $inline_style .= ( $tgl_number_bg_color ) ? 'background:'. $tgl_number_bg_color .';' : '';
      $inline_style .= ( $tgl_number_color ) ? 'color:'. $tgl_number_color .';' : '';
      $inline_style .= '}';
    }
    if ( $tgl_active_number_bg_color || $tgl_active_number_color ) {
      $inline_style .= '.hanor-acc-'. $uniqtab .'.accordion-style-two .panel-default.active:before {';
      $inline_style .= ( $tgl_active_number_bg_color ) ? 'background:'. $tgl_active_number_bg_color .';' : '';
      $inline_style .= ( $tgl_active_number_color ) ? 'color:'. $tgl_active_number_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-acc-'. $uniqtab;

    if ($accordion_style === 'style-two') {
      $style_class = ' accordion-style-two';
    } else {
      $style_class = '';
    }

    if ($accordion_style === 'style-three') {
      $switch = '<span class="accordion-switch"></span>';
      $style_wrap_o = '<div class="accordion-careers-style">';
      $style_wrap_c = '</div>';
    } else {
      $switch = '';
      $style_wrap_o = '';
      $style_wrap_c = '';
    }    

    // begin output
    $output      = $style_wrap_o.'<div'. $id .' class="accordion'. $style_class . $styled_class .' '. $one_active . $class .'" role="tablist" >';

    foreach ( $vt_accordion_tabs as $key => $tab ) {

      $selected  = ( ( $key + 1 ) == $active_tab ) ? ' in' : 'collapsed';
      $opened    = ( ( $key + 1 ) == $active_tab ) ? ' in' : '';
      $active_cls    = ( ( $key + 1 ) == $active_tab ) ? ' active' : '';

      $title     = '<h4 class="panel-title"> <a href="#'. $uniqtab .'-'. $key .'" class="'. $selected .'" data-toggle="collapse" aria-expanded="true">'. $tab['atts']['title'] .$switch.'</a></h4>';

      $output   .= '<div class="panel panel-default '.$active_cls.'">';
      $output   .= '<div class="panel-heading">'. $title .'</div>';
      $output   .= '<div id="'. $uniqtab .'-'. $key .'" class="panel-collapse collapse'. $opened .'"><div class="panel-content">'. do_shortcode( $tab['content'] ) . '</div></div>';
      $output   .= '</div>';

    }

    $output     .= '</div>'.$style_wrap_c;
    // end output
    return $output;
  }
  add_shortcode( 'vc_accordion', 'havnor_vt_accordion_function' );
}

/**
 *
 * Accordion Shortcode
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if( ! function_exists( 'havnor_vt_accordionn_tab' ) ) {
  function havnor_vt_accordionn_tab( $atts, $content = '', $key = '' ) {
    global $vt_accordion_tabs;
    $vt_accordion_tabs[]  = array( 'atts' => $atts, 'content' => $content );
    return;
  }
  add_shortcode( 'vc_accordion_tab', 'havnor_vt_accordionn_tab' );
}
