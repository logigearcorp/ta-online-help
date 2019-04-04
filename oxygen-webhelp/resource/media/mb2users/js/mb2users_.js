/**
 * @package		Mb2 Users
 * @version		1.0.0
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C)  2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses/regular)
**/
jQuery(document).ready(function(e){e(".mb2users-layout2 .mb2users-item").each(function(){var s=e(this),r=s.find(".mb2users-img"),a=s.parent().parent().find(".mb2users-img");r.click(function(r){var i=e(this).parent().find(".mb2users-details");a.removeClass("active"),e(this).addClass("active"),e(".mb2users-superdetails").remove(),s.parent().append('<div class="mb2users-clr"></div><div class="mb2users-superdetails mb2users-clr"><a href="#" class="mb2users-close"><i class="mb2_usersicon-cancel"></i></a>'+i.html()+"</div>"),r.preventDefault()})}),e(".mb2users-close").live("click",function(s){var r=e(this).parent().parent().find(".mb2users-img");r.removeClass("active"),e(this).parent().remove(),s.preventDefault()})});