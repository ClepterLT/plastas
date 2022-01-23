<?php
function hd_taxonomy_sector_category()  {

    $labels = array(
        'name'                       => _x( 'Projects', 'Taxonomy General Name', 'old' ),
        'singular_name'              => _x( 'Project', 'Taxonomy Singular Name', 'old' ),
        'menu_name'                  => __( 'Projects', 'old' ),
        'all_items'                  => __( 'All Projects', 'old' ),
        'parent_item'                => __( 'Parent Project', 'old' ),
        'parent_item_colon'          => __( 'Parent Project:', 'old' ),
        'new_item_name'              => __( 'New Project Name', 'old' ),
        'add_new_item'               => __( 'Add New Project', 'old' ),
        'edit_item'                  => __( 'Edit Project', 'old' ),
        'update_item'                => __( 'Update Project', 'old' ),
        'separate_items_with_commas' => __( 'Separate Projects with commas', 'old' ),
        'search_items'               => __( 'Search rheme', 'old' ),
        'add_or_remove_items'        => __( 'Add or remove Projects', 'old' ),
        'choose_from_most_used'      => __( 'Choose from the most used Projects', 'old' ),
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
    register_taxonomy( 'project',  array('post', 'resource', 'activity'), $args );

}

// Hook into the 'init' action
add_action( 'init', 'hd_taxonomy_sector_category', 0 );

?>