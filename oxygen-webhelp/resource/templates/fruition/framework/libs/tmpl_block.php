<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


class Mb2TmplBlock
{
	
		
	
	
	/**
	 *
	 * Method to get super section (section with moduels and additional content)
	 *
	 */
	public static function superBlock(&$params, $attribs)
	{
		
		
		if (!class_exists('Mb2TmplHelper'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/helper.php');
		}
		
		
		// Basic variables
		$output = '';
		$ccls = '';
		$i = -1;
		$j = -1;
		$mstyle = Mb2TmplHelper::getTmplParam(str_replace('-', '_' , $attribs['name']) . '_grid', $params,1) ? 'block' : 'no_grid';
		
				
		// Check what is the number of active module positions
		$mcounter = Mb2TmplBlock::blockModCounter($attribs,$params);
		
		
		// Define some variables for super content sections
		if ($attribs['name'] == 'main-content')
		{
			
			// In main content super content is the content 'c'
			$sc = 'c';
			
			
			// Define default valuse of layout grid
			if ($mcounter == 3)
			{
				$defl = '3-c-2-3';	
			}
			elseif ($mcounter == 2)
			{
				$defl = '3-c-3';
			}
			elseif ($mcounter == 1)
			{
				$defl = 'c-2';
			}
			
			
			// Define prefix of the module position
			$modpref = 'sidebar';
			
			
			// Define supercotent
			$superc = '<div class="content-inner">';		
			$superc .= '<jdoc:include type="component" />';			
			$superc .= '</div>';
						
			
			// Additional div for modules
			$smodcontainer = '<div class="sidebar-inner">';
			$emodcontainer = '</div>';	
			
			
			// Class for super content
			$superccls = 'content-col ';
			$modcls = 'sidebar-col ';
						
			
		}
		elseif ($attribs['name'] == 'main-header')
		{
			
			// In mainheader super content is logo 'l'
			$sc = 'l';
			
			
			// define default valuse of layout grid
			if ($mcounter == 3)
			{
				$defl = 'l-4-3-3';	
			}
			elseif ($mcounter == 2)
			{
				$defl = 'l-5-5';
			}
			elseif ($mcounter == 1)
			{
				$defl = 'l-9';
			}
			
			
			// Define prefix of the module position
			$modpref = 'header';
			
			
			// Define supercotent
			$lngmod = count(JModuleHelper::getModules('logo-language')) ? '<jdoc:include type="modules" name="logo-language" style="" />' : '';
			$superc = Mb2TmplFramework::getLogo($params) . $lngmod;
			
			
			// Additional div for modules
			$smodcontainer = '';
			$emodcontainer = '';
			
			
			// Class for super content
			$superccls = 'tlogo tcol ';
			$modcls = 'tcol ';						
			
		}
		elseif ($attribs['name'] == 'footer')
		{
			
			// In mainheader super content is logo 'l'
			$sc = 'f';
			
			
			// define default valuse of layout grid
			if ($mcounter == 3)
			{
				$defl = 'f-4-3-3';	
			}
			elseif ($mcounter == 2)
			{
				$defl = 'f-5-5';
			}
			elseif ($mcounter == 1)
			{
				$defl = 'f-9';
			}
			
			
			// Define prefix of the module position
			$modpref = 'footer';
			
			
			// Define supercotent
			$superc = Mb2TmplFramework::getFooter($params, $attribs);
			
			
			// Additional div for modules
			$smodcontainer = '';
			$emodcontainer = '';
			
			
			// Class for super content
			$superccls = 'tfooter tcol ';
			$modcls = 'tcol ';						
			
		}
		
					
							
		
		// Get layout paramaeter for specific columns number
		if ($mcounter == 3)
		{		
			$sgrid = explode('-', $params->get(str_replace('-', '_', $attribs['name']) . '_four_columns_layout', $defl));
		}
		elseif ($mcounter == 2)
		{				
			$sgrid = explode('-', $params->get(str_replace('-', '_', $attribs['name']) . '_three_columns_layout', $defl));			
		}
		elseif ($mcounter == 1)
		{		
			$sgrid = explode('-', $params->get(str_replace('-', '_', $attribs['name']) . '_two_columns_layout', $defl));			
		}
		else
		{
			$sgrid = array($sc);	
		}
		
				
		// Convert to string section grid
		$imp = implode(' ', $sgrid);
			
		
		// Remove 'sc ' from the string
		$impclean = str_replace($sc .' ', '', $imp);
			
		
		// Convert the string to array	
		$sgrid2 = explode(' ', $impclean);		
		
		
		// Define module positions array
		$sidebars = array('a','b','c');
		
		
		foreach ($sgrid as $key=>$grid)
		{
			
			$i++;						
			
			// Show main content
			if ($sgrid[$key] == $sc)
			{			
			
				// Get main content columns grid number
				// Check if before or after main content container are sidebars	
				$g1 = isset($sgrid[$key-3]) ? $sgrid[$key-3] : '';							
				$g2 = isset($sgrid[$key-2]) ? $sgrid[$key-2] : '';
				$g3 = isset($sgrid[$key-1]) ? $sgrid[$key-1] : '';
				$g4 = isset($sgrid[$key+1]) ? $sgrid[$key+1] : '';
				$g5 = isset($sgrid[$key+2]) ? $sgrid[$key+2] : '';
				$g6 = isset($sgrid[$key+3]) ? $sgrid[$key+3] : '';
				
				
				// Content grid number = (12 - amount of sidebars grid nummbers)
				// 12 is the bootstrap grid number
				// Check if grid is enable for super section
				$cgridw = Mb2TmplHelper::getTmplParam(str_replace('-', '_' , $attribs['name']) . '_grid', $params,1) ? round((12)-($g1+$g2+$g3+$g4+$g5+$g6)) : 'no-grid';
				
				
				// Add content class left and right	
				// If ic content and right sidebars add 'right'
				// If ic content and left sidebars add 'left'
				$ccls .= isset($sgrid[$key-1]) ? ' right' : '';
				$ccls .= isset($sgrid[$key+1]) ? ' left' : ''; 	
			
							
				$output .= '<div class="' . $superccls . 'col-' . $params->get('cls_prefix', 'md') . '-' . $cgridw . $ccls . '">';
				$output .= $superc;
				$output .= '</div>';
				
			}
			
			
			$sidebar = false;
						
									
			// Show sidebars if exists
			// If section is headercheck also if is published off-canvas menu link 
			if ($modpref == 'header' && count(JModuleHelper::getModules('off-canvas')))
			{
				
				if ($params->get('off_canvas_link_pos','a') == $sidebars[$i])
				{
					$smodcontainer .= Mb2TmplHelper::offCanvasLink($params);	
				}					
				
				if (isset($sidebars[$i]))
				{
					if (count(JModuleHelper::getModules($modpref . '-' . $sidebars[$i])) || $params->get('off_canvas_link_pos','a') == $sidebars[$i])
					{
						$sidebar = true;	
					}					
				}
				
			}
			else
			{
				$sidebar = isset($sidebars[$i]) ? count(JModuleHelper::getModules($modpref . '-' . $sidebars[$i])) : false;
			}
			
			
							
			if ($sidebar)
			{							
				$j++;				
				
				// Check if grid is enable for module columns
				$mgridw = Mb2TmplHelper::getTmplParam(str_replace('-', '_' , $attribs['name']) . '_grid', $params,1) ? $sgrid2[$j] : 'no-grid';				
				
				$output .= '<div class="' . $modcls . 'col-' . $params->get('cls_prefix', 'md') . '-' . $mgridw . '">';
				$output .= $smodcontainer;			
				$output .= '<jdoc:include type="modules" name="' . $modpref . '-' . $sidebars[$key] . '" style="' . $mstyle . '" />';					
				$output .= $emodcontainer;	
				$output .= '</div>';														
			}			
			
			
		} // End foreach		
		
		return $output;			
		
	}
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get section content columns
	 *
	 */
	public static function block(&$params, $attribs)
	{
		
		if (!class_exists('Mb2TmplHelper'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/helper.php');
		}
		
		// Basic variables
		$output = '';
		$i = -1;
		$mstyle = $params->get($attribs['name'] . '_grid', 1) ? 'block' : 'no_grid';	
		$grid = Mb2TmplHelper::getTmplParam(str_replace('-', '_', $attribs['name']) . '_grid', $params,1);			
		
		
		// Check what is the number of active module positions
		$mcounter = Mb2TmplBlock::blockModCounter($attribs,$params);		
		
		
		// Get layout paramaeter for specific columns number
		if ($mcounter == 4)
		{		
			$layout = explode('-', $params->get(str_replace('-', '_', $attribs['name']) . '_four_columns_layout', '3-3-3-3'));
		}
		elseif ($mcounter == 3)
		{		
			$layout = explode('-', $params->get(str_replace('-', '_', $attribs['name']) . '_three_columns_layout', '4-4-4'));
		}
		elseif ($mcounter == 2)
		{		
			$layout = explode('-', $params->get(str_replace('-', '_', $attribs['name']) . '_two_columns_layout', '6-6'));
		}
		else
		{
			$layout = $grid == 1 ? array('12') : array('nocol');	
		}
		
				
		// Define module positions array
		$modpos = array('a','b','c','d');				
		
					
		foreach ($modpos as $key=>$position)
		{		
			
			// Check if some module is published in module position
			if (count(JModuleHelper::getModules($attribs['name'] . '-' . $modpos[$key])))
			{
				$i++;				
				
				// Check if grid is enable for this section
				$cgrid = Mb2TmplHelper::getTmplParam(str_replace('-', '_', $attribs['name']) . '_grid', $params,1) ?
				$layout[$i] :
				'no-grid';				
							
				$output .= '<div class="tcol col-' . $params->get('cls_prefix', 'md') . '-' . $cgrid . '">';			
				$output .= '<jdoc:include type="modules" name="' . $attribs['name'] . '-' . $modpos[$key] . '" style="' . $mstyle . '" />';			
				$output .= '</div>';	
										
			}			
					
		}
		
		
		return $output;	
		
		
	}
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get number of active module positions
	 *
	 */
	public static function blockModCounter($attribs,$params = NULL)
	{		
				
		$i = 0;
		
		
		// Define module position array
		$smposarr = array('a','b','c','d');
		// Main content (sidebars podule positions)
		$mcmposarr = array('a','b','c');
		// Main header module position
		$mhmposarr = array('a','b','c');
		
		
		if ($attribs['name'] == 'main-content')
		{
			$modpos = $mcmposarr;
			$countmod = 'sidebar';
		}
		elseif ($attribs['name'] == 'main-header')		
		{
			$modpos = $mhmposarr;
			$countmod = 'header';
		}
		else
		{
			$modpos = $smposarr;
			$countmod = $attribs['name'];
		}
			
				
		
		foreach ($modpos as $pos)
		{				
							
			if ($attribs['name'] == 'main-header' && count(JModuleHelper::getModules('off-canvas')))
			{
				if (count(JModuleHelper::getModules($countmod . '-' . $pos)) || $params->get('off_canvas_link_pos','a') == $pos)
				{
					$i++;	
				}
				
			}
			else
			{
				if (count(JModuleHelper::getModules($countmod . '-' . $pos)))
				{
					$i++;	
				}
			}
			
						
		}		
		
		return $i;		
		
	}	
	
	
	
	
	
	
}