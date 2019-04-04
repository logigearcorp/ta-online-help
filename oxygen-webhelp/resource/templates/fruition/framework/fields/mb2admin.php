<?php



defined('JPATH_PLATFORM') or die;



class JFormFieldMb2admin extends JFormField
{
	
	
	protected $type = 'Mb2admin';

	
	
	protected function getInput()
	{
		
		// Basic variables
		$output = '';
		$doc = JFactory::getDocument();
		$app = JFactory::getApplication();
		$tmpl = JFormFieldMb2admin::getTemplateName();
					
		// Add admin styles
		$doc->addStylesheet(JURI::root(true) . '/templates/' . $tmpl . '/framework/admin/css/style.css');
		
		// Add admin scripts
		$doc->addScript(JURI::root(true) . '/templates/' . $tmpl . '/framework/admin/js/scripts.js');
					
		
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
