<?php
/**
 * @package		Mb2 Template Style
 * @version		1.0.3
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		Commercial (http://codecanyon.net/licenses)
**/

defined('JPATH_PLATFORM') or die;



class JFormFieldMb2enditem extends JFormField
{
	
	
	protected $type = 'Mb2enditem';	
	protected $title = '';

	
	
	protected function getInput()
	{
		
		$output = '';
		
		$output .= '</div></div>';		
		
		$output .= '</div></div>';
		
		$output .= '<div><div>';		
		
		return $output;	
		
		
	}
}
