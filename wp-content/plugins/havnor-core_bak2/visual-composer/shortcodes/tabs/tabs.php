<?php
/* ==========================================================
  Tabs
=========================================================== */
if( ! function_exists( 'havnor_vt_tabs_function' ) ) {
  function havnor_vt_tabs_function( $atts, $content = '', $key = '' ) {

    global $vt_tabs;
    $vt_tabs = array();

    extract( shortcode_atts( array(
      'tab_style' => '',
      'tab_title' => '',
      'tab_content' => '',
      'tab_width' =>'',
      'tab_title_bottom_space' => '',
      'tab_font_size' =>'',
      'tab_font_weight' => '',
      'tab_content_size' => '',
      'tab_right_space' =>'',
      'id'        => '',
      'class'     => '',
      'active'    => 1,
      'active_tab_color' =>'',
      'tab_section_title' =>'',
      'need_share' =>'',
      'tab_dark' =>'',
      'share_bg_color'=>'',
      'share_text_color' =>'',
      'tab_border_color' => '',
      'tab_title_color' => '',
      'tab_title_hover_color' => '',
      'tab_content_color' => '',
      'tab_title_active_bg_color' => '',
      'tab_icon_color' => '',
      'tab_section_title_color' => '',
      'tab_section_title_size' => '',
      'tab_section_title_btm_space' => '',
    ), $atts ) );
    // Turn output buffer on
    ob_start();

    do_shortcode( $content );

    // is not empty
    if( empty( $vt_tabs ) ) { return; }

    $output       = '';
    $id           = ( $id ) ? ' id="'. $id .'"' : '';
    $active       = ( isset( $_REQUEST['tab'] ) ) ? $_REQUEST['tab'] : $active;
    $uniqtab      = uniqid();

    $inline_style = '';

    if ( $tab_width  ) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services.tab-style-four .nav-tabs > li  {';
      $inline_style .= ( $tab_width ) ? 'width:'. $tab_width .';' : '';
      $inline_style .= '}';
    }
    if ( $tab_section_title_color || $tab_section_title_size || $tab_section_title_btm_space) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services.tab-style-five .large-title  {';
      $inline_style .= ( $tab_section_title_color ) ? 'color:'. $tab_section_title_color .';' : '';
      $inline_style .= ( $tab_section_title_size ) ? 'font-size:'. havnor_core_check_px($tab_section_title_size) .';' : '';
      $inline_style .= ( $tab_section_title_btm_space ) ? 'padding-bottom:'. havnor_core_check_px($tab_section_title_btm_space) .';' : '';
      $inline_style .= '}';
    }

    if($tab_title_bottom_space) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .nav-tabs {';
      $inline_style .= ( $tab_title_bottom_space ) ? 'margin-bottom:'. havnor_core_check_px($tab_title_bottom_space) .';' : '';
      $inline_style .= '}';
    }

    if ( $tab_font_size  || $tab_font_weight) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .nav-tabs > li > a .tab-title, .hanor-outcome-services-'. $uniqtab .' .nav-tabs > li > a {';
      $inline_style .= ( $tab_font_size ) ? 'font-size:'. havnor_core_check_px($tab_font_size) .';' : '';
      $inline_style .= ( $tab_font_weight ) ? 'font-weight:'. $tab_font_weight .';' : '';
      $inline_style .= '}';
    }

    if ( $tab_right_space  ) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .nav-tabs > li {';
      $inline_style .= ( $tab_right_space ) ? 'padding-right:'. havnor_core_check_px($tab_right_space) .';' : '';
      $inline_style .= '}';
    }
    // Share Option
    if ( $share_bg_color  ) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .hanor-page-share .hanor-social, .hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .hanor-page-share .share-link {';
      $inline_style .= ( $share_bg_color ) ? 'background:'.$share_bg_color .';' : '';
      $inline_style .= '}';
    }
    if ( $share_bg_color  ) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .hanor-page-share .hanor-social:before {';
      $inline_style .= ( $share_bg_color ) ? 'border-color: transparent '.$share_bg_color .' transparent transparent ;' : '';
      $inline_style .= '}';
    }
    if ( $share_text_color  ) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .hanor-page-share p, .hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .hanor-page-share .share-link p i, .hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .hanor-page-share .hanor-social a {';
      $inline_style .= ( $share_text_color ) ? 'color: '.$share_text_color .' ;' : '';
      $inline_style .= '}';
    }
    // Active Tab Color
    if ( $active_tab_color  ) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services.tab-style-six .nav-tabs > li.active > a .tab-title, .hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .nav-tabs > li.active > a .tab-title, .hanor-outcome-services-'. $uniqtab .'.hanor-plans .nav.nav-tabs li.active a, .hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services.tab-style-five .nav.nav-tabs li.active .tab-title {';
      $inline_style .= ( $active_tab_color ) ? 'color: '.$active_tab_color .' ;' : '';
      $inline_style .= '}';
    }
    if ( $active_tab_color  ) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .nav-tabs > li.active > a:before , .hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services.tab-style-three .nav-tabs > li.active > a:after, .hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services.tab-style-three .nav-tabs > li.active > a:before , .hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .nav-tabs > li.active > a:after {';
      $inline_style .= ( $active_tab_color ) ? 'background-color: '.$active_tab_color .' ;' : '';
      $inline_style .= '}';
    }

    /* Tab Title Color */
    if($tab_title_color) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services.tab-style-five .nav.nav-tabs li .tab-title, .hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .nav.nav-tabs li .tab-title, .hanor-outcome-services-'. $uniqtab .'.hanor-plans .nav.nav-tabs li a {';
      $inline_style .= ( $tab_title_color ) ? 'color: '.$tab_title_color .' ;' : '';
      $inline_style .= '}';
    }
    if($tab_border_color) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services.tab-style-five .nav.nav-tabs li:before, .hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services.tab-style-five .nav.nav-tabs li:after {';
      $inline_style .= ( $tab_border_color ) ? 'background: '.$tab_border_color .' ;' : '';
      $inline_style .= '}';
    }
    if($tab_title_hover_color) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services.tab-style-five .nav.nav-tabs li .tab-title:hover, .hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .nav.nav-tabs li .tab-title:hover, .hanor-outcome-services-'. $uniqtab .'.hanor-plans .nav.nav-tabs li a:hover {';
      $inline_style .= ( $tab_title_hover_color ) ? 'color: '.$tab_title_hover_color .' ;' : '';
      $inline_style .= '}';
    }
    if($tab_content_color || $tab_content_size) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services.tab-style-five .nav-tabs > li p, .hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .tab-content p, .hanor-outcome-services-'. $uniqtab .'.hanor-plans .hanor-section-title p {';
      $inline_style .= ( $tab_content_color ) ? 'color: '.$tab_content_color .' ;' : '';
      $inline_style .= ( $tab_content_size ) ? 'font-size:'. havnor_core_check_px($tab_content_size) .';' : '';
      $inline_style .= '}';
    }
    if($tab_title_active_bg_color) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-plans .nav.nav-tabs li.active a {';
      $inline_style .= ( $tab_title_active_bg_color ) ? 'background: '.$tab_title_active_bg_color .' ;' : '';
      $inline_style .= '}';
    }
    if($tab_icon_color) {
      $inline_style .= '.hanor-outcome-services-'. $uniqtab .'.hanor-outcome-services .nav-tabs > li > a span.hanor-tab-icon {';
      $inline_style .= ( $tab_icon_color ) ? 'color: '.$tab_icon_color .' ;' : '';
      $inline_style .= '}';
    }
    
    // add inline style
    havnor_add_inline_style( $inline_style );
    $styled_class  = ' hanor-outcome-services-'. $uniqtab;

    if ($tab_style === 'tab-two') {
      $tab_title = $tab_title ? '<h2 class="section-title">'.$tab_title.'</h2>' : '';
      $tab_content = $tab_content ? '<p>'.$tab_content.'</p>' : ''; ?>
      <div <?php echo $id; ?> class="hanor-plans <?php echo $class . $styled_class; ?>">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="hanor-section-title">
                          <?php echo $tab_title; ?>
                          <ul class="nav nav-tabs">
                            <?php 
                            foreach( $vt_tabs as $key => $tab ){
                              $title      = $tab['atts']['title'];
                              $active_nav = ( ( $key + 1 ) == $active ) ? ' class="active"' : ''; ?>
                              <li <?php echo $active_nav; ?>><a href="#<?php echo $uniqtab; ?>-<?php echo $key;?>" data-toggle="tab"><?php echo $title; ?></a></li>
                            <?php } ?>
                <li class="active-bg"></li>
                          </ul>
                          <?php echo $tab_content; ?>
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="tab-content">
                          <?php
                            foreach( $vt_tabs as $key => $tab ){
                              $title           = $tab['atts']['title'];
                              $active_content  = ( ( $key + 1 ) == $active ) ? ' in active' : ''; ?>
                              <div id="<?php echo $uniqtab; ?>-<?php echo $key; ?>" class="tab-pane fade <?php echo $active_content; ?>"><?php echo  do_shortcode( $tab['content'] ); ?></div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
    } else {

      if($tab_style === 'tab-three') {
        $tab_class = 'tab-style-three';
      } elseif($tab_style === 'tab-four') {
        $tab_class = 'tab-style-four';
      } elseif($tab_style === 'tab-five') {
        $tab_class = 'tab-style-five';
      } elseif($tab_style === 'tab-six') {
        $tab_class = 'tab-style-six';
      } else {
         $tab_class = ' tab-style-one';
      }
      // Tab Style Five
       if($tab_style === 'tab-five') {
        $column_class = 'col-md-6';
      } else {
         $column_class = '';
      }
      // Tab Dark Version 
      if ($tab_dark) {
        $dark_version_class = ' tab-dark-version';
      } else {
        $dark_version_class = '';
      } ?>

      <!-- begin output -->
      <div <?php echo $id; ?> class="hanor-outcome-services <?php echo $class .$tab_class .$styled_class. $dark_version_class; ?>">
        <?php // tab-navs
        if($tab_style === 'tab-five') { ?>
          <div class="col-md-6 hanor-item"><div class="hanor-table-wrap"><div class="hanor-align-wrap"><h2 class="large-title"><?php echo $tab_section_title; ?></h2>
        <?php }
        if($tab_style === 'tab-six') { ?>
          <div class="tab-six-wrap"><div class="container"><div class="col-md-9">
        <?php } ?>
        <ul class="nav nav-tabs">
        <?php
        foreach( $vt_tabs as $key => $tab ){
          $title      = $tab['atts']['title'];
          $sub_title  = ( !empty($tab['atts']['sub_title']) ) ? '<p>'.$tab['atts']['sub_title'].'</p>' : '';
          $icon       = ( !empty( $tab['atts']['tab_icon'] ) ) ? '<span class="'.$tab['atts']['tab_icon'].' hanor-tab-icon"></span>': '';
          $image_url = ( !empty( $tab['atts']['tab_icon_image'] ) ) ? wp_get_attachment_url( $tab['atts']['tab_icon_image'] ) : '';

          if(class_exists('Aq_Resize')) {
            $icon_img = aq_resize( $image_url, '50', '58', true );
          } else {$icon_img = $image_url;}

          $icon_image       = ( !empty( $image_url ) ) ? '<img src="'. $icon_img .'" alt="'. $title .'">': '';
          $active_nav = ( ( $key + 1 ) == $active ) ? ' class="active"' : ''; ?>
          <li <?php echo $active_nav; ?>><a href="#<?php echo $uniqtab; ?>-<?php echo $key; ?>" data-toggle="tab"><?php echo $icon_image . $icon; ?><span class="tab-title"><?php echo $title . $sub_title; ?></span></a></li>
        <?php } ?>
        </ul>
        <?php
        if($tab_style === 'tab-five') { ?>
          </div></div></div>
        <?php } 
        if($tab_style === 'tab-six') { ?>
        </div>
        <?php if($need_share) { ?>
          <div class="col-md-3"><?php echo havnor_post_share_option(); ?></div>
        <?php } ?>
        </div></div>
        <?php }

        // tab-contents
        if($tab_style === 'tab-five') { ?>
          <div class="col-md-6 hanor-item"> <div class="hanor-table-wrap"><div class="hanor-align-wrap">
        <?php } 
        if($tab_style === 'tab-six') { ?>
          <div class="container">
        <?php } ?>
        <div class="tab-content">
        <?php
        foreach( $vt_tabs as $key => $tab ){
          $title           = $tab['atts']['title'];
          $active_content  = ( ( $key + 1 ) == $active ) ? ' in active' : ''; ?>
          <div id="<?php echo $uniqtab; ?>-<?php echo $key; ?>" class="tab-pane fade <?php echo $active_content; ?>"><?php echo do_shortcode( $tab['content'] ); ?></div>
        <?php } ?>
        </div>
        <?php
        if($tab_style === 'tab-five') { ?>
          </div></div></div>
        <?php } 
        if($tab_style === 'tab-six') { ?>
          </div>
        <?php } ?>

      </div>
      <?php
      // end output
    }

    // Return outbut buffer
    return ob_get_clean();
  }
  add_shortcode( 'vt_tabs', 'havnor_vt_tabs_function' );
}

/* ==========================================================
  Tab
=========================================================== */
if( ! function_exists( 'havnor_vt_tab_function' ) ) {
  function havnor_vt_tab_function( $atts, $content = '', $key = '' ) {
    global $vt_tabs;
    $vt_tabs[]  = array( 'atts' => $atts, 'content' => $content );
    return;
  }
  add_shortcode('vt_tab', 'havnor_vt_tab_function');
}
