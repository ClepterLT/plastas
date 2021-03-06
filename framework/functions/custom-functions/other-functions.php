<?php

// ACF OPTIONS PAGE
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Options',
        'menu_title' => 'Options',
        'menu_slug' => 'options',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}


// ACF blocks renderer
function acf_block_render_callback($block)
{
    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "template-parts/block" folder
    if (file_exists(get_theme_file_path("/framework/content/content-{$slug}.php"))) {
        include(get_theme_file_path("/framework/content/content-{$slug}.php"));
    }
}


// REGISTER NAVIGATIONS
function register_my_nav_menus()
{
    register_nav_menus(array(
        'primary' => __('Main Navigation'),
        'footer' => __('Footer Navigation')
    ));
}
add_action('init', 'register_my_nav_menus');


// NAV FILTERS
function add_additional_class_on_li($classes, $item, $args, $depth)
{
    if( in_array( 'current-menu-item', $classes ) ||
    in_array( 'current-menu-ancestor', $classes ) ||
    in_array( 'current-menu-parent', $classes ) ||
    in_array( 'current_page_parent', $classes ) ||
    in_array( 'current_page_ancestor', $classes )
    ) {
        $classes[] = 'active ';
    }
    if ($args->add_li_class && $depth == 0) {
        $classes[] = $args->add_li_class;
    }
    if ($args->add_subli_class && $depth) {
        $classes[] = $args->add_subli_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 4);


// REGISTER IMAGE SIZES
add_theme_support('post-thumbnails');

// add_image_size('testimonial-portrait', 85, 85, array('center', 'center'));


// EXCERPT
function hd_custom_excerpt_length($length)
{
    return 13;
}
add_filter('excerpt_length', 'hd_custom_excerpt_length', 999);

function hd_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'hd_excerpt_more');

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
  }, 10, 4 );
  
function cc_mime_types( $mimes ){
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
  
function fix_svg() {
echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );