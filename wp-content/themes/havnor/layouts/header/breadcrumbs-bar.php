<?php
$havnor_id    = ( isset( $post ) ) ? $post->ID : 0;
$havnor_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $havnor_id;
$havnor_id    = ( havnor_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $havnor_id;
$havnor_meta  = get_post_meta( $havnor_id, 'page_type_metabox', true );
// Breadcrumb Style
$breadcrumb_style = cs_get_option('breadcrumb_style');
if($breadcrumb_style === 'two') {
	$breadcrumb_cls = ' breadcrumb-two';
} else {
	$breadcrumb_cls = ' breadcrumb-one';
}
if ($havnor_meta) {
	$havnor_hide_breadcrumbs  = $havnor_meta['hide_breadcrumbs'];
	$havnor_banner_align = $havnor_meta['title_area_align'];
} else { 
	$havnor_hide_breadcrumbs = '';
	$havnor_banner_align = cs_get_option('title_area_align');
}

// Align
if ($havnor_meta && $havnor_banner_align != 'theme-options') {
  $havnor_banner_align = $havnor_meta['title_area_align'];
} else { 
  $havnor_banner_align = cs_get_option('title_area_align');
}

if ($havnor_banner_align === 'text-center') {
  $banner_align_class = 'banner-center';
} elseif ($havnor_banner_align === 'text-right') {
  $banner_align_class = 'banner-right';
} else {
  $banner_align_class = '';
}

if (!$havnor_hide_breadcrumbs) { // Hide Breadcrumbs
	if($breadcrumb_style === 'two') {
		echo '<div class="breadcrumb-style-two '.$banner_align_class.'">';
	}
?>
<!-- Breadcrumbs -->
<div class="container hanor-breadcrumbs <?php echo esc_attr($breadcrumb_cls); ?>">
  <h5 class="page-sub-title">
    <?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
  </h5>
</div>
<!-- Breadcrumbs -->
<?php
	if($breadcrumb_style === 'two') {
		echo '</div>';
	}
} // Hide Breadcrumbs
