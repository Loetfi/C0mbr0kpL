<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$havnor_id    = ( isset( $post ) ) ? $post->ID : 0;
$havnor_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $havnor_id;
$havnor_id    = ( havnor_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $havnor_id;
$havnor_meta  = get_post_meta( $havnor_id, 'page_type_metabox', true );

if ($havnor_meta) {
	$havnor_hide_footer  = $havnor_meta['hide_footer'];
  $havnor_hide_copyright = $havnor_meta['hide_copyright'];
} else { 
  $havnor_hide_footer = ''; 
  $havnor_hide_copyright = '';
} 
$footer_style = cs_get_option('footer_styles');
$light_footer_bg = cs_get_option('light_bg_image');
$dark_footer_bg = cs_get_option('dark_bg_image');

$page_container = cs_get_option('page_container');
$havnor_header_design_actual  = cs_get_option('select_header_design');
$havnor_footer_bg_image = wp_get_attachment_url($dark_footer_bg);

if ($footer_style === 'light_version') {
  $footer_style_class = 'footer-light-version';
} else {
  $footer_style_class = 'footer-dark-version';
}
$footer_widget_block = cs_get_option('footer_widget_block');
if(isset($footer_widget_block)){
  if (!$havnor_hide_footer) {
    $footer_widget_class = ' have-footer-widget';
  } else {
    $footer_widget_class = ' dhav-footer-widget';
  }
} else {
  $footer_widget_class = ' dhav-footer-widget';
}

$footer_widgets = cs_get_option( 'footer_widget_layout' );
$footer_widget_align = cs_get_option('footer_widget_align');
if($footer_widget_align === 'left-align') {
  $widget_align_class = ' left-align';
} elseif($footer_widget_align === 'right-align'){
  $widget_align_class = ' right-align';
} else {
  $widget_align_class = ' center-align';
}
  if( $footer_widgets ) {
    switch ( $footer_widgets ) {
      case 1:
       $footer_styles_class = ' footer-new-style';
       $widget_align_class = $widget_align_class;
      break;
      case 10:
        $footer_styles_class = ' footer-new-style-two';
        $widget_align_class = '';
      break;  
      default:
        $footer_styles_class = '';
        $widget_align_class = '';
      break;
    }
  }
?>

</div><!-- Main Wrap Inner -->
<?php if ($havnor_header_design_actual === 'style_three') { 
if(!$page_container && !is_404()){ ?>
</div>
<?php } }
if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) {
?>
<!-- Footer -->
<footer class="hanor-footer <?php echo esc_attr($footer_style_class . $footer_widget_class); ?><?php echo esc_attr($footer_styles_class.$widget_align_class); ?>">
<?php
if(isset($footer_widget_block)){
if (!$havnor_hide_footer) { ?>
    <div class= "footer-bg-image" style="background-image: url(<?php echo esc_url($havnor_footer_bg_image);?>);">
      <div class="container" >
        <div class="row">
    		<?php
  	      // Footer Widget Block
  	      get_template_part( 'layouts/footer/footer', 'widgets' );
        ?>
      </div>
    </div>
  </div>  
  <?php } }
  if(!$havnor_hide_copyright) {
    $need_copyright = cs_get_option('need_copyright');
    if($need_copyright) {
      get_template_part( 'layouts/footer/footer', 'copyright' );
    }
  }
  ?>
</footer>
<!-- Footer -->
<?php } else { 
if(!$havnor_hide_copyright) { ?>
<footer class="hanor-footer alt-cpy">
  <div class="container">
		<div class="copyright">
			<p class="copyright-alt">&copy; <?php echo esc_html(date('Y')); ?><a href="<?php echo esc_url(home_url( '/' )); ?>"><?php echo esc_html__(' Victor Themes', 'havnor') ?></a><?php echo esc_html__('. All Rights Reserved.', 'havnor') ?></p>
		</div>
	</div>
</footer>
<?php	} } // Hide Footer Metabox ?>
</div><!-- Main Wrap -->
<?php $theme_preloader = cs_get_option('theme_preloader'); 
$theme_btotop = cs_get_option('theme_btotop'); 
if($theme_btotop) {
?>
<!-- Hanor Back Top -->
<div class="hanor-back-top">
  <a href="javascript:void(0);"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>
<?php }
if ($theme_preloader) { ?>
<!-- Hanor Preloader -->
<div class="hanor-preloader">
  <div class="loader-wrap">
    <div class="loader">
      <div class="loader-inner ball-scale"></div>
    </div>
  </div>
</div>
<?php } wp_footer(); ?>
</body>
</html>
<?php
