
<div id="footer" class="container">

	<!-- SOCIAL -->
		
	<div class="row content-margin">
		<div class="span6">
			<div class="title-graphic"></div>
			<h1>SOCIAL</h1>
		</div>
	</div>

	<div class="row">
		
		<div class="span4 db-tweets"></div>

		<div class="span4">
			<a href="http://instagram.com/dbfestival" target="_blank">
				<img src="http://localhost:8888/decibel/wp-content/themes/decibel/images/instagram.jpg" />
			</a>
		</div>

		<div class="span4">
			<div class="fb-like-box" data-href="http://www.facebook.com/decibelfestival" data-width="370" data-height="385" data-show-faces="false	" data-stream="true" data-header="false"></div>
		</div>
	</div>

	
	<?php 
		if (false !== strpos($_SERVER['REQUEST_URI'],'dbx')) { // yes festival page
	?>
	
	<div class="row">
		<div class="span12">
			<div id="timer-countdown"><span id="timer-countdown-days"></span> DAYS <span id="timer-countdown-hours"></span> HOURS</div>
		
			<div id="bpm-countdown"><span id="bpm-countdown-beats"></span> BEATS @ <span id="bpm-countdown-bpm">120</span> BPM <a href="#" class="triangle-up bpm-up"></a><a href="#" class="triangle-down bpm-down"></a></div>
		
		</div>	
	</div>	

	<?php } ?>
	

	<div class="row">
		<div class="span12">
		
			
			<div class="email-signup">
				EMAIL SIGNUP TODO
			</div>

			<div class="footericons">
				<a href="http://facebook.com/DecibelFestival" class="sm icon-fb"></a>
				<a href="http://twitter.com/dBFestival" class="sm icon-tw"></a>
				<a href="http://youtube.com/DecibelFestival" class="sm icon-yt"></a>
				<a href="http://soundcloud.com/decibelfestival" class="sm icon-sc"></a>
				<a href="http://last.fm/user/DecibelFestival" class="sm icon-lf"></a>
				<a href="http://open.spotify.com/user/DecibelFestival" class="sm icon-sp"></a>
			</div>
		</div>
		
	</div>

	<div class="row">
		<div class="span12 hosted">
			<a id="pagely" href="http://page.ly" target="_blank">WordPress Hosting by Page.ly</a>
		
		</div>
	</div>
</div>






    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   
   
    <script src="<?php bloginfo( 'template_url' ); ?>/bootstrap/js/bootstrap.js"></script>
    <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.cycle.all.js"></script>
    <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.nivo.slider.pack.js"></script>
    <script src="<?php bloginfo( 'template_url' ); ?>/js/twitlive-min.js"></script>
    <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.color-2.1.1.min.js"></script>
    <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.hoverizr.min.js"></script>
    
    
    <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/functions.js"></script>
	 <script type="text/javascript">
		function updateTimeCountdown(festStart) {
			var now = new Date();
			var dayRound = new Date(now.getFullYear(), now.getMonth(), now.getDate()+1);
			var hourRound = new Date(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours());
			$('#timer-countdown-days').html((festStart.valueOf() - dayRound.valueOf())/(1000*60*60*24));
			$('#timer-countdown-hours').html(((festStart.valueOf() - hourRound.valueOf()) - (festStart.valueOf() - dayRound.valueOf()))/(1000*60*60));
		}
		function iniAndLoopTimer(festStart) {
			if (typeof festStart === 'undefined') festStart = new Date(2013, 9, 25, 0, 0, 0, 0);
			updateTimeCountdown(festStart);
			var now = new Date();
			var nextHour = new Date(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours()+1);
			window.setTimeout("iniAndLoopTimer()", nextHour.valueOf() - now.valueOf());
		}
		function updateBPMCountdown(festStart) {
			var now = new Date();
			$('#bpm-countdown-beats').html(numberWithCommas(Math.round((festStart.valueOf() - now.valueOf())/(1000*60)*parseInt($('#bpm-countdown-bpm').text(), 10))));
		}
		function numberWithCommas(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}
		function iniAndLoopBPM(festStart) {
			if (typeof festStart === 'undefined') festStart = new Date(2013, 9, 25, 0, 0, 0, 0);
			updateBPMCountdown(festStart);
			window.clearTimeout(window['bpm-timout']);
			window['bpm-timout'] = window.setTimeout("iniAndLoopBPM()", 60/parseInt($('#bpm-countdown-bpm').text(), 10)*1000);
		}
		
		$(function() {
			iniAndLoopTimer();
			iniAndLoopBPM();
			
			$(document).on('click', '.bpm-up', function() {
				$('#bpm-countdown-bpm').html(parseInt($('#bpm-countdown-bpm').text(), 10)+1);
				iniAndLoopBPM();
				return false;
			}).on('click', '.bpm-down', function() {
				$('#bpm-countdown-bpm').html(parseInt($('#bpm-countdown-bpm').text(), 10)-1);
				iniAndLoopBPM();
				return false;
			});
			//if on a apge with the artist select box
			if ($('#artist-select').length>0)
				$(document).on('change', '#artist-select select', function() {
					if ($(this).val() != '-1') window.location = $(this).val();
				});
			
			if ($('.performance-venue').length>0)
				$(document).on('click', '.performance-venue', function() {
					if ($('.artist-page-venue-map-wrapper').is(':visible')) {
						$('.artist-page-venue-map-wrapper').hide();
						$('.artist-page-img-wrapper').show();
					} else {
						$('.artist-page-img-wrapper').hide();
						$('.artist-page-venue-map-wrapper').show();
					}
				});
			
			if ($('#featured').length>0)
				$('#featured').cycle({
					fx:'fade',
					timeout: 3500
				});
		});
	 </script>
	 
	 <script type="text/javascript">
 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31811634-1']);
  _gaq.push(['_trackPageview']);
 
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 
</script>
    </body>
</html>