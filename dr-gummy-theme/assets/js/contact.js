/**
 * Contact Page — Form validation & submission
 * @package DR_Gummy
 */
(function () {
  'use strict';

  var form    = document.getElementById('contact-form');
  var success = document.getElementById('contact-success');
  var submit  = document.getElementById('contact-submit');
  if (!form) return;

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    // Basic validation
    var name    = form.querySelector('#contact-name');
    var email   = form.querySelector('#contact-email');
    var subject = form.querySelector('#contact-subject');
    var message = form.querySelector('#contact-message');
    var valid   = true;

    [name, email, subject, message].forEach(function (field) {
      if (!field.value.trim()) {
        field.classList.add('input--error');
        valid = false;
      } else {
        field.classList.remove('input--error');
      }
    });

    if (email.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
      email.classList.add('input--error');
      valid = false;
    }

    if (!valid) return;

    // Submit feedback
    submit.disabled = true;
    submit.textContent = 'Sending...';

    // In production, POST to a form handler / AJAX endpoint
    setTimeout(function () {
      submit.textContent = 'Sent!';
      success.removeAttribute('hidden');
      form.reset();
      setTimeout(function () {
        submit.disabled = false;
        submit.textContent = 'Send Message';
      }, 3000);
    }, 800);
  });

  // Clear error on input
  form.addEventListener('input', function (e) {
    if (e.target.matches('.input--error')) {
      e.target.classList.remove('input--error');
    }
  });
})();
