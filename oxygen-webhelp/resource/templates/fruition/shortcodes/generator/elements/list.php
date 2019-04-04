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
<div class="mb2shortcodes-item mb2shortcodes-item-list">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
        $("#mb2shortcodes-list-submit").click(function(){                    
           
		    var listType = $("#mb2shortcodes-list-form").serializeArray()[0].value;
			var listHor = $("#mb2shortcodes-list-form").serializeArray()[1].value;
			var listAlign = $("#mb2shortcodes-list-form").serializeArray()[2].value;  
			
			
			          
			$("#mb2shortcodes-result").html('[list type="'+listType+'" horizontal="'+listHor+'" align="'+listAlign+'"]'+br+'[li icon="" link=""]List text...[/li]'+br+'[li icon="" link=""]List text...[/li]'+br+'[/list]');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>List</h3>
    <form id="mb2shortcodes-list-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
        	<div class="control-label"><label for="list_type">List Type</label></div>
        	<div class="controls">
            	<select name="list_type" id="list_type">
            		<option value="1">Normal List</option>
                    <option value="2">Arrow List</option>
            	</select>
            </div>
        </div>  
        <div class="control-group">
        	<div class="control-label"><label for="list_hor">Horizontal List</label></div>
        	<div class="controls">
            	<select name="list_hor" id="list_hor">
                	<option value="0">No</option>
            		<option value="1">Yes</option>
            	</select>
            </div>
        </div>
        <div class="control-group">
        	<div class="control-label"><label for="list_align">Alignment</label></div>
        	<div class="controls">
            	<select name="list_align" id="list_align">
                	<option value="left">Left</option>
            		<option value="right">Right</option>
                    <option value="center">Center</option>
            	</select>
            </div>
        </div>         
        <input class="btn btn-primary" id="mb2shortcodes-list-submit" type="button" value="Generate">      
    </form>
</div>