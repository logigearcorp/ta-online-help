/**
 * @package		Mb2 Testimonials
 * @version		1.3.10
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2014 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenss)
**/
 
jQuery(document).ready(function($){
	
	
	
	
	$('.mb2testimonials-feadd-testimonial').click(function(e){
		
		
		$('.mb2testimonials-form-wrap-lightbox').show();
		
		
		// Scroll to top form		
		var topForm = $('#mb2testimonials-feform').parent().offset();
		$('html, body').animate({scrollTop: topForm.top-20}, 350);	
		
		
		e.preventDefault();
		
		
	});
	
	
	
	
	$('.mb2testimonials-form-wrap-lightbox').each(function(){
		
		
		var mod_wrap = $(this);
		var close_link = mod_wrap.find('.mb2tetsimonials-form-message-close');	
		var form = mod_wrap.find('#mb2testimonials-feform');		
		var formMessageDiv = mod_wrap.find('.mb2tetsimonials-form-message');
		
		close_link.click(function(e){
			
			
			mod_wrap.hide();	
			
			//setTimeout(function(){
				form.removeClass('mb2tetsimonials-hide');
				formMessageDiv.empty();
				
			//},250);
			
			e.preventDefault();
		});
		
		
		
	});
	
	
	$('#fe_form_empty').hide();
	
	
	$('#mb2testimonials-feform').submit(function(e){
		
		e.preventDefault();
		
		var form = $(this);		
		var formAction = form.attr('action');
		var formDiv = $('.mb2testimonials-form-wrap');
		var formDivInner = formDiv.find('.mb2testimonials-feform');	
		var formDivInner2 = formDivInner.find('.mb2testimonials-feform-inner');		
		var messageDiv = formDivInner.find('.mb2tetsimonials-form-message');	
		var closeMessageDiv = $('<a href="#" class="mb2tetsimonials-form-message-close" title="Close">Close</a>');
		var formButton = form.find('#fe_form_button');
		var loadingImage = form.find('#mb2testimonial-loading-image');
				
		
		// Validate form
		var returnError = false;
		var field_message = form.find('#fe_form_message');
		var field_rating = form.find('#fe_form_rating');
		var field_product = form.find('#fe_form_product');		
		var field_name = form.find('#fe_form_name');
		var field_empty = form.find ('#fe_form_empty');
		var field_url = form.find('#fe_form_company_url');
		var field_question = form.find('#fe_form_question');
		var message_div = '<span class="mb2testimonials-form-message"></span>';
		var error_text = 'This field is required!';
		var url_error_text = 'Type valid url!';
		
		
				
		
		
		// Check if browser support 'formData'
		if (window.FormData === undefined)		
		{			
			var noFormDataMessage = '<span class="mb2testimonials-message mb2testimonials-message-error">FormData is not suppoerted. It looks that Your browser is out-of-date. Please update browser and try again.</span>';
			messageDiv.html(noFormDataMessage);
			return false;	
		}
		
		
		
		
		
		
		
		
		
		
		if (field_empty.val() !='')
		{
			returnError = true;	
		}			
		
		
		if (field_message.val() == '') {			
			field_message.addClass('mb2tetsimonials-form-field-error');
			var message_parent = field_message.parent();			
			(!message_parent.find('.mb2testimonials-form-message')[0]) ? message_parent.append(message_div) : '';
			var message_message = message_parent.find('.mb2testimonials-form-message');			
			message_message.html(error_text);
           	returnError = true;			
		}
		else
		{			
			field_message.removeClass('mb2tetsimonials-form-field-error');	
			var message_parent = field_message.parent();	
			var message_message = message_parent.find('.mb2testimonials-form-message');
			message_message.remove();			 
		}
		
		
		
		if (field_rating.val() == '') {			
			field_rating.addClass('mb2tetsimonials-form-field-error');
			var rating_parent = field_rating.parent();			
			(!rating_parent.find('.mb2testimonials-form-message')[0]) ? rating_parent.append(message_div) : '';
			var rating_message = rating_parent.find('.mb2testimonials-form-message');			
			rating_message.html(error_text);
           	returnError = true;			
		}
		else
		{			
			field_rating.removeClass('mb2tetsimonials-form-field-error');	
			var rating_parent = field_rating.parent();	
			var rating_message = rating_parent.find('.mb2testimonials-form-message');
			rating_message.remove();			 
		}
		
		
		
		if (!field_product.hasClass('mb2testimonials-no-empty'))
		{
			if (field_product.val() == '') {
				
				field_product.addClass('mb2tetsimonials-form-field-error');
				var product_parent = field_product.parent();			
				(!product_parent.find('.mb2testimonials-form-message')[0]) ? product_parent.append(message_div) : '';
				var product_message = product_parent.find('.mb2testimonials-form-message');			
				product_message.html(error_text);
				returnError = true;
				
			}
			else
			{			
				field_product.removeClass('mb2tetsimonials-form-field-error');	
				var product_parent = field_product.parent();	
				var product_message = product_parent.find('.mb2testimonials-form-message');
				product_message.remove();			 
			}
		}
		
		
		
		if (field_name.val() == '') {			
			field_name.addClass('mb2tetsimonials-form-field-error');
			var name_parent = field_name.parent();			
			(!name_parent.find('.mb2testimonials-form-message')[0]) ? name_parent.append(message_div) : '';
			var name_message = name_parent.find('.mb2testimonials-form-message');			
			name_message.html(error_text);
           	returnError = true;
			
		}
		else
		{			
			field_name.removeClass('mb2tetsimonials-form-field-error');	
			var name_parent = field_name.parent();	
			var name_message = name_parent.find('.mb2testimonials-form-message');
			name_message.remove();			 
		}
		
		
		
		if (field_url.val() != '' && !checkUrl(field_url.val())) {			
			field_url.addClass('mb2tetsimonials-form-field-error');
			var url_parent = field_url.parent();			
			(!url_parent.find('.mb2testimonials-form-message')[0]) ? url_parent.append(message_div) : '';
			var url_message = url_parent.find('.mb2testimonials-form-message');			
			url_message.html(url_error_text);
           	returnError = true;			
		}
		else
		{			
			field_url.removeClass('mb2tetsimonials-form-field-error');	
			var url_parent = field_url.parent();	
			var url_message = url_parent.find('.mb2testimonials-form-message');
			url_message.remove();			 
		}
		
		
		
		
		
		
		if (field_question !== undefined)
		{
			
			if (field_question.val() == '') {			
				field_question.addClass('mb2tetsimonials-form-field-error');
				var question_parent = field_question.parent();			
				(!question_parent.find('.mb2testimonials-form-message')[0]) ? question_parent.append(message_div) : '';
				var question_message = question_parent.find('.mb2testimonials-form-message');			
				question_message.html(error_text);
				returnError = true;			
			}
			else
			{			
				field_question.removeClass('mb2tetsimonials-form-field-error');	
				var question_parent = field_question.parent();	
				var question_message = question_parent.find('.mb2testimonials-form-message');
				question_message.remove();			 
			}
				
		}
		
		
		
		
		// Check if form validation returns errors
		// If not submit form
		if(returnError == true){
			
            return false;
        }	
		
		
		formButton.css({opacity:0.3});	
		formButton[0].disabled = true;
		loadingImage.show();
		
				
		
		
		
		var formdata = new FormData($(this)[0]);
		
		$.ajax({
			url: formAction,
			type: 'POST',
			data: formdata,
			//async: false,
    		cache: false,
    		contentType: false,
    		processData: false,
			success: function(response){		
				
				
				formButton.css({opacity:1});	
				formButton[0].disabled = false;
				loadingImage.hide();
				
								
				form[0].reset();
				formButton.css({opacity:1});
				loadingImage.hide();	
				formButton[0].disabled = false;
				
				form.addClass('mb2tetsimonials-hide');				
				messageDiv.html(response);
						
			}
			
		});
		
		
		
		
		
		
		
		
	});
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function checkUrl(value) {
		var urlregex = new RegExp(/^([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/);
		if (urlregex.test(value)) {
			return true;
		}
		return false;
	}
	
	
	
	
	
	
	
	
	
});