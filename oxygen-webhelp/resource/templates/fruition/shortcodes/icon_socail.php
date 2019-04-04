<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;




// Site phone
add_shortcode('social_icons', 'mb2_shortcode_social_icons');


function mb2_shortcode_social_icons ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'ttip' => '0',
		'tpos' => 'top',
		'size' => 'default',
		'full_width' => '',
		'type'=>''
	), $atts));	
	
	
	// Joomla variables
	$app = JFactory::getApplication();
	$params = $app->getTemplate(true)->params;
	
	
	$cls = $type !='' ? ' ' . $type : '';
	
	// Load template class
	if(!class_exists('Mb2TmplSocial'))
	{				
		require(JPATH_THEMES . DS . $app->getTemplate() . DS . 'framework' . DS . 'libs' . DS . 'tmpl_social.php');	
	}
	
				
	return Mb2TmplSocial::socialIcons($params, array('ttip'=>$ttip, 'tpos'=>$tpos, 'size'=>$size, 'full-width'=>$full_width, 'class'=>$cls));	
	
	
}