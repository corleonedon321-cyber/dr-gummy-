<?php
/**
 * DR GUMMY Theme functions and definitions.
 *
 * @package DR_Gummy
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

define('DR_GUMMY_VERSION', '1.0.0');
define('DR_GUMMY_DIR', get_template_directory());
define('DR_GUMMY_URI', get_template_directory_uri());

/* ==========================================================================
   THEME SETUP
   ========================================================================== */

add_action('after_setup_theme', function () {
    // Enable featured images
    add_theme_support('post-thumbnails');

    // Title tag support
    add_theme_support('title-tag');

    // HTML5 markup
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    // Custom logo
    add_theme_support('custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    // WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Register navigation menus
    register_nav_menus([
        'primary'    => __('Primary Navigation', 'dr-gummy'),
        'footer'     => __('Footer Navigation', 'dr-gummy'),
        'legal'      => __('Legal Pages', 'dr-gummy'),
    ]);
});

/* ==========================================================================
   ENQUEUE STYLES & SCRIPTS
   ========================================================================== */

add_action('wp_enqueue_scripts', function () {
    // Google Fonts — DM Sans, Inter, DM Serif Display
    wp_enqueue_style(
        'dr-gummy-google-fonts',
        'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=DM+Serif+Display&family=Inter:wght@400;500;600;700&display=swap',
        [],
        null
    );

    // Main theme stylesheet
    wp_enqueue_style(
        'dr-gummy-style',
        get_stylesheet_uri(),
        ['dr-gummy-google-fonts'],
        DR_GUMMY_VERSION
    );

    // Page-specific styles (loaded conditionally)
    if (is_front_page()) {
        wp_enqueue_style('dr-gummy-home', DR_GUMMY_URI . '/assets/css/home.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
        wp_enqueue_script('dr-gummy-home', DR_GUMMY_URI . '/assets/js/home.js', [], DR_GUMMY_VERSION, true);
    }

    if (
        (function_exists('is_shop') && (is_shop() || is_product_category()))
        || is_page_template('page-shop.php')
        || is_page('shop')
    ) {
        wp_enqueue_style('dr-gummy-shop', DR_GUMMY_URI . '/assets/css/shop.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
        wp_enqueue_script('dr-gummy-shop', DR_GUMMY_URI . '/assets/js/shop.js', [], DR_GUMMY_VERSION, true);
    }

    if (function_exists('is_product') && is_product()) {
        wp_enqueue_style('dr-gummy-product', DR_GUMMY_URI . '/assets/css/product.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
        wp_enqueue_script('dr-gummy-product', DR_GUMMY_URI . '/assets/js/product.js', [], DR_GUMMY_VERSION, true);
    }

    if (is_page_template('page-bundle.php') || is_page('bundle')) {
        wp_enqueue_style('dr-gummy-bundle', DR_GUMMY_URI . '/assets/css/bundle.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
        wp_enqueue_script('dr-gummy-bundle', DR_GUMMY_URI . '/assets/js/bundle.js', [], DR_GUMMY_VERSION, true);
    }

    if (function_exists('is_account_page') && is_account_page()) {
        wp_enqueue_style('dr-gummy-account', DR_GUMMY_URI . '/assets/css/account.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
    }

    // Cart drawer (global — available on every page)
    wp_enqueue_style('dr-gummy-cart-drawer', DR_GUMMY_URI . '/assets/css/cart-drawer.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
    wp_enqueue_script(
        'dr-gummy-cart-drawer',
        DR_GUMMY_URI . '/assets/js/cart-drawer.js',
        [],
        DR_GUMMY_VERSION,
        true
    );

    wp_enqueue_script(
        'dr-gummy-popups',
        DR_GUMMY_URI . '/assets/js/popups.js',
        [],
        DR_GUMMY_VERSION,
        true
    );

    wp_enqueue_script(
        'dr-gummy-toggles',
        DR_GUMMY_URI . '/assets/js/toggles.js',
        [],
        DR_GUMMY_VERSION,
        true
    );

    wp_enqueue_script(
        'dr-gummy-announcement-bar',
        DR_GUMMY_URI . '/assets/js/announcement-bar.js',
        [],
        DR_GUMMY_VERSION,
        true
    );

    // Pass WP/Woo data to JS
    wp_localize_script('dr-gummy-cart-drawer', 'drGummy', [
        'ajaxUrl'  => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('dr_gummy_nonce'),
        'cartUrl'  => function_exists('wc_get_cart_url') ? wc_get_cart_url() : '',
        'shopUrl'  => function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : '',
    ]);
});

/* ==========================================================================
   CUSTOM POST TYPES
   ========================================================================== */

add_action('init', function () {
    // FAQ post type
    register_post_type('faq', [
        'labels' => [
            'name'          => __('FAQs', 'dr-gummy'),
            'singular_name' => __('FAQ', 'dr-gummy'),
            'add_new_item'  => __('Add New FAQ', 'dr-gummy'),
            'edit_item'     => __('Edit FAQ', 'dr-gummy'),
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'faqs'],
        'menu_icon'    => 'dashicons-editor-help',
        'supports'     => ['title', 'editor', 'page-attributes'],
        'show_in_rest' => true,
    ]);

    // FAQ Category taxonomy
    register_taxonomy('faq_category', 'faq', [
        'labels' => [
            'name'          => __('FAQ Categories', 'dr-gummy'),
            'singular_name' => __('FAQ Category', 'dr-gummy'),
        ],
        'hierarchical' => true,
        'rewrite'      => ['slug' => 'faq-category'],
        'show_in_rest' => true,
    ]);

    // Science / Ingredient post type
    register_post_type('science', [
        'labels' => [
            'name'          => __('Science', 'dr-gummy'),
            'singular_name' => __('Science Article', 'dr-gummy'),
            'add_new_item'  => __('Add Science Article', 'dr-gummy'),
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'science'],
        'menu_icon'    => 'dashicons-microscope',
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
    ]);
});

/* ==========================================================================
   WOOCOMMERCE CUSTOMIZATIONS
   ========================================================================== */

// Remove default WooCommerce wrapper
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', function () {
    echo '<main class="woocommerce-main container">';
});

add_action('woocommerce_after_main_content', function () {
    echo '</main>';
});

// Cart fragments for AJAX cart count updates
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    $count = WC()->cart->get_cart_contents_count();
    $fragments['.badge--cart'] = '<span class="badge badge--cart">' . esc_html($count) . '</span>';
    return $fragments;
});

/* ==========================================================================
   HELPER FUNCTIONS
   ========================================================================== */

/**
 * Fallback menu for primary nav (desktop) — shown when no WP menu is assigned.
 */
function dr_gummy_fallback_menu(): void {
    ?>
    <ul class="site-header__menu">
      <li class="menu-item menu-item-has-children"><a href="/shop/">Shop+</a>
        <ul class="sub-menu">
          <li><a href="/product/beauty-boost-gummies/">Beauty Boost Gummies</a></li>
          <li><a href="/product/ultra-focus-gummies/">Ultra Focus Gummies</a></li>
          <li><a href="/product/energy-workout-booster-gummies/">Energy Booster Gummies</a></li>
          <li><a href="/product/anti-aging-gummies/">Anti-Aging Gummies</a></li>
        </ul>
      </li>
      <li class="menu-item"><a href="/about/">About</a></li>
      <li class="menu-item"><a href="/science/">Science</a></li>
      <li class="menu-item"><a href="/bundle/">Bundle</a></li>
      <li class="menu-item"><a href="/blog/">Blog</a></li>
      <li class="menu-item"><a href="/contact/">Contact</a></li>
    </ul>
    <?php
}

/**
 * Fallback menu for primary nav (mobile).
 */
function dr_gummy_fallback_menu_mobile(): void {
    ?>
    <ul class="mobile-nav__menu">
      <li><a href="/shop/">Shop</a></li>
      <li><a href="/about/">About</a></li>
      <li><a href="/science/">Science</a></li>
      <li><a href="/bundle/">Bundle</a></li>
      <li><a href="/blog/">Blog</a></li>
      <li><a href="/contact/">Contact</a></li>
      <li><a href="/faqs/">FAQs</a></li>
    </ul>
    <?php
}

/**
 * Load a component partial from the /components/ directory.
 *
 * @param string $name Component filename (without .php).
 * @param array  $args Variables to pass to the component.
 */
function dr_gummy_component(string $name, array $args = []): void {
    $file = DR_GUMMY_DIR . '/components/' . $name . '.php';
    if (file_exists($file)) {
        extract($args, EXTR_SKIP);
        include $file;
    }
}

/**
 * Render star rating HTML.
 *
 * @param float $rating Rating value (0-5).
 * @param int   $count  Number of reviews.
 * @return string HTML markup.
 */
function dr_gummy_star_rating(float $rating = 5.0, int $count = 0): string {
    $full_stars = (int) floor($rating);
    $html = '<div class="star-rating"><span class="star-rating__stars">';
    for ($i = 0; $i < 5; $i++) {
        if ($i < $full_stars) {
            $html .= '<svg viewBox="0 0 20 20" aria-hidden="true"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>';
        } else {
            $html .= '<svg viewBox="0 0 20 20" aria-hidden="true" style="opacity:0.25"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>';
        }
    }
    $html .= '</span>';
    if ($count > 0) {
        $html .= '<span class="star-rating__count">(' . esc_html($count) . ')</span>';
    }
    $html .= '</div>';
    return $html;
}
