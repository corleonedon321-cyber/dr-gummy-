/**
 * Popups — Email capture, search overlay, generic modals
 *
 * @package DR_Gummy
 */

(function () {
  'use strict';

  // Generic popup open/close
  document.addEventListener('click', function (e) {
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

  // Close on Escape
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      var openPopup = document.querySelector('.popup.is-open');
      if (openPopup) {
        openPopup.setAttribute('aria-hidden', 'true');
        openPopup.classList.remove('is-open');
        document.body.style.overflow = '';
      }
    }
  });

  // Search overlay toggle
  var searchToggle = document.querySelector('[data-search-toggle]');
  var searchOverlay = document.getElementById('search-overlay');

  if (searchToggle && searchOverlay) {
    searchToggle.addEventListener('click', function () {
      var isOpen = searchOverlay.classList.contains('is-open');
      if (isOpen) {
        searchOverlay.classList.remove('is-open');
        searchOverlay.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
      } else {
        searchOverlay.classList.add('is-open');
        searchOverlay.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        var input = searchOverlay.querySelector('input');
        if (input) input.focus();
      }
    });
  }
})();
