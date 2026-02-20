<?php
/**
 * Social Proof Popup — "[Name] from [City] just purchased [Product]"
 *
 * Shows a small notification in the bottom-left corner every 30-45 seconds.
 *
 * @package DR_Gummy
 */

defined('ABSPATH') || exit;
?>
<div class="social-proof" id="social-proof" aria-live="polite" aria-atomic="true" hidden>
  <button class="social-proof__close" aria-label="Dismiss notification" id="social-proof-close">&times;</button>
  <div class="social-proof__inner">
    <div class="social-proof__img" id="social-proof-img"></div>
    <div class="social-proof__body">
      <p class="social-proof__text">
        <strong id="social-proof-name"></strong> from <span id="social-proof-city"></span>
      </p>
      <p class="social-proof__product">just purchased <strong id="social-proof-product"></strong></p>
      <p class="social-proof__time" id="social-proof-time"></p>
    </div>
  </div>
</div>
