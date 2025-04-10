<?php
/**
 * My Subscriptions section on the My Account page
 *
 * @author   Prospress
 * @category WooCommerce Subscriptions/Templates
 * @version  7.2.0 - Migrated from WooCommerce Subscriptions v2.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
?>
<div class="woocommerce_account_subscriptions">
	<h3 class="dashboard-title">Subscriptions</h2>

		<?php if (!empty($subscriptions)): ?>
			<div class="my-orders-wrapper">
				<?php foreach ($subscriptions as $subscription_id => $subscription): ?>
					<div class="my-order">
						<p><span>Subscription:
							</span><?php echo esc_html(sprintf(_x('#%s', 'hash before order number', 'woocommerce-subscriptions'), $subscription->get_order_number())); ?>
						</p>
						<p><span>Date: </span><time
								datetime="<?php echo esc_attr($subscription->get_date_created()->date('c')); ?>"><?php echo esc_html(wc_format_datetime($subscription->get_date_created())); ?></time>
						</p>
						<p><span>Status:
							</span><?php echo esc_attr(wcs_get_subscription_status_name($subscription->get_status())); ?>
						</p>
						<p><span>Quantity: </span><?php echo $subscription->get_item_count(); ?></p>
						<p>Total: $<?php echo $subscription->get_total(); ?></p>
						<a class="my-acc-action" href="<?php echo esc_url($subscription->get_view_order_url()) ?>"
							class="woocommerce-button button view"><?php echo esc_html_x('View', 'view a subscription', 'woocommerce-subscriptions'); ?></a>
					</div>
				<?php endforeach; ?>
			</div>

		<?php else: ?>
			<p
				class="no_subscriptions woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
				<?php if (1 < $current_page):
					printf(esc_html__('You have reached the end of subscriptions. Go to the %sfirst page%s.', 'woocommerce-subscriptions'), '<a href="' . esc_url(wc_get_endpoint_url('subscriptions', 1)) . '">', '</a>');
				else:
					esc_html_e('You have no active subscriptions.', 'woocommerce-subscriptions');
					?>
					<br>
					<a class="browse-products woocommerce-Button button"
						href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>">
						<?php esc_html_e('Browse products', 'woocommerce-subscriptions'); ?>
					</a>
					<?php
				endif; ?>
			</p>

		<?php endif; ?>

</div>