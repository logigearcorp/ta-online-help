<?php
/**
 * @package		Mb2 CtMenu
 * @version		1.4.0
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/
 
// no direct access
defined('_JEXEC') or die;


jimport('joomla.plugin.plugin');

// Load language files
JFactory::getLanguage()->load('plg_system_mb2ctmenu', JPATH_ADMINISTRATOR);

class plgSystemMb2ctmenu extends JPlugin
{    
	var $plugin 	= null;
	var $plgParams 	= null;
	var $time 		= 0;
    
    function __construct(&$subject, $config)
	{      
        parent::__construct($subject, $config);
    }
    
    function onContentPrepareForm($form, $data)
    {           
        if($form->getName() == 'com_menus.item')
		{	
			if(!defined("DS")){
				define("DS", DIRECTORY_SEPARATOR);
			}
            $xmlFile = dirname(__FILE__). DS."mb2ctmenu" . DS . 'params';
						
            JForm::addFormPath($xmlFile);
            $form->loadFile('params', false); 			
        }	
		
    }
	
	
	function onAjaxMb2ctmenu()
	{
		
		
		$db = JFactory::getDbo();
		$pname = JRequest::getVar('pname');
		$key1 = JRequest::getVar('key1');
		$key2 = JRequest::getVar('key2');
		
		$query = 'SELECT `id`, `title` FROM #__modules WHERE published=1 AND client_id=0 AND module!=' . $db->quote('mod_mb2ctmenu');		
		
		$result = $db->setQuery($query);
		
		$output = '<label for="' . $key1 . '_col_module" >Module</label>';
		
		$output .= '<select class="mb2options-select" name="' . $pname  . '[panel_' . $key1 . '][columns][' . $key2 . '][module][]" id="panel_' . $key1 . '_col_module" multiple>';
		
		
		
		//$output .= '<option value="0" selected>None</option>';
		foreach($result->loadObjectList() as $l)
		{
					
			$output .= '<option value="' . $l->id . '">' . $l->title . ' (Id: ' . $l->id . ')</option>';			
		}
		
		
		$output .= '</select>';
		
		
		echo $output;
	}
	
}
