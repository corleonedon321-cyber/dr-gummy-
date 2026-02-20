<?php
/**
 * Component: Bundle Selection Card
 *
 * @package DR_Gummy
 *
 * Expected variables:
 * @var WC_Product $product  WooCommerce product object.
 * @var bool       $selected Whether this card is currently selected.
 */

defined('ABSPATH') || exit;

if (! isset($product) || ! is_a($product, 'WC_Product')) {
    return;
}

$selected_class = ! empty($selected) ? ' is-selected' : '';
?>

<div class="card card--selectable<?php echo esc_attr($selected_class); ?>" data-bundle-item="<?php echo esc_attr($product->get_id()); ?>">
  <?php echo $product->get_image('woocommerce_thumbnail', ['class' => 'card__image']); ?>
  <div class="card__body">
    <h3 class="card__title"><?php echo esc_html($product->get_name()); ?></h3>
    <p class="card__description"><?php echo esc_html($product->get_short_description()); ?></p>
    <div class="card__price"><?php echo $product->get_price_html(); ?></div>
  </div>
</div>
