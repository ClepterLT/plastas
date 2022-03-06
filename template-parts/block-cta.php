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
$title = get_field( 'ctaTitle' ) ?: 'Susisiekite su mumis';
$text = get_field ( 'ctaText' ) ?: 'Sudomino? Susisiekite su mumis darbo metu dėl detalesnės informacijos.';
$img = get_field ( 'ctaImage' );
$phone = get_field( 'cta_phone' ) ?: '+370 674 578 38';
$email = get_field ( 'cta_email' ) ?: 'info@plastas.lt'

?>
<section class="cta">
		<div class="row cta__row">
			<div class="cta__left">
				<h2 class="txt-h2"><?= $title ?></h2>
				<p class="txt-regular"><?= $text ?></p>
				<ul class="cta__list">
					<li class="cta__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-list-arrow.svg" class="footer__arrow" alt="List arrow" /><strong>Telefonas:</strong> <a href="tel: <?= $phone ?>" class="plastas-link"><?= $phone ?></a></li>
					<li class="cta__item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-list-arrow.svg" class="footer__arrow" alt="List arrow" /><strong>El. paštas:</strong> <a href="mailto: <?= $email ?>" class="plastas-link"><?= $email ?></a></li>
				</ul>
			</div>
			<div class="cta__right">
				<img src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>" class="cta__img" />
			</div>
		</div>
</section>