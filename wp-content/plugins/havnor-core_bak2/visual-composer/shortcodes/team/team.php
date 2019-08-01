<?php
/* Team */
if ( !function_exists('havnor_team_function')) {
  function havnor_team_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'class'  => '',
      // Listing
      'team_style'  => '',
      'need_team_bg' => '',
      'team_bg_image' => '',
      'team_image_border' => '',
      'team_column'  => '',
      'team_limit'  => '',
      'team_order'  => '',
      'team_orderby'  => '',
      'team_id'  => '',
      'team_rounded_image' =>'',
      'team_social_icon' =>'',
      // Style
      'image_bg_color' => '',
      'image_bg_hover_color' => '',
      'info_color' =>'',
      'info_content_color' => '',
      'info_link_color' => '',
      'info_link_hover_color' => '',
      'btm_border_color' =>'',
      'btm_border_hover_color'=>'',
      'name_color' => '',
      'name_hover_color' => '',
      'designation_color' => '',
      'content_color' => '',
      'name_size' => '',
      'name_weight' => '',
      'designation_size' => '',
      'content_size' => '',
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
      'switch_rtl' => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    $image_url = wp_get_attachment_url( $team_bg_image );

    // Stylings
    if($need_team_bg && $team_bg_image) {
      $inline_style .= '.hanor-team-'. $e_uniqid.'.hanor-team .style-seven-width .hanor-image  {';
      $inline_style .= ( $image_url ) ? 'background-image:url('. $image_url .');' : '';
      $inline_style .= '}';
    }
    if($image_bg_color){
      $inline_style .= '.hanor-team-'. $e_uniqid.'.team-style-one .mate-item .hanor-image, .hanor-team-'. $e_uniqid.' .mate-item .hanor-image img, .hanor-team-'. $e_uniqid.'.hanor-team.team-style-five .mate-item .hanor-image img, .hanor-team-'. $e_uniqid.'.hanor-team.team-style-six .mate-item .hanor-image img, .hanor-team-'. $e_uniqid.'.team-style-eight .mate-item .hanor-image img  {';
      $inline_style .= ( $image_bg_color ) ? 'background:'. $image_bg_color .';' : '';
      $inline_style .= '}';
    }
    if($image_bg_hover_color){
      $inline_style .= '.hanor-team-'. $e_uniqid.'.team-style-one .mate-item.hanor-hover .hanor-image  {';
      $inline_style .= ( $image_bg_hover_color ) ? 'background:'. $image_bg_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ($info_color) {
      $inline_style .= '.hanor-team-'. $e_uniqid.'.hanor-team.team-style-five:after, .hanor-team-'. $e_uniqid.'.hanor-team.team-style-five .style-five-width .mate-info  {';
      $inline_style .= ( $info_color ) ? 'background:'. $info_color .';' : '';
      $inline_style .= '}';
    }
    if ($info_content_color) {
      $inline_style .= '.hanor-team-'. $e_uniqid.'.hanor-team.team-style-five .style-five-width .mate-info .mate-name, .hanor-team-'. $e_uniqid.'.hanor-team.team-style-five .style-five-width .mate-info .mate-designation  {';
      $inline_style .= ( $info_content_color ) ? 'color:'. $info_content_color .';' : '';
      $inline_style .= '}';
    }
    if ($info_link_color) {
      $inline_style .= '.hanor-team-'. $e_uniqid.'.hanor-team.team-style-five .style-five-width .mate-info .hanor-social a, .hanor-team-'. $e_uniqid.'.hanor-team.team-style-five .owl-carousel .owl-nav, .hanor-team-'. $e_uniqid.'.hanor-team.team-style-five .style-five-width .mate-info .mate-name a  {';
      $inline_style .= ( $info_link_color ) ? 'color:'. $info_link_color .';' : '';
      $inline_style .= '}';
    }
    if ($info_link_hover_color) {
      $inline_style .= '.hanor-team-'. $e_uniqid.'.hanor-team.team-style-five .style-five-width .mate-info .hanor-social a:hover, .hanor-team-'. $e_uniqid.'.hanor-team.team-style-five .owl-drag .owl-prev:hover:before, .hanor-team-'. $e_uniqid.' .owl-drag .owl-next:hover:before, .hanor-team-'. $e_uniqid.'.hanor-team.team-style-five .style-five-width .mate-info .mate-name a:hover {';
      $inline_style .= ( $info_link_hover_color ) ? 'color:'. $info_link_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Image Bottom border color
    if ($btm_border_color) {
      $inline_style .= '.hanor-team-'. $e_uniqid.'.hanor-team.team-style-one .hanor-image  {';
      $inline_style .= ( $btm_border_color ) ? 'border-bottom-color:'. $btm_border_color .';' : '';
      $inline_style .= '}';
    }
     // Image Bottom hover border color
    if ($btm_border_hover_color) {
      $inline_style .= '.hanor-team-'. $e_uniqid.'.hanor-team.team-style-one .mate-item:hover .hanor-image  {';
      $inline_style .= ( $btm_border_hover_color ) ? 'border-bottom-color:'. $btm_border_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Name
    if($name_size || $name_color || $name_weight) {
      $inline_style .= '.hanor-team-'. $e_uniqid .' .mate-name a {';
      $inline_style .= ( $name_size ) ? 'font-size:'. havnor_core_check_px($name_size) .';' : '';
      $inline_style .= ( $name_weight ) ? 'font-weight:'. $name_weight .';' : '';
      $inline_style .= ( $name_color ) ? 'color:'. $name_color .';' : '';
      $inline_style .= '}';
    }
    if($name_hover_color) {
      $inline_style .= '.hanor-team-'. $e_uniqid .' .mate-name a:hover {';
      $inline_style .= ( $name_hover_color ) ? 'color:'. $name_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Designation
    if($designation_size || $designation_color) {
      $inline_style .= '.hanor-team-'. $e_uniqid .' .mate-info h5, .hanor-team-'. $e_uniqid .' .testimonial-author .mate-designation, .hanor-team-'. $e_uniqid .'.team-style-four .mate-info h5, .hanor-team-'. $e_uniqid .' .style-seven-width h5.mate-designation {';
      $inline_style .= ( $designation_size ) ? 'font-size:'. havnor_core_check_px($designation_size) .';' : '';
      $inline_style .= ( $designation_color ) ? 'color:'. $designation_color .';' : '';
      $inline_style .= '}';
    }

    // Content
    if($content_size || $content_color) {
      $inline_style .= '.hanor-team-'. $e_uniqid .' .mate-info p, .hanor-team-'. $e_uniqid .' .testimonial-author-quote p, .hanor-team-'. $e_uniqid .'.team-style-one .mate-item .mate-info p {';
      $inline_style .= ( $content_size ) ? 'font-size:'. havnor_core_check_px($content_size) .';' : '';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= '}';
    }

    // Add inline style
    add_inline_style( $inline_style );
    $styled_class  = 'hanor-team-'. $e_uniqid;

    // Turn output buffer on
    ob_start();

    if($need_team_bg) {
      $bg_img_class = ' hav-bg-img';
    } else {
      $bg_img_class = '';
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

    if ($team_id) {
      $team_id = explode(',',$team_id);
    } else {
      $team_id = '';
    }

    $args = array(
      'paged' => $my_page,
      'post_type' => 'team',
      'posts_per_page' => (int)$team_limit,
      'orderby' => $team_orderby,
      'order' => $team_order,
      'post__in' => $team_id,
    );

    $havnor_team_qury = new WP_Query( $args );

    if ($havnor_team_qury->have_posts()) :

    if($team_style === 'two') {
      $style_class = ' team-style-three';
    } elseif ($team_style === 'three') {
      $style_class = ' team-style-two';
    } elseif ($team_style === 'four') {
      $style_class = ' team-style-four';
    } elseif ($team_style === 'five') {
      $style_class = ' team-style-five';
    } elseif ($team_style === 'six') {
      $style_class = ' team-style-six';
    } elseif ($team_style === 'seven') {
      $style_class = ' team-style-seven';
    } elseif ($team_style === 'eight') {
      $style_class = ' team-style-eight';
    } else {
      $style_class = ' team-style-one';
    }

    if ($team_column === 'col-3') {
      $team_column_class = 'col-sm-4';
    } else {
      $team_column_class = 'col-md-3 col-sm-4';
    }

     // Drop Shadow
    if ($team_rounded_image) {
      $rounded_class = 'team-round-image';
    } else {
      $rounded_class = '';
    }
    // Image Border
    if($team_image_border) {
      $border_class = ' have-img-border';
    } else {
      $border_class = ' no-img-border';
    }

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
    // RTL
    if ( is_rtl() ) {
      $switch_rtl = ' data-rtl="true"';
    } else {
      $switch_rtl = ' data-rtl="false"';
    }

    ?>
    <div class="hanor-team<?php echo esc_attr($style_class);?> <?php echo esc_attr($rounded_class); ?> <?php echo esc_attr($styled_class); ?> <?php echo esc_attr($border_class); ?>">
      <?php if($team_style === 'five') { ?>
        <div class="container">
        <div class="owl-carousel" <?php echo $carousel_loop . $carousel_items . $carousel_margin . $carousel_dots .$carousel_nav. $carousel_autoplay_timeout . $carousel_autoplay . $carousel_animate_out . $carousel_mousedrag . $carousel_autowidth . $carousel_autoheight . $carousel_tablet . $carousel_mobile . $carousel_small_mobile . $switch_rtl; ?>>
      <?php } elseif ($team_style === 'three') { ?>
      <div class="flexslider thumb-flexslider">
        <ul class="slides">
        <?php while ($havnor_team_qury->have_posts()) : $havnor_team_qury->the_post();
        // Featured Image
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $alt_text = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
        $large_image = $large_image[0];
        if(class_exists('Aq_Resize')) {
          $team_img = aq_resize( $large_image, '300', '300', true );
          $team_featured_img = ( $team_img ) ? $team_img : HAVNOR_PLUGIN_IMGS . '/56x56.png';
        }
        ?>
          <li><div class="hanor-image"><img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_attr($alt_text); ?>"></div></li>
        <?php endwhile; ?>
        </ul>
      </div>
      <div class="flexslider main-flexslider">
        <ul class="slides">
      <?php } else { ?>
        <div class="row">
        <?php }
        while ($havnor_team_qury->have_posts()) : $havnor_team_qury->the_post();
        // Featured Image
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $large_image = $large_image[0];
        $abt_title = get_the_title();

        if ($team_style === 'two') {
          if(class_exists('Aq_Resize')) {
            $team_img = aq_resize( $large_image, '410', '410', true );
            $team_featured_img = ( $team_img ) ? $team_img : HAVNOR_PLUGIN_ASTS . '/images/235x235.png';
          } else {$team_featured_img = $large_image;}
        } elseif ($team_style === 'three') {
          if(class_exists('Aq_Resize')) {
            $team_img = aq_resize( $large_image, '410', '520', true );
            $team_featured_img = ( $team_img ) ? $team_img : HAVNOR_PLUGIN_ASTS . '/images/410x520.png';
          } else {$team_featured_img = $large_image;}
        } elseif ($team_style === 'four') {
          if(class_exists('Aq_Resize')) {
            $team_img = aq_resize( $large_image, '410', '520', true );
            $team_featured_img = ( $team_img ) ? $team_img : HAVNOR_PLUGIN_ASTS . '/images/410x520.png';
          } else {$team_featured_img = $large_image;}
        } elseif ($team_style === 'six') {
          if(class_exists('Aq_Resize')) {
            $team_img = aq_resize( $large_image, '400', '450', true );
            $team_featured_img = ( $team_img ) ? $team_img : HAVNOR_PLUGIN_ASTS . '/images/410x520.png';
          } else {$team_featured_img = $large_image;}
        } elseif ($team_style === 'seven') {
          if(class_exists('Aq_Resize')) {
            $team_img = aq_resize( $large_image, '400', '500', true );
            $team_featured_img = ( $team_img ) ? $team_img : HAVNOR_PLUGIN_ASTS . '/images/410x520.png';
          } else {$team_featured_img = $large_image;}
        } elseif ($team_style === 'eight') {
          if(class_exists('Aq_Resize')) {
            $team_img = aq_resize( $large_image, '410', '467', true );
            $team_featured_img = ( $team_img ) ? $team_img : HAVNOR_PLUGIN_ASTS . '/images/410x520.png';
          } else {$team_featured_img = $large_image;}
        } else {
          if ($team_rounded_image) {
            if(class_exists('Aq_Resize')) {
              $team_img = aq_resize( $large_image, '207', '207', true );
              $team_featured_img = ( $team_img ) ? $team_img : HAVNOR_PLUGIN_ASTS . '/images/270x370.png';
            } else {$team_featured_img = $large_image;}
          } else {
          if(class_exists('Aq_Resize')) {
            $team_img = aq_resize( $large_image, '410', '520', true );
            $team_featured_img = ( $team_img ) ? $team_img : HAVNOR_PLUGIN_ASTS . '/images/270x370.png';
          } else {$team_featured_img = $large_image;} }
        }
        // Link
        $team_options = get_post_meta( get_the_ID(), 'team_options', true );
        $team_pro = $team_options['team_job_position'];
        $team_socials = $team_options['social_icons'];

        if ($team_style === 'seven') { ?>
        <div class="style-seven-width">
        <div class="container">
          <div class="mate-item">
            <div class="col-md-6 hanor-item team-seven-img <?php echo esc_attr($bg_img_class); ?>">
              <div class="hanor-image">
                <?php if ($large_image) { ?>
                <a href="<?php echo esc_url( get_permalink() ); ?>">
                <img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_attr($abt_title); ?>">
                </a>
                <?php } ?>
              </div>
            </div>
            <div class="col-md-6 hanor-item">
            <div class="hanor-table-wrap">
            <div class="hanor-align-wrap">
              <div class="mate-info">
                <?php if ($team_pro) { ?>
                  <h5 class="mate-designation"><?php echo $team_pro; ?></h5>
                <?php }  ?>
                <h4 class="mate-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $abt_title; ?></a></h4>
                <p><?php the_excerpt(); ?></p>
                <div class="hanor-social rounded">
                  <?php if ( ! empty( $team_socials ) ) {
                    foreach ( $team_socials as $social ) { ?>
                    <a href="<?php echo esc_url($social['icon_link']); ?>" target="_blank"><i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i></a>
                  <?php } } ?>
                </div>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <?php } elseif ($team_style === 'eight') { ?>
        <div class="<?php echo esc_attr($team_column_class); ?>">
          <div class="mate-item hanor-item ">
            <div class="hanor-image">
              <?php if ($large_image) { ?>
              <img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_attr($abt_title); ?>">
              <?php } ?>
              <div class="hanor-social">
                <?php if ( ! empty( $team_socials ) ) {
                  foreach ( $team_socials as $social ) { ?>
                  <a href="<?php echo esc_url($social['icon_link']); ?>" target="_blank"><i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i> <?php echo esc_html($social['icon_text']); ?></a>
                <?php } } ?>
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="team-eight-plus-icon"></a>
              </div>
            </div>
            <div class="mate-info">
              <h4 class="mate-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $abt_title; ?></a></h4>
              <?php if ($team_pro) { ?>
                <h5 class="mate-designation"><?php echo $team_pro; ?></h5>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php } elseif ($team_style === 'five') { ?>
        <div class="style-five-width">
          <div class="mate-item hanor-item ">
            <div class="hanor-image">
            <?php if ($large_image) { ?>
            <a href="<?php echo esc_url( get_permalink() ); ?>">
            <img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_attr($abt_title); ?>">
            </a>
            <?php } ?>
              <div class="mate-info">
                <h4 class="mate-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $abt_title; ?></a></h4>
                <?php if ($team_pro) { ?>
                  <h5 class="mate-designation"><?php echo $team_pro; ?></h5>
                <?php }  ?>
                <div class="hanor-social">
                  <?php if ( ! empty( $team_socials ) ) {
                    foreach ( $team_socials as $social ) { ?>
                    <a href="<?php echo esc_url($social['icon_link']); ?>" target="_blank"><i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i></a>
                  <?php } } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } elseif ($team_style === 'four') { ?>
        <div class="style-four-width">
          <div class="mate-item hanor-item ">
            <div class="hanor-image">
            <?php if ($large_image) { ?>
            <a href="<?php echo esc_url( get_permalink() ); ?>">
            <img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_attr($abt_title); ?>">
            </a>
            <?php } ?>
              <div class="mate-info">
                <h4 class="mate-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $abt_title; ?></a></h4>
                <?php if ($team_pro) { ?>
                  <h5 class="mate-designation"><?php echo $team_pro; ?></h5>
                <?php }  ?>
                <div class="hanor-social">
                  <?php if ( ! empty( $team_socials ) ) {
                    foreach ( $team_socials as $social ) { ?>
                    <a href="<?php echo esc_url($social['icon_link']); ?>" target="_blank"><i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i></a>
                  <?php } } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } elseif ($team_style === 'three') { ?>
        <li>
          <div class="testimonial-author-image hanor-item">
            <div class="hanor-table-wrap">
              <div class="hanor-align-wrap bottom">
                <div class="hanor-image"><a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_attr($abt_title); ?>"></a></div>
              </div>
            </div>
          </div>
          <div class="testimonial-author-quote hanor-item">
            <div class="hanor-table-wrap">
              <div class="hanor-align-wrap">
                <div class="testimonial-author">
                  <h4 class="mate-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $abt_title; ?></a></h4>
                  <h5 class="mate-designation"><?php echo $team_pro; ?></h5>
                </div>
                <p><?php the_excerpt(); ?></p>
                <div class="hanor-social">
                  <?php if ( ! empty( $team_socials ) ) {
                    foreach ( $team_socials as $social ) { ?>
                    <a href="<?php echo esc_url($social['icon_link']); ?>" target="_blank"><i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i></a>
                  <?php } } ?>
                </div>
              </div>
            </div>
          </div>
        </li>
        <?php } elseif ($team_style === 'six') { ?>
        <div class="col-md-6">
          <div class="mate-item ">
            <div class="hanor-image hanor-item">
              <?php if ($large_image) { ?>
              <a href="<?php echo esc_url( get_permalink() ); ?>">
              <img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_attr($abt_title); ?>">
              </a>
              <?php } ?>
            </div>
            <div class="mate-info hanor-item">
              <h4 class="mate-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $abt_title; ?></a></h4>
                <h5 class="mate-designation"><?php echo $team_pro; ?></h5>
                <p><?php the_excerpt(); ?></p>
              <div class="hanor-social">
                <?php if ( ! empty( $team_socials ) ) {
                  foreach ( $team_socials as $social ) { ?>
                  <a href="<?php echo esc_url($social['icon_link']); ?>" target="_blank"><i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i></a>
                <?php } } ?>
              </div>
            </div>
          </div>
        </div>
        <?php } else { ?>
        <div class="<?php echo esc_attr($team_column_class); ?>">
          <div class="mate-item hanor-item ">
            <div class="hanor-image">
            <?php if ($large_image) { ?>
            <a href="<?php echo esc_url( get_permalink() ); ?>">
            <img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_attr($abt_title); ?>">
            </a>
            <?php } ?>
            </div>
            <div class="mate-info">
              <h4 class="mate-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $abt_title; ?></a></h4>
              <?php if ($team_pro) { ?>
                <h5 class="mate-designation"><?php echo $team_pro; ?></h5>
              <?php }   if($team_style === 'two') {} else{ ?>
              <p><?php the_excerpt(); ?></p>
              <?php } if($team_social_icon) {} else { ?>
              <div class="hanor-social">
                <?php if ( ! empty( $team_socials ) ) {
                  foreach ( $team_socials as $social ) { ?>
                  <a href="<?php echo esc_url($social['icon_link']); ?>" target="_blank"><i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i></a>
                <?php } } ?>
              </div> <?php } ?>
            </div>
          </div>
        </div>
        <?php } endwhile;
        if($team_style === 'five') { ?></div> </div>
       <?php } elseif ($team_style === 'three') { ?>
          </ul>
        </div>
      <?php } else { ?>
        </div>
      <?php } ?>
    </div>
 <!-- Team End -->
<?php
  endif;
  wp_reset_postdata();
  // Return outbut buffer
  return ob_get_clean();
  }
}
add_shortcode( 'havnor_team', 'havnor_team_function' );
