<?php
/*
 * The header for our theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
?><!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
$havnor_viewport = cs_get_option('theme_responsive');
if($havnor_viewport == 'on') { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php } else {}
// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(HAVNOR_IMAGES); ?>/favicon.png" />
<?php }
$havnor_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($havnor_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($havnor_all_element_color); ?>">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
// Metabox
global $post;
$havnor_id    = ( isset( $post ) ) ? $post->ID : false;
$havnor_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $havnor_id;
$havnor_id    = ( havnor_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $havnor_id;
$havnor_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $havnor_id : false;
$havnor_meta  = get_post_meta( $havnor_id, 'page_type_metabox', true );

// Header Style
if ($havnor_meta) {
  $one_page_menu = $havnor_meta['one_page_menu'];
} else {
  $one_page_menu = '';
}
// Header Style
$havnor_header_design_actual  = cs_get_option('select_header_design');
$havnor_fixed_navigation  = cs_get_option('fixed_nav');
$havnor_sticky_header      = cs_get_option('sticky_header');
$havnor_search_icon        = cs_get_option('search_icon');
$havnor_cart_icon    = cs_get_option('cart_icon');
$havnor_sticky_footer      = cs_get_option('sticky_footer');
$need_content  = cs_get_option('need_content');
$havnor_header_content = cs_get_option('header_address_info');
$havnor_header_content_sec = cs_get_option('header_address_info_secondary');
$page_container = cs_get_option('page_container');
$havnor_header_content = $havnor_header_content ? $havnor_header_content : cs_get_option('header_address_info');

// if ($havnor_header_design_actual !== 'style_two') {
//   $havnor_sticky_header_class = $havnor_sticky_header ? ' hanor-sticky' : '';
// } else {
//   $havnor_sticky_header_class = '';
// }
$havnor_sticky_header_class = $havnor_sticky_header ? ' hanor-sticky' : '';
if ($havnor_header_design_actual === 'style_one' || $havnor_header_design_actual === 'style_two' || $havnor_header_design_actual === 'style_four' || $havnor_header_design_actual === 'style_five' || $havnor_header_design_actual === 'style_six') {
  // Header Fullwidth
  if($havnor_header_design_actual != 'style_two') {
    $final_fullwidth_header = cs_get_option('fullwidth_header');
    if ($final_fullwidth_header) {
      $fullwidth_header_class = ' hanor-fullwidth-header';
    } else {
      $fullwidth_header_class = '';
    }
  } else {
    $fullwidth_header_class = '';
  }

  // Header Transparent
  $final_transparent_header = cs_get_option('transparent_header');
  if ($final_transparent_header) {
    $transparent_header_class = ' hanor-transparent-header';
  } else {
    $transparent_header_class = ' hanor-dnt-transparent-header';
  }
} else {
  // Header Fullwidth
  $final_fullwidth_header = '';
  $fullwidth_header_class = '';
  $fullwidth_topbar_class = '';
  // Header Transparent
  $final_transparent_header = '';
  $transparent_header_class = '';
}

if ($havnor_sticky_footer) {
  $footer_class = ' hanor-sticky-footer';
} else {
  $footer_class = '';
}
// fullwidth Topbar
$final_fullwidth_topbar = cs_get_option('fullwidth_topbar');
if ($final_fullwidth_topbar) {
  $fullwidth_topbar_class = ' hanor-fullwidth-topbar';
} else {
  $fullwidth_topbar_class = '';
}
if ($havnor_header_design_actual === 'style_two') {
  $header_style_class = ' hanor-center-header';
} elseif ($havnor_header_design_actual === 'style_three') {
  $header_style_class = ' hanor-header-three';
} elseif ($havnor_header_design_actual === 'style_four') {
  $header_style_class = ' header-hanor-style-one';
} elseif ($havnor_header_design_actual === 'style_five') {
  $header_style_class = ' header-hanor-style-two';
} elseif ($havnor_header_design_actual === 'style_six') {
  $header_style_class = ' header-hanor-style-three';
} elseif ($havnor_header_design_actual === 'style_seven') {
  $header_style_class = ' header-hanor-style-three header-hanor-style-five';
} else {
  $header_style_class = ' header-style-one';
}
if($havnor_fixed_navigation === 'show'){
  $toggle_class = ' active';
} else {
  $toggle_class = '';
}
// One Page Menu
if($one_page_menu) {
  $parallax_menu_class = ' smooth-scroll';
} else {
  $parallax_menu_class = '';
}
if ($havnor_header_design_actual === 'style_five') {
  $header_trans_cls = ' hanor-transparent-header';
} else {
  $header_trans_cls = $transparent_header_class;
}
if ($havnor_header_design_actual === 'style_six') {
  if ($final_fullwidth_header) {
    $header_six_class = ' header-hanor-style-four';
  } else {
    $header_six_class = '';
  }
} else {
  $header_six_class = '';
}

$select_mean_menu = cs_get_option('select_mean_menu');
if($havnor_fixed_navigation === 'show') {
  if(!$select_mean_menu) {
    $mean_class = ' mean-menu-parent';
  } else {
    $mean_class = '';
  }
} else {
  $mean_class = ' mean-menu-parent';
}

wp_head();
?>
</head>
<body <?php body_class(); ?>>
<!-- Hanor Main Wrap -->
<div class="hanor-main-wrap <?php echo esc_attr($header_trans_cls . $fullwidth_header_class . $header_six_class . $fullwidth_topbar_class . $footer_class . $header_style_class .' '. $havnor_sticky_header); ?>">
  <!-- Hanor Main Wrap Inner -->
  <div class="main-wrap-inner">
  <?php
  get_template_part( 'layouts/header/top', 'bar' );
  if ($havnor_header_design_actual === 'style_two') { ?>
    <header class="hanor-header <?php echo esc_attr($parallax_menu_class . $mean_class . $havnor_sticky_header_class); ?>">
      <div class="container">
        <?php get_template_part( 'layouts/header/logo' ); ?>
      </div>
      <div class="hanor-navigation-wrap">
        <div class="container">
          <div class="header-center-wrap">
            <?php  get_template_part( 'layouts/header/menu', 'bar' ); ?>
          </div>
        </div>
      </div>
    </header>
    <?php
      if($havnor_fixed_navigation === 'show'){
        get_template_part( 'layouts/header/side', 'menu-two' );
      }
  } elseif ($havnor_header_design_actual === 'style_three') { ?>
    <div class="hanor-sidebar-nav <?php echo esc_attr($mean_class); ?>">
      <div class="sidebar-nav-wrap">
        <div class="hanor-table-row">
          <?php get_template_part( 'layouts/header/logo' ); ?>
        </div>
        <div class="hanor-table-row">
          <div class="hanor-table-wrap">
            <div class="hanor-align-wrap">
              <?php  get_template_part( 'layouts/header/menu', 'bar' ); ?>
            </div>
          </div>
        </div>
        <div class="hanor-table-row">
          <div class="hanor-table-wrap">
            <div class="hanor-align-wrap bottom">
              <?php
              if ($need_content) { echo do_shortcode($havnor_header_content); } else {} ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } elseif ($havnor_header_design_actual === 'style_four') { ?>
  <header class="hanor-header <?php echo esc_attr($mean_class . $havnor_sticky_header_class); ?>">
    <div class="container">
      <div class="row">
        <div class="col-md-3 header-four-left">
          <div class="header-contents">
            <?php
            if ($need_content) { echo do_shortcode($havnor_header_content); } else {} ?>
          </div>
          <?php  get_template_part( 'layouts/header/logo' ); ?>
        </div>
        <div class="col-md-6">
          <?php  get_template_part( 'layouts/header/menu', 'bar' ); ?>
        </div>
        <div class="col-md-3">
          <div class="header-links-right">
            <div class="header-links-wrap">
            <?php if($havnor_fixed_navigation === 'show'){ ?>
              <div class="navi-toggle"><a href="javascript:void(0);"><span></span></a></div>
            <?php }
              if($havnor_search_icon) { get_template_part( 'layouts/header/header', 'search' ); }
              if($havnor_cart_icon) {
                get_template_part( 'layouts/header/header', 'cart' );
              } ?>
            </div>
            <?php
              if ($need_content) { echo do_shortcode($havnor_header_content_sec); } else {} ?>
          </div>
        </div>
      </div>
    </div>
  </header>
  <?php if($havnor_fixed_navigation === 'show'){
      get_template_part( 'layouts/header/side', 'menu-two' );
    }
  } elseif ($havnor_header_design_actual === 'style_five') { ?>
    <header class="hanor-header <?php echo esc_attr($mean_class . $havnor_sticky_header_class); ?>">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-2 col-xs-2 header-five-menu-toggle">
          <?php if($havnor_fixed_navigation === 'show'){ ?>
            <div class="navi-toggle"><a href="javascript:void(0);"><span></span></a></div>
          <?php } ?>
          </div>
          <div class="col-md-6 col-sm-4 col-xs-4">
            <?php  get_template_part( 'layouts/header/logo' ); ?>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="header-links-right">
              <div class="header-links-wrap">
                <?php
                if($havnor_search_icon) { get_template_part( 'layouts/header/header', 'search' ); }
                if ($need_content) { echo do_shortcode($havnor_header_content); } else {} ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <?php
      if($havnor_fixed_navigation === 'show'){
        get_template_part( 'layouts/header/side', 'menu-two' );
      }
  } elseif ($havnor_header_design_actual === 'style_six') { ?>
  <header class="hanor-header <?php echo esc_attr($mean_class . $havnor_sticky_header_class); ?>">
    <div class="logo-wraper">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <?php  get_template_part( 'layouts/header/logo' ); ?>
          </div>
          <div class="col-md-8">
            <div class="header-contents">
              <?php
              if ($need_content) { echo do_shortcode($havnor_header_content); } else {} ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="menu-wraper">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <?php  get_template_part( 'layouts/header/menu', 'bar' ); ?>
          </div>
          <div class="col-md-4">
            <div class="header-links-right">
              <div class="header-links-wrap">
                <?php
                if ($need_content) { echo do_shortcode($havnor_header_content_sec); } else {}
                if($havnor_search_icon) { get_template_part( 'layouts/header/header', 'search' ); }
                if($havnor_cart_icon) {
                  get_template_part( 'layouts/header/header', 'cart' );
                }
                if($havnor_fixed_navigation === 'show'){ ?>
                  <div class="navi-toggle"><a href="javascript:void(0);"><span></span></a></div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <?php
    if($havnor_fixed_navigation === 'show'){
      get_template_part( 'layouts/header/side', 'menu-two' );
    }
} elseif ($havnor_header_design_actual === 'style_seven') { ?>
  <header class="hanor-header <?php echo esc_attr($mean_class . $havnor_sticky_header_class); ?>">
    <div class="logo-wraper">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <?php  get_template_part( 'layouts/header/logo' ); ?>
          </div>
          <div class="col-md-8">
            <div class="header-contents">
              <?php
              if ($need_content) { echo do_shortcode($havnor_header_content); } else {} ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="menu-wraper">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <?php  get_template_part( 'layouts/header/menu', 'bar' ); ?>
          </div>
          <div class="col-md-4">
            <div class="header-links-right">
              <?php
              if ($need_content) { echo do_shortcode($havnor_header_content_sec); } else {}
              if($havnor_fixed_navigation === 'show'){ ?>
                  <div class="navi-toggle"><a href="javascript:void(0);"><span></span></a></div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <?php
    if($havnor_fixed_navigation === 'show'){
      get_template_part( 'layouts/header/side', 'menu-two' );
    }
} else { ?>
  <!-- Header -->
  <header class="hanor-header <?php echo esc_attr($parallax_menu_class . $mean_class . $havnor_sticky_header_class); ?>">
    <div class="container">
      <?php  get_template_part( 'layouts/header/logo' ); ?>
      <div class="hanor-header-right">
        <?php  get_template_part( 'layouts/header/menu', 'bar' ); ?>
      </div>
    </div> <!-- Container -->
  </header>
  <?php
  if($havnor_fixed_navigation === 'show'){
    get_template_part( 'layouts/header/side', 'menu-two' );
  } }
  // Title Area
  if( ! is_404() ) {
    $havnor_need_title_bar = cs_get_option('need_title_bar');
    if($havnor_need_title_bar) {
      get_template_part( 'layouts/header/title', 'bar' );
    }
  }
if ($havnor_header_design_actual === 'style_three') {
if(!$page_container && !is_404()){ ?>
<div class="container">
<?php } }
