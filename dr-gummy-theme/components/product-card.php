<?php
/**
 * Component: Product Card
 *
 * @package DR_Gummy
 *
 * Expected variables:
 * @var WC_Product $product WooCommerce product object.
 */

defined('ABSPATH') || exit;

if (! isset($product) || ! is_a($product, 'WC_Product')) {
    return;
}

$product_id    = $product->get_id();
$permalink     = $product->get_permalink();
$title         = $product->get_name();
$price_html    = $product->get_price_html();
$image         = $product->get_image('woocommerce_thumbnail', ['class' => 'card__image']);
$rating_count  = $product->get_rating_count();
$average       = $product->get_average_rating();
?>

<article class="card card--shadow">
  <a href="<?php echo esc_url($permalink); ?>" aria-label="<?php echo esc_attr($title); ?>">
    <?php echo $image; ?>
  </a>
  <div class="card__body">
    <?php if ($rating_count > 0) : ?>
      <?php echo dr_gummy_star_rating((float) $average, $rating_count); ?>
    <?php endif; ?>
    <h3 class="card__title">
      <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a>
    </h3>
    <div class="card__price"><?php echo $price_html; ?></div>
    <button
      class="btn btn--dark btn--full"
      data-product-id="<?php echo esc_attr($product_id); ?>"
      data-add-to-cart
    >
      ADD TO CART
    </button>
  </div>
</article>
