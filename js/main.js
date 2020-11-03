(function ($) {
 "use strict";
	
	// // stickey menu
	$(window).on('scroll',function() {    
		var scroll = $(window).scrollTop(),
			mainHeader = $('#sticky-header'),
			mainHeaderHeight = mainHeader.innerHeight();
		
		console.log(mainHeader.innerHeight());
		if (scroll < 265) {
			$("#sticky-header").removeClass("sticky");	
			$("body").css({
				'padding-top': '0px'
			})
		}else{
			$("#sticky-header").addClass("sticky");
			$("body").css({
				'padding-top': mainHeaderHeight + 'px'
			})
		}
	});
	
	/*------------- preloader js --------------*/
	$(window).load(function() { // makes sure the whole site is loaded
		$('.loader-container').fadeOut(); // will first fade out the loading animation
		$('.loader').delay(150).fadeOut('slow'); // will fade out the white DIV that covers the website.
		$('body').delay(150).css({'overflow':'visible'})
	})
	
	/*----------------------------
	 wow js active
	------------------------------ */
	new WOW().init();
	
	// counter up
	$('.counter').counterUp({
		delay: 10,
		time: 1000
	});
	
	$(".catagory-wrap a").on("click", function(){
		$(".all-Collection, .overlay-bg").toggleClass("active");
	});
	$(".overlay-bg").on("click", function(){
		$(".all-Collection,.overlay-bg").removeClass("active");
	});
	
	// slicknav
	$('ul#navigation').slicknav({
		prependTo:".responsive-menu-wrap"
	});
	
	// slider-active
	$('.slider-active').owlCarousel({
		smartSpeed:1000,
		margin:0,
		nav:true,
		// autoplay:true,
		// autoplayTimeout:3000,
		loop:true,
		navText:['<i class="fa fa-angle-left"></i> PRE','Next <i class="fa fa-angle-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			450:{
				items:1
			},
			678:{
				items:1
			},
			1000:{
				items:1
			}
		}
	})
	// slider-active
	$(".slider-active").on('translate.owl.carousel', function(){
		$('.slider-content h2').removeClass('fadeInDown animated').hide();
		$('.slider-content h3').removeClass('fadeInDown animated').hide();
		$('.slider-content p').removeClass('fadeInUp animated').hide();
		$('.slider-content a').removeClass('fadeInUp animated').hide();
	});	
		
	$(".slider-active").on('translated.owl.carousel', function(){
		$('.owl-item.active .slider-content h2').addClass('fadeInDown animated').show();
		$('.owl-item.active .slider-content h3').addClass('fadeInDown animated').show();
		$('.owl-item.active .slider-content p').addClass('slideInUp animated').show();
		$('.owl-item.active .slider-content a').addClass('fadeInUp animated').show();
	});
	
	/*---------------------
	 countdown
	--------------------- */
	$('[data-countdown]').each(function() {
		var $this = $(this), finalDate = $(this).data('countdown');
			$this.countdown(finalDate, function(event) {
			$this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Sec</p></span>'));
		});
	});
	
	// product-active
	$('.product-active').owlCarousel({
		smartSpeed:1000,
		margin:0,
		nav:true,
		loop:true,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			450:{
				items:1
			},
			678:{
				items:2
			},
			991:{
				items:3
			},
			1000:{
				items:3
			}
		}
	})
	
	// tab-active2
	$('.tab-active2').owlCarousel({
		smartSpeed:1000,
		margin:0,
		nav:true,
		loop:true,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			450:{
				items:1
			},
			678:{
				items:2
			},
			991:{
				items:3
			},
			1000:{
				items:3
			}
		}
	})
	
	$('.grid').imagesLoaded( function() {
	
		// filter items on button click
		$('.portfolio-menu').on( 'click', 'button', function() {
		  var filterValue = $(this).attr('data-filter');
		  $grid.isotope({ filter: filterValue });
		});	

		// init Isotope
		var $grid = $('.grid').isotope({
		  itemSelector: '.grid-item',
		  percentPosition: true,
		  masonry: {
			// use outer width of grid-sizer for columnWidth
			columnWidth: '.grid-item',
		  }
		});
	});

	$('.portfolio-menu button').on('click', function(event) {
		$(this).siblings('.active').removeClass('active');
		$(this).addClass('active');
		event.preventDefault();
	});
	
	/*--
	Magnific Popup
	------------------------*/
	$('.img-poppu').magnificPopup({
		type: 'image',
		gallery:{
			enabled:true
		}
	});
	
	/*-- price range start --*/
	function collision($div1, $div2) {
		var x1 = $div1.offset().left;
		var w1 = 40;
		var r1 = x1 + w1;
		var x2 = $div2.offset().left;
		var w2 = 40;
		var r2 = x2 + w2;

		if (r1 < x2 || x1 > r2) return false;
		return true;
      
    }
	// slider call

	$('#slider').slider({
		range: true,
		min: 0,
		max: 500,
		values: [ 75, 300 ],
		slide: function(event, ui) {
			
			$('.ui-slider-handle:eq(0) .price-range-min').html('$' + ui.values[ 0 ]);
			$('.ui-slider-handle:eq(1) .price-range-max').html('$' + ui.values[ 1 ]);
			$('.price-range-both').html('<i>$' + ui.values[ 0 ] + ' - </i>$' + ui.values[ 1 ] );
			
			//
			
	    if ( ui.values[0] === ui.values[1] ) {
	      $('.price-range-both i').css('display', 'none');
	    } else {
	      $('.price-range-both i').css('display', 'inline');
	    }
	        
	        //
			
			if (collision($('.price-range-min'), $('.price-range-max')) === true) {
				$('.price-range-min, .price-range-max').css('opacity', '0');	
				$('.price-range-both').css('display', 'block');		
			} else {
				$('.price-range-min, .price-range-max').css('opacity', '1');	
				$('.price-range-both').css('display', 'none');		
			}
			
		}
	});

	$('.ui-slider-range').append('<span class="price-range-both value"><i>$' + $('#slider').slider('values', 0 ) + ' - </i>' + $('#slider').slider('values', 1 ) + '</span>');

	$('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">$' + $('#slider').slider('values', 0 ) + '</span>');

	$('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">$' + $('#slider').slider('values', 1 ) + '</span>');
	/*-- price range End --*/
	
	
	// product-details-active
	$('.product-details-active').owlCarousel({
        smartSpeed:1000,
        margin:0,
		loop:true,
        nav:false,
        navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        URLhashListener:true,
        startPosition: 'URLHash',
        responsive:{
            0:{
                items:1
            },
            450:{
                items:1
            },
            678:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
	
	// thamb-active
	$(".thamb-active").owlCarousel({
		loop: true,
		margin:10,
		items: 1,
		center:true,
		nav: true,
		autoplayHoverPause: false,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsive:{
            0:{
                items:2
            },
            450:{
                items:2
            },
            678:{
                items:3
            },
            1000:{
                items:3
            }
        }
	});
	
	// about-active
	$(".about-active").owlCarousel({
		loop: true,
		margin:10,
		items: 1,
		center:true,
		nav: true,
		autoplayHoverPause: false,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsive:{
            0:{
                items:1
            },
            450:{
                items:1
            },
            678:{
                items:1
            },
            1000:{
                items:1
            }
        }
	});
	
	
	// blog-active
	$(".blog-active").owlCarousel({
		loop: true,
		margin:10,
		items: 1,
		center:true,
		nav: true,
		autoplayHoverPause: false,
		navText:['<i class="fa fa-caret-left"></i>','<i class="fa fa-caret-right"></i>'],
		responsive:{
            0:{
                items:1
            },
            450:{
                items:1
            },
            678:{
                items:1
            },
            1000:{
                items:1
            }
        }
	});
	
	/*---------------------
	// Ajax Contact Form
	--------------------- */

	$('.cf-msg').hide();
		$('form#cf button#submit').on('click', function() {
			var fname = $('#fname').val();
			var subject = $('#subject').val();
			var email = $('#email').val();
			var msg = $('#msg').val();
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

			if (!regex.test(email)) {
				alert('Please enter valid email');
				return false;
			}

			fname = $.trim(fname);
			subject = $.trim(subject);
			email = $.trim(email);
			msg = $.trim(msg);

			if (fname != '' && email != '' && msg != '') {
				var values = "fname=" + fname + "&subject=" + subject + "&email=" + email + " &msg=" + msg;
				$.ajax({
					type: "POST",
					url: "mail.php",
					data: values,
					success: function() {
						$('#fname').val('');
						$('#subject').val('');
						$('#email').val('');
						$('#msg').val('');

						$('.cf-msg').fadeIn().html('<div class="alert alert-success"><strong>Success!</strong> Email has been sent successfully.</div>');
						setTimeout(function() {
							$('.cf-msg').fadeOut('slow');
						}, 4000);
					}
				});
			} else {
				$('.cf-msg').fadeIn().html('<div class="alert alert-danger"><strong>Warning!</strong> Please fillup the informations correctly.</div>')
			}
			return false;
	});
	
	/*--------------------------
	 scrollUp
	---------------------------- */	
	$.scrollUp({
		scrollText: '<i class="fa fa-arrow-up"></i>',
		easingType: 'linear',
		scrollSpeed: 900,
		animation: 'fade'
	});
	
	
})(jQuery); 