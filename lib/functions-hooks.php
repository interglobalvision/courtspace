<?php

// Custom hooks (like excerpt length etc)

// Programatically create pages
function create_custom_pages() {
  $custom_pages = array(
    'home' => 'Home',
    'map' => 'Map',
    'news' => 'News',
    'about-us' => 'About Us',
  );
  foreach($custom_pages as $page_name => $page_title) {
    $page = get_page_by_path($page_name);
    if( empty($page) ) {
      wp_insert_post( array(
        'post_type' => 'page',
        'post_title' => $page_title,
        'post_name' => $page_name,
        'post_status' => 'publish'
      ));
    }
  }
}
add_filter( 'after_setup_theme', 'create_custom_pages' );

function igv_allowed_block_types( $allowed_blocks, $post ) {
  $allowed_blocks = array(
		'core/paragraph',
		'core/heading',
		'core/list',
    'core/image',
    'core-embed/youtube',
    'core-embed/vimeo',
	);

  if( $post->post_type !== 'post' ) {
    $allowed_blocks = array(
  		'core/paragraph',
  		'core/heading',
  		'core/list',
  	);
  }

	return $allowed_blocks;
}
add_filter( 'allowed_block_types', 'igv_allowed_block_types', 10, 2 );
