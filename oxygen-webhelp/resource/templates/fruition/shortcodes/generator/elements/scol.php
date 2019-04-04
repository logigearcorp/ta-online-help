<?php
/**
 * @package		Balance Template
 * @version		1.0.1
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;
 
?>
<div class="mb2shortcodes-item mb2shortcodes-item-scol">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
			
        $("#mb2shortcodes-scol-submit").click(function(){
            
			var scolWidth = $("#mb2shortcodes-scol-form").serializeArray()[0].value; 
			var scolPosition = $("#mb2shortcodes-scol-form").serializeArray()[1].value;
			var scolPadding = $("#mb2shortcodes-scol-form").serializeArray()[2].value; 
			var scolBgColor = $("#mb2shortcodes-scol-form").serializeArray()[3].value;
			var scolBgImg = $("#mb2shortcodes-scol-form").serializeArray()[4].value; 
					
			$("#mb2shortcodes-result").html('[columns_container][scolumn width="'+scolWidth+'" position="'+ scolPosition +'" padding="'+scolPadding+'" bg_color="'+scolBgColor+'" img="'+scolBgImg+'"]Single column text here...[/scolumn][/columns_container]');
			
			      
        });	
		
		
		$('#scol_bg_color').spectrum({
			showInput: true,
			preferredFormat: 'rgb',
			allowEmpty: true,
			color: '',
			showAlpha: true
		});
		
        
    });
    </script>
    <h3>Single Column</h3>
    <span class="mb2shortcodes-desc">Use this shortcode to display single column text aligned to left or roght side.</span> 
    <form id="mb2shortcodes-scol-form" class="mb2shortcodes-form form-horizontal" action="index.html"> 
        <div class="control-group">
            <div class="control-label"><label for="width">Width (px)</label></div>
          	<div class="controls"><input type="text" name="width" id="width" value="570"/></div>
        </div>        
        <div class="control-group">
        	<div class="control-label"><label for="scol_layout">Columns</label></div>
        	<div class="controls">
            	<select name="scol_align" id="scol_align">
                	<option value="left">Left</option>
                    <option value="right">Right</option>
            	</select>
            </div>
        </div>
        <div class="control-group">
            <div class="control-label"><label for="padding">Padding (top right bottom left)</label></div>
          	<div class="controls"><input type="text" name="padding" id="padding" value="90px 50px 90px 50px"/></div>
        </div> 
        <div class="control-group">
            <div class="control-label"><label for="scol_bg_color">Background Color</label></div>
          	<div class="controls"><input type="text" name="scol_bg_color" id="scol_bg_color" class="mb2shortcodes-color" /></div>
        </div>
        <div class="control-group">
            <div class="control-label"><label for="scol_bg_img">Background Image</label></div>
          	<div class="controls"><input type="text" name="scol_bg_img" id="scol_bg_img" value=""/></div>
        </div>  
        <input class="btn btn-primary" id="mb2shortcodes-scol-submit" type="button" value="Generate">      
    </form>
</div>