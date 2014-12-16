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

				<a href="http://dbfestival.com/db2014/lineup"><img src="http://dbfestival.com/wp-content/uploads/2014/09/Thank-YOU-HERO.png" class="hero-img" /></a>

			</div>
		</div> -->

		<div class="row home-subfeatures content-margin">
			<div class="span5">
				<h1>Events <span style="font-size: 11px;"> <a href="http://dbfestival.com/events">[ View All ]</a></span></h1>
			</div>
			<div class="span7 heading-spacer"></div>
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
					'showposts' => 6
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
			    		
			    		<div class="img-wrapper"><?php the_post_thumbnail( 'span4' ); ?></div>
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
		
		<!-- <div class="row home-subfeatures content-margin home-cta">
			<div class="span4">
				<div class="subfeature pad-me">
					<a href="http://dbfestival.com/db2014/tickets" rel="bookmark" title="Tickets">
						<div class="img-wrapper">
							<h2>FESTIVAL PASSES AND INDIVIDUAL TICKETS</h2>
						</div>
					</a>
				</div>
			</div>
			<div class="span4">
				<div class="subfeature pad-me">
					<a href="http://dbfestival.com/db2014/program" rel="bookmark" title="2014 Festival Program">
						<div class="img-wrapper">
							<h2>PROGRAM DETAILS AND AUDIO PLAYLISTS</h2>
						</div>
					</a>
				</div>
			</div>
			<div class="span4">
				<div class="subfeature pad-me">
					<a href="http://schedule.dbfestival.com/schedule" rel="bookmark" title="SCHEDULE">
						<div class="img-wrapper">
							<h2>CREATE AND SHARE YOUR CUSTOM SCHEDULE</h2>
						</div>
					</a>
				</div>
			</div>
			<div class="span4">
				<div class="subfeature pad-me">
					<a href="http://dbfestival.com/db2014/visitor-info" rel="bookmark" title="CONFERENCE">
						<div class="img-wrapper">
							<h2>VISITOR INFO</h2>
						</div>
					</a>
				</div>
			</div>
			<div class="span4">
				<div class="subfeature pad-me">
					<a href="http://dbfestival.com/mixes" rel="bookmark" title="MIXES">
						<div class="img-wrapper">
							<h2>LISTEN TO EXCLUSIVE MIXES</h2>
						</div>
					</a>
				</div>
			</div>
			<div class="span4">
				<div class="subfeature pad-me">
					<a href="http://dbfestival.com/work" rel="bookmark" title="VOLUNTEER">
						<div class="img-wrapper">
							<h2>GET INVOLVED WITH US</h2>
						</div>
					</a>
				</div>
			</div>
		</div> -->

		<div class="row home-subfeatures content-margin">
			<div class="span5">
				<h1>News  <span style="font-size: 11px;"> <a href="http://dbfestival.com/news">[ View All ]</a></span></h1>
			</div>
			<div class="span7 heading-spacer"></div>
		</div>

		<div class="row">

			<?php 
			$args = array(
				'category_name' => 'news',
				'showposts' => 6,
				'order' => 'DESC'
				);

				query_posts( $args );

				$post_counter = 0;

				if (have_posts()) : while (have_posts()) : the_post();

				$post_counter++;
			?>

		<div class="span4">

		 	<div class="subfeature pad-me">

		 		<?php
		 			$plink = get_the_permalink();
		 			if ($post->ID == 4623) {
		 				$plink = 'http://bit.ly/dB2014Tix';
		 			} elseif (has_category( 'mix', $post )) {
		 				$plink = get_the_excerpt();
		 			}

		 			$imglink =  get_the_post_thumbnail($post->ID,array(370,233));
		 			if ($post->ID == 4603) {
		 				$imglink = '<img width="370" height="233" src="http://dbfestival.com/wp-content/uploads/2014/05/db-lineup-link.jpg" class="attachment-span4 wp-post-image">';
		 			} elseif ($post->ID == 4837) {
		 				$imglink = '<img width="370" height="233" src="http://dbfestival.com/wp-content/uploads/2014/07/db2014-second-lineup-announce.jpg" class="attachment-span4 wp-post-image">';
		 			}


		 		?>
	 			
	 			<a href="<?php echo $plink; ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		    		
		    		<div class="img-wrapper"><?php echo $imglink; ?></div>
		    		
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
			<div class="span5">
				<h1>Exclusive Mixes  <span style="font-size: 11px;"> <a href="http://dbfestival.com/mixes">[ View All ]</a></span></h1>
			</div>
			<div class="span7 heading-spacer"></div>
		</div>

		<div class="row">

			<?php 
			$args = array(
				'cat' => '293,294',
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

		 		<?php
		 			$plink = get_the_permalink();

		 			$imglink =  get_the_post_thumbnail($post->ID,array(370,233));	
		 		?>
	 			
	 			<a href="<?php echo $plink; ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		    		
		    		<div class="img-wrapper"><?php echo $imglink; ?></div>
		    		
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


		<!-- <div class="row home-subfeatures content-margin">
			<div class="span5">
				<h1 class="cleaner-content-heading">2013 Festival Recap</h1>
			</div>
			<div class="span7 heading-spacer"></div>
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
		    		
		    		<div class="img-wrapper"><?php the_post_thumbnail( 'span4' ); ?></div>
		    		
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

		</div> --><!--row-->

		<!-- SOCIAL -->
		
		<div class="social-feeds">
			<div class="row content-margin">
				<div class="span5">
					<h1>SOCIAL</h1>
				</div>
				<div class="span7 heading-spacer"></div>
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
					<div class="subfeature db-tweets"><a class="twitter-timeline" href="https://twitter.com/dBFestival" data-widget-id="358470775923150848">Tweets by @dBFestival</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>

				</div>

			</div>
		</div>

			
<?php	get_footer( ); ?>