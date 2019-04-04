<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


function mb2_shortcode_message($atts, $content= null){
	extract(shortcode_atts( array(
		'type' => 'info',
		'close' => 1
	), $atts));	
	
	
	$mcls = $close ? ' alert-dismissible' : '';
	
	$cbutton = $close ? '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' : '';
	
		
	return '<div class="alert alert-' . $type . $mcls . '">' . $cbutton . do_shortcode($content) .'</div>'; 
	
	
	
	
}
add_shortcode('message', 'mb2_shortcode_message');