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
<div class="mb2shortcodes-item mb2shortcodes-item-bord">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
		
		
        $("#mb2shortcodes-bord-submit").click(function(){ 
			var bordSize = $("#mb2shortcodes-bord-form").serializeArray()[0].value;				                   
            var bordCcolor = $("#mb2shortcodes-bord-form").serializeArray()[1].value;
				            
			$("#mb2shortcodes-result").html('[border size="'+bordSize+'" custom_color="'+bordCcolor+'"]');	
                      
        });		
			
		$('#bord_c_colorr').spectrum({
			showInput: true,
			preferredFormat: 'hex',
			allowEmpty: true,
			color: ''
		});		
		
        
    });
    </script>
    <h3>Horizontal Border</h3>
    <form id="mb2shortcodes-bord-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
            <div class="control-label"><label for="bord_size">Border Width (px)</label></div>
          	<div class="controls"><input type="text" name="bord_size" id="bord_size" value="" /></div>
        </div>         
        <div class="control-group">
            <div class="control-label"><label for="bord_c_colorr">Optional Color</label></div>
          	<div class="controls"><input type="text" name="bord_c_colorr" id="bord_c_colorr" class="mb2shortcodes-color" /></div>
        </div>     
        <input class="btn btn-primary" id="mb2shortcodes-bord-submit" type="button" value="Generate">      
    </form>
</div>