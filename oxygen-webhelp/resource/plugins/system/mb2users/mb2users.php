<?php
/**
 * @package		Mb2 Users
 * @version		1.0.0
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C)  2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses/regular)
**/ 
 
// no direct access
defined('_JEXEC') or die;


jimport('joomla.plugin.plugin');

/// Load language files
JFactory::getLanguage()->load('plg_system_mb2users', JPATH_ADMINISTRATOR);


class plgSystemMb2users extends JPlugin
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
        if($form->getName() == 'com_users.user')
		{	
			if(!defined("DS")){
				define("DS", DIRECTORY_SEPARATOR);
			}
            $xmlFile = dirname(__FILE__). DS."mb2users" . DS . 'params';
						
            JForm::addFormPath($xmlFile);
            $form->loadFile('params', false); 			
        }	
		
    }
	
	
	
}
