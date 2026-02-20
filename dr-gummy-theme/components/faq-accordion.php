<?php
/**
 * Component: FAQ Accordion
 *
 * @package DR_Gummy
 *
 * Expected variables:
 * @var string $question The FAQ question.
 * @var string $answer   The FAQ answer (can contain HTML).
 * @var bool   $open     Whether the accordion starts open.
 */

defined('ABSPATH') || exit;

$question = $question ?? '';
$answer   = $answer ?? '';
$open     = ! empty($open);
?>

<details class="faq-accordion border rounded-lg" <?php echo $open ? 'open' : ''; ?>>
  <summary class="faq-accordion__question flex items-center justify-between">
    <span><?php echo esc_html($question); ?></span>
    <svg class="faq-accordion__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <polyline points="6 9 12 15 18 9"/>
    </svg>
  </summary>
  <div class="faq-accordion__answer">
    <?php echo wp_kses_post($answer); ?>
  </div>
</details>
