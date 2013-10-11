<?php
/**
 *
 * @package WordPress
 * @subpackage dBx
 */
get_header(); ?>

	<div class="pagewrap container">
		<div class="row">		
			<div class="span8">
				<div class="page_content content-margin">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
						<h1 class="entry-title">EVENTNESS <?php the_title(); ?></h1>
						<?php the_post_thumbnail( 'full' ); ?>
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
					</div><!-- #post-## -->
				<?php endwhile; // end of the loop. ?>
				</div>	
			</div>
			<div class="span4">
				<div class="single-sidebar">
				<?php
					if ( function_exists('dynamic_sidebar') && dynamic_sidebar('One-off Events') ) : else :
					endif;
				?>
				</div>
			</div>
		</div>
	</div>
	
		
	
<?php	get_footer(); ?>