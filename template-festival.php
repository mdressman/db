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

<?php get_footer(); ?>