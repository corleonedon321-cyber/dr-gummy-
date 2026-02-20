<?php
/**
 * Theme Footer
 *
 * @package DR_Gummy
 */

defined('ABSPATH') || exit;
?>
</main><!-- /#main-content -->

<!-- Cart Drawer (slide-out) -->
<div class="cart-drawer" id="cart-drawer" aria-hidden="true">
  <div class="cart-drawer__overlay" data-cart-toggle></div>
  <aside class="cart-drawer__panel" role="dialog" aria-label="<?php esc_attr_e('Shopping cart', 'dr-gummy'); ?>">
    <div class="cart-drawer__header flex items-center justify-between">
      <h2 class="cart-drawer__title">Your Cart</h2>
      <button class="cart-drawer__close" aria-label="<?php esc_attr_e('Close cart', 'dr-gummy'); ?>" data-cart-toggle>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="18" y1="6" x2="6" y2="18"/>
          <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
      </button>
    </div>
    <div class="cart-drawer__items" id="cart-drawer-items">
      <!-- Cart items populated via JS/AJAX -->
    </div>
    <div class="cart-drawer__footer">
      <div class="cart-drawer__subtotal flex justify-between mb-4">
        <span>Subtotal</span>
        <span id="cart-drawer-subtotal" class="text-price">$0.00</span>
      </div>
      <a href="<?php echo esc_url(function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : '/checkout/'); ?>" class="btn btn--primary btn--full btn--lg">Checkout</a>
    </div>
  </aside>
</div>

<!-- Site Footer -->
<footer class="site-footer bg-green">
  <div class="container section">
    <div class="site-footer__grid grid grid-cols-4 gap-8">

      <!-- Brand column -->
      <div class="site-footer__brand">
        <span class="site-nav__wordmark" style="color: var(--color-white);">DR GUMMY</span>
        <p class="text-secondary" style="color: rgba(255,255,255,0.7); margin-top: var(--space-4);">
          Medical-Grade Wellness, Reimagined.
        </p>
      </div>

      <!-- Shop column -->
      <div class="site-footer__col">
        <h4 class="site-footer__heading">Shop</h4>
        <ul class="site-footer__links">
          <li><a href="/shop/">All Products</a></li>
          <li><a href="/bundle/">Build Your Bundle</a></li>
        </ul>
      </div>

      <!-- Company column -->
      <div class="site-footer__col">
        <h4 class="site-footer__heading">Company</h4>
        <ul class="site-footer__links">
          <li><a href="/about/">About Us</a></li>
          <li><a href="/science/">Science</a></li>
          <li><a href="/blog/">Blog</a></li>
          <li><a href="/contact/">Contact</a></li>
        </ul>
      </div>

      <!-- Support column -->
      <div class="site-footer__col">
        <h4 class="site-footer__heading">Support</h4>
        <ul class="site-footer__links">
          <li><a href="/faqs/">FAQs</a></li>
          <li><a href="/legal/">Privacy Policy</a></li>
          <li><a href="/legal/">Terms of Service</a></li>
        </ul>
      </div>

    </div>

    <!-- Bottom bar -->
    <div class="site-footer__bottom flex items-center justify-between" style="border-top: 1px solid rgba(255,255,255,0.15); margin-top: var(--space-8); padding-top: var(--space-6);">
      <p style="color: rgba(255,255,255,0.6); font-size: var(--text-sm);">
        &copy; <?php echo esc_html(date('Y')); ?> DR GUMMY. All rights reserved.
      </p>
      <?php
      wp_nav_menu([
        'theme_location' => 'legal',
        'container'      => false,
        'menu_class'     => 'site-footer__legal-links flex gap-4',
        'fallback_cb'    => false,
        'depth'          => 1,
      ]);
      ?>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
