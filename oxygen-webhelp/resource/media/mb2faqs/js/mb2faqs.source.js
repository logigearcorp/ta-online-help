/**
 * @package		Mb2 FAQs
 * @version		1.2.0
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2015 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/


// Closure
(function(){

	/**
	 * Decimal adjustment of a number.
	 *
	 * @param	{String}	type	The type of adjustment.
	 * @param	{Number}	value	The number.
	 * @param	{Integer}	exp		The exponent (the 10 logarithm of the adjustment base).
	 * @returns	{Number}			The adjusted value.
	 */
	function decimalAdjust(type, value, exp) {
		// If the exp is undefined or zero...
		if (typeof exp === 'undefined' || +exp === 0) {
			return Math[type](value);
		}
		value = +value;
		exp = +exp;
		// If the value is not a number or the exp is not an integer...
		if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
			return NaN;
		}
		// Shift
		value = value.toString().split('e');
		value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
		// Shift back
		value = value.toString().split('e');
		return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
	}

	// Decimal round
	if (!Math.round10) {
		Math.round10 = function(value, exp) {
			return decimalAdjust('round', value, exp);
		};
	}
	// Decimal floor
	if (!Math.floor10) {
		Math.floor10 = function(value, exp) {
			return decimalAdjust('floor', value, exp);
		};
	}
	// Decimal ceil
	if (!Math.ceil10) {
		Math.ceil10 = function(value, exp) {
			return decimalAdjust('ceil', value, exp);
		};
	}

})();




// Tabs plugin

(function($){
     jQuery.fn.extend({
         mb2tabs: function() {       
            return this.each(function() {

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
					$active.addClass('active');
					$content.fadeIn(100);
			
					// Prevent the anchor's default click action
					e.preventDefault();
				});	

			});
        }
    }); 
})(jQuery);


jQuery(document).ready(function($){
	
	
	
	
	
	$('.mb2faqs-show-list-nav').click(function(e){
		
		
		$(this).siblings('.mb2faqs-list-nav').fadeToggle(250);	
		$(this).toggleClass('active');
		e.preventDefault();
		
		
	});
	
	
	
	
	$('.mb2faqs-categories-tabs__list').each(function(){			
		
		$(this).mb2tabs();
			
	});
	
	
	
	
	$('.mb2faqs-tooltip-link').tooltipsy({		
		className: 'mb2faqs-tt',
		offset:[0,-10],
		delay: 100,
	});
	
	
	
	
	
	
	
	// Init accordion
	$('.mb2faqs-accordion-list').each(function(){
		
	
		var acc_list = $(this);
		
		var expansible = acc_list.data('expansible');
		var sSpeed = acc_list.data('sspeed');
		var hSpeed = acc_list.data('hspeed');
		var expandAll = acc_list.data('expandall');
		var expandText = acc_list.data('expandtext');
		var collapseText = acc_list.data('collapsetext');
		
		
		acc_list.accordion({
			//container : false,
			objClass : '.mb2faqs-accordion-list',
			showSpeed : sSpeed,
    		hideSpeed : hSpeed,
			el : '.mb2faqs-accordion-list-item__heading',
			obj:"div", 
			head:"h2,h3,h4,h5,h6",
    		wrapper:"div",
			next:"div",
			standardExpansible : expansible
		});	
			
		
		if (expandAll == 1)
		{		
			acc_list.expandAll({
				trigger: ".h", 
				ref: ".h", 
				cllpsEl: "div.mb2faqs-accordion-list-item__outer",
				speed: 200,
				oneSwitch : true,
				instantHide: true,
				expTxt : expandText,
				cllpsTxt : collapseText
			});
		}
		
		
		
		
	});
	
	
	
	$('.mb2faqs-accordion-list-item').each(function(){
		
		
		var expandParagraph = $(this).find('.switch').first();
		expandParagraph.hide();
		
	});
	
	
	
	
	
	// Close error message
	//.mb2faqs-search-form .mb2fqs-error-close
	$('.mb2faqs-search-form').on('click', '.mb2fqs-error-close', function(e){
		
		e.preventDefault();
		
		$(this).parent().remove();
			
		
	});
	
	
	
	
	
	
	
	// Generic function to get URL params passed in .js script include
	function getUrlParams(targetScript, varName) {
		var scripts = document.getElementsByTagName('script');
		var scriptCount = scripts.length;
		for (var a = 0; a < scriptCount; a++) {
			var scriptSrc = scripts[a].src;
			if (scriptSrc.indexOf(targetScript) >= 0) {
				varName = varName.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
				var re = new RegExp("[\\?&]" + varName + "=([^&#]*)");
				var parsedVariables = re.exec(scriptSrc);
				if (parsedVariables !== null) {
					return parsedVariables[1];
				}
			}
		}
	}
	
	
	
	
	
	
	
	
	$('.mb2faqs-votelink').click(function(e){
		
		
		var rating = $(this).data('rating');
		var item_id = $(this).data('itemid');		
		var sitePath = $('.mb2faqs').data('baseurl');//getUrlParams('mb2faqs.js','sitepath');
		var ratingBar = $('.mb2faqs-rating-bar' + item_id);
		var ratingBarPercentage = ratingBar.find('> div');
		//var ratingBarPercentageText = ratingBarPercentage.find('> span');
		var messageDiv = $('.mb2faqs-rating-message' + item_id);
		var numDiv = $('.mb2faqs-rating-number' + item_id);
		var countDiv = numDiv.find('.mb2faqs-rating-count' + item_id);		
		var sumDiv = numDiv.find('.mb2faqs-rating-sum' + item_id);		
		
		$.ajax({
			url: sitePath + 'index.php?option=com_mb2faqs&task=faq.vote&item_id=' + item_id + '&format=raw&user_rating=' + rating,
			type: 'get',
			success: function(response){		
				
								
				messageDiv.html(response);	
				setTimeout(function(){
					
				messageDiv.empty();	
					
				}, 3000);
						
				
				$.ajax({
				url: sitePath + 'index.php?option=com_mb2faqs&task=faq.getVotePercentage&format=raw&item_id=' + item_id,
				type: 'get',
				success: function(percentage){
					
					
					var number =Math.round10(percentage, -1);
					//ratingBarPercentage.attr('title',number + '&#37;');	
					
					ratingBarPercentage.css({width:percentage+'%'});				
					
						
						$.ajax({
							
							url: sitePath + 'index.php?option=com_mb2faqs&task=faq.getVoteCount&format=raw&item_id=' + item_id,	
							type: 'get',
							success: function(votecount){								
											
								countDiv.html(votecount);
								
								
								
								$.ajax({
							
									url: sitePath + 'index.php?option=com_mb2faqs&task=faq.getVoteSum&format=raw&item_id=' + item_id,	
									type: 'get',
									success: function(votesum){								
													
										sumDiv.html(votesum);								
									}
								});
								
																
							}
						});
						
					}
				});				
			}
			
		});
		
		e.preventDefault();
	});

});