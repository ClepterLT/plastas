<?php
// Register Custom Post Type
function create_product_post_type() {

    $labels = array(
        'name'                => _x( 'Products', 'Post Type General Name', 'horiondigital' ),
        'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'horiondigital' ),
        'menu_name'           => __( 'Products', 'horiondigital' ),
        'parent_item_colon'   => __( 'Parent Product:', 'horiondigital' ),
        'all_items'           => __( 'All Products', 'horiondigital' ),
        'view_item'           => __( 'View Product', 'horiondigital' ),
        'add_new_item'        => __( 'Add new Product', 'horiondigital' ),
        'add_new'             => __( 'Add new', 'horiondigital' ),
        'edit_item'           => __( 'Edit Product', 'horiondigital' ),
        'update_item'         => __( 'Update Product', 'horiondigital' ),
        'search_items'        => __( 'Search Products', 'horiondigital' ),
        'not_found'           => __( 'Not found', 'horiondigital' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'horiondigital' ),
    );
    $args = array(
        'label'               => __( 'Product', 'horiondigital' ),
        'description'         => __( 'Product Post Type', 'horiondigital' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'editor'),
        'taxonomies'          => array( 'colors', 'materials' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-buddicons-groups',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'product', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_product_post_type', 0 );