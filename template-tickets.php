<?php
/**
 * Template Name: Tickets
 * @package WordPress
 * @subpackage dBx
 */
get_header(); ?>

	<div class="pagewrap container">
		<div class="row">		

			<div class="span8 main-content">

				<div class="page_content content-margin">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
						<h1 class="entry-title"><?php the_title(); ?></h1>
						
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
					
					</div><!-- #post-## -->
				<?php endwhile; // end of the loop. ?>
				</div>	
			
			</div>
			

			<div class="span4 content-margin event-sidebar">
				
				<div class="row">
					<div class="span4">
						<a class="sidebar-button" href="http://dbfestival.strangertickets.com" target="_blank"><h1>BUY YOUR FESTIVAL PASS NOW</h1></a>
					</div>
				</div>

				<div class="row">
					<div class="span4 content-margin">
						<?php
							if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Blog') ) : else :
							endif;
						?>
					</div>
				</div>

				<div class="row">
					<div class="span4">
						<span class="db-label">Share:</span>
						<div class="row">
							<div class="span1">
								<a class="sidebar-button" href="http://twitter.com/share?text=So excited for %40dBFestival <?php echo get_permalink(); ?>" target="_blank" title="Share on Twitter" alt="Share on Twitter">
									<h1><img src="http://dbfestival.com/wp-content/themes/md_dBx/images/share_twitter.png" /></h1></a>
							</div>

							<div class="span1">
								<a class="sidebar-button" href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank" title="Share on Facebook" alt="Share on Facebook">
									<h1><img src="http://dbfestival.com/wp-content/themes/md_dBx/images/share_facebook.png" /></h1></a>
							</div>

							<div class="span1">
								<a class="sidebar-button" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" target="_blank" title="Share on Google+" alt="Share on Google+">
									<h1><img src="http://dbfestival.com/wp-content/themes/md_dBx/images/share_gplus.png" /></h1></a>
							</div>


						</div>
						<br/>

						
						
					</div>
				</div>

				

			</div>
		</div>
	</div>
	
		
	
<?php	get_footer(); ?>