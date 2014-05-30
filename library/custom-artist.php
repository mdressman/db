<?php

// let's create the function for the custom type
function custom_artist() { 
	// creating (registering) the custom type 
	register_post_type( 'artist', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Artists', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Artist', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Artists', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Artist', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Artists', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Artist', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Artist', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Artists', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => 'dbx'
			), /* end of arrays */
			'description' => __( 'Performing artist at WTF', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			// 'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'artist', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'artist', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky' )
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'artist');
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'artist');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_artist');
    
add_filter( 'cmb_meta_boxes', 'promoter_artist_info' );
function promoter_artist_info( $meta_boxes ) {

	$prefix = '_artist_'; // Prefix for all fields

	$meta_boxes[] = array(
		'id' => 'artist_metabox',
		'title' => 'Artist Details',
		'pages' => array('artist'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Affiliations',
				'id' => $prefix . 'affiliations',
				'type' => 'text'
			),
			array(
				'name' => 'Location',
				'id' => $prefix . 'location',
				'type' => 'text'
			),
			array(
				'name' => 'Type of artist',
				'id' => $prefix . 'type',
				'type' => 'radio_inline',
				'options' => array(
					array('name' => 'DJ', 'value' => 'DJ'),
					array('name' => 'Live', 'value' => 'Live'),
					array('name' => 'Visual', 'value' => 'Visual')				
				)
			),
			array(
				'name' => 'Social Links',
				'id' => $prefix . 'social_title',
				'type' => 'title'
			),
			array(
				'name' => 'Website',
				'id' => $prefix . 'website',
				'type' => 'text'
			),
			array(
				'name' => 'Facebook',
				'id' => $prefix . 'facebook',
				'type' => 'text'
			),
			array(
				'name' => 'Twitter',
				'id' => $prefix . 'twitter',
				'type' => 'text'
			),
			array(
				'name' => 'Soundcloud',
				'id' => $prefix . 'soundcloud',
				'type' => 'text'
			),
			array(
				'name' => 'Instagram',
				'id' => $prefix . 'instagram',
				'type' => 'text'
			),
			array(
				'name' => 'YouTube',
				'id' => $prefix . 'youtube',
				'type' => 'text'
			),
			array(
				'name' => 'Media Embed',
				'id' => $prefix . 'media_embed',
				'type' => 'title'
			),
			array(
				'name' => 'YouTube Embed',
				'id' => $prefix . 'youtube_embed',
				'type' => 'text'
			),
			array(
				'name' => 'Vimeo Embed',
				'id' => $prefix . 'vimeo_embed',
				'type' => 'text'
			),
			array(
				'name' => 'Soundcloud Embed',
				'id' => $prefix . 'soundcloud_embed',
				'type' => 'text'
			),
			array(
				'name' => 'RBMA Embed',
				'id' => $prefix . 'rbma_embed',
				'type' => 'text'
			),
			array(
				'name' => 'Featured News #1',
				'id' => $prefix . 'featured_news',
				'type' => 'title'
			),
			array(
				'name' => '#1 - Link URL',
				'id' => $prefix . 'news_url_1',
				'type' => 'text'
			),
			array(
				'name' => '#1 - Link Text',
				'id' => $prefix . 'news_text_1',
				'type' => 'text'
			),
			array(
				'name' => 'Featured News #2',
				'id' => $prefix . 'featured_news',
				'type' => 'title'
			),
			array(
				'name' => '#2 - Link URL',
				'id' => $prefix . 'news_url_2',
				'type' => 'text'
			),
			array(
				'name' => '#2 - Link Text',
				'id' => $prefix . 'news_text_2',
				'type' => 'text'
			),
			array(
				'name' => 'Featured News #3',
				'id' => $prefix . 'featured_news',
				'type' => 'title'
			),
			array(
				'name' => '#3 - Link URL',
				'id' => $prefix . 'news_url_3',
				'type' => 'text'
			),
			array(
				'name' => '#3 - Link Text',
				'id' => $prefix . 'news_text_3',
				'type' => 'text'
			),
			array(
				'name' => 'Featured News #4',
				'id' => $prefix . 'featured_news',
				'type' => 'title'
			),
			array(
				'name' => '#4 - Link URL',
				'id' => $prefix . 'news_url_4',
				'type' => 'text'
			),
			array(
				'name' => '#4 - Link Text',
				'id' => $prefix . 'news_text_4',
				'type' => 'text'
			),
			array(
				'name' => 'Featured News #5',
				'id' => $prefix . 'featured_news',
				'type' => 'title'
			),
			array(
				'name' => '#5 - Link URL',
				'id' => $prefix . ' news_url_5',
				'type' => 'text'
			),
			array(
				'name' => '#5 - Link Text',
				'id' => $prefix . 'news_text_5',
				'type' => 'text'
			),
		),
	);

	return $meta_boxes;
}

add_action( 'init', 'be_initialize_cmb_meta_boxes_2', 9999 );
function be_initialize_cmb_meta_boxes_2() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'js/libs/metabox/init.php' );
	}
}


?>