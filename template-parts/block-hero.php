<?php

/**
 * Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('hero_title') ?: 'Sample Title';
$description = get_field('hero_description') ?: 'Sample Description';
$buttonTitle = get_field('hero_button_title') ?: 'Get Started';
$buttonLink = get_field('hero_button_link') ?: '#';
$image = get_field('hero_image') ?: null;

?>
<section class="hero">
    <div class="row row--flex hero__row">
        <div class="hero__left">
            <h1 class="txt-h1"><?= $title ?></h1>
            <p class="txt-regular"><?= $description ?></p>
            <a href="<?= $buttonLink ?>" class="button"><?= $buttonTitle ?></a>
        </div>
        <div class="hero__right">
            <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" class="hero__img" />
        </div>
    </div>
</section>