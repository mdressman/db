<?php
/**
 *
 * @package WordPress
 * @subpackage dBx
 *
 * Template Name: RBMA 2312 Invite
 *
 */
get_header(); ?>

<div class="pagewrap container" id="rbma-2312">
	<div class="row">		
		<div class="span8 offset2">
			<div class="page_content content-margin">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
						<div class="entry-content rbma-content">
							
							<?php the_content(); ?>
							
						</div>
					
					</div>
				<?php endwhile; ?>
			</div>	
		</div>
	</div>
</div>
	
		
	
<?php	get_footer(); ?>