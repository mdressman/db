<?php
/**
 *
 * Template Name: Home
 * @package WordPress
 * @subpackage dBx
 */

get_header(); ?>

	<div class="container">



		<div class="row content-margin">
			<div class="span12">
				<img src="http://dbfestival.com/wp-content/uploads/2013/09/thank-you_1.jpg" />
			</div>
		</div>

		<div class="row home-subfeatures content-margin">
			<div class="span6">
				<!-- <div class="title-graphic"></div> -->
				<!-- <div class="title-ribbon"></div> -->
				<h1 class="content-heading">News <span style="font-size: 14px;">/ <a href="http://dbfestival.com/news">View All</a></span></h1>
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
			<!-- <div class="span6"> -->
		 	<div class="subfeature pad-me">
	 			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		    		
		    		<?php // the_post_thumbnail( 'span6-feature' ); ?>
		    		<?php the_post_thumbnail( 'span4' ); ?>
		    		
	    			<h3><?php the_title(); ?></h3>
		    		
		    	</a>
		 	</div>
		</div>

			<?php
				// if ($post_counter % 2 == 0 ) {
				if ($post_counter % 3 == 0 ) {
						echo "</div><div class='row'>";
					}
				endwhile; endif; 
			?>

		</div><!--row-->	

		<div class="row home-subfeatures content-margin">
			<div class="span6">
				<!-- <div class="title-graphic"></div> -->
				<!-- <div class="title-ribbon"></div> -->
				<h1 class="content-heading">Features <span style="font-size: 14px;">/ <a href="http://dbfestival.com/features">View All</a></span></h1>

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
				<!-- <div class="span6"> -->
			 	<div class="subfeature pad-me">
		 			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			    		
			    		<?php // the_post_thumbnail( 'span6-feature' ); ?>
			    		<?php the_post_thumbnail( 'span4' ); ?>
			    		
		    			<h3>
		    				<?php
		    				if (in_category( 'rbma')) {
		    					echo 'RBMA Spotlight: ';
		    				} 
		    				the_title(); 
		    				?>
		    			</h3>
			    		
			    	</a>
			 	</div>
			</div>

			<?php
				// if ($post_counter % 2 == 0 ) {
				if ($post_counter % 3 == 0 ) {
						echo "</div><div class='row'>";
					}
				endwhile; endif; 
			?>

		</div><!--row-->	

		<div class="row content-margin">

			<?php 
				// $args = array(
				// 	'post_type' => 'page',
				// 	'post__in' => array(910, 120, 46),
				// 	'showposts' => 3
				// 	);
				$args = array(
					'post_type' => 'page',
					'post__in' => array(120,439),
					'showposts' => 2
					);

					query_posts( $args );

					$post_counter = 0;

					if (have_posts()) : while (have_posts()) : the_post();

					$post_counter++;
				?>

				<div class="span4">
				<!-- <div class="span6"> -->
				 	<div class="subfeature pad-me">
			 			
						<?php if (get_post_meta( get_the_ID(), 'frontpage-url', true )) { ?>
							<a href="<?php echo get_post_meta( get_the_ID(), 'frontpage-url', true ); ?>" rel="bookmark" target="_blank">
						<?php } else { ?>
			 				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			 			<?php } ?>
				    		
				    		<?php // the_post_thumbnail( 'span6-feature' ); ?>
				    		<?php the_post_thumbnail( 'span4' ); ?>
				    		
			    			<!-- <h3><?php the_title(); ?></h3> -->
				    		
				    	</a>
				 	</div>
				</div>

			<?php
				// if ($post_counter % 2 == 0 ) {
				// if ($post_counter % 3 == 0 ) {
				// 		echo "</div><div class='row'>";
				// 	}
				endwhile; endif; 
			?>
				<div class="span4">
					<div class="subfeature pad-me">
						<div id="rbma-holder">
							<iframe width=100% height=223 scrolling=no src=http://www.rbmaradio.com/embed/lists/28 frameborder=0 >iframe not supported!</iframe>
						</div>
					</div>
				</div>

			</div><!--row-->	

		<div class="row home-subfeatures content-margin">
			<div class="span6">
				<!-- <div class="title-graphic"></div> -->
				<!-- <div class="title-ribbon"></div> -->
				<h1 class="content-heading">RBMA Spotlights <span style="font-size: 14px;">/ <a href="http://dbfestival.com/features">View All</a></span></h1>

			</div>
		</div>


		<div class="row">

			<?php 
				$args = array(
					'category_name' => 'rbma',
					'showposts' => 6,
					'order' => 'DESC'
					);

					query_posts( $args );

					$post_counter = 0;

					if (have_posts()) : while (have_posts()) : the_post();

					$post_counter++;
				?>

				<div class="span4">
				<!-- <div class="span6"> -->
			 	<div class="subfeature pad-me">
		 			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			    		
			    		<?php // the_post_thumbnail( 'span6-feature' ); ?>
			    		<?php the_post_thumbnail( 'span4' ); ?>
			    		
		    			<h3>
		    				<?php
		    				if (in_category( 'rbma')) {
		    					echo 'RBMA Spotlight: ';
		    				} 
		    				the_title(); 
		    				?>
		    			</h3>
			    		
			    	</a>
			 	</div>
			</div>

			<?php
				// if ($post_counter % 2 == 0 ) {
				if ($post_counter % 3 == 0 ) {
						echo "</div><div class='row'>";
					}
				endwhile; endif; 
			?>

		</div><!--row-->	


		

		<!-- <div class="row home-subfeatures">
			<div class="span6">
				<h1 class="content-heading"><a href="http://dbfestival.com/events">Upcoming Events</a></h1>

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

		</div> -->


		
		<!-- SOCIAL -->
		
		<div class="social-feeds">
			<div class="row content-margin">
				<div class="span6">
					<!-- <div class="title-graphic"></div> -->
					<!-- <div class="title-ribbon"></div> -->
					<h1 class="content-heading">SOCIAL</h1>
				</div>
			</div>

			<div class="row content-margin">
				
				<div class="span4">
					<h3>FACEBOOK</h3>
					<div class="subfeature pad-me">
						<div class="fb-like-box" data-href="http://www.facebook.com/decibelfestival" data-width="370" data-height="385" data-show-faces="false	" data-stream="true" data-header="false"></div>
					</div>
				</div>

				<div class="span4">
					<h3>INSTAGRAM</h3>
					<div class="subfeature pad-me">
					<!-- <a href="http://instagram.com/dbfestival" target="_blank">
						<img src="http://dbfestival.com/wp-content/themes/md_dBx/images/instagram.jpg" />
					</a> -->

						<?php echo do_shortcode( '[alpine-phototile-for-instagram user="dbfestival" src="user_recent" imgl="instagram" dltext="Instagram" style="wall" row="3" num="9" size="Th" align="center" max="100" nocredit="1"]' ); ?>
					</div>

				</div>

				<div class="span4">
					<h3>TWITTER</h3>
					<div class="subfeature db-tweets"><a class="twitter-timeline" height="360" href="https://twitter.com/dBFestival" data-widget-id="358470775923150848">Tweets by @dBFestival</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>

				</div>

			</div>
		</div>

			
<?php	get_footer( ); ?>