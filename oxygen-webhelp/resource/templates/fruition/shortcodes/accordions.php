<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;


function mb2_shortcode_accordion($atts, $content= null){	
	extract(shortcode_atts( array(
		'show_all' => '0',
		'active' => '1',
		'parent' => '1'				
		), $atts)
	);
	
	
	if(isset($GLOBALS['collapse_count'])){
      $GLOBALS['collapse_count']++;
	}else{
      $GLOBALS['collapse_count'] = 0;
	}
	
	$uniqid = uniqid();
	
	$GLOBALS['uniqid'] = $uniqid;
	
	$GLOBALS['parent'] = $parent;
	
	$active_cls = $active == 1 ? ' is-active' : ' no-active'; 
				 
	
	$output = '';
		
	$output .= '<div class="id'.$GLOBALS['uniqid'].' accordion' . $active_cls . ' panel-group" data-id="id' . $GLOBALS['uniqid'] . '"';
	
	if($show_all !=1){
		$output .= ' id="mb2-collapse-' . $GLOBALS['collapse_count'] . '"';
	}
	
	$output .= '>' . do_shortcode($content) . '</div>';
		
	return $output;	
}

add_shortcode('accordion', 'mb2_shortcode_accordion');







function mb2_shortcode_toggle($atts, $content= null){
	extract(shortcode_atts( array(
		'title' => '',
		'open' => ''	
		), $atts)
	);
	
		
		
	//get collapse id
	$col_id = 'collapse'.uniqid();
		
	//get active class
	$in = '';		
	if($open == 1){
		$in = ' in';
	}		
	
	$output = '';
	
	$cls = $open == 1 ? '' : 'collapsed';
	
	$is_icon = ' no-icon';
	
	//get accordion title
	$title_arr = explode('|', $title);
	
	
	// Check if in title is an icon
	if(isset($title_arr[1])){	
		
		// Check what is the icon and set prefix
		// and set preffix
		$isfa = preg_match('@fa-@',$title_arr[1]);
		$iglyphicon = preg_match('@glyphicon-@',$title_arr[1]);
				
		if ($isfa)
		{
			$iconpref = 'fa ';
		}
		elseif ($iglyphicon)
		{
			$iconpref = 'glyphicon ';
		}
		else
		{			
			$iconpref = '';
		}
		
		
		$is_icon = ' is-icon';	
		$title_arr = explode('|',$title);			
		$title = '<i class="' . $iconpref . $title_arr[1] . '"></i> ' . $title_arr[0];
		
	}
	
	$collapse_count = isset($GLOBALS['collapse_count']) ? $GLOBALS['collapse_count'] : '';
	$parent = isset($GLOBALS['parent']) ? $GLOBALS['parent'] : 1;
	$isparent = $parent ? ' data-parent="#mb2-collapse-' . $collapse_count . '"' : '';			
	
	$output .= '<div class="panel panel-default"><div class="panel-heading' . $is_icon . '">';		
	
	$output .= '<p class="panel-title"><a data-toggle="collapse"' . $isparent . ' href="#' . $col_id . '" class="' . $cls . '">' . $title . '</a></p></div>';		
	
	$output .= '<div id="' . $col_id .'" class="panel-collapse collapse' . $in . '"><div class="panel-body">'; 
	
	$output .= do_shortcode($content);		
	
	$output .= '</div></div></div>';
	
		
	return $output;				
}

add_shortcode('toggle', 'mb2_shortcode_toggle');