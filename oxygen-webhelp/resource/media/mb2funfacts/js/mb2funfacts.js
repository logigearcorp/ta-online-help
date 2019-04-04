/**
 * @package		Mb2 Fun Facts
 * @version		1.0.3
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/
jQuery(document).ready(function(e){e(".mb2funfacts-item").each(function(){var n=e(this),a=n.parent().parent(),t=a.data("aspeed"),r=n.find(".mb2funfacts-number .number"),u=r.data("num"),m=!0;n.bind("inview",function(n,a){var i=e.animateNumber.numberStepFactories.separator(" ");1==a&&1==m&&(m=!1,r.animateNumber({number:u,numberStep:i},t))})})});