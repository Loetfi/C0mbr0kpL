<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
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

// Header Style
$havnor_header_design_actual  = cs_get_option('select_header_design');
get_header(); 
if ($havnor_header_design_actual === 'style_three') { ?> 
<div class="hanor-full-wrap <?php echo esc_attr($havnor_content_padding .' '. $havnor_sidebar_class); ?>" style="<?php echo esc_attr($havnor_custom_padding); ?>">
  <div class="hanor-toggle hanor-sidebar-toggle">
    <a href="javascript:void(0);" class="hanor-toggle-link"><span class="toggle-separator"></span></a>
  </div>
	<?php
		while ( have_posts() ) : the_post();
			the_content();
			echo havnor_wp_link_pages();
			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;
	endwhile; // End of the loop.
	?>
</div>
<?php } else { ?>
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
				while ( have_posts() ) : the_post();
					the_content();
					echo havnor_wp_link_pages();
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;
				endwhile;
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
<?php
}
get_footer();
