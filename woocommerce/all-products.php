<div class="products-wrapper">
    <div class="row">

    <?php  
    $esse_id = 26;
    $apex_id = 350;
    $pure_id = 359;
    $vert_id = 361;
    $bliss_id = 356;
    $product_ids = array('esse_id' => $esse_id, 
                        'apex_id' => $apex_id,
                        'pure_id' => $pure_id,
                        'vert_id' => $vert_id,
                        'bliss_id' => $bliss_id);

    foreach ( $product_ids as $product_name => $product_id ) {
        $product = wc_get_product($product_id);
        $product_cart_item_key = "";
        $product_current_quantity = 0;

        $is_in_stock = $product -> is_in_stock();
        if (!$is_in_stock) {
            
        }

        $cart = WC() -> cart -> get_cart();
        foreach ( $cart as $cart_item_key => $cart_item ) {
            if ( $cart_item['product_id'] == $product_id ) {
                $product_cart_item_key = $cart_item_key;
                $product_current_quantity = $cart_item['quantity'];
            }
        };

        switch ($product_id) {
            case $esse_id:
                $card_id = 'esse-card';
                $column_class = 'col-md-6';
                $product_logo_src = '/img/logos/wukiyo-esse.svg';
                $product_package_src = '/img/esse-package.webp';
                $product_title = "Patented Nootropics<br>Formulation";
                $rating_number = 4.91;
                break;
            case $apex_id:
                $card_id = 'apex-card';
                $column_class = 'col-md-6';
                $product_logo_src = '/img/logos/wukiyo-apex.svg';
                $product_package_src = '/img/apex-package.webp';
                $product_title = "Patented Nootropics<br>Supplement";
                $rating_number = 4.89;
                break;
            case $bliss_id:
                $card_id = 'bliss-card';
                $column_class = 'col-md-4';
                $product_logo_src = '/img/logos/wukiyo-bliss.svg';
                $product_package_src = '/img/bliss-package.webp';
                $product_title = "Pro Nootropic<br>Mushrooms Microdose";
                $rating_number = 4.95;
                break;
            case $pure_id:
                $card_id = 'pure-card';
                $column_class = 'col-md-4';
                $product_logo_src = '/img/logos/wukiyo-pure.svg';
                $product_package_src = '/img/pure-package.webp';
                $product_title = "Full-Spectrum<br>Organic CBD oil";
                $rating_number = 4.86;
                break;
            case $vert_id:
                $card_id = 'vert-card';
                $column_class = 'col-md-4';
                $product_logo_src = '/img/logos/wukiyo-vert.svg';
                $product_package_src = '/img/vert-package.webp';
                $product_title = "Certified Natural<br>Spirulina and Chlorella";
                $rating_number = 4.80;
                break;
        } ?>
        
        <div id="<?php echo $card_id; ?>" class="<?php echo $column_class; ?> col-xl product-card">
            <div class="product-card-inner-wrapper" data-productid="<?php echo $product_id; ?>">
                <span class="remove-product-added-desktop hidden"><img src="<?php echo get_template_directory_uri();?>/img/x-close-grey.svg" alt="remove effect"></span>
                <span class="remove-product-added-mobile hidden"><img src="<?php echo get_template_directory_uri();?>/img/x-close-black.svg" alt="remove effect"></span>
                <img class="product-logo" src="<?php echo get_template_directory_uri(); echo $product_logo_src; ?>" alt="Product logo">
                <div class="first-half-wrapper">
                    <img class="product-package" src="<?php echo get_template_directory_uri(); echo $product_package_src; ?>" alt="Product package">
                    <div class="quantity_buttons_wrapper hidden">
                        <div class="add-to-cart-button">
                            <!-- TODO - refaktorisi - input field -->
                            <div data-productid="<?php echo $product_id; ?>" data-operator="remove" class="remove remove-final-archive" data-cart-item-key="<?php echo $product_cart_item_key; ?>">-</div>
                            <div class="numberOfProducts product-quantity-<?php echo $product_id; ?> fontBold"><?php echo $product_current_quantity; ?></div>
                            <div data-productid="<?php echo $product_id; ?>" data-operator="add" class="add add-final-archive" data-cart-item-key="<?php echo $product_cart_item_key; ?>">+</div>
                        </div>
                    </div>
                </div>
                <div class="second-half-wrapper">
                    <div class="helper-wrapper-desktop">
                        <div class="title-rating-wrapper">
                            <img class="rating-stars-grey" src="<?php echo get_template_directory_uri();?>/img/rating-stars@2x.webp" alt="rating stars">
                            <h4><?php echo $product_title; ?></h4>
                        </div>
                        <div class="buytwo-price-wrapper">
                            <p>Buy 2 Items | Get 10% Off.</p>
                            <p class="product_price <?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product -> get_price_html(); ?></p>
                        </div>
                    </div>
                    <div class="helper-wrapper-mobile">
                        <div class="title-rating-wrapper">
                        <h4><?php echo $product_title; ?></h4>
                            <p>Buy 2 Items | Get 10% Off.</p>
                        </div>
                        <div class="buytwo-price-wrapper">
                            <div class="d-flex align-items-center">
                                <img class="rating-stars-grey" src="<?php echo get_template_directory_uri();?>/img/rating-stars@2x.webp" alt="rating stars">
                                <span class="rating-number"><?php echo $rating_number; ?></span>
                            </div>
                            <p class="product_price <?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
                        </div>
                    </div>
                    <a href="<?php echo get_permalink($product_id); ?>" class="learn-more-product-button">LEARN MORE</a>
                    <button id="add-to-cart-<?php echo $product_id; ?>" class="archive-add-to-cart-button archive-single-add-to-cart-button <?php if(!$is_in_stock) { echo 'disabled';} ?>" data-productid="<?php echo $product_id; ?>" ><span class="bold"><?php echo $is_in_stock ? 'ADD TO CART' : 'OUT OF STOCK' ?></span></button>
                </div>
            </div>
        </div>
        <?php 
        if ($product_id == $apex_id) { ?>
            <div class="row-divider d-none d-md-block d-xl-none"></div>
        <?php }
        } ?>
    </div>
</div>

<script>
    let esseId = 26,
    apexId = 350,
    pureId = 359,
    vertId = 361,
    blissId = 356;
    
    $(document).ready(function() {
        $(document).click(function(event) { 
            let $target = $(event.target);

            let animatedCard = $('.product-card-inner-wrapper.product-added');
            if (animatedCard.length > 0 && !animatedCard.has($target).length) {
                let productId = parseInt(animatedCard.attr('data-productid'));
                removeProductCardAnimations(productId);
            }
        });

        $('.archive-add-to-cart-button').on('click', function() {
            let cartAmount = $('.cart-amount');
            cartAmount.toggleClass('opacity').addClass('blue');
            $('.cartText').text('Checkout');
            
            if (window.matchMedia('(min-width: 370px)').matches) {
                cartAmount.addClass('open');
            }
            
            setTimeout(() => {
                $('.cart-amount').removeClass('blue'); 
            }, 1000);
        });

        $('.remove-product-added-desktop, .remove-product-added-mobile').click(function() {
            let productId = $(this).parent().data('productid');
            removeProductCardAnimations(productId);
        });

        $('#add-to-cart-26, #add-to-cart-350, #add-to-cart-359, #add-to-cart-361, #add-to-cart-356').click(function() {
            let addToCartButton = $(this),
                whiteLogoUrl = getWhiteLogoUrl(addToCartButton.data('productid')),
                productCardWrapper = addToCartButton.closest('.product-card-inner-wrapper'),
                alreadyAnimatedCardId =  parseInt($('.product-card-inner-wrapper.product-added').attr('data-productid'));
            
            if (alreadyAnimatedCardId && !addToCartButton.hasClass('added')) {
                removeProductCardAnimations(alreadyAnimatedCardId);
            }

            productCardWrapper.addClass('product-added');
            productCardWrapper.find('.product-logo').prop('src', '<?php echo get_template_directory_uri();?>' + whiteLogoUrl);
            setTimeout(() => {
                productCardWrapper.find('.quantity_buttons_wrapper').removeClass('hidden');
            }, 500);
            productCardWrapper.find('.rating-stars-grey').prop('src', '<?php echo get_template_directory_uri();?>/img/rating-stars-white@2x.webp');
            addToCartButton.find('span').animate({opacity:0}, function() {
                addToCartButton.html('<span class="bold">CHECKOUT</span>').animate({opacity:1});
            });
            productCardWrapper.find('.remove-product-added-desktop, .remove-product-added-mobile').removeClass('hidden');
        });

        function removeProductCardAnimations(productId) {
            let cardInnerWrapper = $('.product-card-inner-wrapper[data-productid="' + productId +'"]'),
                blackLogoUrl = getBlackLogoUrl(productId),
                addToCartButton = cardInnerWrapper.find('.archive-add-to-cart-button');

            cardInnerWrapper.removeClass('product-added');
            cardInnerWrapper.find('.product-logo').prop('src', '<?php echo get_template_directory_uri();?>' + blackLogoUrl);
            cardInnerWrapper.find('.quantity_buttons_wrapper').addClass('hidden');
            cardInnerWrapper.find('.rating-stars-grey').prop('src', '<?php echo get_template_directory_uri();?>/img/rating-stars@2x.webp');
            addToCartButton.find('span').animate({opacity:0}, function() {
                addToCartButton.html('<span class="bold">ADD TO CART</span>').animate({opacity:1});
            });
            cardInnerWrapper.find('.remove-product-added-desktop, .remove-product-added-mobile').addClass('hidden');
            addToCartButton.removeClass('added');
        }   

        // TODO: prebaci u /logos
        function getWhiteLogoUrl(productId) {
            switch (productId) {
                case esseId:
                    return '/img/wukiyo-esse-white.svg';
                case apexId:
                    return '/img/wukiyo-apex-white.svg';
                case pureId:
                    return '/img/wukiyo-pure-white.svg';
                case vertId:
                    return '/img/wukiyo-vert-white.svg';
                case blissId:
                    return '/img/wukiyo-bliss-white.svg';
                default:
                    console.log('Bad product id.');
            }
        }
        function getBlackLogoUrl(productId) {
            switch (productId) {
                case esseId:
                    return '/img/logos/wukiyo-esse.svg';
                case apexId:
                    return '/img/logos/wukiyo-apex.svg';
                case pureId:
                    return '/img/logos/wukiyo-pure.svg';
                case vertId:
                    return '/img/logos/wukiyo-vert.svg';
                case blissId:
                    return '/img/logos/wukiyo-bliss.svg';
                default:
                    console.log('Bad product id.');
            }
        }
    });
</script>