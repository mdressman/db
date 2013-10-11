<?php

function custom_venue() { 
	
	register_post_type( 'venue', 
	 	
		array('labels' => array(
			'name' => __('Venues', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Venue', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Venues', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Venue', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Venues', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Venue', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Venue', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Venues', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'dBx Venue', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			// 'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'dbx/venue', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'Venue', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'venue');
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'venue');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_venue');

	add_filter( 'cmb_meta_boxes', 'venue_info' );
	function venue_info( $meta_boxes ) {

		$prefix = '_venue_'; // Prefix for all fields

		$meta_boxes[] = array(
			'id' => 'venue_metabox',
			'title' => 'Venue Details',
			'pages' => array('venue'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => 'Venue Details',
					'id' => $prefix . 'details_title',
					'type' => 'title'
				),
				array(
					'name' => 'Venue URL',
					'id' => $prefix . 'url',
					'type' => 'text'
				),
				array(
					'name' => 'Venue Address',
					'id' => $prefix . 'address',
					'type' => 'text'
				),
				array(
					'name' => 'Venue Phone',
					'id' => $prefix . 'phone',
					'type' => 'text'
				),
				array(
					'name' => 'Venue gmap',
					'id' => $prefix . 'gmap',
					'type' => 'textarea'
				),
			),
		);

		return $meta_boxes;
	}

	
	?>