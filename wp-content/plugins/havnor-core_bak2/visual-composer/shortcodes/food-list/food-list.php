<?php
/* ==========================================================
  Food List
=========================================================== */
if ( !function_exists('havnor_food_list_function')) {
  function havnor_food_list_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'food_menu_style'  => '',
      'food_menu_limit'  => '',
      'food_menu_order'  => '',
      'food_menu_orderby'  => '',
      'title_link' => '',
      'category_link' => '',
      'open_link' => '',
      'food_menu_show_category'  => '',
      'food_menu_show_id'  => '',
      'hide_categories'  => '',
      'hide_contents'  => '',
      'class'  => '',
      // Style
      'title_color' => '',
      'title_hover_color' => '',
      'title_size' => '',
      'cat_color' => '',
      'cat_hover_color' => '',
      'cat_size' => '',
      'price_color' => '',
      'price_size' => '',
    ), $atts));

    $open_link = $open_link ? ' target="_blank"' : '';

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $title_size || $title_color ) {
      $inline_style .= '.hanor-food-menu-'. $e_uniqid .'.roch-food-menu-row .roch-custom-col .roch-food-menu-list-single-item .roch-food-menu-title, .hanor-food-menu-'. $e_uniqid .' .roch-food-menu-list-single-item .food-menu-list-single-text {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $title_hover_color ) {
      $inline_style .= '.hanor-food-menu-'. $e_uniqid .' .roch-food-menu-list-single-item .food-menu-list-single-text:hover .roch-food-menu-title {';
      $inline_style .= ( $title_hover_color ) ? 'color:'. $title_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $cat_size || $cat_color ) {
      $inline_style .= '.hanor-food-menu-'. $e_uniqid .' .roch-slash-meta li a, .hanor-food-menu-'. $e_uniqid .' .roch-remove-defult-list-style {';
      $inline_style .= ( $cat_color ) ? 'color:'. $cat_color .';' : '';
      $inline_style .= ( $cat_size ) ? 'font-size:'. havnor_core_check_px($cat_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $cat_hover_color ) {
      $inline_style .= '.hanor-food-menu-'. $e_uniqid .' .roch-slash-meta li a:hover {';
      $inline_style .= ( $cat_hover_color ) ? 'color:'. $cat_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $price_size || $price_color ) {
      $inline_style .= '.hanor-food-menu-'. $e_uniqid .' .roch-food-menu-list-single-item .food-menu-list-single-text .roch-food-menu-price em {';
      $inline_style .= ( $price_color ) ? 'color:'. $price_color .';' : '';
      $inline_style .= ( $price_size ) ? 'font-size:'. havnor_core_check_px($price_size) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-food-menu-'. $e_uniqid;

    // Output
    ob_start();

    $food_menu_limit = ($food_menu_limit) ? $food_menu_limit : -1;

    $args = array(
      // other query params here,
      'posts_per_page' => (int)$food_menu_limit,
      'foodmenu_cat' => esc_attr($food_menu_show_category),
    );

    $args['post_type'] = 'product';

    if($food_menu_show_id){
      $integerIDs = array_map('intval', explode(',', $food_menu_show_id));
      $args['post__in'] = $integerIDs;
    }

    if($food_menu_style === 'all-id'){
      $args['orderby'] = $food_menu_orderby;
      $args['order'] = $food_menu_order;
    } else {
      $args['orderby'] = 'post__in';
      $args['order'] = 'DESC';
    }

    $food_menu_post = new WP_Query( $args );

    if ($food_menu_post->have_posts()) :
      echo '<div class="roch-food-menu-row text-left '. esc_attr($class) .' '.$styled_class.'">';
      while ($food_menu_post->have_posts()) : $food_menu_post->the_post();
      $info = get_post_meta( get_the_ID(), 'foodmenu_options', true );
    ?>
    <!--  Food menu single item start \-->
    <div class="roch-custom-col">
      <div class="roch-food-menu-list-single-item">
        <?php
          $link = get_the_permalink();
          $link_class = '';
          
        if(!$title_link) {
        ?>
        <span class="food-menu-list-single-text <?php echo esc_attr( $link_class ); ?>">
          <span class="roch-food-menu-title"><?php the_title();
              wc_get_template( 'single-product/sale-flash.php' );
            ?>
          </span>
          <span class="roch-food-menu-dots"></span><!--food menu dots -->
          <span class="roch-food-menu-price"><!--food menu dots -->
            <em><?php
                global $woocommerce, $product;
                $currency = get_woocommerce_currency_symbol();
                $price = get_post_meta( get_the_ID(), '_regular_price', true);
                echo $currency . $price;
            ?></em>
          </span>
        </span><!--/  end-->

        <?php } else { ?>
        <a href="<?php echo esc_url( $link ); ?>" <?php echo $open_link; ?> class="food-menu-list-single-text <?php echo esc_attr( $link_class ); ?>">
          <span class="roch-food-menu-title"><?php the_title();
              wc_get_template( 'single-product/sale-flash.php' ); 
            ?>
          </span>
          <span class="roch-food-menu-dots"></span><!--food menu dots -->
          <span class="roch-food-menu-price"><!--food menu dots -->
            <em><?php
                global $woocommerce, $product;
                $currency = get_woocommerce_currency_symbol();
                $price = get_post_meta( get_the_ID(), '_regular_price', true);
                echo $currency . $price;
            ?></em>
          </span>
        </a><!--/  end-->

        <?php } if (!$hide_contents && has_excerpt()) { echo '<p class="no-margin">'. get_the_excerpt() .'</p>'; }
        if (!$hide_categories) { ?>
        <!--  Food menu single item  list meta start \-->
        <div class="roch-food-menu-list-meta">
          <ul class="roch-remove-defult-list-style roch-slash-meta roch-food-menu-list-meta">
            <?php
                $terms = get_the_terms( get_the_ID(), 'product_cat' );
                foreach ( $terms as $term ) {
                  if(!$category_link){
                    echo '<li><span>'.$term->name.'</span></li>';
                  } else {
                    echo '<li><a href="'.esc_url( get_term_link( $term->slug, 'product_cat' ) ).'" '.$open_link.'>'.$term->name.'</a></li>';
                  }
                }
            ?>
          </ul>
        </div><!--/  end-->
        <?php } ?>
      </div><!--/  end-->
    </div><!--/  end-->
    <?php
    endwhile;
    echo '</div>';
    endif;
    wp_reset_postdata();
    $output = ob_get_clean();
    return $output;
  }
}
add_shortcode( 'havnor_food_list', 'havnor_food_list_function' );
