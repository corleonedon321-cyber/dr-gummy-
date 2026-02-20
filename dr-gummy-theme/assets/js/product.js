/**
 * Single Product Page (PDP) — Interactions
 *
 * - Thumbnail gallery swap
 * - Pricing tab toggle (Subscribe / One-time)
 * - Frequency selector show/hide
 * - Smooth scroll for anchor links
 *
 * @package DR_Gummy
 */

(function () {
  'use strict';

  /* -----------------------------------------------------------
     THUMBNAIL GALLERY — click thumb → highlight + future img swap
     ----------------------------------------------------------- */
  var thumbs = document.querySelectorAll('.pdp-gallery__thumb');

  thumbs.forEach(function (thumb) {
    thumb.addEventListener('click', function () {
      // Remove active from all
      thumbs.forEach(function (t) {
        t.classList.remove('is-active');
        var inner = t.querySelector('.pdp-gallery__thumb-inner');
        if (inner) inner.style.opacity = '0.6';
      });
      // Activate clicked
      thumb.classList.add('is-active');
      var activeInner = thumb.querySelector('.pdp-gallery__thumb-inner');
      if (activeInner) activeInner.style.opacity = '1';
    });
  });

  /* -----------------------------------------------------------
     PRICING TAB TOGGLE — Subscribe vs One-time
     ----------------------------------------------------------- */
  var pricingTabs = document.querySelectorAll('[data-pricing-tab]');
  var frequencyEl = document.getElementById('pdp-frequency');

  pricingTabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      // Remove active from all tabs
      pricingTabs.forEach(function (t) {
        t.classList.remove('is-active');
      });
      // Activate clicked tab
      tab.classList.add('is-active');

      var mode = tab.getAttribute('data-pricing-tab');

      // Show/hide frequency selector
      if (frequencyEl) {
        if (mode === 'subscribe') {
          frequencyEl.classList.remove('is-hidden');
        } else {
          frequencyEl.classList.add('is-hidden');
        }
      }
    });
  });

  /* -----------------------------------------------------------
     SMOOTH SCROLL — sidebar card links (#anchors)
     ----------------------------------------------------------- */
  document.addEventListener('click', function (e) {
    var link = e.target.closest('a[href^="#"]');
    if (!link) return;

    var targetId = link.getAttribute('href');
    if (!targetId || targetId === '#') return;

    var target = document.querySelector(targetId);
    if (!target) return;

    e.preventDefault();
    var navHeight = 80; // approximate nav + announcement bar
    var top = target.getBoundingClientRect().top + window.pageYOffset - navHeight;
    window.scrollTo({ top: top, behavior: 'smooth' });
  });
})();
