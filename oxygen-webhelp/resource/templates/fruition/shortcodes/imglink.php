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
add_shortcode('imglink', 'mb2_shortcode_imglink');


function mb2_shortcode_imglink ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'title'=>'',
		'link'=>'#',
		'target'=>'_self',
		'image'=>''
	), $atts));
	
	$output = '';		
	
	$output .= '<a href="' . $link . '" class="imglink" style="background-image:url(' . JURI::base(true) .  '/' . $image . ');">';
	$output .= '<span class="imglink-inner">';
	$output .= '<span class="imglink-title">' . $title . '</span>';
	$output .= '</span>';
	$output .= '</a>';
	
	
	return $output;		
	
}