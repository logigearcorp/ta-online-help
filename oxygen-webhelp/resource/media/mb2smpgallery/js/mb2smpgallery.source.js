/**
 * @package		Mb2 Simple Gallery
 * @version		1.1.2
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/



jQuery(document).ready(function($){
	
	
	
	$('.mb2smpgallery-list').each(function(){
		
		var container = $(this);
		var dataIsotope = container.data('iso');
		var loadMore = container.data('more');
		var limit = container.data('limit');
		var sitePath = container.data('sitepath');
		var loadingText = container.data('loadingtext');
		var noFoundText = container.data('notfoundtext');
				
				
		
		
		// Nivo lightbox
		container.on('mouseover','.mb2smpgallery-lightbox', function(){			
			$(this).nivoLightbox();			
		});	
		
		
				
		// Set isotope layout
		if (dataIsotope > 0)
		{			
			
			container.imagesLoaded(function(){				
				
				var islMode = dataIsotope == 1 ? 'fitRows' : 'masonry';					
				container.isotope({			  
					itemSelector: '.mb2smpgallery-item',
					layoutMode: islMode				  
				});		
		
			});
	
		}
		
				
		
		// Ajax load more		
		if (loadMore == 1 || loadMore == 2)
		{			
		
			
			container.infinitescroll(
			{ 
				navSelector  : '.mb2smpgallery-pagination',            
				nextSelector : '.mb2smpgallery-next-link',    
				itemSelector : '.mb2smpgallery-list .mb2smpgallery-item',
				incrementPage: limit,
				loading: {
					msgText: loadingText,
					finishedMsg: noFoundText,
					img: sitePath + '/media/mb2smpgallery/images/loading.gif'
				},
				errorCallback: function(){$('.mb2smpgallery-next-link').remove()}			
			},				
			function( newElements ) {
				
				if (dataIsotope == 2)
				{					
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
				container.parent().on('click','.mb2smpgallery-next-link',function(e) {									
					
					e.preventDefault(); 
					container.infinitescroll('retrieve');
					
					$('.mb2smpgallery-pagination').show();					
					
					return false;
					
				});
				 
			}	
			
	
		}
		
		
		
		
		
		
		
		
		// Carousel
		if (container.parent().hasClass('mb2smpgallery-slider'))
		{
			
			
			
			var itemsCount = container.data('items');
			var itemsMove = container.data('move');
			var itemsMargin = container.data('margin');
			var itemsAnimSpeed = container.data('anim_speed');
			var itemsAnimPause = container.data('anim_pause');
			var itemsAnimAuto = container.data('auto');
			var itemsLoop = container.data('loop');			
			var itemsDnav = container.data('dirnav');
			var itemsCnav = container.data('cnav');
			var itemsAheight = container.data('aheight');
			
			
			isDnav = itemsDnav == 1 ? true : false;
			isCnav = itemsCnav == 1 ? true : false;
			isAuto = itemsAnimAuto == 1 ? true : false;
			isLoop = itemsLoop == 1 ? true : false;
			isAheight = itemsAheight == 1 ? true : false;
			
			
			
			
			container.lightSlider({
				
				item: itemsCount,
				slideMargin: itemsMargin,
				mode: "slide",
				slideMove: itemsMove,
				speed: itemsAnimSpeed, 
				auto: isAuto,
				loop: isLoop,
				pause: itemsAnimPause,
				controls: isDnav,
				pager: isCnav,
				vertical: false,
				prevHtml: '<span class="mb2_smpgalleryicon-left-open-big"></span>',
				nextHtml: '<span class="mb2_smpgalleryicon-right-open-big"></span>',
				responsive : [
					{
						breakpoint:768,
						settings: {
							item: itemsCount>=2 ? 2 : 1
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
				keyPress: true,
				pauseOnHover: true,
				adaptiveHeight:isAheight
				
			}); 
			
			
			
			
		}
		
		
		
		
		
		
	});



});