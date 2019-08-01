<?php
/*
 * All WooCommerce Related Functions
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

if ( class_exists( 'WooCommerce' ) ) {

	// Remove Ordering
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

	// Remove Result Count
	remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

	// Remove title for taking out from img a tag
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10, 2 ); 

	// Remove price for wrap title and price into single div
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

	// Remove button for interchange title price and button
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

if ( ! function_exists( 'woocommerce_catalog_ordering' ) ) {

	/**
	 * Output the product sorting options.
	 */
	function havnor_woocommerce_catalog_ordering() {
		if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
			return;
		}
		$show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
		$catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
			'menu_order' => esc_html__( 'Default sorting', 'havnor' ),
			'popularity' => esc_html__( 'Sort by popularity', 'havnor' ),
			'rating'     => esc_html__( 'Sort by average rating', 'havnor' ),
			'date'       => esc_html__( 'Sort by newness', 'havnor' ),
			'price'      => esc_html__( 'Sort by price: low to high', 'havnor' ),
			'price-desc' => esc_html__( 'Sort by price: high to low', 'havnor' ),
		) );

		$default_orderby = wc_get_loop_prop( 'is_search' ) ? 'relevance' : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', '' ) );
		$orderby         = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : $default_orderby; // WPCS: sanitization ok, input var ok, CSRF ok.

		if ( wc_get_loop_prop( 'is_search' ) ) {
			$catalog_orderby_options = array_merge( array( 'relevance' => esc_html__( 'Relevance', 'havnor' ) ), $catalog_orderby_options );

			unset( $catalog_orderby_options['menu_order'] );
		}

		if ( ! $show_default_orderby ) {
			unset( $catalog_orderby_options['menu_order'] );
		}

		if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
			unset( $catalog_orderby_options['rating'] );
		}

		if ( ! array_key_exists( $orderby, $catalog_orderby_options ) ) {
			$orderby = current( array_keys( $catalog_orderby_options ) );
		}

		wc_get_template( 'loop/orderby.php', array(
			'catalog_orderby_options' => $catalog_orderby_options,
			'orderby'                 => $orderby,
			'show_default_orderby'    => $show_default_orderby,
		) );
	}
}
add_action( 'havnor_woocommerce_before_shop_loop', 'havnor_woocommerce_catalog_ordering', 30 );

// Result Count
if ( ! function_exists( 'woocommerce_result_count' ) ) {

	/**
	 * Output the result count text (Showing x - x of x results).
	 */
	function havnor_woocommerce_result_count() {
		if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
			return;
		}
		$args = array(
			'total'    => wc_get_loop_prop( 'total' ),
			'per_page' => wc_get_loop_prop( 'per_page' ),
			'current'  => wc_get_loop_prop( 'current_page' ),
		);

		wc_get_template( 'loop/result-count.php', $args );
	}
}
add_action( 'havnor_woocommerce_before_shop_loop', 'havnor_woocommerce_result_count', 30 );


add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
/**
 * woo_hide_page_title
 *
 * Removes the "shop" title on the main shop page
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
function woo_hide_page_title() {
	return false;
}

// Adding product title and link
if ( ! function_exists( 'havnor_woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function havnor_woocommerce_template_loop_product_title() {

		/**
		 * Get the product price for the loop.
		 */
		global $product;

		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

		global $product;
		if ( $price_html = $product->get_price_html() ) : ?>
		<?php $pro_price = '<span class="price">'.$price_html.'</span>';
		else:
			$pro_price = '';
	 endif; 

		echo '<div class="hanor-title-price"><a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><h2 class="woocommerce-loop-product__title">' . esc_html(get_the_title()) . '</h2></a>'.$pro_price.'</div>';
	}
}
add_action( 'havnor_woocommerce_shop_loop_product_title', 'havnor_woocommerce_template_loop_product_title', 30 );


// Add button for interchanging the title price and button div structure
if ( ! function_exists( 'havnor_woocommerce_template_loop_add_to_cart' ) ) {

	/**
	 * Get the add to cart template for the loop.
	 *
	 * @param array $args Arguments.
	 */
	function havnor_woocommerce_template_loop_add_to_cart( $args = array() ) {
		global $product;

		if ( $product ) {
			$defaults = array(
				'quantity'   => 1,
				'class'      => implode( ' ', array_filter( array(
					'button',
					'product_type_' . $product->get_type(),
					$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
					$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
				) ) ),
				'attributes' => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
			);

			$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

			if ( isset( $args['attributes']['aria-label'] ) ) {
				$args['attributes']['aria-label'] = strip_tags( $args['attributes']['aria-label'] );
			}

			wc_get_template( 'loop/add-to-cart.php', $args );
		}
	}
}
	add_action( 'havnor_woocommerce_after_shop_loop_item', 'havnor_woocommerce_template_loop_add_to_cart', 10 );

	// Changed WooCommerce Default Pagination next & prev icons
	add_filter( 'woocommerce_pagination_args' , 'havnor_override_pagination_args' );
	function havnor_override_pagination_args( $args ) {
		$args['prev_text'] = '<i class="fa fa-angle-left"></i>';
		$args['next_text'] = ' <i class="fa fa-angle-right"></i>';
		return $args;
	}

	/** 
	* remove on single product panel 'description' since it already says it on tab.
	*/
	add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
	function remove_product_description_heading() {
		return '';
	}

	/** 
	* remove on single product panel 'Additional Information' since it already says it on tab.
	*/
	add_filter('woocommerce_product_additional_information_heading', 'isa_product_additional_information_heading');

	function isa_product_additional_information_heading() {
	echo '';
	}

	// Single Product Single/Gallery Script
	add_action( 'after_setup_theme', 'havnor_single_product_gallery_image' );
	function havnor_single_product_gallery_image() {
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	// Change number or products per row to 3
	add_filter('loop_shop_columns', 'loop_columns');
	if (!function_exists('loop_columns')) {
		function loop_columns() {
			return cs_get_option('woo_product_columns', '3'); // 3 products per row
		}
	}

	// WooCommerce Products per Page Limit
	add_filter( 'loop_shop_per_page', 'havnor_product_limit', 20 );
	if ( ! function_exists('havnor_product_limit') ) {
	  function havnor_product_limit() {
	    $woo_limit = cs_get_option('theme_woo_limit');
	    $woo_limit = $woo_limit ? $woo_limit : '9';
	    return $woo_limit;
	  }
	}

	// Single Product Page - Related Products Limit
	add_filter( 'woocommerce_output_related_products_args', 'havnor_related_products_args' );
  function havnor_related_products_args( $args ) {
  	$woo_related_limit = cs_get_option('woo_related_limit');
  	if ($woo_related_limit) {
			$args['posts_per_page'] = (int)$woo_related_limit; // 4 related products
		} else {
			$args['posts_per_page'] = 3; // 4 related products
		}
		return $args;
	}

	// Remove You May Also Like section
  $woo_single_upsell = cs_get_option('woo_single_upsell');
  if($woo_single_upsell) {
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
	}

	// Remove Related Products section
  $woo_single_related = cs_get_option('woo_single_related');
  if($woo_single_related) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
  }

	/**
	* @snippet       Add "Quantity" Label in front of Add to Cart Button - WooCommerce
	* @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
	* @sourcecode    https://businessbloomer.com/?p=21986
	* @author        Rodolfo Melogli
	* @testedwith    WC 3.4.2
	*/
 
	add_action( 'woocommerce_before_add_to_cart_quantity', 'havnor_echo_qty_front_add_cart' );
	 
	function havnor_echo_qty_front_add_cart() {
	 echo '<div class="qty">'.esc_html__('Quantity:','havnor').'</div>'; 
	}

	// Product thumbnail column set to 1
	add_filter( 'woocommerce_product_thumbnails_columns', 'havnor_single_gallery_columns', 99 );
	function havnor_single_gallery_columns() {
	 return 1; 
	}

} // class_exists => WooCommerce