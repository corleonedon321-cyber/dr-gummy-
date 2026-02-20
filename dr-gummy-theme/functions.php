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
   WIDGET AREAS
   ========================================================================== */

add_action('widgets_init', function () {
    register_sidebar([
        'name'          => __('Blog Sidebar', 'dr-gummy'),
        'id'            => 'sidebar-blog',
        'description'   => __('Widgets shown on the blog page sidebar.', 'dr-gummy'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget__title">',
        'after_title'   => '</h3>',
    ]);

    register_sidebar([
        'name'          => __('Shop Sidebar', 'dr-gummy'),
        'id'            => 'sidebar-shop',
        'description'   => __('Widgets shown on the shop page sidebar.', 'dr-gummy'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget__title">',
        'after_title'   => '</h3>',
    ]);

    register_sidebar([
        'name'          => __('Footer Widgets', 'dr-gummy'),
        'id'            => 'sidebar-footer',
        'description'   => __('Widgets shown in the footer area.', 'dr-gummy'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget__title">',
        'after_title'   => '</h4>',
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
        wp_enqueue_style('dr-gummy-sticky-atc', DR_GUMMY_URI . '/assets/css/sticky-atc.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
        wp_enqueue_script('dr-gummy-sticky-atc', DR_GUMMY_URI . '/assets/js/sticky-atc.js', [], DR_GUMMY_VERSION, true);
    }

    if (is_page_template('page-bundle.php') || is_page('bundle')) {
        wp_enqueue_style('dr-gummy-bundle', DR_GUMMY_URI . '/assets/css/bundle.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
        wp_enqueue_script('dr-gummy-bundle', DR_GUMMY_URI . '/assets/js/bundle.js', [], DR_GUMMY_VERSION, true);
    }

    if (function_exists('is_account_page') && is_account_page()) {
        wp_enqueue_style('dr-gummy-account', DR_GUMMY_URI . '/assets/css/account.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
    }

    if (is_page_template('page-legal.php') || is_page('legal')) {
        wp_enqueue_style('dr-gummy-legal', DR_GUMMY_URI . '/assets/css/legal.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
        wp_enqueue_script('dr-gummy-legal', DR_GUMMY_URI . '/assets/js/legal.js', [], DR_GUMMY_VERSION, true);
    }

    if (is_page_template('page-about.php') || is_page('about')) {
        wp_enqueue_style('dr-gummy-about', DR_GUMMY_URI . '/assets/css/about.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
    }

    if (is_page_template('page-science.php') || is_page('science')) {
        wp_enqueue_style('dr-gummy-science', DR_GUMMY_URI . '/assets/css/science.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
    }

    if (is_page_template('page-blog.php') || is_page('blog')) {
        wp_enqueue_style('dr-gummy-blog', DR_GUMMY_URI . '/assets/css/blog.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
        wp_enqueue_script('dr-gummy-blog', DR_GUMMY_URI . '/assets/js/blog.js', [], DR_GUMMY_VERSION, true);
    }

    if (is_page_template('page-faqs.php') || is_page('faqs')) {
        wp_enqueue_style('dr-gummy-faqs', DR_GUMMY_URI . '/assets/css/faqs.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
        wp_enqueue_script('dr-gummy-faqs', DR_GUMMY_URI . '/assets/js/faqs.js', [], DR_GUMMY_VERSION, true);
    }

    if (is_page_template('page-contact.php') || is_page('contact')) {
        wp_enqueue_style('dr-gummy-contact', DR_GUMMY_URI . '/assets/css/contact.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
        wp_enqueue_script('dr-gummy-contact', DR_GUMMY_URI . '/assets/js/contact.js', [], DR_GUMMY_VERSION, true);
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

    // Social proof popup (global)
    wp_enqueue_style('dr-gummy-social-proof', DR_GUMMY_URI . '/assets/css/social-proof.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
    wp_enqueue_script('dr-gummy-social-proof', DR_GUMMY_URI . '/assets/js/social-proof.js', [], DR_GUMMY_VERSION, true);

    // Cookie consent banner (global)
    wp_enqueue_style('dr-gummy-cookie-consent', DR_GUMMY_URI . '/assets/css/cookie-consent.css', ['dr-gummy-style'], DR_GUMMY_VERSION);
    wp_enqueue_script('dr-gummy-cookie-consent', DR_GUMMY_URI . '/assets/js/cookie-consent.js', [], DR_GUMMY_VERSION, true);

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

/* ==========================================================================
   SEO META TAGS
   ========================================================================== */

add_action('wp_head', function () {
    $meta = [];

    if (is_front_page()) {
        $meta = [
            'title'       => 'DR GUMMY — Medical-Grade Wellness Gummies | Doctor Formulated',
            'description' => 'Clinically dosed, doctor-formulated gummy supplements for sleep, focus, stress relief, and beauty. Third-party tested. Free shipping over $50.',
        ];
    } elseif (is_page('shop') || (function_exists('is_shop') && is_shop())) {
        $meta = [
            'title'       => 'Shop All Products — DR GUMMY',
            'description' => 'Browse our full line of medical-grade gummy supplements. Sleep, Focus, Chill, Glow, Energy & Anti-Aging formulas. Subscribe & save 20%.',
        ];
    } elseif (function_exists('is_product') && is_product()) {
        $meta = [
            'description' => 'Clinically dosed, doctor-formulated gummy supplement. Third-party tested, non-GMO, made in the USA. Subscribe & save 20%.',
        ];
    } elseif (is_page('bundle')) {
        $meta = [
            'title'       => 'Build Your Bundle — Save Up To 25% | DR GUMMY',
            'description' => 'Mix and match your favorite DR GUMMY supplements. Buy more, save more — up to 25% off when you bundle 4+ products.',
        ];
    } elseif (is_page('about')) {
        $meta = [
            'title'       => 'About Us — Our Mission | DR GUMMY',
            'description' => 'Learn about DR GUMMY\'s mission to create medical-grade wellness supplements. Doctor-formulated, clinically dosed, third-party tested.',
        ];
    } elseif (is_page('science')) {
        $meta = [
            'title'       => 'The Science Behind DR GUMMY | Research & Formulation',
            'description' => 'Explore the clinical research, premium ingredients, and rigorous testing behind every DR GUMMY product. Transparency you can trust.',
        ];
    } elseif (is_page('blog')) {
        $meta = [
            'title'       => 'Wellness Blog — Tips, Science & Insights | DR GUMMY',
            'description' => 'Expert articles on sleep, focus, stress management, beauty, and nutrition. Stay informed with the latest wellness research.',
        ];
    } elseif (is_page('faqs')) {
        $meta = [
            'title'       => 'Frequently Asked Questions | DR GUMMY',
            'description' => 'Find answers about DR GUMMY products, ingredients, dosage, shipping, returns, and subscriptions. We\'re here to help.',
        ];
    } elseif (is_page('contact')) {
        $meta = [
            'title'       => 'Contact Us — Get in Touch | DR GUMMY',
            'description' => 'Have questions? Reach out to the DR GUMMY team. We respond within 24 hours. Email, phone, or use our contact form.',
        ];
    } elseif (is_page('legal')) {
        $meta = [
            'title'       => 'Legal — Privacy Policy, Terms & Conditions | DR GUMMY',
            'description' => 'Read DR GUMMY\'s privacy policy, terms of service, cookie policy, return policy, and legal disclaimers.',
        ];
    }

    if (!empty($meta['description'])) {
        echo '<meta name="description" content="' . esc_attr($meta['description']) . '">' . "\n";
    }
    if (!empty($meta['title'])) {
        echo '<meta property="og:title" content="' . esc_attr($meta['title']) . '">' . "\n";
    }
    if (!empty($meta['description'])) {
        echo '<meta property="og:description" content="' . esc_attr($meta['description']) . '">' . "\n";
    }
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:site_name" content="DR GUMMY">' . "\n";
}, 1);

/* ==========================================================================
   SCHEMA.ORG STRUCTURED DATA
   ========================================================================== */

add_action('wp_head', function () {
    // Organization schema (global)
    $org_schema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'Organization',
        'name'        => 'Dr. Gummy LLC',
        'url'         => home_url('/'),
        'logo'        => DR_GUMMY_URI . '/assets/images/logo.png',
        'description' => 'Medical-Grade Wellness, Reimagined. Doctor-formulated gummy supplements.',
        'address'     => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => '1209 Orange Street',
            'addressLocality' => 'Wilmington',
            'addressRegion'   => 'DE',
            'postalCode'      => '19801',
            'addressCountry'  => 'US',
        ],
        'contactPoint' => [
            '@type'             => 'ContactPoint',
            'telephone'         => '+1-800-555-4869',
            'contactType'       => 'customer service',
            'availableLanguage' => 'English',
        ],
        'sameAs' => [],
    ];
    echo '<script type="application/ld+json">' . wp_json_encode($org_schema, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";

    // Product schema on single product pages
    if (function_exists('is_product') && is_product()) {
        $product_schemas = [
            'sleep' => ['name' => 'Dr. Gummy Sleep', 'price' => '45.00', 'rating' => '4.9', 'reviews' => 127, 'desc' => 'Restful Sleep Support. Clinical Formulation with Melatonin, L-Theanine, Magnesium Glycinate & Chamomile.'],
            'chill' => ['name' => 'Dr. Gummy Chill', 'price' => '45.00', 'rating' => '4.8', 'reviews' => 98,  'desc' => 'Stress Relief & Calm. Clinical Formulation with Ashwagandha KSM-66, L-Theanine, Lemon Balm & GABA.'],
            'focus' => ['name' => 'Dr. Gummy Focus', 'price' => '45.00', 'rating' => '4.9', 'reviews' => 156, 'desc' => 'Mental Clarity & Concentration. Clinical Formulation with Lion\'s Mane, Bacopa Monnieri, Alpha-GPC & Ginkgo Biloba.'],
            'glow'  => ['name' => 'Dr. Gummy Glow',  'price' => '45.00', 'rating' => '4.8', 'reviews' => 112, 'desc' => 'Radiant Skin & Beauty. Clinical Formulation with Biotin, Hyaluronic Acid, Vitamin E & Vitamin C.'],
        ];

        $slug = get_post_field('post_name', get_the_ID());
        $matched = '';
        foreach (array_keys($product_schemas) as $key) {
            if ($slug === $key || strpos($slug, $key) === 0) {
                $matched = $key;
                break;
            }
        }
        if (!$matched) $matched = 'sleep';
        $ps = $product_schemas[$matched];

        $product_ld = [
            '@context'    => 'https://schema.org',
            '@type'       => 'Product',
            'name'        => $ps['name'],
            'description' => $ps['desc'],
            'brand'       => ['@type' => 'Brand', 'name' => 'DR GUMMY'],
            'offers'      => [
                '@type'         => 'Offer',
                'price'         => $ps['price'],
                'priceCurrency' => 'USD',
                'availability'  => 'https://schema.org/InStock',
                'seller'        => ['@type' => 'Organization', 'name' => 'Dr. Gummy LLC'],
            ],
            'aggregateRating' => [
                '@type'       => 'AggregateRating',
                'ratingValue' => $ps['rating'],
                'reviewCount' => $ps['reviews'],
                'bestRating'  => '5',
                'worstRating' => '1',
            ],
        ];
        echo '<script type="application/ld+json">' . wp_json_encode($product_ld, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }

    // FAQ schema on FAQ page
    if (is_page('faqs') || is_page_template('page-faqs.php')) {
        $faq_items = [
            ['q' => 'What are DR GUMMY supplements made from?', 'a' => 'Our gummies are made with clinically dosed, premium ingredients. They are non-GMO, gluten-free, and manufactured in FDA-registered, GMP-certified facilities in the USA.'],
            ['q' => 'How many gummies should I take per day?', 'a' => 'The standard serving size is 2 gummies per day. Always follow the dosage instructions on the specific product label.'],
            ['q' => 'Do you offer free shipping?', 'a' => 'Yes! We offer free standard shipping on all orders over $50 within the continental United States.'],
            ['q' => 'What is your return policy?', 'a' => 'We offer a 30-day money-back guarantee. If you are not satisfied, contact us for a full refund on your first order.'],
            ['q' => 'How does the subscription work?', 'a' => 'Subscribe & Save gives you 20% off every order. Choose delivery every 30, 45, or 60 days. Cancel, pause, or modify anytime from your account.'],
        ];

        $faq_ld = [
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => [],
        ];
        foreach ($faq_items as $faq) {
            $faq_ld['mainEntity'][] = [
                '@type' => 'Question',
                'name'  => $faq['q'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => $faq['a'],
                ],
            ];
        }
        echo '<script type="application/ld+json">' . wp_json_encode($faq_ld, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
}, 2);
