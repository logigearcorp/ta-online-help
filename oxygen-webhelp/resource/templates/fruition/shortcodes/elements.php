<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;




// Gap
add_shortcode('gap_5', 'mb2_shortcode_gap_5');
add_shortcode('gap_10', 'mb2_shortcode_gap_10');
add_shortcode('gap_20', 'mb2_shortcode_gap_20');
add_shortcode('gap_30', 'mb2_shortcode_gap_30');
add_shortcode('gap_40', 'mb2_shortcode_gap_40');
add_shortcode('gap_50', 'mb2_shortcode_gap_50');
add_shortcode('gap_60', 'mb2_shortcode_gap_60');
add_shortcode('gap_70', 'mb2_shortcode_gap_70');
add_shortcode('gap_80', 'mb2_shortcode_gap_80');
add_shortcode('gap_90', 'mb2_shortcode_gap_90');
add_shortcode('gap_100', 'mb2_shortcode_gap_100');


function mb2_shortcode_gap_5 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'smallscreen' => 1,
		'custom_height' => ''
	), $atts));
	
	$cls = $smallscreen == 0 ? ' no-smallscreen' : '';
	$style = $custom_height !='' ? ' style="height:' . $custom_height . 'px;"' : '';
		
	return '<div class="gap-5 clearfix' . $cls . '"' . $style . '></div>';
	
}


function mb2_shortcode_gap_10 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'smallscreen' => 1,
		'custom_height' => ''
	), $atts));
	
	$cls = $smallscreen == 0 ? ' no-smallscreen' : '';
	$style = $custom_height !='' ? ' style="height:' . $custom_height . 'px;"' : '';
	
	return '<div class="gap-10 clearfix' . $cls . '"' . $style . '></div>';
	
}


function mb2_shortcode_gap_20 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'smallscreen' => 1,
		'custom_height' => ''
	), $atts));
	
	$cls = $smallscreen == 0 ? ' no-smallscreen' : '';
	$style = $custom_height !='' ? ' style="height:' . $custom_height . 'px;"' : '';
	
	return '<div class="gap-20 clearfix' . $cls . '"' . $style . '></div>';
	
}


function mb2_shortcode_gap_30 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'smallscreen' => 1,
		'custom_height' => ''
	), $atts));
	
	$cls = $smallscreen == 0 ? ' no-smallscreen' : '';
	$style = $custom_height !='' ? ' style="height:' . $custom_height . 'px;"' : '';
	
	return '<div class="gap-30 clearfix' . $cls . '"' . $style . '></div>';
	
}


function mb2_shortcode_gap_40 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'smallscreen' => 1,
		'custom_height' => ''
	), $atts));
	
	$cls = $smallscreen == 0 ? ' no-smallscreen' : '';
	$style = $custom_height !='' ? ' style="height:' . $custom_height . 'px;"' : '';
	
	return '<div class="gap-40 clearfix' . $cls . '"' . $style . '></div>';
	
}

function mb2_shortcode_gap_50 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'smallscreen' => 1,
		'custom_height' => ''
	), $atts));
	
	$cls = $smallscreen == 0 ? ' no-smallscreen' : '';
	$style = $custom_height !='' ? ' style="height:' . $custom_height . 'px;"' : '';
	
	return '<div class="gap-50 clearfix' . $cls . '"' . $style . '></div>';
	
}


function mb2_shortcode_gap_60 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'smallscreen' => 1,
		'custom_height' => ''
	), $atts));
	
	$cls = $smallscreen == 0 ? ' no-smallscreen' : '';
	$style = $custom_height !='' ? ' style="height:' . $custom_height . 'px;"' : '';
	
	return '<div class="gap-60 clearfix' . $cls . '"' . $style . '></div>';
	
}


function mb2_shortcode_gap_70 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'smallscreen' => 1,
		'custom_height' => ''
	), $atts));
	
	$cls = $smallscreen == 0 ? ' no-smallscreen' : '';
	$style = $custom_height !='' ? ' style="height:' . $custom_height . 'px;"' : '';
	
	return '<div class="gap-70 clearfix' . $cls . '"' . $style . '></div>';
	
}



function mb2_shortcode_gap_80 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'smallscreen' => 1,
		'custom_height' => ''
	), $atts));
	
	$cls = $smallscreen == 0 ? ' no-smallscreen' : '';
	$style = $custom_height !='' ? ' style="height:' . $custom_height . 'px;"' : '';
	
	return '<div class="gap-80 clearfix' . $cls . '"' . $style . '></div>';
	
}



function mb2_shortcode_gap_90 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'smallscreen' => 1,
		'custom_height' => ''
	), $atts));
	
	$cls = $smallscreen == 0 ? ' no-smallscreen' : '';
	$style = $custom_height !='' ? ' style="height:' . $custom_height . 'px;"' : '';
	
	return '<div class="gap-90 clearfix' . $cls . '"' . $style . '></div>';
	
}



function mb2_shortcode_gap_100 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'smallscreen' => 1,
		'custom_height' => ''
	), $atts));
	
	$cls = $smallscreen == 0 ? ' no-smallscreen' : '';
	$style = $custom_height !='' ? ' style="height:' . $custom_height . 'px;"' : '';
	
	return '<div class="gap-100 clearfix' . $cls . '"' . $style . '></div>';
	
}









// Hovizontal separator
add_shortcode('separator', 'mb2_shortcode_separator');


function mb2_shortcode_separator ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'type' =>'|',
		'space'=> '5',
		'style'=> ''
	), $atts));
	
	
	$sep_type = $type ? $type : '';
	
	return '<span class="content-separator" style="padding-left:' . $space . 'px;padding-right:' . $space . 'px;' . $style . '">' . $sep_type . '</span>';
	
}




add_shortcode('clear', 'mb2_shortcode_clear');


function mb2_shortcode_clear ($atts, $content= null){
	
	return '<div class="clearfix"></div>';
	
}








// Border horizontal
add_shortcode('border', 'mb2_shortcode_border');


function mb2_shortcode_border ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'color' =>'',
		'class' =>'',
		'custom_color'=>'',
		'size'=>1
	), $atts));
		
	
	$border_style = ' style="';
	$border_style .= $custom_color != '' ? 'border-color:' . $custom_color  . ';' : '';
	$border_style .= $size > 1 ? 'border-width:' . $size  . 'px;' : '';
	$border_style .= '"';
	$color_cls = $color ? ' ' . $color : '';
	$color_cls .= $class ? ' ' . $class : '';
	
	return '<div class="border-hor' . $color_cls . '"' . $border_style . '></div>';
	
}




// Block element
add_shortcode('block', 'mb2_shortcode_block');

function mb2_shortcode_block ($atts, $content= null){
	
	extract(shortcode_atts( array('style'=>''), $atts));		
		
	$style = $style!='' ? ' style="' . $style . '"' : '';	
		
	return '<span class="block"' . $style . '>' . do_shortcode($content) . '</span>';
	
}




// Strong element
add_shortcode('strong', 'mb2_shortcode_strong');

function mb2_shortcode_strong ($atts, $content= null){
	
	extract(shortcode_atts( array(), $atts));		
		
	return '<span class="strong">' . do_shortcode($content) . '</span>';
	
}



// Strong element
add_shortcode('italic', 'mb2_shortcode_italic');

function mb2_shortcode_italic ($atts, $content= null){
	
	extract(shortcode_atts( array(), $atts));		
		
	return '<span style="font-style:italic;">' . do_shortcode($content) . '</span>';
	
}