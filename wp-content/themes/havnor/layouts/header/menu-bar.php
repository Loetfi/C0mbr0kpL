<?php
// Metabox
$havnor_id    = ( isset( $post ) ) ? $post->ID : 0;
$havnor_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $havnor_id;
$havnor_id    = ( havnor_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $havnor_id;
$havnor_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $havnor_id : false;
$havnor_meta  = get_post_meta( $havnor_id, 'page_type_metabox', true );
// Header Style - ThemeOptions & Metabox
$havnor_header_design_actual  = cs_get_option('select_header_design');
$havnor_header_address_info      = cs_get_option('header_address_info');
$havnor_sticky_header  = cs_get_option('sticky_header');
$havnor_search_icon    = cs_get_option('search_icon');
$havnor_cart_icon    = cs_get_option('cart_icon');
$need_content  = cs_get_option('need_content');
$havnor_fixed_nav = cs_get_option('fixed_nav');
if ($havnor_header_design_actual !== 'style_two') {
  $havnor_sticky_header_class = $havnor_sticky_header ? ' hanor-sticky' : '';
} else {
  $havnor_sticky_header_class = '';
}

$havnor_mobile_breakpoint = cs_get_option('mobile_breakpoint');
$havnor_breakpoint = $havnor_mobile_breakpoint ? $havnor_mobile_breakpoint : '1199';
?>
<!-- Navigation & Search -->
<nav class="hanor-navigation" data-nav="<?php echo esc_attr($havnor_breakpoint); ?>">
<?php
  if ($havnor_meta) {
    $havnor_choose_menu = $havnor_meta['choose_menu'];
  } else { $havnor_choose_menu = ''; }
  $havnor_choose_menu = $havnor_choose_menu ? $havnor_choose_menu : '';
  wp_nav_menu(
    array(
      'menu'              => 'primary',
      'theme_location'    => 'primary',
      'container'         => '',
      'container_class'   => '',
      'container_id'      => '',
      'menu'              => $havnor_choose_menu,
      'menu_class'        => '',
      'fallback_cb'       => 'havnor_wp_bootstrap_navwalker::fallback',
      'walker'            => new havnor_wp_bootstrap_navwalker()
    )
  );
?>

</nav> <!-- Container -->
<?php if($havnor_header_design_actual !== 'style_three' && $havnor_header_design_actual !== 'style_four' && $havnor_header_design_actual !== 'style_six' && $havnor_header_design_actual !== 'style_seven') { ?>
<div class="header-links-wrap">
  <?php if($havnor_search_icon) { get_template_part( 'layouts/header/header', 'search' ); }
  if($havnor_cart_icon) { 
    get_template_part( 'layouts/header/header', 'cart' );
  }   
  if($havnor_fixed_nav === 'show') { ?>
    <div class="navi-toggle"><a href="javascript:void(0);"><span></span></a></div>
  <?php } ?>
</div>
<?php }
if ($havnor_header_design_actual !== 'style_three' && $havnor_header_design_actual !== 'style_four' && $havnor_header_design_actual !== 'style_six' && $havnor_header_design_actual !== 'style_seven') {
  if ($need_content) { echo do_shortcode($havnor_header_address_info); } else {}
}
