/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


jQuery(document).ready(function($){



	
	// Toggle radio images params div
	$('.mb2-radioimage-btn').click(function(e){		
		
		$(this).siblings('.mb2-radioimage-wrap').slideToggle(100);
		$(this).toggleClass('active');
		
		e.preventDefault();	
		
	});



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
	
	
	
	
	
	
	
	// Predefined styles
	$('.mb2-prestyles-item').each(function(){
		
		// Define variables
		var styleItem = $(this);
		var wrap = styleItem.parent();
		var id = wrap.data('id');
		var styleArr = styleItem.data('style');
		var styleNum = styleItem.data('num');
		var styleParam = $('#' + id);
		
		
		
		styleItem.click(function(e){
			
			e.preventDefault();		
			
			$(this).siblings('.mb2-prestyles-item').removeClass('active');
			$(this).addClass('active');
			
			// Set style number
			styleParam.val(styleNum);	
			
			
			for(var key in styleArr) {				
				
				// Colors
				key == 'accent_color1' ? $('#jform_params_' + key).val(styleArr['accent_color1']) : '';
				key == 'accent_color2' ? $('#jform_params_' + key).val(styleArr['accent_color2']) : '';
				key == 'text_color' ? $('#jform_params_' + key).val(styleArr['text_color']) : '';
				key == 'links_color' ? $('#jform_params_' + key).val(styleArr['links_color']) : '';
				key == 'links_h_color' ? $('#jform_params_' + key).val(styleArr['links_h_color']) : '';
				key == 'headings_color' ? $('#jform_params_' + key).val(styleArr['headings_color']) : '';
				key == 'border_color' ? $('#jform_params_' + key).val(styleArr['border_color']) : '';	
				
				// Typography			
				//key == 'general_font_size' ? $('#jform_params_' + key).val(styleArr['general_font_size']) : '';
				
				//key == 'main_header_style' ? $('#jform_params_' + key + ' [value=' + styleArr['main_header_style'] + ']').attr('selected','selected') : '';
								
			}
			
			
		});
		
		
		
		
		
		
		
		
			
		
	});
	
	
	
	



});//end