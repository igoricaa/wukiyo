<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<h3 class="dashboard-title">My Orders</h3>

<?php if ( $has_orders ) : ?>

	<div class="my-orders-wrapper">
		<?php
		foreach ( $customer_orders->orders as $customer_order ) {
			$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
			$item_count = $order->get_item_count() - $order->get_item_count_refunded();
			?>

		<div class="my-order">			
			<p><span>Order: </span><?php echo esc_html( _x( '#', 'hash before order number', 'woocommerce' ) . $order -> get_order_number() ); ?></p>
			<p><span>Date: </span><time datetime="<?php echo esc_attr( $order -> get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order -> get_date_created() ) ); ?></time></p>
			<p><span>Status: </span><?php echo esc_html( wc_get_order_status_name( $order -> get_status() ) ); ?></p>
			<p><span>Quantity: </span><?php echo $order -> get_item_count(); ?></p>
			<p>Total: $<?php echo $order -> get_total(); ?></p>
			<a class="my-acc-action" href="<?php echo esc_url( $order->get_view_order_url() ); ?>">View</a>
		</div>

		<?php
		}
		?>	
	</div>

<?php else : ?>
	<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
		<?php esc_html_e( 'No order has been made yet.', 'woocommerce' ); ?>
		<br>
		<a class="browse-products woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php esc_html_e( 'Browse products', 'woocommerce' ); ?></a>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
