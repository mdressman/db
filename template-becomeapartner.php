<?php
/**
 *
 * Template Name: Become A Partner
 * @package WordPress
 * @subpackage dBx
 */
get_header(); ?>

	<div class="pagewrap container">
		<div class="row">		
			<div class="span6 main-content">
				<div class="page_content content-margin">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php // the_post_thumbnail( 'full' ); ?>
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
					</div><!-- #post-## -->
				<?php endwhile; // end of the loop. ?>
				</div>	
			</div>
			<div class="span6 content-margin event-sidebar">

				<div class="row">
					<div class="span6">
						<h1>VIEW THE DECK</h1>
						<?php
							if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Partner With Us') ) : else :
							endif;
						?>
					</div>
				</div>

				<div class="row">
					<div class="span6">
						<a href="http://dbfestival.com/assets/dBx_Partnership_Deck.pdf" target="_blank">
							<h1>DOWNLOAD THE DECK</h1>
							<!-- <img src="http://mdressman.com/clients/db/wp-content/themes/md_dBx/images/db2013-welcome-short.jpg" /> -->
						</a>
						
					</div>
				</div>

				
			</div>
		</div>
	
		
	
<?php	get_footer(); ?>