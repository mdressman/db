<?php

function custom_partner() { 
	
	register_post_type( 'partner', 
	 	
		array('labels' => array(
			'name' => __('Partners', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Partner', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Partners', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Partner', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Partners', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Partner', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Partner', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Partners', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'dBx Partner', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			// 'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'dbx/partner', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'Partner', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'partner');
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'partner');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_partner');

	add_filter( 'cmb_meta_boxes', 'partner_info' );
	function partner_info( $meta_boxes ) {

		$prefix = '_partner_'; // Prefix for all fields

		$meta_boxes[] = array(
			'id' => 'partner_metabox',
			'title' => 'Partner Details',
			'pages' => array('partner'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => 'Partner Details',
					'id' => $prefix . 'details_title',
					'type' => 'title'
				),
				array(
					'name' => 'Partner URL',
					'id' => $prefix . 'url',
					'type' => 'text'
				),
				array(
				'name' => 'Type of Partner',
				'id' => $prefix . 'type',
				'type' => 'radio_inline',
				'options' => array(
					array('name' => 'Partners', 'value' => 'Festival Partners'),
					array('name' => 'Media', 'value' => 'Media and Promotional Partners'),
					array('name' => 'Tech', 'value' => 'Technology Partners'),
					array('name' => 'Green', 'value' => 'Green and Community Partners'),				
					array('name' => 'Hospitality', 'value' => 'Hospitality Partners'),
					array('name' => 'Lifestyle', 'value' => 'Lifestyle Partners'),
				)
			),
			),
		);

		return $meta_boxes;
	}

	
	?>