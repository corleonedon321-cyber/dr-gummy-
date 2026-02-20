/**
 * Home Page — Email popup (timed), Reviews carousel
 *
 * @package DR_Gummy
 */

(function () {
  'use strict';

  /* -----------------------------------------------------------
     EMAIL POPUP — show after 4s unless dismissed
     ----------------------------------------------------------- */
  var popup = document.getElementById('email-popup');

  if (popup && !sessionStorage.getItem('drg_popup_dismissed')) {
    setTimeout(function () {
      popup.classList.add('is-open');
      popup.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    }, 4000);
  }

  if (popup) {
    // Close on X button
    var closeBtn = popup.querySelector('[data-popup-close]');
    if (closeBtn) {
      closeBtn.addEventListener('click', function () {
        closePopup();
      });
    }

    // Close on overlay click
    var overlay = popup.querySelector('.email-popup__overlay');
    if (overlay) {
      overlay.addEventListener('click', function () {
        closePopup();
      });
    }

    // Close on Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && popup.classList.contains('is-open')) {
        closePopup();
      }
    });

    // Handle form submit
    var form = popup.querySelector('.email-popup__form');
    if (form) {
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        var email = form.querySelector('input[type="email"]');
        if (email && email.value) {
          // In production, submit to API here
          var btn = form.querySelector('button[type="submit"]');
          if (btn) {
            btn.textContent = 'THANK YOU!';
            btn.disabled = true;
          }
          sessionStorage.setItem('drg_popup_dismissed', '1');
          setTimeout(function () {
            closePopup();
          }, 1500);
        }
      });
    }
  }

  function closePopup() {
    if (!popup) return;
    popup.classList.remove('is-open');
    popup.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
    sessionStorage.setItem('drg_popup_dismissed', '1');
  }

  /* -----------------------------------------------------------
     REVIEWS CAROUSEL — horizontal scroll with arrow nav
     ----------------------------------------------------------- */
  var track = document.querySelector('[data-reviews-track]');
  var prevBtn = document.querySelector('[data-reviews-prev]');
  var nextBtn = document.querySelector('[data-reviews-next]');

  if (track && prevBtn && nextBtn) {
    var scrollAmount = 360; // card width + gap

    prevBtn.addEventListener('click', function () {
      track.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });

    nextBtn.addEventListener('click', function () {
      track.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });
  }
})();
