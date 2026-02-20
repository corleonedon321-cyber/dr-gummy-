<?php
/**
 * Template Name: Legal & Privacy
 * Slug: legal
 *
 * Tabbed legal pages with sidebar navigation, real legal content
 * for Dr. Gummy LLC supplement ecommerce company.
 *
 * @package DR_Gummy
 */

get_header();

// Section definitions — sidebar nav + content
$legal_sections = [

    /* ----------------------------------------------------------------
       1. TERMS OF SERVICE
       ---------------------------------------------------------------- */
    'terms' => [
        'title' => 'Terms of Service',
        'icon'  => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
        'content' => [
            [
                'heading' => '1. Acceptance of Terms',
                'body'    => '<p>By accessing, browsing, or placing an order through the Dr. Gummy website (drgummy.com) or any affiliated mobile application (collectively, the "Site"), you acknowledge that you have read, understood, and agree to be bound by these Terms of Service ("Terms"), our Privacy Policy, and all applicable laws and regulations. If you do not agree with any part of these Terms, you must discontinue use of the Site immediately.</p>
<p>Dr. Gummy LLC ("Dr. Gummy," "we," "us," or "our") reserves the right to modify, amend, or update these Terms at any time without prior notice. Your continued use of the Site following the posting of revised Terms constitutes your acceptance of such changes. We recommend reviewing this page periodically for updates.</p>',
            ],
            [
                'heading' => '2. Eligibility & Account Registration',
                'body'    => '<p>You must be at least 18 years of age or the age of majority in your jurisdiction to use this Site or purchase products from Dr. Gummy. By creating an account, you represent and warrant that the information you provide is accurate, current, and complete. You are solely responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</p>
<p>We reserve the right to suspend or terminate any account that we reasonably believe has been created in violation of these Terms, used for fraudulent purposes, or associated with unauthorized activity.</p>',
            ],
            [
                'heading' => '3. Products & Pricing',
                'body'    => '<p>All products listed on the Site are dietary supplements manufactured in FDA-registered, GMP-certified facilities within the United States. Product descriptions, images, and ingredient lists are provided for informational purposes and are subject to change without notice. While we make every effort to display colors and images accurately, we cannot guarantee that your device\'s display will reflect exact product appearance.</p>
<p>Prices are listed in US Dollars and are subject to change at any time. Promotional pricing, coupon codes, and bundle discounts may not be combined unless expressly stated. Sales tax will be applied where required by law and calculated at checkout based on the shipping destination.</p>',
            ],
            [
                'heading' => '4. Orders & Payment',
                'body'    => '<p>By placing an order, you make an offer to purchase the selected products subject to these Terms. All orders are subject to acceptance and product availability. We reserve the right to refuse or cancel any order for any reason, including but not limited to pricing errors, suspected fraud, or product unavailability.</p>
<p>We accept Visa, Mastercard, American Express, PayPal, Apple Pay, and Google Pay. Payment is processed at the time your order is placed. If your payment method is declined, the order will not be processed and you will be notified.</p>',
            ],
            [
                'heading' => '5. Subscription & Auto-Ship Program',
                'body'    => '<p>When you enroll in our Subscribe &amp; Save program, you authorize Dr. Gummy to automatically charge your selected payment method at the frequency you have chosen (e.g., every 30, 60, or 90 days). You will receive an email notification before each shipment is processed.</p>
<p>You may modify, pause, or cancel your subscription at any time by logging into your account or contacting our support team at support@drgummy.com at least 48 hours before your next scheduled shipment date. Cancellations made after a shipment has been processed are subject to our standard Return &amp; Refund Policy.</p>',
            ],
            [
                'heading' => '6. Shipping & Delivery',
                'body'    => '<p>Dr. Gummy ships to all 50 United States and select international destinations. Standard shipping typically takes 3–7 business days from the date of shipment. Expedited and overnight options are available at an additional cost. Free shipping is available on orders meeting the applicable minimum threshold displayed at checkout.</p>
<p>Risk of loss and title for all products pass to you upon delivery to the carrier. We are not responsible for delays caused by customs, weather events, carrier issues, or circumstances beyond our control. Delivery estimates are not guaranteed.</p>',
            ],
            [
                'heading' => '7. Intellectual Property',
                'body'    => '<p>All content on the Site — including but not limited to text, graphics, logos, images, product formulations, packaging designs, videos, and software — is the exclusive property of Dr. Gummy LLC or its licensors and is protected by United States and international copyright, trademark, and intellectual property laws.</p>
<p>You may not reproduce, distribute, modify, create derivative works from, publicly display, or otherwise exploit any content from this Site without our prior written consent. The DR GUMMY name, logo, and all related marks are registered trademarks of Dr. Gummy LLC.</p>',
            ],
            [
                'heading' => '8. Limitation of Liability',
                'body'    => '<p>To the fullest extent permitted by applicable law, Dr. Gummy LLC, its officers, directors, employees, agents, and affiliates shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising out of or related to your use of the Site, purchase of products, or reliance on any information provided herein.</p>
<p>In no event shall our total aggregate liability exceed the amount you paid for the specific product giving rise to the claim. Some jurisdictions do not allow the exclusion or limitation of certain damages, so some of the above limitations may not apply to you.</p>',
            ],
            [
                'heading' => '9. Governing Law & Dispute Resolution',
                'body'    => '<p>These Terms shall be governed by and construed in accordance with the laws of the State of Delaware, United States, without regard to its conflict of law principles. Any dispute arising under or in connection with these Terms shall be resolved exclusively through binding arbitration administered by the American Arbitration Association (AAA) under its Consumer Arbitration Rules.</p>
<p>You agree that any arbitration shall be conducted on an individual basis and not as a class, consolidated, or representative action. The arbitration shall take place in Wilmington, Delaware, or at a location mutually agreed upon by the parties.</p>',
            ],
            [
                'heading' => '10. Contact Information',
                'body'    => '<p>If you have any questions regarding these Terms of Service, please contact us:</p>
<p><strong>Dr. Gummy LLC</strong><br>
Attn: Legal Department<br>
1209 Orange Street, Wilmington, DE 19801<br>
Email: <a href="mailto:legal@drgummy.com">legal@drgummy.com</a><br>
Phone: (800) 555-GUMMY</p>
<p><em>Last updated: February 20, 2026</em></p>',
            ],
        ],
    ],

    /* ----------------------------------------------------------------
       2. PRIVACY POLICY
       ---------------------------------------------------------------- */
    'privacy' => [
        'title' => 'Privacy Policy',
        'icon'  => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        'content' => [
            [
                'heading' => '1. Information We Collect',
                'body'    => '<p>Dr. Gummy LLC ("we," "us," or "our") collects information you provide directly when creating an account, placing an order, subscribing to our newsletter, or contacting customer support. This includes your name, email address, shipping and billing addresses, phone number, payment information, and order history.</p>
<p>We also automatically collect certain information when you visit our Site, including your IP address, browser type, operating system, referring URLs, pages viewed, time spent on pages, and device identifiers. This data is collected through cookies, web beacons, pixel tags, and similar tracking technologies.</p>',
            ],
            [
                'heading' => '2. How We Use Your Information',
                'body'    => '<p>We use the information we collect to: (a) process and fulfill your orders, including managing subscriptions and processing payments; (b) communicate with you about your orders, account, and promotional offers; (c) personalize your experience and deliver content and product offerings relevant to your interests; (d) improve our Site, products, and customer service; (e) detect, prevent, and address fraud and security issues; and (f) comply with legal obligations.</p>
<p>We will not sell your personal information to third parties. We may share your data with trusted service providers who assist us in operating our Site, processing payments, fulfilling orders, and conducting business, provided they agree to keep your information confidential.</p>',
            ],
            [
                'heading' => '3. Third-Party Service Providers',
                'body'    => '<p>We work with the following categories of third-party providers who may process your data on our behalf: payment processors (Stripe, PayPal), shipping carriers (USPS, UPS, FedEx), email marketing platforms (Klaviyo), analytics services (Google Analytics), customer support tools, and fraud prevention services. These providers are contractually obligated to use your data only for the purposes we specify and in compliance with applicable data protection laws.</p>',
            ],
            [
                'heading' => '4. Cookies & Tracking Technologies',
                'body'    => '<p>We use cookies and similar technologies to enhance your browsing experience, analyze Site traffic, personalize content, and serve targeted advertisements. You may adjust your cookie preferences through our cookie consent banner or through your browser settings. Please note that disabling certain cookies may affect the functionality of the Site.</p>
<p>For detailed information about the cookies we use, please refer to our Cookie Policy section.</p>',
            ],
            [
                'heading' => '5. Data Retention & Security',
                'body'    => '<p>We retain your personal information for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required or permitted by law. Order and transaction data is retained for a minimum of seven (7) years for tax and accounting compliance.</p>
<p>We implement industry-standard security measures, including SSL/TLS encryption, PCI-DSS compliant payment processing, secure server infrastructure, and regular security audits to protect your personal information. However, no method of transmission over the Internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>',
            ],
            [
                'heading' => '6. Your Rights & Choices',
                'body'    => '<p>Depending on your jurisdiction, you may have the following rights regarding your personal data: (a) the right to access and obtain a copy of your data; (b) the right to rectify inaccurate or incomplete data; (c) the right to request deletion of your data; (d) the right to restrict or object to processing; (e) the right to data portability; and (f) the right to withdraw consent at any time.</p>
<p>California residents have additional rights under the California Consumer Privacy Act (CCPA), including the right to know what personal information is collected, the right to opt out of the sale of personal information, and the right to non-discrimination for exercising their rights. To exercise any of these rights, please contact us at <a href="mailto:privacy@drgummy.com">privacy@drgummy.com</a>.</p>',
            ],
            [
                'heading' => '7. Children\'s Privacy',
                'body'    => '<p>Our Site is not directed to individuals under the age of 18. We do not knowingly collect personal information from children. If we become aware that we have inadvertently collected personal information from a child under 18, we will take steps to delete such information promptly. If you believe a child has provided us with personal information, please contact us at <a href="mailto:privacy@drgummy.com">privacy@drgummy.com</a>.</p>
<p><em>Last updated: February 20, 2026</em></p>',
            ],
        ],
    ],

    /* ----------------------------------------------------------------
       3. COOKIE POLICY
       ---------------------------------------------------------------- */
    'cookies' => [
        'title' => 'Cookie Policy',
        'icon'  => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>',
        'content' => [
            [
                'heading' => '1. What Are Cookies',
                'body'    => '<p>Cookies are small text files placed on your device by websites you visit. They are widely used to make websites function properly, improve user experience, and provide reporting information. Cookies may be "session cookies" (deleted when you close your browser) or "persistent cookies" (remain on your device for a set period or until manually deleted).</p>',
            ],
            [
                'heading' => '2. Cookies We Use',
                'body'    => '<p><strong>Essential Cookies:</strong> Required for the Site to function. These cookies enable core functionality such as shopping cart management, user authentication, session security, and checkout processing. They cannot be disabled without affecting Site functionality.</p>
<p><strong>Analytics Cookies:</strong> Help us understand how visitors interact with our Site by collecting anonymous usage data. We use Google Analytics (GA4) to track page views, session duration, bounce rates, and traffic sources. These cookies do not identify individual users.</p>
<p><strong>Marketing Cookies:</strong> Used to deliver personalized advertisements and measure the effectiveness of our advertising campaigns. We may use Facebook Pixel, Google Ads, and similar services. These cookies track your browsing activity across websites to build a profile of your interests.</p>
<p><strong>Functional Cookies:</strong> Enable enhanced functionality and personalization, such as remembering your preferences, language settings, recently viewed products, and subscription selections.</p>',
            ],
            [
                'heading' => '3. Managing Your Cookie Preferences',
                'body'    => '<p>When you first visit our Site, a cookie consent banner will allow you to accept or customize your cookie preferences. You can modify these preferences at any time by clicking the "Cookie Settings" link in our website footer.</p>
<p>You may also control cookies through your browser settings. Most browsers allow you to block or delete cookies. Please note that restricting cookies may impair certain functionality of the Site, including the ability to add items to your cart or complete a purchase.</p>',
            ],
            [
                'heading' => '4. Third-Party Cookies',
                'body'    => '<p>Some cookies are placed by third-party services that appear on our pages. We do not control the cookies set by these third parties. For more information about their cookie practices, please review the respective privacy policies of Google, Meta (Facebook), Klaviyo, and other third-party providers integrated with our Site.</p>
<p><em>Last updated: February 20, 2026</em></p>',
            ],
        ],
    ],

    /* ----------------------------------------------------------------
       4. DISCLAIMER & MEDICAL ADVICE
       ---------------------------------------------------------------- */
    'disclaimer' => [
        'title' => 'Disclaimer & Medical Advice',
        'icon'  => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>',
        'content' => [
            [
                'heading' => '1. Dietary Supplement Disclaimer',
                'body'    => '<p>The products sold by Dr. Gummy LLC are dietary supplements intended to support general health and wellness. <strong>These statements have not been evaluated by the Food and Drug Administration (FDA). Our products are not intended to diagnose, treat, cure, or prevent any disease.</strong></p>
<p>All product descriptions, ingredient information, nutritional content, and health claims on this Site are provided for educational and informational purposes only. Individual results may vary. The efficacy of dietary supplements depends on numerous factors including, but not limited to, individual health status, diet, exercise, genetics, and consistency of use.</p>',
            ],
            [
                'heading' => '2. Not a Substitute for Medical Advice',
                'body'    => '<p>The information provided on this Site, including product pages, blog articles, ingredient descriptions, and customer testimonials, is not intended as a substitute for professional medical advice, diagnosis, or treatment. Always consult a qualified healthcare provider before starting any dietary supplement, especially if you are pregnant, nursing, taking prescription medications, or have a pre-existing medical condition.</p>
<p>Do not disregard, avoid, or delay obtaining medical advice from a qualified healthcare professional because of something you have read on our Site. If you experience any adverse reaction to any of our products, discontinue use immediately and consult your physician.</p>',
            ],
            [
                'heading' => '3. Allergen & Ingredient Information',
                'body'    => '<p>While we make every effort to provide accurate ingredient and allergen information, formulations may change. Always read the product label before consumption. Our products are manufactured in facilities that may also process common allergens including but not limited to: tree nuts, peanuts, soy, milk, eggs, wheat, fish, and shellfish.</p>
<p>If you have known allergies or sensitivities, please review the full ingredient list on the product label and consult with your healthcare provider before use.</p>',
            ],
            [
                'heading' => '4. Third-Party Research & Citations',
                'body'    => '<p>Where we reference clinical studies, research papers, or scientific findings on our Site, these references are provided for informational purposes only. The inclusion of third-party research does not imply endorsement of our products by the researchers or institutions cited. Studies on individual ingredients may not reflect the results achievable with our specific product formulations.</p>',
            ],
            [
                'heading' => '5. Testimonials & Reviews',
                'body'    => '<p>Customer testimonials and reviews displayed on this Site represent the individual experiences and opinions of those customers. These testimonials are not representative of all customer experiences and are not intended as guarantees that you will achieve the same or similar results. Individual results will vary based on personal circumstances.</p>
<p><em>Last updated: February 20, 2026</em></p>',
            ],
        ],
    ],

    /* ----------------------------------------------------------------
       5. RETURN & REFUND POLICY
       ---------------------------------------------------------------- */
    'refund' => [
        'title' => 'Return & Refund Policy',
        'icon'  => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"/></svg>',
        'content' => [
            [
                'heading' => '1. 60-Day Satisfaction Guarantee',
                'body'    => '<p>Dr. Gummy LLC stands behind the quality of our products. We offer a 60-day satisfaction guarantee on all purchases made directly through our Site. If you are not completely satisfied with your purchase for any reason, you may request a return within 60 days of the original delivery date.</p>',
            ],
            [
                'heading' => '2. Return Eligibility',
                'body'    => '<p>To be eligible for a return and refund: (a) the request must be made within 60 days of delivery; (b) the product must be in its original packaging; (c) opened products may be returned if less than 75% of the contents have been consumed; (d) proof of purchase (order number or email confirmation) must be provided.</p>
<p>The following items are not eligible for return: gift cards, promotional or free items, and products purchased from unauthorized third-party retailers (including Amazon Marketplace third-party sellers).</p>',
            ],
            [
                'heading' => '3. How to Initiate a Return',
                'body'    => '<p>To initiate a return, please contact our Customer Support team at <a href="mailto:support@drgummy.com">support@drgummy.com</a> or call (800) 555-GUMMY. Please include your order number, the product(s) you wish to return, and the reason for the return. Our team will provide you with a Return Merchandise Authorization (RMA) number and prepaid shipping label within 1–2 business days.</p>
<p>Products must be shipped back within 14 days of receiving the RMA. Returns sent without a valid RMA number may not be processed.</p>',
            ],
            [
                'heading' => '4. Refund Processing',
                'body'    => '<p>Upon receipt and inspection of the returned product, we will process your refund within 5–7 business days. Refunds are issued to the original payment method. Please allow an additional 3–5 business days for the refund to appear on your statement, depending on your financial institution.</p>
<p>Original shipping costs are non-refundable unless the return is due to a product defect, damage during shipping, or an error on our part. In such cases, we will also cover return shipping costs.</p>',
            ],
            [
                'heading' => '5. Subscription Cancellation Refunds',
                'body'    => '<p>For subscription orders, you may cancel at any time before the next billing cycle. If a subscription shipment has already been processed and shipped, it is subject to the standard return policy described above. Partial-month refunds are not available for subscription orders.</p>',
            ],
            [
                'heading' => '6. Damaged or Incorrect Items',
                'body'    => '<p>If you receive a damaged, defective, or incorrect product, please contact us within 7 days of delivery with photos of the issue and your order number. We will promptly ship a replacement at no cost or issue a full refund, including any applicable shipping charges, at your preference.</p>
<p><em>Last updated: February 20, 2026</em></p>',
            ],
        ],
    ],

    /* ----------------------------------------------------------------
       6. CONTACT US
       ---------------------------------------------------------------- */
    'contact' => [
        'title' => 'Contact Us',
        'icon'  => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
        'content' => [
            [
                'heading' => '1. Customer Support',
                'body'    => '<p>Our Customer Support team is available to assist you with orders, product questions, subscription management, and general inquiries.</p>
<p><strong>Email:</strong> <a href="mailto:support@drgummy.com">support@drgummy.com</a><br>
<strong>Phone:</strong> (800) 555-GUMMY (486-69)<br>
<strong>Hours:</strong> Monday – Friday, 9:00 AM – 6:00 PM EST<br>
<strong>Response Time:</strong> We aim to respond to all email inquiries within 24 business hours.</p>',
            ],
            [
                'heading' => '2. Legal & Privacy Inquiries',
                'body'    => '<p>For questions related to our Terms of Service, Privacy Policy, data access/deletion requests, or other legal matters, please contact our Legal Department:</p>
<p><strong>Email:</strong> <a href="mailto:legal@drgummy.com">legal@drgummy.com</a><br>
<strong>Mail:</strong> Dr. Gummy LLC, Attn: Legal Department, 1209 Orange Street, Wilmington, DE 19801</p>',
            ],
            [
                'heading' => '3. Business & Partnership Inquiries',
                'body'    => '<p>For wholesale accounts, affiliate partnerships, media inquiries, and brand collaboration opportunities, please reach out to:</p>
<p><strong>Email:</strong> <a href="mailto:partnerships@drgummy.com">partnerships@drgummy.com</a></p>',
            ],
            [
                'heading' => '4. Mailing Address',
                'body'    => '<p><strong>Dr. Gummy LLC</strong><br>
1209 Orange Street<br>
Wilmington, DE 19801<br>
United States</p>
<p>For returns, please do not ship products to this address. Contact our support team to receive a Return Merchandise Authorization (RMA) and the correct return shipping address.</p>
<p><em>Last updated: February 20, 2026</em></p>',
            ],
        ],
    ],

    /* ----------------------------------------------------------------
       7. ACCESSIBILITY STATEMENT
       ---------------------------------------------------------------- */
    'accessibility' => [
        'title' => 'Accessibility Statement',
        'icon'  => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="4"/><line x1="4.93" y1="4.93" x2="9.17" y2="9.17"/><line x1="14.83" y1="14.83" x2="19.07" y2="19.07"/><line x1="14.83" y1="9.17" x2="19.07" y2="4.93"/><line x1="4.93" y1="19.07" x2="9.17" y2="14.83"/></svg>',
        'content' => [
            [
                'heading' => '1. Our Commitment',
                'body'    => '<p>Dr. Gummy LLC is committed to ensuring that our website is accessible to all individuals, including those with disabilities. We strive to provide an inclusive and user-friendly experience for every visitor, regardless of ability or technology used to access our Site.</p>
<p>We aim to conform to the Web Content Accessibility Guidelines (WCAG) 2.1, Level AA, as published by the World Wide Web Consortium (W3C). These guidelines provide a framework for making web content more accessible to people with a wide range of disabilities, including visual, auditory, motor, and cognitive impairments.</p>',
            ],
            [
                'heading' => '2. Measures We Have Taken',
                'body'    => '<p>To support accessibility, we have implemented the following measures across our Site:</p>
<ul>
<li>Semantic HTML structure with proper heading hierarchy</li>
<li>Descriptive alt text for all product images and informational graphics</li>
<li>Sufficient color contrast ratios meeting WCAG AA standards</li>
<li>Full keyboard navigation support for all interactive elements</li>
<li>ARIA labels and roles for custom components (drawers, modals, toggles)</li>
<li>Visible focus indicators for keyboard users</li>
<li>Responsive design that supports screen magnification up to 200%</li>
<li>Compatible with popular screen readers (NVDA, JAWS, VoiceOver)</li>
</ul>',
            ],
            [
                'heading' => '3. Known Limitations',
                'body'    => '<p>While we strive for comprehensive accessibility, some areas of the Site may not yet be fully optimized. We are continuously working to identify and resolve accessibility barriers. Known areas under active improvement include: (a) certain third-party embedded content (social media widgets, payment forms) that may not fully conform to WCAG standards; and (b) some PDF documents that may require additional accessibility enhancements.</p>',
            ],
            [
                'heading' => '4. Feedback & Assistance',
                'body'    => '<p>We welcome your feedback on the accessibility of our Site. If you encounter any accessibility barriers or need assistance with any part of our Site, please contact us:</p>
<p><strong>Email:</strong> <a href="mailto:accessibility@drgummy.com">accessibility@drgummy.com</a><br>
<strong>Phone:</strong> (800) 555-GUMMY (486-69)<br>
<strong>Mail:</strong> Dr. Gummy LLC, Attn: Accessibility Coordinator, 1209 Orange Street, Wilmington, DE 19801</p>
<p>We will make reasonable efforts to respond to accessibility-related requests within 2 business days and to provide the information or functionality you need in an accessible format.</p>
<p><em>Last updated: February 20, 2026</em></p>',
            ],
        ],
    ],
];
?>

<section class="legal-page" id="legal-page">
  <div class="legal-page__container container--wide">

    <!-- Breadcrumb -->
    <nav class="legal-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo esc_url(home_url('/')); ?>">Dr. Gummy</a>
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
      <span>Legal &amp; Privacy</span>
    </nav>

    <div class="legal-layout">

      <!-- ============================================================
           SIDEBAR NAVIGATION
           ============================================================ -->
      <aside class="legal-sidebar" id="legal-sidebar">
        <h2 class="legal-sidebar__title">Legal &amp; Privacy Sections</h2>
        <nav class="legal-sidebar__nav" aria-label="Legal sections navigation">
          <?php $first = true; ?>
          <?php foreach ($legal_sections as $slug => $section) : ?>
          <a
            href="#<?php echo esc_attr($slug); ?>"
            class="legal-sidebar__link<?php echo $first ? ' is-active' : ''; ?>"
            data-legal-tab="<?php echo esc_attr($slug); ?>"
          >
            <span class="legal-sidebar__link-icon"><?php echo $section['icon']; ?></span>
            <span class="legal-sidebar__link-text"><?php echo esc_html($section['title']); ?></span>
            <span class="legal-sidebar__link-active">Active</span>
          </a>
          <?php $first = false; ?>
          <?php endforeach; ?>
        </nav>
      </aside>

      <!-- ============================================================
           MAIN CONTENT PANELS
           ============================================================ -->
      <div class="legal-content" id="legal-content">
        <?php $first_panel = true; ?>
        <?php foreach ($legal_sections as $slug => $section) : ?>
        <article
          class="legal-panel<?php echo $first_panel ? ' is-active' : ''; ?>"
          id="panel-<?php echo esc_attr($slug); ?>"
          data-legal-panel="<?php echo esc_attr($slug); ?>"
          <?php echo !$first_panel ? 'hidden' : ''; ?>
        >
          <h1 class="legal-panel__title"><?php echo esc_html($section['title']); ?></h1>

          <?php foreach ($section['content'] as $idx => $block) : ?>
          <div class="legal-panel__section">
            <h3 class="legal-panel__heading"><?php echo esc_html($block['heading']); ?></h3>
            <div class="legal-panel__body">
              <?php echo $block['body']; ?>
            </div>
          </div>
          <?php endforeach; ?>

          <!-- Print & Download buttons -->
          <div class="legal-panel__actions">
            <button class="btn btn--outline-gray" data-legal-print type="button">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
              Print
            </button>
            <button class="btn btn--outline-gray" data-legal-download type="button">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
              Download PDF
            </button>
          </div>
        </article>
        <?php $first_panel = false; ?>
        <?php endforeach; ?>
      </div>

    </div><!-- /.legal-layout -->

  </div>
</section>

<?php get_footer(); ?>
