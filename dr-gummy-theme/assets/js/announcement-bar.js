/**
 * Announcement Bar — Rotating messages with fade transition (5s interval)
 *
 * @package DR_Gummy
 */

(function () {
  'use strict';

  var bar = document.querySelector('[data-announcement-bar]');
  if (!bar) return;

  var messages = [
    'FREE SHIPPING ON ORDERS OVER $50 | GET 25% OFF \u2014 REGISTER YOUR EMAIL!',
    'BUY 2 GET 1 FREE',
    '60-DAY MONEY-BACK GUARANTEE'
  ];

  var current = 0;
  var messageEl = bar.querySelector('[data-announcement-current]');
  if (!messageEl) return;

  // Set initial fade transition on the element
  messageEl.style.transition = 'opacity 300ms ease';

  // Auto-cycle every 5 seconds
  setInterval(function () {
    // Fade out
    messageEl.style.opacity = '0';

    // After fade-out completes, swap text and fade in
    setTimeout(function () {
      current = (current + 1) % messages.length;
      messageEl.textContent = messages[current];
      messageEl.style.opacity = '1';
    }, 300);
  }, 5000);
})();
