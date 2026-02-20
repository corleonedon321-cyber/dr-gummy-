/**
 * Toggles — Subscription toggles, mobile menu, accordions
 *
 * @package DR_Gummy
 */

(function () {
  'use strict';

  // Mobile menu toggle
  var mobileNav = document.getElementById('mobile-nav');
  var menuToggles = document.querySelectorAll('[data-menu-toggle]');

  if (mobileNav && menuToggles.length) {
    menuToggles.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var isOpen = mobileNav.classList.contains('is-open');
        if (isOpen) {
          mobileNav.classList.remove('is-open');
          mobileNav.setAttribute('aria-hidden', 'true');
          document.body.style.overflow = '';
        } else {
          mobileNav.classList.add('is-open');
          mobileNav.setAttribute('aria-hidden', 'false');
          document.body.style.overflow = 'hidden';
        }
      });
    });
  }

  // Subscription toggle — updates pricing display
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

  // Bundle card selection
  document.addEventListener('click', function (e) {
    var bundleItem = e.target.closest('[data-bundle-item]');
    if (!bundleItem) return;

    // Toggle selected state
    bundleItem.classList.toggle('is-selected');
  });
})();
