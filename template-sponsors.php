<?php
/**
 * Template Name: Sponsors
 * @package WordPress
 * @subpackage dBx
 */
get_header(); ?>

<div class="pagewrap container">

	<div class="row content-margin">
		<div class="span6">
			<!-- <div class="title-graphic"></div>
			<div class="title-ribbon"></div> -->
			<h1 class="page-title">We Love Our Partners</h1>
		</div>
	</div>

<?php
global $wpdb, $sponsor;

$sponsor = null;
if (count($_GET)>0) {
	foreach ($_GET as $gval => $get)
		if (strlen($get)===0) {
			$sponsor = str_replace('_',' ',$gval);
			break;
		}
		unset($get); unset($gval);
	}

	$sponsors = $wpdb->get_results("SELECT pkSponsor, strName, fileImage, enumCategory, strURL FROM sponsors WHERE enumDeleted = 'no' AND enumStatus = 'publish' AND fileImage IS NOT NULL ORDER BY strName"); 
	// var_dump($sponsors[2]->strURL);
	?>
	<div class="row" id="partner">
		<div class="span12">
			<div class="row">
	
			<?php 
				$i = 0;
				while($i < count($sponsors)) { ?>
		
				<div class="span4">
					<div class="subfeature pad-me">
						<a href="<?php echo $sponsors[$i]->strURL; ?>" target="_blank" class="content-margin">
						<!-- <span class="performance-list-image featured-artist"> -->
							<img src="<?php echo home_url('/db-admin/uploads/__displays-'.$sponsors[$i]->fileImage); ?>"/>
						<!-- </span> -->
						<!-- <span class="performance-list-content"> -->
						<!-- <span class="performance-list-name"><?php echo $sponsors[$i]->strName; ?></span> -->
							<h3><?php echo $sponsors[$i]->strName; ?></h3>
						</a>
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


</div>	
<?php get_footer(); ?>