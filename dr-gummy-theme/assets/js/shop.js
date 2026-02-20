/**
 * Shop Page — Radio toggle highlighting, sidebar filter behaviour
 *
 * @package DR_Gummy
 */

(function () {
  'use strict';

  /* -----------------------------------------------------------
     SUBSCRIBE / ONE-TIME RADIO TOGGLE
     Highlight the selected label, remove from sibling.
     ----------------------------------------------------------- */
  document.addEventListener('change', function (e) {
    if (!e.target.classList.contains('shop-radio__input')) return;

    var card = e.target.closest('.shop-card');
    if (!card) return;

    // Remove is-selected from all radios in this card
    var radios = card.querySelectorAll('.shop-radio');
    radios.forEach(function (r) {
      r.classList.remove('is-selected');
    });

    // Add to the parent label of the checked input
    var parentLabel = e.target.closest('.shop-radio');
    if (parentLabel) {
      parentLabel.classList.add('is-selected');
    }
  });

  /* -----------------------------------------------------------
     SIDEBAR CHECKBOX FILTERS
     Show/hide cards based on data-product-slug.
     ----------------------------------------------------------- */
  var filterCheckboxes = document.querySelectorAll('[data-filter]');
  var allCards = document.querySelectorAll('.shop-card');

  // Map filter values → product slugs
  var filterMap = {
    'beauty':     ['glow'],
    'focus':      ['focus'],
    'energy':     ['energy', 'chill'],
    'anti-aging': ['anti-aging', 'sleep']
  };

  function applyFilters() {
    var active = [];
    filterCheckboxes.forEach(function (cb) {
      if (cb.checked) {
        active.push(cb.value);
      }
    });

    // No filters checked → show all
    if (active.length === 0) {
      allCards.forEach(function (card) {
        card.style.display = '';
      });
      return;
    }

    // Collect allowed slugs
    var allowed = [];
    active.forEach(function (val) {
      if (filterMap[val]) {
        filterMap[val].forEach(function (slug) {
          if (allowed.indexOf(slug) === -1) {
            allowed.push(slug);
          }
        });
      }
    });

    allCards.forEach(function (card) {
      var slug = card.getAttribute('data-product-slug');
      if (allowed.indexOf(slug) !== -1) {
        card.style.display = '';
      } else {
        card.style.display = 'none';
      }
    });
  }

  filterCheckboxes.forEach(function (cb) {
    cb.addEventListener('change', applyFilters);
  });
})();
