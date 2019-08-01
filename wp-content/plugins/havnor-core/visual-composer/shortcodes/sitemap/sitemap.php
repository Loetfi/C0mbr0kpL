<?php
/* ==========================================================
  Sitemap
=========================================================== */
if ( !function_exists('havnor_sitemap_function')) {
  function havnor_sitemap_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'menu_title'  => '',
      'select_menu'  => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_size'  => '',
      'title_weight' => '',
      'link_color'  => '',
      'link_hover_color'  => '',
      'link_size'  => '',
      'border_color'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $link_color || $link_size ) {
      $inline_style .= '.hanor-sitemap-'. $e_uniqid .' .sitemap-list ul li a {';
      $inline_style .= ( $link_color ) ? 'color:'. $link_color .';' : '';
      $inline_style .= ( $link_size ) ? 'font-size:'. havnor_core_check_px($link_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $link_hover_color ) {
      $inline_style .= '.hanor-sitemap-'. $e_uniqid .' .sitemap-list ul li a:hover {';
      $inline_style .= ( $link_hover_color ) ? 'color:'. $link_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $title_size || $title_color || $title_weight) {
      $inline_style .= '.hanor-sitemap-'. $e_uniqid .'.hanor-sitemap-wrap h2 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= '}';
    }
    if ( $border_color ) {
      $inline_style .= '.hanor-sitemap-'. $e_uniqid .' .sitemap-list ul li {';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-sitemap-'. $e_uniqid;
    ob_start();
    ?>
    <div class="hanor-sitemap-wrap <?php echo esc_attr( $class . $styled_class ); ?>"> 
      <h2><?php echo $menu_title; ?></h2>
      <div class="sitemap-list">
        <?php wp_nav_menu(
          array(
            'menu'              => 'primary',
            'theme_location'    => 'primary',
            'container'         => '',
            'container_class'   => '',
            'container_id'      => '',
            'menu'              => $select_menu,
            'menu_class'        => '',
          )
        ); ?>
      </div>
    </div>
    <?php
    return ob_get_clean();
  }
}
add_shortcode( 'hanor_sitemap', 'havnor_sitemap_function' );
