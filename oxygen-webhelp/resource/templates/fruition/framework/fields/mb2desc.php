<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;


class JFormFieldMb2desc extends JFormField
{
	
	
	protected $type = 'Mb2desc';

	
	protected function getLabel()
	{
		if (empty($this->element['description']))
		{
			return '';
		}

		$class = 'mb2-description';
		$description = (string) $this->element['description'];

		$html = array();

		$html[] = !empty($description) ? '<span class="mb2-desc">' . JText::_($description) . '</span>' : '';

		return '</div><div class="' . $class . '">' . implode('', $html);
	}
	
	
	
	
	protected function getInput()
	{
		return '';
	}
	
}
