<?php

function custom_afterhours_2015() { 
	
	register_post_type( 'afterhours_2015', 
	 	
		array('labels' => array(
			'name' => __('2015 After Hours', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('After Hours', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All After Hours', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New After Hours', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit After Hours', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New After Hours', 'bonestheme'), /* New Display Title */
			'view_item' => __('View After Hours', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search After Hours', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( '2015 Decibel Festival After Hours', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			// 'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'db2015/afterhours', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'After Hours', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type('category', 'afterhours');
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'afterhours_2015');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_afterhours_2015');

	add_filter( 'cmb_meta_boxes', 'afterhours_2015_info' );
	function afterhours_2015_info( $meta_boxes ) {

		$prefix = '_afterhours_2015_'; // Prefix for all fields

		$meta_boxes[] = array(
			'id' => 'afterhours_2015_metabox',
			'title' => 'After Hours Details',
			'pages' => array('afterhours_2015'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => 'After Hours Details',
					'id' => $prefix . 'details_title',
					'type' => 'title'
				),
				array(
					'name' => 'After Hours Date',
					'id' => $prefix . 'date',
					'type' => 'radio',
					'options' => array(
						array('name' => 'Wednesday', 'value' => 'wednesday'),
						array('name' => 'Thursday', 'value' => 'thursday'),
						array('name' => 'Friday', 'value' => 'friday'),
						array('name' => 'Saturday', 'value' => 'saturday'),
						array('name' => 'Sunday', 'value' => 'sunday'),			
					)
				),
				array(
					'name' => 'Buy Tickets Link',
					'id' => $prefix . 'tickets_link',
					'type' => 'text'
				),
				array(
					'name' => 'Sold Out?',
					'id' => $prefix . 'soldout',
					'type' => 'checkbox'
				),
				array(
					'name' => 'Facebook After Hours Link',
					'id' => $prefix . 'facebook_link',
					'type' => 'text'
				),
				array(
					'name' => 'Start Time',
					'id' => $prefix . 'start_time',
					'type' => 'text'
				),
				array(
					'name' => 'Age',
					'id' => $prefix . 'age',
					'type' => 'text'
				),
				array(
					'name' => 'CratePlayer Link',
					'id' => $prefix . 'crateplayer_link',
					'type' => 'text'
				),
			),
		);

		return $meta_boxes;
	}

	
	?>