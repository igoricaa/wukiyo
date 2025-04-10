<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Revelationnootropics
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function revelationnootropics_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'revelationnootropics_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function revelationnootropics_woocommerce_scripts() {
	wp_enqueue_style( 'revelationnootropics-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'revelationnootropics-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'revelationnootropics_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' ); 

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function revelationnootropics_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'revelationnootropics_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function revelationnootropics_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'revelationnootropics_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'revelationnootropics_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function revelationnootropics_woocommerce_wrapper_before() {
		?>
			<main id="primary" class="site-main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'revelationnootropics_woocommerce_wrapper_before' );

if ( ! function_exists( 'revelationnootropics_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function revelationnootropics_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'revelationnootropics_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'revelationnootropics_woocommerce_header_cart' ) ) {
			revelationnootropics_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'revelationnootropics_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function revelationnootropics_woocommerce_cart_link_fragment( $fragments ) {
		$arr = [];
		foreach ( WC() -> cart -> get_cart() as $cart_item_key => $cart_item ) {
			$arr[$cart_item['product_id']] = $cart_item_key;
		}

		ob_start();
		revelationnootropics_woocommerce_cart_link();
		$fragments['div.count'] = ob_get_clean();
		$fragments['cart_item_keys'] = $arr;

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'revelationnootropics_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'revelationnootropics_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function revelationnootropics_woocommerce_cart_link() {
		?>
	
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', WC()->cart->get_cart_contents_count(), 'revelationnootropics' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<div class="count"><?php echo esc_html( $item_count_text ); ?></div>
		<?php
	}
}

if ( ! function_exists( 'revelationnootropics_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function revelationnootropics_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php revelationnootropics_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

function woocommerce_ajax_add_to_cart() {
	
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

        do_action('woocommerce_ajax_added_to_cart', $product_id);

        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }

        WC_AJAX :: get_refreshed_fragments();
    } else {

        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

        echo wp_send_json($data);
    }

    wp_die();
}

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');

// Removing products rating, price and meta data (rating is moved into title.php, price into simple.php)
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);

// Customizing woocommerce_after_single_product_summary so that only Reviews are displayed
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);


// TODO - da li je potrebno?
// Change Flexslider to use dots instead of thumbnails
add_filter( 'woocommerce_single_product_carousel_options', 'ud_update_woo_flexslider_options' );

function ud_update_woo_flexslider_options( $options ) {
	$options['controlNav'] = true;
	return $options;
}


/**
 * Removing description and additional information tabs from product tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_custom_product_tabs', 98);
function woo_custom_product_tabs($tabs) {
	if( function_exists('is_product') && is_product() ) {
		unset($tabs['description']);
		unset($tabs['additional_information']);
		return $tabs;
	}
}

/**
 * Removing comment_notes_before ("Your email address will not be published. Required fields are marked *) from review form
 */
add_filter('comment_form_defaults','customize_comments_form_defaults');
function customize_comments_form_defaults($defaults) {
	if( function_exists('is_product') && is_product() ) {
		$defaults['comment_notes_before'] = '';
		return $defaults;
	}
}

/**
 * Removing cookies consent checkbox from review form
 */
add_filter('comment_form_fields', 'comment_form_hide_cookies_consent');
function comment_form_hide_cookies_consent($fields) {
	if( function_exists('is_product') && is_product() ) {
		unset($fields['cookies']);
		return $fields;
	}
}

add_filter( 'comment_form_fields', 'codeless_woo_comment_form_fields', 9 );
function codeless_woo_comment_form_fields( $fields ){
	if( function_exists('is_product') && is_product() ){
		$fields_order=[
		'author' => null,
		'email' => null,
		'comment'=> null
		];

		$fields = array_replace_recursive($fields_order, $fields);
	}
	return $fields;
}

/**
 * Removes "In stock" message on single product page
 */
add_filter( 'woocommerce_stock_html', 'remove_in_stock_text_form_single_products', 10, 3 );
function remove_in_stock_text_form_single_products( $html, $text, $product ) {
    $availability = $product->get_availability();
    if ( isset( $availability['class'] ) && 'in-stock' === $availability['class'] ) {
        return '';
    }
    return $html;
}

/**
 * Removes add to cart message from single product page
 */
add_filter( 'wc_add_to_cart_message', 'remove_add_to_cart_message' );
function remove_add_to_cart_message() {
    return;
}

add_filter( 'woocommerce_get_price_html', 'custom_price_html', 100, 2 );
function custom_price_html( $price, $product ){
	if ( is_post_type_archive('product') ) {
		return str_replace( '</bdi></span></ins>', ' USD</bdi></span></ins>', $price );
	} else {
		return str_replace( '</bdi>', ' USD</bdi>', $price );
	}
}

add_filter( 'woocommerce_registration_redirect', 'custom_redirection_after_registration', 10, 1 );
function custom_redirection_after_registration( $redirection_url ){
    $redirection_url = get_permalink(wc_get_page_id('myaccount'));

    return $redirection_url;
}

add_action('wp_logout','custom_redirection_after_logout');
function custom_redirection_after_logout(){
	wp_redirect( '/login' );
	exit;
}

add_filter( 'woocommerce_login_redirect', 'custom_redirection_after_login', 10, 1 );
function custom_redirection_after_login( $redirection_url ){
    $redirection_url = get_permalink(wc_get_page_id('myaccount'));

    return $redirection_url;
}

add_action( 'template_redirect', 'redirect_to_my_account_if_user_is_logged_in' );
function redirect_to_my_account_if_user_is_logged_in() {
	if ((is_page(534) || is_page(536)) && is_user_logged_in()) {
		wp_redirect( '/my-account '); 
		exit;
	}
}
// add_action( 'template_redirect', 'redirect_from_my_account_if_user_is_not_logged_in' );
// function redirect_from_my_account_if_user_is_not_logged_in() {
// 	if (is_page(22) && !is_user_logged_in()) {
// 		wp_redirect( '/login '); 
// 	exit;
// 	}
// }

add_action( 'woocommerce_before_calculate_totals', 'add_custom_price' );
function add_custom_price( $cart_object ) {
	$cart = WC() -> cart;
	foreach ( $cart -> get_cart() as $cart_item_key => $cart_item ) {
		$product_quantity = $cart_item['quantity'];
		if ($product_quantity > 1 && !(class_exists('WC_Subscriptions_Product') && WC_Subscriptions_Product::is_subscription($_product))) {
			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

			$original_price = $_product -> get_sale_price();
			$percentage =  (10 / 100) * $original_price;
			$newprice = $original_price - $percentage;
			$_product -> set_price( $newprice );
		}
	}
}