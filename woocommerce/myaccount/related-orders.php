<?php
/**
 * Related Orders table on the View Subscription page
 *
 * @author   Prospress
 * @category WooCommerce Subscriptions/Templates
 * @version  7.3.0 - Migrated from WooCommerce Subscriptions v2.6.2
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>
<header>
	<h3 class="my-acc-section-header"><?php esc_html_e('Related orders', 'woocommerce-subscriptions'); ?></h3>
</header>

<?php foreach ($subscription_orders as $subscription_order):
	$order = wc_get_order($subscription_order);

	if (!$order) {
		continue;
	}

	$item_count = $order->get_item_count();
	$order_date = $order->get_date_created();
	?>
	<div>
		<p class="mb-0"><span>Order Date: </span><time datetime="<?php echo esc_attr($order_date->date('Y-m-d')); ?>"
				title="<?php echo esc_attr($order_date->getTimestamp()); ?>"><?php echo wp_kses_post($order_date->date_i18n(wc_date_format())); ?></time>
		</p>
		<p class="mb-0"><span>Status: </span><?php echo esc_html(wc_get_order_status_name($order->get_status())); ?>
		</p>
		<p class="mb-0"><span>Subtotal: </span><?php echo $order->get_subtotal(); ?></p>
		<p class="mb-0"><span>Quantity: </span><?php echo $order->get_item_count(); ?></p>
		<p class="mb-0">Total: $<?php echo $order->get_total(); ?></p>
		<a class="mb-0 my-acc-action" href="<?php echo esc_url($order->get_view_order_url()); ?>">View</a>
	</div>

<?php endforeach; ?>

<?php do_action('woocommerce_subscription_details_after_subscription_related_orders_table', $subscription); ?>