<div class="cart-amount transition">
	<div class="cart-amount-wrapper">
	   <img alt="Cart image" src="<?php echo bloginfo('template_url'); ?>/img/cart.svg">
	   <div class="items-number">
	      <div class="count">
	         <?php echo $numberOfItems; ?>  
	      </div>
	   </div>
    </div>
    <p class="mb-0 cartText"><?php echo $text; ?></p>
</div>