<?php

function custom_afterhours() { 
	
	register_post_type( 'afterhours', 
	 	
		array('labels' => array(
			'name' => __('After Hours', 'bonestheme'), /* This is the Title of the Group */
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
			'description' => __( 'dBx After Hours', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			// 'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'dbx/afterhours', 'with_front' => false ), /* you can specify its url slug */
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
	register_taxonomy_for_object_type('post_tag', 'afterhours');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_afterhours');

	// register_taxonomy( 'afterhours_cat', 
 //    	array('afterhours'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
 //    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
 //    		'labels' => array(
 //    			'name' => __( 'After Hours Categories', 'bonestheme' ), /* name of the custom taxonomy */
 //    			'singular_name' => __( 'After Hours Category', 'bonestheme' ), /* single taxonomy name */
 //    			'search_items' =>  __( 'Search After Hours Categories', 'bonestheme' ), /* search title for taxomony */
 //    			'all_items' => __( 'All After Hours Categories', 'bonestheme' ), /* all title for taxonomies */
 //    			'parent_item' => __( 'Parent After Hours Category', 'bonestheme' ), /* parent title for taxonomy */
 //    			'parent_item_colon' => __( 'Parent After Hours Category:', 'bonestheme' ), /* parent taxonomy title */
 //    			'edit_item' => __( 'Edit After Hours Category', 'bonestheme' ), /* edit custom taxonomy title */
 //    			'update_item' => __( 'Update After Hours Category', 'bonestheme' ), /* update title for taxonomy */
 //    			'add_new_item' => __( 'Add New After Hours Category', 'bonestheme' ), /* add new title for taxonomy */
 //    			'new_item_name' => __( 'New After Hours Category Name', 'bonestheme' ) /* name title for taxonomy */
 //    		),
 //    		'show_admin_column' => true, 
 //    		'show_ui' => true,
 //    		'query_var' => true,
 //    		'rewrite' => array( 'slug' => 'afterhours-cat' ),
 //    	)
 //    );   

	add_filter( 'cmb_meta_boxes', 'afterhours_info' );
	function afterhours_info( $meta_boxes ) {

		$prefix = '_afterhours_'; // Prefix for all fields

		$meta_boxes[] = array(
			'id' => 'afterhours_metabox',
			'title' => 'After Hours Details',
			'pages' => array('afterhours'), // post type
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