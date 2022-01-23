<?php
// include_once(__DIR__ . '/../../content/news/news-register.php');

add_action('acf/init', 'my_acf_init');
function my_acf_init()
{

    // check function exists
    if (function_exists('acf_register_block')) {

        // register a testimonial block
        // acf_register_block(array(
        //     'name'				=> 'text-with-image-cta',
        //     'title'				=> __('Text with image cta'),
        //     'render_callback'	=> 'acf_block_render_callback',
        //     'category'			=> 'formatting',
        //     'icon'				=> 'admin-comments',
        //     'keywords'			=> array( 'text-with-image-cta' ),
        // ));
    }
}
