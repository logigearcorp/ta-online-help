<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;



class JFormFieldMb2startitem extends JFormField
{
	
	
	protected $type = 'Mb2startitem';	
	protected $title = '';
	protected $desc = '';
		
	
	public function setup(SimpleXMLElement $element, $value, $group = null)
	{
		$result = parent::setup($element, $value, $group);

		if ($result == true)
		{			
			$title = (string) $this->element['title'];
			$this->title = $title;
			
			$desc = (string) $this->element['desc'];
			$this->desc = $desc;			
		}

		return $result;
	}	

	
	
	protected function getInput()
	{
		
		$output = '';
		
		$output .= '</div></div>';
		
		$output .= '<div class="mb2sections-item">';		
		
		$isdesc = $this->desc !='' ? 
		' <span class="mb2sections-mark"><span class="mb2sections-question">&#63;</span><span class="mb2sections-desc">' . JText::_($this->desc) . '</span></span>' : '';
		
		$istitle = JText::_($this->title) . $isdesc;
		
		$title_cls = ' section_' . str_replace(' ', '_', strtolower(JText::_($this->title)));
		
		$output .= '<h4 class="mb2sections-heading' . $title_cls . '">' . $istitle . '</h4>';
		
		$output .= '<div class="mb2sections-content">';		
		
		$output .= '<div><div>';	
		
		return $output;	
		
		
	}
}
