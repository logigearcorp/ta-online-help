/**
 * @package		Mb2 CtMenu
 * @version		1.4.0
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/

jQuery(document).ready(function($){
	
	
	// Core variables
    var opt_list = $('.mb2options-list');
	var opt_li = opt_list.find('>li');	
	var col_list = $('.mb2options-item-columns');
	var var_pname = opt_list.data('pname');
	var var_id = opt_list.data('id');
	var spanName = $('span#'+var_id);
	var var_url = opt_list.data('url');
    var add_button = $('.mb2options-additem');
	var add_button_col = $('.mb2options-addcolumn');
	var add_button_row = $('.mb2options-addrow');
	
	
	// Add fields button
	$(add_button).click(function(e){
		
		
		var x = (Math.random().toString(36).substr(2, 8));	
		var panel_html = '<li class="mb2options-item mb2options-item-' + x + '"  style="margin:0;" data-key="'+x+'"><a href="#" class="mb2options-remove">'+spanName.data('remove')+'</a><div class="mb2options-item-heading"><span class="mb2options-item-drag">'+spanName.data('drag')+'</span>...</div><div class="mb2options-item-content"><input type="hidden" class="" name="' + var_pname + '[panel_' + x + ']" /><p><label for="panel_' + x + '_title">'+spanName.data('title')+'</label><textarea class="" name="' + var_pname + '[panel_' + x + '][title]" id="panel_' + x + '_title">'+spanName.data('title')+'</textarea></p><div class="mb2options-item-columns"><a href="#" class="mb2options-addcolumn btn btn-mini btn-success">'+spanName.data('addcolumn')+'</a><a href="#" class="mb2options-addrow btn btn-mini btn-inverse">'+spanName.data('addrow')+'</a><input type="hidden" name="' + var_pname + '[panel_' + x + '][columns]" /></div></li>';
		
		
		$(opt_list).append(panel_html);
		e.preventDefault();
		
	});
	
	
	
		
		
		
		
		
		
		
	// Add column button
	$(add_button_col).live('click', function(e){
			
		
		var btn_parent1 = $(this).parent();
		var btn_parent2 = btn_parent1.parent();
		var btn_parent3 = btn_parent2.parent();
		var y = btn_parent3.data('key');
		var columns_div = $(this).parent();
		
		
		var z = (Math.random().toString(36).substr(2, 8));
		var col_html = '<div class="mb2options-item-column"><div class="mb2options-item-column-heading"> <a href="#" class="mb2options-removecolumn">'+spanName.data('remove')+'</a> <span class="mb2options-item-column-drag">'+spanName.data('drag')+'</span> </div> <div class="mb2options-item-column-content"> <input type="hidden" name="' + var_pname + '[panel_' + y + '][columns]['+z+']" /> <div class="mb2options-item-content-col"> <p id="' + z + '_col_module_div" class="mb2options-module-field"></p><p><label for="panel_' + y + '_col_module_title">'+spanName.data('moduletitle')+'</label><select name="' + var_pname + '[panel_' + y + '][columns]['+z+'][module_title]" id="panel_' + y + '_col_module_title"><option value="1" selected>'+spanName.data('yes')+'</option><option value="0">'+spanName.data('no')+'</option></select></p> </div> <div class="mb2options-item-content-col last"> <p><label for="panel_' + y + '_col_cwidth">'+spanName.data('customwidth')+'</label><input type="text" name="' + var_pname + '[panel_' + y + '][columns]['+z+'][cwidth]" id="panel_' + y + '_col_cwidth"/></p><p><label for="panel_' + y + '_col_ccls">'+spanName.data('customclass')+'</label><textarea name="' + var_pname + '[panel_' + y + '][columns]['+z+'][ccls]" id="panel_' + y + '_col_ccls"></textarea></p> </div> <div style="float:none;clear:both;"></div><p class="mb2options-content-field"><label for="panel_' + y + '_col_content">'+spanName.data('content')+'</label><textarea class="mb2options-textarea" name="' + var_pname + '[panel_' + y + '][columns]['+z+'][content]" id="panel_' + y + '_col_content"></textarea></p></div></div>';
		
		
		
		$.ajax({
							
			url: var_url + '/index.php?option=com_ajax&plugin=mb2ctmenu&format=raw&method=onAjaxMb2ctmenu&pname=' + var_pname + '&key1=' + y + '&key2=' + z,	
			type: 'get',
			success: function(votesum)
			{							
													
				$('#' + z + '_col_module_div').html(votesum);								
			}
		});
	
	
		
		
			
					
		$(columns_div).append(col_html);
		e.preventDefault();
			
	});
	
	
	
	
	
	
	
	
	// Add row button
	$(add_button_row).live('click', function(e){
			
		
		var btn_parent1 = $(this).parent();
		var btn_parent2 = btn_parent1.parent();
		var btn_parent3 = btn_parent2.parent();
		var y = btn_parent3.data('key');
		var columns_div = $(this).parent();
		
		
		var z = (Math.random().toString(36).substr(2, 8));
		var col_html = '<div class="mb2options-item-column mb2options-row"><div class="mb2options-item-column-heading"><a href="#" class="mb2options-removecolumn">'+spanName.data('remove')+'</a><span class="mb2options-item-column-drag">'+spanName.data('drag')+'</span></div><div class="mb2options-item-column-content"><input type="hidden" name="' + var_pname + '[panel_' + y + '][columns]['+z+']" /><select name="' + var_pname + '[panel_' + y + '][columns]['+z+'][module][]" id="panel_' + y + '_col_module"><option value="[0]">0</option></select><input type="hidden" name="' + var_pname + '[panel_' + y + '][columns]['+z+'][content]" id="panel_' + y + '_col_content" value="row" /><input type="hidden" name="' + var_pname + '[panel_' + y + '][columns]['+z+'][cwidth]" id="panel_' + y + '_col_cwidth"/><input type="hidden" name="' + var_pname + '[panel_' + y + '][columns]['+z+'][ccls]" id="panel_' + y + '_col_ccls"/></div><div class="clearfix"></div></div>';
		
		
		
	
	
		
		
			
					
		$(columns_div).append(col_html);
		e.preventDefault();
			
	});
		
		
	
	
	
	
	
		
	
		
	// Show content
	$('.mb2options-item-heading').live('click', function(){	
		$(this).siblings('.mb2options-item-content').slideToggle(150);
	});	
	
	$('.mb2options-item-column-heading').live('click', function(){	
		$(this).siblings('.mb2options-item-column-content').slideToggle(150);
	});	
	
	
	
	
	// Close button
	$(opt_list).on('click','.mb2options-remove', function(e){
		e.preventDefault(); 
		$(this).parent('.mb2options-item').remove();
	})
	
	
	// Remove column
	$('.mb2options-removecolumn').live('click', function(e){
		
		var colHeadin = $(this).parent();	
		
		colHeadin.parent().remove();
		
		e.preventDefault();
		
	});
	
	
	
	$('#mb2options').live('mouseover', function(){
		
		// Init sortable list
		$('.mb2options-item').arrangeable({dragSelector: '.mb2options-item-drag'});
	
		//$('.mb2options-item-column').arrangeable({dragSelector: '.mb2options-item-column-drag'});
	
	});
	
	
	
	$('.mb2options-item-columns').live('mouseover', function(){
		
		// Init sortable list
		//$('.mb2options-item').arrangeable({dragSelector: '.mb2options-item-drag'});
	
		$('.mb2options-item-column').arrangeable({dragSelector: '.mb2options-item-column-drag'});
	
	});
	
	
	
	
	
	
});