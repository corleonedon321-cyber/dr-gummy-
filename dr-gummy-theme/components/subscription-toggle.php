<?php
/**
 * Component: Subscription Toggle
 *
 * @package DR_Gummy
 *
 * Expected variables:
 * @var string $name     Input name attribute.
 * @var bool   $checked  Whether toggle is on.
 * @var string $label    Label text.
 * @var string $savings  Optional savings text (e.g. "Save 15%").
 */

defined('ABSPATH') || exit;

$name    = $name ?? 'subscribe';
$checked = ! empty($checked);
$label   = $label ?? 'Subscribe & Save';
$savings = $savings ?? '';
?>

<div class="subscription-toggle flex items-center gap-3">
  <label class="toggle">
    <input
      type="checkbox"
      class="toggle__input"
      name="<?php echo esc_attr($name); ?>"
      <?php checked($checked); ?>
      data-subscription-toggle
    >
    <span class="toggle__slider"></span>
  </label>
  <span class="subscription-toggle__label">
    <?php echo esc_html($label); ?>
    <?php if ($savings) : ?>
      <strong style="color: var(--color-brand-green-dark);"><?php echo esc_html($savings); ?></strong>
    <?php endif; ?>
  </span>
</div>
