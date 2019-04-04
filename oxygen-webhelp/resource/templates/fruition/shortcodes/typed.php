<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;



// Typed (animated text)
add_shortcode('typed', 'mb2_shortcode_typed');


function mb2_shortcode_typed ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'loop' => '1',
		'tspeed'=>'10',
		'sdelay'=>'300',
		'bspeed'=>'0',
		'bdelay'=>'2000',
		'cursor'=>'1',
		'cursor_char'=>'|',
		'style'=>''
	), $atts));	
		
	
	// Joomla variables
	$doc = JFactory::getDocument();
	$app = JFactory::getApplication();
	$id = uniqid();
	JHtml::_('jquery.framework');
	$doc->addScript(JURI::base(true) . '/templates/' . $app->getTemplate() . '/assets/typed.min.js');
		
	
	// Create strings array
	$stringsArr = explode('|', $content);
	$strings = json_encode($stringsArr);
	
	$iscursor = $cursor == 1 ? 'true' : 'false';
	
	
	$js = 'jQuery(document).ready(function($){';		
	$js .= ' $("#tmpl-typed'.$id.'").typed({';	
	$js .= 'strings:' . $strings . ',';
	$js .= 'loop:' . $loop . ',';
	$js .= 'typeSpeed:'. $tspeed . ',';
    $js .= 'startDelay:' . $sdelay . ',';
    $js .= 'backSpeed:' . $bspeed . ',';
	$js .= 'showCursor:' . $iscursor . ',';
	$js .= 'cursorChar:\'' . $cursor_char . '\',';
    $js .= 'backDelay:' . $bdelay;
	$js .= '});';	
	$js .= '});';
	
	$doc->addScriptDeclaration($js);
	
				
	return '<span id="tmpl-typed'.$id.'" style="' . $style . '">' . $content . '</span>';	
	
	
}