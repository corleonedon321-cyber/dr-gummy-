/**
 * FAQs — Accordion toggle + category filter
 * @package DR_Gummy
 */
(function () {
  'use strict';

  var tabs  = document.querySelectorAll('[data-faq-filter]');
  var items = document.querySelectorAll('.faqs-item');

  /* Category filter */
  tabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      var cat = tab.getAttribute('data-faq-filter');
      tabs.forEach(function (t) { t.classList.remove('is-active'); });
      tab.classList.add('is-active');

      items.forEach(function (item) {
        if (cat === 'All' || item.getAttribute('data-faq-category') === cat) {
          item.classList.remove('is-hidden');
        } else {
          item.classList.add('is-hidden');
        }
      });
    });
  });

  /* Accordion toggle */
  document.addEventListener('click', function (e) {
    var btn = e.target.closest('.faqs-item__question');
    if (!btn) return;

    var item = btn.closest('.faqs-item');
    var answer = item.querySelector('.faqs-item__answer');
    var isOpen = item.classList.contains('is-open');

    if (isOpen) {
      item.classList.remove('is-open');
      answer.setAttribute('hidden', '');
      btn.setAttribute('aria-expanded', 'false');
    } else {
      item.classList.add('is-open');
      answer.removeAttribute('hidden');
      btn.setAttribute('aria-expanded', 'true');
    }
  });
})();
