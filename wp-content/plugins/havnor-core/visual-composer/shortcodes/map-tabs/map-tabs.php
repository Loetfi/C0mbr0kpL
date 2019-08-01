<?php
/* Map Tabs */
if ( !function_exists('havnor_map_tabs_function')) {
  function havnor_map_tabs_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'address_content'   => '',
      'map_height'        => '',
      'class'             => '',
      'css'               => '',
    ), $atts));

    // Design Tab
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';
    // fix unclosed/unwanted paragraph tags in $content
    $content  = wpb_js_remove_wpautop($content, true);
    $class    = ( $class ) ? ' '. $class : '';

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Google Map Height
    if ( $map_height ) {
      $inline_style .= '.hanor-location-'. $e_uniqid .' .hanor-map-tab-content, .hanor-location-'. $e_uniqid .' .hanor-map-tab-content .hanor-google-map {';
      $inline_style .= ( $map_height ) ? 'min-height:'. havnor_core_check_px($map_height) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-location-'. $e_uniqid;

    // Group Field
    $address_content = (array) vc_param_group_parse_atts( $address_content );

    // Turn output buffer on
    ob_start();

    // Output
    echo '<div class="our-locations'. $custom_css . $class . $styled_class .'"><div class="hanor-mt-container"><ul id="tabs" class="nav nav-tabs hanor-locations-tabs" data-tabs="tabs">';
      $i = 0;
      $len = count($address_content);
      foreach ( $address_content as $key => $tab ) {
        if ($i == 0) {
          $active_nav = ' active';
        } else {
          $active_nav = '';
        }
        echo '<li class="each-location-tab'. $active_nav .'"><div class="each-location-wrap"><a href="#'. $tab['tab_id'] .'" data-toggle="tab" class="each-item-wrapper">';
          if ($tab['title']) {
            echo '<h3>'. $tab['title'] .'</h3>';
          }
          echo '<p class="location-info">'. $tab['content_text'] .'</p>'. do_shortcode($tab['address_links']) .'</a></div></li>';
        $i++;
      }
    echo '</ul></div>';
    echo '<div class="tab-content hanor-map-tab-content">'. do_shortcode($content) .'</div>';
    echo '</div>';
    ?>
    <script>
    jQuery(document).ready(function($) {

      var intlocationName = $( ".hanor-location-<?php echo esc_js($e_uniqid); ?> .hanor-locations-tabs > li:first-child > a > .hanor-location-name" ).text();
      $(".hanor-location-<?php echo esc_js($e_uniqid); ?> .hanor-maptab-controls > .location-title").html(intlocationName);
      $('.hanor-location-<?php echo esc_js($e_uniqid); ?> .btn-next').click(function(){
        $('.hanor-location-<?php echo esc_js($e_uniqid); ?> .nav-tabs > .active').next('li').find('.each-item-wrapper').trigger('click');
      });
      $('.hanor-location-<?php echo esc_js($e_uniqid); ?> .btn-previous').click(function(){
        $('.hanor-location-<?php echo esc_js($e_uniqid); ?> .nav-tabs > .active').prev('li').find('.each-item-wrapper').trigger('click');
      });
      $('.hanor-location-<?php echo esc_js($e_uniqid); ?>.our-locations [data-toggle="tab"]').on('shown.bs.tab', function(e){
        var currentTab = $(e.target).find('.hanor-location-name').text(); // get current tab
        $(".hanor-location-<?php echo esc_js($e_uniqid); ?> .location-title").html(currentTab);
      });

    });
    </script>
    <?php

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'havnor_map_tabs', 'havnor_map_tabs_function' );

/* Map Tab */
if ( !function_exists('havnor_map_tab_function')) {
  function havnor_map_tab_function( $atts, $content = true ) {

    extract(shortcode_atts(array(), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Output
    return do_shortcode($content);

  }
}
add_shortcode( 'havnor_map_tab', 'havnor_map_tab_function' );
