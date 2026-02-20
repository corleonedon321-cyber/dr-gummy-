<?php
/**
 * Home Page Template (front-page.php)
 *
 * @package DR_Gummy
 */

get_header();
?>

<!-- ============================================================
     SECTION 1: HERO
     ============================================================ -->
<section class="hero">
  <div class="hero__inner">
    <!-- Left: copy -->
    <div class="hero__content">
      <p class="hero__badge">MEDICAL-GRADE SUPPLEMENTS</p>
      <h1 class="hero__heading">Medical-Grade<br>Wellness, Reimagined.</h1>
      <p class="hero__sub">Science-backed gummy supplements formulated by doctors, loved by everyone.</p>
      <div class="hero__cta-group">
        <a href="/bundle/" class="btn btn--primary btn--pill btn--lg">Start My Bundle</a>
        <a href="/shop/" class="btn btn--outline-gray btn--pill btn--lg">Shop All</a>
      </div>
      <div class="hero__trust">
        <div class="hero__trust-stars">
          <?php echo dr_gummy_star_rating(5.0, 0); ?>
        </div>
        <span class="hero__trust-text">Trusted by 50,000+ customers</span>
      </div>
    </div>

    <!-- Right: lifestyle image placeholder -->
    <div class="hero__media">
      <div class="hero__image-placeholder">
        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="rgba(46,87,53,0.2)" stroke-width="1">
          <rect x="3" y="3" width="18" height="18" rx="2"/>
          <circle cx="8.5" cy="8.5" r="1.5"/>
          <polyline points="21 15 16 10 5 21"/>
        </svg>
        <span>Lifestyle Photo</span>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     SECTION 2: CORE FOUR ESSENTIALS
     ============================================================ -->
<section class="core-four">
  <div class="core-four__container">
    <h2 class="section-title">CORE FOUR ESSENTIALS</h2>
    <p class="section-subtitle">Our best-selling formulas, trusted by doctors and backed by science.</p>

    <div class="core-four__grid">

      <!-- Card 1: Sleep -->
      <div class="product-card">
        <div class="product-card__image">
          <div class="product-card__placeholder product-card__placeholder--sleep">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
          </div>
        </div>
        <div class="product-card__body">
          <h3 class="product-card__name">SLEEP GUMMIES</h3>
          <p class="product-card__ingredients">Melatonin, Chamomile</p>
          <div class="product-card__rating">
            <?php echo dr_gummy_star_rating(5.0, 124); ?>
          </div>
          <div class="product-card__price-row">
            <span class="product-card__price">$39.00</span>
          </div>
          <button class="btn btn--primary btn--full btn--pill product-card__add" data-product-id="sleep">Quick Add</button>
        </div>
      </div>

      <!-- Card 2: Chill -->
      <div class="product-card">
        <div class="product-card__image">
          <div class="product-card__placeholder product-card__placeholder--chill">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          </div>
        </div>
        <div class="product-card__body">
          <h3 class="product-card__name">CHILL GUMMIES</h3>
          <p class="product-card__ingredients">Ashwagandha, L-Theanine</p>
          <div class="product-card__rating">
            <?php echo dr_gummy_star_rating(5.0, 98); ?>
          </div>
          <div class="product-card__price-row">
            <span class="product-card__price">$39.00</span>
          </div>
          <button class="btn btn--primary btn--full btn--pill product-card__add" data-product-id="chill">Quick Add</button>
        </div>
      </div>

      <!-- Card 3: Glow -->
      <div class="product-card">
        <div class="product-card__image">
          <div class="product-card__placeholder product-card__placeholder--glow">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
          </div>
        </div>
        <div class="product-card__body">
          <h3 class="product-card__name">GLOW GUMMIES</h3>
          <p class="product-card__ingredients">Biotin, Collagen</p>
          <div class="product-card__rating">
            <?php echo dr_gummy_star_rating(5.0, 156); ?>
          </div>
          <div class="product-card__price-row">
            <span class="product-card__price">$39.00</span>
          </div>
          <button class="btn btn--primary btn--full btn--pill product-card__add" data-product-id="glow">Quick Add</button>
        </div>
      </div>

      <!-- Card 4: Focus -->
      <div class="product-card">
        <div class="product-card__image">
          <div class="product-card__placeholder product-card__placeholder--focus">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </div>
        </div>
        <div class="product-card__body">
          <h3 class="product-card__name">FOCUS GUMMIES</h3>
          <p class="product-card__ingredients">Lion&rsquo;s Mane, B12</p>
          <div class="product-card__rating">
            <?php echo dr_gummy_star_rating(5.0, 87); ?>
          </div>
          <div class="product-card__price-row">
            <span class="product-card__price">$39.00</span>
          </div>
          <button class="btn btn--primary btn--full btn--pill product-card__add" data-product-id="focus">Quick Add</button>
        </div>
      </div>

    </div>

    <div class="core-four__cta">
      <a href="/shop/" class="btn btn--outline btn--pill btn--lg">View All Products</a>
    </div>
  </div>
</section>

<!-- ============================================================
     SECTION 3: SCIENCE BADGE BAR
     ============================================================ -->
<section class="science-bar">
  <div class="science-bar__container">
    <h2 class="section-title">THE SCIENCE OF DR. GUMMY</h2>
    <p class="section-subtitle">Every gummy is formulated to the highest clinical standards.</p>

    <div class="science-bar__grid">
      <div class="science-badge">
        <div class="science-badge__icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
        </div>
        <h4 class="science-badge__title">NON-GMO</h4>
        <p class="science-badge__desc">Certified non-genetically modified ingredients</p>
      </div>

      <div class="science-badge">
        <div class="science-badge__icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 22c-4.97 0-9-2.24-9-5v-3c0-2.76 4.03-5 9-5s9 2.24 9 5v3c0 2.76-4.03 5-9 5z"/><path d="M12 9c-1-4-4-6-4-6s3-1 4 0 4 6 4 6"/><circle cx="12" cy="14" r="1"/></svg>
        </div>
        <h4 class="science-badge__title">VEGAN</h4>
        <p class="science-badge__desc">100% plant-based, no animal-derived ingredients</p>
      </div>

      <div class="science-badge">
        <div class="science-badge__icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
        </div>
        <h4 class="science-badge__title">SUGAR-FREE</h4>
        <p class="science-badge__desc">Zero added sugar, naturally sweetened</p>
      </div>

      <div class="science-badge">
        <div class="science-badge__icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 2l20 20"/><path d="M6.7 6.7C3.4 8.2 2 12 2 12s4 8 10 8c1.7 0 3.2-.5 4.5-1.2"/><path d="M17.3 17.3C20.6 15.8 22 12 22 12s-4-8-10-8c-1.7 0-3.2.5-4.5 1.2"/></svg>
        </div>
        <h4 class="science-badge__title">GLUTEN-FREE</h4>
        <p class="science-badge__desc">Safe for gluten-sensitive individuals</p>
      </div>

      <div class="science-badge">
        <div class="science-badge__icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        </div>
        <h4 class="science-badge__title">ISO CERTIFIED</h4>
        <p class="science-badge__desc">Manufactured in ISO 22000 certified facilities</p>
      </div>

      <div class="science-badge">
        <div class="science-badge__icon">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
        </div>
        <h4 class="science-badge__title">LAB TESTED</h4>
        <p class="science-badge__desc">Third-party verified for purity &amp; potency</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     SECTION 4: CERTIFICATION LOGO BAR
     ============================================================ -->
<section class="cert-bar">
  <div class="cert-bar__container">
    <div class="cert-bar__item">
      <div class="cert-bar__logo-placeholder">ISO</div>
      <span>ISO 22000</span>
    </div>
    <div class="cert-bar__item">
      <div class="cert-bar__logo-placeholder">NSF</div>
      <span>NSF Certified</span>
    </div>
    <div class="cert-bar__item">
      <div class="cert-bar__logo-placeholder">FDA</div>
      <span>FDA Registered</span>
    </div>
    <div class="cert-bar__item">
      <div class="cert-bar__logo-placeholder">EF</div>
      <span>Eurofins Tested</span>
    </div>
    <div class="cert-bar__item">
      <div class="cert-bar__logo-placeholder">GMP</div>
      <span>GMP Certified</span>
    </div>
  </div>
</section>

<!-- ============================================================
     SECTION 5: CUSTOMER REVIEWS CAROUSEL
     ============================================================ -->
<section class="reviews">
  <div class="reviews__container">
    <h2 class="section-title">WHAT OUR CUSTOMERS SAY</h2>
    <p class="section-subtitle">Real results from real people.</p>

    <div class="reviews__track" data-reviews-track>
      <div class="review-card">
        <div class="review-card__stars"><?php echo dr_gummy_star_rating(5.0, 0); ?></div>
        <p class="review-card__text">&ldquo;I&rsquo;ve tried every sleep supplement on the market. These gummies are the only ones that actually work without making me groggy.&rdquo;</p>
        <div class="review-card__author">
          <div class="review-card__avatar">S</div>
          <div>
            <strong>Sarah M.</strong>
            <span class="review-card__verified">Verified Buyer</span>
          </div>
        </div>
      </div>

      <div class="review-card">
        <div class="review-card__stars"><?php echo dr_gummy_star_rating(5.0, 0); ?></div>
        <p class="review-card__text">&ldquo;The Focus Gummies are a game-changer for my work days. Sharp, clear focus without the jitters of coffee.&rdquo;</p>
        <div class="review-card__author">
          <div class="review-card__avatar">J</div>
          <div>
            <strong>James R.</strong>
            <span class="review-card__verified">Verified Buyer</span>
          </div>
        </div>
      </div>

      <div class="review-card">
        <div class="review-card__stars"><?php echo dr_gummy_star_rating(5.0, 0); ?></div>
        <p class="review-card__text">&ldquo;My skin has never looked better. The Glow Gummies deliver real results in just 3 weeks. Obsessed!&rdquo;</p>
        <div class="review-card__author">
          <div class="review-card__avatar">A</div>
          <div>
            <strong>Aisha K.</strong>
            <span class="review-card__verified">Verified Buyer</span>
          </div>
        </div>
      </div>

      <div class="review-card">
        <div class="review-card__stars"><?php echo dr_gummy_star_rating(5.0, 0); ?></div>
        <p class="review-card__text">&ldquo;Finally a supplement brand that's transparent about their ingredients. The Chill Gummies keep my anxiety at bay.&rdquo;</p>
        <div class="review-card__author">
          <div class="review-card__avatar">M</div>
          <div>
            <strong>Marcus T.</strong>
            <span class="review-card__verified">Verified Buyer</span>
          </div>
        </div>
      </div>

      <div class="review-card">
        <div class="review-card__stars"><?php echo dr_gummy_star_rating(5.0, 0); ?></div>
        <p class="review-card__text">&ldquo;I bought the bundle for my whole family. Everyone loves them. Great taste and you can feel the quality difference.&rdquo;</p>
        <div class="review-card__author">
          <div class="review-card__avatar">L</div>
          <div>
            <strong>Lisa P.</strong>
            <span class="review-card__verified">Verified Buyer</span>
          </div>
        </div>
      </div>
    </div>

    <div class="reviews__nav">
      <button class="reviews__arrow reviews__arrow--prev" data-reviews-prev aria-label="Previous reviews">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
      </button>
      <button class="reviews__arrow reviews__arrow--next" data-reviews-next aria-label="Next reviews">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
      </button>
    </div>
  </div>
</section>

<!-- ============================================================
     SECTION 6: STATS BAR
     ============================================================ -->
<section class="stats-bar">
  <div class="stats-bar__container">
    <div class="stats-bar__item">
      <span class="stats-bar__number">50,000+</span>
      <span class="stats-bar__label">Happy Customers</span>
    </div>
    <div class="stats-bar__divider"></div>
    <div class="stats-bar__item">
      <span class="stats-bar__number">4.8/5</span>
      <span class="stats-bar__label">Average Rating</span>
    </div>
    <div class="stats-bar__divider"></div>
    <div class="stats-bar__item">
      <span class="stats-bar__number">60-Day</span>
      <span class="stats-bar__label">Money-Back Guarantee</span>
    </div>
    <div class="stats-bar__divider"></div>
    <div class="stats-bar__item">
      <span class="stats-bar__number">100%</span>
      <span class="stats-bar__label">Natural Ingredients</span>
    </div>
  </div>
</section>

<!-- ============================================================
     SECTION 7: SHOP BY HEALTH GOAL
     ============================================================ -->
<section class="health-goals">
  <div class="health-goals__container">
    <h2 class="section-title">SHOP BY HEALTH GOAL</h2>
    <p class="section-subtitle">Find the perfect supplement for your needs.</p>

    <div class="health-goals__grid">
      <a href="/product/sleep-gummies/" class="goal-tile">
        <div class="goal-tile__icon goal-tile__icon--sleep">
          <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
        </div>
        <h3 class="goal-tile__title">Better Sleep</h3>
        <p class="goal-tile__desc">Fall asleep faster, wake refreshed</p>
        <span class="goal-tile__link">Shop Sleep &rarr;</span>
      </a>

      <a href="/product/chill-gummies/" class="goal-tile">
        <div class="goal-tile__icon goal-tile__icon--chill">
          <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        </div>
        <h3 class="goal-tile__title">Stress Relief</h3>
        <p class="goal-tile__desc">Calm your mind, find your balance</p>
        <span class="goal-tile__link">Shop Chill &rarr;</span>
      </a>

      <a href="/product/glow-gummies/" class="goal-tile">
        <div class="goal-tile__icon goal-tile__icon--glow">
          <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/></svg>
        </div>
        <h3 class="goal-tile__title">Glowing Skin</h3>
        <p class="goal-tile__desc">Radiant skin from the inside out</p>
        <span class="goal-tile__link">Shop Glow &rarr;</span>
      </a>

      <a href="/product/focus-gummies/" class="goal-tile">
        <div class="goal-tile__icon goal-tile__icon--focus">
          <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
        </div>
        <h3 class="goal-tile__title">Sharp Focus</h3>
        <p class="goal-tile__desc">Boost clarity and concentration</p>
        <span class="goal-tile__link">Shop Focus &rarr;</span>
      </a>
    </div>
  </div>
</section>

<!-- ============================================================
     SECTION 8: NEWSLETTER CTA (dark)
     ============================================================ -->
<section class="newsletter-cta">
  <div class="newsletter-cta__container">
    <div class="newsletter-cta__content">
      <h2 class="newsletter-cta__heading">Get 25% OFF Your First Order</h2>
      <p class="newsletter-cta__sub">Join 50,000+ wellness enthusiasts. Get exclusive deals, health tips, and early access to new products.</p>
      <form class="newsletter-cta__form" action="#" method="post">
        <input type="email" name="newsletter_email" class="newsletter-cta__input" placeholder="Enter your email address" required />
        <button type="submit" class="newsletter-cta__btn">Subscribe</button>
      </form>
      <p class="newsletter-cta__disclaimer">No spam, ever. Unsubscribe anytime.</p>
    </div>
  </div>
</section>

<!-- ============================================================
     EMAIL POPUP OVERLAY
     ============================================================ -->
<div class="email-popup popup" id="email-popup" aria-hidden="true">
  <div class="email-popup__overlay popup__overlay"></div>
  <div class="email-popup__card">
    <button class="email-popup__close" data-popup-close aria-label="Close popup">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
        <line x1="18" y1="6" x2="6" y2="18"/>
        <line x1="6" y1="6" x2="18" y2="18"/>
      </svg>
    </button>
    <div class="email-popup__badge">LIMITED OFFER</div>
    <h2 class="email-popup__heading">UNLOCK 30% OFF</h2>
    <p class="email-popup__sub">Enter your email address below to receive your exclusive discount code.</p>
    <form class="email-popup__form" action="#" method="post">
      <input type="email" name="popup_email" class="email-popup__input" placeholder="Enter your email address" required />
      <button type="submit" class="email-popup__submit btn btn--primary btn--full btn--lg">SUBSCRIBE</button>
    </form>
    <p class="email-popup__terms">By subscribing, you agree to our <a href="/legal/">Privacy Policy</a>.</p>
  </div>
</div>

<?php
get_footer();
