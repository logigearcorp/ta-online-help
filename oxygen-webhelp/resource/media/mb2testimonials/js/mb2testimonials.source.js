/**
 * @package		Mb2 Testimonials
 * @version		1.3.10
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2014 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenss)
**/ 
jQuery(document).ready(function($){
	
	
	
	// Toggle readmore button
	$('.mb2testimonials-item').each(function(){		
		
		// Toggle fulltext
		var toggle_btn = $(this).find('.mb2testimonials-fulltext-toggle');
		var caseStudy = $(this).find('.mb2testimonials-fulltext');		
		
		toggle_btn.click(function(e){
			
			caseStudy.slideToggle(100);
			$(this).toggleClass('active');				
			e.preventDefault();			
		});	
	
	});
	
	
	
	
	$('.mb2testimonials-video-link').each(function(){		
		
		if ($(this).hasClass('mb2testimonials-lightbox-link'))
		{
			$('.mb2testimonials-lightbox-link').nivoLightbox();
		}
		
	});
	
	
	
	
	// Toottips
	$('.mb2testimonials-tooltip').tooltipsy({
		className: 'mb2testimonials-tt',
		offset:[0,-10]
	});
	
	
	
	
	// Testimonials slider
	$('.mb2testimonials-mod-wrap').each(function(){
		
		
		
		// Core variables
		var mod = $(this);
		
		
		if (mod.hasClass('mb2testimonials-is-slider'))
		{
		
			var slider = mod.find('.mb2testimonials-slider');
			
			
			var d_mode = mod.data('mode');
			var d_speed = mod.data('speed');
			var d_aheight = mod.data('aheight') == 1 ? true : false;
			var d_pager = mod.data('pager') == 1 ? true : false;
			var d_controls = mod.data('controls') == 1 ? true : false;
			var d_auto = mod.data('auto') == 1 ? true : false;
			var d_pause = mod.data('pause');
			var d_cols = mod.data('cols');
			var d_smargin = mod.data('smargin');
			var d_loop = mod.data('loop') ==  1 ? true : false;
			var d_ver = mod.data('ver') ==  1 ? true : false;
			var d_verh = mod.data('verh');
			
		
			
			slider.lightSlider({
				 item: d_cols,
				 slideMargin: d_smargin,
				 speed: d_speed,
				 mode: d_mode,
				 auto: d_auto,
				 pause: d_pause,
				 responsive : [
					{
						breakpoint:768,
						settings: {
							item: d_cols>=2 ? 2 : 1
						  }
					},
					{
						breakpoint:600,
						settings: {
							item:1,
							slideMove:1
						  }
					}
				],
				 adaptiveHeight:d_aheight,
        		 controls: d_controls,
				 pager: d_pager,
				 prevHtml: '<span class="mb2testimonials-slider-controls prev"><span class="mb2testimonials_icon-left-open-big"></span></span>',
       			nextHtml: '<span class="mb2testimonials-slider-controls next"><span class="mb2testimonials_icon-right-open-big"></span></span>',
				gallery: false,
				pauseOnHover:true,
				loop: d_loop,
				vertical:d_ver,
				verticalHeight:d_verh
			});
		
		
		
		
		
		
		
		}
		
		
	
	});
	
	
	
	
});