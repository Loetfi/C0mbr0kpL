<?php
/**
 * Gmap - Shortcode Options
 */
add_action( 'init', 'havnor_gmap_vc_map' );
if ( ! function_exists( 'havnor_gmap_vc_map' ) ) {
  function havnor_gmap_vc_map() {
    vc_map( array(
      "name" => __( "Google Map", 'havnor-core'),
      "base" => "hanor_gmap",
      "description" => __( "Google Map Styles", 'havnor-core'),
      "icon" => "fa fa-map color-cadetblue",
      "category" => HavnorLib::havnor_cat_name(),
      "params" => array(

        array(
          "type"        => "notice",
          "heading"     => __( "API KEY", 'havnor-core' ),
          "param_name"  => 'api_key',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Enter Map ID', 'havnor-core'),
          "param_name"  => "gmap_id",
          "value"       => "",
          "description" => __( 'Enter google map ID. If you\'re using this in <strong>Map Tab</strong> shortcode, enter unique ID for each map tabs. Else leave it as blank. <strong>Note : This should same as Tab ID in Map Tabs shortcode.</strong>', 'havnor-core'),
          'admin_label' => true,
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Enter your Google Map API Key', 'havnor-core'),
          "param_name"  => "gmap_api",
          "value"       => "",
          "description" => __( 'New Google Maps usage policy dictates that everyone using the maps should register for a free API key. <br />Please create a key for "Google Static Maps API" and "Google Maps Embed API" using the <a href="https://console.developers.google.com/project" target="_blank">Google Developers Console</a>.<br /> Or follow this step links : <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=maps_embed_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">1. Step One</a> <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=static_maps_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">2. Step Two</a><br /> If you still receive errors, please check following link : <a href="https://churchthemes.com/2016/07/15/page-didnt-load-google-maps-correctly/" target="_blank">How to Fix?</a>', 'havnor-core'),
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Map Settings", 'havnor-core' ),
          "param_name"  => 'map_settings',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Google Map Type', 'havnor-core' ),
          'value' => array(
            __( 'Select Type', 'havnor-core' ) => '',
            __( 'ROADMAP', 'havnor-core' ) => 'ROADMAP',
            __( 'SATELLITE', 'havnor-core' ) => 'SATELLITE',
            __( 'HYBRID', 'havnor-core' ) => 'HYBRID',
            __( 'TERRAIN', 'havnor-core' ) => 'TERRAIN',
          ),
          'admin_label' => true,
          'param_name' => 'gmap_type',
          'description' => __( 'Select your google map type.', 'havnor-core' ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>esc_html__('Zoom', 'havnor-core'),
          "param_name"  => "zoom",
          "value"       => "",
          "description" => esc_html__( "Enter numaric value 1 to 100 for map zooming. Default is 10", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Google Map Style', 'havnor-core' ),
          'value' => array(
            __( 'Select Style', 'havnor-core' ) => '',
            __( 'Gray Scale', 'havnor-core' ) => "gray-scale",
            __( 'Mid Night', 'havnor-core' ) => "mid-night",
            __( 'Blue Water', 'havnor-core' ) => 'blue-water',
            __( 'Light Dream', 'havnor-core' ) => 'light-dream',
            __( 'Pale Dawn', 'havnor-core' ) => 'pale-dawn',
            __( 'Apple Maps-esque', 'havnor-core' ) => 'apple-maps',
            __( 'Blue Essence', 'havnor-core' ) => 'blue-essence',
            __( 'Unsaturated Browns', 'havnor-core' ) => 'unsaturated-browns',
            __( 'Paper', 'havnor-core' ) => 'paper',
            __( 'Midnight Commander', 'havnor-core' ) => 'midnight-commander',
            __( 'Light Monochrome', 'havnor-core' ) => 'light-monochrome',
            __( 'Flat Map', 'havnor-core' ) => 'flat-map',
            __( 'Retro', 'havnor-core' ) => 'retro',
            __( 'becomeadinosaur', 'havnor-core' ) => 'becomeadinosaur',
            __( 'Neutral Blue', 'havnor-core' ) => 'neutral-blue',
            __( 'Subtle Grayscale', 'havnor-core' ) => 'subtle-grayscale',
            __( 'Ultra Light with Labels', 'havnor-core' ) => 'ultra-light-labels',
            __( 'Shades of Grey', 'havnor-core' ) => 'shades-grey',
          ),
          'admin_label' => true,
          'param_name' => 'gmap_style',
          'description' => __( 'Select your google map style.', 'havnor-core' ),
          'dependency' => array(
            'element' => 'gmap_type',
            'value' => 'ROADMAP',
          ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Height', 'havnor-core'),
          "param_name"  => "gmap_height",
          "value"       => "",
          "description" => __( "Enter the px value for map height. This will not work if you add this shortcode into the Map Tab shortcode.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'attach_image',
          "heading"     =>__('Common Marker', 'havnor-core'),
          "param_name"  => "gmap_common_marker",
          "value"       => "",
          "description" => __( "Upload your custom marker.", 'havnor-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => "notice",
          "heading"     => __( "Enable & Disable", 'havnor-core' ),
          "param_name"  => 'enb_disb',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          "type"        =>'checkbox',
          "heading"     =>__('Scroll Wheel', 'havnor-core'),
          "param_name"  => "gmap_scroll_wheel",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'checkbox',
          "heading"     =>__('Street View Control', 'havnor-core'),
          "param_name"  => "gmap_street_view",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'checkbox',
          "heading"     =>__('Map Type Control', 'havnor-core'),
          "param_name"  => "gmap_maptype_control",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        // Map Markers
        array(
          "type"        => "notice",
          "heading"     => __( "Map Pins", 'havnor-core' ),
          "param_name"  => 'map_pins',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Map Locations', 'havnor-core' ),
          'param_name' => 'locations',
          'params' => array(

            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Latitude', 'havnor-core' ),
              'param_name' => 'latitude',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
              'admin_label' => true,
              'description' => __( 'Find Latitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'havnor-core' ),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Longitude', 'havnor-core' ),
              'param_name' => 'longitude',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
              'admin_label' => true,
              'description' => __( 'Find Longitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'havnor-core' ),
            ),
            array(
              'type' => 'attach_image',
              'value' => '',
              'heading' => __( 'Custom Marker', 'havnor-core' ),
              'param_name' => 'custom_marker',
              "description" => __( "Upload your unique map marker if your want to differentiate from others.", 'havnor-core'),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Heading', 'havnor-core' ),
              'param_name' => 'location_heading',
              'admin_label' => true,
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Content', 'havnor-core' ),
              'param_name' => 'location_text',
            ),
          )
        ),

        HavnorLib::vt_class_option(),
        // Design Tab
        array(
          "type" => "css_editor",
          "heading" => __( "Text Size", 'havnor-core' ),
          "param_name" => "css",
          "group" => __( "Design", 'havnor-core'),
        ),

      )
    ) );
  }
}
