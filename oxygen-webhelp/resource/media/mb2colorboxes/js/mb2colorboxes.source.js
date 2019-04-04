/**
 * @package		Mb2 Color Boxes
 * @version		1.1.1
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2015 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/



// v 1.0
// SimpleParallax jQuery Plugin 
// author: https://github.com/gelevanog
// MIT License

"use strict";
(function($, window, document, undefined) {
	var pluginName = "simpleParallax",
		wHeight = $(window).height(),
		defaults = {
			speed: 0.25,
			lpos: 'left'
		};

	function Plugin(element, options) {
		this.element = element;
		this.options = $.extend({}, defaults, options);
		this.init();
	}
	
	Plugin.prototype = {
		init: function() {
			var self = this,
				element = self.element,
				metaData = {
					speed: $(element).data("speed") || self.options.speed					
				},
				options = $.extend(self.options, metaData);
			$(document).on({
				scroll: function() {
					self.setYposition(element, options);
				}
			});
			self.setYposition(element, options);
		},
		setYposition: function(element, options) {
			var scrollTop = $(window).scrollTop(),
				offsetTop = $(element).offset().top,
				elementHeight = $(element).outerHeight(),
				yPosition = Math.round((offsetTop - scrollTop) * options.speed);
			if (offsetTop + elementHeight <= scrollTop || offsetTop >= scrollTop + wHeight) return;
			$(element).css({
				"background-attachment": "fixed",
				"background-repeat": "no-repeat",
				"position": "relative",
				"background-position": options.lpos + " " + yPosition + "px"
			});
		}
	};
	$.fn[pluginName] = function(options) {
		return this.each(function() {
			$.data(this, new Plugin(this, options));
		});
	};
})(jQuery, window, document);






jQuery(document).ready(function($){


	$('.mb2cboxes').each(function(){	
	
		
	
		
		var mod_obj = $(this);
		var htop = mod_obj.data('htop');
		
		
		var showcase_item = $(this).find('.mb2cboxes-item');
		
		
		showcase_item.hover(
			function(){
				
				$(this).stop().animate({top: 0}, 150);
				$(this).find('.mb2cboxes-article-introtext').stop().animate({marginTop:0}, 250);	
				
			},
			function(){
				
				$(this).stop().animate({top: htop+'px'}, 150);
				$(this).find('.mb2cboxes-article-introtext').stop().animate({marginTop:'200px'}, 250);
				
			}		
		);
		
		
		
		// Add parallax effect
		var ismobile = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
		
		if (!ismobile)
		{
			if ($(this).hasClass('mb2cboxes-parallax'))
			{
				
				
				var parspeed = mod_obj.data('speed');
				var parlpos = mod_obj.data('lbg');
				
				
				$('.mb2cboxes-parallax').simpleParallax({
					speed: parspeed,
					lpos: parlpos					
				});
				
			}
		}
		
		
	
	
	
	});
	
	
	
	
});

