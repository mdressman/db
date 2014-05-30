<?php
/**
 *
 * Template Name: Events
 * @package WordPress
 * @subpackage dBx
 */

get_header(); ?>
			
	<div class="pagewrap container">
		<div class="row">		
			<div class="span8 main-content">
				<div class="page_content content-margin">
			
			    	<h1 class="top-title">Decibel Presents</h1>

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

				    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					
					    <header class="article-header post-details">
						    
					    	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
					    		<h2><?php the_title(); ?></h2>
					    		<span class="event-date"><?php echo date("l, F j Y", $event_data['_event_date']) ?></span>
					    		<div class="img-wrapper"><?php the_post_thumbnail( 'span6' ); ?></div>
					    	</a>
              
					    </header>					
				
				    </article>

				    <?php endwhile; ?>	
				
				    <?php endif; ?>
		
			    </div> 
			</div>

			<div class="span4 content-margin event-sidebar">

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

				<div class="row">
					<div class="span4">
				
						<?php
							if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Blog') ) : else :
							endif;
						?>
					</div>
				</div>

				<div class="row">
					<div class="span1">
						<a class="sidebar-button" href="http://twitter.com/share?text=<?php the_title(); ?> %40dBFestival <?php echo get_permalink(); ?>" target="_blank" title="Share on Twitter" alt="Share on Twitter">
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

				
				
			</div>
		</div>
	</div>

				
			

<?php get_footer(); ?>