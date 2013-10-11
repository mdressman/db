<?php

function custom_event() { 
	
	register_post_type( 'event', 
	 	
		array('labels' => array(
			'name' => __('Events', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Event', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Events', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Event', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Events', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Event', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Event', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Events', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'dB 365 Event', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			// 'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'event', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'Event', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'event');
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'event');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_event');

	add_filter( 'cmb_meta_boxes', 'event_info' );
	function event_info( $meta_boxes ) {

		$prefix = '_event_'; // Prefix for all fields

		$meta_boxes[] = array(
			'id' => 'event_metabox',
			'title' => 'Event Details',
			'pages' => array('event'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => 'Event Details',
					'id' => $prefix . 'details_title',
					'type' => 'title'
				),
				array(
				'name' => 'Event Date',
				'id' => $prefix . 'date',
				'type' => 'text_date_timestamp'
			),
				array(
					'name' => 'Buy Tickets Link',
					'id' => $prefix . 'tickets_link',
					'type' => 'text'
				),
				array(
					'name' => 'Facebook Event Link',
					'id' => $prefix . 'facebook_link',
					'type' => 'text'
				),
			),
		);

		return $meta_boxes;
	}

	add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
	function be_initialize_cmb_meta_boxes() {
		if ( !class_exists( 'cmb_Meta_Box' ) ) {
			require_once( 'js/metabox/init.php' );
		}
	}



	?>