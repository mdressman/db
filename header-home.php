<?php
/**
 *
 * @package WordPress
 * @subpackage dBx
 */
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php wp_title(''); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="author" content="">

        <meta property="og:url" content="<?php echo get_permalink(); ?>" />
        <meta property="og:title" content="<?php wp_title(''); ?>" />

        <?php $fb_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'thumbnail'); ?>
        <?php if ($fb_image) { ?>
            <meta property="og:image" content="<?php echo $fb_image[0]; ?>" />
        <?php } else { ?>
            <meta property="og:image" content="http://dbfestival.com/assets/fb-share-image-feb2014.jpg" />
        <?php } ?>

        <meta property="og:type" content="website" />
        <meta property="og:description" content="<?php echo "Electronic music performance, visual art, and new media for your pleasure."; ?>"/>
        <meta property="og:site_name" content="Decibel Festival" />



        <link href="<?php bloginfo( 'template_url' ); ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" rel="stylesheet">
        <link href="<?php bloginfo( 'template_url' ); ?>/css/nivo-slider.css" rel="stylesheet">
        <link href="<?php bloginfo( 'template_url' ); ?>/css/nivo/default.css" rel="stylesheet">

        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link rel="icon" href="<?php bloginfo( 'template_url' ); ?>/images/favicon.gif" />

        <?php wp_head(); ?>

    </head>

    <body>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


    <header class="header parallax-window" role="banner" data-parallax="scroll" data-image-src="<?php bloginfo( 'template_url' ); ?>/images/db2015-website-header.png">
        <div class="header-content">
            <div class="header-logo">
                <img src="<?php bloginfo( 'template_url' ); ?>/images/db2015-website-header-logo.png" class="logo-img" />
            </div>
            <div class="header-dates u-uppercase">
                September 23-27, 2015 <span class="slashes">//</span> Seattle, WA
            </div>
        </div>
        <div class="home-header-nav">
            <a href="<?php bloginfo( 'url' ); ?>" class="logo nav-logo pad-me">
                <img src="<?php bloginfo( 'template_url' ); ?>/images/15-logo-sm.png"/>
            </a>
            <?php
                wp_nav_menu(array(
                    'container' => false,
                    'container_class' => 'menu',
                    'menu' => __( 'The Main Menu', 'dBx' ),
                    'menu_class' => 'header-nav-list u-uppercase',
                    'theme_location' => '365-nav',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'depth' => 0,
                    'fallback_cb' => 'bones_main_nav_fallback'
                ));
            ?>
        </div>
    </header>
    