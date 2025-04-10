<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <title>W-YO®</title>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.00, user-scalable=yes">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171133293-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-171133293-1');
  </script>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div class="overlay"></div>
  <div id="page" class="site">
    <a href="https://www.awwwards.com/sites/wukiyo-r" target="_blank">
      <img src="<?php echo get_template_directory_uri(); ?>/img/awwwards-honor-banner.svg" id="awwwards"
        alt="Awwwards Honor banner">
    </a>
    <header id="masthead" class="site-header">
      <?php include(get_template_directory() . '/inc/burger-menu.php'); ?>
      <div class="site-branding sitePadding w-100">
        <div class="p-0">
          <div class="header-container white-border-bottom position-relative">
            <div class="logo-container">
              <?php
              $logo;
              $chineseLetters;

              if (wp_is_mobile()):
                if (is_front_page() || is_home()):
                  $logo = '/img/wukiyo_white.svg';
                  $chineseLetters = get_field('chinese_letters_white', 'option');
                else:
                  $logo = '/img/wukiyo_black.svg';
                  $chineseLetters = get_field('chinese_letters_black', 'option');
                endif;
              else:
                if (is_front_page() || is_home()):
                  $logo = '/img/logos/wukiyo-everything-white.svg';
                  $chineseLetters = get_field('chinese_letters_white', 'option');
                else:
                  $logo = '/img/logos/wukiyo-everything.svg';
                  $chineseLetters = get_field('chinese_letters_black', 'option');
                endif;
              endif;
              ?>
              <?php
              if (is_product() && wp_is_mobile()):
                ?>
                <a href="<?php echo get_home_url(); ?>">
                  <img class="header-logo" src="<?php echo get_template_directory_uri();
                  echo $logo ?>" alt="Everything you can be">
                </a>

                <?php
              elseif (is_product()):
                ?>
                <img src="<?php echo bloginfo('template_url'); ?>/img/nootropics.svg">
                <?php
              else:
                ?>
                <a href="<?php echo get_home_url(); ?>">
                  <img class="header-logo" src="<?php echo get_template_directory_uri();
                  echo $logo ?>" alt="Everything you can be">
                </a>
                <?php
              endif;
              ?>
            </div>
            <div class="cart-container r60">
              <span class="d-inline-block">
                <?php include(get_template_directory() . '/inc/header-cart.php'); ?>
              </span>
            </div>
            <div class="chinese-letters">
              <img alt="Chinese letters image" src="<?php echo $chineseLetters['url']; ?>">
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- #masthead -->
    <script type="text/javascript">
      window.onload = function () {
        setTimeout(function () {
          $('.revLoading').fadeOut();
          if (window.sessionStorage) {
            sessionStorage.setItem("loader", "true");
          }
        }, 3000);
      }
      // TODO - refaktorisi
      $(document).ready(function () {
        if (sessionStorage.getItem("loader")) {
          $('.revLoading').css('display', 'none');
        }

        if (parseInt($('.items-number .count').text()) > 0) {
          $('.cartText').text('Checkout');
        } else {
          $('.cartText').text('Empty');
        }

        $('.revelation-cart').on('click', function () {
          $(this).css('width', 'auto');
        })
        $('.burger').on('click', function () {
          toggleMenu();
        });
        $('.main-navigation li a').not("#menu-item-347 > a").on('click', function () {
          toggleMenu();
        });

        $('.dropdown > a').click(function () {
          $('.sub-menu').toggle('slow');
          let dropdown = $('.dropdown');
          if (dropdown.is('.active, .open')) {
            dropdown.removeClass('active open');
          } else {
            dropdown.addClass('active open');
          }

          if (window.matchMedia('(max-height: 1200px)').matches) {
            if (dropdown.hasClass('open')) {
              if (window.matchMedia('(min-width: 1000px) and (max-height: 780px)').matches) {
                $('.menu-footer-logo-desktop').css('opacity', 0).css('pointer-events', 'none');
              }
              // TODO: prebaci u klase
              $('.menuFooterLinks a').css('opacity', 0).css('pointer-events', 'none');
              $('.menu-footer-wrapper').css('z-index', -1);
              $('.menuFooter').css('border', 'none');
            } else {
              if (window.matchMedia('(min-width: 1000px)').matches) {
                $('.menu-footer-logo-desktop').css('opacity', 1).css('pointer-events', 'all');
              }
              // TODO: prebaci u klase
              $('.menuFooterLinks a').css('opacity', 1).css('pointer-events', 'all');
              $('.menu-footer-wrapper').css('z-index', 'unset');
              $('.menuFooter').css('border-top', '1px solid #fff');
            }
          }
        });

        // TODO: refaktorisi - selektori dupli + ova logika ispod
        function toggleMenu() {
          const sideNavBar = $('.sideNavBar'),
            dropdown = $('.dropdown'),
            burger = $('.burger');

          sideNavBar.toggleClass('closed').toggleClass('open');
          burger.toggleClass('active');
          burger.children().toggleClass('change');
          $('.overlay').toggleClass('blury');

          if ((dropdown.is('.open.active')) || sideNavBar.hasClass('closed')) {
            dropdown.removeClass('open active');

          } else if (dropdown.hasClass('active')) {
            dropdown.addClass('open');
          }

          if ($(window).width() < 767) {
            $('body').toggleClass('overflow-hidden');
          }
          if ($('.sub-menu').is(':visible')) {
            $('.sub-menu').toggle();
          }
          const time = 100;
          $('.menu li').each(function () {
            var that = $(this);
            setTimeout(function () {
              $(that).toggleClass('fadeInDown');
            }, time)
          });
        }

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
          anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
              behavior: 'smooth'
            });
          });
        });

        $("#toTop").click(function () {
          $("html, body").animate({
            scrollTop: 0
          }, 1000);
        });

        let cartCount = parseInt($('.count').text());
        if (cartCount == 0) {
          $('.cart-amount').addClass('opacity');
        }

        $('.cart-amount').on('click', function () {
          if ($(this).hasClass('open')) {
            window.location.href = '/checkout';
          }
          $(this).toggleClass('open');
        })

        $(document).click(function (event) {
          let $target = $(event.target);
          if ($('.sideNavBar').hasClass('open') && !$target.closest('.burger').length) {
            if (!$target.closest('.sideNavBar').length && $('.sideNavBar').is(":visible")) {
              toggleMenu();
            }
          }
        });
      });
    </script>
    <div class="page-content">