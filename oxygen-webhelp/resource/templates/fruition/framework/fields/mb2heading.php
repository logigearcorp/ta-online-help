<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Form Field class for the Joomla Platform.
 * Supports a one line text field.
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @link        http://www.w3.org/TR/html-markup/input.text.html#input.text
 * @since       11.1
 */
class JFormFieldMb2heading extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'Mb2heading';

	/**
	 * Method to get the field label markup.
	 *
	 * @return  string  The field label markup.
	 *
	 * @since   11.1
	 */
	protected function getLabel()
	{
		if (empty($this->element['label']) && empty($this->element['description']))
		{
			return '';
		}

		$title = $this->element['label'] ? (string) $this->element['label'] : ($this->element['title'] ? (string) $this->element['title'] : '');
		$class = 'mb2-heading';
		$heading = $this->element['heading'] ? (string) $this->element['heading'] : 'h4';
		$first = $this->element['first'] ? $class .= ' first' : '';
		//$description = (string) $this->element['description'];
		
		//$close = (string) $this->element['close'];

		$html = array();

		//if ($close)
		//{
		//	$close = $close == 'true' ? 'alert' : $close;
		//	$html[] = '<button type="button" class="close" data-dismiss="' . $close . '">&times;</button>';
		//}

		$html[] = '<' . $heading . ' class="mb2-heading-title">' . JText::_($title) . '</' . $heading . '>';
		$html[] = !empty($description) ? '<span class="mb2-title-desc">' . JText::_($description) . '</span>' : '';

		return '</div><div class="' . $class . '">' . implode('', $html);
	}

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   11.1
	 */
	protected function getInput()
	{
		return '';
	}
}
