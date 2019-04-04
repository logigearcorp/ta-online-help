<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;




add_shortcode('text', 'mb2_shortcode_text');


function mb2_shortcode_text ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'tag'=> 'p',
		'align' =>'left',
		//'subtext' =>'',
		'size'=> 'default',
		'style'=> ''		
	), $atts));
	
	
	$output = '';
	
	$cssstyle = $style !='' ? ' style="' . $style . '"' : '';
			
	$output .= '<' . $tag . $cssstyle . ' class="text ' . $size . ' ' . $align . '">';
	$output .= do_shortcode($content);		
	$output .= '</' . $tag . '>';
	
	
	return $output;
	
	
}






add_shortcode('title', 'mb2_shortcode_title');


function mb2_shortcode_title ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'tag'=> 'h4',
		'align' =>'left',
		'subtext' =>'',
		'size' => '',
		'style'=> ''		
	), $atts));
	
	
	$output = '';
	
	$cssstyle = $style !='' ? ' style="' . $style . '"' : '';
			
	$output .= '<div class="tmpl-title title-' . $align . ' title-' . $size . '">';		
	//$output .= $subtext ? '<span class="ttitle-subtext">' . $subtext . '</span>' : '';
	$output .= '<' . $tag . $cssstyle . ' class="title">';
	$output .= do_shortcode($content);		
	$output .= '</' . $tag . '>';
	$output .= $subtext ? '<span class="title-subtext">' . $subtext . '</span>' : '';		
	$output .= '</div>';
	
	
	return $output;
	
	
}

add_shortcode('title2', 'mb2_shortcode_title2');


function mb2_shortcode_title2 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'tag'=> 'h4',
		'align' =>'left',
		'subtext' =>'',
		'style'=> '',
		'size'=>''		
	), $atts));
	
	
	$output = '';
		
	$cssstyle = $style !='' ? ' style="' . $style . '"' : '';
			
	$output .= '<div class="title big-title2 title-' . $align . ' ' . $size . '">';	
	//$output .= $subtext ? '<span class="ttitle-subtitle">' . $subtext . '</span>' : '';	
	$output .= '<' . $tag . $cssstyle . ' class="title">';
	$output .= do_shortcode($content);		
	$output .= '</' . $tag . '>';
	$output .= $subtext ? '<span class="ttitle-subtext">' . $subtext . '</span>' : '';	
	$output .= '</div>';
	
	
	return $output;
	
	
}



add_shortcode('link', 'mb2_shortcode_link');


function mb2_shortcode_link ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'url'=> '#',
		'target' =>'_self',
		'text' =>'',
		'border' =>0,
		'arrow'=>0			
	), $atts));
	
	
	$output = '';
	
	$cls = $border == 1 ? ' border-link' : '';
	$cls .= $arrow == 1 ? ' arrow' : '';
	
	$output .= '<a class="tmpl-link' . $cls . '" href="' . $url . '" target="' . $target . '"><span>' . $text . '</span></a>';
	
	return $output;
	
	
}



// Lead text
add_shortcode('leading_text', 'mb2_shortcode_leading_text');

function mb2_shortcode_leading_text ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'style' =>''
	), $atts));
	
	
	$is_style = $style!='' ? ' style="' . $style . '"' : '';
	
	return '<p class="leading-text"' . $is_style . '>' . do_shortcode($content) . '</p>';
	
}




add_shortcode('h1', 'mb2_shortcode_h1');

function mb2_shortcode_h1 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'font_size' =>''
	), $atts));
	
	$style = $font_size !='' ? ' style="font-size:' . $font_size . 'px;"' : '';
	
	$output = '<h1' . $style . '>' . do_shortcode($content) . '</h1>';

	return $output;
}

add_shortcode('h2', 'mb2_shortcode_h2');

function mb2_shortcode_h2 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'font_size' =>''
	), $atts));
	
	$style = $font_size !='' ? ' style="font-size:' . $font_size . 'px;"' : '';
	
	$output = '<h2' . $style . '>' . do_shortcode($content) . '</h2>';

	return $output;
}


add_shortcode('h3', 'mb2_shortcode_h3');

function mb2_shortcode_h3 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'font_size' =>''
	), $atts));
	
	$style = $font_size !='' ? ' style="font-size:' . $font_size . 'px;"' : '';
	
	$output = '<h3' . $style . '>' . do_shortcode($content) . '</h3>';

	return $output;
}


add_shortcode('h4', 'mb2_shortcode_h4');

function mb2_shortcode_h4 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'font_size' =>''
	), $atts));
	
	$style = $font_size !='' ? ' style="font-size:' . $font_size . 'px;"' : '';
	
	$output = '<h4' . $style . '>' . do_shortcode($content) . '</h4>';

	return $output;
}


add_shortcode('h5', 'mb2_shortcode_h5');

function mb2_shortcode_h5 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'font_size' =>''
	), $atts));
	
	$style = $font_size !='' ? ' style="font-size:' . $font_size . 'px;"' : '';
	
	$output = '<h5' . $style . '>' . do_shortcode($content) . '</h5>';

	return $output;
}


add_shortcode('h6', 'mb2_shortcode_h6');

function mb2_shortcode_h6 ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'font_size' =>''
	), $atts));
	
	$style = $font_size !='' ? ' style="font-size:' . $font_size . 'px;"' : '';
	
	$output = '<h6' . $style . '>' . do_shortcode($content) . '</h6>';

	return $output;
}




add_shortcode('dropcap', 'mb2_shortcode_dropcap');

function mb2_shortcode_dropcap($atts, $content= null){
	extract(shortcode_atts( array(
		'value' => 'A',
		'type' => '1'
	), $atts));	
	return '<span class="dropcap dropcap'.$type.'">' . $value . '</span>';
}
add_shortcode('dropcap', 'mb2_shortcode_dropcap');




function mb2_shortcode_highlight($atts, $content= null){
	extract(shortcode_atts( array(
		'type' => '1'
	), $atts));
	
	
	return '<span class="highlight highlight' . $type  . '">' . do_shortcode($content) . '</span>'; 

}

add_shortcode('highlight', 'mb2_shortcode_highlight');





function mb2_shortcode_center($atts, $content= null){	
	
	return '<div style="text-align:center;">' . do_shortcode($content) . '</div>'; 

}

add_shortcode('center', 'mb2_shortcode_center');




function mb2_shortcode_right($atts, $content= null){	
	
	return '<div class="align-right">' . do_shortcode($content) . '</div>'; 

}

add_shortcode('right', 'mb2_shortcode_right');




function mb2_shortcode_color($atts, $content= null){	
	
	extract(shortcode_atts( array(
		'custom_color' =>''
	), $atts));
	
	$style = $custom_color!='' ? ' style="color:' . $custom_color . ';"' : '';
	
	return '<span class="tmpl-color"' . $style . '>' . do_shortcode($content) . '</span>'; 

}

add_shortcode('color', 'mb2_shortcode_color');



add_shortcode('handwrite', 'mb2_handwrite');

function mb2_handwrite ($atts, $content= null){
	
	extract(shortcode_atts( array(
		'font_size' =>''
	), $atts));
	
	$style = $font_size !='' ? ' style="font-size:' . $font_size . 'px;"' : '';
	
	$output = '<span class="handwrite"' . $style . '>' . do_shortcode($content) . '</span>';

	return $output;	
}





add_shortcode('quote', 'mb2_quote');

function mb2_quote ($atts, $content= null){
	
	extract(shortcode_atts( array(), $atts));
		
	$output = '<span class="quote">' . do_shortcode($content) . '</span>';

	return $output;
}

