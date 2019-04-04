<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


function mb2_shortcode_gallery($atts, $content= null){
		
	
	// Attributes	
	extract(shortcode_atts( array(
		'folder'=>'',
		'img_width'=>'',
		'img_height'=>'',
		'class'=>'',
		'crop'=>'0',
		'lightbox'=>'0',
		'desc'=> ''
	), $atts));
	
	$uid = uniqid();
	
	$app = JFactory::getApplication();
	$output = '';
	$iswidth = '';
	$isheight = '';
	$gitems = '';
	
	$output .= '<div class="content-gallery clearfix';
	$output .= $class !='' ? ' ' . $class : '';
	$output .= '">';
	
	
	// Get image fro selected folders	
	if ($folder !='')
	{
		
		// Check if selected folder exists
		if (is_dir(JPATH_SITE . '/images/' . $folder))
		{	
			$path = JPATH_SITE . '/images/' . $folder;
			
			//Define filter			
			$filter = '\.png$|\.gif$|\.jpg$|\.bmp$|\.ico$|\.jpeg$|\.psd$|\.eps$';
					
			//Get slider images array		
			$gitems = JFolder::files($path, $filter);
				
		}
		else
		{
			$output .= 'Selected folder does not exists.';	
		}
		
	}
	
	
	
	
	
	
	
	
	// Set default width and height when image is cropping 
	// and w and h are ampty
	if ($crop>0)
	{
		$iswidth = empty($img_width) ? 100 : $img_width;
		$isheight = empty($img_height) ? 100 : $img_height;
	}
	
	
	if(!class_exists('Mb2TmplHelper'))
	{			
		require(JPATH_THEMES . DS . $app->getTemplate() . DS . 'framework' . DS . 'libs' . DS . 'helper.php');	
	}
	
	
	$link_cls = $lightbox == 1 ? ' class="lightbox-link"' : '';
	
	
	
	$desc = explode('|', $desc);
	
	
	
	if (is_array($gitems))
	{		
		
		foreach ($gitems as $key=>$item)
		{
			
			if ($item)
			{
				
				$item_url =  'images/' . $folder . '/' . $item;
				$isurl = Mb2TmplHelper::cropImage($item_url, $crop,  array('w'=>$iswidth, 'h'=>$isheight));			
				
				
				$item_desc = (isset($desc[$key]) && $desc[$key] !='') ? $desc[$key] : '';
				
				$output .= '<a href="' . $item_url . '"' . $link_cls . ' data-lightbox-gallery="' . $uid . '" title="' . $item_desc . '">';	
				$output .= '<img src="' . $isurl . '"';		
				$output .= $img_width ? ' width="' . $img_width . '"' : '';		
				$output .= $img_height ? ' height="' . $img_height . '"' : '';					
				$output .= '>';
				$output .= '</a>';	
			}
			
		}		
			
	}
	
	
	
	
	$output .= '</div>';
	
			

		
	return $output;
	
	
}

add_shortcode('gallery', 'mb2_shortcode_gallery');