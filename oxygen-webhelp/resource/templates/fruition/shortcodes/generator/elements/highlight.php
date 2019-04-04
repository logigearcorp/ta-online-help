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
<div class="mb2shortcodes-item mb2shortcodes-item-highlight">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
		
        $("#mb2shortcodes-highlight-submit").click(function(){                    
           
		    var highVal = $("#mb2shortcodes-highlight-form").serializeArray()[0].value;
			var highType = $("#mb2shortcodes-highlight-form").serializeArray()[1].value; 
			
			
			          
			$("#mb2shortcodes-result").html('[highlight type="'+highType+'"]'+highVal+'[/highlight]');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>Highlight</h3>
    <form id="mb2shortcodes-highlight-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
        	<div class="control-label"><label for="high_val">Text</label></div>
        	<div class="controls">
            	<input type="text" name="high_val" id="high_val" value="" />
            </div>
        </div>        
        <div class="control-group">
        	<div class="control-label"><label for="high_type">Type</label></div>
        	<div class="controls">
            	<select name="high_type" id="high_type">
            		<option value="1">Type 1</option>
                    <option value="2">Type 1</option>
                    <option value="3">Type 3</option>
            	</select>
            </div>
        </div>          
        <input class="btn btn-primary" id="mb2shortcodes-highlight-submit" type="button" value="Generate">      
    </form>
</div>