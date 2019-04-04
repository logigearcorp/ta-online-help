/**
 * @package		Mb2 Users
 * @version		1.0.0
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C)  2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses/regular)
**/

jQuery(document).ready(function($){	
	
	$('.mb2users-layout2 .mb2users-item').each(function(){
		
		var user = $(this);
		var image = user.find('.mb2users-img');
		var images = user.parent().parent().find('.mb2users-img');	
		var users = user.parent().find('.mb2users-item');
		var userList = user.parent().parent();	
		var userRow = user.parent();
		
		image.click(function(e){			
			
			userList.find('.mb2users-img').css('opacity','');
			
			var details = $(this).parent().find('.mb2users-details');
			images.removeClass('active');
			users.removeClass('active');
			userList.removeClass('selected');
			$(this).addClass('active');
			$(this).parent().parent().addClass('active');
			$(this).parent().parent().parent().parent().addClass('selected');
			
			$('.mb2users-superdetails').remove();
			
			var superDetailsHtml = '<div class="mb2users-superdetails"><a href="#" class="mb2users-close"><i class="mb2_usersicon-cancel"></i></a>' + details.html() + '</div>';
			
			
			// Append or prepend super details content into users row
			if (userRow.hasClass('mb2users-odd'))
			{
				userRow.append(superDetailsHtml);
			}
			else
			{
				userRow.prepend(superDetailsHtml);				
			}
						
			e.preventDefault();
			
		});	
			
	});
	
	
	
	// Close superdetails
	$('.mb2users-row').on('click','.mb2users-superdetails .mb2users-close',function(e){			
				
		
		var activeImages = $(this).parent().parent().find('.mb2users-img');
		var activeItem = $(this).parent().parent().find('.mb2users-item');
		var selectedList = $(this).parent().parent().parent();
		var superDetails = $(this).parent();
		
		
		// Remove superdetails div
		superDetails.remove();
		
		
		// Remove active class from images, item and list
		activeImages.removeClass('active');
		activeItem.removeClass('active');
		selectedList.removeClass('selected');
	
		//handle the images don't be enable after click on close button
		selectedList.find('.mb2users-img').css('opacity','1');
		
		e.preventDefault();	
		
		
	});		
		
});