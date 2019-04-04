<?php
/**
 * @package		Mb2 Template Style
 * @version		1.0.3
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/ 

defined('JPATH_PLATFORM') or die;


class JFormFieldMb2mp extends JFormField
{
	
	protected $type = 'Mb2mp';
	protected $defmp;
	
	
	public function __get($name)
	{
		switch ($name)
		{
			case 'defmp':
				return $this->$name;
		}

		return parent::__get($name);
	}

	
	
	public function __set($name, $value)
	{
		switch ($name)
		{			

			case 'defmp':
				$value = (string) $value;
				$value = ($value == $name || $value == 'true' || $value == '1');

			default:
				parent::__set($name, $value);
		}
	}

	
	
	public function setup(SimpleXMLElement $element, $value, $group = null)
	{
		$result = parent::setup($element, $value, $group);

		if ($result == true)
		{			
			$defmp = (string) $this->element['defmp'];
			$this->defmp = $defmp;			
		}

		return $result;
	}

	
	protected function getInput()
	{

		$defarr = explode(',', $this->defmp);
		
		$style = ' style="width:25px;"';	
		
		$tval = (isset($this->value['t'])) ? $this->value['t'] : $defarr[0];
		$rval = (isset($this->value['r']) && $this->value['r']!='') ? $this->value['r'] : $defarr[1];
		$bval = (isset($this->value['b'])) ? $this->value['b'] : $defarr[2];
		$lval = (isset($this->value['l']) && $this->value['l']!='') ? $this->value['l'] : $defarr[3];
		
		$suffix = isset($defarr[4]) ? $defarr[4] : '';				
		
		$html[] = '<style type="text/css">.mb2mp p{float:left;margin:0 15px 0 0;}</style>';
		
	
		$html[] = '<div class="mb2mp clearfix">';
		$html[] = '<input type="hidden" name="' . $this->name . '" id="' . $this->id . '" value="" />';
		$html[] = '<p>' . JText::_('PLG_SYSTEM_MB2TMPL_TOP') . ':<input type="text" name="' . $this->name . '[t]" id="' . $this->id . '_t" value="' . $tval . '"' . $style . ' />' . $suffix . '</p>';
		$html[] = $defarr[1]!='' ? '<p>' . JText::_('TMPL_SCALE_RIGHT') . ':<input type="text" name="' . $this->name . '[r]" id="' . $this->id . '_r" value="' . $rval . '"' . $style . ' />' . $suffix . '<p>' : 
		'';
		$html[] = '<p>' . JText::_('PLG_SYSTEM_MB2TMPL_BOTTOM') . ':<input type="text" name="' . $this->name . '[b]" id="' . $this->id . '_b" value="' . $bval . '"' . $style . ' />' . $suffix . '<p>';
		$html[] = $defarr[3]!='' ? 
		'<p>' . JText::_('TMPL_SCALE_LEFT') . ':<input type="text" name="' . $this->name . '[l]" id="' . $this->id . '_l" value="' . $lval . '"' . $style . ' />' . $suffix . '<p>' : 
		'';
		$html[] = '</div>';
	

		return implode($html);
	}

	
}
