<?php
/**
 * Email Styles
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-styles.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 4.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load colors.
$bg        = get_option( 'woocommerce_email_background_color' );
$body      = get_option( 'woocommerce_email_body_background_color' );
$base      = get_option( 'woocommerce_email_base_color' );
$base_text = wc_light_or_dark( $base, '#252626', '#ffffff' );
$text      = get_option( 'woocommerce_email_text_color' );

// Pick a contrasting color for links.
$link_color = wc_hex_is_light( $base ) ? $base : $base_text;

if ( wc_hex_is_light( $body ) ) {
	$link_color = wc_hex_is_light( $base ) ? $base_text : $base;
}

$bg_darker_10    = wc_hex_darker( $bg, 10 );
$body_darker_10  = wc_hex_darker( $body, 10 );
$base_lighter_20 = wc_hex_lighter( $base, 20 );
$base_lighter_40 = wc_hex_lighter( $base, 40 );
$text_lighter_20 = wc_hex_lighter( $text, 20 );
$text_lighter_40 = wc_hex_lighter( $text, 40 );

// !important; is a gmail hack to prevent styles being stripped if it doesn't like something.
// body{padding: 0;} ensures proper scale/positioning of the email in the iOS native email app.
?>
body {
	padding: 0;
}

#wrapper {
	background-color: #fff;
	margin: 0;
	padding: 70px 0;
	-webkit-text-size-adjust: none !important;
	width: 100%;
}

#template_container {
	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1) !important;
	background-color: <?php echo esc_attr( $body ); ?>;
}

#template_header {
	background-color: <?php echo esc_attr( $base ); ?>;
	border-radius: 3px 3px 0 0 !important;
	color: <?php echo esc_attr( $base_text ); ?>;
	border-bottom: 0;
	font-weight: bold;
	line-height: 100%;
	vertical-align: middle;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
}

#template_header h1,
#template_header h1 a {
	color: <?php echo esc_attr( $base_text ); ?>;
	background-color: inherit;
}

#template_header_image img {
	margin-left: 0;
	margin-right: 0;
}

#template_footer {
	background-color: #fff;
	padding: 55px 60px;
	border: 1px solid <?php echo esc_attr( $bg ); ?>;
}
#template_footer td {
	padding: 0;
	border-radius: 6px;
}

#template_footer #credit {
	border: 0;
	color: <?php echo esc_attr( $text_lighter_40 ); ?>;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
	font-size: 12px;
	text-align: center;
	padding: 24px 0;
}

#template_footer #credit p {
	margin: 0 0 16px;
}

#body_content {
	background-color: <?php echo esc_attr( $body ); ?>;
}

#body_content table td {
	padding: 50px 50px 70px;
}

#body_content table td td {
	padding: 0px;
}

#body_content table td th {
	padding: 0px;
}

#body_content td ul.wc-item-meta {
	font-size: small;
	margin: 1em 0 0;
	padding: 0;
	list-style: none;
}

#body_content td ul.wc-item-meta li {
	margin: 0.5em 0 0;
	padding: 0;
}

#body_content td ul.wc-item-meta li p {
	margin: 0;
}

#body_content p {
	margin: 0 0 5px;
}

#body_content_inner {
	color: <?php echo esc_attr( $text ); ?>;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
	font-size: 14px;
	text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}

.td {
	color: <?php echo esc_attr( $text ); ?>;
	border: 1px solid <?php echo esc_attr( $base ); ?>;
	vertical-align: middle;
}

#width-wrapper {
	width: 60%;
}
.header-wrapper {
	padding: 70px 0px 50px;
	margin: 0 50px;
	border-bottom: 1px solid <?php echo esc_attr( $base ); ?>;
}
.email-column-wrapper {
	padding: 50px 0;
	border-bottom: 1px solid <?php echo esc_attr( $base ); ?>;
	width: 100%;
	vertical-align: top;
}
.im {
	color: inherit !important;
}
.email-column {
	text-align: left;
	font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;
}
.email-column, .empty-column {
	width: 33%;
	padding: 0px;
}
.email-column p {
	font-size: 17px;
}
.email-column p a {
	pointer-events: none;
    text-decoration: none;
	margin-bottom: 12px;
}
.email-column a, td a {
	font-size: 17px;
    color: <?php echo esc_attr( $text ); ?>;
    pointer-events: none;
    text-decoration: none;
	margin-bottom: 12px;
}
.order-confirmation-intro p {
	font-weight: 700;
	font-size: 22px;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
	margin-bottom: 0;
}
.order-confirmation-intro {
	padding-bottom: 50px;
	border-bottom: 1px solid <?php echo esc_attr( $base ); ?>;
}
#addresses {
	border-bottom: 1px solid <?php echo esc_attr( $base ); ?>;
	padding: 50px 0;
	width: 100%;
	vertical-align: top;
}
#addresses tbody {
	width: 100%;
}
.address {
	color: <?php echo esc_attr( $text ); ?>;
	font-size: 17px;
	margin-bottom: 12px;
	font-style: normal;
}
.email-order-summary {
	background-color: #fff;
	border-radius: 25px;
	padding: 35px 25px 20px;
	margin-top: 50px;
}
.email-order-summary h2 {
	margin-bottom: 20px;
}
.mini-cart-wrapper {
	padding: 25px 0 5px;
	border-top: 1px solid <?php echo esc_attr( $base ); ?>;
	border-bottom: 1px solid <?php echo esc_attr( $base ); ?>;
}
.cart-product-wrapper {
	width: 100%;
	margin-bottom: 20px;
}
.cart-product-img-logo {
	float: left;
}
.cart-product-image,
.cart-product-logo {
	display: inline-block;
}
.cart-product-image img {
	max-width: 50px;
	border: 1px solid <?php echo esc_attr( $base ); ?>;
	border-radius: 8px;
}
.cart-product-logo img {
	max-width: 130px;
}
.cart-product-price {
	font-weight: 700;
	font-size: 17px;
	text-align: right;
}
.cart-numbers-wrapper {
	padding: 20px 0;
	border-bottom: 1px solid <?php echo esc_attr( $base ); ?>;
}
.cart-numbers {
	display: inline-block;
	width: 100%;
}
.number-title {
	float: left;
	margin: 0 !important;
	font-size: 17px;
}
.number-value {
	float: right;
	font-weight: 700;
	font-size: 17px;
	margin: 0 !important;
}
.cart-total-wrapper {
	display: inline-block;
	width: 100%;
	padding-top: 20px;
}
.cart-total-wrapper .number-title {
	font-weight: 700;
}
.desktop-footer .revelations-logo-wrapper img,
.desktop-footer .wukiyo-logo-wrapper img {
	max-width: 200px;
}
.revelations-logo-wrapper {
	text-align: left;
}
.wukiyo-logo-wrapper {
	text-align: right;
}
.social-icons-wrapper {
	text-align: center;
}
.social-icons-wrapper img {
	border: 1px solid <?php echo esc_attr( $base ); ?>;
	border-radius: 50%;
	width: 15px;
	height: 15px;
	padding: 10px;
}
.mobile-footer {
	display: none;
}
.tracking-number {
	margin: 45px 0;
}
.randomness {
	opacity: 0;
	width: 0;
	height: 0;
	display:block; 
	font-size: 1px;
}

.text {
	color: <?php echo esc_attr( $text ); ?>;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
}

.link {
	color: <?php echo esc_attr( $link_color ); ?>;
}

#header_wrapper {
	padding: 36px 48px;
	display: block;
}

h1 {
	color: <?php echo esc_attr( $base ); ?>;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
	font-size: 55px;
	font-weight: 700;
	margin: 0 0 50px;
	text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}
h2 {
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
	font-size: 25px;
	font-weight: 700;
	margin: 0 0 30px;
}
h3 {
	color: <?php echo esc_attr( $base ); ?>;
	display: block;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
	font-size: 20px;
	font-weight: bold;
	text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}

img {
	border: none;
	display: inline-block;
	font-size: 14px;
	font-weight: bold;
	height: auto;
	outline: none;
	text-decoration: none;
	text-transform: capitalize;
	vertical-align: middle;
	margin-<?php echo is_rtl() ? 'left' : 'right'; ?>: 10px;
	max-width: 100%;
	height: auto;
}

@media screen and (max-width: 576px) {
	#body_content table td {
		padding: 25px 25px 50px !important;
	}
	.header-wrapper {
		padding: 50px 0px 30px !important;
		margin: 0 20px !important;
	}
	#width-wrapper {
		width: 100% !important;
	}
	h1 {
		font-size: 25px !important;
	}
	h2 {
		font-size: 20px !important;
	}
	h3 {
		font-size: 15px !important;
	}
	.desktop-footer {
		display: none !important;
	}
	.mobile-footer {
		display: table !important;
	}
	.wukiyo-logo-wrapper {
		background-color: #0095DA !important;
		padding: 12px 24px !important;
	}
	.email-column p,
	.email-column a,
	.address,
	.number-title,
	.cart-product-price,
	.number-value {
		font-size: 12px !important;
	}
	.empty-column {
		display: none !important;
	}
	.email-column {
		width: 50% !important;
	}
	.mini-cart-wrapper {
		border: none !important;
		padding: 0px !important;
	}
	.cart-product-wrapper {
		border-bottom: 1px solid <?php echo esc_attr( $base ); ?> !important;
		padding: 10px 0px !important;
		margin-bottom: 0px !important;
	}
	.tracking-number {
		margin: 25px 0px !important;
	}
	#addresses {
		padding: 15px 0px !important;
	}
	.email-column-wrapper {
		padding: 15px 0px !important;
	}
	.email-order-summary {
		padding: 25px 15px 15px !important;
		margin-top: 50px !important;
	}
	.order-confirmation-intro {
		padding-bottom: 20px !important;
	}
	.order-confirmation-intro p {
		font-size: 18px !important;
	}
	.cart-product-image {
		margin-right: 7px !important;
		padding: 0 !important;
	}
	.cart-product-image img {
		max-width: 40px !important;
	}
	.cart-product-logo img {
		max-width: 100px !important;
	}
	.cart-numbers-wrapper {
		padding-top: 0 !important;
	}
}
<?php
