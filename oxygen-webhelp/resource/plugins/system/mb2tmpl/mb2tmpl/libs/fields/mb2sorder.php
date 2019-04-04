<?php
/**
 * @package		Mb2 Template Style
 * @version		1.0.3
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/

defined('_JEXEC') or die;



class JFormFieldMb2sorder extends JFormField
{
	
	
	protected $type = 'Mb2sorder';
	protected $sections = array();
	
		
	public function setup(SimpleXMLElement $element, $value, $group = null)
	{
		$result = parent::setup($element, $value, $group);

		if ($result == true)
		{			
			$sections = (string) $this->element['sections'];
			$this->sections = $sections;			
		}

		return $result;
	}

	
	
	protected function getInput()
	{
		
		// Core variables
		$output = '';	
		$doc = JFactory::getDocument();	
		$i = 0;		
		$count = count($this->value);
		
	
		// Get sections array
		$formsections = explode(',', $this->sections);				
		$sections =  isset($this->value) && is_array($this->value) ? $this->value : $formsections;	
		
		
		// Add style and script
		JHtml::_('jquery.framework');
		$doc->addStylesheet(JURI::root(true) . '/plugins/system/mb2tmpl/mb2tmpl/libs/fields/mb2sorder/css/mb2sorder.css');		
		$doc->addScript(JURI::root(true) . '/plugins/system/mb2tmpl/mb2tmpl/libs/fields/mb2sorder/js/drag-arrange.min.js');
		
		
		$js = 'jQuery(document).ready(function($){';
		$js .= '$(\'#mb2sorder .mb2sorder-dragitem\').arrangeable({dragSelector: \'\'});';
		$js .= '});';
		
		$doc->addScriptdeclaration($js);			
		
		$output[] .= '</div><div>';		
		$output[] .= '<div id="mb2sorder">';
				
		$output[] .= '<ul style="margin:0;" class="mb2sorder-list" data-id="' . $this->id . '" data-pname="' . $this->name . '" data-url="' . JURI::root(true) . '">';				
		
			
			$output[] .= '<li class="mb2sorder-item mb2sorder-nodrag"><div class="mb2sorder-item-heading">Top bar</div></li>';	
			$output[] .= '<li class="mb2sorder-item mb2sorder-nodrag"><div class="mb2sorder-item-heading">Header</div></li>';
			$output[] .= '<li class="mb2sorder-item mb2sorder-nodrag"><div class="mb2sorder-item-heading">Showcase</div></li>';
			$output[] .= '<li class="mb2sorder-item mb2sorder-nodrag"><div class="mb2sorder-item-heading">Page title</div></li>';
			
			
			foreach ($sections as $key=>$section)
			{
				
				$i++;					
					
					
					// Make section name lowercase and underscroller spaces
					$snamelower = strtolower($section);
					$snameunderscrol = str_replace(' ' , '_', $snamelower);
					
					$output[] .= '<li class="mb2sorder-item mb2sorder-dragitem">';								
					$output[] .= '<input class="rootfiled" type="hidden" name="' . $this->name . '[]" id="" value="' . $snameunderscrol . '"/>';					
					$output[] .= '<div class="mb2sorder-item-heading">';					
					
					// Make section normal name
					$snounderscroll = str_replace('_', ' ', $section);
					$scapitalize = ucfirst($snounderscroll);
					
					$output[] .= $scapitalize;							
					$output[] .= '</div>';		
					
										
					$output[] .= '</li>';
					
			} // End foreach
			
			
			$output[] .= '<li class="mb2sorder-item mb2sorder-nodrag"><div class="mb2sorder-item-heading">Footer</div></li>';			
		
		$output[] .= '</ul>';		
		$output[] .= '</div>';		
		
		// Output
		return implode($output);				
		
	}
}