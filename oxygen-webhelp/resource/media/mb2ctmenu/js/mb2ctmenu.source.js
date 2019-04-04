/**
 * Tabslet | tabs jQuery plugin
 *
 * @copyright Copyright 2015, Dimitris Krestos
 * @license   Apache License, Version 2.0 (http://www.opensource.org/licenses/apache2.0.php)
 * @link      http://vdw.staytuned.gr
 * @version   v1.7.0
 */
!function($,window,undefined){"use strict";$.fn.tabslet=function(options){var defaults={mouseevent:"click",attribute:"href",animation:!1,autorotate:!1,deeplinking:!1,pauseonhover:!0,delay:2e3,active:1,container:!1,controls:{prev:".prev",next:".next"}},options=$.extend(defaults,options);return this.each(function(){var $this=$(this),_cache_li=[],_cache_div=[],_container=options.container?$(options.container):$this,_tabs=_container.find("> div");_tabs.each(function(){_cache_div.push($(this).css("display"))});var elements=$this.find("> ul li"),i=options.active-1;if(!$this.data("tabslet-init")){$this.data("tabslet-init",!0),$this.opts=[],$.map(["mouseevent","attribute","animation","autorotate","deeplinking","deeplinking","pauseonhover","delay","container"],function(t,e){$this.opts[t]=$this.data(t)||options[t]}),$this.opts.active=$this.opts.deeplinking?deep_link():$this.data("active")||options.active,_tabs.hide(),$this.opts.active&&(_tabs.eq($this.opts.active-1).show(),elements.eq($this.opts.active-1).addClass("active"));var fn=eval(function(t,e){var n=e?elements.find("a["+$this.opts.attribute+"="+e+"]").parent():$(this);n.trigger("_before"),elements.removeClass("active"),n.addClass("active"),_tabs.hide(),i=elements.index(n);var o=e||n.find("a").attr($this.opts.attribute);return $this.opts.deeplinking&&(location.hash=o),$this.opts.animation?_container.find(o).animate({opacity:"show"},"slow",function(){n.trigger("_after")}):(_container.find(o).show(),n.trigger("_after")),!1}),init=eval("elements."+$this.opts.mouseevent+"(fn)"),t,forward=function(){i=++i%elements.length,"hover"==$this.opts.mouseevent?elements.eq(i).trigger("mouseenter"):elements.eq(i).click(),$this.opts.autorotate&&(clearTimeout(t),t=setTimeout(forward,$this.opts.delay),$this.mouseover(function(){$this.opts.pauseonhover&&clearTimeout(t)}))};$this.opts.autorotate&&(t=setTimeout(forward,$this.opts.delay),$this.hover(function(){$this.opts.pauseonhover&&clearTimeout(t)},function(){t=setTimeout(forward,$this.opts.delay)}),$this.opts.pauseonhover&&$this.on("mouseleave",function(){clearTimeout(t),t=setTimeout(forward,$this.opts.delay)}));var deep_link=function(){var t=[];elements.find("a").each(function(){t.push($(this).attr($this.opts.attribute))});var e=$.inArray(location.hash,t);return e>-1?e+1:$this.data("active")||options.active},move=function(t){"forward"==t&&(i=++i%elements.length),"backward"==t&&(i=--i%elements.length),elements.eq(i).click()};$this.find(options.controls.next).click(function(){move("forward")}),$this.find(options.controls.prev).click(function(){move("backward")}),$this.on("show",function(t,e){fn(t,e)}),$this.on("next",function(){move("forward")}),$this.on("prev",function(){move("backward")}),$this.on("destroy",function(){$(this).removeData().find("> ul li").each(function(t){$(this).removeClass("active")}),_tabs.each(function(t){$(this).removeAttr("style").css("display",_cache_div[t])})})}})},$(document).ready(function(){$('[data-toggle="tabslet"]').tabslet()})}(jQuery);



/**
 * @package		Mb2 CtMenu
 * @version		1.4.2
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/
jQuery(document).ready(function($){
	
	
	
	
	$('.mb2ctm').each(function(){
		
		
		var menuWrap = $(this);
		var animType = menuWrap.data('anim');
		var animSpeed = menuWrap.data('anim_speed');
		var menuList = $(this).find('.mb2ctm-list');
		var menuTabs= menuList.find('> li .mb2ctm-tabs');
		var openMenuList = $(this).find('.mb2ctm-menu-open');
		var w = (window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth);	
		
		
		
		
		/*-----------------------------------------------------------*/
		/*	Add 'no parent' class for submenu no-mega items 
		/*-----------------------------------------------------------*/
		
		menuList.find('.mb2ctm-isnoparent2').parent().addClass('mb2ctm-noparent-list');
		
		
		
		
		
		
		
		
		
		
		
		
		
		/*-----------------------------------------------------------*/
		/*	Mobile menu open
		/*-----------------------------------------------------------*/
		
		$(document).on('click','.mb2ctm-menu-open', function(e){
			
			menuList.slideToggle(250);
			$(this).toggleClass('active');	
			e.preventDefault();	
			
		});
		
		
		
		
		
		
		
		
		/*-----------------------------------------------------------*/
		/*	Change menu class for mobile and desktop devices
		/*-----------------------------------------------------------*/
		
		sizeClass(menuWrap,menuTabs);
			
		$(window).on('resize',function(){	
				
			sizeClass(menuWrap,menuTabs);
						
		});
		
		
		
		/*-----------------------------------------------------------*/
		/*	Reset menu
		/*-----------------------------------------------------------*/
		resetMenu(menuList);			
		$(window).on('resize',function(){	
				
			resetMenu(menuList);
						
		});
		
		
		
		
		
		/*-----------------------------------------------------------*/
		/*	Init menu tabs
		/*-----------------------------------------------------------*/
		
		$('.mb2ctm-tabs').tabslet({
			
			//mouseevent: menuWrap.hasClass('click-mode') ? 'click' : 'hover',
			mouseevent: 'click',
			attribute: 'data-tab',
			animation: false
			
		});
		
		
		
		
		
		
			
		
		/*-----------------------------------------------------------*/
		/*	Add hover class to menu item when is on hover or click
		/*-----------------------------------------------------------*/
			
		if(menuWrap.hasClass('click-mode'))
		{			
			
			menuWrap.parent().on('click','.desk-menu > ul > li.mb2ctm-isparent',function(e){	
				
				// Close other links
				var otherLinks = $(this).siblings('li');
				//var otherLinks = $(this).parent().find('li.mb2ctm-isparent');
				var mobArrow2 = otherLinks.find('.mb2ctm-parent-open');				
				
				otherLinks.removeClass('mb2ctm-hover')
				mobArrow2.removeClass('active');	
				
				var mobArrow = $(this).find('.mb2ctm-parent-open');										
				$(this).toggleClass('mb2ctm-hover');								
				mobArrow.toggleClass('active');			
				e.preventDefault();					
								
			});	
			
			
			menuWrap.parent().on('click','.desk-menu .mb2ctm-dropdow li.mb2ctm-isparent > a',function(e){	
				
				// Close other links
				var otherLinks = $(this).parent().siblings('li');				
				
				otherLinks.removeClass('mb2ctm-hover')
				
				var mobArrow = $(this).find('.mb2ctm-parent-open');										
				$(this).parent().toggleClass('mb2ctm-hover');			
				e.preventDefault();					
								
			});	
				
			
			menuWrap.parent().on('click','.desk-menu > ul > li .mb2ctm-smenu',function(e){	
									
				e.stopPropagation();				
								
			});			
					
		}
		else if (menuWrap.hasClass('hover-mode'))
		{			
			
			// Init Superfish menu
			menuList.superfish({				
				popUpSelector: 'ul,.mb2ctm-smenu',    
				hoverClass: 'mb2ctm-hover',
				animation: animType == 2 ? {height:'show'} : {opacity:'show'},
				speed: animSpeed,  
  				speedOut: 'fast',
				cssArrows: false	
			});
			
			
			// Make Superfish clickable on small sreen
			menuOnHover(menuList);
						
			$(window).on('resize',function(){
											
				menuOnHover(menuList);
							
			});		
			
			
		}
		
		
		// Open submenu in mobile devices
		menuWrap.parent().on('click','.mob-menu > ul > li .mb2ctm-parent-open',function(e){										
			
			var parent = $(this).parent();	
			var smenu = parent.find('>div');
			smenu.slideToggle(250);						
			parent.toggleClass('mb2ctm-hover');
			$(this).toggleClass('active');
			e.preventDefault();
						
		});	
		
		
		
		
		
			
		
		
		
		
		
	});
	
	
	
	
	
	
	
		
	
	
	
	
	
	
	
	
	
	
	
	

	
});



function sizeClass (el,tel) {
		
	var w = (window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth);
		
	// If is small screen click menu arrow (not list item)
	if (w<=768)
	{					
		el.removeClass('desk-menu');
		el.addClass('mob-menu');
		tel.removeClass('desk-tabs');
		tel.addClass('mob-tabs');				
	}
	else if (w>768)
	{					
		el.removeClass('mob-menu');
		el.addClass('desk-menu');
		tel.addClass('desk-tabs');
		tel.removeClass('mob-tabs');					
	}
			
}	
	
	
	
function menuOnHover (list) {
	
	var w = (window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth);
	
	if (w<=768)
	{					
		list.removeClass('sf-js-enabled');					
	}
	else
	{
		list.addClass('sf-js-enabled');	
	}	
				
}



function resetMenu (list) {
	
	var w = (window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth);
	if (w>768)
	{
		
		var li = list.find('> li.mb2ctm-hover');
		var mobArrow = li.find('.mb2ctm-parent-open');
		var smenuDiv = li.find('> div');
		
		
		li.removeClass('mb2ctm-hover');
		mobArrow.removeClass('active');
		smenuDiv.hide();
	}
				
}


