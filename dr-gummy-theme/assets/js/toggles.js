/**
 * Toggles — Mobile menu, sticky header, subscription toggles, bundle selection
 *
 * @package DR_Gummy
 */

(function () {
  'use strict';

  /* -----------------------------------------------------------
     Sticky header — add shadow on scroll
     ----------------------------------------------------------- */
  var header = document.getElementById('site-header');
  if (header) {
    var onScroll = function () {
      if (window.scrollY > 4) {
        header.classList.add('is-scrolled');
      } else {
        header.classList.remove('is-scrolled');
      }
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* -----------------------------------------------------------
     Mobile menu toggle
     ----------------------------------------------------------- */
  var mobileNav = document.getElementById('mobile-nav');
  var menuToggles = document.querySelectorAll('[data-menu-toggle]');

  function openMobileNav() {
    if (!mobileNav) return;
    mobileNav.classList.add('is-open');
    mobileNav.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  }

  function closeMobileNav() {
    if (!mobileNav) return;
    mobileNav.classList.remove('is-open');
    mobileNav.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  if (mobileNav && menuToggles.length) {
    menuToggles.forEach(function (btn) {
      btn.addEventListener('click', function () {
        if (mobileNav.classList.contains('is-open')) {
          closeMobileNav();
        } else {
          openMobileNav();
        }
      });
    });
  }

  // Close mobile nav on Escape
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && mobileNav && mobileNav.classList.contains('is-open')) {
      closeMobileNav();
    }
  });

  /* -----------------------------------------------------------
     Subscription toggle — swap pricing display
     ----------------------------------------------------------- */
  document.addEventListener('change', function (e) {
    if (!e.target.matches('[data-subscription-toggle]')) return;

    var isSubscribed = e.target.checked;
    var productForm = e.target.closest('form') || e.target.closest('[data-product-form]');
    if (!productForm) return;

    var oneTimePrice = productForm.querySelector('[data-price-onetime]');
    var subPrice = productForm.querySelector('[data-price-subscription]');

    if (oneTimePrice && subPrice) {
      oneTimePrice.style.display = isSubscribed ? 'none' : '';
      subPrice.style.display = isSubscribed ? '' : 'none';
    }
  });

  /* -----------------------------------------------------------
     Bundle card selection
     ----------------------------------------------------------- */
  document.addEventListener('click', function (e) {
    var bundleItem = e.target.closest('[data-bundle-item]');
    if (!bundleItem) return;

    bundleItem.classList.toggle('is-selected');
  });
})();
