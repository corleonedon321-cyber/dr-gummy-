<?php
/**
 * Template Name: Science
 * Slug: science
 *
 * The Science of Dr. Gummy — clinical formulation, ingredient sourcing,
 * third-party testing, and certifications.
 *
 * @package DR_Gummy
 */

get_header();

$principles = [
    [
        'icon'  => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>',
        'title' => 'Clinical Dosages',
        'desc'  => 'Every active ingredient is dosed at the exact concentration proven effective in peer-reviewed human clinical trials — never pixie-dusted.',
    ],
    [
        'icon'  => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>',
        'title' => 'Patented Ingredients',
        'desc'  => 'We exclusively use patented, trademarked ingredient forms — Magtein, KSM-66 Ashwagandha, Cognizin Citicoline — with published human efficacy data.',
    ],
    [
        'icon'  => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        'title' => 'Bioavailability First',
        'desc'  => 'Chelated minerals, methylated vitamins, liposomal delivery — every formulation is optimized for maximum absorption and bioavailability.',
    ],
    [
        'icon'  => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
        'title' => 'Zero Proprietary Blends',
        'desc'  => 'Full label transparency. Every ingredient, every dosage, clearly listed. No hidden blends, no asterisks, no fine-print disclaimers.',
    ],
];

$testing_steps = [
    ['step' => '01', 'title' => 'Raw Material Testing', 'desc' => 'Every incoming ingredient is tested for identity, potency, and purity before it enters our facility. We verify certificates of analysis against our own third-party lab results.'],
    ['step' => '02', 'title' => 'In-Process Quality Checks', 'desc' => 'During manufacturing, we conduct real-time monitoring of mixing uniformity, weight consistency, moisture content, and active ingredient distribution across every batch.'],
    ['step' => '03', 'title' => 'Third-Party Lab Verification', 'desc' => 'Finished products are sent to independent ISO 17025-accredited laboratories for testing on heavy metals, microbial contamination, pesticides, allergens, and label claim verification.'],
    ['step' => '04', 'title' => 'Stability & Shelf-Life Testing', 'desc' => 'Accelerated and real-time stability studies ensure potency is maintained through the labeled expiration date under normal storage conditions.'],
];

$certs = [
    ['name' => 'FDA Registered', 'desc' => 'Our manufacturing facility is registered with the U.S. Food and Drug Administration and inspected under 21 CFR Part 111.'],
    ['name' => 'cGMP Certified', 'desc' => 'Current Good Manufacturing Practices — the highest standard for dietary supplement production in the United States.'],
    ['name' => 'NSF International', 'desc' => 'Independent certification verifying product safety, quality, and label accuracy through unannounced facility audits.'],
    ['name' => 'ISO 9001:2015', 'desc' => 'International quality management system standard, ensuring consistent processes and continuous improvement.'],
    ['name' => 'Non-GMO Verified', 'desc' => 'All ingredients verified non-GMO through third-party testing and supply chain documentation.'],
    ['name' => 'Gluten-Free Certified', 'desc' => 'Tested to contain less than 20 ppm of gluten, meeting FDA standards for gluten-free labeling.'],
];

$ingredients = [
    ['name' => 'KSM-66 Ashwagandha', 'use' => 'Calm & Relax', 'benefit' => 'Full-spectrum root extract clinically shown to reduce cortisol by 28% and stress scores by 44% in a 60-day randomized controlled trial.'],
    ['name' => 'Magtein (Magnesium L-Threonate)', 'use' => 'Sleep Well', 'benefit' => 'The only form of magnesium proven to cross the blood-brain barrier, enhancing synaptic density and supporting deep, restorative sleep.'],
    ['name' => 'Cognizin Citicoline', 'use' => 'Focus + Energy', 'benefit' => 'Patented form of citicoline shown to increase brain energy (ATP) by 13.6% and enhance focus, attention, and mental clarity.'],
    ['name' => 'Hyaluronic Acid (Low-MW)', 'use' => 'Daily Glow', 'benefit' => 'Low molecular weight for superior oral bioavailability, clinically proven to increase skin moisture by 40% in 6 weeks.'],
];
?>

<!-- Hero -->
<section class="science-hero">
  <div class="science-hero__container container">
    <span class="science-hero__eyebrow">Research &amp; Development</span>
    <h1 class="science-hero__title">The Science of Dr. Gummy</h1>
    <p class="science-hero__subtitle">Every product we create starts with clinical research and ends with third-party verification. No shortcuts, no compromises — just science-backed supplementation that works.</p>
  </div>
</section>

<!-- Formulation Principles -->
<section class="science-principles section">
  <div class="container">
    <h2 class="text-section-title text-center">Our Formulation Principles</h2>
    <p class="science-section-sub text-center">The four pillars that separate Dr. Gummy from everything else on the shelf.</p>
    <div class="science-principles__grid">
      <?php foreach ($principles as $p) : ?>
      <div class="science-principles__card">
        <div class="science-principles__icon"><?php echo $p['icon']; ?></div>
        <h3><?php echo esc_html($p['title']); ?></h3>
        <p><?php echo esc_html($p['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Ingredient Sourcing -->
<section class="science-ingredients section bg-white">
  <div class="container">
    <h2 class="text-section-title text-center">Key Ingredients</h2>
    <p class="science-section-sub text-center">Patented, trademarked compounds with published human clinical data.</p>
    <div class="science-ingredients__grid">
      <?php foreach ($ingredients as $ing) : ?>
      <div class="science-ingredients__card">
        <span class="science-ingredients__use"><?php echo esc_html($ing['use']); ?></span>
        <h3 class="science-ingredients__name"><?php echo esc_html($ing['name']); ?></h3>
        <p class="science-ingredients__benefit"><?php echo esc_html($ing['benefit']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Testing Process -->
<section class="science-testing section">
  <div class="container">
    <h2 class="text-section-title text-center">Our Testing Process</h2>
    <p class="science-section-sub text-center">Four stages of quality assurance, from raw material to finished product.</p>
    <div class="science-testing__grid">
      <?php foreach ($testing_steps as $ts) : ?>
      <div class="science-testing__step">
        <span class="science-testing__number"><?php echo esc_html($ts['step']); ?></span>
        <h3><?php echo esc_html($ts['title']); ?></h3>
        <p><?php echo esc_html($ts['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Certifications -->
<section class="science-certs section bg-white">
  <div class="container">
    <h2 class="text-section-title text-center">Certifications &amp; Compliance</h2>
    <p class="science-section-sub text-center">Verified by independent third-party organizations.</p>
    <div class="science-certs__grid">
      <?php foreach ($certs as $c) : ?>
      <div class="science-certs__card">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--color-success-green)" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        <div>
          <strong><?php echo esc_html($c['name']); ?></strong>
          <p><?php echo esc_html($c['desc']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
