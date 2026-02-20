<?php
/**
 * Template Name: FAQs
 * Slug: faqs
 *
 * Accordion Q&A page with category tabs.
 *
 * @package DR_Gummy
 */

get_header();

$faq_categories = [
    'All' => [],
    'Ingredients' => [
        [
            'q' => 'What ingredients are in Dr. Gummy products?',
            'a' => 'Every Dr. Gummy product uses clinically studied, patented ingredients at research-backed dosages. We use KSM-66 Ashwagandha, Magtein (Magnesium L-Threonate), Cognizin Citicoline, low-molecular-weight Hyaluronic Acid, and other premium compounds. Full ingredient lists with exact dosages are printed on every label — we never use proprietary blends.',
        ],
        [
            'q' => 'Are your products FDA approved?',
            'a' => 'Dietary supplements are not required to receive FDA approval before they are marketed. However, our products are manufactured in an FDA-registered, GMP-certified facility that is regularly inspected. All ingredients comply with FDA regulations for dietary supplements under DSHEA (Dietary Supplement Health and Education Act of 1994). Every batch is third-party tested for purity, potency, and safety.',
        ],
        [
            'q' => 'Do your gummies contain allergens?',
            'a' => 'Our products are formulated to be free from major allergens including gluten, dairy, soy, and nuts. However, they are manufactured in a facility that also processes products containing common allergens. If you have a specific allergy, please review the allergen statement on each product label or contact our support team before purchasing.',
        ],
        [
            'q' => 'Are Dr. Gummy products vegan and non-GMO?',
            'a' => 'All Dr. Gummy products are non-GMO verified. Our gummies use pectin (plant-based) rather than gelatin, making them suitable for vegetarian diets. Please check individual product labels for specific vegan certification, as some formulations may contain ingredients derived from animal sources such as Vitamin D3 (lanolin).',
        ],
    ],
    'Dosage' => [
        [
            'q' => 'What is the recommended dosage?',
            'a' => 'The recommended dosage is printed on each product label. Most Dr. Gummy products recommend 2 gummies per day, taken with or without food. For optimal results, we recommend consistent daily use. Do not exceed the recommended dosage unless directed by your healthcare provider.',
        ],
        [
            'q' => 'Can I combine multiple Dr. Gummy products?',
            'a' => 'Yes! Our products are specifically formulated to be safely combined. Popular stacks include Sleep Well + Calm & Relax for deep rest, or Focus + Energy + Daily Glow for a productive day. Each product targets different biological pathways, so there is no overlap or risk of doubling up on ingredients. If you take prescription medications, consult your healthcare provider before combining supplements.',
        ],
        [
            'q' => 'When will I see results?',
            'a' => 'Results vary by product and individual. Some products like Sleep Well and Focus + Energy may show noticeable effects within the first 1–3 days. Ingredients like Ashwagandha (Calm & Relax) and Hyaluronic Acid (Daily Glow) typically require 2–4 weeks of consistent daily use to reach full effectiveness, as they build up in your system over time.',
        ],
    ],
    'Shipping' => [
        [
            'q' => 'Do you offer free shipping?',
            'a' => 'Yes! We offer free standard shipping on all orders over $50. Orders under $50 ship for a flat rate of $4.95. Bundle orders of 2+ bottles always qualify for free shipping regardless of order total. Standard shipping typically takes 3–7 business days from the date of shipment.',
        ],
        [
            'q' => 'Do you ship internationally?',
            'a' => 'Currently, we ship to all 50 US states and select international destinations. International shipping rates and delivery times vary by location and are calculated at checkout. Please note that international orders may be subject to customs duties and import taxes, which are the responsibility of the recipient.',
        ],
        [
            'q' => 'How can I track my order?',
            'a' => 'Once your order ships, you will receive a shipping confirmation email with a tracking number and link. You can also track your order by logging into your account on our website and visiting the "Order History" section. If you have not received tracking information within 3 business days of placing your order, please contact support@drgummy.com.',
        ],
    ],
    'Returns' => [
        [
            'q' => 'What is your return policy?',
            'a' => 'We offer a 60-day satisfaction guarantee on all purchases. If you\'re not completely satisfied for any reason, contact us within 60 days of delivery for a full refund. Opened products may be returned if less than 75% has been consumed. We\'ll provide a prepaid return shipping label at no cost to you.',
        ],
        [
            'q' => 'How do I initiate a return?',
            'a' => 'Email support@drgummy.com or call (800) 555-GUMMY with your order number and the reason for the return. Our team will provide a Return Merchandise Authorization (RMA) number and prepaid shipping label within 1–2 business days. Refunds are processed within 5–7 business days of receiving the returned product.',
        ],
    ],
    'Subscription' => [
        [
            'q' => 'How does Subscribe & Save work?',
            'a' => 'Subscribe & Save gives you an automatic 10–20% discount on every order, plus free shipping. Choose your delivery frequency (every 30, 60, or 90 days), and we\'ll automatically ship your products on schedule. You\'ll receive an email reminder before each shipment, and you can modify, skip, or cancel anytime from your account dashboard.',
        ],
        [
            'q' => 'Can I modify or cancel my subscription?',
            'a' => 'Absolutely. You have full control over your subscription. Log into your account, go to "Subscriptions," and you can change products, adjust quantities, switch delivery frequency, skip a shipment, or cancel entirely — no questions asked, no cancellation fees. Changes must be made at least 48 hours before your next scheduled shipment date.',
        ],
        [
            'q' => 'Do subscription discounts stack with bundle discounts?',
            'a' => 'Yes! Subscribe & Save discounts stack with bundle tier pricing. For example, if you purchase a 4-bottle bundle (35% off) with Subscribe & Save (additional 10% off), the subscription discount is applied after the tier discount for maximum savings.',
        ],
    ],
];
?>

<section class="faqs-page">
  <div class="faqs-page__container container">

    <!-- Header -->
    <div class="faqs-header">
      <h1 class="faqs-header__title">Frequently Asked Questions</h1>
      <p class="faqs-header__subtitle">Everything you need to know about Dr. Gummy products, shipping, returns, and subscriptions.</p>
    </div>

    <!-- Category Tabs -->
    <div class="faqs-tabs" id="faqs-tabs">
      <?php foreach (array_keys($faq_categories) as $cat) : ?>
      <button class="faqs-tab<?php echo $cat === 'All' ? ' is-active' : ''; ?>" data-faq-filter="<?php echo esc_attr($cat); ?>" type="button"><?php echo esc_html($cat); ?></button>
      <?php endforeach; ?>
    </div>

    <!-- Accordion -->
    <div class="faqs-list" id="faqs-list">
      <?php foreach ($faq_categories as $cat => $items) :
        if ($cat === 'All') continue;
        foreach ($items as $faq) : ?>
      <div class="faqs-item" data-faq-category="<?php echo esc_attr($cat); ?>">
        <button class="faqs-item__question" type="button" aria-expanded="false">
          <span><?php echo esc_html($faq['q']); ?></span>
          <svg class="faqs-item__chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="faqs-item__answer" hidden>
          <p><?php echo esc_html($faq['a']); ?></p>
        </div>
      </div>
      <?php endforeach;
      endforeach; ?>
    </div>

    <!-- CTA -->
    <div class="faqs-cta">
      <p>Can't find what you're looking for?</p>
      <a href="/contact/" class="btn btn--primary">Contact Support</a>
    </div>

  </div>
</section>

<?php get_footer(); ?>
