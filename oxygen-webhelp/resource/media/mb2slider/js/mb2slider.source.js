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
 * @package		Mb2 Slider
 * @version		1.4.0
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/
jQuery(document).ready(function($){
	
	
	
	
	
	
	//function setVideoWidth(cv,sc)
//	{		//obj = ob.children().first();
//		var cHeight = sc.children().first().outerHeight(true);
//		var videoWidth = Math.ceil(cHeight*1.78);
//		cv.css({width:videoWidth});	
//	}
//	
//	
//	$('.mb2slider-slide-item.is-video').each(function(){
//		
//		var videoContainer = $(this).find('.mb2slider-video-wrap');
//		var noVideoContainer = videoContainer.parent();
//				
//		setVideoWidth(videoContainer,noVideoContainer);
//				
//		$(window).resize(function(){			
//			setVideoWidth(videoContainer,noVideoContainer);	
//		});
//				
//	});
	
	
	
	var prevSlide = null;
	
	$('.mb2slider-slide-list').each(function(){
		
		var slideList = $(this);	
		var modId = slideList.data('modid');	
		var slideMode = slideList.data('mode');
		var slideAuto = slideList.data('auto')==1 ? true : false;
		var slideSpeed = slideList.data('aspeed');
		var slideItems = slideList.data('items');
		var slideMargin = slideList.data('margin');
		var slideItemsMove = slideList.data('moveitems')>slideItems ? slideItems : slideList.data('moveitems');
		var slidePause = slideList.data('apause');
		var slidesVisible = slideList.data('svisible')==1 ? true : false;
		var slideKeyPress = slideList.data('kpress')==1 ? true : false;
		var slideLoop = slideList.data('loop')==1 ? true : false;
		var slideAheight = slideList.data('aheight')==1 ? true : false;
		var slidePager = slideList.data('pager')==1 ? true : false;
		var slideControls = slideList.data('control')==1 ? true : false;
		var slideLstItem = slideList.find('> li');
		var slideVertical = slideList.data('vertical')==1 ? true : false;
		var slideGallery = slideList.data('gallery')==1 ? true : false;
		var slideVerticalHeight = slideList.data('verh');
		var slideItem = slideList.find('.mb2slider-slide-item');
		var captionDiv = slideItem.find('.mb2slider-caption');
		
		
						
		var prevClass = slideVertical ? 'mb2slider_icon-up-open' : 'mb2slider_icon-left-open';
		var nextClass = slideVertical ? 'mb2slider_icon-down-open' : 'mb2slider_icon-right-open';
				
		var resTabletItems = slideItems>2 ? 2 : slideItems;
		var res = slideItems>1 ? [{breakpoint:768,settings:{item:resTabletItems,slideMove:1}},{breakpoint:480,settings:{item:1,slideMove:1}}] : [];
		
		
		// Slide visible mode
		if (slidesVisible === true)
		{
			slideItems = 2;
			slideLoop = true;
			slideMode = 'slide';
			slideMargin = 0;
			slideItemsMove = 1;	
			res = [];		
		}
		
		
		
		slideList.lightSliderMb2({
			
			slidesVisible: slidesVisible,
			
			item: slideItems,
			autoWidth: false,
			slideMove: slideItemsMove, // slidemove will be 1 if loop is true
			slideMargin: slideMargin,
	 
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
	 
			keyPress: slideKeyPress,
			controls: slideControls,
			prevHtml: '<span class="'+prevClass+'"></span>',
			nextHtml: '<span class="'+nextClass+'"></span>',
	 
			rtl:false,
			adaptiveHeight:slideAheight,
	 
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
	 
			responsive : res,
	 
			onBeforeStart: function (el) {},
			onSliderLoad: function (el) {canim()},
			onAfterSlide: function (el) {canim()},
			onBeforeSlide: function (el) {creanim()},			
			onBeforeNextSlide: function (el) {},
			onBeforePrevSlide: function (el) {},
			onAfterReset: function(el){canim()}	
			
		});
		
		
		
		
		function canim () {			
						
			
			
			var li = $('.mb2slider' + modId + ' .lslide.active'); 
			var caption = li.find('.mb2slider-caption');			
			
			
					
			if (!li.hasClass('active'))
			{
				
				caption.stop().animate({top:15,bottom:-15,opacity:0},0);	
				
				
			}
			else
			{
				if (caption.hasClass('anim1'))
				{
				
					caption.stop().animate({top:0,bottom:0,opacity:1},400);					
				

				}	
			}
			
			
		}
		
		
		function creanim() {			
			var caption = $('.mb2slider' + modId + ' .mb2slider-caption');			
			
			if (caption.hasClass('anim1'))
			{			
				caption.stop().animate({top:15,bottom:-15,opacity:0},150);
			}		
		}
		
		
		
		
		
		

			//function pauseVideoPlayer() {
//			
//			
//				//if (prevSlide == 'undefined' || prevSlide == null)
////				{
////					var prevSlide = 0;	
////				}
//			
//				if (prevSlide) {
//					console.log(prevSlide)
//					var youtubePlayer = slideLstItem.eq(prevSlide - 1).find('.mb2slider-youtube').get(0),
//					vimeoPlayer = slideLstItem.eq(prevSlide - 1).find('.mb2slider-vimeo').get(0);
//					console.log(vimeoPlayer)
//					if (youtubePlayer) {
//						youtubePlayer.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
//					} else if (vimeoPlayer) {
//						$f(vimeoPlayer).api("pause");
//					}
//				}
//			}


	/*
	
	
	command = {
  "event": "command",
  "func": "pauseVideo"
};

//post our command via postMessage
youtube.contentWindow.postMessage(JSON.stringify(command), "*");
	
	
	*/
	
	
	
	
	
	});
	
		
	// make caption text responsive
	
	$('.mb2slider-caption1').each(function(){
		
		var caption = $(this);
		var caption_content = caption;
		var fratio = caption.parent().data('fratio');
		
		caption_content.flowtype({			
			fontRatio : fratio		
		});
		
	});
	
	
	
	
	$(".video-bg").each(function(){
		
		var videoDiv = $(this);
		
		if (videoDiv.parent().parent().parent().hasClass('is-video'))
		{
			videoDiv.YTPlayer();
		}
		
		
		
	});
	
	
	
	
	$('.mb2slider-slide-item-inner').each(function(){

			var parallaxConotainer = $(this);
			
			if (parallaxConotainer.parent().hasClass('is-parallax'))
			{
				parallaxConotainer.jKit('parallax', {
					'strength':'0.25', 
					'axis':'both',
					'scope':'global',
					'detect':'mousemove'
				});
			}
			
			
			
			


	});
	
	
	
	
	
	
	
	
	
	
	
});