<?php
/**
 *
 * Single Post Template: Single Mix
 * @package WordPress
 * @subpackage dBx
 */
get_header(); ?>

<div class="pagewrap container">
	<div class="row content-margin">		
		<div class="span12">
			<div class="page_content">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-content">
							<?php echo do_shortcode('[soundcloud]' . get_the_excerpt() . '[/soundcloud]'); ?> 

						    <?php ?>
						</div><!-- .entry-content -->
					</div><!-- #post-## -->
				<?php endwhile; // end of the loop. ?>
			</div>	
		</div>
	</div>
</div>
	
<?php	get_footer(); ?>