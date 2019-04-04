<?php
/**
 * @package		Mb2 Color Boxes
 * @version		1.1.0
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2015 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/



defined('_JEXEC') or die;


class JFormFieldMb2color extends JFormField
{
	
	
	
	protected $type = 'Mb2color';

	
	
	
	protected function getInput()
	{
		
		$output = '';
		
		// Get site template name
		$tmpl = JFormFieldMb2color::getTemplateName();
				
		
		// Load js color script
		$doc = JFactory::getDocument();
		$doc->addStylesheet(JURI::root(true) . '/templates/' . $tmpl . '/framework/fields/mb2color/css/spectrum.css');	
		$doc->addScript(JURI::root(true) . '/templates/' . $tmpl . '/framework/fields/mb2color/js/spectrum.js');
		
		
		$css = 'input#' . $this->id;
		$css .= '{';
		$css .= 'display:none!important;';
		$css .= '}';
		
		$doc->addStyleDeclaration($css);
		
		$js = 'jQuery(document).ready(function($){';
		$js .= '$("#' . $this->id . '").spectrum({';
		$js .= 'showInput: true,';
		$js .= 'showButtons: false,';
		$js .= 'preferredFormat: \'rgb\',';
		$js .= 'allowEmpty: true,';
		$js .= 'color: \'\',';
		$js .= 'showAlpha: true';
		$js .= '});';	
		$js .= '});';
		
		
		$doc->addScriptDeclaration($js);


		// Initialize JavaScript field attributes.
		$onchange = $this->element['onchange'] ? ' onchange="' . (string) $this->element['onchange'] . '"' : '';
				
		$output .= '<input type="text" name="' . $this->name . '" id="' . $this->id . '"' . ' value="'
			. htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8') . '"' . $onchange . '/>';		
			
			
		return $output;		
		
	}
	
	
	
	
	/**
	 *
	 * Methot to get frontEnd template name
	 *
	 *
	 */
	public static function getTemplateName ()
	{
		
		$jinput = JFactory::getApplication()->input;
		$db = JFactory::getDBO();
		
		$query = 'SELECT template FROM #__template_styles WHERE id=' . $jinput->get('id');
		$db->setQuery($query);
		return $db->loadResult();
		
		
	}
	
	
	
	
}