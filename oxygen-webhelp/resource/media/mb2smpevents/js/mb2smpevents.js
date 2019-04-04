/**
 * @package		Mb2 Simple Events
 * @version		1.1.1
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses/regular)
**/



jQuery(document).ready(function($){
	
	
	
	
	
	$('.mb2smpev').each(function(){
		
		
		var calendar = $(this);
		var baseurl = calendar.data('baseurl');
		var overlayBg = calendar.find('.mb2smpev-overlay');		
		var moths = calendar.data('months');
		var days = calendar.data('days');
		var modid = calendar.data('id');
		var isJumpTo = calendar.data('jumpto') == 1 ? true : false;
		var isModal = calendar.data('modal') == 2 ? true : false;
		var iseLayout = calendar.data('elayout');
		var isthumbc = calendar.data('thumbc');
		var ismodtitle = calendar.data('modtitle');
		
		
		
		calendar.mb2smpevCalendar({	
			show_days: true,
			modal: isModal,
			eLayout: iseLayout,
			thumbc: isthumbc,
			titleTooltip: false,
			jumpTo: isJumpTo,
			modalClose: '<i class="mb2smpev_icon-cancel"></i>',
			prevHtml: '<i class="mb2smpev_icon-left-open-big"></i>',
			nextHtml: '<i class="mb2smpev_icon-right-open-big"></i>',
			calendarIcon: '<i class="mb2smpev_icon-calendar"></i>',
			monthLabels: moths,
			dayLabels: days,
			ajax: {
				onBeforeAjax: function(){overlayBg.show()},
				onAfterAjax: function(){overlayBg.fadeOut(250)},
				url: baseurl + '?option=com_ajax&module=mb2smpevents&method=eventsData&modid='+modid+'&format=raw'	
			}
		});
		
		
		
		
		
		
	}); // End each function
	
	
	
		
	
});








