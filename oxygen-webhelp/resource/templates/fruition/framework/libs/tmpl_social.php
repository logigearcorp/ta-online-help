<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


class Mb2TmplSocial
{
	
	
	
	/**
	 *
	 * Method to get social icons list
	 *
	 *
	 */
	public static function socialIcons(&$params, $attribs = array())
	{
	
		// Basic variables
		$output = '';
		$is_title = '';				
		$tooltip_cls = '';
		$tooltip_data = '';
		$style = '';
		
		
		
		$icons = Mb2TmplSocial::iconsArr($params);
		
		
		// Check if first icon is not empty
		if ($icons[0][0])
		{
			
			$output .= '<div class="social-icons icons-' . $attribs['size'] . $attribs['class'] . '">';
				
				
			foreach($icons as $icon){	
				
				// Check if use seect icon and set url
				if($icon[0] && $icon[1]){				
					
					
					// Add tooltip class and data placement (position of tooltip)	
					if (isset($attribs['ttip']) && $attribs['ttip']){				
						$is_title = Mb2TmplSocial::textTransform($icon[0]);				
						$tooltip_cls = ' tmpl-tooltip tt-top';
						$tooltip_data = ' data-placement="' . $attribs['tpos'] . '"';				
					}
					
					
					// Add icon width style
					if (isset($attribs['full-width']) && $attribs['full-width'])
					{						
						$icons_count = Mb2TmplSocial::iconsCount($params);
						$style = ' style="width:' . round(100/$icons_count, 10) . '%;"';						
					}
																
					
					// Start icon
					$output .= '<a href="' . $icon[1] . '"';
					$output .= ' class="social-icon icon-'. $icon[0] . $tooltip_cls . '"';
					$output .= ' target="' . $params->get('social_link_target','_self') . '"';
					$output .= ' title="' . $is_title . '"';
					$output .= $style;
					$output .= $tooltip_data;
					$output .= '>';			
					
					$output .= '<i class="fa fa-' . $icon[0] . '"></i>';
					
					$output .= '</a>';	
					
				}		
					
			}
				
				
			$output .= '</div>';  
		
		
		}
		
		
		return $output;	
    


	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get social icons arr
	 *
	 *
	 */
	public static function iconsArr(&$params)
	{
		
		
				
		
		//get social array	
		$social_arr = array(
			array($params->get('social_1',''), $params->get('social_1_link',''), 'icona'),
			array($params->get('social_2',''), $params->get('social_2_link',''), 'iconb'),
			array($params->get('social_3',''), $params->get('social_3_link',''), 'iconc'),
			array($params->get('social_4',''), $params->get('social_4_link',''), 'icond'),
			array($params->get('social_5',''), $params->get('social_5_link',''), 'icone'),
			array($params->get('social_6',''), $params->get('social_6_link',''), 'iconf'),
			array($params->get('social_7',''), $params->get('social_7_link',''), 'icong'),
			array($params->get('social_8',''), $params->get('social_8_link',''), 'iconh'),
			array($params->get('social_9',''), $params->get('social_9_link',''), 'iconi'),
			array($params->get('social_10',''), $params->get('social_10_link',''), 'iconj')
		);
		
		
		
		
		
		return $social_arr;	
		
		
		
		
		
	}
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get count of social icons
	 *
	 *
	 */
	public static function iconsCount(&$params)
	{
		
		
		
		
		$icons = Mb2TmplSocial::iconsArr($params);
		
		
		// Check if first icon is not empty
		if ($icons[0][0])
		{
			$i=0;
			foreach($icons as $icon){	
				
				// Check if use seect icon and set url
				if($icon[0] && $icon[1]){				
				
					$i++;			
		
				}
			}
		}
		
		
		
		return $i;
		
		
		
	}
	
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to transform text
	 *
	 *
	 */
	 public static function textTransform($str='',$a_char=array('_','-'),$echo=0)
	 {
	
		$output = '';
		$is_string = '';	
		$string = strtolower($str);		
		
		foreach ($a_char as $temp){
				
			$pos = strpos($string,$temp);		
				
			if($pos){			
				$mend = '';				
				$a_split = explode($temp,$string);				
				
				foreach ($a_split as $temp2){			
					$mend .= ucfirst($temp2).$temp;			
				}
					
				$string = substr($mend,0,-1);				
				$is_string = str_replace($a_char,' ',$string);				
			}
			else{
				$is_string = $str;
			}
					
					   
		}	
			
			
		if($echo == 1){
			echo ucfirst($is_string);
		}
		else{
			return ucfirst($is_string);	
		}	
			
			
	}
	
	
	
	
	
	
}