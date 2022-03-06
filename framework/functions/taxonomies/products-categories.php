<?php
function hd_taxonomy_products_category()  {

    $labels = array(
        'name'                       => _x( 'Products Categories', 'Taxonomy General Name', 'old' ),
        'singular_name'              => _x( 'Products Castegory', 'Taxonomy Singular Name', 'old' ),
        'menu_name'                  => __( 'Products Categories', 'old' ),
        'all_items'                  => __( 'All Products Categories', 'old' ),
        'parent_item'                => __( 'Parent Product Category', 'old' ),
        'parent_item_colon'          => __( 'Parent Product Category:', 'old' ),
        'new_item_name'              => __( 'New Product Category Name', 'old' ),
        'add_new_item'               => __( 'Add New Product Category', 'old' ),
        'edit_item'                  => __( 'Edit Product Category', 'old' ),
        'update_item'                => __( 'Update Product Category', 'old' ),
        'separate_items_with_commas' => __( 'Separate Products Categories with commas', 'old' ),
        'search_items'               => __( 'Search Produc Categories', 'old' ),
        'add_or_remove_items'        => __( 'Add or remove Products Categories', 'old' ),
        'choose_from_most_used'      => __( 'Choose from the most used Products Categories', 'old' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'products_categories',  array('product'), $args );

}

// Hook into the 'init' action
add_action( 'init', 'hd_taxonomy_products_category', 0 );

?>