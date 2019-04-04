/**
 * @package		Mb2 CtMenu
 * @version		1.4.2
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/
function sizeClass(t,e){var i=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth;768>=i?(t.removeClass("desk-menu"),t.addClass("mob-menu"),e.removeClass("desk-tabs"),e.addClass("mob-tabs")):i>768&&(t.removeClass("mob-menu"),t.addClass("desk-menu"),e.addClass("desk-tabs"),e.removeClass("mob-tabs"))}function menuOnHover(t){var e=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth;768>=e?t.removeClass("sf-js-enabled"):t.addClass("sf-js-enabled")}function resetMenu(t){var e=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth;if(e>768){var i=t.find("> li.mb2ctm-hover"),n=i.find(".mb2ctm-parent-open"),s=i.find("> div");i.removeClass("mb2ctm-hover"),n.removeClass("active"),s.hide()}}!function($,window,undefined){"use strict";$.fn.tabslet=function(options){var defaults={mouseevent:"click",attribute:"href",animation:!1,autorotate:!1,deeplinking:!1,pauseonhover:!0,delay:2e3,active:1,container:!1,controls:{prev:".prev",next:".next"}},options=$.extend(defaults,options);return this.each(function(){var $this=$(this),_cache_li=[],_cache_div=[],_container=options.container?$(options.container):$this,_tabs=_container.find("> div");_tabs.each(function(){_cache_div.push($(this).css("display"))});var elements=$this.find("> ul li"),i=options.active-1;if(!$this.data("tabslet-init")){$this.data("tabslet-init",!0),$this.opts=[],$.map(["mouseevent","attribute","animation","autorotate","deeplinking","deeplinking","pauseonhover","delay","container"],function(t,e){$this.opts[t]=$this.data(t)||options[t]}),$this.opts.active=$this.opts.deeplinking?deep_link():$this.data("active")||options.active,_tabs.hide(),$this.opts.active&&(_tabs.eq($this.opts.active-1).show(),elements.eq($this.opts.active-1).addClass("active"));var fn=eval(function(t,e){var n=e?elements.find("a["+$this.opts.attribute+"="+e+"]").parent():$(this);n.trigger("_before"),elements.removeClass("active"),n.addClass("active"),_tabs.hide(),i=elements.index(n);var s=e||n.find("a").attr($this.opts.attribute);return $this.opts.deeplinking&&(location.hash=s),$this.opts.animation?_container.find(s).animate({opacity:"show"},"slow",function(){n.trigger("_after")}):(_container.find(s).show(),n.trigger("_after")),!1}),init=eval("elements."+$this.opts.mouseevent+"(fn)"),t,forward=function(){i=++i%elements.length,"hover"==$this.opts.mouseevent?elements.eq(i).trigger("mouseenter"):elements.eq(i).click(),$this.opts.autorotate&&(clearTimeout(t),t=setTimeout(forward,$this.opts.delay),$this.mouseover(function(){$this.opts.pauseonhover&&clearTimeout(t)}))};$this.opts.autorotate&&(t=setTimeout(forward,$this.opts.delay),$this.hover(function(){$this.opts.pauseonhover&&clearTimeout(t)},function(){t=setTimeout(forward,$this.opts.delay)}),$this.opts.pauseonhover&&$this.on("mouseleave",function(){clearTimeout(t),t=setTimeout(forward,$this.opts.delay)}));var deep_link=function(){var t=[];elements.find("a").each(function(){t.push($(this).attr($this.opts.attribute))});var e=$.inArray(location.hash,t);return e>-1?e+1:$this.data("active")||options.active},move=function(t){"forward"==t&&(i=++i%elements.length),"backward"==t&&(i=--i%elements.length),elements.eq(i).click()};$this.find(options.controls.next).click(function(){move("forward")}),$this.find(options.controls.prev).click(function(){move("backward")}),$this.on("show",function(t,e){fn(t,e)}),$this.on("next",function(){move("forward")}),$this.on("prev",function(){move("backward")}),$this.on("destroy",function(){$(this).removeData().find("> ul li").each(function(t){$(this).removeClass("active")}),_tabs.each(function(t){$(this).removeAttr("style").css("display",_cache_div[t])})})}})},$(document).ready(function(){$('[data-toggle="tabslet"]').tabslet()})}(jQuery),jQuery(document).ready(function(t){t(".mb2ctm").each(function(){var e=t(this),i=e.data("anim"),n=e.data("anim_speed"),s=t(this).find(".mb2ctm-list"),o=s.find("> li .mb2ctm-tabs");t(this).find(".mb2ctm-menu-open"),window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth;s.find(".mb2ctm-isnoparent2").parent().addClass("mb2ctm-noparent-list"),t(document).on("click",".mb2ctm-menu-open",function(e){s.slideToggle(250),t(this).toggleClass("active"),e.preventDefault()}),sizeClass(e,o),t(window).on("resize",function(){sizeClass(e,o)}),resetMenu(s),t(window).on("resize",function(){resetMenu(s)}),t(".mb2ctm-tabs").tabslet({mouseevent:"click",attribute:"data-tab",animation:!1}),e.hasClass("click-mode")?(e.parent().on("click",".desk-menu > ul > li.mb2ctm-isparent",function(e){var i=t(this).siblings("li"),n=i.find(".mb2ctm-parent-open");i.removeClass("mb2ctm-hover"),n.removeClass("active");var s=t(this).find(".mb2ctm-parent-open");t(this).toggleClass("mb2ctm-hover"),s.toggleClass("active"),e.preventDefault()}),e.parent().on("click",".desk-menu .mb2ctm-dropdow li.mb2ctm-isparent > a",function(e){var i=t(this).parent().siblings("li");i.removeClass("mb2ctm-hover");t(this).find(".mb2ctm-parent-open");t(this).parent().toggleClass("mb2ctm-hover"),e.preventDefault()}),e.parent().on("click",".desk-menu > ul > li .mb2ctm-smenu",function(t){t.stopPropagation()})):e.hasClass("hover-mode")&&(s.superfish({popUpSelector:"ul,.mb2ctm-smenu",hoverClass:"mb2ctm-hover",animation:2==i?{height:"show"}:{opacity:"show"},speed:n,speedOut:"fast",cssArrows:!1}),menuOnHover(s),t(window).on("resize",function(){menuOnHover(s)})),e.parent().on("click",".mob-menu > ul > li .mb2ctm-parent-open",function(e){var i=t(this).parent(),n=i.find(">div");n.slideToggle(250),i.toggleClass("mb2ctm-hover"),t(this).toggleClass("active"),e.preventDefault()})})});