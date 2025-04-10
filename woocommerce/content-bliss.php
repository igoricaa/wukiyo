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

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<a id="top"></a>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="carousel slide carousel-fade" id="carouselExampleIndicators" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img id="target" class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/bliss/1.webp" 
				data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/bliss/1.webp" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/bliss/2.webp" 
				data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/bliss/2.webp" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/bliss/3.webp"
				data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/bliss/3.webp" alt="Third slide">
			</div>
			<div class="carousel-item">
				<img class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/bliss/4.webp"
				data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/bliss/4.webp" alt="Fourth slide">
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
		do_action( 'woocommerce_single_product_summary' );
		?>
	
		<div class="product-accordions-wrapper">
			<div class="mt-5 single-product-accordion">
				<h4 class="m-0 toggleAccordion baits">FREE Shipping orders $199+</h4>
				<div class="hidden">
					<p class="product-accordion-p">FREE Worldwide Shipping is offered on orders with a minimum subtotal of $199 less discounts. 
						<br>Fast and Free International delivery on all items.</p>
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
			<video class="mobile-video"playsinline autoplay muted loop>
				<source src="<?php echo get_template_directory_uri(); ?>/img/animation-mobile.mp4" type="video/mp4">
				Your browser does not support the video tag.
			</video>
		</div>
	
		<div class="product-specific-wrapper">
			<div class="specific-latin">
				<p class="bold">WUKIYO | bliss™<br>Nootropics, reinvented.</p>
				<p>bliss \ blɪs \</p>
			</div>
			<div class="specific-description">
				<p>Bliss is a state of unity, transcendence, completeness, knowingness, wholeness, and uplifted consciousness; it is a feeling of oneness and connection with all of creation.</p>
			</div>
		</div>
		
		<div class="product-testimonials-wrapper">
			<div class="row">
				<div class="col-md">
					<div class="product-testimonial">
						<div class="product-testimonial-img bliss-testimonial-img-1"></div>
						<div class="product-testimonial-rating"></div>
						<div class="product-testimonial-text">
							<h4>David Lopez</h4>
							AI Engineer <br>
							<p>"My thinking process is much clearer now. I have let go of grudges. 
								The realizations I had during the microdosing sessions of WUKIYO | bliss™ were life changing and profound. 
								My meditation practice is more focused now. 
								I recognize my thoughts as a separateness to my physical self and have much more control over them."
							</p>
						</div>
					</div>	
				</div>
				<div class="col-md">
					<div class="product-testimonial">
						<div class="product-testimonial-img bliss-testimonial-img-2"></div>
						<div class="product-testimonial-rating"></div>
						<div class="product-testimonial-text">
							<h4>Louise Polk</h4>
							Lecturer <br>
							<p>"I sat and continue to be amazed at what existed inside my consciousness. 
								What I saw resembled a beauty never witnessed, 
								knowing no one but myself could have ever experienced what had manifested."
							</p>
						</div>
					</div>	
				</div>
				<div class="col-md">
					<div class="product-testimonial">
						<div class="product-testimonial-img bliss-testimonial-img-3"></div>
						<div class="product-testimonial-rating"></div>
						<div class="product-testimonial-text">
							<h4>Vidal Campos</h4>
							Programmer<br>
							<p>"I woke up this morning in anticipation for my day to come, 
								immediately jumping into my morning routine with butterflies in my stomach and excitement rushing through my veins for what I could experience in the next few hours. 
								Echoing the prayer of Saint Francis calmed the minimal nerves I did have. 
								Today I was going to have my first dance with WUKYO | bliss."
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
				<div class="cert-img-1 bliss">
					<img src="<?php echo get_template_directory_uri(); ?>/img/efsa@2x.webp" alt="EFSA Logo">
				</div>
				<p class="cert-text mb-0">Psilocybin Truffles are completely legal in the Netherlands and can be freely produced, traded, and sold. The product falls under the category of Food Supplements according to European directives and it fully complies with the applicable Safety Standards.</p>
			</div>
			<div class="product-cert">
				<div class="cert-img-2 bliss">
					<img src="<?php echo get_template_directory_uri(); ?>/img/fao-un@2x.webp" alt="FAO-UN Logo">
				</div>
				<p class="cert-text mb-0">The hallucinogenic substances that give Psilocybin Truffles their effect are listed in the Psychotropic Substances Convention. 
					Since these substances occur in many fungi - the United Nations has decided to make an exception for these natural products. Psilocybin is excluded from the convention and therefore have legal status.</p>
			</div>
			<div class="product-cert">
				<div class="cert-img-3 bliss">
					<img src="<?php echo get_template_directory_uri(); ?>/img/nih@2x.webp" alt="NIH Logo">
				</div>
				<p class="cert-text mb-0">The Dutch National Institute of Health, Office of dietary supplements regulates the safety of food, drugs, and other consumer products. 
					WUKIYO | bliss™ fits the bill.</p>
			</div>
		</div>

		<div class="product-benefits-wrapper bliss">
			<h3>Benefits</h3>
			<p>• Aswagandha root will help elevate your energy levels naturally via ATP production with increased oxygen utilization, aerobic capacity, and athletic endurance.</p>
			<p>• Bacopa Monnieri provides brain boosting benefits for memory, cognitive function, and improved mood.</p>
			<p>• Reishi Mushroom Extract delivers immune system support to help you stay healthy.</p>
			<p>• Psilocybin as a serotonin HT2A receptor agonists or stimulator massively increases brain entropy, so you have all of the neurons talking to each other in a very open, focused and blissful way.</p>
			<a href="#top">
				<button class="buy-now-button bliss">BUY NOW</button>
			</a>
		</div>
		
		<div class="magazine-logos-wrapper">
			<h3>As Seen In</h3>
			<div class="container">
				<div class="row">
					<div class="col-6 col-md-4 magazine-first">
						<img src="<?php echo get_template_directory_uri(); ?>/img/jneurosci-logo.webp" alt="JNeurosci Logo">
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
						<img src="<?php echo get_template_directory_uri(); ?>/img/entrepreneur-logo.webp" alt="Entrepreneur Logo">
					</div>
					<div class="magazine-spacer-mobile d-md-none"></div>
					<div class="col-6 col-md-4 magazine-fifth">
						<img src="<?php echo get_template_directory_uri(); ?>/img/attitude-logo.webp" alt="Attitude Logo">
					</div>
					<div class="col-6 col-md-4 magazine-last">
						<img src="<?php echo get_template_directory_uri(); ?>/img/sfm-logo.webp" alt="SFM Logo">
					</div>
				</div>
			</div>
		</div>

		<div class="product-ingredients-wrapper">
			<h3>Functional Ingredients. Functional Mind.</h3>
			<p class="firstP">Patented, research-backed formulas made with the cleanest ingredients from science and nature.</p>
			<div class="product-ingredients-header d-flex align-items-center">
				<img alt="Product logo" class="mr-3 logo300" src="<?php echo get_template_directory_uri(); ?>/img/logos/wukiyo-bliss.svg">
				<h3>Ingredients</h3>
			</div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Organic Ashwagandha root<span class="ingredient-quantity">250 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Ashwagandha contains chemicals that will help calm the brain, reduce swelling, 
						lower blood pressure, and alter the immune system. Its effects on the human brain are also well known. 
						This is a herb that supports the mind and mental capacity. 
						Experts say that it improves memory, increases spatial and visual memory, 
						decreases oxidative brain stress and helps prevent nerve cell degeneration.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Organic Bacopa Monnieri<span class="ingredient-quantity">225 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Bacopa monnieri is a plant that has been used for centuries in traditional Ayurvedic medicine. 
						Bacopa will increase certain brain chemicals that are involved in thinking, learning, and memory. 
						It also protect brain cells from chemicals involved in Alzheimer disease.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Organic Reishi<span class="ingredient-quantity">200 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Reishi has long been known to boost brain power, improve memory, and sharpen concentration and focus. 
						The active triterpenes in Reishi were also found to stimulate the production of nerve growth factor (NGF).</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Organic Psilocybin<span class="ingredient-quantity">150 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Previous laboratory experiments had shown promise that psilocybin, as well as the anesthetic ketamine, can decrease depression. 
						The new research found that these compounds increase the density of dendritic spines, small protrusions found on nerve cells which aid in the transmission of information between neurons.</p>
				</div>
			</div>
			<div class="black-border-bottom mb-0"></div>
		</div>
		
		<div class="product-patent-wrapper">
			<h3>Certified formula.</h3>	
			<div class="product-patent">
				<div class="patent-img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/eko@2x.webp" alt="EKO Logo">
				</div>
				<p class="patent-text mb-0">WUKIYO | bliss™ Pro Nootropic Mushrooms are exclusively grown in Limburg, <br>
				Netherlands and are certified as organic, gluten-free, vegan, kosher, halal, and Non-GMO.</p>
			</div>
		</div>

		<div class="product-qa-wrapper">
			<h3>Questions? We have answers</h3>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>What is WUKIYO® | bliss?</p>
				</div>
				<div class="hidden">
					<p>WUKIYO® | bliss Pro Nootropic Mushrooms Microdose delivers 4 organic mushrooms that enhance mental clarity, immune function, natural energy, and more in a single formula.</p>
					<p>Nurture your mind, body and spirit.</p>
					<p>By combining 4 of the most researched mycological species on the planet, WUKIYO® | bliss delivers an organic wellness formula unlike any other: Enhance mental clarity, immune function, natural energy and more.</p>
					<p>WUKIYO® | bliss Pro Nootropic Mushrooms are exclusively grown in Limburg, Netherlands and are certified as organic, gluten-free, vegan, kosher, halal, and Non-GMO.</p>
					<p>Full Transparency | Lab Reports</p>
					<p>W-YO® is committed to delivering excellence in product quality and food safety at every step. Customers can be assured our products are certified by leading third-party regulatory auditors.</p>
					<p>Our WUKIYO® | bliss Pro Nootropic Mushrooms are grown through their full life cycle including myceliated biomass, primordial and/or fruit bodies in an ultra-clean environment at our indoor farm in Limburg, Netherlands.</p>
					<p>At the completion of the culturing process under optimized growing environments, the block of mycelial biomass and fruit bodies are shredded and dehydrated with heated, filtered, and UVC-sanitized air. During the initial stage of the dehydration process, the mushroom material is exposed to a steam activation step that increases the bioavailability of nutrients and bioactive compounds. Temperatures during the moisture removal process are monitored to ensure that the finished powders are safe to consume as "ready-to-eat" superfoods. The result is a whole food mushroom with a Full-Spectrum of naturally occurring nutrients.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>How does WUKIYO® | bliss work?</p>
				</div>
				<div class="hidden">
					<p>WUKIYO® | bliss Pro Nootropic Mushrooms have been traditionally used for thousands of years. Numerous published research articles have established the health benefits of these unique and powerful mushrooms.</p>
					<p>Support for immune health is the primary benefit. WUKIYO® | bliss Pro Nootropic Mushrooms contain beta glucans which are important for immune system functionality. Humans do not produce beta glucans and, therefore, functional mushrooms can play an important role in supporting daily health and wellness. </p>
					<p>In addition to immune health, each type, or species of WUKIYO® | bliss Pro Nootropic Mushroom provides its own special benefits including aiding cognitive and neurological health, gut health, cardiovascular health, bone health, healthy blood sugar, liver health, beauty (healthy hair, skin and nails), vitality, sports performance and recovery, and support for the management of occasional stress, both physical and mental.</p>
					<p>What we do know is that psychedelic substances - Psilocybin act on the serotonin (5-HT) receptors in our brain. Serotonin receptors are found throughout our nervous system and govern many aspects of our being, including mood, thinking, and bowel movements. Psychedelics bind most effectively to the 5HT-2A receptor, which is one of the receptors involved in learning, memory, and cognition. </p>
					<p>As a result, when consuming only a microdose of a psychedelic substance and thus avoiding the “classical trip,” the brain can focus solely on the cognitive boost caused by these receptors.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>How should I use WUKIYO® | bliss?</p>
				</div>
				<div class="hidden">
					<p>Recommended daily dose and suggested use: </p>
					<p>For best results, take 1 capsule every 3rd day, preferably with a light meal or a snack. If more than 1 capsule is consumed, you may experience euphoric sensations. This is normal and will fade away in hours.</p>
					<p>Microdosing protocol: 1 day on | 2 days off.</p>
					<p>There's a fixed protocol for making conscious use of all the positive effects of microdosing. It's better to start with a low dose and build up gradually over time as you become more confident. The challenge of microdosing is to find your personal sweet spot dose that let's you enter in to the flow state.</p>
					<p>While microdosing can act as a catalyst to make you more self-aware, more creative, and more productive; as with any mind-enhancing substance, it should be used consciously and responsibly, in moderation.</p>
					<p>This dietary supplement is intended for use by healthy adults [18+].</p>
					</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>When should I use WUKIYO® | bliss?</p>
				</div>
				<div class="hidden">
					<p>When you take the WUKIYO | bliss™ is completely up to you and how your body feels. Before you start, make sure you are well-rested. This way, you can experience and feel the effect of WUKIYO | bliss™ Pro Nootropic Mushrooms Microdose to its full potential. Enjoy and explore.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>When will I begin to feel the effects?</p>
				</div>
				<div class="hidden">
					<p></p>
					<p>The effects take 20 to 40 minutes to set on and can last from four to six hours. WUKIYO® | bliss Pro Nootropic Mushrooms Microdose will alter the mind and heighten consciousness in various ways, most notably the perception of the world.</p>
					<p>Users report healing past trauma, overcoming limiting beliefs, and deepening their spirituality, often reporting mystic-like experiences. Benefits typically include an increased sense of joy, purpose, and meaning and feeling connected with oneself, others and the world.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>How should I store WUKIYO® | bliss and how long does it last?</p>
				</div>
				<div class="hidden">
					<p></p>
					<p>WUKIYO® | bliss can be stored anywhere [in your car, backpack, purse or desk], but we recommend a cool, dry place and out of the reach of children.</p>
					<p>If you want to keep WUKIYO® | bliss fresh for as long as possible, make sure that the product is stored in an original container.</p>
					<p>WUKIYO® | bliss has a shelf life of two years.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>Can I take any other stimulants with WUKIYO® | bliss?</p>
				</div>
				<div class="hidden">
					<p>We recommend you avoid taking any other high potency stimulants with WUKIYO® | bliss at first, to see how you respond to WUKIYO® | bliss alone. Depending on the individual, some people may be able to use our products in combination with other stimulants.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>Will WUKIYO® | bliss interact with my medications?</p>
				</div>
				<div class="hidden">
					<p>There are no reports in the scientific literature to suggest that WUKIYO® | bliss interact with any conventional medications. However, interactions are always possible.</p>
					<p>Consult with your doctor before taking WUKIYO® | bliss. This may be especially important if you have health concerns or are taking medications. </p>
					<p>Also, remember that this website is not intended as a substitute for consulting with your doctor. This website does not provide medical advice or attempt to diagnose or treat an illness which should only be done under the direction of a healthcare professional.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<a href="<?php the_field('faq_link', 'option') ?>">
				<div class="black-button faq-button d-lg-none">
					FREQUENTLY ASKED QUESTIONS
				</div>
			</a>
		</div>

		<a class="black-button faq-button desktop" href="<?php the_field('faq_link', 'option') ?>">FREQUENTLY ASKED QUESTIONS</a>

		<div class="product-reviews-wrapper">
			<h3>What are people saying about</h3>
			<img alt="Product logo" class="logo300" src="<?php echo get_template_directory_uri(); ?>/img/logos/wukiyo-bliss.svg">
			<div class="product-reviews-stats bliss">
				<h3>Customer Reviews</h3>
				<div class="rating-wrapper desktop">
					<img alt="Customer Rating" src="<?php echo get_template_directory_uri(); ?>/img/rating-stars@2x.webp">
					<p class="rating-stats bliss">4.95 <span>based on 642 reviews</span></p>
				</div>
				<div class="d-lg-none">
					<div class="d-flex">
						<img alt="Customer Rating" src="<?php echo get_template_directory_uri(); ?>/img/rating-stars@2x.webp">
						<p class="rating-stats">4.95</p>
					</div>
					<p class="stats-text bliss">based on 642 reviews</p>
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
					do_action( 'woocommerce_after_single_product_summary' );
					?>
				</div>

				<?php include 'single-product-review-comments.php'; ?>

			</div>
		</div>
		
		<div class="subscribe blury-bck">
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
		<a href="#top" class="back-to-top d-lg-none">Back to top</a>
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
