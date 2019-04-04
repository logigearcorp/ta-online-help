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
<div class="mb2shortcodes-item mb2shortcodes-item-sicons">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
		
        $("#mb2shortcodes-sicons-submit").click(function(){
                    
            var siconsSize = ' size="'+$("#mb2shortcodes-sicons-form").serializeArray()[0].value+'"';		
			var siconsTt = ' ttip="'+$("#mb2shortcodes-sicons-form").serializeArray()[1].value+'"';	
			var siconsTpos = ' tpos="'+$("#mb2shortcodes-sicons-form").serializeArray()[2].value+'"';		
			var siconsType = ' type="'+$("#mb2shortcodes-sicons-form").serializeArray()[3].value+'"';			
            
			$("#mb2shortcodes-result").html('[social_icons'+siconsSize+siconsTt+siconsTpos+siconsType+']');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>Social Icons</h3> 
    <form id="mb2shortcodes-sicons-form" class="mb2shortcodes-form form-horizontal" action="index.html">
        <div class="control-group">
        	<div class="control-label"><label for="sicons_size">Size</label></div>
        	<div class="controls">
            	<select name="sicons_size" id="sicons_size">
                	<option value="">Default</option>
            		<option value="lg">Large</option>
            	</select>
            </div>
        </div>        
        <div class="control-group">
        	<div class="control-label"><label for="sicons_tt">Tooltip</label></div>
        	<div class="controls">
            	<select name="sicons_tt" id="sicons_tt">
                	<option value="0">No</option>
            		<option value="1">Yes</option>
            	</select>
            </div>
        </div> 
        <div class="control-group">
        	<div class="control-label"><label for="sicons_tt_pos">Tooltip Position</label></div>
        	<div class="controls">
            	<select name="sicons_tt_pos" id="sicons_tt_pos">
                	<option value="top">Top</option>
            		<option value="bottom">Bottom</option>
            	</select>
            </div>
        </div>
        <div class="control-group">
        	<div class="control-label"><label for="sicons_type">Type</label></div>
        	<div class="controls">
            	<select name="sicons_type" id="sicons_type">
                	<option value="">Default</option>
            		<option value="color">Color</option>
                    <option value="darken">Darken</option>
                    <option value="transparent">Transparent</option>
            	</select>
            </div>
        </div>              
        <input class="btn btn-primary" id="mb2shortcodes-sicons-submit" type="button" value="Generate">      
    </form>
</div>