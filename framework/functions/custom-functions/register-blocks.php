<?php
// include_once(__DIR__ . '/../../content/news/news-register.php');

function my_acf_init() {

    // check function exists
    if (function_exists('acf_register_block')) {

        // HERO BLOCK
        acf_register_block(array(
            'name'              => 'hero',
            'title'             => __('Hero'),
            'description'       => __('Hero section.'),
            'render_template'   => 'template-parts/block-hero.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'hero', 'quote' ),
        ));

        // FEATURES BLOCK
        acf_register_block(array(
            'name'              => 'features',
            'title'             => __('Features'),
            'description'       => __('Features section.'),
            'render_template'   => 'template-parts/block-features.php',
            'category'          => 'formatting',
            'icon'              => 'image-flip-vertical',
            'keywords'          => array( 'features', 'quote' ),
        ));

        // CTA BLOCK
        acf_register_block(array(
            'name'              => 'CTA',
            'title'             => __('CTA'),
            'description'       => __('CTA section.'),
            'render_template'   => 'template-parts/block-cta.php',
            'category'          => 'formatting',
            'icon'              => 'id-alt',
            'keywords'          => array( 'cta', 'contact' ),
        ));
    }
}

add_action('acf/init', 'my_acf_init');
