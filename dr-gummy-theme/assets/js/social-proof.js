/**
 * Social Proof Popup — rotates fake purchase notifications
 * @package DR_Gummy
 */
(function () {
  'use strict';

  var el       = document.getElementById('social-proof');
  var closeBn  = document.getElementById('social-proof-close');
  if (!el) return;

  var nameEl    = document.getElementById('social-proof-name');
  var cityEl    = document.getElementById('social-proof-city');
  var productEl = document.getElementById('social-proof-product');
  var timeEl    = document.getElementById('social-proof-time');
  var imgEl     = document.getElementById('social-proof-img');

  var entries = [
    { name: 'Jessica M.',  city: 'Austin, TX',       product: 'Dr. Gummy Sleep',  color: '#2E5735', time: '2 minutes ago' },
    { name: 'David R.',    city: 'Los Angeles, CA',   product: 'Dr. Gummy Focus',  color: '#5BA4B5', time: '5 minutes ago' },
    { name: 'Sarah K.',    city: 'New York, NY',      product: 'Dr. Gummy Chill',  color: '#4A7C59', time: '8 minutes ago' },
    { name: 'Tom W.',      city: 'Chicago, IL',       product: 'Dr. Gummy Glow',   color: '#D4A853', time: '12 minutes ago' },
    { name: 'Angela P.',   city: 'Miami, FL',         product: 'Dr. Gummy Sleep',  color: '#2E5735', time: '15 minutes ago' },
    { name: 'Kevin L.',    city: 'Seattle, WA',       product: 'Dr. Gummy Focus',  color: '#5BA4B5', time: '18 minutes ago' },
    { name: 'Rachel S.',   city: 'Denver, CO',        product: 'Dr. Gummy Glow',   color: '#D4A853', time: '22 minutes ago' },
    { name: 'Maria L.',    city: 'Portland, OR',      product: 'Dr. Gummy Chill',  color: '#4A7C59', time: '25 minutes ago' },
    { name: 'Robert J.',   city: 'San Francisco, CA', product: 'Dr. Gummy Sleep',  color: '#2E5735', time: '30 minutes ago' },
    { name: 'Nina C.',     city: 'Boston, MA',        product: 'Dr. Gummy Focus',  color: '#5BA4B5', time: '35 minutes ago' },
  ];

  var index     = 0;
  var dismissed = false;
  var timer     = null;
  var hideTimer = null;

  function show() {
    if (dismissed) return;
    var entry = entries[index % entries.length];
    index++;

    nameEl.textContent    = entry.name;
    cityEl.textContent    = entry.city;
    productEl.textContent = entry.product;
    timeEl.textContent    = entry.time;
    imgEl.style.backgroundColor = entry.color;

    el.removeAttribute('hidden');
    // Force reflow for animation
    void el.offsetWidth;
    el.classList.add('is-visible');

    hideTimer = setTimeout(function () {
      el.classList.remove('is-visible');
      setTimeout(function () { el.setAttribute('hidden', ''); }, 300);
    }, 5000);
  }

  function scheduleNext() {
    var delay = 30000 + Math.random() * 15000; // 30-45 seconds
    timer = setTimeout(function () {
      show();
      scheduleNext();
    }, delay);
  }

  closeBn.addEventListener('click', function () {
    dismissed = true;
    el.classList.remove('is-visible');
    setTimeout(function () { el.setAttribute('hidden', ''); }, 300);
    clearTimeout(timer);
    clearTimeout(hideTimer);
  });

  // First popup after 8 seconds
  setTimeout(function () {
    show();
    scheduleNext();
  }, 8000);
})();
