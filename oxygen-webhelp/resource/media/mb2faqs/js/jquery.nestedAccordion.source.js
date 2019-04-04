 /*! 
 * Nested Accordion v.1.4.7.4 
 * Script to create 'accordion' functionality on a hierarchically structured content.
 * http://www.adipalaz.com/experiments/jquery/nested_accordion.html
 *
 * Requires: jQuery v. 1.4.3+ / updated for jQuery v. 1.9 /
 * Copyright (c) 2009, 2010, 2011, 2012, 2013 Adriana Palazova
 *
 * Dual licensed under the MIT (http://www.adipalaz.com/docs/mit-license.txt) and GPL v. 2 (http://www.adipalaz.com/docs/gpl-license.txt) licenses.
 */
 
;(function($) {
  //"use strict";
  $.fn.accordion = function(options) {

    var version = '1.4.7.4';
    var o = $.extend({}, $.fn.accordion.defaults, options);
	  
    return this.each(function() {
      //var containerID = o.container ? '#' + this.id : '', objID = o.objID ? o.objID : o.obj + o.objClass,
    //    Obj = o.container ? containerID + ' ' + objID : '#' + this.id,
		var containerID = o.container ? this.id : '', objID = o.objID ? o.objID : o.obj + o.objClass,
    	Obj = o.container ? containerID + ' ' + objID : this.id,
        El = Obj + ' ' + o.el,
        hTimeout = null; 

      // build
      if (o.head) $(Obj).find(o.head).addClass('h');
      if (o.head) {
        if ($(El).next('div:not(.mb2faqs-accordion-list-item__outer)').length) {$(El).next('div:not(.mb2faqs-accordion-list-item__outer)').wrap('<div class="mb2faqs-accordion-list-item__outer" />');} 
        $(Obj + ' .h').each(function(){
            var $this = $(this);
            if (o.wrapper == 'div' && !$this.parent('div.mb2faqs-accordion-list-item').length) {$this.add( $this.next('div.mb2faqs-accordion-list-item__outer') ).wrapAll('<div class="mb2faqs-accordion-list-item"></div>');}
        }); 
      }
      $(El).each(function(){
          var $node = $(this);
          if ($node.find(o.next).length || $node.next(o.next).length) {
            if ($node.find('> a').length) {
              if (o.iconTrigger) {
                $node.find('> a').addClass('link');
              } else {
                $node.find('> a').addClass("trigger");
              }
            } else {
                var anchor = o.iconTrigger ? '<span class="heading" />' : '<a class="trigger" href="#" />'
                if (o.elToWrap) {
                  var $t = nodes($node), $s = $node.find(o.elToWrap), $object = $t.add($s);
                  $object.wrapAll(anchor);
                } else {
                  nodes($node).wrap(anchor);
                }
            }
            if(o.iconTrigger) {
              $node.find('> a, >span.heading').before('<a href="#" class="icon trigger"></a>'); 
              $node.find('> a.icon.trigger');
            }
            
          } else {
            $node.addClass('last-child');
            if (o.lastChild && $node.find('> a').length) {$node.find('> a').addClass("trigger");}
          }
      });
      function nodes(el) {
        var txt = [];
        el.each(function(){
          $.each(this.childNodes, function() { if (this.nodeType == 3 && $.trim(this.nodeValue)) {txt.push(this);} })
        }); 
        return $(txt);
      };
      
      // init state
      $(El + ' a.trigger').closest(o.wrapper).find('> ' + o.next).not('.shown').hide().closest(o.wrapper).find('a.open').removeClass('open').data('state', 0);
      
      if (o.activeLink && o.initShow) {
          var fullURL = window.location.href,
              arrPath = fullURL.split(o.splitUrl),
              relPath = (o.uri != 'full' && fullURL.indexOf(o.splitUrl) >= 0) ? arrPath[arrPath.length-1] : fullURL;
          $(Obj + ' a:not([href $= "#"])').each(function() {
            var a = $(this), fullHref, aHref;
            if (o.uri != 'full' && a.attr('href').indexOf(o.splitUrl) >= 0) {
              fullHref = a.attr('href').split(o.splitUrl); aHref = fullHref[fullHref.length-1];
            } else {
              aHref = a.attr('href');
            }
            if (aHref == relPath) {
              a.addClass('active').parent().attr('id', 'current').closest(o.obj).addClass('current');
            }
          });
      }
      
      if (o.shift && $(Obj + ' a.active').closest(o.wrapper).prev(o.wrapper).length) {
        var $currentWrap = $(Obj + ' a.active').closest(o.wrapper),
            $curentStack = ($().addBack) ? $currentWrap.nextAll().addBack() : $currentWrap.nextAll().andSelf(),
            $siblings = $currentWrap.siblings(o.wrapper),
            $first = $siblings.filter(":first");
        if (o.shift == 'clicked' || (o.shift == 'all' && $siblings.length)) {
            $currentWrap.insertBefore($first).addClass('shown').siblings(o.wrapper).removeClass('shown');
        }
        if (o.shift == 'all' && $siblings.length > 1) {$curentStack.insertBefore($first);}
      }
          
      if (o.initShow) {
        $(Obj).find(o.initShow).show().addClass('shown')
          .parents(Obj + ' ' + o.next).show().addClass('shown').end()
          .parents(o.wrapper).find('> a.trigger, > ' + o.el + ' a.trigger').addClass('open').data('state', 1);
          if (o.expandSub) {$(Obj + ' ' + o.initShow).children(o.next).show().end().find('> a.trigger').addClass('open').data('state', 1 );}
          if ($(Obj + ' ' + o.initShow).next(o.next).length) {$(Obj + ' ' + o.initShow).next(o.next).show().end().find('> a.trigger').addClass('open').data('state', 1 );}
      }
      
      // event
      if (o.event == 'click') {
          var ev = 'click';
      } else  {
          if (o.focus) {var f = ' focus';} else {var f = '';}
          var ev = 'mouseenter' + f;
      }
      var scrollElem;
      (typeof scrollableElement == 'function') ? (scrollElem = scrollableElement('html', 'body')) : (scrollElem = 'html, body');

      // The event handler is bound to the "accordion" element
      // The event is filtered to only fire when an <a class="trigger"> was clicked on.
      $(Obj).delegate('a.trigger', ev, function(ev) {
          var $thislink = $(this),
              $thisWrapper = $thislink.closest(o.wrapper),
              $nextEl = $thisWrapper.find('> ' + o.next),
              $siblings = $thisWrapper.siblings(o.wrapper),
              $trigger = $(El + ' a.trigger'),
              $shownEl = $thisWrapper.siblings(o.wrapper).find('>' + o.next + ':visible'),
              shownElOffset;
              $shownEl.length ? shownElOffset = $shownEl.offset().top : shownElOffset = false;
              
          function action(obj) {
             if (($nextEl).length && $thislink.data('state') && (o.collapsible)) {
                  $thislink.removeClass('open');
                  $nextEl.filter(':visible')[o.hideMethod](o.hideSpeed, function() {$thislink.data('state', 0);});
              }
              if (($nextEl.length && !$thislink.data('state')) || (!($nextEl).length && $thislink.closest(o.wrapper).not('.shown'))) {
                  if (!o.standardExpansible) {
                    $siblings.find('> a.open, >'+ o.el + ' a.open').removeClass('open').data('state', 0).end()
                    .find('> ' + o.next + ':visible')[o.hideMethod](o.hideSpeed);
                    if (shownElOffset && shownElOffset < $(window).scrollTop()) {$(scrollElem).animate({scrollTop: shownElOffset}, o.scrollSpeed);}
                  }
                  $thislink.addClass('open');
                  $nextEl.filter(':hidden')[o.showMethod](o.showSpeed, function() {$thislink.data('state', 1);});
              }
              if (o.shift && $thisWrapper.prev(o.wrapper).length) {
                var $thisStack = ($().addBack) ? $thisWrapper.nextAll().addBack() : $thisWrapper.nextAll().andSelf(),
                    $first = $siblings.filter(":first");
                if (o.shift == 'clicked' || (o.shift == 'all' && $siblings.length)) {
                  $thisWrapper.insertBefore($first).addClass('shown').siblings(o.wrapper).removeClass('shown');
                }
                if (o.shift == 'all' && $siblings.length > 1) {$thisStack.insertBefore($first);}
              }
          }
          if (o.event == 'click') {
              action($trigger); 
              if ($thislink.is('[href $= "#"]')) {
                  return false;
              } else {
                  if ($.isFunction(o.retFunc)) {
                    return o.retFunc($thislink) 
                  } else {
                    return true;
                  }
              }
          }
          if (o.event != 'click') {
              hTimeout = window.setTimeout(function() {
                  action($trigger);
              }, o.interval);        
              $thislink.click(function() {
                  $thislink.blur();
                  if ($thislink.attr('href')== '#') {
                      $thislink.blur();
                      return false;
                  }
              });
          }
      });
      if (o.event != 'click') {$(Obj).delegate('a.trigger', 'mouseleave', function() {window.clearTimeout(hTimeout); });}
      
      /* -----------------------------------------------
      // http://www.learningjquery.com/2007/10/improved-animated-scrolling-script-for-same-page-links:
      -------------------------------------------------- */
      function scrollableElement(els) {
        for (var i = 0, argLength = arguments.length; i < argLength; i++) {
          var el = arguments[i],
              $scrollElement = $(el);
          if ($scrollElement.scrollTop() > 0) {
            return el;
          } else {
            $scrollElement.scrollTop(1);
            var isScrollable = $scrollElement.scrollTop() > 0;
            $scrollElement.scrollTop(0);
            if (isScrollable) {
              return el;
            }
          }
        };
        return [];
      }; 
      /* ----------------------------------------------- */
      
  });};
  $.fn.accordion.defaults = {
    container : true, // {true} if the plugin is called on the closest named container, {false} if the pligin is called on the accordion element
    obj : 'ul', // the element which contains the accordion - 'ul', 'ol', 'div' 
    objClass : '.accordion', // the class name of the accordion - required if you call the accordion on the container
    objID : '', // the ID of the accordion (optional)
    wrapper :'li', // the common parent of 'a.trigger' and 'o.next' - 'li', 'div'
    el : 'li', // the parent of 'a.trigger' - 'li', '.h'
    head : '', // the headings that are parents of 'a.trigger' (if any)
    next : 'ul', // the collapsible element - 'ul', 'ol', 'div'
    iconTrigger : false,
    initShow : '', // the initially expanded section (optional)
    expandSub : true, // {true} forces the sub-content under the 'current' item to be expanded on page load
    showMethod : 'slideDown', // 'slideDown', 'show', 'fadeIn', or custom
    hideMethod : 'slideUp', // 'slideUp', 'hide', 'fadeOut', or custom
    showSpeed : 400,
    hideSpeed : 800,
    scrollSpeed : 600, //speed of repositioning the newly opened section when it is pushed off screen.
    activeLink : true, //{true} if the accordion is used for site navigation
    event : 'click', //'click', 'hover'
    focus : true, // it is needed for  keyboard accessibility when we use {event:'hover'}
    interval : 400, // time-interval for delayed actions used to prevent the accidental activation of animations when we use {event:hover} (in milliseconds)
    collapsible : true, // {true} - makes the accordion fully collapsible, {false} - forces one section to be open at any time
    standardExpansible : false, //if {true}, the functonality will be standard Expand/Collapse without 'accordion' effect
    lastChild : true, //if {true}, the items without sub-elements will also trigger the 'accordion' animation
    shift: false, // false, 'clicked', 'all'. If 'clicked', the clicked item will be moved to the first position inside its level, 
                  // If 'all', the clicked item and all following siblings will be moved to the top
    elToWrap: null, // null, or the element, besides the text node, to be wrapped by the trigger, e.g. 'span:first'
    uri : 'full', // 'full' if you use absolute paths. 'relative' - if you use relative paths in a navigation accordion - specify splitUrl option below
    splitUrl: '/', // If you use relative paths in a navigation accordion, specify a symbol '/', '?', '#', etc.
    retFunc: null //
  };

  /* ---------------------------------------------
  Feel free to remove the following code if you don't need these custom animations.
  ------------------------------------------------ */
  var msie = false;
  if(typeof window.attachEvent != 'undefined') { msie = true; } // IE before version 9

  $.fn.slideFadeDown = function(speed, callback) { 
    return this.animate({opacity: 'show', height: 'show'}, speed, function() { 
      if (msie) { this.style.removeAttribute('filter'); }
      if (jQuery.isFunction(callback)) { callback(); }
    }); 
  }; 
  $.fn.slideFadeUp = function(speed, callback) { 
    return this.animate({opacity: 'hide', height: 'hide'}, speed, function() { 
      if (msie) { this.style.removeAttribute('filter'); }
      if (jQuery.isFunction(callback)) { callback(); }
    }); 
  }; 
  /* --- end of the optional code --- */

})(jQuery);

///////////////////////////
//  The plugin can be called on the ID of the accordion element - ({container: false}) 
//  or 
//  on the ID of its closest named container - ({container: true}) - default. In this case, the accordions should have a class. The default class is ".accordion". 
//
//  If the plugin is called on a named container, we can initialize all the accordions residing in a given section with just one call.
//  EXAMPLES:
///////////////////////////
/*  ---
    $(function() {
    
    // If the closest named container = #container1 or the accordion element is <ul id="subnavigation">:
    /// Standard nested lists:
      $('#container1').accordion(); // we are calling the plugin on the closest named container
      $('#subnavigation').accordion({container: false}); // we are calling the plugin on the accordion element
      // this will expand the sub-list with "id=current", when the accordion is initialized:
      $('#subnavigation').accordion({container: false, initShow : "#current"});
      // this will expand/collapse the sub-list when the mouse hovers over the trigger element:
      $('#container1').accordion({event: "hover", initShow : "#current"});
      // NEW in v.1.4.7.4: The accordion animations can be triggered by clicking the icons:
      $('#container1').accordion({iconTrigger: true});
      // NEW in v.1.4.7.4: In a navigation accordion, we can use relative paths. We should specify the split symbol in option splitUrl:
      $("#container1").accordion({initShow: "#current", uri: "relative", splitUrl: '?'});    
     
    // If the closest named container = #container2
    /// Nested Lists + Headings + DIVs:
      $('#container2').accordion({el: '.h', head: 'h4, h5', next: 'div'});
      $('#container2').accordion({el: '.h', head: 'h4, h5', next: 'div', initShow : 'div.mb2faqs-accordion-list-item__outer:eq(0)'});
      
    /// Nested DIVs + Headings:
      $('#container2').accordion({obj: 'div', wrapper: 'div', el: '.h', head: 'h4, h5', next: 'div.mb2faqs-accordion-list-item__outer'});
      $('#container2').accordion({objID: '#acc2', obj: 'div', wrapper: 'div', el: '.h', head: 'h4, h5', next: 'div.mb2faqs-accordion-list-item__outer', initShow : '.shown', shift: 'all'});
      
    });

    /// We can globally replace the defaults, for example:
    $.fn.accordion.defaults.initShow = "#current";
    $.fn.accordion.defaults.container = false;

    /// Example options for Hover Accordion:
    $.fn.accordion.defaults.container=false;
    $.fn.accordion.defaults.event="hover";
    $.fn.accordion.defaults.focus=false; // Optional. If it is possible, use {focus: true}, since {focus: false} will break the keyboard accessibility
    $.fn.accordion.defaults.initShow="#current";
    $.fn.accordion.defaults.lastChild=false;
--- */








/*! 
 * expandAll v.1.3.8.3
 * http://www.adipalaz.com/experiments/jquery/expand.html
 *
 * Requires: jQuery v. 1.3+ / updated for jQuery v. 1.9 /
 * Copyright (c) 2009, 2010, 2011, 2012, 2013 Adriana Palazova
 *
 * Dual licensed under the MIT (http://www.adipalaz.com/docs/mit-license.txt) and GPL v. 2 (http://www.adipalaz.com/docs/gpl-license.txt) licenses
 */
;(function($) {
//"use strict";
$.fn.expandAll = function(options) {

    var version = '1.3.8.3';
    var o = $.extend({}, $.fn.expandAll.defaults, options);   
    
    return this.each(function(index) {
        var $$ = $(this), $referent, $sw, $cllps, $tr, container, toggleTxt, toggleClass;
               
        // --- functions:
       (o.switchPosition == 'before') ? ($.fn.findSibling = $.fn.prev, $.fn.insrt = $.fn.before) : ($.fn.findSibling = $.fn.next, $.fn.insrt = $.fn.after);
                    
        // --- var container 
        if (this.id.length) { container = '#' + this.id;
        } else if (this.className.length) { container = this.tagName.toLowerCase() + '.' + this.className.split(' ').join('.');
        } else { container = this.tagName.toLowerCase();}
        
        // --- var $referent
        if (o.ref && $$.find(o.ref).length) {
          (o.switchPosition == 'before') ? $referent = $$.find(o.ref).filter(':first') : $referent = $$.find(o.ref).filter(':last');
        } else { return; }
        
        // end the script if the length of the collapsible element isn't long enough.  
        if (o.cllpsLength && $$.closest(container).find(o.cllpsEl).text().length < o.cllpsLength) {$$.closest(container).find(o.cllpsEl).addClass('dont_touch'); return;}
    
        // --- init state:
        (o.initTxt == 'show') ? (toggleTxt = o.expTxt, toggleClass='') : (toggleTxt = o.cllpsTxt, toggleClass='open');
        if (o.state == 'hidden') { 
          $$.find(o.cllpsEl + ':not(.shown, .dont_touch)').hide().findSibling().find('> a.open').removeClass('open').data('state', 0); 
        } else {
          $$.find(o.cllpsEl).show().findSibling().find('> a').addClass('open').data('state', 1); 
        }
        
        (o.oneSwitch) ? ($referent.insrt('<p class="switch"><a href="#" class="' + toggleClass + '">' + toggleTxt + '</a></p>')) :
          ($referent.insrt('<p class="switch"><a href="#" class="">' + o.expTxt + '</a>&nbsp;|&nbsp;<a href="#" class="open">' + o.cllpsTxt + '</a></p>'));

        // --- var $sw, $cllps, $tr :
        $sw = $referent.findSibling('p').find('a');
        $cllps = $$.closest(container).find(o.cllpsEl).not('.dont_touch');
        $tr = (o.trigger) ? $$.closest(container).find(o.trigger + ' > a') : $$.closest(container).find('.expand > a');
                
        if (o.child) {
          $$.find(o.cllpsEl + '.shown').show().findSibling().find('> a').addClass('open').text(o.cllpsTxt);
          window.$vrbls = { kt1 : o.expTxt, kt2 : o.cllpsTxt };
        }

        var scrollElem;
        (typeof scrollableElement == 'function') ? (scrollElem = scrollableElement('html', 'body')) : (scrollElem = 'html, body');
        
        $sw.click(function() {
            var $switch = $(this),
                $c = $switch.closest(container).find(o.cllpsEl).filter(':first'),
                cOffset = $c.offset().top - o.offset;
            if (o.parent) {
              var $swChildren = $switch.parent().nextAll().children('p.switch').find('a');
                  kidTxt1 = $vrbls.kt1, kidTxt2 = $vrbls.kt2,
                  kidTxt = ($switch.text() == o.expTxt) ? kidTxt2 : kidTxt1;
              $swChildren.text(kidTxt);
              if ($switch.text() == o.expTxt) {$swChildren.addClass('open');} else {$swChildren.removeClass('open');}
            }
            if ($switch.text() == o.expTxt) {
              if (o.oneSwitch) {$switch.text(o.cllpsTxt).attr('class', 'open');}
              $tr.addClass('open').data('state', 1);
              $cllps[o.showMethod](o.speed);
            } else {
              if (o.oneSwitch) {$switch.text(o.expTxt).attr('class', '');}
              $tr.removeClass('open').data('state', 0);
              if (o.speed == 0 || o.instantHide) {$cllps.hide();} else {$cllps[o.hideMethod](o.speed);}
              if (o.scroll && cOffset < $(window).scrollTop()) {$(scrollElem).animate({scrollTop: cOffset},600);}
          }
          return false;
        });
        /* -----------------------------------------------
        To save file size, feel free to remove the following code if you don't use the option: 'localLinks: true'
        -------------------------------------------------- */
        if (o.localLinks) { 
          var localLink = $(container).find(o.localLinks);
          if (localLink.length) {
            // based on http://www.learningjquery.com/2007/10/improved-animated-scrolling-script-for-same-page-links:
            $(localLink).click(function() {
              var $target = $(this.hash);
              $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
              if ($target.length) {
                var tOffset = $target.offset().top;
                $(scrollElem).animate({scrollTop: tOffset},600);
                return false;
              }
            });
          }
        }
        /* -----------------------------------------------
        Feel free to remove the following function if you don't use the options: 'localLinks: true' or 'scroll: true'
        -------------------------------------------------- */
        //http://www.learningjquery.com/2007/10/improved-animated-scrolling-script-for-same-page-links:
        function scrollableElement(els) {
          for (var i = 0, argLength = arguments.length; i < argLength; i++) {
            var el = arguments[i],
                $scrollElement = $(el);
            if ($scrollElement.scrollTop() > 0) {
              return el;
            } else {
              $scrollElement.scrollTop(1);
              var isScrollable = $scrollElement.scrollTop() > 0;
              $scrollElement.scrollTop(0);
              if (isScrollable) {
                return el;
              }
            }
          };
          return [];
        }; 
      /* --- end of the optional code --- */
});};
$.fn.expandAll.defaults = {
        state : 'hidden', // If 'hidden', the collapsible elements are hidden by default, else they are expanded by default 
        initTxt : 'show', // 'show' - if the initial text of the switch is for expanding, 'hide' - if the initial text of the switch is for collapsing
        expTxt : '[Expand All]', // the text of the switch for expanding
        cllpsTxt : '[Collapse All]', // the text of the switch for collapsing
        oneSwitch : true, // true or false - whether both [Expand All] and [Collapse All] are shown, or they swap
        ref : '.expand', // the switch 'Expand All/Collapse All' is inserted in regards to the element specified by 'ref'
        switchPosition: 'before', //'before' or 'after' - specifies the position of the switch 'Expand All/Collapse All' - before or after the collapsible element
        scroll : false, // false or true. If true, the switch 'Expand All/Collapse All' will be dinamically repositioned to remain in view when the collapsible element closes
        offset : 20,
        showMethod : 'slideDown', // 'show', 'slideDown', 'fadeIn', or custom
        hideMethod : 'slideUp', // 'hide', 'slideUp', 'fadeOut', or custom
        speed : 600, // the speed of the animation in m.s. or 'slow', 'normal', 'fast'
        cllpsEl : '.collapse', // the collapsible element
        trigger : '.expand', // if expandAll() is used in conjunction with toggle() - the elements that contain the trigger of the toggle effect on the individual collapsible sections
        localLinks : null, // null or the selector of the same-page links to which we will apply a smooth-scroll function, e.g. 'a.to_top'
        parent : false, // true, false
        child : false, // true, false
        cllpsLength : null, //null, {Number}. If {Number} (e.g. cllpsLength: 200) - if the number of characters inside the "collapsible element" is less than the given {Number}, the element will be visible all the time
        instantHide : false // {true} fixes hiding content inside hidden elements
};

/*! ---------------------------------------------
Toggler v.1.0
http://www.adipalaz.com/experiments/jquery/expand.html
Requires: jQuery v1.3+
Copyright (c) 2009 Adriana Palazova
Dual licensed under the MIT (http://www.adipalaz.com/docs/mit-license.txt) and GPL (http://www.adipalaz.com/docs/gpl-license.txt) licenses
------------------------------------------------ */
$.fn.toggler = function(options) {
    var o = $.extend({}, $.fn.toggler.defaults, options);
    
    var $this = $(this);
    $this.wrapInner('<a style="display:block" href="#" title="Expand/Collapse" />');
    if (o.initShow) {$(o.initShow).addClass('shown');}
    $this.next(o.cllpsEl + ':not(.shown)').hide();
    return this.each(function() {
      var container;
      (o.container) ? container = o.container : container = 'html';
      if ($this.next('div.shown').length) { $this.closest(container).find('.shown').show().prev().find('a').addClass('open'); }
      $(this).click(function() {
        $(this).find('a').toggleClass('open').end().next(o.cllpsEl)[o.method](o.speed);
        return false;
    });
});};
$.fn.toggler.defaults = {
     cllpsEl : 'div.collapse',
     method : 'slideToggle',
     speed : 'slow',
     container : '', //the common container of all groups with collapsible content (optional)
     initShow : '.shown' //the initially expanded sections (optional)
};
/* ---------------------------------------------
Feel free to remove any of the following functions if you don't need it.
------------------------------------------------ */

var msie = false;
if(typeof window.attachEvent != 'undefined') { msie = true; }

$.fn.fadeToggle = function(speed, callback) {
    return this.animate({opacity: 'toggle'}, speed, function() { 
    if (msie) { this.style.removeAttribute('filter'); }
    if (jQuery.isFunction(callback)) { callback(); }
  }); 
};
$.fn.slideFadeToggle = function(speed, easing, callback) {
    return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, function() { 
    if (msie) { this.style.removeAttribute('filter'); }
    if (jQuery.isFunction(callback)) { callback(); }
  }); 
};
$.fn.slideFadeDown = function(speed, callback) { 
  return this.animate({opacity: 'show', height: 'show'}, speed, function() { 
    if (msie) { this.style.removeAttribute('filter'); }
    if (jQuery.isFunction(callback)) { callback(); }
  }); 
}; 
$.fn.slideFadeUp = function(speed, callback) { 
  return this.animate({opacity: 'hide', height: 'hide'}, speed, function() { 
    if (msie) { this.style.removeAttribute('filter'); }
    if (jQuery.isFunction(callback)) { callback(); }
  }); 
}; 
/* --- end of the optional code --- */
})(jQuery);