<?php
/**
 * Main template file (fallback).
 *
 * @package DR_Gummy
 */

get_header();
?>

<div class="container section">
  <?php if (have_posts()) : ?>
    <div class="grid grid-cols-3 gap-6">
      <?php while (have_posts()) : the_post(); ?>
        <article class="card card--bordered">
          <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('medium_large', ['class' => 'card__image']); ?>
            </a>
          <?php endif; ?>
          <div class="card__body">
            <h2 class="card__title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <p class="card__description"><?php echo esc_html(get_the_excerpt()); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn--outline btn--sm">Read More</a>
          </div>
        </article>
      <?php endwhile; ?>
    </div>

    <?php the_posts_pagination(['class' => 'mt-12 text-center']); ?>
  <?php else : ?>
    <p>No content found.</p>
  <?php endif; ?>
</div>

<?php
get_footer();
