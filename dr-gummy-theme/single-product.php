<?php
/**
 * Single Product Page (PDP) — WooCommerce Override
 *
 * Left column: image gallery + product info + supplement facts
 * Right column: 3 stacked sidebar cards
 * Below-fold: ingredients, how it works, reviews, bought-together, FAQ, comparison
 *
 * @package DR_Gummy
 */

get_header();

/* =========================================================================
   PRODUCT DATA MAP
   Keyed by product slug — makes this one template work for every product.
   ========================================================================= */

$product_data = [
    'sleep' => [
        'name'       => 'Dr. Gummy Sleep',
        'subtitle'   => 'Restful Sleep Support. Clinical Formulation.',
        'sub_price'  => '$36.00',
        'full_price' => '$45.00',
        'discount'   => '20% Off',
        'color'      => '#2E5735',
        'color_light'=> 'rgba(46,87,53,0.08)',
        'badge'      => 'SLEEP',
        'thumb_count'=> 6,
        'doctor_name'=> 'Dr. Sarah Chen, MD',
        'doctor_quote'=> 'This is the only gummy supplement I recommend to my patients for sleep support. The clinical dosing of melatonin, L-theanine, and magnesium glycinate makes it truly effective.',
        'ingredients' => [
            ['name' => 'Melatonin',          'amount' => '5mg',   'icon' => 'moon',   'desc' => 'Regulates circadian rhythm and promotes faster sleep onset.'],
            ['name' => 'L-Theanine',         'amount' => '200mg', 'icon' => 'leaf',   'desc' => 'Promotes relaxation without drowsiness by boosting alpha brain waves.'],
            ['name' => 'Magnesium Glycinate','amount' => '150mg', 'icon' => 'shield',  'desc' => 'Highly bioavailable form that supports muscle relaxation and calm.'],
            ['name' => 'Chamomile Extract',  'amount' => '100mg', 'icon' => 'flower',  'desc' => 'Traditional herb clinically shown to reduce anxiety and improve sleep quality.'],
        ],
        'supplement_facts' => [
            ['nutrient' => 'Melatonin',          'amount' => '5 mg',   'dv' => '†'],
            ['nutrient' => 'L-Theanine',         'amount' => '200 mg', 'dv' => '†'],
            ['nutrient' => 'Magnesium (as Glycinate)', 'amount' => '150 mg', 'dv' => '36%'],
            ['nutrient' => 'Chamomile Extract',  'amount' => '100 mg', 'dv' => '†'],
            ['nutrient' => 'Passion Flower',     'amount' => '75 mg',  'dv' => '†'],
            ['nutrient' => 'GABA',               'amount' => '100 mg', 'dv' => '†'],
            ['nutrient' => 'Vitamin B6',         'amount' => '2 mg',   'dv' => '118%'],
        ],
        'faqs' => [
            ['q' => 'How many gummies should I take?',                'a' => 'Take 2 gummies 30 minutes before bedtime. Do not exceed recommended dose.'],
            ['q' => 'Will this make me feel groggy in the morning?',  'a' => 'No. Our formula is designed for clean sleep — you wake up refreshed, not foggy.'],
            ['q' => 'Can I take this with other supplements?',        'a' => 'Yes, but consult your doctor if you take prescription sleep medication.'],
            ['q' => 'Is it safe for long-term use?',                  'a' => 'Yes. All ingredients are non-habit-forming and safe for nightly use.'],
            ['q' => 'Is this product gluten-free?',                   'a' => 'Yes — gluten-free, non-GMO, and made in a GMP-certified facility.'],
        ],
        'how_it_works' => [
            ['step' => '1', 'title' => 'Chew & Enjoy',       'desc' => 'Take 2 gummies 30 minutes before bed.'],
            ['step' => '2', 'title' => 'Ingredients Absorb',  'desc' => 'Clinically-dosed compounds enter your system.'],
            ['step' => '3', 'title' => 'Relax & Unwind',      'desc' => 'L-Theanine and GABA calm the nervous system.'],
            ['step' => '4', 'title' => 'Deep, Restful Sleep',  'desc' => 'Wake refreshed with no morning grogginess.'],
        ],
        'timeline' => [
            ['day' => 'Day 1',  'label' => 'Fall asleep faster'],
            ['day' => 'Day 7',  'label' => 'Sleep quality improves'],
            ['day' => 'Day 15', 'label' => 'Consistent deep sleep'],
            ['day' => 'Day 30', 'label' => 'Fully optimized rest'],
        ],
        'reviews' => [
            ['name' => 'Jessica M.',  'rating' => 5, 'title' => 'Finally sleeping through the night!',  'body' => 'I\'ve tried everything for my insomnia. These gummies are the first thing that actually works consistently. I fall asleep in about 20 minutes now.', 'date' => 'January 15, 2026', 'verified' => true],
            ['name' => 'David R.',    'rating' => 5, 'title' => 'No morning grogginess',                'body' => 'Unlike melatonin pills that leave me foggy, these gummies give me clean sleep and I wake up alert. The taste is great too!', 'date' => 'January 8, 2026', 'verified' => true],
            ['name' => 'Maria L.',    'rating' => 5, 'title' => 'Doctor-recommended quality',             'body' => 'My naturopath recommended Dr. Gummy and I can see why. The ingredient quality is noticeably better than drugstore brands.', 'date' => 'December 28, 2025', 'verified' => true],
        ],
        'rating_breakdown' => [5 => 85, 4 => 10, 3 => 3, 2 => 1, 1 => 1],
        'review_count'     => 127,
        'avg_rating'       => 4.9,
        'bought_together'  => ['chill', 'focus'],
    ],

    'chill' => [
        'name'       => 'Dr. Gummy Chill',
        'subtitle'   => 'Stress Relief & Calm. Clinical Formulation.',
        'sub_price'  => '$36.00',
        'full_price' => '$45.00',
        'discount'   => '20% Off',
        'color'      => '#4A7C59',
        'color_light'=> 'rgba(74,124,89,0.08)',
        'badge'      => 'CHILL',
        'thumb_count'=> 6,
        'doctor_name'=> 'Dr. James Park, ND',
        'doctor_quote'=> 'A well-formulated stress-relief supplement. The Ashwagandha and L-Theanine combination provides real, noticeable calm without sedation.',
        'ingredients' => [
            ['name' => 'Ashwagandha KSM-66', 'amount' => '300mg', 'icon' => 'shield',  'desc' => 'Gold-standard adaptogen clinically proven to reduce cortisol by 28%.'],
            ['name' => 'L-Theanine',          'amount' => '200mg', 'icon' => 'leaf',   'desc' => 'Amino acid that promotes alpha brain waves for relaxed focus.'],
            ['name' => 'Lemon Balm Extract',  'amount' => '150mg', 'icon' => 'flower',  'desc' => 'Reduces anxiety symptoms and promotes a sense of calm.'],
            ['name' => 'GABA',                'amount' => '100mg', 'icon' => 'moon',   'desc' => 'Inhibitory neurotransmitter that reduces neural excitability.'],
        ],
        'supplement_facts' => [
            ['nutrient' => 'Ashwagandha KSM-66',  'amount' => '300 mg', 'dv' => '†'],
            ['nutrient' => 'L-Theanine',           'amount' => '200 mg', 'dv' => '†'],
            ['nutrient' => 'Lemon Balm Extract',   'amount' => '150 mg', 'dv' => '†'],
            ['nutrient' => 'GABA',                 'amount' => '100 mg', 'dv' => '†'],
            ['nutrient' => 'Vitamin B6',           'amount' => '2 mg',   'dv' => '118%'],
            ['nutrient' => 'Magnesium (as Citrate)', 'amount' => '100 mg', 'dv' => '24%'],
        ],
        'faqs' => [
            ['q' => 'How many gummies should I take?',          'a' => 'Take 2 gummies daily, preferably in the morning or during stressful moments.'],
            ['q' => 'Will this make me drowsy?',                'a' => 'No. The formula is designed for calm alertness, not sedation.'],
            ['q' => 'How long before I feel the effects?',      'a' => 'Acute calm within 30-60 minutes. Full adaptogenic benefits in 2-4 weeks.'],
            ['q' => 'Can I take this with coffee?',             'a' => 'Yes! L-Theanine actually complements caffeine by smoothing out jitters.'],
            ['q' => 'Is this product vegan?',                   'a' => 'Yes — 100% plant-based, vegan, and cruelty-free.'],
        ],
        'how_it_works' => [
            ['step' => '1', 'title' => 'Chew & Enjoy',        'desc' => 'Take 2 gummies any time you need calm.'],
            ['step' => '2', 'title' => 'Adaptogens Activate',  'desc' => 'KSM-66 Ashwagandha begins modulating cortisol.'],
            ['step' => '3', 'title' => 'Stress Melts Away',    'desc' => 'L-Theanine and GABA promote relaxation.'],
            ['step' => '4', 'title' => 'Sustained Calm',       'desc' => 'Enjoy hours of balanced, focused calm.'],
        ],
        'timeline' => [
            ['day' => 'Day 1',  'label' => 'Immediate calm'],
            ['day' => 'Day 7',  'label' => 'Reduced stress response'],
            ['day' => 'Day 15', 'label' => 'Better mood balance'],
            ['day' => 'Day 30', 'label' => 'Resilient to stress'],
        ],
        'reviews' => [
            ['name' => 'Sarah K.',   'rating' => 5, 'title' => 'Game changer for work stress',      'body' => 'I take these before big meetings and the difference is incredible. Calm but focused.', 'date' => 'January 12, 2026', 'verified' => true],
            ['name' => 'Tom W.',     'rating' => 5, 'title' => 'Better than prescription anxiety meds', 'body' => 'After consulting my doctor, I switched from Xanax to these. Natural and effective.', 'date' => 'January 5, 2026', 'verified' => true],
            ['name' => 'Angela P.',  'rating' => 4, 'title' => 'Tastes great, works well',           'body' => 'Love the flavor and I definitely feel calmer. Would be 5 stars with faster shipping.', 'date' => 'December 20, 2025', 'verified' => true],
        ],
        'rating_breakdown' => [5 => 80, 4 => 14, 3 => 4, 2 => 1, 1 => 1],
        'review_count'     => 98,
        'avg_rating'       => 4.8,
        'bought_together'  => ['sleep', 'focus'],
    ],

    'focus' => [
        'name'       => 'Dr. Gummy Focus',
        'subtitle'   => 'Mental Clarity & Concentration. Clinical Formulation.',
        'sub_price'  => '$36.00',
        'full_price' => '$45.00',
        'discount'   => '20% Off',
        'color'      => '#5BA4B5',
        'color_light'=> 'rgba(91,164,181,0.08)',
        'badge'      => 'FOCUS',
        'thumb_count'=> 6,
        'doctor_name'=> 'Dr. Michael Torres, PhD',
        'doctor_quote'=> 'The nootropic stack in these gummies is backed by solid research. Lion\'s Mane and Bacopa together provide both immediate and long-term cognitive benefits.',
        'ingredients' => [
            ['name' => 'Lion\'s Mane Extract', 'amount' => '500mg', 'icon' => 'shield',  'desc' => 'Mushroom nootropic that stimulates Nerve Growth Factor for brain health.'],
            ['name' => 'Bacopa Monnieri',      'amount' => '300mg', 'icon' => 'leaf',   'desc' => 'Ayurvedic herb clinically shown to improve memory and processing speed.'],
            ['name' => 'Alpha-GPC',            'amount' => '150mg', 'icon' => 'moon',   'desc' => 'Choline compound that boosts acetylcholine for sharper focus.'],
            ['name' => 'Ginkgo Biloba',        'amount' => '120mg', 'icon' => 'flower',  'desc' => 'Increases cerebral blood flow for enhanced mental performance.'],
        ],
        'supplement_facts' => [
            ['nutrient' => 'Lion\'s Mane Extract', 'amount' => '500 mg', 'dv' => '†'],
            ['nutrient' => 'Bacopa Monnieri',      'amount' => '300 mg', 'dv' => '†'],
            ['nutrient' => 'Alpha-GPC',            'amount' => '150 mg', 'dv' => '†'],
            ['nutrient' => 'Ginkgo Biloba',        'amount' => '120 mg', 'dv' => '†'],
            ['nutrient' => 'Vitamin B12',          'amount' => '50 mcg', 'dv' => '2083%'],
            ['nutrient' => 'Vitamin B6',           'amount' => '2 mg',   'dv' => '118%'],
        ],
        'faqs' => [
            ['q' => 'When is the best time to take these?',     'a' => 'Take 2 gummies in the morning or before tasks requiring concentration.'],
            ['q' => 'Will this cause jitters like caffeine?',   'a' => 'No. Our formula provides clean focus without stimulant side effects.'],
            ['q' => 'How long do the effects last?',            'a' => 'Acute focus lasts 4-6 hours. Long-term benefits build over 4-8 weeks.'],
            ['q' => 'Can students take this?',                  'a' => 'Yes, adults 18+ can safely use this product for studying.'],
            ['q' => 'Is this safe with ADHD medication?',       'a' => 'Consult your prescribing doctor before combining with any medication.'],
        ],
        'how_it_works' => [
            ['step' => '1', 'title' => 'Chew & Enjoy',        'desc' => 'Take 2 gummies in the morning or before focus-intensive work.'],
            ['step' => '2', 'title' => 'Nootropics Activate',  'desc' => 'Alpha-GPC boosts acetylcholine within 30 minutes.'],
            ['step' => '3', 'title' => 'Clarity Sharpens',     'desc' => 'Lion\'s Mane and Bacopa enhance neural connections.'],
            ['step' => '4', 'title' => 'Peak Performance',     'desc' => 'Enjoy hours of sustained, clear-headed focus.'],
        ],
        'timeline' => [
            ['day' => 'Day 1',  'label' => 'Sharper focus'],
            ['day' => 'Day 7',  'label' => 'Improved recall'],
            ['day' => 'Day 15', 'label' => 'Enhanced clarity'],
            ['day' => 'Day 30', 'label' => 'Peak cognition'],
        ],
        'reviews' => [
            ['name' => 'Kevin L.',   'rating' => 5, 'title' => 'Better than any nootropic I\'ve tried',  'body' => 'As a software engineer, I need sustained focus. These gummies deliver without the crash.', 'date' => 'January 10, 2026', 'verified' => true],
            ['name' => 'Lisa H.',    'rating' => 5, 'title' => 'My study sessions are so productive now', 'body' => 'Med student here — these are incredible for long study sessions. Highly recommend!', 'date' => 'January 3, 2026', 'verified' => true],
            ['name' => 'Robert J.',  'rating' => 5, 'title' => 'Clear mind all day',                     'body' => 'Started with the subscribe option and I\'m never going back. The clarity is remarkable.', 'date' => 'December 22, 2025', 'verified' => true],
        ],
        'rating_breakdown' => [5 => 88, 4 => 8, 3 => 2, 2 => 1, 1 => 1],
        'review_count'     => 156,
        'avg_rating'       => 4.9,
        'bought_together'  => ['chill', 'sleep'],
    ],

    'glow' => [
        'name'       => 'Dr. Gummy Glow',
        'subtitle'   => 'Radiant Skin & Beauty. Clinical Formulation.',
        'sub_price'  => '$36.00',
        'full_price' => '$45.00',
        'discount'   => '20% Off',
        'color'      => '#D4A853',
        'color_light'=> 'rgba(212,168,83,0.08)',
        'badge'      => 'GLOW',
        'thumb_count'=> 6,
        'doctor_name'=> 'Dr. Emily Tran, Dermatologist',
        'doctor_quote'=> 'The biotin and hyaluronic acid combination at these dosages is what I recommend. Most beauty gummies under-dose — Dr. Gummy gets it right.',
        'ingredients' => [
            ['name' => 'Biotin',              'amount' => '5000mcg','icon' => 'flower',  'desc' => 'Essential B-vitamin for strong hair, nails, and healthy skin cell production.'],
            ['name' => 'Hyaluronic Acid',     'amount' => '120mg',  'icon' => 'shield',  'desc' => 'Holds 1000x its weight in water for deep skin hydration and plumpness.'],
            ['name' => 'Vitamin E',           'amount' => '30mg',   'icon' => 'leaf',   'desc' => 'Powerful antioxidant that protects skin cells from oxidative damage.'],
            ['name' => 'Vitamin C',           'amount' => '90mg',   'icon' => 'moon',   'desc' => 'Boosts collagen synthesis for firmer, more youthful-looking skin.'],
        ],
        'supplement_facts' => [
            ['nutrient' => 'Biotin',             'amount' => '5,000 mcg', 'dv' => '16,667%'],
            ['nutrient' => 'Hyaluronic Acid',    'amount' => '120 mg',    'dv' => '†'],
            ['nutrient' => 'Vitamin E',          'amount' => '30 mg',     'dv' => '200%'],
            ['nutrient' => 'Vitamin C',          'amount' => '90 mg',     'dv' => '100%'],
            ['nutrient' => 'Zinc',               'amount' => '11 mg',     'dv' => '100%'],
            ['nutrient' => 'Vitamin A',          'amount' => '900 mcg',   'dv' => '100%'],
        ],
        'faqs' => [
            ['q' => 'How long until I see results?',            'a' => 'Most users notice skin improvements in 2-4 weeks, with full results by 8 weeks.'],
            ['q' => 'Can I take this with my skincare routine?','a' => 'Absolutely! These work from the inside out to complement topical skincare.'],
            ['q' => 'Will this help with acne?',                'a' => 'Zinc and Vitamin A can help reduce breakouts. Results vary by individual.'],
            ['q' => 'Is the biotin level safe?',                'a' => 'Yes, 5000mcg is a standard clinical dose with an excellent safety profile.'],
            ['q' => 'Are there any allergens?',                 'a' => 'Free from major allergens: no nuts, dairy, soy, or gluten.'],
        ],
        'how_it_works' => [
            ['step' => '1', 'title' => 'Chew & Enjoy',        'desc' => 'Take 2 delicious gummies daily with or without food.'],
            ['step' => '2', 'title' => 'Nutrients Absorb',     'desc' => 'Biotin and HA enter your bloodstream rapidly.'],
            ['step' => '3', 'title' => 'Cells Rejuvenate',     'desc' => 'Collagen production ramps up from within.'],
            ['step' => '4', 'title' => 'Visible Glow',         'desc' => 'Skin, hair, and nails show visible improvement.'],
        ],
        'timeline' => [
            ['day' => 'Day 1',  'label' => 'Hydration boost'],
            ['day' => 'Day 7',  'label' => 'Skin feels softer'],
            ['day' => 'Day 15', 'label' => 'Visible radiance'],
            ['day' => 'Day 30', 'label' => 'Full glow effect'],
        ],
        'reviews' => [
            ['name' => 'Rachel S.',  'rating' => 5, 'title' => 'My skin has never looked better!',     'body' => 'After 3 weeks my coworkers started asking what I changed. Just these gummies!', 'date' => 'January 14, 2026', 'verified' => true],
            ['name' => 'Nina C.',    'rating' => 5, 'title' => 'Hair and nails growing faster too',     'body' => 'Bought for skin but my nails stopped breaking and my hair is visibly thicker.', 'date' => 'January 6, 2026', 'verified' => true],
            ['name' => 'Taylor M.',  'rating' => 4, 'title' => 'Great taste, good results',             'body' => 'The peach flavor is amazing. Skin looks dewier but still waiting on full results.', 'date' => 'December 30, 2025', 'verified' => true],
        ],
        'rating_breakdown' => [5 => 82, 4 => 12, 3 => 4, 2 => 1, 1 => 1],
        'review_count'     => 112,
        'avg_rating'       => 4.8,
        'bought_together'  => ['sleep', 'chill'],
    ],
];

/* ---------- Resolve current product ---------- */
$slug = get_post_field('post_name', get_the_ID());
// Try matching by slug prefix (e.g. "sleep-gummies" → "sleep")
$matched_slug = '';
foreach (array_keys($product_data) as $key) {
    if ($slug === $key || strpos($slug, $key) === 0) {
        $matched_slug = $key;
        break;
    }
}
// Fallback to first product for preview / draft
if (!$matched_slug) {
    $matched_slug = 'sleep';
}

$p = $product_data[$matched_slug];

// Bought-together products
$bought_together_products = [];
if (!empty($p['bought_together'])) {
    foreach ($p['bought_together'] as $bt_slug) {
        if (isset($product_data[$bt_slug])) {
            $bought_together_products[$bt_slug] = $product_data[$bt_slug];
        }
    }
}

// Comparison data — same for all products
$comparison = [
    ['feature' => 'Clinically Dosed',     'us' => true,  'them' => false],
    ['feature' => 'Doctor Formulated',     'us' => true,  'them' => false],
    ['feature' => 'Third-Party Tested',    'us' => true,  'them' => false],
    ['feature' => 'No Artificial Colors',  'us' => true,  'them' => false],
    ['feature' => 'Transparent Labels',    'us' => true,  'them' => false],
    ['feature' => 'Non-GMO',              'us' => true,  'them' => true],
    ['feature' => 'Made in USA',           'us' => true,  'them' => true],
    ['feature' => 'Under $1.50/serving',   'us' => true,  'them' => false],
];
?>

<!-- ================================================================
     ABOVE THE FOLD — Image + Product Info + Sidebar Cards
     ================================================================ -->
<section class="pdp-hero">
  <div class="pdp-hero__container container--wide">
    <div class="pdp-hero__layout">

      <!-- ==================== LEFT COLUMN ==================== -->
      <div class="pdp-left">

        <!-- IMAGE GALLERY -->
        <div class="pdp-gallery">
          <div class="pdp-gallery__main" id="pdp-main-image">
            <div class="pdp-gallery__img-placeholder" style="background-color: <?php echo esc_attr($p['color']); ?>;">
              <span class="pdp-gallery__badge"><?php echo esc_html($p['badge']); ?></span>
            </div>
          </div>
          <div class="pdp-gallery__thumbs" id="pdp-thumbs">
            <?php for ($i = 0; $i < $p['thumb_count']; $i++) : ?>
            <button
              class="pdp-gallery__thumb<?php echo $i === 0 ? ' is-active' : ''; ?>"
              data-thumb-index="<?php echo $i; ?>"
              aria-label="View image <?php echo $i + 1; ?>"
            >
              <div class="pdp-gallery__thumb-inner" style="background-color: <?php echo esc_attr($p['color']); ?>; opacity: <?php echo $i === 0 ? '1' : '0.6'; ?>;"></div>
            </button>
            <?php endfor; ?>
          </div>
        </div>

        <!-- PRODUCT INFO -->
        <div class="pdp-info">
          <!-- Stars -->
          <div class="pdp-info__rating">
            <?php echo dr_gummy_star_rating($p['avg_rating'], $p['review_count']); ?>
          </div>

          <!-- Title + Subtitle -->
          <h1 class="pdp-info__title"><?php echo esc_html($p['name']); ?></h1>
          <p class="pdp-info__subtitle"><?php echo esc_html($p['subtitle']); ?></p>

          <!-- PRICING TOGGLE — two side-by-side tabs -->
          <div class="pdp-pricing" id="pdp-pricing">
            <button
              class="pdp-pricing__tab is-active"
              data-pricing-tab="subscribe"
              type="button"
            >
              <span class="pdp-pricing__tab-badge">Subscribe &amp; Save</span>
              <span class="pdp-pricing__tab-discount"><?php echo esc_html($p['discount']); ?></span>
              <span class="pdp-pricing__tab-price"><?php echo esc_html($p['sub_price']); ?></span>
            </button>
            <button
              class="pdp-pricing__tab"
              data-pricing-tab="onetime"
              type="button"
            >
              <span class="pdp-pricing__tab-badge">One-time</span>
              <span class="pdp-pricing__tab-price"><?php echo esc_html($p['full_price']); ?></span>
            </button>
          </div>

          <!-- FREQUENCY SELECTOR (shown when Subscribe selected) -->
          <div class="pdp-frequency" id="pdp-frequency">
            <label class="pdp-frequency__label" for="delivery-frequency">Delivery Frequency</label>
            <div class="pdp-frequency__select-wrap">
              <select class="pdp-frequency__select input" id="delivery-frequency" name="delivery_frequency">
                <option value="30" selected>Every 30 Days</option>
                <option value="45">Every 45 Days</option>
                <option value="60">Every 60 Days</option>
              </select>
            </div>
          </div>

          <!-- ADD TO CART -->
          <button class="pdp-atc btn btn--primary btn--full btn--lg" id="pdp-add-to-cart">
            Add to Cart
          </button>

          <!-- Trust badges -->
          <div class="pdp-trust">
            <span class="pdp-trust__item">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--color-success-green)" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
              Free Shipping
            </span>
            <span class="pdp-trust__item">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--color-success-green)" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
              30-Day Guarantee
            </span>
            <span class="pdp-trust__item">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--color-success-green)" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
              Cancel Anytime
            </span>
          </div>
        </div>

        <!-- SUPPLEMENT FACTS — FDA-style table (in-page) -->
        <div class="pdp-supp-facts" id="supplement-facts-full">
          <h2 class="pdp-supp-facts__heading">Supplement Facts</h2>
          <div class="pdp-supp-facts__box">
            <div class="pdp-supp-facts__header">
              <strong>Serving Size:</strong> 2 Gummies &nbsp;&nbsp; <strong>Servings Per Container:</strong> 30
            </div>
            <table class="pdp-supp-facts__table">
              <thead>
                <tr>
                  <th class="pdp-supp-facts__th">Nutrient</th>
                  <th class="pdp-supp-facts__th pdp-supp-facts__th--right">Amount Per Serving</th>
                  <th class="pdp-supp-facts__th pdp-supp-facts__th--right">% Daily Value</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($p['supplement_facts'] as $row) : ?>
                <tr>
                  <td class="pdp-supp-facts__td"><?php echo esc_html($row['nutrient']); ?></td>
                  <td class="pdp-supp-facts__td pdp-supp-facts__td--right"><?php echo esc_html($row['amount']); ?></td>
                  <td class="pdp-supp-facts__td pdp-supp-facts__td--right"><?php echo esc_html($row['dv']); ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <p class="pdp-supp-facts__footnote">† Daily Value not established.</p>
          </div>
        </div>

      </div><!-- /.pdp-left -->

      <!-- ==================== RIGHT SIDEBAR ==================== -->
      <aside class="pdp-sidebar">

        <!-- CARD 1: Supplement Facts (condensed) -->
        <div class="pdp-sidebar-card">
          <h3 class="pdp-sidebar-card__title">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            Supplement Facts
          </h3>
          <table class="pdp-sidebar-card__table">
            <tbody>
              <?php foreach (array_slice($p['supplement_facts'], 0, 4) as $row) : ?>
              <tr>
                <td class="pdp-sidebar-card__td"><?php echo esc_html($row['nutrient']); ?></td>
                <td class="pdp-sidebar-card__td pdp-sidebar-card__td--right"><strong><?php echo esc_html($row['amount']); ?></strong></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <a href="#supplement-facts-full" class="pdp-sidebar-card__link">View Full Label &rarr;</a>
        </div>

        <!-- CARD 2: Doctor's Note -->
        <div class="pdp-sidebar-card pdp-sidebar-card--doctor">
          <h3 class="pdp-sidebar-card__title">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            Doctor's Note
          </h3>
          <div class="pdp-doctor">
            <div class="pdp-doctor__avatar" style="background-color: <?php echo esc_attr($p['color']); ?>;">
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.7)" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            <blockquote class="pdp-doctor__quote">
              &ldquo;<?php echo esc_html($p['doctor_quote']); ?>&rdquo;
            </blockquote>
            <cite class="pdp-doctor__name">&mdash; <?php echo esc_html($p['doctor_name']); ?></cite>
          </div>
        </div>

        <!-- CARD 3: Results Timeline -->
        <div class="pdp-sidebar-card pdp-sidebar-card--timeline">
          <h3 class="pdp-sidebar-card__title">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            Results in 30 Days
          </h3>
          <div class="pdp-timeline">
            <?php foreach ($p['timeline'] as $i => $t) : ?>
            <div class="pdp-timeline__step<?php echo $i === count($p['timeline']) - 1 ? ' pdp-timeline__step--last' : ''; ?>">
              <div class="pdp-timeline__dot" style="background-color: <?php echo esc_attr($p['color']); ?>;"></div>
              <div class="pdp-timeline__content">
                <strong class="pdp-timeline__day"><?php echo esc_html($t['day']); ?></strong>
                <span class="pdp-timeline__label"><?php echo esc_html($t['label']); ?></span>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

      </aside><!-- /.pdp-sidebar -->

    </div><!-- /.pdp-hero__layout -->
  </div>
</section>


<!-- ================================================================
     BELOW THE FOLD
     ================================================================ -->

<!-- KEY INGREDIENTS -->
<section class="pdp-section pdp-ingredients" id="ingredients">
  <div class="container">
    <h2 class="pdp-section__title">Key Ingredients</h2>
    <p class="pdp-section__subtitle">Clinically dosed, doctor-formulated, third-party tested.</p>
    <div class="pdp-ingredients__grid">
      <?php foreach ($p['ingredients'] as $ing) : ?>
      <div class="pdp-ingredient-card">
        <div class="pdp-ingredient-card__icon" style="background-color: <?php echo esc_attr($p['color_light']); ?>;">
          <?php if ($ing['icon'] === 'moon') : ?>
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr($p['color']); ?>" stroke-width="2"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
          <?php elseif ($ing['icon'] === 'leaf') : ?>
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr($p['color']); ?>" stroke-width="2"><path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89.66.95-2.3c.48.17.98.3 1.34.3C19 20 22 3 22 3c-1 2-8 2.25-13 3.25S2 11.5 2 13.5s1.75 3.75 1.75 3.75"/></svg>
          <?php elseif ($ing['icon'] === 'shield') : ?>
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr($p['color']); ?>" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          <?php elseif ($ing['icon'] === 'flower') : ?>
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr($p['color']); ?>" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M12 2a4 4 0 0 1 0 8 4 4 0 0 1 0-8z"/><path d="M20 12a4 4 0 0 1-8 0 4 4 0 0 1 8 0z"/><path d="M12 20a4 4 0 0 1 0-8 4 4 0 0 1 0 8z"/><path d="M4 12a4 4 0 0 1 8 0 4 4 0 0 1-8 0z"/></svg>
          <?php endif; ?>
        </div>
        <h4 class="pdp-ingredient-card__name"><?php echo esc_html($ing['name']); ?></h4>
        <span class="pdp-ingredient-card__amount"><?php echo esc_html($ing['amount']); ?></span>
        <p class="pdp-ingredient-card__desc"><?php echo esc_html($ing['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="pdp-section pdp-how-it-works bg-white" id="how-it-works">
  <div class="container">
    <h2 class="pdp-section__title">How It Works</h2>
    <div class="pdp-steps">
      <?php foreach ($p['how_it_works'] as $i => $step) : ?>
      <div class="pdp-step">
        <div class="pdp-step__number" style="background-color: <?php echo esc_attr($p['color']); ?>;">
          <?php echo esc_html($step['step']); ?>
        </div>
        <h4 class="pdp-step__title"><?php echo esc_html($step['title']); ?></h4>
        <p class="pdp-step__desc"><?php echo esc_html($step['desc']); ?></p>
        <?php if ($i < count($p['how_it_works']) - 1) : ?>
        <div class="pdp-step__connector"></div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CUSTOMER REVIEWS -->
<section class="pdp-section pdp-reviews" id="reviews">
  <div class="container">
    <h2 class="pdp-section__title">Customer Reviews</h2>

    <!-- Rating breakdown -->
    <div class="pdp-reviews__summary">
      <div class="pdp-reviews__avg">
        <span class="pdp-reviews__avg-number"><?php echo esc_html($p['avg_rating']); ?></span>
        <div class="pdp-reviews__avg-stars">
          <?php echo dr_gummy_star_rating($p['avg_rating'], 0); ?>
        </div>
        <span class="pdp-reviews__avg-count">Based on <?php echo esc_html($p['review_count']); ?> reviews</span>
      </div>
      <div class="pdp-reviews__bars">
        <?php for ($star = 5; $star >= 1; $star--) : ?>
        <div class="pdp-reviews__bar-row">
          <span class="pdp-reviews__bar-label"><?php echo $star; ?> star</span>
          <div class="pdp-reviews__bar-track">
            <div class="pdp-reviews__bar-fill" style="width: <?php echo esc_attr($p['rating_breakdown'][$star]); ?>%; background-color: <?php echo esc_attr($p['color']); ?>;"></div>
          </div>
          <span class="pdp-reviews__bar-pct"><?php echo esc_html($p['rating_breakdown'][$star]); ?>%</span>
        </div>
        <?php endfor; ?>
      </div>
    </div>

    <!-- Review cards -->
    <div class="pdp-reviews__grid">
      <?php foreach ($p['reviews'] as $review) : ?>
      <div class="pdp-review-card">
        <div class="pdp-review-card__header">
          <?php echo dr_gummy_star_rating((float) $review['rating'], 0); ?>
          <?php if ($review['verified']) : ?>
          <span class="pdp-review-card__verified">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--color-success-green)" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            Verified Purchase
          </span>
          <?php endif; ?>
        </div>
        <h4 class="pdp-review-card__title"><?php echo esc_html($review['title']); ?></h4>
        <p class="pdp-review-card__body"><?php echo esc_html($review['body']); ?></p>
        <div class="pdp-review-card__meta">
          <span class="pdp-review-card__author"><?php echo esc_html($review['name']); ?></span>
          <span class="pdp-review-card__date"><?php echo esc_html($review['date']); ?></span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- FREQUENTLY BOUGHT TOGETHER -->
<?php if (!empty($bought_together_products)) : ?>
<section class="pdp-section pdp-bought-together bg-white" id="bought-together">
  <div class="container">
    <h2 class="pdp-section__title">Frequently Bought Together</h2>
    <div class="pdp-bought-together__grid">
      <!-- Current product -->
      <div class="pdp-bt-card pdp-bt-card--current">
        <div class="pdp-bt-card__img" style="background-color: <?php echo esc_attr($p['color']); ?>;">
          <span><?php echo esc_html($p['badge']); ?></span>
        </div>
        <h4 class="pdp-bt-card__name"><?php echo esc_html($p['name']); ?></h4>
        <span class="pdp-bt-card__price"><?php echo esc_html($p['full_price']); ?></span>
        <span class="pdp-bt-card__tag">This item</span>
      </div>

      <?php foreach ($bought_together_products as $bt_slug => $bt) : ?>
      <div class="pdp-bt-plus">+</div>
      <div class="pdp-bt-card">
        <div class="pdp-bt-card__img" style="background-color: <?php echo esc_attr($bt['color']); ?>;">
          <span><?php echo esc_html($bt['badge']); ?></span>
        </div>
        <h4 class="pdp-bt-card__name"><?php echo esc_html($bt['name']); ?></h4>
        <span class="pdp-bt-card__price"><?php echo esc_html($bt['full_price']); ?></span>
      </div>
      <?php endforeach; ?>

      <!-- Bundle CTA -->
      <div class="pdp-bt-cta">
        <p class="pdp-bt-cta__total">Bundle Price: <strong>$121.50</strong> <s class="pdp-bt-cta__was">$135.00</s></p>
        <button class="btn btn--primary btn--full">Add All to Cart — Save 10%</button>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- PRODUCT FAQ -->
<section class="pdp-section pdp-faq" id="faq">
  <div class="container container--narrow">
    <h2 class="pdp-section__title">Frequently Asked Questions</h2>
    <div class="pdp-faq__list">
      <?php foreach ($p['faqs'] as $i => $faq) : ?>
      <details class="pdp-faq__item" <?php echo $i === 0 ? 'open' : ''; ?>>
        <summary class="pdp-faq__question">
          <span><?php echo esc_html($faq['q']); ?></span>
          <svg class="pdp-faq__chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </summary>
        <div class="pdp-faq__answer">
          <p><?php echo esc_html($faq['a']); ?></p>
        </div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- WHY DR. GUMMY IS DIFFERENT — Comparison table -->
<section class="pdp-section pdp-comparison bg-white" id="comparison">
  <div class="container container--narrow">
    <h2 class="pdp-section__title">Why Dr. Gummy Is Different</h2>
    <div class="pdp-comparison__table-wrap">
      <table class="pdp-comparison__table">
        <thead>
          <tr>
            <th class="pdp-comparison__th"></th>
            <th class="pdp-comparison__th pdp-comparison__th--us">Dr. Gummy</th>
            <th class="pdp-comparison__th pdp-comparison__th--them">Other Brands</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($comparison as $row) : ?>
          <tr>
            <td class="pdp-comparison__feature"><?php echo esc_html($row['feature']); ?></td>
            <td class="pdp-comparison__check pdp-comparison__check--us">
              <?php if ($row['us']) : ?>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--color-success-green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
              <?php else : ?>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#EF4444" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
              <?php endif; ?>
            </td>
            <td class="pdp-comparison__check pdp-comparison__check--them">
              <?php if ($row['them']) : ?>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--color-success-green)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
              <?php else : ?>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#EF4444" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?php get_footer(); ?>
