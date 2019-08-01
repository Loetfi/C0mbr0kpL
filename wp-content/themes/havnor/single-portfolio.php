<?php
/*
 * The template for displaying all single portfolios.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

// Metabox
$havnor_id    = ( isset( $post ) ) ? $post->ID : 0;
$havnor_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $havnor_id;
$havnor_id    = ( havnor_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $havnor_id;
$havnor_meta  = get_post_meta( $havnor_id, 'page_type_metabox', true );
$portfolio_meta  = get_post_meta( $havnor_id, 'portfolio_single_metabox', true );
$havnor_meta_port  = get_post_meta( $havnor_id, 'portfolio_client', true );
$havnor_meta_port_type  = get_post_meta( $havnor_id, 'portfolio_type', true );
if ($portfolio_meta) {
  $single_gallery_image = $portfolio_meta['port_gallery_images'];
} else {
  $single_gallery_image = '';
}
if ($havnor_meta_port) {
	$havnor_client = $havnor_meta_port['client_name'];
	$havnor_client_link = $havnor_meta_port['client_link'];
} else {
	$havnor_client = '';
	$havnor_client_link = '';
}
if ($havnor_meta_port_type) {
	$havnor_port_type = $havnor_meta_port_type['port_type'];
} else {
	$havnor_port_type = '';
}
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
// Translation
$portfolio_home_link = cs_get_option('portfolio_home_link');
$havnor_single_pagination = cs_get_option('portfolio_single_pagination');
$havnor_prev_port = cs_get_option('prev_port');
$havnor_next_port = cs_get_option('next_port');
$havnor_prev_port = ($havnor_prev_port) ? $havnor_prev_port : esc_html__('Previous', 'havnor');
$havnor_next_port = ($havnor_next_port) ? $havnor_next_port : esc_html__('Next', 'havnor');

$date_format = cs_get_option('portfolio_date_format');
$date_format_actual = $date_format ? $date_format : '';
$havnor_portfolio_need_related = cs_get_option('portfolio_need_related');
$havnor_portfolio_related_title = cs_get_option('portfolio_related_title');
$havnor_portfolio_related_content = cs_get_option('portfolio_related_content');
$havnor_portfolio_related_title = ($havnor_portfolio_related_title) ? $havnor_portfolio_related_title : esc_html__('Related Projects', 'havnor');
$havnor_port_sidebar_type = cs_get_option('port_sidebar_type');
$portfolio_related_loop = cs_get_option('portfolio_related_loop');
$portfolio_related_items = cs_get_option('portfolio_related_items');
$portfolio_related_nav = cs_get_option('portfolio_related_nav');
$portfolio_related_dot = cs_get_option('portfolio_related_dot');
$portfolio_related_drag = cs_get_option('portfolio_related_drag');

// Carousel Data's
$carousel_loop = $portfolio_related_loop ? 'true' : 'false';
$carousel_items = $portfolio_related_items ? esc_attr($portfolio_related_items) : '3';
$carousel_dots = $portfolio_related_dot ? esc_attr($portfolio_related_dot) : 'false';
$carousel_nav = $portfolio_related_nav ? esc_attr($portfolio_related_nav) : 'false';
$carousel_mousedrag = $portfolio_related_drag ? 'true' : 'false';

if ($havnor_port_sidebar_type === 'bar-sticky') {
	$sidebar_class = ' hanor-sticky-sidebar';
} elseif ($havnor_port_sidebar_type === 'bar-float') {
	$sidebar_class = ' hanor-floating-sidebar';
} else {
	$sidebar_class = '';
}
?>
<section class="hanor-mid-wrap <?php echo esc_attr($havnor_content_padding); ?>" style="<?php echo esc_attr($havnor_custom_padding); ?>">
  <div class="container">
    <div class="work-detail">
      <div class="row">
      	<div class="hanor-primary">
          <div class="hanor-masonry hanor-popup" data-items="1">
					<?php
					$ids = explode( ',', $single_gallery_image );
	        foreach ($ids as $id) {
	          $attachment = wp_get_attachment_image_src( $id, 'fullsize' );
					  $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
					  $g_img = $attachment[0];
				    $post_img = $g_img;
	          if (!empty( $post_img )) {
	            $image = $post_img;
	          } else {
	            $image = HAVNOR_IMAGES.'/port-placeholder.png';
	          }
	          ?>
            <div class="masonry-item">
              <div class="hanor-image">
                <a href="<?php echo esc_url( $image ); ?>">
                  <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($alt); ?>">
                </a>
              </div>
            </div>
					<?php } ?>
          </div>
        </div>
        <div class="hanor-secondary<?php echo esc_attr($sidebar_class); ?>">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="work-detail-wrap">
						<?php
						if (have_posts()) : while (have_posts()) : the_post();
							the_content();
						endwhile;
						endif;
						?>
            <div class="portfolio-detail-items-wrap">
            	<?php if ($havnor_port_type) { ?>
              <div class="portfolio-detail-item">
                <div class="portfolio-detail-item-title"><?php echo esc_html__( 'Type', 'havnor' ); ?></div>
                <div class="portfolio-detail-item-info">
                	<?php echo esc_html($havnor_port_type); ?>
                </div>
              </div>
              <?php } if ($havnor_client) { ?>
              <div class="portfolio-detail-item">
                <div class="portfolio-detail-item-title"><?php echo esc_html__( 'Client', 'havnor' ); ?></div>
                <div class="portfolio-detail-item-info">
									<?php if ($havnor_client_link) {
					        	echo '<a href="'.esc_url($havnor_client_link).'">'.esc_html($havnor_client).'</a>';
					        } else {
					        	echo esc_html($havnor_client);
					        } ?>
                </div>
              </div>
              <?php } ?>
              <div class="portfolio-detail-item">
                <div class="portfolio-detail-item-title"><?php echo esc_html__( 'Date', 'havnor' ); ?></div>
                <div class="portfolio-detail-item-info"><?php echo esc_html(get_the_date($date_format_actual)); ?></div>
              </div>
              <?php if ( function_exists( 'havnor_folio_share_option' ) ) { ?>
              <div class="portfolio-detail-item">
                <div class="portfolio-detail-item-title"><?php echo esc_html__( 'Share', 'havnor' ); ?></div>
                <div class="portfolio-detail-item-info">
									<?php	echo havnor_folio_share_option(); ?>
                </div>
              </div>
							<?php } ?>
            </div>
          </div>
				</div><!-- Post ID -->
        </div>
			</div>
			<?php
			if ($havnor_portfolio_need_related) {
			//get the taxonomy terms of custom post type
			$customTaxonomyTerms = wp_get_object_terms( $post->ID, 'portfolio_category', array('fields' => 'ids') );
			//query arguments
			$args = array(
			  'post_type' => 'portfolio',
			  'post_status' => 'publish',
			  'posts_per_page' => 5,
			  'orderby' => 'rand',
			  'tax_query' => array(
			    array(
			      'taxonomy' => 'portfolio_category',
			      'field' => 'id',
			      'terms' => $customTaxonomyTerms
			    )
			  ),
			  'post__not_in' => array ($post->ID),
			);
			//the query
			$relatedPosts = new WP_Query( $args );
			if ( is_rtl() ) {
	      $switch_rtl = 'data-rtl="true"';
	    } else {
	      $switch_rtl = 'data-rtl="false"';
	    }
			//loop through query
			if($relatedPosts->have_posts()){ ?>
				<div class="related-projects">
			    <div class="hanor-section-title">
			      <h2 class="section-title"><?php echo esc_html($havnor_portfolio_related_title); ?></h2>
			      <p><?php echo esc_html($havnor_portfolio_related_content); ?></p>
			    </div>
			    <div class="owl-carousel" data-margin="30" data-autoplay="true" data-auto-height="true" data-loop="<?php echo esc_attr($carousel_loop); ?>" data-items="<?php echo esc_attr($carousel_items); ?>" data-dots="<?php echo esc_attr($carousel_dots); ?>" data-nav="<?php echo esc_attr($carousel_nav); ?>" data-mouse-drag="<?php echo esc_attr($carousel_mousedrag); ?>" <?php echo esc_attr($switch_rtl); ?> > 
					<?php while ($relatedPosts->have_posts()) {
						$relatedPosts->the_post();
						$related_large_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
			      $related_large_image = $related_large_image[0];
						if(class_exists('Aq_Resize')) {
			      	$port_img = aq_resize( $related_large_image, '370', '370', true );
						} else {$port_img = $related_large_image;}
						$featured_img = ( $port_img ) ? $port_img : $related_large_image;
			      ?>
					  <div class="item">
					    <div class="work-item hanor-item">
					      <div class="hanor-image"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div>
					      <div class="work-info">
					        <h4 class="work-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
					        <?php
							    $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
							    if ($category_list) { ?>
					        <h5 class="work-category">
					          <span class="category-link">
					          <?php
						          $i=1;
						          foreach ($category_list as $term) {
						            $term_link = get_term_link( $term );
						            echo '<a href="'. esc_url($term_link) .'">'. esc_html($term->name) .'</a> ';
						            if($i++==2) break;
						          }
						        ?>
					          </span>
					        </h5>
					        <?php } ?>
					      </div>
					    </div>
					  </div>
					<?php } ?>
				</div>
			</div>
			<?php }else{ }
			//restore original post data
			wp_reset_postdata(); ?>
			<?php } if ($havnor_single_pagination) { ?>
			<div class="portfolio-controls">
        <div class="row">
          <div class="col-sm-3 col-xs-4">
          	<?php
						$havnor_prev_post = get_previous_post();
						$havnor_next_post = get_next_post();
						if ($havnor_prev_post) { ?>
            <a href="<?php echo esc_url(get_permalink($havnor_prev_post->ID)); ?>" class="portfolio-control-link">
              <i class="fa fa-angle-double-left" aria-hidden="true"></i>
              <span class="control-link-title"><?php echo esc_html($havnor_prev_port); ?></span>
            </a>
            <?php } ?>
          </div>
          <div class="col-sm-6 col-xs-4 text-center">
          	<?php if ($portfolio_home_link) { ?>
            <a href="<?php echo esc_url($portfolio_home_link); ?>" class="grid-view-link">
              <span class="grid-view-square"></span>
              <span class="grid-view-square"></span>
            </a>
            <?php } ?>
          </div>
          <div class="col-sm-3 col-xs-4 text-right">
          	<?php if ($havnor_next_post) { ?>
            <a href="<?php echo esc_url(get_permalink($havnor_next_post->ID)); ?>" class="portfolio-control-link">
              <span class="control-link-title"><?php echo esc_html($havnor_next_port); ?></span>
              <i class="fa fa-angle-double-right" aria-hidden="true"></i>
            </a>
            <?php } ?>
          </div>
        </div>
      </div>
			<?php } ?>
		</div>
	</div>
</section>
<?php
get_footer();
