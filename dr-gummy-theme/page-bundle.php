<?php
/**
 * Template Name: Bundle Builder
 * Slug: bundle
 *
 * Interactive bundle builder with tiered discounts, qty selectors,
 * sticky summary sidebar, and Subscribe & Save toggle.
 *
 * @package DR_Gummy
 */

get_header();

// Product catalog for the bundle builder
$bundle_products = [
    [
        'id'    => 'sleep',
        'name'  => 'Sleep Well',
        'desc'  => 'Deep, restful sleep support with melatonin, L-theanine & magnesium glycinate.',
        'price' => 45.00,
        'color' => '#2E5735',
        'badge' => 'SLEEP',
    ],
    [
        'id'    => 'focus',
        'name'  => 'Focus + Energy',
        'desc'  => 'Mental clarity & sustained energy with Lion\'s Mane, Bacopa & Alpha-GPC.',
        'price' => 45.00,
        'color' => '#5BA4B5',
        'badge' => 'FOCUS',
    ],
    [
        'id'    => 'chill',
        'name'  => 'Calm & Relax',
        'desc'  => 'Stress relief & calm with Ashwagandha KSM-66, L-Theanine & GABA.',
        'price' => 45.00,
        'color' => '#4A7C59',
        'badge' => 'CHILL',
    ],
    [
        'id'    => 'glow',
        'name'  => 'Daily Glow',
        'desc'  => 'Radiant skin, strong hair & nails with Biotin, Hyaluronic Acid & Vitamin E.',
        'price' => 45.00,
        'color' => '#D4A853',
        'badge' => 'GLOW',
    ],
];

// Tier definitions (used by JS, rendered here for the visual tier cards)
$tiers = [
    ['bottles' => 1, 'discount' => 0,  'label' => 'MSRP',         'shipping' => false, 'badge' => ''],
    ['bottles' => 2, 'discount' => 10, 'label' => '10% Off',      'shipping' => true,  'badge' => ''],
    ['bottles' => 3, 'discount' => 20, 'label' => '20% Off',      'shipping' => true,  'badge' => ''],
    ['bottles' => 4, 'discount' => 35, 'label' => '35% Off',      'shipping' => true,  'badge' => 'Best Value'],
];
?>

<section class="bundle-page" id="bundle-page">
  <div class="bundle-page__container container--wide">

    <!-- ============================================================
         PAGE HEADER
         ============================================================ -->
    <div class="bundle-header">
      <h1 class="bundle-header__title">Build Your Dr. Gummy Bundle</h1>
      <p class="bundle-header__subtitle">Choose your products, pick a tier, and save more when you bundle.</p>

      <!-- Free Shipping Progress Bar -->
      <div class="bundle-shipping-bar" id="bundle-shipping-bar">
        <div class="bundle-shipping-bar__info">
          <span class="bundle-shipping-bar__text">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
            Free Shipping on Orders Over $60
          </span>
          <span class="bundle-shipping-bar__amount" id="shipping-bar-amount">$0 / $60</span>
        </div>
        <div class="bundle-shipping-bar__track">
          <div class="bundle-shipping-bar__fill" id="shipping-bar-fill" style="width: 0%;"></div>
        </div>
      </div>
    </div>

    <!-- ============================================================
         TIERED DISCOUNT SYSTEM (4 horizontal cards)
         ============================================================ -->
    <div class="bundle-tiers" id="bundle-tiers">
      <?php foreach ($tiers as $i => $tier) : ?>
      <button
        class="bundle-tier<?php echo $i === 0 ? ' is-active' : ''; ?>"
        data-tier-bottles="<?php echo esc_attr($tier['bottles']); ?>"
        data-tier-discount="<?php echo esc_attr($tier['discount']); ?>"
        type="button"
      >
        <?php if ($tier['badge']) : ?>
          <span class="bundle-tier__badge"><?php echo esc_html($tier['badge']); ?></span>
        <?php endif; ?>
        <span class="bundle-tier__bottles"><?php echo esc_html($tier['bottles']); ?> Bottle<?php echo $tier['bottles'] > 1 ? 's' : ''; ?></span>
        <span class="bundle-tier__label"><?php echo esc_html($tier['label']); ?></span>
        <?php if ($tier['shipping']) : ?>
          <span class="bundle-tier__shipping">+ Free Shipping</span>
        <?php endif; ?>
      </button>
      <?php endforeach; ?>
    </div>

    <!-- ============================================================
         MAIN CONTENT: Product Grid + Sidebar Summary
         ============================================================ -->
    <div class="bundle-layout">

      <!-- PRODUCT SELECTION GRID (4 cards) -->
      <div class="bundle-grid" id="bundle-grid">
        <?php foreach ($bundle_products as $prod) : ?>
        <div
          class="bundle-product"
          data-product-id="<?php echo esc_attr($prod['id']); ?>"
          data-product-price="<?php echo esc_attr($prod['price']); ?>"
          data-product-name="<?php echo esc_attr($prod['name']); ?>"
          data-qty="0"
        >
          <!-- Product image placeholder -->
          <div class="bundle-product__img" style="background-color: <?php echo esc_attr($prod['color']); ?>;">
            <span class="bundle-product__img-label"><?php echo esc_html($prod['badge']); ?></span>
          </div>

          <!-- Product info -->
          <div class="bundle-product__body">
            <h3 class="bundle-product__name"><?php echo esc_html($prod['name']); ?></h3>
            <p class="bundle-product__desc"><?php echo esc_html($prod['desc']); ?></p>
            <div class="bundle-product__footer">
              <span class="bundle-product__price">$<?php echo esc_html(number_format($prod['price'], 2)); ?></span>

              <!-- Quantity -/+ selector -->
              <div class="bundle-qty">
                <button class="bundle-qty__btn bundle-qty__btn--minus" data-qty-minus type="button" aria-label="Decrease quantity" disabled>
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/></svg>
                </button>
                <span class="bundle-qty__value" data-qty-value>0</span>
                <button class="bundle-qty__btn bundle-qty__btn--plus" data-qty-plus type="button" aria-label="Increase quantity">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                </button>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- ============================================================
           BUNDLE SUMMARY SIDEBAR (sticky)
           ============================================================ -->
      <aside class="bundle-summary" id="bundle-summary">
        <div class="bundle-summary__inner">
          <h3 class="bundle-summary__title">Your Bundle</h3>

          <!-- Selected items list (populated by JS) -->
          <div class="bundle-summary__items" id="bundle-summary-items">
            <p class="bundle-summary__empty" id="bundle-summary-empty">Add products to your bundle to get started.</p>
          </div>

          <!-- Pricing breakdown -->
          <div class="bundle-summary__pricing" id="bundle-summary-pricing">
            <div class="bundle-summary__row">
              <span>Subtotal</span>
              <span id="summary-subtotal">$0.00</span>
            </div>
            <div class="bundle-summary__row bundle-summary__row--discount" id="summary-tier-row" style="display:none;">
              <span>Bundle Discount (<span id="summary-tier-pct">0</span>%)</span>
              <span class="bundle-summary__discount" id="summary-tier-amount">-$0.00</span>
            </div>
            <div class="bundle-summary__row bundle-summary__row--discount" id="summary-sub-row" style="display:none;">
              <span>Subscribe &amp; Save (10%)</span>
              <span class="bundle-summary__discount" id="summary-sub-amount">-$0.00</span>
            </div>
            <div class="bundle-summary__row" id="summary-shipping-row">
              <span>Shipping</span>
              <span id="summary-shipping">Calculated at checkout</span>
            </div>
            <div class="bundle-summary__divider"></div>
            <div class="bundle-summary__row bundle-summary__row--total">
              <span>Total</span>
              <span id="summary-total">$0.00</span>
            </div>
            <div class="bundle-summary__savings" id="summary-savings" style="display:none;">
              You Save: <strong id="summary-savings-amount">$0.00</strong>
            </div>
          </div>

          <!-- Subscribe & Save Toggle -->
          <div class="bundle-subscribe" id="bundle-subscribe">
            <label class="bundle-subscribe__toggle">
              <input type="checkbox" class="toggle__input" id="subscribe-toggle" checked>
              <span class="toggle__slider"></span>
            </label>
            <div class="bundle-subscribe__text">
              <span class="bundle-subscribe__label">Subscribe &amp; Save</span>
              <span class="bundle-subscribe__extra">Extra 10% Off — stacks with bundle discount</span>
            </div>
          </div>

          <!-- Add Bundle to Cart CTA -->
          <button class="bundle-summary__cta btn btn--primary btn--full btn--lg" id="bundle-add-to-cart" disabled>
            Add Bundle to Cart
          </button>
        </div>
      </aside>

    </div><!-- /.bundle-layout -->

  </div>
</section>

<?php get_footer(); ?>
