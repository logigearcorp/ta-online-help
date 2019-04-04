<?php
/**
 * @package		Mb2 Template Style
 * @version		1.0.4
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/
 
// no direct access
defined('_JEXEC') or die;


jimport('joomla.plugin.plugin');

// Load language files
JFactory::getLanguage()->load('plg_system_mb2tmpl', JPATH_ADMINISTRATOR);

class plgSystemMb2tmpl extends JPlugin
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
      	
		if($form->getName() == 'com_menus.item'/* || $form->getName() == 'com_content.article'*/)
		{	
			if(!defined("DS")){
				define("DS", DIRECTORY_SEPARATOR);
			}
			
			// Get xml params file
            //$xmlFile = $form->getName() == 'com_content.article' ? dirname(__FILE__). DS . 'mb2tmpl' . DS . 'attribs' : dirname(__FILE__). DS . 'mb2tmpl' . DS . 'params';
			$xmlFile = dirname(__FILE__). DS . 'mb2tmpl' . DS . 'params';							
            JForm::addFormPath($xmlFile);
			
			// Load file
			$form->loadFile('params', false);
        }	
		
    }	
}
