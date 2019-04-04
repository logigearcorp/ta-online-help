 <?php
/**
 * @package		Balance Template
 * @version		1.0.0
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;



$css = '';		
		
		
		
/* ===================================== PAGE ===================================== */		
			
		
// Page container
// Check if page width is defined and template grid is fluid
if ($params->get('page_width', 1140) !='' && $params->get('grid', '-fluid') == '-fluid')
{	
	// Add 30 pixels (padding left and right - 15*2)		
	$css .= '.container-fluid{max-width:' . ($params->get('page_width', 1140)+30) . 'px;}';
	
	// Set width of the menu container the same as site container
	$css .= '.mb2ctm-smenu-inner{max-width:' . ($params->get('page_width', 1140)+30). 'px;}';
	
		
	
	// Menu fixed width
	$css .= '.menu-fixedw .mb2ctm-smenu{max-width:' . ($params->get('page_width', 1140)+30). 'px;margin-left:auto;margin-right:auto;}';
	
	
				
}


if ($params->get('smooth_scrolling',0) == 1)
{
	$css .= '.page{padding-right: 10px;}';	
}


// Page layout boxed
// and page boxed top
if ($params->get('layout', 'full') == 'boxed')
{
	$css .= '#page,.fixed-nav-element{max-width:' . ($params->get('page_width', 1140)+60) . 'px;margin-left:auto;margin-right:auto;}';
	$css .= '.fixed-nav-element{left:50%;margin-left:-' . (($params->get('page_width', 1140)+60)/2) . 'px;}';
		
	// Header fixed width
	if (Mb2TmplFramework::getTemplateParam('main_header_fixw',$params) == 1)
	{
		
		$fixednav_lmargin = $params->get('smooth_scrolling',0) == 1 ? (($params->get('page_width', 1140)+10)/2)  : ($params->get('page_width', 1140)/2);	
		$css .= '#top,#main-header,#main-navigation{max-width:' . $params->get('page_width', 1140) . 'px;margin-left:auto;margin-right:auto;}';
		$css .= '#main-header.fixed-nav-element,#main-navigation.fixed-nav-element{left:50%;margin-left:-' . $fixednav_lmargin . 'px;}';
	}
}
else
{
	
	// Header fixed width
	if (Mb2TmplFramework::getTemplateParam('main_header_fixw',$params) == 1)
	{
		$fixednav_lmargin = $params->get('smooth_scrolling',0) == 1 ? (($params->get('page_width', 1140)+60+10)/2) : (($params->get('page_width', 1140)+60)/2);		
		$css .= '#top,#main-header,#main-navigation{max-width:' . ($params->get('page_width', 1140)+60) . 'px;margin-left:auto;margin-right:auto;}';
		$css .= '#main-header.fixed-nav-element,#main-navigation.fixed-nav-element{left:50%;margin-left:-' . $fixednav_lmargin . 'px;}';
	}		
}

	
	
	
	
	
	
/* ===================================== LOGO ===================================== */	

		
		
// Logo width, height and margin top
// Get margin of logo
$lmargint = isset($params->get('logo_margin')->t) ? $params->get('logo_margin')->t : 15;
$lmarginr = isset($params->get('logo_margin')->r) ? $params->get('logo_margin')->r : 0;
$lmarginb = isset($params->get('logo_margin')->b) ? $params->get('logo_margin')->b : 15;
$lmarginl = isset($params->get('logo_margin')->l) ? $params->get('logo_margin')->l : 0;
$lwidth = isset($params->get('logo_image_size')->w) ? $params->get('logo_image_size')->w : 150;
$lheight = isset($params->get('logo_image_size')->h) ? $params->get('logo_image_size')->h : 30;

$css .= '.main-logo';
$css .= '{';
$css .= $lmargint ? 'margin-top:' . $lmargint . 'px;' : '';
$css .= $lmarginb ? 'margin-bottom:' . $lmarginb . 'px;' : '';
if ($params->get('logo_align', 'left') == 'center')
{
	$css .= 'margin-right:auto;';
	$css .= 'margin-left:auto;';
}
else
{
	$css .= $lmarginr ? 'margin-right:' . $lmarginr . 'px;' : '';
	$css .= $lmarginl ? 'margin-left:' . $lmarginl . 'px;' : '';
}
$css .= $lwidth>0 ? 'width:' . $lwidth . 'px;' : '';
//$css .= $lheight>0 ? 'max-height:' . $lheight . 'px;' : '';	
$css .= '}';
	
	
	
	
	


/* ===================================== PAGE PARTS ===================================== */			
		
	
	
	
	
// Body
if ($params->get('bd_bg_color')!='' || $params->get('bd_bg_image', '') !='')
{
	$css .= 'body';		
	$css .= '{';
			
	// Background color
	$css .= $params->get('bd_bg_color')!='' ? 'background-color:' . $params->get('bd_bg_color', '') . ';' : '';
			
	// Background image
	if ($params->get('bd_bg_image', '') !='')
	{
		$css .= 'background-image:url(' . JURI::base(true) . '/' . $params->get('bd_bg_image', '') . ');';
		$css .= 'background-repeat:' . $params->get('bd_bg_repeat', 'no-repeat') . ';';
		$css .= 'background-position:' . $params->get('bd_bg_position', 'left top') . ';';
	}
	$css .= '}';	
			
}



// Preloader
if ($params->get('mb2_loading_screen',1)>0)
{
	$css .= '.double-bounce1, .double-bounce2,';
	$css .= '.container1 > div, .container2 > div, .container3 > div,';
	$css .= '.dot1, .dot2,';
	$css .= '.spinner4,';
	$css .= '.cube1, .cube2,';
	$css .= '.spinner6 > div,';
	$css .= '.spinner7 > div';
	$css .= '{';
	$css .= 'background-color:' . $params->get('mb2_loading_screen_spinnercolor', '#c4c5c6'). ';';
	$css .= '}';
}


	
	
	
	
	

/* ===================================== CUSTOM CSS ===================================== */



$css .= Mb2TmplHelper::getTmplParam('custom_css', $params);
			
		
		
JFactory::getDocument()->addStyleDeclaration($css);