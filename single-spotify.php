<?php
/**
 * Single Post Template: Spotify Embed in Excerpt
 * @package WordPress
 * @subpackage Decibel Festival
 */
get_header(); ?>

    <div class="pagewrap container">
        <div class="row">
            <div class="span8 main-content">

                <div class="page_content content-margin">
                <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <?php
                            if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Share Sidebar') ) : else :
                            endif;
                        ?>
                        <?php
                            echo "<h3>" . get_post_meta( $post->ID, 'feature_subhead', true ) . "</h3>";
                        ?>

                        <div class="entry-content">
                            <?php the_content(); ?>

                            <div class="row">
                                <div class="span6">
                                    <span class="db-label">Share:</span>
                                    <div class="row">
                                        <div class="span2">
                                            <a class="sidebar-button" href="http://twitter.com/share?text=s/o <?php the_title(); ?> %40dBFestival <?php echo get_permalink(); ?>" target="_blank" title="Share on Twitter" alt="Share on Twitter">
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
                                </div>
                            </div>

                            <?php if (get_post_meta( $post->ID, $key = 'author_info', true )) { ?>
                                <span class="db-label">Written by <?php echo get_post_meta( $post->ID, 'author_info', true ); ?></span>
                            <?php } ?>
                        </div>
                    
                    </div>
                <?php endwhile; ?>
                </div>
            </div>

            <div class="span4 content-margin event-sidebar">
                <div class="row">
                    <iframe src="<?php echo get_the_excerpt(); ?>" width="300" height="380" frameborder="0" allowtransparency="true"></iframe>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>