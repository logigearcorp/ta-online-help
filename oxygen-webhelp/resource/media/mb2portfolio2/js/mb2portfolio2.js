/**
 * @package		Mb2 Portfolio2
 * @version		1.2.2
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenss)
**/
var Froogaloop=function(){function e(t){return new e.fn.init(t)}function t(e,t,i){return i.contentWindow.postMessage?(e=JSON.stringify({method:e,value:t}),void i.contentWindow.postMessage(e,r)):!1}function i(e){var t,i;try{t=JSON.parse(e.data),i=t.event||t.method}catch(a){}if("ready"!=i||o||(o=!0),!/^https?:\/\/player.vimeo.com/.test(e.origin))return!1;"*"===r&&(r=e.origin),e=t.value;var l=t.data,s=""===s?null:t.player_id;return t=s?n[s][i]:n[i],i=[],t?(void 0!==e&&i.push(e),l&&i.push(l),s&&i.push(s),0<i.length?t.apply(null,i):t.call()):!1}function a(e,t,i){i?(n[i]||(n[i]={}),n[i][e]=t):n[e]=t}var n={},o=!1,r="*";return e.fn=e.prototype={element:null,init:function(e){return"string"==typeof e&&(e=document.getElementById(e)),this.element=e,this},api:function(e,i){if(!this.element||!e)return!1;var n=this.element,o=""!==n.id?n.id:null,r=i&&i.constructor&&i.call&&i.apply?null:i,l=i&&i.constructor&&i.call&&i.apply?i:null;return l&&a(e,l,o),t(e,r,n),this},addEvent:function(e,i){if(!this.element)return!1;var n=this.element,r=""!==n.id?n.id:null;return a(e,i,r),"ready"!=e?t("addEventListener",e,n):"ready"==e&&o&&i.call(null,r),this},removeEvent:function(e){if(!this.element)return!1;var i=this.element,a=""!==i.id?i.id:null;e:{if(a&&n[a]){if(!n[a][e]){a=!1;break e}n[a][e]=null}else{if(!n[e]){a=!1;break e}n[e]=null}a=!0}"ready"!=e&&a&&t("removeEventListener",e,i)}},e.fn.init.prototype=e.fn,window.addEventListener?window.addEventListener("message",i,!1):window.attachEvent("onmessage",i),window.Froogaloop=window.$f=e}();!function(e){e(window).load(function(){e(".mb2p2-items-list").each(function(){var t=e(this),i=t.data("limit"),a=t.data("lisotope"),n=e(".mb2p2").data("baseurl");1==a&&t.imagesLoaded(function(){var i=t.data("lmode"),a=1==i?"fitRows":"masonry";t.isotope({itemSelector:".mb2p2-item",layoutMode:a}),e(".mb2p2-filter-list > li > a").on("click",function(i){var a=e(this).attr("data-filter");t.isotope({filter:a}),i.preventDefault()})});var o=t.data("loadmore");if(1==o||2==o){var r=e(".pagination-next a").attr("href");e("#mb2p2-loadmore a").attr("href",r),t.infinitescroll({navSelector:"#mb2p2-loadmore",nextSelector:"#mb2p2-loadmore a",itemSelector:".mb2p2-items-list .mb2p2-item",incrementPage:i,loading:{msgText:"Loading...",finishedMsg:"No items found.",img:n+"media/mb2portfolio2/images/loading.gif"}},function(i){if(1==a){var n=(t.data("lmode"),e(i).css({opacity:0}));n.imagesLoaded(function(){n.fadeIn().delay(40),t.isotope("appended",n,!0)})}}),1==o&&(t.infinitescroll("unbind"),e("#mb2p2-loadmore a").live("click",function(e){return e.preventDefault(),t.infinitescroll("retrieve"),!1}))}})})}(jQuery),jQuery(document).ready(function(e){e(".mb2p2-item-navigation").each(function(){var t=e(this),i=t.find("a"),a=i.clone().addClass("mb2p2-bodynav");t.hasClass("mb2p2-item-navigation3")&&(t.hide(),e("body").append(a),e(".prev.mb2p2-bodynav").hover(function(){e(this).stop().animate({left:0},200)},function(){e(this).stop().animate({left:-210},200)}),e(".next.mb2p2-bodynav").hover(function(){e(this).stop().animate({right:0},200)},function(){e(this).stop().animate({right:-210},200)}))}),e(".mb2p2").on("click",".mb2p2-ajax-close",function(t){var i=e(".mb2p2-ajax-item");i.stop().animate({height:0},350),setTimeout(function(){i.removeClass("active"),i.removeAttr("style"),i.children().empty()},250),t.preventDefault()}),e(window).resize(function(){e(".mb2p2-ajax-item").css({height:e(".mb2p2-ajax-item-inner").outerHeight(!0)})}),e(".mb2p2").on("click",".mb2p2-ajax-link",function(t){var i=e(this),a=i.data("id"),n=e(".mb2p2").data("baseurl"),o='<a href="#" class="mb2p2-ajax-close mb2p2_icon-cancel"></a>',r=e(".mb2p2-ajax-item"),l=e(".mb2p2-ajax-item-inner");e.ajax({url:n+"index.php?option=com_mb2portfolio2&amp;view=article&amp;id="+a+"&amp;format=raw",type:"get",beforeSend:function(){l.parent().append('<div id="infscr-loading"><img src="'+n+'media/mb2portfolio2/images/loading.gif" alt=""><div>Loading...</div></div>')},success:function(t){l.html(o+t),r.css({opacity:0});var i=l.find("img").length,a=0;l.find("img").load(function(){++a,a>=i&&setTimeout(function(){e("#infscr-loading").remove(),r.addClass("active"),r.stop().animate({height:l.outerHeight(!0),opacity:1},350),e("html,body").animate({scrollTop:r.offset().top-100},350)},200)})}}),t.preventDefault()}),e(".mb2p2-items-carousel").each(function(){var t=e(this),i=t.data("anim_type"),a=t.data("col"),n=t.data("hgutter"),o=t.data("move"),r=1==t.data("cnav")?!0:!1,l=1==t.data("dnav")?!0:!1,s=1==t.data("auto")?!0:!1,d=1==t.data("loop")?!0:!1,m=t.data("sspeed"),p=t.data("aspeed"),c=1==t.data("aheight")?!0:!1,u=a>2?2:a,f=[{breakpoint:768,settings:{item:u,slideMove:1}},{breakpoint:600,settings:{item:1,slideMove:1}}];t.lightSlider({item:a,autoWidth:!1,slideMove:o,slideMargin:n,addClass:"",mode:i,useCSS:!0,cssEasing:"ease",easing:"linear",speed:p,auto:s,loop:d,slideEndAnimation:!0,pause:m,keyPress:!1,controls:l,prevHtml:'<i class="mb2p2_icon-left-open-big"></i>',nextHtml:'<i class="mb2p2_icon-right-open-big"></i>',rtl:!1,adaptiveHeight:c,vertical:!1,verticalHeight:400,vThumbWidth:100,thumbItem:10,pager:r,gallery:!1,galleryMargin:0,thumbMargin:5,currentPagerPosition:"middle",enableTouch:!0,enableDrag:!0,freeMove:!0,swipeThreshold:40,responsive:f})})});