<?php
   /**
    * Checkout Form
    *
    * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
    *
    * HOWEVER, on occasion WooCommerce will need to update template files and you
    * (the theme developer) will need to copy the new files to your theme to
    * maintain compatibility. We try to do this as little as possible, but it does
    * happen. When this occurs the version of the template file will be bumped and
    * the readme will list any important changes.
    *
    * @see https://docs.woocommerce.com/document/template-structure/
    * @package WooCommerce\Templates
    * @version 3.5.0
    */
   
   if ( ! defined( 'ABSPATH' ) ) {
    exit;
   } ?>
<div class="tabs black-border-bottom d-lg-none">
   <ul class="d-flex justify-content-between mb-0">
      <li id="revDeliveryMobile" class="tab active">Delivery</li>
      <li id="revPaymentMobile" class="tab">Payment</li>
      <li class="tab">Order Complete</li>
   </ul>
</div>
<div class="row no-gutters sitePadding">
   <div class="col-6 d-flex d-md-flex left-column">
      <div class="order-summary sitePadding">
         <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
         <?php 
            $cart = WC() -> cart;
         ?>
         <!-- TODO: refaktorisi class="id"... -->
         <input type="hidden" hidden class="id" name="" id="<?php
            foreach ( $cart -> get_cart() as $cart_item_key => $cart_item ) {
               echo $cart_item_key;
            } 
         ?>">

         <div class="row no-gutters order-summary-container shipping-step-order-summary">
            <h3>Order summary</h3>
            <div class="mini-cart-wrapper"> 
               <?php
               foreach ( $cart -> get_cart() as $cart_item_key => $cart_item ) {
                  $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                  $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                  if ( $_product && $_product -> exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                     $esseId = 26;
                     $apexId = 350;
                     $blissId = 356;
                     $pureId = 359;
                     $vertId = 361;

                     $productType = 'one-time';
                     if (class_exists('WC_Subscriptions_Product') && WC_Subscriptions_Product::is_subscription($_product)) {
                        $productType = 'subscription';
                     };

                     $product_quantity = $cart_item['quantity'];
                     $product_price = apply_filters( 'woocommerce_cart_item_price', $cart -> get_product_price( $_product ), $cart_item, $cart_item_key );

                     $productPriceDiscounted = $_product -> get_price();

                     $product_image_src;
                     $product_logo_src;
                     switch ($product_id) {
                        case $esseId:
                           $product_image_src = "/img/esse-package.webp";
                           $product_logo_src = "/img/logos/wukiyo-esse.svg";
                           break;
                        case $apexId:
                           $product_image_src = "/img/apex-package.webp";
                           $product_logo_src = "/img/logos/wukiyo-apex.svg";
                           break;
                        case $blissId:
                           $product_image_src = "/img/bliss-package.webp";
                           $product_logo_src = "/img/logos/wukiyo-bliss.svg";
                           break;
                        case $pureId:
                           $product_image_src = "/img/pure-package.webp";
                           $product_logo_src = "/img/logos/wukiyo-pure.svg";
                           break;
                        case $vertId:
                           $product_image_src = "/img/vert-package.webp";
                           $product_logo_src = "/img/logos/wukiyo-vert.svg";
                           break;
                     }
                     ?>
                     <input type="hidden" hidden id="product-price-<?php echo $product_id;?>" class="<?php echo $productType;?>" value="<?php echo $productPriceDiscounted; ?>">
                     <input type="hidden" hidden class="id-<?php echo $product_id;?> <?php echo $productType;?>" id="<?php echo $cart_item_key; ?>">

                     <div class="cart-product-wrapper">
                        <div class="cart-product-img-logo">
                           <div class="cart-product-image">
                              <img src="<?php echo get_template_directory_uri(); echo $product_image_src;?>" alt="Product package">
                           </div>
                           <div class="cart-product-logo">
                              <img src="<?php echo get_template_directory_uri(); echo $product_logo_src?>" alt="Product logo">
                           </div>
                        </div>
                        
                        <div class="cart-product-qty-price">
                           <div class="cart-product-quantity">
                              <div class="add-to-cart-button">
                                 <div data-productid="<?php echo $product_id;?>" data-product-type="<?php echo $productType; ?>" data-operator="remove" class="remove remove-final">-</div>
                                 <div class="product-quantity product-quantity-<?php echo $product_id;?> <?php echo $productType; ?> fontBold"><?php echo $product_quantity; ?></div>
                                 <div data-productid="<?php echo $product_id;?>" data-product-type="<?php echo $productType; ?>" data-operator="add" class="add add-final">+</div>
                              </div>
                           </div>
                           <div class="cart-product-price price-<?php echo $product_id;?> <?php echo $productType;?>">
                              <?php echo $product_price ?>
                           </div>
                        </div>
                     </div>
                     <?php
                  }
               }
            ?>
            </div>
            <!-- mini cart end -->
            <div class="cart-numbers-wrapper">
               <div class="cart-numbers">
                  <p>SUBTOTAL</p>
                  <p class="subtotal bold"><?php echo wc_cart_totals_subtotal_html(); ?></p>
               </div>
               <div class="cart-numbers">
                  <p>ITEMS</p>
                  <p class="cart-quantity bold"><?php echo $cart -> get_cart_contents_count(); ?></p>
               </div>
               <div class="cart-numbers">
                  <p>DELIVERY</p>
                  <p class="bold shippingCost">$9</p>
               </div>
               <div class="cart-numbers">
                  <p>PROMO CODE</p>
                  <p id="couponValue" class="bold">-</p>
               </div>
               <div class="cart-numbers">
                  <p>SALES TAX</p>
                  <p class="bold">-</p>
               </div>
            </div>
            <div class="cart-total-wrapper">
               <p class="bold">TOTAL</p>
               <p class="bold cart-total-value"></p>
            </div>
         </div>
         
         <div class="d-lg-none">
            <div class="revCoupons mobile shipping-step-order-summary">
               <h3>Promo Code</h3>
               <form class="checkout_coupon woocommerce-form-coupon" method="post" >
                  <p class=""><?php esc_html_e( 'If you have a promo code, please apply it below.', 'woocommerce' ); ?></p>
                  <p class="form-row form-row-first">
                     <input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Promo code', 'woocommerce' ); ?>" id="coupon_code" value="" />
                  </p>
                  <p class="form-row form-row-last">
                     <button type="submit" class="button applyCoupon" name="apply_coupon" value="<?php esc_attr_e( 'Apply promo code', 'woocommerce' ); ?>"><?php esc_html_e( 'Apply promo code', 'woocommerce' ); ?></button>
                  </p>
                  <div class="clear"></div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <div class="col-12 col-lg-6 right-column">
      <div class="tabs d-none d-lg-block black-border-bottom pb-0">
         <ul class="d-flex mb-0">
            <li id="revDelivery" class="tab active">Delivery</li>
            <li id="revPayment" class="tab">Payment</li>
            <li class="tab">Order Complete</li>
         </ul>
      </div>
      <div class="sitePadding pt-0 mobile">
         <div class="shipping-and-delivery">
            <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
               <?php if ( $checkout -> get_checkout_fields() ) : ?>
               <div class="shipping-node active">
                  <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                  <div class="col2-set" id="customer_details">
                     <div class="col-1">
                        <?php do_action( 'woocommerce_checkout_billing' ); ?>
                     </div>
                     <div class="col-2">
                        <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                     </div>
                  </div>
                  
                  <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
                  <?php endif; ?>
                  <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

                  <div class="my-custom-shipping-table">
                     <div class="shipping">
                        <?php if ( $cart -> needs_shipping() && $cart -> show_shipping() ) : ?>
                           <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
                           <?php wc_cart_totals_shipping_html(); ?>
                           <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
                        <?php endif; ?>
                     </div>
                  </div>

                  <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
                  <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
               </div>
               <!-- End of shipping-node -->
               <div class="payment-node">
                  <div id="order_review" class="woocommerce-checkout-review-order">
                     <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                  </div>
                  <div class="checkout-bottom-logos-wrapper-mobile d-lg-none">
                    <img alt="Wukiyo logo" src="<?php echo bloginfo('template_url'); ?>/img/nootropics.svg">
                    <img class="payments-mobile" alt="Payment methods" src="<?php echo bloginfo('template_url'); ?>/img/cards_and_stripe.svg">
                  </div>
               </div>
               <!-- End of payment -->
               <!-- TODO -->
               <?php // do_action( 'woocommerce_checkout_after_order_review' ); ?>
            </form>

            <!-- TODO: zameni bootstrap klasom - ~promo-code-wrapper -->
            <div class="d-none d-lg-block">
              <div class="revCoupons desktop-coupons order-summary-containerTest shipping-step-order-summary mb-5">
                 <h3>Promo Code</h3>
                 <form class="checkout_coupon woocommerce-form-coupon" method="post" >
                    <p class=""><?php esc_html_e( 'If you have a promo code, please apply it below.', 'woocommerce' ); ?></p>
                    <p class="form-row form-row-first">
                       <input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Promo code', 'woocommerce' ); ?>" id="coupon_code" value="" />
                    </p>
                    <p class="form-row form-row-last">
                       <button type="submit" class="button applyCoupon" name="apply_coupon" value="<?php esc_attr_e( 'Apply promo code', 'woocommerce' ); ?>"><?php esc_html_e( 'Apply promo code', 'woocommerce' ); ?></button>
                    </p>
                    <div class="clear"></div>
                 </form>
              </div>
            </div>
           
            <!-- TODO: mobile-shipping-node, da li moze da se obrise? ponavlja se iznad u wrapper divu za mobile i koristi se u JS-u -->
            <div class="mobile-shipping-node">
               <div class="pay-button-and-cards-logos-wrapper">
                  <button class="review-and-pay-button blue-button button-font trigger-validation">REVIEW AND PAY</button>
                  <img class="payments" alt="Payment methods" src="<?php echo bloginfo('template_url'); ?>/img/cards_and_stripe.svg">
               </div>
               <div class="checkout-bottom-logos-wrapper-mobile d-lg-none">
                  <img alt="Wukiyo logo" src="<?php echo bloginfo('template_url'); ?>/img/nootropics.svg">
                  <img class="payments-mobile" alt="Payment methods" src="<?php echo bloginfo('template_url'); ?>/img/cards_and_stripe.svg">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="hidden couponValue"></div>

<script type="text/javascript">
   $(document).ready(function() {
      const customCheckClass = 'custom-check',
         standardShipping = 9,
         expressShipping = 18,
         freeShipping = 0,
         esseId = 26,
         apexId = 350,
         blissId = 356,
         pureId = 359,
         vertId = 361,
         $shippingCost = $('.shippingCost'),
         $deliveryTab = $('#revDelivery'),
         $paymentTab = $('#revPayment'),
         $deliveryTabMobile = $('#revDeliveryMobile'),
         $paymentTabMobile = $('#revPaymentMobile'),
         $shipppingNode = $('.shipping-node'),
         $mobileShipppingNode = $('.mobile-shipping-node'),
         $paymentNode = $('.payment-node'),
         $mobilePaymentNode = $('.mobile-payment-node'),
         $standardShippingInput = $('#shipping_method_0_flat_rate3'),
         $standardShippingLabel = $('label[for=shipping_method_0_flat_rate3]'),
         $expressShippingInput = $('#shipping_method_0_flat_rate5'),
         $expressShippingLabel = $('label[for=shipping_method_0_flat_rate5]'),
         $freeShippingInput = $('#shipping_method_0_free_shipping6'),
         $freeShippingLabel = $('label[for=shipping_method_0_free_shipping6]'),
         $desktopCoupons = $('.desktop-coupons'),
         $mobileCoupons = $('.revCoupons.mobile');

      disableRemovingProductIfQuantityIsZero();
      calculateCouponValue();
      limitClickSpeed();
      toggleFreeShippingMethod();

      function toggleFreeShippingMethod() {
         let subtotal = $('.cart-subtotal .woocommerce-Price-amount.amount bdi').text().substring(1),
            subtotalParsed = parseInt(subtotal),
            couponValue = $('.cart-discount .woocommerce-Price-amount').text().substring(1),
            couponValueParsed = couponValue !== '' ? parseInt(couponValue) : 0;

         if ((subtotalParsed - couponValueParsed) >= 199) {
            $freeShippingInput.parent().removeClass('hidden');
            $freeShippingInput.prop("checked", true);
            $freeShippingLabel.addClass(customCheckClass);
            $standardShippingLabel.removeClass(customCheckClass);
            $expressShippingLabel.removeClass(customCheckClass);
         } else {
            $freeShippingInput.parent().addClass('hidden');
            $freeShippingLabel.removeClass(customCheckClass);
            $standardShippingLabel.addClass(customCheckClass);
            $standardShippingInput.prop("checked", true);   
         }
      }

      $('.applyCoupon').on('click', function(){
         calculateCouponValue();
      });

      let couponValue = $('.cart-discount .woocommerce-Price-amount').text();
      if (couponValue !== "" && $('#couponValue').text() !== "-") {
         $('#couponValue').text(couponValue.substring(0, couponValue.indexOf(".")));     
      }

      function disableRemovingProductIfQuantityIsZero() {
          let initialTotalQuantity =  parseInt($('.cart-quantity').text());
         if ( initialTotalQuantity == 0 ) {
            $('.remove-final').addClass('disabled');
         }
      }

      var target = document.getElementById('order_review');
       // create an observer instance

      var observer = new MutationObserver(function(mutations) {
         const couponValue = $('.cart-discount .woocommerce-Price-amount').text();

         if (couponValue !== "") {
            $('#couponValue').text(couponValue);
         }
            
         const total = $('.order-total .woocommerce-Price-amount.amount bdi').text().substring(1),
            subtotal = $('.cart-subtotal .woocommerce-Price-amount.amount bdi').text().substring(1);

         $('.cart-total-value').text('$' + total);
         $('.subtotal').text('$' + subtotal);

         let allCartItems = $('.cart_item').each(function() {
            displayNewProductPrice($(this));
         });

      });
      
      // configuration of the observer:
      var config = { attributes: false, childList: true, characterData: false, subtree: true };
      // pass in the target node, as well as the observer options
      observer.observe(target, config);

      function displayNewProductPrice(cartItem) {
         const quantityText = cartItem.find('.product-quantity').text(),
            quantity = parseInt(quantityText.slice(quantityText.length - 1)),
            total = parseInt(cartItem.find('bdi').text().substring(1)),
            newPrice = total / quantity,
            newPriceRounded = Math.round(newPrice),
            productNameElementText = cartItem.find('.product-name').text(),
            isSubscription = cartItem.find('.subscription-price').length > 0 ? true : false,
            isSubscriptionText = ' / month';
         let productId;

         if (productNameElementText.indexOf('Esse') > -1) {
            productId = esseId;
         } else if (productNameElementText.indexOf('Apex') > -1) {
            productId = apexId;
         } else if (productNameElementText.indexOf('Pure') > -1) {
            productId = pureId;
         } else if (productNameElementText.indexOf('Vert') > -1) {
            productId = vertId;
         } else if (productNameElementText.indexOf('Bliss') > -1) {
            productId = blissId;
         }
         
         if (isSubscription) {
            $('.price-' + productId + '.subscription').text('$' + newPriceRounded + isSubscriptionText);
         } else {
            $('.price-' + productId + '.one-time').text('$' + newPriceRounded);
         }
      }

      // Billing form handling
      $('#ship-to-different-address-checkbox').on('click', function() {
         let shipToDifferentAddressCheckbox = $(this),
            allShippingFields = $('.woocommerce-shipping-fields__field-wrapper .form-row');
         if(shipToDifferentAddressCheckbox.is(":checked")) {
          resetBillingForm(allShippingFields);
         } else {
            $.each(allShippingFields, function(field) {
               shipToDifferentAddressCheckbox.removeClass('validate-required');
            });
         }
      });

      function resetBillingForm(allShippingFields) {
         $('.woocommerce-shipping-fields .select2-selection__rendered').text('');
         $.each(allShippingFields, function(field) {
            let currentShippingField = $(this);
            // Since we copy the shipping phone and email to billing hidden inputs, don't add required class to those two fields
            if( !(currentShippingField.find('input').is('#billing_phone')) && !(currentShippingField.find('input').is('#billing_email'))) {
               currentShippingField.find('input').val('');
               currentShippingField.addClass('validate-required');
            }
            
            currentShippingField.find('select').val('');
            currentShippingField.find('label').removeClass('focused');
         });
      }
      // Billing form handling END

      if ($('#shipping_method_0_flat_rate3:checked').val()) {
         $shippingCost.text('$' + standardShipping);
         $expressShippingLabel.removeClass(customCheckClass);
         $freeShippingLabel.removeClass(customCheckClass);
         $standardShippingLabel.addClass(customCheckClass);
      };
      if ($('#shipping_method_0_flat_rate5:checked').val()) {
         $shippingCost.text('$' + expressShipping);
         $standardShippingLabel.removeClass(customCheckClass);
         $freeShippingLabel.removeClass(customCheckClass);
         $expressShippingLabel.addClass(customCheckClass);
      };
      if ($('#shipping_method_0_free_shipping6:checked').val()) {
         $shippingCost.text('$' + freeShipping);
         $standardShippingLabel.removeClass(customCheckClass);
         $expressShippingLabel.removeClass(customCheckClass);
         $freeShippingLabel.addClass(customCheckClass);
      };
      
      let shippingPhoneField = $('#shipping_phone_field'),
         paragraphToPrepend = '<p class="contact-details-sub-header">We will use these details to keep you informed on your delivery.</p>',
         headerToPrepend = '<h3 class="contact-details-header">Contact Details</h3>';
      shippingPhoneField.prepend(headerToPrepend, paragraphToPrepend);

      $('.shipping_method').change(function() {
         const value = $(this).val();
         switch (value) {
            case 'flat_rate:3':
               break;
            case 'flat_rate:5':
               break;
            case 'free_shipping:6':
               break;
            default:
               break;
         }
      });

      $expressShippingInput.on('click', function() {
         $shippingCost.text('$' + expressShipping);
         $standardShippingLabel.removeClass(customCheckClass);
         $freeShippingLabel.removeClass(customCheckClass);
         $expressShippingLabel.addClass(customCheckClass);
      });
      $standardShippingInput.on('click', function() {
         $shippingCost.text('$' + standardShipping);
         $expressShippingLabel.removeClass(customCheckClass);
         $freeShippingLabel.removeClass(customCheckClass);
         $standardShippingLabel.addClass(customCheckClass);
      });
      $freeShippingInput.on('click', function() {
         $shippingCost.text('$' + freeShipping);
         $expressShippingLabel.removeClass(customCheckClass);
         $standardShippingLabel.removeClass(customCheckClass);
         $freeShippingLabel.addClass(customCheckClass);
      });
      
      $('.trigger-validation').on('click', function() {
         const phone = $('#shipping_phone').val(),
            email = $('#shipping_email').val();

         if (!$('#ship-to-different-address-checkbox').is(":checked")) {
            const firstName = $('#shipping_first_name').val(),
               lastName = $('#shipping_last_name').val(),
               country = $('#shipping_country').val(),
               street = $('#shipping_address_1').val(),
               city = $('#shipping_city').val(),
               postCode = $('#shipping_postcode').val(); 
            
            $('#billing_first_name').val(firstName);  
            $('#billing_last_name').val(lastName);
            $('#billing_country').val(country);
            $('#billing_address_1').val(street);
            $('#billing_city').val(city);
            $('#billing_postcode').val(postCode);
            $('#billing_phone').val(phone);
            $('#billing_email').val(email);
         }
         $('#billing_phone').val(phone);
         $('#billing_email').val(email);

         if (isValid()) {
            populateOrderDetails();
            clearErrors();
            switchToPayment();
            $('#revPayment, #revDelivery, #revPaymentMobile, #revDeliveryMobile').addClass('valid');
         }
      });
   
      $('#revPayment, #revPaymentMobile').on('click', function() {
         if ($(this).hasClass('valid')) {
            populateOrderDetails();
            if (isValid()) {
               switchToPayment();
            }
         }
      });
      $('#revDelivery, #revDeliveryMobile').on('click', function() {
       switchToDelivery();
      });
    
      // TODO: sta ovo radi???
      function populateOrderDetails() {
         let firstName = $('#billing_first_name').val(),
            lastName = $('#billing_last_name').val(),
            country = $('#billing_country').val(),
            street = $('#billing_address_1').val(),
            city = $('#billing_city').val(),
            postCode = $('#billing_postcode').val(),
            shippingFirstName = $('#shipping_first_name').val(),
            shippingLastName = $('#shipping_last_name').val(),
            shippingCountry = $('#shipping_country').val(),
            shippingStreet = $('#shipping_address_1').val(),
            shippingCity = $('#shipping_city').val(),
            shippingPostCode = $('#shipping_postcode').val(),
            phone = $('#shipping_phone').val(),
            mail = $('#shipping_email').val();
      }
   
      function switchToDelivery(e) {
         $deliveryTab.addClass('active');
         $deliveryTabMobile.addClass('active');
         $paymentTab.removeClass('active');
         $paymentTabMobile.removeClass('active');
         $shipppingNode.addClass('active');
         $paymentNode.removeClass('active');
         $('.order-summary').removeClass('payment-step-active');
         $mobileShipppingNode.css('display', 'block');
         $mobilePaymentNode.css('display', 'none');
         $desktopCoupons.css('display', 'block');
         $mobileCoupons.css('display', 'block');
      }
   
      function switchToPayment(e) {
         $deliveryTab.removeClass('active');
         $deliveryTabMobile.removeClass('active');
         $paymentTab.addClass('active');
         $paymentTabMobile.addClass('active');
         $paymentNode.addClass('active');
         $shipppingNode.removeClass('active'); 
         $('.order-summary').addClass('payment-step-active');
         $mobileShipppingNode.css('display', 'none');
         $mobilePaymentNode.css('display', 'block');
         $desktopCoupons.css('display', 'none');
         $mobileCoupons.css('display', 'none');
         scrollToTop();
      }
   
      $(':input').focusout(function() {
         if (!isEmpty($(this).val())) {
            $(this).next('.errorMsg').remove();
         }
      });
   
      function scrollToTop() {
         $("html, body").animate({scrollTop: 100}, 200);
      }
   
      // TODO: refaktorisi
      function isValid() {
         let all_inputs = $('.shipping-node').find(".validate-required :input").not('.thwcfe-disabled-field, .woocommerce-validated,:hidden'), 
            valid = true,
            errorMsg = "<div class='errorMsg'>This field is required</div>",
            emailErrorMsg = "<div class='errorMsg'>Email address is not valid</div>",
            digitsOnlyErrorMsg = "<div class='errorMsg'>Enter only digits please</div>";

         $.each(all_inputs, function(field) {
            let currentInput = $(this),
               type = currentInput.getType(),
               name = currentInput.attr('name'),
               value = get_field_value(type, currentInput, name);

            if (isEmpty(value)) {
               let inputError = currentInput.next('.errorMsg').length;
               if (inputError == 0) {
                  currentInput.parent('.woocommerce-input-wrapper').append(errorMsg);
                  scrollToTop();
               }
               valid = false;
            } else if (type == "email" && !isEmailValid(value)) {
               let inputError = currentInput.next('.errorMsg').length;
               if (inputError == 0) {
                  currentInput.parent('.woocommerce-input-wrapper').append(emailErrorMsg);
                  scrollToTop();
               }
               valid = false;
            } else if (type == "tel" && !isOnlyDigits(value)) {
               let inputError = currentInput.next('.errorMsg').length;
               if (inputError == 0) {
                  currentInput.parent('.woocommerce-input-wrapper').append(digitsOnlyErrorMsg);
                  scrollToTop();
               }
               valid = false;
            }
            
         });
         return valid;
      }

      function isEmailValid(email) {
         let mail_format = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
         if (email.match(mail_format)) {
            return true;
         } else {
            return false;
         }
      }
      function isOnlyDigits(number) {
         let numbersRegex = /^[0-9]{0,20}$/;
         if (number.match(numbersRegex)) {
            return true;
         } else {
            return false;
         }
      }  

      function clearErrors() {
         $('.errorMsg').remove();
      }
      
      $.fn.getType = function() {
         try {
            return this[0].tagName == "INPUT" ? this[0].type.toLowerCase() : this[0].tagName.toLowerCase(); 
         } catch(err) {
            return 'E001';
         }
      }

      function isEmpty(str) { 
         return (!str || 0 === str.length); 
      }

      function get_field_value(type, elm, name) {
         let value = '';
         switch (type) {
            case 'radio':
               value = $("input[type=radio][name='"+name+"']:checked").val();
               value = value ? value : '';
               break;
            case 'checkbox':
               if (elm.data('multiple') == 1) {
                  let valueArr = [];          
                  $("input[type=checkbox][name='"+name+"']:checked").each(function() {
                     valueArr.push($(this).val());             
                  });
                  value = valueArr;
                  if ($.isEmptyObject(value)) {                    
                  value = "";           
                  }
               } else {
                  value = $("input[type=checkbox][name='"+name+"']:checked").val();
                  value = value ? value : '';
               }
               break;
            case 'select':
               value = elm.val();
               break;
            case 'multiselect':
               value = elm.val();        
               break;
            default:
               value = elm.val();
               break;
         }
         return value;
      }
   
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
      $('#billing_country').on('change', function() {
         $('#billing_country_field label').addClass('focused');
      });
      $('#shipping_country').on('change', function() {
         $('#shipping_country_field label').addClass('focused');
      });
      $('input, select').focusout(function() {
         let element = $(this);
         if ( !element.val() ) {
            element.parents('.form-row').children('label').removeClass("focused");
         }
      }); 

      function limitClickSpeed() {
         $('.add-final, .remove-final').on('click', function(e) {
            $(this).addClass('disabled');
            setTimeout(function() {
               $('.add-final, .remove-final').removeClass('disabled'); 
            }, 1000);
         })
      }
      
      function calculateCouponValue() {
         setTimeout(function() {
            let couponValue = $('.cart-discount .woocommerce-Price-amount').text();
               couponValue = couponValue.substring(1);
               couponValue = couponValue.substring(0, couponValue.indexOf(".")); 
               if (couponValue) {
                  let counterElValue = parseInt($('.cart-quantity').text());
                  couponValue = couponValue / counterElValue;
                  $('.couponValue').text(couponValue);
                  let couponValue = $('.cart-discount .woocommerce-Price-amount').text();
                  couponValue = couponValue.substring(0, couponValue.indexOf("."));
                  $('#couponValue').text(couponValue);
               }
         }, 3000);
      }
      
   });
</script>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>