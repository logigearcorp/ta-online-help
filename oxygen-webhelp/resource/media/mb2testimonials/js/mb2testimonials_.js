/**
 * @package		Mb2 Testimonials
 * @version		1.3.3
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2014 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenss)
**/
jQuery(document).ready(function(t){t(".mb2testimonials-item").each(function(){var i=t(this).find(".mb2testimonials-fulltext-toggle"),s=t(this).find(".mb2testimonials-fulltext");i.click(function(i){s.slideToggle(100),t(this).toggleClass("active"),i.preventDefault()})}),t(".mb2testimonials-video-link").each(function(){t(this).hasClass("mb2testimonials-lightbox-link")&&t(".mb2testimonials-lightbox-link").nivoLightbox()}),t(".mb2testimonials-tooltip").tooltipsy({className:"mb2testimonials-tt",offset:[0,-10]}),t(".mb2testimonials-mod-wrap").each(function(){var i=t(this);if(i.hasClass("mb2testimonials-is-slider")){var s=i.find(".mb2testimonials-slider"),a=i.data("mode"),e=i.data("speed"),l=1==i.data("aheight")?!0:!1,o=1==i.data("pager")?!0:!1,n=1==i.data("controls")?!0:!1,m=1==i.data("auto")?!0:!1,d=i.data("pause"),r=i.data("cols"),p=i.data("smargin"),c=1==i.data("loop")?!0:!1,g=1==i.data("ver")?!0:!1,b=i.data("verh");s.lightSlider({item:r,slideMargin:p,speed:e,mode:a,auto:m,pause:d,responsive:[{breakpoint:768,settings:{item:r>=2?2:1}},{breakpoint:600,settings:{item:1,slideMove:1}}],adaptiveHeight:l,controls:n,pager:o,prevHtml:'<span class="mb2testimonials-slider-controls prev"><span class="mb2testimonials_icon-left-open-big"></span></span>',nextHtml:'<span class="mb2testimonials-slider-controls next"><span class="mb2testimonials_icon-right-open-big"></span></span>',gallery:!1,loop:c,vertical:g,verticalHeight:b})}})});