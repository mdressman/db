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
	    <meta name="description" content="">
	    <meta name="author" content="">

     	<meta property="og:url" content="<?php echo get_permalink(); ?>" />
	    <meta property="og:title" content="<?php wp_title(''); ?>" />

		<?php $fb_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'thumbnail'); ?>
		<?php if ($fb_image) { ?>
    		<meta property="og:image" content="<?php echo $fb_image[0]; ?>" />
		<?php } else { ?>
			<meta property="og:image" content="http://dbfestival.com/2013/assets/dBx_SPECIAL_v3.png" />
		<?php } ?>
		
	    <meta property="og:type" content="website" />
	    <meta property="og:description" content="<?php echo "Celebrating 10 Years of Electronic Music Performance and Visual Art #dBx"; ?>"/>
	    <meta property="og:site_name" content="Decibel Festival" />

	    <!-- Le styles -->
	    <link href="<?php bloginfo( 'template_url' ); ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
	   	<link href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" rel="stylesheet">
	   	<link href="<?php bloginfo( 'template_url' ); ?>/css/nivo-slider.css" rel="stylesheet">
	   	<link href="<?php bloginfo( 'template_url' ); ?>/css/nivo/default.css" rel="stylesheet">
	    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
		
		<link rel="icon" href="<?php bloginfo( 'template_url' ); ?>/images/favicon.gif" /> 

		<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		


		
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
						<!-- <div id="utility-graphic"></div> -->
						<div class="nav_bar">
							<nav>
								<!-- <a style="float:right; border-top:2px solid #cc3333; color: white; padding: 0 10px; margin-left: -10px;" href="http://deliradio.com/player?utf8=%E2%9C%93&amp;band_search[location_on]=true&amp;band_search[location_search_for]=venues&amp;band_search[location]=San+Mateo%2C+CA%2C+USA&amp;band_search[latitude]=37.57409999999999&amp;band_search[longitude]=-122.321&amp;band_search[radius]=16&amp;band_search[date_window]=365&amp;band_search[venue_id]=31519&amp;band_search[genres_on]=true&amp;band_search[genre]=&amp;band_search[genre_excluded]=&amp;band_search[tag]=&amp;band_search[tag_excluded]=&amp;band_search[search_on]=false&amp;band_search[search]=cosmic&amp;view_type=icon&amp;commit=Find+Shows&amp;utm_source=DRNET&amp;utm_medium=BUTTON&amp;utm_campaign=decibel" target="_blank" onclick="window.open('http://deliradio.com/player?utf8=%E2%9C%93&amp;band_search[location_on]=true&amp;band_search[location_search_for]=venues&amp;band_search[location]=San+Mateo%2C+CA%2C+USA&amp;band_search[latitude]=37.57409999999999&amp;band_search[longitude]=-122.321&amp;band_search[radius]=16&amp;band_search[date_window]=365&amp;band_search[venue_id]=31519&amp;band_search[genres_on]=true&amp;band_search[genre]=&amp;band_search[genre_excluded]=&amp;band_search[tag]=&amp;band_search[tag_excluded]=&amp;band_search[search_on]=false&amp;band_search[search]=cosmic&amp;view_type=icon&amp;commit=Find+Shows&amp;utm_source=DRNET&amp;utm_medium=BUTTON&amp;utm_campaign=decibel','DeliRadio Player','location=1,width=300,height=700');return false;">DB RADIO</a> -->
								<?php

								if (false !== strpos($_SERVER['REQUEST_URI'],'dbx')) {

									wp_nav_menu(array(
								    	'container' => false,                           // remove nav container
								    	'container_class' => 'menu',           // class of container (should you choose to use it)
								    	'menu' => __( 'The Festival Utility Menu', 'dBx' ),  // nav name
								    	'menu_class' => 'nav top-nav clearfix pad-me',         // adding custom nav class
								    	'theme_location' => 'dbx-utility-nav',                 // where it's located in the theme
								    	'before' => '',                                 // before the menu
								        'after' => '',                                  // after the menu
								        'link_before' => '',                            // before each link
								        'link_after' => '',                             // after each link
								        'depth' => 0,                                   // limit the depth of the nav
								    	'fallback_cb' => 'bones_main_nav_fallback'      // fallback function
									));
								} else {

									wp_nav_menu(array(
								    	'container' => false,                           // remove nav container
								    	'container_class' => 'menu',           // class of container (should you choose to use it)
								    	'menu' => __( 'The Utility Menu', 'dBx' ),  // nav name
								    	'menu_class' => 'nav top-nav clearfix pad-me',         // adding custom nav class
								    	'theme_location' => 'utility-nav',                 // where it's located in the theme
								    	'before' => '',                                 // before the menu
								        'after' => '',                                  // after the menu
								        'link_before' => '',                            // before each link
								        'link_after' => '',                             // after each link
								        'depth' => 0,                                   // limit the depth of the nav
								    	'fallback_cb' => 'bones_main_nav_fallback'      // fallback function
									));

								}


								?>
							</nav>
						</div>
					</div>

					<div class="clearfix"></div>

					
					

					<div id="nav-wrapper">

						<div id="header-graphic"></div>

						<a href="<?php bloginfo( 'url' ); ?>" class="logo pad-me">
							<img src="<?php bloginfo( 'template_url' ); ?>/images/black_logo.png"/>
						</a>

						<div class="nav_bar" id="primary_nav">	

							
							<div id="primary-nav-graphic"></div>

							<div id="primary_nav_wrapper">
								<div class="primary-nav-ribbon"></div>

								<nav>
									<?php
									
									if (false !== strpos($_SERVER['REQUEST_URI'],'dbx') || false !== strpos($_SERVER['REQUEST_URI'],'partner')) {

										

										wp_nav_menu(array(
								    	'container' => false,                           // remove nav container
								    	'container_class' => 'menu',           // class of container (should you choose to use it)
								    	'menu' => __( 'The Main Menu', 'dBx' ),  // nav name
								    	'menu_class' => 'nav top-nav clearfix',         // adding custom nav class
								    	'theme_location' => 'main-nav',                 // where it's located in the theme
								    	'before' => '',                                 // before the menu
								        'after' => '',                                  // after the menu
								        'link_before' => '',                            // before each link
								        'link_after' => '',                             // after each link
								        'depth' => 0,                                   // limit the depth of the nav
								    	'fallback_cb' => 'bones_main_nav_fallback'      // fallback function
										));
									} else {

										wp_nav_menu(array(
									    	'container' => false,                           // remove nav container
									    	'container_class' => 'menu',           // class of container (should you choose to use it)
									    	'menu' => __( 'The Main Menu', 'dBx' ),  // nav name
									    	'menu_class' => 'nav top-nav clearfix',         // adding custom nav class
									    	'theme_location' => '365-nav',                 // where it's located in the theme
									    	'before' => '',                                 // before the menu
									        'after' => '',                                  // after the menu
									        'link_before' => '',                            // before each link
									        'link_after' => '',                             // after each link
									        'depth' => 0,                                   // limit the depth of the nav
									    	'fallback_cb' => 'bones_main_nav_fallback'      // fallback function
										));
									}

									echo "<div class='clearfix'></div>";

									

									?>
								</nav>
							</div>
							<div class="clearfix"></div>							
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