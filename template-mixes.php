<?php 	
/**
 * Template Name: Mixes
 * @package WordPress
 * @subpackage Decibel Festival
 */

get_header(); ?>
			
	<div class="pagewrap container">
		<div class="row">		
			<div class="span8">
				<div class="page_content content-margin">

			    	<h1 class="top-title">Mixes & Live Series</h1>

					<?php 
				        query_posts( 'cat=293,294' );
				    ?>

				    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					
					    <header class="article-header post-details">
						
					    	<span class="post-date"><?php echo the_date( $d = '', $before = '', $after = '', $echo = true ); ?></span>
					    	<a href="<?php get_the_excerpt() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						    	<h2><?php the_title(); ?></h2>
					    	</a>
              
					    </header> <!-- end article header -->
				
					    <section class="entry-content clearfix">
						    
						    <?php 
						    	if (in_category('mix')) {
						    		echo do_shortcode('[soundcloud]' . get_the_excerpt() . '[/soundcloud]'); 
						    	} else {
						    		the_content();
						    	}
						    ?> 

						    <?php
							if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Share Sidebar') ) : else :
							endif;
							?>
					    </section> <!-- end article section -->
					
					    <footer class="article-footer">
							<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?></p>
					    </footer> <!-- end article footer -->
					    
					    <?php // comments_template(); // uncomment if you want to use them ?>
				
				    </article> <!-- end article -->

				    <?php endwhile; ?>	
				       
				    <?php endif; ?>
			
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

				    
				</div> <!-- end row -->
    
			</div> <!-- end container -->

<?php get_footer(); ?>
