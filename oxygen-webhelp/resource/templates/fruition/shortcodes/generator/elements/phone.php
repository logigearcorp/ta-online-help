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
<div class="mb2shortcodes-item mb2shortcodes-item-phone">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
		
        $("#mb2shortcodes-phone-submit").click(function(){
                    
            var phoneIcon = $("#mb2shortcodes-phone-form").serializeArray()[0].value;
						
            
			$("#mb2shortcodes-result").html('[site_phone icon="'+phoneIcon+'"]');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>Site Phone</h3>
    <p class="mb2shortcodes-desc">Display phone number which is defined in the template admin panel.</p> 
    <form id="mb2shortcodes-phone-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
        	<div class="control-label"><label for="phone_icon">Phone Icon</label></div>
        	<div class="controls">
            	<select name="phone_icon" id="phone_icon">
                	<option value="1">Yes</option>
            		<option value="0">No</option>
            	</select>
            </div>
        </div>    
        <input class="btn btn-primary" id="mb2shortcodes-phone-submit" type="button" value="Generate">      
    </form>
</div>