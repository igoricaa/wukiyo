<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

global $product;
$logo;
$rating;
$esseId = 26;
$apexId = 350;
$blissId = 356;
$pureId = 359;
$vertId = 361;
$id = $product->get_id();

switch ($id) {
	case $esseId:
		$logo = "/img/logos/wukiyo-esse.svg";
		$rating = 4.91;
		break;
	case $apexId:
		$logo = "/img/logos/wukiyo-apex.svg";
		$rating = 4.89;
		break;
	case $blissId:
		$logo = "/img/logos/wukiyo-bliss.svg";
		$rating = 4.95;
		break;
	case $pureId:
		$logo = "/img/logos/wukiyo-pure.svg";
		$rating = 4.86;
		break;
	case $vertId:
		$logo = "/img/logos/wukiyo-vert.svg";
		$rating = 4.80;
		break;
}

?>
<div class="d-flex align-items-center">
	<img alt="Product logo" class="title-logo" src="<?php echo get_template_directory_uri();
	echo $logo ?>">

	<div class="woocommerce-product-rating d-flex align-items-center">
		<img alt="Customer Rating" src="<?php echo get_template_directory_uri(); ?>/img/rating-stars.webp">
		<span class="bold"><?php echo $rating ?></span>
	</div>

</div>