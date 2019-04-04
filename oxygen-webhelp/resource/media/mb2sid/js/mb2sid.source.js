/* Player API plugin (for pause vimeo video): https://github.com/vimeo/player-api/tree/master/javascript */
var Froogaloop=function(){function e(a){return new e.fn.init(a)}function g(a,c,b){if(!b.contentWindow.postMessage)return!1;a=JSON.stringify({method:a,value:c});b.contentWindow.postMessage(a,h)}function l(a){var c,b;try{c=JSON.parse(a.data),b=c.event||c.method}catch(e){}"ready"!=b||k||(k=!0);if(!/^https?:\/\/player.vimeo.com/.test(a.origin))return!1;"*"===h&&(h=a.origin);a=c.value;var m=c.data,f=""===f?null:c.player_id;c=f?d[f][b]:d[b];b=[];if(!c)return!1;void 0!==a&&b.push(a);m&&b.push(m);f&&b.push(f);
return 0<b.length?c.apply(null,b):c.call()}function n(a,c,b){b?(d[b]||(d[b]={}),d[b][a]=c):d[a]=c}var d={},k=!1,h="*";e.fn=e.prototype={element:null,init:function(a){"string"===typeof a&&(a=document.getElementById(a));this.element=a;return this},api:function(a,c){if(!this.element||!a)return!1;var b=this.element,d=""!==b.id?b.id:null,e=c&&c.constructor&&c.call&&c.apply?null:c,f=c&&c.constructor&&c.call&&c.apply?c:null;f&&n(a,f,d);g(a,e,b);return this},addEvent:function(a,c){if(!this.element)return!1;
var b=this.element,d=""!==b.id?b.id:null;n(a,c,d);"ready"!=a?g("addEventListener",a,b):"ready"==a&&k&&c.call(null,d);return this},removeEvent:function(a){if(!this.element)return!1;var c=this.element,b=""!==c.id?c.id:null;a:{if(b&&d[b]){if(!d[b][a]){b=!1;break a}d[b][a]=null}else{if(!d[a]){b=!1;break a}d[a]=null}b=!0}"ready"!=a&&b&&g("removeEventListener",a,c)}};e.fn.init.prototype=e.fn;window.addEventListener?window.addEventListener("message",l,!1):window.attachEvent("onmessage",l);return window.Froogaloop=
window.$f=e}();

/*
* FlowType.JS v1.1
* Copyright 2013-2014, Simple Focus http://simplefocus.com/
*
* FlowType.JS by Simple Focus (http://simplefocus.com/)
* is licensed under the MIT License. Read a copy of the
* license in the LICENSE.txt file or at
* http://choosealicense.com/licenses/mit
*
* Thanks to Giovanni Difeterici (http://www.gdifeterici.com/)
*/

(function($) {
   $.fn.flowtype = function(options) {

// Establish default settings/variables
// ====================================
      var settings = $.extend({
         maximum   : 9999,
         minimum   : 1,
         maxFont   : 9999,
         minFont   : 8,
         fontRatio : 35
      }, options),

// Do the magic math
// =================
      changes = function(el) {
         var $el = $(el),
            elw = $el.width(),
            width = elw > settings.maximum ? settings.maximum : elw < settings.minimum ? settings.minimum : elw,
            fontBase = width / settings.fontRatio,
            fontSize = fontBase > settings.maxFont ? settings.maxFont : fontBase < settings.minFont ? settings.minFont : fontBase;
         $el.css('font-size', fontSize + 'px');
      };

// Make the magic visible
// ======================
      return this.each(function() {
      // Context for resize callback
         var that = this;
      // Make changes upon resize
         $(window).resize(function(){changes(that);});
      // Set changes on load
         changes(this);
      });
   };
}(jQuery));

/**
 * @package		Mb2 Slider in Devices
 * @version		1.0.1
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2015 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/
jQuery(document).ready(function($){
	
	
	
	
	
	$('.mb2sid-slider').each(function(){
		
		
		var container = $(this);
		var innerContainer = container.find('> .mb2sid-inner');	
		var slideBox = innerContainer.find('.mb2sid-slide-item');			
		var containerBaseWidth = container.data('width');	
		var containerHeight = container.data('height');		
		var screenWidth = container.data('swidth');
		var screenHeight = container.data('sheight');
		var leftPos = container.data('sleft');
		var topPos = container.data('stop');
		var windowWidth = container.parent().width();//(window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth);
	
		
		
		getContainerSize(container,innerContainer,containerBaseWidth,containerHeight,screenWidth,screenHeight,topPos,leftPos,windowWidth);
		
		$(window).resize(function(){
			
			var rwindowWidth = container.parent().width();//(window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth);			
			
			getContainerSize(container,innerContainer,containerBaseWidth,containerHeight,screenWidth,screenHeight,topPos,leftPos,rwindowWidth);
			
		});		
		
		
		function getContainerSize(cc,ic,cbw,ch,sw,sh,tp,lp,ww)
		{
			
						
				
			
			if (ww<=cbw)
			{
				
				var newHeight = (ww*ch);		
			
				var screenWidth = (ww*sw);
				var screenHeight = (newHeight*sh);
				
				var screenLp = (ww*lp);
				var screenTp = (newHeight*tp);
				
								
				
				
				cc.css({width:ww, height:newHeight});
				ic.css({width:screenWidth, height:screenHeight, left: screenLp, top:screenTp });
				slideBox.css({width:screenWidth, height:screenHeight});
				//$('.mb2sid-iframe').css({width:(screenWidth+15), height:screenHeight, left: screenLp, top:screenTp });
			}
			else 
			{
				
				var sTopPos = (tp*(ch*cbw));
				var sLeftPos = (lp*cbw);
				
				var containerHeight = (cbw*ch);
				
				var screenWidth = (cbw*sw);
				var screenHeight = ((cbw*ch)*sh);
				
				
				cc.css({width:cbw, height:containerHeight});
				ic.css({width:screenWidth, height:screenHeight, left: sLeftPos, top: sTopPos});
				slideBox.css({width:screenWidth, height:screenHeight});	
				//$('.mb2sid-iframe').css({width:(screenWidth+15), height:screenHeight, left: sLeftPos, top: sTopPos});	
			}		
			
				
		}
		
		
		
		
		
		
		
	});
	
	
	
	
	var prevSlide = null;
	
	$('.mb2sid-slide-list').each(function(){
		
		var slideList = $(this);		
		var slideMode = slideList.data('mode');
		var slideAuto = slideList.data('auto')==1 ? true : false;
		var slideSpeed = slideList.data('aspeed');
		var slidePause = slideList.data('apause');
		var slideLoop = slideList.data('loop')==1 ? true : false;
		var slidePager = slideList.data('pager')==1 ? true : false;
		var slideControls = slideList.data('control')==1 ? true : false;
		var slideLstItem = slideList.find('> li');
		var slideVertical = slideList.data('vertical')==1 ? true : false;
		var slideVerticalHeight = slideList.data('verh');
		
				
		var prevClass = slideVertical ? 'mb2sid_icon-up-open' : 'mb2sid_icon-left-open';
		var nextClass = slideVertical ? 'mb2sid_icon-down-open' : 'mb2sid_icon-right-open';
	
		
		slideList.lightSlider({
			
			item: 1,
			autoWidth: false,
			slideMove: 1, // slidemove will be 1 if loop is true
			slideMargin: 0,
	 
			addClass: '',
			mode: slideMode,
			useCSS: true,
			cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
			easing: 'linear', //'for jquery animation',////
	 
			speed: slideSpeed, //ms'
			auto: slideAuto,
			loop: slideLoop,
			slideEndAnimation: true,
			pause: slidePause,
	 
			keyPress: false,
			controls: slideControls,
			prevHtml: '<span class="'+prevClass+'"></span>',
			nextHtml: '<span class="'+nextClass+'"></span>',
	 
			rtl:false,
			adaptiveHeight:false,
	 
			vertical:slideVertical,
			verticalHeight:slideVerticalHeight,
			vThumbWidth:100,
			pauseOnHover:true,
	 
			thumbItem:10,
			pager: slidePager,
			gallery: false,
			galleryMargin: 5,
			thumbMargin: 5,
			currentPagerPosition: 'middle',
	 
			enableTouch:true,
			enableDrag:true,
			freeMove:true,
			swipeThreshold: 40,
	 
			responsive : [],
	 
			onBeforeStart: function (el) {},
			onSliderLoad: function (el) {},
			onAfterSlide: function (el) {prevSlide = slideList.getCurrentSlideCount();},
			onBeforeSlide: function (el) {pauseVideoPlayer()},
			onBeforeNextSlide: function (el) {},
			onBeforePrevSlide: function (el) {}	
			
		});
		
		
		

			function pauseVideoPlayer() {
			
			
				if (prevSlide == 'undefined')
				{
					var prevSlide = null;	
				}
			
				if (prevSlide) {
					console.log(prevSlide)
					var youtubePlayer = slideLstItem.eq(prevSlide - 1).find('.mb2sid-youtube').get(0),
					vimeoPlayer = slideLstItem.eq(prevSlide - 1).find('.mb2sid-vimeo').get(0);
					console.log(vimeoPlayer)
					if (youtubePlayer) {
						youtubePlayer.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
					} else if (vimeoPlayer) {
						$f(vimeoPlayer).api("pause");
					}
				}
			}


	
	});
	
		
	// make caption text responsive
	
	$('.mb2sid-caption').each(function(){
		
		var caption = $(this);
		var fratio = caption.data('fratio');
		
		$('.mb2sid-caption').flowtype({			
			fontRatio : fratio		
		});
		
	});
	

	
	
});