<?php
/**
 * @package		Mb2 Template Style
 * @version		1.0.3
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/




defined('_JEXEC') or die;



class JFormFieldMb2color extends JFormField
{
	
	
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.3
	 */
	protected $type = 'Mb2color';

	
	
	/**
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   11.3
	 */
	protected function getInput()
	{
		
		$output = '';		
		
		// Load js color script
		$doc = JFactory::getDocument();
		$doc->addStylesheet(JURI::root(true) . '/plugins/system/mb2tmpl/mb2tmpl/libs/fields/mb2color/css/spectrum.css');	
		$doc->addScript(JURI::root(true) . '/plugins/system/mb2tmpl/mb2tmpl/libs/fields/mb2color/js/spectrum.js');
		
		
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
}