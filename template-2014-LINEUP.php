<?php
/**
 * Template Name: 2014 Lineup
 * @package WordPress
 * @subpackage dBx
 */
get_header(); ?>

<div class="pagewrap container">

	<div class="row content-margin">
		<div class="span12">
			<h1 class="page-title">2014 Festival Lineup <span class="h1-sub">[in alphabetical order]</span></h1>
		</div>
	</div>

	
	<div class="row content-margin">
		<div class="span12">
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
				            'cat' => 292,
							'postsperpage' => -1,
							'orderby' => 'title',
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