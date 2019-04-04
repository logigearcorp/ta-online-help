/**
*	@name							Accordion
*	@descripton						This Jquery plugin makes creating accordions pain free
*	@version						1.4
*	@requires						Jquery 1.2.6+
*
*	@author							Jan Jarfalk
*	@author-email					jan.jarfalk@unwrongest.com
*	@author-website					http://www.unwrongest.com
*
*	@licens							MIT License - http://www.opensource.org/licenses/mit-license.php
*/
!function(i){jQuery.fn.extend({accordion:function(n){return this.each(function(){function s(n,s){i(n).parent(l).siblings().removeClass(o).children(c).slideUp(h),i(n).siblings(c)[s||r]("show"==s?h:h,function(){"show"==s&&i(n).parents(l).not(a.parents()).addClass(o),i(n).parents().show()}),i(n).siblings(c).is(":visible")?i(n).parents(l).not(a.parents()).addClass(o):i(n).parent(l).removeClass(o)}var e={animspeed:100},t=i.extend(e,n),a=i(this),d="accordiated",o="active",r="slideToggle",c="div",h=t.animspeed,l="div.mb2tbs-panel-group";if(a.data(d))return!1;i.each(a.find("div.mb2tbs-panel-group>div"),function(){i(this).data(d,!0),i(this).hide()}),i.each(a.find(".mb2tbs-panel-heading"),function(){i(this).click(function(){return void s(this,r)}),i(this).bind("activate-node",function(){a.find(c).not(i(this).parents()).not(i(this).siblings()).slideUp(h),s(this,"slideDown")})});var p=a.find("div.iscurrent .mb2tbs-panel-heading")[0];p&&s(p,!1)})}})}(jQuery);
// Tabs plugin
!function(e){jQuery.fn.extend({mb2tabs:function(a){return this.each(function(){var t,i,n={animspeed:100},h=e.extend(n,a),s=e(this).find("a");t=e(s.filter('[href="'+location.hash+'"]')[0]||s[0]),t.addClass("active"),i=e(t[0].hash),s.not(t).each(function(){e(this.hash).hide()}),e(this).on("click","a",function(a){t.removeClass("active"),i.hide(),t=e(this),i=e(this.hash),t.addClass("active"),i.fadeIn(h.animspeed),a.preventDefault()})})}})}(jQuery);
/**
 * @package		Mb2 Tabs
 * @version		1.0.0
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2015 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/
jQuery(document).ready(function(a){a(".mb2tbs").each(function(){var t=a(this),n=t.find(".mb2tbs-tabs-list"),d=t.find(".mb2tbs-accordion"),i=t.data("layout"),e=t.data("animspeed");1==i?n.mb2tabs({animspeed:e}):2==i&&d.accordion({animspeed:e})})});