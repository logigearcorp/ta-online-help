<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


function mb2_shortcode_image($atts, $content= null){
		
	
	// Attributes	
	extract(shortcode_atts( array(
		'url'=>'',
		'link'=>'',
		'width'=>'',
		'height'=>'',
		'alt'=>'',
		'align'=>'',
		'class'=>'',
		'crop'=>'0',
		'lightbox'=>'0',
		'video_id'=>''
	), $atts));
	
	
	$app = JFactory::getApplication();
	$output = '';
	$iswidth = '';
	$isheight = '';
	
	
	// Set default width and height when image is cropping 
	// and w and h are ampty
	if ($crop>0)
	{
		$iswidth = empty($width) ? 100 : $width;
		$isheight = empty($height) ? 100 : $height;
	}
	
	
	if(!class_exists('Mb2TmplHelper'))
	{			
		require(JPATH_THEMES . DS . $app->getTemplate() . DS . 'framework' . DS . 'libs' . DS . 'helper.php');	
	}	
				
	$isurl = Mb2TmplHelper::cropImage($url, $crop,  array('w'=>$iswidth, 'h'=>$isheight));	
	
	
	
	$align_cls = $align ? ' align-' . $align : '';	
	
	
	$link_cls = $lightbox == 1 ? ' class="lightbox-link"' : '';
	$link = $lightbox == 1 ? $url : $link;
	
	
	// Get video url
	if ($video_id !='')
	{	
		$video_url = (preg_match('/^[0-9]+$/', $video_id)) ? 
		'http://vimeo.com/' . $video_id : 
		'http://www.youtube.com/watch?v=' . $video_id;		
		$link = $video_url;	
	}
	
	
	$output .= $link !='' ? '<a href="' . $link . '"' . $link_cls . '>' : '';	
	$output .= '<img src="' . $isurl . '" alt="' . $alt . '"';		
	$output .= $width ? ' width="' . $width . '"' : '';		
	$output .= $height ? ' height="' . $height . '"' : '';	
	$output .= $class !='' ? ' class="' . $class . $align_cls . '"' : '';	
	$output .= '>';
	$output .= $link !='' ? '</a>' : '';
			

		
	return $output;
	
	
}

add_shortcode('image', 'mb2_shortcode_image');