<?php
// REGISTER SCRIPTS
function hd_register_scripts()
{
    // HEADER
    // wp_register_script( 'header-js', get_template_directory_uri() . '/assets/js/header.js', array( 'jquery' ) );
    global $wp_query;

    // FOOTER
    wp_register_script('app-js', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), false, true);
    wp_localize_script('app-js', 'meta', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'page' => get_queried_object(),
        'template' => get_page_template_slug(get_the_ID()),
        'posts' => json_encode($wp_query->query_vars), // everything about your loop is here
        'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ));

    wp_deregister_script('jquery');
    wp_deregister_script('jquery-migrate');
    wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, NULL, true);
    wp_register_script('jquery-migrate', includes_url('/js/jquery/jquery-migrate.js'), false, NULL, true);

    // ENQUEUE
    // wp_enqueue_script( 'jquery' );

    wp_enqueue_script('app-js');

    // wp_enqueue_script( 'pw-store-locations', get_stylesheet_directory_uri() . '/js/store-locations.js', array( 'jquery', 'pw-google-maps-api' ), null, true );

}

//add_filter('gform_init_scripts_footer', '__return_true');
add_action('wp_enqueue_scripts', 'hd_register_scripts');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
?>