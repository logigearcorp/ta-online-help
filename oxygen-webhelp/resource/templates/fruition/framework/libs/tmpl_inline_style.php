<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;


class Mb2TmplInlineStyles 
{
	
	
	
	
	/**
	 *
	 * Method to get inline styles in features directory of the template
	 *
	 */	
	public static function custom_inl_style(&$params, $attribs = array())
	{
				
		if (file_exists( MB2_THEME_FEATURES . '/style.php'))
		{
			require (MB2_THEME_FEATURES . '/style.php');	
		}
		
	}
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get navigation inline styles
	 *
	 */	
	public static function inline_style_fonts(&$params)
	{
		
				
		$output = '';
				
		 
		// Get font family
		$hfont = Mb2TmplFonts::find_font_name($params->get('headings_font_type', 'google1'), $params);
		$modfont = Mb2TmplFonts::find_font_name($params->get('modules_font_type', 'google1'), $params);
		$gfont = Mb2TmplFonts::find_font_name($params->get('general_font_type', 'google1'), $params);
		$cfont = Mb2TmplFonts::find_font_name($params->get('custom_font_type', 'normal1'), $params);
		$cfont1 = Mb2TmplFonts::find_font_name($params->get('custom1_font_type', 'normal1'), $params);
		$cfont2 = Mb2TmplFonts::find_font_name($params->get('custom2_font_type', 'normal1'), $params);
		$mfont = Mb2TmplFonts::find_font_name($params->get('menu_font_type', 'google1'), $params);	
		
		
		// General
		$output .= 'body';
		$output .= '{';
		$output .= 'font-family:' . $gfont .';';
		$output .= 'font-size:' . $params->get('general_font_size', 15) . 'px;';
		$output .= 'font-weight:' . $params->get('general_font_weight', 'normal') . ';';
		$output .= 'letter-spacing:' . $params->get('general_font_letter_spacing', 0) . 'px;';	
		$output .= '}';
		
		
		// Headings
		$output .= 'h1,h2,h3,h4,h5,h6';
		$output .= '{';
		$output .= 'font-family:' . $hfont .';';
		$output .= 'font-weight:' . $params->get('headings_font_weight', 'normal') . ';';
		$output .= 'text-transform:' . $params->get('headings_text_transform', 'none') . ';';
		$output .= 'font-style:' . $params->get('headings_font_style', 'normal') . ';';
		$output .= 'letter-spacing:' . $params->get('headings_font_letter_spacing', 0) . 'px;';
		$output .= '}';
		
		
		$output .= 'h1{font-size:' . $params->get('headings_h1_size', '28') . 'px;}';
		$output .= 'h2{font-size:' . $params->get('headings_h2_size', '26') . 'px;}';
		$output .= 'h3{font-size:' . $params->get('headings_h3_size', '22') . 'px;}';
		$output .= 'h4{font-size:' . $params->get('headings_h4_size', '18') . 'px;}';
		$output .= 'h5{font-size:' . $params->get('headings_h5_size', '16') . 'px;}';
		$output .= 'h6{font-size:' . $params->get('headings_h6_size', '15') . 'px;}';		
		
		
		// Modules		
		//$output .= '.module-title,';
//		$output .= '.moduletable > h3';
//		$output .= '{';
//		$output .= 'font-size:' . $params->get('modules_font_size', 18) . 'px;';
//		$output .= 'font-family:' . $modfont .';';
//		$output .= 'font-weight:' . $params->get('modules_font_weight', 'normal') . ';';
//		$output .= 'text-transform:' . $params->get('modules_text_transform', 'none') . ';';
//		$output .= 'font-style:' . $params->get('modules_font_style', 'normal') . ';';
//		$output .= 'letter-spacing:' . $params->get('modules_font_letter_spacing', 0) . 'px;';
//		$output .= '}';		
		
		
		// Menu fonts
		$output .= '.mb2ctm-list > li > a';
		$output .= '{';
		$output .= 'font-family:' . $mfont . ';';
		$output .= 'font-size:' . $params->get('menu_font_size', 15) . 'px;';
		$output .= 'font-weight:' . $params->get('menu_font_weight', 'normal') . ';';
		$output .= 'text-transform:' . $params->get('menu_text_transform', 'none') . ';';
		$output .= 'font-style:' . $params->get('menu_font_style', 'normal') . ';';
		$output .= 'letter-spacing:' . $params->get('menu_font_letter_spacing', 0) . 'px;';
		$output .= '}';		
		
				
		// Custom elements
		if ($params->get('custom_font_element', '') !='')
		{
			$output .= $params->get('custom_font_element', '');
			$output .= '{';
			$output .= 'font-family:' . $cfont .';';
			$output .= 'font-weight:' . $params->get('custom_font_weight', 'normal') . ';';
			//$output .= 'text-transform:' . $params->get('custom_text_transform', 'none') . ';';
			//$output .= 'font-style:' . $params->get('custom_font_style', 'normal') . ';';
			//$output .= 'letter-spacing:' . $params->get('custom_font_letter_spacing', 0) . 'px;';
			$output .= '}';
		}
		
		// Custom elements1
		if ($params->get('custom1_font_element', '') !='')
		{
			$output .= $params->get('custom1_font_element', '');
			$output .= '{';
			$output .= 'font-family:' . $cfont1 .';';
			$output .= 'font-weight:' . $params->get('custom1_font_weight', 'normal') . ';';
			//$output .= 'text-transform:' . $params->get('custom1_text_transform', 'none') . ';';
			//$output .= 'font-style:' . $params->get('custom1_font_style', 'normal') . ';';
			//$output .= 'letter-spacing:' . $params->get('custom1_font_letter_spacing', 0) . 'px;';
			$output .= '}';
		}
		
		// Custom elements2
		if ($params->get('custom2_font_element', '') !='')
		{
			$output .= $params->get('custom2_font_element', '');
			$output .= '{';
			$output .= 'font-family:' . $cfont2 .';';
			$output .= 'font-weight:' . $params->get('custom2_font_weight', 'normal') . ';';
			//$output .= 'text-transform:' . $params->get('custom2_text_transform', 'none') . ';';
			//$output .= 'font-style:' . $params->get('custom2_font_style', 'normal') . ';';
			//$output .= 'letter-spacing:' . $params->get('custom2_font_letter_spacing', 0) . 'px;';
			$output .= '}';
		}		
		
		
		return $output;			
		
		
	}
	
	
	
	
	
	/**
	 *
	 * Method to get basic section styles
	 *
	 */	
	public static function section_style(&$params, $sections = array())
	{
		
		
		if (!class_exists('Mb2TmplHelper'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/helper.php');
		}
		
		$output = '';
		
		
		foreach ($sections as $key=>$section)
		{
						
			
			$s = str_replace('-', '_', $section);
			
			
			// Define template params section padding and module margin top and bottom
			$tspt = isset($params->get($s . '_padding')->t) ? $params->get($s . '_padding')->t : 0;
			$tspb = isset($params->get($s . '_padding')->b) ? $params->get($s . '_padding')->b : 0;			
			$tsmmt = isset($params->get($s . '_mod_margin')->t) ? $params->get($s . '_mod_margin')->t : 0;
			$tsmmb = isset($params->get($s . '_mod_margin')->b) ? $params->get($s . '_mod_margin')->b : 0;
			
						
			// Section padding top and bottom
			$spt = (isset(Mb2TmplHelper::getTmplParam($s . '_padding',$params)->t) && Mb2TmplHelper::getTmplParam($s . '_padding',$params)->t != '') ? 
			Mb2TmplHelper::getTmplParam($s . '_padding',$params)->t : $tspt;	
			$spb = (isset(Mb2TmplHelper::getTmplParam($s . '_padding',$params)->b) && Mb2TmplHelper::getTmplParam($s . '_padding',$params)->b != '') ? 
			Mb2TmplHelper::getTmplParam($s . '_padding',$params)->b : $tspb;
			
			
			// Section modules margin top and bottom
			$smmt = (isset(Mb2TmplHelper::getTmplParam($s . '_mod_margin',$params)->t) && Mb2TmplHelper::getTmplParam($s . '_mod_margin',$params)->t != '') ? 
			Mb2TmplHelper::getTmplParam($s . '_mod_margin',$params)->t : $tsmmt;	
			$smmb = (isset(Mb2TmplHelper::getTmplParam($s . '_mod_margin',$params)->b) && Mb2TmplHelper::getTmplParam($s . '_mod_margin',$params)->b != '') ? 
			Mb2TmplHelper::getTmplParam($s . '_mod_margin',$params)->b : $tsmmb;
			
			
									
			if ($spt>0 || $spb>0 || Mb2TmplHelper::getTmplParam(str_replace('-', '_', $section) . '_ccss',$params))
			{			
			
				$output .= '#' . $section;
				$output .= '{';
				$output .= Mb2TmplHelper::getTmplParam(str_replace('-', '_', $section) . '_ccss',$params);
				$output .= '}';	
				
				if ($spt>0 || $spb>0)
				{
					$output .= '#' . $section . ' .tsection-inner';
					$output .= '{';
					$output .= $spt ? 'padding-top:' . $spt . 'px;' : '';
					$output .= $spb ? 'padding-bottom:' . $spb . 'px;' : '';
					$output .= '}';	
				}
			
			}
			
			
			if ($smmt > 0 || $smmb > 0)
			{
				$output .= '#' . $section . ' .mod-block';
				$output .= '{';
				$output .= $smmt ? 'margin-top:' . $smmt . 'px;' : '';
				$output .= $smmb ? 'margin-bottom:' . $smmb . 'px;' : '';
				$output .= '}';		
			}
			
			
			// Custom section width
			$section_width = Mb2TmplHelper::getTmplParam(str_replace('-', '_', $section) . '_fwidth',$params,0);
			
							
			if ($section_width == 1)
			{
				$output .= '#' . $section . ' .container-fluid';
				$output .= '{';
				$output .= 'max-width:98%;';
				$output .= '}';	
				
				// Set also full width for sub menu container in header
				if ($section == 'main-header')
				{
					$output .= '#' . $section . ' .mb2ctm-smenu-inner';
					$output .= '{';
					$output .= 'max-width:98%;';
					$output .= '}';		
				}
									
			}
			
			
			
				
			
		}	
		
		
		return $output;
		
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get custom section styles
	 *
	 */	
	public static function custom_section_style(&$params, $sstyles = array())
	{
		
		
		$output = '';
		
		
		if (!class_exists('Mb2TmplHelper'))
		{
			require_once(MB2_THEME_FRAMEWORK_LIBS . '/helper.php');
		}
		
		
		
		//getTmplParam($name, &$params, $attribs = array())
		
		foreach ($sstyles as $key=>$sstyle)
		{
									
			// Add color (text, headings and links)				
			if (
				Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_color', $params) 	|| 			 
				Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_bg_image', $params)
			)
			{					
				
				// Text color and background				
				$output .= '.' . $sstyle;
				$output .= '{';
				
				
				// Text color
				$output .= Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_color', $params) ? 
				'color:' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_color', $params) . ';' : 
				'';
				
				
				// Background color
				//$output .= Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_bg_color', $params) ? 
				//'background-color:' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_bg_color', $params) . ';' 
				//: '';
				
				
				// Background-image
				if (Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_bg_image', $params))
				{
					$output .= 'background-image:url(\'' . JURI::base(true) . '/' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_bg_image', $params) . '\');';
					$output .= 'background-repeat:' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_bg_repeat', $params,'no-repeat') . ';';
					$output .= 'background-position:' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_bg_position', $params,'left top') . ';';
					$output .= 'background-attachment:' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_attachment', $params,'scroll') . ';';
					$output .= Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_bg_scale', $params,1) == 1 ? 'background-size:cover;' : '';
				}
				$output .= '}';	
			
			}
			
			
			
			//Background color
			if (Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_bg_color', $params))
			{
				
				$output .= '.' . $sstyle . ' .tsection-inner';;
				$output .= '{';
				$output .= 'background-color:' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_bg_color', $params) . ';';
				$output .= '}';
					
			}
			
			
			
			
			// Heading color
			if ($params->get(str_replace('-', '_', $sstyle) . '_h_color', $params))
			{
				
				$output .= '.' . $sstyle . ' h1,';
				$output .= '.' . $sstyle . ' h2,';
				$output .= '.' . $sstyle . ' h3,';
				$output .= '.' . $sstyle . ' h4,';
				$output .= '.' . $sstyle . ' h5,';
				$output .= '.' . $sstyle . ' h6';
				
				$output .= '{';
				
				$output .= 'color:' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_h_color', $params) . ';';			
				
				$output .= '}';
					
				
			}
			
			
			
			// Video background overlay color 
			if (Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_videoid', $params)!='' && Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_videobg', $params)!='')
			{
				
				$output .= '.' . $sstyle . ' .YTPOverlay';
				
				$output .= '{';
				
				$output .= 'background-color:' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_videobg', $params) . ';';			
				
				$output .= '}';					
				
			}
			
			
			
			
			// Links color
			if (Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_l_color', $params))
			{
				
				$output .= '.' . $sstyle . ' a';
				
				$output .= '{';
				
				$output .= 'color:' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_l_color', $params) . ';';			
				
				$output .= '}';					
				
			}
			
			
			
			
			
			// Links hover color
			if (Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_lh_color', $params))
			{
				
				$output .= '.' . $sstyle . ' a:hover,';
				$output .= '.' . $sstyle . ' a:focus';
				
				$output .= '{';
				
				$output .= 'color:' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $sstyle) . '_lh_color', $params) . ';';			
				
				$output .= '}';					
				
			}
			
			
			
			
					
			
		}	
		
		
		return $output;
		
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
}