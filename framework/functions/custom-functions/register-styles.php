<?php
// REGISTER STYLES
function hd_register_style() {
  if(!is_admin()):
    wp_register_style( 'vendor-css', get_template_directory_uri() . '/assets/css/vendor.css', false, '2.8.7' );
    wp_register_style( 'app-css', get_template_directory_uri() . '/assets/css/app.css', false, '2.8.7' );

//    wp_register_style( 'amcharts', 'https://www.amcharts.com/lib/3/plugins/export/export.css', false, '2.8.7' );

    wp_enqueue_style( 'vendor-css' );
    wp_enqueue_style( 'app-css' );

//    if(get_the_ID() == 492) {
//        wp_enqueue_script('amcharts');
//    }
  endif;
}
function hd_register_admin_style() {
	wp_register_style( 'admin-custom-css', get_template_directory_uri() . '/assets/css/admin-custom.css', false, '2.8.7' );
    wp_register_style( 'vendor-css', get_template_directory_uri() . '/assets/css/vendor.css', false, '2.8.7' );
    wp_register_style( 'app-css', get_template_directory_uri() . '/assets/css/app-gutenberg.css', false, '2.8.7' );
    wp_enqueue_style( 'admin-custom-css' );
    wp_enqueue_style( 'vendor-css' );
    wp_enqueue_style( 'app-css' );

}
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);

function custom_admin_css() {
    echo '<style type="text/css">
.wp-block { max-width: initial; }
</style>';
}
add_action('admin_head', 'custom_admin_css');
add_action( 'wp_enqueue_scripts', 'hd_register_style' );
add_action( 'admin_enqueue_scripts', 'hd_register_admin_style' );
?>
