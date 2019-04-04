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
<div class="mb2shortcodes-item mb2shortcodes-item-gap">
	<script type="text/javascript">
    jQuery(document).ready(function($){	    
		
		
        $("#mb2shortcodes-gap-submit").click(function(){                    
            var gapSize = $("#mb2shortcodes-gap-form").serializeArray()[0].value;
			var customHeight = $("#mb2shortcodes-gap-form").serializeArray()[1].value;
			var smallScreen = $("#mb2shortcodes-gap-form").serializeArray()[2].value; 
			           
			$("#mb2shortcodes-result").html('[gap_'+gapSize+' smallscreen="'+smallScreen+'" custom_height="'+customHeight+'"]');
					
                      
        });		
        
    });
    </script>
    <h3>Gap</h3>
    <p class="mb2shortcodes-desc">Display gap div.</p> 
    <form id="mb2shortcodes-gap-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <div class="control-group">
        	<div class="control-label"><label for="gap_size">Size</label></div>
        	<div class="controls">
            	<select name="gap_size" id="gap_size">
                	<option value="5">5</option>
            		<option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
            	</select>
            </div>
        </div> 
        <div class="control-group">
            <div class="control-label"><label for="custom_height">Custom Height (px)</label></div>
          	<div class="controls"><input type="text" name="custom_height" id="custom_height" value=""/></div>
        </div>
        <div class="control-group">
        	<div class="control-label"><label for="esmall_screen">Use in Small Screen</label></div>
        	<div class="controls">
            	<select name="esmall_screen" id="esmall_screen">
                	<option value="1">Yes</option>
            		<option value="0">No</option>
            	</select>
            </div>
        </div>  
        <input class="btn btn-primary" id="mb2shortcodes-gap-submit" type="button" value="Generate">      
    </form>
</div>