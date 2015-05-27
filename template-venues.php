<?php
/**
 * Template Name: Venues
 * @package WordPress
 * @subpackage Decibel Festival
 */
get_header(); ?>

<div class="pagewrap container">

	<div class="row content-margin">
		<div class="span12">
			<h1 class="page-title">2015 Decibel Festival Venues</h1>
		</div>
	</div>


	<div class="row content-margin" id="venue">
		<div class="span12">
			<div class="row">

	<?php
		$args = array(
            'post_type'=> 'venue',
			'postsperpage' => -1,
			'order' => 'ASC'
        );
        query_posts( $args );

        $venue_counter = 0;

	    if (have_posts()) : while (have_posts()) : the_post(); 

	    $venue_counter++;


		$venue_fields = array('_venue_url','_venue_address','_venue_phone','_veune_gmap');

		$venue_data = array();

		foreach($venue_fields as $venue_field) {
			$venue_data[$venue_field] = get_post_meta ($post->ID, $venue_field, true);
		}
    ?>

				<div class="span4">
					<div class="subfeature pad-me">
						<a href="<?php echo $venue_data['_venue_url']; ?>" target="_blank" class="content-margin">
							<?php the_post_thumbnail( 'span4' ); ?>
						</a>
						<h3><?php the_title(); ?></h3>
						<p class="venue-address"><?php echo $venue_data['_venue_address']; ?></p>
						<p class="venue-desc"><?php echo get_the_content(); ?></p>
					</div>
				</div>

				<?php 
					if ( $venue_counter % 3 == 0 ) { ?>
					</div><div class="row">
				<?php } ?>
			
			<?php endwhile; endif; ?>

			</div><!--close row-->
			
		</div><!--close span12-->
	</div><!--close row-->

<?php get_footer(); ?>