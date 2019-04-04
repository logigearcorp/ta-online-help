<?php



defined('JPATH_PLATFORM') or die;



class JFormFieldMb2prestyles extends JFormField
{
	
	
	protected $type = 'Mb2prestyles';


	protected function getInput()
	{
		
		// Get variables
		$output = '';
		$i = 0;
		
		
		// Get site template name
		$tmpl = JFormFieldMb2prestyles::getTemplateName();
		
		
		// Get json predefined style file
		!defined('DS') ? define ('DS', DIRECTORY_SEPARATOR) : '';
		$json_path = JPATH_SITE . DS . 'templates' . DS . $tmpl . DS . 'features' . DS . 'style.json';
		
		
		// Convert json data to an array
		$style_json_data = file_get_contents($json_path);
		$style_array = json_decode($style_json_data,true);		
		
		
		$output .= '</div><div><div class="mb2-prestyles" data-id="' . $this->id . '">';		
		$output .= '<input type="hidden" name="' . $this->name . '" id="' . $this->id . '" value="' . $this->value . '" />';
		
		
		foreach ($style_array['predefined_styles'] as $v)
		{
			
			$i++;			
						
			$style_string = htmlspecialchars(json_encode($v), ENT_COMPAT, 'UTF-8');			
			
			$cls = $this->value == $i ? ' active' : '';
			
			$img = JURI::root(true) . '/templates/' . $tmpl . '/framework/admin/images/params/prestyles';
			
			$output .= '<a href="#" class="mb2-prestyles-item ' . $cls. '"';			
			$output .= ' data-style="' . $style_string . '" data-num="' . $i . '"';
			$output .= ' title="' . JText::sprintf('TMPL_MB2_PRESTYLE',$i) . '">';
			$output .= '<img src="' . $img . '/style' . $i . '.jpg" alt="' . JText::sprintf('TMPL_MB2_PRESTYLE',$i) . '" />';
			$output .= '</a>'; 
			
		}
		
		
		$output .= '</div>';	
		
		return $output;
		
		
		
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
