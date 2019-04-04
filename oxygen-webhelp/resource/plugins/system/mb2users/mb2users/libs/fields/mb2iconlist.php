<?php
/**
 * @package		Mb2 Mega Menu
 * @version		1.0.0
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2014 - 2015 Mariusz Boloz (http://mb2extensions.com.com). All rights reserved
 * @license		GNU/GPL (http://www.gnu.org/copyleft/gpl.html)
**/ 
 
// no direct access
defined('_JEXEC') or die;

/**
 * Form Field class for the Joomla Platform.
 * Supports a generic list of options.
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       11.1
 */
class JFormFieldMb2iconlist extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'Mb2iconlist';

	/**
	 * Method to get the field input markup for a generic list.
	 * Use the multiple attribute to enable multiselect.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   11.1
	 */
	protected function getInput()
	{
		$html = array();
		$attr = '';

		// Initialize some field attributes.
		$attr .= !empty($this->class) ? ' class="' . $this->class . '"' : '';
		$attr .= !empty($this->size) ? ' size="' . $this->size . '"' : '';
		$attr .= $this->multiple ? ' multiple' : '';
		$attr .= $this->required ? ' required aria-required="true"' : '';
		$attr .= $this->autofocus ? ' autofocus' : '';

		// To avoid user's confusion, readonly="true" should imply disabled="true".
		if ((string) $this->readonly == '1' || (string) $this->readonly == 'true' || (string) $this->disabled == '1'|| (string) $this->disabled == 'true')
		{
			$attr .= ' disabled="disabled"';
		}

		// Initialize JavaScript field attributes.
		$attr .= $this->onchange ? ' onchange="' . $this->onchange . '"' : '';

		// Get the field options.
		$options = (array) $this->getOptions();

		// Create a read-only list (no name) with a hidden input to store the value.
		//if ((string) $this->readonly == '1' || (string) $this->readonly == 'true')
//		{
//			$html[] = JHtml::_('select.genericlist', $options, '', trim($attr), 'value', 'text', $this->value, $this->id);
//			$html[] = '<input type="hidden" name="' . $this->name . '" value="' . $this->value . '"/>';
//		}
//		else
//		// Create a regular list.
//		{
			$html[] = JHtml::_('select.genericlist', $options, $this->name, trim($attr), 'value', 'text', $this->value, $this->id);
		//}

		return implode($html);
	}

	/**
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
	 *
	 * @since   11.1
	 */
	protected function getOptions()
	{
		$options = array ( 
		''=>JText::_('JNONE'),
		'mb2_usersicon-link,'.JText::_('PLG_SYSTEM_MB2USERS_WEBSITE')=>JText::_('PLG_SYSTEM_MB2USERS_WEBSITE'),
		'mb2_usersicon-vimeo,Vimeo'=>'Vimeo',
		'mb2_usersicon-twitter,Twitter'=>'Twitter',
		'mb2_usersicon-youtube,Youtube'=>'Youtube',
		'mb2_usersicon-mail,Email'=>'Email',
		'mb2_usersicon-pinterest,Pinterest'=>'Pinterest',
		'mb2_usersicon-flickr,Flickr'=>'Flickr',
		'mb2_usersicon-gplus,Google plus'=>'Google plus',
		'mb2_usersicon-skype,Skype'=>'Skype',
		'mb2_usersicon-linkedin,Linkedin'=>'Linkedin',
		'mb2_usersicon-facebook,Facebook'=>'Facebook',
		'mb2_usersicon-instagram,Instagram'=>'Instagram'
		);
		
		
		

		foreach ($this->element->children() as $option)
		{
			// Only add <option /> elements.
			if ($option->getName() != 'option')
			{
				continue;
			}

			// Filter requirements
			if ($requires = explode(',', (string) $option['requires']))
			{
				// Requires multilanguage
				if (in_array('multilanguage', $requires) && !JLanguageMultilang::isEnabled())
				{
					continue;
				}

				// Requires associations
				if (in_array('associations', $requires) && !JLanguageAssociations::isEnabled())
				{
					continue;
				}
			}

			$value = (string) $option['value'];

			$disabled = (string) $option['disabled'];
			$disabled = ($disabled == 'true' || $disabled == 'disabled' || $disabled == '1');

			$disabled = $disabled || ($this->readonly && $value != $this->value);

			// Create a new option object based on the <option /> element.
			$tmp = JHtml::_(
				'select.option', $value,
				JText::alt(trim((string) $option), preg_replace('/[^a-zA-Z0-9_\-]/', '_', $this->fieldname)), 'value', 'text',
				$disabled
			);

			// Set some option attributes.
			$tmp->class = (string) $option['class'];

			// Set some JavaScript option attributes.
			$tmp->onclick = (string) $option['onclick'];

			// Add the option object to the result set.
			$options[] = $tmp;
		}

		reset($options);

		return $options;
	}
}
