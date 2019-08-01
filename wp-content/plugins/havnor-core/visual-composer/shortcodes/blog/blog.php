<?php
/* ==========================================================
  Blog
=========================================================== */
if ( !function_exists('havnor_blog_function')) {
  function havnor_blog_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'blog_style'  => '',
      'blog_column'  => '',
      'blog_limit'  => '',
      'bg_overlay_color' => '',
      'content_color' => '',
      'content_hover_color' => '',
      'title_color' => '',
      'title_hover_color' => '',
      // Enable & Disable
      'blog_category'  => '',
      'blog_date'  => '',
      'date_format' => '',
      'blog_author'  => '',
      'blog_comments'  => '',
      'blog_pagination'  => '',
      'blog_pagination_type' => '',
      'load_more_btn_txt'   => '',
      // Listing
      'blog_order'  => '',
      'blog_orderby'  => '',
      'blog_show_category'  => '',
      'short_content'  => '',
      'class'  => '',
      // Read More Text
      'read_more_txt'  => '',
      // Blog Six Title Section
      'blog_six_title' =>'',
      'blog_six_subtitle' =>'',
      'need_grid' =>'',
      'need_border' => '',
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
      // Styling
      'section_title_size' => '',
      'section_title_weight' => '',
      'section_title_btm_space' => '',
      'section_title_color' => '',
      'section_sub_title_size' => '',
      'section_sub_title_weight' => '',
      'section_sub_title_color' => '',
      'blog_bg_color' => '',
      'blog_meta_color' => '',
      'blog_meta_hover_color' => '',
    ), $atts));

    // Excerpt
    if (havnor_framework_active()) {
      $excerpt_length = cs_get_option('theme_blog_excerpt');
      $excerpt_length = $excerpt_length ? $excerpt_length : '55';
      if ($short_content) {
        $short_content = $short_content;
      } else {
        $short_content = $excerpt_length;
      }
    } else {
      $short_content = '55';
    }

    $date_format_actual = $date_format ? $date_format : '';

    // Style
    if ($blog_style === 'style-two') {
      $blog_style_class = ' blogs-style-two';
      $o_con = 'style-container';
    } elseif ($blog_style === 'style-three') {
      $blog_style_class = ' blogs-style-three';
      $o_con = 'style-container';
    } elseif ($blog_style === 'style-four') {
      $blog_style_class = ' blogs-style-four';
      $o_con = 'style-container';
    } elseif ($blog_style === 'style-five') {
      $blog_style_class = ' blogs-style-five';
      $o_con = 'style-container';
    } elseif ($blog_style === 'style-six') {
      $blog_style_class = ' blogs-style-six';
      $o_con = 'style-container';
    }  else {
      $blog_style_class = ' hanor-stories';
      $o_con = 'hanor-container';
    }
    // Grid
    if($need_grid){
      $six_grid_column = 'six-item-width col-md-6';
      $g_open = '<div class="six-wrapper">';
      $g_close = '</div>';
    } else {
      $six_grid_column = '';
      $g_open = '';
      $g_close = '';
    }
    // Border
    if($need_border) {
      $border_cls = ' have-border';
    } else {
      $border_cls = ' no-border';
    }

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Button Text Hover Color
    if($section_title_size || $section_title_color || $section_title_weight || $section_title_btm_space) {
      $inline_style .= '.hanor-blog-'. $e_uniqid .' .blogs-style-six .blog-six-content h2 {';
      $inline_style .= ( $section_title_size ) ? 'font-size:'. havnor_core_check_px($section_title_size) .';' : '';
      $inline_style .= ( $section_title_btm_space ) ? 'padding-bottom:'. havnor_core_check_px($section_title_btm_space) .';' : '';
      $inline_style .= ( $section_title_weight ) ? 'font-weight:'. $section_title_weight .';' : '';
      $inline_style .= ( $section_title_color ) ? 'color:'. $section_title_color .';' : '';
      $inline_style .= '}';
    }
    if($section_sub_title_size || $section_sub_title_color || $section_sub_title_weight) {
      $inline_style .= '.hanor-blog-'. $e_uniqid .' .blogs-style-six .blog-six-content p {';
      $inline_style .= ( $section_sub_title_size ) ? 'font-size:'. havnor_core_check_px($section_sub_title_size) .';' : '';
      $inline_style .= ( $section_sub_title_weight ) ? 'font-weight:'. $section_sub_title_weight .';' : '';
      $inline_style .= ( $section_sub_title_color ) ? 'color:'. $section_sub_title_color .';' : '';
      $inline_style .= '}';
    }
    if ( $bg_overlay_color ) {
      $inline_style .= '.hanor-blog-'. $e_uniqid .' .blogs-style-four .blog-item.hanor-hover .blog-info {';
      $inline_style .= ( $bg_overlay_color ) ? 'background-color:'. $bg_overlay_color .';' : '';
      $inline_style .= '}';
    }

    if($title_color) {
      $inline_style .= '.hanor-blog-'. $e_uniqid .' .blogs-style-four .blog-item .blog-title a {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }
    if($title_hover_color) {
      $inline_style .= '.hanor-blog-'. $e_uniqid .' .blogs-style-four .blog-item.hanor-hover .blog-title a {';
      $inline_style .= ( $title_hover_color ) ? 'color:'. $title_hover_color .';' : '';
      $inline_style .= '}';
    }
    if($content_color) {
      $inline_style .= '.hanor-blog-'. $e_uniqid .' .blogs-style-four .blog-item .blog-info p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= '}';
    }
    if($content_hover_color) {
      $inline_style .= '.hanor-blog-'. $e_uniqid .' .blogs-style-four .blog-item.hanor-hover .blog-info p {';
      $inline_style .= ( $content_hover_color ) ? 'color:'. $content_hover_color .';' : '';
      $inline_style .= '}';
    }
    if($blog_bg_color) {
      $inline_style .= '.hanor-blog-'. $e_uniqid .' .blogs-style-four .blog-item .blog-info {';
      $inline_style .= ( $blog_bg_color ) ? 'background-color:'. $blog_bg_color .';' : '';
      $inline_style .= '}';
    }
    if($blog_meta_color) {
      $inline_style .= '.hanor-blog-'. $e_uniqid .' .blogs-style-four .blog-item .blog-info .blog-meta {';
      $inline_style .= ( $blog_meta_color ) ? 'color:'. $blog_meta_color .';' : '';
      $inline_style .= '}';
      $inline_style .= '.hanor-blog-'. $e_uniqid .' .blogs-style-four .blog-item .blog-meta-item:after {';
      $inline_style .= ( $blog_meta_color ) ? 'background:'. $blog_meta_color .';' : '';
      $inline_style .= '}';
    }
    if($blog_meta_hover_color) {
      $inline_style .= '.hanor-blog-'. $e_uniqid .' .blogs-style-four .blog-item.hanor-hover .blog-info .blog-meta, .hanor-blog-'. $e_uniqid .' .blogs-style-four .blog-item.hanor-hover .blog-info .blog-meta a {';
      $inline_style .= ( $blog_meta_hover_color ) ? 'color:'. $blog_meta_hover_color .';' : '';
      $inline_style .= '}';
      $inline_style .= '.hanor-blog-'. $e_uniqid .' .blogs-style-four .blog-item.hanor-hover .blog-meta-item:after {';
      $inline_style .= ( $blog_meta_hover_color ) ? 'background:'. $blog_meta_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-blog-'. $e_uniqid;

    // Carousel Data's
    $carousel_loop = $carousel_loop === 'true' ? ' data-loop="true"' : ' data-loop="false"';
    $carousel_items = $carousel_items ? ' data-items="'. $carousel_items .'"' : ' data-items="2"';
    $carousel_margin = $carousel_margin ? ' data-margin="'. $carousel_margin .'"' : ' data-margin="30"';
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

    // RTL
    if ( is_rtl() ) {
      $switch_rtl = ' data-rtl="true"';
    } else {
      $switch_rtl = ' data-rtl="false"';
    }

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
    $author_by_text = cs_get_option('author_by_text');
    $author_by_text = $author_by_text ? $author_by_text : esc_html__('By', 'havnor');

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
      'posts_per_page' => (int)$blog_limit,
      'category_name' => esc_attr($blog_show_category),
      'orderby' => $blog_orderby,
      'order' => $blog_order
    );
    $load_more_btn_txt = $load_more_btn_txt ? $load_more_btn_txt : esc_html__( 'Load More', 'havnor-core' );
    if($blog_pagination) {
      $pagi_class = 'hanor-post-load-more ';
    } else {
      $pagi_class = '';
    }

    $hanor_post = new WP_Query( $args ); ?>

<!-- Blog Start -->
<div class="hanor-post <?php echo esc_attr($class . $styled_class); ?>">
<div class="<?php echo esc_attr($blog_style_class); ?> <?php echo esc_attr($border_cls); ?>">
  <div class="<?php echo esc_attr($o_con); ?>">
    <div class="row post-wraper hanor-post-load-more" data-select=".post-wraper" data-item=".posts-item" data-paging="<?php echo esc_attr($blog_pagination_type); ?>" data-loading="<?php echo esc_attr($load_more_btn_txt); ?>">
    <?php if($blog_style === 'style-six') { ?>
       <div class="blog-six-content"><h2><?php echo $blog_six_title; ?></h2><p><?php echo $blog_six_subtitle; ?></p></div>
      <?php if($need_grid) { ?>
        <div class="style-six-grid">
      <?php  } else { ?>
        <div class="owl-carousel"
              <?php echo $carousel_loop . $carousel_items . $carousel_margin . $carousel_dots .$carousel_nav. $carousel_autoplay_timeout . $carousel_autoplay . $carousel_animate_out . $carousel_mousedrag . $carousel_autowidth . $carousel_autoheight . $carousel_tablet . $carousel_mobile . $carousel_small_mobile . $switch_rtl; ?>>
         <?php } } else { ?>
          <div class="hanor-post-wrap">
             <?php }
              if ($hanor_post->have_posts()) : while ($hanor_post->have_posts()) : $hanor_post->the_post();
                global $post;
                $havnor_id    = ( isset( $post ) ) ? $post->ID : 0;
                $havnor_meta  = get_post_meta( $havnor_id, 'post_type_metabox', true );
                $post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
                if($havnor_meta){
                  $audio_post = $havnor_meta['audio_post'];
                  $video_post = $havnor_meta['video_post'];
                  $video_post_video_link = $havnor_meta['video_post_video_link'];
                  $gallery_post_format = $havnor_meta['gallery_post_format'];
                } else {
                  $audio_post = '';
                  $video_post = '';
                  $video_post_video_link = '';
                  $gallery_post_format = '';
                }

                // Columns
                if ($blog_column === 'col-2') {
                  $blog_col_class = 'col-md-6 col-sm-6';
                } else {
                  $blog_col_class = 'col-md-4 col-sm-6';
                }
                $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
                $large_image = $large_image[0];

              if ($blog_style === 'style-two' || $blog_style === 'style-three' || $blog_style === 'style-four' || $blog_style === 'style-five' ) {
                if ($blog_column != 'col-2') {
                  if($blog_style === 'style-five'){
                    if(class_exists('Aq_Resize')) {
                      $blog_img = aq_resize( $large_image, '710', '595', true );
                    } else {$blog_img = $large_image;}
                    $featured_img = ( $blog_img ) ? $blog_img : HAVNOR_PLUGIN_IMGS . '/370x310.png';
                  } else {
                    if(class_exists('Aq_Resize')) {
                      $blog_img = aq_resize( $large_image, '370', '310', true );
                    } else {$blog_img = $large_image;}
                    $featured_img = ( $blog_img ) ? $blog_img : HAVNOR_PLUGIN_IMGS . '/370x310.png';
                  }
                } else {
                  if(class_exists('Aq_Resize')) {
                    $blog_img = aq_resize( $large_image, '570', '400', true );
                  } else {$blog_img = $large_image;}
                  $featured_img = ( $blog_img ) ? $blog_img : HAVNOR_PLUGIN_IMGS . '/600x420.png';
                }
              } else {
                if(class_exists('Aq_Resize')) {
                  $blog_img = aq_resize( $large_image, '900', '600', true );
                } else {$blog_img = $large_image;}
                $featured_img = ( $blog_img ) ? $blog_img : $large_image;
              } ?>
              <div id="post-<?php the_ID(); ?>" <?php post_class('hanor-blog-post posts-item'); ?>>
                <?php if ($blog_style === 'style-two' || $blog_style === 'style-three' || $blog_style === 'style-four' || $blog_style === 'style-five' || $blog_style === 'style-six') {
                  if ($blog_style !== 'style-six') { ?>
                  <div class="<?php echo esc_attr($blog_col_class); ?>"> <?php } ?>
                    <div class="blog-item  hanor-item <?php echo $six_grid_column; ?>"> <?php echo $g_open; ?>
                      <?php if ($large_image) { ?>
                      <div class="hanor-image">
                        <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                      </div>
                      <?php } ?>
                      <div class="blog-info">

                      <?php if ($blog_style === 'style-four') { ?>
                        <div class="blog-info-wrap">
                          <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h4>
                          <p><?php
                          if (havnor_framework_active()) {
                            havnor_excerpt($short_content);
                          } else {
                            the_excerpt();
                          }
                          if ( function_exists( 'havnor_wp_link_pages' ) ) {
                            echo havnor_wp_link_pages();
                          }
                          ?></p>
                        </div>
                        <div class="blog-meta">
                          <?php if ( !$blog_author ) { ?><div class="hanor-image"><?php echo get_avatar( get_the_author_meta( 'ID' ), 52 ); ?></div><div class="blog-meta-item"><?php echo $author_by_text; ?> <span class="blog-author-name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></span></div><?php }
                          if ( !$blog_date ) { ?><div class="blog-meta-item"><?php echo get_the_date($date_format_actual); ?></div><?php }
                          if ( !$blog_category ) { ?> <div class="blog-meta-item"><?php echo the_category(', '); ?></div> <?php } ?>
                        </div>

                      <?php } elseif ($blog_style === 'style-two') { ?>
                        <div class="hanor-table-wrap">
                          <div class="hanor-align-wrap bottom">
                            <div class="blog-meta blog-meta-top">
                              <?php if ( !$blog_date ) { ?><div class="blog-meta-item"><?php echo esc_html(get_the_date($date_format_actual)); //HavnorWP ?></div> <?php }
                              if ( !$blog_category ) { ?> <div class="blog-meta-item"><?php echo the_category(', '); ?></div> <?php } ?>
                            </div>
                            <div class="blog-info-wrap">
                              <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h4>
                            </div>
                            <div class="blog-meta">
                              <?php if ( !$blog_author ) { ?><div class="hanor-image"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 52 ); ?></a></div>
                              <div class="blog-meta-item"><?php echo esc_html__( 'By', 'havnor' ); ?> <span class="blog-author-name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html(get_the_author()); ?></a></span></div><?php } ?>
                            </div>
                          </div>
                        </div>
                      <?php } elseif ($blog_style === 'style-five' || $blog_style === 'style-six' ) { ?>
                        <div class="blog-info-wrap">
                          <div class="blog-meta blog-meta-top">
                            <?php if ( !$blog_category ) { ?> <div class="blog-meta-item"><?php echo the_category(', '); ?></div> <?php }
                             if ( !$blog_date ) { ?><div class="blog-meta-item"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo get_the_date($date_format_actual); ?></div> <?php } ?>
                          </div>
                          <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h4>
                          <div class="hanor-link"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $read_more_txt; ?></a></div>
                        </div>
                      <?php } else { ?>
                        <div class="blog-info-wrap">
                          <div class="blog-meta">
                            <?php if ( !$blog_author ) { ?><div class="blog-meta-item"><?php echo $author_by_text; ?> <span class="blog-author-name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></span></div> <?php }
                            if ( !$blog_date ) { ?><div class="blog-meta-item"><?php echo get_the_date($date_format_actual); ?></div> <?php }
                            if ( !$blog_category ) { ?> <div class="blog-meta-item"><?php echo the_category(', '); ?></div> <?php } ?>
                          </div>
                          <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h4>
                        </div>
                        <div class="hanor-link"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $read_more_txt; ?></a></div>
                      <?php } ?>
                      </div>
                      <?php echo $g_close; ?>
                    </div>
                  <?php if ($blog_style !== 'style-six') { ?> </div> <?php }
                } else { ?>
                  <div class="story-item">
                    <?php if(get_post_format() === 'gallery')  {
                      if($gallery_post_format) { ?>
                      <div class="owl-carousel" data-items="1" data-margin="0" data-loop="true" data-nav="true" data-dots="true" data-autoplay="true" data-auto-height="true"<?php echo esc_attr($switch_rtl); ?>>
                        <?php
                          $ids = explode( ',', $gallery_post_format );
                          foreach ( $ids as $id ) {
                            $attachment = wp_get_attachment_image_src( $id, 'fullsize' );
                            $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
                            $g_img = $attachment[0];
                            $post_img = $g_img;
                            echo '<div class="item"><div class="hanor-image"><img src="'. $post_img .'" alt="'. esc_attr($alt) .'" /></div></div>';
                          } ?>
                      </div>
                    <?php } } elseif (get_post_format() === 'audio') { if ($audio_post) { ?>
                      <div class="hanor-iframe">
                        <?php echo $audio_post; ?>
                      </div>
                    <?php } } elseif (get_post_format() === 'video') { if ($large_image) { ?>
                      <div class="hanor-image hanor-video-wrap">
                        <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                        <a href="<?php echo esc_url($video_post_video_link); ?>" class="hanor-video-btn-wrap hanor-popup-video">
                          <img src="<?php echo esc_url(HAVNOR_IMAGES . '/buttons/button3@1x.png'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="73">
                        </a>
                      </div>
                    <?php } else { ?>
                      <div class="hanor-image hanor-video-iframe">
                        <?php echo $video_post; ?> <!-- HavnorWP -->
                      </div>
                    <?php } } else {
                      if ($large_image) { ?>
                      <div class="hanor-image">
                        <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                      </div>
                      <?php }
                    } ?>
                    <div class="story-info">
                      <div class="story-meta">
                        <?php if ( !$blog_author ) { ?><div class="blog-meta-item"><?php echo $author_by_text; ?> <span class="blog-author-name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></span></div> <?php }
                        if ( !$blog_date ) { ?><div class="blog-meta-item"><span class="story-date"><?php echo get_the_date($date_format_actual); ?></span></div> <?php }
                        if ( !$blog_category ) { ?> <div class="blog-meta-item"><?php echo the_category(', '); ?></div> <?php } ?>
                      </div>
                      <h3 class="story-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h3>
                      <p><?php
                      if (havnor_framework_active()) {
                        havnor_excerpt($short_content);
                      } else {
                        the_excerpt();
                      }
                      if ( function_exists( 'havnor_wp_link_pages' ) ) {
                        echo havnor_wp_link_pages();
                      }
                      ?></p>
                      <div class="hanor-btns-group">
                        <a href="<?php echo esc_url( get_permalink() ); ?>" class="hanor-btn hanor-blue-border-btn"><span class="hanor-btn-text"><?php echo $read_more_txt; ?></span></a>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
              <?php
              endwhile;
              endif;
              wp_reset_postdata(); ?>
          </div>

          <?php if ($blog_pagination) { ?>
            <div class="hanor-pagination">
              <?php havnor_custom_paging_nav($hanor_post->max_num_pages,"",$paged); ?>
            </div>
            <?php
          }
            wp_reset_postdata();  // avoid errors further down the page
          ?>
          </div><!-- row -->
        </div><!-- style container -->
      </div><!-- Blog Div -->
    </div>
    <!-- Blog End -->

    <?php
    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'hanor_blog', 'havnor_blog_function' );
