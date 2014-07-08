<?php
/**
 *
 * Template Name: Become A Partner
 * @package WordPress
 * @subpackage dBx
 */
get_header(); ?>

	<div class="pagewrap container">
		<div class="row">		
			<div class="span4 main-content">
				<div class="page_content content-margin">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
					</div>
				<?php endwhile; ?>
				</div>	
			</div>
			<div class="span8 content-margin event-sidebar">

				<div class="row">
					<div class="span8">
						<h1>VIEW THE DECK</h1>
						<iframe src="https://projeqt.com/embed/v2/87229-78aba57410e87542b1659c4281a139b9/" width="770" height="620" frameborder="0" style="border:1px solid #d3d3d3"></iframe>
					</div>
				</div>

				<div class="row">
					<div class="span8">
						<a href="http://dbfestival.com/assets/db2014-sponsorship-deck.pdf" target="_blank">
							<h3>DOWNLOAD</h3>
						</a>
						
					</div>
				</div>

				
			</div>
		</div>
	
		
	
<?php	get_footer(); ?>