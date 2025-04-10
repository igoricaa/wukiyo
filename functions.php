<?php
/**
 * Revelationnootropics functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Revelationnootropics
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

function woocommerce_ajax_add_to_cart_js() {
    wp_enqueue_script('woocommerce-ajax-add-to-cart', get_template_directory_uri() . '/js/ajax-add-to-cart.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'woocommerce_ajax_add_to_cart_js', 99);

/**
 * Load bootstrap from CDN
 * https://getbootstrap.com/
 *
 * Added functions to add the integrity and crossorigin attributes to the style and script tags.
 */
function enqueue_load_bootstrap() {
    // Add bootstrap CSS
    wp_register_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', false, NULL, 'all' );
    wp_enqueue_style( 'bootstrap-css' );

    // Add popper js
    wp_register_script( 'popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', ['jquery'], NULL, true );
    wp_enqueue_script( 'popper-js' );

    // Add bootstrap js
    wp_register_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', ['jquery'], NULL, true );
    wp_enqueue_script( 'bootstrap-js' );
}

function bootstarp_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
} 

add_action("wp_enqueue_scripts", "bootstarp_jquery_enqueue", 11);

// Add integrity and cross origin attributes to the bootstrap css.
function add_bootstrap_css_attributes( $html, $handle ) {
    if ( $handle === 'bootstrap-css' ) {
        return str_replace( '/>', 'integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />', $html );
    }
    return $html;
}
add_filter( 'style_loader_tag', 'add_bootstrap_css_attributes', 10, 2 );

// Add integrity and cross origin attributes to the bootstrap script.
function add_bootstrap_script_attributes( $html, $handle ) {
    if ( $handle === 'bootstrap-js' ) {
        return str_replace( '></script>', ' integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>', $html );
    }
    return $html;
}
add_filter('script_loader_tag', 'add_bootstrap_script_attributes', 10, 2);

// Add integrity and cross origin attributes to the popper script.
function add_popper_script_attributes( $html, $handle ) {
    if ( $handle === 'popper-js' ) {
        return str_replace( '></script>', ' integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>', $html );
    }
    return $html;
}
add_filter('script_loader_tag', 'add_popper_script_attributes', 10, 2);

add_action( 'wp_enqueue_scripts', 'enqueue_load_bootstrap' );

if ( ! function_exists( 'revelationnootropics_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function revelationnootropics_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Revelationnootropics, use a find and replace
		 * to change 'revelationnootropics' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'revelationnootropics', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'revelationnootropics' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'revelationnootropics_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'revelationnootropics_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function revelationnootropics_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'revelationnootropics_content_width', 640 );
}
add_action( 'after_setup_theme', 'revelationnootropics_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function revelationnootropics_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'revelationnootropics' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'revelationnootropics' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'revelationnootropics_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function revelationnootropics_scripts() {
	wp_enqueue_style( 'revelationnootropics-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'revelationnootropics-style', 'rtl', 'replace' );

	wp_enqueue_script( 'revelationnootropics-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

   wp_enqueue_script( 'newsletter-subscription-js', get_template_directory_uri() . '/js/newsletter-subscription.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'bup-js', get_template_directory_uri() . '/js/BUP.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'revelationnootropics_scripts' );

// ACF
if( function_exists('acf_add_options_page') ) {

    $page = acf_add_options_page(array(
        'page_title' 	=> __('My Theme Options', 'productify'),
        'menu_title' 	=> __('My Theme', 'productify'),
        'menu_slug' 	=> 'my-theme-options',
        'capability' 	=> 'edit_posts',
        'redirect' 	    => false
    ));

}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

add_filter("wc_stripe_elements_styling", "snippetpress_style_stripe_1");
function snippetpress_style_stripe_1($styles) {
    $styles = array(
        "base" => array( 
            "fontSize" => "14px",
            "fontWeight" => "light",
        ),
    );
    return $styles;
}

add_filter( 'woocommerce_email_recipient_customer_completed_order', 'your_email_recipient_filter_function', 10, 2);
function your_email_recipient_filter_function($recipient, $object) {
    $recipient = $recipient . ', admin@wukiyo.com';
    return $recipient;
}

function recaptcha_validate($token) {
   if (!isset($token)) {
      return false;
   }
   $siteverify = 'https://www.google.com/recaptcha/api/siteverify';
   $secret = '6Le-7JgfAAAAAKv6Uf-QRZaoLIU5nvJ7AUQ3FkNv';
   $response = file_get_contents($siteverify . '?secret=' . $secret . '&response=' . $token);
   $response = json_decode($response, true);
   return $response['success'];
}

add_action( 'wp_ajax_custom_action', 'custom_action' );
add_action( 'wp_ajax_nopriv_custom_action', 'custom_action' );
function custom_action() {
   if (!recaptcha_validate($_POST['g-recaptcha-response'])) {
      http_response_code(400);
      echo "Spam check fails. Please contact us.";
      exit;
   } 

    // A default response holder, which will have data for sending back to our js file
 	$name = $_POST['your-name'];
 	$email = $_POST['your-email'];
 	$message = $_POST['your-message'];

 	$to  = $email . ', '; // note the comma
	$to .= 'support@wukiyo.com';
	$subject = 'Thank you for contacting us';



	$message = '
	
<div marginwidth="0" marginheight="0" style="padding:0;">
   <div id="m_6205881289347782078wrapper" style="background-color:#fff;margin:0;padding:70px 0;width:100%; color: #242626;">
      <table style="color: #242626; background: #dfe2e5; width:600px; margin: 0 auto;" border="0" cellpadding="0" cellspacing="0" height="100%">
         <tbody>
            <tr>
               <td align="center" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_6205881289347782078template_container" style="border:1px solid #dfe2e5; background: #dfe2e5;">
                     <div id="m_6205881289347782078template_header_image" style="width:600px;background:#dfe2e5;border:1px solid #dfe2e5" align="left">
                        <div style="padding: 30px;">
                           <img src="https://wukiyo.com/wp-content/uploads/2021/01/wukiyo_black.png" alt="revelation" title="site title" style="max-width:100%;margin-left:0;margin-right:0;display:block;width:200px; padding-bottom: 20px;" class="CToWUd">
                           <div align="left" style="width:540px;padding-bottom:20px;border-bottom:1px solid #272727">
                              <p style="color: #242626;">Everything you can be</p>
                           </div>
                        </div>
                     </div>
                     <tbody>
                        <tr>
                           <td align="center" valign="top">
                              <table border="0" cellpadding="0" cellspacing="0" width="600" style="margin-bottom: -4px;" id="m_6205881289347782078template_body">
                                 <tbody>
                                    <tr>
                                       <td valign="top" id="m_6205881289347782078body_content" style="background-color:#dfe2e5">
                                          <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                             <tbody>
                                                <tr>
                                                   <td valign="top" style="padding:0 30px">
                                                      <div id="m_6205881289347782078body_content_inner" style="color:#505151;">
                                                         <h1 style="color:#242626;font-size:30px;line-height:150%;margin:0;text-align:left;padding-bottom:10px;font-weight:bold">Thank you</h1>
                                                         <p style="margin:0 0 16px; color: #242626;">We have received your message, one of our team members will get <br> in touch with you shortly. </p>
                                                         <p style="margin:0 0 16px; color: #242626;">Your message:</p>
                                                         <p style="padding: 10px 0; color: #242626;">'
                                                            .
                                                            $message
                                                            .
                                                            ' 
                                                         </p>
                                                         <p style="margin:0 0 16px; color: #242626;">In the meantime, feel free to visit our 
                                                            <a style="color: #50515; color: #242626;" href="https://wukiyo.com/faq/">frequently asked questions</a> page if you have any other queries or need more information.
                                                         </p>
                                                         <p style="margin:0 0 16px"></p>
                                                      </div>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </td>
                                    </tr>
                                 </tbody>
                                 <tbody>
                                    <tr>
                                       <td>
                                          <img style="width: 600px; display: block;" src="https://wukiyo.com/wp-content/uploads/2021/04/contact_img-1024x801.png">
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
               <td align="center" valign="top">
                  <div style="width:600px;border:1px solid #dfe2e5">
                     <div style="padding:30px 20px;">
                        <table>
                           <tbody>
                              <tr>
                                 <td style="padding-right:32px">
                                    <img src="https://wukiyo.com/wp-content/uploads/2021/04/nootropics.png" alt="revelation" title="site title" style="border:none;font-size:14px;font-weight:bold;height:auto;outline:none;text-decoration:none;text-transform:capitalize;vertical-align:middle;margin-right:10px;display:block;width:184px;max-width:inherit" class="CToWUd">
                                 </td>
                                 <td style="width:208px">
                                    <a href="https://www.facebook.com/revelationnootropicsX/" style="color:#242626;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.facebook.com/revelationnootropicsX/&amp;source=gmail&amp;ust=1618516215634000&amp;usg=AFQjCNGPiMx6nlDPngy7267-t-SMi7TcEw">
                                    <img src="https://wukiyo.com/wp-content/uploads/2021/04/Group-505.png" style="border:none;display:inline-block;font-size:14px;font-weight:bold;height:auto;outline:none;text-decoration:none;text-transform:capitalize;vertical-align:middle;margin-right:10px;max-width:100%;width:30px" class="CToWUd"></a>
                                    <a href="https://www.instagram.com/revelationnootropics/" style="color:#242626;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.instagram.com/revelationnootropics/&amp;source=gmail&amp;ust=1618516215634000&amp;usg=AFQjCNGLpiAaCAxFDFxTr9mAZhaVsHI2QA">
                                    <img src="https://wukiyo.com/wp-content/uploads/2021/04/Group-506.png" style="border:none;display:inline-block;font-size:14px;font-weight:bold;height:auto;outline:none;text-decoration:none;text-transform:capitalize;vertical-align:middle;margin-right:10px;max-width:100%;width:30px" class="CToWUd"></a>
                                    <a href="https://twitter.com/RN_WUKIYO" style="color:#242626;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://twitter.com/RN_WUKIYO&amp;source=gmail&amp;ust=1618516215634000&amp;usg=AFQjCNHcGCbzrVbnycMF7-MGSYhZ08r8yA">
                                    <img src="https://wukiyo.com/wp-content/uploads/2021/04/Group-507.png" style="border:none;display:inline-block;font-size:14px;font-weight:bold;height:auto;outline:none;text-decoration:none;text-transform:capitalize;vertical-align:middle;margin-right:10px;max-width:100%;width:30px" class="CToWUd"></a>
                                 </td>
                                 <td>
                                    <img src="https://wukiyo.com/wp-content/uploads/2021/01/wukiyo_black.png" alt="revelation" title="site title" style="border:none;font-size:14px;font-weight:bold;height:auto;outline:none;text-decoration:none;text-transform:capitalize;vertical-align:middle;margin-right:10px;max-width:100%;display:block" class="CToWUd">
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>


	';

	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


	// Additional headers
	$headers .= 'From: Revelationnootropics <support@wukiyo.com>' . "\r\n";

	// Mail it
	mail($to, $subject, $message, $headers);


 
    // ... Do some code here, like storing inputs to the database, but don't forget to properly sanitize input data!
 
    // Don't forget to exit at the end of processing
    exit(json_encode($response));
}


add_action('wp_ajax_out_of_stock', 'out_of_stock');
add_action('wp_ajax_nopriv_out_of_stock', 'out_of_stock');
// TODO: sredi
function out_of_stock()
{
 	$email = $_POST['email'];

 	$to  = $email . ', '; // note the comma
	$to .= 'support@wukiyo.com';
	$subject = 'Thank you for contacting us'; 

	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


	// Additional headers
	$headers .= 'From: Revelationnootropics <support@wukiyo.com>' . "\r\n";


		$message = '
	<html>
	<head>
		<title>sadjkdfhijasfjashjdhaj</title>
	</head>
	<style type="text/css">
			@media screen {
			  @font-face {
			    font-family: "AirBnbCerealBook";
			    font-style: normal;
			    font-weight: 400;
			    src: local("AirBnbCerealBook"), local("AirBnbCerealBook"), url(https://wukiyo.com/wp-content/themes/revelationnootropics/fonts/AIRBNBCEREALBOOK.ttf) format("ttf");
			  }
			  @font-face {
			    font-family: "AirBnbCerealBold";
			    font-style: normal;
			    font-weight: 400;
			    src: local("AirBnbCerealBold"), local("AirBnbCerealBold"), url(https://wukiyo.com/wp-content/themes/revelationnootropics/fonts/AirBnbCerealBold.ttf) format("ttf");
			  }

			  body {
			    font-family: "AirBnbCerealBook", "Lucida Grande", "Lucida Sans Unicode", Tahoma, Sans-Serif;
			  }
			</style>

	<body>
	<div marginwidth="0" marginheight="0" style="padding:0;">
   <div id="m_6205881289347782078wrapper" style="background-color:#fff;margin:0;padding:70px 0;width:100%; color: #242626;">
      <table style="color: #242626;" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
         <tbody>
            <tr>
               <td align="center" valign="top">
                  <div id="m_6205881289347782078template_header_image" style="width:540px;background:#dfe2e5;padding:30px;border:1px solid #dfe2e5">
                     <img src="https://ci4.googleusercontent.com/proxy/hiZwTyK8Zh20VaaICbb8SVPKuSbu3Bi3CxJp0yGj7V2AGEt4EPjrU1_enEJDjbCwHPC1PdW4Q5GrtxJCK8kZ-SzHCdp4BcisFA4FmaAfSQqud3Oh_hheM24o7w6nwbQgKcFg=s0-d-e1-ft#https://wukiyo.com/wp-content/uploads/2021/01/wukiyo_black.png" alt="revelation" title="site title" style="border:none;font-size:14px;font-weight:bold;height:auto;outline:none;text-decoration:none;text-transform:capitalize;vertical-align:middle;max-width:100%;margin-left:0;margin-right:0;display:block;width:200px;padding-right:370px" class="CToWUd">
                     <div align="left" style="width:540px;padding-bottom:20px;border-bottom:1px solid #272727;">
                        <p style="color: #242626;">Everything you can be</p>
                     </div>
                  </div>
                  <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_6205881289347782078template_container" style="border:1px solid #dfe2e5; background: #dfe2e5;">
                     <tbody>
                        <tr>
                           <td align="center" valign="top">
                              <table border="0" cellpadding="0" cellspacing="0" width="600" style="margin-bottom: -4px;" id="m_6205881289347782078template_body">
                                 <tbody>
                                    <tr>
                                       <td valign="top" id="m_6205881289347782078body_content" style="background-color:#dfe2e5">
                                          <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                             <tbody>
                                                <tr>
                                                   <td valign="top" style="padding:0 30px">
                                                      <div id="m_6205881289347782078body_content_inner" style="color:#505151;font-family: AirBnbCerealBook,Tahoma, Sans-Serif;">
                                                         <h1 style="color:#242626;font-size:30px;line-height:150%;margin:0;text-align:left;padding-bottom:10px;font-weight:bold">Thank you</h1>
                                                         <p style="margin:0 0 16px; color: #242626;">We will reach back to you as soon as we have product in the stock!</p>
                                                      </div>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </td>
                                    </tr>
                                 </tbody>
                                  <img style="width: 600px; display: block;" src="https://wukiyo.com/wp-content/uploads/2021/04/contact_img-1024x801.png">
                              </table>
                             
                           </td>
                        </tr>
                        
                     </tbody>
                      
                  </table>
               </td>
            </tr>
            <tr>
               <td align="center" valign="top">
                  <div style="width:560px;padding:30px 20px;border:1px solid #dfe2e5">
                     <table>
                        <tbody>
                           <tr>
                              <td style="padding-right:32px">
                                 <img src="https://ci6.googleusercontent.com/proxy/uWfmksVzhfhyTe5ULv7QBQACXA7s8fcFBbEHLYLfKFM_o0EMRWJMK_Qs-j166K-JZwFqw8KCn_GunWAu3S1VdMj4a926jYQ6-MAAToBYJMGs72cGqWYGcK0qMQvrvag66Q=s0-d-e1-ft#https://wukiyo.com/wp-content/uploads/2021/04/nootropics.png" alt="revelation" title="site title" style="border:none;font-size:14px;font-weight:bold;height:auto;outline:none;text-decoration:none;text-transform:capitalize;vertical-align:middle;margin-right:10px;display:block;width:184px;max-width:inherit" class="CToWUd">
                              </td>
                              <td style="width:208px">
                                 <a href="https://www.facebook.com/revelationnootropicsX/" style="color:#242626;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.facebook.com/revelationnootropicsX/&amp;source=gmail&amp;ust=1618516215634000&amp;usg=AFQjCNGPiMx6nlDPngy7267-t-SMi7TcEw">
                                 <img src="https://ci3.googleusercontent.com/proxy/Ro5f87hR6ADzbSS0yj6YCvR5b6JKlJ85Gf0nqvpdCUcdB7XcbAf-jgaAdQ3sVqVTeKl8YVTBwjdVB1GDm3M1a-kQTHf06JlQurKuN4ZiDfTXIN70wZXaXG1vny_Pnk3R=s0-d-e1-ft#https://wukiyo.com/wp-content/uploads/2021/04/Group-505.png" style="border:none;display:inline-block;font-size:14px;font-weight:bold;height:auto;outline:none;text-decoration:none;text-transform:capitalize;vertical-align:middle;margin-right:10px;max-width:100%;width:30px" class="CToWUd"></a>
                                 <a href="https://www.instagram.com/revelationnootropics/" style="color:#242626;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.instagram.com/revelationnootropics/&amp;source=gmail&amp;ust=1618516215634000&amp;usg=AFQjCNGLpiAaCAxFDFxTr9mAZhaVsHI2QA">
                                 <img src="https://ci5.googleusercontent.com/proxy/l82QYb5FYz3QH48Xdz469m7uAGQfRua9T8vEqEwUi72i_uJvQSKlQXQ1K4y251RBcGwDEpQffpv2-MGS1gwZnliKSWgG2ibBcrt6I1hA7KJC6eAsobwdfHelOGZoG50v=s0-d-e1-ft#https://wukiyo.com/wp-content/uploads/2021/04/Group-506.png" style="border:none;display:inline-block;font-size:14px;font-weight:bold;height:auto;outline:none;text-decoration:none;text-transform:capitalize;vertical-align:middle;margin-right:10px;max-width:100%;width:30px" class="CToWUd"></a>
                                 <a href="https://twitter.com/RN_WUKIYO" style="color:#242626;font-weight:normal;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://twitter.com/RN_WUKIYO&amp;source=gmail&amp;ust=1618516215634000&amp;usg=AFQjCNHcGCbzrVbnycMF7-MGSYhZ08r8yA">
                                 <img src="https://ci4.googleusercontent.com/proxy/u052FWYMoNrqD73PHpGqZLkgvlwEc4JDU-Rr1mmItvzh8Pu0i3CZTAf8QieIp8BiVfTvbkD6q7EptaeecETtqbPj1UZoagt8EWETTVfkET70Xp6EYj9ua0BLlLFIUfmY=s0-d-e1-ft#https://wukiyo.com/wp-content/uploads/2021/04/Group-507.png" style="border:none;display:inline-block;font-size:14px;font-weight:bold;height:auto;outline:none;text-decoration:none;text-transform:capitalize;vertical-align:middle;margin-right:10px;max-width:100%;width:30px" class="CToWUd"></a>
                              </td>
                              <td>
                                 <img src="https://ci4.googleusercontent.com/proxy/hiZwTyK8Zh20VaaICbb8SVPKuSbu3Bi3CxJp0yGj7V2AGEt4EPjrU1_enEJDjbCwHPC1PdW4Q5GrtxJCK8kZ-SzHCdp4BcisFA4FmaAfSQqud3Oh_hheM24o7w6nwbQgKcFg=s0-d-e1-ft#https://wukiyo.com/wp-content/uploads/2021/01/wukiyo_black.png" alt="revelation" title="site title" style="border:none;font-size:14px;font-weight:bold;height:auto;outline:none;text-decoration:none;text-transform:capitalize;vertical-align:middle;margin-right:10px;max-width:100%;display:block" class="CToWUd">
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
      <div class="yj6qo"></div>
      <div class="adL"></div>
   </div>
   <div class="adL">
   </div>
</div>
</body>
</html>
	';

	// Mail it
	mail($to, $subject, $message, $headers);

    // ... Do some code here, like storing inputs to the database, but don't forget to properly sanitize input data!
 
    // Don't forget to exit at the end of processing
    exit(json_encode($response));
}

// CHECKOUT customizations


// TODO: da li je potrebno?
add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1);
function override_default_address_checkout_fields( $address_fields ) {
    $address_fields['first_name']['placeholder'] = '';
    $address_fields['last_name']['placeholder'] = '';
    $address_fields['address_1']['placeholder'] = '';
    $address_fields['address_2']['placeholder'] = '';
    $address_fields['state']['placeholder'] = '';
    $address_fields['postcode']['placeholder'] = '';
    $address_fields['city']['placeholder'] = '';
    return $address_fields;
}


// Adding phone and email to shipping fields
add_filter('woocommerce_checkout_fields', 'add_phone_to_shipping_fields_woocommerce');
function add_phone_to_shipping_fields_woocommerce($fields) {
    $fields['shipping']['shipping_phone'] = array (
        'label' => __('PHONE', 'woocommerce'), // Add custom field label
        'placeholder' => _x('', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => true, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'tel', // add field type
        'class' => array('my-css')   // add class name
    );
    return $fields;
}

add_filter('woocommerce_checkout_fields', 'add_email_to_shipping_fields_woocommerce');
function add_email_to_shipping_fields_woocommerce($fields) {
    $fields['shipping']['shipping_email'] = array (
        'label' => __('EMAIL', 'woocommerce'), // Add custom field label
        'placeholder' => _x('', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => true, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'email', // add field type
        'class' => array('my-css')   // add class name
    );
    return $fields;
}


// TODO: testiraj sta radi posto ne vidim da brise phone field
add_filter( 'woocommerce_billing_fields', 'remove_billing_phone_field', 20, 1 );
function remove_billing_phone_field($fields) {
   $fields['billing_phone']['required'] = false; // To be sure "NOT required"
 	$fields['billing_email']['required'] = false; // To be sure "NOT required"
 	$fields['billing_first_name']['required'] = false; // To be sure "NOT required"
 	$fields['billing_last_name']['required'] = false; // To be sure "NOT required"
 	$fields['billing_country']['required'] = false; // To be sure "NOT required"
 	$fields['billing_address_1']['required'] = false; // To be sure "NOT required"
 	$fields['billing_city']['required'] = false; // To be sure "NOT required"
 	$fields['billing_postcode']['required'] = false; // To be sure "NOT required"

   $fields['billing_phone']['label'] = 'PHONE';
 	$fields['billing_email']['label'] = 'EMAIL';

   return $fields;
}


// Removing some fields from the billing form
// ref - https://docs.woothemes.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
add_filter('woocommerce_checkout_fields','wpb_custom_billing_fields');
function wpb_custom_billing_fields( $fields = array() ) {
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_company']);
	unset($fields['shipping']['shipping_address_2']);
	unset($fields['shipping']['shipping_state']);
	unset($fields['shipping']['shipping_company']);
	return $fields;
}


// TODO - skontaj sta radi
add_filter( 'woocommerce_form_field' , 'remove_checkout_optional_fields_label', 10, 4 );
function remove_checkout_optional_fields_label( $field, $key, $args, $value ) {
    // Only on checkout page
    if( is_checkout() && ! is_wc_endpoint_url() ) {
        $optional = '&nbsp;<span class="optional">(' . esc_html__( 'optional', 'woocommerce' ) . ')</span>';
        $field = str_replace( $optional, '', $field );
    }
    return $field;
}


// TODO - skontaj sta radi, izgleda da ovo $optional ne radi nista???
// JQuery: Needed for checkout fields to Remove "(optional)" from our non required fields
add_filter( 'wp_footer' , 'remove_checkout_optional_fields_label_script' );
function remove_checkout_optional_fields_label_script() {
    // Only on checkout page
    if( ! ( is_checkout() && ! is_wc_endpoint_url() ) ) return;

    $optional = '&nbsp;<span class="optional">(' . esc_html__( 'optional', 'woocommerce' ) . ')</span>';
    ?>
    <script>
    jQuery(function($){
        // On "update" checkout form event
        $(document.body).on('update_checkout', function() {
            $('#billing_country_field label > .optional').remove();
            $('#billing_address_1 label > .optional').remove();
            $('#billing_postcode_field label > .optional').remove();
            $('#shipping_country_field label > .optional').remove();
            $('#shipping_address_1_field label > .optional').remove();
            $('#shipping_postcode_field label > .optional').remove();
            $('#shipping_state_field label > .optional').remove();
        });
    });
    </script>
    <?php
}


// TODO: sta radi? ovo empty-cart je povezano sa clear cart dugmetom (= yes) koje sam zakomentarisao na checkoutu
add_action( 'init', 'njengah_woocommerce_clear_cart_shortcode' );
function njengah_woocommerce_clear_cart_shortcode() {
   global $woocommerce;
   if ( isset( $_GET['empty-cart'] ) ) {
      $woocommerce -> cart -> empty_cart(); 
   }
}


// Rename the "Have a Coupon?" message on the checkout page - TODO : proveriti
add_filter('woocommerce_checkout_coupon_message', 'woocommerce_rename_coupon_message_on_checkout');
function woocommerce_rename_coupon_message_on_checkout() {
	return 'Have an Offer Code?' . ' ' . __( 'Click here to enter your code', 'woocommerce' ) . '';
}


add_filter('woocommerce_coupon_error', 'rename_coupon_label', 10, 3);
add_filter('woocommerce_coupon_message', 'rename_coupon_label', 10, 3);
add_filter('woocommerce_cart_totals_coupon_label', 'rename_coupon_label',10, 1);
// Renaming "Coupon" to "Promo"
function rename_coupon_label($err, $err_code=null, $something=null){
	$err = str_ireplace("Coupon", "Promo", $err);
	return $err;
}


// Renaming coupon field on cart - TODO : testirati
add_filter('gettext', 'woocommerce_rename_coupon_field_on_cart', 10, 3 );
function woocommerce_rename_coupon_field_on_cart( $translated_text, $text, $text_domain ) {
	// bail if not modifying frontend woocommerce text
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}

	if ( 'Coupon code:' === $text ) {
		$translated_text = 'BABABABA:';
	}

	if ('Coupon has been removed.' === $text){
		$translated_text = 'Promo code has been removed.';
	}

	if ( 'Apply coupon' === $text ) {
		$translated_text = 'Apply Promo Code';
	}

	if ( 'Coupon code' === $text ) {
		$translated_text = 'Offer Promo Code';
	
	} 

	return $translated_text;
}

add_action('wp_ajax_update_item_from_cart', 'update_item_from_cart');
add_action('wp_ajax_nopriv_update_item_from_cart', 'update_item_from_cart');
function update_item_from_cart() {
   $cart_item_key_request = $_POST['cart_item_key'];   
   $quantity = $_POST['qty'];     

   // Get mini cart
   ob_start();

   foreach (WC() -> cart -> get_cart() as $cart_item_key => $cart_item) {
      if ( $cart_item_key == $cart_item_key_request ) {
         WC() -> cart -> set_quantity( $cart_item_key, $quantity, $refresh_totals = true );
      }
   }
   WC() -> cart -> calculate_totals();
   WC() -> cart -> maybe_set_cart_cookies();
   return true;
}

add_filter( 'avatar_defaults', 'custom_avatar' );
function custom_avatar ($avatar_defaults) {
   $custom_gravatar = get_template_directory_uri() . '/img/avatar.png';
   $avatar_defaults[$custom_gravatar] = "Custom Gravatar";
   return $avatar_defaults;
}