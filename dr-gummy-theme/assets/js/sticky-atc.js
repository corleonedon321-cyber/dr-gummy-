/**
 * Sticky Add-to-Cart Bar — shows when user scrolls past the main ATC button
 * @package DR_Gummy
 */
(function () {
  'use strict';

  var bar     = document.getElementById('sticky-atc');
  var trigger = document.getElementById('pdp-add-to-cart');
  if (!bar || !trigger) return;

  var visible = false;

  function check() {
    var rect = trigger.getBoundingClientRect();
    var shouldShow = rect.bottom < 0;

    if (shouldShow && !visible) {
      bar.removeAttribute('hidden');
      void bar.offsetWidth;
      bar.classList.add('is-visible');
      visible = true;
    } else if (!shouldShow && visible) {
      bar.classList.remove('is-visible');
      setTimeout(function () { bar.setAttribute('hidden', ''); }, 300);
      visible = false;
    }
  }

  var ticking = false;
  window.addEventListener('scroll', function () {
    if (!ticking) {
      requestAnimationFrame(function () {
        check();
        ticking = false;
      });
      ticking = true;
    }
  }, { passive: true });

  // ATC click scrolls to main button
  var stickyBtn = bar.querySelector('.sticky-atc__btn');
  if (stickyBtn) {
    stickyBtn.addEventListener('click', function () {
      trigger.scrollIntoView({ behavior: 'smooth', block: 'center' });
      setTimeout(function () { trigger.focus(); }, 600);
    });
  }
})();
