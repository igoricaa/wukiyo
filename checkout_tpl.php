<?php /* Template Name: Checkout template */
get_header(); ?>
<div class="checkout container-fluid mild-gray-bck">
	<?php echo do_shortcode('[woocommerce_checkout]'); ?>
</div>

<?php
get_footer();
