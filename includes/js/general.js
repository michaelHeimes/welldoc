(function($) {
$(document).ready(function() {
	
	controller = new ScrollMagic.Controller();
	
	
// jQuery Modal
	if ($('.j-modal-wrap').length) {
		
		$('.j-modal-wrap').each(function() {
			
			var $modalOpen = $(this).find('a.open-modal'); 
			
			var $modal = $(this).find('.j-modal'); 
						
			$($modalOpen).click(function(event) {
				$($modal).modal({
				fadeDuration: 250
				});
				return false;	
			});
		
		});
		
	};
		
// Guide Modal on Clinicians Page 
	if ($("#clinicians-form-modal").length) {
		
		$("#clinicians-form-modal").hide();
		
		$(document).on('click', '#clinicans-top-bar button', function () {
			$("#clinicians-form-modal").css('visibility','visible').fadeIn();
			$("body").css('overflow','hidden');
		
		});

		$(document).on('click', '#clinicians-form-modal .mask', function () {
			$("#clinicians-form-modal").fadeOut();
			$("body").css('overflow','visible');
		});		
		
		$(document).bind("gform_confirmation_loaded", function (e, form_id) {
			if(form_id == 11) {
				$("#clinicians-form-modal").fadeOut();
				$("body").css('overflow','visible');
				document.getElementById('guide-dl').click();
			}
		});	

	};
		
		
	
	if($('body').hasClass('home')) {
		
		window.onload = function(){
		var $ease1 = 'Bounce.easeOut';
			
			const tlLeft = new TimelineMax({repeat: 0, delay: 0})
			
			tlLeft
			.to('#l1', 1, {width:"20px", ease: $ease1})
			.to('#l5', 1, {width:"12px", ease: $ease1}, "-=0.9")
			.to('#l2', 1, {width:"13px", ease: $ease1}, "-=0.7")
			.to('#l4', 1, {width:"39px", ease: $ease1}, "-=0.69")
			.to('#l3', 1, {width:"11px", ease: $ease1}, "-=0.85")
			.to('#l6', 1, {width:"19px", ease: $ease1}, "-=1.3")

			tlLeft.play()
			
			const tlRight = new TimelineMax({repeat: 0, delay: 1})
			
			tlRight
			.to('#r10', 1, {width:"38px", ease: $ease1}, "-=0.69")
			.to('#r3', 1, {width:"11px", ease: $ease1}, "-=0.85")
			.to('#r4', 1, {width:"37px", ease: $ease1}, "-=0.69")
			.to('#r2', 1, {width:"14px", ease: $ease1}, "-=1")
			.to('#r12', 1, {width:"23px", ease: $ease1}, "-=0.99")
			.to('#r6', 1, {width:"22px", ease: $ease1}, "-=1.99")
			.to('#r11', 1, {width:"12px", ease: $ease1}, "-=1.09")
			.to('#r9', 1, {width:"12px", ease: $ease1}, "-=1")
			.to('#r5', 1, {width:"11px", ease: $ease1}, "-=1.2")
			.to('#r7', 1, {width:"22px", ease: $ease1}, "-=1")
			.to('#r8', 1, {width:"15px", ease: $ease1}, "-=1.27")

			tlRight.play()
						
		};
			
	};
	
	
// Back Page Line Animation
	if ($(".back-page-animated-lines").length) {
				
		TweenMax.set(".text.white_content_background", {scaleX: 0.95, scaleY: 0.95, boxShadow: '0px 0px 0px 0px rgba(0,0,0,0.60)'})

		window.onload = function(){
			
			
			TweenMax.to(".text.white_content_background", 1, {scaleX: 1, scaleY: 1, boxShadow: '-25px 50px 50px 0px rgba(0,0,0,0.60)', ease: Power2.easeOut})
		
			var $ease1 = 'Bounce.easeOut';
		
			const tlBottom = new TimelineMax({repeat: 0, delay: 0.5})
			
			tlBottom
			.to('#b5', 1, {height:"11px", ease: $ease1})
			.to('#b7', 1, {height:"19px", ease: $ease1}, "-=0.99")
			.to('#b10', 1, {height:"19px", ease: $ease1}, "-=0.99")
			.to('#b2', 1, {height:"30px", ease: $ease1}, "-=0.99")
			.to('#b13', 1, {height:"19px", ease: $ease1}, "-=0.9")
			.to('#b16', 1, {height:"19px", ease: $ease1}, "-=0.7")
			.to('#b6', 1, {height:"11px", ease: $ease1}, "-=0.69")
			.to('#b11', 1, {height:"11px", ease: $ease1}, "-=0.85")
			.to('#b3', 1, {height:"11px", ease: $ease1}, "-=1.4")
			.to('#b15', 1, {height:"7px", ease: $ease1}, "-=1.69")
			.to('#b8', 1, {height:"30px", ease: $ease1}, "-=1.85")
			.to('#b14', 1, {height:"30px", ease: $ease1}, "-=1.69")
			.to('#b12', 1, {height:"11px", ease: $ease1}, "-=1.2")
			.to('#b1', 1, {height:"19px", ease: $ease1}, "-=1.89")
			.to('#b9', 1, {height:"7px", ease: $ease1}, "-=1.39")
			.to('#b4', 1, {height:"19px", ease: $ease1}, "-=1.59")

			tlBottom.play()		
		
		}
		
	}
	
	
	if (window.location.hash) {
		var elem = $('#' + window.location.hash.replace('#', ''));
		$('html, body').animate({
			scrollTop: 0
		}, 0);
		$('html, body').animate({
			scrollTop: elem.offset().top
		}, 2000);
	}
	
	$('#menu-cols > li.menu-item').addClass('col');
	$('#menu-cols > li.menu-item > a').wrap('<h4></h4>');
	
	function mobileCheck() {
		var half = $(window).scrollTop() + $(window).height() / 2;
		
		if ($(".graph-row").length) {
			if (half > $(".graph-row").offset().top) {
				$(".graph-row").addClass("animate");
			};
		}
		if ($(".people-row").length) {
			if (half > $(".people-row").offset().top) {
				$(".people-row").addClass("animate");
			};
		}
		$(".feature-p-row").each(function() {
			if (half > $(this).offset().top) {
				$(this).addClass("animate");
			};
		});
		$(".solutions-row section").each(function() {
			$(this).removeAttr("style");
			$(this).outerHeight($(this).outerHeight());
		});
		$(".support-item.quotes").each(function() {
			if (half > $(this).offset().top) {
				if (-half + $(this).offset().top > -90) {
					$(this).find("blockquote:first-child").css({
						marginTop: -half + $(this).offset().top
					})
				} else {
					$(this).find("blockquote:first-child").css({
						marginTop: -90
					})
				}
			};
		});
		$(".support-item.quotes blockquote").each(function() {
			if ((half+250)> $(this).offset().top) {
				$(this).children(".avatar").addClass("animate");
				$(this).children("cite").addClass("animate");
			} else {
				$(this).children(".avatar").removeClass("animate");
				$(this).children("cite").removeClass("animate");
			}
			if ((half+200)> $(this).offset().top) {
				$(this).children("p").slideDown();
			} else {
				$(this).children("p").slideUp();
			}
		});
	}
		
/*
		$("[data-fancybox]").fancybox({
			toolbar: false,
			smallBtn: true,
			iframe: {
				preload: false
			}
		});
*/
		mobileCheck();
		
		$(window).resize(function() {
			mobileCheck();
			if ($(document).width() > 767) {
				$(".main-menu").attr('style', '');
				$(".main-menu ul").attr('style', '');
				$('body').removeClass('active-menu');
			}
		});
		$(window).scroll(function() {
			mobileCheck();
		});
		$(".menu-trigger").click(function() {
			$("body").toggleClass("active-menu")
			return false
		});
		$(".main-menu li").each(function () {
			if ($(this).find('ul').length) {
				$(this).find('>a').append('<span class="drops"></span>');
			}
		});

		$(".main-menu").on('click', '.drops', function () {
			if ($(this).hasClass("actives")) {
				$(this).removeClass("actives").parent().next().slideUp();
				$(this).parent().parent().removeClass("actives");
			} else {
				$(this).addClass("actives").parent().next().slideDown();
				$(this).parent().parent().addClass("actives");
			}
			return false;
		});
		$(".search-r .trigger").click(function() {
			$(this).parent().toggleClass("active").find("input").focus();
			return false
		});
		$(".solutions-row article a").click(function() {
			$(".solutions-row article").removeClass("slick-center");
			$(this).parent().addClass("slick-center");
			$(this).parent().parent().removeClass("active-0 active-1 active-2").addClass("active-" + $(this).parent().index());
			return false
		});
		$(".sub-cat .current").click(function() {
			$(this).parent().toggleClass("active");
			return false
		});
		$('.reviews-slider .slides .container').slick({
			dots: true,
			arrows: false,
			slidesToShow: 3,
			infinite: true,
			speed: 300,
			variableWidth: true
		}).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
			$('.reviews-slider .count .current').text(nextSlide + 1)
		});
		$('.investors .slides').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			arrows: false,
			dots: false,
			autoplaySpeed: 10000,
		});
		var event = (navigator.userAgent.match(/(iPad|iPhone|iPod)/g)) ? "touchstart" : "click";
		$(document).on(event, function(e) {
			if ($(e.target).closest('.search-r').length === 0) {
				$(".search-r").removeClass("active").find("input").blur();
			}
		});
	
	$('.home .page-head').addClass('animation');
	$('.page-template-page-content-modules .page-head').addClass('animation');
	
	
// 	Media Section Hover Effect
	if ($(".media-section").length) {
		
		$('.single-media-link > .inner').each(function() {
			
			var $wrap = $(this);
			var $link = $(this).find('a');
		
			$($link).hover(function(){
				$($wrap ).toggleClass("hovered");
			});
		
		});
	
	}
	
	
// 		Hide Header on on scroll down
	if ($("header.header").length) {
		var stickyHeader = $('header.sticky-header');
		var didScroll;
		var lastScrollTop = 0;
		var delta = 5;
		var navbarHeight = $(stickyHeader).outerHeight(true);
		var alertForStickyHeight = $('#alert').outerHeight(true) - 10;
		var navAndAlertHeight = navbarHeight + alertForStickyHeight;
					
		$(window).scroll(function(event){
		    didScroll = true;
		});
		
		setInterval(function() {
		    if (didScroll) {
		        hasScrolled();
		        didScroll = false;
		    }
		}, 250);
		
		
		if ($("#alert").length) {
		
			function hasScrolled() {
			    var st = $(this).scrollTop();
			    
			    // Make sure they scroll more than delta
			    if(Math.abs(lastScrollTop - st) <= delta)
			        return;

			    // If they scrolled down and are past the navbar, add class .nav-up.
			    // This is necessary so you never see what is "behind" the navbar.

			    if (st > lastScrollTop && st > navAndAlertHeight){
			        // Scroll Down
			        $(stickyHeader).removeClass('nav-down').addClass('nav-up');				
			    } else {
			        // Scroll Up
			        if(st + $(window).height() < $(document).height()) {
			            $(stickyHeader).removeClass('nav-up').addClass('nav-down');
			        }
			    }
			    
			    lastScrollTop = st;
			}
			
		} else {
			
			function hasScrolled() {
			    var st = $(this).scrollTop();
			    
			    // Make sure they scroll more than delta
			    if(Math.abs(lastScrollTop - st) <= delta)
			        return;

			    // If they scrolled down and are past the navbar, add class .nav-up.
			    // This is necessary so you never see what is "behind" the navbar.

			    if (st > lastScrollTop && st > navbarHeight){
			        // Scroll Down
			        $(stickyHeader).removeClass('nav-down').addClass('nav-up');
			        $(stickyHeader).removeClass('nav-down').addClass('nav-up');
			
			    } else {
			        // Scroll Up
			        if(st + $(window).height() < $(document).height()) {
			            $(stickyHeader).removeClass('nav-up').addClass('nav-down');
			        }
			    }
			    
			    lastScrollTop = st;
			}
			
		}
		
		// Only alow Sticky Header after scroll
		$(window).scroll(function(){                          
		    if ($(this).scrollTop() < 400) {
		        $(stickyHeader).removeClass('nav-down').addClass('nav-up');
		    } 
		});
		
				
	};


// Flexable Content wraps for Fancy Background
	$( ".blue-gradient" ).wrapAll( "<div class='blue-gradient-wrap' />");

	$( ".split-slider-container" ).wrapAll( "<div class='css-blue-gradient-wrap' />");

	$( ".css-blue-gradient" ).wrapAll( "<div class='css-blue-gradient-wrap' />");

	$( ".health-plans-css-blue-gradient" ).wrapAll( "<div class='health-plans-css-blue-gradient-wrap' />");

	
	$( ".blue-gradient-top-bottom" ).wrapAll( "<div class='blue-gradient-top-bottom-wrap' />");
	
		
// 	Cost Savings Calculator
	if ($(".cost-savings-calculator").length) {
		
		$("p.calculator-directions:contains('to the right')").html(function(_, html) {
		   return html.replace(/(to the right)/g, '<span class="hide-for-mobile">$1</span>');
		});
		
		$('#savings-answer > span').html(0);
		
		if ($(".cost-savings-calculator").hasClass('employers-calculator')) {
	
			$('input#numberofemployees').keyup(function(){
			    var numberOfEmployees  = Number($('#numberofemployees').val().replace(/,/g, ''));
			    var multiple = 0.094;
			    var answer = numberOfEmployees * multiple;
			
			    $('#savings-answer > span').html(answer.toLocaleString());
			    
			    $.fn.answer = function(){ 
			    return this.each(function(){ 
			        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
			    }) 
			    
			}
			    
			    var textLength = $('#savings-answer > span').html().length;
			        if (textLength < 7) {
						$('#savings-answer').css('font-size', '41px');
			        } else if (textLength > 7) {
			            $('#savings-answer').css('font-size', '28px');
			        }
			    
			});
			
		}

		if ($(".cost-savings-calculator").hasClass('health-plans-calculator')) {
	
			$('input#numberofemployees').keyup(function(){
			    var numberOfEmployees  = Number($('#numberofemployees').val().replace(/,/g, ''));
			    var multiple = 1928.76;
			    var answer = numberOfEmployees * multiple;
			
			    $('#savings-answer > span').html(answer.toLocaleString());
			    
			    $.fn.answer = function(){ 
			    return this.each(function(){ 
			        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
			    }) 
			    
			}
			    
			    var textLength = $('#savings-answer > span').html().length;
			        if (textLength < 7) {
						$('#savings-answer').css('font-size', '41px');
			        } else if (textLength > 7) {
			            $('#savings-answer').css('font-size', '28px');
			        }
			    
			});
			
		}
		
		
		var tween = TweenMax.fromTo('.cost-savings-calculator .inner', 0.5,
			{scaleX: 0.95, scaleY: 0.95, boxShadow: '0px 0px 0px 0px rgba(0,0,0,0.25)'},
			{scaleX: 1, scaleY: 1, boxShadow: '0 2px 34px 0 rgba(0,0,0,0.25)', ease: Power2.easeOut}
		);
		
		new ScrollMagic.Scene({
			triggerElement: '.cost-savings-calculator .inner',
			triggerHook: 'onCenter',
			reverse: false,
			offset: -200
			})
			.setTween(tween)
			.addTo(controller);

		// 	blue pipe
		var $pipe = $(".cost-savings-calculator").find('.small-pipe');
		if ($($pipe).length) {
			var tween = TweenMax.fromTo($pipe, 0.5,
				{width: 14},
				{width: 73, ease: Power2.easeOut}
			);
			
			new ScrollMagic.Scene({
				triggerElement: ".cost-savings-calculator",
				triggerHook: 'onCenter',
				reverse: false,
				offset: 0
				})
				.setTween(tween)
				.addTo(controller);
		};

	};
	
//
// 	Animations
//	

	var $fadeInUp = $('.fade-in-up');

	if ($($fadeInUp).length) {
		
		$($fadeInUp).each(function() {
			
			var tween = TweenMax.fromTo(this, 0.5,
					{autoAlpha: 0, y:100},
					{autoAlpha: 1, y:0, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onEnter',
					reverse: false,
					offset: 200
					})
					.setTween(tween)
					.addTo(controller);		
		});
		
	};
	

/*
	if ($($fadeIn).length) {
		
		$($fadeIn).each(function() {
			
			var tween = TweenMax.fromTo(this, 0.5,
					{autoAlpha: 0},
					{autoAlpha: 1, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onEnter',
					offset: 200
					})
					.setTween(tween)
					.addTo(controller);		
		});
		
	};	
*/
	
	
/*
	if($('.stagger-up-back').length){
		
		var stagger_projects = new TimelineMax();
		
		stagger_projects
		.staggerFromTo(".stagger-up-back", 1, {y: 70, autoAlpha: 0}, {y: 0, autoAlpha: 1, ease: Back.easeOut}, 0.15);
		
		var scene = new ScrollMagic.Scene({
        triggerElement: '.projects-wrap',
        triggerHook: "onEnter",
        offset: 200
		})
		.setTween(stagger_projects)
		.addTo(controller);
		
		
	};
*/
	
	
// image-text-section Modules
/*
	if ($(".text.white_content_background").length) {
		$(".text.white_content_background").each(function() {
			var tween = TweenMax.fromTo(this, 0.3,
				{scaleX: 0.95, scaleY: 0.95, boxShadow: '0px 0px 0px 0 rgba(0,0,0,0.60)'},
				{scaleX: 1, scaleY: 1, boxShadow: '-25px 50px 50px 0 rgba(0,0,0,0.60)', ease: Power2.easeOut}
			);
			
			new ScrollMagic.Scene({
				triggerElement: this,
				triggerHook: 'onCenter',
				reverse: false,
				offset: -100
				})
				.setTween(tween)
				.addTo(controller);
		});
	};
*/

// text-section Modules Not Centered
	if ($(".text-section.module:not(.centered-heading):not( > .demo_video)").length) {
		$(".text-section.module:not(.centered-heading):not( > .demo_video)").each(function() {
			
			var $heading = $(this).find("h2");
			var $pipe = $(this).find(".text-section-h2-pipe");
			var $text = $(this).find(".copy");
			
			// 	Heading
			if ($($heading).length) {
				var tween = TweenMax.fromTo($heading, 0.5,
					{x: -30, autoAlpha: 0},
					{x: 0, autoAlpha: 1, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onCenter',
					reverse: false,
					reverse: false,
					offset: 0
					})
					.setTween(tween)
					.addTo(controller);
			};
			
			// 	blue pipe
			if ($($pipe).length) {
				var tween = TweenMax.fromTo($pipe, 0.5,
					{width: 14},
					{width: 141, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onCenter',
					reverse: false,
					offset: 0
					})
					.setTween(tween)
					.addTo(controller);
			};
			
			if ($($text).length) {
				var tween = TweenMax.fromTo($text, 0.5,
					{autoAlpha: 0},
					{autoAlpha: 1, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onCenter',
					reverse: false,
					offset: 0
					})
					.setTween(tween)
					.addTo(controller);
			};
			
			
		});
	};


// text-section Modules Centered
	if ($(".text-section.module.centered-heading").length) {
		$(".text-section.module.centered-heading").each(function() {
			
			var $heading = $(this).find("h2");
			var $pipe = $(this).find(".text-section-h2-pipe");
			var $text = $(this).find(".copy");
			
			// 	Heading
			if ($($heading).length) {
				var tween = TweenMax.fromTo($heading, 0.5,
					{y: -30, autoAlpha: 0},
					{y: 0, autoAlpha: 1, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onCenter',
					reverse: false,
					offset: 0
					})
					.setTween(tween)
					.addTo(controller);
			};
			
			// 	blue pipe
			if ($($pipe).length) {
				var tween = TweenMax.fromTo($pipe, 0.5,
					{width: 14},
					{width: 141, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onCenter',
					reverse: false,
					offset: 0
					})
					.setTween(tween)
					.addTo(controller);
			};
			
			// text
			if ($($text).length) {
				var tween = TweenMax.fromTo($text, 0.5,
					{autoAlpha: 0},
					{autoAlpha: 1, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onCenter',
					reverse: false,
					offset: 0
					})
					.setTween(tween)
					.addTo(controller);
			};
			
			
		});
	};
	
	
	
	if ($(".economic-impact-paper").length) {
		$(".economic-impact-paper").each(function() {
			
			var $heading = $(this).find("h3");
			var $pipe = $(this).find(".small-pipe");
			var $text = $(this).find(".copy");

			// 	Heading
			if ($($heading).length) {
				var tween = TweenMax.fromTo($heading, 0.5,
					{x: -30, autoAlpha: 0},
					{x: 0, autoAlpha: 1, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onCenter',
					reverse: false,
					offset: 0
					})
					.setTween(tween)
					.addTo(controller);
			};
			
			// 	blue pipe
			if ($($pipe).length) {
				var tween = TweenMax.fromTo($pipe, 0.5,
					{width: 14},
					{width: 73, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onCenter',
					reverse: false,
					offset: 0
					})
					.setTween(tween)
					.addTo(controller);
			};	
			
			// text
			if ($($text).length) {
				var tween = TweenMax.fromTo($text, 0.5,
					{autoAlpha: 0},
					{autoAlpha: 1, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onCenter',
					reverse: false,
					offset: 0
					})
					.setTween(tween)
					.addTo(controller);
			};		
			
			
						
		});
	};			
			
// image-text-section Modules
	if ($(".image-text-section:not(.centered-heading):not( > .demo_video)").length) {
		$(".image-text-section:not(.centered-heading):not( > .demo_video)").each(function() {	
			
			var $img = $(this).find(".home-image-grid");
			var $heading = $(this).find('h2');
			var $pipe = $(this).find(".image-text-section-h2-pipe");
			var $smallPipe = $(this).find('.small-pipe');
			var $text = $(this).find("p");
						
			var $offset = 300;
					 
			// 	Justified Image Grid
			if ($(".justified_images_w_text").length) {
				
				var tween = new TimelineMax()
				.to(".image-half div:nth-child(1) .mask", 1.1, {left: '100%', ease: Circ.easeInOut}, "-=1")
				.to(".image-half div:nth-child(2) .mask", 1.1, {top: '100%', ease: Circ.easeInOut}, "-=1")
				.to(".image-half div:nth-child(4) .mask", 1.1, {right: '100%', ease: Circ.easeInOut}, "-=1")
				.to(".image-half div:nth-child(3) .mask", 1.1, {bottom: '100%', ease: Circ.easeInOut}, "-=1")				
								
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onEnter',
					reverse: false,
					offset: $offset
					})
					.setTween(tween)
					.addTo(controller);
			};
			
			// Image
			if ($($img).length) {
				var tween = TweenMax.fromTo($img, 0.5,
						{autoAlpha: 0, y:100},
						{autoAlpha: 1, y:0, ease: Power2.easeOut}
					);
					
					new ScrollMagic.Scene({
						triggerElement: this,
						triggerHook: 'onEnter',
						reverse: false,
						offset: $offset
						})
						.setTween(tween)
						.addTo(controller);		
			};
			
			// 	h2 Heading
			if ($($heading).length) {
				var tween = TweenMax.fromTo($heading, 0.5,
					{x: -30, autoAlpha: 0},
					{x: 0, autoAlpha: 1, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onEnter',
					reverse: false,
					offset: $offset
					})
					.setTween(tween)
					.addTo(controller);
			};
			
			// 	blue pipe
			if ($($pipe).length) {
				var tween = TweenMax.fromTo($pipe, 0.5,
					{width: 14},
					{width: 141, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onEnter',
					reverse: false,
					offset: $offset
					})
					.setTween(tween)
					.addTo(controller);
			};
			
			if ($($smallPipe).length) {
				var tween = TweenMax.fromTo($smallPipe, 0.5,
					{width: 14},
					{width: 73, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onEnter',
					reverse: false,
					offset: $offset
					})
					.setTween(tween)
					.addTo(controller);
			};

			if ($($text).length) {
				var tween = TweenMax.fromTo($text, 0.5,
					{autoAlpha: 0},
					{autoAlpha: 1, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onEnter',
					reverse: false,
					offset: $offset
					})
					.setTween(tween)
					.addTo(controller);
			};
			
		});
	};
	
	
	if ($(".demo_video").length) {
		$(".demo_video").each(function() {	
			
			var $offset = 300;
	
			var $heading = $(this).find('h2');
			var $pipe = $(this).find(".image-text-section-h2-pipe");

			// 	h2 Heading
			if ($($heading).length) {
				var tween = TweenMax.fromTo($heading, 0.5,
					{y: -30, autoAlpha: 0},
					{y: 0, autoAlpha: 1, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onEnter',
					reverse: false,
					offset: $offset
					})
					.setTween(tween)
					.addTo(controller);
			};

			// 	blue pipe
			if ($($pipe).length) {
				var tween = TweenMax.fromTo($pipe, 0.5,
					{width: 14},
					{width: 141, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onEnter',
					reverse: false,
					offset: $offset
					})
					.setTween(tween)
					.addTo(controller);
			};			
	
			
		});
	};
	
	
	// Text Quote Blue Pipe
		if ($(".quote-section").length) {
			$(".quote-section").each(function() {	
				
				var $text = $(this).find("p");
				var $pipe = $(this).find(".image-text-section-h2-pipe");

			var tween = TweenMax.fromTo($text, 0.5,
				{autoAlpha: 0},
				{autoAlpha: 1, ease: Power2.easeOut}
			);
			
			new ScrollMagic.Scene({
				triggerElement: this,
				triggerHook: 'onEnter',
				reverse: false,
				offset: 200
				})
				.setTween(tween)
				.addTo(controller);
				
				
			var tween = TweenMax.fromTo($pipe, 0.5,
				{height: 0},
				{height: 14, ease: Power2.easeOut}
			);
			
			new ScrollMagic.Scene({
				triggerElement: this,
				triggerHook: 'onEnter',
				reverse: false,
				offset: 200
				})
				.setTween(tween)
				.addTo(controller);
				
			});	
		};	
		
		
	if ($(".our-team-text").length) {
		$(".our-team-text").each(function() {
			
			var $heading = $(this).find("h3");
			var $pipe = $(this).find(".small-pipe");
			var $text = $(this).find("p");

			// 	Heading
			if ($($heading).length) {
				var tween = TweenMax.fromTo($heading, 0.5,
					{x: -30, autoAlpha: 0},
					{x: 0, autoAlpha: 1, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onCenter',
					reverse: false,
					offset: 0
					})
					.setTween(tween)
					.addTo(controller);
			};
			
			// 	blue pipe
			if ($($pipe).length) {
				var tween = TweenMax.fromTo($pipe, 0.5,
					{width: 14},
					{width: 73, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onCenter',
					reverse: false,
					offset: 0
					})
					.setTween(tween)
					.addTo(controller);
			};	
			
			// text
			if ($($text).length) {
				var tween = TweenMax.fromTo($text, 0.5,
					{autoAlpha: 0},
					{autoAlpha: 1, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onCenter',
					reverse: false,
					offset: 0
					})
					.setTween(tween)
					.addTo(controller);
			};
			
			
					var stagger_cards = new TimelineMax();
				
				stagger_cards
				.staggerFromTo(".our-team .our-team-text ul li", 1, {y: 70, autoAlpha: 0}, {y: 0, autoAlpha: 1, ease: Back.easeOut}, 0.15);
				
					var scene = new ScrollMagic.Scene({
			        triggerElement: '.our-team-text ul',
			        triggerHook: "onCenter",
			        reverse: false,
			        offset: 0
					})
					.setTween(stagger_cards)
					.addTo(controller);
		
			
			
						
			
		});	
			
	};	
		
		
	// Image BG Quote
		if ($(".quote-wrap").length) {
			$(".quote-wrap").each(function() {
				
				var $mask = $(this).find('.quote-bg-mask');
				
				var tween = TweenMax.fromTo($mask, 0.8,
					{autoAlpha: 1},
					{autoAlpha: 0.8, ease: Power2.easeOut}
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onCenter',
					reverse: false,
					offset: 0
					})
					.setTween(tween)
					.addTo(controller);
		
			});	
				
		};	
		
		
	// Three Col Cards
	if($('.three-col-wrap').length){
		$('.three-col-wrap').each(function() {
			
		var $cards = $(this).find(".three-col");
		
		var stagger_cards = new TimelineMax();
				
		stagger_cards
		.staggerFromTo($cards, 1, {y: 70, autoAlpha: 0}, {y: 0, autoAlpha: 1, ease: Back.easeOut}, 0.15);
		
			var scene = new ScrollMagic.Scene({
	        triggerElement: this,
	        triggerHook: "onCenter",
	        reverse: false,
	        offset: -200
			})
			.setTween(stagger_cards)
			.addTo(controller);

			});	
	};


	// Trans Two Col
	if($('.trans-two-col').length){
		$('.trans-two-col').each(function() {
		
		var stagger_two_cards = new TimelineMax();
				
		stagger_two_cards
		.staggerFromTo(".single-trans-card", 1, {x: -70, autoAlpha: 0}, {x: 0, autoAlpha: 1, ease: Power2.easeOut}, 0.15);
		
		var scene = new ScrollMagic.Scene({
        triggerElement: this,
        triggerHook: "onCenter",
        reverse: false,
        offset: -100
		})
		.setTween(stagger_two_cards)
		.addTo(controller);

			});	
	};
		
	// Polaroid Cards
		if($('.three-col-polaroid-cards').length) {
						
			$(".three-col-polaroid-cards").each(function() {	
											
				var tween = TweenMax.staggerFromTo('.three-col-polaroid-cards .single-card .inner', 1, 
				{scaleX: 0.95, scaleY: 0.95, boxShadow: '0px 0px 0px 0 rgba(0,0,0,0.50)'},
				{scaleX: 1, scaleY: 1, boxShadow: '2px 2px 10px 0 rgba(0,0,0,0.50)', ease: Power2.easeOut},
					0.1
				);
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onCenter',
					reverse: false,
					offset: -100
					})
					.setTween(tween)
					.addTo(controller);
					
			});
			
			
			$(".single-pol-card").each(function() {
				
				var cardFlip = new TimelineMax({repeat: 0, delay: 0})
			
				var $this = $(this);
				var $inner = $($this).find('.inner');
				var $front = $($this).find('.front');
				var $back = $($this).find('.back');
				var $button = $($this).find('button');	
				var $mask = $($this).find('.mask');				
				
				cardFlip.set($this, {perspective:1080});
				cardFlip.set($inner, {transformStyle:"preserve-3d"});
				cardFlip.set($back, {rotationY:-180});
				cardFlip.set([$front, $back], {backfaceVisibility:"hidden"});
				
				$($this).on('click', $button, function(e){
					
					$($mask).delay(500).fadeOut(300);
					
					cardFlip.to($inner, 1.2, {rotationY:195, ease: Power2.easeOut})
					cardFlip.to($inner, 1.2, {boxShadow: '0px 2px 10px 0 rgba(0,0,0,0.50)', ease: Power2.easeOut}, '-=1.2')
					cardFlip.to($inner, 1.2, {boxShadow: '4px 2px 10px 0 rgba(0,0,0,0.50)', ease: Power2.easeOut}, '-=0.6')
					cardFlip.to($inner, 0.3, {rotationY:180, ease: Power2.easeIn}, '-=0.6')
					cardFlip.to($inner, 0.3, {boxShadow: '-2px 2px 10px 0 rgba(0,0,0,0.50)', ease: Power2.easeIn}, '-=0.6')

				});
				
			});
			
			
		};


// 		Video Quote
		if($('.video-quote').length) {
			
/*
			$(".video-quote").each(function() {
				
				TweenMax.set(".video-quote.image-text-section .text-half div.small-pipe",{width: 14, left: 'calc(100% - 14px)'})
				
				var tween = new TimelineMax()
				
				.to(".video-quote.image-text-section .text-half div.small-pipe", 1, {left: 'calc(0% - 0px)', width: '100%', ease: Power4.easeOut})
				
				.to(".video-quote.image-text-section .text-half div.small-pipe", 0.6, {left: 'calc(0% - 0px)', right: 'calc(100% - 0px)', width: 43, ease: Power4.easeIn})

				.to(".video-quote.image-text-section .text-half div.small-pipe", 0.25, {left: 'calc(0% - 0px)', right: 'calc(100% - 0px)', width: 73, ease: Power2.easeOut})
				
				new ScrollMagic.Scene({
					triggerElement: this,
					triggerHook: 'onCenter',
					reverse: false,
					offset: -100
					})
					.setTween(tween)
					.addTo(controller);
			});
*/
			
		};



	
// Contact Form Tabs
	if ($("#tabs").length) {
				
		setTimeout(function(){
		
		$("#tabs").fadeIn(300);

		$( "#tabs" ).tabs({
			heightStyle: "auto"
		});
		
		$('#tabs-1.ui-tabs-panel').addClass('show');
		
		$(document).on('click', '.page-template-contact-us .contact-wrap .right ul li a#ui-id-1', function(){
			$('#tabs-1.ui-tabs-panel').addClass('show');
			$('#tabs-2.ui-tabs-panel').removeClass('show');
		});
		
		$(document).on('click', '.page-template-contact-us .contact-wrap .right ul li a#ui-id-2', function(){
			$('#tabs-2.ui-tabs-panel').addClass('show');
			$('#tabs-1.ui-tabs-panel').removeClass('show');
		});
		
		}, .1);
		
	} 

// Logo Slider		
	if ($(".logo-slider").length) {
		$('.logo-slider').slick({
			dots: false,
			arrows: false,
			autoplay: true,
			autoplayspeed: 4000,
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 4
		});
	};
	
	
// Split Slider
	if ($(".split-slider").length) {
		
		 var splitSliderLeft = {
		   slidesToShow: 1,
		   slidesToScroll: 1,
		   arrows: false,
		   autoplay: true,
		   autoplaySpeed: 5000,
		   asNavFor: '.split-slider',
		   dots: true,
		   fade: true,
		   infinite: true
		 };
		 var splitSliderRight = {
		   slidesToShow: 3,
		   arrows: false,
		   centerMode: true,
		   autoplay: true,
		   autoplaySpeed: 7000,
		   slidesToScroll: 1,
		   asNavFor: '.split-slider',
		   speed: 500,
		   focusOnSelect:true,
		   infinite: true
		 };

		 $('.split-slider-left').slick(splitSliderLeft);
		 
		 $('.split-slider-right').slick(splitSliderRight);
	}


// Drag-and-drop-quiz	
	if ($("#quiz-wrap").length) {	
			
		var container = $('#quiz-wrap .container');
		var containerWidth = $('#quiz-wrap .container').width();
		var throwRight = containerWidth - 292;
		
		var popup = $('#instruction-popup');
		


		var tween = TweenMax.staggerFromTo(popup, 1,
			{scaleY: 0.8, scaleX: 0.8, boxShadow: "0px 0px 0px 0px rgba(0, 0, 0, 0.50)"},
			{scaleY: 1, scaleX: 1, boxShadow: "12px 16px 30px 0 rgba(0,0,0,0.50)", ease: Power2.easeOut});
		
		var scene = new ScrollMagic.Scene({
			triggerElement: '#instruction-popup',
			triggerHook: "onEnter",
			offset: 300
		})
		.setTween(tween)
		.addTo(controller);
			
			
		$(document).on('click', '#instruction-popup button', function(){
			TweenMax.to(popup, 0.4, {scaleY: 0.8, scaleX: 0.8, boxShadow: "0px 0px 0px 0px rgba(0, 0, 0, 0.50)"});
			$('#instruction-popup').delay(400).fadeOut();
		});
			
		
		Draggable.create('#drag1', {
		    type: 'x,y',
		    bounds: container,
		    throwProps: true,
			onDragEnd:function() {
				$('#drag1').addClass('dropped');
			},
		    snap: {x: [throwRight],
		           y: [148]}
		             
		});
		
		Draggable.create('#drag2', {
		    type: 'x,y',
		    bounds: container,
		    throwProps: true,
			onDragEnd:function() {
				$('#drag2').addClass('dropped');
			},
		    snap: {x: [throwRight],
		           y: [-74]}
		});
		
		Draggable.create('#drag3', {
		    type: 'x,y',
		    bounds: container,
		    throwProps: true,
			onDragEnd:function() {
				$('#drag3').addClass('dropped');
			},
		    snap: {x: [throwRight],
		           y: [74]}
		});
		
		Draggable.create('#drag4', {
		    type: 'x,y',
		    bounds: container,
		    throwProps: true,
			onDragEnd:function() {
				$('#drag4').addClass('dropped');
			},
		    snap: {x: [throwRight],
		           y: [-148]}
		});
		
	}
	

	
// 		Team Section on Home Page
	if($('#img-card-section').length) {
		
		$('.card-img-wrap').each(function() {
			var imgOffSet = $(this).height();
			var imgScale = TweenMax.fromTo($(this), 1.5, {alpha: 0, scaleX:0.4, scaleY: 0.4, ease: Expo.easeOut}, 
			{alpha: 1, scaleX:1, scaleY: 1, ease: Expo.easeOut});
			
			var scene = new ScrollMagic.Scene({
			triggerElement: this,
			triggerHook: "onEnter",
			offset: imgOffSet * 1.3
			})
			.setTween(imgScale)
			.addTo(controller);
		});
		
			var cardDrag1 = TweenMax.to($('#img-card-section-left > div.card-img-wrap:nth-child(2) > img'), 1.4, {y: '40%', ease:Power1.easeOut}, '-=0.2')
			
			var dragScroll1 = new ScrollMagic.Scene({
			triggerElement: '#img-card-section-left > div.card-img-wrap:nth-child(2) > img',
			triggerHook: "onCenter",
			duration: "100%",
			offset: 0
			})
			.setTween(cardDrag1)
			.addTo(controller);
			
		
			var cardDrag2 = TweenMax.to($('#img-card-section-left > div.card-img-wrap:nth-child(4) > img'), 1.4, {y: '25%', ease:Power1.easeOut}, '-=0.2')
			
			var dragScroll2 = new ScrollMagic.Scene({
			triggerElement: '#img-card-section-left > div.card-img-wrap:nth-child(4) > img',
			triggerHook: "onEnter",
			duration: "100%",
			offset: 0
			})
			.setTween(cardDrag2)
			.addTo(controller);
			
			
			var cardDrag3 = TweenMax.to($('#img-card-section-right > div.card-img-wrap:nth-child(2) > img'), 1.4, {y: '38%', ease:Power1.easeOut}, '-=0.2')
			
			var dragScroll3 = new ScrollMagic.Scene({
			triggerElement: '#img-card-section-right > div.card-img-wrap:nth-child(2) > img',
			triggerHook: "onEnter",
			duration: "100%",
			offset: 0
			})
			.setTween(cardDrag3)
			.addTo(controller);
			
			
			var cardDrag4 = TweenMax.to($('#img-card-section-right > div.card-img-wrap:nth-child(3) > img'), 1.4, {y: '30%', ease:Power1.easeOut}, '-=0.2')
			
			var dragScroll4 = new ScrollMagic.Scene({
			triggerElement: '#img-card-section-right > div.card-img-wrap:nth-child(3) > img',
			triggerHook: "onEnter",
			duration: "100%",
			offset: 0
			})
			.setTween(cardDrag4)
			.addTo(controller);
			
			
			var cardDrag5 = TweenMax.to($('#img-card-section-right > div.card-img-wrap:nth-child(4) > img'), 1.4, {y: '22%', ease:Power1.easeOut}, '-=0.2')
			
			var dragScroll5 = new ScrollMagic.Scene({
			triggerElement: '#img-card-section-right > div.card-img-wrap:nth-child(4) > img',
			triggerHook: "onEnter",
			duration: "100%",
			offset: 0
			})
			.setTween(cardDrag5)
			.addTo(controller);
	
	
	}

	
//      Accordions		
	if( $('.accordion').length ) {
		$( ".accordion" ).accordion({
			heightStyle: "content",
			collapsible: true,
			active: false
		});
	}

	if( $('.closed-accordion').length ) {
		$( ".closed-accordion" ).accordion({
			heightStyle: "content",
			collapsible: true,
			active: false
		});
	}

	if( $('.phone-accordion').length ) {
				
		var $phone = $(".single-accordion-phone");			
		var $phone1 = $(".accordion-phone-wrap > div:first-child");
		var $phone2 = $(".accordion-phone-wrap > div:nth-child(2)");
		var $phone3 = $(".accordion-phone-wrap > div:nth-child(3)");
	
		$('.phone-accordion').accordion({
			heightStyle: "content",
			collapsible: false
		});
		
		$($phone1).show();
		
		$(document).on('click', '.phone-accordion #ui-id-1', function () {
			$($phone1).fadeIn();
			$($phone1).siblings().not($phone1).fadeOut();
		});	
		
		$(document).on('click', '.phone-accordion #ui-id-3', function () {
			$($phone2).fadeIn();
			$($phone2).siblings().not($phone1).fadeOut();
		});	
		
		$(document).on('click', '.phone-accordion #ui-id-5', function () {
			$($phone3).fadeIn();
			$($phone3).siblings().not($phone1).fadeOut();
		});	
		
/*
$( ".ui-accordion-header" ).each(function( index ) {
	
	$(this).fadeIn();
	$(this).siblings(".ui-accordion-header").fadeOut();
	
	console.log(this);
	
});		
	
*/	

		
		
// 		$(".main-menu").on('click', '.drops', function () {
		
/*
		$('.phone-accordion-wrap').on('click', $acc1, function(){
			$($phone1).siblings().fadeOut();
			$($phone1).fadeIn();
			console.log("phone1");
		});

		$('.phone-accordion-wrap').on('click', $acc2, function(){
			$($phone1).siblings().fadeOut();
			$($phone1).fadeIn();
			console.log("phone2");
		});
*/
		
	}
	
	if( $('.hover-accordion').length ) {

        $(".hover-accordion").accordion({
	        header: 'h4',
            heightStyle: "content",
            collapsible: true,
            animate: 400,
            active: false,
            event: "mouseover",
        }).on('mouseleave', function () {
            $(this).accordion("option", "active", false);
  
        });

	}
	
		$('.accordion-third-width .animation-wrap > div:first-child').addClass('show');
	
	
	if( $('.accordion-third-width').length ) {
		
		$(document).on('click', '.accordion-third-width .ui-accordion-header:first-child', function (e) {
			$('.accordion-third-width .animation-wrap > div:first-child').siblings().removeClass('show');
			$('.accordion-third-width .animation-wrap > div:first-child').addClass('show');
		});

		$(document).on('click', '.ui-accordion-header:nth-of-type(2)', function (e) {
			$('.accordion-third-width .animation-wrap > div:nth-child(2)').siblings().removeClass('show');
			$('.accordion-third-width .animation-wrap > div:nth-child(2)').addClass('show');
		});
		
		$(document).on('click', '.ui-accordion-header:nth-of-type(3)', function (e) {
			$('.accordion-third-width .animation-wrap > div:nth-child(3)').siblings().removeClass('show');
			$('.accordion-third-width .animation-wrap > div:nth-child(3)').addClass('show');
		});
		
			
	}
	 
	
// 		Header Alert
	if( $('#alert').length ) {
		var alert = $('#alert');
		var header= $('.header');
		
/*
		function setAlertPosition() {
			alertHeight = $(alert).innerHeight();
				$(alert).css('margin-top', -alertHeight);

			};
			setAlertPosition();
			
		$(header).delay(900).queue(function(next){
		$(alert).css('display', 'block');
		next();
		});
*/
		
		function setBodyMargin() {
			alertHeight2 = $(alert).innerHeight();	

		};
			setBodyMargin();
			
		$(window).resize(function() {
			setBodyMargin();
		});
			
		$( "#alert-close" ).click(function() {
			$(alert).css('margin-top', -alertHeight2).queue(function(next){
			$(alert).delay(1500).fadeOut();
			next();
			});
		});
	};


// 		Pinned Phone Scroll
	if($('#pinned_phone_element').length ) {

		var controller = new ScrollMagic.Controller(); 
		var pinDuration = (544 * 3.2);
		var scrollDuration = (544 * 3);
		var tweenOffset = 544;
		var scrollOffset = -(544 * 3);
			
		var scene = new ScrollMagic.Scene({
		        triggerElement: "#pinned_phone_element",
		        triggerHook: "onLeave",
		        offset: 0,
		        duration: pinDuration
		})
		.setPin('#pinned_phone_element')
		.addTo(controller);
	
		$("#phone-panel-wrap img").each(function () {
			var tween = TweenMax.to($(this), 1, {y: scrollOffset, ease:Linear.easeNone})
	
			var scene = new ScrollMagic.Scene({
			        triggerElement: "#pinned_phone_element",
			        triggerHook: "onLeave",
			        duration: scrollDuration
			})
			.setTween(tween)
			.addTo(controller);
			
		});
		
	
		var scene = new ScrollMagic.Scene({
		        triggerElement: "#pinned_phone_element",
		        triggerHook: "onLeave",
		        offset: (tweenOffset * 0.7),
		        duration: 0
		})
		.setClassToggle( '.single_text_module:first-child', 'slideLeftFade')
		.addTo(controller);
		
		var scene = new ScrollMagic.Scene({
		        triggerElement: "#pinned_phone_element",
		        triggerHook: "onLeave",
		        offset: (tweenOffset * 0.9),
		        duration: (tweenOffset * 0.7)
		})
		.setClassToggle( '.single_text_module:nth-child(2)', 'slideRightFade')
		.addTo(controller);
		
	
		var scene = new ScrollMagic.Scene({
		        triggerElement: "#pinned_phone_element",
		        triggerHook: "onLeave",
		        offset: (tweenOffset * 1.9),
		        duration: (tweenOffset * 1)
		})
		.setClassToggle( '.single_text_module:nth-child(3)', 'slideRightFade')
		.addTo(controller);

		var scene = new ScrollMagic.Scene({
		        triggerElement: "#pinned_phone_element",
		        triggerHook: "onLeave",
		        offset: (tweenOffset * 2.9),
		        duration: (tweenOffset * 1)
		})
		.setClassToggle( '.single_text_module:nth-child(4)', 'slideRightFade')
		.addTo(controller);

	};

	
// 		Multiple Conditions Phone 
	if( $('.multiple-conditions-wrap').length ) {	
		
		$('#label_1').addClass('show-label');	
	
		$('.conditions-logo-1').addClass('scaled-up');
	
		$('.conditions-logo-1').on('mouseenter', function() {
		    $('#screen_1.conditions-panel').css('opacity', '1').siblings().not('#screen_1.conditions-panel').css('opacity', '0');
		      
		    $(this).addClass('scaled-up').siblings().removeClass('scaled-up');
		      
		    $('#label_1').addClass('show-label').siblings().removeClass('show-label');
		});
	
		$('.conditions-logo-2').on('mouseenter', function() {
		    $('#screen_2.conditions-panel').css('opacity', '1').siblings().not('#screen_1.conditions-panel').css('opacity', '0');
		      
		    $(this).addClass('scaled-up').siblings().removeClass('scaled-up');
		      
		    $('#label_2').addClass('show-label').siblings().removeClass('show-label');
		});
	
		$('.conditions-logo-3').on('mouseenter', function() {
		    $('#screen_3.conditions-panel').css('opacity', '1').siblings().not('#screen_1.conditions-panel').css('opacity', '0');
		      
		    $(this).addClass('scaled-up').siblings().removeClass('scaled-up');
		      
		    $('#label_3').addClass('show-label').siblings().not('#screen_1.conditions-panel').removeClass('show-label');
		});
		
		$('.conditions-logo-4').on('mouseenter', function() {
		    $('#screen_4.conditions-panel').css('opacity', '1').siblings().not('img#screen_1').css('opacity', '0');
		      
		    $(this).addClass('scaled-up').siblings().removeClass('scaled-up');
		      
		    $('#label_4').addClass('show-label').siblings().removeClass('show-label');
		});
	
	
		$('.conditions-logo-1').on('click', function() {
		    $('#screen_1.conditions-panel').css('opacity', '1').siblings().not('#screen_1.conditions-panel').css('opacity', '0');
		      
		    $(this).addClass('scaled-up').siblings().removeClass('scaled-up');
		      
		    $('#label_1').addClass('show-label').siblings().removeClass('show-label');
		});
	
		$('.conditions-logo-2').on('click', function() {
		    $('#screen_2.conditions-panel').css('opacity', '1').siblings().not('#screen_1.conditions-panel').css('opacity', '0');
		      
		    $(this).addClass('scaled-up').siblings().removeClass('scaled-up');
		      
		    $('#label_2').addClass('show-label').siblings().removeClass('show-label');
		});
	
		$('.conditions-logo-3').on('click', function() {
		    $('#screen_3.conditions-panel').css('opacity', '1').siblings().not('#screen_1.conditions-panel').css('opacity', '0');
		      
		    $(this).addClass('scaled-up').siblings().removeClass('scaled-up');
		      
		    $('#label_3').addClass('show-label').siblings().not('#screen_1.conditions-panel').removeClass('show-label');
		});
		
		$('.conditions-logo-4').on('click', function() {
		    $('#screen_4.conditions-panel').css('opacity', '1').siblings().not('img#screen_1').css('opacity', '0');
		      
		    $(this).addClass('scaled-up').siblings().removeClass('scaled-up');
		      
		    $('#label_4').addClass('show-label').siblings().removeClass('show-label');
		});
	
	
		function screen1(){
		    $('#screen_1.conditions-panel').css('opacity', '1').siblings().not('#screen_1.conditions-panel').css('opacity', '0');
		      
		    $('.conditions-logo-1').addClass('scaled-up').siblings().removeClass('scaled-up');
		      
		    $('#label_1').addClass('show-label').siblings().removeClass('show-label');	
		}
	
		function screen2(){
		    $('#screen_2.conditions-panel').css('opacity', '1').siblings().not('#screen_1.conditions-panel').css('opacity', '0');
		      
		    $('.conditions-logo-2').addClass('scaled-up').siblings().removeClass('scaled-up');
		      
		    $('#label_2').addClass('show-label').siblings().removeClass('show-label');	
		}
	
		function screen3(){
		    $('#screen_3.conditions-panel').css('opacity', '1').siblings().not('#screen_1.conditions-panel').css('opacity', '0');
		      
		    $('.conditions-logo-3').addClass('scaled-up').siblings().removeClass('scaled-up');
		      
		    $('#label_3').addClass('show-label').siblings().removeClass('show-label');	
		}
	
		function screen4(){
		    $('#screen_4.conditions-panel').css('opacity', '1').siblings().not('#screen_1.conditions-panel').css('opacity', '0');
		      
		    $('.conditions-logo-4').addClass('scaled-up').siblings().removeClass('scaled-up');
		      
		    $('#label_4').addClass('show-label').siblings().removeClass('show-label');	
		}
	
	
		screen1();
		
		setTimeout( function() {
			screen2();
		}, 3000);
		
		setTimeout( function() {
			screen3();
		}, 6000);
		
		
		setTimeout( function() {
			screen4();
		}, 9000);
	
		window.setInterval (function () { 
			
			setTimeout(
			  function() 
			  {
			screen1();
			  }, 1);
			
			setTimeout(
			  function() 
			  {
			screen2();
			  }, 3000);
			
			setTimeout(
			  function() 
			  {
			screen3();
			  }, 6000);
			
			
			setTimeout(
			  function() 
			  {
			screen4();
			  }, 9000);
		
		}, 12000);
			
	};


// 		Resoource Slider
	if( $('.testimonial-slider').length ) {	
		$('.testimonial-slider').slick({
			autoplay: true,
			infinite: true,
			slidesToShow: 1,
		    slidesToScroll: 1,
			dots: false,
			arrows: false,
			autoplaySpeed: 4000,
		});
	};


// 		Resoource Slider
	if( $('.resource-slider').length ) {	
		$('.resource-slider').slick({
		  
			nextArrow: '<button class="slick-next"><img src="//www.welldoc.com/wp-content/uploads/2019/05/Resource-right-arrow.svg"/></button>',
			prevArrow: '<button class="slick-prev"><img src="//www.welldoc.com/wp-content/uploads/2019/05/Resource-left-arrow.svg"/></button>',
			adaptiveHeight: true,
			autoplay: false,
			infinite: true,
			slidesToShow: 3,
		    slidesToScroll: 3,
			dots: false,
			responsive: [
			    {
			      breakpoint: 992,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 2,
			        adaptiveHeight: true,
			        infinite: true,
			        centerMode: false
			      }
			    },
			    {
			      breakpoint: 768,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1,
			        adaptiveHeight: true,
			        infinite: true,
			        centerMode: false
			      }
			    }
			  ]
		
		});
	};

	
	
})
})(jQuery);