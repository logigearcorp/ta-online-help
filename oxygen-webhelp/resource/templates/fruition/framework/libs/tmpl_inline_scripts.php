<?php
/**
 * @package		Balance Template
 * @version		1.2.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;


class Mb2TmplInlineScripts 
{
	
	
	
	/**
	 *
	 * Method to get inline script for section background slider
	 *
	 */	
	public static function sectionBgSlider(&$params, $sections = array())
	{
				
		
		$output = '';
			
		// Get images array
		if (!class_exists('Mb2TmplHelper'))
		{
			require_once( MB2_THEME_FRAMEWORK_LIBS . '/helper.php');
		}		
		
		foreach ($sections as $section)
		{			
			
			$folder = Mb2TmplHelper::getTmplParam(str_replace('-', '_', $section) . '_cerousel_dir',$params);
			$duration = Mb2TmplHelper::getTmplParam(str_replace('-', '_', $section) . '_cerousel_duration',$params,5000);
			$fade = Mb2TmplHelper::getTmplParam(str_replace('-', '_', $section) . '_cerousel_fade',$params,1000);			
			
			if ($folder != '')
			{
				
				// Get images from array and change to js array width url
				$imagesarr = Mb2TmplHelper::getFilesArray($folder);
				$url = JURI::base(true) . '/images/' . $folder . '/';				
				$jsarray = preg_filter('@^@', $url, $imagesarr);
				
				$output .= 'jQuery(document).ready(function($){';
				$output .= '$(\'.' . $section . '\').backstretch(';
				$output .= str_replace('\\','',json_encode($jsarray));
				$output .= ',{duration: ' . $duration . ', fade: ' . $fade . '}';
				$output .= ');';
				$output .= '});';					
					
			}		
			
		}		
		
		return $output;	
		
	}
	
	
	
	
	
	
	
	
	/**
	 *
	 * Method to get section video background
	 *
	 */	
	public static function sectionVideoBg(&$params, $sections = array())
	{
				
		
		$output = '';
		
		// Get images array
		if (!class_exists('Mb2TmplHelper'))
		{
			require_once( MB2_THEME_FRAMEWORK_LIBS . '/helper.php');
		}
		
		
		
		if (!Mb2TmplHelper::isMobile())
		{
		
			foreach ($sections as $section)
			{			
				
				if (Mb2TmplHelper::getTmplParam(str_replace('-', '_', $section) . '_videoid',$params))
				{
					
					$selector_section = $section == 'page' ? 'body-video-bg' : $section;
					$video_container = $section == 'page' ? 'body' : 'self';				
					
					$output .= 'jQuery(document).ready(function($){';
					$output .= '$(\'.' . $selector_section . '\').YTPlayer({';
					$output .= 'videoURL:\'' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $section) . '_videoid', $params) . '\',';
					$output .= 'containment:\'' . $video_container . '\',';
					$output .= 'mute:true,';
					$output .= 'showControls:false,';
					$output .= 'quality:\'' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $section) . '_videoquality', $params,'default').'\',';
					$output .= 'loop:' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $section) . '_videoloop', $params,1) . ',';
					$output .= 'autoPlay:' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $section) . '_videoautoplay', $params,1) . ',';
					$output .= 'showYTLogo:false,';
					$output .= 'stopMovieOnBlur:' . Mb2TmplHelper::getTmplParam(str_replace('-', '_', $section) . '_videostoponblur', $params,1) . '';				
					$output .= '});';
					$output .= '});';
				}		
				
			}	
			
		}
		
		return $output;	
		
	}
	
	
	
	
}