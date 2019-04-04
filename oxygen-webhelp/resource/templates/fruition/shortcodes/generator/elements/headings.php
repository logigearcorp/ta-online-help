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
<div class="mb2shortcodes-item mb2shortcodes-item-headings">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
		
		
        $("#mb2shortcodes-headings-submit").click(function(){
                    
            var headingText = $("#mb2shortcodes-headings-form").serializeArray()[0].value;
			var headingTag = $("#mb2shortcodes-headings-form").serializeArray()[1].value;
				
            
			$("#mb2shortcodes-result").html('['+headingTag+']'+headingText+'[/'+headingTag+']');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>Heading</h3>
    <p class="mb2shortcodes-desc">Display heading elemet.</p> 
    <form id="mb2shortcodes-headings-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
            <div class="control-label"><label for="headings_text">Title Text</label></div>
          	<div class="controls"><input type="text" name="headings_text" id="headings_text" value="Title text" /></div>
        </div> 
        <div class="control-group">
        	<div class="control-label"><label for="headings_tag">Title Tag</label></div>
        	<div class="controls">
            	<select name="headings_tag" id="headings_tag">
                	<option value="h1">h1</option>
            		<option value="h2">h2</option>
                    <option value="h3">h3</option>
                    <option value="h4" selected>h4</option>
                    <option value="h5">h5</option>
                    <option value="h6">h6</option>
            	</select>
            </div>
        </div>   
        <input class="btn btn-primary" id="mb2shortcodes-headings-submit" type="button" value="Generate">      
    </form>
</div>