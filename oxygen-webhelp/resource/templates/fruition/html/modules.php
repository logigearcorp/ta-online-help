<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the submenu style, you would use the following include:
 * <jdoc:include type="module" name="test" style="submenu" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */

/*
 * Module chrome for rendering the module in a submenu
 */
//function modChrome_no($module, &$params, &$attribs)
//{
//	if ($module->content)
//	{
//		echo $module->content;
//	}
//}

function modChrome_block($module, &$params, &$attribs)
{
	if ($module->content)
	{
		
		$sfx = $params->get('moduleclass_sfx');
		
		
		$clssfx = $sfx ? ' ' . htmlspecialchars($sfx) : '';
		$clssfx .= ($sfx == 'color-1' || $sfx == 'color-info' || $sfx == 'color-warning' || $sfx == 'color-danger' || $sfx == 'color-success') ? ' dark' : '';
		$clssfx .= $sfx == 'color-2' ? ' dark-gray' : '';
		
		$params->get('backgroundimage') ? $modbg = ' style="background-image:url(' . JURI::base(true) . '/' . $params->get('backgroundimage') . ');"' : $modbg = '';
		
		$arrowspan = '';
		
		
		echo "<div class=\"mod-block clearfix" . $clssfx . "\"" . $modbg . ">";
		if ($module->showtitle)
		{
			
			
			echo '<div class="module-heading">';			
			
			// Make diffrent title for module eith separator in title
			// Check if title have the separator '|'
			//if (preg_match('@|@', $module->title))
//			{				
//				// Make an array
//				$module_title_arr = explode('|', $module->title);				
//				$module_title = $module_title_arr[0];	
//				
//				// Show sub title
//				echo isset($module_title_arr[1]) ? '<span class="module-subtitle">' . $module_title_arr[1] . '</span>' : '';							
//			}
//			else
//			{
//				$module_title = $module->title;
//			}


	$title1 = str_replace('[','<span class="strong">',$module->title);
	$title2 = str_replace(']','</span>',$title1);
			
				
			echo "<h3 class=\"title module-title\">" . $title2 . "</h3>";
			
			echo '</div>';
		}
		echo $module->content;
		echo "</div>";
	}
}