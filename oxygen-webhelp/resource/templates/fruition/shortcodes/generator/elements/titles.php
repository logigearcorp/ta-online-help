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
<div class="mb2shortcodes-item mb2shortcodes-item-titles">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
		
		
        $("#mb2shortcodes-titles-submit").click(function(){
                    
            var titleText = $("#mb2shortcodes-titles-form").serializeArray()[0].value;
			var titleTag = $("#mb2shortcodes-titles-form").serializeArray()[1].value;
			var titleAlign = $("#mb2shortcodes-titles-form").serializeArray()[2].value;	
				
            
			$("#mb2shortcodes-result").html('[title tag="'+titleTag+'" align="'+titleAlign+'"]'+titleText+'[/title]');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>Big Title</h3>
    <form id="mb2shortcodes-titles-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
            <div class="control-label"><label for="titles_text">Title Text</label></div>
          	<div class="controls"><input type="text" name="titles_text" id="titles_text" value="Title text" /></div>
        </div>  
        <div class="control-group">
        	<div class="control-label"><label for="titles_tag">Title Tag</label></div>
        	<div class="controls">
            	<select name="titles_tag" id="titles_tag">
                	<option value="h1">h1</option>
            		<option value="h2">h2</option>
                    <option value="h3">h3</option>
                    <option value="h4" selected>h4</option>
                    <option value="h5">h5</option>
                    <option value="h6">h6</option>
            	</select>
            </div>
        </div> 
        <div class="control-group">
        	<div class="control-label"><label for="titles_align">Title Align</label></div>
        	<div class="controls">
            	<select name="titles_align" id="titles_align">
                	<option value="left">Left</option>
            		<option value="right">Right</option>
                    <option value="center">Center</option>
            	</select>
            </div>
        </div>   
        <input class="btn btn-primary" id="mb2shortcodes-titles-submit" type="button" value="Generate">      
    </form>
</div>