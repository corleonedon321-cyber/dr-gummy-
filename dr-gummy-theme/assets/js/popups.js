/**
 * Popups — Search overlay, generic modals, email capture
 *
 * @package DR_Gummy
 */

(function () {
  'use strict';

  /* -----------------------------------------------------------
     Search overlay
     ----------------------------------------------------------- */
  var searchOverlay = document.getElementById('search-overlay');
  var searchToggles = document.querySelectorAll('[data-search-toggle]');

  function openSearch() {
    if (!searchOverlay) return;
    searchOverlay.classList.add('is-open');
    searchOverlay.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    var input = searchOverlay.querySelector('input');
    if (input) {
      setTimeout(function () { input.focus(); }, 150);
    }
  }

  function closeSearch() {
    if (!searchOverlay) return;
    searchOverlay.classList.remove('is-open');
    searchOverlay.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  searchToggles.forEach(function (btn) {
    btn.addEventListener('click', function () {
      if (searchOverlay && searchOverlay.classList.contains('is-open')) {
        closeSearch();
      } else {
        openSearch();
      }
    });
  });

  /* -----------------------------------------------------------
     Generic popup open / close (data-popup-open, data-popup-close)
     ----------------------------------------------------------- */
  document.addEventListener('click', function (e) {
    // Open trigger
    var openTrigger = e.target.closest('[data-popup-open]');
    if (openTrigger) {
      var targetId = openTrigger.dataset.popupOpen;
      var popup = document.getElementById(targetId);
      if (popup) {
        popup.setAttribute('aria-hidden', 'false');
        popup.classList.add('is-open');
        document.body.style.overflow = 'hidden';
      }
    }

    // Close trigger
    var closeTrigger = e.target.closest('[data-popup-close]');
    if (closeTrigger) {
      var popup = closeTrigger.closest('.popup');
      if (popup) {
        popup.setAttribute('aria-hidden', 'true');
        popup.classList.remove('is-open');
        document.body.style.overflow = '';
      }
    }

    // Close on overlay click
    if (e.target.classList.contains('popup__overlay')) {
      var popup = e.target.closest('.popup');
      if (popup) {
        popup.setAttribute('aria-hidden', 'true');
        popup.classList.remove('is-open');
        document.body.style.overflow = '';
      }
    }
  });

  /* -----------------------------------------------------------
     Global Escape key handler for overlays
     ----------------------------------------------------------- */
  document.addEventListener('keydown', function (e) {
    if (e.key !== 'Escape') return;

    // Close search overlay
    if (searchOverlay && searchOverlay.classList.contains('is-open')) {
      closeSearch();
      return;
    }

    // Close generic popup
    var openPopup = document.querySelector('.popup.is-open');
    if (openPopup) {
      openPopup.setAttribute('aria-hidden', 'true');
      openPopup.classList.remove('is-open');
      document.body.style.overflow = '';
    }
  });
})();
