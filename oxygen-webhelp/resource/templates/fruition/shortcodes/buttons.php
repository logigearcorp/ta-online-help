<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


add_shortcode('button', 'mb2_shortcode_button');

function mb2_shortcode_button($atts, $content= null){
	
	extract(shortcode_atts( array(
		'type' => 'default',
		'white' => '',
		'size' => '',
		'link' => '#',
		'target' => '',
		'icon'=> '',
		'icon_size'=> '18',
		'icon_pos'=> 'before',
		'ttpos'=>'top',
		'title'=> '',
		'fw' => 0,
		'rounded'=>0,
		'class'=>'',
		'margin'=>''
	), $atts));	
	
	$output = '';
	
	// Define some button parameters	
	$iconname = $icon;	
	
	
	
	// Button icon
	$btnicon = '';
	
	if ($icon !='')	
	{			
		// Check what is the icon and set prefix
		// and set preffix
		$isfa = preg_match('@fa-@',$icon);
		$isglyphicon = preg_match('@glyphicon-@',$icon);
		
		
		if ($isfa)
		{
			$iconpref = 'fa ';
		}
		elseif($isglyphicon)
		{
			$iconpref = 'glyphicon ';
		}
		else
		{
			$iconpref = '';
		}		
		
		$btnicon = '<i class="' . $iconpref . $iconname . '" style="font-size:' . $icon_size . 'px;"></i>';		
	}
	
	
	$btntitle = $title ? ' title="' . $title . '"' : '';
	
	
	$btntext = '<span class="btn-text">' . $content . '</span>';
		
	
	// Define button css class
	$btncls = $type;
	$btncls .= $size ? ' btn-' . $size : '';
	//$btncls .= ($tt == 1 && $title !='') ? ' tmpl-tooltip' : '';
	$btncls .= $title !='' ? ' tmpl-tooltip' : '';
	$btncls .= $icon_pos === 'before' ? ' btn-icon-before' : ' btn-icon-after';
	$btncls .= $rounded == 1 ? ' rounded' : '';
	$btncls .= $fw == 1 ? ' btn-full' : '';
	$btncls .= $class !='' ? ' ' . $class : '';
	
	
	// Button style
	$style = $margin !='' ? ' style="margin:' . $margin . '"' : '';
	
	
	// Define button data attribute
	//$btndata = ($tt == 1 && $title !='') ? ' data-placement="' . $ttpos . '"' : '';
	$btndata = $title !='' ? ' data-placement="' . $ttpos . '"' : '';
	
	$output .= '<a href="' . $link . '" target="' . $target . '" class="btn btn-' . $btncls . '"' . $style . $btntitle . $btndata . '>';
	$output .= $icon_pos == 'before' ? $btnicon . $btntext : $btntext . $btnicon;
	$output .= '</a>';	
	
	return $output;
	
}







add_shortcode('big_link', 'mb2_shortcode_big_link');

function mb2_shortcode_big_link($atts, $content= null){
	
	$output = '';
	extract(shortcode_atts( array(
		'link' => '#',
		'target' => '_self'
	), $atts));	
	
	
	$output .= '<a href="' . $link . '" target="' . $target . '" class="big-link">';
	$output .= do_shortcode($content);
	$output .= '</a>';	
	
	return $output;
	
}






add_shortcode('arrow_link', 'mb2_shortcode_arrow_link');

function mb2_shortcode_arrow_link($atts, $content= null){
	
	$output = '';
	extract(shortcode_atts( array(
		'link' => '#',
		'target' => '_self',
		'type'=>1
	), $atts));	
	
	
	if ($type == 2)
	{
		$iname = 'angle-double-right';
	}
	elseif ($type == 3)
	{
		$iname = 'arrow-right';
	}
	else
	{
		$iname = 'angle-right';	
	}
	
	
	$output .= '<a href="' . $link . '" target="' . $target . '" class="arrow-link">';
	$output .= '<i class="fa fa-' . $iname . '"></i>';
	$output .= '</a>';	
	
	return $output;
	
}