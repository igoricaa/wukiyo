<?php
/**
 * Email Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-addresses.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 9.8.0
 */

use Automattic\WooCommerce\Utilities\FeaturesUtil;

if (!defined('ABSPATH')) {
	exit;
}

$address = $order->get_formatted_billing_address();
$shipping = $order->get_formatted_shipping_address();

$email_improvements_enabled = FeaturesUtil::feature_is_enabled('email_improvements');
?>
<table id="addresses" cellspacing="0" cellpadding="0"
	style="width: 100%; vertical-align: top; margin-bottom: <?php echo $email_improvements_enabled ? '0' : '40px'; ?>; padding:0;"
	border="0">
	<tr>
		<td class="email-column" valign="top">
			<h2><?php esc_html_e('Shipping address', 'woocommerce'); ?></h2>
			<address class="address">
				<?php echo wp_kses_post($shipping); ?>
				<?php if ($order->get_shipping_phone()): ?>
					<br /><?php echo wc_make_phone_clickable($order->get_shipping_phone()); ?>
				<?php endif; ?>
			</address>
		</td>
		<?php if (!wc_ship_to_billing_address_only() && $order->needs_shipping_address() && $shipping): ?>
			<td class="email-column" valign="top">
				<h2><?php esc_html_e('Billing address', 'woocommerce'); ?></h2>
				<address class="address">
					<?php echo wp_kses_post($address ? $address : esc_html__('N/A', 'woocommerce')); ?>
					<?php if ($order->get_billing_phone()): ?>
						<br /><?php echo wc_make_phone_clickable($order->get_billing_phone()); ?>
					<?php endif; ?>
				</address>
			</td>
			<td class="empty-column"></td>
		<?php endif; ?>
	</tr>

</table>
<?php echo $email_improvements_enabled ? '<br>' : ''; ?>