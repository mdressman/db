<?php
/**
 *
 * Template Name: Events
 * @package WordPress
 * @subpackage dBx
 */

get_header(); ?>

	<div class="upcoming-page">	
		<div class="container">
			<h1 class="upcoming-title">Calendar</h1>

				<?php 
			
				$now = time();
                $args = array(
                    'post_type'=> 'event',
					'meta_key' => '_event_date',
					'meta_value' => $now - (36 * 60 * 60), 
                    'meta_compare' => '>',
                    'orderby' => 'meta_value',
                    'order'    => 'ASC',
					'postsperpage' => -1
                );
                query_posts( $args );

			    if (have_posts()) : while (have_posts()) : the_post(); 

			    $event_fields = array('_event_date', '_event_tickets_link','_event_facebook_link', '_event_venue');

				$event_data = array();

				foreach($event_fields as $event_field) {
					$event_data[$event_field] = get_post_meta ($post->ID, $event_field, true);
				}

				?>

			    <div class="event-container row">
					<div class="event-info-container col-md-4">
						<hr class="section-hr" />
						<div class="event-date-big">
							<?php echo date("n", $event_data['_event_date']) ?>.<?php echo date("j", $event_data['_event_date']) ?>
						</div>
						<div class="event-artist"><?php the_title(); ?></div>
						<div class="event-location"><?php echo $event_data['_event_venue'] ?></div>
					</div>
					<div class="event-photo-container col-md-8">
				    	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							<div class="event-photo"><?php the_post_thumbnail('col-md-8'); ?></div>
						</a>
					</div>
				</div>

			    <?php endwhile; ?>	
			
			    <?php endif; ?>

			
		</div>
	</div>
		
<?php get_footer(); ?>