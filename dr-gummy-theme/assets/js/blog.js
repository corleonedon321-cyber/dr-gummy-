/**
 * Blog Page — Category filter tabs + sidebar filter links
 * @package DR_Gummy
 */
(function () {
  'use strict';

  var tabs  = document.querySelectorAll('[data-blog-filter]');
  var cards = document.querySelectorAll('[data-blog-category]');
  var sidebarLinks = document.querySelectorAll('[data-sidebar-filter]');

  function filterPosts(category) {
    tabs.forEach(function (t) {
      t.classList.toggle('is-active', t.getAttribute('data-blog-filter') === category);
    });
    cards.forEach(function (card) {
      if (category === 'All' || card.getAttribute('data-blog-category') === category) {
        card.classList.remove('is-hidden');
      } else {
        card.classList.add('is-hidden');
      }
    });
  }

  tabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      filterPosts(tab.getAttribute('data-blog-filter'));
    });
  });

  sidebarLinks.forEach(function (link) {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      filterPosts(link.getAttribute('data-sidebar-filter'));
    });
  });
})();
