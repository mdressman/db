<?php
/**
 * Template Name: Artists
 * @package WordPress
 * @subpackage dBx
 */
get_header(); ?>


<div class="pagewrap container">

	<div class="row content-margin">
		<div class="span6">
			<!-- <div class="title-graphic"></div>
			<div class="title-ribbon"></div> -->
			<h1 class="page-title">First Wave dBx Artists</h1>
		</div>
	</div>
		
	<?php 
        $args = array(
            'post_type'=> 'artist',
			'posts_per_page' => -1,
			'order' => 'ASC'
        );
        query_posts( $args );
    ?>

	<div class="row" id="partner">
		<div class="span12">
			<div class="row">

		   		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		   		<?php
					$mp3_id = get_post_meta($post->ID, '_artist_mp3_id', true); 
					$mp3_name = get_post_meta($post->ID, '_artist_mp3_name', true); 
				?>
					
				<div class="span4">
					<div class="subfeature pad-me">						
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('wtf-lineup')?>
							
							<h3 class="artist-name"><?php the_title(); ?></h3>
							<?php 
								if ($mp3_name) { 
							 		echo '<a href="javascript:;" id="' . $mp3_id . '" name="' . $mp3_name . '" class="artist_mp3 lineup_mp3" alt="Listen" title="Listen">{mp3}</a>';
								}
							?>
						</a>
					</div>
				</div>

				<?php 
					$i++;
					if ($i%3==0) { ?>
					</div><div class="row">
				<?php } ?>

		    	<?php endwhile; endif; ?>	
		    </div>
		</div>
	</div>

</div>
<?php get_footer(); ?>
