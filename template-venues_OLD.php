<?php
/**
 * Template Name: Venues Old
 * @package WordPress
 * @subpackage dBx
 */
get_header(); ?>

<div class="pagewrap container">

	<div class="row content-margin">
		<div class="span8">
			<!-- <div class="title-graphic"></div>
			<div class="title-ribbon"></div> -->
			<h1 class="page-title">2013 Decibel Festival Venues</h1>
		</div>
	</div>

<?php
global $wpdb, $venue;

$venue = null;
if (count($_GET)>0) {
	foreach ($_GET as $gval => $get)
		if (strlen($get)===0) {
			$sponsor = str_replace('_',' ',$gval);
			break;
		}
		unset($get); unset($gval);
	}

	$venues = $wpdb->get_results("SELECT pkVenue, strName, fileImage, strURL, strPhone, strPhoto, strAddress, strDesc, intPosition FROM venues WHERE enumDeleted = 'no' AND enumStatus = 'publish' ORDER BY intPosition"); 
	// var_dump($venues);




	?>
	<div class="row" id="venue">
		<div class="span12">
			<div class="row">
	
			<?php 
				$i = 0;
				while($i < count($venues)) { ?>
		
				<div class="span4">
					<div class="subfeature pad-me">
						<a href="<?php echo $venues[$i]->strURL; ?>" target="_blank" class="content-margin">
						
							<img src="http://dbfestival.com/wp-content/uploads/2013/04/<?php echo $venues[$i]->strPhoto; ?>-370x233.jpg"/>
						
							<h3><?php echo $venues[$i]->strName; ?></h3>
						</a>
						<p class="venue-address"><?php echo $venues[$i]->strAddress; ?></p>
						<p class="venue-desc"><?php echo $venues[$i]->strDesc; ?></p>
					</div>
				</div>

				<?php 
					$i++;
					if ($i%3==0) { ?>
					</div><div class="row">
				<?php } ?>
			<?php } ?>
			</div><!--close row-->
			
		</div><!--close span12-->
	</div><!--close row-->

<?php get_footer(); ?>