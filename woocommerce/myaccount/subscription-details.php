<?php
/**
 * Subscription details table
 *
 * @author  Prospress
 * @package WooCommerce_Subscription/Templates
 * @since 2.2.19
 * @version 2.6.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<h3 class="my-acc-section-header"><?php esc_html_e( 'Subscription details', 'woocommerce' ); ?></h3>
					
<div>			
	<p class="mb-0"><span>Start date: </span><?php echo esc_html( $subscription -> get_date_to_display( 'start_date' ) ); ?></p>
	<p class="mb-0"><span>Last order date: </span><?php echo esc_attr( $subscription->get_date_to_display( 'last_order_date_created' ) ); ?></p>
	<p class="mb-0"><span>Next payment date: </span><?php echo esc_attr( $subscription->get_date_to_display( 'next_payment' ) ); ?></p>
	<p class="mb-0"><span>Payment: </span>
		<?php if ( ! $subscription->is_manual() && $subscription->has_status( 'active' ) && $subscription->get_time( 'next_payment' ) > 0 ) : ?>
			<?php echo esc_attr( $subscription->get_payment_method_to_display( 'customer' ) ); ?>
		<?php endif; ?>
	</p>
	<?php $actions = wcs_get_all_user_actions_for_subscription( $subscription, get_current_user_id() );
	if ( ! empty( $actions ) ) :
		$cancel_subscription = $actions['cancel']; ?>
		<a class="my-acc-action" href="<?php echo esc_url( $cancel_subscription['url'] ); ?>" class="button"><?php echo esc_html( $cancel_subscription['name'] ); ?> Subscription</a>
	<?php endif; ?>
	
</div>

<h3 class="my-acc-section-header woocommerce-order-details__title"><?php esc_html_e( 'Subscription totals', 'woocommerce' ); ?></h3>
<?php
	$totals = $subscription -> get_order_item_totals();
	$subscription_items = $subscription -> get_items();

	$subscription_quantity = $subscription -> get_item_count();
	$subscription_shipping_cost = $subscription -> get_shipping_total();
	$subscription_shipping_method = $subscription -> get_shipping_method();
	$subscription_subtotal = $subscription -> get_subtotal();
	$subscription_payment_method = $subscription -> get_payment_method_title();
?>

<div>	
	<p class="mb-0"><span>Products: </span>		
		<?php foreach ( $subscription_items as $item_id => $item ) {
			$product = $item -> get_product();
			$product_quantity = $item -> get_quantity();
			$product_name = $item -> get_name();
			?>
			Wukiyo <?php echo $product_name; ?>&reg; x<?php echo $product_quantity; ?>, 
		<?php } ?>
	</p>
	
	<p class="mb-0"><span>Quantity: </span><?php echo $subscription_quantity; ?></p>
	<p class="mb-0"><span>Subtotal: </span>$<?php echo $subscription_subtotal; ?></p>
	<p class="mb-0"><span>Shipping: </span>$<?php echo $subscription_shipping_cost;?> via <?php echo $subscription_shipping_method;?></p>
	<p class="mb-0"><span>Payment method: </span><?php echo $subscription_payment_method;?></p>
	<p class="mb-0">Total: $<?php echo $subscription -> get_total(); ?></p>
</div>

<?php if ( $notes = $subscription->get_customer_order_notes() ) : ?>
	<h2><?php esc_html_e( 'Subscription updates', 'woocommerce-subscriptions' ); ?></h2>
	<ol class="woocommerce-OrderUpdates commentlist notes">
		<?php foreach ( $notes as $note ) : ?>
		<li class="woocommerce-OrderUpdate comment note">
			<div class="woocommerce-OrderUpdate-inner comment_container">
				<div class="woocommerce-OrderUpdate-text comment-text">
					<p class="woocommerce-OrderUpdate-meta meta"><?php echo esc_html( date_i18n( _x( 'l jS \o\f F Y, h:ia', 'date on subscription updates list. Will be localized', 'woocommerce-subscriptions' ), wcs_date_to_time( $note->comment_date ) ) ); ?></p>
					<div class="woocommerce-OrderUpdate-description description">
						<?php echo wp_kses_post( wpautop( wptexturize( $note->comment_content ) ) ); ?>
					</div>
	  				<div class="clear"></div>
	  			</div>
				<div class="clear"></div>
			</div>
		</li>
		<?php endforeach; ?>
	</ol>
<?php endif; ?>
