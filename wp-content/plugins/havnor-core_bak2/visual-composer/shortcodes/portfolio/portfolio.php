<?php
/* ==========================================================
  Portfolio
=========================================================== */
if ( !function_exists('havnor_portfolio_function')) {
  function havnor_portfolio_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'portfolio_style'  => '',
      'portfolio_column'  => '',
      'portfolio_limit'  => '',
      // Listing
      'portfolio_order'  => '',
      'portfolio_orderby'  => '',
      'portfolio_show_category'  => '',
      'class'  => '',
      // Enable & Disable
      'portfolio_filter'  => '',
      'portfolio_pagination'  => '',
      'portfolio_pagination_type' => '',
      'load_more_btn_txt'   => '',
      // Style - Filter
      'filter_color'  => '',
      'filter_active_color'  => '',
      'filter_line_color'  => '',
      'filter_size'  => '',
      // Style - Colors And Sizes
      'image_overlay_color'  => '',
      'info_bg_color' => '',
      'info_bg_hover_color' => '',
      'portfolio_title_size'  => '',
      'portfolio_title_color'  => '',
      'portfolio_title_hover_color'  => '',
      'portfolio_cat_color'  => '',
      'portfolio_cat_hover_color'  => '',
      'portfolio_cat_size'  => '',
      // Carousel
      'carousel_loop'  => '',
      'carousel_items'  => '',
      'carousel_margin'  => '',
      'carousel_dots'  => '',
      'carousel_autoplay_timeout'  => '',
      'carousel_autoplay'  => '',
      'carousel_animate_out'  => '',
      'carousel_mousedrag'  => '',
      'carousel_autowidth'  => '',
      'carousel_autoheight'  => '',
      'carousel_tablet'  => '',
      'carousel_mobile'  => '',
      'carousel_small_mobile'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Image Overlay Color
    if ( $image_overlay_color ) {
      $inline_style .= '.hanor-portfolio-'. $e_uniqid .'.hanor-portfolio .work-info, .hanor-portfolio-'. $e_uniqid .'.hanor-portfolio.portfolio-style-two .work-info {';
      $inline_style .= ( $image_overlay_color ) ? 'background:'. $image_overlay_color .';' : '';
      $inline_style .= '}';
    }
    // Info Bg Color
    if ( $info_bg_color ) {
      $inline_style .= '.hanor-portfolio-'. $e_uniqid .' .work-info {';
      $inline_style .= ( $info_bg_color ) ? 'background:'. $info_bg_color .';' : '';
      $inline_style .= '}';
    }
    if ( $info_bg_hover_color ) {
      $inline_style .= '.hanor-portfolio-'. $e_uniqid .'.hanor-portfolio-default .work-item.hanor-hover .work-info {';
      $inline_style .= ( $info_bg_hover_color ) ? 'background:'. $info_bg_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Title Color
    if ( $portfolio_title_size || $portfolio_title_color  || $portfolio_title_hover_color ) {
      $inline_style .= '.hanor-portfolio-'. $e_uniqid .' .work-info h4.work-title a {';
      $inline_style .= ( $portfolio_title_color ) ? 'color:'. $portfolio_title_color .';' : '';
      $inline_style .= ( $portfolio_title_size ) ? 'font-size:'. havnor_core_check_px($portfolio_title_size) .';' : '';
      $inline_style .= '}';
      $inline_style .= '.hanor-portfolio-'. $e_uniqid .' .work-info h4.work-title a:hover, .hanor-portfolio-'. $e_uniqid .'.hanor-portfolio-default .work-item.hanor-hover .work-info .work-title a {';
      $inline_style .= ( $portfolio_title_hover_color ) ? 'color:'. $portfolio_title_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Category
    if ( $portfolio_cat_color || $portfolio_cat_size ) {
      $inline_style .= '.hanor-portfolio-'. $e_uniqid .' .work-info h5.work-category span a {';
      $inline_style .= ( $portfolio_cat_color ) ? 'color:'. $portfolio_cat_color .';' : '';
      $inline_style .= ( $portfolio_cat_size ) ? 'font-size:'. havnor_core_check_px($portfolio_cat_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $portfolio_cat_hover_color ) {
      $inline_style .= '.hanor-portfolio-'. $e_uniqid .' .work-info h5.work-category span a:hover, .hanor-portfolio-'. $e_uniqid .'.hanor-portfolio-default .work-item.hanor-hover .work-info h5.work-category span a {';
      $inline_style .= ( $portfolio_cat_hover_color ) ? 'color:'. $portfolio_cat_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Filter
    if ( $filter_color || $filter_size ) {
      $inline_style .= '.hanor-portfolio-'. $e_uniqid .' .masonry-filters ul li a {';
      $inline_style .= ( $filter_color ) ? 'color:'. $filter_color .';' : '';
      $inline_style .= ( $filter_size ) ? 'font-size:'. havnor_core_check_px($filter_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $filter_active_color ) {
      $inline_style .= '.hanor-portfolio-'. $e_uniqid .' .masonry-filters ul li a:hover, .hanor-portfolio-'. $e_uniqid .' .masonry-filters ul li a.active {';
      $inline_style .= ( $filter_active_color ) ? 'color:'. $filter_active_color .';' : '';
      $inline_style .= '}';
    }
    if ( $filter_line_color ) {
      $inline_style .= '.hanor-portfolio-'. $e_uniqid .' .masonry-filters ul li:after {';
      $inline_style .= ( $filter_line_color ) ? 'color:'. $filter_line_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-portfolio-'. $e_uniqid;

    // Carousel Data's
    $carousel_loop = $carousel_loop === 'true' ? ' data-loop="true"' : ' data-loop="false"';
    $carousel_items = $carousel_items ? ' data-items="'. $carousel_items .'"' : ' data-items="3"';
    $carousel_margin = $carousel_margin ? ' data-margin="'. $carousel_margin .'"' : ' data-margin="18"';
    $carousel_dots = $carousel_dots ? ' data-dots="'. $carousel_dots .'"' : ' data-dots="false"';
    $carousel_autoplay_timeout = $carousel_autoplay_timeout ? ' data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
    $carousel_autoplay = $carousel_autoplay ? ' data-autoplay="'. $carousel_autoplay .'"' : '';
    $carousel_animate_out = $carousel_animate_out ? ' data-animateout="'. $carousel_animate_out .'"' : '';
    $carousel_mousedrag = $carousel_mousedrag === 'true' ? ' data-mouse-drag="true"' : ' data-mouse-drag="false"';
    $carousel_autowidth = $carousel_autowidth ? ' data-auto-width="'. $carousel_autowidth .'"' : '';
    $carousel_autoheight = $carousel_autoheight ? ' data-auto-height="'. $carousel_autoheight .'"' : '';
    $carousel_tablet = $carousel_tablet ? ' data-items-tablet="'. $carousel_tablet .'"' : ' data-items-tablet="3"';
    $carousel_mobile = $carousel_mobile ? ' data-items-mobile-landscape="'. $carousel_mobile .'"' : ' data-items-mobile-landscape="2"';
    $carousel_small_mobile = $carousel_small_mobile ? ' data-items-mobile-portrait="'. $carousel_small_mobile .'"' : ' data-items-mobile-portrait="1"';

    // RTL
    if ( is_rtl() ) {
      $switch_rtl = ' data-rtl="true"';
    } else {
      $switch_rtl = ' data-rtl="false"';
    }

    if ($portfolio_style === 'two' || $portfolio_style === 'three') {
      $style_class = ' hanor-portfolio portfolio-style-two direction-hover';
    } elseif ($portfolio_style === 'five') {
      $style_class = ' hanor-portfolio';
    } elseif ($portfolio_style === 'four') {
      $style_class = ' hanor-portfolio-four';
    } else {
      $style_class = 'hanor-portfolio-default';
    }

    $portfolio_column = $portfolio_column ? $portfolio_column : '3';

    if ($portfolio_style === 'two' && $portfolio_column === '2') {
      $port_space = ' data-space=20';
    } elseif ($portfolio_style === 'five') {
      $port_space = ' data-space=4';
    } else {
      $port_space = '';
    }
    $load_more_btn_txt = $load_more_btn_txt ? $load_more_btn_txt : esc_html__( 'Load More', 'havnor-core' );

    // Turn output buffer on
    ob_start(); ?>

  <div class="port-wraper <?php echo esc_attr($class . $style_class . $styled_class); ?> hanor-post-load-more" data-select=".port-wraper" data-item=".masonry-item" data-paging="<?php echo esc_attr($portfolio_pagination_type); ?>" data-loading="<?php echo esc_attr($load_more_btn_txt); ?>">
    <?php // Portfolio Filter
    if ($portfolio_filter) {
    ?>
    <div class="masonry-filters">
      <ul>
        <li><a href="javascript:void(0);" data-filter="*" class="active"><?php esc_html_e('All', 'havnor-core'); ?></a></li>
        <?php
          if ($portfolio_show_category) {
            $cat_name = explode(',', $portfolio_show_category);
            $terms = $cat_name;
            $count = count($terms);
            if ($count > 0) {
              foreach ($terms as $term) {
                echo '<li class="cat-'. preg_replace('/\s+/', "", strtolower($term)) .'"><a href="javascript:void(0);" class="filter cat-'. preg_replace('/\s+/', "", strtolower($term)) .'" data-filter=".cat-'. preg_replace('/\s+/', "", strtolower($term)) .'" title="' . str_replace('-', " ", strtolower($term)) . '">' . str_replace('-', " ", strtolower($term)) . '</a></li>';
               }
            }
          } else {
            $terms = get_terms('portfolio_category');
            $count = count($terms);
            $i=0;
            $term_list = '';
            if ($count > 0) {
              foreach ($terms as $term) {
                $i++;
                $term_list .= '<li><a href="javascript:void(0);" class="filter cat-'. $term->slug .'" data-filter=".cat-'. $term->slug .'" title="' . esc_attr($term->name) . '">' . $term->name . '</a></li>';
                if ($count != $i) {
                  $term_list .= '';
                } else {
                  $term_list .= '';
                }
              }
              echo $term_list;
            }
          }
        ?>
      </ul>
    </div>
    <?php
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

    $args = array(
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'portfolio',
      'posts_per_page' => (int)$portfolio_limit,
      'portfolio_category' => esc_attr($portfolio_show_category),
      'orderby' => $portfolio_orderby,
      'order' => $portfolio_order
    );

    $hanor_port = new WP_Query( $args );

    if ($portfolio_style === 'four') { ?>
    <!-- Portfolio Start -->
    <div class="owl-carousel" <?php echo $carousel_loop . $carousel_items . $carousel_margin . $carousel_dots . $carousel_autoplay_timeout . $carousel_autoplay . $carousel_animate_out . $carousel_mousedrag . $carousel_autowidth . $carousel_autoheight . $carousel_tablet . $carousel_mobile . $carousel_small_mobile . $switch_rtl; ?>>
    <?php } else { ?>
    <div class="hanor-masonry" data-items="<?php echo esc_attr($portfolio_column); ?>"<?php echo $port_space; ?>>
      <?php }
      if ($hanor_port->have_posts()) : while ($hanor_port->have_posts()) : $hanor_port->the_post();
        // Category
        global $post;
        $terms = wp_get_post_terms($post->ID,'portfolio_category');
        foreach ($terms as $term) {
          $cat_class = 'cat-' . $term->slug;
        }
        $count = count($terms);
        $i=0;
        $cat_class = '';
        if ($count > 0) {
          foreach ($terms as $term) {
            $i++;
            $cat_class .= 'cat-'. $term->slug .' ';
            if ($count != $i) {
              $cat_class .= '';
            } else {
              $cat_class .= '';
            }
          }
        }
        // Featured Image 390 360
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $large_image = $large_image[0];
        if ($portfolio_column === '2') {
          if(class_exists('Aq_Resize')) {
            $portfolio_img = aq_resize( $large_image, '580', '420', true );
          } else {$portfolio_img = $large_image;}
          $featured_img = ( $portfolio_img ) ? $portfolio_img : HAVNOR_PLUGIN_ASTS . '/images/580x420.png';
        } elseif ($portfolio_style === 'five') {
          if(class_exists('Aq_Resize')) {
            $portfolio_img = aq_resize( $large_image, '535', '540', true );
          } else {$portfolio_img = $large_image;}
          $featured_img = ( $portfolio_img ) ? $portfolio_img : HAVNOR_PLUGIN_ASTS . '/images/535x540.png';
        } else {
          if(class_exists('Aq_Resize')) {
            $portfolio_img = aq_resize( $large_image, '600', '600', true );
          } else {$portfolio_img = $large_image;}
          $featured_img = ( $portfolio_img ) ? $portfolio_img : HAVNOR_PLUGIN_ASTS . '/images/370x370.png';
        }

        if ($portfolio_style === 'two') { ?>
        <div class="masonry-item <?php echo esc_attr($cat_class); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
          <div class="work-item">
            <div class="hanor-image"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div>
            <div class="work-info">
              <div class="hanor-table-wrap">
                <div class="hanor-align-wrap">
                  <h4 class="work-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h4>
                  <h5 class="work-category">
                    <span class="category-link">
                    <?php
                      $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
                      $i=1;
                      foreach ($category_list as $term) {
                        $term_link = get_term_link( $term );
                        echo '<a href="'. esc_url($term_link) .'">'. $term->name .'</a> ';
                        if($i++==2) break;
                      }
                    ?>
                    </span>
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } elseif ($portfolio_style === 'three') { ?>
        <div class="masonry-item <?php echo esc_attr($cat_class); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
          <div class="work-item">
            <div class="hanor-image"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div>
            <div class="work-info">
              <div class="hanor-table-wrap">
                <div class="hanor-align-wrap">
                  <h4 class="work-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h4>
                  <h5 class="work-category">
                    <span class="category-link">
                    <?php
                      $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
                      $i=1;
                      foreach ($category_list as $term) {
                        $term_link = get_term_link( $term );
                        echo '<a href="'. esc_url($term_link) .'">'. $term->name .'</a> ';
                        if($i++==2) break;
                      }
                    ?>
                    </span>
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } elseif ($portfolio_style === 'four') { ?>
        <div class="item">
          <div class="work-item hanor-item">
            <div class="hanor-image"><a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a></div>
            <div class="work-info">
              <h4 class="work-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h4>
              <div class="port-icon"><a href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
              <h5 class="work-category">
                <span class="category-link">
                <?php
                  $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
                  $i=1;
                  foreach ($category_list as $term) {
                    $term_link = get_term_link( $term );
                    echo '<a href="'. esc_url($term_link) .'">'. $term->name .'</a> ';
                    if($i++==2) break;
                  }
                ?>
                </span>
              </h5>
            </div>
          </div>
        </div>
        <?php } elseif ($portfolio_style === 'five') { ?>
        <div class="masonry-item <?php echo esc_attr($cat_class); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
          <div class="work-item">
            <div class="hanor-image"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div>
            <div class="work-info">
              <div class="hanor-table-wrap">
                <div class="hanor-align-wrap">
                  <h4 class="work-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h4>
                  <h5 class="work-category">
                    <span class="category-link">
                    <?php
                      $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
                      $i=1;
                      foreach ($category_list as $term) {
                        $term_link = get_term_link( $term );
                        echo '<a href="'. esc_url($term_link) .'">'. $term->name .'</a> ';
                        if($i++==2) break;
                      }
                    ?>
                    </span>
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } else { ?>
        <div class="masonry-item <?php echo esc_attr($cat_class); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
          <div class="work-item">
            <div class="hanor-image"><a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a></div>
            <div class="work-info">
              <h4 class="work-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h4>
              <div class="port-icon"><a href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
              <h5 class="work-category">
                <span class="category-link">
                <?php
                  $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
                  $i=1;
                  foreach ($category_list as $term) {
                    $term_link = get_term_link( $term );
                    echo '<a href="'. esc_url($term_link) .'">'. $term->name .'</a> ';
                    if($i++==2) break;
                  }
                ?>
                </span>
              </h5>
            </div>
          </div>
        </div>
        <?php }
        endwhile;
        endif;
        wp_reset_postdata(); ?>
    </div>
    <!-- Portfolio End -->
    <?php if ($portfolio_pagination) { ?>
      <div class="hanor-pagination">
        <?php havnor_custom_paging_nav($hanor_port->max_num_pages,"",$paged); ?>
      </div>
      <?php
    }
      wp_reset_postdata();  // avoid errors further down the page
    ?>
  </div>
    <?php // Return outbut buffer
    return ob_get_clean();
  }
}
add_shortcode( 'havnor_portfolio', 'havnor_portfolio_function' );
