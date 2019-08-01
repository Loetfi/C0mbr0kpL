<?php
/*
 * The template for displaying all single posts.
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
$havnor_sidebar_position = cs_get_option('single_sidebar_position');
$havnor_single_blog_widget = cs_get_option('single_blog_widget');
if ($havnor_single_blog_widget) {
	$widget_select = $havnor_single_blog_widget;
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
<div class="hanor-mid-wrap <?php echo esc_attr($havnor_content_padding .' '. $havnor_sidebar_class); ?>" style="<?php echo esc_attr($havnor_custom_padding); ?>">
	<div class="container">
    <div class="row">
    <?php
	    if ($havnor_sidebar_position === 'sidebar-left' && $havnor_sidebar_position !== 'sidebar-hide') {
				get_sidebar(); // Sidebar
			}	?>
      <div class="<?php echo esc_attr($layout_class); ?>">
        <div class="hanor-unit-fix">
          <div class="hanor-blog-detail">
						<?php				
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) : the_post();
								get_template_part( 'layouts/post/content', 'single' );
								if ( comments_open() || get_comments_number() ) :
				          comments_template();
				        endif;
							endwhile;
						else :
							get_template_part( 'layouts/post/content', 'none' );
						endif; ?>
					</div><!-- blog-detail -->
					<?php
				    havnor_paging_nav();
				    wp_reset_postdata();  // avoid errors further down the page
					?>
				</div><!-- unit-fix -->
			</div><!-- layout -->
			<?php
				if ($havnor_sidebar_position !== 'sidebar-hide') {
					get_sidebar(); // Sidebar
				}
			?>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- mid -->
<?php
get_footer();
