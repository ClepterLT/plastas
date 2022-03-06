<?php
function hd_taxonomy_materials_category()  {

    $labels = array(
        'name'                       => _x( 'Materials', 'Taxonomy General Name', 'old' ),
        'singular_name'              => _x( 'Material', 'Taxonomy Singular Name', 'old' ),
        'menu_name'                  => __( 'Materials', 'old' ),
        'all_items'                  => __( 'All Materials', 'old' ),
        'parent_item'                => __( 'Parent Material', 'old' ),
        'parent_item_colon'          => __( 'Parent Material:', 'old' ),
        'new_item_name'              => __( 'New Material Name', 'old' ),
        'add_new_item'               => __( 'Add New Material', 'old' ),
        'edit_item'                  => __( 'Edit Material', 'old' ),
        'update_item'                => __( 'Update Material', 'old' ),
        'separate_items_with_commas' => __( 'Separate Materials with commas', 'old' ),
        'search_items'               => __( 'Search rheme', 'old' ),
        'add_or_remove_items'        => __( 'Add or remove Materials', 'old' ),
        'choose_from_most_used'      => __( 'Choose from the most used Materials', 'old' ),
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
    register_taxonomy( 'materials',  array('product'), $args );

}

// Hook into the 'init' action
add_action( 'init', 'hd_taxonomy_materials_category', 0 );

?>