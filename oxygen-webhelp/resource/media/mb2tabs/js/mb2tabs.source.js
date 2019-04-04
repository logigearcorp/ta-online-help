/**
 * @package		Mb2 Tabs
 * @version		1.0.0
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2015 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/



/**
*	@name							Accordion
*	@descripton						This Jquery plugin makes creating accordions pain free
*	@version						1.4
*	@requires						Jquery 1.2.6+
*
*	@author							Jan Jarfalk
*	@author-email					jan.jarfalk@unwrongest.com
*	@author-website					http://www.unwrongest.com
*
*	@licens							MIT License - http://www.opensource.org/licenses/mit-license.php
*/

(function($){
     jQuery.fn.extend({
         accordion: function(options) {       
            return this.each(function() {
            	
				
				// Add options
				var defaults = {  
					animspeed: 100
				
				}; 
				
				var o = $.extend(defaults, options); 
				
				
				
            	var $ul						= $(this),
					elementDataKey			= 'accordiated',
					activeClassName			= 'active',
					activationEffect 		= 'slideToggle',
					panelSelector			= 'div',
					activationEffectSpeed 	= o.animspeed,
					itemSelector			= 'div.mb2tbs-panel-group';
            	
				if($ul.data(elementDataKey))
					return false;
													
				$.each($ul.find('div.mb2tbs-panel-group>div'), function(){
					$(this).data(elementDataKey, true);
					$(this).hide();
				});
				
				$.each($ul.find('.mb2tbs-panel-heading'), function(){
					$(this).click(function(e){
						activate(this, activationEffect);
						return void(0);
					});
					
					$(this).bind('activate-node', function(){
						$ul.find( panelSelector ).not($(this).parents()).not($(this).siblings()).slideUp( activationEffectSpeed );
						activate(this,'slideDown');
					});
				});
				
				var active = $ul.find('div.iscurrent .mb2tbs-panel-heading')[0];

				if(active){
					activate(active, false);
				}
				
				function activate(el,effect){
					
					$(el).parent( itemSelector ).siblings().removeClass(activeClassName).children( panelSelector ).slideUp( activationEffectSpeed );
					
					$(el).siblings( panelSelector )[(effect || activationEffect)](((effect == "show")?activationEffectSpeed:activationEffectSpeed),function(){
						
						//if($(el).siblings( panelSelector ).is(':visible')){
//							$(el).parents( itemSelector ).not($ul.parents()).addClass(activeClassName);
//						} else {
//							$(el).parent( itemSelector ).removeClass(activeClassName);
//						}
						
						if(effect == 'show'){
							$(el).parents( itemSelector ).not($ul.parents()).addClass(activeClassName);
						}
					
						$(el).parents().show();
					
					});
					
					if($(el).siblings( panelSelector ).is(':visible')){
							$(el).parents( itemSelector ).not($ul.parents()).addClass(activeClassName);
						} else {
							$(el).parent( itemSelector ).removeClass(activeClassName);
						}
					
				}
				
            });
        }
    }); 
})(jQuery);




// Tabs plugin

(function($){
     jQuery.fn.extend({
         mb2tabs: function(options) {       
            return this.each(function() {
				
				// Add options
				var defaults = {  
					animspeed: 100
				
				}; 
				
				var o = $.extend(defaults, options); 
				
					
				// For each set of tabs, we want to keep track of
				// which tab is active and it's associated content
				var $active, $content, $links = $(this).find('a');
			
				// If the location.hash matches one of the links, use that as the active tab.
				// If no match is found, use the first link as the initial active tab.
				$active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);				
				$active.addClass('active');
			
				$content = $($active[0].hash);
			
				// Hide the remaining content
				$links.not($active).each(function () {
					$(this.hash).hide();
				});
			
				// Bind the click event handler
				$(this).on('click', 'a', function(e){
					// Make the old tab inactive.
					$active.removeClass('active');
					$content.hide();
			
					// Update the variables with the new link and content
					$active = $(this);
					$content = $(this.hash);
			
					// Make the tab active.
					//$active.addClass('active');
					//$content.fadeIn(600);
					$active.addClass('active');
					//setTimeout(function(){						
						$content.fadeIn(o.animspeed);	
					//}, o.animspeed);
					
			
					// Prevent the anchor's default click action
					e.preventDefault();
				});	

			});
        }
    }); 
})(jQuery);






jQuery(document).ready(function($){
	
	
	
	
	$('.mb2tbs').each(function(){
		
		
		var mit_module = $(this);
		var mit_tabs = mit_module.find('.mb2tbs-tabs-list');
		var mit_accordions = mit_module.find('.mb2tbs-accordion');		
		var mit_layout = mit_module.data('layout');	
		var mit_animspeed = mit_module.data('animspeed');
		
		
		if (mit_layout == 1)
		{
			mit_tabs.mb2tabs({
				animspeed: mit_animspeed
			});				
		}
		
		else if(mit_layout == 2)
		{
			mit_accordions.accordion({
				animspeed: mit_animspeed
			});
		}
		
		
		
		
		
			
		
	});		
	
});