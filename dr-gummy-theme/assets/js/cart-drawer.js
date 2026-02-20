/**
 * Cart Drawer — Full slide-out cart interaction logic
 *
 * - Open/close drawer from cart icon, overlay click, X button, Escape key
 * - Quantity +/- per item
 * - Remove item
 * - Subscription toggle per item (Save 20%)
 * - Shipping progress bar (free at $49)
 * - Auto-recalculate subtotal, shipping, total
 * - Cross-sell "Add" button
 * - Email registration form
 *
 * @package DR_Gummy
 */

(function () {
  'use strict';

  /* -----------------------------------------------------------
     CONSTANTS
     ----------------------------------------------------------- */

  var FREE_SHIPPING_THRESHOLD = 49.00;
  var FLAT_SHIPPING = 4.95;
  var SUBSCRIBE_DISCOUNT = 20; // percent

  /* -----------------------------------------------------------
     DOM REFERENCES
     ----------------------------------------------------------- */

  var drawer          = document.getElementById('cart-drawer');
  if (!drawer) return;

  var toggleButtons   = document.querySelectorAll('[data-cart-toggle]');
  var body            = document.body;

  // Shipping bar
  var shippingBar     = document.getElementById('cart-shipping-bar');
  var shippingMsg     = document.getElementById('cart-shipping-msg');
  var shippingRemain  = document.getElementById('cart-shipping-remaining');
  var shippingFill    = document.getElementById('cart-shipping-fill');

  // Items
  var itemsContainer  = document.getElementById('cart-drawer-items');
  var emptyState      = document.getElementById('cart-drawer-empty');

  // Summary
  var subtotalEl      = document.getElementById('cart-summary-subtotal');
  var shippingEl      = document.getElementById('cart-summary-shipping');
  var totalEl         = document.getElementById('cart-summary-total');
  var checkoutBtn     = document.getElementById('cart-checkout-btn');
  var checkoutTotal   = document.getElementById('cart-checkout-total');

  // Footer
  var drawerFooter    = document.getElementById('cart-drawer-footer');
  var crossSell       = document.getElementById('cart-cross-sell');

  /* -----------------------------------------------------------
     HELPERS
     ----------------------------------------------------------- */

  function fmt(n) {
    return '$' + n.toFixed(2);
  }

  /* -----------------------------------------------------------
     OPEN / CLOSE
     ----------------------------------------------------------- */

  function openCart() {
    drawer.setAttribute('aria-hidden', 'false');
    drawer.classList.add('is-open');
    body.style.overflow = 'hidden';
    recalculate();
  }

  function closeCart() {
    drawer.setAttribute('aria-hidden', 'true');
    drawer.classList.remove('is-open');
    body.style.overflow = '';
  }

  toggleButtons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      if (drawer.classList.contains('is-open')) {
        closeCart();
      } else {
        openCart();
      }
    });
  });

  // Close on Escape
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
      closeCart();
    }
  });

  /* -----------------------------------------------------------
     RECALCULATE — Totals, shipping bar, summary
     ----------------------------------------------------------- */

  function recalculate() {
    var items = itemsContainer ? itemsContainer.querySelectorAll('.cart-drawer__item') : [];
    var subtotal = 0;
    var itemCount = 0;

    items.forEach(function (item) {
      var price = parseFloat(item.getAttribute('data-item-price')) || 0;
      var qty   = parseInt(item.getAttribute('data-item-qty'), 10) || 0;
      var subToggle = item.querySelector('[data-cart-subscribe-toggle]');
      var isSubscribed = subToggle && subToggle.checked;

      var lineTotal = price * qty;
      if (isSubscribed) {
        lineTotal = lineTotal * (1 - SUBSCRIBE_DISCOUNT / 100);
      }

      // Update line total display
      var lineTotalEl = item.querySelector('[data-cart-item-line-total]');
      if (lineTotalEl) lineTotalEl.textContent = fmt(lineTotal);

      subtotal += lineTotal;
      itemCount += qty;
    });

    // Empty state
    if (itemCount === 0) {
      if (emptyState) emptyState.style.display = '';
      if (itemsContainer) itemsContainer.style.display = 'none';
      if (crossSell) crossSell.style.display = 'none';
      if (drawerFooter) drawerFooter.style.display = 'none';
    } else {
      if (emptyState) emptyState.style.display = 'none';
      if (itemsContainer) itemsContainer.style.display = '';
      if (crossSell) crossSell.style.display = '';
      if (drawerFooter) drawerFooter.style.display = '';
    }

    // Shipping progress bar
    var remaining = Math.max(0, FREE_SHIPPING_THRESHOLD - subtotal);
    var pct = Math.min((subtotal / FREE_SHIPPING_THRESHOLD) * 100, 100);
    var hasFreeShipping = subtotal >= FREE_SHIPPING_THRESHOLD;

    if (shippingFill) shippingFill.style.width = pct + '%';

    if (hasFreeShipping) {
      if (shippingBar) shippingBar.classList.add('is-complete');
      if (shippingMsg) shippingMsg.innerHTML = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:inline;vertical-align:-2px;color:var(--color-success-green)"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> <strong>Free shipping unlocked!</strong>';
    } else {
      if (shippingBar) shippingBar.classList.remove('is-complete');
      if (shippingMsg) {
        shippingMsg.innerHTML = 'Spend <strong id="cart-shipping-remaining">' + fmt(remaining) + '</strong> more for free shipping!';
      }
    }

    // Summary
    var shipping = hasFreeShipping ? 0 : FLAT_SHIPPING;

    if (subtotalEl) subtotalEl.textContent = fmt(subtotal);

    if (shippingEl) {
      if (hasFreeShipping) {
        shippingEl.innerHTML = '<span class="cart-drawer__shipping-free"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> FREE</span>';
      } else if (itemCount === 0) {
        shippingEl.textContent = '$0.00';
      } else {
        shippingEl.textContent = fmt(FLAT_SHIPPING);
      }
    }

    var total = subtotal + (itemCount > 0 ? shipping : 0);
    if (totalEl) totalEl.textContent = fmt(total);
    if (checkoutTotal) checkoutTotal.textContent = fmt(total);

    if (checkoutBtn) {
      if (itemCount === 0) {
        checkoutBtn.classList.add('is-disabled');
      } else {
        checkoutBtn.classList.remove('is-disabled');
      }
    }

    // Update header cart count badge
    var cartCountBadge = document.querySelector('[data-cart-count]');
    if (cartCountBadge) {
      cartCountBadge.textContent = itemCount;
      if (itemCount === 0) {
        cartCountBadge.classList.add('is-hidden');
      } else {
        cartCountBadge.classList.remove('is-hidden');
      }
    }
  }

  /* -----------------------------------------------------------
     QTY +/- HANDLERS (event delegation)
     ----------------------------------------------------------- */

  if (itemsContainer) {
    itemsContainer.addEventListener('click', function (e) {
      var item = e.target.closest('.cart-drawer__item');
      if (!item) return;

      // Plus button
      if (e.target.closest('[data-cart-qty-plus]')) {
        var currentQty = parseInt(item.getAttribute('data-item-qty'), 10) || 0;
        var newQty = currentQty + 1;
        item.setAttribute('data-item-qty', newQty);
        var valEl = item.querySelector('[data-cart-qty-value]');
        if (valEl) valEl.textContent = newQty;
        var minusBtn = item.querySelector('[data-cart-qty-minus]');
        if (minusBtn) minusBtn.disabled = false;
        recalculate();
        return;
      }

      // Minus button
      if (e.target.closest('[data-cart-qty-minus]')) {
        var curQty = parseInt(item.getAttribute('data-item-qty'), 10) || 0;
        var nextQty = Math.max(1, curQty - 1);
        item.setAttribute('data-item-qty', nextQty);
        var vEl = item.querySelector('[data-cart-qty-value]');
        if (vEl) vEl.textContent = nextQty;
        var mBtn = item.querySelector('[data-cart-qty-minus]');
        if (mBtn) mBtn.disabled = nextQty <= 1;
        recalculate();
        return;
      }

      // Remove button
      if (e.target.closest('[data-remove-item]')) {
        item.style.transition = 'opacity 200ms ease, max-height 200ms ease';
        item.style.opacity = '0';
        item.style.maxHeight = item.offsetHeight + 'px';
        item.style.overflow = 'hidden';
        setTimeout(function () {
          item.style.maxHeight = '0';
          item.style.padding = '0';
          item.style.margin = '0';
        }, 50);
        setTimeout(function () {
          item.remove();
          recalculate();
        }, 300);
        return;
      }
    });

    // Subscription toggle change (event delegation)
    itemsContainer.addEventListener('change', function (e) {
      if (e.target.matches('[data-cart-subscribe-toggle]')) {
        recalculate();
      }
    });
  }

  /* -----------------------------------------------------------
     CROSS-SELL "ADD" BUTTON
     ----------------------------------------------------------- */

  var crossSellContainer = document.getElementById('cart-cross-sell');
  if (crossSellContainer) {
    crossSellContainer.addEventListener('click', function (e) {
      var addBtn = e.target.closest('[data-add-cross-sell]');
      if (!addBtn) return;

      var card = addBtn.closest('.cart-drawer__cross-sell-card');
      if (!card) return;

      var csId    = card.getAttribute('data-cross-sell-id');
      var thumb   = card.querySelector('.cart-drawer__cross-sell-thumb');
      var nameEl  = card.querySelector('.cart-drawer__cross-sell-name');
      var priceEl = card.querySelector('.cart-drawer__cross-sell-price');

      var color = thumb ? thumb.style.backgroundColor : '#ccc';
      var badge = thumb ? (thumb.querySelector('span') ? thumb.querySelector('span').textContent : '') : '';
      var name  = nameEl ? nameEl.textContent : 'Product';
      var price = priceEl ? parseFloat(priceEl.textContent.replace('$', '')) : 0;

      // Check if item already in cart
      var existingItem = itemsContainer.querySelector('[data-cart-item-id="' + csId + '"]');
      if (existingItem) {
        var existQty = parseInt(existingItem.getAttribute('data-item-qty'), 10) || 0;
        var updQty = existQty + 1;
        existingItem.setAttribute('data-item-qty', updQty);
        var qtyDisplay = existingItem.querySelector('[data-cart-qty-value]');
        if (qtyDisplay) qtyDisplay.textContent = updQty;
        var mBtn = existingItem.querySelector('[data-cart-qty-minus]');
        if (mBtn) mBtn.disabled = false;
      } else {
        // Create new cart item
        var newItem = document.createElement('div');
        newItem.className = 'cart-drawer__item';
        newItem.setAttribute('data-cart-item-id', csId);
        newItem.setAttribute('data-item-price', price);
        newItem.setAttribute('data-item-qty', 1);

        newItem.innerHTML =
          '<div class="cart-drawer__item-thumb" style="background-color:' + color + ';">' +
            '<span>' + badge + '</span>' +
          '</div>' +
          '<div class="cart-drawer__item-details">' +
            '<div class="cart-drawer__item-top">' +
              '<h4 class="cart-drawer__item-name">' + name + '</h4>' +
              '<button class="cart-drawer__item-remove" data-remove-item="' + csId + '" aria-label="Remove ' + name + '">' +
                '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>' +
              '</button>' +
            '</div>' +
            '<div class="cart-drawer__item-row">' +
              '<div class="cart-drawer__item-qty">' +
                '<button class="cart-drawer__qty-btn" data-cart-qty-minus aria-label="Decrease quantity" type="button" disabled>' +
                  '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/></svg>' +
                '</button>' +
                '<span class="cart-drawer__qty-value" data-cart-qty-value>1</span>' +
                '<button class="cart-drawer__qty-btn" data-cart-qty-plus aria-label="Increase quantity" type="button">' +
                  '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>' +
                '</button>' +
              '</div>' +
              '<span class="cart-drawer__item-price" data-cart-item-line-total>' + fmt(price) + '</span>' +
            '</div>' +
            '<div class="cart-drawer__item-subscribe">' +
              '<label class="cart-drawer__sub-toggle">' +
                '<input type="checkbox" class="toggle__input" data-cart-subscribe-toggle>' +
                '<span class="toggle__slider"></span>' +
              '</label>' +
              '<span class="cart-drawer__sub-label">Switch to Subscription &amp; Save 20%</span>' +
            '</div>' +
          '</div>';

        itemsContainer.appendChild(newItem);
      }

      // Button feedback
      addBtn.textContent = 'Added!';
      addBtn.disabled = true;
      setTimeout(function () {
        addBtn.textContent = 'Add';
        addBtn.disabled = false;
      }, 1200);

      recalculate();
    });
  }

  /* -----------------------------------------------------------
     EMAIL REGISTRATION FORM
     ----------------------------------------------------------- */

  var registerForm = document.getElementById('cart-register-form');
  if (registerForm) {
    registerForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var emailInput = registerForm.querySelector('.cart-drawer__register-input');
      if (!emailInput || !emailInput.value) return;

      var submitBtn = registerForm.querySelector('.cart-drawer__register-btn');
      if (submitBtn) {
        submitBtn.textContent = 'Sent!';
        submitBtn.disabled = true;
      }

      // In production, this would POST to an email service / AJAX endpoint
      setTimeout(function () {
        var banner = document.getElementById('cart-register-banner');
        if (banner) {
          banner.innerHTML =
            '<div style="text-align:center;padding:var(--space-2) 0;">' +
              '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--color-success-green)" stroke-width="2" style="display:inline;vertical-align:-4px"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> ' +
              '<strong style="color:var(--color-success-green);font-size:var(--text-sm)">25% OFF coupon sent to your email!</strong>' +
            '</div>';
        }
      }, 800);
    });
  }

  /* -----------------------------------------------------------
     AJAX ADD TO CART (from other pages)
     ----------------------------------------------------------- */

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

    fetch(typeof drGummy !== 'undefined' ? drGummy.ajaxUrl : '/wp-admin/admin-ajax.php', {
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

  /* -----------------------------------------------------------
     INITIAL CALC
     ----------------------------------------------------------- */
  recalculate();

  // Expose openCart for external use (e.g. after WC add-to-cart)
  window.drGummyOpenCart = openCart;

})();
