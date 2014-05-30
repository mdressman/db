<?php
/**
 *
 * Single Post Template: No Image
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

						<div class="entry-content">
							<?php the_content(); ?>

							<div class="row">
								<div class="span6">
									<span class="db-label">Share:</span>
									<div class="row">
										<div class="span2">
											<a class="sidebar-button" href="http://twitter.com/share?text=So excited for <?php the_title(); ?> %40dBFestival <?php echo get_permalink(); ?>" target="_blank" title="Share on Twitter" alt="Share on Twitter">
												<h1><img src="http://dbfestival.com/wp-content/themes/md_dBx/images/share_twitter.png" /></h1></a>
										</div>

										<div class="span2">
											<a class="sidebar-button" href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank" title="Share on Facebook" alt="Share on Facebook">
												<h1><img src="http://dbfestival.com/wp-content/themes/md_dBx/images/share_facebook.png" /></h1></a>
										</div>

										<div class="span2">
											<a class="sidebar-button" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" target="_blank" title="Share on Google+" alt="Share on Google+">
												<h1><img src="http://dbfestival.com/wp-content/themes/md_dBx/images/share_gplus.png" /></h1></a>
										</div>


									</div>
								</div>
							</div>

							<?php  // comments_template( '', true ); ?>

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
						

						<div class="blogwidget">
							<h1 class="sidebar-title">Upcoming Events</h1>
								<ul>
							    <?php 
				
									$now = time();
				                    $args = array(
				                        'post_type'=> 'event',
										'meta_key' => '_event_date',
										'meta_value' => $now - (36 * 60 * 60), 
				                        'meta_compare' => '>',
				                        'orderby' => 'meta_value',
				                        'order'    => 'ASC',
										'postsperpage' => -1
				                    );
				                    query_posts( $args );

								    if (have_posts()) : while (have_posts()) : the_post(); 

								    $event_fields = array('_event_date', '_event_tickets_link','_event_facebook_link');

									$event_data = array();

									foreach($event_fields as $event_field) {
										$event_data[$event_field] = get_post_meta ($post->ID, $event_field, true);
									}

								?>

							
								<li>

									<a href="<?php the_permalink(); ?>">
										<span class="post-date"><?php echo date("m.d.Y", $event_data['_event_date']) ?></span>
										<?php the_title(); ?>
									</a>
								</li>

								<?php endwhile; endif; ?>
							</ul>
						</div>

					</div>
				</div>

				

				

			</div>
		</div>
	</div>
	
		
	
<?php	get_footer(); ?>