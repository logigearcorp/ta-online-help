<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;

// Get joomla core vairables
$doc = JFactory::getDocument();






class Mb2TmplFonts
{
	
	
	
	
	
	/**
	 *
	 * Method to find font name from template typography parameter
	 *
	 */	
	public static function find_font_name($font, &$params)
	{
		
		
		$output = '';
		
		
		// Normal fonts	
		if ($font == 'normal1')
		{			
			$output .= $params->get('normal_font1', 'Arial, Helvetica, sans-serif');
		}
		elseif ($font == 'normal2')
		{
			$output .= $params->get('normal_font2', 'Georgia, \'Times New Roman\', Times, serif');
		}
		elseif ($font == 'normal3')
		{
			$output .= $params->get('normal_font3', '\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif');
		}
		
		
		
		// Google fonts
		if ($font == 'google1')
		{
			$output .= '\'' . $params->get('google_font_name1', 'Open Sans') . '\', Arial, Helvetica, sans-serif';
		}
		elseif ($font == 'google2')
		{
			$output .= '\'' . $params->get('google_font_name2', 'Signika') . '\', Arial, Helvetica, sans-serif';
		}
		elseif ($font == 'google3')
		{
			$output .= '\'' . $params->get('google_font_name3', 'Source Sans Pro') . '\', Arial, Helvetica, sans-serif';
		}
		
		
		
		// Custom fonts
		if ($font == 'custom1') 
		{
			$output .= '\'' . $params->get('custom_font_name1', '') . '\', Arial, Helvetica, sans-serif';
		}
		elseif ($font == 'custom2') 
		{
			$output .= '\'' . $params->get('custom_font_name2', '') . '\', Arial, Helvetica, sans-serif';
		}
		elseif ($font == 'custom3') 
		{
			$output .= '\'' . $params->get('custom_font_name3', '') . '\', Arial, Helvetica, sans-serif';
		}		
		
		
		
		return $output;
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get google fonts url
	 *
	 */	
	public static function load_gfonts(&$params)
	{
		
		
		// Basic variables
		$output ='';
		$doc = JFactory::getDocument();
		$smode = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';
		
		
		// Check if goole fonts are in use
		$gfont1 = ($params->get('general_font_type','') == 'google1' || $params->get('headings_font_type','') == 'google1' || $params->get('menu_font_type','') == 'google1' || $params->get('submenu_font_type','') == 'google1' || $params->get('custom_font_type','') == 'google1' || $params->get('custom1_font_type','') == 'google1' || $params->get('custom2_font_type','') == 'google1');
		
		$gfont2 = ($params->get('general_font_type','') == 'google2' || $params->get('headings_font_type','') == 'google2' || $params->get('menu_font_type','') == 'google2' || $params->get('submenu_font_type','') == 'google2' || $params->get('custom_font_type','') == 'google2' || $params->get('custom1_font_type','') == 'google2' || $params->get('custom2_font_type','') == 'google2');
		
		$gfont3 = ($params->get('general_font_type','') == 'google3' || $params->get('headings_font_type','') == 'google3' || $params->get('menu_font_type','') == 'google3' || $params->get('submenu_font_type','') == 'google3' || $params->get('custom_font_type','') == 'google3' || $params->get('custom1_font_type','') == 'google3' || $params->get('custom2_font_type','') == 'google3');
		
			
		
		if ($gfont1 || $gfont2 || $gfont3)
		{			
			
			// Get font name
			$gfont1name = str_replace(' ', '+', $params->get('google_font_name1', 'Open Sans'));
			$gfont2name = str_replace(' ', '+', $params->get('google_font_name2', 'Signika'));
			$gfont3name = str_replace(' ', '+', $params->get('google_font_name3', 'Source Sans Pro'));
			
			// Load google fonts in a one request to speed up website
			//$output .= $smode . '://fonts.googleapis.com/css?family=';
			$output .= '//fonts.googleapis.com/css?family=';
			
			if ($gfont1)
			{
				$output .= $gfont1name;
				$params->get('google_font_style1', '') !='' ? $output .= ':' . $params->get('google_font_style1', '') : '';
			}
			
			if ($gfont2) {					
				$gfont1 ? $output .= '|' : '';
				$output .= $gfont2name;	
				$params->get('google_font_style2', '') !='' ? $output .= ':' . $params->get('google_font_style2', '') : '';
			}
			
			if ($gfont3)
			{
				($gfont1 || $gfont2) ? $output .= '|' : '';
				$output .= $gfont3name;
				$params->get('google_font_style3', '') !='' ? $output .= ':' . $params->get('google_font_style3', '') : '';
			}
			
			
			$doc->addStyleSheet($output);					
			
		}
		
		
		
					
		
		
			
		
	}
	
	
	
	
	
	
	
	/**
	 *
	 * Method to load font face
	 *
	 */	
	public static function load_font_face(&$params)
	{
	
	
		// Basic variables
		$output = '';
		$app = JFactory::getApplication();
		$doc = JFactory::getDocument();
		
				
		// Check if goole fonts are in use
		$fface1 = ($params->get('general_font_type') == 'custom1' || $params->get('headings_font_type') == 'custom1' || $params->get('menu_font_type') == 'custom1' || $params->get('submenu_font_type') == 'custom1' || $params->get('custom_font_type') == 'custom1' || $params->get('custom1_font_type') == 'custom1' || $params->get('custom2_font_type') == 'custom1');
		
		$fface2 = ($params->get('general_font_type') == 'custom2' || $params->get('headings_font_type') == 'custom2' || $params->get('menu_font_type') == 'custom2' || $params->get('submenu_font_type') == 'custom2' || $params->get('custom_font_type') == 'custom2' || $params->get('custom1_font_type') == 'custom2' || $params->get('custom2_font_type') == 'custom2');
		
		$fface3 = ($params->get('general_font_type') == 'custom3' || $params->get('headings_font_type') == 'custom3' || $params->get('menu_font_type') == 'custom3' || $params->get('submenu_font_type') == 'custom3' || $params->get('custom_font_type') == 'custom3' || $params->get('custom1_font_type') == 'custom3' || $params->get('custom2_font_type') == 'custom3');
		
		
		// Get font face array
		$farray = array($fface1, $fface2, $fface3);
		
		
		// Font face base path
		$ffpath = JURI::root(true) . '/templates/' . $app->getTemplate() . '/fonts/';
		
				
		// Load font-face
		if ($fface1 || $fface2 || $fface3)
		{	
			$i = 0;
			foreach ($farray as $key=>$ffont)
			{
				$i++;				
				if ($ffont)
				{						
					// Define font url's
					$eot = $ffpath . $params->get('custom_font_eot' . $i, ''); 
					$woff = $ffpath . $params->get('custom_font_woff' . $i, ''); 
					$ttf = $ffpath . $params->get('custom_font_ttf' . $i, '');
					$svg = $ffpath . $params->get('custom_font_svg' . $i, '');				
					
					$output .='@font-face {';
				
					$output .='font-family: \'' . $params->get('custom_font_name' . $i) . '\';';
					
					
					if ($params->get('custom_font_eot' . $i)!='' || 
						$params->get('custom_font_woff' . $i)!='' || 
						$params->get('custom_font_ttf' . $i)!='' || 
						$params->get('custom_font_svg' . $i)!='')
					{
						
						// IE9 Compat Modes 
						$eot ? $output .='src: url(\'' . $eot . '\');' : '';
						
						$output .= 'src:';
						
						// IE6-IE8
						$eot ? $output .= 'url(\'' . $eot . '?#iefix\') format(\'embedded-opentype\')' : '';	
						
						// Modern Browsers
						if ($woff)
						{							
							$eot ? $output .= ',' : '';	
							$output .= 'url(\'' . $woff . '2\') format(\'woff2\'),';						
							$output .= 'url(\'' . $woff . '\') format(\'woff\')';							
						}
						
						// Safari, Android, iOS 
						if ($ttf !='')
						{	
							($eot || $woff) ? $output .= ',' : '';						
							$output .= 'url(\'' . $ttf . '\') format(\'truetype\')';							
						}
						
						if ($svg)
						{
							($eot || $woff || $ttf) ? $output .= ',' : '';
							$output .= 'url(\'' . $svg . '#' . $params->get('custom_font_name' . $i). '\') format(\'svg\')';							
						}						
						
						$output .= ';';							
					} // End if font eot, woff, ttf, svg				
					
					$output .='}';			
				} // End if ffont
						
			} // End foreach	
			
		} // End if $fface1 || $fface2 || $fface3
		
		return $output;
			
	
	}
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get iconfonts
	 *
	 */	
	public static function load_iconfonts(&$params)
	{
		
		
		// Basic variables
		$app = JFactory::getApplication();
		$doc = JFactory::getDocument();
		
		$fontbaseurl = JURI::base(true) . '/templates/' . $app->gettemplate() . '/assets';
		
				
		// Glyphicons
		if ($params->get('icon_font_glyphicon',1) == 1)
		{			
			$doc->addStyleSheet($fontbaseurl . '/glyphicon/css/glyphicon.min.css');	
		}
		
		
		// Font Awesome
		if ($params->get('icon_font_fa',1) == 1)
		{			
			$doc->addStyleSheet($fontbaseurl . '/font-awesome/css/font-awesome.min.css');	
		}		
		
		
		// Line Icons
		if ($params->get('icon_font_lineicons',1) == 1)
		{			
			$doc->addStyleSheet($fontbaseurl . '/lineicon/css/lineicon.min.css');	
		}	
		
		
		// pe-icon-7-stroke
		if ($params->get('icon_font_pe7stroke',1) == 1)
		{			
			$doc->addStyleSheet($fontbaseurl . '/pe-icon-7-stroke/css/pe-icon-7-stroke.min.css');	
		}	
		
			
			
		
	}
	
	
	
	
	
	
	
	
	
}