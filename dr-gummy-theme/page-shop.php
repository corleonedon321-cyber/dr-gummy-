<?php
/**
 * Template Name: Shop Page
 * Slug: shop
 *
 * Sidebar filter + 3-column product grid with Subscribe & Save radios.
 *
 * @package DR_Gummy
 */

get_header();

// Product data — each card's details
$products = [
    [
        'slug'        => 'sleep',
        'name'        => 'Dr. Gummy Sleep Gummies',
        'subtitle'    => 'SLEEP',
        'sub_price'   => '$39.20',
        'full_price'  => '$49.00',
        'reviews'     => 5,
        'gradient'    => 'shop-card__img--sleep',
    ],
    [
        'slug'        => 'chill',
        'name'        => 'Dr. Gummy Chill Gummies',
        'subtitle'    => 'CHILL',
        'sub_price'   => '$39.20',
        'full_price'  => '$49.00',
        'reviews'     => 5,
        'gradient'    => 'shop-card__img--chill',
    ],
    [
        'slug'        => 'glow',
        'name'        => 'Dr. Gummy Glow Gummies',
        'subtitle'    => 'GLOW',
        'sub_price'   => '$39.20',
        'full_price'  => '$49.00',
        'reviews'     => 5,
        'gradient'    => 'shop-card__img--glow',
    ],
    [
        'slug'        => 'focus',
        'name'        => 'Dr. Gummy Focus Gummies',
        'subtitle'    => 'FOCUS',
        'sub_price'   => '$39.20',
        'full_price'  => '$49.00',
        'reviews'     => 5,
        'gradient'    => 'shop-card__img--focus',
    ],
    [
        'slug'        => 'energy',
        'name'        => 'Dr. Gummy Energy Gummies',
        'subtitle'    => 'ENERGY',
        'sub_price'   => '$39.20',
        'full_price'  => '$49.00',
        'reviews'     => 5,
        'gradient'    => 'shop-card__img--energy',
    ],
    [
        'slug'        => 'anti-aging',
        'name'        => 'Dr. Gummy Anti-Aging Gummies',
        'subtitle'    => 'ANTI-AGING',
        'sub_price'   => '$39.20',
        'full_price'  => '$49.00',
        'reviews'     => 5,
        'gradient'    => 'shop-card__img--anti-aging',
    ],
];
?>

<section class="shop-page">
  <div class="shop-page__layout">

    <!-- ============================================================
         LEFT SIDEBAR
         ============================================================ -->
    <aside class="shop-sidebar">

      <!-- Filter section -->
      <div class="shop-sidebar__section">
        <h3 class="shop-sidebar__title">FILTER BY NEED</h3>
        <ul class="shop-sidebar__filters" data-shop-filters>
          <li class="shop-sidebar__filter-item">
            <label class="shop-filter">
              <input type="checkbox" class="shop-filter__input" value="beauty" data-filter />
              <span class="shop-filter__check"></span>
              <span class="shop-filter__label">Beauty &amp; Skin</span>
            </label>
          </li>
          <li class="shop-sidebar__filter-item">
            <label class="shop-filter">
              <input type="checkbox" class="shop-filter__input" value="focus" data-filter />
              <span class="shop-filter__check"></span>
              <span class="shop-filter__label">Focus &amp; Brain</span>
            </label>
          </li>
          <li class="shop-sidebar__filter-item">
            <label class="shop-filter">
              <input type="checkbox" class="shop-filter__input" value="energy" data-filter />
              <span class="shop-filter__check"></span>
              <span class="shop-filter__label">Energy &amp; Fitness</span>
            </label>
          </li>
          <li class="shop-sidebar__filter-item">
            <label class="shop-filter">
              <input type="checkbox" class="shop-filter__input" value="anti-aging" data-filter />
              <span class="shop-filter__check"></span>
              <span class="shop-filter__label">Anti-Aging</span>
            </label>
          </li>
        </ul>
      </div>

      <!-- Sidebar nav links -->
      <nav class="shop-sidebar__nav">
        <ul class="shop-sidebar__links">
          <li><a href="/">Home</a></li>
          <li><a href="/about/">About Us</a></li>
          <li><a href="/legal/terms/">Terms of Use</a></li>
          <li><a href="/legal/">Privacy &amp; Service</a></li>
          <li><a href="/contact/">Contact Us</a></li>
        </ul>
      </nav>

      <!-- Social icons -->
      <div class="shop-sidebar__socials">
        <a href="#" class="shop-sidebar__social" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
        </a>
        <a href="#" class="shop-sidebar__social" aria-label="Instagram" target="_blank" rel="noopener noreferrer">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
        </a>
        <a href="#" class="shop-sidebar__social" aria-label="Twitter" target="_blank" rel="noopener noreferrer">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M23.953 4.57a10 10 0 0 1-2.825.775 4.958 4.958 0 0 0 2.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 0 0-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 0 0-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 0 1-2.228-.616v.06a4.923 4.923 0 0 0 3.946 4.827 4.996 4.996 0 0 1-2.212.085 4.936 4.936 0 0 0 4.604 3.417 9.867 9.867 0 0 1-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 0 0 7.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0 0 24 4.59z"/></svg>
        </a>
        <a href="#" class="shop-sidebar__social" aria-label="Pinterest" target="_blank" rel="noopener noreferrer">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.373 0 0 5.372 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 0 1 .083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12 24c6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z"/></svg>
        </a>
      </div>
    </aside>

    <!-- ============================================================
         PRODUCT GRID (3 columns)
         ============================================================ -->
    <div class="shop-grid">

      <?php foreach ($products as $i => $prod) : ?>
      <div class="shop-card" data-product-slug="<?php echo esc_attr($prod['slug']); ?>">
        <!-- Product image -->
        <a href="/product/<?php echo esc_attr($prod['slug']); ?>-gummies/" class="shop-card__img-link">
          <div class="shop-card__img <?php echo esc_attr($prod['gradient']); ?>">
            <span class="shop-card__img-label"><?php echo esc_html($prod['subtitle']); ?></span>
          </div>
        </a>

        <!-- Card body -->
        <div class="shop-card__body">
          <!-- Stars + review count -->
          <div class="shop-card__rating">
            <?php echo dr_gummy_star_rating(5.0, $prod['reviews']); ?>
          </div>

          <!-- Product name -->
          <h3 class="shop-card__name">
            <a href="/product/<?php echo esc_attr($prod['slug']); ?>-gummies/"><?php echo esc_html($prod['name']); ?></a>
          </h3>

          <!-- Subscribe & Save / One-time radios -->
          <div class="shop-card__options">
            <label class="shop-radio shop-radio--subscribe is-selected">
              <input
                type="radio"
                name="purchase_<?php echo esc_attr($prod['slug']); ?>"
                value="subscribe"
                class="shop-radio__input"
                checked
                data-price="<?php echo esc_attr($prod['sub_price']); ?>"
              />
              <span class="shop-radio__indicator"></span>
              <span class="shop-radio__text">
                <span class="shop-radio__label">Subscribe &amp; Save (20% Off)</span>
                <span class="shop-radio__price"><?php echo esc_html($prod['sub_price']); ?></span>
              </span>
            </label>

            <label class="shop-radio shop-radio--onetime">
              <input
                type="radio"
                name="purchase_<?php echo esc_attr($prod['slug']); ?>"
                value="onetime"
                class="shop-radio__input"
                data-price="<?php echo esc_attr($prod['full_price']); ?>"
              />
              <span class="shop-radio__indicator"></span>
              <span class="shop-radio__text">
                <span class="shop-radio__label">One-time Purchase</span>
                <span class="shop-radio__price"><?php echo esc_html($prod['full_price']); ?></span>
              </span>
            </label>
          </div>

          <!-- ADD TO CART button -->
          <button class="shop-card__atc" data-add-to-cart data-product-id="<?php echo esc_attr($prod['slug']); ?>">
            ADD TO CART
          </button>
        </div>
      </div>
      <?php endforeach; ?>

    </div>

  </div>
</section>

<?php
get_footer();
