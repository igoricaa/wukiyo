</div>
<footer id="colophon" class="site-footer">
	<div class="footer-wrapper">
		<div class="first-row">
			<div class="desktop socialIcons">
				<a href="<?php the_field('facebook_link', 'option') ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/Facebook-black.svg">
				</a>
				<a href="<?php the_field('instagram_link', 'option') ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/Instagram-black.svg">
				</a>
				<a href="<?php the_field('twitter_link', 'option') ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/Twitter-black.svg">
				</a>
			</div>
			<div class="info-column">
				<p class="fontBold">Corporate HQ</p>
				<p>W-YO®</p>
				<p>Weesperstraat 61-105</p>
				<p>Amsterdam, Netherlands 1018VN</p>
				<br>
				<p>1355 NW Everett St</p>
				<p>Portland, OR 97209, US</p>
				<p><a href="mailto:support@wukiyo.com">support@wukiyo.com</a></p>
			</div>
			<div class="links-column">
				<a class="fontBold" href="<?php echo get_home_url(); ?>/product">Shop</a>
				<a class="fontBold" href="<?php echo get_home_url(); ?>#about">About us</a>
				<a class="fontBold" href="<?php the_field('faq_link', 'option') ?>">FAQ</a>
				<a class="fontBold" href="<?php the_field('faq_link', 'option') ?>">My account</a>
				<a class="fontBold" href="<?php echo get_home_url(); ?>#contact">Contact</a>
			</div>
			<div class="policies-column">
				<a href="<?php the_field('terms_link', 'option') ?>">Terms and conditions</a>
				<a href="<?php the_field('privacy_link', 'option') ?>">Privacy policy</a>
				<a href="<?php the_field('purchase_ink', 'option') ?>">Purchase policy</a>
			</div>
			<div class="trademark-column">
				<p>(C) 2020 W-YO®<br>
					All rights reserved.</p>
			</div>
			<div class="logos-column">
				<div class="logo-container">
					<a href="<?php echo get_home_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logos/wukiyo-everything.svg"
							alt="Everything you can be">
					</a>
				</div>
				<div>
					<img src="<?php echo bloginfo('template_url'); ?>/img/nootropics.svg">
				</div>
			</div>
		</div>
		<div class="disclaimer-row">
			<p>
				These statements have not been evaluated by the Food and Drug Administration. The products and
				information on this website are not intended to diagnose, treat, cure or prevent any disease.
			</p>
		</div>
	</div>
	<div class="footer-wrapper-mobile">
		<div class="logo-container">
			<a href="<?php echo get_home_url(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logos/wukiyo-everything-white.svg"
					alt="Everything you can be">
			</a>
		</div>
		<div class="statement">
			<p>
				These statements have not been evaluated by the Food and Drug Administration. The products and
				information on this website are not intended to diagnose, treat, cure or prevent any disease.
			</p>
		</div>
		<div class="revelation-row gray-bck sitePaddingNarrow">
			<div class="smallLogo">
				<img src="<?php echo bloginfo('template_url'); ?>/img/nootropics-white.svg">
			</div>
		</div>
		<div class="black-bck d-lg-none socialIcons homepage SocialIcons r60 mobile">
			<a href="<?php the_field('facebook_link', 'option') ?>">
				<img alt="Facebook logo" src="<?php echo get_template_directory_uri(); ?>/img/Facebook.svg">
			</a>
			<a href="<?php the_field('instagram_link', 'option') ?>">
				<img alt="Instagram logo" src="<?php echo get_template_directory_uri(); ?>/img/Instagram.svg">
			</a>
			<a alt="Twitter logo" href="<?php the_field('twitter_link', 'option') ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/img/Twitter.svg">
			</a>
		</div>
	</div>
</footer>
<script type="text/javascript">
	$(document).ready(function () {
		$('.toggleAccordion').on('click', function () {
			let accordion = $(this);

			if (accordion.hasClass('active')) {
				accordion.next('.hidden').slideUp();
				accordion.removeClass('active');
			} else {
				accordion.next('.hidden').slideDown();

				if (accordion.hasClass('product-specific-question')) {
					toggleAccordion(accordion, '.faq-product');
				} else if (accordion.hasClass('product-accordion')) {
					toggleAccordion(accordion, '.faq-products-accordions');
				} else if (accordion.hasClass('general-question')) {
					toggleAccordion(accordion, '.accordionContent');
				} else if (accordion.hasClass('baits')) {
					toggleAccordion(accordion, '.product-accordions-wrapper');
				} else if (accordion.hasClass('ingredient')) {
					toggleAccordion(accordion, '.product-ingredients-wrapper');
				} else if (accordion.hasClass('single-general-questions')) {
					toggleAccordion(accordion, '.product-qa-wrapper');
				}

				accordion.addClass('active');
			}

			function toggleAccordion(accordion, parent) {
				let activeAccordion = accordion.closest(parent).find('.toggleAccordion.active');
				activeAccordion.next('.hidden').slideUp();
				activeAccordion.removeClass('active');
			}
		});
	});
</script>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>