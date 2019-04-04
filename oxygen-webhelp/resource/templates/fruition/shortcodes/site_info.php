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
add_shortcode('site_phone', 'mb2_shortcode_site_phone');


function mb2_shortcode_site_phone ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'icon' => '1'
	), $atts));	
	
	
	// Joomla variables
	$app = JFactory::getApplication();
	$params = $app->getTemplate(true)->params;
	
	
	// Load template class
	if(!class_exists('Mb2TmplSiteTools'))
	{			
		require(JPATH_THEMES . DS . $app->getTemplate() . DS . 'framework' . DS . 'libs' . DS . 'tmpl_site_tools.php');	
	}
	
				
	return Mb2TmplSiteTools::sitePhone($params, array('icon'=>$icon));	
	
	
}





// Site email
add_shortcode('site_email', 'mb2_shortcode_site_email');


function mb2_shortcode_site_email ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'icon' => '1'
	), $atts));	
	
	
	// Joomla variables
	$app = JFactory::getApplication();
	$params = $app->getTemplate(true)->params;
	
		
	// Load template class
	if(!class_exists('Mb2TmplHelper'))
	{			
		require(JPATH_THEMES . DS . $app->getTemplate() . DS . 'framework' . DS . 'libs' . DS . 'helper.php');	
	}
	
	if(!class_exists('Mb2TmplSiteTools'))
	{			
		require(JPATH_THEMES . DS . $app->getTemplate() . DS . 'framework' . DS . 'libs' . DS . 'tmpl_site_tools.php');	
	}
	
				
	return Mb2TmplSiteTools::siteEmail($params, array('icon'=>$icon));	
	
	
}



// Site Login
add_shortcode('site_login', 'mb2_shortcode_site_login');


function mb2_shortcode_site_login ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'icon' => '1'
	), $atts));	
	
	
	// Joomla variables
	$app = JFactory::getApplication();
	$params = $app->getTemplate(true)->params;
	
	
	// Load template class
	if(!class_exists('Mb2TmplSiteTools'))
	{			
		require(JPATH_THEMES . DS . $app->getTemplate() . DS . 'framework' . DS . 'libs' . DS . 'tmpl_site_tools.php');	
	}
	
				
	return Mb2TmplSiteTools::siteLogin($params, array('mode'=>2, 'icon'=>$icon));	
	
	
}




// Site Language
add_shortcode('site_language', 'mb2_shortcode_site_language');

function mb2_shortcode_site_language ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'icon' => '1'
	), $atts));	
	
	
	// Joomla variables
	$app = JFactory::getApplication();
	$params = $app->getTemplate(true)->params;
	
		
	// Load template class
	if(!class_exists('Mb2TmplSiteTools'))
	{			
		require(JPATH_THEMES . DS . $app->getTemplate() . DS . 'framework' . DS . 'libs' . DS . 'tmpl_site_tools.php');	
	}
	
				
	return Mb2TmplSiteTools::siteLanguage($params, array('mode'=>2, 'icon'=>$icon));	
	
	
}