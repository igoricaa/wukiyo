<?php

/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
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

defined('ABSPATH') || exit;
?>

<div class="woocommerce-order sitePadding">

	<?php
	if ($order) :

		do_action('woocommerce_before_thankyou', $order->get_id());
	?>

		<?php if ($order->has_status('failed')) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
				<?php if (is_user_logged_in()) : ?>
					<a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>
			<div class="tabs black-border-bottom d-lg-none">
				<ul class="d-flex justify-content-between mb-0">
					<li class="tab">Delivery</li>
					<li class="tab">Payment</li>
					<li class="tab active">Order Complete</li>
				</ul>
			</div>
			<div class="row no-gutters h-100">
				<div class="col-6 left-column">
					<div class="subscribe">
						<div class="close-newsletter-form-button hidden">
							<img src="<?php echo get_template_directory_uri(); ?>/img/x-close-white.svg" alt="X">
						</div>
						<h4>Revolution is coming.<br>
							Let us tell you all about it.
						</h4>
						<p class="newsletter-text">Sign up and Get unlimited use
							<br>
							Promo Code with 15% off.
							<br>
							Be first to know about latest news and
							<br>get exclusive offers.
						</p>
						<form class="newsletter-form" action="https://revelationnootropics.us1.list-manage.com/subscribe/post-json" method="POST">
							<input type="hidden" name="u" value="4830cbe4ec1ae4c814b17b17c">
							<input type="hidden" name="id" value="d7a9b9be79">
							<input class="black-input newsletter-name-input" type="text" autocapitalize="off" autocorrect="off" name="FULLNAME" id="FULLNAME" size="25" value="" placeholder="Name and Surname">
							<span class="newsletter-error">* This field is requied</span>
							<input class="black-input newsletter-email-input" type="email" autocapitalize="off" autocorrect="off" name="EMAIL" id="EMAIL" size="25" value="" placeholder="Email">
							<span class="newsletter-error req">* This field is requied</span>
							<span class="newsletter-error invalid">* Please enter valid email</span>
							<button type="button" class="product-join-now-button closed align-self-end">Join now</button>
						</form>
					</div>
				</div>

				<div class="col-12 col-lg-6 right-column">
					<div class="tabs d-none d-lg-block black-border-bottom pb-0">
						<ul class="d-flex mb-0">
							<li class="tab">Delivery</li>
							<li class="tab">Payment</li>
							<li class="tab active">Order Complete</li>
						</ul>
					</div>
					<div class="thank-you-content sitePadding mobile">
						<h2>Thank you, <br>your order has been placed</h2>

						<?php
						if ($order->get_payment_method() == "zelle") {
						?>
							<p>This is NOT your payment receipt. A confirmation email will be sent to you once your payment is processed.</p>
							<div class="zelle-pay-info-wrapper">
								<?php
								$total = $order->get_total();
								$orderNumber = $order->get_id();
								$orderCreationDate = $order->get_date_created();
								$paymentMethod = $order->get_payment_method();
								?>
								<p>Order number: <strong><?php echo $orderNumber; ?></strong></p>
								<p>Date: <strong><?php echo $orderCreationDate->date("F j, Y"); ?></strong></p>
								<p>Total: <strong>$<?php echo $total; ?></strong></p>
								<p>Payment method: <strong style="text-transform: capitalize;"><?php echo $paymentMethod; ?></strong></p>
							</div>
							<h4>ZELLE NOTICE</h4>
							<p>Please use only your order number (available once you have placed your order) as the payment reference in the Comments or Notes section. Once we have received your payment, we will send you a confirmation email within 24-48 hours to confirm the successful processing of your order. This is a BUSINESS (NOT personal) Zelle account.</p>
							<?php
							echo '<p>' . wp_kses_post(sprintf(__('Send $%s via %s or from your bank', WCZELLE_PLUGIN_TEXT_DOMAIN), $total, '<a style="color: #6d1fd4" href="https://zellepay.com/" target="_blank">Zelle</a>')) . '.</p>';
							?>

							<p>Please use the Zelle information, QR code or payment button below, along with the order number as the memo:</p>
							<span><strong>Send:</strong></span>
							<p>$<?php echo $total; ?> to wukiyo.orders@proton.me</p>

							<span>Zelle Name:</span>
							<div class="zelle-input-copy-wrapper">
								<input id="zelle__name" class="zelle-info" type="text" value="Revelation Nootropics" disabled>
								<svg data-type="zelle__name" class="clipboard" width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M2 20.3818C1.45 20.3818 0.979002 20.1858 0.587002 19.7938C0.195002 19.4018 -0.000664969 18.9311 1.69779e-06 18.3818V5.38178C1.69779e-06 5.09844 0.0960018 4.86078 0.288002 4.66878C0.480002 4.47678 0.717335 4.38111 1 4.38178C1.28334 4.38178 1.521 4.47778 1.713 4.66978C1.905 4.86178 2.00067 5.09911 2 5.38178V18.3818H12C12.2833 18.3818 12.521 18.4778 12.713 18.6698C12.905 18.8618 13.0007 19.0991 13 19.3818C13 19.6651 12.904 19.9028 12.712 20.0948C12.52 20.2868 12.2827 20.3824 12 20.3818H2ZM6 16.3818C5.45 16.3818 4.979 16.1858 4.587 15.7938C4.195 15.4018 3.99934 14.9311 4 14.3818V2.38178C4 1.83178 4.196 1.36078 4.588 0.968776C4.98 0.576776 5.45067 0.38111 6 0.381777H15C15.55 0.381777 16.021 0.577777 16.413 0.969777C16.805 1.36178 17.0007 1.83244 17 2.38178V14.3818C17 14.9318 16.804 15.4028 16.412 15.7948C16.02 16.1868 15.5493 16.3824 15 16.3818H6ZM6 14.3818H15V2.38178H6V14.3818Z" fill="black" />
								</svg>
								<div class="copy-to-clipboard-notification" data-type="zelle__name">
									<p>Copied!</p>
								</div>
							</div>

							<span>Zelle Email:</span>
							<div class="zelle-input-copy-wrapper">
								<input id="zelle__email" class="zelle-info" type="text" value="wukiyo.orders@proton.me" disabled>
								<svg data-type="zelle__email" class="clipboard" width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M2 20.3818C1.45 20.3818 0.979002 20.1858 0.587002 19.7938C0.195002 19.4018 -0.000664969 18.9311 1.69779e-06 18.3818V5.38178C1.69779e-06 5.09844 0.0960018 4.86078 0.288002 4.66878C0.480002 4.47678 0.717335 4.38111 1 4.38178C1.28334 4.38178 1.521 4.47778 1.713 4.66978C1.905 4.86178 2.00067 5.09911 2 5.38178V18.3818H12C12.2833 18.3818 12.521 18.4778 12.713 18.6698C12.905 18.8618 13.0007 19.0991 13 19.3818C13 19.6651 12.904 19.9028 12.712 20.0948C12.52 20.2868 12.2827 20.3824 12 20.3818H2ZM6 16.3818C5.45 16.3818 4.979 16.1858 4.587 15.7938C4.195 15.4018 3.99934 14.9311 4 14.3818V2.38178C4 1.83178 4.196 1.36078 4.588 0.968776C4.98 0.576776 5.45067 0.38111 6 0.381777H15C15.55 0.381777 16.021 0.577777 16.413 0.969777C16.805 1.36178 17.0007 1.83244 17 2.38178V14.3818C17 14.9318 16.804 15.4028 16.412 15.7948C16.02 16.1868 15.5493 16.3824 15 16.3818H6ZM6 14.3818H15V2.38178H6V14.3818Z" fill="black" />
								</svg>
								<div class="copy-to-clipboard-notification" data-type="zelle__email">
									<p>Copied!</p>
								</div>
							</div>

							<span>Payment Reference / Order Number:</span>
							<div class="zelle-input-copy-wrapper">
								<input id="zelle__orderNumber" class="zelle-info" type="text" value="<?php echo $orderNumber; ?>" disabled>
								<svg data-type="zelle__orderNumber" class="clipboard" width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M2 20.3818C1.45 20.3818 0.979002 20.1858 0.587002 19.7938C0.195002 19.4018 -0.000664969 18.9311 1.69779e-06 18.3818V5.38178C1.69779e-06 5.09844 0.0960018 4.86078 0.288002 4.66878C0.480002 4.47678 0.717335 4.38111 1 4.38178C1.28334 4.38178 1.521 4.47778 1.713 4.66978C1.905 4.86178 2.00067 5.09911 2 5.38178V18.3818H12C12.2833 18.3818 12.521 18.4778 12.713 18.6698C12.905 18.8618 13.0007 19.0991 13 19.3818C13 19.6651 12.904 19.9028 12.712 20.0948C12.52 20.2868 12.2827 20.3824 12 20.3818H2ZM6 16.3818C5.45 16.3818 4.979 16.1858 4.587 15.7938C4.195 15.4018 3.99934 14.9311 4 14.3818V2.38178C4 1.83178 4.196 1.36078 4.588 0.968776C4.98 0.576776 5.45067 0.38111 6 0.381777H15C15.55 0.381777 16.021 0.577777 16.413 0.969777C16.805 1.36178 17.0007 1.83244 17 2.38178V14.3818C17 14.9318 16.804 15.4028 16.412 15.7948C16.02 16.1868 15.5493 16.3824 15 16.3818H6ZM6 14.3818H15V2.38178H6V14.3818Z" fill="black" />
								</svg>
								<div class="copy-to-clipboard-notification" data-type="zelle__orderNumber">
									<p>Copied!</p>
								</div>
							</div>
							<br>
						<?php } elseif ($order->get_payment_method() == "redirect") { ?>
							<p>Within the next 24 hours, you will receive an email containing the payment link and invoice necessary for completing your order payment via credit/debit card. Upon successful payment, a confirmation email will be sent to you, along with your tracking number.</p>
						<?php } else { ?>
							<h5>Order Confirmation Email</h5>
							<p>We'll send you order confirmation email.</p>
						<?php } ?>
						<h5>What happens next?</h5>
						<p>Once your order has shipped, we'll send you a shipping email with your track and trace.</p>

						<p class="bold">Feel free to visit the main <a href="<?php the_field('faq_link', 'option') ?>"><u class="bold">frequently asked questions</u></a> page if you have any other queries or need more information.</p>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), null); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																										?></p>

	<?php endif; ?>

</div>

<script type="text/javascript">
	$(document).ready(function() {
		const copyUrlToClipboard = (clickedSvg) => {

			if (!navigator.clipboard) {
				let r = document.createRange();
				// if (clickedSvg === "copyName") {
				r.selectNode(document.getElementById(clickedSvg));
				// } else if (clickedSvg === "copyEmail") {
				// 	r.selectNode(document.getElementById('zelle__email'));
				// } else {
				// 	r.selectNode(document.getElementById('zelle__orderNumber'));
				// }

				window.getSelection().removeAllRanges();
				window.getSelection().addRange(r);
				try {
					document.execCommand('copy');
					window.getSelection().removeAllRanges();

					toggleCopyToClipboardNotification();

					setTimeout(() => {
						toggleCopyToClipboardNotification();
					}, 200000);
				} catch (err) {
					console.log('Unable to copy!');
				}
			} else {

				let inputValue = document.getElementById(clickedSvg).value;

				// if (clickedSvg === "copyName") {
				// 	inputValue = document.getElementById('zelle__name').value;
				// } else if (clickedSvg === "copyEmail") {
				// 	inputValue = document.getElementById('zelle__email').value;
				// } else {
				// 	inputValue = document.getElementById('zelle__orderNumber').value;
				// }

				navigator.clipboard.writeText(inputValue).then(() => {
						toggleCopyToClipboardNotification(clickedSvg);

						setTimeout(() => {
							toggleCopyToClipboardNotification(clickedSvg);
						}, 200000);
					})
					.catch(() => {
						console.log('Unable to copy!');
					});
			}
		}

		const toggleCopyToClipboardNotification = (clickedSvg) => {
			let notifications = document.querySelectorAll('.copy-to-clipboard-notification');

			[...notifications].forEach(notification => {
				if (notification.classList.contains('show') && notification.dataset.type !== clickedSvg) {
					notification.classList.remove('show');
				} else if (notification.dataset.type === clickedSvg) {
					notification.classList.add('show');
				}
			})
		}

		document.querySelectorAll('.clipboard').forEach(clipboard => {
			clipboard.addEventListener('click', event => {
				copyUrlToClipboard(event.currentTarget.dataset.type);
			});
		});
	});
</script>