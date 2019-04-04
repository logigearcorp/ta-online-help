<?php
/**
 * @package		Mb2 Shortcodes
 * @version		4.0.0
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2013 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		GNU/GPL (http://www.gnu.org/copyleft/gpl.html)
**/
 

defined('_JEXEC') or die;

if(!defined('DS')) {define('DS', DIRECTORY_SEPARATOR);}

require_once JPATH_PLUGINS . DS . 'content' . DS . 'mb2shortcodes' . DS . 'shortcodes.php';

jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');
$app = JFactory::getApplication('site');
$tmpl = $app->getTemplate();


// Get shortcode files from template
if (is_dir(JPATH_SITE . DS . 'templates' . DS . $tmpl . DS . 'shortcodes'))
{	
	
	$path = JPATH_SITE . DS . 'templates' . DS . $tmpl . DS . 'shortcodes';
			
	//Define filter			
	$filter = '.php';
					
	//Get slider images array		
	$sfiles = JFolder::files($path, $filter);
	
	
	if (is_array($sfiles))
	{
		foreach ($sfiles as $file)
		{
			require_once ($path . DS . $file);
		}	
	}
				
}


// Get shortcodes from Mb2 Page builder component
// Get path to addons directory
$pb_addons_dir = JPATH_ROOT . DS . 'components' . DS . 'com_mb2pagebuilder' . DS . 'addons';


// Get path to section row shortcode files
$pb_section_file = JPATH_ROOT . DS . 'components' . DS . 'com_mb2pagebuilder' . DS . 'builder' . DS . 'section.php';
$pb_row_file = JPATH_ROOT . DS . 'components' . DS . 'com_mb2pagebuilder' . DS . 'builder' . DS . 'row.php';


if (is_file($pb_row_file))
{
	require_once ($pb_section_file);	
	require_once ($pb_row_file);
}


if (is_dir($pb_addons_dir))
{
	
	$pb_addons = JFolder::folders($pb_addons_dir,'');
	
	if (is_array($pb_addons))
	{
		foreach ($pb_addons as $addon)
		{
			require_once ($pb_addons_dir . DS . $addon . DS . 'site.php');	
		}	
	}	
	
}



// Load language files
JFactory::getLanguage()->load('plg_content_mb2shortcodes', JPATH_ADMINISTRATOR);


class PlgContentMb2shortcodes extends JPlugin {  
	
	public function onContentPrepare($context, &$article, &$params, $limitstart=0) {
										 
		$text = &$article->text;
		$id = &$article->id;				
				
		$text = do_shortcode($text);					  
					 
		return true;
		
	}
}