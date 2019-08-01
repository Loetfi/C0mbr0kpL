<?php
// Metabox
$havnor_id    = ( isset( $post ) ) ? $post->ID : 0;
$havnor_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $havnor_id;
$havnor_id    = ( havnor_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $havnor_id;
$havnor_id    = ( !is_tag() && !is_archive() && !is_search()) ? $havnor_id : false;
$havnor_meta  = get_post_meta( $havnor_id, 'page_type_metabox', true );
if ($havnor_meta) {
	$havnor_title_bar_padding = $havnor_meta['title_area_spacings'];
  $havnor_sub_title = $havnor_meta['page_custom_sub_title'];
  $havnor_banner_align = $havnor_meta['title_area_align'];
  $havnor_bg_overlay_color = $havnor_meta['titlebar_bg_overlay_color'];
  $sub_title_position = $havnor_meta['sub_title_align'];
  $havnor_hide_breadcrumbs  = $havnor_meta['hide_breadcrumbs'];
} else { 
	$havnor_title_bar_padding = ''; 
  $havnor_sub_title = '';
  $havnor_banner_align = cs_get_option('title_area_align');
  $havnor_bg_overlay_color = cs_get_option('titlebar_bg_overlay_color');
  $sub_title_position = cs_get_option('sub_title_align');
  $havnor_hide_breadcrumbs  = '';
}

// Breadcrumb Style
$breadcrumb_style = cs_get_option('breadcrumb_style');

// Sub-title Position
if ($havnor_meta && $sub_title_position != 'theme-options') {
  $sub_title_position = $havnor_meta['sub_title_align'];
} else { 
  $sub_title_position = cs_get_option('sub_title_align');
}

// Title Align
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
// Padding - Theme Options
if ($havnor_title_bar_padding && $havnor_title_bar_padding !== 'padding-default') {
	$havnor_title_top_spacings = $havnor_meta['title_top_spacings'];
	$havnor_title_bottom_spacings = $havnor_meta['title_bottom_spacings'];
	if ($havnor_title_bar_padding === 'padding-custom') {
		$havnor_title_top_spacings = $havnor_title_top_spacings ? 'padding-top:'. havnor_check_px($havnor_title_top_spacings) .';' : '';
		$havnor_title_bottom_spacings = $havnor_title_bottom_spacings ? 'padding-bottom:'. havnor_check_px($havnor_title_bottom_spacings) .';' : '';
		$havnor_custom_padding = $havnor_title_top_spacings . $havnor_title_bottom_spacings;
	} else {
		$havnor_custom_padding = '';
	}
} else {
	$havnor_title_bar_padding = cs_get_option('title_bar_padding');
	$havnor_titlebar_top_padding = cs_get_option('titlebar_top_padding');
	$havnor_titlebar_bottom_padding = cs_get_option('titlebar_bottom_padding');
	if ($havnor_title_bar_padding === 'padding-custom') {
		$havnor_titlebar_top_padding = $havnor_titlebar_top_padding ? 'padding-top:'. havnor_check_px($havnor_titlebar_top_padding) .';' : '';
		$havnor_titlebar_bottom_padding = $havnor_titlebar_bottom_padding ? 'padding-bottom:'. havnor_check_px($havnor_titlebar_bottom_padding) .';' : '';
		$havnor_custom_padding = $havnor_titlebar_top_padding . $havnor_titlebar_bottom_padding;
	} else {
		$havnor_custom_padding = '';
	}
}

// Banner Type - Meta Box
if ($havnor_meta) {
	$havnor_banner_type = $havnor_meta['banner_type'];
} else { $havnor_banner_type = ''; }

// Overlay Color
if ($havnor_meta && $havnor_bg_overlay_color) {
  $havnor_bg_overlay_color = $havnor_meta['titlebar_bg_overlay_color'];
} else { 
  $havnor_bg_overlay_color = cs_get_option('titlebar_bg_overlay_color');
}

if ($havnor_bg_overlay_color) {
	$havnor_overlay_color = 'style=background-color:'.$havnor_bg_overlay_color;
} else {
	$havnor_overlay_color = '';
}
$havnor_need_breadcrumbs = cs_get_option('need_breadcrumbs');
if($havnor_need_breadcrumbs) {
  if (!$havnor_hide_breadcrumbs) {
    $breadcrumbs_cls = ' hav-breadcrum';
  } else {
    $breadcrumbs_cls = ' dhav-breadcrum';
  }
} else {
  $breadcrumbs_cls = ' dhav-breadcrum';
}

// Button Shortcode
if ($havnor_meta) {
  $button_shortcode = $havnor_meta['button_shortcode'];
} else {
  $button_shortcode = cs_get_option('button_shortcode');
}

$button_shortcode = $button_shortcode ? $button_shortcode : cs_get_option('button_shortcode');

// Background - Type
if( $havnor_meta && isset( $havnor_meta['title_area_bg'] ) ) {
  extract( $havnor_meta['title_area_bg'] );
  if ($image) {
    $havnor_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
    $havnor_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
    $havnor_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
    $havnor_background_size        = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
    $havnor_background_attachment  = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
    $havnor_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
    $havnor_background_style       = ( ! empty( $image ) ) ? $havnor_background_image . $havnor_background_repeat . $havnor_background_position . $havnor_background_size . $havnor_background_attachment : '';
    $havnor_title_bg = ( ! empty( $havnor_background_style ) || ! empty( $havnor_background_color ) ) ? $havnor_background_style . $havnor_background_color : '';
  } else {
  	$havnor_title_bgg = cs_get_option('titlebar_bg');
    if ($havnor_title_bgg) {
    extract( $havnor_title_bgg );
     $havnor_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
     $havnor_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
     $havnor_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
     $havnor_background_size        = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
     $havnor_background_attachment  = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
     $havnor_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
     $havnor_background_style       = ( ! empty( $image ) ) ? $havnor_background_image . $havnor_background_repeat . $havnor_background_position . $havnor_background_size . $havnor_background_attachment : '';
     $havnor_title_bg = ( ! empty( $havnor_background_style ) || ! empty( $havnor_background_color ) ) ? $havnor_background_style . $havnor_background_color : '';
     } else {
      $havnor_title_bg = '';
     }
  }

} else {
$havnor_title_bgg = cs_get_option('titlebar_bg');
  if ($havnor_title_bgg) {
  extract( $havnor_title_bgg );
   $havnor_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
   $havnor_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
   $havnor_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
   $havnor_background_size        = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
   $havnor_background_attachment  = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
   $havnor_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
   $havnor_background_style       = ( ! empty( $image ) ) ? $havnor_background_image . $havnor_background_repeat . $havnor_background_position . $havnor_background_size . $havnor_background_attachment : '';

  $havnor_title_bg = ( ! empty( $havnor_background_style ) || ! empty( $havnor_background_color ) ) ? $havnor_background_style . $havnor_background_color : '';
  } else {
  $havnor_title_bg = '';
  }
 }
if($havnor_banner_type === 'hide-title-area') { // Hide Title Area
}  elseif($havnor_meta && $havnor_banner_type === 'revolution-slider') {
   echo do_shortcode($havnor_meta['page_revslider']);
} elseif($havnor_meta && $havnor_banner_type === 'custom-shortcode') { ?>
  <section class="hanor-page-title hanor-parallax <?php echo esc_attr($havnor_title_bar_padding); ?> <?php echo esc_attr($banner_align_class); ?>" style="<?php echo esc_attr($havnor_custom_padding . $havnor_title_bg); ?>">
  <div class="parallax-overlay" <?php echo esc_html($havnor_overlay_color); ?>></div>
  <div class="container"> <?php 
   echo do_shortcode($havnor_meta['page_custom']);?>
  </div>
</section> <?php
} else { ?>
<!-- Hanor Page Title, Hanor Parallax -->
<section class="hanor-page-title hanor-parallax <?php echo esc_attr($havnor_title_bar_padding); ?> <?php echo esc_attr($banner_align_class.$breadcrumbs_cls); ?>" style="<?php echo esc_attr($havnor_custom_padding . $havnor_title_bg); ?>">
  <div class="parallax-overlay" <?php echo esc_html($havnor_overlay_color); ?>></div>
  <div class="container">
  <div class="hanor-title-wrap">
  <?php if($sub_title_position === 'below-title'){ ?>
    <h1 class="page-title"><?php echo esc_html(havnor_title_area()); ?></h1>
    <?php if($havnor_sub_title){ ?>
      <h5 class="page-sub-title"><?php echo esc_html($havnor_sub_title); ?></h5>
    <?php }
  } else {
    if($havnor_sub_title){ ?>
      <h5 class="page-sub-title"><?php echo esc_html($havnor_sub_title); ?></h5>
    <?php } ?>
      <h1 class="page-title"><?php echo esc_html(havnor_title_area()); ?></h1>
  <?php } ?>
  </div>
  <?php if($button_shortcode) { ?>
  <div class="title-bar-btn">
  <?php echo do_shortcode($button_shortcode); ?>
  </div>
  <?php }
    // Breadcrumbs
    if($breadcrumb_style != 'two'){
      if (isset($havnor_need_breadcrumbs)) {
        get_template_part( 'layouts/header/breadcrumbs', 'bar' );
      }
    } ?>
  </div>
</section>
<?php } 
// Breadcrumbs
if($breadcrumb_style === 'two'){
  if (isset($havnor_need_breadcrumbs)) {
    get_template_part( 'layouts/header/breadcrumbs', 'bar' );
  }
}
