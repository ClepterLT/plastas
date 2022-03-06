<?php
function hd_taxonomy_colors_category()  {

    $labels = array(
        'name'                       => _x( 'Colors', 'Taxonomy General Name', 'old' ),
        'singular_name'              => _x( 'Color', 'Taxonomy Singular Name', 'old' ),
        'menu_name'                  => __( 'Colors', 'old' ),
        'all_items'                  => __( 'All Colors', 'old' ),
        'parent_item'                => __( 'Parent Color', 'old' ),
        'parent_item_colon'          => __( 'Parent Color:', 'old' ),
        'new_item_name'              => __( 'New Color Name', 'old' ),
        'add_new_item'               => __( 'Add New Color', 'old' ),
        'edit_item'                  => __( 'Edit Color', 'old' ),
        'update_item'                => __( 'Update Color', 'old' ),
        'separate_items_with_commas' => __( 'Separate Colors with commas', 'old' ),
        'search_items'               => __( 'Search rheme', 'old' ),
        'add_or_remove_items'        => __( 'Add or remove Colors', 'old' ),
        'choose_from_most_used'      => __( 'Choose from the most used Colors', 'old' ),
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
    register_taxonomy( 'colors',  array('product'), $args );

}

// Hook into the 'init' action
add_action( 'init', 'hd_taxonomy_colors_category', 0 );

?>