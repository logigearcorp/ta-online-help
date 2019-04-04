<?php
/**
 * @package		Mb2 Template Style
 * @version		1.0.3
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/

defined('JPATH_PLATFORM') or die;


class JFormFieldMb2admin extends JFormField
{
	
	protected $type = 'Mb2admin';

	
	protected function getInput()
	{
		
		// Basic variables
		$output = '';
		$doc = JFactory::getDocument();
		$app = JFactory::getApplication();
		
		
		
		// Add admin styles
		$doc->addStylesheet(JURI::root(true) . '/plugins/system/mb2tmpl/mb2tmpl/admin/css/style.css');
		
		// Add admin scripts
		$doc->addScript(JURI::root(true) . '/plugins/system/mb2tmpl/mb2tmpl/admin/js/scripts.js');
		
			
		
	}

	
	
	
	
	
	
	
}
