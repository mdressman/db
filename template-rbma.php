<?php 	
/**
 * Template Name: RBMA
 * @package WordPress
 * @subpackage dBx
 */

get_header(); ?>
			
	<div class="pagewrap container">
		<div class="row">		
			<div class="span8">
				<div class="page_content content-margin">
			
			    	<!-- <div class="title-graphic"></div> -->
			    	<img src="<?php bloginfo( 'template_url' ); ?>/images/RBMA_dBFestival_Logo.jpg" />
			    	<p>We are proud to once again partner with Red Bull Music Academy for the 10th annual edition of Decibel Festival. Ever since Seattle hosted the Red Bull Music Academy in 2005, Decibel and RBMA have been forging a creative partnership that has spawned some of Decibel's brightest moments, including the US debut of Amon Tobin ISAM Live, Erykah Badu DJ set, Flying Lotus live with band, Modeselektor feat. Pfadfinderei, Bonobo, Glitch Mob and the NW debut of Nina Kravitz.</p>

					<p>This year RBMA Radio will be catching some of the best moments from the festival which will be posted here and <a href="http://www.rbmaradio.com/lists/decibel" target="_blank">rbmaradio.com</a> for your listening pleasure. Stay tuned!</p>

					<?php 
				        query_posts( 'cat=289' );
				    ?>

				    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" style="margin-bottom:30px;">
					
					    <header class="article-header">
						
					    	
					    	
						    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">	
						    	<h2 style="margin: 10px 0 0 0; padding-left: 0; line-height:20px;"><?php the_title(); ?></h2>
						    	<span class="post-date"><?php echo the_date( $d = '', $before = '', $after = '', $echo = true ); ?></span>
					    	</a>
					    	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						    	<?php the_post_thumbnail( 'full' ); ?>
						    </a>
              
					    </header> <!-- end article header -->
				

					    <?php comments_template(); // uncomment if you want to use them ?>
				
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

		    
		</div> <!-- end row -->

	</div> <!-- end container -->

<?php get_footer(); ?>
