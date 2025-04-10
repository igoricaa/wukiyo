<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header('shop'); ?>

<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
do_action('woocommerce_before_main_content');
?>

<a href="#top" id="back-to-top-circle"></a>

<?php while (have_posts()): ?>
	<?php the_post(); ?>

	<?php
	global $product;
	$content_template_name;
	$esseId = 26;
	$apexId = 350;
	$blissId = 356;
	$pureId = 359;
	$vertId = 361;
	$productId = $product->get_id();

	switch ($productId) {
		case $esseId:
			$content_template_name = 'esse';
			break;
		case $apexId:
			$content_template_name = 'apex';
			break;
		case $blissId:
			$content_template_name = 'bliss';
			break;
		case $pureId:
			$content_template_name = 'pure';
			break;
		case $vertId:
			$content_template_name = 'vert';
			break;
	}
	?>

	<?php wc_get_template_part('content', $content_template_name); ?>

<?php endwhile; // end of the loop. ?>

<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
?>

<script>
	$(document).ready(function () {
		const esseId = 26,
			apexId = 350,
			blissId = 356,
			pureId = 359,
			vertId = 361;

		const productId = <?php echo $productId ?>;

		$('.single-add-to-cart-button').on('click', function () {
			const cartAmount = $('.cart-amount');
			cartAmount.toggleClass('opacity').addClass('blue');
			$('.cartText').text('Checkout');

			if (window.matchMedia('(min-width: 370px)').matches) {
				cartAmount.addClass('open');
			}

			setTimeout(() => {
				$('.cart-amount').removeClass('blue');
			}, 1000);
		});

		const authorInputField = $('input[id="author"]'),
			emailInputField = $('input[id="email"]');
		if (authorInputField.length > 0 && emailInputField.length > 0) {
			authorInputField.attr("placeholder", "Name");
			emailInputField.attr("placeholder", "Email");
		}

		if (!(/Mobi/.test(navigator.userAgent))) {
			$('.target').magnify();
		}

		$('.carousel').carousel({
			interval: false
		})

		// TODO: ubaci u funkciju
		// Replacing prices on payment method change, both standard and sale prices
		const standardPriceElement = $('.price-and-quantity ins .woocommerce-Price-amount'),
			salePriceElement = $('.price-and-quantity del .woocommerce-Price-amount'),
			standardProductPrice = getStandardProductPrice(),
			subscriptionProductPrice = getSubscriptionProductPrice(),
			standardSaleProductPriceString = salePriceElement.html(),
			standardSalePriceNumber = standardSaleProductPriceString.substring(
				standardSaleProductPriceString.indexOf("$") + 1,
				standardSaleProductPriceString.lastIndexOf(" ")
			);

		$('#one-time-radio .wcsatt-options-prompt-action').text('One-Time Purchase | $' + standardProductPrice + ' USD')
		$('#subscription-radio .wcsatt-options-prompt-action').text('Subscribe and Save | $' + subscriptionProductPrice + ' USD')

		$("#one-time-radio input[name='subscribe-to-action-input']").change(function () {
			setStandardProductPrice();
		});
		$("#subscription-radio input[name='subscribe-to-action-input']").change(function () {
			setSubscriptionProductPrice();
		});

		function setStandardProductPrice() {
			const newStandardPriceString = standardPriceElement.html().replace(subscriptionProductPrice, standardProductPrice);
			standardPriceElement.html(newStandardPriceString);

			const newSalePriceString = salePriceElement.html().replace(standardProductPrice, standardSalePriceNumber);
			salePriceElement.html(newSalePriceString);
		}
		function setSubscriptionProductPrice() {
			const newPriceString = standardPriceElement.html().replace(standardProductPrice, subscriptionProductPrice);
			standardPriceElement.html(newPriceString);

			const newSalePriceString = salePriceElement.html().replace(standardSalePriceNumber, standardProductPrice);
			salePriceElement.html(newSalePriceString);
		}

		function getStandardProductPrice() {
			switch (productId) {
				case esseId:
					return '42';
				case apexId:
					return '69';
				case blissId:
					return '72';
				case pureId:
					return '169';
				case vertId:
					return '33';
				default:
					return '';
			}
		}
		function getSubscriptionProductPrice() {
			switch (productId) {
				case esseId:
					return '38';
				case apexId:
					return '62';
				case blissId:
					return '65';
				case pureId:
					return '152';
				case vertId:
					return '30';
				default:
					return '';
			}
		}

		const backToTopCircleBtn = $('#back-to-top-circle');
		$(window).scroll(function () {
			if ($(window).scrollTop() > 300) {
				backToTopCircleBtn.addClass('show');
			} else {
				backToTopCircleBtn.removeClass('show');
			}
		});

		$('#sub-and-save').click(function () {
			const subscriptionRadio = document.getElementById('subscription-radio'),
				elementRect = subscriptionRadio.getBoundingClientRect(),
				absoluteElementTop = elementRect.top + window.pageYOffset,
				middle = absoluteElementTop - (window.innerHeight / 2);
			window.scrollTo(0, middle);

			const radioInput = subscriptionRadio.querySelector('.wcsatt-options-prompt-action-input');
			if (!radioInput.checked) {
				radioInput.checked = true;
				radioInput.dispatchEvent(new Event('change'));
			}
		});

		const oneTimeString = 'one-time',
			subscriptionString = 'subscription';

		let isSubscription = false;
		$('.wcsatt-options-prompt-action-input').change(function () {
			const value = $(this).val();
			isSubscription = value === 'yes' ? true : false;

			const productType = isSubscription ? subscriptionString : oneTimeString;
			setProductInfo(productType);
		});

		function setProductInfo(productType) {
			const productInfoElement = productType === oneTimeString ? $('#one-time-product-info') : $('#subscription-product-info'),
				addToCartButton = $('.single-add-to-cart-button');

			addToCartButton.attr('data-product-current-quantity', productInfoElement.attr('data-current-quantity')).removeClass('disabled');

			if (productInfoElement.attr('data-current-quantity') == 0) {
				addToCartButton.text('ADD TO CART');
			} else {
				addToCartButton.text('CHECKOUT');
			}

			const plusButton = $('.add-final-single-product'),
				minusButton = $('.remove-final-single-product');
			plusButton.attr('data-cart-item-key', productInfoElement.attr('data-cart-item-key'));
			minusButton.attr('data-cart-item-key', productInfoElement.attr('data-cart-item-key'));

			if (productInfoElement.attr('data-is-disabled') == 1) {
				minusButton.addClass('disabled');
			} else if (minusButton.is('.disabled, .disabledFg')) {
				minusButton.removeClass('disabled disabledFg');
			}

			if (productInfoElement.attr('data-quantity-to-display') > 0) {
				$('.numberOfProducts').text(productInfoElement.attr('data-quantity-to-display'));
			} else {
				$('.numberOfProducts').text(1);
			}
		}
	});
</script>

<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
