<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


class Mb2TmplLogo
{
	
	
	
	
	
	/**
	 *
	 * Method to get logo
	 *
	 *
	 */
	public static function renderLogo(&$params, $attribs = array())
	{
		
		
		
		$app = JFactory::getApplication();
		
		
		
		$output = '';
		
		// Get logo link
		$logo_link = $params->get('logo_custom_link', '') ? $params->get('logo_custom_link', '') : $logo_link = JURI::base(true);
		
		// Define logo image alternative text
		$logo_alt_text =  $params->get('logo_alt_attr_text', '') ?  $params->get('logo_alt_attr_text', '') : $app->getCfg('sitename');
		
		// Get logo alignment
		$lalign = $params->get('logo_align', 'left');
		
		$output .= '<div class="main-logo align' . $lalign . '">';
		
		
			if($params->get('logo_type', 'text') == 'text')
			{
				
				$output .= '<span class="logo-text"><a href="' . $logo_link . '" title="' . $params->get('logo_title_attr_text', '') . '">' . $app->getCfg('sitename') . '</a></span>';
			}
			else
			{
				$output .= '<a href="' . $logo_link . '"><img title="' . $params->get('logo_text', '') . '" src="' . JURI::base(true) . '/' . $params->get('logo_image', '') . '" alt="' . $params->get('logo_alt_attr_text', '') . '" /></a> ';
			}
		
			
			if($params->get('site_slogan', '') !='')
			{
				$output .= '<span class="site-slogan">' . $params->get('site_slogan', '') . '</span>';
			}
			
		
		
		$output .= '</div>';
		
		
		
		
		return $output;
		
		
		
		
	} 
	
	
	
	
	
}