<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<a id="top"></a>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action('woocommerce_before_single_product_summary');
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action('woocommerce_single_product_summary');
		?>

		<div class="product-accordions-wrapper">
			<div class="mt-5 single-product-accordion">
				<h4 class="m-0 mb-1 toggleAccordion">FREE Shipping orders $199+</h4>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="mt-5 single-product-accordion">
				<h4 class="m-0 mb-1 toggleAccordion">A Smarter Subscription</h4>
				<div class="hidden">
					<p>Members get exclusive 10% off.</p>
					<p>Pick your products and select Subscribe and Save at checkout.</p>
					<p>Get a confirmation email each time your WUKIYO® subscription is scheduled to ship.</p>
					<div class="smart-subscription-last-row">
						<p>Change, pause or cancel your subscription at any time. No strings attached.</p>
						<a href="<? echo get_page_link(419); ?>">Learn More</a>
					</div>
					<button id="sub-and-save" class="subscribe-save-button white-button">SUBSCRIBE AND SAVE</button>
				</div>
			</div>
		</div>

		<div class="product-animation-wrapper">
			<video class="desktop-video" playsinline autoplay muted loop>
				<source src="<?php echo get_template_directory_uri(); ?>/img/animation-desktop.mp4" type="video/mp4">
				Your browser does not support the video tag.
			</video>
			<video class="mobile-video" playsinline autoplay muted loop>
				<source src="<?php echo get_template_directory_uri(); ?>/img/animation-mobile.mp4" type="video/mp4">
				Your browser does not support the video tag.
			</video>
		</div>

		<div class="product-specific-wrapper">
			<div class="specific-latin">
				<p class="bold">WUKIYO | apex™<br>Nootropics, reinvented.</p>
				<p>apex \ ˈeɪpɛks \</p>
			</div>
			<div class="specific-description">
				<p>The highest point of achievement.<br>
					The top or highest part of something, especially one forming a<br>point.</p>
			</div>
		</div>

		<div class="product-testimonials-wrapper">
			<div class="row">
				<div class="col-md">
					<div class="product-testimonial">
						<div class="product-testimonial-img apex-testimonial-img-1"></div>
						<div class="product-testimonial-rating"></div>
						<div class="product-testimonial-text">
							<h4>Prof. Ethan Flores</h4>
							DPsych <br>
							<p>"As a researcher, I have reviewed the studies conducted on ingredients used to formulate
								synthetics
								agents in our arsenal with a peer-reviewed evidence base for optimizing neurotransmitter
								production,
								neuroprotective effects and improving circulation to the brain,
								all of which may improve mental stamina and focus and alleviate disruptive mental
								symptoms.
								Truly innovative and futuristic nootropics supplements stack!"
							</p>
						</div>
					</div>
				</div>
				<div class="col-md">
					<div class="product-testimonial">
						<div class="product-testimonial-img apex-testimonial-img-2"></div>
						<div class="product-testimonial-rating"></div>
						<div class="product-testimonial-text">
							<h4>Alvar Stainer</h4>
							Architect <br>
							<p>"I took WUKIYO | apex™ the first day and everyone kept coming up to me and asking me
								whats wrong.
								It was in a joking manner because nothing was actually wrong with me, I was just killing
								it.
								Setting a bunch of meetings, cold calls, etc. I was "in the zone".
								Feel like this is almost like natural Adderall.
								I'm really thankful that I found this product and I think I will be trying some of the
								other WUKIYO products."
							</p>
						</div>
					</div>
				</div>
				<div class="col-md">
					<div class="product-testimonial">
						<div class="product-testimonial-img apex-testimonial-img-3"></div>
						<div class="product-testimonial-rating"></div>
						<div class="product-testimonial-text">
							<h4>Simone Laurence</h4>
							Writer<br>
							<p>"So when I started hearing about a way the 24/7 worker bees of Silicon Valley were
								“biohacking” their brain to stay focused using something called nootropics,
								I worked my health writer magic and had a few brands send me some to try.
								Trying them all I can conclude that WUKIYO | apex™ is unquestionably the best nootropics
								supplement in the market!
								Glad to be the part of the team."
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="product-certificates-wrapper">
			<h3>Certifiably Safe Products</h3>
			<p>We have gone through extensive processes to ensure our products are not only effective,<br>
				but safe and compliant as well.</p>

			<div class="product-cert">
				<div class="cert-img-1">
					<img src="<?php echo get_template_directory_uri(); ?>/img/nsf@2x.webp" alt="NSF Logo">
				</div>
				<p class="cert-text mb-0">NSF International verifies that products meet public health and safety<br>
					standards. WUKIYO | apex™ passed with flying colors.</p>
			</div>
			<div class="product-cert">
				<div class="cert-img-2">
					<img src="<?php echo get_template_directory_uri(); ?>/img/fda-compliant@2x.webp" alt="FDA Logo">
				</div>
				<p class="cert-text mb-0">The Food and Drug Administration (FDA) regulates the safety of food,<br>
					drugs, and other consumer products. WUKIYO | apex™ fits the bill.</p>
			</div>
			<div class="product-cert">
				<div class="cert-img-3">
					<img src="<?php echo get_template_directory_uri(); ?>/img/WADA@2x.webp" alt="WADA Logo">
				</div>
				<p class="cert-text mb-0">The World Anti-Doping Agency (WADA) monitors the fight against<br>
					drugs in sports. WUKIYO | apex™ can keep you in the zone and in the game.</p>
			</div>
		</div>

		<div class="product-benefits-wrapper">
			<h3>Benefits</h3>
			<p>• Provides support for every aspect of cognitive performance: focus, working memory,<br>
				procesing speeds, reaction times, and overall brain health.</p>
			<p>• Improved focus 10+ hours.</p>
			<p>• Performance-driven thinking like focus, short-term memory, stress resistance and others that help to
				give a more immediate edge to productivity, intensity, competition, deadline, exams, etc.</p>
			<p>• Heightened 'flow state', the feeling of being in the zone.</p>
			<button class="buy-now-button blue-button">BUY NOW</button>
		</div>

		<div class="magazine-logos-wrapper">
			<h3>As Seen In</h3>
			<div class="container">
				<div class="row">
					<div class="col-6 col-md-4 d-flex justify-content-center align-items-center">
						<img src="<?php echo get_template_directory_uri(); ?>/img/jneurosci-logo.webp"
							alt="JNeurosci Logo">
					</div>
					<div class="col-6 col-md-4 d-flex justify-content-center align-items-center">
						<img src="<?php echo get_template_directory_uri(); ?>/img/arise-logo.webp" alt="Arise Logo">
					</div>
					<div class="col-6 col-md-4 d-flex justify-content-center align-items-center">
						<img src="<?php echo get_template_directory_uri(); ?>/img/mode-logo.webp" alt="MODE Logo">
					</div>
					<div class="w-100 my-3 desktop"></div>
					<div class="col-6 col-md-4 d-flex justify-content-center align-items-center">
						<img src="<?php echo get_template_directory_uri(); ?>/img/entrepreneur-logo.webp"
							alt="Entrepreneur Logo">
					</div>
					<div class="col-6 col-md-4 d-flex justify-content-center align-items-center">
						<img src="<?php echo get_template_directory_uri(); ?>/img/attitude-logo.webp"
							alt="Attitude Logo">
					</div>
					<div class="col-6 col-md-4 d-flex justify-content-center align-items-center">
						<img src="<?php echo get_template_directory_uri(); ?>/img/sfm-logo.webp" alt="SFM Logo">
					</div>
				</div>
			</div>
		</div>

		<div class="product-ingredients-wrapper">
			<h3>Functional Ingredients. Functional Mind.</h3>
			<p>Patented, research-backed formulas made with the cleanest ingredients from science and nature.</p>
			<div class="product-ingredients-header d-flex align-items-center">
				<img alt="Product logo" class="mr-3 logo300"
					src="<?php echo get_template_directory_uri(); ?>/img/wukiyo-apex@2x.webp">
				<h3>Ingredients</h3>
			</div>
			<p class="m-0 bold">W-YO® | W-sensei™</p>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">L-Tyrosine<span class="ingredient-quantity">300 mg</span>
					</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">Curcumin<span class="ingredient-quantity">250 mg</span> +
						Piperine <span class="ingredient-quantity">3 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">Phosphatidylserine<span class="ingredient-quantity">250
							mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">CRL-21X™<span class="ingredient-quantity">100 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">Phenibut HCL<span class="ingredient-quantity">60 mg</span>
					</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">Noopept<span class="ingredient-quantity">10 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<p class="m-0 bold">W-YO® | W-komorai™</p>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">Citicoline<span class="ingredient-quantity">250 mg</span>
					</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">Alpha-GPC<span class="ingredient-quantity">200 mg</span>
					</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">FL66™<span class="ingredient-quantity">16 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">Folate<span class="ingredient-quantity">400 mcg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">Magnesium<span class="ingredient-quantity">200 mg</span>
					</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">Vitamin K<span class="ingredient-quantity">100 mcg</span>
					</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">Vitamin D<span class="ingredient-quantity">62.5 mcg</span>
					</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom mb-0"></div>
		</div>

		<div class="product-patent-wrapper">
			<h3>The Patent.</h3>
			<div class="product-patent">
				<div class="patent-img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/uspto-logo@2x.webp" alt="USPTO Logo">
				</div>
				<p class="patent-text mb-0">W-YO® has been awarded a Notice of Allowance from the U.S.
					Patent and Trademark Office for our two proprietary nootropic molecules CRL-21X™ and FL66™.</p>
			</div>
		</div>

		<div class="product-qa-wrapper">
			<h3>Questions? We have answers</h3>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">What is WUKIYO® | apex?</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">How does WUKIYO® | apex work?</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">What are primary, patented ingredients of the WUKIYO® |
						apex?</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">How should I use WUKIYO® | apex?</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">When should I use WUKIYO® | apex?</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">When will I begin to feel the effects?</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">How should I store WUKIYO® | apex and how long does it
						last?</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">Can I take any other stimulants with WUKIYO® | apex?</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">Will WUKIYO® | apex interact with my medications?</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion">
					<p class="m-0 d-flex align-items-center">What is the main difference between WUKIYO® | apex and
						WUKIYO® | esse?</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">You can buy WUKIYO on this website or on Amazon.com</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<a href="<?php the_field('faq_link', 'option') ?>">
				<div class="black-button faq-button d-lg-none">
					FREQUENTLY ASKED QUESTIONS
				</div>
			</a>
		</div>

		<a class="black-button faq-button desktop" href="<?php the_field('faq_link', 'option') ?>">FREQUENTLY ASKED
			QUESTIONS</a>

		<div class="product-reviews-wrapper">
			<h3>What are people saying about</h3>
			<img alt="Product logo" class="logo300"
				src="<?php echo get_template_directory_uri(); ?>/img/wukiyo-apex@2x.webp">
			<div class="product-reviews-stats">
				<h3>Customer Reviews</h3>
				<div class="rating-wrapper desktop">
					<img alt="Customer Rating"
						src="<?php echo get_template_directory_uri(); ?>/img/rating-stars@2x.webp">
					<p class="rating-stats">4.89 <span>based on 921 reviews</span></p>
				</div>
				<div class="d-lg-none">
					<div class="d-flex">
						<img alt="Customer Rating"
							src="<?php echo get_template_directory_uri(); ?>/img/rating-stars@2x.webp">
						<p class="rating-stats">4.89</p>
					</div>
					<p class="stats-text">based on 921 reviews</p>
				</div>
			</div>
			<div class="product-review-form-wrapper">
				<div class="write-review-accordion m-0 writeReview toggleAccordion">
					<p class="m-0 d-flex align-items-center">WRITE A REVIEW</p>
				</div>
				<div class="product-review-form hidden">
					<?php
					/**
					 * Hook: woocommerce_after_single_product_summary.
					 *
					 * @hooked woocommerce_output_product_data_tabs - 10
					 * @hooked woocommerce_upsell_display - 15 - removed (woocommerce.php)
					 * @hooked woocommerce_output_related_products - 20 - removed (woocommerce.php)
					 */
					do_action('woocommerce_after_single_product_summary');
					// echo do_shortcode('[woo_reviews id="350"]');
					?>
				</div>
			</div>
		</div>

		<div class="subscribe">
			<h3>Revolution is coming.
				<br>
				Let us tell you all about it.
			</h3>
			<p>Sign up and Get unlimited use
				<br>
				Promo Code with 15% off.
				<br>
				Be first to know about latest news and
				<br>get exclusive offers.
			</p>
			<form action="https://revelationnootropics.us1.list-manage.com/subscribe/post" method="POST">
				<div class="review-input-fields">
					<input type="hidden" name="u" value="4830cbe4ec1ae4c814b17b17c">
					<input type="hidden" name="id" value="d7a9b9be79">
					<input class="black-input" type="text" autocapitalize="off" autocorrect="off" name="MERGE0"
						id="MERGE0" size="25" value="" placeholder="Name and Surname">
					<input class="black-input" type="email" autocapitalize="off" autocorrect="off" name="MERGE0"
						id="MERGE0" size="25" value="" placeholder="Email">
				</div>
				<button class="align-self-end">Join now</button>
			</form>
		</div>
		<a href="#top" class="back-to-top d-lg-none">Back to top</a>
	</div>
</div>

<?php do_action('woocommerce_after_single_product'); ?>