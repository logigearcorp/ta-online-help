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
<div class="mb2shortcodes-item mb2shortcodes-item-mposition">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
		
		
        $("#mb2shortcodes-mposition-submit").click(function(){
			                    
            var modName = $("#mb2shortcodes-mposition-form").serializeArray()[0].value;           
			$("#mb2shortcodes-result").html('[module_position name="'+modName+'"]');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>Module Position</h3>
    <p class="mb2shortcodes-desc">Add custom module position.</p> 
    <form id="mb2shortcodes-mposition-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
        	<div class="control-label"><label for="mposition">Module Position</label></div>
        	<div class="controls">
            	<input type="text" name="mposition" id="mposition" value="custom1" />
            </div>
        </div>    
        <input class="btn btn-primary" id="mb2shortcodes-mposition-submit" type="button" value="Generate">      
    </form>
</div>