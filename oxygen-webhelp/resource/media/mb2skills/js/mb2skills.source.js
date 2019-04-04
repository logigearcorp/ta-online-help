/**
 * @package		Mb2 Skills
 * @version		1.2.1
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/


jQuery(document).ready(function($){
	
	
	var element = document.getElementById('example-circle-container');
	//var element = $('#example-circle-container');

	
	
	
	$('.mb2skills-item').each(function(){
		
		
		var skillWrap = $(this);
		var skillE = skillWrap.find('.mb2skills-element');
		var isVal = skillE.data('sval');
		var isText = skillE.data('text');		
		var isStrokeWidth = skillE.data('sw');
		var isStrokeColor = skillE.data('sc');
		var istrailColor = skillE.data('tc');
		var isFillColor = skillE.data('fc'); 
		var showVal = skillE.data('showval');	
		var valSuff = skillE.data('valsuff');
		var isTopVal = skillE.data('topval');
		var animSpeed = skillE.data('aspeed');
		var isType = skillE.data('type');
		
		
		var isText = showVal == 1 ? '' : isText;
		
		
		
		
		
		
		
		
		if (isType == 'Circle')
		{
			var el = new ProgressBar.Circle(skillE[0], {
				color: isStrokeColor,
				strokeWidth: isStrokeWidth,
				duration: animSpeed,
				trailColor: istrailColor!='' ? istrailColor : '',
				text:
				{
					value: isText,
					style: null,
					className: 'progressbar-text'
				},
				step: function(state, bar) {
					if (showVal == 1)
					{
						bar.setText((bar.value()*100).toFixed(0)+valSuff);
					}
				},
				fill: isFillColor
			});
		}
		else if (isType == 'SemiCircle')
		{
			var el = new ProgressBar.SemiCircle(skillE[0], {
				color: isStrokeColor,
				strokeWidth: isStrokeWidth,
				duration: animSpeed,
				trailColor: istrailColor!='' ? istrailColor : '',
				text:
				{
					value: isText,
					style: null,
					className: 'progressbar-text'
				},
				step: function(state, bar) {
					if (showVal == 1)
					{
						bar.setText((bar.value()*100).toFixed(0)+valSuff);
					}
				},
				fill: isFillColor
			});
		}
		else
		{
			var el = new ProgressBar.Line(skillE[0], {
				color: isStrokeColor,
				strokeWidth: isStrokeWidth,
				duration: animSpeed,
				trailColor: istrailColor!='' ? istrailColor : '',
				text:
				{
					value: isText,
					style: null,
					className: 'progressbar-text'
				},
				step: function(state, bar) {
					if (showVal == 1)
					{
						bar.setText((bar.value()*100).toFixed(0)+valSuff);
					}
				},
				fill: ''
			});
		}
		
		
		
		// Wrap skill description and add skill name		
		skillE.find('.progressbar-text').wrap('<div class="mb2skills-desc-wrap" />');
		skillE.find('.progressbar-text').addClass('mb2skills-skill-value');
		skillE.find('.mb2skills-desc-wrap div').removeClass('progressbar-text');
		skillE.find('.mb2skills-desc-wrap').append('<div class="mb2skills-skill-name">'+skillE.data('text')+'</div>');	
		
		
		
		// Start animate when skills div is visible
		var numbersAnimate = true;
		
		skillE.bind('inview', function(event, visible) {				
			setTimeout(function(){		
			el.animate((isVal/isTopVal), function() {
				//circle.animate(0);
			})		
		},300);	
		
		
		
					
	});	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		//var numbersAnimate = true;	
//		
//			
//			
//			
//			sillElement.bind('inview', function(event, visible) {
//				
//			 	setTimeout(function(){
//					if(visible == true && numbersAnimate == true) {
//						
//						numbersAnimate = false;	
//						
//						sillElement.percircle();						
//							
//					}
//				
//				},100);				
//				
//			});	
//		
//		
//		
//		
//		
//		
//		//var caption = $(this);
//		//var caption_content = caption.find('.mb2slider-caption-content');
//		//var fratio = caption.data('fratio');
//		
//		
//		var ratio = (400/180);
//		
//		skillWrap.flowtype({			
//			fontRatio : ratio		
//		});
		
		
		
		
		
	});	
	
	
	
	
	
	
	
});