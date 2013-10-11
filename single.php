<?php
/**
 *
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
						
						<?php
							if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Share Sidebar') ) : else :
							endif;
						?>

						<?php
							echo "<h3>" . get_post_meta( $post->ID, 'feature_subhead', true ) . "</h3>";
						?>

						<?php 
							if ( $post->post_excerpt ) {
								echo $post->post_excerpt;
							}
						?>

						<?php
							if ( ! post_password_required() ) {
								the_post_thumbnail( 'full' ); 
							} 
						?>

						
						
						<div class="entry-content">
							<?php the_content(); ?>

							<?php comments_template( '', true ); ?>

							<?php if (get_post_meta( $post->ID, $key = 'author_info', true )) { ?>
								<span class="db-label">Written by <?php echo get_post_meta( $post->ID, 'author_info', true ); ?></span>
							<?php } ?>
						</div><!-- .entry-content -->
					
					</div><!-- #post-## -->
				<?php endwhile; // end of the loop. ?>
				</div>	
			
			</div>
			

			<div class="span4 content-margin event-sidebar">
				
				<div class="row">
					<div class="span4">
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


						</div>
						<br/>

						
						
					</div>
				</div>

				

			</div>
		</div>
	</div>
	
		
	
<?php	get_footer(); ?>