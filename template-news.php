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

                <div class="col-md-6">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'span6' ); ?></a>
                </div>
                <div class="col-md-6">
                    <hr class="section-hr" />
                    <section class="entry-content clearfix">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><h2><?php the_title(); ?></h2></a>
                    </section>
                </div>

<!--             <?php if($i%2 == 0) { ?>
                <div class="col-md-6">
                    <div><?php the_post_thumbnail( 'span6' ); ?></div>
                </div>
                <div class="col-md-6">
                    <hr class="section-hr" />
                    <section class="entry-content clearfix">
                        <h2><?php the_title(); ?></h2>
                    </section>
                    <hr class="section-hr" />
                </div>
            <?php } else { ?>
                <div class="col-md-6">
                    <section class="entry-content clearfix">
                        <h2><?php the_title(); ?></h2>
                    </section>
                </div>
                <div class="col-md-6">
                    <div><?php the_post_thumbnail( 'span6' ); ?></div>
                </div>
            <?php } $i++; ?> -->
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
		</div>
	</div>

<?php get_footer(); ?>
