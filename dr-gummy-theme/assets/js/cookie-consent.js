/**
 * Cookie Consent Banner — Accept / Decline with localStorage persistence
 * @package DR_Gummy
 */
(function () {
  'use strict';

  var banner  = document.getElementById('cookie-consent');
  var accept  = document.getElementById('cookie-accept');
  var decline = document.getElementById('cookie-decline');
  if (!banner) return;

  var STORAGE_KEY = 'dr_gummy_cookie_consent';

  // If user already made a choice, don't show
  if (localStorage.getItem(STORAGE_KEY)) return;

  // Show after 1.5s
  setTimeout(function () {
    banner.removeAttribute('hidden');
    void banner.offsetWidth;
    banner.classList.add('is-visible');
  }, 1500);

  function dismiss(choice) {
    localStorage.setItem(STORAGE_KEY, choice);
    banner.classList.remove('is-visible');
    setTimeout(function () { banner.setAttribute('hidden', ''); }, 300);
  }

  accept.addEventListener('click', function () { dismiss('accepted'); });
  decline.addEventListener('click', function () { dismiss('declined'); });
})();
