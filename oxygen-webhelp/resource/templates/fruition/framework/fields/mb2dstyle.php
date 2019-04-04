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
 * Provides radio button inputs
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @link        http://www.w3.org/TR/html-markup/command.radio.html#command.radio
 * @since       11.1
 */
class JFormFieldMb2dstyle extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'Mb2dstyle';

	/**
	 * Method to get template back-end style
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   11.1
	 */
	protected function getInput()
	{
		
		// Basic variables
		$output = '';
		$doc = JFactory::getDocument();
		$app = JFactory::getApplication();
		
			
		
		// Get if of default template style
		$def_tmpl = JFormFieldMb2dstyle::defaultTmplStyleId($this->class);
		
			
		
		if ($app->input->getCmd('id') == $def_tmpl->id)
		{			
			
			$output .= '.form-inline-header {position:relative;cursor:not-allowed;}';			
			$output .= '.form-inline-header .control-label {padding-top:7px;}';
			
			// Template name
			$output .= '#jform_title';
			$output .= '{';
			$output .= 'position:absolute;';
			$output .= 'top:0;';
			$output .= 'background-color:red;';
			$output .= 'border-color:red;';
			$output .= 'color:#fff;';
			$output .= 'z-index:-1;';
			$output .= '}';
			
		}
		else
		{
			
			
			$output .= '.not-override';	
			$output .= '{';
			$output .= 'display:none;';			
			$output .= '}';
			
			
			
			
		}
		
		
		
				
		$output !='' ? $doc->addStyleDeclaration($output) : '';
		
		
	}

	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get default template style id
	 *
	 */	
	public static function defaultTmplStyleId($tmpl_name)
	{
		
		
		// Core Joomla variables
		$app = JFactory::getApplication();
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query .= 'SELECT id, params FROM #__template_styles WHERE template=' . $db->quote($tmpl_name);
		
		$db->setQuery($query);
		$row = $db->loadObject();
		
		return $row;		
		
		
	}
	
	
	
	
	
}
