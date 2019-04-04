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
<div class="mb2shortcodes-item mb2shortcodes-item-message">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
		
		
		
		
        $("#mb2shortcodes-message-submit").click(function(){
                    
            var messageType = $("#mb2shortcodes-message-form").serializeArray()[0].value;
			var messageClose = $("#mb2shortcodes-message-form").serializeArray()[1].value;
			var messageText = $("#mb2shortcodes-message-form").serializeArray()[2].value;
				
            
			$("#mb2shortcodes-result").html('[message type="'+messageType+'" close="'+messageClose+'"]'+messageText+'[/message]');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>Message</h3>
    <form id="mb2shortcodes-message-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
        	<div class="control-label"><label for="message_type">Type</label></div>
        	<div class="controls">
            	<select name="message_type" id="message_type">
                	<option value="info">Info</option>
            		<option value="success">Success</option>
                    <option value="warning">Warning</option>
                    <option value="danger">Danger</option>
            	</select>
            </div>
        </div>
        <div class="control-group">
        	<div class="control-label"><label for="message_close">Close Button</label></div>
        	<div class="controls">
            	<select name="message_close" id="message_close">
                	<option value="1">Yes</option>
            		<option value="0">No</option>
            	</select>
            </div>
        </div> 
        <div class="control-group">
            <div class="control-label"><label for="message_text">Text</label></div>
          	<div class="controls"><textarea name="message_text" id="message_text"></textarea></div>
        </div>         
        <input class="btn btn-primary" id="mb2shortcodes-message-submit" type="button" value="Generate">      
    </form>
</div>