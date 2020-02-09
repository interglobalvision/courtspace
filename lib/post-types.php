<?php
// Menu icons for Custom Post Types
// https://developer.wordpress.org/resource/dashicons/
function add_menu_icons_styles(){
?>

<style>
#menu-posts-resident .dashicons-admin-post:before {
    content: '\f319';
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );


//Register Custom Post Types
add_action( 'init', 'register_cpt_resident' );

function register_cpt_resident() {

  $labels = array(
    'name' => _x( 'Residents', 'resident' ),
    'singular_name' => _x( 'Resident', 'resident' ),
    'add_new' => _x( 'Add New', 'resident' ),
    'add_new_item' => _x( 'Add New Resident', 'resident' ),
    'edit_item' => _x( 'Edit Resident', 'resident' ),
    'new_item' => _x( 'New Resident', 'resident' ),
    'view_item' => _x( 'View Resident', 'resident' ),
    'search_items' => _x( 'Search Residents', 'resident' ),
    'not_found' => _x( 'No residents found', 'resident' ),
    'not_found_in_trash' => _x( 'No residents found in Trash', 'resident' ),
    'parent_item_colon' => _x( 'Parent Resident:', 'resident' ),
    'menu_name' => _x( 'Residents', 'resident' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,

    'supports' => array( 'title', 'editor', 'thumbnail' ),

    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,

    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
  );

  register_post_type( 'resident', $args );
}
