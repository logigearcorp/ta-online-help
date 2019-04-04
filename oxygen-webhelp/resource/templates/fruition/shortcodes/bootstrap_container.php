<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


function mb2_bootstrap_container($atts, $content= null){
		
	
	// Attributes	
	extract(shortcode_atts( array(
		'fluid'=>1
	), $atts));
	
	
	
	$class = $fluid ? '-fluid' : '';
	
	return '<div class="container' . $class . '">' . do_shortcode($content) . '</div>';
	
	
}

add_shortcode('container', 'mb2_bootstrap_container');