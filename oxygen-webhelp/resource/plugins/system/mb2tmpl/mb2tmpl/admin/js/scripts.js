/**
 * @package		Scale Template
 * @version		1.1.0
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/


jQuery(document).ready(function($){





$('.mb2sections-item').each(function(){
		
		
		var heading = $(this).find('> .mb2sections-heading');
		var content = $(this).find('> .mb2sections-content');
		
		
		var questionMark = $(this).find('> .mb2sections-heading .mb2sections-mark .mb2sections-question');
		var questionDiv = $(this).find('> .mb2sections-heading .mb2sections-mark .mb2sections-desc');
		
		
		
		heading.on('click',function(){
			
			
			content.slideToggle(200);
			$(this).toggleClass('active');	
			
			
		});
		
		
		questionMark.hover( 
		
			function(){
				
				questionDiv.show();
					
			},
			
			function(){
				
				questionDiv.hide();	
			}
		
		
		);
		
		
		
		
		
	});
	
	
	


});//end