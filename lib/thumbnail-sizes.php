<?php

if( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}

if( function_exists( 'add_image_size' ) ) {
  add_image_size( 'admin-thumb', 150, 150, false );
  add_image_size( 'opengraph', 1200, 630, true );

  add_image_size( 'carousel', 9999, 470, false);
  add_image_size( 'archive-thumb', 419, 252, true);
  add_image_size( 'recent-thumb', 320, 192, true);
  add_image_size( 'full-width', 1341, 9999, false);
}
