<?php
// Menu icons for Custom Post Types
// https://developer.wordpress.org/resource/dashicons/
function add_menu_icons_styles(){
?>

<style>
#menu-posts-project .dashicons-admin-post:before {
    content: '\f319';
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );


//Register Custom Post Types
add_action( 'init', 'register_cpt_project' );

function register_cpt_project() {

  $labels = array(
    'name' => _x( 'Projects', 'project' ),
    'singular_name' => _x( 'Project', 'project' ),
    'add_new' => _x( 'Add New', 'project' ),
    'add_new_item' => _x( 'Add New Project', 'project' ),
    'edit_item' => _x( 'Edit Project', 'project' ),
    'new_item' => _x( 'New Project', 'project' ),
    'view_item' => _x( 'View Project', 'project' ),
    'search_items' => _x( 'Search Projects', 'project' ),
    'not_found' => _x( 'No projects found', 'project' ),
    'not_found_in_trash' => _x( 'No projects found in Trash', 'project' ),
    'parent_item_colon' => _x( 'Parent Project:', 'project' ),
    'menu_name' => _x( 'Projects', 'project' ),
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

  register_post_type( 'project', $args );
}

//Register Custom Post Types
add_action( 'init', 'register_cpt_cal_event' );

function register_cpt_cal_event() {

  $labels = array(
    'name' => _x( 'Events', 'cal_event' ),
    'singular_name' => _x( 'Event', 'cal_event' ),
    'add_new' => _x( 'Add New', 'cal_event' ),
    'add_new_item' => _x( 'Add New Event', 'cal_event' ),
    'edit_item' => _x( 'Edit Event', 'cal_event' ),
    'new_item' => _x( 'New Event', 'cal_event' ),
    'view_item' => _x( 'View Event', 'cal_event' ),
    'search_items' => _x( 'Search Events', 'cal_event' ),
    'not_found' => _x( 'No events found', 'cal_event' ),
    'not_found_in_trash' => _x( 'No events found in Trash', 'cal_event' ),
    'parent_item_colon' => _x( 'Parent Event:', 'cal_event' ),
    'menu_name' => _x( 'Events', 'cal_event' ),
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
    'capability_type' => 'post',
    'rewrite' => array( 'slug' => 'calendar' ),
  );

  register_post_type( 'cal_event', $args );
}
