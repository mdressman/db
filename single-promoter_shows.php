<?php get_header(); ?>
			
			<div id="content">

				<div id="inner-content" class="wrap clearfix">
			
					<div id="main" class="ninecol first clearfix" role="main">

						<?php if (have_posts()) : ?>
							<?php while (have_posts()) : ?>
								<?php the_post() ?>
					
									<?php 
											
										$show_fields = array('show_date','tickets_link','tickets_info','tickets_on_sale','venue_name','venue_link','venue_address','venue_info','event_name','facebook_link');
										
										$artist_fields = array();

										for ( $i = 1; $i <= 4; $i++ ) {
											$artist_fields[] = 'artist_' . $i . '_name';
											$artist_fields[] = 'artist_' . $i . '_size';
											$artist_fields[] = 'artist_' . $i . '_affiliations';
											$artist_fields[] = 'artist_' . $i . '_website';
											$artist_fields[] = 'artist_' . $i . '_facebook';
											$artist_fields[] = 'artist_' . $i . '_soundcloud';
											$artist_fields[] = 'artist_' . $i . '_twitter';
											$artist_fields[] = 'artist_' . $i . '_instagram';
											$artist_fields[] = 'artist_' . $i . '_bio';
											$artist_fields[] = 'artist_' . $i . '_image';
											$artist_fields[] = 'artist_' . $i . '_embed_soundcloud';
											$artist_fields[] = 'artist_' . $i . '_embed_youtube';
											$artist_fields[] = 'artist_' . $i . '_embed_vimeo';
										}

										$show_data = array();
										$artist_data = array();

										foreach($show_fields as $show_field) {
											$show_data[$show_field] = get_post_meta ($post->ID, '_show_'.$show_field, true);
											// echo '<p>' . $show_data[$show_field] . '</p>';
										}

										foreach($artist_fields as $artist_field) {
											$artist_data[$artist_field] = get_post_meta ($post->ID, '_artist_'.$artist_field, true);
											// echo '<p>' . $artist_data[$artist_field] . '</p>';
										}
									?>

									<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								
										<header class="article-header individual-show">
									
											<!-- <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1> -->
		                  
											<div class="sixcol first show-poster">
												<?php the_post_thumbnail('show-poster-medium') ?>
												
											</div>

											<div class="sixcol first">
												<div class="individual-show-details">
													
													<?php if ($show_data['event_name']) { ?> 
														<p class="individual-event-name"><?php echo $show_data['event_name'] ?></p>
													<?php } ?>


													<?php for ( $i = 1; $i <= 4; $i++ ) { ?>

														<?php if ($artist_data['artist_' . $i . '_name']) { ?>
															<p class="artist-size-<?php echo $artist_data['artist_' . $i . '_size'] ?>"><?php echo $artist_data['artist_' . $i . '_name'] ?>
																<?php if ($artist_data['artist_' . $i . '_affiliations']) { ?>
																	<span class="artist-affiliations">(<?php echo $artist_data['artist_' . $i . '_affiliations'] ?>)</span>
																<?php } ?>
															</p>
														<?php } ?>
													<?php } ?>


													<p class="show-date"><?php echo date("l, F j Y", $show_data['show_date']) ?></p>
												

													<p class="venue-name"><a href="<?php echo $show_data['venue_link'] ?>" target="_blank"><?php echo $show_data['venue_name'] ?></a></p>
													<p class="venue-address"><?php echo $show_data['venue_address'] ?></p>
												
													<div class="buy-tickets">
														<p class="tickets-info"><?php echo $show_data['tickets_info'] ?><br/><?php echo $show_data['venue_info'] ?></p>
														<?php $now = time(); ?>
														<?php $on_sale = $show_data['tickets_on_sale']; ?>
														<?php if ($on_sale > $now) { ?>
															<p class="future-on-sale">ON SALE<br/><?php echo date("M j", $show_data['tickets_on_sale']) ?></p>
														<?php } else { ?>
															<a href="<?php echo $show_data['tickets_link'];?>" alt="Buy Tickets" title="Buy Tickets" target="_blank" class="show-link buy-tickets">TICKETS</a>
														<?php } ?>

													</div>

													<div class="clearfix"></div>

													<?php if ($show_data['facebook_link']) { ?>
														<a class="show-link facebook-rsvp" href="<?php echo $show_data['facebook_link'] ?>" target="_blank">RSVP on Facebook</a>
													<?php } ?>
												</div>
											</div>
												
										
											<div class="clearfix"></div>
								
										</header> <!-- end article header -->
							
										<section class="entry-content clearfix" itemprop="articleBody">
										
											<?php for ( $i = 1; $i <= 4; $i++ ) { ?>

												<?php if ($artist_data['artist_' . $i . '_name']) { ?>
													
													<div class="artist-details">

														<p class="artist-size-<?php echo $artist_data['artist_' . $i . '_size'] ?>">
															<?php echo $artist_data['artist_' . $i . '_name'] ?> 
															<?php if ( $artist_data['artist_' . $i . '_affiliations']) { ?>
																<span class="artist-affiliations">(<?php echo $artist_data['artist_' . $i . '_affiliations'] ?>)</span>
															<?php } ?>
															</p>
														
														<?php if ( $artist_data['artist_' . $i . '_image']) { ?>
															<img src="<?php echo $artist_data['artist_' . $i . '_image'] ?>" class="alignleft" />
														<?php } ?>

														<?php if ( $artist_data['artist_' . $i . '_bio']) { ?>
															<p class="artist-bio"><?php echo $artist_data['artist_' . $i . '_bio'] ?></p>
														<?php } ?>

														<?php if ( $artist_data['artist_' . $i . '_website']) { ?>
															<a id="artist-website" href="<?php echo $artist_data['artist_' . $i . '_website'] ?>" target="_blank">WEBSITE</a>
														<?php } ?>

														<?php if ( $artist_data['artist_' . $i . '_facebook']) { ?>
															<a id="artist-facebook" href="<?php echo $artist_data['artist_' . $i . '_facebook'] ?>" target="_blank">FACEBOOK</a>
														<?php } ?>

														<?php if ( $artist_data['artist_' . $i . '_soundcloud']) { ?>
															<a id="artist-soundcloud" href="<?php echo $artist_data['artist_' . $i . '_soundcloud'] ?>" target="_blank">SOUNDCLOUD</a>
														<?php } ?>

														<?php if ( $artist_data['artist_' . $i . '_twitter']) { ?>
															<a id="artist-twitter" href="<?php echo $artist_data['artist_' . $i . '_twitter'] ?>" target="_blank">TWITTER</a>
														<?php } ?>

														<?php if ( $artist_data['artist_' . $i . '_instagram']) { ?>
															<a id="artist-instagram" href="<?php echo $artist_data['artist_' . $i . '_instagram'] ?>" target="_blank">INSTAGRAM</a>
														<?php } ?>

														<div class="clearfix"></div>
														
														<?php if ( $artist_data['artist_' . $i . '_embed_soundcloud']) { ?>
															<div class="sixcol first soundcloud-embed">
																<p class="media-title">LISTEN</p>
																<?php echo do_shortcode('[soundcloud]' . $artist_data['artist_' . $i . '_embed_soundcloud'] . '[/soundcloud]'); ?>
															</div>
														<?php } ?>
														
														<?php if ( $artist_data['artist_' . $i . '_embed_youtube']) { 
															$explode = explode('=', $artist_data['artist_' . $i . '_embed_youtube']);
															$youtube_embed = $explode[1]; ?>
															<div class="sixcol first">
																<p class="media-title">WATCH</p>
																<iframe class="youtube-embed" width="412" height="232" src="<?php echo 'http://www.youtube.com/embed/' . $youtube_embed ?>" frameborder="0" allowfullscreen></iframe>
															</div>
														<?php } ?>

														<div class="clearfix"></div>
													</div>
												<?php } ?>
												
											<?php } ?>
												
											

										</section> <!-- end article section -->
								
										
							
									</article> <!-- end article -->
					
							<?php endwhile ?>
					
						
						<?php endif ?>
			
					</div> <!-- end #main -->
    
					<?php get_sidebar(); ?>

				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>