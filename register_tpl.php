<?php /* Template Name: Register template */
get_header(); ?>

<div class="register-container sitePadding">
    <h2 class="register-title"><?php esc_html_e('Register', 'woocommerce'); ?></h2>
    <?php do_action('woocommerce_before_customer_login_form'); ?>

    <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

        <?php do_action('woocommerce_register_form_start'); ?>
        <?php if ('no' === get_option('woocommerce_registration_generate_username')): ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label class="my-account-field-label" for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>
                    <span class="required">*</span></label>
                <input type="text" class="my-account-field-input woocommerce-Input woocommerce-Input--text input-text"
                    name="username" id="reg_username" autocomplete="username"
                    value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
            </p>

        <?php endif; ?>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label class="my-account-field-label" for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>
                <span class="required">*</span></label>
            <input type="email" class="my-account-field-input woocommerce-Input woocommerce-Input--text input-text"
                name="email" id="reg_email" autocomplete="email"
                value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
        </p>

        <?php if ('no' === get_option('woocommerce_registration_generate_password')): ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label class="my-account-field-label" for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>
                    <span class="required">*</span></label>
                <input type="password" class="my-account-field-input woocommerce-Input woocommerce-Input--text input-text"
                    name="password" id="reg_password" autocomplete="new-password" />
            </p>

        <?php else: ?>

            <p><?php esc_html_e('A password will be sent to your email address.', 'woocommerce'); ?></p>

        <?php endif; ?>

        <?php do_action('woocommerce_register_form'); ?>

        <p class="woocommerce-FormRow form-row">
            <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
            <button type="submit"
                class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit button-font"
                name="register"
                value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
        </p>

        <?php do_action('woocommerce_register_form_end'); ?>
    </form>
</div>

<script type="text/javascript">
    // TODO: postoji isto u form-checkout
    $(document).ready(function () {
        $('input, select').each(function () {
            let element = $(this);
            if (element.val() && element.val() !== "") {
                element.parents('.form-row').children('label').toggleClass("focused");
            }
        });
        $('input, select').focus(function () {
            let element = $(this);
            if (!element.val()) {
                element.parents('.form-row').children('label').toggleClass("focused");
            }
        });
        $('input, select').focusout(function () {
            let element = $(this);
            if (!element.val()) {
                element.parents('.form-row').children('label').removeClass("focused");
            }
        });
    })
</script>

<?php
get_footer();