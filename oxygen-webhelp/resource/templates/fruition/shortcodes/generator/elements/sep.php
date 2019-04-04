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
<div class="mb2shortcodes-item mb2shortcodes-item-sep">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
		
		
        $("#mb2shortcodes-sep-submit").click(function(){
                    
            var seType = $("#mb2shortcodes-sep-form").serializeArray()[0].value;
			var sepSpace = $("#mb2shortcodes-sep-form").serializeArray()[1].value;			
            
			$("#mb2shortcodes-result").html('[separator type="'+seType+'" space="'+sepSpace+'"]');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>Gap</h3>
    <p class="mb2shortcodes-desc">Display vertical separator element.</p> 
    <form id="mb2shortcodes-sep-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
            <div class="control-label"><label for="sep_type">Type</label></div>
          	<div class="controls"><input type="text" name="sep_type" id="sep_type" value="|" /></div>
        </div>
        <div class="control-group">
            <div class="control-label"><label for="sep_space">Space (px)</label></div>
          	<div class="controls"><input type="text" name="sep_space" id="sep_space" value="5" /></div>
        </div>    
        <input class="btn btn-primary" id="mb2shortcodes-sep-submit" type="button" value="Generate">      
    </form>
</div>