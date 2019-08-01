<?php
/*
 * The template for portfolio category pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

if (havnor_is_post_type('portfolio')) {

	$havnor_portfolio_style = cs_get_option('portfolio_style');
	$havnor_portfolio_column = cs_get_option('portfolio_column');
	$portfolio_limit = cs_get_option('portfolio_limit');
	$havnor_portfolio_show_category = cs_get_option('portfolio_show_category');
	$havnor_portfolio_orderby = cs_get_option('portfolio_orderby');
	$havnor_portfolio_order = cs_get_option('portfolio_order');
	$havnor_portfolio_filter = cs_get_option('portfolio_filter');
	$havnor_portfolio_pagination = cs_get_option('portfolio_pagination');

	$havnor_portfolio_style = $havnor_portfolio_style ? $havnor_portfolio_style : 'one';
	$havnor_portfolio_column = $havnor_portfolio_column ? $havnor_portfolio_column : '3';
	$portfolio_limit = $portfolio_limit ? $portfolio_limit : '6';

	if ($havnor_portfolio_style === 'two' || $havnor_portfolio_style === 'three') {
		$style_class = 'hanor-portfolio portfolio-style-two direction-hover';
	} else {
		$style_class = 'hanor-portfolio-default';
	}
	// Pagination
  global $paged;
  if( get_query_var( 'paged' ) )
    $my_page = get_query_var( 'paged' );
  else {
    if( get_query_var( 'page' ) )
      $my_page = get_query_var( 'page' );
    else
      $my_page = 1;
    set_query_var( 'paged', $my_page );
    $paged = $my_page;
  }
  $category = get_queried_object();

  $args = array(
    // other query params here,
    'paged' => $my_page,
    'post_type' => 'portfolio',
    'posts_per_page' => (int)$portfolio_limit,
    'portfolio_category' => $category->name,
    'orderby' => $havnor_portfolio_orderby,
    'order' => $havnor_portfolio_order
  );

  $havnor_port = new WP_Query( $args ); ?>

  <section class="hanor-mid-wrap mid-spacer-one">
	  <div class="container">
	    <div class="<?php echo esc_attr($style_class); ?>">
		  	<?php 
		    if ($havnor_portfolio_column === '2') {
					$port_space = ' data-space="20"';
				} else {
					$port_space = '';
				} ?>
		    <!-- Start -->
		    <div class="hanor-masonry" data-items="<?php echo esc_attr($havnor_portfolio_column); ?>"<?php echo esc_html($port_space); ?>>
		    	<?php
		      if ($havnor_port->have_posts()) : while ($havnor_port->have_posts()) : $havnor_port->the_post();
		        get_template_part( 'layouts/post/content', 'portfolio' );
		        endwhile;
		      else :
		        get_template_part( 'layouts/post/content', 'none' );
		      endif; ?>     
		    </div>
				<!-- End -->
				<?php if($havnor_port->max_num_pages > 1) { ?>
	      <div class="pagination-spacer-two">
		    	<?php 
		    	if ($havnor_portfolio_pagination) { 
		    		havnor_paging_nav($havnor_port->max_num_pages,"",$paged); 
		    	} 
		    	?>
		  	</div>
		  	<?php } wp_reset_postdata(); ?>
	  	</div>
	  </div>
  </section>
<?php }
get_footer();
