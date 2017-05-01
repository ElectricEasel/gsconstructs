jQuery(document).ready(function($) {
	'use strict';

    $('.devclick-colour-picker').wpColorPicker();
	
	$(document).ajaxComplete(function() {
		$('.devclick-colour-picker').wpColorPicker();
	});
	
});