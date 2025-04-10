<?php /* Template Name: My Account template */
get_header(); ?>

<div class="my-account sitePadding mild-gray-bck">
	<?php echo do_shortcode('[woocommerce_my_account]'); ?>
</div>

<!-- TODO: premesti js, probaj preko css-a da ga sredis -->
<script type="text/javascript">
	$('#update_all_subscriptions_addresses').change(function() {
        let isChecked = $(this).is(':checked');
		if (isChecked) {
			$('#update_all_subscriptions_addresses_field .checkbox').addClass('is-checked');
		} else {
			$('#update_all_subscriptions_addresses_field .checkbox').removeClass('is-checked');
		}
        
    });
	// TODO: postoji isto u form-checkout
	$(document).ready(function() {
		$('input, select').each(function() {
			let element = $(this);
			if ( element.val() && element.val() !== "" ) {
         	   element.parents('.form-row').children('label').toggleClass("focused");
			}
		});
		$('input, select').focus(function() {
			let element = $(this);
			if ( !element.val() ) {
				element.parents('.form-row').children('label').toggleClass("focused");
			}
		});
		$('input, select').focusout(function() {
			let element = $(this);
			if( !element.val() ) {
				element.parents('.form-row').children('label').removeClass("focused");
			}
		});
	})
</script>

<?php
get_footer();