<?php
/**
 *
 * Single Post Template: Single Mix
 * @package WordPress
 * @subpackage Decibel Festival
 */
get_header(); ?>

<div class="pagewrap container">
	<div class="row content-margin">
		<div class="span12">
			<div class="page_content">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php
							if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Share Sidebar') ) : else :
							endif;
						?>

						<div class="entry-content">
							<?php 
								if (get_post_meta( $post->ID, 'exclusive_mix', true )) {
									echo '<a href="'.get_the_excerpt().'" target="_blank">';
									the_post_thumbnail( 'full' );
						    		the_content();
						    		echo '</a>';
								} else {
									echo do_shortcode('[soundcloud]' . get_the_excerpt() . '[/soundcloud]');
								}
								
							?>

						</div><!-- .entry-content -->
					</div><!-- #post-## -->
				<?php endwhile; // end of the loop. ?>
			</div>	
		</div>
	</div>
</div>
	
<?php	get_footer(); ?>