/**
 * @package		Mb2 Users
 * @version		1.0.0
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C)  2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses/regular)
**/
jQuery(document).ready(function(e){e(".mb2users-layout2 .mb2users-item").each(function(){var s=e(this),a=s.find(".mb2users-img"),r=s.parent().parent().find(".mb2users-img"),t=s.parent().find(".mb2users-item"),n=s.parent().parent(),i=s.parent();a.click(function(s){var a=e(this).parent().find(".mb2users-details");r.removeClass("active"),t.removeClass("active"),n.removeClass("selected"),e(this).addClass("active"),e(this).parent().parent().addClass("active"),e(this).parent().parent().parent().parent().addClass("selected"), e(this).parent().parent().parent().parent().find('.mb2users-img').css('opacity',''),e(".mb2users-superdetails").remove();var m='<div class="mb2users-superdetails"><a href="#" class="mb2users-close"><i class="mb2_usersicon-cancel"></i></a>'+a.html()+"</div>";i.hasClass("mb2users-odd")?i.append(m):i.prepend(m),s.preventDefault()})}),e(".mb2users-row").on("click",".mb2users-superdetails .mb2users-close",function(s){var a=e(this).parent().parent().find(".mb2users-img"),r=e(this).parent().parent().find(".mb2users-item"),t=e(this).parent().parent().parent(),n=e(this).parent();n.remove(),a.removeClass("active"),r.removeClass("active"),t.removeClass("selected"),t.find('.mb2users-img').css('opacity','1'),s.preventDefault()})});