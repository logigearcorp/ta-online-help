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
<div class="mb2shortcodes-item mb2shortcodes-item-lang">
	<script type="text/javascript">
    jQuery(document).ready(function($){	
        
		
        $("#mb2shortcodes-lang-submit").click(function(){
                    
            //var langIcon = $("#mb2shortcodes-lang-form").serializeArray()[0].value;
						
            
			$("#mb2shortcodes-result").html('[site_language]');		
                      
        });
		
				
		
        
    });
    </script>
    <h3>Language Switcher Module</h3>
    <p class="mb2shortcodes-desc">Display language switcher module which is published in "language" module position.</p> 
    <form id="mb2shortcodes-lang-form" class="mb2shortcodes-form form-horizontal" action="index.html">               
        <?php /*?><div class="control-group">
        	<div class="control-label"><label for="lang_icon">Languge Icon</label></div>
        	<div class="controls">
            	<select name="lang_icon" id="lang_icon">
                	<option value="1">Yes</option>
            		<option value="0">No</option>
            	</select>
            </div>
        </div> <?php */?>   
        <input class="btn btn-primary" id="mb2shortcodes-lang-submit" type="button" value="Generate">      
    </form>
</div>