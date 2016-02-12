define(['jquery','navgoco','owlcarousel','cslider','fancybox','bootstrap','modernizr'], function($, navgoco, owlCarousel, cslider, fancybox)
{
	return new function(){
		var self = this;
		self.run = function(){
			// BACK TO TOP
			$('.back-top').click(function(e) { 
				$('body, html').animate({scrollTop:$('header').offset().top}, 1000); 
				event.preventDefault(); 
			});

			// BEST SELLING
			$('#single-product').owlCarousel({
				itemsCustom : [
					[350, 1],
					[350, 2],
					[600, 3],
					[700, 4],
					[1000, 6],
					[1200, 6],
					[1400, 6]
				],
				navigation : true,
				pagination: false,
				navigationText: false
			});
			
			//THUMB LIST
			$('#thumb-list').owlCarousel({
				itemsCustom : [
					[75, 2],
					[75, 3],
					[75, 4],
				],
				navigation : true,
				pagination: false,
				navigationText: false
			});
			
			$('footer h4.title').click(function() {
				$(this).toggleClass('active');
				$(this).next().slideToggle(250);
			});
			
			$('.fancybox').fancybox({
				padding: 10,
				openEffect : 'elastic',
				openSpeed  : 150,
				closeEffect : 'elastic',
				closeSpeed  : 150
			});

			$('#da-slider').cslider({
				autoplay	: true,
				bgincrement	: 450
			});

			$('.sidey .nav').navgoco();
		};
	}
});