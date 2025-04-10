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
	<div class="carousel slide carousel-fade" id="carouselExampleIndicators" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img id="target" class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/pure/1.webp"
					data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/pure/1.webp"
					alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/pure/2.webp"
					data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/pure/2.webp"
					alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/pure/3.webp"
					data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/pure/3.webp"
					alt="Third slide">
			</div>
			<div class="carousel-item">
				<img class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/pure/4.webp"
					data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/pure/4.webp"
					alt="Fourth slide">
			</div>
		</div>
		<a class="carousel-control-prev" data-target="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true">
				<img src="<?php echo bloginfo('template_url'); ?>/img/carousel-arrow-left.svg">
			</span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" data-target="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true">
				<img src="<?php echo bloginfo('template_url'); ?>/img/carousel-arrow-right.svg">
			</span>
			<span class="sr-only">Next</span>
		</a>
	</div>

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
				<h4 class="m-0 toggleAccordion baits">FREE Shipping orders $199+</h4>
				<div class="hidden">
					<p class="product-accordion-p">FREE Worldwide Shipping is offered on orders with a minimum subtotal
						of $199 less discounts.
						<br>Fast and Free International delivery on all items.
					</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="mt-5 single-product-accordion">
				<h4 class="m-0 toggleAccordion baits">A Smarter Subscription</h4>
				<div class="hidden">
					<p class="product-accordion-p">Members get exclusive 10% off.</p>
					<p>Pick your products and select Subscribe and Save at checkout.</p>
					<p>Get a confirmation email each time your WUKIYO® subscription is scheduled to ship.</p>
					<div class="smart-subscription-last-row">
						<p>Change, pause or cancel your subscription at any time. No strings attached.</p>
						<a href="<?php the_field('faq_link', 'option') ?>#sub-and-acc-faq">Learn More</a>
					</div>
					<button id="sub-and-save" class="subscribe-save-button white-button">SUBSCRIBE AND SAVE</button>
				</div>
			</div>
			<div class="black-border-bottom"></div>
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
				<p class="bold">WUKIYO | pure™<br>Nootropics, reinvented.</p>
				<p>pure \ pjʊə \</p>
			</div>
			<div class="specific-description">
				<p>Nature. Free from anything of a different, inferior, or contaminating kind.<br>Authentic, flawless,
					genuine.</p>
			</div>
		</div>

		<div class="product-testimonials-wrapper">
			<div class="row">
				<div class="col-md">
					<div class="product-testimonial">
						<div class="product-testimonial-img pure-testimonial-img-1"></div>
						<div class="product-testimonial-rating"></div>
						<div class="product-testimonial-text">
							<h4>Amale Lin</h4>
							Artist<br>
							<p>"Great product. I have more energy and don't feel overwhelmed with everyday tasks.
								I've only been taking it for a little while and my sleep has drastically improved
								already.
								Really feel like it helps my mind relax instead of running a mile a minute as soon as my
								head hits the pillow.
								I feel more focused throughout the day and have greater ability to handle life's
								stressors."
							</p>
						</div>
					</div>
				</div>
				<div class="col-md">
					<div class="product-testimonial">
						<div class="product-testimonial-img pure-testimonial-img-2"></div>
						<div class="product-testimonial-rating"></div>
						<div class="product-testimonial-text">
							<h4>Drew Russ</h4>
							Business owner<br>
							<p>"It works. It's been ages since a CBD oil has worked this effectively for me.
								I actually had to reduce what I thought was my needed dosage with WUKIYO | pure™,
								because it was so effective thanks to the distillation method.
								I used to think that the calming sensation that occurred for me personally was due to
								the actual CBD compound,
								but in truth it may be the other botanical compounds when using the whole plant in high
								potency full spectrum products like this one."
							</p>
						</div>
					</div>
				</div>
				<div class="col-md">
					<div class="product-testimonial">
						<div class="product-testimonial-img pure-testimonial-img-3"></div>
						<div class="product-testimonial-rating"></div>
						<div class="product-testimonial-text">
							<h4>Maurice Herman</h4>
							Fitness Professional<br>
							<p> "I think you can pretty much surmise that I'm a big fan.
								Whether you're thinking about trying WUKIYO | pure™ for focus, energy or anxiety, I
								would definitely recommend this product.
								To me, it feels like the most effective choice."
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
				<p class="cert-text mb-0">NSF International verifies that products meet public health and safety
					standards.
					WUKIYO | pure™ passed with flying colors.</p>
			</div>
			<div class="product-cert">
				<div class="cert-img-2">
					<img src="<?php echo get_template_directory_uri(); ?>/img/fda-compliant@2x.webp" alt="FDA Logo">
				</div>
				<p class="cert-text mb-0">The Food and Drug Administration (FDA) regulates the safety of food, drugs,
					and other consumer products.
					WUKIYO | pure™ fits the bill.</p>
			</div>
			<div class="product-cert">
				<div class="cert-img-3">
					<img src="<?php echo get_template_directory_uri(); ?>/img/WADA@2x.webp" alt="WADA Logo">
				</div>
				<p class="cert-text mb-0">The World Anti-Doping Agency (WADA) monitors the fight against drugs in
					sports.
					WUKIYO | pure™ can keep you in the zone and in the game.</p>
			</div>
		</div>

		<div class="product-benefits-wrapper pure">
			<h3>Benefits</h3>
			<p>• Perfect for targeted, fast-acting results, our members use our WUKIYO | pure™ Full-Spectrum CBD oil to
				regulate their mood and stress levels, manage inflammation and increase focus.</p>
			<p>• A significant benefit is the promotion of relaxation, which occurs naturally as the endocannabinoid
				receptors respond to CBD.</p>
			<p>• Our CBD oil helps increase a sense of calm and balance in the face of day-to-day stress.</p>
			<a href="#top">
				<button class="buy-now-button bliss">BUY NOW</button>
			</a>
		</div>

		<div class="magazine-logos-wrapper">
			<h3>As Seen In</h3>
			<div class="container">
				<div class="row">
					<div class="col-6 col-md-4 magazine-first">
						<img src="<?php echo get_template_directory_uri(); ?>/img/jneurosci-logo.webp"
							alt="JNeurosci Logo">
					</div>
					<div class="col-6 col-md-4 magazine-second">
						<img src="<?php echo get_template_directory_uri(); ?>/img/arise-logo.webp" alt="Arise Logo">
					</div>
					<div class="magazine-spacer-mobile d-md-none"></div>
					<div class="col-6 col-md-4 magazine-third">
						<img src="<?php echo get_template_directory_uri(); ?>/img/mode-logo.webp" alt="MODE Logo">
					</div>
					<div class="magazine-spacer-desktop"></div>
					<div class="col-6 col-md-4 magazine-fourth">
						<img src="<?php echo get_template_directory_uri(); ?>/img/entrepreneur-logo.webp"
							alt="Entrepreneur Logo">
					</div>
					<div class="magazine-spacer-mobile d-md-none"></div>
					<div class="col-6 col-md-4 magazine-fifth">
						<img src="<?php echo get_template_directory_uri(); ?>/img/attitude-logo.webp"
							alt="Attitude Logo">
					</div>
					<div class="col-6 col-md-4 magazine-last">
						<img src="<?php echo get_template_directory_uri(); ?>/img/sfm-logo.webp" alt="SFM Logo">
					</div>
				</div>
			</div>
		</div>

		<div class="product-ingredients-wrapper">
			<h3>Functional Ingredients. Functional Mind.</h3>
			<p class="firstP">Patented, research-backed formulas made with the cleanest ingredients from science and
				nature.</p>
			<div class="product-ingredients-header d-flex align-items-center">
				<img alt="Product logo" class="mr-3 logo300"
					src="<?php echo get_template_directory_uri(); ?>/img/logos/wukiyo-pure.svg">
				<h3>Ingredients</h3>
			</div>
			<p class="ingredients-subsection bold">Full-Spectrum Organic Hemp Oil</p>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Extract Cannabidiol (CBD)<span
							class="ingredient-quantity">100 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">The cannabinoids in our Full-Spectrum hemp extract help relieve
						sleeplessness due to normal aches and pains from exertion or age.
						They also help relax the mind and body and promote a healthy stress response to promote feelings
						of tranquility.
						Cannabinoids in Hemp Oil help reduce anxiety and depression. Omega-3s also improve brain power
						and memory as well as reduce memory loss.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<p class="ingredients-subsection bold">Other ingredients:</p>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Full-Spectrum Hemp Extract and Organic MCT Oil</p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Research shows MCT oil may help ease problems with thinking, memory,
						or judgement. MCT oil can help your body make ketones, an energy source for your brain.</p>
				</div>
			</div>
			<div class="black-border-bottom mb-0"></div>
		</div>

		<div class="product-patent-wrapper">
			<h3>Original formula.</h3>
			<div class="product-patent">
				<div class="patent-img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/usda-organic@2x.webp"
						alt="USDA Organic Logo">
				</div>
				<p class="patent-text mb-0">We use high grade cannabinoid extracts to ensure a safe and regulated
					product with unsurpassed potency and consistency.
					Our products are made with organic ingredients grown in the USA.</p>
			</div>
		</div>

		<div class="product-qa-wrapper">
			<h3>Questions? We have answers</h3>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>What is WUKIYO® | pure?</p>
				</div>
				<div class="hidden">
					<p>The original, the classic, the tried and true - WUKIYO® | pure CBD oil tincture provides the
						simplest, finest, and most versatile way to take your daily CBD. </p>
					<p>Crafted to specifically help with calmness, comfort, energy, rest and general well-being balance.
					</p>
					<p>Packing in 100 mg of CBD per serving, WUKIYO | pure™ 3000 MG Full-Spectrum CBD oil has been
						designed for people looking for potent relief. This is a high potency product with extra
						strength and effectiveness - resulting in an earthy, botanical taste.</p>
					<p>Full Transparency | Lab Reports</p>
					<p>There are many reasons why W-YO® offers the best CBD oil on the market right now. The most
						important reason of all is that we ensure the highest quality across all steps of production.
						First, we make sure that our hemp is grown without the use of any harmful toxins, such as
						chemical fertilizers or pesticides. Then we use only the latest CO2 extraction equipment to
						retrieve all of the beneficial cannabinoids (not just CBD, but CBN, CBG, and CBC as well) for
						our products. Finally, we make certain that every batch is lab tested by a trustworthy and
						accredited independent third party.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>How does WUKIYO® | pure work?</p>
				</div>
				<div class="hidden">
					<p>The normal human physiological system contains a unique self-regulating system known as the
						endocannabinoid system, which is responsible for regulating and controlling some of the major
						aspects of the human physiological system. </p>
					<p>Some of these aspects include sleep, pain, immune response, etc. The body produces compounds
						called endocannabinoids, which actually hold on to the receptors in the nervous system. This
						mechanism can be manipulated therapeutically.</p>
					<p>This therapeutic manipulation can be performed with the help of WUKIYO® | pure 3000 MG
						Full-Spectrum CBD oil. </p>
					<p>WUKIYO® | pure CBD oil is a potent cannabinoid and it is a major element of the endocannabinoid
						system too. The oil can bind with the receptors in your body and help in the suppression of
						pain. One of the main WUKIYO® | pure CBD oil effects is the alleviation of chronic pain. </p>
					<p>WUKIYO® | pure CBD oil directly impacts endocannabinoid activity and can be used as a very useful
						and long-term analgesic. It can be used to combat inflammation as well.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>How should I use WUKIYO® | pure?</p>
				</div>
				<div class="hidden">
					<p>Recommended daily dose and suggested use: </p>
					<p>For best results, take one full dropper [1 ml] up to two times daily. Shake well before using.
						Place the dropper under your tongue, squeeze, and let the CBD oil sit for 20-30 seconds before
						swallowing.</p>
					<p>Please be responsible and do not exceed recommended daily dosage.</p>
					<p>This dietary supplement is intended for use by healthy adults [21+].</p>
					<p><u>The most common dose of WUKIYO® | pure CBD oil</u></p>
					<p>The most common dose of CBD oil is 30 mg - 60 mg per dose. Some people take much less [as low as
						10 mg], others take much higher [up to 150 mg].</p>
					<p>The truth is that the optimal dose of CBD oil is different for everybody.</p>
					<p>It's common for two people with identical weights to respond very differently to the same dose of
						CBD oil. One person may find the ideal dose for them is 100 mg of CBD, while the other person
						responds better to just 30 mg.</p>
					<p>The ideal dose of WUKIYO® | pure CBD oil for you depends on a variety of factors, including:</p>
					<p>• Your size and weight.</p>
					<p>• The severity of the condition you're treating.</p>
					<p>• Your tolerance to CBD oil.</p>
					<p>• Your individual body chemistry.</p>
					<p>• The potency of the CBD oil.</p>
					<p>The best way to find the right dose for your body is to start with a very low dose [30 mg, for
						example] and increase by 10 mg per dose until you find what works best for you.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>When should I use WUKIYO® | pure?</p>
				</div>
				<div class="hidden">
					<p>The ideal time is whenever you feel the WUKIYO® | pure CBD oil fits best into your routine.</p>
					<p>People who find that WUKIYO® | pure CBD oil makes them feel energised, awake and clear-headed may
						prefer to take it in the mornings or afternoons when they need a bit of a boost, while those who
						find that WUKIYO® | pure CBD oil helps them unwind and relax may prefer to take it in the
						evenings.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>When will I begin to feel the effects?</p>
				</div>
				<div class="hidden">
					<p>Simply put: the answer to this question isn't a one-size-fits-all solution. Really depends on
						your goals and expectations, along with other variables like your age, body weight and
						metabolism.</p>
					<p>In general, WUKIYO® | pure CBD oil is absorbed into the bloodstream within 30 minutes to 2 hours
						depending on the method of delivery. Other variables like the dosage, consistency and potency
						can also play a role in how quickly you begin to feel the benefits of WUKIYO® | pure CBD oil.
					</p>
					<p>However, for anyone trying WUKIYO® | pure CBD oil for a more serious issue, consistency and
						patience needs to be part of your wellness routine for the full potential of CBD oil to be
						realized. Full-scale benefits are seen over a longer period of time - one to two weeks.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>How should I store WUKIYO® | pure and how long does it last?</p>
				</div>
				<div class="hidden">
					<p>WUKIYO® | pure can be stored anywhere [in your car, backpack, purse or desk], but we recommend a
						cool, dry place and out of the reach of children.</p>
					<p>Keep WUKIYO® | pure CBD oil in its original packaging to prevent unnecessary exposure to air.
						Contrary to a popular belief, WUKIYO® | pure CBD oil doesn't need to be refrigerated.</p>
					<p>WUKIYO® | pure CBD oil has a shelf life of two years.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>Can I take any other stimulants with WUKIYO® | pure?</p>
				</div>
				<div class="hidden">
					<p>We recommend you avoid taking any other high potency stimulants with WUKIYO® | pure at first, to
						see how you respond to WUKIYO® | pure alone.
						Depending on the individual, some people may be able to use our products in combination with
						other stimulants.
					</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>Will WUKIYO® | pure interact with my medications?</p>
				</div>
				<div class="hidden">
					<p>WUKIYO® | pure is intended for adults [21+].</p>
					<p>Consult with your doctor before taking WUKIYO® | pure. This may be especially important if you
						have health concerns or are taking medications. Interactions are always possible.</p>
					<p>Also, remember that this website is not intended as a substitute for consulting with your doctor.
						This website does not provide medical advice or attempt to diagnose or treat an illness which
						should only be done under the direction of a healthcare professional.</p>
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
				src="<?php echo get_template_directory_uri(); ?>/img/logos/wukiyo-pure.svg">
			<div class="product-reviews-stats pure">
				<h3>Customer Reviews</h3>
				<div class="rating-wrapper desktop">
					<img alt="Customer Rating"
						src="<?php echo get_template_directory_uri(); ?>/img/rating-stars-pure@2x.webp">
					<p class="rating-stats pure">4.95 <span>based on 642 reviews</span></p>
				</div>
				<div class="d-lg-none">
					<div class="d-flex">
						<img alt="Customer Rating"
							src="<?php echo get_template_directory_uri(); ?>/img/rating-stars-pure@2x.webp">
						<p class="rating-stats">4.95</p>
					</div>
					<p class="stats-text pure">based on 642 reviews</p>
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
					?>
				</div>

				<?php include 'single-product-review-comments.php'; ?>

			</div>
		</div>

		<?php include 'components/newsletter-form.php'; ?>

		<a href="#top" class="back-to-top d-lg-none">Back to top</a>
	</div>
</div>

<?php do_action('woocommerce_after_single_product'); ?>