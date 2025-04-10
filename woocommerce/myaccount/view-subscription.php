<?php
/**
 * View Subscription
 *
 * Shows the details of a particular subscription on the account page
 *
 * @author  Prospress
 * @package WooCommerce_Subscription/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>

<p class="mb-0"><span>Subscription: </span><?php echo esc_html( sprintf( _x( '#%s', 'hash before order number', 'woocommerce-subscriptions' ), $subscription -> get_order_number() ) ); ?></p>
<p class="mb-0"><span>Date: </span><time datetime="<?php echo esc_attr( $subscription -> get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $subscription -> get_date_created() ) ); ?></time></p>
<p><span>Status: </span><?php echo esc_attr( wcs_get_subscription_status_name( $subscription -> get_status() ) ); ?></p>

<?php
/**
 * Gets subscription details table template
 * @param WC_Subscription $subscription A subscription object
 * @since 2.2.19
 */
do_action( 'woocommerce_subscription_details_table', $subscription );

do_action( 'woocommerce_subscription_details_after_subscription_table', $subscription );

wc_get_template( 'order/order-details-customer.php', array( 'order' => $subscription ) );
?>

<div class="clear"></div>
