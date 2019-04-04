/**
 * @package		Mb2 Fun Facts
 * @version		1.0.3
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/


jQuery(document).ready(function($){
	
		
		$('.mb2funfacts-item').each(function(){
			
			var factItem = $(this);
			var parentTag = factItem.parent().parent();
			var animateSpeed = parentTag.data('aspeed');
			var numberTag = factItem.find('.mb2funfacts-number .number');
			var number = numberTag.data('num');		
			var numbersAnimate = true;				 
		  
			
				factItem.bind('inview', function(event, visible) {
				
			 	
				var space_separator_number_step = $.animateNumber.numberStepFactories.separator(' ');
				
				
				if(visible == true && numbersAnimate == true) {
            		
					numbersAnimate = false;	
					
					numberTag.animateNumber({					
						number: number,
						numberStep: space_separator_number_step					
					},animateSpeed);							
						
				}				
				
			});	
		
			
		});		
		
});