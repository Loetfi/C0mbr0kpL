<?php
/*
 * The main template file.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

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

// Theme Options
$havnor_sidebar_position = cs_get_option('blog_sidebar_position');
$havnor_blog_style = cs_get_option('blog_listing_style');
$havnor_pagi_style = cs_get_option('blog_pagination_style');
$havnor_load_more = cs_get_option('blog_load_more_btn_txt');
$havnor_blog_widget = cs_get_option('blog_widget');
$load_more_btn_txt = $havnor_load_more ? $havnor_load_more : esc_html__( 'Load More', 'havnor' );
// Style
if ($havnor_blog_style === 'style-two') {
	$havnor_blog_style = ' blogs-style-two';
	$o_con = 'style-container';
} elseif ($havnor_blog_style === 'style-three') {
	$havnor_blog_style = ' blogs-style-three';
	$o_con = 'style-container';
} elseif ($havnor_blog_style === 'style-four') {
	$havnor_blog_style = ' blogs-style-four';
	$o_con = 'style-container';
} elseif ($havnor_blog_style === 'style-five') {
  $havnor_blog_style = ' blogs-style-five';
  $o_con = 'style-container';
} else {
	$havnor_blog_style = ' hanor-stories';
	$o_con = 'hanor-container';
}

if ($havnor_blog_widget) {
	$widget_select = $havnor_blog_widget;
} else {
	if (is_active_sidebar('sidebar-1')) {
		$widget_select = 'sidebar-1';
	} else {
		$widget_select = '';
	}
}

// Sidebar Position
if ($widget_select && is_active_sidebar( $widget_select )) {
	if ($havnor_sidebar_position === 'sidebar-hide') {
		$layout_class = 'col-md-12';
		$havnor_sidebar_class = 'hide-sidebar';
	} elseif ($havnor_sidebar_position === 'sidebar-left') {
		$layout_class = 'hanor-primary';
		$havnor_sidebar_class = 'left-sidebar';
	} else {
		$layout_class = 'hanor-primary';
		$havnor_sidebar_class = 'right-sidebar';
	}
} else {
	$havnor_sidebar_position = 'sidebar-hide';
	$layout_class = 'col-md-12';
	$havnor_sidebar_class = 'hide-sidebar';
}
?>
<div class="hanor-mid-wrap hanor-gray-mid <?php echo esc_attr($havnor_content_padding .' '. $havnor_sidebar_class); ?>" style="<?php echo esc_attr($havnor_custom_padding); ?>">
	<div class="container">
		<div class="row">
			<?php
			if ($havnor_sidebar_position === 'sidebar-left' && $havnor_sidebar_position !== 'sidebar-hide') {	get_sidebar(); } ?>
			<div class="<?php echo esc_attr($layout_class); ?>">
				<div class="<?php echo esc_attr($havnor_blog_style); ?>">
        	<div class="<?php echo esc_attr($o_con); ?>">
	        	<div class="post-wraper hanor-post-load-more" data-select=".post-wraper" data-item=".posts-item" data-paging="<?php echo esc_attr($havnor_pagi_style); ?>" data-loading="<?php echo esc_attr($load_more_btn_txt); ?>">
							<div class="row">
								<?php
								if ( have_posts() ) :
									/* Start the Loop */
									while ( have_posts() ) : the_post();
										get_template_part( 'layouts/post/content' );
									endwhile;
								else :
									get_template_part( 'layouts/post/content', 'none' );
								endif; ?>
							</div><!-- row -->
							<?php
								havnor_default_paging_nav();
						    wp_reset_postdata();  // avoid errors further down the page
							?>
						</div>
					</div>
				</div><!-- Blog Div -->
				
			</div><!-- Content Area -->
			<?php if ($havnor_sidebar_position !== 'sidebar-hide') {	get_sidebar(); } ?>
		</div>
	</div>
</div>
<?php
get_footer();
