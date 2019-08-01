<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

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

// Page Layout Options
$havnor_woo_columns = cs_get_option('woo_product_columns');
$havnor_woo_sidebar = cs_get_option('woo_sidebar_position');
$havnor_woo_columns = $havnor_woo_columns ? $havnor_woo_columns : '3';

$havnor_woo_widget = cs_get_option('woo_widget');
if ($havnor_woo_widget) {
	$widget_select = $havnor_woo_widget;
} else {
	if (is_active_sidebar( 'sidebar-shop' )) {
		$widget_select = 'sidebar-shop';
	} elseif (is_active_sidebar('sidebar-1')) {
		$widget_select = 'sidebar-1';
	} else {
		$widget_select = '';
	}
}

if ($widget_select && is_active_sidebar( $widget_select )) {
	if ($havnor_woo_sidebar === 'left-sidebar') {
		$havnor_column_class = 'col-md-9';
		$havnor_sidebar_class = 'hanor-left-sidebar';
	} elseif ($havnor_woo_sidebar === 'sidebar-hide') {
		$havnor_column_class = 'col-md-12';
		$havnor_sidebar_class = 'hanor-hide-sidebar';
	} else {
		$havnor_column_class = 'col-md-9';
		$havnor_sidebar_class = 'hanor-right-sidebar';
	}
} else {
	$havnor_woo_sidebar = 'sidebar-hide';
	$havnor_column_class = 'col-md-12';
	$havnor_sidebar_class = 'hanor-hide-sidebar';
}

get_header(); ?>
<div class="woo-commerce-page-bg">
	<div class= "havnor-shop-order">
		<div class="container">
			<?php do_action('havnor_woocommerce_before_shop_loop'); ?>
		</div>
	</div>	
	<div class="container hanor-content-area woo-col-<?php echo esc_attr($havnor_woo_columns .' '. $havnor_content_padding .' '. $havnor_sidebar_class); ?>" style="<?php echo esc_attr($havnor_custom_padding); ?>">
		<div class="row">
			<?php
			// Left Sidebar
			if($havnor_woo_sidebar === 'left-sidebar') {
	   		get_sidebar('shop');
			}
			?>
			<div class="hanor-content-side <?php echo esc_attr($havnor_column_class); ?>">
				<?php
					if ( have_posts() ) :
						woocommerce_content();
					endif; // End of the loop.
				?>
			</div><!-- Content Area -->
			<?php
			// Right Sidebar
			if($havnor_woo_sidebar !== 'left-sidebar' && $havnor_woo_sidebar !== 'sidebar-hide') {
				get_sidebar('shop');
			}
			?>
		</div>
	</div>
</div>
<?php
get_footer();
