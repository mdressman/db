<?php

function custom_job() { 
	
	register_post_type( 'job', 
	 	
		array('labels' => array(
			'name' => __('Jobs', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Job', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Jobs', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Job', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Jobs', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Job', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Job', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Jobs', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'dB 365 Job', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			// 'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'job', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'Job', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'job');
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'job');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_job');

	?>