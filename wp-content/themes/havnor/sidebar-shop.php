<?php
/*
 * The sidebar only for WooCommerce pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

$havnor_woo_widget = cs_get_option('woo_widget');
?>
<div class="col-md-3 hanor-sidebar">
	<?php if ($havnor_woo_widget) {
		if (is_active_sidebar($havnor_woo_widget)) {
			dynamic_sidebar($havnor_woo_widget);
		}
	} else {
		if (is_active_sidebar( 'sidebar-shop' )) {
			dynamic_sidebar( 'sidebar-shop' );
		} elseif (is_active_sidebar('sidebar-1')) {
			dynamic_sidebar( 'sidebar-1' );
		} else {}
	} ?>
</div><!-- #secondary -->
<?php
