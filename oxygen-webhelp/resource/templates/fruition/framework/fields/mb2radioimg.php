<?php



defined('JPATH_PLATFORM') or die;



class JFormFieldMb2radioimg extends JFormField
{
	
	
	
	protected $type = 'Mb2radioimg';

	
	
	protected function getInput()
	{
		
		$html = array();
		
		
		// Get the field options.
		$options = $this->getOptions();
		
		
		// Get site template name
		$tmpl = JFormFieldMb2radioimg::getTemplateName();
		
				
		// Initialize some field attributes.
		$class     = ' class="mb2-radioimage"';
		$required  = $this->required ? ' required aria-required="true"' : '';
		$autofocus = $this->autofocus ? ' autofocus' : '';
		$disabled  = $this->disabled ? ' disabled' : '';
		$readonly  = $this->readonly;

		
		// Start the radio field output.
		$html[] = '<fieldset id="' . $this->id . '"' . $class . $required . $autofocus . $disabled . ' >';
		$html[] = '<a href="#" class="mb2-radioimage-btn btn btn-modal" title="Layout">+</a>';		
		$html[] = '<div class="mb2-radioimage-wrap">';
				
		
		// Get image path
		$imgpath = JURI::root(true) . '/templates/' . $tmpl . '/framework/admin/images/params/';
		

		// Build the radio field output.
		foreach ($options as $i => $option)
		{
			// Initialize some option attributes.
			$checked = ((string) $option->value == (string) $this->value) ? ' checked="checked"' : '';
			$class = !empty($option->class) ? ' class="' . $option->class . '"' : '';

			$disabled = !empty($option->disable) || ($readonly && !$checked);

			$disabled = $disabled ? ' disabled' : '';

			// Initialize some JavaScript option attributes.
			$onclick = !empty($option->onclick) ? ' onclick="' . $option->onclick . '"' : '';
			$onchange = !empty($option->onchange) ? ' onchange="' . $option->onchange . '"' : '';
			
			$tattr = '';
			
			$html[] = '<input type="radio" id="' . $this->id . $i . '" name="' . $this->name . '" value="'
				. htmlspecialchars($option->value, ENT_COMPAT, 'UTF-8') . '"' . $checked . $class . $required . $onclick
				. $onchange . $disabled . ' />';

			$html[] = '<label for="' . $this->id . $i . '" title="' . $tattr . '"' . $class . ' ><img src="' 
				. $imgpath
				. JText::alt($option->text, preg_replace('/[^a-zA-Z0-9_\-]/', '_', $this->fieldname)).'" alt=""/></label>';

			$required = '';
		}
		
		
		$html[] = '<div>';
		

		// End the radio field output.
		$html[] = '</fieldset>';

		return implode($html);
	}

	
	
	
	protected function getOptions()
	{
		$options = array();

		foreach ($this->element->children() as $option)
		{
			// Only add <option /> elements.
			if ($option->getName() != 'option')
			{
				continue;
			}

			$disabled = (string) $option['disabled'];
			$disabled = ($disabled == 'true' || $disabled == 'disabled' || $disabled == '1');

			// Create a new option object based on the <option /> element.
			$tmp = JHtml::_(
				'select.option', (string) $option['value'], trim((string) $option), 'value', 'text',
				$disabled
			);

			// Set some option attributes.
			$tmp->class = (string) $option['class'];

			// Set some JavaScript option attributes.
			$tmp->onclick = (string) $option['onclick'];
			$tmp->onchange = (string) $option['onchange'];

			// Add the option object to the result set.
			$options[] = $tmp;
		}

		reset($options);

		return $options;
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
