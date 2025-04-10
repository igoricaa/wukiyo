<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;
get_header();

?>
<div class="archive-page-wrapper sitePadding headerPadding">
    <div class="archive-title">
        <h1><span class="border-bottom-short"></span>A Smarter Subscription</h1>
        <p>Members get exclusive 10% off.<br>
            Pick your products and select Subscribe and Save at checkout.<br><br class="d-none d-md-block">
            Get a confirmation email each time your WUKIYO® subscription is scheduled to ship.<br><br
                class="d-none d-md-block">
            Change, pause or cancel your subscription at any time. No strings attached.
        </p>
    </div>

    <?php include 'woocommerce/all-products.php'; ?>
    <?php include 'archive-newsletter-subscribe-form.php'; ?>

</div>
<?php
get_footer();
