<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$havnor_blog_widget = cs_get_option('blog_widget');
$havnor_single_blog_widget = cs_get_option('single_blog_widget');
$havnor_team_widget = cs_get_option('team_widget');

if (is_page()) {
	// Page Layout Options
	$havnor_page_layout = get_post_meta( get_the_ID(), 'page_type_metabox', true );	
}

$sidebar_type = cs_get_option('sidebar_type');
if ($sidebar_type === 'bar-sticky') {
	$sidebar_class = ' hanor-sticky-sidebar';
} elseif ($sidebar_type === 'bar-float') {
	$sidebar_class = ' hanor-floating-sidebar';
} else {
	$sidebar_class = '';
}

if (is_single()) {
	$single_sidebar_type = cs_get_option('single_sidebar_type');
	if ($single_sidebar_type === 'bar-sticky') {
		$sidebar_class = ' hanor-sticky-sidebar';
	} elseif ($single_sidebar_type === 'bar-float') {
		$sidebar_class = ' hanor-floating-sidebar';
	} else {
		$sidebar_class = '';
	}
}
?>
<div class="hanor-secondary <?php echo esc_attr($sidebar_class); ?>">
	<?php if (is_page() && $havnor_page_layout['page_sidebar_widget']) {
		if (is_active_sidebar($havnor_page_layout['page_sidebar_widget'])) {
			dynamic_sidebar($havnor_page_layout['page_sidebar_widget']);
		}
	} elseif (!is_page() && $havnor_blog_widget && !is_single()) {
		if (is_active_sidebar($havnor_blog_widget)) {
			dynamic_sidebar($havnor_blog_widget);
		}
	} elseif ($havnor_team_widget && is_singular('team')) {
		if (is_active_sidebar($havnor_team_widget)) {
			dynamic_sidebar($havnor_team_widget);
		}
	} elseif (is_single() && $havnor_single_blog_widget) {
		if (is_active_sidebar($havnor_single_blog_widget)) {
			dynamic_sidebar($havnor_single_blog_widget);
		}
	} else {
		if (is_active_sidebar('sidebar-1')) {
			dynamic_sidebar( 'sidebar-1' );
		}
	} ?>
</div><!-- #secondary -->
<?php
