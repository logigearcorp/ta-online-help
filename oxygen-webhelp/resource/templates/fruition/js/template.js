/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


(function($){
	"use strict";
	var fn = {
		verticalCentering:function(target,shift){
			shift = shift || 0;
			if(typeof target === 'number'){
				shift = target;
				target = undefined;
			}
			var $self = $(this), $target = ((target === undefined) ? $self.parent() : $(target));
			var i = 0,length = $self.length;
			$self.each(function(){
				$self = $(this);
				var selfHeight = $self.outerHeight(),targetHeight = $target.innerHeight();
				if(targetHeight > selfHeight){
					$self
						.css({
							marginTop:(targetHeight - selfHeight)/2 + shift
						});
				}
			});
			return this;
		}
	};
	$.fn.extend(fn);
})(jQuery);




// v 1.0
// SimpleParallax jQuery Plugin 
// author: https://github.com/gelevanog
// MIT License

"use strict";
(function($, window, document, undefined) {
	
	var wheight = (window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight);
	
	var pluginName = "sparallax",
		wHeight = wheight,
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





function hasScrollbar() {
  	
	
	// The Modern solution
	if (typeof window.innerWidth === 'number')
    return window.innerWidth > document.documentElement.clientWidth

  	
	// rootElem for quirksmode
 	 var rootElem = document.documentElement || document.body

  	
	// Check overflow style property on body for fauxscrollbars
  	var overflowStyle

  	
	if (typeof rootElem.currentStyle !== 'undefined')
    overflowStyle = rootElem.currentStyle.overflow

  	
	overflowStyle = overflowStyle || window.getComputedStyle(rootElem, '').overflow

    
	// Also need to check the Y axis overflow
  	var overflowYStyle

  	if (typeof rootElem.currentStyle !== 'undefined')
    overflowYStyle = rootElem.currentStyle.overflowY

  	
	overflowYStyle = overflowYStyle || window.getComputedStyle(rootElem, '').overflowY

  	
	var contentOverflows = rootElem.scrollHeight > rootElem.clientHeight
  	var overflowShown    = /^(visible|auto)$/.test(overflowStyle) || /^(visible|auto)$/.test(overflowYStyle)
  	var alwaysShowScroll = overflowStyle === 'scroll' || overflowYStyle === 'scroll'

  	return (contentOverflows && overflowShown) || (alwaysShowScroll)
	
	
}



(function($){$(window).load(function(){	

	
	
	
	
	/*-----------------------------------------------------------*/
	/*	Make vertical alignment section content
	/*-----------------------------------------------------------*/
	
	$('.vertical-align').each(function(){		
		
		var wrap = $(this);
		var colContent = wrap.find('.tcol');		
		colContent.verticalCentering();
		
	});	
	
		
	
	
	
	/*-----------------------------------------------------------*/
	/*	Make transparent header
	/*-----------------------------------------------------------*/
		
	
	makeTransparentHeader();		
	
	$(window).on('resize',function(){
		makeTransparentHeader();
	});
	
	
	function makeTransparentHeader(wrap,heightDiv,moveDiv)	
	{
		
		var wrap = $('body');
		var heightDiv = wrap.hasClass('header-style10') ? $('#main-navigation') : $('#page-a');
		var moveDiv = $('#page-a');
		
			
		if (wrap.hasClass('header-transparent') || wrap.hasClass('header-style10'))
		{	
			
			var headerFrameMargin = (wrap.hasClass('ltype_frame')) ? 20 : 0;		
			var headerMargin = (wrap.hasClass('header-fixw') && !wrap.hasClass('header-style10')) ? 30 : 0;		
			
			
			moveDiv.css('bottom','-' + Math.ceil(heightDiv.height() + headerMargin) + 'px');
			wrap.find('#page').css('margin-top','-' + Math.ceil(heightDiv.height() + headerMargin-headerFrameMargin) + 'px')
		
		}			
			
	}
	
	
	
	
	
	
	
	
	
	
	/*-----------------------------------------------------------*/
	/*	Set height for 'half columns'
	/*-----------------------------------------------------------*/
	
	makeHalColumns();
	sameHeightColumns();	
		
	$(window).on('resize',function(){	
		makeHalColumns();
		sameHeightColumns();
	});
	
	
	function makeHalColumns()
	{		
		
		var col = $('.halfcol');
		var parent = col.parent();
		var colEmpty = parent.find('> .fheight');
		var colNoempty = parent.find('> .no-fheight');
		var windowWidth = (window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth);
			
		if (windowWidth>768)
		{		
			colEmpty.css({height:colNoempty.outerHeight(true)});			
		}
		else
		{
			colEmpty.css({height:'auto'});	
		}
		
	}
	
	
	
	
	function sameHeightColumns()
	{
				
		$('.mb2pb-section .cempty').each(function(){
			
			var row = $(this).parent();
			var colHeight = row.find('.cnoempty');
			var colNoHeight = row.find('.cempty > div'); 
			var windowWidth = (window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth);	
			
			if (windowWidth>768)
			{				
				colNoHeight.css({height:colHeight.outerHeight(true)});							
			}
			else
			{
				colNoHeight.css({height:'auto'});	
			}
			
			
		});	
		
	}
	
	
	
	
	
	
	
	
	
	
	/*-----------------------------------------------------------*/
	/*	Set paralax sections background
	/*-----------------------------------------------------------*/
	
	$('.section-parallax').each(function(){			
		
		var section = $(this);		
		var is_aspeed = section.data('aspeed');
		var is_lpos = section.data('lpos');
		
		// Add parallax effect
		var ismobile = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
		
		if (!ismobile)
		{				
			section.sparallax({
				speed: is_aspeed,
				lpos: is_lpos	
			});
		}
		
	});
	
	

})})(jQuery);






jQuery(document).ready(function($){

	
	

	/*-----------------------------------------------------------*/
	/*	Make slide toggle Joomla search advanced options
	/*-----------------------------------------------------------*/
	
	$('.search-advanced-link').click(function(e){		
		
		e.preventDefault();
		$('.search-advanced-form').slideToggle(250);
		
	});
	
	
	
	
	/*-----------------------------------------------------------*/
	/*	Hide Joomla system message container
	/*-----------------------------------------------------------*/
	
	$('#system-message').on('click', '.close', function(e){
				
		e.preventDefault();
		$('#system-message').addClass('closed');
		
	});
		
	
	
	
	
	/*-----------------------------------------------------------*/
	/*	Remove tooltip from Joomla pagination
	/*-----------------------------------------------------------*/
	$('.pagination').each(function(){
		
		var pageLink = $(this).find('a');		
		pageLink.removeClass('hasTooltip');			
		
	});
	
	
	
	
	
	
	
	/*-----------------------------------------------------------*/
	/*	Set off-canvas panel
	/*-----------------------------------------------------------*/
	
	function openMobileMenu (mobMenu,overlayDiv) {				
		
		
		if (mobMenu.hasClass('off-canvas-right'))
		{
			mobMenu.stop().animate({right:0},250);
		}
		else
		{			
			mobMenu.stop().animate({left:0},250);
		}
		
		
		overlayDiv.fadeIn(250);
		mobMenu.removeClass('closed');
		mobMenu.addClass('opened');
		
		
		$('body').removeClass('off-canvas-off');
		$('body').addClass('off-canvas-on');			
	}
	
		
	
	function closeMobileMenu (mobMenu,overlayDiv) {	
		
		
		if (mobMenu.hasClass('off-canvas-right'))
		{
			mobMenu.stop().animate({right:-300},250);
		}
		else
		{			
			mobMenu.stop().animate({left:-300},250);
		}
		
		
		overlayDiv.fadeOut(250);
		mobMenu.removeClass('opened');
		mobMenu.addClass('closed');	
		
		
		$('body').removeClass('off-canvas-on');
		$('body').addClass('off-canvas-off');
					
	}
		
	
	function doMobileMenu ()
	{		
		
		var overlayDiv = $('.off-canvas-overlay');
		var mobMenu = $('.off-canvas-panel');		
		
		
		$('body').on('click','.off-canvas-open', function(e){
						
			e.preventDefault();			
			
			if (mobMenu.hasClass('closed'))
			{
				openMobileMenu(mobMenu,overlayDiv);	
			}
			else if (mobMenu.hasClass('opened'))
			{
				closeMobileMenu(mobMenu,overlayDiv);	
			}			
			
		});			
				
	}	
	
	doMobileMenu();
	
	
	
	
	
	
	/*-----------------------------------------------------------*/
	/*	Add responsive class fro body container
	/*-----------------------------------------------------------*/
		
	addResponsiveClass();
	
	$(window).on('resize',function(){
		addResponsiveClass();
	});	
	
	
	function addResponsiveClass(wrap)	
	{		
		
		var wrap = $('body');
			
		var windowWidth = (window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth);
					
		if (windowWidth<=768)
		{				
			
			wrap.removeClass('width-desktop');
			wrap.addClass('width-tablet');
			
		}
		else if (windowWidth>768)
		{
			
			wrap.removeClass('width-tablet');
			wrap.addClass('width-desktop');
			
		}
		
		
		
		
		// Check if is vertical scrollbar
		if (hasScrollbar())
		{
			wrap.removeClass('scroll-off');
			wrap.addClass('scroll-on');	
		}
		else
		{
			wrap.removeClass('scroll-on');
			wrap.addClass('scroll-off');	
		}		
		
						
			
	}
	
	
	
	
	
	
	
	
	/*-----------------------------------------------------------*/
	/*	Init 'Tooltipsy' plugin
	/*-----------------------------------------------------------*/
	
	$('.tmpl-tooltip').each(function(){		
		
		var tt = $(this);		
		var place = tt.data('placement');
		
		
		var cls1 = 'tmpl-tt';	
		
		if (place == 'bottom')
		{
			var cls2 = ' tt-bottom';
			var ttpos = [0,10];			
		}
		else if (place == 'left')
		{
			var cls2 = ' tt-left';
			var ttpos = [-10,0];	
		}
		else if (place == 'right')
		{
			var cls2 = ' tt-right';
			var ttpos = [10,0];	
		}
		else
		{
			var cls2 = ' tt-top';
			var ttpos = [0,-10];	
		}
		
		
		tt.tooltipsy({
			className:cls1 + cls2,
			offset: ttpos,
			delay: 100
		});
		
	});
	
	
	
	
	
	
	/*-----------------------------------------------------------*/
	/*	Some small features
	/*-----------------------------------------------------------*/
	
	// Remove size attribute from input fileds
	$('input').removeAttr('size');
	
	
	// Remove cols attribute from textarea fileds
	$('textarea').removeAttr('cols');
	
	
	// Add button class for rapid contact form button
	$('input.rapid_contact.button').addClass('btn btn-primary');
	
	
	// Set display 'inline-block' for language swither parent module
	$('.tmpl-languages').parent().css({'display':'inline-block'});
	
	
	
	
	
	
	
	
	
	
	
	
	/*-----------------------------------------------------------*/
	/*	Open modules in dropdown container
	/*-----------------------------------------------------------*/
		
	$('.mod-dd-link').click(function(e)
	{
		
		$(this).siblings('.mod-dd-container').fadeToggle(100);
		$(this).toggleClass('active');
		e.preventDefault();	
		
	});
	
	
	
	
	
	
	
	/*-----------------------------------------------------------*/
	/*	Add class to body container if shortcode section is
	/*-----------------------------------------------------------*/
	
	var shortcodeSection = $('#main-content').find('.mb2pb-section');
	
	if (shortcodeSection.length !== 0)
	{
		$('body').addClass('issection');
		$('#main-content > div > div').removeClass();
		$('#main-content > div > div > div').removeClass();	
		$('#main-content > div > div > div > div').removeClass();
	}
	
	
	
	
	
	/*-----------------------------------------------------------*/
	/*	Make fixed navigation
	/*-----------------------------------------------------------*/
	
	// Make fixed navigation 
	setTimeout(function(){
		makeFixedNavigation(),10
	});	
		
	$(window).scroll(function(){		
		makeFixedNavigation();		
	});	
		
		
	function makeFixedNavigation()
	{
			
		// Define basic variables
		var win = $(window);
		var fixedWrap = $('body');		
		var fixedHeader = $('#main-header');
		var fixedNav = $('#main-navigation');
		var fixedEl = fixedWrap.hasClass('mpos_main-nav') ? fixedNav : fixedHeader;
		var fixedElWrap = fixedEl.parent();
		var offsetEl = $('.fixed-nav-element-offset');
		var elOffset = offsetEl.offset().top;
		var fixElHeight = fixedEl.outerHeight(true);
			
			
		// Fixed navigation element
		// Check if body has 'fixed-nav' class
		if (!fixedHeader.hasClass('normal-nav-element'))			
		{			
				
			// Find fixed element
			// Header or main navigation bar			
			// If window scrollTp is the same as fixed element offset top
			// add fixed class to the fixed element
			if (win.scrollTop() > elOffset)
			{															
				fixedEl.addClass('fixed-nav-element');
				fixedEl.css({position:'fixed'});
				offsetEl.css({'height':fixElHeight});					
			}
			else
			{
				fixedEl.removeClass('fixed-nav-element');
				offsetEl.css({'height':0});	
				fixedEl.css({position:'relative'});
			}
							
		}
	}	
	
	

});//end