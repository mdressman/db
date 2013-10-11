<?php
/**
 *
 * Template Name: dBx Spotlight
 * @package WordPress
 * @subpackage dBx
 */
get_header(); ?>
			
	<div class="pagewrap container main-content showcase">
		<div class="row">		
			
			<div class="span12">
				<div class="page_content content-margin">
				    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				    	
					
						<h1 class="entry-title"><?php the_title(); ?></h1>

						
						
						<?php the_post_thumbnail( 'full' ); ?>


						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->

							


					

						<?php
							// like button
							if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Share Sidebar') ) : else :
							endif;
						?>
							
						
					<?php endwhile; endif; // end of the loop. ?>


				</div>	
			</div>
			
			<div class="span3 content-margin sidebar">
				
				<div class="row">	
					<h1 class="showcase-label">Lineup</h1>		
				</div>

						

						<div class="row showcase-artist">
							
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'span4' ); ?>
							</a>
							<p class="showcase-settimes"><?php echo p2p_get_meta( $post->p2p_id, 'times', true ); ?></p>
							<h3><?php the_title(); ?></h3>
						</div>

						<?php 
							endwhile; 
							wp_reset_postdata();
							endif;
						?>

					</div>
					<div class="span3">

						<?php if($showcase_data['_showcase_tickets_link']) { ?>
						<div class="row">
							<div class="span3">
								<a class="sidebar-button" href="<?php echo $showcase_data['_showcase_tickets_link'] ?>" target="_blank"><h1>BUY TICKETS</h1></a>
							</div>
						</div>
						<?php } ?>

						<?php if($showcase_data['_showcase_facebook_link']) { ?>
						<div class="row">
							<div class="span3">
								<a class="sidebar-button" href="<?php echo $showcase_data['_showcase_facebook_link'] ?>" target="_blank"><h1>FACEBOOK RSVP</h1></a>
							</div>
						</div>
						<? } ?>
						
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

						<?php 

						$connected_venue = new WP_Query( 
												array(
													'connected_type' => 'showcase_to_venue',
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

						<div class="row no-bottom">
							<div class="span3">
								<h1>Explore</h1>
							</div>
						</div>

						<div class="row" id="showcase-select">

							<div class="span3">
								<select>
									<option value="-1">CHOOSE A SHOWCASE</option>
									<?php
										$args = array(
					                        'post_type'=> 'showcase',
											'postsperpage' => -1
					                    );
					                    query_posts( $args );

									    if (have_posts()) : while (have_posts()) : the_post(); 
								    ?>
									<option value="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></option>
									<?php
										endwhile; endif; 
									?>
								</select>
							</div>

							<?php
								$next_post_link_url = get_permalink( get_adjacent_post(false,'',false)->ID ); 
								$prev_post_link_url = get_permalink( get_adjacent_post(false,'',true)->ID );
							?>
							<div class="span3">
								<a class="sidebar-button" href="<?php echo $next_post_link_url; ?>"><h1>NEXT</h1></a>
							</div> 

							<div class="span3">
								<a class="sidebar-button" href="<?php echo $prev_post_link_url; ?>"><h1>PREVIOUS</h1></a>
							</div>


						</div>



					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>