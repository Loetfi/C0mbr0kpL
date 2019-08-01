<?php
/* ==========================================================
 Global Map Shortcode
=========================================================== */
if ( !function_exists('global_map_func')) {
  function global_map_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'map_width'=>'',
      'map_height' =>'',
      'mark_fill_color' =>'',
      'mark_hover_fill_color'=>'',
      'mark_stroke_color' =>'',
      'mark_hover_stroke_color'=>'',
      'map_color' =>'',
      'map_marker_options' =>'',
      'zoom_on_scroll' => '',
      'class'  => '',

    ), $atts));

    // Map Image
    $current_user = wp_get_current_user();
    $map_marker_options   = (array) vc_param_group_parse_atts( $map_marker_options);
      
    $mark_fill_color = $mark_fill_color ? $mark_fill_color : '#53cfd6';
    $mark_stroke_color = $mark_stroke_color ? $mark_stroke_color : '#fff';
    $map_color = $map_color ? $map_color : '#cccccc';
    $mark_hover_fill_color = $mark_hover_fill_color ? $mark_hover_fill_color : '#53cfd6';
    $mark_hover_stroke_color = $mark_hover_stroke_color ? $mark_hover_stroke_color : '#fff';
    $zoom_on_scroll = $zoom_on_scroll ? 'true' : 'false';

  // Turn output buffer on
  ob_start();

  echo '<div class="global-map-section '.$class.' ">
                  <div class="liof-world-map">
                    <div class="liof-map-image">
                      <div id="world-map-markers" style="width: '.havnor_core_check_px($map_width).'; height: '.havnor_core_check_px($map_height).'"></div>
                    </div>
                  </div>
                </div>';
?>
    <script type="text/javascript">
    jQuery(window).on('load', function ($){
    jQuery('#world-map-markers').vectorMap({
    map: 'world_mill',
    scaleColors: ['pink', 'blue'],
    normalizeFunction: 'polynomial',
    hoverOpacity: 0.7,
    hoverColor: false,
    zoomOnScroll: <?php echo esc_js($zoom_on_scroll); ?>,
    regionsSelectable: false,
    markersSelectable: false,
    markerStyle: {
      initial: {
        fill: '<?php echo esc_js($mark_fill_color); ?>',
        stroke: '<?php echo esc_js($mark_stroke_color); ?>',

      },
      hover: {
      fill:'<?php echo esc_js($mark_hover_fill_color); ?>',
      stroke: '<?php echo esc_js($mark_hover_stroke_color); ?>',
    "stroke-width": 2,
    cursor: 'pointer'
  },
    },
     regionStyle: {
      initial: {
        fill: '<?php echo esc_js($map_color); ?>',
       
      }
    },
    backgroundColor: '',
      markers: [
    <?php

       foreach ($map_marker_options as $value ) {
          $lattitude = isset( $value['latt_option_one'] ) ? $value['latt_option_one'] : '';
          $langitude = isset( $value['lang_option_one'] ) ? $value['lang_option_one'] : '';
          $city_name = isset( $value['city_name'] ) ? $value['city_name'] : '';
          $country_name = isset( $value['country_name'] ) ? $value['country_name'] : '';

       ?>
        
          {latLng: [ <?php echo esc_js($lattitude); ?> , <?php echo esc_js($langitude); ?>], name: '<?php echo esc_js($city_name); ?>', country: '<?php echo esc_js($country_name); ?>'},

    <?php  }

     ?> 
     ]
  });
    });
  </script> 

  <?php
      // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'global_map', 'global_map_func' );
