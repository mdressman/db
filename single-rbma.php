<?php
/**
 *
 * @package WordPress
 * @subpackage dBx
 *
 * Single Post Template: RBMA
 *
 */
get_header(); ?>

<div class="pagewrap container">
	<div class="row">		
		<div class="span8 offset2">
			<div class="page_content content-margin">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
						<!-- <div class="rbma-spotlight-logo"></div> -->
						<img src="<?php bloginfo( 'template_url' ); ?>/images/RBMA_dBFestival_Logo.jpg" />
						
						<div class="entry-content rbma-content">
							
							<h1><?php the_title(); ?></h1>
							<!-- <?php the_post_thumbnail( 'full' ); ?> -->
							<?php the_content(); ?>
							<div class="fb-like" data-send="true" data-width="450" data-show-faces="true"></div>
							<div class="row">

								<div class="span4">
									<h1 class="sidebar-title">Share</h1>
									<div class="row">
										<div class="span1">
											<a href="http://twitter.com/share?text=%40dBFestival x %40RBMA x <?php the_title(); ?> <?php echo get_permalink(); ?>" target="_blank" title="Share on Twitter" alt="Share on Twitter">
												<h1 style="background:black;"><img src="http://dbfestival.com/wp-content/themes/md_dBx/images/share_twitter.png" style="margin-top: -10px;
margin-left: 10px;" /></h1></a>
										</div>

										<div class="span1">
											<a class="sidebar-button" href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank" title="Share on Facebook" alt="Share on Facebook">
												<h1 style="background:black;"><img src="http://dbfestival.com/wp-content/themes/md_dBx/images/share_facebook.png" /></h1></a>
										</div>

										<div class="span1">
											<a class="sidebar-button" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" target="_blank" title="Share on Google+" alt="Share on Google+">
												<h1 style="background:black;"><img src="http://dbfestival.com/wp-content/themes/md_dBx/images/share_gplus.png" /></h1></a>
										</div>


									</div>
								</div>
								<div class="span4">
									<?php
										if ( function_exists('dynamic_sidebar') && dynamic_sidebar('RBMA1') ) : else :
										endif;
									?>
								</div>
							</div>
							<div class="row">
								<div class="span4">
									<?php
										if ( function_exists('dynamic_sidebar') && dynamic_sidebar('RBMA2') ) : else :
										endif;
									?>
								</div>
								<div class="span4">
									<?php
										if ( function_exists('dynamic_sidebar') && dynamic_sidebar('RBMA3') ) : else :
										endif;
									?>
								</div>
								
							</div>

							<?php // comments_template( '', true ); ?>

							
						</div><!-- .entry-content -->
					
					</div><!-- #post-## -->
				<?php endwhile; // end of the loop. ?>
			</div>	
		</div>
	</div>
</div>
	
		
	
<?php	get_footer(); ?>