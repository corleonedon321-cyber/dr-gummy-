<?php
/**
 * Component: Cart Slide-Out Drawer
 *
 * Slide-out panel from right with overlay, free-shipping progress bar,
 * cart items with qty selectors & subscription toggles, cross-sell section,
 * pricing summary, checkout CTA, and email registration banner.
 *
 * @package DR_Gummy
 */

defined('ABSPATH') || exit;

// Demo cart items (replaced by WooCommerce data in production)
$cart_items = [
    [
        'id'    => 'sleep',
        'name'  => 'Sleep Well Gummies',
        'price' => 45.00,
        'qty'   => 1,
        'color' => '#2E5735',
        'badge' => 'SLEEP',
        'subscribed' => false,
    ],
    [
        'id'    => 'focus',
        'name'  => 'Focus + Energy Gummies',
        'price' => 45.00,
        'qty'   => 1,
        'color' => '#5BA4B5',
        'badge' => 'FOCUS',
        'subscribed' => false,
    ],
];

// Cross-sell products
$cross_sells = [
    [
        'id'    => 'chill',
        'name'  => 'Calm & Relax',
        'price' => 45.00,
        'color' => '#4A7C59',
        'badge' => 'CHILL',
    ],
    [
        'id'    => 'glow',
        'name'  => 'Daily Glow',
        'price' => 45.00,
        'color' => '#D4A853',
        'badge' => 'GLOW',
    ],
    [
        'id'    => 'sleep',
        'name'  => 'Sleep Well',
        'price' => 45.00,
        'color' => '#2E5735',
        'badge' => 'SLEEP',
    ],
];

$free_shipping_threshold = 49.00;
$flat_shipping = 4.95;
$subscribe_discount = 20; // percent
?>

<div class="cart-drawer" id="cart-drawer" aria-hidden="true">
  <div class="cart-drawer__overlay" data-cart-toggle></div>

  <aside class="cart-drawer__panel" role="dialog" aria-label="<?php esc_attr_e('Shopping cart', 'dr-gummy'); ?>">

    <!-- ============================================================
         HEADER: Free Shipping + Close
         ============================================================ -->
    <div class="cart-drawer__header">
      <span class="cart-drawer__header-label">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/>
        </svg>
        Free Shipping
      </span>
      <button class="cart-drawer__close" aria-label="<?php esc_attr_e('Close cart', 'dr-gummy'); ?>" data-cart-toggle>
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
          <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
      </button>
    </div>

    <!-- Shipping Progress Bar -->
    <div class="cart-drawer__shipping-bar" id="cart-shipping-bar">
      <div class="cart-drawer__shipping-msg" id="cart-shipping-msg">
        Spend <strong id="cart-shipping-remaining">$<?php echo esc_html(number_format($free_shipping_threshold, 2)); ?></strong> more for free shipping!
      </div>
      <div class="cart-drawer__shipping-track">
        <div class="cart-drawer__shipping-fill" id="cart-shipping-fill" style="width: 0%;"></div>
      </div>
      <div class="cart-drawer__shipping-threshold">
        $<?php echo esc_html(number_format($free_shipping_threshold, 2)); ?>
      </div>
    </div>

    <!-- ============================================================
         CART ITEMS (scrollable body)
         ============================================================ -->
    <div class="cart-drawer__body" id="cart-drawer-body">

      <!-- Empty state -->
      <div class="cart-drawer__empty" id="cart-drawer-empty" style="display:none;">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--color-border-gray)" stroke-width="1.5">
          <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/>
        </svg>
        <p>Your cart is currently empty.</p>
        <a href="/shop/" class="btn btn--primary btn--sm">Continue Shopping</a>
      </div>

      <!-- Cart items list -->
      <div class="cart-drawer__items" id="cart-drawer-items">
        <?php foreach ($cart_items as $idx => $item) :
          $line_total = $item['price'] * $item['qty'];
        ?>
        <div class="cart-drawer__item" data-cart-item-id="<?php echo esc_attr($item['id']); ?>" data-item-price="<?php echo esc_attr($item['price']); ?>" data-item-qty="<?php echo esc_attr($item['qty']); ?>">
          <!-- Thumbnail -->
          <div class="cart-drawer__item-thumb" style="background-color: <?php echo esc_attr($item['color']); ?>;">
            <span><?php echo esc_html($item['badge']); ?></span>
          </div>

          <!-- Item details -->
          <div class="cart-drawer__item-details">
            <div class="cart-drawer__item-top">
              <h4 class="cart-drawer__item-name"><?php echo esc_html($item['name']); ?></h4>
              <button class="cart-drawer__item-remove" data-remove-item="<?php echo esc_attr($item['id']); ?>" aria-label="Remove <?php echo esc_attr($item['name']); ?>">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
              </button>
            </div>

            <div class="cart-drawer__item-row">
              <!-- Qty selector -->
              <div class="cart-drawer__item-qty">
                <button class="cart-drawer__qty-btn" data-cart-qty-minus aria-label="Decrease quantity" type="button">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/></svg>
                </button>
                <span class="cart-drawer__qty-value" data-cart-qty-value><?php echo esc_html($item['qty']); ?></span>
                <button class="cart-drawer__qty-btn" data-cart-qty-plus aria-label="Increase quantity" type="button">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                </button>
              </div>
              <!-- Price -->
              <span class="cart-drawer__item-price" data-cart-item-line-total>$<?php echo esc_html(number_format($line_total, 2)); ?></span>
            </div>

            <!-- Subscription toggle -->
            <div class="cart-drawer__item-subscribe">
              <label class="cart-drawer__sub-toggle">
                <input type="checkbox" class="toggle__input" data-cart-subscribe-toggle <?php echo !empty($item['subscribed']) ? 'checked' : ''; ?>>
                <span class="toggle__slider"></span>
              </label>
              <span class="cart-drawer__sub-label">Switch to Subscription &amp; Save <?php echo esc_html($subscribe_discount); ?>%</span>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- ============================================================
           FREQUENTLY BOUGHT WITH — Cross-sell section
           ============================================================ -->
      <div class="cart-drawer__cross-sell" id="cart-cross-sell">
        <h4 class="cart-drawer__cross-sell-title">Frequently Bought With</h4>
        <div class="cart-drawer__cross-sell-grid">
          <?php foreach ($cross_sells as $cs) : ?>
          <div class="cart-drawer__cross-sell-card" data-cross-sell-id="<?php echo esc_attr($cs['id']); ?>">
            <div class="cart-drawer__cross-sell-thumb" style="background-color: <?php echo esc_attr($cs['color']); ?>;">
              <span><?php echo esc_html($cs['badge']); ?></span>
            </div>
            <div class="cart-drawer__cross-sell-info">
              <span class="cart-drawer__cross-sell-name"><?php echo esc_html($cs['name']); ?></span>
              <span class="cart-drawer__cross-sell-price">$<?php echo esc_html(number_format($cs['price'], 2)); ?></span>
            </div>
            <button class="cart-drawer__cross-sell-add btn btn--outline btn--sm" data-add-cross-sell="<?php echo esc_attr($cs['id']); ?>" type="button">Add</button>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div><!-- /.cart-drawer__body -->

    <!-- ============================================================
         FOOTER: Summary + Checkout + Email Banner
         ============================================================ -->
    <div class="cart-drawer__footer" id="cart-drawer-footer">

      <!-- Pricing summary -->
      <div class="cart-drawer__summary">
        <div class="cart-drawer__summary-row">
          <span>Subtotal</span>
          <span id="cart-summary-subtotal">$0.00</span>
        </div>
        <div class="cart-drawer__summary-row">
          <span>Shipping</span>
          <span id="cart-summary-shipping">$<?php echo esc_html(number_format($flat_shipping, 2)); ?></span>
        </div>
        <div class="cart-drawer__summary-divider"></div>
        <div class="cart-drawer__summary-row cart-drawer__summary-row--total">
          <span>Total</span>
          <span id="cart-summary-total">$0.00</span>
        </div>
      </div>

      <!-- Checkout CTA -->
      <a href="<?php echo esc_url(function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : '/checkout/'); ?>" class="cart-drawer__checkout btn btn--primary btn--full btn--lg" id="cart-checkout-btn">
        Checkout &middot; <span id="cart-checkout-total">$0.00</span>
      </a>

      <!-- Email registration banner -->
      <div class="cart-drawer__register-banner" id="cart-register-banner">
        <div class="cart-drawer__register-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
          </svg>
        </div>
        <div class="cart-drawer__register-text">
          <strong>Register Email &amp; Get Extra 25% OFF Coupon!</strong>
        </div>
        <form class="cart-drawer__register-form" id="cart-register-form">
          <input type="email" class="cart-drawer__register-input" placeholder="Enter your email" required />
          <button type="submit" class="cart-drawer__register-btn btn btn--primary btn--sm">Get Coupon</button>
        </form>
      </div>

    </div>

  </aside>
</div>
