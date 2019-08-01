<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Theme Options
$error_page = cs_get_option('error_page');
$havnor_error_title = cs_get_option('error_title');
$havnor_error_heading = cs_get_option('error_heading');
$havnor_error_page_content = cs_get_option('error_page_content');
$havnor_error_page_bg = cs_get_option('error_page_bg');
$havnor_error_btn_text = cs_get_option('error_btn_text');
$havnor_error_title = $havnor_error_title ? $havnor_error_title : esc_html__('404', 'havnor');
$havnor_error_heading = ( $havnor_error_heading ) ? $havnor_error_heading : esc_html__( 'Sorry!!! Page Not Found!', 'havnor' );
$havnor_error_page_content = ( $havnor_error_page_content ) ? $havnor_error_page_content : esc_html__( 'The page you were looking for wasn\'t found.', 'havnor' );
$havnor_error_page_bg = ( $havnor_error_page_bg ) ? wp_get_attachment_url($havnor_error_page_bg) : HAVNOR_IMAGES . '/404.png';
$havnor_error_btn_text = ( $havnor_error_btn_text ) ? $havnor_error_btn_text : esc_html__( 'BACK TO HOME', 'havnor' );

// Metabox
$havnor_id    = $error_page;
$havnor_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $havnor_id;
$havnor_id    = ( havnor_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $havnor_id;
$havnor_meta  = get_post_meta( $havnor_id, 'page_type_metabox', true );
if ($havnor_meta) {
  $havnor_content_padding = $havnor_meta['content_spacings'];
} else { $havnor_content_padding = ''; }
// Padding - Metabox
if ($havnor_content_padding && $havnor_content_padding !== 'padding-none') {
  $havnor_content_top_spacings = $havnor_meta['content_top_spacings'];
  $havnor_content_bottom_spacings = $havnor_meta['content_bottom_spacings'];
  if ($havnor_content_padding === 'padding-custom') {
    $havnor_content_top_spacings = $havnor_content_top_spacings ? 'padding-top:'. havnor_check_px($havnor_content_top_spacings) .';' : '';
    $havnor_content_bottom_spacings = $havnor_content_bottom_spacings ? 'padding-bottom:'. havnor_check_px($havnor_content_bottom_spacings) .';' : '';
    $havnor_custom_padding = $havnor_content_top_spacings . $havnor_content_bottom_spacings;
  } else {
    $havnor_custom_padding = '';
  }
} else {
  $havnor_custom_padding = '';
}

// Page Layout Options
if ($havnor_meta) {
  $havnor_page_layout = $havnor_meta['page_layout'];
  if($havnor_page_layout === 'left-sidebar' || $havnor_page_layout === 'right-sidebar') {
    $havnor_column_class = 'hanor-primary';
    $havnor_layout_class = 'container';
  } else {
    $havnor_column_class = 'col-md-12';
    $havnor_layout_class = 'container';
  }

  // Page Layout Class
  if ($havnor_page_layout === 'left-sidebar') {
    $havnor_sidebar_class = 'left-sidebar';
  } elseif ($havnor_page_layout === 'right-sidebar') {
    $havnor_sidebar_class = 'right-sidebar';
  } else {
    $havnor_sidebar_class = 'full-width';
  }
} else {
  $havnor_page_layout = '';
  $havnor_column_class = 'col-md-12';
  $havnor_layout_class = 'container';
  $havnor_sidebar_class = 'hanor-full-width';
}

get_header();
if($error_page){ ?>
<div class="hanor-mid-wrap <?php echo esc_attr($havnor_content_padding .' '. $havnor_sidebar_class); ?>" style="<?php echo esc_attr($havnor_custom_padding); ?>">
  <div class="<?php echo esc_attr($havnor_layout_class); ?>">
    <div class="row">
      <?php
      // Left Sidebar
      if($havnor_page_layout === 'left-sidebar') {
        get_sidebar();
      }
      ?>
      <div class="hanor-content-side <?php echo esc_attr($havnor_column_class); ?>">
        <?php
          $error_page = get_page( $error_page );
          WPBMap::addAllMappedShortcodes();
          echo ( is_object( $error_page ) ) ? do_shortcode( $error_page->post_content ) : '';
        ?>
      </div><!-- Content Area -->
      <?php
      // Right Sidebar
      if($havnor_page_layout === 'right-sidebar') {
        get_sidebar();
      }
      ?>
    </div>
  </div>
</div>
<?php } else { ?>
	<section class="hanor-404-error hanor-parallax" style="background: url(<?php echo esc_url($havnor_error_page_bg); ?>);">
    <div class="parallax-overlay"></div>
    <div class="hanor-table-wrap">
      <div class="hanor-align-wrap">
        <div class="container">
          <div class="hanor-container">
            <h1 class="error-title"><?php echo esc_html($havnor_error_title); ?></h1>
            <h2 class="error-subtitle"><?php echo esc_html($havnor_error_heading); ?></h2>
            <p><?php echo esc_html($havnor_error_page_content); ?></p>
            <div class="hanor-btns-group"><a href="<?php echo esc_url(home_url( '/' )); ?>" class="hanor-btn"><span class="hanor-btn-text"><?php echo esc_html($havnor_error_btn_text); ?></span></a></div>
          </div>
        </div>
      </div>
    </div>
  </section>
	<!-- Content -->
<?php }
get_footer();
