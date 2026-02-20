<?php
/**
 * Template Name: Blog
 * Slug: blog
 *
 * Blog listing with card grid and sidebar.
 *
 * @package DR_Gummy
 */

get_header();

$categories = [
    'All',
    'Ingredients',
    'Sleep',
    'Focus',
    'Wellness',
    'Nutrition',
];

$posts_data = [
    [
        'title'    => 'The Science Behind KSM-66 Ashwagandha: Why It\'s Our #1 Stress Ingredient',
        'excerpt'  => 'KSM-66 is the most clinically studied ashwagandha extract in the world. Here\'s why we chose it over generic alternatives and what the research actually shows.',
        'category' => 'Ingredients',
        'date'     => 'Feb 12, 2026',
        'read'     => '8 min read',
        'color'    => '#2E5735',
    ],
    [
        'title'    => '5 Evidence-Based Sleep Habits That Actually Work (According to Sleep Scientists)',
        'excerpt'  => 'Forget the generic advice. These are the five sleep hygiene practices supported by randomized controlled trials — and how supplements fit in.',
        'category' => 'Sleep',
        'date'     => 'Feb 5, 2026',
        'read'     => '6 min read',
        'color'    => '#4A7C59',
    ],
    [
        'title'    => 'Lion\'s Mane vs. Bacopa Monnieri: Which Nootropic Is Right for You?',
        'excerpt'  => 'Two of the most popular natural nootropics compared head-to-head. We break down the mechanisms, clinical evidence, onset time, and ideal use cases.',
        'category' => 'Focus',
        'date'     => 'Jan 28, 2026',
        'read'     => '10 min read',
        'color'    => '#5BA4B5',
    ],
    [
        'title'    => 'Understanding Supplement Labels: How to Spot Red Flags and Marketing Tricks',
        'excerpt'  => 'Proprietary blends, pixie-dusting, label claims vs. reality. A pharmacist\'s guide to reading supplement facts panels like a professional.',
        'category' => 'Wellness',
        'date'     => 'Jan 20, 2026',
        'read'     => '7 min read',
        'color'    => '#D4A853',
    ],
    [
        'title'    => 'Magnesium L-Threonate: The Only Form That Crosses the Blood-Brain Barrier',
        'excerpt'  => 'Not all magnesium is created equal. Why Magtein (Magnesium L-Threonate) is uniquely effective for sleep, cognitive function, and brain health.',
        'category' => 'Ingredients',
        'date'     => 'Jan 14, 2026',
        'read'     => '5 min read',
        'color'    => '#2E5735',
    ],
    [
        'title'    => 'How to Build the Perfect Supplement Stack for Your Goals',
        'excerpt'  => 'Sleep + Focus + Calm? Energy + Glow? Our guide to combining Dr. Gummy products safely and effectively for maximum results.',
        'category' => 'Nutrition',
        'date'     => 'Jan 7, 2026',
        'read'     => '9 min read',
        'color'    => '#4A7C59',
    ],
];

$popular = [
    'The Science Behind KSM-66 Ashwagandha',
    'Magnesium L-Threonate: Brain Barrier',
    '5 Evidence-Based Sleep Habits',
    'Understanding Supplement Labels',
];
?>

<section class="blog-page">
  <div class="blog-page__container container">

    <!-- Header -->
    <div class="blog-header">
      <span class="blog-header__eyebrow">The Dr. Gummy Blog</span>
      <h1 class="blog-header__title">Wellness Backed by Science</h1>
      <p class="blog-header__subtitle">Research-driven articles on ingredients, sleep, focus, nutrition, and supplement science — written by our formulation team.</p>
    </div>

    <div class="blog-layout">

      <!-- Main Grid -->
      <div class="blog-main">
        <!-- Category Tabs -->
        <div class="blog-tabs" id="blog-tabs">
          <?php foreach ($categories as $cat) : ?>
          <button class="blog-tab<?php echo $cat === 'All' ? ' is-active' : ''; ?>" data-blog-filter="<?php echo esc_attr($cat); ?>" type="button"><?php echo esc_html($cat); ?></button>
          <?php endforeach; ?>
        </div>

        <!-- Post Cards -->
        <div class="blog-grid" id="blog-grid">
          <?php foreach ($posts_data as $post) : ?>
          <article class="blog-card" data-blog-category="<?php echo esc_attr($post['category']); ?>">
            <div class="blog-card__image" style="background-color: <?php echo esc_attr($post['color']); ?>;">
              <span class="blog-card__image-label">DR GUMMY</span>
            </div>
            <div class="blog-card__body">
              <div class="blog-card__meta">
                <span class="blog-card__category"><?php echo esc_html($post['category']); ?></span>
                <span class="blog-card__dot">&middot;</span>
                <span class="blog-card__read"><?php echo esc_html($post['read']); ?></span>
              </div>
              <h2 class="blog-card__title"><a href="#"><?php echo esc_html($post['title']); ?></a></h2>
              <p class="blog-card__excerpt"><?php echo esc_html($post['excerpt']); ?></p>
              <div class="blog-card__footer">
                <span class="blog-card__date"><?php echo esc_html($post['date']); ?></span>
                <a href="#" class="blog-card__link">Read More &rarr;</a>
              </div>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Sidebar -->
      <aside class="blog-sidebar">
        <!-- Search -->
        <div class="blog-sidebar__section">
          <h3 class="blog-sidebar__heading">Search</h3>
          <form class="blog-sidebar__search" action="<?php echo esc_url(home_url('/')); ?>" method="get">
            <input type="search" name="s" class="blog-sidebar__search-input input" placeholder="Search articles&hellip;" />
            <button type="submit" class="blog-sidebar__search-btn btn btn--primary btn--sm" aria-label="Search">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            </button>
          </form>
        </div>

        <!-- Categories -->
        <div class="blog-sidebar__section">
          <h3 class="blog-sidebar__heading">Categories</h3>
          <ul class="blog-sidebar__categories">
            <?php foreach (array_slice($categories, 1) as $cat) : ?>
            <li><a href="#" data-sidebar-filter="<?php echo esc_attr($cat); ?>"><?php echo esc_html($cat); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- Popular Posts -->
        <div class="blog-sidebar__section">
          <h3 class="blog-sidebar__heading">Popular Posts</h3>
          <ul class="blog-sidebar__popular">
            <?php foreach ($popular as $idx => $pop) : ?>
            <li>
              <span class="blog-sidebar__pop-num"><?php echo str_pad($idx + 1, 2, '0', STR_PAD_LEFT); ?></span>
              <a href="#"><?php echo esc_html($pop); ?></a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- Newsletter -->
        <div class="blog-sidebar__section blog-sidebar__newsletter">
          <h3 class="blog-sidebar__heading">Subscribe</h3>
          <p>Get the latest articles delivered to your inbox.</p>
          <form class="blog-sidebar__newsletter-form">
            <input type="email" class="input" placeholder="Your email" required />
            <button type="submit" class="btn btn--primary btn--full btn--sm">Subscribe</button>
          </form>
        </div>
      </aside>

    </div>
  </div>
</section>

<?php get_footer(); ?>
