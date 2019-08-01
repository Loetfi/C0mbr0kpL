<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
$havnor_viewport = cs_get_option('theme_responsive');
if($havnor_viewport == 'on') { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php } else {}
$havnor_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($havnor_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($havnor_all_element_color); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
wp_head();

// Metabox
$havnor_id    = ( isset( $post ) ) ? $post->ID : 0;
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
?>
</head>
	<body <?php body_class(); ?>>
    <div class="vt-maintenance-mode">
      <div class="container <?php echo esc_attr($havnor_content_padding); ?> hanor-content-area" style="<?php echo esc_attr($havnor_custom_padding); ?>">
       	<div class="row">
          <?php
            $havnor_page = get_post( cs_get_option('maintenance_mode_page') );
            WPBMap::addAllMappedShortcodes();
            echo ( is_object( $havnor_page ) ) ? do_shortcode( $havnor_page->post_content ) : '';
          ?>
        </div>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
<?php
