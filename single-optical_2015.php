<?php
/**
 *
 * @package WordPress
 * @subpackage Decibel Festival
 */
get_header(); ?>
			
	<div class="pagewrap container main-content showcase">
		<div class="row">		
			<div class="span6">
				<div class="page_content content-margin">
			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    <?php 

					$optical_2015_fields = array('_optical_2015_date', '_optical_2015_tickets_link','_optical_2015_facebook_link','_optical_2015_crateplayer_link','_optical_2015_soldout');

					$optical_2015_data = array();

					foreach($optical_2015_fields as $optical_2015_field) {
						$optical_2015_data[$optical_2015_field] = get_post_meta ($post->ID, $optical_2015_field, true);
					}
		
				?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php 
							$event_type = get_post_type();
							$event_type_obj = get_post_type_object( $event_type );
							$event_type_name = $event_type_obj->labels->singular_name;

							switch($optical_2015_data['_optical_2015_date']) {
								case "wednesday":
									$date_heading = "Wednesday, September 24 2015";
									break;
								case "thursday":
									$date_heading = "Thursday, September 25 2015";
									break;
								case "friday":
									$date_heading = "Friday, September 26 2015";
									break;
								case "saturday":
									$date_heading = "Saturday, September 27 2015";
									break;
								case "sunday":
									$date_heading = "Sunday, September 28 2015";
									break;	

							}

						?>

						<h1 class="top-title"><?php the_title(); ?> // <?php echo $event_type_name; ?></h1>

						<?php if($optical_2015_data['_optical_2015_date']) { ?>
							<h2><?php echo $date_heading; ?></h2>
						<?php } ?>
						
						<?php the_post_thumbnail( 'full' ); ?>
						<div class="entry-content">
							<?php the_content(); ?>
							<?php
								// like button
								if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Share Sidebar') ) : else :
								endif;
							?>
						</div><!-- .entry-content -->
					</div><!-- #post-## -->
				<?php endwhile; endif; // end of the loop. ?>
				</div>	
			</div>
			
			<div class="span6 content-margin sidebar">
				<div class="row">
					<div class="span3">
						<div class="row">
							<div class="span3">
								<h1 class="showcase-label">Lineup</h1>
							</div>
						</div>

						<?php 

						$connected_artists = new WP_Query( 
												array(
													'connected_type' => 'artists_to_optical_2015',
													'connected_items' => get_queried_object(),
													'nopaging' => true,
												) 
											);
						if ( $connected_artists->have_posts() ) :
							while ( $connected_artists->have_posts() ) : $connected_artists->the_post();
						?>

						<div class="row">
							<div class="span3 showcase-artist">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'span4' ); ?>
									<p class="showcase-settimes"><?php echo p2p_get_meta( $post->p2p_id, 'times', true ); ?></p>
									<h3><?php the_title(); ?></h3>
								</a>
							</div>
						</div>

						<?php 
							endwhile; 
							wp_reset_postdata();
							endif;
						?>

						<?php 

						$connected_venue = new WP_Query( 
												array(
													'connected_type' => 'optical_2015_to_venue',
													'connected_items' => get_queried_object(),
													'nopaging' => true,
												) 
											);
						if ( $connected_venue->have_posts() ) :
							while ( $connected_venue->have_posts() ) : $connected_venue->the_post();
						?>

						<div class="row">
							<div class="span3 showcase-artist">
								<span class="db-label">Venue:</span>
								<!-- <a href="<?php the_permalink(); ?>"> -->
								<a href="<?php echo get_post_meta ($post->ID, '_venue_gmap', true); ?>" taregt="_blank">
									<?php the_post_thumbnail( 'full' ); ?>
									<h3><?php the_title(); ?></h3>
									<p class="venue-address"><?php echo get_post_meta ($post->ID, '_venue_address', true); ?></p>
								</a>
							</div>
						</div>

						<?php 
							endwhile; 
							wp_reset_postdata();
							endif;
						?>

					</div>
					<div class="span3">

						<div class="row">
							<div class="span3">
								
								<?php 

								if($optical_2015_data['_optical_2015_crateplayer_link']) {
									echo do_shortcode('[soundcloud]' . $optical_2015_data['_optical_2015_crateplayer_link'] . '[/soundcloud]');
								}
								?>
							</div>
						</div>

						<?php if($optical_2015_data['_optical_2015_tickets_link']) { ?>
						<div class="row">
							<div class="span3">
								<?php if($optical_2015_data['_optical_2015_soldout']) { ?>
									<a class="sidebar-button" href="http://dbfestival.strangertickets.com" target="_blank"><h1>SOLD OUT <br/> <span style="font-size:10px;">(but you can still get a db pass)</span></h1></a>
								<?php } else { ?>
									<a class="sidebar-button" href="<?php echo $optical_2015_data['_optical_2015_tickets_link'] ?>" target="_blank"><h1>BUY TICKETS</h1></a>
								<?php } ?>	
							</div>
						</div>
						<?php } ?>

						<?php if($optical_2015_data['_optical_2015_facebook_link']) { ?>
						<div class="row">
							<div class="span3">
								<a class="sidebar-button" href="<?php echo $optical_2015_data['_optical_2015_facebook_link'] ?>" target="_blank"><h1>FACEBOOK RSVP</h1></a>
							</div>
						</div>
						<?php } ?>

						<?php if($optical_2015_data['_optical_2015_crateplayer_link']) { ?>
						<div class="row">
							<div class="span3">
								<a class="sidebar-button" href="<?php echo $optical_2015_data['_optical_2015_crateplayer_link'] ?>" target="_blank"><h1>Listen on CratePlayer</h1></a>
							</div>
						</div>
						<?php } ?>
						
						<?php
							$event_type = get_post_type();
							$event_type_obj = get_post_type_object( $event_type );
							$event_type_name = $event_type_obj->labels->singular_name;
						?>
						
						<span class="db-label">Share:</span>
						<div class="row">

							<div class="span1">
								<a class="sidebar-button" href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank" title="Share on Facebook" alt="Share on Facebook">
									<h1><img src="http://dbfestival.com/wp-content/themes/md_dBx/images/share_facebook.png" /></h1>
								</a>
							</div>
							<div class="span1">
								<a class="sidebar-button" href="http://twitter.com/share?text=So excited for the <?php the_title(); ?> <?php echo $event_type_name; ?> %40dBFestival! <?php echo the_permalink(); ?>" target="_blank" title="Share on Twitter" alt="Share on Twitter">
									<h1><img src="http://dbfestival.com/wp-content/themes/md_dBx/images/share_twitter.png" /></h1>
								</a>
							</div>
							<div class="span1">
								<a class="sidebar-button" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" target="_blank" title="Share on Google+" alt="Share on Google+">
									<h1><img src="http://dbfestival.com/wp-content/themes/md_dBx/images/share_gplus.png" /></h1>
								</a>
							</div>
						</div>

						<!-- <div class="row">
							<div class="span3">
								<h2>Venue</h1>
							</div>
						</div> -->


					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>