<?php
/**
 * @package		Mb2 Shortcodes
 * @version		4.0.2
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2013 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		GNU/GPL (http://www.gnu.org/copyleft/gpl.html)
**/
 

defined('_JEXEC') or die;


class PlgSystemMb2shortcodesHelper {  
	
	
	
	
	
	public static function getFeTemplateName ()
	{
		$db = JFactory::getDBO();
		$query = "SELECT template FROM #__template_styles WHERE client_id=0 AND home=1";
		$db->setQuery($query);
		return $db->loadResult();
	}
	
	
	
	public static function generatorList($xml,$level = 3)
	{
		
		$output = '';
		$array = array();
		
				
		// Get xml object and convert to an array
		$xmlObj=simplexml_load_file($xml);
		$array = PlgSystemMb2shortcodesHelper::amstore_xmlobj2array($xmlObj, $level);
		
						
		$output .= '<ul class="mb2shortcodes-dd-list">';
		
		foreach ($array as $v)
		{			
			foreach ($v as $v2)
			{
				
				$name = $v2['@attributes']['name'];
				$elements = $v2['el'];
				//print_r($elements);
				
				$output .= '<li>';				
				$output .= '<h4>' . $name . '</h4>';
					
					if (count($elements)>0)
					{
						$output .= '<ul>';							
						
							foreach ($elements as $el)
							{
								
								$output .= '<li class="mb2shortcodes-list-item">';
													
								$output .= '<a href="#" data-name="' . $el['data'] . '">';
								
								$output .= $el['name'];
								
								$output .= '</a>';
								
								$output .= '</li>';	
							}
							
												
							
						$output .= '</ul>';
						
					}		
					
				
				
				$output .= '</li>';
			
			}
			
		}
		
		$output .= '</ul>';	
		
		
		
		return $output;
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get array from xml object
	 *
	 **/
	public static function amstore_xmlobj2array($obj, $level=2) {
   
		$items = array();
	   
		if(!is_object($obj)) return $items;
		   
		$child = (array)$obj;
	   
		if(sizeof($child)>1) {
			foreach($child as $aa=>$bb) {
				if(is_array($bb)) {
					foreach($bb as $ee=>$ff) {
						if(!is_object($ff)) {
							$items[$aa][$ee] = $ff;
						} else
						if(get_class($ff)=='SimpleXMLElement') {
							$items[$aa][$ee] = PlgSystemMb2shortcodesHelper::amstore_xmlobj2array($ff,$level+1);
						}
					}
				} else
				if(!is_object($bb)) {
					$items[$aa] = $bb;
				} else
				if(get_class($bb)=='SimpleXMLElement') {
					$items[$aa] = PlgSystemMb2shortcodesHelper::amstore_xmlobj2array($bb,$level+1);
				}
			}
		} else
		if(sizeof($child)>0) {
			foreach($child as $aa=>$bb) {
				if(!is_array($bb)&&!is_object($bb)) {
					$items[$aa] = $bb;
				} else
				if(is_object($bb)) {
					$items[$aa] = PlgSystemMb2shortcodesHelper::amstore_xmlobj2array($bb,$level+1);
				} else {
					foreach($bb as $cc=>$dd) {
						if(!is_object($dd)) {
							$items[$obj->getName()][$cc] = $dd;
						} else
						if(get_class($dd)=='SimpleXMLElement') {
							$items[$obj->getName()][$cc] = PlgSystemMb2shortcodesHelper::amstore_xmlobj2array($dd,$level+1);
						}
					}
				}
			}
		}
	
		return $items;
	}



	
	
	
	
	/**
	 *
	 * Methot to set slider background for section
	 *
	 *
	 */
	public static function getFilesArray($folder, $filter = 'jpg|jpeg|bmp|png|gif', $attribs = array())
	{
		
		jimport('joomla.filesystem.file');
		jimport('joomla.filesystem.folder');
		
		
		// Define folder path and filter
		//$basepath = JPATH_SITE . DS . 'images';
		//$folderparam = str_replace('/', DS, $folder);
		$path = $folder;
		
		
		// Get images array
		$files = JFolder::files($path,$filter);
		
		
		if ($folder!='' && is_dir($path))
		{
			if (is_array($files))
			{
				
				if (count($files)>1)
				{					
					return $files;					
				}
				else
				{
					return false;	
				}				
			}
			else
			{
				return false;	
			}			
		}
		else
		{			
			return false;		
		}	
				
		
	}
	
	
	
	
}