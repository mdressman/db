<?php
/**
 *
 * @package WordPress
 * @subpackage dBx
 */
get_header(); ?>

	<div class="pagewrap container">
		<div class="row">		

			<div class="span12 main-content">


			

				<div class="page_content content-margin">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('feature-story'); ?>>
				
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<!-- <?php the_post_thumbnail( 'full' ); ?> -->
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
					</div><!-- #post-## -->
				<?php endwhile; // end of the loop. ?>
				<?php
					if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Share Sidebar') ) : else :
					endif;
				?>
				</div>	
			
			</div>
		</div>

		<div class="row feature-footer">
		
			<div class="span4">
						
				<h1 class="sidebar-title">Share</h1>
				<br/>

				<div class="span1">
					<a class="sidebar-button" href="http://twitter.com/share?text=So excited for <?php the_title(); ?> %40dBFestival <?php echo get_permalink(); ?>" target="_blank" title="Share on Twitter" alt="Share on Twitter">
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

				<div class="span1">
					<a class="sidebar-button" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>" target="_blank" title="Share on LinkedIn" alt="Share on LinkedIn">
						<h1><img src="http://dbfestival.com/wp-content/themes/md_dBx/images/share_linkedin.png" /></h1></a>
				</div>

						
						
			</div>

			<div class="span4">
				<?php
					if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Feature 1 Sidebar') ) : else :
					endif;
				?>
			</div>

			<div class="span4">
				<?php
					if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Feature 2 Sidebar') ) : else :
					endif;
				?>
			</div>
		

			
		</div>
	</div>
	
		
	
<?php	get_footer(); ?>