<?php

if (!defined('ABSPATH')) {
    exit;
}
global  $woocommerce;
$total = $woocommerce->cart->get_total();
$amount = $woocommerce->cart->total;
echo  '<fieldset id="wc-' . esc_attr($this->id) . '-form" data-plugin="' . wp_kses_post(WCZELLE_PLUGIN_VERSION) . '">';
do_action('woocommerce_form_start', $this->id);
// upgrade display_zelle

if ($this->display_zelle === 'no') {
    $this->update_option('display_zelle', '1');
} else {
    if ($this->display_zelle === 'yes') {
        $this->update_option('display_zelle', '2');
    }
}


if (empty($this->ReceiverZELLEEmail) && empty($this->ReceiverZELLENo)) {
    echo  '<p>' . wp_kses_post(__('Please finish setting up this payment method or contact the admin to do so.', WCZELLE_PLUGIN_TEXT_DOMAIN)) . '</p>';
    do_action('woocommerce_form_end', $this->id);
    echo  '<input name="do_not_checkout" type="hidden" value="true"><div class="clear"></div></fieldset>';
    return;
}

echo '<p>' . esc_html__('Place your order first then follow instructions to pay with Zelle.') . '</p>';
echo '<p>' . esc_html__('Please use only your order number (available once you have placed your order) as the payment reference in the Comments or Notes section. Once we have received your payment, we will send you a confirmation email within 24-48 hours to confirm the successful processing of your order. This is a BUSINESS (NOT personal) Zelle account.') . '</p>';
echo '<p>' . esc_html__('Your order will not be processed until funds have cleared in our Zelle/Bank account.') . '</p>';

// echo  '<p>' . wp_kses_post( sprintf( __( 'Send %s via %s or from your bank', WCZELLE_PLUGIN_TEXT_DOMAIN ), $total, '<a style="color: #6d1fd4" href="https://zellepay.com/" target="_blank">Zelle</a>' ) ) . '.</p>' ;
// echo  '<p>' . esc_html__( 'Here are the Zelle details you should know for the transfer', WCZELLE_PLUGIN_TEXT_DOMAIN ) . '</p>' ;
// echo  '<p>' . sprintf( esc_html__( '%s Name', WCZELLE_PLUGIN_TEXT_DOMAIN ), 'Zelle' ) . ': <strong>', esc_html( $this->ReceiverZelleOwner ), '</strong><br>' ;
// echo  sprintf( esc_html__( '%s Email', WCZELLE_PLUGIN_TEXT_DOMAIN ), 'Zelle' ) . ': <strong>', esc_html( $this->ReceiverZELLEEmail ), '</strong><br>' ;
// echo  sprintf( esc_html__( '%s Phone', WCZELLE_PLUGIN_TEXT_DOMAIN ), 'Zelle' ) . ': <strong>', esc_html( $this->ReceiverZELLENo ), '</strong></p>' ;
// echo  '<p>' . wp_kses_post( __( 'Please <strong>use your Order Number (available once you place order)</strong> as the payment reference', WCZELLE_PLUGIN_TEXT_DOMAIN ) ) . '.</p>' ;
// echo  '<p><strong>' . esc_html__( 'After paying, please come back here and place the order below', WCZELLE_PLUGIN_TEXT_DOMAIN ) . '</strong> ' . esc_html__( 'so we can start processing your order', WCZELLE_PLUGIN_TEXT_DOMAIN ) . '.</p>' ;
// Support
if (!empty($this->ReceiverZELLENo)) {
    $call = esc_html__('please call', WCZELLE_PLUGIN_TEXT_DOMAIN) . ' <a href="tel:' . esc_attr($this->ReceiverZELLENo) . '" target="_blank">' . esc_html($this->ReceiverZELLENo) . '</a>.';
}
if (!empty($this->ReceiverZELLEEmail)) {
    $email = ' ' . esc_html__('You can also email', WCZELLE_PLUGIN_TEXT_DOMAIN) . ' <a href="mailto:' . esc_attr($this->ReceiverZELLEEmail) . '" target="_blank">' . esc_html($this->ReceiverZELLEEmail) . '</a>';
}
// toggleSupport
if ('yes' === $this->toggleSupport && !(empty($this->ReceiverZELLEEmail) && empty($this->ReceiverZELLENo))) {
    echo  '<p>' . esc_html__('If you are having an issue', WCZELLE_PLUGIN_TEXT_DOMAIN) . ', ' . wp_kses_post(($call ? $call : '')) . wp_kses_post(($email ? $email : '')) . '</p>';
}
// toggleTutorial
if ('yes' === $this->toggleTutorial) {
    echo  '<p><a href="https://theafricanboss.com/zelledemo" style="text-decoration: underline" target="_blank">' . esc_html__('See this 1min video demo explaining how this works', WCZELLE_PLUGIN_TEXT_DOMAIN) . '.</a></p>';
}
// // toggleCredits
// if ( 'yes' === $this->toggleCredits ) {
// 	echo '<p><a href="https://theafricanboss.com/zelle" style="text-decoration: underline;" target="_blank">' . sprintf(  esc_html__( 'Powered by %s', WCZELLE_PLUGIN_TEXT_DOMAIN ), 'The African Boss' ) . '</a></p>';
// }
do_action('woocommerce_form_end', $this->id);
echo  '<div class="clear"></div></fieldset>';
