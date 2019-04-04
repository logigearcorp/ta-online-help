<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


function mb2_shortcode_video($atts, $content= null){
		
	
	// Attributes	
	extract(shortcode_atts( array(
		'width'=>'',
		'id'=>'',
		'ratio'=>'16:9',
		'lightbox'=>0
	), $atts));
	
	
	$output = '';
	
	
	
	
	if ($lightbox == 1)
	{
		
		// Get video url
		
		$video_url = (preg_match('/^[0-9]+$/', $id)) ? 'http://vimeo.com/' . $id : 'http://www.youtube.com/watch?v=' . $id;		
			
		$output .= '<a href="' . $video_url . '" class="video-link lightbox-link">';
		$output .= '<i class="pe-7s-play"></i>';
		$output .= '</a>';
		
	}
	else
	{
		// Get video url
		if(preg_match('/^[0-9]+$/', $id)){			
			$video_url = '//player.vimeo.com/video/'. $id;			
		}
		else{
			$video_url = '//www.youtube.com/embed/'. $id;		
		}
		
		
		
		
		/*$link_cls = $lightbox == 1 ? ' class="lightbox-link"' : '';
		$link = $lightbox == 1 ? $url : $link;
		
		
		// Get video url
		if ($video_id !='')
		{	
			$video_url = (preg_match('/^[0-9]+$/', $video_id)) ? 
			'http://vimeo.com/' . $video_id : 
			'http://www.youtube.com/watch?v=' . $video_id;		
			$link = $video_url;	
		}*/
		
		
		
		
		
		$isratio = str_replace(':', 'by', $ratio);
		
		$iswidth = $width !='' ? ' style="max-width:' . $width . 'px;"' : '';
		
		$output .= '<div class="embed-responsive-wrap"' . $iswidth . '>';
		$output .= '<div class="embed-responsive embed-responsive-'. $isratio . '">';
		$output .= '<iframe src="' . $video_url . '"></iframe>';
		$output .= '</div>';
		$output .= '</div>';
	}
	
	
	
	
	
	
		
	return $output;
	
	
}

add_shortcode('video', 'mb2_shortcode_video');








