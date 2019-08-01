<?php
// Theme Options fields
$havnor_search_icon    = cs_get_option('top_search_icon');
$havnor_cart_icon      = cs_get_option('top_cart_icon');
// Topbar options
$havnor_top_left = cs_get_option('top_left');
$havnor_top_right = cs_get_option('top_right');

$havnor_hide_topbar_check = cs_get_option('top_bar');
$top_bar_in_responsive = cs_get_option('top_bar_in_responsive');
if ($havnor_hide_topbar_check === true ) {
  $havnor_hide_topbar = 'hide';
} else {
  $havnor_hide_topbar = 'show';
}

if($top_bar_in_responsive) {
  $top_bar_in_responsive_class = ' hide-topbar-responsive';
} else {
  $top_bar_in_responsive_class = '';
}
$havnor_topbar_left_width = cs_get_option('topbar_left_width');
$havnor_topbar_right_width = cs_get_option('topbar_right_width');
$havnor_left_width   = $havnor_topbar_left_width ? 'width:'. $havnor_topbar_left_width .';' : '';
$havnor_right_width  = $havnor_topbar_right_width ? 'width:'. $havnor_topbar_right_width .';' : '';

if($havnor_hide_topbar === 'show') {
if($havnor_top_left || $havnor_top_right ) {
?>

<div class="hanor-topbar <?php echo esc_attr($top_bar_in_responsive_class); ?>">
  <div class="container">
    <div class="pull-left" style="<?php echo esc_attr($havnor_left_width); ?>">
      <?php echo do_shortcode($havnor_top_left); ?>
    </div>
    <div class="pull-right" style="<?php echo esc_attr($havnor_right_width); ?>">
    <?php 
    if($havnor_search_icon || $havnor_cart_icon) { 
    echo '<div class="topbar-search-cart">';
    if($havnor_search_icon) { 
      get_template_part( 'layouts/header/header', 'search' ); 
    }
    if($havnor_cart_icon) { 
      get_template_part( 'layouts/header/header', 'cart' );
    } 
    echo '</div>';
    }
    echo do_shortcode($havnor_top_right); ?>
    </div>
  </div>
</div>
<?php } } // Hide Topbar - From Metabox
