<?php 
   $logo;
   $chineseLetters;
   if ( is_front_page() || is_home() ) :
      $logo = get_field('white_logo', 'option');
      $chineseLetters = get_field('chinese_letters_white', 'option');
   else :
      $logo = get_field('black_logo', 'option'); 
      $chineseLetters = get_field('chinese_letters_black', 'option');
   endif;
?>
<div class="burger r60">
   <div class="bar1"></div>
   <div class="bar2"></div>
   <div class="bar3"></div>
</div>
<div class="sideNavBar closed">
   <div class="nav-wrapper">
      <div class="menu-logo sitePadding">
         <a href="<?php echo get_home_url(); ?>">
            <img alt="Wukiyo logo" class="header-logo" src="<?php echo $logo['url'] ?>">
         </a>
      </div>
      <div class="cart-container-mobile r60">
         <span class="d-inline-block">
         <?php
            $numberOfItems = WC() -> cart -> get_cart_contents_count();

            if ($numberOfItems == 0) {
               $text = 'Empty';
               $link = 'javascript:void(0)';
            } else {
               $text = 'Checkout';
               $link = wc_get_cart_url();
            }?>
         <?php include (get_template_directory() . '/inc/header-cart.php'); ?>
         </span>
      </div>
      <nav id="site-navigation" class="main-navigation ">         
         <?php
            wp_nav_menu(
            array(
               'theme_location' => 'menu-1',
               'menu_id'        => 'primary-menu',
            )
            ); ?>
      </nav>
   </div>
   <div class="menu-footer-wrapper">
      <div class="menuFooter white-border-top">
         <div class="menuFooterLinks">
            <a class="hover" href="<?php the_field('terms_link', 'option') ?>">Terms and conditions</a>
            <a class="hover" href="<?php the_field('privacy_link', 'option') ?>">Privacy policy</a>
            <a class="hover" href="<?php the_field('purchase_ink', 'option') ?>">Purchase policy</a>
            <div class="menu-footer-logo-desktop">
               <img alt="Wukiyo logo" src="<?php echo bloginfo('template_url'); ?>/img/nootropics-white.svg">
            </div>
         </div>
         <div class="black-bck socialIcons">
            <a href="<?php the_field('facebook_link', 'option') ?>">
            <img alt="Facebook logo" src="<?php echo get_template_directory_uri(); ?>/img/Facebook.svg">
            </a>
            <a href="<?php the_field('instagram_link', 'option') ?>">
            <img alt="Instagram logo" src="<?php echo get_template_directory_uri(); ?>/img/Instagram.svg">
            </a>
            <a href="<?php the_field('twitter_link', 'option') ?>">
            <img alt="Twitter logo" src="<?php echo get_template_directory_uri(); ?>/img/Twitter.svg">
            </a>
         </div>
      </div>
      <div class="menu-footer-mobile">
         <div class="menu-footer-mobile-logo">
            <img alt="Wukiyo logo" src="<?php echo bloginfo('template_url'); ?>/img/nootropics.svg">
         </div>
         <div class="black-bck socialIcons d-md-none">
            <a href="<?php the_field('facebook_link', 'option') ?>">
               <img alt="Facebook logo" src="<?php echo get_template_directory_uri(); ?>/img/Facebook.svg">
            </a>
            <a href="<?php the_field('instagram_link', 'option') ?>">
               <img alt="Instagram logo" src="<?php echo get_template_directory_uri(); ?>/img/Instagram.svg">
            </a>
            <a href="<?php the_field('twitter_link', 'option') ?>">
               <img alt="Twitter logo" src="<?php echo get_template_directory_uri(); ?>/img/Twitter.svg">
            </a>
         </div>
      </div>
   </div>
</div>
<!-- End of sideBar-->