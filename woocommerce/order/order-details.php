<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.8.0
 *
 * @var bool $show_downloads Controls whether the downloads table should be rendered.
 */

// phpcs:disable WooCommerce.Commenting.CommentHooks.MissingHookComment


defined('ABSPATH') || exit;

$order = wc_get_order($order_id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if (!$order) {
	return;
}

$order_items = $order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));
$show_purchase_note = $order->has_status(apply_filters('woocommerce_purchase_note_order_statuses', array('completed', 'processing')));
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads = $order->get_downloadable_items();
$show_downloads = $order->has_downloadable_item() && $order->is_download_permitted();

if ($show_downloads) {
	wc_get_template(
		'order/order-downloads.php',
		array(
			'downloads' => $downloads,
			'show_title' => true,
		)
	);
}
?>
<section class="woocommerce-order-details">
	<?php do_action('woocommerce_order_details_before_order_table', $order); ?>

	<h3 class="my-acc-section-header woocommerce-order-details__title">
		<?php esc_html_e('Order details', 'woocommerce'); ?>
	</h3>
	<?php
	// TODO: proveri do_action sta radi
	// do_action( 'woocommerce_order_details_before_order_table_items', $order );	
	$order_quantity = $order->get_item_count();
	$order_shipping_cost = $order->get_shipping_total();
	$order_shipping_method = $order->get_shipping_method();
	$order_subtotal = $order->get_subtotal();
	$order_payment_method = $order->get_payment_method_title();
	?>

	<div class="my-order">
		<p><span>Products: </span>
			<?php foreach ($order_items as $item_id => $item) {
				$product = $item->get_product();
				$product_quantity = $item->get_quantity();
				$product_name = $item->get_name();
				?>
				Wukiyo <?php echo $product_name; ?>&reg; x<?php echo $product_quantity; ?>,
			<?php } ?>
		</p>

		<p><span>Quantity: </span><?php echo $order_quantity; ?></p>
		<p><span>Subtotal: </span>$<?php echo $order_subtotal; ?></p>
		<p><span>Shipping: </span>$<?php echo $order_shipping_cost; ?> via <?php echo $order_shipping_method; ?></p>
		<p><span>Payment method: </span><?php echo $order_payment_method; ?></p>
		<p>Total: $<?php echo $order->get_total(); ?></p>
	</div>
</section>

<?php
/**
 * Action hook fired after the order details.
 *
 * @since 4.4.0
 * @param WC_Order $order Order data.
 */
do_action('woocommerce_after_order_details', $order);

if ($show_customer_details) {
	wc_get_template('order/order-details-customer.php', array('order' => $order));
}
