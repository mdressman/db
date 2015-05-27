<?php

function custom_showcase_2015() { 
	
	register_post_type( 'showcase_2015', 
	 	
		array('labels' => array(
			'name' => __('2015 Showcases', 'decibel'),
			'singular_name' => __('Showcase', 'decibel'),
			'all_items' => __('All 2015 Showcases', 'decibel'),
			'add_new' => __('Add New', 'decibel'),
			'add_new_item' => __('Add New 2015 Showcase', 'decibel'),
			'edit' => __( 'Edit', 'decibel' ),
			'edit_item' => __('Edit 2015 Showcases', 'decibel'),
			'new_item' => __('New 2015 Showcase', 'decibel'),
			'view_item' => __('View 2015 Showcase', 'decibel'),
			'search_items' => __('Search 2015 Showcases', 'decibel'),
			'not_found' =>  __('Nothing found in the Database.', 'decibel'),
			'not_found_in_trash' => __('Nothing found in Trash', 'decibel'),
			'parent_item_colon' => ''
			),
			'description' => __( '2015 dB Showcase', 'decibel' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			// 'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'db2015/showcase', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'Showcase', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type('category', 'showcase');
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'showcase_2015');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_showcase_2015');

	add_filter( 'cmb_meta_boxes', 'showcase_2015_info' );
	function showcase_2015_info( $meta_boxes ) {

		$prefix = '_showcase_2015_'; // Prefix for all fields

		$meta_boxes[] = array(
			'id' => 'showcase_2015_metabox',
			'title' => '2015 Showcase Details',
			'pages' => array('showcase_2015'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => 'Showcase Details',
					'id' => $prefix . 'details_title',
					'type' => 'title'
				),
				array(
					'name' => 'Showcase Date',
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
					'name' => 'Facebook Showcase Link',
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