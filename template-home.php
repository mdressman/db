<?php
/**
 *
 * Template Name: Home
 * @package WordPress
 * @subpackage dBx
 */

get_header(); ?>

	<div class="container">

		<!-- <div class="row">
			<div class="span12">
				<div class="slider-wrapper theme-default">
		            <div id="slider" class="nivoSlider">
		                <img src="<?php bloginfo( 'template_url' ); ?>/images/slider/dbx-thankyou-slide1.jpg" />
		                <img src="<?php bloginfo( 'template_url' ); ?>/images/slider/dbx-thankyou-slide2.jpg" />
		                <img src="<?php bloginfo( 'template_url' ); ?>/images/slider/dbx-thankyou-slide3.jpg" />
		                <img src="<?php bloginfo( 'template_url' ); ?>/images/slider/dbx-thankyou-slide4.jpg" />
		            </div>
			    </div>
			</div>
		</div> -->
		
		<div class="row home-subfeatures">
			<div class="span6">
				<h1 class="cleaner-content-heading"><a href="http://dbfestival.com/events">Upcoming Events</a></h1>

			</div>
		</div>


		<div class="row home-events">

			<?php 		     
                $now = time();
                $args = array(
                    'post_type'=> 'event',
					'meta_key' => '_event_date',
					'meta_value' => $now - (36 * 60 * 60), 
                    'meta_compare' => '>',
                    'orderby' => 'meta_value',
                    'order'    => 'ASC',
					'showposts' => 3
                );
                query_posts( $args );
				$post_counter = 0;

				if (have_posts()) : while (have_posts()) : the_post();

				$event_fields = array('_event_date', '_event_tickets_link','_event_facebook_link');
				$event_data = array();

				foreach($event_fields as $event_field) {
					$event_data[$event_field] = get_post_meta ($post->ID, $event_field, true);
				}
				$post_counter++;
			?>

			<div class="span4">
			 	<div class="subfeature pad-me">
		 			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			    		
			    		<?php the_post_thumbnail( 'span4' ); ?>
			    		<div class="subfeature-head">
			    			<span class="event-date"><?php echo date("l, F j Y", $event_data['_event_date']) ?></span>
			    			<h3><?php the_title(); ?></h3>
			    		</div>
			    	</a>
			 	</div>
			</div>

			<?php
				if ($post_counter % 3 == 0 ) {
						echo "</div><div class='row'>";
					}
				endwhile; endif; 
			?>
		</div> 

		<div class="row home-subfeatures content-margin">
			<div class="span6">
				<h1 class="cleaner-content-heading">Festival in review</h1>
			</div>
		</div>

		<div class="row">

			<?php 
			$args = array(
				'category_name' => 'fest-review',
				'showposts' => 3,
				'order' => 'DESC'
				);

				query_posts( $args );

				$post_counter = 0;

				if (have_posts()) : while (have_posts()) : the_post();

				$post_counter++;
			?>

		<div class="span4">

		 	<div class="subfeature pad-me">
	 			<?php if ($post->ID == 4113) { ?>
				<a href="http://dbfestival.com/dbx/photo-gallery" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<?php } else { ?>
	 			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
 				<?php } ?>
		    		
		    		<?php the_post_thumbnail( 'span4' ); ?>
		    		
	    			<h3><?php the_title(); ?></h3>
		    		
		    	</a>
		 	</div>
		</div>

			<?php
				if ($post_counter % 3 == 0 ) {
						echo "</div><div class='row'>";
					}
				endwhile; endif; 
			?>

		</div><!--row-->	

		

		<div class="row home-subfeatures content-margin">
			<div class="span6">
				<h1 class="cleaner-content-heading">News <span style="font-size: 14px;">/ <a href="http://dbfestival.com/news">View All</a></span></h1>
			</div>
		</div>

		<div class="row">

			<?php 
			$args = array(
				'category_name' => 'news',
				'showposts' => 3,
				'order' => 'DESC'
				);

				query_posts( $args );

				$post_counter = 0;

				if (have_posts()) : while (have_posts()) : the_post();

				$post_counter++;
			?>

		<div class="span4">

		 	<div class="subfeature pad-me">
	 			
	 			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		    		
		    		<?php the_post_thumbnail( 'span4' ); ?>
		    		
	    			<h3><?php the_title(); ?></h3>
		    		
		    	</a>
		 	</div>
		</div>

			<?php
				if ($post_counter % 3 == 0 ) {
						echo "</div><div class='row'>";
					}
				endwhile; endif; 
			?>

		</div><!--row-->	

		<div class="row home-subfeatures content-margin">
			<div class="span6">
				<h1 class="cleaner-content-heading">Features <span style="font-size: 14px;">/ <a href="http://dbfestival.com/features">View All</a></span></h1>

			</div>
		</div>


		<div class="row">

			<?php 
				$args = array(
					'category_name' => 'feature',
					'showposts' => 3,
					'order' => 'DESC'
					);

					query_posts( $args );

					$post_counter = 0;

					if (have_posts()) : while (have_posts()) : the_post();

					$post_counter++;
				?>

				<div class="span4">
			 	<div class="subfeature pad-me">
		 			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			    		
			    		<?php the_post_thumbnail( 'span4' ); ?>
			    		
		    			<h3>
		    				<?php
		    				the_title(); 
		    				?>
		    			</h3>
			    		
			    	</a>
			 	</div>
			</div>

			<?php
				if ($post_counter % 3 == 0 ) {
						echo "</div><div class='row'>";
					}
				endwhile; endif; 
			?>

		</div><!--row-->	

		
		
		<!-- SOCIAL -->
		
		<div class="social-feeds">
			<div class="row content-margin">
				<div class="span6">
					<!-- <div class="title-graphic"></div> -->
					<!-- <div class="title-ribbon"></div> -->
					<h1 class="cleaner-content-heading">SOCIAL</h1>
				</div>
			</div>

			<div class="row content-margin">
				
				<div class="span4">
					<!-- <h3>FACEBOOK</h3> -->
					<div class="subfeature pad-me">
						<div class="fb-like-box" data-href="http://www.facebook.com/decibelfestival" data-width="370" data-height="385" data-show-faces="false	" data-stream="true" data-header="false"></div>
					</div>
				</div>

				<div class="span4">
					<!-- <h3>INSTAGRAM</h3> -->
					<div class="subfeature pad-me">
					<!-- <a href="http://instagram.com/dbfestival" target="_blank">
						<img src="http://dbfestival.com/wp-content/themes/md_dBx/images/instagram.jpg" />
					</a> -->

						<?php echo do_shortcode( '[alpine-phototile-for-instagram user="dbfestival" src="user_recent" imgl="instagram" dltext="Instagram" style="wall" row="3" num="9" size="Th" align="center" max="100" nocredit="1"]' ); ?>
					</div>

				</div>

				<div class="span4">
					<!-- <h3>TWITTER</h3> -->
					<div class="subfeature db-tweets"><a class="twitter-timeline" height="360" href="https://twitter.com/dBFestival" data-widget-id="358470775923150848">Tweets by @dBFestival</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>

				</div>

			</div>
		</div>

			
<?php	get_footer( ); ?>