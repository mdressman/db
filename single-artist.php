<?php
/**
 *
 * @package WordPress
 * @subpackage dBx
 */
get_header(); ?>
			
	<div class="pagewrap container">
		<div class="row">		
			<div class="span6 main-content artist">
				<div class="page_content content-margin">
			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    <?php 
							
					$artist_fields = array('_artist_affiliations', '_artist_location','_artist_website','_artist_facebook','_artist_twitter',
										   '_artist_instagram','_artist_soundcloud','_artist_youtube','_artist_youtube_embed',
										   '_artist_vimeo_embed','_artist_soundcloud_embed','_artist_type','_artist_rbma_embed');

					$artist_data = array();

					foreach($artist_fields as $artist_field) {
						$artist_data[$artist_field] = get_post_meta ($post->ID, $artist_field, true);
					}

					$artist_news_fields = array();
					for ( $i = 1; $i <= 5; $i++ ) {
						$artist_news_fields[] = '_artist_news_url_' . $i;
						$artist_news_fields[] = '_artist_news_text_' . $i;
					}

					$artist_news_data = array();

					foreach($artist_news_fields as $artist_news_field) {
						$artist_news_data[$artist_news_field] = get_post_meta ($post->ID, $artist_news_field, true);
					}

					$artist_twitter = $artist_data['_artist_twitter'];
					
					$artist_twitter_pieces = explode('/', $artist_twitter);
					
					$artist_twitter = $artist_twitter_pieces[3];

				?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
						<h1 class="entry-title artist-title">
							<?php the_title(); ?>
							
							<!-- <span class="artist-location">(<?php echo $artist_data['_artist_location']; ?>)</span> -->
							
							<?php if ($artist_data['_artist_type']) { ?>
								<h2 class="db-block-label">
									( <?php if ($artist_data['_artist_affiliations']) { ?> 
									<?php echo $artist_data['_artist_affiliations']; ?> / 
									<?php } ?>

									<?php echo $artist_data['_artist_location']; ?> )
									<span style="float:right; margin-right: 10px; color: #cc3333; font-style: italic;"><?php echo $artist_data['_artist_type']; ?></span>
								</h2>
							<?php } ?>
	
						</h1>

						<!-- <h2 class='program showcase'><?php echo $artist_data['_artist_affiliations']; ?></h2>; -->
						<!-- <h2 class='program showcase'><?php echo $artist_data['_artist_location']; ?></h2> -->
						
						<?php the_post_thumbnail( 'full' ); ?>


						<div class="entry-content">

							<?php 

								$connections = array('artists_to_showcases','artists_to_afterhours','artists_to_optical','artists_to_boatparty');
								foreach ($connections as $connection) {

									$connected_showcases = new WP_Query( 
															array(
																'connected_type' => $connection,
																'connected_items' => get_queried_object(),
																'nopaging' => true,
															) 
														);
									if ( $connected_showcases->have_posts() ) :
										while ( $connected_showcases->have_posts() ) : $connected_showcases->the_post();

									$event_type = get_post_type();
									$event_type_obj = get_post_type_object( $event_type );
									$event_type_name = $event_type_obj->labels->singular_name;

							?>

							<h1 class="content-heading artist-performing">Performing</h1>
							<h2 class="artist-showcase">
								<a href="<?php echo the_permalink(); ?>">
									<?php the_title(); ?> 
									<?php if ($event_type_name != 'Optical') {
										echo $event_type_name; 	
									} ?>
								</a>
								<a href="<?php echo get_post_meta ($post->ID, '_' . $event_type . '_tickets_link', true); ?>" target="_blank" alt="BUY TICKETS" title="BUY TICKETS">
									<img src="http://dbfestival.com/images/buy_tickets.png" style="border-bottom:none;" />
								</a>
							</h2>

							<?php 

								switch($connection) {
									case "artists_to_showcases":
										$event_type = "showcase";
										break;
									case "artists_to_afterhours":
										$event_type = "afterhours";
										break;
									case "artists_to_optical":
										$event_type = "optical";
										break;
									case "artists_to_boatparty":
										$event_type = "boatparty";
										break;

								}

								$showcase_date = get_post_meta ($post->ID, '_' . $event_type . '_date', true); 

								switch($showcase_date) {
									case "wednesday":
										$date_heading = "Wednesday, September 25 2013";
										break;
									case "thursday":
										$date_heading = "Thursday, September 26 2013";
										break;
									case "friday":
										$date_heading = "Friday, September 27 2013";
										break;
									case "saturday":
										$date_heading = "Saturday, September 28 2013";
										break;
									case "sunday":
										$date_heading = "Sunday, September 29 2013";
										break;	

								}
							?>
							<p class="showcase-settimes"><?php echo $date_heading; ?></p>


							<?php 
								endwhile; 
								wp_reset_postdata();
								endif;
							}
							?>

						
							<h1 class="content-heading">Bio</h1>
							<?php the_content(); ?>
							
							<!-- like button -->
							<?php
							
								if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Share Sidebar') ) : else :
								endif;
							?>


						
						</div>
					</div>

				<?php endwhile; endif; ?>
				</div>	
			</div>
			<div class="span6 content-margin sidebar main-content">
				<div class="row">
					<div class="span6">

						
						<div class="artist-widgets">

					<?php 
			 			
						
						if($artist_data['_artist_youtube_embed'] || $artist_data['_artist_vimeo_embed']) { 	

				 			echo '<div class="row">';
				 			echo '<div class="span4">';
				 			echo '<h1 class="content-heading">Watch</h1>';
				 			echo '</div>';
				 			echo '</div>';
				 			
				 			if($artist_data['_artist_youtube_embed']){ 				
				                echo '<iframe width="554" height="437" src="http://www.youtube.com/embed/'.$artist_data['_artist_youtube_embed'].'" frameborder="0" allowfullscreen></iframe>';				
				            }elseif($artist_data['_artist_vimeo_embed']){ 				
				                echo '<iframe width="554" height="311" src="http://player.vimeo.com/video/'.$artist_data['_artist_vimeo_embed'].'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';				
				            }
				        }

						if($artist_data['_artist_soundcloud_embed'] || $artist_data['_artist_rbma_embed']){

						echo '<div class="row">';
			 			echo '<div class="span4">';
			 			echo '<h1 class="content-heading">Listen</h1>';
			 			echo '</div>';
			 			echo '</div>';
			            
			                if($artist_data['_artist_rbma_embed']) {
			                	echo '<iframe width=100% height=100 scrolling=no src=' . $artist_data['_artist_rbma_embed'] . ' frameborder=0 >iframe not supported!</iframe>';
			                } else {
			                	echo do_shortcode('[soundcloud]' . $artist_data['_artist_soundcloud_embed'] . '[/soundcloud]');
			            	}
			            }

						echo '<div class="row">';
			 			echo '<div class="span4">';
			 			echo '<h1 class="content-heading">Connect</h1>';
			 			echo '</div>';
			 			echo '</div>';
						echo '<div id="artist_links">';
						if($artist_data['_artist_website']){
							echo '<a title="Artist Website" alt="Artist Website" href="' . $artist_data['_artist_website'] . '" target="www"><div class="www">website</div></a>';
						}
						
						if($artist_data['_artist_facebook']){
							echo '<a title="Artist Facebook" alt="Artist Facebook" href="' . $artist_data['_artist_facebook'] . '" target="fb"><div class="fb">facebook</div></a>';
						}
						
						if($artist_data['_artist_twitter']){
							echo '<a title="Artist Twitter" alt="Artist Twitter" href="' . $artist_data['_artist_twitter'] . '" target="tw"><div class="tw">twitter</div></a>';
						}

						if($artist_data['_artist_instagram']){
							echo '<a title="Artist Instagram" alt="Artist Instagram" href="' . $artist_data['_artist_instagram'] . '" target="ig"><div class="ig">instagram</div></a>';
						}
						
						if($artist_data['_artist_soundcloud']){
							echo '<a title="Artist Soundcloud" alt="Artist Soundcloud" href="' . $artist_data['_artist_soundcloud'] . '" target="sc"><div class="sc">soundcloud</div></a>';
						}

						if($artist_data['_artist_youtube']){
							echo '<a title="Artist YouTube" alt="Artist YouTube" href="' . $artist_data['_artist_youtube'] . '" target="yt"><div class="yt">youtube</div></a>';
						}	

						echo '<div class="clearfix"></div></div>';

						if($artist_news_data['_artist_news_url_1']) {

						echo '<div class="row">';
			 			echo '<div class="span4">';
			 			echo '<h1 class="content-heading">Read More</h1>';
			 			echo '</div>';
			 			echo '</div>';
						echo '<div id="artist_news_links">';
						
						echo '<ul>';
						
							echo '<li><a title="' . $artist_news_data['_artist_news_text_1'] . '" alt="' . $artist_news_data['_artist_news_text_1'] . '" href="' . $artist_news_data['_artist_news_url_1'] . '" target="_blank">' . $artist_news_data['_artist_news_text_1'] . '</a></li>';
						}

						if($artist_news_data['_artist_news_url_2']){
							echo '<li><a title="' . $artist_news_data['_artist_news_text_2'] . '" alt="' . $artist_news_data['_artist_news_text_2'] . '" href="' . $artist_news_data['_artist_news_url_2'] . '" target="_blank">' . $artist_news_data['_artist_news_text_2'] . '</a></li>';
						}

						if($artist_news_data['_artist_news_url_3']){
							echo '<li><a title="' . $artist_news_data['_artist_news_text_3'] . '" alt="' . $artist_news_data['_artist_news_text_3'] . '" href="' . $artist_news_data['_artist_news_url_3'] . '" target="_blank">' . $artist_news_data['_artist_news_text_3'] . '</a></li>';
						}

						if($artist_news_data['_artist_news_url_4']){
							echo '<li><a title="' . $artist_news_data['_artist_news_text_4'] . '" alt="' . $artist_news_data['_artist_news_text_4'] . '" href="' . $artist_news_data['_artist_news_url_4'] . '" target="_blank">' . $artist_news_data['_artist_news_text_4'] . '</a></li>';
						}

						if($artist_news_data['_artist_news_url_5']){
							echo '<li><a title="' . $artist_news_data['_artist_news_text_5'] . '" alt="' . $artist_news_data['_artist_news_text_5'] . '" href="' . $artist_news_data['_artist_news_url_5'] . '" target="_blank">' . $artist_news_data['_artist_news_text_5'] . '</a></li>';
						}

						if($artist_news_data['_artist_news_url_1']) {
						echo '</ul>';
						echo '</div>';
						}	

						?>
						<div class="clearfix"></div>

						<div class="row">
							<div class="span4">
								<h1 class="content-heading">Share</h1>
							</div>
						</div>
						<div class="row">
							<div class="span2">
								<a class="sidebar-button" href="http://twitter.com/share?text=So excited for <?php the_title(); ?> %40<?php echo $artist_twitter; ?> at the 10th annual %40dBFestival! <?php echo the_permalink(); ?>	" target="_blank" title="Share on Twitter" alt="Share on Twitter">
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
						
						<div class="row">
							<div class="span4">
								<h1 class="content-heading">Other Artists</h1>
							</div>
						</div>

						<div class="row" id="artist-select">

							
							
							<div class="span4">
								<select>
									<option value="-1">CHOOSE AN ARTIST</option>
									<?php
										$args = array(
					                        'post_type'=> 'artist',
											'postsperpage' => -1
					                    );
					                    query_posts( $args );

									    if (have_posts()) : while (have_posts()) : the_post(); 
								    ?>
									<option value="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></option>
									<?php
										endwhile; endif; 
									?>
								</select>
							</div>

							<?php
								$next_post_link_url = get_permalink( get_adjacent_post(false,'',false)->ID ); 
								$prev_post_link_url = get_permalink( get_adjacent_post(false,'',true)->ID );
							?>
							<div class="span1">
								<a class="sidebar-button" href="<?php echo $prev_post_link_url; ?>"><h1>PREV</h1></a>
							</div>

							<div class="span1">
								<a class="sidebar-button" href="<?php echo $next_post_link_url; ?>"><h1>NEXT</h1></a>
							</div> 

						</div>


					
					</div>

					

					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>