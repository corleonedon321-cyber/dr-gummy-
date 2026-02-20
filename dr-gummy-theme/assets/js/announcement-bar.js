/**
 * Announcement Bar — Rotating messages (5s interval)
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
    '60-DAY MONEY-BACK GUARANTEE',
  ];

  var current = 0;
  var messageEl = bar.querySelector('[data-announcement-current]');
  if (!messageEl) return;

  setInterval(function () {
    messageEl.style.opacity = '0';
    setTimeout(function () {
      current = (current + 1) % messages.length;
      messageEl.textContent = messages[current];
      messageEl.style.opacity = '1';
    }, 300);
  }, 5000);

  // Smooth fade transition
  messageEl.style.transition = 'opacity 300ms ease';
})();
