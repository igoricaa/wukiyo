<?php
/**
 * Customer completed order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-completed-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<div class="order-confirmation-intro">
	<h1>Your order has been shipped!</h1>
	<p><?php printf( esc_html__( 'Hi %s, Great news, your order is on its way!', 'woocommerce' ), esc_html( $order->get_billing_first_name() )); ?></p>
	<p><?php echo esc_html__( 'Use this number to track your order:', 'woocommerce' ); ?></p>
	<?php 
	$tracking_info = $order -> get_meta('_wc_shipment_tracking_items');
	$tracking_number = $tracking_info[0]['tracking_number'];
	?>

	<p class="tracking-number"><?php echo $tracking_number; ?></p>
	<p><?php echo esc_html__( 'Track your order:', 'woocommerce' ); ?></p>
	<p><?php echo esc_html__( 'http://parcelsapp.com/en', 'woocommerce' ); ?><div class="randomness"><?php echo time(); ?></div></p>
</div>

<?php

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address - email-adresses.php
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email ); 

$order_shipping_cost = $order -> get_shipping_total();
if (!$order_shipping_cost || $order_shipping_cost == 0 || $order_shipping_cost == '') :
	$order_shipping_cost = 0;
endif;
?>

<table class="email-column-wrapper" cellspacing="0" cellpadding="0">
	<tr>
		<td class="email-column" valign="top">
			<h2>Contact details</h2>

			<?php if ( $order -> get_billing_email() ) : ?>
				<p><?php echo esc_html( $order->get_billing_email() ); ?></p>
			<?php endif; ?>
			<?php if ( $order -> get_shipping_phone() ) : ?>
				<p><?php echo esc_html( $order -> get_shipping_phone() ); ?></p>
			<?php endif; ?>
		</td>
		<td class="email-column" valign="top">
			<h2>Delivery method</h2>
		
			<?php if ( $order -> get_shipping_method() ) : ?>
				<p><?php echo $order -> get_shipping_method(); ?></p>
				<p>Cost: $<?php echo $order_shipping_cost; ?></p>
				<p>Expected delivery time:</p>
			
				<?php if ( $order_shipping_cost == 18 ) : ?>
					<p>2 - 4 business days.</p>
				<?php else : ?>
					<p>6 - 9 business days.</p>
				<?php endif;?>
			<?php endif; ?>
		</td>
		<td class="empty-column"></td>
	</tr>
</table>

<div class="email-order-summary">
	<h2>Order summary</h2>
	<div class="mini-cart-wrapper"> 
		<?php
		$order_total = $order -> get_formatted_order_total();
		$order_subtotal = $order -> get_subtotal();
		$order_quantity = $order -> get_item_count();
		$order_discount_total = $order -> get_discount_total();
		if (!$order_discount_total || $order_discount_total == 0 || $order_discount_total == '') {
			$order_discount_total = '-';
		} else {
			$order_discount_total = '$'.$order_discount_total; 
		}

		foreach ( $order -> get_items() as $item_id => $item ) {
			$product = $item -> get_product();
			$product_quantity = $item -> get_quantity();

			if ( $product && $product -> exists() && $product_quantity > 0 ) {
				$product_id = $product -> get_id();
				$product_price = '$'.$product -> get_price();
				$product_type = 'one-time';
				if (class_exists('WC_Subscriptions_Product') && WC_Subscriptions_Product::is_subscription($product)) {
					$product_type = 'subscription';
					$product_price = $product_price.' / month';
				};

				$esseId = 26;
				$apexId = 350;
				$blissId = 356;
				$pureId = 359;
				$vertId = 361;
				?>					

				<?php
				$product_image_src;
				$product_logo_src;
				switch ($product_id) {
					case $esseId:
						$product_image_src = "/img/emails/esse-package.png";
						$product_logo_src = "/img/emails/wukiyo-esse.png";
						break;
					case $apexId:
						$product_image_src = "/img/emails/apex-package.png";
						$product_logo_src = "/img/emails/wukiyo-apex.png";
						break;
					case $blissId:
						$product_image_src = "/img/emails/bliss-package.png";
						$product_logo_src = "/img/emails/wukiyo-bliss.png";
						break;
					case $pureId:
						$product_image_src = "/img/emails/pure-package.png";
						$product_logo_src = "/img/emails/wukiyo-pure.png";
						break;
					case $vertId:
						$product_image_src = "/img/emails/vert-package.png";
						$product_logo_src = "/img/emails/wukiyo-vert.png";
						break;
				}
				?>
				<table class="cart-product-wrapper" cellspacing="0" cellpadding="0" style="padding: 0px;">
					<tr style="padding: 0px;">
						<td class="cart-product-img-logo" valign="middle">
							<div class="cart-product-image">
								<img src="<?php echo get_template_directory_uri(); echo $product_image_src;?>" alt="Product package">
							</div>
							<div class="cart-product-logo">
								<img src="<?php echo get_template_directory_uri(); echo $product_logo_src?>" alt="Product logo">
							</div>
						</td>
						<td class="cart-product-price" valign="middle">
							<div>
								<?php echo $product_price; ?>
							</div>
						</td>
					</tr>
				</table>
				<div class="randomness"><?php echo time(); ?></div>
			<?php
			}
		}	
	?>
	</div>
	<!-- mini cart end -->
	<div class="cart-numbers-wrapper">
		<div class="cart-numbers">
			<p class="number-title">SUBTOTAL</p>
			<p class="number-value">$<?php echo $order_subtotal; ?></p>
		</div>
		<div class="cart-numbers">
			<p class="number-title">ITEMS</p>
			<p class="number-value"><?php echo $order_quantity; ?></p>
		</div>
		<div class="cart-numbers">
			<p class="number-title">DELIVERY</p>
			<p class="number-value">$<?php echo $order_shipping_cost; ?></p>
		</div>
		<div class="cart-numbers">
			<p class="number-title">PROMO CODE</p>
			<p class="number-value"><?php echo $order_discount_total; ?></p>
		</div>
		<div class="cart-numbers">
			<p class="number-title">SALES TAX</p>
			<p class="number-value">-</p>
		</div>
	</div>
	<div class="cart-total-wrapper">
		<p class="number-title">TOTAL</p>
		<p class="number-value"><?php echo $order_total; ?></p>
	</div>
</div>

<?php
/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );