<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;





class Mb2TmplOffline 
{
	
	
	
		
	/**
	 *
	 * Method to get inline styles for offline page
	 *
	 */	
	public static function inline_style(&$params)
	{
		
		
		// Get core variables
		$app = JFactory::getApplication();		
		$output = '';		
		
		
			
		if (Mb2TmplFramework::default_tpl_style_param('bg_offline_color', $app->getTemplate()) !='')
		{
				
			$output .= 'body';
			$output .= '{';
			$output .= 'background-color:' . Mb2TmplFramework::default_tpl_style_param('bg_offline_color', $app->getTemplate()) . ';';
			$output .= '}';
				
		}
			
		
		
		
		return $output;		
		
		
		
		
	}
	
	
	
	
	
	
	
	
	
}