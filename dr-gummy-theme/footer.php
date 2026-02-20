<?php
/**
 * Theme Footer — Cart Drawer, Footer Links, Newsletter, Payment, Socials
 *
 * @package DR_Gummy
 */

defined('ABSPATH') || exit;
?>
</main><!-- /#main-content -->

<!-- ============================================================
     CART DRAWER (slide-out from right)
     ============================================================ -->
<div class="cart-drawer" id="cart-drawer" aria-hidden="true">
  <div class="cart-drawer__overlay" data-cart-toggle></div>
  <aside class="cart-drawer__panel" role="dialog" aria-label="<?php esc_attr_e('Shopping cart', 'dr-gummy'); ?>">
    <div class="cart-drawer__header">
      <h2 class="cart-drawer__title">Your Cart</h2>
      <button class="cart-drawer__close" aria-label="<?php esc_attr_e('Close cart', 'dr-gummy'); ?>" data-cart-toggle>
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
          <line x1="18" y1="6" x2="6" y2="18"/>
          <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
      </button>
    </div>

    <div class="cart-drawer__body" id="cart-drawer-items">
      <!-- Items populated via JS / WC fragments -->
      <div class="cart-drawer__empty">
        <p>Your cart is currently empty.</p>
        <a href="/shop/" class="btn btn--primary">Continue Shopping</a>
      </div>
    </div>

    <div class="cart-drawer__footer">
      <div class="cart-drawer__free-shipping">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--color-success-green)" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        <span>Free shipping on orders over $50</span>
      </div>
      <div class="cart-drawer__subtotal">
        <span>Subtotal</span>
        <span class="cart-drawer__subtotal-amount" id="cart-drawer-subtotal">$0.00</span>
      </div>
      <a href="<?php echo esc_url(function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : '/checkout/'); ?>" class="btn btn--primary btn--full btn--lg">
        Checkout
      </a>
      <a href="<?php echo esc_url(function_exists('wc_get_cart_url') ? wc_get_cart_url() : '/cart/'); ?>" class="cart-drawer__view-cart">
        View Cart
      </a>
    </div>
  </aside>
</div>

<!-- ============================================================
     SITE FOOTER
     ============================================================ -->
<footer class="site-footer">

  <!-- Main footer content -->
  <div class="site-footer__main">
    <div class="site-footer__container">

      <!-- Newsletter + Amazon column -->
      <div class="site-footer__newsletter-col">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-footer__logo">
          <span class="site-header__wordmark">DR GUMMY</span>
        </a>
        <p class="site-footer__tagline">Medical-Grade Wellness, Reimagined.</p>

        <!-- Mini newsletter -->
        <div class="site-footer__newsletter">
          <p class="site-footer__newsletter-label">Subscribe to our newsletter</p>
          <form class="site-footer__newsletter-form" action="#" method="post">
            <input type="email" name="footer_email" class="site-footer__newsletter-input" placeholder="Enter your email" required />
            <button type="submit" class="site-footer__newsletter-btn">Subscribe</button>
          </form>
        </div>

        <!-- Amazon badge -->
        <div class="site-footer__amazon">
          <svg class="site-footer__amazon-logo" width="80" height="24" viewBox="0 0 80 24" aria-label="Amazon">
            <text x="0" y="18" font-family="Arial, sans-serif" font-weight="700" font-size="16" fill="#FF9900">amazon</text>
          </svg>
          <span class="site-footer__amazon-text">Also Available on Amazon.com</span>
        </div>
      </div>

      <!-- Link columns -->
      <div class="site-footer__links-grid">

        <!-- Shop -->
        <div class="site-footer__col">
          <h4 class="site-footer__heading">Shop</h4>
          <ul class="site-footer__links">
            <li><a href="/shop/">All Products</a></li>
            <li><a href="/product/beauty-boost-gummies/">Beauty Boost</a></li>
            <li><a href="/product/ultra-focus-gummies/">Ultra Focus</a></li>
            <li><a href="/product/energy-workout-booster-gummies/">Energy Booster</a></li>
            <li><a href="/product/anti-aging-gummies/">Anti-Aging</a></li>
            <li><a href="/bundle/">Build Your Bundle</a></li>
          </ul>
        </div>

        <!-- Company -->
        <div class="site-footer__col">
          <h4 class="site-footer__heading">Company</h4>
          <ul class="site-footer__links">
            <li><a href="/about/">About Us</a></li>
            <li><a href="/science/">Science</a></li>
            <li><a href="/blog/">Blog</a></li>
            <li><a href="/contact/">Contact</a></li>
          </ul>
        </div>

        <!-- Support -->
        <div class="site-footer__col">
          <h4 class="site-footer__heading">Support</h4>
          <ul class="site-footer__links">
            <li><a href="/faqs/">FAQs</a></li>
            <li><a href="/account/">My Account</a></li>
            <li><a href="/account/orders/">Order Tracking</a></li>
            <li><a href="/contact/">Returns &amp; Refunds</a></li>
          </ul>
        </div>

        <!-- Legal -->
        <div class="site-footer__col">
          <h4 class="site-footer__heading">Legal</h4>
          <ul class="site-footer__links">
            <li><a href="/legal/">Privacy Policy</a></li>
            <li><a href="/legal/terms/">Terms of Service</a></li>
            <li><a href="/legal/refund/">Refund Policy</a></li>
            <li><a href="/legal/shipping/">Shipping Policy</a></li>
          </ul>
        </div>

      </div>
    </div>
  </div>

  <!-- Bottom bar -->
  <div class="site-footer__bottom">
    <div class="site-footer__container">

      <!-- Copyright -->
      <p class="site-footer__copyright">&copy; <?php echo esc_html(date('Y')); ?> Dr. Gummy All rights reserved.</p>

      <!-- Social icons -->
      <div class="site-footer__socials">
        <!-- VK -->
        <a href="#" class="site-footer__social-link" aria-label="VK" rel="noopener noreferrer" target="_blank">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M21.547 7h-3.29a.743.743 0 0 0-.655.392s-1.312 2.416-1.734 3.23C14.734 12.813 14 12.126 14 11.11V7.603A1.104 1.104 0 0 0 12.896 6.5h-2.474a1.982 1.982 0 0 0-1.75.813s1.255-.204 1.255 1.49c0 .42.022 1.626.04 2.64a.73.73 0 0 1-1.272.503 21.54 21.54 0 0 1-2.498-4.543.693.693 0 0 0-.63-.403h-2.99a.508.508 0 0 0-.48.685C3.005 10.175 6.918 18 11.38 18h1.878a.742.742 0 0 0 .742-.742v-1.135a.73.73 0 0 1 1.23-.53l2.247 2.112a1.09 1.09 0 0 0 .746.295h2.953c1.424 0 1.424-.988.647-1.753-.546-.538-2.518-2.617-2.518-2.617a1.02 1.02 0 0 1-.078-1.323c.637-.84 1.68-2.212 2.122-2.8.603-.804 1.697-2.507.197-2.507z"/></svg>
        </a>
        <!-- Facebook -->
        <a href="#" class="site-footer__social-link" aria-label="Facebook" rel="noopener noreferrer" target="_blank">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
        </a>
        <!-- Instagram -->
        <a href="#" class="site-footer__social-link" aria-label="Instagram" rel="noopener noreferrer" target="_blank">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
        </a>
        <!-- YouTube -->
        <a href="#" class="site-footer__social-link" aria-label="YouTube" rel="noopener noreferrer" target="_blank">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
        </a>
        <!-- TikTok -->
        <a href="#" class="site-footer__social-link" aria-label="TikTok" rel="noopener noreferrer" target="_blank">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
        </a>
      </div>

      <!-- Payment methods -->
      <div class="site-footer__payments">
        <!-- Visa -->
        <span class="site-footer__payment-icon" aria-label="Visa">
          <svg width="38" height="24" viewBox="0 0 38 24" fill="none"><rect width="38" height="24" rx="3" fill="#fff" stroke="#E5E7EB"/><text x="7" y="16" font-family="Arial,sans-serif" font-weight="700" font-size="11" fill="#1A1F71">VISA</text></svg>
        </span>
        <!-- Mastercard -->
        <span class="site-footer__payment-icon" aria-label="Mastercard">
          <svg width="38" height="24" viewBox="0 0 38 24" fill="none"><rect width="38" height="24" rx="3" fill="#fff" stroke="#E5E7EB"/><circle cx="15" cy="12" r="7" fill="#EB001B"/><circle cx="23" cy="12" r="7" fill="#F79E1B"/><path d="M19 6.8a7 7 0 0 1 0 10.4 7 7 0 0 1 0-10.4z" fill="#FF5F00"/></svg>
        </span>
        <!-- Amex -->
        <span class="site-footer__payment-icon" aria-label="American Express">
          <svg width="38" height="24" viewBox="0 0 38 24" fill="none"><rect width="38" height="24" rx="3" fill="#016FD0"/><text x="5" y="15" font-family="Arial,sans-serif" font-weight="700" font-size="8" fill="#fff">AMEX</text></svg>
        </span>
        <!-- PayPal -->
        <span class="site-footer__payment-icon" aria-label="PayPal">
          <svg width="38" height="24" viewBox="0 0 38 24" fill="none"><rect width="38" height="24" rx="3" fill="#fff" stroke="#E5E7EB"/><text x="5" y="15" font-family="Arial,sans-serif" font-weight="700" font-size="9" fill="#003087">Pay</text><text x="19" y="15" font-family="Arial,sans-serif" font-weight="700" font-size="9" fill="#009CDE">Pal</text></svg>
        </span>
        <!-- Apple Pay -->
        <span class="site-footer__payment-icon" aria-label="Apple Pay">
          <svg width="38" height="24" viewBox="0 0 38 24" fill="none"><rect width="38" height="24" rx="3" fill="#000"/><text x="4" y="16" font-family="Arial,sans-serif" font-weight="600" font-size="10" fill="#fff">Pay</text></svg>
        </span>
        <!-- Google Pay -->
        <span class="site-footer__payment-icon" aria-label="Google Pay">
          <svg width="38" height="24" viewBox="0 0 38 24" fill="none"><rect width="38" height="24" rx="3" fill="#fff" stroke="#E5E7EB"/><text x="5" y="15" font-family="Arial,sans-serif" font-weight="600" font-size="9" fill="#5F6368">GPay</text></svg>
        </span>
      </div>

    </div>
  </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
