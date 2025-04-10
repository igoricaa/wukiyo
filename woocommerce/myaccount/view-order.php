<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

$notes = $order->get_customer_order_notes();
?>

<p class="mb-0"><span>Order: </span><?php echo esc_html( _x( '#', 'hash before order number', 'woocommerce' ) . $order -> get_order_number() ); ?></p>
<p class="mb-0"><span>Date: </span><time datetime="<?php echo esc_attr( $order -> get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order -> get_date_created() ) ); ?></time></p>
<p><span>Status: </span><?php echo esc_html( wc_get_order_status_name( $order -> get_status() ) ); ?></p>

<?php do_action( 'woocommerce_view_order', $order_id ); ?>
