<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;




// Columns container
add_shortcode('list', 'mb2_shortcode_list');


function mb2_shortcode_list ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'type' => '1',
		'horizontal'=> 0,
		'align'=>'left'
	), $atts));	
	
	
	// Define list class
	$cls = $horizontal == 1 ? ' list-horizontal' : '';
	$cls .= ' list-' . $align;
	
	$output = '';		
	$output .= '<ul class="list list' . $type . $cls . '">';	
	$output .= do_shortcode($content);	
	$output .= '</ul>';	
	
	return $output;	
}




// Columns container
add_shortcode('li', 'mb2_shortcode_list_item');


function mb2_shortcode_list_item ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'icon' => '',
		'link'=> '',
		'target'=> '_self'		
	), $atts));	
		
	
	// Defien icon prefix
	if ($icon!='')
	{
		$isfa = preg_match('@fa-@',$icon);
		$isglyphicon = preg_match('@glyphicon-@',$icon);
		
		if ($isfa)
		{
			$pref = 'fa ';
		}
		elseif ($isglyphicon)
		{
			$pref = 'glyphicon ';
		}
		else
		{
			$pref = '';	
		}
		
	}
	
		
	$isicon = $icon ? '<i class="' . $pref . $icon . '"></i> ' : '';	
		
	$output = '';	
	
	$output .= '<li>';	
	$output .= $link !='' ? '<a href="' . $link . '" target="' . $target . '">' : '';	
	$output .= $isicon;	
	$output .= do_shortcode($content);	
	$output .= $link !='' ? '</a>' : '';	
	$output .= '</li>';
	
	
	return $output;
	
	
}