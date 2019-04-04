<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 


defined('_JEXEC') or die;

function mb2_shortcode_tabs($atts, $content = null ) {
	$unique = mt_rand();
	
	extract( shortcode_atts( array(
		  'direction' => 'top',
		  'height'=>'200'
		  ), $atts ) );
	
	$regex = '\\[(\\[?)(tab)\\b([^\\]\\/]*(?:\\/(?!\\])[^\\]\\/]*)*?)(?:(\\/)\\]|\\](?:([^\\[]*+(?:\\[(?!\\/\\2\\])[^\\[]*+)*+)\\[\\/\\2\\])?)(\\]?)';
	preg_match_all("/$regex/is",$content,$match);
	
	
	
	$content = $match[0];
	
	$height !='' && $direction !='' ? $height = ' style="min-height:'.$height.'px;"' : $height ='';
	
	$output = '<div class="tabs '.$direction.'"'.$height.'>';
	$i = -1;
	
	$output .= '<ul class="nav nav-tabs">';
	
	foreach($content as $c){ $i++;
		$unique_id = 'tab_tab_'.$unique.'_'.$i;
		preg_match('/\[tab ([^\\]\\/]*(?:\\/(?!\\])[^\\]\\/]*)*?)/',$c,$matchattr);
		$attr = shortcode_parse_atts($matchattr[1]);
		
		
		$title = $attr['title'];
		$title_arr = explode('|',$title);
				
		if(isset($title_arr[1])){
			
			// Check what is the icon and set prefix
			// and set preffix
			$isfa = preg_match('@fa-@', $title_arr[1]);
			$isglyphicon = preg_match('@glyphicon-@', $title_arr[1]);
			
			if ($isfa)
			{
				$iconpref = 'fa ';
			}
			elseif($isglyphicon)
			{
				$iconpref = 'glyphicon ';
			}
			else
			{
				$iconpref = '';
			}		
			
			$title = '<i class="'. $iconpref . $title_arr[1] . '"></i> ' . $title_arr[0];
						
		}
		
		$output .= '<li '.(($i==0) ? 'class="active"' : '').'><a href="#'.$unique_id.'" data-toggle="tab">'.$title.'</a></li>';
		$content[$i] = str_replace('[tab ','[tab '.(($i==0) ? 'class="active"' : '').' id="'.$unique_id.'" ',$content[$i]);
	}
	
	$output .= '</ul>';
	$output .= '<div class="tab-content">';
	
	foreach($content as $c){
		$output .= do_shortcode($c);
	}
	
	$output .= '</div>';
	$output .= '</div>';
	
	
	return $output;
	   
	   
	   
	   
}
add_shortcode('tabs', 'mb2_shortcode_tabs');




function mb2_shortcode_tab( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => '',
		'id' =>'',
		'class' =>''
	), $atts ) );
		  
	
	$output = '<div class="tab-pane '.$class.'" id="'.$id.'">';
	
	$output .= do_shortcode($content);
	
	$output .= '</div>';
	
	return $output;
}
add_shortcode('tab', 'mb2_shortcode_tab');