<?php
/**
 *
 * Template Name: Festival
 * @package WordPress
 * @subpackage dBx
 */

get_header(); ?>
	
	<div class="container">

		<div class="row content-margin">
			<div class="span8 offset2">
				<h1 id="festival-welcome-text">September 25 - 29, 2013 / Seattle, WA</h1>
				<h2 id="festival-welcome-dates">Celebrating 10 years of electronic music performance & visual art<h2>
			</div>
		</div>
	

		<!-- SLIDER -->
	
		<div class="row content-margin">
			<div class="span12">
	        	
				<!-- <a href="http://dbfestival.com/dbx/lineup"><img src="http://dbfestival.com/wp-content/uploads/2013/07/dBx_sliders_July_8.jpg" /></a> -->
				<iframe width="100%" height="400px" src="//www.youtube.com/embed/Ko5ftCzZfz0" frameborder="0" allowfullscreen></iframe>
		        
			</div><!--span12-->	
		</div><!--row-->	

		<!-- END SLIDER -->


		<div class="row content-margin" id="home-subfeatures">
			<!-- <div class="span6"> -->
				<!-- <div class="title-graphic"></div> -->
				<!-- <h1>Festival Features</h1> -->
			<!-- </div>
		</div>


		<div class="row"> -->

			<div class="span4">
			 	<div class="subfeature pad-me">
			 		<div id="rbma-holder">
			 			<iframe width=100% height=223 scrolling=no src=http://www.rbmaradio.com/embed/lists/28 frameborder=0 >iframe not supported!</iframe>
			 		</div>
			 	</div>
			 </div>


			<?php 
				$args = array(
					'post_type' => 'page',
					'post__in' => array(910, 439, 120, 46, 94),
					'showposts' => 5
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
				if ($post_counter == 2 ) {
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
			

<?php	get_footer(); ?>