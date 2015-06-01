<?php
/**
 * Template Name: Home
 * @package WordPress
 * @subpackage Decibel Festival
 */

get_header("home"); ?>

	<div class="lineup-section fullscreen-section bg-mint">
		<img class="plus-sidebar" src="<?php bloginfo( 'template_url' ); ?>/images/plus_sidebar.png" />
		<img class="minus-sidebar" src="<?php bloginfo( 'template_url' ); ?>/images/minus_sidebar.png" />
		<div class="lineup-title">
			<h1>DB2015 Lineup</h1>
		</div>
		<div class="artists-container">
			<?php 
				$artists = array("Alan Fitzpatrick", 
									"andhim",
									"Archivist",
									"Autechre",
									"Bob Moses",
									"Bonobo",
									"Cassegrain",
									"Clark",
									"Dan Deacon",
									"Daniel Avery", 
									"Eskmo",
									"IG88",
									"Jak",
									"John Tejada",
									"Josef Gaard",
									"Julio Bashmore",
									"Marcel Dettmann",
									"Ø [Phase]",
									"Photay",
									"Recondite",
									"Taylor McFerrin",
									"The Acid",
									"Tin Man",
									"Vril",
									"Young Ejecta",
									"The Black Madonna",
									"Tim Hecker",
									"Agoria",
									"Joesph Capriati",
									"Paul Ritch",
									"Raica",
									"Roman Flugel",
									"DJ Tennis",
									"Shiba San",
									"Synkro"
								);


				natcasesort($artists);
				$last_artist = array_pop($artists);

				foreach($artists as $artist) {
			?>
				<span class="artist-text">
					<?php echo $artist ?> 
					<span class="artist-separator">/</span> 
				</span>
			<?php } ?>

			<span class="artist-text">
				<?php echo $last_artist ?>
			</span>
			<div><span class="artist-separator">+</span> many more</div>
		</div>
		<div class="tickets-container">
			<button class="tickets-btn">
				<span class="tickets-btn-text">Buy tickets</span>
			</button>
		</div>
	</div>
			
<?php get_footer( ); ?>
