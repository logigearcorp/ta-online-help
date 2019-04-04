<?php
/**
 * @package		Mb2 Shortcodes
 * @version		4.0.1
 * @author		Mariusz Boloz (http://mb2extensions.com)
 * @copyright	Copyright (C) 2013 - 2016 Mariusz Boloz (http://mb2extensions.com). All rights reserved
 * @license		GNU/GPL (http://www.gnu.org/copyleft/gpl.html)
**/
 

defined('_JEXEC') or die;
$app = JFactory::getApplication();
$tmpl = $app->getTemplate();




class PlgContentMb2shortcodesfix extends JPlugin{
   
	
	public function onContentPrepare($context, &$article, &$params, $limitstart=0){
										 
		$text = &$article->text;				
				
		
		$arr_shortcodesfix = array(
			
			// fix '"></p>' and '"> </p>'			
			'/\"><\/p>/' => '">',
			'/\">xC2\xA0<\/p>/' => '">',
			
			// fix '<p><div>' and '<p> <div>'
			'/\<p><div/' => '<div',
			'/\<p>xC2\xA0<div/' => '<div',
			
			// fix '<div></p>' and '<div> </p>'
			'/\<div><\/p>/' => '<div>',
			'/\<div>\xC2\xA0<\/p>/' => '<div>',
			
			// fix '<p></div>' and '<p> </div>'
			'/\<p><\/div>/' => '</div>',
			'/\<p>\xC2\xA0<\/div>/' => '</div>',
			
			// fix '</div></p>' and '</div> </p>'
			'/\/div><\/p>/' => '/div>',
			'/\/div>\xC2\xA0<\/p>/' => '/div>',						
			
			//fix '<p></p>'
			'/\<p><\/p>/' => '',
			
			//fix '<p> </p>'
			'/\<p>\xC2\xA0<\/p>/' => '',
			
			//fix '<br/>'
			'/<br \/>/iU' => ''
		);
		
				
					
		foreach	($arr_shortcodesfix as $fix=>$output){																						
			$text = preg_replace($fix,$output,$text);
		}			  
					 
		return true;
		
	}

}