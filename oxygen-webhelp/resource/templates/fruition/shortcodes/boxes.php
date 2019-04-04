<?php
/**
 * @package		Balance Template
 * @version		1.0.0
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;


// Default icon box
add_shortcode('box', 'mb2_shortcode_box');


function mb2_shortcode_box ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'type' =>'1',
		'title'=>'',
		'titletag'=>'h4',
		'icon'=>'',
		'class'=> '',
		'color'=> '',
		'border'=>0,
		'image'=>'',
		'link'=>'',
		'link_target'=>'_self'
	), $atts));
	
	
	// Chec what is the type of the icon
	$isfaicon = preg_match('@fa-@',$icon);
	$iglyphicon = preg_match('@glyphicon-@',$icon);	
	
	if ($isfaicon)
	{
		$icon_pref = 'fa ';
	}
	elseif ($iglyphicon)
	{
		$icon_pref = 'glyphicon ';
	}
	else
	{
		$icon_pref = '';
	}		
	
	
	$output = '';
	$box_cls = '';	
	
	
	// Change type and remove icon if is image
	if ($image !='')
	{
		$type = '-image';
		$icon = '';
	}	
		
	$box_cls .= 'box' . $type;
	$box_cls .= $color ? ' box-color ' . $color : '';
	$box_cls .= $border == 1 ? ' box-border' : '';
	$box_cls .= $class ? ' ' . $class : '';
	
	
	$istitle = $link!='' ? '<a href="' . $link . '" target="' . $link_target . '">' . $title . '</a>' : '';
	
	
	$output .= '<div class="box ' . $box_cls . '">';	
	$output .= '<div class="box-inner">';
	$output .= $type == 2 ? '<div class="box-header">' : '';
	$output .= $icon !='' ? '<span class="box-icon"><i class="' . $icon_pref . $icon .'"></i></span>' : '';
	$output .= $title !='' ? '<' . $titletag . ' class="box-title">' . $istitle . '</' . $titletag . '>' : '';
	$output .= $type == 2 ? '</div>' : '';	
	$output .= do_shortcode($content);	
	$output .= '</div>';
	$output .= $image !='' ? '<div class="box-image-bg" style="background-image:url(' . JURI::base(true) .  '/' . $image . ');"></div>' : '';	
	$output .= '</div>';
	
	
	return $output;
		
	
}