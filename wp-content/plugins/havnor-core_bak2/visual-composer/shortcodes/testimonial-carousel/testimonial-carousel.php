<?php
/* Testimonial Carousel */
if ( !function_exists('havnor_testimonial_carousel_function')) {
  function havnor_testimonial_carousel_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'testimonial_style'  => '',
      'with_image' => '',
      'testi_title'  => '',
      'class'  => '',
      // Listing
      'testimonial_limit'  => '',
      'testimonial_order'  => '',
      'testimonial_orderby'  => '',
      'testimonial_id'  => '',
      'image_align_style' =>'',
      'quote_img' => '',
      // Carousel
      'carousel_loop'  => '',
      'carousel_items'  => '',
      'carousel_margin'  => '',
      'carousel_dots'  => '',
      'carousel_nav'  => '',
      'carousel_autoplay_timeout'  => '',
      'carousel_autoplay'  => '',
      'carousel_animate_out'  => '',
      'carousel_animate_in'  => '',
      'carousel_mousedrag'  => '',
      'carousel_autowidth'  => '',
      'carousel_autoheight'  => '',
      'carousel_tablet'  => '',
      'carousel_mobile'  => '',
      'carousel_small_mobile'  => '',
      'switch_rtl' => '',
      // Color & Style
      'title_size'=>'',
      'title_weight'=> '',
      'title_color'=>'',
      'content_color'  => '',
      'name_color'  => '',
      'star_color'  => '',
      'active_star_color'  => '',
      'nav_arrow_color' => '',
      'nav_arrow_border_color' => '',
      'content_size'  => '',
      'content_line_height' => '',
      'name_size'  => '',
      'star_size'  => '',
      'content_bg_color'  => '',
      'image_bg_color'=>'',
    ), $atts));

    $image_url = wp_get_attachment_url( $quote_img );

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Content Color
    if ( $title_color || $title_size || $title_weight) {
      $inline_style .= '.hanor-testi-carousel-'. $e_uniqid .'.hanor-testimonials.testimonials-style-five h2 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
      $inline_style .= '}';
    }
    // Content Color
    if ( $content_color || $content_size || $content_line_height) {
      $inline_style .= '.hanor-testi-carousel-'. $e_uniqid .'.hanor-testimonials .owl-carousel p, .hanor-testi-carousel-'. $e_uniqid .'.hanor-testimonials p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= ( $content_line_height ) ? 'line-height:'. havnor_core_check_px($content_line_height) .';' : '';
      $inline_style .= '}';
    }
    // Name Color
    if ( $name_color || $name_size ) {
      $inline_style .= '.hanor-testi-carousel-'. $e_uniqid .'.hanor-testimonials .testimonial-author-name span {';
      $inline_style .= ( $name_color ) ? 'color:'. $name_color .';' : '';
      $inline_style .= ( $name_size ) ? 'font-size:'. havnor_core_check_px($name_size) .';' : '';
      $inline_style .= '}';
    }
    // Star Color
    if ( $star_color || $star_size ) {
      $inline_style .= '.hanor-testi-carousel-'. $e_uniqid .' .hanor-rating {';
      $inline_style .= ( $star_color ) ? 'color:'. $star_color .';' : '';
      $inline_style .= ( $star_size ) ? 'font-size:'. havnor_core_check_px($star_size) .';' : '';
      $inline_style .= '}';
    }
    // Star Active Color
    if ( $active_star_color ) {
      $inline_style .= '.hanor-testi-carousel-'. $e_uniqid .' .hanor-rating .active {';
      $inline_style .= ( $active_star_color ) ? 'color:'. $active_star_color .';' : '';
      $inline_style .= '}';
    }
    // Nav Arrow Color
    if ( $nav_arrow_color || $nav_arrow_border_color) {
      $inline_style .= '.hanor-testi-carousel-'. $e_uniqid .'.hanor-testimonials.testimonials-style-five .owl-carousel .owl-prev:before, .hanor-testi-carousel-'. $e_uniqid .'.hanor-testimonials.testimonials-style-five .owl-carousel .owl-next:before, .hanor-testi-carousel-'. $e_uniqid .'.hanor-testimonials.testimonials-thumb-style .flex-direction-nav li a.flex-prev:before, .hanor-testi-carousel-'. $e_uniqid .'.hanor-testimonials.testimonials-thumb-style .flex-direction-nav li a.flex-next:before, .hanor-testi-carousel-'. $e_uniqid .' .owl-carousel .owl-prev:before, .hanor-testi-carousel-'. $e_uniqid .' .owl-carousel .owl-next:before {';
      $inline_style .= ( $nav_arrow_color ) ? 'color:'. $nav_arrow_color .';' : '';
      $inline_style .= ( $nav_arrow_border_color ) ? 'border-color:'. $nav_arrow_border_color .';' : '';
      $inline_style .= '}';
    }
    // Image BG Color
    if ( $image_bg_color ) {
      $inline_style .= '.hanor-testi-carousel-'. $e_uniqid .'.hanor-testimonials.testimonials-style-five .hanor-image img, .hanor-testi-carousel-'. $e_uniqid .'.hanor-testimonials .hanor-image img {';
      $inline_style .= ( $image_bg_color ) ? 'background-color:'. $image_bg_color .';' : '';
      $inline_style .= '}';
    }
    // Background Color
    if ( $content_bg_color ) {
      $inline_style .= '.hanor-testi-carousel-'. $e_uniqid .'.hanor-testimonials.testimonials-style-five .testimonial-author-quote {';
      $inline_style .= ( $content_bg_color ) ? 'background-color:'. $content_bg_color .';' : '';
      $inline_style .= ( $content_bg_color ) ? 'background-color:'. $content_bg_color .';' : '';
      $inline_style .= '}';
    }
    // Background Before Color
    if ( $content_bg_color ) {
      $inline_style .= '.hanor-testi-carousel-'. $e_uniqid .'.hanor-testimonials.testimonials-style-five .testimonial-author-quote:before {';
      $inline_style .= ( $content_bg_color ) ? 'border-left-color:'. $content_bg_color .';' : '';
      $inline_style .= '}';
    }

    if( $quote_img ) {
      $inline_style .= '.hanor-testi-carousel-'. $e_uniqid .'.testimonials-style-four .testimonial-author-image .hanor-image:after {';
      $inline_style .= ( $image_url ) ? 'background-image:url('. $image_url .');' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-testi-carousel-'. $e_uniqid;

    // Carousel Data's
    $carousel_loop = $carousel_loop === 'true' ? 'data-loop="true"' : 'data-loop="false"';
    $carousel_items = $carousel_items ? 'data-items="'. $carousel_items .'"' : 'data-items="1"';
    $carousel_margin = $carousel_margin ? 'data-margin="'. $carousel_margin .'"' : 'data-margin="0"';
    $carousel_dots = $carousel_dots ? 'data-dots="'. $carousel_dots .'"' : 'data-dots="false"';
    $carousel_nav = $carousel_nav ? 'data-nav="'. $carousel_nav .'"' : 'data-nav="false"';
    $carousel_autoplay_timeout = $carousel_autoplay_timeout ? 'data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
    $carousel_autoplay = $carousel_autoplay ? 'data-autoplay="'. $carousel_autoplay .'"' : '';
    $carousel_animate_out = $carousel_animate_out === 'true' ? 'data-animateout="fadeOut"' : '';
    $carousel_animate_in = $carousel_animate_in === 'true' ? 'data-animatein="fadeIn"' : '';
    $carousel_mousedrag = $carousel_mousedrag === 'true' ? 'data-mouse-drag="true"' : 'data-mouse-drag="false"';
    $carousel_autowidth = $carousel_autowidth ? 'data-auto-width="'. $carousel_autowidth .'"' : '';
    $carousel_autoheight = $carousel_autoheight ? 'data-auto-height="'. $carousel_autoheight .'"' : '';
    $carousel_tablet = $carousel_tablet ? 'data-items-tablet="'. $carousel_tablet .'"' : '';
    $carousel_mobile = $carousel_mobile ? 'data-items-mobile-landscape="'. $carousel_mobile .'"' : '';
    $carousel_small_mobile = $carousel_small_mobile ? 'data-items-mobile-portrait="'. $carousel_small_mobile .'"' : '';
    // RTL
    if ( is_rtl() ) {
      $switch_rtl = ' data-rtl="true"';
    } else {
      $switch_rtl = ' data-rtl="false"';
    }

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
      $testimonial_style_class = ' testimonials-style-one';
    }

    if ($image_align_style === 'image-top') {
      $image_align_class = ' team-top-align';
    } elseif ($image_align_style === 'image-hide') {
      $image_align_class = ' team-hide-align';
    } else {
       $image_align_class= '';
    }

    // Turn output buffer on
    ob_start();

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

    if ($testimonial_id) {
      $testimonial_id = explode(',',$testimonial_id);
    } else {
      $testimonial_id = '';
    }

    $args = array(
      'paged' => $my_page,
      'post_type' => 'testimonial',
      'posts_per_page' => (int)$testimonial_limit,
      'orderby' => $testimonial_orderby,
      'order' => $testimonial_order,
      'post__in' => $testimonial_id
    );

    $hanor_testi = new WP_Query( $args );
    if ($hanor_testi->have_posts()) :
    ?>
  <div class="hanor-testimonials<?php echo $testimonial_style_class . $image_align_class . $styled_class; ?>">
     <?php  if ($testimonial_style === 'testimonial_four') { ?>
        <h2><?php echo $testi_title; ?></h2>
     <?php }
     if ($testimonial_style === 'testimonial_five') { ?>
           <div class="flexslider thumb-flexslider">
        <ul class="slides">
        <?php while ($hanor_testi->have_posts()) : $hanor_testi->the_post();
        // Featured Image
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $havnor_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
        $large_image = $large_image[0];
        if(class_exists('Aq_Resize')) {
          $team_img = aq_resize( $large_image, '200', '200', true );
          $team_featured_img = ( $team_img ) ? $team_img : HAVNOR_PLUGIN_IMGS . '/56x56.png';
        } ?>
          <li><div class="hanor-image"><img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_attr($havnor_alt); ?>"></div></li>
        <?php endwhile; ?>
        </ul>
      </div>
      <div class="flexslider main-flexslider" data-nav="true">
        <ul class="slides">
   <?php } else { ?>
    <div class="owl-carousel" <?php echo $carousel_loop .' '. $carousel_items .' '. $carousel_margin .' '. $carousel_dots .' '. $carousel_nav .' '. $carousel_autoplay_timeout .' '. $carousel_autoplay .' '. $carousel_animate_out .' '. $carousel_animate_in .' '. $carousel_mousedrag .' '. $carousel_autowidth .' '. $carousel_autoheight .' '. $carousel_tablet .' '. $carousel_mobile .' '. $carousel_small_mobile .''.$switch_rtl; ?>>
    <?php }
    while ($hanor_testi->have_posts()) : $hanor_testi->the_post();

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
        $testi_img = aq_resize( $large_image, '350', '350', true );
      } else {$testi_img = $large_image;}
    }
    $actual_image = $large_image ? '<div class="hanor-image"><img src="'. $testi_img .'" alt="'.$havnor_alt.'"></div>' : '';

    if ($testimonial_style === 'testimonial_two') { // Style Two
    ?>
    <div class="item">
      <div class="testimonial-author-image hanor-item">
        <div class="hanor-table-wrap">
          <div class="hanor-align-wrap bottom">
            <?php echo $actual_image; ?>
          </div>
        </div>
      </div>
      <div class="testimonial-author-quote hanor-item">
        <div class="hanor-table-wrap">
          <div class="hanor-align-wrap">
            <div class="testi-content">
              <div class="hanor-section-title">
                <h2 class="section-title"><?php echo $testi_title; ?></h2>
              </div>
              <?php the_content(); ?>
              <div class="testimonial-author">
                <h4 class="testimonial-author-name"><span><?php echo the_title(); ?></span></h4>
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
          <?php echo $actual_image; ?>
        </div>
        <div class="testimonial-author-quote ">
          <div class="testimonial-author">
            <h4 class="testimonial-author-name"><span><?php echo the_title(); ?></span></h4>
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
                   <h4 class="testimonial-author-name"><span class="<?php echo $comma_class; ?>"><?php echo the_title(); ?></span><span class="work-since"><?php echo $testi_since; ?></span></h4>
                   <h4 class="testimonial-author-position"><span><?php echo $testi_job; ?></span></h4>
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
              <?php echo $actual_image; ?>
            </div>
          </div>
        </div>
        <div class="testimonial-author-quote hanor-item">
          <div class="hanor-table-wrap">
            <div class="hanor-align-wrap">
              <?php the_content(); ?>
              <div class="testimonial-author">
                <h4 class="testimonial-author-name"><span><?php echo the_title(); ?></span></h4>
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
        <?php echo $actual_image; ?>
          <h4 class="testimonial-author-name"><span><?php echo the_title(); ?></span></h4>
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
          <h4 class="testimonial-author-name"><span><?php echo the_title(); ?></span></h4>
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

    if ($testimonial_style === 'testimonial_five') { ?>
     </ul>
    </div>
   <?php } else { ?>
    </div>
  <?php  }  ?>
  </div>

<?php
  endif;
    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'hanor_testimonial_carousel', 'havnor_testimonial_carousel_function' );
