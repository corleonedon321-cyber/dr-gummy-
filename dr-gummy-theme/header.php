
<?php
/**
 * Theme Header
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

<!-- Announcement Bar -->
<div class="announcement-bar" data-announcement-bar>
  <div class="announcement-bar__message" data-announcement-current>
    FREE SHIPPING ON ORDERS OVER $50 | GET 25% OFF &mdash; REGISTER YOUR EMAIL!
  </div>
</div>

<!-- Site Header / Navigation -->
<header class="site-header" id="site-header">
  <div class="container">
    <nav class="site-nav flex items-center justify-between" aria-label="<?php esc_attr_e('Primary navigation', 'dr-gummy'); ?>">

      <!-- Mobile hamburger -->
      <button class="site-nav__toggle md:hidden" aria-label="<?php esc_attr_e('Open menu', 'dr-gummy'); ?>" data-menu-toggle>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="3" y1="6" x2="21" y2="6"/>
          <line x1="3" y1="12" x2="21" y2="12"/>
          <line x1="3" y1="18" x2="21" y2="18"/>
        </svg>
      </button>

      <!-- Logo -->
      <a href="<?php echo esc_url(home_url('/')); ?>" class="site-nav__logo" aria-label="<?php esc_attr_e('DR GUMMY home', 'dr-gummy'); ?>">
        <?php if (has_custom_logo()) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <span class="site-nav__wordmark">DR GUMMY</span>
        <?php endif; ?>
      </a>

      <!-- Desktop menu -->
      <div class="site-nav__links md:flex">
        <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => 'site-nav__menu flex items-center gap-6',
          'fallback_cb'    => false,
          'depth'          => 2,
        ]);
        ?>
      </div>

      <!-- Right icons -->
      <div class="site-nav__actions flex items-center gap-4">
        <!-- Search -->
        <button class="site-nav__icon" aria-label="<?php esc_attr_e('Search', 'dr-gummy'); ?>" data-search-toggle>
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"/>
            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
          </svg>
        </button>

        <!-- Account -->
        <a href="<?php echo esc_url(function_exists('wc_get_account_endpoint_url') ? wc_get_account_endpoint_url('dashboard') : wp_login_url()); ?>" class="site-nav__icon" aria-label="<?php esc_attr_e('Account', 'dr-gummy'); ?>">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
            <circle cx="12" cy="7" r="4"/>
          </svg>
        </a>

        <!-- Cart -->
        <button class="site-nav__icon relative" aria-label="<?php esc_attr_e('Cart', 'dr-gummy'); ?>" data-cart-toggle>
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
            <line x1="3" y1="6" x2="21" y2="6"/>
            <path d="M16 10a4 4 0 0 1-8 0"/>
          </svg>
          <?php if (function_exists('WC') && WC()->cart) : ?>
            <span class="badge badge--cart"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
          <?php endif; ?>
        </button>
      </div>

    </nav>
  </div>
</header>

<!-- Mobile Navigation Drawer -->
<div class="mobile-nav" id="mobile-nav" aria-hidden="true">
  <div class="mobile-nav__overlay" data-menu-toggle></div>
  <div class="mobile-nav__panel">
    <button class="mobile-nav__close" aria-label="<?php esc_attr_e('Close menu', 'dr-gummy'); ?>" data-menu-toggle>
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <line x1="18" y1="6" x2="6" y2="18"/>
        <line x1="6" y1="6" x2="18" y2="18"/>
      </svg>
    </button>
    <?php
    wp_nav_menu([
      'theme_location' => 'primary',
      'container'      => false,
      'menu_class'     => 'mobile-nav__menu',
      'fallback_cb'    => false,
      'depth'          => 2,
    ]);
    ?>
  </div>
</div>

<main id="main-content" class="site-main">
