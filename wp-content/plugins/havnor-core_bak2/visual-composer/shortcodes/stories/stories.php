<?php
/* ==========================================================
  Blog
=========================================================== */
if ( !function_exists('havnor_stories_function')) {
  function havnor_stories_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'stories_style'  => '',
      'stories_column'  => '',
      'img_size' => '',
      'stories_limit'  => '',
      // Enable & Disable
      'stories_category'  => '',
      'stories_date'  => '',
      'date_format' => '',
      // Listing
      'stories_order'  => '',
      'stories_orderby'  => '',
      'stories_post_in'  => '',
      'class'  => '',
      // Carousel
      'carousel_loop'  => '',
      'carousel_items'  => '',
      'carousel_margin'  => '',
      'carousel_dots'  => '',
      'carousel_nav'  => '',
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

    // Style
    if ($stories_style === 'style-two') {
      $stories_style_class = '';
    } else {
      $stories_style_class = ' stories-style-three';
    }
    $date_format_actual = $date_format ? $date_format : '';

    // Carousel Data's
    $carousel_loop = $carousel_loop === 'true' ? ' data-loop="true"' : ' data-loop="false"';
    $carousel_items = $carousel_items ? ' data-items="'. $carousel_items .'"' : ' data-items="3"';
    $carousel_margin = $carousel_margin ? ' data-margin="'. $carousel_margin .'"' : ' data-margin="0"';
    $carousel_dots = $carousel_dots ? ' data-dots="'. $carousel_dots .'"' : ' data-dots="false"';
    $carousel_nav = $carousel_nav ? ' data-nav="'. $carousel_nav .'"' : ' data-nav="false"';
    $carousel_autoplay_timeout = $carousel_autoplay_timeout ? ' data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
    $carousel_autoplay = $carousel_autoplay ? ' data-autoplay="'. $carousel_autoplay .'"' : '';
    $carousel_animate_out = $carousel_animate_out ? ' data-animateout="'. $carousel_animate_out .'"' : '';
    $carousel_mousedrag = $carousel_mousedrag === 'true' ? ' data-mouse-drag="true"' : ' data-mouse-drag="false"';
    $carousel_autowidth = $carousel_autowidth ? ' data-auto-width="'. $carousel_autowidth .'"' : '';
    $carousel_autoheight = $carousel_autoheight ? ' data-auto-height="'. $carousel_autoheight .'"' : '';
    $carousel_tablet = $carousel_tablet ? ' data-items-tablet="'. $carousel_tablet .'"' : ' data-items-tablet="3"';
    $carousel_mobile = $carousel_mobile ? ' data-items-mobile-landscape="'. $carousel_mobile .'"' : ' data-items-mobile-landscape="2"';
    $carousel_small_mobile = $carousel_small_mobile ? ' data-items-mobile-portrait="'. $carousel_small_mobile .'"' : ' data-items-mobile-portrait="1"';

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

    if ($stories_post_in) {
      $stories_post_in = explode(',',$stories_post_in);
    } else {
      $stories_post_in = '';
    }

    $args = array(
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'post',
      'posts_per_page' => (int)$stories_limit,
      'orderby' => $stories_orderby,
      'order' => $stories_order,
      'post__in' => $stories_post_in,
    );

    $hanor_story = new WP_Query( $args ); ?>

    <!-- Blog Start -->
    <div class="hanor-stories stories-style-two<?php echo esc_attr($stories_style_class); ?> <?php echo esc_attr($class); ?>">
      <?php if ($stories_style === 'style-two') { ?>
        <div class="owl-carousel" <?php echo $carousel_loop . $carousel_items . $carousel_margin . $carousel_dots . $carousel_nav . $carousel_autoplay_timeout . $carousel_autoplay . $carousel_animate_out . $carousel_mousedrag . $carousel_autowidth . $carousel_autoheight . $carousel_tablet . $carousel_mobile . $carousel_small_mobile; ?>>
      <?php } else { ?>
        <div class="row">
      <?php }
          if ($hanor_story->have_posts()) : while ($hanor_story->have_posts()) : $hanor_story->the_post();

          // Columns
          if ($stories_column === 'col-3') {
            $stories_col_class = 'col-md-4 col-sm-6 hanor-item';
          } else {
            $stories_col_class = 'col-md-6 hanor-item';
          }

          $dimensions = vc_extract_dimensions( $img_size );
          $hwstring = $dimensions ? image_hwstring( $dimensions[0], $dimensions[1] ) : '';
          $large_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, ''  );

          $large_image = $large_image[0];
          if($img_size === '') {
            $img_resize_class = ' no-resize';
            if ($stories_style === 'style-two') {
              if(class_exists('Aq_Resize')) {
                $stories_img = aq_resize( $large_image, '640', '480', true );
              } else {$stories_img = $large_image;}
              $featured_img = ( $stories_img ) ? $stories_img : HAVNOR_PLUGIN_ASTS . '/images/960x480.png';
            } else {
              if(class_exists('Aq_Resize')) {
                $stories_img = aq_resize( $large_image, '570', '420', true );
              } else {$stories_img = $large_image;}
              $featured_img = ( $stories_img ) ? $stories_img : HAVNOR_PLUGIN_ASTS . '/images/570x420.png';
            }
          } else {
            if($img_size === 'medium') {
              $stories_img = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium', false, ''  );
              $stories_img = $stories_img[0];
              $featured_img = ( $stories_img ) ? $stories_img : HAVNOR_PLUGIN_ASTS . '/images/960x480.png';
            } elseif($img_size === 'large') {
              $stories_img = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large', false, ''  );
              $stories_img = $stories_img[0];
              $featured_img = ( $stories_img ) ? $stories_img : HAVNOR_PLUGIN_ASTS . '/images/960x480.png';
            } elseif($img_size === 'full') {
              $stories_img = $large_image;
              $featured_img = ( $stories_img ) ? $stories_img : HAVNOR_PLUGIN_ASTS . '/images/960x480.png';
            } elseif($img_size === 'thumbnail') {
              $stories_img = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'thumbnail', false, ''  );
              $stories_img = $stories_img[0];
              $featured_img = ( $stories_img ) ? $stories_img : HAVNOR_PLUGIN_ASTS . '/images/960x480.png';
            } else {

              if(class_exists('Aq_Resize')) {
                $stories_img = aq_resize( $large_image, $dimensions[0], $dimensions[1], true );
              } else {$stories_img = $large_image;}
              $featured_img = ( $stories_img ) ? $stories_img : HAVNOR_PLUGIN_ASTS . '/images/960x480.png';
            }
            $img_resize_class = ' hav-resize';
          }
          ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class('hanor-stories-post'); ?>>
            <?php if ($stories_style === 'style-two') { ?>
            <div class="item">
            <?php } else { ?>
            <div class="<?php echo esc_attr($stories_col_class); ?>">
            <?php } ?>
              <div class="story-item">
                <?php if ($large_image) { ?>
                  <div class="hanor-image <?php echo esc_attr($img_resize_class); ?>"><img src="<?php echo esc_url($featured_img); ?>" <?php echo $hwstring; ?> alt="<?php echo esc_attr(get_the_title()); ?>"></div>
                <?php } ?>
                <div class="story-info">
                  <div class="hanor-table-wrap">
                    <div class="hanor-align-wrap bottom">
                      <h5 class="story-date"><?php echo get_the_date($date_format_actual); ?></h5>
                      <h4 class="story-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h4>
                      <?php if ( !$stories_category ) {
                      $category_list = get_the_category_list( ' ', ' ' );
                      if ( $category_list ) {
                        echo '<div class="hanor-btns-group story-cat">'. $category_list .' </div>';
                      } } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- Post -->
          <?php
          endwhile;
          endif;
          wp_reset_postdata(); ?>
      <?php if ($stories_style === 'style-two') { ?>
        </div>
      <?php } else { ?>
        </div> <!-- row -->
      <?php } ?>
    </div>
    <!-- Blog End -->
    <?php
    // Return outbut buffer
    return ob_get_clean();
  }
}
add_shortcode( 'havnor_stories', 'havnor_stories_function' );
