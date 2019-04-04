<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;




add_shortcode('icon', 'mb2_shortcode_icon');

function mb2_shortcode_icon($atts, $content= null){
	extract(shortcode_atts( array(
		'name' => 'fa-star',
		'color' => '',
		'size' => 'default',
		'spin'=>0,
		'rotate'=>'normal'
	), $atts));
	
		
	// Check waht is the icon
	$isfa = preg_match('@fa-@',$name);
	$isglyphicon = preg_match('@glyphicon-@',$name);
	$is7stroke = preg_match('@pe-7s-@',$name);	
	$cls = '';
	
	if ($isfa)
	{
		$cls = 'fa ';
	}
	elseif ($isglyphicon)
	{
		$cls = 'glyphicon ';
	}	
	
	$cls .= (($isfa || $is7stroke) && $spin == 1) ? $is7stroke ? ' pe-spin' : ' fa-spin' : '';
	$cls .= (($isfa || $is7stroke) && $rotate != 'normal') ? $is7stroke ? ' pe-' . $rotate : ' fa-' . $rotate : '';
	$cls .= ' ' . $name;
	$cls .= ' icon-size-' . $size;	
	
	
	// Set icon style
	$style = $color !='' ? ' style="color:' . $color . ';"' : '';
	
	
	return '<i class="tmpl-icon ' . $cls . '"' . $style . '></i>';	
	
	
}