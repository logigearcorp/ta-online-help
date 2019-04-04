<?php
/**
 * @package		Balance Template
 * @version		1.0.0
 * @author		Mariusz Boloz (http://marbol2.com)
 * @copyright	Copyright (C) 2016 Mariusz Boloz (http://marbol2.com). All rights reserved
 * @license		Commercial (http://themeforest.net/licenses)
**/ 

defined('_JEXEC') or die;
 
?>
<div class="mb2shortcodes-item mb2shortcodes-item-box">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
		
        $("#mb2shortcodes-box-submit").click(function(){
                    
            var boxType = $("#mb2shortcodes-box-form").serializeArray()[0].value;	
			var boxColor = $("#mb2shortcodes-box-form").serializeArray()[1].value !='' ?
			' color="'+$("#mb2shortcodes-box-form").serializeArray()[1].value+'"' : '';
			var boxBorder = $("#mb2shortcodes-box-form").serializeArray()[2].value == 1 ?
			' border="'+$("#mb2shortcodes-box-form").serializeArray()[2].value+'"' : '';
			var boxIcon = $("#mb2shortcodes-box-form").serializeArray()[3].value !='' ?
			' icon="'+$("#mb2shortcodes-box-form").serializeArray()[3].value+'"': '';	
			var boxTitle = $("#mb2shortcodes-box-form").serializeArray()[4].value !='' ?
			' title="'+$("#mb2shortcodes-box-form").serializeArray()[4].value+'"': '';		
            var boxContent = $("#mb2shortcodes-box-form").serializeArray()[5].value;
						
						
            
			$("#mb2shortcodes-result").html('[box type="'+boxType+'"'+boxTitle+boxIcon+boxColor+boxBorder+']'+br+boxContent+br+'[/box]');		
                      
        });
		
		
		
        
    });
    </script>
    <h3>Icon Box</h3> 
    <form id="mb2shortcodes-box-form" class="mb2shortcodes-form form-horizontal" action="index.html">
        <div class="control-group">
        	<div class="control-label"><label for="box_type">Type</label></div>
        	<div class="controls">
            	<select name="box_type" id="box_type">
                	<option value="1">Box 1</option>
            		<option value="2">Box 2</option>
                    <option value="3">Box 3</option>
                    <option value="4">Box 4</option>
                    <option value="5">Box 5</option>
                    <option value="6">Box 6</option>
                    <option value="7">Box 7</option>
                    <option value="8">Box 8</option>
            	</select>
            </div>
        </div>
        <div class="control-group">
        	<div class="control-label"><label for="box_color">Color</label></div>
        	<div class="controls">
            	<select name="box_color" id="box_color">
                	<option value="">Default</option>
                    <option value="primary">Primary</option>
                    <option value="info">Info</option>
            		<option value="success">Success</option>
                    <option value="warning">Warning</option>
                    <option value="danger">Danger</option>
            	</select>
            </div>
        </div>
        <div class="control-group">
        	<div class="control-label"><label for="box_border">Border</label></div>
        	<div class="controls">
            	<select name="box_border" id="box_border">
                	<option value="1">Yes</option>
            		<option value="0" selected>No</option>
            	</select>
            </div>
        </div>
        <div class="control-group">
       		<div class="control-label"><label for="box_icon">Icon</label></div>
        	<div class="controls"><input type="text" name="box_icon" id="box_icon" value="" /></div>
        </div>
        <div class="control-group">
       		<div class="control-label"><label for="box_title">Title</label></div>
        	<div class="controls"><input type="text" name="box_title" id="box_title" value="" /></div>
        </div>
        <div class="control-group">
            <div class="control-label"><label for="box_content">Content</label></div>
            <div class="controls"><textarea name="box_content" id="box_content"></textarea></div>
        </div>        
        <input class="btn btn-primary" id="mb2shortcodes-box-submit" type="button" value="Generate">      
    </form>
</div>