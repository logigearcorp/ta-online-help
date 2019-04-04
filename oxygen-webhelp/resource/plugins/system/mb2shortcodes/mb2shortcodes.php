<?php
/**
 * @package		Mb2 Shortcodes
 * @version		4.0.2
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2013 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		GNU/GPL (http://www.gnu.org/copyleft/gpl.html)
**/

defined('_JEXEC') or die;


// Load language files
JFactory::getLanguage()->load('plg_system_mb2shortcodes', JPATH_ADMINISTRATOR);


class PlgSystemMb2shortcodes extends JPlugin
{	
	
	protected $autoloadLanguage = true;
		
		
	function onAjaxMb2shortcodes ()
	{		
		
		if (!defined('DS')){define ('DS', DIRECTORY_SEPARATOR);	}
		
		require_once (JPATH_ROOT . DS . 'plugins' . DS . 'system' . DS . 'mb2shortcodes' . DS . 'generator.php');		
	}
	
}