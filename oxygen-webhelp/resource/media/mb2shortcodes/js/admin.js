/**
 * @package		Mb2 Shortcodes
 * @version		4.0.2
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2013 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		GNU/GPL (http://www.gnu.org/copyleft/gpl.html)
**/

jQuery(document).ready(function($){
	
		
	
	$('body').on('click', '.mb2shortcodes-list-btn', function(e){
		
		$(this).toggleClass('active');
		
		$('.mb2shortcodes-dd-list').fadeToggle(0);
		
		e.preventDefault();
			
	});
	
	
	
	
	
	$('body').on('click', '.mb2shortcodes-list-item', function(e){		
			
		$('.mb2shortcodes-item').hide();
		$('.mb2shortcodes-dd-list').hide();
		$('#mb2shortcodes-result').empty();
		$('.mb2shortcodes-list-btn').removeClass('active');
		
		var shortcodeName = $(this).children().data('name');
		
		$('.mb2shortcodes-item-' + shortcodeName).show();
		
		e.preventDefault();			
			
	});
	
});