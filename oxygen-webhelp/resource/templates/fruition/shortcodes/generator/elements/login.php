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
<div class="mb2shortcodes-item mb2shortcodes-item-login">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
		
		
        $("#mb2shortcodes-login-submit").click(function(){
                    
            var loginIcon = $("#mb2shortcodes-login-form").serializeArray()[0].value;
						
            
			$("#mb2shortcodes-result").html('[site_login icon="'+loginIcon+'"]');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>Login Module</h3>
    <p class="mb2shortcodes-desc">Display login module which is published in "login" module position.</p> 
    <form id="mb2shortcodes-login-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
        	<div class="control-label"><label for="login_icon">Login Icon</label></div>
        	<div class="controls">
            	<select name="login_icon" id="login_icon">
                	<option value="1">Yes</option>
            		<option value="0">No</option>
            	</select>
            </div>
        </div>    
        <input class="btn btn-primary" id="mb2shortcodes-login-submit" type="button" value="Generate">      
    </form>
</div>