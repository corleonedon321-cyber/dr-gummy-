/**
 * Bundle Builder — Full interactive logic
 *
 * - Quantity +/- per product card
 * - Auto tier detection based on total bottle count
 * - Shipping progress bar (free at $60)
 * - Sidebar summary with line items, discount stacking, total
 * - Subscribe & Save toggle (extra 10%, stacks with tier discount)
 *
 * @package DR_Gummy
 */

(function () {
  'use strict';

  /* -----------------------------------------------------------
     CONSTANTS & STATE
     ----------------------------------------------------------- */

  var TIERS = [
    { bottles: 1, discount: 0 },
    { bottles: 2, discount: 10 },
    { bottles: 3, discount: 20 },
    { bottles: 4, discount: 35 }
  ];

  var FREE_SHIPPING_THRESHOLD = 60;
  var SUBSCRIBE_DISCOUNT = 10; // percent

  /* -----------------------------------------------------------
     DOM REFERENCES
     ----------------------------------------------------------- */

  var productCards   = document.querySelectorAll('.bundle-product');
  var tierButtons    = document.querySelectorAll('.bundle-tier');
  var summaryItems   = document.getElementById('bundle-summary-items');
  var summaryEmpty   = document.getElementById('bundle-summary-empty');
  var subtotalEl     = document.getElementById('summary-subtotal');
  var tierRowEl      = document.getElementById('summary-tier-row');
  var tierPctEl      = document.getElementById('summary-tier-pct');
  var tierAmountEl   = document.getElementById('summary-tier-amount');
  var subRowEl       = document.getElementById('summary-sub-row');
  var subAmountEl    = document.getElementById('summary-sub-amount');
  var shippingRowEl  = document.getElementById('summary-shipping-row');
  var shippingValEl  = document.getElementById('summary-shipping');
  var totalEl        = document.getElementById('summary-total');
  var savingsEl      = document.getElementById('summary-savings');
  var savingsAmtEl   = document.getElementById('summary-savings-amount');
  var shippingBarAmt = document.getElementById('shipping-bar-amount');
  var shippingBarFill= document.getElementById('shipping-bar-fill');
  var shippingBar    = document.getElementById('bundle-shipping-bar');
  var subscribeToggle= document.getElementById('subscribe-toggle');
  var addToCartBtn   = document.getElementById('bundle-add-to-cart');

  /* -----------------------------------------------------------
     HELPERS
     ----------------------------------------------------------- */

  function fmt(n) {
    return '$' + n.toFixed(2);
  }

  function getTotalBottles() {
    var total = 0;
    productCards.forEach(function (card) {
      total += parseInt(card.getAttribute('data-qty'), 10) || 0;
    });
    return total;
  }

  function getActiveTier(bottles) {
    if (bottles >= 4) return TIERS[3];
    if (bottles >= 3) return TIERS[2];
    if (bottles >= 2) return TIERS[1];
    return TIERS[0];
  }

  /* -----------------------------------------------------------
     RECALCULATE EVERYTHING
     ----------------------------------------------------------- */

  function recalculate() {
    var totalBottles = getTotalBottles();
    var tier = getActiveTier(totalBottles);
    var isSubscribe = subscribeToggle && subscribeToggle.checked;

    /* --- Update tier highlight --- */
    tierButtons.forEach(function (btn) {
      var tierBottles = parseInt(btn.getAttribute('data-tier-bottles'), 10);
      if (tierBottles === tier.bottles) {
        btn.classList.add('is-active');
      } else {
        btn.classList.remove('is-active');
      }
    });

    /* --- Update product card selected state --- */
    productCards.forEach(function (card) {
      var qty = parseInt(card.getAttribute('data-qty'), 10) || 0;
      if (qty > 0) {
        card.classList.add('is-selected');
      } else {
        card.classList.remove('is-selected');
      }
    });

    /* --- Build summary items --- */
    var subtotal = 0;
    var itemsHtml = '';

    productCards.forEach(function (card) {
      var qty = parseInt(card.getAttribute('data-qty'), 10) || 0;
      if (qty === 0) return;

      var name  = card.getAttribute('data-product-name');
      var price = parseFloat(card.getAttribute('data-product-price'));
      var id    = card.getAttribute('data-product-id');
      var lineTotal = price * qty;
      subtotal += lineTotal;

      // Determine thumb color from the image div
      var imgDiv = card.querySelector('.bundle-product__img');
      var color = imgDiv ? imgDiv.style.backgroundColor : '#ccc';
      var badge = card.querySelector('.bundle-product__img-label');
      var badgeText = badge ? badge.textContent : '';

      itemsHtml += '<div class="bundle-summary__item">' +
        '<div class="bundle-summary__item-thumb" style="background-color:' + color + ';">' + badgeText + '</div>' +
        '<div class="bundle-summary__item-info">' +
          '<div class="bundle-summary__item-name">' + name + '</div>' +
          '<div class="bundle-summary__item-qty">Qty: ' + qty + '</div>' +
        '</div>' +
        '<div class="bundle-summary__item-price">' + fmt(lineTotal) + '</div>' +
      '</div>';
    });

    // Render items or empty state
    if (totalBottles === 0) {
      summaryItems.innerHTML = '';
      if (summaryEmpty) {
        summaryEmpty.style.display = '';
        summaryItems.appendChild(summaryEmpty);
      }
    } else {
      if (summaryEmpty) summaryEmpty.style.display = 'none';
      summaryItems.innerHTML = itemsHtml;
    }

    /* --- Pricing breakdown --- */
    // Subtotal
    subtotalEl.textContent = fmt(subtotal);

    // Tier discount
    var tierDiscountAmount = subtotal * (tier.discount / 100);
    if (tier.discount > 0 && totalBottles > 0) {
      tierRowEl.style.display = '';
      tierPctEl.textContent = tier.discount;
      tierAmountEl.textContent = '-' + fmt(tierDiscountAmount);
    } else {
      tierRowEl.style.display = 'none';
      tierDiscountAmount = 0;
    }

    var afterTier = subtotal - tierDiscountAmount;

    // Subscribe discount (stacks: applied after tier discount)
    var subDiscountAmount = 0;
    if (isSubscribe && totalBottles > 0) {
      subDiscountAmount = afterTier * (SUBSCRIBE_DISCOUNT / 100);
      subRowEl.style.display = '';
      subAmountEl.textContent = '-' + fmt(subDiscountAmount);
    } else {
      subRowEl.style.display = 'none';
    }

    var afterSub = afterTier - subDiscountAmount;

    // Shipping
    var hasFreeShipping = (tier.bottles >= 2 && totalBottles >= 2) || afterSub >= FREE_SHIPPING_THRESHOLD;
    if (totalBottles === 0) {
      shippingValEl.innerHTML = 'Calculated at checkout';
    } else if (hasFreeShipping) {
      shippingValEl.innerHTML = '<span class="bundle-summary__shipping-free">' +
        '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">' +
        '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>' +
        'FREE</span>';
    } else {
      shippingValEl.innerHTML = 'Calculated at checkout';
    }

    // Total
    totalEl.textContent = fmt(afterSub);

    // Savings
    var totalSaved = tierDiscountAmount + subDiscountAmount;
    if (totalSaved > 0) {
      savingsEl.style.display = '';
      savingsAmtEl.textContent = fmt(totalSaved);
    } else {
      savingsEl.style.display = 'none';
    }

    /* --- Shipping progress bar --- */
    var pct = Math.min((afterSub / FREE_SHIPPING_THRESHOLD) * 100, 100);
    shippingBarFill.style.width = pct + '%';
    shippingBarAmt.textContent = fmt(afterSub) + ' / ' + fmt(FREE_SHIPPING_THRESHOLD);
    if (afterSub >= FREE_SHIPPING_THRESHOLD || hasFreeShipping) {
      shippingBar.classList.add('is-complete');
      shippingBarFill.style.width = '100%';
      shippingBarAmt.textContent = 'Free Shipping Unlocked!';
    } else {
      shippingBar.classList.remove('is-complete');
    }

    /* --- CTA state --- */
    if (addToCartBtn) {
      addToCartBtn.disabled = totalBottles === 0;
    }
  }

  /* -----------------------------------------------------------
     QTY +/- HANDLERS
     ----------------------------------------------------------- */

  productCards.forEach(function (card) {
    var minusBtn = card.querySelector('[data-qty-minus]');
    var plusBtn  = card.querySelector('[data-qty-plus]');
    var display  = card.querySelector('[data-qty-value]');

    function updateQty(delta) {
      var current = parseInt(card.getAttribute('data-qty'), 10) || 0;
      var next = Math.max(0, current + delta);
      card.setAttribute('data-qty', next);
      display.textContent = next;
      minusBtn.disabled = next === 0;
      recalculate();
    }

    if (plusBtn) {
      plusBtn.addEventListener('click', function () {
        updateQty(1);
      });
    }

    if (minusBtn) {
      minusBtn.addEventListener('click', function () {
        updateQty(-1);
      });
    }
  });

  /* -----------------------------------------------------------
     TIER BUTTON CLICK (manual override — sets qty if needed)
     ----------------------------------------------------------- */

  tierButtons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var targetBottles = parseInt(btn.getAttribute('data-tier-bottles'), 10);
      var currentBottles = getTotalBottles();

      // If user clicks a higher tier and has fewer bottles,
      // distribute evenly across products that already have qty > 0.
      // If nothing selected, select first product.
      if (currentBottles < targetBottles) {
        var selectedCards = [];
        productCards.forEach(function (c) {
          if (parseInt(c.getAttribute('data-qty'), 10) > 0) {
            selectedCards.push(c);
          }
        });

        // If nothing selected yet, start with the first product
        if (selectedCards.length === 0) {
          selectedCards.push(productCards[0]);
        }

        // Reset all to 0 first
        productCards.forEach(function (c) {
          c.setAttribute('data-qty', 0);
          var d = c.querySelector('[data-qty-value]');
          if (d) d.textContent = '0';
          var m = c.querySelector('[data-qty-minus]');
          if (m) m.disabled = true;
        });

        // Distribute target bottles across selected products
        var perCard = Math.floor(targetBottles / selectedCards.length);
        var remainder = targetBottles % selectedCards.length;

        selectedCards.forEach(function (c, idx) {
          var qty = perCard + (idx < remainder ? 1 : 0);
          c.setAttribute('data-qty', qty);
          var d = c.querySelector('[data-qty-value]');
          if (d) d.textContent = qty;
          var m = c.querySelector('[data-qty-minus]');
          if (m) m.disabled = qty === 0;
        });
      }

      recalculate();
    });
  });

  /* -----------------------------------------------------------
     SUBSCRIBE & SAVE TOGGLE
     ----------------------------------------------------------- */

  if (subscribeToggle) {
    subscribeToggle.addEventListener('change', function () {
      recalculate();
    });
  }

  /* -----------------------------------------------------------
     INITIAL CALC
     ----------------------------------------------------------- */
  recalculate();

})();
