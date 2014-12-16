<?php
/**
 * Template Name: 2014 Program
 * @package WordPress
 * @subpackage Decibel Festival
 */
get_header(); ?>

<div class="pagewrap container" id="program">

	<div class="row content-margin">
		<div class="span8">
			<h1 class="page-title">2014 Decibel Festival Program</h1>
		</div>
	</div>

	<div class="row content-margin">
		<div class="span8">
			<div id="filters">
				<p>
					<span class="filter-label">Filter: </span>  
					<a href="#" data-filter=".showcase_2014">Showcase</a> 
					<span class="filter-label">/</span> 
					<a href="#" data-filter=".afterhours_2014">After Hours</a>
					<span class="filter-label">/</span> 
					<a href="#" data-filter=".optical_2014">Optical</a>
					<span class="filter-label">/</span> 
					<a href="#" data-filter=".boatparty_2014">Boat Party</a>
					<span class="filter-label">/</span> 
					<a href="#" data-filter="*" class="selected">Full Program</a> 
				</p>
		  	</div>
		</div>
	</div>

	<div class="row" id="venue">
		<div class="span12">
			
			<?php

				$days = array('wednesday','thursday','friday','saturday','sunday');
				foreach ($days as $day) {

			?>

			<div class="row">
				<div class="span6">
					<?php
						switch($day) {
							case "wednesday":
								$date_heading = "Wednesday, September 24 2014";
								break;
							case "thursday":
								$date_heading = "Thursday, September 25 2014";
								break;
							case "friday":
								$date_heading = "Friday, September 26 2014";
								break;
							case "saturday":
								$date_heading = "Saturday, September 27 2014";
								break;
							case "sunday":
								$date_heading = "Sunday, September 28 2014";
								break;	

						}
					?>

					<h1 class="content-heading page-title"><?php echo $date_heading; ?></h1>
				</div>
			</div>

			<div class="row isotope-container-program">
				

				<?php 
					$post_types = array('showcase_2014','afterhours_2014','optical_2014','boatparty_2014');
					foreach($post_types as $post_type) {
				?>

				
					<?php
						$args = array(
				            'post_type'=> $post_type,
							'postsperpage' => -1,
							'order' => 'ASC',
							'meta_key' => '_' . $post_type . '_date',
							'meta_value' => $day,
							'meta_compare' => '='
				        );
				        
				        query_posts( $args );

				        $showcase_counter = 0;

					    if (have_posts()) : while (have_posts()) : the_post(); 
					    
					    $showcase_counter++;

						$event_type = get_post_type();
						$event_type_obj = get_post_type_object( $event_type );
						$event_type_name = $event_type_obj->labels->singular_name;

				    ?>

					<div class="span4 <?php echo get_post_type(); ?>">
						<div class="subfeature pad-me">
							<p class="program-event-type"><?php echo $event_type_name; ?></p>
							<a href="<?php the_permalink(); ?>" class="content-margin">
								<?php the_post_thumbnail( 'span4' ); ?>
							</a>

							<h3>
								<a href="<?php the_permalink(); ?>" class="content-margin"><?php the_title(); ?></a>
								<a href="<?php echo get_post_meta ($post->ID, '_' . $post_type . '_tickets_link', true); ?>" target="_blank" class="buy-tickets" alt="BUY TICKETS" title="BUY TICKETS"><img src="http://dbfestival.com/images/buy_tickets.png" style="border-bottom:none;" /></a>
							</h3>

							<p class="program-lineup">
							<?php 

								if ($post_type == 'showcase_2014') {
									$post_type = 'showcases_2014';
								}

								$connected_artists = new WP_Query( 
														array(
															'connected_type' => 'artists_to_' . $post_type,
															'connected_items' => get_the_ID(),
															'nopaging' => true,
														) 
													);
								if ( $connected_artists->have_posts() ) :
									while ( $connected_artists->have_posts() ) : $connected_artists->the_post();
								
								$program_lineup = '';
								$program_lineup .= get_the_title();
								
								if( ($connected_artists->current_post + 1) < ($connected_artists->post_count) ) {
									$program_lineup .= ', ';
								}

								if ($post_type == 'showcases_2014') {
									$post_type = 'showcase_2014';
								}

							?>

							<?php echo $program_lineup; ?>

							<?php 
								endwhile; 
								wp_reset_postdata();
								endif;
							?>


							<?php 
								$connected_venue = new WP_Query( 
																array(
																	'connected_type' => $post_type . '_to_venue',
																	'connected_items' => get_the_ID(),
																	'nopaging' => true,
																) 
															);
								if ( $connected_venue->have_posts() ) :
									while ( $connected_venue->have_posts() ) : $connected_venue->the_post();
							?> 
							<span class="program-venue">@ <?php the_title(); ?></span></p>

							<?php 
								endwhile; 
								wp_reset_postdata();
								endif;
							?>
						</div>
					</div>

					<?php 
						if ( $showcase_counter % 3 == 0 ) { ?>
						</div><div class="row isotope-container-program">
					<?php } ?>

				
					<?php endwhile; endif; ?>
					
				<?php } ?>
				

			</div><!--close row-->


		<?php } ?>
			
		</div><!--close span12-->
	</div><!--close row-->

<?php get_footer(); ?>