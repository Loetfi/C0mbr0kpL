<?php
/*
 * The template for displaying archive pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
$date_format = cs_get_option('job_date_format');
$search_style_type = cs_get_option('search_type');
$date_format_actual = $date_format ? $date_format : '';
if($search_style_type === 'post_type_search'){
  $get_post_type = $_GET['post_type'];
} else {
  $get_post_type = '';
}
if ( 'job' === $get_post_type ) {
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
	$search_query['paged'] = $my_page;
	$search_query['post_type'] = array('job');
	$search_query['job_role'] = $_GET['s'];
	$search_query['job_designation'] = $_GET['job_designation'];
	$search_query['post_status'] = array('publish','inherit');
	$attach_search = new WP_Query( $search_query );
	if ($attach_search->have_posts()) :
	?>
	<div class="hanor-job job-search hanor-mid-wrap">
	  <div class="container">
	    <?php while ($attach_search->have_posts()) : $attach_search->the_post();

	    	// Featured Image
				$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
				$large_image = $large_image[0];
				$abt_title = get_the_title();

		    // Link
        $view_job = cs_get_option('view_job');
		    $job_options = get_post_meta( get_the_ID(), 'job_options', true );
		    $job_location = $job_options['job_location'];
		    $job_location_link = $job_options['job_location_link'];
		    $job_duration = $job_options['job_duration'];
    		$view_job = $view_job ? $view_job : esc_html__('View Job','havnor');
		    ?>
	      <div class="job-item hanor-item">
		    	<div class="row">
		    		<div class="col-md-2">
		    			<div class="hanor-image">
				        <?php if ($large_image) { ?>
				        <img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($abt_title); ?>">
				        <?php } ?>
			        </div>
		    		</div>
		    		<div class="col-md-7">
		    			<div class="job-info">
			          <h4 class="job-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html($abt_title); ?></a></h4>
			          <div class="job-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo esc_html__( 'Posted on : ', 'havnor' ); ?><?php echo get_the_date($date_format_actual); ?></div>
			          <p><?php
								$job_excerpt = cs_get_option('theme_job_excerpt');
								if ($job_excerpt) {
									$job_excerpt = $job_excerpt;
								} else {
									$job_excerpt = '30';
								}
								havnor_excerpt($job_excerpt);
								echo havnor_wp_link_pages();
								?></p>
			        </div>
		    		</div>
		    		<div class="col-md-3">
		    			<div class="job-detail-info">
		    				<div class="hanor-btns-group">
				          <?php if($job_duration){ ?>
		                <span class="job-btn blue" ><span><?php echo esc_html($job_duration); ?></span></span>
		              <?php } ?>
				          <a href="<?php echo esc_url( get_permalink() ); ?>" class="job-btn" ><span><?php echo esc_html($view_job); ?></span></a>
		          	</div>
			          <?php if ($job_location) { ?>
			            <span class="job-location"><i class="fa fa-map-marker" aria-hidden="true"></i> <a href="<?php echo esc_url($job_location_link); ?>"><?php echo esc_html($job_location); ?></a></span>
			          <?php } ?>
			        </div>
		    		</div>
		      </div>
		    </div>
	      <?php endwhile; ?>
		</div>
	</div>
	<?php
	else : ?>
		<div class="job-search-results hanor-mid-wrap">
	    <div class="container">
				<?php get_template_part( 'layouts/post/content', 'none' ); ?>
			</div>
		</div>
	<?php endif;
} else {
  $search_style_type = cs_get_option('search_type');
  if($search_style_type === 'post_type_search'){
?>
<div class="hanor-search-result-page">
<?php
// Metabox
$havnor_id    = ( isset( $post ) ) ? $post->ID : 0;
$havnor_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $havnor_id;
$havnor_id    = ( havnor_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $havnor_id;
$havnor_meta  = get_post_meta( $havnor_id, 'page_type_metabox', true );

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

$search_query['s'] =  $_GET['s'];
$search_query['paged'] = $my_page;
$search_query['post_type'] = array('post');
$search_query['post_status'] = array('publish','inherit');
$havnor_post = new WP_Query( $search_query );

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
$havnor_blog_widget = cs_get_option('blog_widget');
$havnor_blog_style = cs_get_option('blog_listing_style');
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

<div class="hanor-mid-wrap post-search-result <?php echo esc_attr($havnor_content_padding .' '. $havnor_sidebar_class); ?>" style="<?php echo esc_attr($havnor_custom_padding); ?>">
	<div class="container">
	<?php $obj = get_post_type_object( 'post' ); ?>
  <h2 class="hanor-search-post-title"><?php echo esc_html($obj->labels->name); ?></h2>
		<div class="row">
			<?php
			if ($havnor_sidebar_position === 'sidebar-left' && $havnor_sidebar_position !== 'sidebar-hide') {	get_sidebar(); } ?>
			<div class="<?php echo esc_attr($layout_class); ?>">
				<div class="<?php echo esc_attr($havnor_blog_style); ?>">
        	<div class="<?php echo esc_attr($o_con); ?>">
						<?php
						if ( $havnor_post->have_posts() ) :
							/* Start the Loop */
							while ( $havnor_post->have_posts() ) : $havnor_post->the_post();
								get_template_part( 'layouts/post/content' );
							endwhile;
              havnor_paging_nav($havnor_post->max_num_pages,"",$paged);
              wp_reset_postdata();  // avoid errors further down the page
						else :
							get_template_part( 'layouts/post/content', 'none' );
						endif; ?>
					</div>
				</div><!-- Blog Div -->
				<?php
				
				?>
			</div><!-- Content Area -->
			<?php if ($havnor_sidebar_position !== 'sidebar-hide') {	get_sidebar(); } ?>
		</div>
	</div>
</div>

<?php
		$testimonial_style = cs_get_option('testimonial_style');
		$with_image = cs_get_option('with_image');
		$image_align_style = cs_get_option('image_align_style');
		$testimonial_limit = cs_get_option('testimonial_limit');
		$testimonial_orderby = cs_get_option('testimonial_orderby');
		$testimonial_order = cs_get_option('testimonial_order');
		$testi_title = cs_get_option('testi_title');

		// Testimonial Style
    if ($testimonial_style === 'testimonial_two') {
      $testimonial_style_class = ' testimonials-style-two';
    } elseif ($testimonial_style === 'testimonial_three') {
      $testimonial_style_class = ' testimonials-style-two testimonials-style-four';
    } elseif ($testimonial_style === 'testimonial_four') {
      $testimonial_style_class = ' testimonials-style-five';
    } elseif ($testimonial_style === 'testimonial_five') {
      $testimonial_style_class = ' testimonials-thumb-style';
    } else {
      $testimonial_style_class = '';
    }

    if ($image_align_style === 'image-top') {
      $image_align_class = ' team-top-align';
    } elseif ($image_align_style === 'image-hide') {
      $image_align_class = ' team-hide-align';
    } else {
       $image_align_class= '';
    }

    // Query Starts Here
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

    $search_query['s'] =  $_GET['s'];
    $search_query['paged'] = $my_page;
    $search_query['post_type'] = array('testimonial');
    $search_query['post_status'] = array('publish','inherit');
    $havnor_testi = new WP_Query( $search_query );

    if ($havnor_testi->have_posts()) :
    ?>
  <div class="testi-global-wrap">
  <div class="container">
  <?php $obj = get_post_type_object( 'testimonial' ); ?>
  <h2 class="hanor-search-post-title"><?php echo esc_html($obj->labels->name); ?></h2>
  <div class="hanor-testimonials<?php echo esc_attr($testimonial_style_class . $image_align_class); ?>">
             <?php  if ($testimonial_style === 'testimonial_four') { ?>
                <h2><?php echo esc_html($testi_title); ?></h2>
             <?php } ?>
     <?php if ($testimonial_style === 'testimonial_five') { ?>
           <div class="flexslider thumb-flexslider">
        <ul class="slides">
        <?php while ($havnor_testi->have_posts()) : $havnor_testi->the_post();
        // Featured Image
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $havnor_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
        $large_image = $large_image[0];
        if(class_exists('Aq_Resize')) {
          $team_img = aq_resize( $large_image, '56', '56', true );
          $team_featured_img = ( $team_img ) ? $team_img : HAVNOR_PLUGIN_ASTS . '/56x56.png';
        } ?>
          <li><div class="hanor-image"><img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_attr($havnor_alt); ?>"></div></li>
        <?php endwhile; ?>
        </ul>
      </div>
      <div class="flexslider main-flexslider" data-nav="true">
        <ul class="slides">
   <?php } else { ?>
    <div class="owl-carousel" data-items="1" data-margin="0" data-loop="true" data-nav="true" data-dots="false" data-autoplay="true" data-auto-height="true">
    <?php }
    while ($havnor_testi->have_posts()) : $havnor_testi->the_post();

    // Get Meta Box Options - havnor_framework_active()
    $testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
    $testi_stars = $testimonial_options['testi_rating'];
    $testi_job = $testimonial_options['testi_position'];
    $testi_since = $testimonial_options['testi_since'];

    // Comma Class
    if($testi_since) {
      $comma_class ='comma-class';
    } else {
       $comma_class ='';
    }

    // Featured Image
    $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
    $havnor_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
    $large_image = $large_image[0];
    if ($testimonial_style === 'testimonial_two') {
      if(class_exists('Aq_Resize')) {
        $testi_img = aq_resize( $large_image, '390', '470', true );
      } else {$testi_img = $large_image;}
    } else {
      if(class_exists('Aq_Resize')) {
        $testi_img = aq_resize( $large_image, '226', '226', true );
      } else {$testi_img = $large_image;}
    }
    $actual_image = $large_image ? '<div class="hanor-image"><img src="'. esc_url($testi_img) .'" alt="'.esc_attr($havnor_alt).'"></div>' : '';

    if ($testimonial_style === 'testimonial_two') { // Style Two
    ?>
    <div class="item">
      <div class="testimonial-author-image hanor-item">
        <div class="hanor-table-wrap">
          <div class="hanor-align-wrap bottom">
            <?php if($large_image) {
              echo '<div class="hanor-image"><img src="'. esc_url($testi_img) .'" alt="'.esc_attr($havnor_alt).'"></div>';
            } ?>
          </div>
        </div>
      </div>
      <div class="testimonial-author-quote hanor-item">
        <div class="hanor-table-wrap">
          <div class="hanor-align-wrap">
            <div class="testi-content">
              <div class="hanor-section-title">
                <h2 class="section-title"><?php echo esc_html($testi_title); ?></h2>
              </div>
              <?php the_content(); ?>
              <div class="testimonial-author">
                <h4 class="testimonial-author-name"><span><?php echo esc_html(get_the_title()); ?></span></h4>
                <div class="hanor-rating">
                  <?php
                  for( $i=1; $i<= $testi_stars; $i++) {
                    echo '<i class="fa fa-star active" aria-hidden="true"></i>';
                  }
                  for( $i=5; $i > $testi_stars; $i--) {
                    echo '<i class="fa fa-star" aria-hidden="true"></i>';
                  } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    } elseif ($testimonial_style === 'testimonial_four') { ?>

    <div class="item">
      <div class="hanor-container">
        <div class="testimonial-author-image ">
          <?php if($large_image) {
            echo '<div class="hanor-image"><img src="'. esc_url($testi_img) .'" alt="'.esc_attr($havnor_alt).'"></div>';
          } ?>
        </div>
        <div class="testimonial-author-quote ">
          <div class="testimonial-author">
            <h4 class="testimonial-author-name"><span><?php echo esc_html(get_the_title()); ?></span></h4>
          </div>
          <?php the_content(); ?>
        </div>
      </div>
    </div>
    <?php
    } elseif ($testimonial_style === 'testimonial_five') { ?><li>
          <div class="testimonial-author-quote hanor-item">
            <div class="hanor-table-wrap">
              <div class="hanor-align-wrap">
                <div class="testimonial-author">
                   <h4 class="testimonial-author-name"><span class="<?php echo esc_attr($comma_class); ?>"><?php echo esc_html(get_the_title()); ?></span><span class="work-since"><?php echo esc_html($testi_since); ?></span></h4>
                   <h4 class="testimonial-author-position"><span><?php echo esc_html($testi_job); ?></span></h4>
                </div>
                <p><?php the_excerpt(); ?></p>
              </div>
            </div>
          </div>
        </li> <?php }
    elseif ($testimonial_style === 'testimonial_three') { ?>
    <div class="item">
      <div class="hanor-container">
        <div class="testimonial-author-image hanor-item">
          <div class="hanor-table-wrap">
            <div class="hanor-align-wrap bottom">
              <?php if($large_image) {
                echo '<div class="hanor-image"><img src="'. esc_url($testi_img) .'" alt="'.esc_attr($havnor_alt).'"></div>';
              } ?>
            </div>
          </div>
        </div>
        <div class="testimonial-author-quote hanor-item">
          <div class="hanor-table-wrap">
            <div class="hanor-align-wrap">
              <?php the_content(); ?>
              <div class="testimonial-author">
                <h4 class="testimonial-author-name"><span><?php echo esc_html(get_the_title()); ?></span></h4>
                <div class="hanor-rating">
                  <?php
                  for( $i=1; $i<= $testi_stars; $i++) {
                    echo '<i class="fa fa-star active" aria-hidden="true"></i>';
                  }
                  for( $i=5; $i > $testi_stars; $i--) {
                    echo '<i class="fa fa-star" aria-hidden="true"></i>';
                  } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    } else {
    if($with_image){ ?>
    <div class="item with-featured-image">
      <div class="hanor-container">
        <div class="testimonial-author">
          <?php if($large_image) {
            echo '<div class="hanor-image"><img src="'. esc_url($testi_img) .'" alt="'.esc_attr($havnor_alt).'"></div>';
          } ?>
          <h4 class="testimonial-author-name"><span><?php echo esc_html(get_the_title()); ?></span></h4>
          <div class="hanor-rating">
            <?php
            for( $i=1; $i<= $testi_stars; $i++) {
              echo '<i class="fa fa-star active" aria-hidden="true"></i>';
            }
            for( $i=5; $i > $testi_stars; $i--) {
              echo '<i class="fa fa-star" aria-hidden="true"></i>';
            } ?>
          </div>
        </div>
        <?php the_content(); ?>
      </div>
    </div>
    <?php } else { ?>
    <div class="item">
      <div class="hanor-container">
        <?php the_content(); ?>
        <div class="testimonial-author">
          <h4 class="testimonial-author-name"><span><?php echo esc_html(get_the_title()); ?></span></h4>
          <div class="hanor-rating">
            <?php
            for( $i=1; $i<= $testi_stars; $i++) {
              echo '<i class="fa fa-star active" aria-hidden="true"></i>';
            }
            for( $i=5; $i > $testi_stars; $i--) {
              echo '<i class="fa fa-star" aria-hidden="true"></i>';
            } ?>
          </div>
        </div>
      </div>
    </div>
    <?php }
    } // Style One
    endwhile;
    wp_reset_postdata();
    ?>

    <?php if ($testimonial_style === 'testimonial_five') { ?>
     </ul>
    </div>
   <?php } else { ?>
    </div>
  <?php  }  ?>
  </div>
  </div>
  </div>

<?php
  endif;

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

$all_text = cs_get_option('all_text');
$all_text_actual = $all_text ? $all_text : esc_html__('All', 'havnor');

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

$search_query['s'] =  $_GET['s'];
$search_query['paged'] = $my_page;
$search_query['post_type'] = array('portfolio');
$search_query['posts_per_page'] = (int)$portfolio_limit;
$search_query['portfolio_category'] = esc_attr($havnor_portfolio_show_category);
$search_query['orderby'] = $havnor_portfolio_orderby;
$search_query['order'] = $havnor_portfolio_order;
$search_query['post_status'] = array('publish','inherit');
$havnor_port = new WP_Query( $search_query );

if ($havnor_port->have_posts()) : ?>
<div class="hanor-mid-wrap portfolio-search-result mid-spacer-one">
  <div class="container">
  <?php $obj = get_post_type_object( 'portfolio' ); ?>
  <h2 class="hanor-search-post-title"><?php echo esc_html($obj->labels->name); ?></h2>
    <div class="<?php echo esc_attr($style_class); ?>">
	  	<?php if ($havnor_portfolio_filter) { ?>
	    <div class="masonry-filters">
	      <ul>
	        <li><a href="javascript:void(0);" data-filter="*" class="active"><?php echo esc_html($all_text_actual); ?></a></li>
	        <?php
	          if ($havnor_portfolio_show_category) {
	            $cat_name = explode(',', $havnor_portfolio_show_category);
	            $terms = $cat_name;
	            $count = count($terms);
	            if ($count > 0) {
	              foreach ($terms as $term) {
	                echo '<li class="cat-'. preg_replace('/\s+/', "", strtolower($term)) .'"><a href="javascript:void(0);" class="filter cat-'. preg_replace('/\s+/', "", strtolower($term)) .'" data-filter=".cat-'. preg_replace('/\s+/', "", strtolower($term)) .'" title="' . str_replace('-', " ", strtolower($term)) . '">' . str_replace('-', " ", strtolower($term)) . '</a></li>';
	               }
	            }
	          } else {
	            if ( function_exists( 'havnor_wp_share_option' ) ) {
                echo havnor_portfolio_category_list();
              }
	          }
	        ?>
	      </ul>
	    </div>
	    <?php }
	    if ($havnor_portfolio_column === '2') {
				$port_space = ' data-space=20';
			} else {
				$port_space = '';
			} ?>
	    <!-- Start -->
	    <div class="hanor-masonry" data-items="<?php echo esc_attr($havnor_portfolio_column); ?>"<?php echo esc_html($port_space); ?>>
	    	<?php
	      while ($havnor_port->have_posts()) : $havnor_port->the_post();
	        get_template_part( 'layouts/post/content', 'portfolio' );
	        endwhile;
	      ?>
	    </div>
			<!-- End -->
      <?php if($havnor_port->max_num_pages > 1) { ?>
      <div class="pagination-spacer-two">
	    	<?php if ($havnor_portfolio_pagination) { havnor_paging_nav($havnor_port->max_num_pages,"",$paged); } ?>
	  	</div>
      <?php } wp_reset_postdata(); ?>
  	</div>
  </div>
</div>

<?php endif;

$team_limit = cs_get_option('team_limit');
$team_orderby = cs_get_option('team_orderby');
$team_order = cs_get_option('team_order');
$team_style = cs_get_option('team_style');
$team_column = cs_get_option('team_column');
$team_pagination = cs_get_option('team_pagination');

if ($team_column === '3') {
	$team_column_class = 'col-sm-4';
} else {
	$team_column_class = 'col-md-3 col-sm-4';
}

if ($team_style === 'two') {
	$team_style_class = ' team-style-three';
} else {
	$team_style_class = '';
}

$team_limit = $team_limit ? $team_limit : '8';
// Query Starts Here
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

$search_query['s'] =  $_GET['s'];
$search_query['paged'] = $my_page;
$search_query['post_type'] = array('team');
$search_query['posts_per_page'] = (int)$team_limit;
$search_query['orderby'] = $team_orderby;
$search_query['order'] = $team_order;
$search_query['post_status'] = array('publish','inherit');
$havnor_team_qury = new WP_Query( $search_query );

if ($havnor_team_qury->have_posts()) :
?>

<div class="hanor-team <?php echo esc_attr($team_style_class); ?>">
  <div class="container">
    <?php $obj = get_post_type_object( 'team' ); ?>
    <h2 class="hanor-search-post-title"><?php echo esc_html($obj->labels->name); ?></h2>
    <div class="row">
    <?php
    while ($havnor_team_qury->have_posts()) : $havnor_team_qury->the_post();
    // Featured Image
		$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
		$large_image = $large_image[0];
		$abt_title = get_the_title();

		if ($team_style === 'two') {
			if(class_exists('Aq_Resize')) {
				$team_img = aq_resize( $large_image, '235', '235', true );
			} else {$team_img = $large_image;}
			$team_featured_img = ( $team_img ) ? $team_img : HAVNOR_IMAGES . '/235x235.png';
		} else {
			if(class_exists('Aq_Resize')) {
				$team_img = aq_resize( $large_image, '270', '370', true );
			} else {$team_img = $large_image;}
			$team_featured_img = ( $team_img ) ? $team_img : HAVNOR_IMAGES . '/270x370.png';
		}
    // Link
    $team_options = get_post_meta( get_the_ID(), 'team_options', true );
    $team_pro = $team_options['team_job_position'];
    $team_socials = $team_options['social_icons'];

    ?>
    <div class="<?php echo esc_attr($team_column_class); ?>">
      <div class="mate-item hanor-item">
        <div class="hanor-image">
        <?php if ($large_image) { ?>
        <img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_attr($abt_title); ?>">
        <?php } ?>
        </div>
        <div class="mate-info">
          <h4 class="mate-name"><?php echo esc_html($abt_title); ?></h4>
          <?php if ($team_pro) { ?>
            <h5 class="mate-designation"><?php echo esc_html($team_pro); ?></h5>
          <?php } ?>
          <div class="hanor-social">
            <?php if ( ! empty( $team_socials ) ) {
              foreach ( $team_socials as $social ) { ?>
              <a href="<?php echo esc_url($social['icon_link']); ?>" target="_blank"><i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i></a>
            <?php } } ?>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
    </div>
    <?php if ($team_pagination) {havnor_paging_nav($havnor_team_qury->max_num_pages,"",$paged); wp_reset_postdata();} ?>
  </div>
</div> <!-- Team End -->

<?php
  endif;

$job_limit = cs_get_option('job_limit');
$job_orderby = cs_get_option('job_orderby');
$job_order = cs_get_option('job_order');
$job_show_category = cs_get_option('job_show_category');
$job_pagination = cs_get_option('job_pagination');
$posted_on = cs_get_option('posted_on');
$date_format = cs_get_option('job_date_format');
$view_job = cs_get_option('view_job');

$job_limit = $job_limit ? $job_limit : '8';
$posted_on_text = $posted_on ? $posted_on : esc_html__('Posted on : ', 'havnor');
$date_format_actual = $date_format ? $date_format : '';
// Query Starts Here
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


$search_query['s'] =  $_GET['s'];
$search_query['paged'] = $my_page;
$search_query['post_type'] = array('job');
$search_query['posts_per_page'] = (int)$job_limit;
$search_query['job_role'] = esc_attr($job_show_category);
$search_query['orderby'] = $job_orderby;
$search_query['order'] = $job_order;
$search_query['post_status'] = array('publish','inherit');
$havnor_job_qury = new WP_Query( $search_query );

if ($havnor_job_qury->have_posts()) :
?>
<div class="hanor-job">
  <div class="container">
    <div class="row">
    <?php $obj = get_post_type_object( 'job' ); ?>
    <h2 class="hanor-search-post-title"><?php echo esc_html($obj->labels->name); ?></h2>
    <?php
    while ($havnor_job_qury->have_posts()) : $havnor_job_qury->the_post();
    // Featured Image
		$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
		$large_image = $large_image[0];
		$abt_title = get_the_title();

    // Link
    $job_options = get_post_meta( get_the_ID(), 'job_options', true );
    $job_location = $job_options['job_location'];
    $job_location_link = $job_options['job_location_link'];
    $job_duration = $job_options['job_duration'];
    $view_job = $view_job ? $view_job : esc_html__('View Job','havnor');
    ?>
    <div class="job-item hanor-item">
    	<div class="row">
    		<div class="col-md-2">
    			<div class="hanor-image">
		        <?php if ($large_image) { ?>
		        <img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($abt_title); ?>">
		        <?php } ?>
	        </div>
    		</div>
    		<div class="col-md-7">
    			<div class="job-info">
	          <h4 class="job-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html($abt_title); ?></a></h4>
	          <div class="job-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo esc_html($posted_on_text); ?><?php echo get_the_date($date_format_actual); ?></div>
	          <p><?php
						$job_excerpt = cs_get_option('theme_job_excerpt');
						if ($job_excerpt) {
							$job_excerpt = $job_excerpt;
						} else {
							$job_excerpt = '30';
						}
						havnor_excerpt($job_excerpt);
						echo havnor_wp_link_pages();
						?></p>
	        </div>
    		</div>
    		<div class="col-md-3">
    			<div class="job-detail-info">
    				<div class="hanor-btns-group">
		          <?php if($job_duration){ ?>
                <span class="job-btn blue" ><span><?php echo esc_html($job_duration); ?></span></span>
              <?php } ?>
		          <a href="<?php echo esc_url( get_permalink() ); ?>" class="job-btn" ><span><?php echo esc_html($view_job); ?></span></a>
          	</div>
	          <?php if ($job_location) { ?>
	            <span class="job-location"><i class="fa fa-map-marker" aria-hidden="true"></i> <a href="<?php echo esc_url($job_location_link); ?>"><?php echo esc_html($job_location); ?></a></span>
	          <?php } ?>
	        </div>
    		</div>
      </div>
    </div>
    <?php endwhile; ?>
    </div>
    <?php if ($job_pagination) {havnor_paging_nav($havnor_job_qury->max_num_pages,"",$paged); wp_reset_postdata();} ?>
  </div>
</div> <!-- Team End -->
</div>
<?php
  endif;
} else {
// Theme Options
$havnor_sidebar_position = cs_get_option('blog_sidebar_position');
$havnor_blog_widgett = cs_get_option('blog_widget');
$havnor_blog_style = cs_get_option('blog_listing_style');
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
} else {
  $havnor_blog_style = ' hanor-stories';
  $o_con = 'hanor-container';
}

if ($havnor_blog_widgett) {
  $widget_selectt = $havnor_blog_widgett;
} else {
  if (is_active_sidebar('sidebar-1')) {
    $widget_selectt = 'sidebar-1';
  } else {
    $widget_selectt = '';
  }
}

// Sidebar Position
if ($widget_selectt && is_active_sidebar( $widget_selectt )) {
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

<div class="hanor-mid-wrap hanor-gray-mid <?php echo esc_attr($havnor_sidebar_class); ?>">
  <div class="container">
    <div class="row">
      <?php
      if ($havnor_sidebar_position === 'sidebar-left' && $havnor_sidebar_position !== 'sidebar-hide') { get_sidebar(); } ?>
      <div class="<?php echo esc_attr($layout_class); ?>">
        <div class="<?php echo esc_attr($havnor_blog_style); ?>">
          <div class="<?php echo esc_attr($o_con); ?>">
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
          </div>
        </div><!-- Blog Div -->
        <?php
        havnor_default_paging_nav();
        wp_reset_postdata();  // avoid errors further down the page
        ?>
      </div><!-- Content Area -->
      <?php if ($havnor_sidebar_position !== 'sidebar-hide') {  get_sidebar(); } ?>
    </div>
  </div>
</div>
<?php }
}
get_footer();
