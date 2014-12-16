<?php

	


/* THEME FEATURES */
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
	add_theme_support('post-thumbnails'); 
}

/* SCRIPTS */

// function add_scripts() {
//     wp_enqueue_script( 'jquery' );
// }
// add_action('wp_enqueue_scripts', 'add_scripts');


/* CUSTOM POST TYPES */

require_once('library/custom-event.php'); 
require_once('library/custom-job.php'); 
require_once('library/custom-artist.php'); 
require_once('library/custom-venue.php');
require_once('library/custom-partner.php');

require_once('library/custom-showcase.php'); 
require_once('library/custom-afterhours.php'); 
require_once('library/custom-boatparty.php'); 
require_once('library/custom-optical.php'); 

require_once('library/custom-showcase_2014.php'); 
require_once('library/custom-afterhours_2014.php'); 
require_once('library/custom-boatparty_2014.php'); 
require_once('library/custom-optical_2014.php'); 


/* CUSTOM POST RELATIONSHIPS */

function my_connection_types() {
	p2p_register_connection_type( array(
		'name' => 'artists_to_showcases',
		'from' => 'artist',
		'to' => 'showcase',
		'sortable' => 'any',
		'fields' => array(
			'times' => array(
				'title' => 'Set Times',
				'type' => 'text',
			),
		)
	) );

	p2p_register_connection_type( array(
		'name' => 'artists_to_showcases_2014',
		'from' => 'artist',
		'to' => 'showcase_2014',
		'sortable' => 'any',
		'fields' => array(
			'times' => array(
				'title' => 'Set Times',
				'type' => 'text',
			),
		)
	) );

	p2p_register_connection_type( array(
		'name' => 'artists_to_afterhours',
		'from' => 'artist',
		'to' => 'afterhours',
		'sortable' => 'any',
		'fields' => array(
			'times' => array(
				'title' => 'Set Times',
				'type' => 'text',
			),
		)
	) );

	p2p_register_connection_type( array(
		'name' => 'artists_to_afterhours_2014',
		'from' => 'artist',
		'to' => 'afterhours_2014',
		'sortable' => 'any',
		'fields' => array(
			'times' => array(
				'title' => 'Set Times',
				'type' => 'text',
			),
		)
	) );

	p2p_register_connection_type( array(
		'name' => 'artists_to_optical',
		'from' => 'artist',
		'to' => 'optical',
		'sortable' => 'any',
		'fields' => array(
			'times' => array(
				'title' => 'Set Times',
				'type' => 'text',
			),
		)
	) );

	p2p_register_connection_type( array(
		'name' => 'artists_to_optical_2014',
		'from' => 'artist',
		'to' => 'optical_2014',
		'sortable' => 'any',
		'fields' => array(
			'times' => array(
				'title' => 'Set Times',
				'type' => 'text',
			),
		)
	) );

	p2p_register_connection_type( array(
		'name' => 'artists_to_boatparty',
		'from' => 'artist',
		'to' => 'boatparty',
		'sortable' => 'any',
		'fields' => array(
			'times' => array(
				'title' => 'Set Times',
				'type' => 'text',
			),
		)
	) );

	p2p_register_connection_type( array(
		'name' => 'artists_to_boatparty_2014',
		'from' => 'artist',
		'to' => 'boatparty_2014',
		'sortable' => 'any',
		'fields' => array(
			'times' => array(
				'title' => 'Set Times',
				'type' => 'text',
			),
		)
	) );

	p2p_register_connection_type( array(
		'name' => 'showcase_to_venue',
		'from' => 'showcase',
		'to' => 'venue'
	) );

	p2p_register_connection_type( array(
		'name' => 'showcase_2014_to_venue',
		'from' => 'showcase_2014',
		'to' => 'venue'
	) );

	p2p_register_connection_type( array(
		'name' => 'afterhours_to_venue',
		'from' => 'afterhours',
		'to' => 'venue'
	) );

	p2p_register_connection_type( array(
		'name' => 'afterhours_2014_to_venue',
		'from' => 'afterhours_2014',
		'to' => 'venue'
	) );

	p2p_register_connection_type( array(
		'name' => 'optical_to_venue',
		'from' => 'optical',
		'to' => 'venue'
	) );

	p2p_register_connection_type( array(
		'name' => 'optical_2014_to_venue',
		'from' => 'optical_2014',
		'to' => 'venue'
	) );

	p2p_register_connection_type( array(
		'name' => 'boatparty_to_venue',
		'from' => 'boatparty',
		'to' => 'venue'
	) );

	p2p_register_connection_type( array(
		'name' => 'boatparty_2014_to_venue',
		'from' => 'boatparty_2014',
		'to' => 'venue'
	) );
}
add_action( 'p2p_init', 'my_connection_types' );


/* MENUS */
register_nav_menus(
	array(
		'utility-nav' => __( 'The Utility Menu', 'dBx' ),
		'dbx-utility-nav' => __( 'The Festival Utility Menu', 'dBx' ),
		'365-nav' => __( 'The Portal Menu', 'dBx' ),
		'main-nav' => __( 'The Main Menu', 'dBx' ),   
		'footer-links' => __( 'Footer Links', 'dBx' ) 
	)
);

/* SIDEBARS */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'ConstantContact',
		'before_widget' => '<div class="footerwidget">',
		'after_widget' => '</div>',
		'before_title' => '<span class="widget_title">',
		'after_title' => '</span>'
	));
	register_sidebar(array(
		'name' => 'Blog',
		'before_widget' => '<div class="blogwidget">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="sidebar-title">',
		'after_title' => '</h1>'
	));
	register_sidebar(array(
		'name' => 'One-off Events',
		'before_widget' => '<div class="blogwidget">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="sidebar-title">',
		'after_title' => '</h1>'
	));
	register_sidebar(array(
		'name' => 'Festival Sidebar',
		'before_widget' => '<div class="blogwidget">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="sidebar-title">',
		'after_title' => '</h1>'
	));
	register_sidebar(array(
		'name' => 'Partner With Us',
		'before_widget' => '<div class="blogwidget">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="sidebar-title">',
		'after_title' => '</h1>'
	));
	register_sidebar(array(
		'name' => 'Volunteer Sidebar',
		'before_widget' => '<div class="blogwidget">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="sidebar-title">',
		'after_title' => '</h1>'
	));
	register_sidebar(array(
		'name' => 'Contact Sidebar',
		'before_widget' => '<div class="blogwidget">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="sidebar-title">',
		'after_title' => '</h1>'
	));
	register_sidebar(array(
		'name' => 'Share Sidebar',
		'before_widget' => '<div class="blogwidget">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="sidebar-title">',
		'after_title' => '</h1>'
	));
	register_sidebar(array(
		'name' => 'Feature 1 Sidebar',
		'before_widget' => '<div class="blogwidget">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="sidebar-title">',
		'after_title' => '</h1>'
	));
	register_sidebar(array(
		'name' => 'Feature 2 Sidebar',
		'before_widget' => '<div class="blogwidget">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="sidebar-title">',
		'after_title' => '</h1>'
	));
	register_sidebar(array(
		'name' => 'RBMA1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="sidebar-title">',
		'after_title' => '</h1>'
	));
	register_sidebar(array(
		'name' => 'RBMA2',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="sidebar-title">',
		'after_title' => '</h1>'
	));
	register_sidebar(array(
		'name' => 'RBMA3',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="sidebar-title">',
		'after_title' => '</h1>'
	));
}

/* IMAGES */

// add_image_size( 'span6-feature', 130, 130, true );
add_image_size( 'span6', 760, 281, true );
add_image_size( 'span4', 370, 233, true );
add_image_size( 'span3', 250, 166, true );

/* PASSWORD PROTECTED */

// Filter to hide protected posts
function exclude_protected($where) {
	global $wpdb;
	return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

// Decide where to display them
function exclude_protected_action($query) {
	if( !is_single() && !is_page() && !is_admin() ) {
		add_filter( 'posts_where', 'exclude_protected' );
	}
}

// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action');

function my_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "<p style='font-size:18px;'>Please enter the password below to read the press release.</p>" ) . '
    <label for="' . $label . '">' . __( "Password:" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" />
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'my_password_form' );

function my_excerpt_protected( $excerpt ) {
    if ( post_password_required() )
        $excerpt = "<h3>We are so excited to share the final artist announcement for the 10th annual Decibel Festival.</h3>";
    return $excerpt;
}
add_filter( 'the_excerpt', 'my_excerpt_protected' );


/* MISC */

// function fb_disable_feed() {
// wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
// }

// add_action('do_feed', 'fb_disable_feed', 1);
// add_action('do_feed_rdf', 'fb_disable_feed', 1);
// add_action('do_feed_rss', 'fb_disable_feed', 1);
// add_action('do_feed_rss2', 'fb_disable_feed', 1);
// add_action('do_feed_atom', 'fb_disable_feed', 1);

/* ADMIN */

function add_artist_column($defaults) {
    $defaults['artist_type'] = 'Artist Type';
    return $defaults;
}
add_filter('manage_artist_posts_columns' , 'add_artist_column');

function custom_artist_column( $column_name, $post_id ) {
	if ($column_name == 'artist_type') { 
		echo get_post_meta( $post_id , '_artist_type' , true );
	}
}
add_action( 'manage_artist_posts_custom_column' , 'custom_artist_column', 10, 2 );

/* SHORTCODES */
function print_ind_ticket_links() {
	$output = '';
	$output .= '<div class="program-ticket-links">';

	$days = array('wednesday','thursday','friday','saturday','sunday');
	
	foreach ($days as $day) {
		switch($day) {
			case "wednesday":
				$date_heading = "Wednesday, September 25 2013";
				break;
			case "thursday":
				$date_heading = "Thursday, September 26 2013";
				break;
			case "friday":
				$date_heading = "Friday, September 27 2013";
				break;
			case "saturday":
				$date_heading = "Saturday, September 28 2013";
				break;
			case "sunday":
				$date_heading = "Sunday, September 29 2013";
				break;	
		}
		$output .= '<h3>' . $date_heading . '</h3>';
		

		$post_types = array('showcase','afterhours','optical','boatparty');
		foreach($post_types as $post_type) {
			$args = array(
	            'post_type'=> $post_type,
				'postsperpage' => -1,
				'order' => 'ASC',
				'meta_key' => '_' . $post_type . '_date',
				'meta_value' => $day,
				'meta_compare' => '='
	        );
	        query_posts( $args );

	        if (have_posts()) : while (have_posts()) : the_post(); 

		        $event_type = get_post_type();
				$event_type_obj = get_post_type_object( $event_type );
				$event_type_name = $event_type_obj->labels->singular_name;

				$tickets_link = get_post_meta (get_the_ID(), '_' . $post_type . '_tickets_link', true);
				$sold_out = get_post_meta (get_the_ID(), '_' . $post_type . '_soldout', true);

				$ticket_info = '';
				$title_link = '';
				if ($sold_out) {
					$ticket_info = '<strong>Sold Out</strong> (but you can still get in with a <a href="http://dbfestival.strangertickets.com" target="_blank">festival pass</a>)';
					$title_link = 'http://dbfestival.strangertickets.com';
				} else {
					$ticket_info = '<a href="' . $tickets_link . '" target="_blank"><img src="http://dbfestival.com/images/buy_tickets.png" style="border-bottom:none;" /></a>';
					$title_link = $tickets_link;
				}

				$event_title = get_the_title();
				$event_start_time = get_post_meta (get_the_ID(), '_' . $post_type . '_start_time', true);
				$event_age = get_post_meta (get_the_ID(), '_' . $post_type . '_age', true);

				
				$connected_venue = new WP_Query( 
										array(
											'connected_type' => $post_type . '_to_venue',
											'connected_items' => get_the_ID(),
											'nopaging' => true,
										) 
									);


				if ( $connected_venue->have_posts() ) :
					while ( $connected_venue->have_posts() ) : $connected_venue->the_post();

				$venue_name = get_the_title();

				endwhile; 
				wp_reset_postdata();
				endif;

				$output .= '<p><a href="' . $title_link . '" target="_blank">' 
							. $event_title . '</a> / ' 
							. $event_type_name . ' / '
							. $event_age . ' / '
							. $event_start_time . ' / '
							. $venue_name . ' / '
							. $ticket_info
							. '</p>';


				

			endwhile; endif;	
		}

		

	}
	$output .= '</div>';



	return $output;
}
add_shortcode('program_ticket_links', 'print_ind_ticket_links');  

function print_ind_ticket_links_2014() {
	$output = '';
	$output .= '<div class="program-ticket-links">';

	$days = array('wednesday','thursday','friday','saturday','sunday');
	
	foreach ($days as $day) {
		switch($day) {
			case "wednesday":
				$date_heading = "Wednesday, September 24, 2014";
				break;
			case "thursday":
				$date_heading = "Thursday, September 25, 2014";
				break;
			case "friday":
				$date_heading = "Friday, September 26, 2014";
				break;
			case "saturday":
				$date_heading = "Saturday, September 27, 2014";
				break;
			case "sunday":
				$date_heading = "Sunday, September 28, 2014";
				break;	
		}
		$output .= '<h3>' . $date_heading . '</h3>';
		

		$post_types = array('showcase_2014','afterhours_2014','optical_2014','boatparty_2014');
		foreach($post_types as $post_type) {
			$args = array(
	            'post_type'=> $post_type,
				'postsperpage' => -1,
				'order' => 'ASC',
				'meta_key' => '_' . $post_type . '_date',
				'meta_value' => $day,
				'meta_compare' => '='
	        );
	        query_posts( $args );

	        if (have_posts()) : while (have_posts()) : the_post(); 

		        $event_type = get_post_type();
				$event_type_obj = get_post_type_object( $event_type );
				$event_type_name = $event_type_obj->labels->singular_name;

				$tickets_link = get_post_meta (get_the_ID(), '_' . $post_type . '_tickets_link', true);
				$sold_out = get_post_meta (get_the_ID(), '_' . $post_type . '_soldout', true);

				$ticket_info = '';
				$title_link = '';
				if ($sold_out) {
					$ticket_info = '<strong>Sold Out</strong> (but you can still get in with a <a href="http://dbfestival.strangertickets.com" target="_blank">festival pass</a>)';
					$title_link = 'http://dbfestival.strangertickets.com';
				} else {
					$ticket_info = '<a href="' . $tickets_link . '" target="_blank"><img src="http://dbfestival.com/images/buy_tickets.png" style="border-bottom:none;" /></a>';
					$title_link = $tickets_link;
				}

				$event_title = get_the_title();
				$event_start_time = get_post_meta (get_the_ID(), '_' . $post_type . '_start_time', true);
				$event_age = get_post_meta (get_the_ID(), '_' . $post_type . '_age', true);

				
				$connected_venue = new WP_Query( 
										array(
											'connected_type' => $post_type . '_to_venue',
											'connected_items' => get_the_ID(),
											'nopaging' => true,
										) 
									);


				if ( $connected_venue->have_posts() ) :
					while ( $connected_venue->have_posts() ) : $connected_venue->the_post();

				$venue_name = get_the_title();

				endwhile; 
				wp_reset_postdata();
				endif;

				$output .= '<p><a href="' . $title_link . '" target="_blank">' 
							. $event_title . '</a> / ' 
							. $event_type_name . ' / '
							. $event_age . ' / '
							. $event_start_time . ' / '
							. $venue_name . ' / '
							. $ticket_info
							. '</p>';


				

			endwhile; endif;	
		}

		

	}
	$output .= '</div>';



	return $output;
}
add_shortcode('2014_program_ticket_links', 'print_ind_ticket_links_2014');  



// ?>