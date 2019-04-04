<?php
/**
 * @package		Mb2 Mega Menu
 * @version		1.0.0
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2013 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses/regular)
**/ 

defined('JPATH_PLATFORM') or die;


class JFormFieldMb2toggletext extends JFormField
{
	
	protected $type = 'Mb2toggletext';
	
	
	
	
	protected function getInput()
	{
		
		$output = '';
		
		// Translate placeholder text
		$hint = $this->translateHint ? JText::_($this->hint) : $this->hint;		

		// Initialize some field attributes.
		$class        = !empty($this->class) ? ' class="' . $this->class . '"' : '';
		$disabled     = $this->disabled ? ' disabled' : '';
		$readonly     = $this->readonly ? ' readonly' : '';
		$required     = $this->required ? ' required aria-required="true"' : '';
		$hint         = $hint ? ' placeholder="' . $hint . '"' : '';
		$autocomplete = !$this->autocomplete ? ' autocomplete="off"' : ' autocomplete="' . $this->autocomplete . '"';
		$autocomplete = $autocomplete == ' autocomplete="on"' ? '' : $autocomplete;
		$autofocus    = $this->autofocus ? ' autofocus' : '';
		$spellcheck   = $this->spellcheck ? '' : ' spellcheck="false"';

		// Initialize JavaScript field attributes.
		$onchange = $this->onchange ? ' onchange="' . $this->onchange . '"' : '';
		$onclick = $this->onclick ? ' onclick="' . $this->onclick . '"' : '';

		// Including fallback code for HTML5 non supported browsers.
		JHtml::_('jquery.framework');
		JHtml::_('script', 'system/html5fallback.js', false, true);
		
		
		$output .= '<style type="text/css">';		
		$output .= '.mb2hide{display: none;}';		
		$output .= '</style>';
		
		
		$output .= '<script type="text/javascript">';
		
		
		$output .= 'jQuery(document).ready(function($){		
			$(\'#mb2click_' . $this->id . '\').click(function(e){				
				$(\'#mb2hide_' . $this->id . '\').fadeToggle(200);
				$(this).toggleClass(\'active\');	
				e.preventDefault(e);				
			});				
			});';		
		$output .= '</script>';
		
		$output .= '<div class="mb2toggletext">';
		
		$btn_cls = $this->value ? ' btn-primary' : '';
		
		$output .= '<a id="mb2click_' . $this->id . '" class="mb2click btn' . $btn_cls . '" href="#">' . JText::_('TMPL_MB2_CUSTOM_CSS_LABEL') . '</a>';
		
		
		
		$output .= '<div id="mb2hide_' . $this->id . '" class="mb2hide" style="margin-top:20px;">';
		$output .= '<textarea name="' . $this->name . '" id="' . $this->id . '"' . $class
			. $hint . $disabled . $readonly . $onchange . $onclick . $required . $autocomplete . $autofocus . $spellcheck . ' >'
			. htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8') . '</textarea>';
		$output .= '</div>';
			
		$output .= '</div>';	
			
			
		return $output;
		
	}
}
