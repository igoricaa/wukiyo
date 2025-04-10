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
				<img id="target" class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/vert/1.webp" 
				data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/vert/1.webp" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/vert/2.webp" 
				data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/vert/2.webp" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/vert/3.webp"
				data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/vert/3.webp" alt="Third slide">
			</div>
			<div class="carousel-item">
				<img class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/vert/4.webp"
				data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/vert/4.webp" alt="Fourth slide">
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
				<p class="bold">WUKIYO | vert™<br>Nootropics, reinvented.</p>
				<p>vert \ vɜ˞ːt \</p>
			</div>
			<div class="specific-description">
				<p>The wood itself. The colour green.<br>
				Everything that grows, and bears a green leaf, within the forest. Nature.</p>
			</div>
		</div>
		
		<div class="product-testimonials-wrapper">
			<div class="row">
				<div class="col-md">
					<div class="product-testimonial">
						<div class="product-testimonial-img vert-testimonial-img-1"></div>
						<div class="product-testimonial-rating"></div>
						<div class="product-testimonial-text">
							<h4>Tom Lloyd</h4>
							Developer <br>
							<p>"I follow an intermittent fasting diet with my eating window between 11 AM to 5 PM, give or take. 
								I take 3 of these in the morning to supply my body with nutrients to help energize while in the fasted state. 
								Perfect energy boost."
							</p>
						</div>
					</div>	
				</div>
				<div class="col-md">
					<div class="product-testimonial">
						<div class="product-testimonial-img vert-testimonial-img-2"></div>
						<div class="product-testimonial-rating"></div>
						<div class="product-testimonial-text">
							<h4>Emily Noverre</h4>
							Nutritionist <br>
							<p>"The profound benefits of blue-green algae are worth taking a look into. 
								But when coupled with bioavailable detoxifying and alkalizing agents, the compound becomes something of a power-packed supplement. 
								In fact, this would be the most appropriate term to describe the Spirulina + Chlorella WUKIYO | vert™ dietary supplement."
							</p>
						</div>
					</div>	
				</div>
				<div class="col-md">
					<div class="product-testimonial">
						<div class="product-testimonial-img vert-testimonial-img-3"></div>
						<div class="product-testimonial-rating"></div>
						<div class="product-testimonial-text">
							<h4>Chris Hayden</h4>
							Accountant<br>
							<p>"Perfect start to the day. 
								If you are looking for something less expensive than a daily green juice or smoothie habit this is it. 
								You don't taste anything but you can feel the results plus it's also helping you flush out toxins and boost your immune system. 
								It's completely worth getting!"
							</p>
						</div>
					</div>	
				</div>
			</div>
		</div>
		
		<div class="product-certificates-wrapper">
			<h3>Certifiably Safe Products</h3>
			<p>We have gone through extensive processes to ensure our products are not only effective, but safe and compliant as well.</p>
			<div class="product-cert">
				<div class="cert-img-1">
					<img src="<?php echo get_template_directory_uri(); ?>/img/nsf@2x.webp" alt="NSF Logo">
				</div>
				<p class="cert-text mb-0">NSF International verifies that products meet public health and safety standards. WUKIYO | vert™ passed with flying colors.</p>
			</div>
			<div class="product-cert">
				<div class="cert-img-2">
					<img src="<?php echo get_template_directory_uri(); ?>/img/fda-compliant@2x.webp" alt="FDA Logo">
				</div>
				<p class="cert-text mb-0">The Food and Drug Administration (FDA) regulates the safety of food, drugs, and other consumer products. WUKIYO | vert™ fits the bill.</p>
			</div>
			<div class="product-cert">
				<div class="cert-img-3">
					<img src="<?php echo get_template_directory_uri(); ?>/img/WADA@2x.webp" alt="WADA Logo">
				</div>
				<p class="cert-text mb-0">The World Anti-Doping Agency (WADA) monitors the fight against drugs in sports. WUKIYO | vert™ can keep you in the zone and in the game.</p>
			</div>
		</div>
		
		<div class="product-benefits-wrapper vert">
			<h3>Benefits</h3>
			<p>• Our natural product is a potent source of nutrients. It contains a powerful plant-based protein called phycocyanin. Research shows this may have antioxidant, pain-relief, anti-inflammatory, and brain-protective properties.</p>
			<p>• WUKIYO | vert™ helps reduce fatigue and boost energy, lower cholesterol and triglyceride levels, stimulate the immune system, fight viral infections, and aid in weight loss.</p>
			<a href="#top">
				<button class="buy-now-button vert">BUY NOW</button>
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
				<img alt="Product logo" class="mr-3 logo300" src="<?php echo get_template_directory_uri(); ?>/img/logos/wukiyo-vert.svg">
				<h3>Ingredients</h3>
			</div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Spirulina (Arthropsira platensis)<span class="ingredient-quantity">2000 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Spirulina microalgae contain a plethora of nutrient and non-nutrient molecules providing brain health benefits. 
						Numerous in vivo evidence has provided support for the brain health potential of spirulina, highlighting antioxidant, anti-inflammatory, and neuroprotective mechanisms.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Chlorella (Pyrenoidosa) Broken Cell<span class="ingredient-quantity">1000 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Chlorella contains higher levels of omega-3 fatty acids. Omega-3 and omega-6 fatty acids are essential polyunsaturated fats that are important for proper cell growth and brain function.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Vitamin A<span class="ingredient-quantity">2.250 mcg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Dietary vitamin A supplementation improves learning and memory in VAD rodents and can ameliorate cognitive declines associated with normal aging.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Vitamin K (K1, K2)<span class="ingredient-quantity">40 mcg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Vitamin K intake is associated with a lower presence of depressive symptoms, also after accounting for potential confounders, suggesting a role for this vitamin in the prevention and treatment of depressed mood.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Vitamin B12<span class="ingredient-quantity">7 mcg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Vitamin B12 is a nutrient that helps keep your body's blood and nerve cells healthy and helps make DNA, the genetic material in all of your cells. </p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Iron<span class="ingredient-quantity">5 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Iron is a mineral that the body needs for growth and development. 
						Your body uses iron to make hemoglobin, a protein in red blood cells that carries oxygen from the lungs to all parts of the body, and myoglobin, a protein that provides oxygen to muscles.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Magnesium<span class="ingredient-quantity">15 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Magnesium acts as the gatekeeper for NMDA receptors, which are involved in healthy brain development, memory and learning. It prevents nerve cells from being overstimulated.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Manganese<span class="ingredient-quantity">0.2 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Manganese will protect your brain against free radicals and improve brain function. 
						Manganese is essential for healthy brain function and often used to help treat specific nervous disorders.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Sodium<span class="ingredient-quantity">50 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Electrolytes conduct nerve signals and regulate fluid balance in the brain. Sodium is critical for brain health.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Phycocyanin<span class="ingredient-quantity">225 mcg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Phycocyanin is the main active compound in spirulina. 
						Phycocyanin can fight free radicals and inhibit production of inflammatory signaling molecules, providing impressive antioxidant and anti-inflammatory effects.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Gamma Linolenic Acid (GLA)<span class="ingredient-quantity">32 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">GLA is essential for maintaining brain function, skeletal health, reproductive health, and metabolism. 
						It's also essential for stimulating skin and hair growth. It's important to balance omega-3 and omega-6 fatty acids. </p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Chlorophyll<span class="ingredient-quantity">18 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Chlorophyll is chemically similar to hemoglobin, a protein that is essential in red blood cells as it carries oxygen around a person’s body.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Total Carotenoids<span class="ingredient-quantity">12 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">The carotenoids are beneficial antioxidants that can protect you from disease and enhance your immune system. 
						Provitamin A carotenoids can be converted into vitamin A, which is essential for growth, immune system function, and eye health.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Zeaxanthin<span class="ingredient-quantity">2.5 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">A new study has found that zeaxanthin improves the circulation of blood to the brain. 
						Furthermore, the results suggest that zeaxanthin has a positive impact on higher level brain functions.</p>
				</div>
			</div>
			<div class="black-border-bottom mb-0"></div>
		</div>
		
		<div class="product-patent-wrapper">
			<h3>Certified formula.</h3>	
			<div class="product-patent">
				<div class="patent-img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/usda-organic@2x.webp" alt="USDA Organic Logo">
				</div>
				<p class="patent-text mb-0">WUKIYO | vert™ Spirulina and Chlorella supplements are exclusively grown in Hawaii, 
					USA and are certified as organic, gluten-free, vegan, kosher, halal, and Non-GMO.</p>
			</div>
		</div>

		<div class="product-qa-wrapper">
			<h3>Questions? We have answers</h3>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>What is WUKIYO® | vert?</p>
				</div>
				<div class="hidden">
					<p>WUKIYO | vert™ Spirulina and Chlorella 1000 MG - double strength tablets are a 50/50 blend of two potent superfoods. Spirulina and Chlorella complement each other perfectly with an assortment of vitamins and minerals. 
						<p>This powerful green superfood combination aids the body in maintaining optimal health. Daily consumption is recommended for strengthening and elevating your body's nutritional profile. 
						<p>Full Transparency | Lab Reports
						<p>Unlike most green superfood brands out there, we pride ourselves to bringing you only the best by doing a extensive search to provide you with the top tier level Organic Spirulina and Chlorella that are pesticide and herbicide free, microcystin free, gluten free, Non-GMO, vegetarian and vegan.
						<p>We were on a mission to find the best quality Spirulina and Chlorella in the world. We were led to several places in both California and Hawaii to give you the highest quality of Spirulina and Chlorella out on the market.
						<p>We assure ourselves and our customers by sending regular samples to third party independent laboratories. Our Spirulina and Chlorella laboratory tests have proven that our products are completely safe and made of pure Spirulina and Chlorella.
 					</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>How does WUKIYO® | vert work?</p>
				</div>
				<div class="hidden">
					<p>The benefits of these two superfoods are uncountable. Spirulina and Chlorella when used together, compliment a healthy and active living. Thus, it is highly recommendable to add them into your daily diet.</p>
					<p>Spirulina is a valuable algae which is rich in proteins, natural iron and amino acids content. While Chlorella is the answer for fighting harmful toxins, as a natural detoxifier it eliminates all the unwanted chemicals in the bloodstream as well as the digestive tract.</p>
					<p>Adding WUKIYO | vert™ Spirulina and Chlorella into your diet has amazing benefits from curing diseases to boosting immunity.</p>
					<p>Many people experience body energy improvement as a result of taking WUKIYO | vert™ Spirulina and Chlorella Superfoods regularly. The energy is obtained from B2 vitamins and other nutrients.</p>
					<p>WUKIYO | vert™ Spirulina and Chlorella contain anti-aging content such as vitamin E, beta carotene and fatty acids. </p>
					<p>Brain Function enhancement is another benefit of WUKIYO | vert™ Spirulina and Chlorella. Fatty acids GLA and the blue pigment are the nutrients responsible for brain function improvement. Actually a few weeks of taking WUKIYO | vert™, you will definitely experience an increase in memory, mental focus and stamina.</p>
					<p>Adding these superfoods to your diet, is a great way to boost your immune system due to high content of nutrients. Chlorella contains polysaccharides which boosts the immune system by improving marrow cells productivity. Also omega acids found in these superfoods help to prevent chronic inflammation and other ailments.</p>
					<p>Taking WUKIYO | vert™ Spirulina and Chlorella helps to reduce overweight cases. These superfoods restore the natural body balance, hence reducing food cravings. Fewer food cravings enable a person to lose weight. Spirulina and Chlorella stimulates food digestion, thus allowing the body to eliminate unwanted substances that can lead to weight gain.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>How should I use WUKIYO® | vert?</p>
				</div>
				<div class="hidden">
					<p>Recommended daily dose and suggested use: </p>
					<p>As a dietary supplement, the recommended minimum amount is 3 tablets [3 grams daily]. Since it is a pure and natural superfood supplement, you may safely take more, to suit your personal health program.</p>
					<p>Because high-protein foods have been found to increase alertness and Spirulina is the richest whole food source of protein, it is best to take WUKIYO® | vert at least four hours before going to bed.</p>
					<p>Otherwise, you can take it whenever you like - with, before, or between meals; before or after working out; or whenever your energy level is low. </p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>When should I use WUKIYO® | vert?</p>
				</div>
				<div class="hidden">
					<p>When you take the WUKIYO | vert™ Spirulina and Chlorella is completely up to you and how your body feels.</p>
					<p>Because high-protein foods have been found to increase alertness and Spirulina is the richest whole food source of protein, it is best to take WUKIYO® | vert at least four hours before going to bed.</p>
					<p>Otherwise, you can take it whenever you like - with, before, or between meals; before or after working out; or whenever your energy level is low. </p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>When will I begin to feel the effects?</p>
				</div>
				<div class="hidden">
					<p>It takes about 1 to 3 weeks for you to notice a change in energy levels. The results differ from person to person and obviously depend on your condition.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>How should I store WUKIYO® | vert and how long does it last?</p>
				</div>
				<div class="hidden">
					<p>WUKIYO® | vert can be stored anywhere [in your car, backpack, purse or desk], but we recommend a cool, dry place and out of the reach of children.</p>
					<p>If you want to keep WUKIYO® | vert fresh for as long as possible, make sure that the product is stored in an original container.</p>
					<p>WUKIYO® | vert has a shelf life of two years.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>Can I take any other stimulants with WUKIYO® | vert?</p>
				</div>
				<div class="hidden">
					<p>Yes, you can. </p>
					<p>No interactions were found between WUKIYO® | vert and other stimulants. This does not necessarily mean no interactions exist. Always consult your healthcare provider.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>Will WUKIYO® | vert interact with my medications?</p>
				</div>
				<div class="hidden">
					<p>There are no reports in the scientific literature to suggest that Spirulina or Chlorella interact with any conventional medications. However, interactions are always possible.</p>
					<p>Consult with your doctor before taking WUKIYO® | vert. This may be especially important if you have health concerns or are taking medications. </p>
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
			<img alt="Product logo" class="logo300" src="<?php echo get_template_directory_uri(); ?>/img/logos/wukiyo-vert.svg">
			<div class="product-reviews-stats vert">
				<h3>Customer Reviews</h3>
				<div class="rating-wrapper desktop">
					<img alt="Customer Rating" src="<?php echo get_template_directory_uri(); ?>/img/rating-stars@2x.webp">
					<p class="rating-stats vert">4.80 <span>based on 825 reviews</span></p>
				</div>
				<div class="d-lg-none">
					<div class="d-flex">
						<img alt="Customer Rating" src="<?php echo get_template_directory_uri(); ?>/img/rating-stars@2x.webp">
						<p class="rating-stats">4.80</p>
					</div>
					<p class="stats-text vert">based on 825 reviews</p>
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
