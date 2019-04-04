<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


class Mb2TmplFooter
{
	
	
	
	
	
	/**
	 *
	 * Method to get site footer
	 *
	 */	
	public static function renderFooter(&$params, $attribs = array())
	{
		
		// Basic variables
		$output = '';
		$app = JFactory::getApplication();
		$date = JFactory::getDate();
		$cur_year = JHtml::_('date', $date, 'Y');
		
		
		
		// Check if use add custom footer content
		if ($params->get('mb2_custom_footer_content', ''))
		{			
			$output .= JHtml::_('content.prepare',$params->get('mb2_custom_footer_content', ''));				
		}	
		else
		{
			$output .= '&copy; ' . $cur_year . ' ' . $app->getCfg('sitename') . '. ' . JText::_('TMPL_MB2_ALL_RIGHTS_RESERVED');
		}
		
				
		return $output;	
		
		
	}
	
	
	
	
	
	
	
	
	
}