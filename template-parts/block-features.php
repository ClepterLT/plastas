<?php

/**
 * Features Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'features-' . $block['id'];
if( !empty($block['anchor']) ) {
		$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'features';
if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
		$className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$features = get_field( 'features' ) ?: 'Features';

?>
<section class="features">
		<div class="row feature__row">
				<?php
					foreach($features as $feature):
				?>
						<div class="feature">
							<img src="<?= $feature['feature_image']['url'] ?>" alt="<?= $feature['feature_image']['alt'] ?>" class="feature__img" />
							<h3 class="txt-h3"><?= $feature['feature_title'] ?></h3>
							<p class="feature__text"><?= $feature['feature_description'] ?></p>
						</div>
				<?php
					endforeach;
				?>
		</div>
</section>