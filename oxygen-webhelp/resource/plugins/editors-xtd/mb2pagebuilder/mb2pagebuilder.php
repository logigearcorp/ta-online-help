<?php
/**
 * @package		Mb2 Shortcodes
 * @version		4.0.0
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2013 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		GNU/GPL (http://www.gnu.org/copyleft/gpl.html)
**/

defined('_JEXEC') or die;

// Load language files
JFactory::getLanguage()->load('plg_editors-xtd_mb2pagebuilder', JPATH_ADMINISTRATOR);



class PlgButtonMb2pagebuilder extends JPlugin
{
	
	protected $autoloadLanguage = true;

	
	public function onDisplay($name, $asset, $author){
		
		$app = JFactory::getApplication();
		$systemplugin = JPluginHelper::isEnabled('system', 'mb2shortcodes');
		
		if (!$systemplugin)
		{
			$app->enqueueMessage(JText::_('PLG_MB2SHORTCODESBTN_SYSTEMPLUGIN_INFO'), 'warning');	
		}		
		
		JHtml::_('behavior.modal');		
		$button = new JObject;
		$button->set('modal',true);
		$button->link = 'index.php?option=com_mb2pagebuilder&amp;view=pages&amp;layout=modal&amp;tmpl=component&amp;editorname=' . $name . '&amp;' . JSession::getFormToken() . '=1';
		$button->class = 'btn mb2pagebuilder-btn';
		$button->text = JText::_('PLG_MB2PAGEBUILDER_BUTTON');
		$button->name = 'grid-2';
		$button->options = "{handler:'iframe',size: {x:800, y:500}}";	
				
				
		return $button;
				
	}	
	
	
}