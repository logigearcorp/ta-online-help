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
<div class="mb2shortcodes-item mb2shortcodes-item-lead_text">
	<script type="text/javascript">
    jQuery(document).ready(function($){	       
	  
	    $("#mb2shortcodes-lead_text-submit").click(function(){                    
            var lead_texContent = $("#mb2shortcodes-lead_text-form").serializeArray()[0].value;           
			$("#mb2shortcodes-result").html('[leading_text]'+lead_texContent+'[/leading_text]');                      
        });	
        
    });
    </script>
    <h3>Leading text</h3> 
    <form id="mb2shortcodes-lead_text-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
            <div class="control-label"><label for="lead_text_text">Text</label></div>
            <div class="controls"><textarea name="lead_text_text" id="lead_text_text"></textarea></div>
        </div>   
        <input class="btn btn-primary" id="mb2shortcodes-lead_text-submit" type="button" value="Generate">      
    </form>
</div>