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
				<img id="target" class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/apex/1.webp" 
				data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/apex/1.webp" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/apex/2.webp" 
				data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/apex/2.webp" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/apex/3.webp"
				data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/apex/3.webp" alt="Third slide">
			</div>
			<div class="carousel-item">
				<img class="target" src="<?php echo bloginfo('template_url'); ?>/img/carousel/apex/4.webp"
				data-magnify-src="<?php echo bloginfo('template_url'); ?>/img/carousel/apex/4.webp" alt="Fourth slide">
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
				<p class="bold">WUKIYO | apex™<br>Nootropics, reinvented.</p>
				<p>apex \ ˈeɪpɛks \</p>
			</div>
			<div class="specific-description">
				<p>The highest point of achievement.<br>
				The top or highest part of something, especially one forming a point.</p>
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
							<p>"As a researcher, I have reviewed the studies conducted on ingredients used to formulate synthetics 
								agents in our arsenal with a peer-reviewed evidence base for optimizing neurotransmitter production, 
								neuroprotective effects and improving circulation to the brain, 
								all of which may improve mental stamina and focus and alleviate disruptive mental symptoms. 
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
							<p>"I took WUKIYO | apex™ the first day and everyone kept coming up to me and asking me whats wrong. 
								It was in a joking manner because nothing was actually wrong with me, I was just killing it. 
								Setting a bunch of meetings, cold calls, etc. I was "in the zone". 
								Feel like this is almost like natural Adderall. 
								I'm really thankful that I found this product and I think I will be trying some of the other WUKIYO products."
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
								Trying them all I can conclude that WUKIYO | apex™ is unquestionably the best nootropics supplement in the market! 
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
				<p class="cert-text mb-0">NSF International verifies that products meet public health and safety 
					standards. WUKIYO | apex™ passed with flying colors.</p>
			</div>
			<div class="product-cert">
				<div class="cert-img-2">
					<img src="<?php echo get_template_directory_uri(); ?>/img/fda-compliant@2x.webp" alt="FDA Logo">
				</div>
				<p class="cert-text mb-0">The Food and Drug Administration (FDA) regulates the safety of food, 
					drugs, and other consumer products. WUKIYO | apex™ fits the bill.</p>
			</div>
			<div class="product-cert">
				<div class="cert-img-3">
					<img src="<?php echo get_template_directory_uri(); ?>/img/WADA@2x.webp" alt="WADA Logo">
				</div>
				<p class="cert-text mb-0">The World Anti-Doping Agency (WADA) monitors the fight against 
					drugs in sports. WUKIYO | apex™ can keep you in the zone and in the game.</p>
			</div>
		</div>
		
		<div class="product-benefits-wrapper apex">
			<h3>Benefits</h3>
			<p>• Provides support for every aspect of cognitive performance: focus, working memory,<br>
			procesing speeds, reaction times, and overall brain health.</p>
			<p>• Improved focus 10+ hours.</p>
			<p>• Performance-driven thinking like focus, short-term memory, stress resistance and others that help to give a more immediate edge to productivity, intensity, competition, deadline, exams, etc.</p>
			<p>• Heightened 'flow state', the feeling of being in the zone.</p>
			<a href="#top">
				<button class="buy-now-button blue-button">BUY NOW</button>
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
				<img alt="Product logo" class="mr-3 logo300" src="<?php echo get_template_directory_uri(); ?>/img/logos/wukiyo-apex.svg">
				<h3>Ingredients</h3>
			</div>
			<p class="ingredients-subsection bold">W-YO® | W-sensei™</p>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">L-Tyrosine<span class="ingredient-quantity">300 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Helps the body produce neurotransmitters that help nerve cells communicate. 
						Tyrosine is particularly important in the production of epinephrine, norepinephrine, and dopamine.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Curcumin<span class="ingredient-quantity">250 mg</span> + Piperine <span class="ingredient-quantity">3 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Boost levels of the brain hormone BDNF, 
						which increases the growth of new neurons and may help fight various degenerative processes in your brain.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Phosphatidylserine<span class="ingredient-quantity">250 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">The vitamins, minerals, and micronutrients in phosphatidylserine provide some important health benefits. 
						Phosphatidylserine is known to act as an antioxidant, helping reduce the effects of dangerous free radicals on your body.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">CRL-21X™<span class="ingredient-quantity">100 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">The original novel nootropic and neuroprotective agent CRL-21X™.<br>
					While a variety of potential mechanisms have been proposed, human imaging studies suggest that CRL-21X™ increases dopamine via DAT blockade. 
					The CRL-21X™ both enhances cellular metabolism and reduces free-radicals in neurons.
					</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Phenibut HCL<span class="ingredient-quantity">60 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">The Phenibut HCL effects begin when it binds to the GABA receptors in the brain to reduce anxiety, 
						promote relaxation, social ease, and pain relief by reducing the signals from the central nervous system to the brain.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Noopept<span class="ingredient-quantity">10 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Because Noopept easily crosses the blood-brain barrier, 
						it's considered a fast-acting chemical that has the ability to take immediate effect in your body and affects your cognition. 
						Noopept stimulates the production of NGF and BDNF in the hippocampus. </p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<p class="ingredients-subsection bold">W-YO® | W-komorai™</p>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Citicoline<span class="ingredient-quantity">250 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">As a brain supplement, citicoline helps raise levels of important neurotransmitters, 
						increase mental energy, protects the brain from aging and improves overall mental performance.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Alpha-GPC<span class="ingredient-quantity">200 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Alpha-GPC administration increases the release of the neurotransmitter acetylcholine and facilitates learning and memory. 
						In athletes, Alpha-GPC supplementation prevents exercise-induced reductions in choline levels, 
						increases endurance performance and growth hormone secretion.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">FL66™<span class="ingredient-quantity">16 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">The original novel nootropic and neuroprotective agent FL66™. 
						Although the exact mechanism of action has yet to be fully elucidated, 
						FL66™ appears to inhibit the reuptake of dopamine by binding to the dopamine-reuptake pump, 
						which leads to an increase in extracellular dopamine levels in some brain regions. 
					</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Folate<span class="ingredient-quantity">400 mcg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Some of the important functions folate aides in are the creation of DNA and RNA, 
						formation of neurotransmitters, and the formation of the nervous system during pregnancy. 
						Folate is also known to help with depression, mental fatigue, and irritability because it can be quickly broken down and supply the body with energy.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Magnesium<span class="ingredient-quantity">200 mg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Magnesium acts as the gatekeeper for NMDA receptors, which are involved in healthy brain development, memory and learning. 
						It prevents nerve cells from being overstimulated, which can kill them and may cause brain damage.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Vitamin K<span class="ingredient-quantity">100 mcg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Vitamin K seems to have an antiapoptotic and anti-inflammatory effect mediated by the activation of Growth Arrest Specific Gene 6 and Protein S.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion ingredient">
					<p class="m-0 d-flex align-items-center">Vitamin D<span class="ingredient-quantity">62.5 mcg</span></p>
				</div>
				<div class="hidden">
					<p class="product-accordion-p">Vitamin D is neuroprotective, regulates the immune system and helps with calcium balance. 
						It is also involved with regulating many genes important for brain function. 
						Although vitamin D is thought of as a vitamin, it acts as a neurosteroid and plays important roles in the brain.</p>
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
				<div class="m-0 toggleAccordion single-general-questions">
					<p>What is WUKIYO® | apex?</p>
				</div>
				<div class="hidden">
					<p>WUKIYO® | apex is the evolution of nootropics supplements, a world's first genetically engineered, patented nootropics formulation. 
						WUKIYO® | apex functions as a whole-brain optimiser to support a state of peak overall mental performance.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>How does WUKIYO® | apex work?</p>
				</div>
				<div class="hidden">
					<p>It takes one tablet and as little as 30 minutes to enter a realm of mental clarity and enhanced focus. 
						In this heightened mental state, your reactions are faster, your focus clearer, your awareness heightened. 
						You're more productive, more efficient, you can push the limits and transcend the boundaries.</p>
					<p>The possibilities are endless.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>What are primary, patented ingredients of the WUKIYO® | apex?</p>
				</div>
				<div class="hidden">
					<p>The primary ingredients of the WUKIYO® | apex formulation are the researched chemicals CRL-21X™ and FL66™. Both are pharmacologically active biochemicals discovered by W-YO® during neuroscientific research of biochemical pathways.</p>
					<p>W-YO® has been awarded a Notice of Allowance from the United States Patent and Trademark Office for our two proprietary nootropic molecules CRL-21X™ and FL66™.</p>
					<p>The objective of the invention is to expand the arsenal of tools that improve microvascularization in brain tissue. The problem is solved by the use of CRL-21X™ and FL66™ as a means of improving microvascularization in brain tissue. Both chemicals have neuroprotective, antioxidant cardioprotective and antihypoxic activity, as well as antiarrhythmic, antiplatelet, antithrombotic and antithrombogenic properties.</p>
					<p>CRL-21X™ and FL66™ can be used in the complex therapy of pathologies accompanied by impaired microvascularization in the brain tissue. Thus, this technical solution meets the criteria of the invention: "novelty", "inventive step", "industrial applicability". </p>
					<p>Legal aspects</p>
					<p>Since the market is governed by multinational giants in the pharmaceutical industry, which impose high regulatory barriers to entry, we seek to create products that comply with demanding health-safety regulations and which seek to address the demands of consumers and institutions, creating a products which foregoes the best available tests in a laboratory environment.</p>
					<p>If you are interested in joining our team, where passion and belief in a worthy cause are celebrated and supported, please do contact us. We are always pleased to hear from talented and dedicated people, just like you, to join us and help make a real difference.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>How should I use WUKIYO® | apex?</p>
				</div>
				<div class="hidden">
					<p></p>
					<p>Recommended daily dose and suggested use:</p>
					<p>As a dietary supplement, take one tablet in the morning or early afternoon, with or without food.</p>
					<p>Drink plenty of water throughout the day to boost supplement absorption and avoid dehydration.</p>
					<p><span class="bold">Supplement cycle:</span> 3 days on | 1 day off.</p>
					<p>Please be responsible and do not exceed recommended daily dosage.</p>
					<p>This dietary supplement is intended for use by healthy adults [18+].</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>When should I use WUKIYO® | apex?</p>
				</div>
				<div class="hidden">
					<p>Take WUKIYO® | apex whenever you need a boost towards your desired state of mind. 
						Prior to an important meeting, a pitch, getting started on an important project, practicing or performing, studying, taking an exam, playing sports, etc.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>When will I begin to feel the effects?</p>
				</div>
				<div class="hidden">
					<p>Most people will start to experience the benefits of WUKIYO® | apex within 30 - 45 minutes of taking it. The effects build over time and become considerably more pronounced after two hours.</p>
					<p>The effects of WUKIYO® | apex will last for 10 hours or more.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>How should I store WUKIYO® | apex and how long does it last?</p>
				</div>
				<div class="hidden">
					<p>WUKIYO® | apex can be stored anywhere (in your car, backpack, purse or desk), but we recommend a cool, dry place and out of the reach of children.</p>
					<p>WUKIYO® | apex has a shelf life of two years.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>Can I take any other stimulants with WUKIYO® | apex?</p>
				</div>
				<div class="hidden">
					<p>We recommend you avoid taking any other high potency stimulants with WUKIYO® | apex at first, to see how you respond to WUKIYO® | apex alone. 
						Depending on the individual, some people may be able to use our products in combination with other stimulants.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>Will WUKIYO® | apex interact with my medications?</p>
				</div>
				<div class="hidden">
					<p>WUKIYO® | apex is intended for use by healthy adults [18+].</p>
					<p>Consult with your doctor before taking WUKIYO® | apex. This may be especially important if you have health concerns or are taking medications. Interactions are always possible.</p>
					<p>Also, remember that this website is not intended as a substitute for consulting with your doctor. This website does not provide medical advice or attempt to diagnose or treat an illness which should only be done under the direction of a healthcare professional.</p>
				</div>
			</div>
			<div class="black-border-bottom"></div>
			<div class="single-product-accordion">
				<div class="m-0 toggleAccordion single-general-questions">
					<p>What is the main difference between WUKIYO® | apex and WUKIYO® | esse?</p>
				</div>
				<div class="hidden">
					<p>Both formulations are designed to deliver similar benefits, but each does provide so in its unique way.</p>
					<p>Both WUKIYO® | apex and WUKIYO® | esse are potent stimulants and contain the same trademarked nootropic formulations by W-YO®, W-sensei™ and W-komorai™, along with two patented chemicals CRL-21X™ and FL66™.</p>
					<p>One of the key distinctions you'll notice between WUKIYO® | apex and WUKIYO® | esse is in the ingredient choice, mechanism of action, and effectiveness.</p>
					<p>In addition to the similarities mentioned above, WUKIYO® | esse uses several other clinically studied ingredients to aid cognitive enhancement and focuses on cognitive function in its entirety. Its all-inclusive formula compresses all the benefits of cognitive function, performance, productivity, neurogenesis, and long-term mental well-being.</p>
					<p>Unlike WUKIYO® | esse, which is geared towards complete and balanced cognitive enhancement, WUKIYO® | apex is designed specifically to highlight those effects with the only one tablet and through monthly supply product packaging, making you truly limitless.</p>					
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
			<img alt="Product logo" class="logo300" src="<?php echo get_template_directory_uri(); ?>/img/logos/wukiyo-apex.svg">
			<div class="product-reviews-stats">
				<h3>Customer Reviews</h3>
				<div class="rating-wrapper desktop">
					<img alt="Customer Rating" src="<?php echo get_template_directory_uri(); ?>/img/rating-stars@2x.webp">
					<p class="rating-stats">4.89 <span>based on 921 reviews</span></p>
				</div>
				<div class="d-lg-none">
					<div class="d-flex">
						<img alt="Customer Rating" src="<?php echo get_template_directory_uri(); ?>/img/rating-stars@2x.webp">
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
