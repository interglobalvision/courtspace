<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
  $args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
  ) );
  $posts = get_posts( $args );
  $post_options = array();
  if ( $posts ) {
    foreach ( $posts as $post ) {
      $post_options [ $post->ID ] = $post->post_title;
    }
  }
  return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_igv_';

  /**
   * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
   */

  $resident_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'resident_metabox',
		'title'         => esc_html__( 'Resident', 'cmb2' ),
		'object_types'  => array( 'resident' ), // Post type
	) );

  $resident_metabox->add_field( array(
		'name'         => esc_html__( 'Dates of Residency', 'cmb2' ),
		'desc'         => esc_html__( '', 'cmb2' ),
		'id'           => $prefix . 'residency',
		'type'         => 'text',
	) );

  $news_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'news_metabox',
		'title'         => esc_html__( 'News Options', 'cmb2' ),
		'object_types'  => array( 'post' ), // Post type
	) );

  $news_metabox->add_field( array(
		'name' => esc_html__( 'Hide Date', 'cmb2' ),
		'id'   => $prefix . 'hide_date',
		'type' => 'checkbox',
	) );

  $news_metabox->add_field( array(
		'name' => esc_html__( 'Highlight', 'cmb2' ),
		'id'   => $prefix . 'highlight',
		'type' => 'checkbox',
	) );

  $options_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'options_metabox',
		'title'         => esc_html__( 'Options', 'cmb2' ),
		'object_types'  => array( 'post', 'page', 'resident' ), // Post type
	) );

  $options_metabox->add_field( array(
		'name'         => esc_html__( 'Image carousel (obsolete)', 'cmb2' ),
		'desc'         => esc_html__( '', 'cmb2' ),
		'id'           => $prefix . 'images',
		'type'         => 'file_list',
		'preview_size' => array( 150, 150 ), // Default: array( 50, 50 )
    'show_on_cb'    => 'igv_exclude_field',
	) );

  // Sections
  $sections_metabox = new_cmb2_box( array(
    'id'            => $prefix . 'sections_metabox',
    'title'         => esc_html__( 'Sections', 'cmb2' ),
    'object_types'  => array( 'page' ), // Post type
  ) );

  $sections_group = $sections_metabox->add_field( array(
		'id'          => $prefix . 'sections',
		'type'        => 'group',
		'description' => esc_html__( '', 'cmb2' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Section {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Section', 'cmb2' ),
			'remove_button' => esc_html__( 'Remove Section', 'cmb2' ),
			'sortable'      => true,
			// 'closed'     => true, // true to have the groups closed by default
		),
    'show_on_cb'    => 'igv_exclude_field_news',
	) );

  $sections_metabox->add_group_field( $sections_group, array(
		'name'       => esc_html__( 'Section', 'cmb2' ),
		'id'         => 'content',
		'type' => 'wysiwyg',
    'options' => array(
	    'wpautop' => false, // use wpautop?
	    'media_buttons' => false, // show insert/upload button(s)
      'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
  	),
	) );

  function igv_exclude_field_news($cmb) {
    $news_page = get_page_by_path('news');
    $home_page = get_page_by_path('home');
    return $news_page->ID !== $cmb->object_id() && $home_page->ID !== $cmb->object_id();
  }

}
?>
