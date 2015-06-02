<?php 	
/**
 * Template Name: News
 * @package WordPress
 * @subpackage dBx
 */

get_header(); ?>
			
<div class="news-page">	
		<div class="container">
            <h1 class="page-section-title">News Feed</h1>

            <?php 
                query_posts( 'cat=20' );
            ?>

            <?php 
                $i = 0;
                if (have_posts()) : while (have_posts()) : the_post(); 
            ?>
            <div class="row">
            <?php if($i%2 == 0) { ?>
                <div class="col-md-6">
                    <div><?php the_post_thumbnail( 'span6' ); ?></div>
                </div>
                <div class="col-md-6">
                    <section class="entry-content clearfix">
                        <h2><?php the_title(); ?></h2>
                        <?php the_excerpt(); ?> 
                    </section> <!-- end article section -->
                </div>
            <?php } else { ?>
                <div class="col-md-6">
                    <section class="entry-content clearfix">
                        <h2><?php the_title(); ?></h2>
                        <?php the_excerpt(); ?> 
                    </section> <!-- end article section -->
                </div>
                <div class="col-md-6">
                    <div><?php the_post_thumbnail( 'span6' ); ?></div>
                </div>
            <?php } $i++; ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
		</div>
	</div>

<?php get_footer(); ?>
