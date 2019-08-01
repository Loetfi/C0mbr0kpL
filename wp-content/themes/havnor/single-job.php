<?php
/*
 * The template for displaying all single job.
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
// Padding - Theme Options
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
}
?>
<div class="hanor-content-area job-single-page <?php echo esc_attr($havnor_content_padding); ?>" style="<?php echo esc_attr($havnor_custom_padding); ?>">
	<div class="container ">
		<div class="row">
			<div class="col-md-12">
			<?php
				if (have_posts()) : while (have_posts()) : the_post();
					the_content();
				endwhile;
				endif;
			?>
			</div><!-- Blog Div -->
			<?php
	    	wp_reset_postdata();  // avoid errors further down the page
			?>
		</div><!-- Content Area -->
	</div>
</div>
<?php
get_footer();
