<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( 'no' === $this->enabled ) { return; }

if ( is_checkout() ) {
    wp_register_style( 'wc_zelle_checkout', WCZELLE_PLUGIN_DIR_URL . 'assets/css/checkout.css' );
    wp_enqueue_style('wc_zelle_checkout');

    $copy_js = 'copy.js';
    if (! wp_script_is( $copy_js, 'enqueued' )) {
        wp_register_script( $copy_js, WCZELLE_PLUGIN_DIR_URL . 'assets/js/'. $copy_js, array('jquery'), null, true);
        wp_enqueue_script( $copy_js );
        // wp_enqueue_script( $copy_js, WCZELLE_PLUGIN_DIR_URL . 'assets/js/'. $copy_js, array(), null, true);
        // wp_enqueue_script( 'wc_zelle_copy', WCZELLE_PLUGIN_DIR_URL . 'assets/js/copy.js' );
    }

    // $qrcode_styling = 'qr-code-styling.min.js';
    // if (! wp_script_is( $qrcode_styling, 'enqueued' )) {
    //     wp_register_script( $qrcode_styling, WCZELLE_PLUGIN_DIR_URL . 'assets/js/'. $qrcode_styling);
    //     wp_enqueue_script( $qrcode_styling );
    //     // wp_enqueue_script( 'wc_zelle_qrcode_styling', WCZELLE_PLUGIN_DIR_URL . 'assets/js/qr-code-styling.min.js' );
    // }
    // $qrcode_generator = 'qr-code-generator.js';
    // if (! wp_script_is( $qrcode_generator, 'enqueued' )) {
    //     wp_register_script( $qrcode_generator, WCZELLE_PLUGIN_DIR_URL . 'assets/js/'. $qrcode_generator);
    //     wp_enqueue_script( $qrcode_generator );
    //     // wp_enqueue_script( 'wc_zelle_qrcode_generator', WCZELLE_PLUGIN_DIR_URL . 'assets/js/qr-code-generator.js' );
    // }

    // wp_enqueue_script( 'wc_zelle_qrcode', WCZELLE_PLUGIN_DIR_URL . 'assets/js/qrcode.js', array( 'jquery', $qrcode_styling, $qrcode_generator ), null, true );

	// $payment_url = $this->wc_zelle_url();

    // $wc_zelle_qrcode = array(
    //     "url" => $payment_url,
    //     "logo" => WCZELLE_PLUGIN_DIR_URL . 'assets/images/zelle.png',
    //     "width" => $this->QRwidth ?? 150,
    //     "height" => $this->QRheight ?? 150,
    //     "darkcolor" => $this->QRdarkcolor ?? '#000000',
    //     "lightcolor" => $this->QRlightcolor ?? '#ffffff',
    //     "backgroundcolor" => $this-> QRbackgroundcolor ?? '#ffffff',
    //     "dotsType" => $this->QRdotsType ?? 'dots',
    //     "cornersSquareType" => $this->QRcornersSquareType ?? 'extra-rounded',
    //     "cornersDotType" => $this->QRcornersDotType ?? 'square',
    // );
    // wp_localize_script( 'wc_zelle_qrcode', 'wc_zelle_qrcode', $wc_zelle_qrcode );

    // // jquery-dialog on checkout/thankyou with countdown https://jqueryui.com/demos/dialog/
    // wp_enqueue_script( 'jquery-ui-dialog' );
}

// if ( ! is_cart() || ! is_checkout() || ! isset( $_GET['pay_for_order'] ) ) { }

?>