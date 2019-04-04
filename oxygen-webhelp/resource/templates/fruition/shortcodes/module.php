<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;



add_shortcode('module', 'mb2_shortcode_module');


function mb2_shortcode_module ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'name' => '',
		'style' => '',
	), $atts));	
		
	
				
	return '{loadmodule ' . $name . '}';	
	
	
}






add_shortcode('module_position', 'mb2_shortcode_module_position');


function mb2_shortcode_module_position ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'name' => '',
		'style' => '',
	), $atts));	
		
	
				
	return '{loadposition ' . $name . '}';	
	
	
}