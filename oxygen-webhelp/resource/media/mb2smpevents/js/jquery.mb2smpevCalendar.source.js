/**
 * @package		Mb2 Simple Events
 * @version		1.1.1
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses/regular)
**/


(function ($, w) {"use strict";
	

$.fn.mb2smpevCalendar = function (options) {
   
   
    var opts = $.extend({}, $.fn.mb2smpevCalendarDefaults(), options);
   // var languageSettings = $.fn.mb2smpevCalendarLanguage(opts.language);
    opts = $.extend({}, opts);

    
	this.each(function () {
        var $calendarElement = $(this);
        $calendarElement.attr('id', "mb2smpev-calendar_" + Math.floor(Math.random() * 99999).toString(36));
        $calendarElement.data('initYear', opts.year);
        $calendarElement.data('initMonth', opts.month);
        $calendarElement.data('weekStartsOn', opts.weekstartson);
        $calendarElement.data('navIcons', opts.nav_icon);
        $calendarElement.data('showDays', opts.show_days);
        $calendarElement.data('showPrevious', opts.show_previous);
        $calendarElement.data('showNext', opts.show_next);
        $calendarElement.data('jsonData', opts.data);
        $calendarElement.data('ajaxSettings', opts.ajax);
        $calendarElement.data('actionFunction', opts.action);
        $calendarElement.data('actionNavFunction', opts.action_nav);
		

        
		

		
		/*
		 *
		 * Method to get calendar object
		 *
		 */
        function drawCalendar() 
		{
           
		    var dateInitYear = parseInt($calendarElement.data('initYear'));
            var dateInitMonth = parseInt($calendarElement.data('initMonth')) - 1;
            var dateInitObj = new Date(dateInitYear, dateInitMonth, 1, 0, 0, 0, 0);
            $calendarElement.data('initDate', dateInitObj); 
			$calendarElement.data('maxDate', dateInitObj);
			$calendarElement.data('minDate', dateInitObj);

            
			var $tableObj = $('<div class="mb2smpev-calendar-inner"></div>');            
			jumpToDate($calendarElement, $tableObj);	
			$tableObj = drawTable($calendarElement, $tableObj, dateInitObj.getFullYear(), dateInitObj.getMonth());
			
			
			var $containerHtml = $('<div class="mb2smpev-calendar" id="' + $calendarElement.attr('id') + '2"></div>');
            $containerHtml.append($tableObj);           
			$calendarElement.append($containerHtml);

            
			var jsonData = $calendarElement.data('jsonData');
            if (false !== jsonData) 
			{
                checkEvents($calendarElement, dateInitObj.getFullYear(), dateInitObj.getMonth());
            }
			
        }


		drawCalendar();



		/*
		 *
		 * Method to get calendar table
		 *
		 */
        function drawTable($calendarElement, $tableObj, year, month) 
		{
           
		    var dateCurrObj = new Date(year, month, 1, 0, 0, 0, 0);
            $calendarElement.data('currDate', dateCurrObj);

            
			$tableObj.empty();			
            $tableObj = appendMonthHeader($calendarElement, $tableObj, year, month);
            $tableObj = appendDayOfWeekHeader($calendarElement, $tableObj);
            $tableObj = appendDaysOfMonth($calendarElement, $tableObj, year, month);
            checkEvents($calendarElement, year, month);
            
			
			return $tableObj;
			
        }


		
	
		
		
		
		
		
		
		
		
		/*
		 *
		 * Method to get date form
		 *
		 */
        function jumpToDate($calendarElement, $tableObj) 
		{
			
			
			if (opts.jumpTo === true)
			{
			
				$('body').on('click', '.mb2smpev-jumpto' + $calendarElement.data('id'), function(e)
				{
					 
					e.preventDefault();
					
					
					var jumpToYear = Number($('#mb2smpev_jumptoyear' + $calendarElement.data('id')).val());
					var jumpToMonth = Number($('#mb2smpev_jumptomonth' + $calendarElement.data('id')).val());				
					drawTable($calendarElement, $tableObj, jumpToYear, jumpToMonth);
					
					
					clearEventsList();	
								
				});
			
			}
			
			
		}
		
		
		
		
		
		
	


        
		/*
		 *
		 * Method to get calendar month header
		 *
		 */
        function appendMonthHeader($calendarElement, $tableObj, year, month) 
		{
            
			var navIcons = $calendarElement.data('navIcons');
            var $prevMonthNavIcon = opts.prevHtml !='' ? $('' + opts.prevHtml + '') : $('<span class="glyphicon glyphicon-chevron-left"></span>');
            var $nextMonthNavIcon = opts.nextHtml !='' ? $('' + opts.nextHtml + '') : $('<span class="glyphicon glyphicon-chevron-right"></span>');
            
						
			if (typeof(navIcons) === 'object') 
			{                
				if ('prev' in navIcons) 
				{
                    $prevMonthNavIcon.html(navIcons.prev);
                }
                if ('next' in navIcons) 
				{
                    $nextMonthNavIcon.html(navIcons.next);
                }				
            }
			

            var prevIsValid = $calendarElement.data('showPrevious');
            
			
			if (typeof(prevIsValid) === 'number' || prevIsValid === false) {
               
			    prevIsValid = checkMonthLimit($calendarElement.data('showPrevious'), true);
				
            }
						

            var $prevMonthNav = $('<div class="calendar-month-navigation"></div>');
            $prevMonthNav.attr('id', $calendarElement.attr('id') + '_nav-prev');
            $prevMonthNav.data('navigation', 'prev');
           
		   
		    if (prevIsValid !== false) 
			{              
			  	var   prevMonth = (month - 1);
               	var  prevYear = year;
                
				
				if (prevMonth == -1) 
				{                    
					prevYear = (prevYear - 1);
                    prevMonth = 11;					
                }
				
				
                $prevMonthNav.data('to', {year: prevYear, month: (prevMonth + 1)});
                $prevMonthNav.append($prevMonthNavIcon);
               
			   
			   	if (typeof($calendarElement.data('actionNavFunction')) === 'function') 
				{                    
					$prevMonthNav.click($calendarElement.data('actionNavFunction'));					
                }
                
				
				$prevMonthNav.click(function (e) {
                   
				   	drawTable($calendarElement, $tableObj, prevYear, prevMonth);					
					clearEventsList();	
									
                });				
            }
			

            var nextIsValid = $calendarElement.data('showNext');
           
		   
		    if (typeof(nextIsValid) === 'number' || nextIsValid === false) 
			{                
				nextIsValid = checkMonthLimit($calendarElement.data('showNext'), false);				
            }
			

            var $nextMonthNav = $('<div class="calendar-month-navigation"></div>');
            $nextMonthNav.attr('id', $calendarElement.attr('id') + '_nav-next');
            $nextMonthNav.data('navigation', 'next');
            
			
			if (nextIsValid !== false) 
			{              	
				var nextMonth = (month + 1);
             	var nextYear = year;
               
			   
			    if (nextMonth == 12) 
				{                   
				    nextYear = (nextYear + 1);
                    nextMonth = 0;					
                }
				
				
                $nextMonthNav.data('to', {year: nextYear, month: (nextMonth + 1)});
                $nextMonthNav.append($nextMonthNavIcon);
				
				
                if (typeof($calendarElement.data('actionNavFunction')) === 'function') 
				{
                    $nextMonthNav.click($calendarElement.data('actionNavFunction'));
                }
				
				
                $nextMonthNav.click(function (e) {
					
                    drawTable($calendarElement, $tableObj, nextYear, nextMonth);
					clearEventsList();
					
                });
            }


            var monthLabels = opts.monthLabels;//$calendarElement.data('monthLabels');


            var $prevMonthCell = $('<div class="month-prev"></div>').append($prevMonthNav);
            var $nextMonthCell = $('<div class="month-next"></div>').append($nextMonthNav);


            var $currMonthLabel = $('<span>' + monthLabels[month] + ' ' + year + '</span>');
           
            $currMonthLabel.click(function () {
                var dateInitObj = $calendarElement.data('initDate');
                drawTable($calendarElement, $tableObj, dateInitObj.getFullYear(), dateInitObj.getMonth());
            });	

            var $currMonthCell = $('<div id="'+$calendarElement.attr('id')+'_month" class="month" data-month="' + Math.ceil(month+1) + '" data-year="' + year + '"></div>');
			var $monthIcon = opts.calendarIcon !='' ? $('' + opts.calendarIcon + '') : '';
			$currMonthCell.append($monthIcon);
			$currMonthCell.append($currMonthLabel);


            var $monthHeaderRow = $('<div class="calendar-month-header mb2smpev-clr"></div>');
            $monthHeaderRow.append($prevMonthCell, $currMonthCell, $nextMonthCell);
			
			

            $tableObj.append($monthHeaderRow);
            return $tableObj;
			
			
			
        }
		
		
		
		
		
		
		
		/*
		 *
		 * Method to clear efens list
		 *
		 */
		function clearEventsList ()
		{
			
			//if (opts.modal !== true)
			//{				
				
				//var $container = $('#'+$calendarElement.attr('id')+' .mb2smpev-events-container');				
				//$container.stop().animate({'height':0},0);
				
				$('.'+$calendarElement.attr('id')+'_event-item').remove();
				//setTimeout(function(){				
				//	$('.'+$calendarElement.attr('id')+'_event-item').remove();
				//}, 0);
								
			//}			
			
		}
		
		
		
		
		
		
		
		/*
		 *
		 * Method to append days to week header
		 *
		 */
        function appendDayOfWeekHeader($calendarElement, $tableObj) 
		{
            
			if ($calendarElement.data('showDays') === true) 
			{
               
			    var weekStartsOn = $calendarElement.data('weekStartsOn');
                var dowLabels = opts.dayLabels;
                
				
				if (weekStartsOn === 0) 
				{
                    var dowFull = $.extend([], dowLabels);
                    var sunArray = new Array(dowFull.pop());
                    dowLabels = sunArray.concat(dowFull);
                }
				

                var $dowHeaderRow = $('<div class="calendar-dow-header mb2smpev-clr"></div>');
                
				
				$(dowLabels).each(function (index, value) {
                    $dowHeaderRow.append('<div>' + value + '</div>');
                });
				
				
                $tableObj.append($dowHeaderRow);
				
            }
			
			
            return $tableObj;
			
        }
			
			
			
			
			
			
			
			
		/*
		 *
		 * Method to append days of months
		 *
		 */	
        function appendDaysOfMonth($calendarElement, $tableObj, year, month) 
		{
            
			var ajaxSettings = $calendarElement.data('ajaxSettings');
            var weeksInMonth = calcWeeksInMonth(year, month);
            var lastDayinMonth = calcLastDayInMonth(year, month);
            var firstDow = calcDayOfWeek(year, month, 1);
            var lastDow = calcDayOfWeek(year, month, lastDayinMonth);
            var currDayOfMonth = 1;
            var weekStartsOn = $calendarElement.data('weekStartsOn');
            
			
			if (weekStartsOn === 0) 
			{
               
			    if (lastDow == 6) 
				{
                    weeksInMonth++;
                }
				
				
                if (firstDow == 6 && (lastDow == 0 || lastDow == 1 || lastDow == 5)) 
				{
                    weeksInMonth--;
                }
				
				
                firstDow++;
				
				
                if (firstDow == 7) 
				{
                    firstDow = 0;
                }
				
            }
			
			
			var $dowRowContainer = $('<div class="calendar-days mb2smpev-clr"></div>');
			
            
			for (var wk = 0; wk < weeksInMonth; wk++) 
			{
                
				var $dowRow = $('<div class="calendar-dow mb2smpev-clr"></div>');
                
				
				
				for (var dow = 0; dow < 7; dow++) 
				{
                    
					if (dow < firstDow || currDayOfMonth > lastDayinMonth) 
					{
                        
						$dowRow.append('<div class="empty-day"></div>');
						
                    } 
					else 
					{
                        
						var dateId = $calendarElement.attr('id') + '_' + dateAsString(year, month, currDayOfMonth);
                        var dayId = dateId + '_day';

                       
					   	var $dayElement = $('<div id="' + dayId + '" class="day" >' + currDayOfMonth + '</div>');
                        $dayElement.data('day', currDayOfMonth);                      
						
						
						if (isToday(year, month, currDayOfMonth)) 
						{                        	
							$dayElement.addClass('today');							
                        }
							
                        
						var $dowElement = $('<div id="' + dateId + '"></div>');
                        $dowElement.append($dayElement);

                        
						$dowElement.data('date', dateAsString(year, month, currDayOfMonth));
                        $dowElement.data('hasEvent', false);

                        
						if (typeof($calendarElement.data('actionFunction')) === 'function') 
						{
                           
						    $dowElement.addClass('dow-clickable');
                           
						   
						    $dowElement.click(function () {
                                $calendarElement.data('selectedDate', $(this).data('date'));
                            });
							
							
                            $dowElement.click($calendarElement.data('actionFunction'));
							
                        }

                        
						$dowRow.append($dowElement);

                        
						currDayOfMonth++;
						
						
                    }
					
					
                    if (dow == 6) 
					{
                        firstDow = 0;
                    }
					
                }
				
				
               	$dowRowContainer.append($dowRow)
				$tableObj.append($dowRowContainer);
				
            }
			
			
            return $tableObj;
			
        }

        
		
		
		
		
		
		
		/*
		 *
		 * Method to get events container
		 *
		 */
		function createEventsContainer ()
		{			
			 
			 if (opts.modal !== true)
			 {
			 	
				var $eventsListContainer = $('<div class="mb2smpev-events-container" id="'+$calendarElement.attr('id')+'_events_container"></div>');	
			 	var $eventsListContainer2 = $('<div class="mb2smpev-events-container2" id="'+$calendarElement.attr('id')+'_events_container2"></div>');	
			 	$('#'+$calendarElement.attr('id')).append($eventsListContainer);
			 	$('#'+$calendarElement.attr('id')+' .mb2smpev-events-container').append($eventsListContainer2);
				
			 }
			 			
		}
		
		
		createEventsContainer ();
		
		
		
		
		
		
		/*
		 *
		 * Method to get events list
		 *
		 */
        function createEventsList(id, title, body, type, month, year,day,elayout,thumbc) 
		{   
						
			var isMonth = $('#' + $calendarElement.attr('id') + '_month').data('month');
			var isYear = $('#' + $calendarElement.attr('id') + '_month').data('year');
			var calendarParent = $('#' + $calendarElement.attr('id')).data('id');
			
					
			var $eventItem = $('<div class="mb2smpev-event-item mb2smpev-event-item-' + calendarParent + ' '+$calendarElement.attr('id')+'_event-item '+$calendarElement.attr('id')+'_event-item_'+day+' ' + type + '" id="' + id + '_modal"></div>');
			var $eventBody = $(body);
			
					
			if (month == isMonth && year == isYear)
			{			
				
				if (opts.modal === true)
				{				
					
					var $modalCloseHtml = opts.modalClose !='' ? opts.modalClose : '&times;';					
					var $modalCloseButton = $('<a class="mb2smpev-popup-close" href="#"  data-id="' + id + '_modal">' + $modalCloseHtml + '</a>');					
					var $modalHeaderTitle = $('<h3 class="mb2smpev-popup-title" id="' + id + '_modal_title">' + title + '</h3>');					
					var $modalContent = $('<div class="mb2smpev-popup-content"></div>');
					
					
					$modalContent.append($modalHeaderTitle);
					$modalContent.append($modalCloseButton);
					$modalContent.append($eventBody); 					 
					
					
					var $modalDialog = $('<div class="mb2smpev-popup-inner"></div>');      
					$modalDialog.append($modalContent); 					
					
					var $eventItem = $('<div class="mb2smpev-popup '+$calendarElement.attr('id')+'_event-item mb2smpev-event-item-' + calendarParent + ' ' + type + ' mb2smpev-elayout'+elayout+' mb2smpev-thumbc'+thumbc+'" id="' + id + '_modal"></div>');           
					$eventItem.append($modalDialog);
									
				}
				else
				{
					
					$eventItem.append($eventBody);
						
				}	
				
	
				$eventItem.data('dateId', id);
				$eventItem.attr("dateId", id);
				
	
				return $eventItem;
			
			}
			
			
			setNoEventMsg ();			
			
        }
		





		
		
		/*
		 *
		 * Method to check events
		 *
		 */		
        function checkEvents($calendarElement, year, month) 
		{
           
		    var jsonData = $calendarElement.data('jsonData');
            var ajaxSettings = $calendarElement.data('ajaxSettings');

            
			$calendarElement.data('events', false);

            
			if (false !== jsonData) 
			{
                
				return jsonEvents($calendarElement);
				
            } 
			else if (false !== ajaxSettings) 
			{
                
				return ajaxEvents($calendarElement, year, month);
				
            }
			

            return true;
			
        }
		
		
		
		
		
		
		
		
		/*
		 *
		 * Method to get json events
		 *
		 */
        function jsonEvents($calendarElement) 
		{
            
			var jsonData = $calendarElement.data('jsonData');
            
			
			$calendarElement.data('events', jsonData);
            drawEvents($calendarElement, 'json');
			
			
            return true;
			
        }
		
		
		
		
		
		
		
		
		/*
		 *
		 * Method to get ajax events
		 *
		 */
        function ajaxEvents($calendarElement, year, month) 
		{
           
		    var ajaxSettings = $calendarElement.data('ajaxSettings');

            
			if (typeof(ajaxSettings) != 'object' || typeof(ajaxSettings.url) == 'undefined') 
			{
                
				alert('Invalid calendar event settings');
                
				
				return false;
				
            }
			

            var data = {year: year, month: (month + 1)};
          
		   
		    $.ajax({
                type: 'GET',
                url: ajaxSettings.url,
                data: data,
				traditional: true,
				beforeSend: function(){ajaxSettings.onBeforeAjax.call();clearEventsList();} ,
                dataType: 'json'
            }).done(function (response) 
			{
                
				var events = [];
				
				
                $.each(response, function (k, v) {
                    
					events.push(response[k]);
									
                });
				
								
                $calendarElement.data('events', events);
                drawEvents($calendarElement, 'ajax');
				
								
				ajaxSettings.onAfterAjax.call();
				setEventsContainerHeight (250);					
				showPopupWindow ();	
				setNoEventMsg();
				
            });
			

            return true;
			
        }		
		
		
		
		
		
		
		
		
		/*
		 *
		 * Method to get clickable event link
		 *
		 */
		function clickEvent ()
		{			
			
			if (opts.modal !== true)
			{
				
				$('body').on('click', '.mb2smpev-event-link', function(e){
					
					e.preventDefault();
					
					
					var eventsGroupId = $(this).data('id');
					var eventGroups = $('.'+$(this).data('cid')+'_event-item');
				
					
					eventGroups.fadeOut(150);
					
					
					setTimeout(function(){
						
						$('.'+eventsGroupId).fadeIn(150);						
						
					},150);
					
					
					setTimeout(function(){
						
						setEventsContainerHeight (250);						
						
					},300);
										
					
				});	
			}
						
		}
		
		
		clickEvent();
		
		
		
		
		
		
		
		
		/*
		 *
		 * Method to get popup window events list
		 *
		 */
		function showPopupWindow ()

		{
			
			
			if (opts.modal === true)
			{
							
				
				if (opts.modalAnim === 'tobottom')
				{
					$('.'+$calendarElement.attr('id')+'_event-item').children().css({'top':-200,'opacity':0});	
				}
				
				
				
				$('body').on('click', '.mb2smpev-popup-link', function(e){
					
					e.preventDefault();					
					var panelId = $(this).data('id');					
					
					
					if (opts.modalAnim === 'tobottom')
					{						
						$('#'+panelId+' > div').stop().animate({'top':0,'opacity':1},250);
						$('#'+panelId).fadeIn(250);
					}
					else
					{
						$('#'+panelId).fadeIn(250);	
					}
					
								
					
				});			
				
				
				$('body').on('click', '.mb2smpev-popup-close', function(e){
					
					e.preventDefault();					
					var panelId = $(this).data('id');					
					
					
					if (opts.modalAnim === 'tobottom')
					{
						$('#'+panelId+' > div').stop().animate({'top':'-'+200,'opacity':0},250);
						$('#'+panelId).fadeOut(250);
					}
					else
					{
						$('#'+panelId).fadeOut(250);
					}
					
								
					
				});	
				
			}
			
		}
		
		
		
		
		
		
		
		
		
		/*
		 *
		 * Method to get events item
		 *
		 */
        function drawEvents($calendarElement, type) 
		{
           
		    var jsonData = $calendarElement.data('jsonData');
            var ajaxSettings = $calendarElement.data('ajaxSettings');
            var events = $calendarElement.data('events');
           
		   
		    if (events !== false) 
			{
               
			    $(events).each(function (index, value) 
				{
                    
					var id = $calendarElement.attr('id') + '_' + value.date;
                    var $dowElement = $('#' + id);
                    var $dayElement = $('#' + id + '_day');
					var month = value.date.split('-')[1];
					var year = value.date.split('-')[0];
					var day = value.date.split('-')[2];
					
					
					if (opts.modal === true)
					{
						
						$dayElement.wrap('<a href="#'+id+'_modal" class="mb2smpev-popup-link" data-id="'+id+'_modal"></a>');
						
					}
					else
					{
						
						$dayElement.wrap('<a href="#" class="mb2smpev-event-link" data-cid="'+$calendarElement.attr('id')+'" data-id="'+$calendarElement.attr('id')+'_event-item_'+day+'"></a>');	
						
					}
					
						
                    $dowElement.data('hasEvent', true);
					

                    if (typeof(value.titles) !== 'undefined' && opts.titleTooltip === true && typeof $.fn.tooltipsy !== 'undefined') 
					{
                        						
						var $tooltipContainer = '<span class="' + id + '_ttip" style="display:none;"></span>';						
						$dowElement.append($tooltipContainer);
						
						
						var $ttContent = '';						
						var i;
						
						
						for (i = 0; i < value.titles.length; i++) 
						{ 
							
							$ttContent += '<span class="ttip-event-title">' + value.titles[i] + '</span>';
							
						}
						
						
						$('.' + id + '_ttip').html($ttContent);
																		
							
						$dowElement.tooltipsy({
							content: $('.' + id + '_ttip').html(),
							className: 'mb2smpev-ttip',
							offset:[0,-20],
							delay: 350,
							alignTo: 'cursor'
						});
												
						
						
                    }
					
					
					if (typeof(value.type) !== 'undefined') 
					{
                        
						$dowElement.addClass(value.type);
						
                    }
					

                    if (typeof(value.classname) === 'undefined') 
					{
                        
						$dowElement.addClass('event');
						
                    } 
					else 
					{
                        
						$dowElement.addClass('event-styled');
                        $dayElement.addClass(value.classname);
						
                    }
					
					
                    if (typeof(value.body) !== 'undefined') 
					{
                        
                       	
						
						var $modalElement = createEventsList(id, value.title, value.body, value.type, month, year, day, opts.eLayout,opts.thumbc);
					   	
						if (opts.modal === true) 
						{ 
                            
							$('body').append($modalElement);
							
                       	}
						else
						{                         
						   
						   $('#'+$calendarElement.attr('id')+' .mb2smpev-events-container2').append($modalElement);
						   						   						   
						}						
						
                    }
					
                });
            }
        }
		
		
		
		
		
		
		/*
		 *
		 * Method to set events container height
		 *
		 */
		function setEventsContainerHeight (animSpeed)
		{			
			
			if(opts.modal !== true)
			{
				
				var $container = $('#'+$calendarElement.attr('id')+'_events_container');
				var $container2 = $('#'+$calendarElement.attr('id')+'_events_container2');
				var $eventItem = $('.'+$calendarElement.attr('id')+'_event-item');				
				
				$('#'+$calendarElement.attr('id')).imagesLoaded(function(){
				
					if($container2.height()>0)
					{
						
						$container.stop().animate({'height':$container2.height()},animSpeed);
							
					}
					else
					{
						
						$container.css({'height':0});
							
					}
				
				});
			}			
							
		}
		
		
		$(window).resize(function(){			
			setEventsContainerHeight(0);	
		});
		
		
		
		
		
		
		/*
		 *
		 * Method to get 'no-events' message
		 *
		 */		
		function setNoEventMsg ()
		{			
									
			if (opts.modal !== true)
			{			
				
				var $noEventMsg = $('<div class="mb2smpev-no-events">' + opts.no_events_msg + '</div>');
				
							
				if (!$('#'+$calendarElement.attr('id')).find('.mb2smpev-no-events')[0])
				{
					
					$('#'+$calendarElement.attr('id')+'_events_container2').append($noEventMsg);
						
				}
					
				
				if ($('#'+$calendarElement.attr('id')).find('.mb2smpev-event-item')[0])
				{
					
					$('#'+$calendarElement.attr('id')).find('.mb2smpev-no-events').remove();
						
				}
				
			}
			
		}
		
		
		

        /*
		 *
		 * Method to get current day
		 *
		 */
        function isToday(year, month, day) 
		{
            
			var todayObj = new Date();
            var dateObj = new Date(year, month, day);
            
			
			return (dateObj.toDateString() == todayObj.toDateString());
			
        }
		
		
		
		
		
		
		
		/*
		 *
		 * Method to get date as string
		 *
		 */
        function dateAsString(year, month, day) 
		{
          
		   	var d = (day < 10) ? '0' + day : day;
           	var m = month + 1;
          	var  m = (m < 10) ? '0' + m : m;
			
			
            return year + '-' + m + '-' + d;
			
        }
		
		
		
		
		
		
		/*
		 *
		 * Method to calculate date of weeks
		 *
		 */
        function calcDayOfWeek(year, month, day) 
		{
            
			var dateObj = new Date(year, month, day, 0, 0, 0, 0);
            var dow = dateObj.getDay();
            
			
			if (dow == 0) 
			{
                dow = 6;
            } 
			else 
			{
                dow--;
            }
			
			
            return dow;
			
        }
		
		
		
		
		
		
		/*
		 *
		 * Method to calculate date of month
		 *
		 */
        function calcLastDayInMonth(year, month) 
		{
            
			var day = 28;
            
			
			while (checkValidDate(year, month + 1, day + 1)) 
			{
                
				day++;
				
            }
			
			
            return day;
			
        }
		
		
		
		
		
		
		
		/*
		 *
		 * Method to calculate weeks of month
		 *
		 */
        function calcWeeksInMonth(year, month) 
		{
            
			var daysInMonth = calcLastDayInMonth(year, month);
            var firstDow = calcDayOfWeek(year, month, 1);
            var lastDow = calcDayOfWeek(year, month, daysInMonth);
            var days = daysInMonth;
            var correct = (firstDow - lastDow);
           
		   
		    if (correct > 0) 
			{
                days += correct;
            }
			
			
            return Math.ceil(days / 7);
			
        }
		
		
		
		
		
		
		/*
		 *
		 * Method to valid date
		 *
		 */
        function checkValidDate(y, m, d) 
		{
           
		   
		    return m > 0 && m < 13 && y > 0 && y < 32768 && d > 0 && d <= (new Date(y, m, 0)).getDate();
			
			
        }
		
		
		
		
		
		/*
		 *
		 * Method to check moth limit
		 *
		 */
        function checkMonthLimit(count, invert) 
		{
            
			if (count === false) 
			{
                count = 0;
            }
			
			
            var d1 = $calendarElement.data('currDate');
            var d2 = $calendarElement.data('initDate');
            var months;
           
		   
		    months = (d2.getFullYear() - d1.getFullYear()) * 12;
            months -= d1.getMonth() + 1;
            months += d2.getMonth();

           
		    if (invert === true) 
			{
               
			    if (months < (parseInt(count) - 1))
				{
                    
					return true;
					
                }
				
            }
			else 
			{
               
			    if (months >= (0 - parseInt(count))) 
				{
                   
				    return true;
					
                }
				
            }
			
			
            return false;
        }
		
		
    }); // each()
	

    return this;
	
};




/**
 * Default settings
 *
 * @returns object
 *   language:          string,
 *   year:              integer,
 *   month:             integer,
 *   show_previous:     boolean|integer,
 *   show_next:         boolean|integer,
 *   show_days:         boolean,
 *   weekstartson:      integer (0 = Sunday, 1 = Monday),
 *   nav_icon:          object: prev: string, next: string
 *   ajax:              object: url: string, modal: boolean,
 *   action:            function
 *   action_nav:        function
 */
$.fn.mb2smpevCalendarDefaults = function () 
{
	
	var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var settings = {
        language: false,
        year: year,
        month: month,
        show_previous: true,
        show_next: true,
        show_days: true,
        weekstartson: 1,
        nav_icon: false,
        data: false,
        ajax: false,
        action: false,
        action_nav: false,
		modal: false,
		modalAnim: 'tobottom',
		modalClose: '',
		prevHtml: '',
		nextHtml: '',
		calendarIcon: '',
		jumpTo: false,
		overlayBg: true,
		overlayBgImg: '',
		no_events_msg: 'No events',
		titleTooltip: false,
		monthLabels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
		dayLabels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]
    };
	
	
    return settings;
	
};


})(jQuery, window);