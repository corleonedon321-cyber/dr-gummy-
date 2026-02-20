<?php
/**
 * Theme Header — Announcement Bar + Sticky Navigation
 *
 * @package DR_Gummy
 */

defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ============================================================
     1. ANNOUNCEMENT BAR
     ============================================================ -->
<div class="announcement-bar" id="announcement-bar" data-announcement-bar>
  <div class="announcement-bar__track">
    <span class="announcement-bar__message is-active" data-announcement-current>
      FREE SHIPPING ON ORDERS OVER $50 | GET 25% OFF &mdash; REGISTER YOUR EMAIL!
    </span>
  </div>
</div>

<!-- ============================================================
     2. NAVIGATION BAR
     ============================================================ -->
<header class="site-header" id="site-header">
  <div class="site-header__inner">

    <!-- Mobile: hamburger (left) -->
    <button class="site-header__hamburger" aria-label="<?php esc_attr_e('Open menu', 'dr-gummy'); ?>" data-menu-toggle>
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
        <line x1="3" y1="7" x2="21" y2="7"/>
        <line x1="3" y1="12" x2="21" y2="12"/>
        <line x1="3" y1="17" x2="21" y2="17"/>
      </svg>
    </button>

    <!-- Logo (left on desktop, center on mobile) -->
    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-header__logo" aria-label="<?php esc_attr_e('DR GUMMY — home', 'dr-gummy'); ?>">
      <?php if (has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <span class="site-header__wordmark">DR GUMMY</span>
      <?php endif; ?>
    </a>

    <!-- Desktop center nav links -->
    <nav class="site-header__nav" aria-label="<?php esc_attr_e('Main navigation', 'dr-gummy'); ?>">
      <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'site-header__menu',
        'fallback_cb'    => 'dr_gummy_fallback_menu',
        'depth'          => 2,
      ]);
      ?>
    </nav>

    <!-- Right action icons -->
    <div class="site-header__actions">
      <!-- Search -->
      <button class="site-header__icon-btn" aria-label="<?php esc_attr_e('Search', 'dr-gummy'); ?>" data-search-toggle>
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"/>
          <line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
      </button>

      <!-- Account -->
      <a href="<?php echo esc_url(function_exists('wc_get_account_endpoint_url') ? wc_get_account_endpoint_url('dashboard') : wp_login_url()); ?>" class="site-header__icon-btn" aria-label="<?php esc_attr_e('My account', 'dr-gummy'); ?>">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
          <circle cx="12" cy="7" r="4"/>
        </svg>
      </a>

      <!-- Cart -->
      <button class="site-header__icon-btn site-header__cart-btn" aria-label="<?php esc_attr_e('Shopping cart', 'dr-gummy'); ?>" data-cart-toggle>
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
          <line x1="3" y1="6" x2="21" y2="6"/>
          <path d="M16 10a4 4 0 0 1-8 0"/>
        </svg>
        <?php
        $cart_count = function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
        ?>
        <span class="site-header__cart-count<?php echo $cart_count === 0 ? ' is-hidden' : ''; ?>" data-cart-count><?php echo esc_html($cart_count); ?></span>
      </button>
    </div>

  </div>
</header>

<!-- ============================================================
     MOBILE NAVIGATION DRAWER
     ============================================================ -->
<div class="mobile-nav" id="mobile-nav" aria-hidden="true">
  <div class="mobile-nav__overlay" data-menu-toggle></div>
  <div class="mobile-nav__panel">
    <div class="mobile-nav__header">
      <span class="site-header__wordmark">DR GUMMY</span>
      <button class="mobile-nav__close" aria-label="<?php esc_attr_e('Close menu', 'dr-gummy'); ?>" data-menu-toggle>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
          <line x1="18" y1="6" x2="6" y2="18"/>
          <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
      </button>
    </div>
    <?php
    wp_nav_menu([
      'theme_location' => 'primary',
      'container'      => false,
      'menu_class'     => 'mobile-nav__menu',
      'fallback_cb'    => 'dr_gummy_fallback_menu_mobile',
      'depth'          => 2,
    ]);
    ?>
    <div class="mobile-nav__bottom">
      <a href="<?php echo esc_url(function_exists('wc_get_account_endpoint_url') ? wc_get_account_endpoint_url('dashboard') : wp_login_url()); ?>" class="mobile-nav__account-link">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        My Account
      </a>
    </div>
  </div>
</div>

<!-- ============================================================
     SEARCH OVERLAY
     ============================================================ -->
<div class="search-overlay" id="search-overlay" aria-hidden="true">
  <div class="search-overlay__backdrop" data-search-toggle></div>
  <div class="search-overlay__box">
    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="search-overlay__form">
      <input type="search" class="search-overlay__input" name="s" placeholder="Search products&hellip;" autocomplete="off" />
      <button type="submit" class="search-overlay__submit btn btn--primary" aria-label="<?php esc_attr_e('Search', 'dr-gummy'); ?>">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      </button>
    </form>
  </div>
</div>

<main id="main-content" class="site-main">
