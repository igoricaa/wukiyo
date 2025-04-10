function getCouponValue() {
  let value = parseInt(
    $('.cart-discount .woocommerce-Price-amount').text().substring(1)
  );
  if (value) {
    return value;
  } else {
    return 0;
  }
}

(function ($) {
  let isSubscription = false;
  $('.wcsatt-options-prompt-action-input').change(function () {
    const value = $(this).val();
    isSubscription = value === 'yes' ? true : false;
  });

  $(document).on(
    'click',
    '.single-product-add-to-cart-button, .add-ajax',
    function (e) {
      e.preventDefault();

      const $buttonClicked = $(this),
        currentQuantity = parseInt(
          $buttonClicked.attr('data-product-current-quantity')
        );

      if (currentQuantity > 0) {
        location.href = '/checkout';
        return;
      }

      const productId = parseInt(this.dataset.productid),
        quantityToAdd = parseInt($('.numberOfProducts').text());

      addToCartFromSingleProductPage(
        productId,
        quantityToAdd,
        currentQuantity,
        $buttonClicked
      );
    }
  );

  $(document).on(
    'click',
    '.archive-single-add-to-cart-button, .add-ajax',
    function (e) {
      e.preventDefault();

      let $buttonClicked = $(this),
        changedQuantity = 1,
        productId = parseInt(this.dataset.productid),
        currentQuantityEl = '.product-quantity-' + productId,
        currentQuantity = parseInt($(currentQuantityEl).text());

      if (currentQuantity > 0 && $buttonClicked.hasClass('added')) {
        location.href = '/checkout';
        return;
      }

      $(currentQuantityEl).text(currentQuantity + 1);

      const data = {
        action: 'woocommerce_ajax_add_to_cart',
        product_id: productId,
        product_sku: '',
        quantity: changedQuantity,
        variation_id: 0,
      };

      $(document.body).trigger('adding_to_cart', [$buttonClicked, data]);
      $.ajax({
        type: 'post',
        url: wc_add_to_cart_params.ajax_url,
        data: data,
        beforeSend: function (response) {
          $buttonClicked.removeClass('added').addClass('loading');
        },
        complete: function (response) {
          $buttonClicked.addClass('added').removeClass('loading');
        },
        success: function (response) {
          if (currentQuantity == 0) {
            const cartItemKey = response.fragments['cart_item_keys'][productId];
            $('.remove-final-archive[data-productid="' + productId + '"]').attr(
              'data-cart-item-key',
              cartItemKey
            );
            $('.add-final-archive[data-productid="' + productId + '"]').attr(
              'data-cart-item-key',
              cartItemKey
            );
          }

          $buttonClicked.addClass('added');
          $(document.body).trigger('added_to_cart', [
            response.fragments,
            response.cart_hash,
            $buttonClicked,
          ]);
        },
      });
    }
  );

  $(document).on('click', '.remove-final, .add-final', function (e) {
    e.preventDefault();

    const $buttonClicked = $(this);

    $buttonClicked.addClass('disabled');
    $('.cart-amount').addClass('blue');
    setTimeout(() => {
      $('.remove-final, .add-final').removeClass('disabled');
      $('.cart-amount').removeClass('blue');
    }, 1000);

    const productId = $buttonClicked.attr('data-productid'),
      productType = $buttonClicked.attr('data-product-type'),
      operator = $buttonClicked.attr('data-operator'),
      cartItemKey =
        productType === 'subscription'
          ? $('.id-' + productId + '.subscription').attr('id')
          : $('.id-' + productId + '.one-time').attr('id'),
      currentQuantityClass = $(
        '.product-quantity-' + productId + '.' + productType
      ),
      currentQuantity = parseInt(currentQuantityClass.text());

    let updatedQuantity = currentQuantity,
      cartQuantity = parseInt($('.cart-quantity').text());

    switch (operator) {
      case 'add':
        updatedQuantity++;
        cartQuantity++;
        break;
      case 'remove':
        updatedQuantity--;
        cartQuantity--;
        break;
      default:
        updatedQuantity = 0;
    }
    if (updatedQuantity == 0) {
      $buttonClicked.addClass('disabledFg');
    } else {
      $buttonClicked.removeClass('disabledFg');
    }

    if (operator == 'add' && currentQuantity == 0) {
      addToCartFromCheckout(
        productId,
        updatedQuantity,
        currentQuantity,
        $buttonClicked
      );
      return;
    }

    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: wc_add_to_cart_params.ajax_url,
      data: {
        action: 'update_item_from_cart',
        cart_item_key: cartItemKey,
        qty: updatedQuantity,
      },
      success: function (response) {
        let totalParsed = parseFloat(
            $('.cart-total-value').text().substring(1).replace(',', '')
          ),
          subtotalParsed = parseFloat(
            $('.subtotal').text().substring(1).replace(',', '')
          );
        const productPrice = parseInt(
            $('#product-price-' + productId + '.' + productType).val()
          ),
          discount = getCouponValue();

        switch (operator) {
          case 'add':
            totalParsed = totalParsed + (productPrice - discount);
            subtotalParsed = subtotalParsed + productPrice;
            break;
          case 'remove':
            totalParsed = totalParsed - (productPrice - discount);
            subtotalParsed = subtotalParsed - productPrice;
            break;
          default:
            totalParsed = 0;
        }

        if (updatedQuantity == 0) {
          $buttonClicked.closest('.cart-product-wrapper').remove();
        } else {
          $(currentQuantityClass).text(updatedQuantity);
        }

        $('.count, .cart-quantity').text(cartQuantity);

        if (response) {
          console.log('You missed something');
        } else {
          console.log('Updated Successfully');

          updateShippingMethods(subtotalParsed, discount);
          $(document.body).trigger('update_checkout');
        }
      },
    });
  });

  $(document).on(
    'click',
    '.remove-final-single-product, .add-final-single-product',
    function (e) {
      e.preventDefault();

      let $buttonClicked = $(this),
        productInfoClass = isSubscription
          ? $('#subscription-product-info')
          : $('#one-time-product-info'),
        displayedQuantityElement = $('.numberOfProducts'),
        updatedQuantity = parseInt(displayedQuantityElement.text()),
        cartQuantity = parseInt($('.count').html());
      const productId = $buttonClicked.attr('data-productid'),
        operator = $buttonClicked.attr('data-operator'),
        currentProductQuantity = productInfoClass.attr('data-current-quantity');

      switch (operator) {
        case 'add':
          updatedQuantity++;
          cartQuantity++;
          break;
        case 'remove':
          updatedQuantity--;
          cartQuantity--;
          break;
        default:
          updatedQuantity = 0;
      }

      if (updatedQuantity == 0) {
        $('.remove-final-single-product').addClass('disabledFg');
      } else {
        $('.remove-final-single-product').removeClass('disabledFg disabled');
      }

      displayedQuantityElement.text(updatedQuantity);
      if (updatedQuantity == 0) {
        $('.single-product-add-to-cart-button').addClass('disabled');
      } else {
        $('.single-product-add-to-cart-button').removeClass('disabled');
      }

      if (currentProductQuantity == 0) {
        return;
      }

      const cartItemKey = $buttonClicked.attr('data-cart-item-key');

      $buttonClicked.addClass('disabled');
      $('.cart-amount').addClass('blue');
      setTimeout(() => {
        $(
          '.add-final-single-product, .remove-final-single-product'
        ).removeClass('disabled');
        $('.cart-amount').removeClass('blue');
      }, 1000);

      if (cartItemKey.length > 0) {
        updateCartFromSingleProductPage(
          productId,
          cartItemKey,
          updatedQuantity,
          cartQuantity,
          productInfoClass
        );
      } else if (updatedQuantity > 0) {
        addToCartFromSingleProductPage(
          productId,
          updatedQuantity,
          updatedQuantity,
          $buttonClicked
        );
      }
    }
  );

  $(document).on(
    'click',
    '.remove-final-archive, .add-final-archive',
    function (e) {
      e.preventDefault();

      const $buttonClicked = $(this);

      $buttonClicked.addClass('disabled');
      $('.cart-amount').addClass('blue');
      setTimeout(() => {
        $('.add-final-archive, .remove-final-archive').removeClass('disabled');
        $('.cart-amount').removeClass('blue');
      }, 1000);

      const productId = $buttonClicked.attr('data-productid'),
        operator = $buttonClicked.attr('data-operator'),
        cartItemKey = $buttonClicked.attr('data-cart-item-key'),
        currentQuantityElement = '.product-quantity-' + productId,
        currentQuantity = parseInt($(currentQuantityElement).text());

      let cartQuantity = parseInt($('.count').html()),
        updatedQuantity = currentQuantity;

      switch (operator) {
        case 'add':
          updatedQuantity++;
          cartQuantity++;
          break;
        case 'remove':
          updatedQuantity--;
          cartQuantity--;
          break;
        default:
          updatedQuantity = 0;
      }
      if (updatedQuantity == 0) {
        $('.remove-final-archive').addClass('disabledFg');
      } else {
        $('.remove-final-archive').removeClass('disabledFg');
      }

      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: wc_add_to_cart_params.ajax_url,
        data: {
          action: 'update_item_from_cart',
          cart_item_key: cartItemKey,
          qty: updatedQuantity,
        },
        success: function (response) {
          if (response) {
            console.log('You missed something');
          } else {
            console.log('Updated Successfully');

            let productInfoClass = $('#one-time-product-info');
            if (isSubscription) {
              productInfoClass = $('#subscription-product-info');
            }
            productInfoClass
              .attr('data-current-quantity', updatedQuantity)
              .attr('data-quantity-to-display', updatedQuantity);

            $('.single-add-to-cart-button').attr(
              'data-product-current-quantity',
              updatedQuantity
            );

            $(currentQuantityElement).text(updatedQuantity);
            $('.count').text(cartQuantity);
          }
        },
      });
    }
  );

  function updateCartFromSingleProductPage(
    productId,
    cartItemKey,
    updatedQuantity,
    cartQuantity,
    productInfoClass
  ) {
    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: wc_add_to_cart_params.ajax_url,
      data: {
        action: 'update_item_from_cart',
        cart_item_key: cartItemKey,
        qty: updatedQuantity,
      },
      success: function (response) {
        if (response) {
          console.log('You missed something');
        } else {
          console.log('Updated Successfully');

          $('.product-quantity-' + productId).text(updatedQuantity);
          $('.count').text(cartQuantity);

          productInfoClass
            .attr('data-current-quantity', updatedQuantity)
            .attr('data-quantity-to-display', updatedQuantity);

          const $addToCartButton = $('.single-product-add-to-cart-button');
          $addToCartButton.attr(
            'data-product-current-quantity',
            updatedQuantity
          );

          if (updatedQuantity > 0) {
            $addToCartButton.text('CHECKOUT');
          } else {
            $addToCartButton.text('ADD TO CART');
            productInfoClass.attr('data-is-disabled', 1);
          }
        }
      },
    });
  }

  function addToCartFromCheckout(
    productId,
    quantityToAdd,
    currentQuantity,
    $buttonClicked
  ) {
    const productType = $buttonClicked.data('product-type');
    const isSubscription = productType == 'subscription' ? true : false;
    const subscriptionData = isSubscription
        ? {
            'subscribe-to-action-input': 'yes',
            ['convert_to_sub_dropdown' + productId]: '1_month',
            ['convert_to_sub_' + productId]: '1_month',
            'add-product-to-subscription': productId,
          }
        : {},
      data = {
        action: 'woocommerce_ajax_add_to_cart',
        product_id: productId,
        product_sku: '',
        quantity: quantityToAdd,
        variation_id: 0,
        ...subscriptionData,
      };

    $(document.body).trigger('adding_to_cart', [$buttonClicked, data]);
    $.ajax({
      type: 'post',
      url: wc_add_to_cart_params.ajax_url,
      data: data,
      beforeSend: function (response) {
        $buttonClicked.removeClass('added').addClass('loading');
      },
      complete: function (response) {
        $buttonClicked.addClass('added').removeClass('loading');
      },
      success: function (response) {
        $('.product-quantity-' + productId + '.' + productType).text(
          quantityToAdd
        );

        const cartQuantity = parseInt($('.cart-quantity').text()) + 1;
        $('.count, .cart-quantity').text(cartQuantity);

        const minusButton = $('.remove-final');
        minusButton.removeClass('disabled disabledFg');

        let productInfoClass = $('.id-' + productId + '.one-time');
        if (isSubscription) {
          productInfoClass = $('.id-' + productId + '.subscription');
        }

        if (currentQuantity == 0) {
          const cartItemKey = response.fragments['cart_item_keys'][productId];
          productInfoClass.attr('id', cartItemKey);
        }

        $(document.body).trigger('update_checkout');
        $(document.body).trigger('added_to_cart', [
          response.fragments,
          response.cart_hash,
          $buttonClicked,
        ]);
      },
    });
  }

  function addToCartFromSingleProductPage(
    productId,
    quantityToAdd,
    currentQuantity,
    $buttonClicked
  ) {
    const subscriptionData = isSubscription
        ? {
            'subscribe-to-action-input': 'yes',
            ['convert_to_sub_dropdown' + productId]: '1_month',
            ['convert_to_sub_' + productId]: '1_month',
            'add-product-to-subscription': productId,
          }
        : {},
      data = {
        action: 'woocommerce_ajax_add_to_cart',
        product_id: productId,
        product_sku: '',
        quantity: quantityToAdd,
        variation_id: 0,
        ...subscriptionData,
      };

    $(document.body).trigger('adding_to_cart', [$buttonClicked, data]);
    $.ajax({
      type: 'post',
      url: wc_add_to_cart_params.ajax_url,
      data: data,
      beforeSend: function (response) {
        $buttonClicked.removeClass('added').addClass('loading');
      },
      complete: function (response) {
        $buttonClicked.addClass('added').removeClass('loading');
      },
      success: function (response) {
        $('.product-quantity-' + productId).text(quantityToAdd);

        const minusButton = $('.remove-final-single-product'),
          plusButton = $('.add-final-single-product');

        minusButton.removeClass('disabled');

        const productInfoClass = $('#one-time-product-info');
        if (isSubscription) {
          productInfoClass = $('#subscription-product-info');
        }

        if (currentQuantity == 0) {
          const cartItemKey = response.fragments['cart_item_keys'][productId];
          minusButton.attr('data-cart-item-key', cartItemKey);
          plusButton.attr('data-cart-item-key', cartItemKey);
          productInfoClass.attr('data-cart-item-key', cartItemKey);
        }

        productInfoClass
          .attr('data-current-quantity', quantityToAdd)
          .attr('data-quantity-to-display', quantityToAdd)
          .attr('data-is-disabled', 0);
        $('.single-product-add-to-cart-button')
          .text('CHECKOUT')
          .addClass('added')
          .attr('data-product-current-quantity', quantityToAdd);

        $(document.body).trigger('added_to_cart', [
          response.fragments,
          response.cart_hash,
          $buttonClicked,
        ]);
      },
    });
  }

  function updateShippingMethods(subtotalParsed, discount) {
    const customCheckClass = 'custom-check',
      freeShippingInput = $('#shipping_method_0_free_shipping6'),
      freeShippingLabel = $('label[for=shipping_method_0_free_shipping6]'),
      standardShippingInput = $('#shipping_method_0_flat_rate3'),
      standardShippingLabel = $('label[for=shipping_method_0_flat_rate3]'),
      expressShippingLabel = $('label[for=shipping_method_0_flat_rate5]'),
      shippingCost = $('.shippingCost');

    // TODO: da li je potreban drugi uslov??
    if (
      subtotalParsed - discount >= 199 &&
      freeShippingInput.parent().hasClass('hidden')
    ) {
      freeShippingInput.parent().removeClass('hidden');
      freeShippingInput.prop('checked', true);
      freeShippingLabel.addClass(customCheckClass);
      standardShippingLabel.removeClass(customCheckClass);
      expressShippingLabel.removeClass(customCheckClass);
      shippingCost.text('$0');
    } else if (
      subtotalParsed - discount < 199 &&
      !freeShippingInput.parent().hasClass('hidden')
    ) {
      freeShippingInput.parent().addClass('hidden');
      freeShippingLabel.removeClass(customCheckClass);
      expressShippingLabel.removeClass(customCheckClass);
      standardShippingInput.prop('checked', true);
      standardShippingLabel.addClass(customCheckClass);
      shippingCost.text('$9');
    }
  }
})(jQuery);
