/**
 * Cart Drawer — Slide-out cart panel
 *
 * @package DR_Gummy
 */

(function () {
  'use strict';

  const drawer = document.getElementById('cart-drawer');
  if (!drawer) return;

  const toggleButtons = document.querySelectorAll('[data-cart-toggle]');
  const body = document.body;

  function openCart() {
    drawer.setAttribute('aria-hidden', 'false');
    drawer.classList.add('is-open');
    body.style.overflow = 'hidden';
  }

  function closeCart() {
    drawer.setAttribute('aria-hidden', 'true');
    drawer.classList.remove('is-open');
    body.style.overflow = '';
  }

  toggleButtons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var isOpen = drawer.classList.contains('is-open');
      if (isOpen) {
        closeCart();
      } else {
        openCart();
      }
    });
  });

  // Close on Escape key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
      closeCart();
    }
  });

  // AJAX Add to Cart
  document.addEventListener('click', function (e) {
    var addBtn = e.target.closest('[data-add-to-cart]');
    if (!addBtn) return;

    e.preventDefault();
    var productId = addBtn.dataset.productId;
    if (!productId) return;

    addBtn.disabled = true;
    addBtn.textContent = 'ADDING...';

    var formData = new FormData();
    formData.append('action', 'woocommerce_ajax_add_to_cart');
    formData.append('product_id', productId);
    formData.append('quantity', 1);

    fetch(drGummy.ajaxUrl, {
      method: 'POST',
      credentials: 'same-origin',
      body: formData,
    })
      .then(function () {
        addBtn.textContent = 'ADDED!';
        openCart();
        refreshCartFragments();
        setTimeout(function () {
          addBtn.disabled = false;
          addBtn.textContent = 'ADD TO CART';
        }, 1500);
      })
      .catch(function () {
        addBtn.disabled = false;
        addBtn.textContent = 'ADD TO CART';
      });
  });

  function refreshCartFragments() {
    fetch('/?wc-ajax=get_refreshed_fragments', {
      method: 'POST',
      credentials: 'same-origin',
    })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        if (data && data.fragments) {
          Object.keys(data.fragments).forEach(function (selector) {
            var el = document.querySelector(selector);
            if (el) {
              el.outerHTML = data.fragments[selector];
            }
          });
        }
      });
  }
})();
