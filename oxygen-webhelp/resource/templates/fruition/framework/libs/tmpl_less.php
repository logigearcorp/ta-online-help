<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


class Mb2TmplLess
{
	
	
	
	/**
	 *
	 * Method to autocompile template less file to css
	 *
	 *
	 */	
	public static function lessAutoCompile(&$params, $attribs = array())
	{			
				
		if (Mb2TmplHelper::defaultTmplStyleParam('mb2_lesscss', 1))
		{	
		
			// Get joomla core variables
			jimport('joomla.filesystem.folder');
			jimport('joomla.filesystem.file');
			$app = JFactory::getApplication();		
			
			
			// Get less variables array
			require_once( MB2_THEME_LESS . DS . 'variables.php');		
			
			
			// Load less to pht class
			if(!class_exists('lessc'))
			{
				require_once( MB2_THEME_FRAMEWORK . DS . 'lessphp' . DS . 'lessc.inc.php');
			}
			
			$less = new lessc();
			
			
			// Check if cache folder in template directory exists
			// If not create it	
			if(!is_dir(MB2_THEME_CACHE))
			{
				JFolder::create(MB2_THEME_CACHE);				
			}	
			
				
			// Define less and css files
			$inputFile = MB2_THEME_LESS . DS . 'template.less';
			
			
			// Generate template style for all template styles
			$tmpl_styles = Mb2TmplHelper::tmplStyleId(array('array'=>true));		
			
			foreach ($tmpl_styles as $style)
			{		
				
				if ($style->id == $app->gettemplate(true)->id)
				{
				
					$outputFile = MB2_THEME_CSS . DS . 'template_' . $style->id . '.css';				
					
					if (!is_file($outputFile))
					{
						$buffer = '@charset "utf-8";';						
						JFile::write($outputFile,$buffer);	
					}
					
					
					// Define cache file path
					$cacheFile = MB2_THEME_CACHE . '/' . basename($inputFile) . '_' . $style->id . '.cache';					
					
					
					// Check if cache file exists
					// If not return input css file
					if ($params->get('mb2_lesscss_cache',1) == 1 && file_exists($cacheFile)) 
					{
						$cache = unserialize(file_get_contents($cacheFile));
					} 
					else 
					{
						$cache = $inputFile;			
					}
												
					
					// Check if comments are allowed
					$comments = false;//$params->get('mb2_lesscss_compress', 0) ? false : true;
					$less->setPreserveComments($comments);	
					
					
					// Get variable from template params
					$less->setVariables($lessvariable);
					
					
					// Check if format is set to 'compressed'
					$fmatter = $params->get('mb2_lesscss_compress', 1) == 1 ? 'compressed' : 'classic';		
					$less->setFormatter($fmatter);		
										
					
					// Check if less file is correct
					// If not return Joomla error message
					try 
					{		
						$newCache = $less->cachedCompile($cache);			
						if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) 
						{						
							file_put_contents($cacheFile, serialize($newCache));
							file_put_contents($outputFile, $newCache['compiled']);										
						}		
					}			
					catch (exception $e) 
					{
						JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');
					}				
				
				}
				
			} // End foreach			
		
		}		
		
	}
	
	
	
}