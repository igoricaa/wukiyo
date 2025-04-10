<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.7.0
 */

defined('ABSPATH') || exit;

/**
 * Hook - woocommerce_before_edit_account_form.
 *
 * @since 2.6.0
 */
do_action('woocommerce_before_edit_account_form');
?>

<h3 class="dashboard-title">Account details</h3>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action('woocommerce_edit_account_form_tag'); ?>>

	<?php do_action('woocommerce_edit_account_form_start'); ?>

	<p class="mb-0 woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		<label class="mt-0" for="account_first_name"><span
				class="label-name"><?php esc_html_e('First name: ', 'woocommerce'); ?></span><?php echo esc_attr($user->first_name); ?></label>
	</p>
	<p class="mb-0 woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
		<label class="mt-0" for="account_last_name"><span
				class="label-name"><?php esc_html_e('Last name: ', 'woocommerce'); ?></span><?php echo esc_attr($user->last_name); ?></label>
	</p>
	<div class="clear"></div>

	<p class="mb-0 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label class="mt-0" for="account_display_name"><span
				class="label-name"><?php esc_html_e('Display name: ', 'woocommerce'); ?></span><?php echo esc_attr($user->display_name); ?></label>
	</p>
	<div class="clear"></div>

	<p class="mb-0 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label class="mt-0" for="account_email"><span
				class="label-name"><?php esc_html_e('Email address: ', 'woocommerce'); ?></span><?php echo esc_attr($user->user_email); ?></label>
	</p>

	<fieldset>
		<h3 class="my-acc-section-header"><?php esc_html_e('Password change', 'woocommerce'); ?></h3>

		<p class="password-change-fields woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label
				for="password_current"><?php esc_html_e('Current password ', 'woocommerce'); ?><span><?php esc_html_e('(leave blank to leave unchanged)', 'woocommerce'); ?></span></label>
			<br>
			<label class="my-account-field-label" for="password_current">Password</label>
			<input type="password"
				class="my-account-field-input woocommerce-Input woocommerce-Input--password input-text"
				name="password_current" id="password_current" autocomplete="off" />
		</p>
		<p class="password-change-fields woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label
				for="password_1"><?php esc_html_e('New password ', 'woocommerce'); ?><span><?php esc_html_e('(leave blank to leave unchanged)', 'woocommerce'); ?></span></label>
			<br>
			<label class="my-account-field-label" for="password_1">Password</label>
			<input type="password"
				class="my-account-field-input woocommerce-Input woocommerce-Input--password input-text"
				name="password_1" id="password_1" autocomplete="off" />
		</p>
		<p class="password-change-fields woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="password_2"><?php esc_html_e('Confirm new password', 'woocommerce'); ?></label>
			<br>
			<label class="my-account-field-label" for="password_2">Password</label>
			<input type="password"
				class="my-account-field-input woocommerce-Input woocommerce-Input--password input-text"
				name="password_2" id="password_2" autocomplete="off" />
		</p>
	</fieldset>
	<div class="clear"></div>

	<?php
	/**
	 * My Account edit account form.
	 *
	 * @since 2.6.0
	 */
	do_action('woocommerce_edit_account_form');
	?>

	<p>
		<?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>
		<button type="submit" class="woocommerce-Button button button-font" name="save_account_details"
			value="<?php esc_attr_e('Save changes', 'woocommerce'); ?>"><?php esc_html_e('Save changes', 'woocommerce'); ?></button>
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action('woocommerce_edit_account_form_end'); ?>
</form>

<?php do_action('woocommerce_after_edit_account_form'); ?>