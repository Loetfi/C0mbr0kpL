<?php
// Logo Image
$havnor_brand_logo_default = cs_get_option('brand_logo_default');
$havnor_brand_logo_retina = cs_get_option('brand_logo_retina');
// Transparent Header Logos
$havnor_transparent_logo = cs_get_option('transparent_logo_default');
$havnor_transparent_retina = cs_get_option('transparent_logo_retina');
// Metabox - Header Transparent
$havnor_id    = ( isset( $post ) ) ? $post->ID : 0;
$havnor_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $havnor_id;
$havnor_id    = ( havnor_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $havnor_id;
$havnor_meta  = get_post_meta( $havnor_id, 'page_type_metabox'. true );
// Retina Size
$havnor_retina_width = cs_get_option('retina_width');
$havnor_retina_height = cs_get_option('retina_height');
// Logo Spacings
$havnor_brand_logo_top = cs_get_option('brand_logo_top');
$havnor_brand_logo_bottom = cs_get_option('brand_logo_bottom');
if ($havnor_brand_logo_top !== '') {
	$havnor_brand_logo_top = $havnor_brand_logo_top ? 'padding-top:'. havnor_check_px($havnor_brand_logo_top) .';' : '';
} else { $havnor_brand_logo_top = ''; }
if ($havnor_brand_logo_bottom !== '') {
	$havnor_brand_logo_bottom = $havnor_brand_logo_bottom ? 'padding-bottom:'. havnor_check_px($havnor_brand_logo_bottom) .';' : '';
} else { $havnor_brand_logo_bottom = ''; }

$havnor_brand_logo_top = $havnor_brand_logo_top ? $havnor_brand_logo_top : '';
$havnor_brand_logo_bottom = $havnor_brand_logo_bottom ? $havnor_brand_logo_bottom : '';
$transparent_logo_class = $havnor_transparent_logo ? ' hav-transparent-logo' : ' dhav-transparent-logo';
$trans_retina_logo_class = $havnor_transparent_retina ? ' hav-trans-retina' : ' dhav-trans-retina';
$havnor_logo_default_cls = $havnor_brand_logo_default ? ' hav-default-logo' : ' dhav-default-logo';
$havnor_default_retina_cls = $havnor_brand_logo_retina ? ' hav-d-retina-logo' : ' dhav-d-retina-logo';
?>
<div class="hanor-brand <?php echo esc_attr($transparent_logo_class . $trans_retina_logo_class .$havnor_logo_default_cls .$havnor_default_retina_cls ); ?>" style="<?php echo esc_attr($havnor_brand_logo_top); echo esc_attr($havnor_brand_logo_bottom); ?>">
	<a href="<?php echo esc_url(home_url( '/' )); ?>">
	<?php
	
		if (isset($havnor_transparent_retina)){
			echo '<img src="'. esc_url(wp_get_attachment_url($havnor_transparent_retina)) .'" width="'. esc_attr($havnor_retina_width) .'" height="'. esc_attr($havnor_retina_height) .'" alt="'. esc_attr(get_bloginfo( 'name' )) . '" class="transparent-retina-logo transparent-logo">';
		}
		if (isset($havnor_transparent_logo)) {
			echo '<img src="'. esc_url(wp_get_attachment_url($havnor_transparent_logo)) .'" alt="'. esc_attr(get_bloginfo( 'name' )) . '" class="transparent-default-logo transparent-logo" width="'. esc_attr($havnor_retina_width) .'" height="'. esc_attr($havnor_retina_height) .'">';
		}
		if ($havnor_brand_logo_retina){
			echo '<img src="'. esc_url(wp_get_attachment_url($havnor_brand_logo_retina)) .'" width="'. esc_attr($havnor_retina_width) .'" height="'. esc_attr($havnor_retina_height) .'" alt="'. esc_attr(get_bloginfo( 'name' )) . '" class="retina-logo normal-logo">
				';
		}
		if (isset($havnor_brand_logo_default)) {
			echo '<img src="'. esc_url(wp_get_attachment_url($havnor_brand_logo_default)) .'" alt="'. esc_attr(get_bloginfo( 'name' )) . '" class="default-logo normal-logo" width="'. esc_attr($havnor_retina_width) .'" height="'. esc_attr($havnor_retina_height) .'">';
		} else {
			echo '<div class="text-logo">'. esc_html(get_bloginfo( 'name' )) . '</div>';
		}
	echo '</a>';
	?>
</div>
<?php
