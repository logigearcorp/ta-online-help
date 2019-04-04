<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


class Mb2TmplPageHeading
{
	
	
	
	
	
	/**
	 *
	 * Method to get page title
	 *
	 */	
	public static function pageHeading($params, $attribs = array())
	{		
			
		// Basic variables
		$output = '';
		$ptitle = '';
		$mtitle = '';
		$doc = JFactory::getDocument();
		$app = JFactory::getApplication();
		$menu = $app->getMenu();
		$actmenu = $menu->getActive();
		
		
		
		// Check if user show site name in page title
		// 0 - page title dose not include site name
		// 1 - site name is before page title
		// 2 - site name is after page title
		if ($app->getCfg('sitename_pagetitles') == 1)
		{
			// Remove separator from page title
			$ptitle .= str_replace($app->getCfg('sitename') . ' - ', '', $attribs['title']);	
		}
		elseif ($app->getCfg('sitename_pagetitles') == 2)
		{
			// Remove separator from page title
			$ptitle .= str_replace(' - ' . $app->getCfg('sitename'), '', $attribs['title']);
		}
		
		// Check if use set custom page template at template parameters
		elseif ($params->get('mb2_custom_title', 0))
		{
						
			// Set custom page title
			$doc->setTitle($doc->getTitle() . ' ' . $params->get('mb2_custom_title_sep', '|') . ' ' . $app->getCfg('sitename'));			
			
			// Remove separator from custom page title
			$ptitle .= str_replace(' ' . $params->get('mb2_custom_title_sep', '|') . ' ' . $app->getCfg('sitename'), '', $attribs['title']);				
		}
		
		// If user dose not set custom page title at global configuration and template parameters return default Joomla page title
		else
		{
			$ptitle .= $attribs['title'];	
		}
		
		
		
		// Now We need to check if use set custom page title for aticle menu item
		if (isset($actmenu))
		{			
			// Check if user set custom page heading
			if ($actmenu->params['page_heading'])
			{
				$mtitle .= JHtml::_('content.prepare',$actmenu->params['page_heading']);
			}			
		}
		
		
		$output .= $mtitle ? $mtitle : $ptitle;
		
				
		
		return $output;
					
		
		
	}
	
	
}