<?php
/* ==========================================================
  Lists
=========================================================== */
if ( !function_exists('havnor_figures_function')) {
  function havnor_figures_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'center_image' => '',
      'figures_items'  => '',
      'class'  => '',
      // Style
      'text_color'  => '',
      'text_size'  => '',
      'title_color'  => '',
      'title_size'  => '',
      'title_weight' => '',
      'title_btm_space' => '',
      'icon_size' => '',
      'icon_color'  => '',
      'icon_bg_color'  => '',
      'icon_border_color'=>'',
    ), $atts));

    // Group Field
    $figures_items = (array) vc_param_group_parse_atts( $figures_items );
    $get_each_figures = array();
    foreach ( $figures_items as $figures_item ) {
      $each_figures = $figures_item;
      $each_figures['select_icon'] = isset( $figures_item['select_icon'] ) ? $figures_item['select_icon'] : '';
      $each_figures['figures_title'] = isset( $figures_item['figures_title'] ) ? $figures_item['figures_title'] : '';
      $each_figures['figures_text'] = isset( $figures_item['figures_text'] ) ? $figures_item['figures_text'] : '';
      $get_each_figures[] = $each_figures;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $text_color || $text_size ) {
      $inline_style .= '.hanor-figures-'. $e_uniqid .' .figuress-info p {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $title_size || $title_color || $title_weight || $title_btm_space) {
      $inline_style .= '.hanor-figures-'. $e_uniqid .' .figuress-info h3 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_btm_space ) ? 'padding-bottom:'. havnor_core_check_px($title_btm_space) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_color || $icon_size ) {
      $inline_style .= '.hanor-figures-'. $e_uniqid .' .figuress-item .hanor-icon [class*="pe-7s"], .hanor-figures-'. $e_uniqid .' .figuress-item .hanor-icon i, .hanor-figures-'. $e_uniqid .' .figuress-item .hanor-icon span {';
      $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= '}';
    }
    if ($icon_bg_color) {
      $inline_style .= '.hanor-figures-'. $e_uniqid .' .figuress-item .hanor-icon {';
      $inline_style .= ( $icon_bg_color ) ? 'background-color:'. $icon_bg_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_border_color ) {
      $inline_style .= '.hanor-figures-'. $e_uniqid .' .figuress-item .hanor-icon {';
      $inline_style .= ( $icon_border_color ) ? 'box-shadow: 0px 0px 0px 5px '. $icon_border_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-figures-'. $e_uniqid;

    $image_url = wp_get_attachment_url( $center_image );
    if(class_exists('Aq_Resize')) {
      $center_img = aq_resize( $image_url, '65', '65', true );
    } else {$center_img = $image_url;}
    $center_img_Actual = ( $center_img ) ? $center_img : $image_url;

    $output = '<div class="hanor-figuress-wrap '. $class . $styled_class .'">';
    // Group Param Output
    foreach ( $get_each_figures as $each_figures ) {
      $figures_title = $each_figures['figures_title'] ? '<h3>'. $each_figures['figures_title'] .'</h3>' : '';
      $figures_text = $each_figures['figures_text'] ? '<p>'. $each_figures['figures_text'] .'</p>' : '';
      $figures_icon = $each_figures['select_icon'] ? '<span class="'.$each_figures['select_icon'].'"></span>' : '';

      $output .= '<div class="figuress-item">
                    <div class="figuress-item-wrap">
                      <div class="icon-wrap hanor-item">
                        <div class="hanor-table-wrap">
                          <div class="hanor-align-wrap">
                            <div class="hanor-icon">'.$figures_icon.'</div>
                          </div>
                        </div>
                      </div>
                      <div class="figuress-info hanor-item">
                        <div class="hanor-table-wrap">
                          <div class="hanor-align-wrap">
                            '. $figures_title . $figures_text .'
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';
    }
    if($image_url) {
      $output .= '<div class="hanor-large-out">
                  <div class="large-out-inner">
                    <div class="hanor-small-out">
                      <img src="'.$center_img_Actual.'" alt="center-img">
                    </div>
                  </div>
                </div>
              </div>';
    } else {
      $output .= '<div class="hanor-large-out">
                  <div class="large-out-inner">
                    <div class="hanor-small-out">
                      <div class="road-line"><span></span></div>
                    </div>
                  </div>
                </div>
              </div>';
    }

    return $output;
  }
}
add_shortcode( 'hanor_figures', 'havnor_figures_function' );
