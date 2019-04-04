<?php
/**
 * @package		Balance Template
 * @version		1.0.0
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


// Get custom user style
$lessvariable = array(
	
	
	// Accent colors
	'mb2_color_bg_accent1'=>$params->get('accent_color1','#f0bc22'),
	'mb2_color_bg_accent2'=>$params->get('accent_color2','#303031'),
	
	
	// Typography color
	'mb2_color_text_base'=>$params->get('text_color','#666666'),
	'mb2_color_links_base'=>$params->get('links_color','#f0bc22'),
	'mb2_color_links_hover_base'=>$params->get('links_h_color','#303031'),
	'mb2_color_headings'=>$params->get('headings_color','#000000'),
	
	
	// Border color
	'mb2_border_color_base'=>$params->get('border_color','#e5e5e5'),
	
	
	// Typography
	'mb2_font_size_base'=>$params->get('general_font_size',14) . 'px',
	'mb2_font_size_h1'=>$params->get('headings_h1_size',26) . 'px',
	'mb2_font_size_h2'=>$params->get('headings_h2_size',24) . 'px',
	'mb2_font_size_h3'=>$params->get('headings_h3_size',22) . 'px',
	'mb2_font_size_h4'=>$params->get('headings_h4_size',20) . 'px',
	'mb2_font_size_h5'=>$params->get('headings_h5_size',18) . 'px',
	'mb2_font_size_h6'=>$params->get('headings_h6_size',16) . 'px'	
	
);