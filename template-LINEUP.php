<?php
/**
 * Template Name: Lineup
 * @package WordPress
 * @subpackage dBx
 */
get_header(); ?>

<div class="pagewrap container">

	<div class="row content-margin">
		<div class="span6">
			<!-- <div class="title-graphic"></div>
			<div class="title-ribbon"></div> -->
			<h1 class="page-title">Decibel Festival Lineup</h1>
		</div>
	</div>

	
	<div class="row content-margin">
		<div class="span6">
			<div id="filters">
				<p>
					<span class="filter-label">Filter: </span>  
					<a href="#" data-filter=".DJ">DJ</a> 
					<span class="filter-label">/</span> 
					<a href="#" data-filter=".Live">Live</a>
					<span class="filter-label">/</span> 
					<a href="#" data-filter=".Visual">Visual</a>
					<span class="filter-label">/</span> 
					<a href="#" data-filter="*" class="selected">All Artists</a> 
				</p>
		  	</div>
		</div>
	</div>

	<div class="row" id="partner">
		
		<div class="span12">

			<div id="isotope-container">
					<?php
						$args = array(
				            'post_type'=> 'artist',
							'postsperpage' => -1,
							'order' => 'ASC'
				        );
				        query_posts( $args );
				        $artist_counter = 0;
					    if (have_posts()) : while (have_posts()) : the_post(); 
					    $artist_counter++;
				    ?>
		
				<div class="span3 <?php echo get_post_meta ($post->ID, '_artist_type', true); ?>">
					<div class="subfeature">
						<a href="<?php the_permalink(); ?>" class="content-margin">
							<?php the_post_thumbnail('span3'); ?>
						
							<h3 style="width:97%;"><?php the_title(); ?></h3>
						</a>
					</div>
				</div>

					<?php endwhile; endif; ?>

			</div>
			
		</div>
	</div>


</div>	
<?php get_footer(); ?>