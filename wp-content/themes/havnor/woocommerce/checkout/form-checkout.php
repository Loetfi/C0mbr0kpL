<?php
/**
 * VictorTheme Custom Changes - Added .col2-set class at .woocommerce-checkout-review-order / Wrap billing & shipping address in col-1 / Wrap Order review in col-2
 */

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', esc_html__( 'You must be logged in to checkout.', 'havnor' ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
		<!-- Custom Change: Removed col-2 div and wrapped billing & shipping in col-1 -->
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' );
				 do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' );
		 endif; ?>

			<!-- Custom Changes: Added col-2 div -->
			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
				<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'havnor' ); ?></h3><!-- Custom Changes: _e to esc_html_e -->
				<div id="order_review" class="woocommerce-checkout-review-order col2-set">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>
				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
			</div>
</div>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
