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
<div class="mb2shortcodes-item mb2shortcodes-item-email">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
		
        $("#mb2shortcodes-email-submit").click(function(){
                    
            var emailIcon = $("#mb2shortcodes-email-form").serializeArray()[0].value;
						
            
			$("#mb2shortcodes-result").html('[site_email icon="'+emailIcon+'"]');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>Site Email</h3>
    <p class="mb2shortcodes-desc">Display email adress which is defined in the template admin panel.</p> 
    <form id="mb2shortcodes-email-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
        	<div class="control-label"><label for="email_icon">Email Icon</label></div>
        	<div class="controls">
            	<select name="email_icon" id="email_icon">
                	<option value="1">Yes</option>
            		<option value="0">No</option>
            	</select>
            </div>
        </div>    
        <input class="btn btn-primary" id="mb2shortcodes-email-submit" type="button" value="Generate">      
    </form>
</div>