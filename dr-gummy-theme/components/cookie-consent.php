<?php
/**
 * Cookie Consent Banner
 *
 * GDPR/CCPA-compliant cookie notice with Accept / Decline options.
 *
 * @package DR_Gummy
 */

defined('ABSPATH') || exit;
?>
<div class="cookie-consent" id="cookie-consent" role="dialog" aria-label="Cookie consent" hidden>
  <div class="cookie-consent__inner">
    <div class="cookie-consent__text">
      <svg class="cookie-consent__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M8 12h.01M12 12h.01M16 12h.01"/></svg>
      <p>We use cookies to improve your experience, analyze traffic, and personalize content. By clicking "Accept All," you consent to our use of cookies. See our <a href="/legal/#cookies">Cookie Policy</a> for details.</p>
    </div>
    <div class="cookie-consent__actions">
      <button class="btn btn--sm cookie-consent__decline" id="cookie-decline">Decline</button>
      <button class="btn btn--primary btn--sm cookie-consent__accept" id="cookie-accept">Accept All</button>
    </div>
  </div>
</div>
