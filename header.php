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



		<div class="container" id="nav">
			<div class="row">
				<div class="span12">

					<div id="utility_nav">

						<div class="nav_bar">
							<nav>
								<?php
								wp_nav_menu(array(
							    	'container' => false,
							    	'container_class' => 'menu',
							    	'menu' => __( 'The Utility Menu', 'dBx' ),
							    	'menu_class' => 'nav top-nav clearfix pad-me',
							    	'theme_location' => 'utility-nav',
							    	'before' => '',
							        'after' => '',
							        'link_before' => '',
							        'link_after' => '',
							        'depth' => 0,
							    	'fallback_cb' => 'bones_main_nav_fallback'
								));
								?>
							</nav>
						</div>
					</div>

					<div class="clearfix utility-bg-bar"></div>

					<div id="nav-wrapper">


						<a href="<?php bloginfo( 'url' ); ?>" class="logo pad-me">
							<img src="<?php bloginfo( 'template_url' ); ?>/images/14-logo.png"/>
						</a>

						<div class="nav_bar" id="primary_nav">

							<div id="primary_nav_wrapper">

								<nav>
									<?php

									wp_nav_menu(array(
								    	'container' => false,
								    	'container_class' => 'menu',
								    	'menu' => __( 'The Main Menu', 'dBx' ),
								    	'menu_class' => 'nav top-nav clearfix',
								    	'theme_location' => '365-nav',
								    	'before' => '',
								        'after' => '',
								        'link_before' => '',
								        'link_after' => '',
								        'depth' => 0,
								    	'fallback_cb' => 'bones_main_nav_fallback'
									));

									echo "<div class='clearfix'></div>";
									?>
								</nav>
							</div>
							<div class="clearfix" style="height: 0;"></div>
						</div>
					</div>

					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<?php if (is_page( 'rbma-2312-invitation' )) { ?>
		<div class="container" id="rbma-2312-wrapper">
		<?php } elseif (!in_category( 'rbma' )) { ?>
		<div class="container" id="wrapper">
		<?php } else { ?>
		<div class="container" id="rbma-wrapper">
		<?php } ?>
