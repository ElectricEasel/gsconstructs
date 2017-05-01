/*--------------------------------------------------------------
Navigation
--------------------------------------------------------------*/
(function($) {

	"use strict"

	$('#mobile-menu-opener, #mobile-menu-closer').click(function(e){
		e.preventDefault();
		$('#mobile-navigation-container').toggleClass('nav-open');
	});

	$('#mobile-menu .menu-item-has-children .mobile-opener').click(function(e){
		e.preventDefault();
		$(this).next('.sub-menu').slideToggle(200);
	});


	$('#search-opener, #search-closer').click(function(e){
		e.preventDefault();
		$('.header-search-form').toggleClass('search-open');
	});
	
})( jQuery );





/*--------------------------------------------------------------
Google map init
--------------------------------------------------------------*/
jQuery(document).ready(function ($) {

	var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);

	$('.google-map').each(function() {
		
		var data = $(this).data(); // Get the data from this element

		var options = { // Create map options object
			center: new google.maps.LatLng(data.lat, data.lng), // Set center from the specified lat and lng
			scrollwheel: false, // Dont Zoom in/out when scrolling page
			zoom: data.zoom, // Set zoom level from 1 to maximum of 24
			mapTypeId: data.type, // Set map type ID: roadmap, satellit, hybrid or terrain
			styles: data.style, // Include the chosen custom map style from the data attr
		};

		// Create the map object
		var map = new google.maps.Map(this, options);

		// Create the marker based on the lat & lng
		var marker = new google.maps.Marker({
			position: options['center'],
			map: map,
			icon: data.pin,
			title: data.title,
		});

		// Create the click event
		google.maps.event.addListener(marker, 'click', function() {
			InfoWindow.open(map,marker);
		});

		// Initialize the Map
		google.maps.event.addDomListener(window, 'load' );
		
	});

});




/*--------------------------------------------------------------
Isotope init
--------------------------------------------------------------*/
(function($) {

	$(window).load(function() {

		"use strict"

		if ( $().isotope ) {
			var $grid = $('#portfolio');

			$grid.imagesLoaded( function(){
				$grid.isotope({
					itemSelector : '.portfolio-item',
					layoutMode : 'masonry',
					transitionDuration: '0.8s'
				});
			});

			$('#filter a').click(function(e){
				e.preventDefault();
				$grid.isotope( {
					filter: $( this ).attr('data-filter')
				});
				$('#filter a').removeClass('current');
				$( this ).addClass('current');
			});

		}

	});
	
})( jQuery );




/*--------------------------------------------------------------
Page builder row overlay
--------------------------------------------------------------*/
(function($) {

	jQuery(function($) {

		$('.panel-grid .panel-row-style').each( function() {
			if ( $(this).data('overlay') ) {
				$(this).append( '<div class="section-overlay"></div>' );
				var overlayColor = $(this).data('overlay-color');
				$(this).find('.section-overlay').css('background-color', overlayColor );
			}
		});

	});
	
})( jQuery );




/*--------------------------------------------------------------
Remove empty p tag
--------------------------------------------------------------*/
(function($) {

	$('p').filter(function () { return this.innerHTML == "" }).remove();
	
})( jQuery );