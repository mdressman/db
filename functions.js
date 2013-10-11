$(document).ready(function(){

	// $('.post-687 div.entry-content').columnize({width:300, lastNeverTallest: true });
	// $('.twocol').columnize({ columns: 2 });
	// $('.threecol').columnize({ columns: 3 });
	// $('.fourcol').columnize({ columns: 4 });



	var $filter = $('#nav-wrapper');
	
	var $filterSpacer = $('<div />', {
		"class": "filter-drop-spacer",
		"height": $filter.outerHeight()
	});
  

	if ($filter.size())
	{
		$(window).scroll(function ()
		{     
			if (!$filter.hasClass('fix') && $(window).scrollTop() > $filter.offset().top)
			{
				$filter.before($filterSpacer);
				$filter.addClass("fix");
				// $('#nav-wrapper').animate({backgroundColor: '#ff0000'})	

			}
			else if ($filter.hasClass('fix')  && $(window).scrollTop() < $filterSpacer.offset().top)
			{
				$filter.removeClass("fix");
				$filterSpacer.remove();
				// $('#nav-wrapper').animate({backgroundColor: '#000000'})	
			}
		});
	}

	$('#slider').nivoSlider({
		effect: 'fade', // Specify sets like: 'fold,fade,sliceDown'
        animSpeed:500, // Slide transition speed
        pauseTime:3000, // How long each slide will show
        startSlide:0, // Set starting Slide (0 index)
        directionNav:true, // Next & Prev navigation
        directionNavHide:true, // Only show on hover
        controlNav:true, // 1,2,3... navigation
        controlNavThumbs:false, // Use thumbnails for Control Nav
        controlNavThumbsFromRel:false, // Use image rel for thumbs
        controlNavThumbsSearch: '.jpg', // Replace this with...
        controlNavThumbsReplace: '_thumb.jpg', // ...this in thumb Image src
        keyboardNav:true, // Use left & right arrows
        pauseOnHover:false, // Stop animation while hovering
        manualAdvance:false, // Force manual transitions
        captionOpacity:0.8, // Universal caption opacity
        prevText: 'Prev', // Prev directionNav text
        nextText: 'Next', // Next directionNav text
	});	

	// $(".db-tweets").liveTweets({
	// 		operator: "from:dbfestival", 
	// 		showThumbnails: false, 
	// 		liveTweetsToken: "WulqKXyS0SbhtsAQkUWp31hmAon5ip44dtYm9jMaCpA" 
	// 	});

	// $("#menu-365-nav").before('<div class="primary-nav-ribbon dbx-nav-ribbon"></div>');

	$(".subfeature a img, .showcase-artist a img").hover(function(){
    	$(this).stop().animate({"opacity": 1.0});
	},function(){
	    $(this).stop().animate({"opacity": 0.6});
	});

	$(".sm").hover(function(){
    	$(this).stop().css({"opacity": 0.7});
	},function(){
	    $(this).stop().css({"opacity": 1.0});
	});


	$(document).on('change', '#artist-select select', function() {
		if ($(this).val() != '-1') window.location = $(this).val();
	});

});



$(window).load(function() {  
	// $('.subfeature a img').hoverizr();
		/* ISOTOPE */

	var $container = $('#isotope-container');
	var $container_program = $('.isotope-container-program');
	
	$container.isotope({
		layoutMode : 'fitRows'
	});
	
	$container_program.isotope({
		layoutMode : 'fitRows'
	});

	var $gallery_container = $('#gallery-1');
    $gallery_container.isotope({
        layoutMode : 'fitRows'
    });
	

	$('#filters a').click(function(){
		var selector = $(this).attr('data-filter');
		$container.isotope({ filter: selector });
		
		if ($(this).hasClass('selected')) {
			return false;
		}
		$(this).parents('#filters').find('.selected').removeClass('selected');
		$(this).addClass('selected');
		return false;

	});

	$('#filters a').click(function(){
		var selector = $(this).attr('data-filter');
		$container.isotope({ filter: selector });
		
		if ($(this).hasClass('selected')) {
			return false;
		}
		$(this).parents('#filters').find('.selected').removeClass('selected');
		$(this).addClass('selected');
		return false;

	});

	$('#filters a').click(function(){
		var selector = $(this).attr('data-filter');
		$container_program.isotope({ filter: selector });
		
		if ($(this).hasClass('selected')) {
			return false;
		}
		$(this).parents('#filters').find('.selected').removeClass('selected');
		$(this).addClass('selected');
		return false;

	});

});
