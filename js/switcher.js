/*==============================
	STYLE SWITCHER SCRIPT INSTALLATION
 ===============================*/
 
(function($) {
	"use strict";

	$(".style-1" ).click(function(){
		$("#colors" ).attr("href", "css/switcher/style-1.css" );
		return false;
	});

	$(".style-2" ).click(function(){
		$("#colors" ).attr("href", "css/switcher/style-2.css" );
		return false;
	});

	$(".style-3" ).click(function(){
		$("#colors" ).attr("href", "css/switcher/style-3.css" );
		return false;
	});

	$(".style-4" ).click(function(){
		$("#colors" ).attr("href", "css/switcher/style-4.css" );
		return false;
	});

	$(".style-5" ).click(function(){
		$("#colors" ).attr("href", "css/switcher/style-5.css" );
		return false;
	});
	
	// Style Switcher	
	$('#style-switcher').animate({
		left: '-220px'
	});

	$('#style-switcher h2 a').click(function(e){
		e.preventDefault();
		var div = $('#style-switcher');
		console.log(div.css('left'));
		if (div.css('left') === '-220px') {
			$('#style-switcher').animate({
				left: '0px'
			}); 
		} else {
			$('#style-switcher').animate({
				left: '-220px'
			});
		}
	});

	$('.colors li a').click(function(e){
		e.preventDefault();
		$(this).parent().parent().find('a').removeClass('active');
		$(this).addClass('active');
	});
    
})(jQuery);

