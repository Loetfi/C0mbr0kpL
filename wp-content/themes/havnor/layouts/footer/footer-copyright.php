<?php
	// Main Text
	$havnor_id    = ( isset( $post ) ) ? $post->ID : 0;
	$havnor_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $havnor_id;
	$havnor_id    = ( havnor_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $havnor_id;
	$havnor_meta  = get_post_meta( $havnor_id, 'page_type_metabox', true );
 	$footer_style = cs_get_option('footer_styles');
	if ($footer_style === 'light_version') {
		$copyright_style_class = 'footer-cpy-light-version';
	} else {
		$copyright_style_class = 'footer-cpy-dark-version';
	}
	
	$havnor_footer_copyright_layout = cs_get_option('footer_copyright_layout');
	if ($havnor_footer_copyright_layout === 'copyright-1') {
		$havnor_copyright_layout_class = 'col-md-6 pull-left';
		$havnor_copyright_seclayout_class = 'col-md-6 pull-right';
	} elseif ($havnor_footer_copyright_layout === 'copyright-2') {
		$havnor_copyright_layout_class = 'col-md-6 pull-right text-right';
		$havnor_copyright_seclayout_class = 'col-md-6 pull-left';
	} elseif ($havnor_footer_copyright_layout === 'copyright-3') {
		$havnor_copyright_layout_class = 'col-md-12 text-center';
	} else {
		$havnor_copyright_layout_class = '';
		$havnor_copyright_seclayout_class = '';
	}

?>
<!-- Copyright Bar -->
<div class="hanor-copyright <?php echo esc_attr($copyright_style_class); ?>">
  <div class="container">
    <div class="<?php echo esc_attr($havnor_copyright_layout_class); ?>">
      <div class="copyright-wrap">

      	<?php if ($footer_style === 'light_version') {
      		$light_havnor_copyright_text = cs_get_option('copyright_text');
					if ($light_havnor_copyright_text){
						echo do_shortcode($light_havnor_copyright_text);
					} else { ?>
						&copy; <?php echo esc_html(date('Y')); ?><a href="<?php echo esc_url(home_url( '/' )); ?>"><?php echo esc_html__(' VictorThemes', 'havnor') ?></a>
					<?php }

      	} else {
					$havnor_copyright_text = cs_get_option('copyright_text');
					if($havnor_copyright_text){
						echo do_shortcode($havnor_copyright_text);
					} else { ?>
						&copy; <?php echo esc_html(date('Y')); ?><a href="<?php echo esc_url(home_url( '/' )); ?>"><?php echo esc_html__(' VictorThemes', 'havnor') ?></a>
					<?php }
				} ?>
      </div>
    </div>
    <?php if ($havnor_footer_copyright_layout != 'copyright-3') { ?>
    <div class="<?php echo esc_attr($havnor_copyright_seclayout_class); ?>">

      <?php if($footer_style === 'light_version') { 
      	$light_havnor_secondary_text = cs_get_option('secondary_text');
				echo do_shortcode($light_havnor_secondary_text);
      } else {
				$havnor_secondary_text = cs_get_option('secondary_text');
				echo do_shortcode($havnor_secondary_text);
			 } ?>

    </div>
    <?php } ?>
  </div>
</div>
<!-- Copyright Bar -->
<?php
