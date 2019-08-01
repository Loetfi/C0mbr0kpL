<?php
/* ==========================================================
  Blog Slider
=========================================================== */
if ( !function_exists('havnor_blog_slider_function')) {
  function havnor_blog_slider_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      // Listing
      'blog_slider_limit'  => '',
      'blog_slider_order'  => '',
      'blog_slider_orderby'  => '',
      'blog_slider_show_category'  => '',
      'class'  => '',
      // Read More Text
      'fade_effect' => '',
      'read_more_txt'  => '',
      'date_format' => '',
      'autoplay'  => '',
      'time_out'  => '',
      'slides_to_scroll' => '',

    ), $atts));

    $date_format_actual = $date_format ? $date_format : '';

    // Read More Text
    if (havnor_framework_active()) {
      $read_more_to = cs_get_option('read_more_text');
      if ($read_more_txt) {
        $read_more_txt = $read_more_txt;
      } elseif($read_more_to) {
        $read_more_txt = $read_more_to;
      } else {
        $read_more_txt = esc_html__( 'READ MORE', 'havnor-core' );
      }
    } else {
      $read_more_txt = $read_more_txt ? $read_more_txt : esc_html__( 'READ MORE', 'havnor-core' );
    }

    $autoplay = $autoplay ? 'true' : 'false';
    $time_out = $time_out ? $time_out : '3000';
    $fade_effect = $fade_effect === 'true' ? ' data-fade="true"' : ' data-fade="false"';
    $slides_to_scroll = $slides_to_scroll ? ' data-toscroll="'. $slides_to_scroll .'"' : ' data-toscroll="1"';

    // Turn output buffer on
    ob_start();

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
      'post_type' => 'post',
      'posts_per_page' => (int)$blog_slider_limit,
      'category_name' => esc_attr($blog_slider_show_category),
      'orderby' => $blog_slider_orderby,
      'order' => $blog_slider_order
    );

    $hanor_post_slider = new WP_Query( $args );
    if ($hanor_post_slider->have_posts()) :
    ?>

    <!-- Blog Slider Start -->
    <div class="hanor-post-slider <?php echo esc_attr($class); ?>">
      <div class="postslider">
        <div class="container">
          <div class="postslider-wrap">
            <ul class="featuredPostSlider" data-interval="<?php echo esc_attr($time_out); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" <?php echo $fade_effect.$slides_to_scroll; ?>>
              <?php
              while ($hanor_post_slider->have_posts()) : $hanor_post_slider->the_post();
                $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
                $large_image = $large_image[0];
                if(class_exists('Aq_Resize')) {
                  $blog_slider_img = aq_resize( $large_image, '600', '542', true );
                } else {$blog_slider_img = $large_image;}
                $featured_img = ( $blog_slider_img ) ? $blog_slider_img : HAVNOR_PLUGIN_IMGS . '/600x540.png';
              ?>
                <li><a href="<?php echo esc_url( get_permalink() ); ?>"><img alt="Post" src="<?php echo esc_url($featured_img); ?>"></a></li>
              <?php
              endwhile;
              ?>
            </ul>
            <div id="slick-pager">
              <div class="pagerNavigation pagerNavigationTop">
                <span class="top"><i class="fa fa-angle-up"></i></span>
              </div>
              <div class="slick-pager">
                <?php  while ($hanor_post_slider->have_posts()) : $hanor_post_slider->the_post(); ?>
                  <div data-slide-index="1">
                    <span class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date($date_format_actual); ?></span>
                    <h3><?php echo get_the_title(); ?></h3>
                    <p><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $read_more_txt; ?></a></p>
                  </div>
                <?php endwhile; ?>
              </div>
              <div class="pagerNavigation pagerNavigationBottom">
                <span class="bottom"><i class="fa fa-angle-down"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Blog Slider End -->
    <?php endif;
    wp_reset_postdata();

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'hanor_blog_slider', 'havnor_blog_slider_function' );
