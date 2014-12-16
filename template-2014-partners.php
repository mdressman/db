<?php
/**
 * Template Name: 2014 Partners
 * @package WordPress
 * @subpackage dB2014
 */
get_header(); ?>

<div class="pagewrap container">

	<div class="row content-margin">
		<div class="span8">
			<h1 class="page-title">2014 Decibel Festival Partners <span class="h1-sub">MORE TO COME</span></h1>
		</div>
	</div>

	<div class="row" id="partner">
		<div class="span12">

			<div class="row content-margin">
				<div class="span12">
					<p style="margin-left: 10px; font-size: 16px;">Decibel Festival survives on the support of forward thinking businesses and organizations.</p>
					<p style="margin-left: 10px; font-size: 16px;">Want to see your logo here? Please visit our <a href="http://dbfestival.com/become-a-partner">BECOME A PARTNER</a> page for info.</p>
					<p style="margin-left: 10px; font-size: 16px;"><em>For Vending Inquires, please email <a href="mailto:partners@dbfestival.com">partners@dbfestival.com</a></em></p>
				</div>
			</div>

			<?php

				$partner_types = array('Partners','Tech','Media','Hospitality');
				foreach ($partner_types as $partner_type) {

			?>

			<div class="row">
				<div class="span6">

					<?php
						switch($partner_type) {
							case "Partners":
								$partner_section_heading = "Festival Partners";
								break;
							case "Media":
								$partner_section_heading = "Media and Promotional Partners";
								break;
							case "Tech":
								$partner_section_heading = "Technology Partners";
								break;
							case "Green":
								$partner_section_heading = "Green and Community Partners";
								break;
							case "Lifestyle":
								$partner_section_heading = "Lifestyle Partners";
								break;
							case "Hospitality":
								$partner_section_heading = "Hospitality Partners";
								break;
							
						}
					?>

					<h2 class="partner-section-title"><?php echo $partner_section_heading; ?></h2>
				</div>
			</div>

			<div class="row">
			<?php
				$args = array(
		            'post_type'=> 'partner',
		            'cat' => 292,
					'postsperpage' => -1,
					'order' => 'ASC',
					'meta_key' => '_partner_type',
					'meta_value' => $partner_section_heading,
					'meta_compare' => '='
		        );
		        query_posts( $args );

		        $partner_counter = 0;

			    if (have_posts()) : while (have_posts()) : the_post(); 

			    $partner_counter++;


				$partner_fields = array('_partner_url','_partner_type');

				$partner_data = array();

				foreach($partner_fields as $partner_field) {
					$partner_data[$partner_field] = get_post_meta ($post->ID, $partner_field, true);
				}
		    ?>

				<div class="span4">
					<div class="subfeature pad-me">
						<a href="<?php echo $partner_data['_partner_url'] ?>" target="_blank" class="content-margin">
						
							<?php the_post_thumbnail( 'span4' ); ?>
						
							<h3><?php the_title(); ?></h3>
						</a>
					</div>
				</div>

				<?php 
					if ( $partner_counter % 3 == 0 ) { ?>
					</div><div class="row">
				<?php } ?>
			
			<?php endwhile; endif; ?>
			


			</div><!--close row-->
			<?php } ?>
			
		</div><!--close span12-->
	</div><!--close row-->

<?php get_footer(); ?>