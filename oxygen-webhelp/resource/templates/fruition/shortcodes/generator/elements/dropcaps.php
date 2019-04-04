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
<div class="mb2shortcodes-item mb2shortcodes-item-dropcaps">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
		
        $("#mb2shortcodes-dropcaps-submit").click(function(){                    
           
		    var dropValue = $("#mb2shortcodes-dropcaps-form").serializeArray()[0].value;
			var dropType = $("#mb2shortcodes-dropcaps-form").serializeArray()[1].value; 
			
			
			          
			$("#mb2shortcodes-result").html('[dropcap value="'+dropValue+'" type="'+dropType+'"]');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>Drop Caps</h3>
    <form id="mb2shortcodes-dropcaps-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
        	<div class="control-label"><label for="drop_val">Value</label></div>
        	<div class="controls">
            	<input type="text" name="drop_val" id="drop_val" value="A" />
            </div>
        </div>        
        <div class="control-group">
        	<div class="control-label"><label for="drop_type">Type</label></div>
        	<div class="controls">
            	<select name="drop_type" id="drop_type">
            		<option value="1">Type 1</option>
                    <option value="2">Type 1</option>
                    <option value="3">Type 3</option>
            	</select>
            </div>
        </div>          
        <input class="btn btn-primary" id="mb2shortcodes-dropcaps-submit" type="button" value="Generate">      
    </form>
</div>