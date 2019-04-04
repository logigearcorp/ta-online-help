/* tooltipsy by Brian Cray
 * Lincensed under GPL2 - http://www.gnu.org/licenses/gpl-2.0.html
 * Option quick reference:
 * - alignTo: "element" or "cursor" (Defaults to "element")
 * - offset: Tooltipsy distance from element or mouse cursor, dependent on alignTo setting. Set as array [x, y] (Defaults to [0, -1])
 * - content: HTML or text content of tooltip. Defaults to "" (empty string), which pulls content from target element's title attribute
 * - show: function(event, tooltip) to show the tooltip. Defaults to a show(100) effect
 * - hide: function(event, tooltip) to hide the tooltip. Defaults to a fadeOut(100) effect
 * - delay: A delay in milliseconds before showing a tooltip. Set to 0 for no delay. Defaults to 200
 * - css: object containing CSS properties and values. Defaults to {} to use stylesheet for styles
 * - className: DOM class for styling tooltips with CSS. Defaults to "tooltipsy"
 * - showEvent: Set a custom event to bind the show function. Defaults to mouseenter
 * - hideEvent: Set a custom event to bind the show function. Defaults to mouseleave
 * Method quick reference:
 * - $('element').data('tooltipsy').show(): Force the tooltip to show
 * - $('element').data('tooltipsy').hide(): Force the tooltip to hide
 * - $('element').data('tooltipsy').destroy(): Remove tooltip from DOM
 * More information visit http://tooltipsy.com/
 */
 
(function($){
    $.mb2ptTooltip = function (el, options) {
        this.options = options;
        this.$el = $(el);
        this.title = this.$el.attr('title') || '';
        this.$el.attr('title', '');
        this.random = parseInt(Math.random()*10000);
        this.ready = false;
        this.shown = false;
        this.width = 0;
        this.height = 0;
        this.delaytimer = null;

        this.$el.data("tooltipsy", this);
        this.init();
    };

    $.mb2ptTooltip.prototype = {
        init: function () {
            var base = this,
                settings,
                $el = base.$el,
                el = $el[0];

            base.settings = settings = $.extend({}, base.defaults, base.options);
            settings.delay = +settings.delay;

            if (typeof settings.content === 'function') {
                base.readify(); 
            }

            if (settings.showEvent === settings.hideEvent && settings.showEvent === 'click') {
                $el.toggle(function (e) {
                    if (settings.showEvent === 'click' && el.tagName == 'A') {
                        e.preventDefault();
                    }
                    if (settings.delay > 0) {
                        base.delaytimer = window.setTimeout(function () {
                            base.show(e);
                        }, settings.delay);
                    }
                    else {
                        base.show(e);
                    }
                }, function (e) {
                    if (settings.showEvent === 'click' && el.tagName == 'A') {
                        e.preventDefault();
                    }
                    window.clearTimeout(base.delaytimer);
                    base.delaytimer = null;
                    base.hide(e);
                });
            }
            else {
                $el.bind(settings.showEvent, function (e) {
                    if (settings.showEvent === 'click' && el.tagName == 'A') {
                        e.preventDefault();
                    }
                    base.delaytimer = window.setTimeout(function () {
                        base.show(e);
                    }, settings.delay || 0);
                }).bind(settings.hideEvent, function (e) {
                    if (settings.showEvent === 'click' && el.tagName == 'A') {
                        e.preventDefault();
                    }
                    window.clearTimeout(base.delaytimer);
                    base.delaytimer = null;
                    base.hide(e);
                });
            }
        },

        show: function (e) {
            if (this.ready === false) {
                this.readify();
            }

            var base = this,
                settings = base.settings,
                $tipsy = base.$tipsy,
                $el = base.$el,
                el = $el[0],
                offset = base.offset(el);

            if (base.shown === false) {
                if ((function (o) {
                    var s = 0, k;
                    for (k in o) {
                        if (o.hasOwnProperty(k)) {
                            s++;
                        }
                    }
                    return s;
                })(settings.css) > 0) {
                    base.$tip.css(settings.css);
                }
                base.width = $tipsy.outerWidth();
                base.height = $tipsy.outerHeight();
            }

            if (settings.alignTo === 'cursor' && e) {
                var tip_position = [e.clientX + settings.offset[0], e.clientY + settings.offset[1]];
                if (tip_position[0] + base.width > $(window).width()) {
                    var tip_css = {top: tip_position[1] + 'px', right: tip_position[0] + 'px', left: 'auto'};
                }
                else {
                    var tip_css = {top: tip_position[1] + 'px', left: tip_position[0] + 'px', right: 'auto'};
                }
            }
            else {
                var tip_position = [
                    (function () {
                        if (settings.offset[0] < 0) {
                            return offset.left - Math.abs(settings.offset[0]) - base.width;
                        }
                        else if (settings.offset[0] === 0) {
                            return offset.left - ((base.width - $el.outerWidth()) / 2);
                        }
                        else {
                            return offset.left + $el.outerWidth() + settings.offset[0];
                        }
                    })(),
                    (function () {
                        if (settings.offset[1] < 0) {
                            return offset.top - Math.abs(settings.offset[1]) - base.height;
                        }
                        else if (settings.offset[1] === 0) {
                            return offset.top - ((base.height - base.$el.outerHeight()) / 2);
                        }
                        else {
                            return offset.top + base.$el.outerHeight() + settings.offset[1];
                        }
                    })()
                ];
            }
            $tipsy.css({top: tip_position[1] + 'px', left: tip_position[0] + 'px'});
            base.settings.show(e, $tipsy.stop(true, true));
        },

        hide: function (e) {
            var base = this;

            if (base.ready === false) {
                return;
            }

            if (e && e.relatedTarget === base.$tip[0]) {
                base.$tip.bind('mouseleave', function (e) {
                    if (e.relatedTarget === base.$el[0]) {
                        return;
                    }
                    base.settings.hide(e, base.$tipsy.stop(true, true));
                });
                return;
            }
            base.settings.hide(e, base.$tipsy.stop(true, true));
        },

        readify: function () {
            this.ready = true;
            this.$tipsy = $('<div id="tooltipsy' + this.random + '" style="position:fixed;z-index:2147483647;display:none">').appendTo('body');
            this.$tip = $('<div class="' + this.settings.className + '">').appendTo(this.$tipsy);
            this.$tip.data('rootel', this.$el);
            var e = this.$el;
            var t = this.$tip;
            this.$tip.html(this.settings.content != '' ? (typeof this.settings.content == 'string' ? this.settings.content : this.settings.content(e, t)) : this.title);
        },

        offset: function (el) {
            return this.$el[0].getBoundingClientRect();
        },

        destroy: function () {
            if (this.$tipsy) {
                this.$tipsy.remove();
                $.removeData(this.$el, 'tooltipsy');
            }
        },

        defaults: {
            alignTo: 'element',
            offset: [0, -1],
            content: '',
            show: function (e, $el) {
                $el.fadeIn(100);
            },
            hide: function (e, $el) {
                $el.fadeOut(100);
            },
            css: {},
            className: 'tooltipsy',
            delay: 200,
            showEvent: 'mouseenter',
            hideEvent: 'mouseleave'
        }
    };

    $.fn.mb2ptTooltip = function(options) {
        return this.each(function() {
            new $.mb2ptTooltip(this, options);
        });
    };

})(jQuery);




/**
 * @package		Mb2 Pricing Table
 * @version		1.0.2
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2014 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenss)
**/

jQuery(document).ready(function($){
	
	
	
	$('.mb2pt-table').each(function(){
		
		
		var table = $(this);
		var win = $(window);	
		var column = table.find('.mb2pt-column-inner');
		var cheader = column.find('.mb2pt-header');
		var ccontent = column.find('.mb2pt-content');
		var clink = column.find('.mb2pt-open-link');
		var ttitem = table.find('.mb2pt-tooltip');
		var ismobile = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
		var ww = (window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth);	
		
		
		showHideColumnText(table,ccontent,clink,ww);		
		
		$(window).resize(function(){			
			
			var rww = (window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth);
			showHideColumnText(table,ccontent,clink,rww);	
			
		});
		
		
		
		// Init toggle link
		clink.click(function(e){	
			e.preventDefault();				
			$(this).siblings('.mb2pt-content').slideToggle(200);
			$(this).toggleClass('mb2pt_icon-down-open mb2pt_icon-up-open');					
		});
		
		
		
		// Tootltip plugin		
		ttitem.mb2ptTooltip({
			className: 'mb2pt-tt',
			offset:[0,-10],
			delay: 300,
			showEvent: ismobile ? 'click' : 'mouseenter',
			hideEvent: ismobile ? 'click' : 'mouseleave'			        
		});
		
		
		
		
		// Open column content in small screens
		function showHideColumnText(tableEl,contentEl,toggleLinkEl,wWidth){			
			
			
			// Check if table has resposive class
			// and check if table has 'c-content-hide' class
			if (tableEl.hasClass('c-content-hide') && tableEl.hasClass('c-responsive')) {
								
				
				if (wWidth<=768)
				{
					tableEl.removeClass('c-content-hide-no-init');
					tableEl.addClass('c-content-hide-init');					
				}
				else
				{
					tableEl.removeClass('c-content-hide-init');
					tableEl.addClass('c-content-hide-no-init');	
				}		
					
			}
			
		}
		
		
		
				
		
	});	
	
	
});