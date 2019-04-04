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
add_shortcode('columns_container', 'mb2_shortcode_columns');


function mb2_shortcode_columns ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'width'=>''
	), $atts));	
			
		$iswidth = $width!='' ? ' style="max-width:' . $width . 'px;"' : '';	
			
	return '<div class="columns-container clearfix"' . $iswidth . '><div class="columns-container-inner clearfix">' . do_shortcode($content) . '</div></div>';
	
}




// Columns
add_shortcode('column', 'mb2_shortcode_column');


function mb2_shortcode_column ($atts, $content= null){
	extract(shortcode_atts( array(
		'size' =>'1/2',
		'style'=>'',
		'empty'=>''
	), $atts));	
	
		
	// Calculate column width
	$sizearr = explode('/', $size);
	
	// Get width of one column
	$onecolw = round($sizearr[0]/$sizearr[1], 10);
	
	// Get columns style width
	$col_width = round($onecolw*100, 10);
			
	// Column style
	$cstyle = ' style="width:' . $col_width . '%;'. $style . '"';
	
	// Column class
	$cls = $empty ? ' empty' : '';
	
	$ccontent = $empty ? '&nbsp;' : do_shortcode($content);	
					
	return '<div class="ccol' . $cls . '"' . $cstyle . '>' . $ccontent . '</div>';
	
	
}






// Half columns container
add_shortcode('hcolumns_container', 'mb2_shortcode_hcolumns');


function mb2_shortcode_hcolumns ($atts, $content= null){
	
	extract(shortcode_atts( array(), $atts));	
			
	return '<div class="hcolumns-container clearfix">' . do_shortcode($content) . '</div>';
	
}




// Half columns
add_shortcode('hcolumn', 'mb2_shortcode_hcolumn');


function mb2_shortcode_hcolumn ($atts, $content= null){
	extract(shortcode_atts( array(
		'style'=>'',
		'empty'=>'',
		'color'=>'',
		'class'=>'',
		'img'=>'',
		'padding'=>'90px 50px',
		'min_height'=>300
	), $atts));	
		
			
	// Define column style	
	$isbgimg = $img !='' ? 'background-image:url(' . $img . ');bckground-repeat:no-repeat;background-size:cover;background-position:50% 0;' : '';
	$isbgcolor = $color !='' ? 'background-color:' . $color . ';' : '';
	$ispadding = 'padding:' . $padding . ';';
	
	$cstyle = ' style="width:50%;min-height:' . $min_height . 'px;' . $isbgimg . $isbgcolor . $ispadding . $style . '"';
	
	// Column class
	$cls = $class ? ' ' . $class : '';
	$cls .= $empty ? ' empty' : ' no-empty';
	$cls .= ($color !='' || $img !='') ? ' fheight' : ' no-fheight';
	
	
	$ccontent = $empty ? '&nbsp;' : do_shortcode($content);	
					
	return '<div class="halfcol' . $cls . '"' . $cstyle . '>' . $ccontent . '</div>';
	
	
}








// Half columns
add_shortcode('scolumn', 'mb2_shortcodes_scolumn');


function mb2_shortcodes_scolumn ($atts, $content= null){
	extract(shortcode_atts( array(
		'style'=>'',
		'bg_color'=>'',
		'class'=>'',
		'width'=>'570',
		'position'=>'left',
		'img'=>'',
		'padding'=>'90px 50px'
	), $atts));	
		
			
	// Define column style	
	$isbgimg = $img !='' ? 'background-image:url(' . $img . ');bckground-repeat:no-repeat;background-size:cover;background-position:50% 0;' : '';
	$isbgcolor = $bg_color !='' ? 'background-color:' . $bg_color . ';' : '';
	$ispadding = 'padding:' . $padding . ';';
	
	$cstyle = ' style="width:' . $width . 'px;' . $isbgimg . $isbgcolor . $ispadding . $style . '"';
	
	// Column class
	$cls = $class ? ' ' . $class : '';
	$cls .= ' pos-' . $position;
	
					
	return '<div class="singlecol' . $cls . '"' . $cstyle . '>' . do_shortcode($content) . '</div>';
	
	
}