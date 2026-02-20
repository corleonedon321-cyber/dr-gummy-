<?php
/**
 * Template Name: About Us
 * Slug: about
 *
 * Brand story, mission, certifications, stats, and team values.
 *
 * @package DR_Gummy
 */

get_header();

$certifications = [
    ['label' => 'ISO 9001:2015', 'sub' => 'Quality Management'],
    ['label' => 'NSF Certified', 'sub' => 'Product Testing'],
    ['label' => 'FDA Registered', 'sub' => 'Manufacturing Facility'],
    ['label' => 'GMP Certified', 'sub' => 'Good Manufacturing'],
    ['label' => 'Non-GMO', 'sub' => 'Verified Ingredients'],
    ['label' => 'Made in USA', 'sub' => 'Manufactured Domestically'],
];

$stats = [
    ['number' => '500K+', 'label' => 'Happy Customers'],
    ['number' => '4.9/5',  'label' => 'Average Rating'],
    ['number' => '12+',    'label' => 'Clinical Studies'],
    ['number' => '99.7%',  'label' => 'Purity Tested'],
];

$values = [
    [
        'icon'  => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        'title' => 'Science-First Formulation',
        'desc'  => 'Every ingredient is selected based on peer-reviewed clinical research. We use only patented, trademarked, and bioavailable forms — never generic fillers.',
    ],
    [
        'icon'  => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>',
        'title' => 'Radical Transparency',
        'desc'  => 'Full ingredient disclosure on every label — exact dosages, no proprietary blends. Third-party lab results published for every batch we manufacture.',
    ],
    [
        'icon'  => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
        'title' => 'Clinically Effective Dosages',
        'desc'  => 'We dose at the levels proven effective in human clinical trials — not the minimum to put it on the label. Real dosages for real results.',
    ],
    [
        'icon'  => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>',
        'title' => 'Customer Obsession',
        'desc'  => '60-day satisfaction guarantee, free shipping on bundles, responsive support within 24 hours, and a Subscribe & Save program that puts you in full control.',
    ],
];
?>

<section class="about-hero">
  <div class="about-hero__container container">
    <span class="about-hero__eyebrow">About Dr. Gummy</span>
    <h1 class="about-hero__title">Your Trusted Health Partner</h1>
    <p class="about-hero__subtitle">We believe wellness should be simple, effective, and backed by real science. Dr. Gummy creates medical-grade gummy supplements that deliver clinically proven ingredients in a form you'll actually enjoy taking — every single day.</p>
  </div>
</section>

<!-- ============================================================
     BRAND STORY
     ============================================================ -->
<section class="about-story section">
  <div class="about-story__container container">
    <div class="about-story__grid">
      <div class="about-story__image" style="background-color: var(--color-brand-green-dark);">
        <span class="about-story__image-label">DR GUMMY</span>
      </div>
      <div class="about-story__content">
        <h2 class="about-story__heading text-section-title">Our Story</h2>
        <p>Dr. Gummy was founded in 2021 by a team of nutraceutical scientists and wellness entrepreneurs who saw a fundamental problem in the supplement industry: most products contained under-dosed ingredients, hidden behind proprietary blends, manufactured in questionable facilities.</p>
        <p>We set out to build something different — a supplement brand that operates with pharmaceutical-grade rigor while delivering products people actually look forward to taking. Every formulation is developed in collaboration with board-certified physicians, tested in ISO-certified laboratories, and manufactured in FDA-registered, GMP-compliant facilities right here in the United States.</p>
        <p>Today, Dr. Gummy serves over 500,000 customers across the country, with a product line spanning sleep, focus, calm, beauty, energy, and anti-aging. Our mission remains the same: medical-grade wellness, reimagined.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     CERTIFICATIONS
     ============================================================ -->
<section class="about-certs section--sm bg-white">
  <div class="container">
    <h2 class="about-certs__heading text-section-title text-center">Certifications &amp; Standards</h2>
    <p class="about-certs__sub text-center">Every product meets the highest quality and safety benchmarks in the industry.</p>
    <div class="about-certs__grid">
      <?php foreach ($certifications as $cert) : ?>
      <div class="about-certs__item">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--color-brand-green-dark)" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        <div>
          <strong><?php echo esc_html($cert['label']); ?></strong>
          <span><?php echo esc_html($cert['sub']); ?></span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================================================
     STATS BAR
     ============================================================ -->
<section class="about-stats">
  <div class="about-stats__container container">
    <?php foreach ($stats as $stat) : ?>
    <div class="about-stats__item">
      <span class="about-stats__number"><?php echo esc_html($stat['number']); ?></span>
      <span class="about-stats__label"><?php echo esc_html($stat['label']); ?></span>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ============================================================
     TEAM VALUES
     ============================================================ -->
<section class="about-values section">
  <div class="container">
    <h2 class="about-values__heading text-section-title text-center">What We Stand For</h2>
    <p class="about-values__sub text-center">The principles that guide every product we formulate and every decision we make.</p>
    <div class="about-values__grid">
      <?php foreach ($values as $val) : ?>
      <div class="about-values__card">
        <div class="about-values__icon"><?php echo $val['icon']; ?></div>
        <h3 class="about-values__title"><?php echo esc_html($val['title']); ?></h3>
        <p class="about-values__desc"><?php echo esc_html($val['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================================================
     CTA
     ============================================================ -->
<section class="about-cta">
  <div class="about-cta__container container text-center">
    <h2 class="about-cta__heading">Ready to Feel the Difference?</h2>
    <p class="about-cta__sub">Join over 500,000 customers who trust Dr. Gummy for their daily wellness.</p>
    <div class="about-cta__buttons">
      <a href="/shop/" class="btn btn--primary btn--lg">Shop All Products</a>
      <a href="/bundle/" class="btn btn--outline btn--lg">Build Your Bundle</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
