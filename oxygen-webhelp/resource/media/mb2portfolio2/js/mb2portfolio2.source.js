/**
 * @package		Mb2 Portfolio2
 * @version		1.2.2
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenss)
**/

/* Player API plugin (for pause vimeo video): https://github.com/vimeo/player-api/tree/master/javascript */
var Froogaloop=function(){function e(a){return new e.fn.init(a)}function g(a,c,b){if(!b.contentWindow.postMessage)return!1;a=JSON.stringify({method:a,value:c});b.contentWindow.postMessage(a,h)}function l(a){var c,b;try{c=JSON.parse(a.data),b=c.event||c.method}catch(e){}"ready"!=b||k||(k=!0);if(!/^https?:\/\/player.vimeo.com/.test(a.origin))return!1;"*"===h&&(h=a.origin);a=c.value;var m=c.data,f=""===f?null:c.player_id;c=f?d[f][b]:d[b];b=[];if(!c)return!1;void 0!==a&&b.push(a);m&&b.push(m);f&&b.push(f);
return 0<b.length?c.apply(null,b):c.call()}function n(a,c,b){b?(d[b]||(d[b]={}),d[b][a]=c):d[a]=c}var d={},k=!1,h="*";e.fn=e.prototype={element:null,init:function(a){"string"===typeof a&&(a=document.getElementById(a));this.element=a;return this},api:function(a,c){if(!this.element||!a)return!1;var b=this.element,d=""!==b.id?b.id:null,e=c&&c.constructor&&c.call&&c.apply?null:c,f=c&&c.constructor&&c.call&&c.apply?c:null;f&&n(a,f,d);g(a,e,b);return this},addEvent:function(a,c){if(!this.element)return!1;
var b=this.element,d=""!==b.id?b.id:null;n(a,c,d);"ready"!=a?g("addEventListener",a,b):"ready"==a&&k&&c.call(null,d);return this},removeEvent:function(a){if(!this.element)return!1;var c=this.element,b=""!==c.id?c.id:null;a:{if(b&&d[b]){if(!d[b][a]){b=!1;break a}d[b][a]=null}else{if(!d[a]){b=!1;break a}d[a]=null}b=!0}"ready"!=a&&b&&g("removeEventListener",a,c)}};e.fn.init.prototype=e.fn;window.addEventListener?window.addEventListener("message",l,!1):window.attachEvent("onmessage",l);return window.Froogaloop=
window.$f=e}();

//jQuery(document).ready(function($){$('.mb2p2-lightbox').on('click',function(){$(this).nivoLightbox();});});



(function($){$(window).load(function(){	

	
	
	$('.mb2p2-items-list').each(function(){
	
		var container = $(this);		
		var limit = container.data('limit');
		var lIsotope = container.data('lisotope');
		var sitePath = $('.mb2p2').data('baseurl');//getUrlParams('mb2portfolio2.js','sitepath');
		
		if (lIsotope == 1)
		{			
			
			container.imagesLoaded(function(){			
			
				var lMode = container.data('lmode');
				var islMode = lMode == 1 ? 'fitRows' : 'masonry';
				
				// Isotope layout		
				container.isotope({
			  
					itemSelector: '.mb2p2-item',
					layoutMode: islMode				  
				});				
				
				// filter items on button click
				$('.mb2p2-filter-list > li > a').on( 'click', function(e) {
					
					var filterValue = $(this).attr('data-filter');
					container.isotope({ filter: filterValue });
					
					e.preventDefault();
					
				});		
		
			});
	
		}
	
		var loadMore = container.data('loadmore');
		
	
		if (loadMore == 1 || loadMore == 2)
		{
		
					
			var nextLink = $('.pagination-next a').attr('href');			
			$('#mb2p2-loadmore a').attr('href', nextLink);
		
			
			container.infinitescroll({ 
				navSelector  : '#mb2p2-loadmore',            
				nextSelector : '#mb2p2-loadmore a',    
				itemSelector : '.mb2p2-items-list .mb2p2-item',
				incrementPage: limit,
				loading: {
					msgText: 'Loading...',
					finishedMsg: 'No items found.',
					img: sitePath + 'media/mb2portfolio2/images/loading.gif'
				},
				
				
			},				
			function( newElements ) {
				
				if (lIsotope == 1)
				{						
					var lMode = container.data('lmode');
					
					var $newElems = $( newElements ).css({ opacity: 0 });
					$newElems.imagesLoaded(function(){
						$newElems.fadeIn().delay(40);
						container.isotope( 'appended', $newElems, true );
					});						
				}					
			});
			
			
			
			if (loadMore == 1)			
			{
				container.infinitescroll('unbind');				
				$('#mb2p2-loadmore a').live('click',function (e) {
					
					e.preventDefault(); 
					container.infinitescroll('retrieve');
					 return false;
				}); 
			}
			
	
		}
	
	
	
	
	
	});
	
	

})})(jQuery);


jQuery(document).ready(function($){
	
	
	
	
	
	
	
	
	// Single item navigation
	// Clone item navigation links and append it to body
	$('.mb2p2-item-navigation').each(function(){
			
		var itemNav = $(this);//.find('.mb2p2-item-navigation');
		var itemNavLinks = itemNav.find('a');
		var clonedItemNavLinks = itemNavLinks.clone().addClass('mb2p2-bodynav');
		
		
		if (itemNav.hasClass('mb2p2-item-navigation3'))
		{
		
			itemNav.hide();
			
			$('body').append(clonedItemNavLinks);
			
			
			// Prev link
			$('.prev.mb2p2-bodynav').hover(
				
				
				
				function(){
					
					$(this).stop().animate({left:0},200);	
				},
				
				function(){
					$(this).stop().animate({left:-210},200);				
				}
			);
			
			
			
			// Next link
			$('.next.mb2p2-bodynav').hover(
			
				function(){
					$(this).stop().animate({right:0},200);	
				},
				
				function(){
					$(this).stop().animate({right:-210},200);				
				}
			);
		
		}
		
		
	});
	
	
	
	
	
	
	
	
	
	
	
	// caption style by click
	//$('.caption-style2 .mb2p2-media-item').live('mouseover',function(){
//		
//		
//		var caption = $(this).find('.mb2p2-caption');
//		var captionBtn = $(this).find('.mb2p2-caption-btn');		
//		var captionCloseBtn = caption.find('.mb2p2-caption-cbtn');
//		
//		
//		captionBtn.click(function(e){
//			
//			caption.fadeIn(250);
//			$(this).hide();			
//			e.preventDefault();	
//			
//		});
//		
//		
//		captionCloseBtn.click(function(e){
//			
//			caption.fadeOut(250);
//			captionBtn.show();			
//			e.preventDefault();	
//			
//		});
//		
//			
//		
//		
//		
//	});
	
	
	
	
	
	
	
	
	
	
	
	
		$('.mb2p2').on('click','.mb2p2-ajax-close',function(e){	
			
			
			var portfolioWrap = $('.mb2p2-ajax-item');
			
			portfolioWrap.stop().animate({height:0},350);
			
			setTimeout(function(){
				portfolioWrap.removeClass('active');
				portfolioWrap.removeAttr('style');
				portfolioWrap.children().empty();
				//portfolioWrap.children().css({'height':0,'padding':0,'margin':0,'opacity':0});
				
			},250);
			
			
			e.preventDefault();	
		});
				
		
		
		// Set height of ajax item container when window is resize		
		$(window).resize(function(){				
			$('.mb2p2-ajax-item').css({height:$('.mb2p2-ajax-item-inner').outerHeight(true)});
		});
			
	
	
		// Portfolio item - ajax link
		$('.mb2p2').on('click','.mb2p2-ajax-link',function(e){
			
			
			var pLink = $(this);
			
			var pId = pLink.data('id');	
			var sitePath = $('.mb2p2').data('baseurl');//getUrlParams('mb2portfolio2.js','sitepath');
			var portfolioDivClose = '<a href="#" class="mb2p2-ajax-close mb2p2_icon-cancel"></a>';
			var portfolioOuterDiv = $('.mb2p2-ajax-item');
			var portfolioDiv = $('.mb2p2-ajax-item-inner');
			
						
				
				$.ajax({
					
					url: sitePath + 'index.php?option=com_mb2portfolio2&amp;view=article&amp;id=' + pId + '&amp;format=raw',
					type: 'get',
					beforeSend: function(){
							//portfolioDiv.show();
							portfolioDiv.parent().append('<div id="infscr-loading"><img src="' + sitePath + 'media/mb2portfolio2/images/loading.gif" alt=""><div>Loading...</div></div>');
													
							
						},
					success: function(response){
						
											
						
						portfolioDiv.html(portfolioDivClose+response);
						portfolioOuterDiv.css({opacity:0});
						
						var imagesCount = portfolioDiv.find('img').length;
						var imagesLoaded = 0;
				
						portfolioDiv.find('img').load( function() {
							++imagesLoaded;
							if (imagesLoaded >= imagesCount){								
								
								setTimeout(function(){
									$('#infscr-loading').remove();
									//portfolioDiv.removeAttr('style');
									portfolioOuterDiv.addClass('active');							
									portfolioOuterDiv.stop().animate({height:portfolioDiv.outerHeight(true),opacity:1},350);									
									$('html,body').animate({scrollTop:portfolioOuterDiv.offset().top-100},350);	
									
								},200);
								
								
							}
						});
				
						
						
						
						
						//var mediaItem = portfolioDiv.find('.mb2p2-media-item');
						
						//mediaItem.imagesLoaded(function(){											
							//portfolioDiv.html(portfolioDivClose+response);	
//							$('#infscr-loading').remove();
//							
//							portfolioOuterDiv.stop().animate({height:portfolioDiv.outerHeight(true)},250);
//							$('html,body').animate({scrollTop:portfolioOuterDiv.offset().top},250);							
						//});
						
						
						
						
							
					}
					
					
				});
				
				
				e.preventDefault();
				
				
			
			
			
			
			
		});


	
	
	
	
	
	
	
		// Module carousel
		$('.mb2p2-items-carousel').each(function(){
			
			var carousel = $(this);
			var anim_type = carousel.data('anim_type');
			var itemNum = carousel.data('col');
			var itemMargin = carousel.data('hgutter');
			var itemMove = carousel.data('move');
			var cnav = carousel.data('cnav') == 1 ? true : false;
			var dnav = carousel.data('dnav') == 1 ? true : false;
			var slideAuto = carousel.data('auto') == 1 ? true : false;
			var slideLoop = carousel.data('loop') == 1 ? true : false;
			var sspeed = carousel.data('sspeed');
			var aspeed = carousel.data('aspeed');
			var auto_height = carousel.data('aheight') == 1 ? true : false;
						
			var tableItems = itemNum>2 ? 2 : itemNum;				
			var res = [{breakpoint:768,settings:{item:tableItems,slideMove:1}},{breakpoint:600,settings:{item:1,slideMove:1}}];
						
			carousel.lightSlider({				
				item: itemNum,
				autoWidth: false,
				slideMove: itemMove,
				slideMargin: itemMargin,
				
				addClass: '',
				mode: anim_type,
				useCSS: true,
				cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
				easing: 'linear',
				
				speed: aspeed, //ms'
				auto: slideAuto,
				loop: slideLoop,
				slideEndAnimation: true,
				pause: sspeed,
				
				keyPress: false,
				controls: dnav,
				prevHtml: '<i class="mb2p2_icon-left-open-big"></i>',
				nextHtml: '<i class="mb2p2_icon-right-open-big"></i>',
				
				rtl:false,
				adaptiveHeight:auto_height,
				
				vertical:false,
				verticalHeight:400,
				vThumbWidth:100,
				
				thumbItem:10,
				pager: cnav,
				gallery: false,
				galleryMargin: 0,
				thumbMargin: 5,
				currentPagerPosition: 'middle',
		 
				enableTouch:true,
				enableDrag:true,
				freeMove:true,
				swipeThreshold: 40,
		 
				responsive : res
			});
			
			
			
		});
	
	
	
	
	
	



	
});