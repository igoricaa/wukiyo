<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$productId = $product -> get_id();
$cart = WC() -> cart -> get_cart();

// TODO - refaktorisi
$subscription_product_cart_item_key = "";
$subscription_product_current_quantity = 0;
$subscription_product_quantity_to_display = 1;
$subscription_product_is_disabled = true;
$subscription_product_is_added = false;

$one_time_product_cart_item_key = "";
$one_time_product_current_quantity = 0;
$one_time_product_quantity_to_display = 1;
$one_time_product_is_disabled = true;
$one_time_product_is_added = false;

foreach ($cart as $cart_item_key => $cart_item) {
	$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

	if ( $cart_item['product_id'] == $productId ) {
		if (class_exists('WC_Subscriptions_Product') && WC_Subscriptions_Product::is_subscription($_product)) {
			$subscription_product_cart_item_key = $cart_item_key;
			$subscription_product_current_quantity = $cart_item['quantity'];

			if ($subscription_product_current_quantity == 0) {
				$subscription_product_quantity_to_display = 1;
				$subscription_product_is_disabled = true;
			} else {
				$subscription_product_quantity_to_display = $subscription_product_current_quantity;
				$subscription_product_is_disabled = false;
				$subscription_product_is_added = true;
			}
		} else {
			$one_time_product_cart_item_key = $cart_item_key;
			$one_time_product_current_quantity = $cart_item['quantity'];

			if ($one_time_product_current_quantity == 0) {
				$one_time_product_quantity_to_display = 1;
				$one_time_product_is_disabled = true;
			} else {
				$one_time_product_quantity_to_display = $one_time_product_current_quantity;
				$one_time_product_is_disabled = false;
				$one_time_product_is_added = true;
			}
		}
	}
};

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>

		<input type="hidden" hidden id="subscription-product-info" data-cart-item-key="<?php echo $subscription_product_cart_item_key;?>" data-current-quantity="<?php echo $subscription_product_current_quantity;?>" data-quantity-to-display="<?php echo $subscription_product_quantity_to_display;?>" data-is-disabled="<?php echo $subscription_product_is_disabled;?>" data-is-added="<?php echo $subscription_product_is_added;?>">
		<input type="hidden" hidden id="one-time-product-info" data-cart-item-key="<?php echo $one_time_product_cart_item_key;?>" data-current-quantity="<?php echo $one_time_product_current_quantity;?>" data-quantity-to-display="<?php echo $one_time_product_quantity_to_display;?>" data-is-disabled="<?php echo $one_time_product_is_disabled;?>" data-is-added="<?php echo $one_time_product_is_added;?>">

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
		<div class="price-and-quantity">
			<p class="product_price <?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
			<div class="quantity_buttons_wrapper">
				<div class="add-to-cart-button">
					<div class="remove remove-final-single-product <?php if ($one_time_product_is_disabled) { echo 'disabled';} ?>" data-productid="<?php echo $productId; ?>" data-operator="remove" data-cart-item-key="<?php echo $product_cart_item_key; ?>">-</div>
					<div class="numberOfProducts product-quantity-<?php echo $productId; ?> fontBold"><?php echo $one_time_product_quantity_to_display; ?></div>
					<div class="add add-final-single-product" data-productid="<?php echo $productId; ?>" data-operator="add" data-cart-item-key="<?php echo $product_cart_item_key; ?>">+</div>
				</div>
			</div>
		</div>

		<div class="add-to-cart-wrapper">
			<button class="single-add-to-cart-button single-product-add-to-cart-button alt"  data-product-current-quantity="<?php echo $one_time_product_current_quantity; ?>" data-productid="<?php echo esc_attr( $product -> get_id() );?>"><?php if ($one_time_product_is_added) { echo "CHECKOUT"; } else { echo esc_html( $product -> single_add_to_cart_text()); }; ?></button>
			<div class="payment-methods-logo-wrapper">
				<img alt="Nootropics logo" src="<?php echo bloginfo('template_url'); ?>/img/nootropics.svg">
				<img class="payments" alt="Payment methods" src="<?php echo bloginfo('template_url'); ?>/img/cards_and_stripe.svg">
			</div>
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>