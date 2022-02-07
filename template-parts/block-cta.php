<?php

/**
 * CTA Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cta-' . $block['id'];
if( !empty($block['anchor']) ) {
		$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'cta';
if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$features = get_field( 'features' ) ?: 'Features';

?>
<section class="cta">
		<div class="row cta__row">
			<div class="cta__left">

			</div>
			<div class="cta__right">
				<img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" class="hero__img" />
			</div>
		</div>
</section>